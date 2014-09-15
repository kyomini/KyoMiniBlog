<?php
namespace Admin\Controller;
use Think\Controller;
class SettingsController extends CommonController {
    public function index() {
        $this->display('index');
    }
    public function Update() {
        $confpath = \Think\Storage::put(APP_PATH . 'Common/Conf/Settings.php', '<?php return  ' . var_export($_POST, true) . ';', 'F');
        if ($confpath == true) {
            $this->success('<p>修改配置成功！</p>');
        } else {
            $this->error('<p>修改配置失败，请检查这个目录下的0777权限</p>');
        }
    }
}

