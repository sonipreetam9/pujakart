<?php
namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Books;
use App\Models\Bookcategory;

class BooksService{
    
    public function booksAll($request){
        $cat = Bookcategory::where('cslug',$request->slug)->where('status',1)->get('id');
        //return $cat;
        if(count($cat)==0){
            return 'No Product Found';
        }
        else{
            $cid = $cat[0]->id;
            return Books::orderBy("bid","asc")->where('status',1)->where('bcid',$cid)
                ->where('status','1')
                ->get();
        } 
    }

    public function viewPdf($request){
        return Books::where('bslug',$request->slug)->where('status',1)->get('pdfbook');
    }

}