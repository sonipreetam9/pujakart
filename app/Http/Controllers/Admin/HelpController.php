<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HelpQuery;


class HelpController extends Controller
{
    public function __construct(HelpQuery $help )
    {
        $this->help = $help;
    }

    public function index(){
        $data['title'] = 'Books';
        $data['list']= $this->help->getAll();
        //return $data['list'];
        return view('admin.help.index',$data);
    }
    
    public function delete($id){
        HelpQuery::where('id',$id)->delete();
        return back()->with('success','Help Enquiry Deleted');
    }
    
   
}

