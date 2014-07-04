<?php
namespace Home\Widget {
use Think\Action;

	  class FilingWidget extends Action
    {
        public function Index()
        {
        $Filing = M('Article')->order('time DESC')->limit('12')->select();
           $this->assign('filing', $Filing);
           S('index', $Filing, 10);
          $this->display('Widget:Filing');

        }
		
		
		
    }
	
	
	
	
	
	
	
}