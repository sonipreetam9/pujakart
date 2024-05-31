<?php

namespace App\Http\Controllers\Api;
use App\Services\WishlistService;
use App\Http\Controllers\Controller;
use App\Models\Productstock;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    protected $wishlistService;
    public function __construct(WishlistService $wishlistService){
        $this->wish = $wishlistService;
    }

    public function wishlist(request $request){
        $userDetail = $request->user()->token();
        $uid = $userDetail->user_id;
        $wishlistProduct= $this->wish->wishlistAll($uid);
        
        foreach($wishlistProduct as $key=>$value){
            $wishlistProduct[$key]->itemimage= env('APP_URL').'productImage/'.$value->itemimage;
            $discountAmt = $value->mrp_price - $value->selling_price;
            if($discountAmt!=0){
                $discount= ($discountAmt / $value->mrp_price) * 100;
            }else{
                $discount=0;
            }
            
            $wishlistProduct[$key]->discount= round($discount,0);
            // return $value;
            $psid = Productstock::where('ppid',$value->pid)->first();
            $wishlistProduct[$key]->var_id = $psid->psid;
        }
        $data['wishlistProduct']=$wishlistProduct;
        return response(['status'=>1,'msg'=>'Wishlist Product','data'=>$data],200);
    }

    public function addWish(request $request){
        $userDetail = $request->user()->token();
        $uid = $userDetail->user_id;
        $pid = $request->post('pid');
        // return $pid;
        return $this->wish->addTowishlist($pid,$uid);
    }
    public function delWish(request $request){
        $pid = $request->post('pid');
        $userDetail = $request->user()->token();
        $uid = $userDetail->user_id;
        return $this->wish->deleteWishlist($pid,$uid);
    }
}
