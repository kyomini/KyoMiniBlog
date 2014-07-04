<?php
namespace Admin\Controller;
use Think\Controller;


class IndexController extends CommonController{
	

    public function index(){
		
		$db=M('page');
		$pages = $db->count();
        $this->assign('pagecount',$pages);
		
		$db2=M('article');
		$article = $db2->count();
        $this->assign('articlecount',$article);
		
		$adb=M('article');
		$aidb = $adb->order('aid DESC')->limit(6)->select();
		$this->assign('articles',$aidb);

		$db3=M('category');
		$category = $db3->count();
        $this->assign('categorycount',$category);
		
		$db4=M('comment');
		$commen = $db4->count();
        $this->assign('commentcount',$commen);
		
		$db5=M('comment');
		$commen =$db5->order('coid DESC')->limit(6)->select();
        $this->assign('comment',$commen);
		
		


		
        $this->display();
		

   
    }
	
    //退出登录
    public function login_out() {
        session_unset();
        session_destroy();
        $this->success('成功退出', __APP__.'/Admin/Login');
    }
	
	
	
	public function cache_del() {
        header("Content-type: text/html; charset=utf-8");
        //清文件缓存
        $dirs = array(
            'Blog/Runtime/Cache',
			'Blog/Runtime/Temp',
			'Blog/Runtime/Logs',
        );
        @mkdir('Blog/Runtime', 0777, true);
        //清理缓存
        foreach ($dirs as $value) {
            $this->rmdirr($value);
        }
        $this->success('更新全部缓存成功！');
    }
	
    public function rmdirr($dirname) {
        if (!file_exists($dirname)) {
            return false;
        }
        if (is_file($dirname) || is_link($dirname)) {
            return unlink($dirname);
        }
        $dir = dir($dirname);
        if ($dir) {
            while (false !== $entry = $dir->read()) {
                if ($entry == '.' || $entry == '..') {
                    continue;
                }
                //递归
                $this->rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
            }
        }
        $dir->close();
        return rmdir($dirname);
    }
	//更新修改密码
	public function update() {
        $User = M('Admin');
        $data['id'] = $_POST['id'];
        $data['nickname'] = $_POST['nickname'];
        $data['password'] = md5($_POST['password']);
        $count = $User->save($data);
        if ($count > 0) {
            $this->success('修改成功');
        } else {
            $this->error('修改失败');
        }
    }
	
}