<?php
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\user;
use File;

class ProfileService{

    public function viewprofile($uid){
        return User::where('id',$uid)->first();
    }
    
    //--- Profile image update start----//
    public function updateProfileimage($request){
        //echo "yes";
        //return $request->post();
        if($request->hasFile('itemimage')) {
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
            
            // $itemimage = $request->itemimage;
            // $fname = time().'.'.$request->itemimage->extension('jpg,png,jpeg');
            // $fileName =date('d-m-Y-H-i-s').$fname;
            // $request->itemimage->move(public_path('userImage'), $fileName);
            // $itemimage= $fileName;
            // $itemimage;
    
            $result= User::where('id',$uid)->update(['avatar'=>$itemimage]);
            if($result==true){
                $response = ['status'=>1,'title'=>'Profile Image Updated Successfully'];
            }else{
                $response = ['status'=>0,'title'=>'Image not updated'];
            }
            return $response;
        }
    

}



