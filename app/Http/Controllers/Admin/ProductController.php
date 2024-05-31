<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Pincode;
use App\Models\Productstock;

class ProductController extends Controller
{
    public function __construct( Product $product,Category $category,Pincode $pincode )
    {
        $this->product = $product;
        $this->category = $category;
        $this->pincode = $pincode;
    }

    public function index(){
        $data['title'] = 'Product';
        $data['list']= $this->product->getAllAdmin();
        //print_r($data['list']);die;
        //$data['list']= array();
        return view('admin.product.index',$data);
    }
    public function create_product(){
        $data['title']='Create Product';
        $data['list'] = $this->product->subcatAll();
        
        // $subc= array();
		foreach($data['list'] as $item)
		{   
		    if($item->is_parent == 0)
		    {
		        $parent [] = $item;
		    }
		    else
		    {
		        $child [] = $item;
		    }
            // $s=$item->cid;
            // return $s;
            // $sval=$this->product->subcat($s);
            // array_push($subc,$sval);
		}
        // return $child;
		$data['parent']=$parent;
		$data['child'] = $child;
        $data['unit']= $this->product->getunit();
        return view('admin.product.create',$data);
    }

    public function pro_order(request $request){
        $data['title']='Save';
        $data['list']= $this->product->getAllpos();
        $data['cate']= $this->product->categoryParent();
        $data['subcate']= $this->product->subcategoryParent();
        $data['search']= $this->product->searchCat($request);
        //print_r($data['search']);die;
        return view('admin.product.productorder',$data);
    }
    //--search
    public function searchcate(request $request){
        $data['title']='Save';
        $data['list']= $this->product->getAllpos();
        $data['cate']= $this->product->categoryParent();
        $data['subcate']= $this->product->subcategoryParent();
        $data['search']= $this->product->searchCat($request);
        return view('admin.product.productorder',$data);
    }

    public function save(request $request){
        return $this->product->addNew($request); 
    }

    public function change_pos(request $request){
        return $this->product->positionchange($request); 
    }

    public function edit($id){
        
        $data['title']='Update Product';
        $data['list']= $this->product->detail($id);
        //return $data['list'];
        $data['catlist']= $this->product->subcatAll();
    	foreach($data['catlist'] as $item)
	    {   
    	    if($item->is_parent == 0)
    	    {
    	        $parent [] = $item;
    	    }
    	    else
    	    {
    	        $child [] = $item;
    	    }
	    }
	    
	    $data['parent']=$parent;
		$data['child'] = $child;
        //$catid = $data['list'][0]->category;
        //$data['subcat']= $this->category->getSubcat($catid);
        //$data['catlist']= $this->category->getsuperAll();
        $data['pinall'] = $this->pincode->getpincodeAll();
        $data['unit']= $this->product->getunit();
        //print_r($data['pin']);die;
        return view('admin.product.edit',$data);
    }

    public function update(request $request,$id){
        return $this->product->catupdate($request,$id);
    }

    public function delete($id){
        return $this->product->destroy1($id);
    }
    
    public function productstockdelete($id){
        return $this->product->destroy2($id);
    }
    
    
    function updatestatus(request $request)
	{
	    $val = $request->val;
        if($val=='3' || $val=='4')
        {
            $sval = $request->val;
            
            if($sval=="3"){$psval="1";}else{$psval='0';}
            product::where("pid",$request->pid)->update(['pstatus'=>$psval]);
            Productstock::where("ppid",$request->pid)->update(['ppstatus'=>$psval]);
            return "1";
            //return back()->with('success','Product Status Successfully Updated');
        }else{
            $pval = $request->val;
            product::where("pid",$request->pid)->update(['pstock'=>$pval]);
            Productstock::where("ppid",$request->pid)->update(['ppstatus'=>$pval]);
            return "2";
            //return back()->with('success','Product Stock Successfully Updated');
        }
        //return response()->json($data);
        return "3";
	}
}
