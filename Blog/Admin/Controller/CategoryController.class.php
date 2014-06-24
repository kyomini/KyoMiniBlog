<?php
namespace Admin\Controller;
use Think\Controller;

class CategoryController extends CommonController {   

		public function index(){
			$cate=M('category')->select();
            $this->assign('cate',$cate);
			
		    $this->display('category_list');
		   }

	
	
       function _empty(){
       header("HTTP/1.0 404 Not Found");//使HTTP返回404状态码
       $this->display("Public:404");
}
	
	
	
	 public function Category_add(){
        	 $this->display('category_add');
        }







	    public function addCategory(){
			$db=M('category');
			if($db->add($_POST)){
				$this->success('增加分类成功','../Category');
				}else{
				$this->error('增加分类失败');
				}

		   }
		   
		   
		   
		   
	
		   
		   

		   
		   
    public function update(){
        //create方法
        $Form= M('category');
        if($Form->create()) {
        $result = $Form->save();
	
        if($result) {
             //如果修改成功，跳转到首页,

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
   
		   
		Public function mod () {
		//$id=$_GET['id'];
		$id = I('get.id');
		
		if(!empty($id)){
			$art=M('category');
			$date=$art->where(array('cid'=>$id))->find($id);
			$this->assign('cate',$date);
			
		}
		$this->display('category_mod');
	}
   	  
		   
		   
		   
		   
		   		   
		   
	 	   
	   public function del(){
		 $id =$_GET['id'];
		 $where = array('cid' => $id);
	    
         if (M('category')->where($where)->delete()) {
            $this->success('删除成功');
         } else {
             $this->error('删除失败');   
         }  
		 
   }
	
	
	
	
	
	
	
	
	
	
	
	
}




