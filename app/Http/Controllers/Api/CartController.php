<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CartService;
use App\Models\User; 
use App\Models\Promocode;

use App\Models\Productstock;

class CartController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService){
        $this->cart = $cartService;
    }

    public function cart(request $request){
        $userDetail = $request->user()->token();
        $uid = $userDetail->user_id;
        //return $uid;
        $cartProduct= $this->cart->cartAll($uid);
        //return $cartProduct;
        foreach($cartProduct as $key=>$value){
            $cartProduct[$key]->itemimage= env('APP_URL').'productImage/'.$value->itemimage;
            //$discountAmt = $value->mrp_price - $value->selling_price;
            //$discount= ($discountAmt / $value->mrp_price) * 100;
            //$cartProduct[$key]->discount= round($discount,0);
            
            //return $value->var_id;
            $pp = Productstock::where('psid',$value->var_id)->get();
            
            $cartProduct[$key]->selling_price= $pp[0]->pselling_price;
            $cartProduct[$key]->mrp_price= $pp[0]->pmrp_price;
            //-mycode
            $discountAmt = $pp[0]->pmrp_price - $pp[0]->pselling_price;
            $discount= ($discountAmt / $pp[0]->pmrp_price) * 100;
            $cartProduct[$key]->discount= round($discount,0);
            $cartProduct[$key]->total_stock= $pp[0]->pstock;
            //-Close
        }
        $data['cartProduct']=$cartProduct;
        
        $total=0;
        $mrptotal=0;
        $saving=0;
        foreach($data['cartProduct'] as $prow){
            $total = $total + $prow->qty * $prow->selling_price;
            $mrptotal = $mrptotal + $prow->qty * $prow->mrp_price;
            //--$saving = $saving + $prow->qty * $prow->discount;
            $saving = $mrptotal - $total;
        }
      
        $coupon_amount = 0;
        $data['total'] = $mrptotal;
        $data['saving'] = $saving;
        $grand= $total - $coupon_amount;
        
        //--mycode
        if(sizeof($cartProduct)!=0){
           $charges = $this->cart->shipCharges($grand);
            if(sizeof($charges)!=0){
                $ch = $charges[0]->charges;
            }else{
                $ch=0;
            }
        }else{
            $ch=0;
        }
        // $ch=0;
        // foreach($charges as $val){
        // $spa[] = $val->shipping_min_amount;
        // if($grand >= $val->shipping_min_amount){
        //  $ch = $val->charges;
        // } }
        // print_r($spa);die;
        //--close--//
        $data['shipping_charges']= $ch;
        $data['grand_total']= $total + $ch - $coupon_amount;
        
        $cdate = date('Y-m-d');
        //return $cdate;
        $pcode = Promocode::where('status','1')
            ->where('start_date','<=',$cdate)
            ->where('end_date','>=',$cdate)
            ->where('no_of_user','>','0')
            ->get();
        if(sizeof($pcode)>0){
            
            $data['coupon']= $pcode;
        }else{
            $data['coupon']= null;
        }
        //return $data['coupon'];
        //print_r($ch);die;
        //print_r(max($ch));die;
        //$data['ship_charges'] = $ship_charges;
        return response(['status'=>1,'msg'=>'Cart Product','data'=>$data],200);
    }

    public function addCart(request $request){
        $userDetail = $request->user()->token();
        $uid = $userDetail->user_id;
        //return $uid;
        $pid =  $request->post('pid');
        $quantity = $request->post('qty');
        $var_id = $request->post('var_id');
        return $this->cart->addTocart($pid,$uid,$var_id,$quantity);
    }
    public function delCart(request $request){
         $pid = $request->post('pid');
        $userDetail= $request->user()->token();
        $uid = $userDetail->user_id;
        return $this->cart->deleteCart($pid,$uid);
    }
    public function qtyupdate(request $request){
        $pid = $request->post('pid');
        $qty = $request->post('qty');
        $userDetail= $request->user()->token();
        $uid = $userDetail->user_id;
        return $this->cart->updateQty($pid,$uid,$qty);
    }
    
    public function movewish(request $request){
        // return $request->pid;
        return $this->cart->moveWishlist($request);
    }
}
