<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bookcategory;

class BookcategoryController extends Controller
{
    public function __construct(Bookcategory $bookcat )
    {
        $this->bookcat = $bookcat;
    }

    public function index(){
        $data['title'] = 'Book Category';
        $data['list']= $this->bookcat->getAll();
        // return $data['list'];
        return view('admin.bookcategory.index',$data);
    }
    public function create_bookcategory(){
        $data['title']='Create Book category';
        $data['list']= $this->bookcat->getCategory();
        return view('admin.bookcategory.create',$data);
    }
    public function save(request $request){
        return $this->bookcat->addNew($request); 
    }


    public function edit($id){
        $data['title']='Update Category';
        $data['list']= $this->bookcat->detail($id);
        $data['cat']= $this->bookcat->getCategory();
        return view('admin.bookcategory.edit',$data);
    }

    public function update(request $request,$id){
        return $this->bookcat->catupdate($request,$id);
    }

    public function delete($id){
        return $this->bookcat->destroy1($id);
    }
    
    //position change
    public function positionchangeBookcat(request $request){
        // return "Yes";
        $ps = $request->p;
        $i=1;
        foreach($ps as $prow){
            Bookcategory::where('id',$prow)->update(['position'=>$i]);
            $i++;
        }
        return back()->with('success','Position Updated');
    }
    public function hideunhide(request $request){
        return $this->bookcat->changeHide($request);
    }
    
}
