<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){

        $users = User::get();

        return view('admin.users.index', compact('users'));
    }

    public function create(){
        return view('admin.users.create');
    }

    public function store(Request $request) {
        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $request['password']=Hash::make($request->password);
        $user->password = $request['password'];
        $user->sex = $request['sex'];
        $user->birthday = $request['birthday'];
        $user->phone = $request['phone'];
        $user->address = $request['address'];
        $user->role = $request['role'];
        $user->save();

        return redirect()->route('admin.users.index')->with('message', 'Added Successfully !');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request,User $user) : RedirectResponse
    {
        DB::table('users')->where('id', $user->id)->update([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>Hash::make($request->password),
            'sex'=>$request['sex'],
            'address'=>$request['address'],
            'birthday'=>$request['birthday'],
            'role'=>$request['role'],
        ]);

        return redirect()->route('admin.users.index')->with('message', 'Cập nhật thành công!');
    }



    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('message', 'Deleted Successfully !');
    }
}
