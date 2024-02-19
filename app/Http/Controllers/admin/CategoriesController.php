<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Auth;
use App\User;
use Illuminate\Http\Request;
use DataTables;

class CategoriesController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Categories::select('*');
            return Datatables::of($data)
            //->addColumn('status', function ($record) {
            //   if(status==1){
                
            //   }
    
            //     return '<label class="el-switch">
            //                 <input type="checkbox"  name="switch"  
            //                 data-id="' . $record->id . '" ' .  . '>
            //                 <span class="el-switch-style"></span>
            //             </label>';
            // })
          //  ->rawColumns(['action'])
           // ->make(true);   
            ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" 
                            onclick="show_category('. $row->id.')"  class=" tbl_btn  btn btn-success mr-10 
                            btn-sm"><i class="nav-icon fas fa fa-eye"></i> </a>';
                    $btn = $btn .'<a href="javascript:void(0)" 
                           onclick="update_category(' . $row->id .' )"  class=" tbl_btn  btn btn-primary mr-10 
                           btn-sm"><i class="nav-icon fas fa fa-edit "></i> </a>';
                    $btn = $btn .'<a href="javascript:void(0)" 
                    onclick="update_category(' . $row->id .' )"  class=" tbl_btn edit btn btn-danger mr-10 
                    btn-sm"><i class="nav-icon fas fa fa-trash fa_table_icon"></i> </a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin/pages/category');
    }

    public function store(Request $request){
        Categories::updateOrCreate([
            'id' => $request->id
        ],
        [
            'name' => $request->name,
            'note' => $request->note,
            
        ]); 
        if($request->has('id')){
            return redirect()->back()->with('status', 'Category Updated successful!');
        }else{
            return redirect()->back()->with('status', 'New Category Created successful!');
        }
    }

    public function edit($id){
        $category = Categories::find($id);
        return response()->json($category);
    }

    public function destroy(Request $request){
        
        $category_item = Categories::find($request['id']);
        $category_item->delete();
        return response()->json(['success'=>'Category Deleted Successfully!']);
    }
}