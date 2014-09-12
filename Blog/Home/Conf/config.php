<?php
$tempconfig = require('./Blog/Common/Conf/Temp.php');
$webconfig = require('./Blog/Common/Conf/Settings.php');
$dbconfig = require('./config.inc.php');
$config =  array(

   'LOG_RECORD' => false,
   'LOG_EXCEPTION_RECORD'  =>  false,   

    
	 'DEFAULT_THEME'    =>    C('template'),


	'VIEW_PATH'=>'./Template/',
	
	'TMPL_PARSE_STRING'=>array(     
	'[!TEMPLATE]'=>TMPL_PATH.'',
	'[!CSS]'=>__ROOT__.'/Template/'.$tempconfig['template'].'/Style/Css/',
	'[!JS]'=>__ROOT__.'/Template/'.$tempconfig['template'].'/Style/Js/',
	'[!IMG]'=>__ROOT__.'/Template/'.$tempconfig['template'].'/Style/Img/',
	'--URL--'=>__ROOT__,
	  ),
	  

	 'URL_HTML_SUFFIX'=>'html' ,
	'URL_MODEL'=>2,
    'URL_ROUTER_ON'=>true,
	'URL_ROUTE_RULES' => array( 
	 '/^cate\/([A-Za-z0-9]+$)/' => 'Home/cate/index?name=:1',
	 '/^page\/([A-Za-z0-9]+$)/' => 'Home/Page/index?name=:1',
	 '/^other\/([A-Za-z0-9]+$)/' => 'Home/other/index?name=:1',
	 '/^content\/(\d+)$/' => 'Home/Content/index?id=:1',
	 '/^list\/(\d+)$/' => 'Home/List/index?id=:1',
	 ),
	'DEFAULT_FILTER' => 'htmlspecialchars,stripslashes',
	
	'TOKEN_ON'      =>    true,  // 是否开启令牌验证 默认关闭
	'TOKEN_NAME'    =>    '__hash__',    // 令牌验证的表单隐藏字段名称，默认为__hash__
	'TOKEN_TYPE'    =>    'md5',  //令牌哈希验证规则 默认为MD5\
	'TOKEN_RESET'   =>    true,  //令牌验证出错后是否重置令牌 默认为true

);
return array_merge($dbconfig,$config,$webconfig,$tempconfig);