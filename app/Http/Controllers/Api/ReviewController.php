<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Services\ReviewService;

class ReviewController extends Controller
{
    protected $reviewService;
    public function __construct(ReviewService $reviewService){
        $this->review = $reviewService;
    }

    public function review(request $request){
        $review = $this->review->pro_review($request);
        $data['review']=$review;
        return response(['status'=>1,'msg'=>'View Review','data'=>$data],200);
    }
    public function add_review(request $request){
        
        return $this->review->addReview($request);
        // return response(['status'=>1,'msg'=>'Success'],200);
    }
}
