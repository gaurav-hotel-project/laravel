<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\contect;
use Illuminate\Http\Request;



class ApiCustomerController extends Controller
{
    protected $customer;

    public function __construct(Customer $customer){
        $this->customer = $customer;

    }

    public function showCustomer()
    {
        $data = $this->customer->latest()->get();
        return response()->json(['message' => 'customer Data Fetched Successfully', 'data' => $data]);
    }

    public function saveCustomer(Request $request)
    {

        $request->validate([
            'full_name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'mobile'=>'required',
            'roomtype'=>'',
            // 'photo'=>''
        ]);

        if($request->hasFile('photo')){
            $imgPath=$request->file('photo');
        }else{
            $imgPath=null;
        }
        
        $data=new Customer;
        $data->full_name=$request->full_name;
        $data->email=$request->email;
        $data->mobile=$request->mobile;
        $data->address=$request->address;
        //$data->$roomtypes=$request->roomtypes;
         //$data->photo=$imgPath;
        $data->save();
       

    //     $ref=$request->ref;
    //     if($ref=='front'){
    //         return redirect('register')->with('success','Data has been saved.');
    //         //return response()->json($data);

    //     }

    //     return redirect('admin/customer/create')->with('success','Data has been added.');
       
    // }
    $data = $this->customer->create($request->all());
  
    return response()->json(['message' => 'Customer  Data Added Successfully', 'data' => $data]);

}
public function updateCustomer(Request $request){
    $validator = $request->validate([
        'Customer_id' => 'required',
         'email' => 'required|email',
         'mobile' => 'required',
         'address' => 'required',
         
    ]);
    $data = $this->customer->find($request->Customer_id);

    $data->update($request->all());
    
  
    return response()->json(['message' => 'customer Data Updated Successfully', 'data' => $data]);
}

public function deleteCustomer(Request $request){
    $validator = $request->validate([
        'customer_id' => 'required'
    ]);
    $data = $this->customer->find($request->customer_id);
    if(!$data) {
        //throw new DataDeletionException("Customer not found.");
        die("Customer not found.");
    }else{
    $data->delete();
    return response()->json(['message' => 'customer Data Deleted Successfully']);}
}



public function contectus(Request $request){

    $request->validate([
        'name'=>'required',
        'email'=>'required',
        'Phone'=>'required',
        'message'=>'required',
    ]);

    $data = new contect();
     $data->name=$request->name;
     $data->email=$request->email;
     $data->Phone=$request->Phone;
     $data->message=$request->message;
     $data->save();

     return response()->json(['message' => 'contect Data Added Successfully', 'data' => $data]);
}
}