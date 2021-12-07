<?php
namespace App\Helpers;
class helper{
    public static function menu($menus ,$parent_id=0,$char = ' '){
        $html='';
        foreach($menus as $key => $menu){
            if($menu['parent_id'] == $parent_id){
                $html .= ';
                <tr>
                <td>'.$menu['id'].'</td>
                <td>'.$char.$menu['name'].'</td>
                <td>'.self::active($menu['active']).'</td>
                <td>'.$menu['updated_at'].'</td>
                <td>
                <a class="btn btn-primary " href="/admin/menus/edit/'.$menu['id'].'"><i class="fas fa-edit"></i></a>
                <a href="#" class="btn btn-danger" onclick="removeRow('.$menu['id'].',\'/admin/menus/destroy\')" ><i class="far fa-trash-alt"></i></a>
                </td>
                </tr>
                ';

                unset($menu[$key]);
                $html.=self::menu($menu,$menu->id,$char.'--');
            }
        }
        return $html;

    }
    public static function active($active=0):string{
        return $active==0?'<span class="btn btn-danger">No</span>':
        '<span class="btn btn-primary">Active</span>';
    }
}
