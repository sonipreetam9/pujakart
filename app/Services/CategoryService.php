<?php 
namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\Product;

class CategoryService{

    public function categoryList($request){

        $cat = Category::where('cslug',$request->slug)->where('status',1)->get('sid');
        if(count($cat)==0){
      
            return 'No Category Found';
        }else{
            $cid = $cat[0]->sid;
        
            return Product::orderBy("position","asc")->whereRaw('FIND_IN_SET("'.$cid.'",category)')->where('pstatus',1)
                ->get();
        }
    }

}