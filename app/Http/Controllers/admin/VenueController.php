<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use Auth;
use App\User;
use Illuminate\Http\Request;
use DataTables;

class VenueController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Venue::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" 
                            onclick="show_venue('. $row->id.')"  class=" tbl_btn edit btn btn-success mr-10 
                            btn-sm"><i class="nav-icon fas fa fa-eye"></i>&nbsp Show </a>';
                    $btn = $btn .'<a href="javascript:void(0)" 
                           onclick="update_venue(' . $row->id .' )"  class=" tbl_btn edit btn btn-primary mr-10 
                           btn-sm"><i class="nav-icon fas fa fa-edit"></i> Edit </a>';
                    $btn = $btn . '<a href="javascript:void(0)" 
                           onclick="delete_venue(' . $row->id . ')" 
                           class="tbl_btn btn-danger btn-sm"> <i class="nav-icon fas fa fa-trash"></i>
                           Delete</a> ';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin/pages/venue');
    }

    public function store(Request $request){
        $imageExtensions = ['jpg', 'jpeg', 'png'];
        $ext  = $request->image->extension();

        if(in_array($ext, $imageExtensions)){
            $image_validname =  str_replace(' ', '',$request->name);
            $imageName = $image_validname.'.'.$request->image->extension();
            $request->image->move(public_path('venue_images'), $imageName);  
            Venue::updateOrCreate([
                    'id' => $request->id
                ],
                [
                    'venue_name' => $request->name,
                    'venue_image' => $imageName,
                    'venue_address' => $request->address,
                ]); 
                if($request->has('id')){
                    return redirect()->back()->with('status', 'Venue Updated successful!');
                }else{
                    return redirect()->back()->with('status', 'New Venue Created successful!');
                }
        }else{
            return redirect()->back()->with('error', 'Please upload a valid image');
        }
     
    }

    public function edit($id){
        $venue = Venue::find($id);
        return response()->json($venue);
    }

    public function destroy(Request $request){
        
        $speaker = Venue::find($request['id']);
        $speaker->delete();
        return response()->json(['success'=>'Venue Deleted Successfully!']);
    }
}