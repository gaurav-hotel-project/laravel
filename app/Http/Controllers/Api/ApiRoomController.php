<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;

class ApiRoomController extends Controller
{
    protected $room;

    public function __construct(Room $room){
        $this->room = $room;

    }

    public function showroom()
    {
        $data = $this->room->latest()->get();
        return response()->json(['message' => 'Room Data Fetched Successfully', 'data' => $data]);
    }

    public function saveroom(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'room_type_id' => 'required',
        ]);
         $data=new Room;
         $data->title=$request->title;
         $data->description=$request->description;
         $data->room_type_id=$request->room_type_id;
         $data->save();
       // $data = $this->room->create($request->all());
        return response()->json(['message' => 'Room Data Added Successfully', 'data' => $data]);
    }
    
    public function updateroom(Request $request){
        $validator = $request->validate([
            'room_id' => 'required',

        ]);


        $data = $this->room->find($request->banner_id);
        
        $data->update($request->all());
        
        return response()->json(['message' => 'Room Data Updated Successfully', 'data' => $data]);
    }

    public function deleteroom(Request $request){
        $validator = $request->validate([
            'room_id' => 'required',


        ]);
        $data = $this->room->find($request->room_id);
        $test=$this->room->find($request->room_type_id);
        
        if($test==null){
            $data->delete();
            return response()->json(['message' => 'Room Data Deleted Successfully']);
        }
        else{
            return response()->json(['message' => 'Room type is  Already Available ']);

        }
    }
}
