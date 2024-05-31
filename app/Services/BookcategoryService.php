<?php
namespace App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Bookcategory;

class BookcategoryService{

    public function bookcat(){
        return Bookcategory::All()->where('status','1');
    }

}