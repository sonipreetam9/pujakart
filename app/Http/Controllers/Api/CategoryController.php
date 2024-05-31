<?php

namespace App\Http\Controllers\Api;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Review;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\Productstock;

class CategoryController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryService $categoryService){
        $this->cat = $categoryService;
    }

    public function viewCategory(request $request){
     
        $category= $this->cat->categoryList($request); 
        $var_id= $request->var;
        // print_r($category);die;
        // return    $productList= Product::where('slug',$request->slug)->where('pstatus',1)->get();
        foreach($category as $key=>$value){
            $category[$key]->itemimage= env('APP_URL').'productImage/'.$value->itemimage;
            $discountAmt = $value->mrp_price - $value->selling_price;
            $discount= ($discountAmt / $value->mrp_price) * 100;
            $category[$key]->discount= round($discount,0);
            
            $productStock= Productstock::where('ppid',$value->pid)->get();
            $category[$key]->pstocks = $productStock[0]->pstock;
            
            $reviewRating= Review::where('p_id',$value->pid)->avg('rating');
            $category[$key]->rating= round($reviewRating,0);
            
          
            
            //CHECK IF ITEM ALREADY IN CART OR NOT
            $userDetail = $request->user()->token();
            $uid = $userDetail->user_id;
            
                 
                    // $category[$key]->added_to_wishlist= 0;
                    // $category[$key]->rating= 3;
                    
        
                    $cartCount= Wishlist::where('pid',$value->pid)->where('uid',$uid)->count();
                    if($cartCount>0){
                             $category[$key]->added_to_wishlist= 1;
                    }else{
                             $category[$key]->added_to_wishlist= 0;
                    }
                            
                    $reviewRating= Review::where('p_id',$value->pid)->avg('rating');
                    $category[$key]->rating= round($reviewRating,0);            
                    
                    
                    
                    //--mycode
                    $proid = $value->pid;
           
           
            
           
                $prostock = Productstock::where('ppid',$proid)->get();
            
                foreach($prostock as $key1=>$val){
                    $discountAmt1 = $val->pmrp_price - $val->pselling_price;
                    $discount1= ($discountAmt1 / $val->pmrp_price) * 100;
                    $prostock[$key1]->vdiscount = round($discount1,0);
                    if($val->pstock <0){
                           $prostock[$key1]->ppstatus=0;
                           Productstock::where('psid',$val->psid)->update(['ppstatus'=>0]);
                    }
                
            $cart= Cart::where('pid',$value->pid)->where('var_id',$val->psid)->where('uid',$uid)->orderby('id','Desc')->get();
            $cart1= Cart::where('pid',$proid)->where('uid',$uid)->orderby('id','Desc')->get();
            
            if(count($cart)>0){
     
                $prostock[$key1]->added_in_cart='1';
                $prostock[$key1]->cart_qty=$cart[0]->qty;
                if($cart1[0]->var_id==$cart[0]->var_id){
                   $prostock[$key1]->varient_selected=$cart[0]->var_id; 
                }else{
                        $prostock[$key1]->varient_selected='0';
                }
            
                
                
            }else{
                $prostock[$key1]->added_in_cart='0';
                $prostock[$key1]->cart_qty='0';
                $prostock[$key1]->varient_selected='0';
            }
            }
            //return $prostock;
            $category[$key]->varient= $prostock;
            // $array = json_decode($prostock, true);

            // return $category[$key]->varient;
            
            
            
            $hasVarientNotZero = false;
            
            foreach ( $category[$key]->varient as $element) {
                if ($element['varient_selected'] != 0) {
                    $hasVarientNotZero = true;
                    break;
                }
            }
            if ($hasVarientNotZero) {
               $array = json_decode( $category[$key]->varient, true);
                      
                    usort($array, function ($a, $b) {
                        return ($a['varient_selected'] != 0) ? -1 : 1;
                    });
            
                        $category[$key]->varient= $array;
            } else {
            
            
                    $category[$key]->varient= $prostock;
            }
            
       
            
            //--close
            
            
        }
        



        
        //  $category[$key]->varient=$array;
        
   
        
        $data['category']=$category;
        
        
        return response(['status'=>1,'msg'=>'View Category Product','data'=>$data],200);
    }

    public function allcategory(request $request){
        $categoryProduct = Category::where('status','1')->where('is_parent',0)->orderby('position','ASC')->get();
        foreach($categoryProduct as $key=>$value){
          $categoryProduct[$key]->image= env('APP_URL').'categoryImage/'.$value->image;
          
          
             $childCat= Category::where('is_parent',$value->sid)->get();
            if(count($childCat) > 0)
            {
                $categoryProduct[$key]->child_category=1; 
            }
            else
            {
                $categoryProduct[$key]->child_category=0; 
            }
        }
        $data['category']=$categoryProduct;
        return response(['status'=>1,'msg'=>'View All Category','data'=>$data],200);
        //--category close
    }
    public function fetchSubCategory(request $request,$slug){
     
        $parentCat= Category::where('cslug',$slug)->where('status','1')->first();
        //return $parentCat;
        
        $subCat= Category::where('is_parent',$parentCat->sid)->where('status','1')->get();
        if(count($subCat)>0){
            foreach($subCat as $key=>$value){
                 $subCat[$key]->image = env('APP_URL').'categoryImage/'.$value->image;
            }
            
            $data['catlist']=$subCat;
           return response(['status'=>1,'msg'=>'Sub category Found','data'=>$data],200); 
        }else{
           return response(['status'=>0,'msg'=>'No Subcategory Found'],200);
        }
        
        
    }
}
