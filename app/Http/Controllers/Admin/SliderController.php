<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;

class SliderController extends Controller
{
    public function __construct( Slider $slider )
    {
        $this->slider = $slider;
    }
    public function index(){
        $data['title'] = 'Slider';
        $list= $this->slider->getAll();
        // return $data['list'][0]->link;
        foreach ($list as $key=>$val){
            $cc = Category::where('cslug',$val->link)->first();  
            $list[$key]->cname = $cc->cname;
        }
        $data['list'] = $list;
        
        return view('admin.slider.index',$data);
    }
    public function create_slider(){
        $data['title'] = 'Create Slider';
        $data['cat'] = Category::where('status','1')->get();
        return view('admin.slider.create',$data);
    }
    public function save(request $request){
        return $this->slider->addNew($request); 
    }
    public function edit($id){
        $data['title']='Update Slider';
        $data['cat'] = Category::where('status','1')->get();
        $data['list']= $this->slider->detail($id);
        return view('admin.slider.edit',$data);
    }
    public function update(request $request,$id){
        return $this->slider->slideupdate($request,$id);
    }
    
    public function delete($id){
        return $this->slider->destroy1($id);
    }
}
