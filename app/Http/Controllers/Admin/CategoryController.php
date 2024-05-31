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
    
    public function main_category(){
        $data['title'] = 'View Category';
        // $data['list'] = Oemorigins::all();
        $data['list']= $this->category->getmaincatAll();
        return view('admin.category.maincategory',$data);
    }
    
    public function child_category($id){
        $data['title'] = 'View Category';
        // $data['list'] = Oemorigins::all();
        $data['list']= $this->category->getchildcatAll($id);
        $data['catname']= $this->category->getParentCat($id);
        //return $data['catname'];
        $data['child_id'] = $id;
        return view('admin.category.childcategory',$data);
    }
    
    public function createchild($id){
        //return $id;
        $data['title']='Create Sub Category';
        $data['child_id'] = $id;
        return view('admin.category.create_child',$data);
    }
    public function childcatsave(request $request){
        return $this->category->addNewChild($request); 
    }
    public function child_edit($id){
        $data['title']='Update Category';
        $data['list']= $this->category->detail($id);
        //return $data['list'];
        return view('admin.category.childedit',$data);
    }
    public function child_update(request $request,$id){
        return $this->category->childCatupdate($request,$id);
    }
    
    public function viewparent(){
        $data['title'] = 'View Category';
        // $data['list'] = Oemorigins::all();
        $data['list']= $this->category->getmaincatAll();
        return view('admin.category.viewparent',$data);
    }
    
    public function viewchild(){
        $data['title'] = 'View Category';
        $data['list']= $this->category->getOnlychild();
        return view('admin.category.viewchild',$data);
    }
    public function hideunhide(request $request){
        return $this->category->changeHide($request);
    }
    //--- Close ----//
    
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
        $data['cat']= $this->category->getCategory();
        return view('admin.category.edit',$data);
    }

    public function update(request $request,$id){
        return $this->category->catupdate($request,$id);
    }

    public function delete($id){
        return $this->category->destroy1($id);
    }
    
     public function positionchangeCat(request $request){
        // return "Yes";
        $ps = $request->p;
        $i=1;
        foreach($ps as $prow){
            Category::where('sid',$prow)->update(['position'=>$i]);
            $i++;
        }
        return back()->with('success','Position Updated');
    }
    
}


