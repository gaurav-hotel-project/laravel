<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Testimonial;
use Cookie;

class AdminController extends Controller
{
    
    function login(){
        return view('login');
       
    }
    // Check Login
    function check_login(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
        $admin=Admin::where(['username'=>$request->username,'password'=>($request->password)])->count();
        if($admin>0){
            $adminData=Admin::where(['username'=>$request->username,'password'=>($request->password)])->get();
            session(['adminData'=>$adminData]);
             return redirect('admin/dashboard')->with('msg','Login Successfully!!');
        }else{
            return redirect('admin/login')->with('msg','Invalid username/Password!!');
        }
    }
    // Logout
    function logout(){
        session()->forget(['adminData']);
        return redirect('admin');
    }

    public function dashboard()
    {
        $data=Booking::all();
        return view('dashboard',['data'=>$data]);
    }

    public function testimonials()
    {
        $data=Testimonial::all();
        return view('admin_testimonials',['data'=>$data]);
    }

    public function destroy_testimonial($id)
    {
       Testimonial::where('id',$id)->delete();
       return redirect('admin/testimonials')->with('success','Data has been deleted.');
    }

}
