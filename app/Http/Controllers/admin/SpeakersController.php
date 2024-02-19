<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speakers;
use Auth;
use App\User;
use Illuminate\Http\Request;
use DataTables;

class SpeakersController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Speakers::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" 
                            onclick="show_speaker('. $row->id.')"  class=" tbl_btn edit btn btn-success mr-10 
                            btn-sm"><i class="nav-icon fas fa fa-eye"></i>&nbsp Show </a>';
                    $btn = $btn .'<a href="javascript:void(0)" 
                           onclick="update_speaker(' . $row->id .' )"  class=" tbl_btn edit btn btn-primary mr-10 
                           btn-sm"><i class="nav-icon fas fa fa-edit"></i> Edit </a>';
                    $btn = $btn . '<a href="javascript:void(0)" 
                           onclick="delete_speaker(' . $row->id . ')" 
                           class="tbl_btn btn-danger btn-sm"> <i class="nav-icon fas fa fa-trash"></i>
                           Delete</a> ';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin/pages/speaker');
    }

    public function store(Request $request){
        $imageExtensions = ['jpg', 'jpeg', 'png'];
        $file = $request->image;
        $ext  = $request->image->extension();

        if(in_array($ext, $imageExtensions)){
            $image_validname =  str_replace(' ', '',$request->name);
            $imageName = $image_validname.'.'.$request->image->extension();
            $request->image->move(public_path('speaker_images'), $imageName);  
            Speakers::updateOrCreate([
                    'id' => $request->id
                ],
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'image' => $imageName,
                    'description' => 'loream ipsum',//$request->description,
                    'mobile' => $request->mobile,
                    'address' => $request->address,
                ]); 
                if($request->has('id')){
                    return redirect()->back()->with('status', 'Speaker Updated successful!');
                }else{
                    return redirect()->back()->with('status', 'New Speaker Created successful!');
                }
        }else{
            return redirect()->back()->with('error', 'Please upload a valid image');
        }
     
    }

    public function edit($id){
        $speaker = Speakers::find($id);
        return response()->json($speaker);
    }

    public function destroy(Request $request){
        
        $speaker = Speakers::find($request['id']);
        $speaker->delete();
        return response()->json(['success'=>'Speaker Deleted Successfully!']);
    }
}