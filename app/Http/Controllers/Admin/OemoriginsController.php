<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OemOrigins;

class OemoriginsController extends Controller
{
    public function __construct( OemOrigins $oemOrigins )
    {
        $this->oemOrigins = $oemOrigins;
    }

    public function index(){
        $data['title'] = 'OEM Brands';
        // $data['list'] = Oemorigins::all();
        $data['list']= $this->oemOrigins->getAll();
        return view('admin.oemorigins.index',$data);
    }
    public function create_origins(){
        $data['title']='Create Origins';
        return view('admin.oemorigins.create',$data);
    }
    public function save(request $request){
        return $this->oemOrigins->addNew($request);
    }


    public function edit($id){
        $data['title']='Edit Origins';
        $data['list']= $this->oemOrigins->detail($id);
        return view('admin.oemorigins.edit',$data);
    }

    public function update(request $request,$id){

        return $this->oemOrigins->updateorigins($request,$id);
    }

    public function delete($id){
        return $this->oemOrigins->destroy1($id);
    }
}
