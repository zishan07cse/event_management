<?php
  
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Models\Gallery;
use DataTables;
class GalleriesController extends Controller
{
   
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Gallery::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" 
                            onclick="show_gallery('. $row->id.')"  class=" tbl_btn edit btn btn-success mr-10 
                            btn-sm"><i class="nav-icon fas fa fa-eye"></i>&nbsp Show </a>';
                    $btn = $btn .'<a href="javascript:void(0)" 
                           onclick="update_gallery(' . $row->id .' )"  class=" tbl_btn edit btn btn-primary mr-10 
                           btn-sm"><i class="nav-icon fas fa fa-edit"></i> Edit </a>';
                    $btn = $btn . '<a href="javascript:void(0)" 
                           onclick="delete_gallery(' . $row->id . ')" 
                           class="tbl_btn btn-danger btn-sm"> <i class="nav-icon fas fa fa-trash"></i>
                           Delete</a> ';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin/pages/gallery');
    }

    public function store(Request $request){
        $imageExtensions = ['jpg', 'jpeg', 'png'];
        $file = $request->image;
        $ext  = $request->image->extension();

        if(in_array($ext, $imageExtensions)){
            $image_validname =  str_replace(' ', '',$request->name);
            $imageName = $image_validname.'.'.$request->image->extension();
            $request->image->move(public_path('gallery_image'), $imageName);  
            Gallery::updateOrCreate([
                    'id' => $request->id
                ],
                [
                    'image_name' => $request->name,
                    'image_path' => $imageName,
                ]); 
                if($request->has('id')){
                    return redirect()->back()->with('status', 'Image Updated successful!');
                }else{
                    return redirect()->back()->with('status', 'New Image Created successful!');
                }
        }else{
            return redirect()->back()->with('error', 'Please upload a valid image');
        }
     
    }

    public function edit($id){
        $speaker = Gallery::find($id);
        return response()->json($speaker);
    }

    public function destroy(Request $request){
        
        $speaker = Gallery::find($request['id']);
        $speaker->delete();
        return response()->json(['success'=>'Gallery Image Deleted Successfully!']);
    }
  
   
}