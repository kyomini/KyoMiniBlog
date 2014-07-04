<?php

namespace Home\Widget {
use Think\Action;
    class CommentWidget extends Action
    {
        public function Index()
        {
            $Comment = M('Comment')->order('time DESC')->limit('5')->select();
            $this->assign('Comment', $Comment);
            S('index', $Comment, 10);
            $this->display('Widget:Comment');
        }
    }
}