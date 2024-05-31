<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\UserProfile;
use App\Services\AppAuthorizer;
use App\Models\User; 
use App\Models\Cart; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use App\Mail\ResetEmail;


class LoginUserController extends Controller
{
    protected $appAuthorizer;
    public function __construct(User $user, AppAuthorizer $appAuthorizer)
    {
       $this->user = $user;
       $this->appauth = $appAuthorizer;
    }
    public function login(request $request){

        $detail = ['email' => $request->email, 'password' => $request->password];
        // print_r($request->password);die;
        $user = User::where('email', $request->email)
                ->orwhere('mobile', $request->email)
                ->where('role',2)->first();
        // if($user){
        // }
        if (Auth::attempt([
            'mobile' => $request->email,
            'password' => $request->password
            ],$request->has('remember'))
            || Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
            ],$request->has('remember'))){
            
            

            $otp = '111111';
            $userDet= [
                'userid'=> Auth::user()->id,
                'name'=> Auth::user()->name,
                'email' => Auth::user()->email,
                'mobile' => Auth::user()->mobile,
                'otp' => $otp,
            ];
            $data['userDetail']=$userDet;
            $token = $user->createToken('User')->accessToken;
            $data['token'] = ['token' => $token];
            //--otp update start
            
           
            
            User::where('email',$request->email)
                ->orwhere('mobile',$request->email)->update(['sms_otp'=>$otp]);
                
            $uid= Auth::user()->id;
               if($request->post('guestId')!=''){
                //GUEST MEMBER FOUND
        
                Cart::where('uid',$request->post('guestId'))->update(['uid'=>$uid]);
                
            }
            $cartcount = Cart::where('uid',$uid)->count();
            $data['cartcount'] = (string)$cartcount;
            //return $data['count'];
            //CHECK IF THIS USER ALREADY LOGIN WITH GUEST USER OR NOT
    
          
            
            //--otp update close
            return response(['status'=>1,'msg'=>'Login Success','data'=>$data],200);
        }
        else{
            $response=['status'=>0,'title'=>'Invalid Credentials'];
            return response($response,200);
        }
    }
    
    public function guestLogin(request $request){
        
        //CREATE A TEMP USER FOR GUEST LOGIN
          $otp = "111111";
        $user = new User();
        $user->name ='Guest User';
        $user->email = Str::random(10).'@gmail.com'; 
        $user->mobile =Str::random(10); 
        $user->password = bcrypt(Str::random(10));
        $user->sms_otp = $otp;
        $user->avatar= 'user-avatar.jpeg';
        $user->role = 2;
        if($user->Save()){
             $token = $user->createToken('User')->accessToken;
            $data['token'] = ['token' => $token]; 
            return response(['status'=>1,'msg'=>'User successfully registered','data'=>$data,'last_id' => (string)$user->id],200);
            
        }
        
    
        
    }

    public function register(request $request){
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users,mobile',
            'email' => 'required|email|unique:users',
            'password' => 'required',
    
        ]);
        $data['name'] = $request->name;
        $data['email'] = $request->email; 
        $data['mobile'] = $request->mobile; 
        $data['password'] = $request->password;
        $data['referred_by']= $request->referral;

        if($validate->fails())
        {
            return response(['status'=>0,'msg'=>$validate->errors()],200);
            // return response()->json(['error'=>$validate->errors(),'data'=>$data], 401);
            //return response(['error'=>$validate->errors()],401);
        }
        //$otp = rand(000000,999999);
        $otp = "111111";
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email; 
        $user->mobile = $request->mobile; 
        $user->password = bcrypt($request->password);
        $user->sms_otp = $otp;
        $user->referred_by= $request->referral;
        $user->avatar= 'user-avatar.jpeg';
        $user->role = 2;
        if($user->Save()){
        
        
      
        if($request->post('guestId')!=''){
                //GUEST MEMBER FOUND

            Cart::where('uid',$request->post('guestId'))->update(['uid'=>$user->id]);
                
            }
            
              $cartcount = Cart::where('uid',$user->id)->count();
            $data['cartcount'] = (string)$cartcount;
            $token = $user->createToken('User')->accessToken;
            $data['token'] = ['token' => $token]; 
            return response(['status'=>1,'msg'=>'User successfully registered','data'=>$data,'last_id' => $user->id],200);
        }
        else{
            $response=['status'=>0,'title'=>'User not registered'];
            return response($response,200);
        }
    }

    public function resetpass(request $request){
        $validate = Validator::make($request->all(), [
            'email' => 'required',
        ]);
        if($validate->fails()){
            return response()->withErrors($validate->errors());
        }
        return "fuck";
        $email = $request->email;
        // $mobile = $request->mobile;
        $value = $this->user->respass($email);
        foreach($value as $val){
            $emailid =  $val->email;
        }
        if(!empty($emailid)){
            $response=['status'=>1,'title'=>'Send Sucessfully'];
            return response($response,200);
        }
        else{
            $response=['status'=>0,'title'=>'Invalid Credentials'];
            return response($response,200);
        }
    }

    public function setpass(request $request){
        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if($validate->fails()){
            return response()->withErrors($validate->errors());
        }
        $password = bcrypt($request->password);
        $email = $request->email;
        //$dd=  User::where('email',$email)->get();
        $value = $this->user->respass($email);
        foreach($value as $val){
            $emailid =  $val->email; 
        }
        if(!empty($emailid)){
            User::where('email',$email)->update(['password'=>$password]);
            $response=['status'=>1,'title'=>'Password Change Sucessfully'];
            return response($response,200);
        }
        else{
            $response=['status'=>0,'title'=>'Invalid Credentials'];
            return response($response,200);
        }
    }
    public function unauthorized(request $request){
        
        return "Unauthorized User";
    }

    public function loginotp(request $request){
        $mobile= $request->mobile;
        $otp = $request->otp;
        $user = User::where('mobile',$mobile)
                    ->where('sms_otp',$otp)->first();
        if(!empty($user)){
            return response(['status'=>1,'msg'=>'Login Successfully'],200);
        }else{
            return response(['status'=>0,'msg'=>'Wrong OTP'],200);
        }
    }
    public function forgotPassword(request $request){
      
         $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);
        
        if ($validator->fails())
        {
            return response(['status'=>0,'errors'=>$validator->errors()->all()], 200);
        }
        //CHECK EMAIL EXISTS IN DB THEN SEND OTP
        $usercheck= User::where('email',$request->post('email'))->first();
        if($usercheck){
            //GENERATE OTP
            $otp= rand('111111','999999');

            if(User::where('email',$request->post('email'))->update(['email_otp'=>$otp])){
                //SEND MAIL TO CUSTOMER
                $mailData=['name'=>$usercheck->name,'otp'=>$otp];
                
                Mail::to($usercheck->email)->send(new ResetEmail($mailData));
                
            //   $mailData=['name'=>$request['name'],'otp'=>$emailotp];
            //   Mail::to($request['email'])->send(new ResetEmail($mailData));
                
                
                $uid= $usercheck->id;
                $id = Crypt::encryptString($uid);

                $data['user'] = ['token' => $id]; 
            
                return response(['status'=>1,'msg'=>'OTP sent on your mail','data'=>$data], 200);
              
            }
            else{
                //UNABLE TO UDPATE OTP
                return response(['status'=>0,'msg'=>'Unable to reset Password'], 200);
            }
        }
        else
        {
            return response(['status'=>0,'msg'=>'Invalid Email Id'], 200);
        }
    }
    
    public function verifyResetOtp(request $request){
     $validator = Validator::make($request->all(), [
            'token'=>'required',
            'otp'=>'required'
        ]);
    
        
        if ($validator->fails())
        {
            return response(['status'=>0,'errors'=>$validator->errors()->all()], 200);
        }else{
              $uid= Crypt::decryptString($request->post('token'));
              $user= User::find($uid);
              if($user->email_otp==$request->post('otp')){
                  $data['user'] = ['token' => $request->post('token')]; 
               return response(['status'=>1,'msg'=>'OTP VERIFIED','data'=>$data], 200);
                  
              }else{
                  return response(['status'=>0,'msg'=>'INVALID OTP '], 200);
              }
                

        }
        
    }
    public function setNewPassword(request $request){
          $validator = Validator::make($request->all(), [
            'token'=>'required',
            'new_password'=>'required|min:6|max:50',
            'confirm_password'=>'required|min:6|max:50'
        ]);
    
        
        if ($validator->fails())
        {
            
            return response(['status'=>0,'errors'=>$validator->errors()->all()], 200);
            
        }else{
            
            if($request->post('confirm_password')==$request->post('new_password')){
            $uid= Crypt::decryptString($request->post('token'));
             $user= User::find($uid);
             

            #Update the new Password
            User::whereId($user->id)->update([
                'password' => Hash::make($request->post('new_password'))
            ]);
           return response(['status'=>1,'msg'=>'Password Updated '],200);
            }else{
                      return response(['status'=>0,'msg'=>'Password & Confirm Password do not match '], 200);
            }
          
        }
        
    }
    
}
