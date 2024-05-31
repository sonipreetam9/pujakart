<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function deleteAccount(){
        $data['title']= 'Delete Account';
        return view('deleteAccount',$data);
    }
    public function deleteMyAccount(){
        //  return back()->with('success','Account Deleted Successfully');
    return "<center><br/><br/>ACCOUNT DELETED SUCCESSFULLY <br/><br/><a href='https://workshipapp.awd.world/delete-account'>GO BACK</a></center>";
;                         return redirect()->back()->with('success','User Auth Successfully');
    }
    public function adminlogin(){ 

        $data['title'] ='Login';
        if(Auth::check()){
            if(Auth::user()->role==1){ 
                //ADMIN ROLE
                return redirect('dashboard')->with('success','User Auth Successfully');

            }
            if(Auth::user()->role==2){
                //HUB ROLE
                return redirect('hubpanel')->with('success','User Auth Successfully');

            }
            if(Auth::user()->role==3){
                //CUSTOMER ROLE
                echo "Customer Login";
                
            }

        }
        return view('admin/auth/login',$data);
    }
    public function authadmin(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            
        ]);
 
        if (Auth::attempt($credentials)) {
            if(Auth::user()->role==1){
                //ADMIN ROLE
                return redirect('dashboard')->with('success','Admin Auth Successfully');
            }
            if(Auth::user()->role==2){
                //HUB ROLE
                return redirect('hubpanel')->with('success','User Auth Successfully');
            }
            if(Auth::user()->role==3){
                //CUSTOMER ROLE
                echo "Customer Login";
            }
            //Intent use to redirect back the locotion comes from
            // return redirect()->intended('admindashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
        
    }
    public function unauthorized(){
        Auth::logout();
        return redirect('login');
        echo "Unauthorized access from middleware"; 
    }
    public function logout_admin(){
        Auth::logout();
        return redirect('login');
    }
}
