<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
Use App\Models\Customer;


class CustomerController extends Controller
{
  function login(){
      return view('auth.login');
  }
  function register(){
    return view('auth.register');
}
function create(Request $request){
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:custom',
        'password' => 'required|min:6|max:8',
        ]);

        $customer= new Customer;
        $customer->name=$request->name;
        $customer->email=$request->email;
        $customer->password=Hash::make($request->password);
        $query=$customer->save();

        if($query){
            return back()->with("success","You have been sucessfully Registered");
        }else{
            return back()->with("fail","Somethink went wrong");
        }
}

function check(Request $request){
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6|max:8',
        ]);

        $customer= Customer::where('email','=',$request->email)->first();
        if($customer){
            if(Hash::check($request->password,$customer->password)){
                $request->session()->put('LoggedUser',$customer->id);
                return redirect('profile'); 
            }else{
                return back()->with('fail','Invalid Password');
            }
        }else{
            return back()->with('fail','You Have to Register before');
        }
    }

    function profile(){
        if(session()->has('LoggedUser')){
            $customer=Customer::where('id','=',session('LoggedUser'))->first();
            $data=[
                'LoggedUserInfo'=>$customer
            ];
        }
        return view('admin.profile',$data);
    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('login');
        }
    }
}
