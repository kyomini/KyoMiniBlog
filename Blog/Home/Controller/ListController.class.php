<?php
// 
class ListAction extends Action {
	
    public function index(){
		
	  	$menu=M('menu')->order('sort ASC')->select();
        $this->menu=$menu;

		$id = I('get.id');
		//$list=M('article')->where(array('cid'=>$id))->limit()->select();

		$list=M('article')->where(array('cid'=>$id))->select();
		
		
		
		$field=	array('cname');
		$cate=M('category')->field($field)->find($id);
		$this->cate=$cate;
		
		
		
		
		
		
		$this->list=$list;
		//S('List',$list,10);
	
		$this->display('/list');
    }
}