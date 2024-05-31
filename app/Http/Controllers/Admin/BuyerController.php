<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserProfile;

class BuyerController extends Controller
{
    public function __construct( UserProfile $user )
    {
        $this->users = $user;
    }
    
    public function index(){
        $data['title'] = 'Buyer';
        $data['list']= $this->users->getBuyer();  
        return view('admin.buyer.index',$data);
    }
}
