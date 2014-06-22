<?php
namespace Admin\Controller;
use Think\Controller;
	
class LangController extends CommonController {
    public function index() {
	
        $this->display('index');
		
    }
   public function Update()
    {
        $return = \Think\Storage::put(APP_PATH.'Common/Conf/Lang.php', '<?php return  '.var_export($_POST,true).';', 'F');
		
		
		
        if ($return == true) {
            $this->success('<p>更新语言成功！</p>',__ROOT__.'/Admin/Lang?l='.C('LANG_LIST'),0);
        } else {
            $this->error('<p>更新语言失败，请检查这个目录下的0777权限</p>');
        }
    }
}

