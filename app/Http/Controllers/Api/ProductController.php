<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Productstock;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\HomeLayout;

class ProductController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
       $this->product = $productService;
    }

    public function index(request $request){
        
        $userDetail = $request->user()->token();
        $uid = $userDetail->user_id;
        //return $request->var;

        $proDetail= $this->product->detail($request);
        // return $request->var;
        if(empty($proDetail)){
             return response(['status'=>0,'msg'=>'No Product Found',],200);
        }
        else{
            $proid = $proDetail[0]->pid;
            $prostock = Productstock::where('ppid',$proid)->get();

            //return $proDetail[0]->pstock;
            if($proDetail[0]->pstock==0){
                //PRODUCT MARKED OUT OF pstock
                foreach($prostock as $key=>$value){
                    $prostock[$key]->pstock= $value->pstock; 
                    if( $value->pstock<=0){
                        $prostock[$key]->ppstatus=0;
                    }
                    //mycode
                    $discountAmt1 = $value->pmrp_price - $value->pselling_price;
                    $discount1= ($discountAmt1 / $value->pmrp_price) * 100;
                    $prostock[$key]->vdiscount = round($discount1,0);
                    $prostock[$key]->pstocks = $value->pstock;
                    //Close
                }
            }else{
                foreach($prostock as $key=>$value){
                    //mycode
                      if( $value->pstock<=0){
                        $prostock[$key]->ppstatus=0;
                    }
                    $discountAmt1 = $value->pmrp_price - $value->pselling_price;
                    $discount1= ($discountAmt1 / $value->pmrp_price) * 100;
                    $prostock[$key]->vdiscount = round($discount1,0);
                    $prostock[$key]->pstocks = $value->pstock;
                    //Close
                }
            }
            $data['varient'] = $prostock;
            // $data['varient'] = null;
        
        //varient Product close
        foreach($proDetail as $key=>$value)
        {
            if($value->multi_image!=''){
                $proDetail[$key]->itemimage= env('APP_URL').'productImage/'.$value->itemimage;
                $multi= (explode(",",$value->multi_image));
         
                $mulipleImg=[];
                $mulipleImg[0]['img']=  $proDetail[$key]->itemimage;
                foreach($multi as $keys=>$value1){
                // return $key;
                    $nkey = $keys+1;
                    $mulipleImg[$nkey]['img']= env('APP_URL').'multiImage/'.$value1;
                }
            }
            else{
                $mulipleImg[0]['img']=$proDetail[0]->itemimage= env('APP_URL').'productImage/'.$value->itemimage;
            }
          
           
            // return $mulipleImg;
            // $proDetail[$key]->multi_image= env('APP_URL').'multiImage/'.$multi;
            $proDetail[$key]->multi_image =  $mulipleImg;
            // $proDetail['multi_images']= $mulipleImg;
      
            if(empty($value->bookpdf)){
                $proDetail[$key]->bookpdf= null;
            }else{
                $proDetail[$key]->bookpdf= env('APP_URL').'productImage/'.$value->bookpdf; 
            }
             
            //CHECK IF PRODUCT IS ALREADY IN CART
            //CHECK IF PRODUCT IS ALREAY IN WISHLIST OR NOT
            $wl= Wishlist::where('pid',$value->pid)->where('uid',$uid)->first();
            if($wl){
                $proDetail[$key]->added_to_wishlist= 1; 
            }else{
                $proDetail[$key]->added_to_wishlist= 0; 
            }
            
            $discountAmt = $value->mrp_price - $value->selling_price;
            $discount= ($discountAmt / $value->mrp_price) * 100;
             
            $proDetail[$key]->discount=round($discount,0);
            $cartCount= Cart::where('pid',$value->pid)->where('var_id',$request->var)->where('uid',$uid)->count();
            if($cartCount>0){
                $proDetail[$key]->added_to_cart= 1;
            }else{
                $proDetail[$key]->added_to_cart= 0;
            }
            
        }
        //CHECK IF USER PURCHASED THIS PRODUCT OR NOT
        $pid= $proDetail[0]->pid;
        // return $pid;
        $userOrder= Orderdetail::where('user_id',$uid)->where('p_id',$pid)
                    ->get();
        if(count($userOrder)>0){
            foreach ($userOrder as $key){
                $reviews = Order::where('order_id',$key->order_id)
                        ->where('user_id',$uid)
                        ->where('status_order','4')
                        ->get();
                        
                if(count($reviews) != 0)
                {
                    $review[] = $reviews;
                }
                else{
                    $review[] ="";
                }
            }
                if(count($review)>0){
                    $canReview= 1;
                     
                }else{
                    $canReview= 0;
                }
        }else{
            $canReview=0;
        }
        
        
        $relatedProducts=[];
        //Section2
        $sec2 = HomeLayout::where('section','section2')->limit('10')->get();
        $sect2= explode(',',$sec2[0]->product_id);
        foreach($sect2 as $value1){
            $se2=Product::whereIn('pid',$sect2)->inRandomOrder()->get(); 
            //  $ss=  DB::table('products')->where()get();
            foreach($se2 as $key=>$value)
            {
                $se2[$key]->itemimage = env('APP_URL').'productImage/'.$value->itemimage;
                $discountAmt = $value->mrp_price - $value->selling_price;
                $discount= ($discountAmt / $value->mrp_price) * 100;
                $se2[$key]->discount= round($discount,0);
                $se2[$key]->section_title=$sec2[0]->title;
                $var= Productstock::where('ppid',$value->pid)->orderby('psid','ASC')->get();
                $se2[$key]->varient_id= $var[0]->psid;
            }
        }
        if(sizeof($se2)!=0){
            $data['section2']=$se2;
        }else{
            $data['section2']='';
        }
        
        
        //--chandra code--//
        $related= explode(',',$proDetail[0]->category);
        foreach($related as $value1){
            $rel=Product::whereIn('category', $related)->inRandomOrder()->take('10')->get(); 
            //  $ss=  DB::table('products')->where()get();
            foreach($rel as $key=>$value)
            {
                $rel[$key]->itemimage = env('APP_URL').'productImage/'.$value->itemimage;
                $discountAmt = $value->mrp_price - $value->selling_price;
                $discount= ($discountAmt / $value->mrp_price) * 100;
                $rel[$key]->discount= round($discount,0);
                $rel[$key]->section_title=$sec2[0]->title;
                $var= Productstock::where('ppid',$value->pid)->orderby('psid','ASC')->get();
                $rel[$key]->varient_id= $var[0]->psid;
                
            }
        }
        //--close--//
        
        
        $data['can_add_review']=$canReview;
        $data['productDetails']=$proDetail;
        $data['relatedProduct']= $rel;
        // $data['relatedProduct']= $se2;
        return response(['status'=>1,'msg'=>'Product Details','data'=>$data],200);
        }
    }

    public function productsearch(request $request){
        $searchProduct= $this->product->search($request);
        foreach($searchProduct as $key=>$value){
            $searchProduct[$key]->itemimage= env('APP_URL').'productImage/'.$value->itemimage;
            $discountAmt = $value->mrp_price - $value->selling_price;
            $discount= ($discountAmt / $value->mrp_price) * 100;
            $searchProduct[$key]->discount= round($discount,0);
            $var= Productstock::where('ppid',$value->pid)->orderby('psid','ASC')->get();
            $searchProduct[$key]->varient_id= $var[0]->psid;
            
        }
        $data['searchProduct']=$searchProduct;
        return response(['status'=>1,'msg'=>'Search Product','data'=>$data],200);
    }

    public function productlisting(request $request){
        $listingProduct= $this->product->listing($request);
        foreach($listingProduct as $row){
            foreach($row as $key=>$value){
                $row[$key]->itemimage= env('APP_URL').'productImage/'.$value->itemimage;
                $discountAmt = $value->mrp_price - $value->selling_price;
                $discount= ($discountAmt / $value->mrp_price) * 100;
                $row[$key]->discount= round($discount,0);
            }
        }
        $data['listingProduct']=$row;
        return response(['status'=>1,'msg'=>'Listing Product','data'=>$data],200);
    }
    
}
