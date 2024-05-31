<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct( Category $category )
    {
        $this->category = $category;
    }

    public function index(){
        $data['title'] = 'Category';
        // $data['list'] = Oemorigins::all();
        $data['list']= $this->category->getAll();
        return view('admin.category.index',$data);
    }
    public function create_category(){
        $data['title']='Create Category';
        $data['list']= $this->category->getsuperAll();
        $data['cat']= $this->category->getCategory();
        return view('admin.category.create',$data);
    }
    public function save(request $request){
        return $this->category->addNew($request); 
    }


    public function edit($id){
        $data['title']='Update Category';
        $data['list']= $this->category->detail($id);
        $data['catlist']= $this->category->getsuperAll();
        return view('admin.category.edit',$data);
    }

    public function update(request $request,$id){
        return $this->category->catupdate($request,$id);
    }

    public function delete($id){
        return $this->category->destroy1($id);
    }
}
