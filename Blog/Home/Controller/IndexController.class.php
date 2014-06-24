<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	
    public function index(){



   $menu=M('menu')->order('sort ASC')->select();
   $this->menu=$menu;

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