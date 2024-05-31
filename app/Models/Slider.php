<?php

namespace App\Models;
use Illuminate\Support\Facades\Validator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use File; 

class Slider extends Model
{
    use HasFactory;
    public function getAll(){
        return Slider::all();
    }
    public function addNew($request) 
    {
        if ($request->hasFile('itemimage')) {
          
            if ($request->file('itemimage')->isValid()) {
    
                $validate = Validator::make($request->all(), [
                    'itemimage' => 'required|mimes:jpeg,png,jpg',
                    
                ]);
                
                if($validate->fails()){
                    return back()->withErrors($validate->errors());
                }else{
       
                    $fname = time().'.'.$request->itemimage->extension();  
                    $fileName =date('d-m-Y-H-i-s').$fname;
                    $request->itemimage->move(public_path('sliderImage'), $fileName);
                    $itemimage= $fileName;
                    $itemimage;
        
                    $slider= new Slider();
                    $slider->image= $itemimage;
                    $slider->link= $request->link;
                    $slider->status= 1;
               
                    if($slider->save()){
                        return back()->with('success','Slider added successfully');
                    }
                  
                }
        
                }else{
        
                    return back()->with('error','Invalid Image, Please Upload Image');
                    
                }
            }
    }
    
    public function detail($id){
        return Slider::find($id);
    }
    
    public function slideupdate($request,$id){
        if($request->itemimage==""){
            $itemimage = $request->oldimage;
        }
        else{
            //-- unlink image
            $image_path = public_path('sliderImage/'.$request->oldimage);
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            //-- unlink close
            $fname = time().'.'.$request->itemimage->extension('jpg,png,jpeg');  
            $fileName =date('d-m-Y-H-i-s').$fname;
            $request->itemimage->move(public_path('sliderImage'), $fileName);
            $itemimage= $fileName;
            $itemimage;
        }
        //---Image close
        $status = $request->status;

        Slider::where('id',$id)->update(['image'=>$itemimage,'status'=>$request->status,'link'=>$request->link]);
        return back()->with('success','Slider Updated Successfully');
    }
    
    
    public function destroy1($id){
        //-- unlink image
        $image = Slider::find($id);
        $image_name = $image->image;
        $image_path = public_path('sliderImage/'.$image_name);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        //-- unlink image
        Slider::where('id', $id)->delete();
        return back()->with('success','Slider Deleted');
    }

}
