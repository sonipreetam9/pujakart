<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promocode;

class PromocodeController extends Controller
{
    public function __construct( Promocode $promocode )
    {
        $this->promocode = $promocode;
    }

    public function index(){
        $data['title'] = 'Promocode';
        // $data['list'] = Oemorigins::all();
        $data['list']= $this->promocode->getAll();
        return view('admin.promocode.index',$data);
    }
    public function create_promocode(){
        $data['title']='Create Promocode';
        $data['list']= $this->promocode->getsuperAll();
        return view('admin.promocode.create',$data);
    }
    public function save(request $request){
        return $this->promocode->addNew($request); 
    }

    public function edit($id){
        $data['title']='Update Promocode';
        $data['list']= $this->promocode->detail($id);
        return view('admin.promocode.edit',$data);
    }

    public function update(request $request,$id){
        return $this->promocode->promoupdate($request,$id);
    }

    public function delete($id){
        return $this->promocode->destroy1($id);
    }
}
