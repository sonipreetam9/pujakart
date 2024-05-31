<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AppAuthorizer;
use App\Models\User;
use App\Models\WalletTran;

class WalletController extends Controller
{
    protected $appAuthorizer;
    public function __construct(AppAuthorizer $appAuthorizer)
    {
       $this->appauth = $appAuthorizer;
    }

    public function index(request $request){
     
        $userDetail= $request->user()->token();
        // return $userDetail['id'];
        $user= User::find($userDetail['user_id']);
        $data['wallet_bal']=$user->wallet_bal;
         $wallet= WalletTran::where('user_id',$userDetail->user_id)->orderby('id','DESC')->get();
        if(count($wallet)>0){
         
              $data['wallet_history']=$wallet;
            
        }else{
             $data['wallet_history']=[]; 
        }
 
       return response(['status'=>1,'msg'=>'Wallet','data'=>$data],200);

    }
    public function list(Request $request){
        $userDetail= $request->user()->token();
        $wallet= WalletTran::where('user_id',$userDetail->user_id)->orderby('id','DESC')->get();
        if(count($wallet)>0){
            $data['txn']=$wallet;
           return response(['status'=>1,'msg'=>'Transaction Found','data'=>$data],200);
            
        }else{
       return response(['status'=>0,'msg'=>'No Transaction Found'],200);
        }
        
    }
}
