<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Promocode extends Model
{
    use HasFactory;
    public function getAll(){
        return Promocode::all();
    }
    public function getsuperAll(){
        return Promocode::All()->where('status','1');
    }

    public function addNew($request) 
    {
        $validate = Validator::make($request->all(), [
            'promocode' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors());
        }
        else{

            $addpromo = new Promocode();
            $addpromo->promocode = $request->promocode;
            $addpromo->message = $request->message;
            if($request->start_date <= $request->end_date)
            {
            $addpromo->start_date = $request->start_date;
            $addpromo->end_date = $request->end_date;
            }else{
                return back()->with('danger','Start date less then or equal to end date');
            }
            $addpromo->no_of_user = $request->no_of_user;
            $addpromo->min_amount = $request->min_amount;
            $addpromo->discount = $request->discount;
            $addpromo->discount_type = $request->discount_type;
            $addpromo->max_dis_amount = $request->max_dis_amount;
            $addpromo->repeat_usage = $request->repeat_usage;
            $addpromo->no_of_repeat_usage = $request->no_of_repeat_usage;
            $addpromo->status = $request->status;

            if($addpromo->save()){
                return back()->with('success','Promocode added successfully');
            }
            else{
                return back()->with('error','Promocode not added successfully');
            }
        }
    }

    public function detail($id){
        //return Category::find($id); 
        return Promocode::where('pcid',$id)->get();
    }

    public function promoupdate($request,$id){

        $promocode = $request->promocode;
        $message = $request->message;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $no_of_user = $request->no_of_user;
        $min_amount = $request->min_amount;
        $discount = $request->discount;
        $discount_type = $request->discount_type;
        $max_dis_amount = $request->max_dis_amount;
        $repeat_usage = $request->repeat_usage;
        $no_of_repeat_usage = $request->no_of_repeat_usage;
        $status = $request->status;

        Promocode::where('pcid',$id)->update(['promocode'=>$promocode,'message'=>$message,'start_date'=>$start_date,'end_date'=>$end_date,'no_of_user'=>$no_of_user,'min_amount'=>$min_amount, 'discount'=>$discount,'discount_type'=>$discount_type,'max_dis_amount'=>$max_dis_amount,'repeat_usage'=>$repeat_usage,'no_of_repeat_usage'=>$no_of_repeat_usage,'status'=>$status]);
        return back()->with('success','Promocode Updated');
    }
     
    public function destroy1($id){
        Promocode::where('pcid', $id)->delete();
        return back()->with('success','Promocode Deleted'); 
    }
}
