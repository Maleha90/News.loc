<?php

namespace app\controllers;

use app\models\Category;
use core\App;
use core\Pagination;

class NewsController extends AppController
{
    public function viewAction()
    {
        $alias = $this->route['alias'];
        $category = \R::findOne('categorys', "alias = ?", [$alias]);
        if(!$category) {
            throw new \Exception('Страница не найдена',404);
        }

        $cat_model = new Category();
        $ids = $cat_model->getIds($category->id);
        $ids = !$ids ? $category->id : $ids . $category->id;

        //Пагинация
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = App::$app->getProperty('pagination');
        $total = \R::count('news', "category_id IN ($ids)");

        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $news = \R::find('news', "category_id IN ($ids)  LIMIT $start, $perpage");

        $this->setMeta($category->title, $category->description, $category->keywords);
        $this->set(compact('news', 'category', 'pagination'));
    }
}