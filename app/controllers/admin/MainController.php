<?php

namespace app\controllers\admin;

class MainController extends AdminController
{
    public function indexAction()
    {
        $number = \R::count('news', 'id');
        $this->setMeta('Админка');
        $this->set(compact('number'));
    }

}