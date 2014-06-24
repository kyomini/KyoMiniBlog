<?php
namespace Admin\Controller;
use Think\Controller;

class MenuController extends CommonController {   

		public function index(){
			$menu=M('menu')->order('sort ASC')->select();
            $this->menu=$menu;
		    $this->display('menu_list');
		   }

         public function add(){
		    $this->display('menu_add');
		   }

	    public function addmenu(){
		  if(M('menu')->add($_POST)){
			  $this->success('增加导航成功',__APP__.'/Menu');
			  }else{
			$this->error('增加失败');

				  }
			
			
			}
			
			public function sortupdata(){
					
				$db = M('menu');
				foreach($_POST as $mid => $sort){
					$db->where(array('mid'=>$mid))->setField('sort', $sort);
					}
				//$this->success('更新排序成功',__APP__.'/Menu');
		        $this->redirect('/Admin/Menu');
		   }
			
			
	Public function mod () {
		//$id=$_GET['id'];
		$id = I('get.id');
		
		if(!empty($id)){
			$art=M('menu');
			$date=$art->where(array('mid'=>$id))->find($id);
			$this->assign('menu',$date);
			
		}
		$this->display('menu_mod');
	}
   	
			
			
       //修改提交处理
    public function update(){
        //create方法
        $Form= M('menu');
        if($Form->create()) {
        $result = $Form->save();
        if($result) {
             //如果修改成功，跳转到首页
             $this->success('修改成功！',__APP__.'/Menu');
        }else{
             //否则修改错误
             $this->error('写入错误！');
        } 
             //否则系统异常错误
        }else{
        $this->error($Form->getError());
        }
    }
	
	
		
		public function del(){
	
		 $id =$_GET['id'];
		 $where = array('mid' => $id);
	    
         if (M('menu')->where($where)->delete()) {
            $this->success('删除成功');
         } else {
             $this->error('删除失败');   
         }  
		 
   }
			
			
			
			
			
			
			
	
       function _empty(){
       header("HTTP/1.0 404 Not Found");//使HTTP返回404状态码
       $this->display("Public:404");
}
	
	
}




