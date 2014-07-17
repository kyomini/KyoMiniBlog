<?php
if (!file_exists('Blog/Runtime/Data/install.lock')) {
	$_GET['m'] = 'Install';
}
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',false);
define('APP_PATH','./Blog/');
define("LANG_PATH", "./Blog/Lang/"); //定义，多语言目录
define('DIR_SECURE_FILENAME', 'index.html');
define('DIR_SECURE_CONTENT', 'No direct script access allowed!');
require './Core/ThinkPHP.php';