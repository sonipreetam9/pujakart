<?php
namespace App\Services;

use App\Models\BankDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\OemBrands;
use App\Models\User;

class OembrandsService{
    public function getAll(){
        return OemBrands::all();
    }  
    
    public function addNew($request)
    {
        $formula= new OemBrands();
        $formula->oem_brands= $request->oem_brands;
        if($formula->save()){
            return back()->with('success','Oem Brand added successfully');
        }
        else{
            return back()->with('error','Oem Brand not added successfully');
        }
    }

    public function detail($id){
        return OemBrands::find($id);
    }

    public function edit_formula($id){
        return OemBrands::find($id); 
    }

    public function update($request,$id){
        OemBrands::where('id',$id)->update(['oem_brands'=>$request->oem_brands,'status'=>$request->status]);
        return back()->with('success','Oem Brands Details Updated');
    }
     
    public function destroy($id){
        OemBrands::where('id', $id)->delete();
        return back()->with('success','Oem Brand Deleted');
    }

}