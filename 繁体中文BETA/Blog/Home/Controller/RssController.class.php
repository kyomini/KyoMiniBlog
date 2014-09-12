<?php
namespace Home\Controller;
use Think\Controller;


class RssController extends Controller {

	

    public function Index(){
        $this->assign('abc', 'abc222222222');
 
        $pagename = '123';        //页面名称
        $temppath = '';        //显示模版路径
 
        //查看配置文件是否开启显示静态模版
        if(C('IS_HTML'))
        {
            //判断是否已经生成静态页面
            if(!is_file(HTML_PATH . '/'. $pagename .'html'))
                $this->buildHtml($pagename, HTML_PATH.'/', 'index', 'utf8');//注意：index为动态模版 这里的utf8不能写成utf-8
 
            $temppath = HTML_PATH . '/'. $pagename .'html';
        }
 
        $this->display($temppath);
    }
 
}
	
	
	
	
	
