<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Services\AddressService;

class AddressController extends Controller
{
    protected $addressService;
    public function __construct(AddressService $addressService){
        $this->address = $addressService;
    }

    public function viewAddress(request $request){
        $userDetail = $request->user()->token();
        $uid = $userDetail->user_id;
        
        return $this->address->viewAddress($uid);

    }
    public function add_address(request $request){
        return $this->address->addAddress($request);
    }
    public function detail_address(request $request){
        $data['data']= $this->address->detailAddress($request);
        return response(['status'=>1,'msg'=>'View Address','data'=>$data],200);
    }

    public function update_address(request $request){
        return $this->address->updateAddress($request);

    }


    public function delete_address(request $request){
        
        return $this->address->deleteAddress($request);
    }

}
