<?php 
namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Address;
use App\Models\Product;
use App\Models\Wishlist;

class AddressService{

    public function viewAddress($uid){
        return Address::where('user_id', $uid)->where('status','1')
            ->get();
    }

    public function addAddress($request){
        $validate = Validator::make($request->all(), [
            //'fname' => 'required',
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
           // 'email' => 'required',
            'pincode' => 'required|min:6',
            //'address_line1' => 'required',
            //'country' => 'required',
            'city' => 'required',
        ]);

        if($validate->fails()){
            return response()->json(['error'=>$validate->errors()], 401);
        }else{

            $userDetail = $request->user()->token();
            $uid = $userDetail->user_id;

            $address = new Address();
            $address->user_id = $uid;
            $address->fname = $request->fname;
            $address->lname = $request->lname;
            $address->mobile_prefix = $request->mobile_prefix;
            $address->mobile = $request->mobile;
            $address->email = $request->email;

            $address->address_line1 = $request->address_line1;
            $address->address_line2 = $request->address_line2;
            $address->country = $request->country;
            $address->state = $request->state;
            $address->city = $request->city;
            $address->pincode = $request->pincode;
            $address->address_type = $request->address_type;

            if($address->Save()){
                $response = ['status'=>1,'title'=>'Address Successfully Added'];
                return $response;
            }
            else{
                $response = ['status'=>0,'title'=>'Address Not Added'];
                return $response;
            }
        }
          
    }
    
    public function detailAddress($request){
        $aid = $request->aid;
        return Address::Where('aid',$aid)->get();
    }

    public function updateAddress($request){
        $aid = $request->aid;

        $userDetail = $request->user()->token();
        $uid = $userDetail->user_id;
        $user_id = $uid;
        
        $fname = $request->fname;
        $lname = $request->lname;
        $mobile_prefix = $request->mobile_prefix;
        $mobile = $request->mobile;
        $email = $request->email;

        $address_line1 = $request->address_line1;
        $address_line2 = $request->address_line2;
        $country = $request->country;
        $state = $request->state;
        $city = $request->city;
        $pincode = $request->pincode;
        $address_type = $request->address_type;

        $result= Address::Where('aid',$aid)->update(['user_id'=>$uid,'fname'=>$fname,'lname'=>$lname,'mobile_prefix'=>$mobile_prefix,'mobile'=>$mobile,'email'=>$email,'address_line1'=>$address_line1,'address_line2'=>$address_line2,'country'=>$country,'state'=>$state,'city'=>$city,'pincode'=>$pincode,'address_type'=>$address_type]);
        if($result){
            return response(['status'=>1,'msg'=>'Update Address'],200);
        }else{
            return response(['status'=>0,'msg'=>'Address Not Updated'],200);
        }
    }

    public function deleteAddress($request){
        $aid = $request->aid;
        $address = Address::where('aid', $aid)
                ->update(['status'=>'0']);
        if($address==true){
            $response = ['status'=>1,'title'=>'Delete Address'];
        }else{
            $response = ['status'=>0,'title'=>'Address not Delete'];
        }
        return $response;
    }

    public function updateQty($pid,$uid,$qty){
        $cart = Cart::where('uid', $uid)
            ->where('pid',$pid) 
            ->update(['qty'=>$qty]);
        if($cart==true){
           
            $response = ['status'=>1,'title'=>'Quantity Updated'];
        }else{
            $response = ['status'=>0,'title'=>'Quantity not updated'];
        }
        return $response;
    }

    public function moveWishlist($requset){
        $userDetail= $request->user()->token();
        $uid = $userDetail->user_id;
        $pid = $request->pid;
        
        $move = new Wishlist();
        $move->pid = $pid;
        $move->uid = $uid;
        if($cart->Save()){
            $response = ['status'=>1,'title'=>'Product added to cart'];
            return $response;
        }
        else{
            $response = ['status'=>0,'title'=>'Product not added to cart'];
            return $response;
        }
        
    }
}