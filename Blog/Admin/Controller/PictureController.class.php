<?php
namespace Admin\Controller;
use Think\Controller;

class PictureController extends CommonController {
    public function index() {
        $this->display('index');
    }
    public function Update() {
        $Picture = \Think\Storage::put(APP_PATH . 'Common/Conf/Picture.php', '<?php return  ' . var_export($_POST, true) . ';', 'F');
        if ($Picture == true) {
            $this->success('<p>设置成功！</p>');
        } else {
            $this->error('<p>设置失败，请检查这个目录下的0777权限</p>');
        }
    }
}

