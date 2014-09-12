<?php
namespace Home\Controller;
use Think\Controller;
class ListController extends CommonController {
	
    public function index(){
		

		$id = I('get.id');
		$Blog=M('article');
	    $count = $Blog->count();
		$Page =new \Think\Page($count,C('LISTPAGESIZE'));		
		$list=$Blog->where(array('cid'=>$id))->limit($Page->firstRow.','.$Page->listRows)->select();

   	     $show = $Page->show();
	    $this->assign('page',$show);

		$field=	array('cname');
		$cate=M('category')->field($field)->find($id);
		$this->cate=$cate;

		$this->list=$list;
	
		$this->display('/list');
    }
}
