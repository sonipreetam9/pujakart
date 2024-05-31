<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PromocodeService;

class PromocodeController extends Controller
{
    protected $PromocodeService;
    public function __construct(PromocodeService $PromocodeService){
        $this->promo = $PromocodeService;
    }

    public function applyCoupon(request $request){
        $amount= $request->amount;
        $code =  $this->promo->applyCoupon($request);
        $no_of_user =  $this->promo->no_of_user($request);
        if(sizeof($code)!="0"){
            $data['couponid'] = $code[0]->pcid;
            $data['couponcode'] = $code[0]->promocode;
            $current_date = date('Y-m-d');
            $c_code = $request->coupon_code;
            $check_date = $this->promo->checkDate($current_date,$c_code);
            //return $check_date;
            if(count($check_date)!= 0){
                if($code[0]->repeat_usage==1){
                    if(count($no_of_user)!=$code[0]->no_of_user){
                        if($code[0]->min_amount <= $amount){
                            if($code[0]->discount_type=="Percentage"){
                                $amount= $request->amount;
                                $dis_amt = $code[0]->discount;
                                $discount = $amount * $dis_amt /100;
                                $max = $code[0]->max_dis_amount;
                                if($discount >= $max){
                                    $discount_amount = $max;
                                }else{
                                    $discount_amount = $discount;
                                }
                                $data['discount']=$discount_amount;
                                $response = ['status'=>1,'title'=>"Coupon Applied", 'data'=>$data];
                                return $response;
                                
                            }else{
                                $discount = $code[0]->discount;
                                $max = $code[0]->max_dis_amount;
                                if($discount >= $max){
                                    $discount_amount = $max;
                                }else{
                                    $discount_amount = $discount;
                                }
                                $data['discount']=$discount_amount;
                                $response = ['status'=>1,'title'=>"Coupon Applied", 'data'=>$data];
                                return $response;
                            }
                        }else{
                            $minamount = $code[0]->min_amount;
                            $response = ['status'=>0,'title'=>"Minimum $minamount Amount and Above"];
                            return $response;
                        }
                    }
                    // elseif(count($no_of_user)==$code[0]->no_of_user){
                    //     $response = ['status'=>0,'title'=>'Coupon Code Not Applied '];
                    //     return $response;
                    // }
                    else{
                        $response = ['status'=>0,'title'=>'Expired Coupon Code '];
                        return $response;
                    }

                }else{
                    $response = ['status'=>0,'title'=>'Not Allowed Coupon Code'];
                    return $response;
                }
            }else{
                $response = ['status'=>0,'title'=>'Expired Coupon Code'];
                return $response;
            }
        }else{
            $response = ['status'=>0,'title'=>'Wrong Coupon Code'];
            return $response;
       }
    }
    
    
   



}
