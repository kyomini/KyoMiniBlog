<?php
namespace Admin\Controller;
use Think\Controller;

class ArticleController extends CommonController {   


	    public function index(){
		   $Blog=D("Article");
      
		   $count = $Blog->count();
		   $Page =new \Think\Page($count,10);		
		

   	       $show = $Page->show();

	       $list=$Blog->relation(true)->order('aid DESC')->limit($Page->firstRow.','.$Page->listRows)->select();

		   
		   $this->assign('list',$list);
	       $this->assign('page',$show);
	       $this->display('article_list');
    }
	
      
	
	
	
	 public function Article_add(){
		    $cate=D('category')->select();
            $this->cate=$cate;
        	 $this->display('write');
        }







	    Public function addcontent(){
			
			
			
        $upload = new \Think\Upload();// 实例化上传类

            $upload->maxSize = C('mi_maxSize'); // 设置附件上传大小
  	        $upload->exts  = array(C('mi_maxSize'));// 设置附件上传类型
			$upload->savePath = './thumbnail/';
			$upload->autoSub = true;
			$upload->subName  = array('date','Ymd');
			
			

      $info   =   $upload->upload();    

	  foreach($info as $file){        
      $file['savepath'].$file['savename'];   
	 
	  }
		

	  
	  

     
			
			
	
		   
	       

			$article = M('article');

             $data['title']  = $_POST['title'];
			 $data['content']  = stripslashes(htmlspecialchars_decode($_POST['content']));
			 $data['cid']  = $_POST['cid'];
			 if ($_POST['time'] == '') {
                $data['time'] = time();
            } else {
                $data['time'] = strtotime($_POST['time']);
            }
			 $data['tag']  = $_POST['tag'];
			 $data['click']  = $_POST['click'];
			 $data['hot']  = $_POST['hot'];
			 $data['summary']  = $_POST['summary'];
			 
			  if ($_POST['img'] == '') {
                $data['img'] = $_POST['img'].$file['savename'];
            } else {
                $data['img'] = $_POST['img'].$file['savename']; 

            }
		
	

			if($article -> add($data)){
				$this->success('撰写成功！');
			}else{
				$this->error('撰写错误！');
			}
		

			

		   
		   
		    }
			

	



		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		Public function mod () {
		$id = I('get.id');
		
		if(!empty($id)){
			$art=M('Article');
			$date=$art->where(array('aid'=>$id))->find($id);
			$this->assign('conn',$date);
			
			//获取分类
			$cat=M('category');
			$list=$cat->select();
			//复制给分类标签clist
			$this->assign('clist',$list);

			
		}
		$this->display('article_mod');
	}
   	  
		   

		   
		   
		   
		   
		   
		   
		   
		   		   
		   
	 	   
	  	public function del(){



        if(IS_POST){
			$ids=($_POST);

            $db = M("Article");
			//if(is_array($ids)
            if($ids){
            foreach($ids as $id){
             $db->where(array("aid" => $id))->delete();
                }
            }
            $this->success("批量删除成功！");
        }else{
            $id = I('get.id');
            $db = M("Article");
            $status = $db->where(array("aid" => $id))->delete();
            if ($status){
                $this->success("删除成功！");
            }else{
                $this->error("删除失败！");
            }
        } 
   

















		 
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
        $Form= M('Article');
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
	
	  
	
	
	
	
	
	
	
}




