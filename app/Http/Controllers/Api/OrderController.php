<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Models\User; 
use App\Models\Order; 
use App\Models\Address; 
use App\Models\Cart;

use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    protected $OrderService;
    public function __construct(OrderService $OrderService){
        $this->order = $OrderService;
    }

    public function checkout(request $request){
           $validator = Validator::make($request->all(), [
            'address_id' => 'required',
        ]);
        if($validator->fails())
        {
            return response(['status'=>0,'msg'=>'Address is required'],200); 
            // return redirect("/")->with('error',$validator->errors()->all());
        }
        return $this->order->checkOut($request);
    }

    public function orderlist(request $request){
        
        $data['order'] = $this->order->orderList($request);
        
        foreach($data['order'] as $key=>$row){
                if($row->status_order==0){
                    $odstatus='Pending';
                }elseif($row->status_order==1){
                    $odstatus='Processing';
                }
                elseif($row->status_order==2){
                    $odstatus='Packed';
                }elseif($row->status_order==3){
                    $odstatus='Shipment';
                }elseif($row->status_order==4){
                    $odstatus='Delivered';
                }elseif($row->status_order==5){
                    $odstatus='Cancel Request Accept';
                }
                elseif($row->status_order==55){
                    $odstatus='Cancel Request';
                }
                elseif($row->status_order==555){
                    $odstatus='Cancel Request Reject';
                }
                elseif($row->status_order==6){
                    $odstatus='Return Request Accept';
                }
                elseif($row->status_order==66){
                    $odstatus='Return Request';
                } 
                elseif($row->status_order==666){
                    $odstatus='Return Request Reject';
                }
                elseif($row->status_order==6666){
                    $odstatus='Return Completed';
                }
                elseif($row->status_order==7){
                    $odstatus='Exchange Request Accept';
                } 
                elseif($row->status_order==77){
                    $odstatus='Exchange Request';
                }
                elseif($row->status_order==777){
                    $odstatus='Exchange Request Reject';
                }
                elseif($row->status_order==7777){
                    $odstatus='Exchanged';
                }
                elseif($row->status_order==8){
                    $odstatus='Confirm';
                }
                elseif($row->status_order==9){
                    $odstatus='Order Reject';
                }
            $data['order'][$key]->order_status=$odstatus;
                
            if($row->delivered_completed_on!=NULL){  
                $data['order'][$key]->expected_delivery_date=NULL;   
            }else{ 
                $data['order'][$key]->expected_delivery_date=$row->delivered_on; 
            }
            $data['order'][$key]->delivered_on= $row->delivered_completed_on;

        }
        return response(['status'=>1,'msg'=>'Order List','data'=>$data],200);
    }

    public function orderdetail(request $request){

        $data['order'] = $this->order->orderDetail($request);
        // return $data['order'];
        $add_id=$data['order'][0]->address_id;
                $ShowReturButton = 0;
        foreach($data['order'] as $key=>$row)
        {
            $oid = $row->order_id;
            $order_det = $this->order->orderdetailList($oid);
                
            if(($row->status_order==0)||($row->status_order==1)||($row->status_order==2)||($row->status_order==3) || ($row->status_order==8)){
                $canCancel = '1';
                $canReturn = '0';
            }
            elseif(($row->status_order==6) || ($row->status_order==66) || ($row->status_order==666)|| ($row->status_order==6666) || ($row->status_order==9) || ($row->status_order==5) || ($row->status_order==55) ||($row->status_order==555) || ($row->status_order==777) || ($row->status_order==77)  ||  ($row->status_order==7) || ($row->status_order==7777)  ){
                $canCancel = '0';
                $canReturn = '0';
            }
            else{
                $canCancel = '0';
                $canReturn = '1';
            }
                
                $data['order'][$key]->can_cancel=$canCancel;
                $data['order'][$key]->can_return=$canReturn;
                
                // return $row->status_order;
                if($row->status_order==0){
                    $odstatus='Pending';
                }elseif($row->status_order==1){
                    $odstatus='Processing';
                }
                elseif($row->status_order==8){
                    $odstatus='Confirm';
                }
                elseif($row->status_order==2){
                    $odstatus='Packed';
                    
                }elseif($row->status_order==3){
                    $odstatus='Shipment';
                     
                }elseif($row->status_order==4){
                    $odstatus='Delivered';
                    
                }elseif($row->status_order==5){
                    $odstatus='Cancel Request Accept';
                }
                elseif($row->status_order==55){
                    $odstatus='Cancel Request';
                }
                elseif($row->status_order==555){
                    $odstatus='Cancel Request Reject';
                }
                elseif($row->status_order==6){
                    $odstatus='Return Request Accept';
                }
                elseif($row->status_order==66){
                    $odstatus='Return Request';
                } 
                elseif($row->status_order==666){
                    $odstatus='Return Request Reject';
                }
                elseif($row->status_order==6666){
                    $odstatus='Return Completed';
                }
                elseif($row->status_order==7){
                    $odstatus='Exchange Request Accept';
                } 
                elseif($row->status_order==77){
                    $odstatus='Exchange Request';
                }
                elseif($row->status_order==777){
                    $odstatus='Exchange Request Reject';
                }
                elseif($row->status_order==7777){
                    $odstatus='Exchanged';
                }
                elseif($row->status_order==9){
                    $odstatus='Order Reject';
                }
                
            $data['order'][$key]->order_status=$odstatus;
            // $data['order'][$key]->can_exchange=1;
            
            //--==--Delivered on --//   
            if($row->delivered_completed_on!=NULL){  
                $data['order'][$key]->expected_delivery_date=NULL;   
            }else{ 
                $data['order'][$key]->expected_delivery_date=$row->delivered_on; 
            }
            $data['order'][$key]->delivered_on= $row->delivered_completed_on;
            //--Close--//
           
        }

        foreach($order_det as $key=>$value){
            // return $value->returnable;
            if($value->returnable==1){

                $ShowReturButton = 1;
            }
            $order_det[$key]->pro_img= env('APP_URL').'productImage/'.$value->pro_img;
            $order_det[$key]->itemimage= env('APP_URL').'productImage/'.$value->itemimage;
            $discountAmt = $value->mrp_price - $value->selling_price;
            if($discountAmt==0)
            { $discount = 0;}
            else{
                $discount= ($discountAmt / $value->mrp_price) * 100;
            }
            $order_det[$key]->discount= round($discount,0);
        }
        $data['detail'] = $order_det;
        $data['order'][0]->can_return=$ShowReturButton;
        //   $canReturn = $ShowReturButton;
        //return $data['detail'];
        $data['user_address']=Address::where('aid',$add_id)->first();
        return response(['status'=>1,'msg'=>'Order Detail','data'=>$data],200);
    }
    
    public function updateOrderStatus(request $request){
      
      if($request->post('status')==66){
            $validator = Validator::make($request->all(), [
            'order_id' => 'required',
            'status' => 'required',
   
        ]); 
      }elseif($request->post('status')==77){
                $validator = Validator::make($request->all(), [
            'order_id' => 'required',
            'status' => 'required',
            'reason_type' =>'required',
            'reason'=>'required'
        ]);  
      }else{
            $validator = Validator::make($request->all(), [
            'order_id' => 'required',
            'status' => 'required',
            'reason_type' =>'required',
            'reason'=>'required'
        ]);  
      }
     
        
        if ($validator->fails())
        {
             $msg= $validator->errors()->all();
            
            // return explode(',',$msg);
            return response(['status'=>0,'errors'=>$msg], 200);
        }else{
            
            Order::where('order_id',$request->post('order_id'))->update(['status_order'=>$request->post('status'),'reason_type'=>$request->post('reason_type'),'reason'=>$request->post('reason')]);
            return response(['status'=>1,'msg'=>'Order Status Updated'],200);
        }
    }
    
    public function orderTransaction(request $request){
        //return 'Yes';
        $userDetail = $request->user()->token();
        $order= Order::where('user_id',$userDetail->user_id)
            ->where('status_order','4')
            ->orderBy('order_id','desc')
            ->get();
        if(count($order)>0){
            $data['txn']=$order;
            return response(['status'=>1,'msg'=>'Order Found','data'=>$data],200);
        }
        return response(['status'=>0,'msg'=>'No Order Found'],200);
    }
    
    public function paypayment(request $request)
    {
        return $request->get('oid');
        $cart = Cart::Where('uid',$request->uid)
            ->leftJoin('products', 'carts.pid', '=', 'products.pid')
            ->get();
        
        $userInfo = Address::where('aid',$request->address_id)->first();
        $uname = $userInfo->fname.' '.$userInfo->lname;
        $uaddress = $userInfo->address_line1.' '.$userInfo->address_line2;
        $umobile = $userInfo->mobile;
        $uemail = $userInfo->email;
        $ustate = $userInfo->state;
        $ucity = $userInfo->city;
        $upincode = $userInfo->pincode;
                    
        //---==---return $umobile;
        $amount = $request->amount;
                    
        $input['amount'] = 1;
        $input['order_id'] = $request->oid;
        $input['currency'] = "INR";
        $input['redirect_url'] = "https://workshipapp.awd.world/api/handleResponse/";
        $input['cancel_url'] = "https://workshipapp.awd.world/api/handleResponse/";
        $input['language'] = "EN";
        $input['merchant_id'] = "3266163";
        $input['billing_name'] = $uname;
        $input['billing_address'] = $uaddress;
        $input['billing_city'] = $ucity;
        $input['billing_state'] = $ustate;
        $input['billing_zip'] = $upincode;
        $input['billing_country'] = "India";
        $input['billing_tel'] = $umobile;
        $input['billing_email'] = $uemail;
        
        $merchant_data = "";
            
        $working_key = "B3C750C696EFBB5ED13C8F22B1C0BA6F"; //Shared by CCAVENUES
        $access_code = "AVPQ79LD71BJ77QPJB"; //Shared by CCAVENUES
            
        // $input['merchant_param1'] = "test"; // optional parameter
        // $input['merchant_param2'] = "asdas"; // optional parameter
        // $input['merchant_param3'] = "asdas"; // optional parameter
        // $input['merchant_param4'] = "asdsa"; // optional parameter
        // $input['merchant_param5'] = "asdas"; // optional parameter
                    
        foreach ($input as $key => $value) {
            $merchant_data .= $key . '=' . $value . '&';
        }
                
        $encrypted_data = $this->encrypt($merchant_data, $working_key);
        // return $encrypted_data;
        $url ='https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction&encRequest='.$encrypted_data.'&access_code='.$access_code;
        
        return redirect($url);
        // $response = ['status'=>1,'title'=>'Online Payment','data'=>$url];
        // return $response;
    }
    
    
    //===response payment 
    public function handleResponseData(request $request){
        $working_key = "B3C750C696EFBB5ED13C8F22B1C0BA6F";   //Shared by CCAVENUES
        
        $encResponse = $_POST["encResp"];

        $rcvdString = $this->decrypt($encResponse, $workingKey);   //Crypto Decryption used as per the specified working key.
        $order_status = "";
        $decryptValues = explode('&', $rcvdString);
        $dataSize = sizeof($decryptValues);
        
       
        for($i = 0; $i < $dataSize; $i++) 
    	{
    		$information=explode('=',$decryptValues[$i]);
    		if($i==0){	$order_id=$information[1];  }
    		if($i==3){	$order_status=$information[1];  }
    	}
    	
        if($order_status==="Success"){
            
            // $order = Order::where('oid',$order_id)->first();
            // $uid = $order->user_id;
            // Cart::where('uid', $uid)->delete();
            
            Order::where('oid',$order_id)->update(['payment_status'=>'Success']);
            return "Success";
        }
        else{
            Order::where('oid',$order_id)->update(['payment_status'=>'failed']);
            return "Failed";
        }
    }
    
    public function encrypt($plainText,$key)
    {
    	$key = $this->hextobin(md5($key));
    	$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
    	$openMode = openssl_encrypt($plainText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
    	$encryptedText = bin2hex($openMode);
    	return $encryptedText;
    }
    
    public function decrypt($encryptedText,$key)
    {
    	$key = $this->hextobin(md5($key));
    	$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
    	$encryptedText = hextobin($encryptedText);
    	$decryptedText = openssl_decrypt($encryptedText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
    	return $decryptedText;
    }
    
    public function hextobin($hexString) 
    { 
    	$length = strlen($hexString); 
    	$binString="";   
    	$count=0; 
    	while($count<$length) 
    	{       
    	    $subString =substr($hexString,$count,2);           
    	    $packedString = pack("H*",$subString); 
    	    if ($count==0)
    	    {
    			$binString=$packedString;
    	    } 
    	    else 
    	    {
    			$binString.=$packedString;
    	    } 
    	    $count+=2; 
    	}
    }
    //====close response ====//
        
    
}
