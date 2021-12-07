<?php
namespace App\Http\Services;
class UploadService{
    public function store($request){
        if($request->hasFile('file')){
            try{
                $name=$request->file('file')->getClientOriginalName();
                $pathFull='uploads/'.date('Y-m-d');
                $request->file('file')->storeAs(
                    'public/uploads'.$pathFull,$name
                );


                return '/storage/'.$pathFull.'/'.$name;
            }catch (\Exception $error){
                return false;
            }
        }
    }
}
