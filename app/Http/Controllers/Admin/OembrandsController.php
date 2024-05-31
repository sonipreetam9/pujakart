<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\OembrandsService;

class OembrandsController extends Controller 
{
    protected $oembrandsService;
    public function __construct(OembrandsService $oembrandsService)
    {
        $this->oembrandsService= $oembrandsService;
    }

    public function index(){
        $data['title'] = 'Brands';
        $data['list']= $this->oembrandsService->getAll();
        return view('admin.oembrands.index',$data);
    }
    public function create_oembrands(){
        $data['title']='Create Brands';
        return view('admin.oembrands.create',$data);
    }
    public function save(request $request){
        return $this->oembrandsService->addNew($request);
    }

    public function edit($id){
        $data['title']='Edit Brands';
        $data['list']= $this->oembrandsService->detail($id);
        return view('admin.oembrands.edit',$data);
    }
    public function update(request $request,$id){

        return $this->oembrandsService->update($request,$id);

    }
    public function delete($id){
        return $this->oembrandsService->destroy($id);
    }

}
