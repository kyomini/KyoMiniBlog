<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

/**
 * 安装程序配置文件
 */

define('INSTALL_APP_PATH', realpath('./') . '/');

return array(
    
    'ORIGINAL_TABLE_PREFIX' => 'Mi_', //默认表前缀

    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__ . '/Blog/' . MODULE_NAME . '/Style/',
        '__IMG__'    => __ROOT__ . '/Blog/' . MODULE_NAME . '/Style/img',
        '__CSS__'    => __ROOT__ . '/Blog/' . MODULE_NAME . '/Style/css',
        '__JS__'     => __ROOT__ . '/Blog/' . MODULE_NAME . '/Style/js',
    ),

);