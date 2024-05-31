<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\http\controllers\Admin\ShippingchargesController;

class ShippingCharges extends Model
{
    use HasFactory;
    public function getAll(){
        return Shippingcharges::all();
    }

    public function detail($id){
        return Shippingcharges::where('ship_id',$id)->get();
    }
    
    public function addNew($request){
        $validate = Validator::make($request->all(), [
            'shipping_min_amount' => 'required',
            'charges' => 'required',
        ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors());
        }
        else{
            $ship= new Shippingcharges();
            $ship->shipping_min_amount= $request->shipping_min_amount; 
            $ship->charges= $request->charges;

            if($ship->save()){
                return back()->with('success','Shipping Charges Added');
            }
            else{
                return back()->with('error','Shipping Charges Not Added');
            }
        }
    }
    
    public function shipupdate($request,$id){
        Shippingcharges::where('ship_id',$id)->update(['shipping_min_amount'=>$request->shipping_min_amount,'charges'=>$request->charges]);
        return back()->with('success','Shipping Charges Updated');
    }
    
    public function destroy1($id){
        Shippingcharges::where('ship_id', $id)->delete();
        return back()->with('success','Shipping Charges Deleted');
    }
    
    
    
}
