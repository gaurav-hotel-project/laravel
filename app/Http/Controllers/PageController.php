<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Room;
use App\Models\User;

use Illuminate\Support\Str;

use Mail;

class PageController extends Controller
{
    // About Us
    function about_us(){
        return view('about_us');
    }

    // Contact Us Form
    function contact_us(){
        return view('contact_us');
    }

    function servicedetail(){
        return view('servicedetail');
    }

    function booking(){
        $roomtypes = RoomType::all();
        return view('front-booking', compact('roomtypes'));
        
        // return view('front-booking');
    }
    function register(){
        return view('register');
    }
    function frontlogin(){
        return view('frontlogin');
    }
    function room(){
        $data=Room::all();
        return view('room',compact('data'));
        
    }

    function Thankyou(){
        return view('thankyou');
    }

    function forgotpassword(){
        return view('forgotpassword');
    }

    function resetpassword(){
        return view('reset-password');
    }
        
    function contactus(){

        return view('contact-us');

    }

    public function contectus(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'Phone'=>'required',
            'message'=>'required',
        ]);

        $data = new User();
        

         $data->name=$request->name;
         $data->email=$request->email;
         $data->Phone=$request->Phone;
         $data->message=$request->message;
         $data->save();
         return redirect('page/contact-us')->with('success','Mail has been sent.');

    }


    // // // Save Contact Us Form
    // // function save_contactus(Request $request){
    // //     $request->validate([
    // //         'full_name'=>'required',
    // //         'email'=>'required',
    // //         'subject'=>'required',
    // //         'msg'=>'required',
    // //     ]);

    // //     $data = array(
    // //         'name'=>$request->full_name,
    // //         'email'=>$request->email,
    // //         'subject'=>$request->subject,
    // //         'msg'=>$request->msg,
    // //     );

    //     // Mail::send('mail', $data, function($message){
    //     //     $message->to('codeartisanlab2607@gmail.com', 'Suraj Kumar')->subject('Contact Us Query');
    //     //     $message->from('codeartisanlab2607@gmail.com','CodeArtisanLab');
    //     // });

    //     return redirect('page/contact-us')->with('success','Mail has been sent.');
    // }

}