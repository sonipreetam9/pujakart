<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Pincode;

class SubcategoryController extends Controller
{
    public function __construct( Subcategory $subCategory )
    {
        $this->subCategory = $subCategory;
    }

    public function index(){
        $data['title'] = 'Category';
        // $data['list'] = Oemorigins::all();
        $data['list']= $this->subCategory->getAll();
        return view('admin.subcategory.index',$data);
    }
    public function create_subcategory(){
        $data['title']='Create Sub Category';
        $data['list']= $this->subCategory->getsuperAll();
        return view('admin.subcategory.create',$data);
    }
    public function save(request $request){
        return $this->subCategory->addNew($request); 
    }

    //----=== Fetch to data ===----//
	function fetchCat(request $request)
	{
        $data['subcat'] = category::where("catid",$request->myvar)->get(["subcat_name", "sid"]);
        return response()->json($data);
	}

    
    public function edit($id){
        $data['title']='Update Sub Category';
        $data['list']= $this->subCategory->detail($id);
        $data['catlist']= $this->subCategory->getsuperAll();
        return view('admin.subcategory.edit',$data);
    }

    public function update(request $request,$id){
        return $this->subCategory->subupdate($request,$id);
    }

    public function delete($id){
        return $this->subCategory->destroy1($id);
    }

}
