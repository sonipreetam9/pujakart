<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\http\controllers\Admin\CategoryController;
use App\http\controllers\Admin\SupercategoryController;
use File;

class Category extends Model
{
    use HasFactory;
    public function getAll(){
        return Category::all();
    }

    public function getsuperAll(){
        return Supercategory::All()->where('status','1');
    }

    public function getCategory(){
        return Category::All()->where('status','1');
    }

    public function addNew($request) 
    {
        $validate = Validator::make($request->all(), [
            'subcat_name' => 'required',
            'catid' => 'required',
            'itemimage' => 'required|mimes:jpeg,png,jpg',
        ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors());
        }
        else{
            $fname = time().'.'.$request->itemimage->extension();  
            $fileName = date('d-m-Y-H-i-s').$fname;
            $request->itemimage->move(public_path('categoryImage'), $fileName);
            $itemimage = $fileName;
            $itemimage;

            $formula= new Category();
            $formula->image = $itemimage;
            $formula->subcat_name= $request->subcat_name;
            $explode = explode(',', $request->catid);
            $formula->catid=  $explode[0];
            $formula->super_cat=  $explode[1];

            if($formula->save()){
                return back()->with('success','Sub Category added successfully');
            }
            else{
                return back()->with('error','Sub Category not added successfully');
            }
        }
    }

    public function detail($id){
        //return Category::find($id); 
        return Category::where('sid',$id)->get();
    }

    public function getSubcat($id){
        return Category::where('catid',$id)->get();
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

        $explode = explode(',', $request->catid);
        $catid=  $explode[0];
        $super_cat=  $explode[1];
        Category::where('sid',$id)->update(['subcat_name'=>$request->subcat_name,'image'=>$itemimage,'status'=>$request->status,'catid'=>$catid,'super_cat'=>$super_cat]);
        return back()->with('success','Sub Category Updated');
    }
     
    public function destroy1($id){
       // $image = Category::find($id);
        $image = Category::where('sid',$id)->get();
        $image_name = $image[0]->image;
        $image_path = public_path('categoryImage/'.$image_name);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        Category::where('sid', $id)->delete();
        return back()->with('success','Sub Category Deleted'); 
    }
}
