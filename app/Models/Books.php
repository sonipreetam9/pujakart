<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\http\controllers\Admin\BooksController;
use App\http\controllers\Admin\BookcategoryController;
use Illuminate\Support\Str;
use File;

class Books extends Model
{
    use HasFactory; 
    public function getAll(){
        return Books::all();
    }

    public function getCategory(){ 
        return Bookcategory::All()->where('status','1');
    }

    public function addNew($request) 
    {
        $validate = Validator::make($request->all(), [
            'book_name' => 'required',
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

             //--start pdf file
             if($request->bookpdf==""){
                $itempdf = "";
            }
            else{
                $bookpdf = time().'.'.$request->bookpdf->extension('pdf');  
                $fileNamepdf = date('d-m-Y-H-i-s').$bookpdf;
                $request->bookpdf->move(public_path('bookImage'), $fileNamepdf);
                $itempdf = $fileNamepdf;
                $itempdf;
            }
            //--close pdf file

            $bcname = $request->bcname;
            $explode = explode(',', $bcname);
            $cid=  $explode[0];
            $cname=  $explode[1];

            
            $slug = Str::slug($request->book_name);

            $formula= new Books();
            $formula->bookimage = $itemimage;
            $formula->pdfbook = $itempdf;
            $formula->book_name= $request->book_name; 
            $formula->bcname = $cname;
            $formula->bcid = $cid;
            $formula->bslug = $slug;
            $formula->book_detail= $request->book_detail;

            if($formula->save()){
                return back()->with('success','Book added successfully');
            }
            else{
                return back()->with('error','Book not added successfully');
            }
        }
    }

    public function detail($id){
        //return Category::find($id); 
        return Books::where('bid',$id)->get();
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
        //---Image close

        //--pdf file
        if($request->bookpdf!=""){
            $image_path1 = public_path('bookImage/'.$request->oldpdf);
            if(File::exists($image_path1)) {
                File::delete($image_path1);
            }
            $pdfname = time().'.'.$request->bookpdf->extension();  
            $fileNamepdf = date('d-m-Y-H-i-s').$pdfname;
            $request->bookpdf->move(public_path('bookImage'), $fileNamepdf);
            $bookpdf = $fileNamepdf;
            $bookpdf;
        }
        else{
            $bookpdf = $request->oldpdf;
        }
        //--pdf file
        $slug = Str::slug($request->book_name);
        $bcname = $request->bcname;
        $explode = explode(',', $bcname);
        $bcid=  $explode[0];
        $bcname=  $explode[1];

        Books::where('bid',$id)->update(['book_name'=>$request->book_name,'bslug'=>$slug,'pdfbook'=>$bookpdf,'bookimage'=>$itemimage,'status'=>$request->status,'bcname'=>$bcname,'bcid'=>$bcid,'book_detail'=>$request->book_detail]);
        return back()->with('success','Books Updated Successfully');
    }
     
    public function destroy1($id){
        // $image = Category::find($id);
        $image = Books::where('bid',$id)->get();
        $image_name = $image[0]->bookimage;
        $image_path = public_path('bookImage/'.$image_name);
        if(File::exists($image_path)) {
            File::delete($image_path); 
        }
        $pdf = $image[0]->pdfbook;
        $image_path1 = public_path('bookImage/'.$pdf);
        if(File::exists($image_path1)) {
            File::delete($image_path1); 
        }

        Books::where('bid', $id)->delete();
        return back()->with('success','Books Deleted'); 
    }
}
