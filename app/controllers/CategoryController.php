<?php

namespace app\controllers;

use app\models\News;

class CategoryController extends AppController
{
    public function viewAction()
    {
        $alias = $this->route['alias'];
        $news = \R::findOne('news', "alias = ?", [$alias]);
        if(!$news){
            throw new \Exception('Такая страница не существует',404);
        }

        //Просмотренные новости
        $str = str_replace('category/', '',$_SERVER['QUERY_STRING']);
        if($news->alias == $str){
            $log = \R::load('news', $news->id);
            $log->counter = $news->counter + 1;
            \R::store($log);
        }

        //Запись в куки
        $p_news = new News();
        $p_news->setNewlyViewed($news->id);

        //Просмотренные новости
        $p_viewed = $p_news->getNewlyViewed();
        $n_viewed = null;
        if($p_viewed){
            $n_viewed = \R::find('news', 'id IN (' . \R::genSlots($p_viewed) . ') LIMIT 3', $p_viewed);
        }

        //Галерея
        $gallery = \R::findAll('gallery', "news_id = ?" ,[$news->id]);

        $this->setMeta($news['title']);
        $this->set(compact('news', 'gallery', 'n_viewed'));
    }

}