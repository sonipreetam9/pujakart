<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\http\controllers\Admin\CategoryController;
use App\http\controllers\Admin\SupercategoryController;
use App\http\controllers\Admin\SubcategoryController;

class Subcategory extends Model
{
    use HasFactory;
    public function getAll(){
        return Subcategory::all();
    }
    public function getsuperAll(){
        return Supercategory::All()->where('status','1');
    }

    public function addNew($request) 
    {
        $validate = Validator::make($request->all(), [
            'sid' => 'required',
            'cid' => 'required',
            'scname' => 'required',
        ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors());
        }
        else{

        $formula= new Subcategory();
        $formula->scname= $request->scname;
        $explode = explode(',', $request->sid);
        $formula->sid=  $explode[0];
        $formula->sname=  $explode[1];

        $explode1 = explode(',', $request->cid);
        $formula->cid=  $explode1[0];
        $formula->cname=  $explode1[1];

        //print_r($formula->scname);die;

        if($formula->save()){
            return back()->with('success','Sub Category added successfully');
        }
        else{
            return back()->with('error','Sub Category not added successfully');
        }
        }
    }

    public function detail($id){
        return Subcategory::find($id);
    }

    public function subupdate($request,$id){
        //print_r($request->cid);die;  
        $explode = explode(',', $request->sid);
        $sid=  $explode[0];
        $sname=  $explode[1];

        $explode1 = explode(',', $request->cid);
        $cid=  $explode1[0];
        $cname=  $explode1[1];
        
        Subcategory::where('id',$id)->update(['scname'=>$request->scname,'status'=>$request->status,'sid'=>$sid,'sname'=>$sname,'cid'=>$cid,'cname'=>$cname]);
        return back()->with('success','Sub Category Updated');
    }
     
    public function destroy1($id){
        Subcategory::where('id', $id)->delete();
        return back()->with('success','Sub Category Deleted');
    }
}
