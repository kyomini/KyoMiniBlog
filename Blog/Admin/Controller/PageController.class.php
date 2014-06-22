<?php

namespace Admin\Controller;
use Think\Controller;

class PageController extends CommonController {
    public function index() {
		$db=M('Page');
	

		   $count = $db->count();
		   $Page =new \Think\Page($count,2);		
		  $Page->setConfig('prev','<');
          $Page->setConfig('next','>');

   	   $show = $Page->show();
		$one = $db->order('pid DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
	  
		$this->assign('page',$show);
		$this->assign('one',$one);
        $this->display('Page_list');
		
    }
    
      public function addpage(){
		  $this->display('Page_add');
		  
	  }
	   
		public function add(){
		  
			
		$con=M('Page');
			if($con->add($_POST)){
				$this->success('增加数据成功');
				}else{
				$this->error('增加数据失败');
				}
		
		   }
		

	   
	public function del(){






        if(IS_POST){
            //$ids = I('post.pid');
			$ids=($_POST);
			//p($ids);
			//die();
            $db = M("Page");
			//if(is_array($ids)
            if($ids){
                             foreach($ids as $id){
                             $db->where(array("pid" => $id))->delete();
                }
            }
            $this->success("批量删除成功！");
        }else{
            $id = I('get.id');
            $db = M("Page");
            $status = $db->where(array("pid" => $id))->delete();
            if ($status){
                $this->success("删除成功！");
            }else{
                $this->error("删除失败！");
            }
        } 
   

















		 
   }
   
   
   
   
    Public function mod () {
		$id=$_GET['id'];
		// $id = I('get.id');
		if(!empty($id)){
			$art=M('Page');
			$where = array('pid' => $id);
			
			$date=$art->where($where)->find($id);
			$this->assign('one',$date);
			
		}
		$this->display('Page_mod');
	}
   
   
   
       //修改提交处理
    public function update(){
        //create方法
        $Form= M('Page');
        if($Form->create()) {
        $result = $Form->save();
        if($result) {
             //如果修改成功，跳转到首页
             $this->success('操作成功！');
        }else{
             //否则修改错误
             $this->error('写入错误！');
        } 
             //否则系统异常错误
        }else{
        $this->error($Form->getError());
        }
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    function _empty() {
        header("HTTP/1.0 404 Not Found"); //使HTTP返回404状态码
        $this->display("Public:404");
    }
   
}

