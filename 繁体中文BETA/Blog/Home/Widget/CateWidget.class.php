<?php
namespace Home\Widget {
use Think\Action;
    class CateWidget extends Action
    {
        public function Index()
        {
            $Cate = M('Category')->order('cid DESC')->limit('10')->select();
            $this->assign('Cate', $Cate);
            S('index', $Cate, 10);
            $this->display('Widget:Cate');
        }
    }
}