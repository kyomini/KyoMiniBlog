<?php
namespace Home\Controller;
use Think\Controller;
class CateController extends CommonController {
	
    public function index(){
		
	    $name = $_GET['name'];
		
		$Blog=M('category');
		
		p($name);
		
	
		
		//$where =(array('urlname'=>$name));
		
		$cates = $Blog->where("urlname ='$name'")->find();
		$this->cates=$cates;
		p($list);
		
	

	    // $list=$Blog->where($where)->limit($Page->firstRow.','.$Page->listRows)->find();
      
	  
		//$list=$Blog->field($where)->find($name);
	  
   	       //$show = $Page->show();
	      // $this->assign('page',$show);
		
		
		$field=	array('cname');
		$cate=M('category')->field($field)->find($id);
		$this->cate=$cate;
		
		
		
		
		
		
		
		//S('List',$list,10);
	
		$this->display('/cates');
    }
}