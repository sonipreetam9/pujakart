<?php
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Productstock;
class ProductService{

    public function detail($request){
        
        $pro= Product::where('slug', $request->slug)->get();
        if(count($pro)==0){
            // return "0";
        }
        else{
            $pstock= Productstock::where('psid',$request->var)->orderby('psid','ASC')->get();
            if(count($pstock)==0){
                
            }else{
                $pro[0]->pro_mrp=  $pstock[0]->pmrp_price;
                $pro[0]->pro_price=  $pstock[0]->pselling_price;
                $pro[0]->pro_discount=  $pstock[0]->pdiscount;
                $pro[0]->pro_pstock=  $pstock[0]->pstock;
                $pro[0]->pro_discount=  $pstock[0]->pdiscount;
                $discountAmt1 = $pstock[0]->pmrp_price -$pstock[0]->pselling_price;
                $discount1= ($discountAmt1 / $pstock[0]->pmrp_price) * 100;
                $pro[0]->pro_discount = round($discount1,0);
                return $pro;
            }
        }
        // ->leftJoin('productstocks', 'products.pid', '=', 'productstocks.ppid')
    }

    public function search($request){
        return Product::where('name', 'LIKE', '%'.$request->name.'%')
		            ->get();
    }

    public function listing($request){
        $cid = $request->cid;
        $cat = explode(',',$cid);
        foreach($cat as $crow){
            $data[]= Product::whereRaw('FIND_IN_SET("'.$crow.'",category)')
                        ->get();
        }
        return $data;
    }
    

}