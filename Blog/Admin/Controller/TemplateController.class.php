<?php
namespace Admin\Controller;
use Think\Controller;
class TemplateController extends CommonController {
    public function index() {
        $this->display();
    }
    public function Update() {
        $return = \Think\Storage::put(APP_PATH . 'Common/Conf/Temp.php', '<?php return  ' . var_export($_POST, true) . ';', 'F');
        if ($return == true) {
            $this->success('<p>' . L('success') . '</p>');
        } else {
            $this->error('<p>更新失败，请检查这个目录下的0777权限</p>');
        }
    }
}
?>         

