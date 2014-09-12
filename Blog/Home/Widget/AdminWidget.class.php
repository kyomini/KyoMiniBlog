<?php
/*
  其它Widget
*/
namespace Home\Widget {
use Think\Action;
    class AdminWidget extends Action
    {
        public function Index()
        {
            $this->display('Widget:Admin');
        }

    }
}