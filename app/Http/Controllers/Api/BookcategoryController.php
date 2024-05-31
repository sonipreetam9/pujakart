<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BookcategoryService;

class BookcategoryController extends Controller
{
    protected $bookcategoryService;
    public function __construct(BookcategoryService $bookcategoryService){
        $this->bookcat = $bookcategoryService;
    }

    public function bookcategory(){
        $bookCategory = $this->bookcat->bookcat();
        foreach($bookCategory as $key=>$value){
          $bookCategory[$key]->image= env('APP_URL').'bookImage/'.$value->image;
        }
        $data['bookCategory']=$bookCategory;
        return response(['status'=>1,'msg'=>'Book Category','data'=>$data],200);
    }
}
