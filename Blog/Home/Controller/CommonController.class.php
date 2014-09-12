<?php
namespace Home\Controller {
use Think\Controller;
     
    class CommonController extends Controller
    {

        public function _initialize()
        {
        $menu=M('menu')->order('sort ASC')->select();
        $this->menu=$menu;
		
    }

	
}

}