<?php
namespace Home\Controller;
use Think\Controller;
class ContentController extends Controller {
    public function index(){
		$menu=M('menu')->order('sort ASC')->select();
        $this->menu=$menu;
		//$id =(int) $_GET['id'];
		$id = I('get.id');
		$field=	array('title','content','time');
		$blog=M('article')->field($field)->find($id);
		$this->blog=$blog;
		S('Content',$blog,10);
		$this->display('/Content');
    }
}