<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserProfile;
use App\Models\User;

class UserController extends Controller
{
    public function __construct( UserProfile $user )
    {
        $this->users = $user;
    }
    
    public function index(){
        $data['title'] = 'Users';
        $data['list']= $this->users->getUsers();  
        return view('admin.user.index',$data);
    }
    
    public function delete($id){
        User::where('id', $id)->delete();
        return back()->with('success','User Deleted'); 
    }
    
    public function details($id){
        $data['title'] = 'User Detail';
        $data['list'] = User::where('id', $id)->first();
        return view('admin.user.detail',$data); 
    }
    
    public function edit($id){
        $data['title'] = 'Update';
        $data['list'] = User::where('id', $id)->first();
        return view('admin.user.edit',$data); 
    }
    
    public function update(request $request,$id){
        User::where('id',$id)->update(['name'=>$request->name,'email'=>$request->email,'mobile'=>$request->mobile,'status'=>$request->status]);
        return back()->with('success','User Updated');
    }
    
}




