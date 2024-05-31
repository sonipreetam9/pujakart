<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\http\controllers\Admin\SocialmediaController;

class SocialMedia extends Model
{
    use HasFactory;
    public function getAll(){
        return Socialmedia::all();
    }

    public function detail($id){
        return Socialmedia::All()->where('id',$id);
    }
    
    public function socialupdate($request,$id){
        Socialmedia::where('id',$id)->update(['facebook'=>$request->facebook,'instagram'=>$request->instagram,'twitter'=>$request->twitter,'whatsapp'=>$request->whatsapp]);
        return back()->with('success','Social Media Link Updated');
    }
}
