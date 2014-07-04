<?php
namespace Admin\Controller;
use Think\Controller;

class CommentController extends CommonController {   


	    public function index(){
			
			
		   $Comment=M("Comment");
      
		   $count = $Comment->count();
		   $Page =new \Think\Page($count,15);		
		   $Page->setConfig('prev','<');
           $Page->setConfig('next','>');

   	       $show = $Page->show();
	       $list=$Comment->order('coid DESC')->limit($Page->firstRow.','.$Page->listRows)->select();

		   
		   $this->assign('list',$list);
	       $this->assign('page',$show);
	       $this->display('');
    }
	
      
	
	
	





	
	
		   
	       

	



		   
	
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		Public function mod () {
		$id = I('get.id');
		
		if(!empty($id)){
			$art=M('Comment');
			$date=$art->where(array('coid'=>$id))->find($id);
			$this->assign('conn',$date);
			
		}
		$this->display('Comment_mod');
	}
   	  
		   

	

	
	
	
	
	
	
	 public function hot()
    {
        $id = $_GET['id'];
        $hot = $_GET['hot'];
        $result = $this->setHot($id, $hot);
        if ($result) {
            $this->success('属性设置成功');
        } else {
            $this->error('属性设置失败');
        }
    }
	
	
	
	
	 public function update(){
        //create方法
        $Form= M('Comment');
        if($Form->create()) {
        $result = $Form->save();
        if($result) {
             //如果修改成功，跳转到首页
             $this->success('操作成功！',__APP__.'/Admin/Comment');
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



        if(IS_POST){
			$ids=($_POST);

            $db = M("Comment");
			//if(is_array($ids)
            if($ids){
            foreach($ids as $id){
             $db->where(array("coid" => $id))->delete();
                }
            }
            $this->success("批量删除成功！");
        }else{
            $id = I('get.id');
            $db = M("Comment");
            $status = $db->where(array("coid" => $id))->delete();
            if ($status){
                $this->success("删除成功！");
            }else{
                $this->error("删除失败！");
            }
        } 
 
   }
	
	
	
}




