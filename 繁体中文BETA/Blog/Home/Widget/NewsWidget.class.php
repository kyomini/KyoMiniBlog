<?php

namespace Home\Widget {
use Think\Action;
    class NewsWidget extends Action
    {
        public function Index()
        {
            $news = M('Article')->order('time DESC')->limit('5')->select();
            $this->assign('news', $news);
            S('index', $news, 10);
            $this->display('Widget:News');
        }
    }
}