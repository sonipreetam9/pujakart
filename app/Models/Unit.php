<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Unit extends Model
{
    use HasFactory; 
    public function getAll(){
        return Unit::all();
    }

    public function getpincodeAll(){
        return Unit::where('status','1')->get(['pincode']);
    }

    public function addNew($request) 
    {
        $validate = Validator::make($request->all(), [
            'unit_name' => 'required',
        ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors());
        }
        else{
            $unit= new Unit();
            $unit->unit_name= $request->unit_name;
            if($unit->save()){
                return back()->with('success','Unit added successfully');
            }
            else{
                return back()->with('error','Unit not added successfully');
            }
        }
    }

    public function detail($id){
        //print_r($id);die;
        return Unit::where('uid', $id)->get();
    }

    public function unitupdate($request,$id){
        Unit::where('uid',$id)->update(['unit_name'=>$request->unit_name,'status'=>$request->status]);
        return back()->with('success','Unit Updated');
    }

    public function destroy1($id){
        Unit::where('uid', $id)->delete();
        return back()->with('success','Unit Deleted');
    }
}
