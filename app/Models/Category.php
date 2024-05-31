<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\http\controllers\Admin\CategoryController;
use App\http\controllers\Admin\SupercategoryController;
use Illuminate\Support\Str;
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
    
    public function getmaincatAll(){
        return Category::where('is_parent','0')
        ->orderBy("position","asc")->get();
    }
    
    public function getchildcatAll($id){
        return Category::All()->where('is_parent',$id);
    }
    
    public function getParentCat($id){
        return Category::All()->where('sid',$id);
    }
    public function getOnlychild(){
        return Category::where('is_parent','!=','0')->orderBy("position","asc")->get();
    }
     public function changeHide($request){
        $status = $request->status;
        return Category::where('sid',$request->catid)->update(['status'=>$status]);
    }
    
    //-- Close
    

    public function addNew($request) 
    {
        $validate = Validator::make($request->all(), [
            'cname' => 'required',
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
            $slug = Str::slug($request->cname);
            
            $ccat = Category::where('cslug',$slug)->first();
            
            if(!empty($ccat)){
                $ss= rand(000,999);
                $cslug = $slug.$ss;
                
            }else{
                $cslug = $slug;
            }
            

            $formula= new Category();
            $formula->image = $itemimage;
            $formula->cname= $request->cname; 
            $formula->cslug = $cslug;
            $formula->is_parent= $request->is_parent;
            $formula->head= $request->head;

            if($formula->save()){
                return back()->with('success','Category added successfully');
            }
            else{
                return back()->with('error','Category not added successfully');
            }
        }
    }
    
    public function addNewChild($request) 
    {
        $validate = Validator::make($request->all(), [
            'cname' => 'required',
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
            
            $slug = Str::slug($request->cname);
            
            $ccat = Category::where('cslug',$slug)->first();
            if(!empty($ccat)){
                $ss= rand(000,999);
                $cslug = $slug.$ss;
            }
            else{
                $cslug = $slug;
            }

            $child= new Category();
            $child->image = $itemimage;
            $child->cname= $request->cname; 
            $child->cslug = $cslug;
            $child->is_parent= $request->is_parent;

            if($child->save()){
                return back()->with('success','Child Category added successfully');
            }
            else{
                return back()->with('error','Child Category not added successfully');
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
        $slug = Str::slug($request->cname);
        $ccat = Category::where('cslug',$slug)->first();
            
        if(!empty($ccat)){
            $ss= rand(000,999);
            $cslug = $slug.$ss;
                
        }else{
            $cslug = $slug;
        }

        Category::where('sid',$id)->update(['cname'=>$request->cname,'cslug'=>$cslug,'image'=>$itemimage,'status'=>$request->status,'is_parent'=>$request->is_parent,'head'=>$request->head]);
        return back()->with('success','Category Updated Successfully');
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
    
    //-- Child cat update
    public function childCatupdate($request,$id){
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
        $slug = Str::slug($request->cname);

        Category::where('sid',$id)->update(['cname'=>$request->cname,'cslug'=>$slug,'image'=>$itemimage,'status'=>$request->status,'is_parent'=>$request->is_parent]);
        return back()->with('success','Category Updated Successfully');
    }
}




