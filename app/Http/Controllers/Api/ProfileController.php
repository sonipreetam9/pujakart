<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProfileService;
use App\Models\User;
use App\Models\Setting;
use App\Models\SocialMedia;
use File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    protected $profileService;
    public function __construct(ProfileService $profileService)
    {
       $this->profile = $profileService;
    } 

    public function profile(request $request){
        $userDetail = $request->user()->token();
        $uid = $userDetail->user_id;
        //$data['viewprofile']= $this->profile->viewprofile($uid); 
        
        $viewProfile[] = $this->profile->viewprofile($uid); 
       
        foreach($viewProfile as $key=>$value){
            $viewProfile[$key]->avatar= env('APP_URL').'userImage/'.$value->avatar;
            $viewProfile[$key]->privacy= env('APP_URL').'policy/Privacy Policy.pdf';
            $viewProfile[$key]->returns= env('APP_URL').'policy/Returns, Exchange and Refund Policy.pdf';
            $viewProfile[$key]->terms= env('APP_URL').'policy/Terms and Conditions.pdf';
        }
        $data['viewProfile']=$viewProfile;
        
        return response(['status'=>1,'msg'=>'View Profile','data'=>$data],200);
    }
    
    public function updateProfile(Request $request){
        $userDetail = $request->user()->token();
        $user= User::where('id',$userDetail->user_id)->update(['name'=> $request->post('name'),'email'=> $request->post('email')]);
        //   $user->name= $request->post('name');
        //   $user->email= $request->post('email');
        return response(['status'=>1,'msg'=>'Profile Updated'],200);
    }
    
    public function changeUserPassword(Request $request){
        $userDetail = $request->user()->token();
         
        $user= User::find($userDetail->user_id);
        $request->post('old_password');
         
        #Match The Old Password
        if(!Hash::check($request->post('old_password'),  $user->password)){
           return response(['status'=>0,'msg'=>'Old Password is wrong '],200);
        }
        #Update the new Password
        User::whereId($userDetail->user_id)->update([
            'password' => Hash::make($request->post('new_password'))
        ]);
       return response(['status'=>1,'msg'=>'Password Updated '],200);
    }
    
    public function profileImageupdate(request $request){
        // return $request->post();
        //  return $file = $request->hasFile('itemimage');
        if ($request->hasFile('itemimage')) {
            // return "Fuck More";
            $path = public_path().'/userImage/';
            File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
            $itemImage=[];
            $file= $request->file('itemimage');
                $fileName = $file->hashName(); 
                $file->move($path, $fileName);
                $itemImage[]= $fileName;
                
        }
            $itemimage = $itemImage;
        
            $userDetail = $request->user()->token();
            $uid = $userDetail->user_id;
            $result= User::where('id',$uid)->update(['avatar'=>$itemimage]);
            
            if($result==true){
                $response = ['status'=>1,'title'=>'Profile Image Updated Successfully'];
            }else{
                $response = ['status'=>0,'title'=>'Image not updated'];
            }
            return $response;
            // else{
            //     return "Fuck";
            // }
        
            // return $this->profile->updateProfileimage($request); 
            // return response(['status'=>1,'msg'=>'Profile Image pdated'],200);
    }
    
    public function myReferral(request $request){
        $userDetail = $request->user()->token();
                $uid = $userDetail->user_id;
        $result= User::where('id',$uid)->first();
        $data['user']=['my_ref_code'=>$result->my_ref_code,'referred_by'=>$result->referred_by];
       return response(['status'=>1,'msg'=>'User myReferral','data'=>$data],200);
    }
    
    public function socialMedia(request $request)
    {
        //email
        $email= Setting::where('id','6')->first();
        $data['email']= $email->option_value;
        
        //mobile
        $mobile= Setting::where('id','7')->first();
        $data['mobile']= $mobile->option_value;
        
        $result= SocialMedia::all();
        
        $data['facebook']= $result[0]->facebook;
        $data['instagram']= $result[0]->instagram;
        $data['twitter']= $result[0]->twitter;
        $data['whatsapp']= $result[0]->whatsapp;
        return response(['status'=>1,'msg'=>'Social Media Link','data'=>$data],200);
    }
    
    
    
    public function supportEmail(request $request){
        // $userDetail = $request->user()->token();
        // $uid = $userDetail->user_id;
        $result= Setting::where('id','6')->first();
        $data['support']=['email'=>$result->option_value];
       return response(['status'=>1,'msg'=>'Support Email','data'=>$data],200);
    }
    public function supportMobile(request $request){
        //$userDetail = $request->user()->token();
        //$uid = $userDetail->user_id;
        $result= Setting::where('id','7')->first();
        $data['support']=['mobile'=>$result->option_value];
       return response(['status'=>1,'msg'=>'Support Mobile','data'=>$data],200);
    }

}
