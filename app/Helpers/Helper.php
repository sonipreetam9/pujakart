<?php
namespace App\Helpers;
use App\Models\Category;

class Helper {

    public static function fatchCat($id)
    {
        return Category::All()->where('sid',$id);
    }

} 