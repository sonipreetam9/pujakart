<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use App\http\controllers\Admin\OfferimageController;
use File;

class Offerimage extends Model
{
    use HasFactory; 
    public function getAll(){
        return Offerimage::all();
    }
    public function getsuperAll(){
        return Offerimage::All()->where('status','1');
    }

    public function addNew($request) 
    {
        $validate = Validator::make($request->all(), [
            'link' => 'required',
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

            $formula= new Offerimage();
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
        return Offerimage::where('id',$id)->get();
    }

    public function getSubcat($id){
        return Offerimage::where('catid',$id)->get();
    }

    public function offerimgupdate($request,$id){
        if($request->itemimage==""){
            $itemimage = $request->oldimage;
        }
        else{
            //-- unlink image
            $image_path = public_path('offerImage/'.$request->oldimage);
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            //-- unlink close
            $fname = time().'.'.$request->itemimage->extension('jpg,png,jpeg');  
            $fileName =date('d-m-Y-H-i-s').$fname;
            $request->itemimage->move(public_path('offerImage'), $fileName);
            $itemimage= $fileName;
            $itemimage;
        }

        $link =  $request->link;

        Offerimage::where('id',$id)->update(['link'=>$request->link,'itemimage'=>$itemimage,'status'=>$request->status]);
        return back()->with('success','Offer Image Updated');
    }
     
    public function destroy1($id){
       // $image = Category::find($id);
        $image = Category::where('sid',$id)->get();
        $image_name = $image[0]->image;
        $image_path = public_path('categoryImage/'.$image_name);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        Offerimage::where('sid', $id)->delete();
        return back()->with('success','Sub Category Deleted'); 
    }
}
