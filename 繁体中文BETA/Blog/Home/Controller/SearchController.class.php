<?php
namespace Home\Controller;
use Think\Controller;


class SearchController extends CommonController{
	

    public function index(){
		
		   
	$select = M('article');   
	$data= $_POST['title'];
	if(empty($data)){
			$this->error('搜索关键字不能为空！');
		}
    $where['title']=array('LIKE',"%{$_POST['title']}%");
    $db = $select->where($where)->select();
	$this->assign('Search',$db);  
    $this->display('/Search');
		

   
    }

	
}