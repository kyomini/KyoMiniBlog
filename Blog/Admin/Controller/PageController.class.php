<?php
namespace Admin\Controller;
use Think\Controller;

class PageController extends CommonController {
    public function index() {
        $db = M('Page');
        $count = $db->count();
        $Page = new \Think\Page($count, 20);
        $Page->setConfig('prev', '<');
        $Page->setConfig('next', '>');
        $show = $Page->show();
        $one = $db->order('pid DESC')->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('page', $show);
        $this->assign('one', $one);
        $this->display('Page_list');
    }
    public function addpage() {
        $this->display('Page_add');
    }
    public function add() {
        $article = M('Page');
        $data['title'] = I('post.title');
        $data['content'] = I('post.content');
        $data['keywords'] = I('post.keywords');
        $data['description'] = I('post.description');
		$data['urlname'] =I('post.urlname');
        if ($article->add($data)) {
            $this->success('增加单页成功');
        } else {
            $this->error('增加单页失败');
        }
    }
    public function del() {
        if (IS_POST) {
            $ids = ($_POST);
            $db = M("Page");
            if ($ids) {
                foreach ($ids as $id) {
                    $db->where(array(
                        "pid" => $id
                    ))->delete();
                }
            }
            $this->success("批量删除成功！");
        } else {
            $id = I('get.id');
            $db = M("Page");
            $status = $db->where(array(
                "pid" => $id
            ))->delete();
            if ($status) {
                $this->success("删除成功！");
            } else {
                $this->error("删除失败！");
            }
        }
    }
    Public function mod() {
        $id = $_GET['id'];
        if (!empty($id)) {
            $art = M('Page');
            $where = array(
                'pid' => $id
            );
            $date = $art->where($where)->find($id);
            $this->assign('one', $date);
        }
        $this->display('Page_mod');
    }
    public function update() {
        $Form = M('Page');
        if ($Form->create()) {
            $result = $Form->save();
            if ($result) {
                $this->success('操作成功！');
            } else {
                $this->error('写入错误！');
            }
        } else {
            $this->error($Form->getError());
        }
    }
}

