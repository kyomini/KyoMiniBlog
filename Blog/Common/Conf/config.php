<?php
$config = require './config.inc.php';

$array = array(

	'URL_HTML_SUFFIX' => '', //地址后缀为空 没有html
	//'SHOW_PAGE_TRACE' =>true, // 显示页面Trace信息

	'LOAD_EXT_CONFIG' => 'Settings,Lang,Picture,Temp',//加载扩展配置项,'基本配置','图片上传,Picture配置'
	//'DEFAULT_FILTER' => 'htmlspecialchars,stripslashes',//过滤

	
	'LANG_SWITCH_ON' => true,   // 开启语言包功能
	//'LANG_AUTO_DETECT' => true, // 自动侦测语言 开启多语言功能后有效
	//'LANG_LIST'        => 'zh-cn,zh-tw', // 允许切换的语言列表 用逗号分隔
	'VAR_LANGUAGE'     => 'l', // 默认语言切换变量
	 'rootPath' => './Uploads/Picture/', //上传图片保存根路径

	
	'DATA_BACKUP_PATH' => './Blog/Backups',
	'DATA_BACKUP_PART_SIZE' => 20971520,
	'DATA_BACKUP_COMPRESS' => 1,
	'DATA_BACKUP_COMPRESS_LEVEL' => 9,
	
	
	
	'MODULE_DENY_LIST'      =>  array('Common','Runtime'), // 禁止访问的模块列表
	'MODULE_ALLOW_LIST'     =>  array('Home','Admin'),    // 允许访问的模块列表
	
	
	
	
	

);
return array_merge($config,$array);
?> 