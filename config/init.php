<?php
define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("APP", ROOT . '/app');
define("PUB", ROOT . '/public');
define("CONF", ROOT . '/config');
define("TMP", ROOT . '/tmp');
define("CACHE", ROOT . '/tmp/cache');
define("COR", ROOT . '/vendor/core');
define("LAYOUT", 'news');


//http://news.loc/public/index.php
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
//http://news.loc/public/
$app_path = preg_replace('#[^/]+$#','', $app_path);
//http://news.loc/
$app_path = str_replace('/public/', '', $app_path);

define("PATH", $app_path);
define("ADMIN", PATH . '/admin');

require_once '../vendor/autoload.php';