<?php

namespace app\controllers\admin;

use app\models\admin\User;

class UserController extends AdminController
{
    public function loginAction()
    {
        if(!empty($_POST)){
            $user = new User();
            if(!$user->login()){
                $_SESSION['error'] = 'Логин/пароль введены неверно';
            }
            if(User::checkAuth()){
                $_SESSION['success'] = 'Вы успешно авторизованы';
                redirect(ADMIN);
            }else{
                redirect();
            }
        }
        $this->layout = 'login';
    }

    public function logoutAction()
    {
        if(isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect();
    }
}