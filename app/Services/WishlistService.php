<?php 
namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\Cart;

class WishlistService{

    public function wishlistAll($uid){
        return Wishlist::where('uid', $uid)
        ->leftJoin('products', 'products.pid', '=', 'wishlists.pid')
        ->get();
    }

    public function addTowishlist($pid,$uid){
        $product = Product::where('pid',$pid)->get();
        if(count($product)==0){ return 'No product found';}
        else{    
            $pro = Wishlist::where('uid', $uid)
                        ->where('pid',$pid)
                        ->get();
            if(count($pro)!=0){
                return 'Product Already Present in Wishlist';

            }else{
                $wish = new Wishlist();
                $wish->pid = $pid;
                $wish->uid = $uid;
                if($wish->Save()){
                    Cart::where('uid', $uid)
                        ->where('pid',$pid) 
                        ->delete();
                    $response = ['status'=>1,'title'=>'Product added to wishlist'];
                    return $response;
                }
                else{
                    $response = ['status'=>0,'title'=>'Product not added to wishlist'];
                    return $response;
                }
            }
        }
    }

    public function deleteWishlist($pid,$uid){
        Wishlist::where('uid', $uid)
                ->where('pid',$pid)
                ->delete();
        $response = ['status'=>1,'title'=>'Product deleted'];
        return $response;
    }
}