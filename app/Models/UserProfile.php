<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserProfile extends Model
{
    use HasFactory;
    public function respass($email){
       // print_r($email);die;
        return User::all()->where('email',$email);
    }
    public function getUsers(){
        return User::all()->where('role','!=','1');
    }

}
