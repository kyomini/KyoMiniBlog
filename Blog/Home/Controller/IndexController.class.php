<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends CommonController {
	
    public function index(){

           $Blog=D('Article');

           $count = $Blog->count();
		   $Page =new \Think\Page($count,C('PAGESIZE'));		
   	       $show = $Page->show();
	       $this->assign('page',$show);
	       $list=$Blog->relation(true)->order('aid DESC')->limit($Page->firstRow.','.$Page->listRows)->select();

           $this->assign('list',$list);
		   S('index',$list,10);
		  $this->display('/Index');
   
    }


		   
}