<?php
namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductAdminService{
    public function getMenu(){
        return Menu::where('active',1)->get();

    }
   
    public function isValidPrice($request){
        if($request->input('price')!=0&&$request->input('price_sale')!=0
        &&$request->input('price_sale')>=$request->input('price')
        )    {
            Session::flash('error','price_sale must less than price');
            return false;
        }
        if($request->input('price')==0&&$request->input('price_sale')!=0){
            Session::flash('error','please fill in form price');
            return false;
        }
        return true;
    }
    public function insert($request){
        $isValidPrice=$this->isValidPrice($request);
        if($isValidPrice == false) return false;
        try{
            $request->except('_token');
            Product::create($request->all());
            Session::flash('sucess','add product successfully');

        }catch(\Exception $e){
            Session::flash('error','add product error');
            \log::info($e->getMessage());
            return false;
        }
        return true;
    }
}