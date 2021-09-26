<?php

namespace app\models;

class News extends AppModel
{
    public function setNewlyViewed($id)
    {
        $viewed = $this->allNewlyViewed();
        if(!$viewed){
            setcookie('viewed', $id, time() + 3600*24, '/');
        }else{
            $viewed = explode('.', $viewed);
            if(!in_array($id ,$viewed)){
                $viewed[] = $id;
                $viewed = implode('.', $viewed);
                setcookie('viewed', $viewed, time() + 3600*24, '/');
            }
        }
    }

    public function getNewlyViewed()
    {
        if(!empty($_COOKIE['viewed'])){
            $viewed = $_COOKIE['viewed'];
            $viewed = explode('.', $viewed);
            return array_slice($viewed, -3);
        }
        return false;
    }

    public function allNewlyViewed()
    {
        if(!empty($_COOKIE['viewed'])){
            return $_COOKIE['viewed'];
        }
        return false;
    }

}