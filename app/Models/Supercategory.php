<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\http\controllers\Admin\SupercategoryController;
use File; 

class Supercategory extends Model
{
    use HasFactory; 
    public function getAll(){
        return Supercategory::all();
    }

    public function addNew($request)
    {
        $validate = Validator::make($request->all(), [
            'cat_name' => 'required',
            'itemimage' => 'required|mimes:jpeg,png,jpg',
        ]); 
        if($validate->fails()){
            return back()->withErrors($validate->errors());
        }
        else
        {
            $fname = time().'.'.$request->itemimage->extension();  
            $fileName =date('d-m-Y-H-i-s').$fname;
            $request->itemimage->move(public_path('categoryImage'), $fileName);
            $itemimage= $fileName;
            $itemimage;

            $maincat= new Supercategory();
            $maincat->image= $itemimage;
            $maincat->cat_name= $request->cat_name;
            if($maincat->save()){
                return back()->with('success','Main category added successfully');
            }
            else{
                return back()->with('error','Main category not added successfully');
            }
        }
    }

    public function detail($id){
        //return Supercategory::find($id);
        return Supercategory::where('cid',$id)->get();
    }

    public function catupdate($request,$id){
        if($request->itemimage==""){
            $itemimage = $request->oldimage;
        }
        else{
            //-- unlink image
            $image_path = public_path('categoryImage/'.$request->oldimage);
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            //-- unlink close
            $fname = time().'.'.$request->itemimage->extension('jpg,png,jpeg');  
            $fileName =date('d-m-Y-H-i-s').$fname;
            $request->itemimage->move(public_path('categoryImage'), $fileName);
            $itemimage= $fileName;
            $itemimage;
        }
        Supercategory::where('cid',$id)->update(['cat_name'=>$request->cat_name,'image'=>$itemimage,'status'=>$request->status]);
        return back()->with('success','Main Category Updated');
    }
     
    public function destroy1($id){
        $image = Supercategory::where('cid',$id)->get();
        $image_name = $image[0]->image;
        $image_path = public_path('categoryImage/'.$image_name);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        Supercategory::where('cid', $id)->delete();
        return back()->with('success','Main Category Deleted');
    }
}
