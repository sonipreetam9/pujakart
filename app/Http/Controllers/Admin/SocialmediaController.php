<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialMedia;

class SocialmediaController extends Controller
{
    public function __construct(SocialMedia $social )
    {
        $this->social = $social;
    }

    public function index(){
        $data['title'] = 'Social Media Link';
        //$data['list'] = array();
        $data['list']= $this->social->getAll();
        return view('admin.socialmedia.index',$data);
    }

    public function edit($id){
        $data['title']='Update Media Link';
        $data['list']= $this->social->detail($id);
        //print_r($data['list']);die;
        return view('admin.socialmedia.edit',$data);
    }
    public function update(request $request,$id){
        return $this->social->socialupdate($request,$id);
    }

}
