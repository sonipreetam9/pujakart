<?php
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\User;

class AppAuthorizer{

    public function authorizeUser($request){
return $request;
         try{
         $request->user()->token();
            return "hii";
         
        }catch(Exception $e){
            return "no data";
         }

      
    } 


}
