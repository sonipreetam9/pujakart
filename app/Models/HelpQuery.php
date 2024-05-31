<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpQuery extends Model
{
    use HasFactory;
    
    
     public function getAll(){
        return HelpQuery::all();
    }
}
