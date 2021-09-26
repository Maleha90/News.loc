<?php

namespace app\controllers\admin;

use app\models\admin\News;
use app\models\AppModel;
use core\App;
use core\Pagination;

class NewsController extends AdminController
{
    public function indexAction()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : null;
        $perpage = 5;
        $count = \R::count('news');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $news = \R::getAll("SELECT news.*, categorys.title AS news FROM news JOIN categorys ON categorys.id = news.category_id LIMIT $start, $perpage");
        $this->setMeta('Новости');
        $this->set(compact('news', 'count', 'pagination'));
    }

    public function addImageAction()
    {
        if(isset($_GET['upload'])) {
            if($_POST['name'] = 'single') {
                $wmax = App::$app->getProperty('img_width');
                $hmax = App::$app->getProperty('img_height');
            }
        }
        $name = $_POST['name'];
        $news = new News();
        $news->uploadImg($name, $wmax, $hmax);
    }

    public function addAction()
    {
        if(!empty($_POST)){
            $news = new News();
            $data = $_POST;
            $news->load($data);
            $news->attributes['status'] = $news->attributes['status'] ? '1': '0';
            $news->getImg();
            $news->attributes['hit'] = $news->attributes['hit'] ? '1' : '0';
            if($id = $news->save('news')){
                $alias = AppModel::createAlias('news', 'alias', $data['title'],$id);
                $news = \R::load('news',$id);
                $news->alias = $alias;
                \R::store($news);
                $_SESSION['success'] = 'Новость добавлена';
            }
            redirect();
        }

        $this->setMeta('Добавить новость');
    }

    public function editAction()
    {
        if(!empty($_POST)){
            $id = $this->getId(false);
            $news = new News();
            $data = $_POST;
            $news->load($data);
            $news->attributes['status'] = $news->attributes['status'] ? '1': '0';
            $news->getImg();
            $news->attributes['hit'] = $news->attributes['hit'] ? '1' : '0';
            if($news->update('news', $id)){
                $alias = AppModel::createAlias('news', 'alias', $data['title'],$id);
                $news = \R::load('news',$id);
                $news->alias = $alias;
                \R::store($news);
                $_SESSION['success'] = 'Изменение сохранены';
                redirect();
            }
        }
        $id = $this->getId();
        $news = \R::load('news', $id);
        App::$app->setProperty('parent_id', $news->category_id);
        $this->setMeta("Редактирование новости {$news->title}");
        $this->set(compact('news'));
    }

    public function deleteAction()
    {
        $news_id = $this->getId();
        $news = \R::load('news', $news_id);
        \R::trash($news);
        $_SESSION['success'] = 'Новость удалена';
        redirect(ADMIN . '/news');
    }
}