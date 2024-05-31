<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\http\controllers\Admin\ProductController;
use App\http\controllers\Admin\SupercategoryController;
use App\http\controllers\Admin\CategoryController;
use App\Models\Productstock;
use App\Models\Unit;
use App\Models\Cart;
use Illuminate\Support\Str;
use File;

class Product extends Model
{
    use HasFactory; 
    public function getAll(){
        return Product::where('pstatus',1)->get();
    }
    public function getAllAdmin(){
        return Product::all();
    }
    
    public function getAllpos(){ 
        return Product::orderBy("position","asc")->get();
    }

    public function getsuperAll(){ 
        return Supercategory::All()->where('status','1');
    }
    public function subcatAll(){
        return Category::All()->where('status','1');
    }

    public function subcat($id){
        return Category::All()->where('catid',$id);
    }

    //--product order category and subcategory
    public function categoryParent(){
        return Category::All()->where('status','1')
                            ->where('is_parent','0');
    }
    public function subcategoryParent(){
        return Category::All()->where('is_parent','!=','0')
                            ->where('status','1');
    }
    //--close

    //--search start
    public function searchCat($request){
        $cat= $request->category;
        $subcat= $request->subcategory;
        if($cat == "" && $subcat == ""){
            return Product::orderBy("position","asc")->where('pstatus',1)->get();
        }
        elseif($cat == "" && $subcat != ""){
            return Product::orderBy("position","asc")->whereRaw('FIND_IN_SET("'.$request->subcategory.'",category)')->where('pstatus',1)
                ->get();
        }
        elseif($cat != "" && $subcat == ""){
            return Product::orderBy("position","asc")->whereRaw('FIND_IN_SET("'.$request->category.'",category)')->where('pstatus',1)->get();
        }
        elseif($cat != "" && $subcat != ""){
            return Product::orderBy("position","asc")->whereRaw('FIND_IN_SET("'.$request->category.'",category)')->where('pstatus',1)
                        ->orwhereRaw('FIND_IN_SET("'.$request->subcategory.'",category)')
                        ->get();
        }
        else{
            $d= "not found";
            return $d;
        }
    }
    //--search close

    public function getunit(){
        return Unit::All()->where('status','1');
    }

