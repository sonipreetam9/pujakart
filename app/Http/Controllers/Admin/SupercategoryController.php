<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supercategory;

class SupercategoryController extends Controller
{
    public function __construct( Supercategory $supcategory )
    {
        $this->supcategory = $supcategory;
    }

    public function index(){
        $data['title'] = 'Category';
        $data['list']= $this->supcategory->getAll();
        return view('admin.supercategory.index',$data);
    }

    public function create_super_category(){
        $data['title']='Create Category';
        return view('admin.supercategory.create',$data);
    }

    public function save(request $request){
        return $this->supcategory->addNew($request);
    }

    public function edit($id){
        $data['title']='Update Category';
        $data['list']= $this->supcategory->detail($id);
        return view('admin.supercategory.edit',$data);
    }

    public function update(request $request,$id){
        return $this->supcategory->catupdate($request,$id);
    }

    public function delete($id){
        return $this->supcategory->destroy1($id);
    }
}
