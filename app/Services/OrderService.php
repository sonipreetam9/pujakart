<?php 
namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Address;
use App\Models\Product;
use App\Models\Orderdetail;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Productstock;
use App\Models\ShippingCharges;
use App\Models\Setting;

class OrderService{

    public function orderList($request){
        $userDetail = $request->user()->token();
        $uid = $userDetail->user_id;
        //$list = Order::where('user_id',$uid)->get();
        //print_r($list[0]->address_id);die;
        return Order::where('user_id',$uid)
            ->leftJoin('users', 'orders.user_id', '=', 'users.id')
            ->orderby('orders.order_id', 'DESC')
            ->get();
    }
    public function orderDetail(request $request){
        $userDetail = $request->user()->token();
        $uid = $userDetail->user_id;
        $order_id = $request->order_id;
        return Order::where('order_id',$order_id)
            ->leftJoin('users', 'orders.user_id', '=', 'users.id')
             ->orderby('orders.order_id', 'DESC')
            ->get();
    } 
    public function orderdetailList($oid){
        return Orderdetail::where('order_id',$oid)
            ->leftJoin('products', 'orderdetails.p_id', '=', 'products.pid')
            ->get();
    }

    public function Checkout($request){
        $userDetail = $request->user()->token();
        $uid = $userDetail->user_id;
        
        $cart = Cart::Where('uid',$uid)
                ->leftJoin('products', 'carts.pid', '=', 'products.pid')
                ->get();
        //return $uid;
        
        $total=0;  
        foreach($cart as $crow){
            //--mycode
            $prostock = Productstock::where('psid',$crow->var_id)->get();
            $total = $total + $crow->qty*$prostock[0]->pselling_price;
            //--close--//
            // $total = $total + $crow->qty*$crow->selling_price;
        }
        $tax =0;
        
        //$coupon_amount = 0;
        $coupon_code = $request->coupon_code;
        if($request->coupon_amount==""){
            $coupon_amount = 0;
        }else{
            $coupon_amount = $request->coupon_amount;
        }
        //$coupon_amount = $request->coupon_amount;
        $grandtot = $tax + $total;
        
        //--mycode--//
        $charges = Shippingcharges::Where('shipping_min_amount', '>=', $grandtot)->get();
        if(sizeof($charges)!=0){
            $shipping = $charges[0]->charges;
        }else{
            $shipping =0;
        }
        //----close----//
        
        $grandtotal = $grandtot + $shipping - $coupon_amount;
        //print_r($grandtotal);die;
        $orderDate =  date('Y-m-d');
        $orderTime = date("h:i:s");
        // $payment_mode = "cod";
        $payment_status = "pending";
        $address_id = $request->address_id;
        
        $minimum = Setting::Where('id','5')->get();
        $minorder = $minimum[0]->option_value;
        if($minorder <= $grandtotal)
        {
            //--save order--//
            $order= new Order();
            $order->user_id = $uid;
            $order->address_id = $request->address_id;
            $order->subtotal = $total;
            $order->tax = $tax;
            $order->coupon_code = $coupon_code;
            $order->coupon_discount = $coupon_amount;
            $order->delivery_charge = $shipping;
            $order->grand_total = $grandtotal;
            $order->order_date = $orderDate;
            $order->order_time = $orderTime;
            $order->payment_mode = $request->payment_type;
            $order->payment_status = $payment_status;

            if($order->Save()){
                $last_oid = $order->id;
                foreach($cart as $drow)
                {
                    //--- mycode ---//
                    $productstock = Productstock::where('psid',$drow->var_id)->get();
                    $mrp = $productstock[0]->pmrp_price;
                    $selling = $productstock[0]->pselling_price;
                    $stock = $productstock[0]->pstock - $drow->qty;
                    $unit = $productstock[0]->punit;
                    //--- mycode ---//
                    $detail = new Orderdetail();
                    $detail->order_id = $last_oid;
                    $detail->user_id =$uid;
                    $detail->p_id = $drow->pid;
                    $detail->var_id = $drow->var_id;
                    $detail->pro_img = $drow->itemimage;
                    $detail->pname = $drow->name;
                    $detail->size = $unit;
                    $detail->qty = $drow->qty;
                    // $detail->mrp = $drow->mrp_price;
                    // $detail->price = $drow->selling_price;
                    $detail->mrp = $mrp;
                    $detail->price = $selling;
                    // $detail->subtotal = $drow->qty * $drow->selling_price;
                    $detail->subtotal = $drow->qty * $selling;
                    $detail->Save();
                    
                    //--new start
                    Productstock::where('psid',$drow->var_id)->update(['pstock'=>$stock]);
                }
                $userDetail = $request->user()->token();
                $uid = $userDetail->user_id;
                
                $ptype= $request->payment_type;
                if($ptype=='cod'){
                    Cart::where('uid', $uid)->delete();
                    $response = ['status'=>1,'title'=>'Order Successfully'];
                }else{
                    //===online payment===//
                  
                    $data['oid'] = $last_oid;
                    $data['amount'] = $grandtotal;
                    $data['uid'] =  $uid;
                    $data['address_id'] = $address_id;
                    
                    $response = ['status'=>1,'title'=>'Online Payment','data'=>$data];
                }
                return $response;
            }
            else{
                $response = ['status'=>0,'title'=>'Order Failed'];
                return $response;
            }
        }
        else{
            $response = ['status'=>0,'title'=>"Minimum Order- $minorder"];
            return $response;
        }
    }
    
