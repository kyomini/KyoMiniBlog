<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Install\Controller;
use Think\Controller;

class IndexController extends Controller{
	//安装首页
	public function index(){ 
		if(is_file(MODULE_PATH . 'Data/install.lock')){
			$this->error('请删除Blog/install整个文件');
		}
		session('step', 0);
		session('error', false);
		$this->display();
	}

	//安装完成
	public function complete(){
		$step = session('step');

		if(!$step){
			$this->redirect('index');
		} elseif($step != 3) {
			$this->redirect("Install/step{$step}");
		}

		//创建入口文件
		write_index();
		file_put_contents('Blog/Runtime/Data/install.lock', '');
		
		session('step', null);
		session('error', null);
		$this->display();
	}
}