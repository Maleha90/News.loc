<?php

use core\Router;
//Пользовательская часть поиск по категориям
Router::add('^news/(?P<alias>[a-z0-9-]+)/?$', ['controller'=>'news', 'action'=>'view']);
Router::add('^category/(?P<alias>[a-z0-9-]+)/?$', ['controller'=>'category', 'action'=>'view']);

//Админская часть
Router::add('^admin$', ['controller'=>'Main', 'action'=>'index', 'prefix'=>'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix'=>'admin']);

//Пользовательская часть
Router::add('^$', ['controller'=>'Main', 'action'=>'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
