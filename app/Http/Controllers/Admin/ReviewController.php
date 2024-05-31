<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ReviewService;

class ReviewController extends Controller
{
    public function __construct(ReviewService $review )
    {
        $this->data = $review;
    }

    public function index(){
        $data['title'] = 'View Review';
        $list= $this->data->getAll();
        foreach($list as $key=>$value){
            $pname= $this->data->getProduct($value->p_id);
            if($pname != NULL){
                $list[$key]->pname = $pname->name;
            }
            else{ $list[$key]->pname = "";}
        }
        $data['list'] = $list;
        return view('admin.review.index',$data);
    }
    
    public function edit($id){
        $data['title'] = 'Update Review';
        $list= $this->data->getReview($id);
        foreach($list as $key=>$value){
            $pname= $this->data->getProduct($value->p_id);
            if($pname != NULL){
                $list[$key]->pname = $pname->name;
            }
            else{ $list[$key]->pname = "";}
        }
        $data['list'] = $list;
        return view('admin.review.edit',$data);
    }
    
    public function update(request $request,$id){
        return $this->data->updates($request,$id);
        
    }
    
    
    

}
