<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BooksService;

class BooksController extends Controller
{
    protected $booksService;
    public function __construct(BooksService $booksService){
        $this->books = $booksService;
    }

    public function books(request $request){
        $bookAll = $this->books->booksAll($request);
        foreach($bookAll as $key=>$value){
            $bookAll[$key]->bookimage= env('APP_URL').'bookImage/'.$value->bookimage;
            $bookAll[$key]->pdfbook= env('APP_URL').'bookImage/'.$value->pdfbook;
          }
          $data['bookAll']=$bookAll;
          return response(['status'=>1,'msg'=>'View Books','data'=>$data],200);
    }
    public function viewbooks(request $request){
        $viewPdf= $this->books->viewPdf($request);
        foreach($viewPdf as $key=>$value){
            $viewPdf[$key]->pdfbook= env('APP_URL').'bookImage/'.$value->pdfbook;
        }
        $data['viewPdf']=$viewPdf;
        return response(['status'=>1,'msg'=>'View PDF','data'=>$data],200);
    }
}
