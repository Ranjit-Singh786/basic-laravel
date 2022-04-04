<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->has('Admin_Login')){
            return redirect('admin/dashboard');
        }else{
            return view('admin.login');
        }
        return view('admin.login');

    }


    public function auth(Request $request)
    {
        //return $request->post();die;
       $email =  $request->post('email');
       $password =  $request->post('password');
       $result = Admin::where(['email'=>$email])->first();
       if($result){
           if(Hash::check($request->post('password'),$result->password)){
            $request->session()->put('Admin_Login',true);
            $request->session()->put('Admin_id',$result->id);
            //$request->session()->put('Admin_email',$result->email);
            return redirect('admin/dashboard');
           }else{
            $request->session()->flash('error','Please Enter Valid Password');
            return redirect('admin');
           }

       }else{
           $request->session()->flash('error','Please Enter Valid Details');
           return redirect('admin');
       }
    //    echo "<pre>";
    //    print_r($result);

    }

    public function dashboard()
    {
       return view('admin.dashboard');
    }
    // public function updatepassword()
    // {
    //    $r = Admin::find(1);
    //    $r->password = Hash::make('ranjit');
    //    $r->save();
    // }



}
