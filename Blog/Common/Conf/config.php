<?php
$config = require './config.inc.php';
$array = array(
	'URL_CASE_INSENSITIVE'=>true,
	'URL_HTML_SUFFIX' => '', 
	'LOAD_EXT_CONFIG' => 'Settings,Lang,Picture,Temp',
	'LANG_SWITCH_ON' => true,   
	'DEFAULT_LANG'          =>  'zh-cn', 
	'VAR_LANGUAGE'     => 'l', 
	'rootPath' => './Uploads/Picture/', 
	'DATA_BACKUP_PATH' => './Blog/Backups',
	'DATA_BACKUP_PART_SIZE' => 20971520,
	'DATA_BACKUP_COMPRESS' => 1,
	'DATA_BACKUP_COMPRESS_LEVEL' => 9,
	'MODULE_DENY_LIST'      =>  array('Common','Runtime'), 
	'MODULE_ALLOW_LIST'     =>  array('Home','Admin'),
);
return array_merge($config,$array);
?> 