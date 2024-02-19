<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Auth;
use App\User;
use Illuminate\Http\Request;
use DataTables;

class HotelController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Hotel::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" 
                            onclick="show_hotel('. $row->id.')"  class=" tbl_btn edit btn btn-success mr-10 
                            btn-sm"><i class="nav-icon fas fa fa-eye"></i>&nbsp Show </a>';
                    $btn = $btn .'<a href="javascript:void(0)" 
                           onclick="update_hotel(' . $row->id .' )"  class=" tbl_btn edit btn btn-primary mr-10 
                           btn-sm"><i class="nav-icon fas fa fa-edit"></i> Edit </a>';
                    $btn = $btn . '<a href="javascript:void(0)" 
                           onclick="delete_hotel(' . $row->id . ')" 
                           class="tbl_btn btn-danger btn-sm"> <i class="nav-icon fas fa fa-trash"></i>
                           Delete</a> ';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin/pages/hotel');
    }

    public function store(Request $request){
        $imageExtensions = ['jpg', 'jpeg', 'png'];
        $ext  = $request->image->extension();

        if(in_array($ext, $imageExtensions)){
            $image_validname =  str_replace(' ', '',$request->name);
            $imageName = $image_validname.'.'.$request->image->extension();
            $request->image->move(public_path('hotel_image'), $imageName);  
            Hotel::updateOrCreate([
                    'id' => $request->id
                ],
                [
                    'hotel_name' => $request->name,
                    'hotel_image' => $imageName,
                    'hotel_address' => $request->address,
                    'hotel_review' => $request->review,
                    'hotel_description' => $request->description,
                ]); 
                if($request->has('id')){
                    return redirect()->back()->with('status', 'Hotel Updated successful!');
                }else{
                    return redirect()->back()->with('status', 'New Hotel Created successful!');
                }
        }else{
            return redirect()->back()->with('error', 'Please upload a valid image');
        }
     
    }

    public function edit($id){
        $hotel = Hotel::find($id);
        return response()->json($hotel);
    }

    public function destroy(Request $request){
        
        $speaker = Hotel::find($request['id']);
        $speaker->delete();
        return response()->json(['success'=>'Venue Deleted Successfully!']);
    }
}