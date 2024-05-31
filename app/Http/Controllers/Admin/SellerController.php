<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserProfile;

class SellerController extends Controller
{
    public function __construct( UserProfile $user )
    {
        $this->users = $user;
    }
    
    public function index(){
        $data['title'] = 'Buyer';
        $data['list']= $this->users->getSeller();
        return view('admin.seller.index',$data);
    }
}
