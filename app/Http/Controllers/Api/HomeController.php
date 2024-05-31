<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Services\AppAuthorizer;
use App\Models\User;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\Review;
use App\Models\SocialMedia;

use App\Models\Offerimage;
use App\Models\Bookcategory;
use App\Models\HelpQuery;
use Illuminate\Support\Facades\DB;
use App\Models\Productstock;
use App\Models\HomeLayout;

class HomeController extends Controller
{
    protected $appAuthorizer;
    public function __construct(AppAuthorizer $appAuthorizer)
    {
       $this->appauth = $appAuthorizer;
    }

    public function homePage(request $request){
     
       $userDetail= $request->user()->token();

        $uid = $userDetail->user_id;
        $slider = Slider::where('status','1')->get();
        foreach($slider as $key=>$value){
            $cat= Category::where('cslug',$value->link)->first();
            $slider[$key]->image= env('APP_URL').'sliderImage/'.$value->image;
            if($cat==""){
                $slider[$key]->cname= "";
                // vrat-katha
            }else{
                $slider[$key]->cname= $cat->cname;
            }
        }
      
       $data['slider']=$slider;
       //--slider close--//
       
        $offerimg = Offerimage::where('status','1')->get();
        foreach($offerimg as $key=>$value){
            $cat= Category::where('cslug',$value->link)->first();
            $offerimg[$key]->itemimage= env('APP_URL').'offerImage/'.$value->itemimage;
            // $offerimg[$key]->cname= $cat->cname;
           if($cat==""){
                $offerimg[$key]->cname= "";
            }else{
                $offerimg[$key]->cname= $cat->cname;
            }
        }
        $data['offerimg']=$offerimg;
        //--offer close

        $recentProduct = Product::where('pstatus','1')->latest()->limit('10')->get();
           foreach($recentProduct as $key=>$value){
             $recentProduct[$key]->itemimage= env('APP_URL').'productImage/'.$value->itemimage;
             $discountAmt = $value->mrp_price - $value->selling_price;
             $discount= ($discountAmt / $value->mrp_price) * 100;
             $recentProduct[$key]->discount= round($discount,0);
             $recentProduct[$key]->section_title='Recent Product';
             $var= Productstock::where('ppid',$value->pid)->orderby('psid','ASC')->get();
             $recentProduct[$key]->varient_id= $var[0]->psid;
        }
        $data['recentProduct']=$recentProduct;
       
       
        //===========================Section Start=========================//
        // $agarbatti = HomeLayout::where('section','section1')->where('cname','Agarbatti')->limit('10')->get();
        $agarbat = HomeLayout::where('section','section1')->limit('10')->get();
        $agarbatti= explode(',',$agarbat[0]->product_id);
        
        foreach($agarbatti as $value1){
            $ss=Product::whereIn('pid',$agarbatti)->get(); 
                //--$ss=  DB::table('products')->where()get();
                foreach($ss as $key=>$value)
                {
                    $ss[$key]->itemimage = env('APP_URL').'productImage/'.$value->itemimage;
                    $discountAmt = $value->mrp_price - $value->selling_price;
                    $discount= ($discountAmt / $value->mrp_price) * 100;
                    $ss[$key]->discount= round($discount,0);
                    $ss[$key]->section_title=$agarbat[0]->title;
                    $var= Productstock::where('ppid',$value->pid)->orderby('psid','ASC')->get();
                    $ss[$key]->varient_id= $var[0]->psid;
 
                    $cartCount= Wishlist::where('pid',$value->pid)->where('uid',$uid)->count();
                    if($cartCount>0){
                             $ss[$key]->added_to_wishlist= 1;
                    }else{
                             $ss[$key]->added_to_wishlist= 0;
                    }
                            
                    $reviewRating= Review::where('p_id',$value->pid)->avg('rating');
                    $ss[$key]->rating= round($reviewRating,0);
                }
        }
        if(sizeof($ss)!=0){
            $data['section1']=$ss;
        }else{
            $data['section1']='';
        }
        
        //Section2
        $sec2 = HomeLayout::where('section','section2')->limit('10')->get();
        $sect2= explode(',',$sec2[0]->product_id);
        foreach($sect2 as $value1){
            $se2=Product::whereIn('pid',$sect2)->get(); 
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
                 $cartCount= Wishlist::where('pid',$value->pid)->where('uid',$uid)->count();
                    if($cartCount>0){
                             $se2[$key]->added_to_wishlist= 1;
                    }else{
                             $se2[$key]->added_to_wishlist= 0;
                    }
                    $reviewRating= Review::where('p_id',$value->pid)->avg('rating');
                    $se2[$key]->rating= round($reviewRating,0);
                
            }
        }
        if(sizeof($se2)!=0){
            $data['section2']=$se2;
        }else{
            $data['section2']='';
        }
        
