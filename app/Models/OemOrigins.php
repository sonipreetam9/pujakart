<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\http\controllers\Admin\OemoriginsController;

class OemOrigins extends Model
{
    use HasFactory;
    public function getAll(){
        return OemOrigins::all();
    } 
    public function addNew($request)
    {
        $validate = Validator::make($request->all(), [
            'oem_origins' => 'required',
            
        ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors());
        }
        else
        {
            $formula= new OemOrigins();
            $formula->oem_origins= $request->oem_origins;
            if($formula->save()){
                return back()->with('success','Oem Origins added successfully');
            }
            else{
                return back()->with('error','Oem Origins not added successfully');
            }
        }
    }

    public function detail($id){
        return OemOrigins::find($id);
    }

    // public function edit_formula($id){
    //     return OemOrigins::find($id); 
    // }

    public function updateorigins($request,$id){
        OemOrigins::where('id',$id)->update(['oem_origins'=>$request->oem_origins,'status'=>$request->status]);
        return back()->with('success','Oem Origins Details Updated');
    }
     
    public function destroy1($id){
        OemOrigins::where('id', $id)->delete();
        return back()->with('success','Oem origins Deleted');
    }
}