    public function addNew($request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors());
        }
        else
        {
            $addproduct= new product();
            $addproduct->name = $request->name;
            $addproduct->product_code = $request->product_code;
            $addproduct->hsn = $request->hsn;

            $slug = Str::slug($request->name);
            $addproduct->slug = $slug;
            
            

            //--start
            $measur[0]= $request->measurement;
            $unit[0]= $request->unit;
            $pstatus[0]= $request->pstatus;
            $mrpprice[0]= $request->mrp_price;
            $sel_price[0]= $request->selling_price;

            $measurs = $measur[0];
            $units = $unit[0];
            $status = $pstatus[0];
            $mprice = $mrpprice[0];
            $sprice = $sel_price[0];
            $discount = $mprice[0] - $sprice[0];

            $addproduct->measurement = $measurs[0];
            $addproduct->unit = $units[0];
            $addproduct->pstatus = $status[0];
            $addproduct->mrp_price = $mprice[0];
            $addproduct->selling_price = $sprice[0];
            $addproduct->discount = $discount;
            //--close
        
            $cat = $request->cat;
            foreach($cat as  $vsalue)
            {
                $cat_val[] = $vsalue;
            }
            $addproduct->category = implode(',', $cat_val);
            //print_r($cat_val);die;
            
            $addproduct->manufacturer = $request->manufacturer;
            $addproduct->made_in = $request->made_in;
            $addproduct->shipping_type = $request->shipping_type;
            $addproduct->delivery_places = $request->delivery_places;

            //--start
            $pin = $request->pincode;
            if($pin==""){
                $pinco="";
            }else{
                $j=0;
                foreach($pin as $prow)
                {
                    $pinc[] = $request->pincode[$j];
                    $j++;
                }
                $pinco= implode(',', $pinc);
            }
            $addproduct->pincode= $pinco;
            //print_r($pinco);die;
            //--close

            //--retuenable, cancelable, cod
            $return = $request->returnable;
            if($return==""){$returns='0';}else{$returns='1';}
            $calcel = $request->cancelable;
            if($calcel==""){$calcels='0';}else{$calcels='1';}
            $cod_a = $request->cod_allowed;
            if($cod_a==""){$cod='0';}else{$cod='1';}

            $addproduct->returnable = $returns;
            $addproduct->cancelable = $calcels;
            $addproduct->cod_allowed = $cod;

            //--start single image
            $fname = time().'.'.$request->itemimage->extension();  
            $fileName = date('d-m-Y-H-i-s').$fname;
            $request->itemimage->move(public_path('productImage'), $fileName);
            $itemimage = $fileName;
            $itemimage;
            //--close single image

            //--start pdf file
            if($request->bookpdf==""){
                $itempdf = "";
            }
            else{
                $bookpdf = time().'.'.$request->bookpdf->extension();  
                $fileNamepdf = date('d-m-Y-H-i-s').$bookpdf;
                $request->bookpdf->move(public_path('productImage'), $fileNamepdf);
                $itempdf = $fileNamepdf;
                $itempdf;
            }
            //--close pdf file

            //--start multiple image
            if($request->multi_image==""){
                $mul_image = "";
            }else{
                $images=array();
                if($files=$request->file('multi_image')){
                    foreach($files as $file){
                        $name=rand(000,999).$file->getClientOriginalName();
                        $file->move('multiImage',$name);
                        $images[]=$name;
                    }
                    $mul_image= implode(',', $images);
                }
            }

            //--close multiple image
            $addproduct->multi_image = $mul_image;
            $addproduct->itemimage = $itemimage;
            $addproduct->bookpdf = $itempdf;
            $addproduct->short_desc = $request->short_desc;
            $addproduct->full_desc = $request->full_desc;
            
            $addproduct->return_condition = $request->return_condition;
            $addproduct->shipping = $request->shipping;
           
            if($addproduct->save()){
                $pid = $addproduct->id;
                $nunit = $request->unit;
                $i=0;
                foreach($nunit as $key=>$row)
                {
                    $data = new Productstock();
                    $data->ppid = $pid;
                    $data->pmeasurement = $request->measurement[$i];
                    //--unit start
                    //$dunit = $request->unit[$i];
                    $expunit = $request->unit[$i];
                 
                    $data->unit_id = $request->unit[$i];
                    $new['dd']= Unit::where('uid',$request->unit[$i])->get('unit_name');
                    $j=0;
                    foreach($new['dd'] as $ss){
                        $data->punit = $ss->unit_name;
                    }
                    //--unit close
                    $data->pmrp_price = $request->mrp_price[$i];
                    $data->pselling_price = $request->selling_price[$i]; 
                    $data->pdiscount = $request->mrp_price[$i] - $request->selling_price[$i]; 
                    $data->pstock = $request->stock[$i];
                    $data->ppstatus = $request->pstatus[$i];
                    $data->save();
                    $i++;
                } 
                return back()->with('success','Product added successfully');
            }
            else{
                return back()->with('error','Product not added successfully');
            }
        }
    }

    public function detail($id){
        //return Product::All()->where('pid',$id);
        return Product::where('pid',$id)
            ->leftJoin('productstocks', 'products.pid', '=', 'productstocks.ppid')->get();
    }

    public function catupdate($request,$id){
        //---product update
            $pname = $request->name;
            $product_code = $request->product_code;
            $hsn = $request->hsn;

            $slug = Str::slug($request->name);
            $slug = $slug;

            //--start
            $measur[0]= $request->measurement;
            $unit[0]= $request->unit;
            $pstatus[0]= $request->pstatus;
            $mrpprice[0]= $request->mrp_price;
            // return $mrpprice[0];
            $sel_price[0]= $request->selling_price;

            $measurs = $measur[0];
            $units = $unit[0];
            $status = $pstatus[0];
            $mprice = $mrpprice[0];
            $sprice = $sel_price[0];
            $discount = $mprice[0] - $sprice[0];

            $measurement = $measurs[0];
            $unit = $units[0];
            $pstatus = $status[0];
            $mrp_price = $mprice[0];
            $selling_price = $sprice[0];
            $discount = $discount;
            //--close
        
            // $explode = explode(',', $request->category);
            // $category=  $explode[0];
            // $cname=  $explode[1];
            //$addproduct->sub_category = $request->sub_category;
            // if($request->sub_category!=""){
            //     $subcat = explode(',', $request->sub_category);
            //     $sub_category=  $subcat[0];
            //     $scname=  $subcat[1];
            // }else{
            //     $sub_category="";
            //     $scname="";
            // }

            $cat = $request->cat;
            foreach($cat as  $vsalue)
            {
                $cat_val[] = $vsalue;
            }
            $category = implode(',', $cat_val);
            
            $manufacturer = $request->manufacturer;
            $made_in = $request->made_in;
            $shipping_type = $request->shipping_type;
            $delivery_places = $request->delivery_places;

            //--start
            $pin = $request->pincode;
            if($pin==""){
                $pinco="";
            }else{
                $j=0;
                foreach($pin as $prow)
                {
                    $pinc[] = $request->pincode[$j];
                    $j++;
                }
                $pinco= implode(',', $pinc);
            }
            $pincode= $pinco;
            //--close

            //--retuenable, cancelable, cod
            $return = $request->returnable;
            if($return==""){$returns='0';}else{$returns='1';}
            $calcel = $request->cancelable;
            if($calcel==""){$calcels='0';}else{$calcels='1';}
            $cod_a = $request->cod_allowed;
            if($cod_a==""){$cod='0';}else{$cod='1';}

            $returnable = $returns;
            $cancelable = $calcels;
            $cod_allowed = $cod;

            //--start single image
            if($request->itemimage!=""){
                $fname = time().'.'.$request->itemimage->extension();  
                $fileName = date('d-m-Y-H-i-s').$fname;
                $request->itemimage->move(public_path('productImage'), $fileName);
                $itemimage = $fileName;
                $itemimage;
            }
            else{
                $itemimage = $request->oldimage;
            }
            //--close single   oldmultimage

            //--pdf file
            // return $request->bookpdf;
            if($request->bookpdf != "")
            {
                $pdfname = time().'.'.$request->bookpdf->extension();  
                $fileNamepdf = date('d-m-Y-H-i-s').$pdfname;
                $request->bookpdf->move(public_path('productImage'), $fileNamepdf);
                $bookpdf = $fileNamepdf;
                $bookpdf;   
            }
            else
            {
                $bookpdf = $request->oldpdf;
            }
            //--pdf file

            //--start multiple image
            if($request->multi_image==""){
                $mul_image = $request->oldmultimage;
            }else{
                $images=array();
                if($files=$request->file('multi_image')){
                    foreach($files as $file){
                        $name=rand(000,999).$file->getClientOriginalName();
                        $file->move('multiImage',$name);
                        $images[]=$name;
                    }
                    $mul_image= implode(',', $images);
                }
            }
        //--close multiple image
        $multi_image = $mul_image;
        $itemimage = $itemimage;
        $short_desc = $request->short_desc;
        $full_desc = $request->full_desc;
        $return_condition = $request->return_condition;
        $shipping = $request->shipping;
        //print_r($short_desc);die;

        product::where('pid',$id)->update(['name'=>$pname,'product_code'=>$product_code,'hsn'=>$hsn,'slug'=>$slug,'multi_image'=>$multi_image,'itemimage'=>$itemimage,'bookpdf'=>$bookpdf,'short_desc'=>$short_desc,'full_desc'=>$full_desc,'return_condition'=>$return_condition,'shipping'=>$shipping,'returnable'=>$returnable,'cancelable'=>$cancelable,'cod_allowed'=>$cod_allowed,'category'=>$category,'pincode'=>$pincode,'manufacturer'=>$manufacturer,'made_in'=>$made_in,'shipping_type'=>$shipping_type,'delivery_places'=>$delivery_places,'measurement'=>$measurement,'unit'=>$unit,'pstatus'=>$pstatus,'mrp_price'=>$mrp_price,'selling_price'=>$selling_price,'discount'=>$discount]);
        
        //---productstock update
        $nunit = $request->unit;
        $i=0;
        foreach($nunit as $row)
        {
            $psid = $request->psid[$i];
            $pmeasurement = $request->measurement[$i];
            $unitid = $request->unit[$i];
            $new['dd']= Unit::where('uid',$request->unit[$i])->get('unit_name');
            foreach($new['dd'] as $ss){
                $punit = $ss->unit_name;
            } 
            //---unit close
            $pmrp_price = $request->mrp_price[$i];
            $pselling_price = $request->selling_price[$i]; 
            $pdiscount = $request->mrp_price[$i] - $request->selling_price[$i]; 
            $pstock = $request->stock[$i];
            $ppstatus = $request->pstatus[$i];
            Productstock::where('psid',$psid)->update(['pmeasurement'=>$pmeasurement,'unit_id'=>$unitid,'punit'=>$punit,'pmrp_price'=>$pmrp_price,'pselling_price'=>$pselling_price,'pdiscount'=>$pdiscount,'pstock'=>$pstock,'ppstatus'=>$ppstatus]);
            $i++;
        }
        //--mynew code--//
            $nnunit = $request->newunit;
            if($nnunit != "")
            {
                $j=0;
                foreach($nnunit as $key=>$row)
                {
                    $data = new Productstock();
                    $data->ppid = $id;
                    $data->pmeasurement = $request->measurement1[$j];
                    //--unit start
                    //$dunit = $request->unit[$i];
                    $expunit = $request->newunit[$j];
                     
                     
                    // $data->unit_id = $request->newunit[$j];
                    $new1['ddd']= Unit::where('uid',$request->newunit[$j])->get('unit_name');
                    $j=0;
                    foreach($new1['ddd'] as $ss){
                        $data->punit = $ss->unit_name;
                    }
                    $data->unit_id = $request->newunit[$j];
                    //return $data->punit;
                    
                    //--unit close
                    $data->pmrp_price = $request->mrp_price1[$j];
                    $data->pselling_price = $request->selling_price1[$j]; 
                    $data->pdiscount = $request->mrp_price1[$j] - $request->selling_price1[$j]; 
                    $data->pstock = $request->stock1[$j];
                    $data->ppstatus = $request->pstatus1[$j];
                    $data->save();
                    $j++;
                } 
            }
        
        
        return redirect('product')->with('success','Product Updated');
    }

    public function positionchange($request){
        $ps = $request->p;
        $i=1;
        foreach($ps as $prow){
            product::where('pid',$prow)->update(['position'=>$i]);
            $i++;
        }
        return back()->with('success','Position Updated');
    }

    public function destroy1($id){
        Product::where('pid', $id)->delete();
        return back()->with('success','Product Deleted');
    }
    
    public function destroy2($id){
        Cart::where('var_id',$id)->delete();
        
        Productstock::where('psid', $id)->delete();
        return back()->with('success','Product Deleted');
    }
}



