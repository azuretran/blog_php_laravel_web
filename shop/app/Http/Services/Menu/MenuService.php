<?php
namespace App\Http\Services\Menu;
use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class MenuService{
    public function get($parent_id = 0)
    {
        return Menu::
        when($parent_id == 0 ,function($query) use ($parent_id){
            $query->where('parent_id',$parent_id);
        })
        ->get();
    }
    public function getAll(){

        return Menu::orderbyDesc('id')->paginate('20');
    }
    public function create($request){
        try{

        Menu::create([
            'name'=>(string)  $request->input('name'),
            'parent_id'=>(int)  $request->input('parent_id'),
            'description'=>(string)  $request->input('description'),
            'content'=>(string)  $request->input('content'),
            'active'=>(string)  $request->input('active'),
            'slug' =>Str::slug($request->input('name'))


        ]);

        Session::flash('success','create list sucessful');
        }
        catch (\Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
    }

    public function destroy( $request){
        $id=(int)$request->input('id');

        $menu=Menu::where('id',$request->input('id'))->first();
        if($menu){
            return Menu::where('id',$id)->orwhere('parent_id',$id)->delete();
        }
        return false;
    }
    public function update($request,$menu){
        if($request->input('parent_id')!= $menu->id){
            try{
                $menu->fill($request->input());
                $menu->save();
                Session::flash('success','update list sucessful');

            }
            catch (\Exception $err){
                Session::flash('error',$err->getMessage());
                return false;
            }
            return true;

        }

    }


}
