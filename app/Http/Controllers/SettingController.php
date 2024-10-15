<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use app\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index(){
       $user = Auth()->user();

        return view('setting', compact('user'));
    }

    public function user_index(){
        $user = Auth()->user();
 
         return view('auth.setting', compact('user'));
     }

    public function update(Request $request){

        $user = auth()->user();
        DB::table('users')->where('id', $user->id)->update(['name'=>$request['name'], 'email'=>$request['email']]);

        return redirect()->route('settings.index')->with('message', 'Updated Successfully !');
    }

    public function user_update(Request $request){

        $user = auth()->user();
        DB::table('users')->where('id', $user->id)->update(['name'=>$request['name'], 'email'=>$request['email']]);

        return redirect()->route('auth.setting', compact('user'))->with('message', 'Updated Successfully !');
    }

    public function update_password(Request $request){

        $user = auth()->user();
        if(Hash::check($request['current_password'], $user->password)){
            if($request['new_password'] == $request['confirm_password']){

                DB::table('users')->where('id', $user->id)->update(['password'=> Hash::make($request['new_password'])]);

                return redirect()->route('settings.index')->with('message', 'Thay đổi mật khẩu thành công !');
            } else {
                return redirect()->route('settings.index')->with('error', 'Xác nhận mật khẩu chưa chính xác !');
            }
            
        } else {
            return redirect()->route('settings.index')->with('error', 'Mật khẩu không đúng !');
        }     
    }

    public function user_update_password(Request $request){

        $user = auth()->user();
        if(Hash::check($request['current_password'], $user->password)){
            if($request['new_password'] == $request['confirm_password']){

                DB::table('users')->where('id', $user->id)->update(['password'=> Hash::make($request['new_password'])]);

                return redirect()->route('auth.setting')->with('message', 'Change Password Successfully !');
            } else {
                return redirect()->route('auth.setting')->with('error', 'Confirm password is incorrect !');
            }
            
        } else {
            return redirect()->route('auth.setting')->with('error', 'Passord is incorrect !');
        }     
    }

    public function profile(){

        $order = Order::where('user_id', auth()->user()->id);
        $count_order = $order->count();
        return view('auth.profile', compact('count_order'));
    }

    public function user_order(){
        $user = Auth()->user();

        $orders = Order::where('user_id', $user->id)->get();
 
        return view('auth.order', compact('orders'));
    }

    public function admin_order(){
        $user = Auth()->user();

        $orders = Order::where('user_id', $user->id)->get();
 
        return view('admin.admin_orders.order', compact('orders'));
    }

    public function user_order_edit(Order $order){

        return view('auth.edit_order', compact('order'));
    }

    public function user_order_update(Request $request, Order $order){

        $orders = Order::findOrFail($order->id);
        $orders->status = $request['status'];
        $orders->save();
        
        return redirect()->route('auth.order')->with('message','Updated Successfully  !');
    }
    
    public function order_detail(Order $order){

        return view('admin.admin_orders.order_detail', compact('order'));
    }
}
