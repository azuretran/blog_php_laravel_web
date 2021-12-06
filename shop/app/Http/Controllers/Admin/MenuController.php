<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use Illuminate\Http\Request;
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
}
