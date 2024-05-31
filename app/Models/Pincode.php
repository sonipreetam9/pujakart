<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Pincode extends Model
{
    use HasFactory;
    public function getAll(){
        return Pincode::all();
    }

    public function getpincodeAll(){
        return Pincode::where('status','1')->get(['pincode']);
    }

    public function addNew($request) 
    {
        $validate = Validator::make($request->all(), [
            'pincode' => 'required',
        ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors());
        }
        else{
            $pincode= new Pincode();
            $pincode->pincode= $request->pincode;
            if($pincode->save()){
                return back()->with('success','Pincode added successfully');
            }
            else{
                return back()->with('error','Pincode not added successfully');
            }
        }
    }

    public function detail($id){
        //print_r($id);die;
        return Pincode::where('pinid', $id)->get();
    }

    public function catupdate($request,$id){
        Pincode::where('pinid',$id)->update(['pincode'=>$request->pincode,'status'=>$request->status]);
        return back()->with('success','Pincode Updated');
    }

    public function destroy1($id){
        Pincode::where('pinid', $id)->delete();
        return back()->with('success','Pincode Deleted');
    }
}
