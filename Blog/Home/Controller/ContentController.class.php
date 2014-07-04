<?php
namespace Home\Controller;
use Think\Controller;

class ContentController extends CommonController {
    public function index(){

		$id = I('get.id');
		$field=	array('aid','title','content','time');
		$blog=M('article')->field($field)->find($id);
		$this->blog=$blog;
		
		
	    $coms=M('article')->$id;

		$com=M('Comment')->where('aid='.$id)->order('time DESC')->select();
        $this->assign('com', $com);
		
		
		$db=M('comment');
		$comcount = $db->where('aid='.$id)->count();
        $this->assign('comcount',$comcount);
		
		
		S('Content',$blog,10);
		S('Content',$com,10);
		$this->display('/Content');
    }
	public function add(){
		
		
		 //判断验证码
            if (I('verify', '', 'strtolower') == session('verify')) {
                $this->error('验证码错误！');
            }
     
            $article = M('comment');
			$article->find($_GET["coid"]); 
            $data['aid'] = $_POST['aid'];
			$data['couname'] = $_POST['couname'];
            $data['content'] = $_POST['content'];
            if ($_POST['time'] == '') {
                $data['time'] = time();
            } else {
                $data['time'] = strtotime($_POST['time']);
            }
            $data['email'] = $_POST['email'];
           
            if ($article->add($data)) {
                $this->success('<p>提交成功</p>');
            } else {
                $this->error('<p>'.L('Write_error').'</p>');
            }

		
    }
	 //导入验证码，4为文字
        public function verify()
        {
            $config = array('fontSize' => 18, 'length' => 4, 'imageW' => 130, 'bg' => array(57, 179, 215), 'imageH' => 42, 'useCurve' => false, 'useNoise' => false);
            $verify = new \Think\Verify($config);
            $verify->entry();
        }
	
	
	
}