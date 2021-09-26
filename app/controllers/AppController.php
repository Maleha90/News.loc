<?php

namespace app\controllers;

use app\models\AppModel;
use core\App;
use core\base\Controller;
use core\Cache;

class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
        App::$app->setProperty('menu', self::cacheMenu());
    }

    public static function cacheMenu()
    {
        $cache = Cache::instance();
        $menu = $cache->get('menu');
        if(!$menu){
            $menu = \R::getAssoc("SELECT * FROM categorys");
            $cache->set('menu', $menu);
        }
        return $menu;
    }

}