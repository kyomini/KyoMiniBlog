<?php
namespace Home\Controller;
use Think\Controller;
class PageController extends CommonController {
	
    public function index(){
		$id = I('get.id');
		$field=	array('title','content');
		$page=M('page')->field($field)->find($id);
		$this->one=$page;
		S('page',$list,10);
		$this->display('/page');
    }
}