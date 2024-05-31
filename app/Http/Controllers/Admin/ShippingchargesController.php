<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingCharges;

class ShippingchargesController extends Controller
{
    public function __construct(ShippingCharges $shipping )
    {
        $this->shipping = $shipping;
    }

    public function index(){
        $data['title'] = 'Shipping Charges';
        //$data['list'] = array();
        $data['list']= $this->shipping->getAll();
        return view('admin.shippingcharges.index',$data);
    }
    public function create_charges(){
        $data['title'] = 'Create Charges';
        return view('admin.shippingcharges.create',$data);
    }
    public function save(request $request){
        return $this->shipping->addNew($request);
    }
    
    
    public function edit($id){
        $data['title']='Update Charges';
        $data['list']= $this->shipping->detail($id);
        //print_r($data['list']);die;
        return view('admin.shippingcharges.edit',$data);
    }
    public function update(request $request,$id){
        return $this->shipping->shipupdate($request,$id);
    }
    public function delete($id){
        return $this->shipping->destroy1($id);
    }
    
    
}
