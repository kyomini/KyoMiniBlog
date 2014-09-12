<?php
namespace Home\Controller;
use Think\Controller;
class PageController extends CommonController {
	
    public function index(){
		$name = $_GET['name'];
		$pagedb=M('page');
		$page = $pagedb->where("urlname ='$name'")->field(array('title','content'))->find();
        $this->one=$page ;
		S('page',$page,10);
		$this->display('/page');
    }
}