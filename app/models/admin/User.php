<?php

namespace app\models\admin;

use app\models\AppModel;

class User extends AppModel
{
    public $attributes = [
        'login' => '',
        'password' => '',
        'email' => '',
        'recovery' => '',
    ];

    public function login()
    {
        $login = !empty(trim($_POST['login'])) ? trim($_POST['login']) : null;
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;
        if($login && $password){
            $user = \R::findOne('users', "login = ?", [$login]);
            if($user){
                if(md5($password) == $user->password){
                    foreach($user as $k => $v){
                        if($k != 'password') $_SESSION['user'][$k] = $v;
                    }
                    return true;
                }
            }
        }
        return false;
    }

    public function email()
    {
        $email = !empty(trim($_POST['email'])) ? trim($_POST['email']): null;
        if($email){
            $user = \R::findOne('users', "email = ?", [$email]);
            if($user){
                if($email == $user->email){
                    $data = date("Y-m-d H:i:s", time() + 3600);
                    $hash = md5(time() + 3600 . $email);
                    \R::exec("INSERT INTO hashtime (hash, email, time) VALUES ('$hash', '$email', '$data')");
                    $key = md5($user->login.rand(1000,9999));
                    $user->recovery = $key;
                    \R::store($user);

//                    $hash_time = PATH . "/forgot/hashtime={$hash}";
                    $url = PATH . '/forgot/newpass?key=' . $key;
                    $messege = $user->login . ", ваш временный пароль: " . $url . '.' . PHP_EOL . 'Время существование ссылки 1 час, ссылка будет удалена ' . $data . '.';
                    mail($email," Подтвердите действия ",$messege );
                    return true;
                }
            }
        }
        return false;
    }

    public static function checkAuth()
    {
        return isset($_SESSION['user']);
    }

}