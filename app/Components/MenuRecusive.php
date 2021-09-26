<?php
namespace App\Components;

use App\Models\Category;
use App\Models\Menu;
use PhpOption\Option;

class MenuRecusive {
    private $html;

    public function __construct()
    {
        $this->html='';
    
    }

    public function menuRecusiveAdd($parentId =0, $subMark ='')
    {
        $data=Menu::where('parent_id', $parentId)->get();
        foreach($data as $dataItem){
            $this->html .= '<Option value="'.$dataItem->id.'">'.$subMark .$dataItem->name .'</option>';
            $this->menuRecusiveAdd($dataItem->id, $subMark.'--');
        }
        return $this->html;

    }
    public function menuRecusiveEdit($parentIdMenuEdit,$parentId =0, $subMark ='')
    {
        $data=Menu::where('parent_id', $parentId)->get();
        foreach($data as $dataItem){
            if($parentIdMenuEdit == $dataItem->id ){
                $this->html .= '<Option selected value="'.$dataItem->id.'">'.$subMark .$dataItem->name .'</option>';
            }else{
                $this->html .= '<Option value="'.$dataItem->id.'">'.$subMark .$dataItem->name .'</option>';
            }
            
            $this->menuRecusiveEdit($parentIdMenuEdit, $dataItem->id, $subMark.'--');
        }
        return $this->html;

    }

}