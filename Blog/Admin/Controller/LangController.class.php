<?php
namespace Admin\Controller {
use Think\Controller;
    class LangController extends CommonController
    {
        public function index()
        {
            $this->display('index');
        }
        public function Update()
        {
            $return = \Think\Storage::put(APP_PATH . 'Common/Conf/Lang.php', ('<?php return  ' . var_export($_POST, true)) . ';', 'F');
            if ($return == true) {
                $this->success('<p>'.L('lang_success').'</p>', (__ROOT__ . '/Admin/Lang?l=') . C('LANG_LIST'));
            } else {
                $this->error('<p>'.L('lang_error').'</p>');
            }
        }
    }
}