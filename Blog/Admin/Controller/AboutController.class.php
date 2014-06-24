<?php
namespace Admin\Controller {
    use Think\Controller;
    class AboutController extends CommonController
    {
        public function index()
        {
            $this->display('About');
        }
    }
}