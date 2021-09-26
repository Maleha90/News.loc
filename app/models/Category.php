<?php

namespace app\models;

use core\App;

class Category extends AppModel
{
    public function getIds($id)
    {
        $cats = App::$app->getProperty('menu');
        $ids = null;
        foreach($cats as $k => $v){
            if($v['parent_id'] == $id){
                $ids .= $k . ',';
                $ids .= $this->getIds($k);
            }
        }
        return $ids;
    }
}