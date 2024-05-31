<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Models\Address;
use App\Models\Order;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    protected $orderService;
    public function __construct(OrderService $orderService)
    {
       $this->order = $orderService;
    } 

    public function index(){
        $data['title'] = 'View Orders';
        $data['order']= ($this->order->getOrder());
        //return $data['order'];
        return view('admin.order.index',$data);
    }
    
    public function edit($id){
        $data['title']='Update Order';
        $data['list']= $this->order->getOrderdetail($id);
        $orderid = $data['list'][0]->order_id;
        $data['detail']= $this->order->detailsOrder($orderid);
        //return $data['detail'];
        return view('admin.order.edit',$data);
    }
    
    public function update(request $request,$id){
        return $this->order->orderupdate($request,$id);
    }
    
    public function order_invoice($id){
        $data['title']='Invoice Order';
        $data['list']= $this->order->getOrderdetail($id);
        //return $data['list'];
        
        $orderid = $data['list'][0]->order_id;
        $data['detail']= $this->order->detailsOrder($orderid);
        //return $data['detail'];
        return view('admin.order.invoice',$data);
    }
    //-- close
    
    
    //--Return order
    public function return_order(){
        $data['title'] = 'View Return Orders';
        $data['order']= $this->order->getreturnOrder();
        return view('admin.order.return',$data);
    }
     public function edit_return($id){
        $data['title']='Update Return Order';
        $data['list']= $this->order->returndetail($id);
        return view('admin.order.return_edit',$data);
    }
    public function update_return(request $request,$id){
        return $this->order->returnUpdate($request,$id);
    }
    //-- close
   
    
    
    //--exchange order 
    public function exchange_order(){
        $data['title'] = 'View Exchange Orders';
        $data['order']= $this->order->getexchangeOrder();
        return view('admin.order.exchange',$data);
    }
    public function edit_exchange($id){
        $data['title']='Edit Exchange Order';
        $data['list']= $this->order->detail($id);
        //return $data['detail'];
        return view('admin.order.exchange_edit',$data);
    }
    public function update_exchange(request $request,$id){
        return $this->order->exchangeUpdate($request,$id);
    }
    //--Close
    
    
    
    //--cancel order
    public function cancel_order(){
        $data['title'] = 'View Cancel Orders';
        $data['order']= $this->order->getcancelOrder();
        return view('admin.order.cancel',$data);
    }
     public function edit_cancel($id){
        $data['title']='Update Cancel Order';
        $data['list']= $this->order->cancelDetail($id);
        return view('admin.order.cancel_edit',$data);
    }
    public function update_cancel(request $request,$id){
        return $this->order->cancelUpdate($request,$id);
    }
    //-- Close
    
     public function paypayment(request $request)
    {
        //return $request->uid;
        $userInfo = Address::where('aid',$request->address_id)->first();
        $uname = $userInfo->fname.' '.$userInfo->lname;
        $uaddress = $userInfo->address_line1.' '.$userInfo->address_line2;
        $umobile = $userInfo->mobile;
        $uemail = $userInfo->email;
        $ustate = $userInfo->state;
        $ucity = $userInfo->city;
        $upincode = $userInfo->pincode;
                    
        //----return $umobile;----//
        $amount = $request->amount;
                    
        $input['amount'] = $amount;
        $input['order_id'] = $request->oid;
        $input['currency'] = "INR";
        $input['redirect_url'] = "https://workshipapp.awd.world/ccavResponseHandler.php";
        $input['cancel_url'] = "https://workshipapp.awd.world/ccavResponseHandler.php";
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
            
        foreach ($input as $key => $value) {
            $merchant_data .= $key . '=' . $value . '&';
        }
                
        $encrypted_data = $this->encrypt($merchant_data, $working_key);
        // return $encrypted_data;
        $url ='https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction&encRequest='.$encrypted_data.'&access_code='.$access_code;
        
        return redirect($url);
    }
    
    public function cancelResponseData(Request $request){
        // return "Hello";
        return $request;
    }
    
    
    public function handleResponseData(Request $request){
        // dd($request);
        
        return view('ccavResponseHandler');
        
        //return $request;
        $working_key = "B3C750C696EFBB5ED13C8F22B1C0BA6F";  //Shared by CCAVENUES
        
        $encResponse = $_POST["encResp"];

        $rcvdString = $this->decrypt($encResponse, $workingKey);    //Crypto Decryption used as per the specified working key.
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
            Order::where('oid',$order_id)->update(['payment_status'=>'Success']);
            return "Success";
        }
        else{
            Order::where('oid',$order_id)->update(['payment_status'=>'failed']);
            return "Failed";
        }
    }
    
    
    
    public function initiatePayment(request $request){       
        // $token = Session::token();
        // $input['_token'] = $token;
        $input['amount'] = 1;
        $input['order_id'] = "123XSDDD499";
        $input['currency'] = "INR";
        $input['redirect_url'] = "https://workshipapp.awd.world/ccavResponseHandler.php";
        $input['cancel_url'] = "https://workshipapp.awd.world/ccavResponseHandler.php";
        $input['language'] = "EN";
        $input['merchant_id'] = "3266163";
        $input['billing_name'] = "Chandrasen";
        $input['billing_address'] = "10 no market bhopal";
        $input['billing_city'] = "Bhopal";
        $input['billing_state'] = "MP";
        $input['billing_zip'] = "462021";
        $input['billing_country'] = "India";
        $input['billing_tel'] = "7987292515";
        $input['billing_email'] = "chandrasen@gmail.com";
        $merchant_data = "";

        $working_key = "B3C750C696EFBB5ED13C8F22B1C0BA6F"; //Shared by CCAVENUES
        $access_code = "AVPQ79LD71BJ77QPJB"; //Shared by CCAVENUES
        
        foreach ($input as $key => $value) {
            $merchant_data .= $key . '=' . $value . '&';
        }
        // return $merchant_data;
        $encrypted_data = $this->encrypt($merchant_data, $working_key);
        // $url = config('cc-avenue.https://secure.ccavenue.com') . '/transaction/transaction.do?command=initiateTransaction&encRequest=' . $encrypted_data . '&access_code=' . $access_code;
        $url ='https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction&encRequest='.$encrypted_data.'&access_code='.$access_code;
        return redirect($url);
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
        return $binString; 
    }
    

}
