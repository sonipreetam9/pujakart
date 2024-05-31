<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\HomeLayout;
use App\Models\User;
use App\Models\HelpQuery;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index(){
        $data['title'] = 'Dashboard';
        
        $data['user'] = User::all();
        $data['help'] = HelpQuery::all();
        $data['product'] = Product::all();
        
        $data['slider'] = Slider::all();
        $data['category'] = Category::all();
        $data['order'] = Order::all();
        return view('admin.dashboard',$data);
    }
    
    public function home_layout(){
        $data['title'] = 'Home Layout';
        $data['product'] = Product::all();
        $data['layout'] = HomeLayout::where('section','section1')->get();
        $data['layout1'] = HomeLayout::where('section','section2')->get();
        $data['layout2'] = HomeLayout::where('section','section3')->get();
        //return $data['layout1'];
        return view('admin.homelayout',$data);
    }
    
    //--Section1
    public function savsse(request $request) 
    {
        $section1 = HomeLayout::where('section','section1')->get();
        if(sizeof($section1)==0)
        {
        
                $validate = Validator::make($request->all(), [
                    'title' => 'required',
                ]);
                if($validate->fails()){
                    return back()->withErrors($validate->errors());
                }
                else{
                    
                    $product = $request->pid;
                    foreach($product as  $prow){
                        $product_id[] = $prow;
                    }
                    $p_cat= implode(',', $product_id);
                    
                    $home= new HomeLayout();
                    $home->section = $request->section;
                    $home->title = $request->title;
                    $home->product_id= $p_cat; 
        
                    if($home->save()){
                        return back()->with('success','Home Layout Insert successfully');
                    }
                    else{
                        return back()->with('error','Home Layout Not Insert successfully');
                    }
                }
        }
        else{
            // $product = $request->pid;
            // foreach($product as  $prow){
            //     $product_id[] = $prow;
            // }
            // $p_cat= implode(',', $product_id);
            // $title = $request->title;
            // $product_id= $p_cat;
            $product = $request->pid;
            if(empty($product)){
                $p_cat="";
            }
            else{
                foreach($product as  $prow){
                    $product_id[] = $prow;
                }
                $p_cat= implode(',', $product_id);
            }
            $title = $request->title;
            $product_id= $p_cat;
            
            HomeLayout::where('section','section1')->update(['section'=>'section1','title'=>$title,'product_id'=>$product_id]);
            return back()->with('success','Home Layout Updated');
        }
    }
    //--Close
    
    //--Section2
    public function save(request $request) 
    {
        
        $section1 = HomeLayout::where('section',$request->section)->get();
        if(sizeof($section1)==0)
        {
                $validate = Validator::make($request->all(), [
                    'title' => 'required',
                ]);
                if($validate->fails()){
                    return back()->withErrors($validate->errors());
                }
                else{
                    
                    $product = $request->pid;
                    foreach($product as  $prow){
                        $product_id[] = $prow;
                    }
                    $p_cat= implode(',', $product_id);
                    //return $request->section;
                    
                    $home= new HomeLayout();
                    $home->section = $request->section;
                    $home->title = $request->title;
                    $home->product_id= $p_cat; 
        
                    if($home->save()){
                        return back()->with('success','Home Layout Insert Successfully');
                    }
                    else{
                        return back()->with('error','Home Layout Not Insert Successfully');
                    }
                }
        }
        else{
            $product = $request->pid;
            if(empty($product)){
                $p_cat="";
            }
            else{
                foreach($product as  $prow){
                    $product_id[] = $prow;
                }
                $p_cat= implode(',', $product_id);
            }
            $title = $request->title;
            $product_id= $p_cat;
            
            HomeLayout::where('section',$request->section)->update(['section'=>$request->section,'title'=>$title,'product_id'=>$product_id]);
            return back()->with('success','Home Layout Updated');
        }
    }
    //--close
}
