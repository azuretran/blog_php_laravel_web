<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuService;
use App\Http\Requests\Menu\CreateFormRequest;

class MenuController extends Controller
{
    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService=$menuService;
    }


   public function create()
   {
      return view('admin.menu.add',[
          'title'=>"add new list",
          'menus'=>$this->menuService->get(0)
      ]);
   }
   public function store(CreateFormRequest $request){
       $result = $this->menuService->create($request);
       return redirect()->back();
   }
   public function index(){
       return view('admin.menu.list',[
           'title'=>'Danh sách danh mục mới nhất',
           'menus'=>$this->menuService->getAll()
       ]);
   }
   public function destroy(Request $request):JsonResponse
   {
   $result=$this->menuService->destroy($request);
    if($result){
        return response()->json([
            'error'=>false,
            'message'=>'delete successfully'

        ]);
    }
    return response()->json([
        'error'=>true,


    ]);
   }
   public function show(Menu $menu){

    return view('admin.menu.edit',[
        'title'=>'Edit list '.$menu->name,
        'menu'=>$menu,
        'menus'=>$this->menuService->get(0)
    ]);
   }
   public function update(Menu $menu, CreateFormRequest $request)
   {
    $this->menuService->update($request,$menu);
    return redirect('/admin/menus/list');
    }
    
}
