<?php
$tempconfig = require('./Blog/Common/Conf/Temp.php');
$webconfig = require('./Blog/Common/Conf/Settings.php');
$dbconfig = require('./config.inc.php');
$config =  array(

    
	 'DEFAULT_THEME'    =>    'default',


	'VIEW_PATH'=>'./Template/',
	
	'TMPL_PARSE_STRING'=>array(   	//模版变量规则采用新规则输出        
	'[!TEMPLATE]'=>TMPL_PATH.'',
	'[!CSS]'=>__ROOT__.'/Template/'.$tempconfig['template'].'/Style/Css/',
	'[!JS]'=>__ROOT__.'/Template/'.$tempconfig['template'].'/Style/Js/',
	'[!IMG]'=>__ROOT__.'/Template/'.$tempconfig['template'].'/Style/Img/',
	  ),
	  
	     'LOG_RECORD'            =>  false,  // 进行日志记录
    'LOG_EXCEPTION_RECORD'  =>  false,    // 是否记录异常信息日志
	 'URL_HTML_SUFFIX'=>'html' ,
	'URL_MODEL'=>2,
    'URL_ROUTER_ON'=>true,
	'URL_ROUTE_RULES' => array( //定义路由规则
     'list/:id' => 'List/index',
	 'content/:id' => 'Home/Content/index',
	 'p/:id' => 'Page/index',
	 )
	
);
return array_merge($dbconfig,$config,$webconfig,$tempconfig);