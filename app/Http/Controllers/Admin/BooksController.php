<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Books;


class BooksController extends Controller
{
    public function __construct(Books $books )
    {
        $this->books = $books;
    }

    public function index(){
        $data['title'] = 'Books';
        $data['list']= $this->books->getAll();
        return view('admin.books.index',$data);
    }
    public function create_books(){
        $data['title']='Create Books';
        $data['list']= $this->books->getCategory();
        return view('admin.books.create',$data);
    }
    public function save(request $request){
        return $this->books->addNew($request); 
    }


    public function edit($id){
        $data['title']='Update Book';
        $data['list']= $this->books->detail($id);
        $data['cat']= $this->books->getCategory();
        return view('admin.books.edit',$data);
    }

    public function update(request $request,$id){
        return $this->books->catupdate($request,$id);
    }

    public function delete($id){ 
        return $this->books->destroy1($id);
    }
    
    
}

