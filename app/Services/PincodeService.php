<?php
namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Pincode;

class PincodeService{

    public function checkPin($request){
        $checkpin = $request->pincode;
        
        $pin = Pincode::where('pincode',$checkpin)->get();
        //return $pin;
        if(count($pin)!=0){
            $response = ['status'=>'1','title'=>'Pincode is available'];
            return $response;
        }
        else{
            $response = ['status'=>'0','title'=>'Not deliverable at selected Pincode'];
            return $response;
            
        }
        return $response;
        // $delplace = Product::where('pid',$request->pid)->get();
        // if($delplace[0]->delivery_places=='3'){
        //     $response = ['status'=>'1','title'=>'Pincode is available'];
        //     return $response;
        // }
        // elseif($delplace[0]->delivery_places=='2'){
        //     $pin = $delplace[0]->pincode;
        //     $check = explode(',',$pin);
        //     foreach($check as $rcheck){
        //         if($rcheck == $checkpin){
        //             $response = ['status'=>'0','title'=>'Pincode is not available'];
        //             return $response;
        //         }else{
        //             $response = ['status'=>'0','title'=>'Pincode is not available'];
        //             return $response;
        //         }
        //     }
           
        // }else{
        //     $pin = $delplace[0]->pincode;
        //     $check = explode(',',$pin);
        //     foreach($check as $rcheck){
        //         if($rcheck == $checkpin){
        //             $response = ['status'=>'1','title'=>'Pincode is available'];
        //             return $response;
        //         }else{
        //             $response = ['status'=>'0','title'=>'Pincode is not available'];
        //             return $response;
        //         }
        //     }
        // }
    }

}