<?php
namespace Admin\Controller {
use Think\Controller;
     
    class CommonController extends Controller
    {
		
		static protected $deny  = array('recordList');

		//判断SESSION
        public function _initialize()
        {
            if (!isset($_SESSION['id'])) {
                $this->redirect('/Admin/Login');
            }
	

			
        }
        //排序\ソート\Sort  
        public function setHot($id, $hot)
        {
            $model = M('article');
            $data = array('hot' => $hot);
            $map['aid'] = array('in', $id);
            $result = $model->where($map)->setField($data);
            return $result;
        }
		
		//404的定義\404の定義\Definition of 404
	   public function _empty()
	   {
       header("HTTP/1.0 404 Not Found");
       $this->display("Public:404");
       }
	   
	

	   
		
    }
	

   


}