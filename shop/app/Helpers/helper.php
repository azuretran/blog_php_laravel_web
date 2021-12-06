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
                <td>'.$menu['active'].'</td>
                <td>'.$menu['updated_at'].'</td>
                <td>
                <a class="btn btn-primary " href="/admin/menus/edit/'.$menu['id'].'"><i class="fas fa-edit"></i></a>
                <a class="btn btn-danger" onclick="removeRow('.$menu['id'].',\'/admin/menus/destroy\')" href="#"><i class="far fa-trash-alt"></i></a>
                </td>
                </tr>
                ';

                unset($menu[$key]);
                $html.=self::menu($menu,$menu->id,$char.'--');
            }
        }
        return $html;

    }
}
