<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pincode;

class PincodeController extends Controller 
{
    public function __construct( Pincode $pincode)
    {
        $this->pincode = $pincode;
    }

    public function index(){
        $data['title'] = 'Product';
        $data['list']= $this->pincode->getAll();
        return view('admin.pincode.index',$data);
    }
    public function create_pincode(){
        $data['title']='Create Pincode';
        return view('admin.pincode.create',$data);
    }
    public function save(request $request){
        return $this->pincode->addNew($request); 
    }


    public function edit($id){
        $data['title']='Update Pincode';
        $data['list']= $this->pincode->detail($id);
        //print_r($data['list']);die;
        return view('admin.pincode.edit',$data);
    }

    public function update(request $request,$id){
        return $this->pincode->catupdate($request,$id);
    }

    //----=== Fetch to data ===----//
	public function fetchPincode(request $request)
	{
        $data['pin'] = pincode::where('status',$request->mypin)->get(["pincode","pinid"]);
        return response()->json($data);
	}

    public function delete($id){
        return $this->pincode->destroy1($id);
    }
}
