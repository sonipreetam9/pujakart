<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory; 
    
    public function getshipAll(){
       return Setting::Where('id','1')
            ->orwhere('id','2')
            ->orwhere('id','3')
            ->orwhere('id','4')
            ->get();
    } 
    public function getminOrder(){
       return Setting::Where('id','5')
            ->get();
    }
    
    //--support start
    public function getSupport(){
       return Setting::Where('id','6')
            ->orwhere('id','7')
            ->get();
    } 
    public function getsupportData($id){
        return Setting::Where('id',$id)->get();
    }
    public function supportupdate($request,$id){
        Setting::Where('id',$id)->update(['option_value'=>$request->option_value]);
        return back()->with('success','Support Updated Successfully');
    }
    //--support close
    
    public function getreturnAll(){
       return Setting::Where('id','2')->get();
    }
    
    public function getData($id){
        return Setting::Where('id',$id)->get();
    }
    
    public function conditionUpdate($request,$id){
        Setting::Where('id',$id)->update(['option_value'=>$request->option_value]);
        return back()->with('success','Condition Updated Successfully');
    }
    //-- min order start
    public function getminData(){
       return Setting::Where('id','5')->get();
    }
    public function minUpdate($request,$id){
        Setting::Where('id',$id)->update(['option_value'=>$request->option_value]);
        return back()->with('success','Minimum Order Updated Successfully');
    }
    
    //--Return returnExchangeUpdate
    public function returnExchangeUpdate($request,$id){
        Setting::Where('id',$id)->update(['option_value'=>$request->option_value]);
        return back()->with('success','Updated Successfully');
    }
    
    
    
}






 