<?php
namespace Home\Widget;

use Think\Action;
use Think\Category;
class CateWidget extends Action
{
    public function Index()
    {
        $nva = M('category')->select();
        $cate = category::zifenleis($nva);
        $this->assign('cate', $cate);
        S('index', $cate, 10);
        $this->display('Widget:Cate');
    }
}