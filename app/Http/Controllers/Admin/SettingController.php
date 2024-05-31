<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
     public function __construct( Setting $Setting)
    {
        $this->Setting = $Setting;
    }

    public function shipcondition(){
        $data['title'] = 'General Conditions';
        $data['list']= $this->Setting->getshipAll();
        //$data['list']= array();
        return view('admin.setting.index',$data);
    }

    public function retcondition(){
        $data['title'] = 'General Return Conditions';
        $data['list']= $this->Setting->getreturnAll();
        return view('admin.setting.return',$data);
    }
    
    public function edit($id){
        $data['title'] = 'Update';
        $data['list']= $this->Setting->getData($id);
        return view('admin.setting.edit',$data);
    }
    
    public function update(request $request,$id){
        return $this->Setting->conditionUpdate($request,$id);
    }
    
    //--minimum order start
    public function min_order(){
        $data['title'] = 'Minimum Order';
        $data['list']= $this->Setting->getminOrder();
        //$data['list']= array();
        return view('admin.setting.minimum_order',$data);
    }
    public function min_edit($id){
        $data['title'] = 'Update';
        $data['list']= $this->Setting->getminData($id);
        return view('admin.setting.minedit',$data);
    }
    
    public function min_update(request $request,$id){
        return $this->Setting->minUpdate($request,$id);
    }
    
    //--Support start
    public function support(){
        $data['title'] = 'View Support';
        $data['list']= $this->Setting->getSupport();
        //$data['list']= array();
        return view('admin.setting.support',$data);
    }
    public function editsupport($id){
        $data['title'] = 'Update Support';
        $data['list']= $this->Setting->getsupportData($id);
        return view('admin.setting.supportedit',$data);
    }
    public function support_update(request $request,$id){
        return $this->Setting->supportUpdate($request,$id);
    }
    
    //Return And Exchange
    public function return_exchange(){
        $data['title'] = 'View Support';
        $data['list']= Setting::where('option_name','return_exchange')->get();
        //return "Yes";
        //return $data['list'];
        return view('admin.setting.return_exchange',$data);
    }
    
    public function editReturnExchange($id){
        $data['title'] = 'Update Return Exchange';
         $data['list']= Setting::where('option_name','return_exchange')->get();
        //return $data['list'];
        return view('admin.setting.return_exchange_edit',$data);
    }
    
    public function returnExchangeupdate(request $request,$id){
        return $this->Setting->returnExchangeUpdate($request,$id);
    }
    
    
    
}




