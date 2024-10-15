<?php

namespace App\Http\Controllers;

use App\Models\Departure;
use Illuminate\Http\Request;
use Helper;
use App\Models\Tour;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
// use Illuminate\Tests\Integration\Queue\Order;

class OrderController extends Controller
{
    
    public function checkout($id){
        if(Auth::check()){

            $departure = Departure::where('id', $id)->first();

            $tour = Tour::where('id', $departure->tour_id)->first();
           
            return view('checkout', compact('tour','departure'));
        } 
        else{
            return view('auth.login');
        }

       
    }

    public function store(Request $request, $id){

       
        
        $order = new Order();
        $order->user_id = Auth::id();
        $order->order_number = 'ORD-'.strtoupper(Str::random(10));
        $order->tour_id = $id;
        $order->total_amount = $request['total'];
        
        $order->payment_method = $request['payment_method1'];
        $order->sub_total = $request['total'];
        $order->coupon = $request['coupon1'];
        if($request['payment_method1'] == 'paypal'){
                $order->payment_method = 'paypal';
                $order->payment_status = 'paid';
            } else {
                $order->payment_method = 'cod';
                $order->payment_status = 'Unpaid';
        }

    
        $order->name = $request['name1'];
        $order->email = $request['email1'];
        $order->phone = $request['phone1'];
        $order->address = $request['address1'];

    
        $order->quantity_adult = $request['adult1'];
        $order->quantity_child_6_11 = $request['child_6_111'];
        $order->quantity_child_2_6 = $request['child_61'];
        $order->quantity_free = $request['child_free1'];

        $order->save();

            $departure = Departure::find($request['departure_id']);

            DB::table('departures')->where('id', $request['departure_id'])->update(['quantity'=>$departure->quantity - $order->quantity_adult - $order->quantity_child_6_11 - $order->quantity_child_2_6 - $order->quantity_free]);

            return redirect()->route('home')->with('message', 'Đặt thành công !');
            
        }

}
