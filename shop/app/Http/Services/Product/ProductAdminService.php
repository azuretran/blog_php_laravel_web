<?php
namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ProductAdminService{
    public function getMenu(){
        return Menu::where('active',1)->get();

    }
    public function get($parent_id = 0)
    {
        return Menu::
        when($parent_id == 0 ,function($query) use ($parent_id){
            $query->where('parent_id',$parent_id);
        })
        ->get();
    }
    public function getProduct(){
        return Product::with('menu')->orderbyDesc('id')->paginate(15);
    }
    public function getAll(){

        return Menu::orderbyDesc('id')->paginate('20');
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
            Session::flash('success','add product successfully');

        }catch(\Exception $err){
            Session::flash('error','add product error');
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }
     
}
