<?php

namespace app\controllers;

class FooterNews
{
    public $footers = [];
    public function footerNewsId()
    {
        $footer = \R::getAll('SELECT * FROM news WHERE id ORDER BY id DESC LIMIT 3');
        $this->footers = $footer;
    }
}