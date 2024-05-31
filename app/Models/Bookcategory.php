<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\http\controllers\Admin\BooksController;
use App\http\controllers\Admin\BookcategoryController;
use Illuminate\Support\Str;
use File;


class Bookcategory extends Model
{
    use HasFactory; 
    public function getAll(){
        return Bookcategory::orderBy("position","asc")->get();   
    }

    public function getCategory(){
        return Bookcategory::All()->where('status','1');
    }

    public function addNew($request) 
    {
        $validate = Validator::make($request->all(), [
            'bookname' => 'required',
            'itemimage' => 'required|mimes:jpeg,png,jpg',
        ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors());
        }
        else{
            $fname = time().'.'.$request->itemimage->extension();  
            $fileName = date('d-m-Y-H-i-s').$fname;
            $request->itemimage->move(public_path('bookImage'), $fileName);
            $itemimage = $fileName;
            $itemimage;

            
            $slug = Str::slug($request->bookname);

            $formula= new Bookcategory();
            $formula->image = $itemimage;
            $formula->bookname= $request->bookname; 
            $formula->cslug = $slug;

            if($formula->save()){
                return back()->with('success','Book Category added successfully');
            }
            else{
                return back()->with('error','Book Category not added successfully');
            }
        }
    }

    public function detail($id){
        //return Category::find($id); 
        return Bookcategory::where('id',$id)->get();
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
            $image_path = public_path('bookImage/'.$request->oldimage);
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            //-- unlink close
            $fname = time().'.'.$request->itemimage->extension('jpg,png,jpeg');  
            $fileName =date('d-m-Y-H-i-s').$fname;
            $request->itemimage->move(public_path('bookImage'), $fileName);
            $itemimage= $fileName;
            $itemimage;
        }
        $slug = Str::slug($request->bookname);

        Bookcategory::where('id',$id)->update(['bookname'=>$request->bookname,'cslug'=>$slug,'image'=>$itemimage,'status'=>$request->status]);
        return back()->with('success','Book Category Updated Successfully');
    }
     
    public function destroy1($id){
       // $image = Category::find($id);
        $image = Bookcategory::where('id',$id)->get();
        $image_name = $image[0]->image;
        $image_path = public_path('bookImage/'.$image_name);
        if(File::exists($image_path)) { 
            File::delete($image_path);
        }

        Bookcategory::where('id', $id)->delete();
        return back()->with('success','Book Category Deleted'); 
    }
    
    public function changeHide($request){ 
        $status = $request->status;
        return Bookcategory::where('id',$request->catid)->update(['status'=>$status]);
        // return back()->with('success','Book Category Updated'); 
    }
    
}
