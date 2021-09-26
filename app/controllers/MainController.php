<?php

namespace app\controllers;

use app\models\Category;
use core\App;
use core\Pagination;

class MainController extends AppController
{
    public function indexAction()
    {
        $status = \R::find('news', "status = '1' LIMIT 3");
        $hits = \R::find('news', "hit = '1' LIMIT 3");
        $cal = \R::getAll('SELECT * FROM `news`');
        $calendar = $this->getJson($cal);
        $canonical = PATH;
        $this->setMeta('News', 'News', 'news');
        $this->set(compact('hits', 'status', 'calendar', 'canonical'));
    }


    public function getJson($arr)
    {
        $data = '[';
        foreach($arr as $item){
            $data .= '{"title" : "' . $item['title'] . '", "start" : "' .$item['data'] . '"}, ';
        }
        $data .= ']';
        return $data;
    }
}