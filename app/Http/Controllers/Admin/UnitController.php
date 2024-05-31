<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    public function __construct( Unit $unit)
    {
        $this->unit = $unit;
    }

    public function index(){
        $data['title'] = 'Product';
        $data['list']= $this->unit->getAll();
        return view('admin.unit.index',$data);
    }
    public function create_unit(){
        $data['title']='Create Unit';
        return view('admin.unit.create',$data);
    }
    
    public function save(request $request){
        return $this->unit->addNew($request); 
    }

    public function edit($id){
        $data['title']='Update Unit';
        $data['list']= $this->unit->detail($id);
        return view('admin.unit.edit',$data);
    }

    public function update(request $request,$id){
        return $this->unit->unitupdate($request,$id);
    }

    public function delete($id){
        return $this->unit->destroy1($id);
    }
}
