<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
  
  public function index(){
      
     $notification=  Notification::orderby('id','DESC')->get();
    //   $notification[]=['title'=>'Test Notification','body'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",'route_to'=>'https://google.com','img'=>'https://i.postimg.cc/mkP0NYyj/checklist.png','status'=>'1','time'=>date('Y-m-d H:i')];
    //     $notification[]=['title'=>'Order Dispathced','body'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",'route_to'=>'https://google.com','img'=>'https://i.postimg.cc/mkP0NYyj/checklist.png','status'=>'1','time'=>date('Y-m-d H:i')];
    
    // $notification=[];
    $data['notification']= $notification;
    
    return response(['status'=>1,'msg'=>'Notification Found','data'=>$data],200);
  }

}
