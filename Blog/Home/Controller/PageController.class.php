<?php

class PageAction extends Action {
	
    public function index(){
		$id = I('get.id');
		$field=	array('title','content');
		$page=M('page')->field($field)->find($id);
		$this->page=$page;
		S('page',$list,10);
		$this->display('/page');
    }
}