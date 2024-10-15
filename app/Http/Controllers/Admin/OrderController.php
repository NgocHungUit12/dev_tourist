<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Tour;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function index(){
        $orders = Order::get();
       
        return view('admin.orders.index', compact('orders'));
    }

    public function edit(Order $order){
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order){

        DB::table('orders')->where('id', $order->id)->update(['status'=>$request['status']]);
        
        return redirect()->route('admin.orders.index')->with('message','Updated Successfully !');
    }

    public function destroy(Order $order)
    {
        if($order->status == 'cancel'){

            
            $order->delete();
            redirect()->route('admin.orders.index')->with('message', 'Deleted Successfully !');
        } else{
            redirect()->route('admin.orders.index')->with('message', 'You can`t delete this order !');
        }
       

        return redirect()->route('admin.orders.index');
    }
}
