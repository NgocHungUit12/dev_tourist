<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Tour;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index(){
        
        $categories = Category::all();
        $count_categories = $categories->count();

        $tour = Tour::all();
        $count_tour = $tour->count();

        $post = Post::all();
        $count_post = $post->count();

        $user = User::all();
        $count_user = $user->count();

        $revenueByMonth = null;
        $revenueStats = null;

        return view('admin.dashboard.index', compact('revenueByMonth','revenueStats','count_categories','count_tour', 'count_post', 'count_user'));
    }

    public function revenue_date_get(){

        $startDate = null;
        $endDate = null;
        $revenueStats = null;

        return view('admin.revanue.date', compact('revenueStats','startDate','endDate'));
    }
    public function revenue_date(Request $request){
       
        $startDate = $request['date_start'];
        $endDate = $request['date_end'];
        
        
        $revenueStats = DB::table('orders')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(total_amount) as total'))
            ->where('status', 'book')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        return view('admin.revanue.date', compact('revenueStats','startDate','endDate'));
    }


    public function revenue_month(Request $request){
       

        $year = $request['year'];
        
        $revenueByMonth = DB::table('orders')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(total_amount) as total'))
            ->where('status', 'book')
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->orderBy('month', 'ASC')
            ->get();

        $revenueStats = null;
        $revenueByYear = null;
        return view('admin.revanue.month', compact('revenueByMonth','year'));
    }

    public function revenue_year(Request $request){
       

        $startYear = $request['year_start'];
        $endYear = $request['year_end'];
        
        
        $revenueByYear = DB::table('orders')
            ->select(DB::raw('YEAR(created_at) as year'), DB::raw('SUM(total_amount) as total'))
            ->where('status', 'book')
            ->groupBy('year')
            ->orderBy('year', 'ASC')
            ->get();

        return view('admin.revanue.year', compact('revenueByYear'));
    }

}
