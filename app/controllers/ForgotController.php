<?php

namespace app\controllers;

use app\controllers\admin\AdminController;
use app\models\admin\User;

class ForgotController extends AppController
{
    public function indexAction()
    {
        if(!empty($_POST)){
            $user = new User();
            if(!$user->email()){
                $_SESSION['erremail'] = 'Такой email не существует.';
                redirect();
            }
            redirect(PATH);
        }
    }

    public function newpassAction()
    {
        $key = $_GET;
        $user = \R::findOne('users', 'recovery = ?' , [$key['key']]);
        $hash = \R::findOne('hashtime', 'email = ?', [$user->email]);


        if($key == null) redirect(PATH);
        if(!$user) redirect(PATH);

        $data = date("Y-m-d H:i:s", time());

        if($hash->time < $data) {
            $user->recovery = null;
            \R::trash($hash);
            \R::store($user);
            redirect(PATH . '/forgot');
        }

        $this->set(compact('key'));
        if(isset($_GET['pass'])){
             $user->password = md5($key['password']);
             $user->recovery = null;
             \R::trash($hash);
             \R::store($user);
             redirect(ADMIN . '/user/login');
        }
    }

}