<?php 
namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Review;
use App\Models\Product;

class ReviewService{
    
    public function getAll(){
        return Review::all();
    }
    
    public function getProduct($id){
        return Product::where('pid', $id)
        ->first();
    }
    public function getReview($id){
        return Review::where('rid', $id)
        ->get();
    }
    
    public function pro_review($request){
        return Review::where('p_id', $request->pid)
                    ->where('status','1')
                    ->get();
    }

    public function addReview($request){
        $userDetail = $request->user()->token();
        $uid = $userDetail->user_id;
        $pid = $request->pid;
        $user= User::find($uid);
        //print_r($uid);die;
        $revivew_user = Review::where('p_id',$pid)
                        ->where('user_id',$uid)->get();
        if(count($revivew_user)==1){  return 'Review already given';}
        else{    
            $review = new Review();
            $review->p_id = $request->pid;
            $review->user_id = $uid;
            $review->name = $user->name;
            $review->email = $user->email;
            $review->rating = $request->rating;
            $review->review = $request->review;
            if($review->Save()){
                $avg_rating= Review::where('p_id',$pid)->selectRaw('SUM(rating)/COUNT(p_id) AS rating')->first()->rating;
                Product::where('pid',$pid)
                ->update(['avg'=>$avg_rating]);
                
                $response = ['status'=>1,'title'=>'Review successfully added'];
                return $response;
            }
            else{
                $response = ['status'=>0,'title'=>'Review not added'];
                return $response;
            }
        }
    }
    
    public function updates($request,$id){
        review::where('rid',$id)->update(['status'=>$request->status]);
        return back()->with('success','Updated Successfully');
    }

    
}