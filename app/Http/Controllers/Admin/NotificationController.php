<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialMedia;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function __construct(SocialMedia $social )
    {
        $this->social = $social;
    }

    public function index(){
        $data['title'] = 'Send Notification';
        //$data['list'] = array();
        $data['list']= $this->social->getAll();
        return view('admin.notification.index',$data);
    }
    
     public function view(){
        $data['title']='View Notification';
        $data['list']= Notification::all();
        //print_r($data['list']);die;
        return view('admin.notification.view',$data);
    }
    
    public function sendnotification(request $request){
        $server_key = 'AAAAf5VYErw:APA91bEk_ugm4nRKKafcFG-DAn6ADzYGQemk9RgtNc3xSiJN2nbVNh7PJiYsrkPSwEQEkpF4XSFJJG3YLLTGqG7eo7uqkSAPpty41BNyPAdB5NHfN5Xl3t4gkvIPki6UO0lruXYpKEpD';
        define( 'API_ACCESS_KEY', $server_key );
        $data = $request->description;
        $title = $request->title;
        
        $noti= new Notification();
        $noti->title = $title;
        $noti->description = $data;
        $noti->save();
        
        $responce=$this->sendMessage($title,$data);
        return back()->with('success','Notification Send Successfully');
    }
    
    function sendMessage($title,$body){
        $msg = array
        (
            'body'  => $body,
            'title'     => $title,
            'vibrate'   => 1,
            'sound'     => 1,
        );
        $fields = array
        (
            'to'  => '/topics/user',
            'notification' => $msg
        );
        
        $headers = array
        (
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );
        
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
        return $result;
    }

}
