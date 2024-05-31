<?php 
namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\ShippingCharges;
use App\Models\Productstock;

class CartService{

    public function cartAll($uid){
        return Cart::where('uid', $uid)
        ->leftJoin('products', 'carts.pid', '=', 'products.pid')
        ->get();
    }
    
    // public function shipCharges(){
    //     return Shippingcharges::all();
    // }
    
    public function shipCharges($grand){
        return Shippingcharges::Where('shipping_min_amount', '>=', $grand)
                ->get();
    }
    
    
    public function maxCharge($chamt){
        return Shippingcharges::Where('shipping_min_amount',$chamt)->get('charges');
    }

    public function addTocart($pid,$uid,$var_id,$quantity){
        
        //return $var_id; 
        if($quantity==0){
          $response = ['status'=>0,'title'=>'Item Quantity Cannot be 0'];
             return $response;
        }
        
        if($var_id==NULL){
            //GET PRODUCT FIRST VARIENT ID 
            // return "fuck";
          $pvarient=    Productstock::where('ppid',$pid)->orderby('psid','ASC')->first();
            // $response = ['status'=>0,'title'=>'Please Select Varient'];
            //  return $response;  
            $var_id = $pvarient->psid;
        }
        $product = Product::where('pid',$pid)->get();
        if(count($product)==0){ return 'No product found'; }
        else{    
            $pro = Cart::where('uid', $uid)
                        ->where('pid',$pid)
                        ->where('var_id',$var_id)
                        ->get('qty');
            foreach($pro as $prow){
                $qty= $prow->qty;
            }
            if(!empty($qty)){
                Cart::where('uid',$uid)
                        ->where('pid',$pid)
                        ->where('var_id',$var_id)
                        ->update(['qty'=>$quantity,'var_id'=>$var_id]);
                         $count= Cart::where('uid',$uid)->count();
                Wishlist::where('pid',$pid)->where('uid',$uid)->delete(); 
                $response = ['status'=>1,'title'=>'Product updated','cartcount'=>(string)$count];
                return $response;

            }else{
                $cart = new Cart();
                $cart->pid = $pid;
                $cart->uid = $uid;
                $cart->qty = $quantity;
                $cart->var_id = $var_id;
                if($cart->Save()){
                    (string)$count= Cart::where('uid',$uid)->count();
                    
                    Wishlist::where('pid',$pid)->where('uid',$uid)->delete(); 
                    $response = ['status'=>1,'title'=>'Product added to cart','cartcount'=>(string)$count];
                    return $response;
                }
                else{
                     (string)$count= Cart::where('uid',$uid)->count();
                    $response = ['status'=>0,'title'=>'Product not added to cart','cartcount'=>(string)$count];
                    return $response;
                }
            }
        }
    }

    public function deleteCart($pid,$uid){
        $cart = Cart::where('id', $pid)
                ->delete();
             (string)$count= Cart::where('uid',$uid)->count();
        if($cart==true){
            $response = ['status'=>1,'title'=>'Product deleted','cartcount'=>(string)$count];
        }else{
            $response = ['status'=>0,'title'=>'Product not available','cartcount'=>(string)$count];

        }
        return $response;
    }
    
    public function updateQty($pid,$uid,$qty){
        $cart = Cart::where('uid', $uid)
            ->where('pid',$pid) 
            ->update(['qty'=>$qty]);
        if($cart==true){
                        (string)$count= Cart::where('uid',$uid)->count();
            $response = ['status'=>1,'title'=>'Quantity Updated','cartcount'=>(string)$count];
        }else{
                         (string)$count= Cart::where('uid',$uid)->count();
            $response = ['status'=>0,'title'=>'Quantity not updated','cartcount'=>(string)$count];
        }
        return $response;
    }
    
    public function moveWishlist($request){
        // return $request->get('pid');
        $userDetail= $request->user()->token();
        $uid = $userDetail->user_id;
        $pid = $request->get('pid');
                     (string)$count= Cart::where('uid',$uid)->count();
        //CHECK IF PRODUCT EXITS IN WISHTLIST
        $wislist= Wishlist::where('pid',$pid)->where('uid',$uid)->get();
        if(count($wislist)>0){
        $response = ['status'=>0,'title'=>'Product already in Wishlist','cartcount'=>(string)$count];
            return $response;
        }
        
        $move = new Wishlist();
        $move->pid = $pid;
        $move->uid = $uid;
        
        if($move->Save()){
            Cart::where('uid', $uid)
                ->where('pid',$pid) 
                ->delete();
             (string)$count= Cart::where('uid',$uid)->count();
            $response = ['status'=>1,'title'=>'Product added to wishlist','cartcount'=>(string)$count];
            return $response;
        }
        else{
            (string)$count= Cart::where('uid',$uid)->count();
            $response = ['status'=>0,'title'=>'Product not added to wishlist','cartcount'=>(string)$count];
            return $response;
        }
        
    }
}