        //section3
        $sec3 = HomeLayout::where('section','section3')->limit('10')->get();
        $sect3= explode(',',$sec3[0]->product_id);
        foreach($sect3 as $value1){
            $se3=Product::whereIn('pid',$sect3)->get(); 
            foreach($se3 as $key=>$value)
            {
                $se3[$key]->itemimage = env('APP_URL').'productImage/'.$value->itemimage;
                $discountAmt = $value->mrp_price - $value->selling_price;
                $discount= ($discountAmt / $value->mrp_price) * 100;
                $se3[$key]->discount= round($discount,0);
                $se3[$key]->section_title=$sec3[0]->title;
                $var= Productstock::where('ppid',$value->pid)->orderby('psid','ASC')->get();
                $se3[$key]->varient_id= $var[0]->psid;
            }
        }
        if(sizeof($se3)!=0){
            $data['section3']=$se3;
        }else{
            $data['section3']='';
        }
        //=============================Section close===================================//
       
        $categoryProduct = Category::orderBy("position","asc")->where('status','1')->where('head',1)->get();
        foreach($categoryProduct as $key=>$value)
        {
            $categoryProduct[$key]->image = env('APP_URL').'categoryImage/'.$value->image;
            $categoryProduct[$key]->secton_title = 'Biggest Deal on top category'; 
            
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
        //============Category Close===============//

        //BOOK CATEGORY
        $bookCat = Bookcategory::orderBy("position","asc")->where('status','1')->get();
        foreach($bookCat as $bkey=>$bval){
            $bookCat[$bkey]->image= env('APP_URL').'bookImage/'.$bval->image;
            $bookCat[$bkey]->bslug= $bval->cslug; 
            unset($bookCat[$bkey]->cslug);
        }
        $data['bookCategory']=$bookCat;

        
        
        $cartCount= Cart::where('uid',$userDetail->user_id)->count();
        $data['cartcount']= (string) $cartCount;
        
        //--social link--//
        $result= SocialMedia::all();
        
        $data['facebook']= $result[0]->facebook;
        $data['instagram']= $result[0]->instagram;
        $data['twitter']= $result[0]->twitter;
        $data['whatsapp']= $result[0]->whatsapp;
        //--close --//

        return response(['status'=>1,'msg'=>'Home Page','data'=>$data],200);
    }
    
    public function createHelpQuery(request $request){
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|min:10|max:10',
            'email' => 'required|string',
            'message' => 'required|string',
        ]);
        if($validator->fails())
        {
            return response(['status'=>0,'msg'=>$validator->errors()->all()],200); 
            // return redirect("/")->with('error',$validator->errors()->all());
        }
        
        // return "Yes";
        $userDetail= $request->user()->token();
        if($request->post('message')==''){
                 return response(['status'=>0,'msg'=>'Unable to Add'],200); 
        }
        
        
        $hq= new HelpQuery();
       
        $hq->userid = $userDetail['user_id'];
        $hq->name = $request->post('name');
        $hq->email =  $request->post('email');
        $hq->mobile =  $request->post('mobile');
        $hq->message =  $request->post('message');
        if($hq->Save()){
            return response(['status'=>1,'msg'=>'Our executive will contact you shortly'],200); 
        }else{
           
            return response(['status'=>0,'msg'=>'Unable to Add'],200); 
        }
    }
    
}
