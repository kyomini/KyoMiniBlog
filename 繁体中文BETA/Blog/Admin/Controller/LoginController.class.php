<?php
/*
 *登陆模块（控制器） 
 *程序Krosa
 */
namespace Admin\Controller {
use Think\Controller;

    class LoginController extends Controller
    {
        //实例化登陆首页
        public function index()
        {
            $this->display();
        }
        //验证用户密码提交
        public function login_in()
        {
            if (!IS_POST) {
                halt('页面不存在');
            }
            $db = M('admin');
            //判断验证码
            if (I('verify', '', 'strtolower') == session('verify')) {
                $this->error('验证码错误！');
            }
            //判断用户名和密码
            $user = $db->where(array('name' => I('name')))->find();
            if (!$user || $user['password'] != I('password', '', 'md5')) {
                $this->error('账号或密码错误');
            } else {
                $this->success('成功登陆', __ROOT__ . '/Admin');
            }
            //id、登陆时间、登陆ip条件
            //$data = array(
            //		'id' => $user['id'],
            //		'logintime' => time(),
            //		'loginip' => get_client_ip()
            //		);
            $db->save($data);
            //存储id,时间和ip会话
            session('id', $user['id']);
            session('logintime', date('Y-m-d H:i:s', $user['logintime']));
            session('loginip', $user['loginip']);
        }
        //导入验证码，4为文字
        public function verify()
        {
            $config = array('fontSize' => 18, 'length' => 4, 'imageW' => 130, 'bg' => array(57, 179, 215), 'imageH' => 42, 'useCurve' => false, 'useNoise' => false);
            $verify = new \Think\Verify($config);
            $verify->entry();
        }
        //404代码
        public function _empty()
        {
            header('HTTP/1.0 404 Not Found');
            $this->display('Public:404');
        }
    }
}