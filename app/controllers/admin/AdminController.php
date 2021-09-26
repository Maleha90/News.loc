<?php

namespace app\controllers\admin;

use app\models\admin\User;
use app\models\AppModel;
use core\base\Controller;

class AdminController extends Controller
{
    public $layout = 'admin';

    public function __construct($route)
    {
        parent::__construct($route);
        if(!User::checkAuth() && $route['action'] != 'login'){
              redirect(ADMIN . '/user/login');
        }
        new AppModel();
    }

    public function getId( $get = true, $id = 'id')
    {
        if($get){
            $data = $_GET;
        }else{
            $data = $_POST;
        }
        $id = !empty($data[$id]) ? (int)$data[$id] : null;
        if(!$id){
            throw new \Exception('Страница не найдена', 404);
        }
        return $id;
    }
}