    //--Cancel return order
    public function getcancelOrder(){
        return Order::where('status_order','5')
            ->orwhere('status_order','55')
            ->orwhere('status_order','555')
            ->leftJoin('users', 'orders.user_id', '=', 'users.id')
            ->orderby('orders.order_id', 'DESC')
            ->get();
    }
    public function cancelDetail($id){
        return Order::where('order_id',$id)
            ->get();
    }
    public function cancelUpdate($request,$id){
        $status_order = $request->status_order;
        //return $status_order;
        Order::where('order_id',$id)
            ->update(['status_order'=>$status_order,'admin_reason'=>$request->reason]);
        return back()->with('success','Status Updated Successfully');
    }
    
    //--update return order
    public function getreturnOrder(){
        return Order::where('status_order','6')
            ->orwhere('status_order','66')
            ->orwhere('status_order','666')
            ->leftJoin('users', 'orders.user_id', '=', 'users.id')
            ->orderby('orders.order_id', 'DESC')
            ->get();
    }
    public function returndetail($id){
        return Order::where('order_id',$id)
            ->get();
    }
    public function returnUpdate($request,$id){
        $status_order = $request->status_order;
        Order::where('order_id',$id)
            ->update(['status_order'=>$status_order,'admin_reason'=>$request->reason]);
        return back()->with('success','Status Updated Successfully');
    }
    
    //--exchange return order
    public function getexchangeOrder(){
        return Order::where('status_order','7')
            ->orwhere('status_order','77')
            ->orwhere('status_order','777')
            ->leftJoin('users', 'orders.user_id', '=', 'users.id')
            ->orderby('orders.order_id', 'DESC')
            ->get();
    }
    public function detail($id){
        return Order::where('order_id',$id)
            ->get();
    }
    public function exchangeUpdate($request,$id){
        $status_order = $request->status_order;
        //return $status_order;
        Order::where('order_id',$id)
            ->update(['status_order'=>$status_order,'admin_reason'=>$request->reason]);
        return back()->with('success','Status Updated Successfully');
    }
    
    //--View all Order start
    public function getOrder(){
        return Order::select('*')
            ->orderBy('orders.order_id', 'desc')
            ->leftJoin('users', 'orders.user_id', '=', 'users.id')
            ->get();
    }

    //--Website data
    public function getOrderdetail($id){
        return Order::where('order_id',$id)
            ->leftJoin('addresses', 'orders.address_id', '=', 'addresses.aid')
            ->get();
    }

    public function detailsOrder($orderid){
        return Orderdetail::where('order_id',$orderid)
            ->leftJoin('units', 'orderdetails.size', '=', 'units.uid')
            ->leftJoin('products', 'orderdetails.p_id', '=', 'products.pid')
            ->get();
    }

    public function orderupdate($request,$id){
        $deliveryon = $request->delivered_on;
        
        if($request->order_status=='4'){
            $orderDeliverOn= date('Y-m-d');   
        }else{
            $orderDeliverOn=NULL;
        }
        
        //$exchangeon = $request->exchange_on;
        Order::where('order_id',$id)->update(['status_order'=>$request->order_status,'delivered_on'=>$deliveryon,'admin_reason'=>$request->admin_reason,'delivered_completed_on'=>$orderDeliverOn]);
        return back()->with('success','Order Updated Successfully');
    }
    
    
    //==ccavnue===//
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
    
}


