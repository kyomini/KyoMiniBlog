<?php
namespace Admin\Controller {
use Think\Controller;

    class LoginController extends Controller
    {
        public function index()
        {
            $this->display();
        }
        public function login_in()
        {
            if (!IS_POST) {
                halt('页面不存在');
            }
            $db = M('admin');
            if (I('verify', '', 'strtolower') == session('verify')) {
                $this->error('验证码错误！');
            }
            $user = $db->where(array('name' => I('name')))->find();
            if (!$user || $user['password'] != I('password', '', 'md5')) {
                $this->error('账号或密码错误');
            } else {
                $this->success('成功登陆', __ROOT__ . '/Admin');
            }
            session('id', $user['id']);
            session('logintime', date('Y-m-d H:i:s', $user['logintime']));
            session('loginip', $user['loginip']);
        }
        public function verify()
        {
            $config = array('fontSize' => 18, 'length' => 4, 'imageW' => 130, 'bg' => array(57, 179, 215), 'imageH' => 42, 'useCurve' => false, 'useNoise' => false);
            $verify = new \Think\Verify($config);
            $verify->entry();
        }
        public function _empty()
        {
            header('HTTP/1.0 404 Not Found');
            $this->display('Public:404');
        }
    }
}