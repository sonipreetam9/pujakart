<?php 
namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Address;
use App\Models\Promocode;
use App\Models\Order;

class PromocodeService{

    public function applyCoupon($request){
        $code =  $request->coupon_code;
        return Promocode::where('promocode',$code)
            ->where('status','1')
            ->get();
    }  
    public function checkDate($current_date,$code){
        return Promocode::where('status','1')
                ->where('promocode',$code)
                ->where('start_date','<=',$current_date)
                ->where('end_date','>=',$current_date)
                ->get();
    }
    public function no_of_user($request){
        return Order::where('coupon_code',$request->coupon_code)
                    ->get();
    }

    
}