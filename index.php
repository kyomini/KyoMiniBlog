<?php
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');
define('APP_DEBUG',false);
define('APP_PATH','./Blog/');
define("LANG_PATH", "./Blog/Lang/");
define('DIR_SECURE_FILENAME', 'index.html');
define('DIR_SECURE_CONTENT', 'No direct script access allowed!');
require './Core/ThinkPHP.php';