<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Category;

class CategoryController extends CommonController {   

		public function index(){
			$cate=M('category')->select();
			$cate = Category::zifenlei($cate,'--');
	
            $this->assign('cate',$cate);
			
		    $this->display('category_list');
		   }

	   public function Category_add(){
		     $this->pid=I('pid', 0, 'intval');
        	 $this->display('category_add');
        }


	    public function addCategory(){
			$db=M('category');
			if($db->add($_POST)){
				$this->success(L('_addOK_'),'../Category');
				}else{
				$this->error(L('_addNO_'));
				}

		   }
   
		   
    public function update(){
        $Form= M('category');
        if($Form->create()) {
        $result = $Form->save();
	
        if($result) {

             $this->success(L('success'));
        }else{
             $this->error(L('error_success'));
        } 
        }else{
        $this->error($Form->getError());
        }
    }
 
		Public function mod () {
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
            $this->success(L('dell_success'));
         } else {
             $this->error(L('dell_error'));   
         }  
		 
   }
	

}




