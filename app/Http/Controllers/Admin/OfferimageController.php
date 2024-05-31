<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offerimage;
use App\Models\Category;


class OfferimageController extends Controller
{
    public function __construct( Offerimage $offerimage )
    {
        $this->offer = $offerimage;
    } 

    public function index(){ 
        $data['title'] = 'Offer Image';
        // $data['list']= $this->offer->getAll();
        $list= $this->offer->getAll();
        // return $data['list'][0]->link;
        foreach ($list as $key=>$val){
            $cc = Category::where('cslug',$val->link)->first();  
            $list[$key]->cname = $cc->cname;
        }
        $data['list'] = $list;
        
        
        return view('admin.offerimage.index',$data);
    }

    public function create_offerimage(){
        $data['title']='Create Category';
        $data['list']= $this->offer->getsuperAll();
        return view('admin.offerimage.create',$data);
    }
    public function save(request $request){
        return $this->offer->addNew($request); 
    }


    public function edit($id){
        $data['title']='Update Offer Image';
        $data['cat'] = Category::where('status','1')->get();
        //return($data['cat']);
        $data['list']= $this->offer->detail($id);
        return view('admin.offerimage.edit',$data);
    }

    public function update(request $request,$id){
        return $this->offer->offerimgupdate($request,$id);
    }

    public function delete($id){
        return $this->offer->destroy1($id);
    }
}
