<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use App\Models\Tour;
use App\Models\User;
use App\Mail\StoreContactMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreEmailRequest;
use App\Models\Category;
use App\Models\ProvineCategory;
use App\Models\RegionCategory;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\TourReview;
use App\Models\LikeReview;
use App\Models\Departure;
use Illuminate\Support\Facades\Auth;


class PageController extends Controller
{
    // public function index() : View
    // {
        

    //     return view('/tour', compact('tour'));
    // }
    public function home() : View
    {
        
        $category = Category::get();
        $posts = Post::get();
        $region1s = RegionCategory::where('category_id', 1)->get();
        $region2s = RegionCategory::where('category_id', 2)->get();

        return view('home', compact('category','posts','region1s', 'region2s'));
    }

    public function detail($id): View
    {
        $departure = Departure::where('id', $id)->first();
        $tour = Tour::where('id', $departure->tour_id)->first();

        // Lấy đánh giá và phản hồi cho tour
        $reviews = TourReview::with('replies')->where('tour_id', $tour->id)->get();

        return view('detail', compact('tour', 'reviews', 'departure'));
    }


    public function tour(Request $request){

        // $departures = Departure::when($request->date_start != null, function ($q) use ($request) {
        //     return $q->whereDate('departure_day', $request->date_start);
        // })
        //     ->when($request->location_start != null, function ($q) use ($request) {
        //         return $q->where('location_start',$request->location_start);
        //     })  
        //     ->when($request->name != null, function ($q) use ($request) {
        //         return $q->where('name','LIKE','%'.$request->name.'%');
        //     })         
        //     ->paginate(10);
        
        
        // return view('package', compact('departures'));

        $tours = Tour::when($request->date_start != null, function ($q) use ($request) {
            return $q->whereHas('departures', function ($query) use ($request) {
                $query->whereDate('departure_day', $request['date_start']);
            });
        })
            ->when($request->location_start != null, function ($q) use ($request) {
                return $q->where('location_start',$request->location_start);
            })  
            ->when($request->name != null, function ($q) use ($request) {
                return $q->where('name','LIKE','%'.$request->name.'%');
            })         
            ->paginate(10);

        return view('package', compact('tours'));
    }

    public function search_tour(Request $request){

        $departures = Departure::when($request->date_start != null, function ($q) use ($request) {
            return $q->whereDate('departure_day', $request->date_start);
        })
        ->when($request->location_start != null, function ($q) use ($request) {
            
            return $q->whereHas('tour', function ($query) use ($request) {
                $query->where('location_start', $request->location_start);
            });
        })  
        ->when($request->name != null, function ($q) use ($request) {
            
            return $q->whereHas('tour', function ($query) use ($request) {
                $query->where('name', 'LIKE', '%'.$request->name.'%');
            });
        })             
            ->paginate(10);
        

        return view('search_tour', compact('departures'));
    }

    public function posts(){
        $posts = Post::get();

        return view('posts', compact('posts'));
    }

    public function detailPost(Post $post){
        return view('posts-detail',compact('post'));
    }

    public function contact(){
        return view('contact');
    }

    public function getEmail(StoreEmailRequest $request){
        $detail = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];

        Mail::to('anhb1910032@gmail.com')->send(new StoreContactMail($detail));
        return back()->with('message', 'Thanks for your feedback! We will read it as soon as possible');
    }

    public function tour_filter(Category $category){
       
        return view('package_category', compact('category'));
    }

    public function tour_region (RegionCategory $region){

        return view('package_region', compact('region'));
    }
    public function tour_province (ProvineCategory $province){

        return view('package_province', compact('province'));
    }
    
    public function other_day(Tour $tour){

        return view('other_day', compact('tour'));
    }

    
}
