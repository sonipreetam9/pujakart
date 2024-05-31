<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PincodeService;

class PincodeController extends Controller
{
    protected $profileService;
    public function __construct(PincodeService $pincodeService)
    {
       $this->pincode = $pincodeService;
    } 
    public function checkpincode(request $request){
        return $this->pincode->checkPin($request);
    }
}
