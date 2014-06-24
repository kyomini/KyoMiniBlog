<?php
namespace Admin\Controller {
    use Think\Controller;
    class ArticleController extends CommonController
    {
        public function index()
        {
            $Blog = D('Article');
            $count = $Blog->count();
            $Page = new \Think\Page($count, 10);
            $show = $Page->show();
            $list = $Blog->relation(true)->order('aid DESC')->limit(($Page->firstRow . ',') . $Page->listRows)->select();
            $this->assign('list', $list);
            $this->assign('page', $show);
            $this->display('article_list');
        }
        public function Article_add()
        {
            $cate = D('category')->select();
            $this->cate = $cate;
            $this->display('write');
        }
        public function addcontent()
        {
            $upload = new \Think\Upload();
            $upload->maxSize = C('mi_maxSize');
            $upload->exts = array(C('mi_maxSize'));
            $upload->savePath = './thumbnail/';
            $upload->autoSub = true;
            $upload->subName = array('date', 'Ymd');
            $info = $upload->upload();
            foreach ($info as $file) {
                $file['savepath'] . $file['savename'];
            }
            $article = M('article');
            $data['title'] = $_POST['title'];
            $data['content'] = $_POST['content'];
            $data['cid'] = $_POST['cid'];
            if ($_POST['time'] == '') {
                $data['time'] = time();
            } else {
                $data['time'] = strtotime($_POST['time']);
            }
            $data['tag'] = $_POST['tag'];
            $data['click'] = $_POST['click'];
            $data['hot'] = $_POST['hot'];
            $data['summary'] = $_POST['summary'];
            if ($_POST['img'] == '') {
                $data['img'] = $_POST['img'] . $file['savename'];
            } else {
                $data['img'] = $_POST['img'] . $file['savename'];
            }
            if ($article->add($data)) {
                $this->success('<p>'.L('Write_success').'</p>');
            } else {
                $this->error('<p>'.L('Write_error').'</p>');
            }
        }
        public function mod()
        {
            $id = I('get.id');
            if (!empty($id)) {
                $art = M('Article');
                $date = $art->where(array('aid' => $id))->find($id);
                $this->assign('conn', $date);
                $cat = M('category');
                $list = $cat->select();
                $this->assign('clist', $list);
            }
            $this->display('article_mod');
        }
        public function del()
        {
            if (IS_POST) {
                $ids = $_POST;
                $db = M('Article');
                if ($ids) {
                    foreach ($ids as $id) {
                        $db->where(array('aid' => $id))->delete();
                    }
                }
                $this->success('<p>'.L('batchdell_success').'</p>');
            } else {
                $id = I('get.id');
                $db = M('Article');
                $status = $db->where(array('aid' => $id))->delete();
                if ($status) {
                    $this->success('<p>'.L('dell_success').'</p>');
                } else {
                    $this->error('<p>'.L('dell_error').'</p>');
                }
            }
        }
        public function hot()
        {
            $id = $_GET['id'];
            $hot = $_GET['hot'];
            $result = $this->setHot($id, $hot);
            if ($result) {
                $this->success('<p>'.L('set_success').'</p>');
            } else {
                $this->error('<p>'.L('set_error').'</p>');
            }
        }
        public function update()
        {
            $Form = M('Article');
            if ($Form->create()) {
                $result = $Form->save();
                if ($result) {
                    $this->success('<p>'.L('success').'</p>');
                } else {
                    $this->error('<p>'.L('error').'</p>');
                }
            } else {
                $this->error($Form->getError());
            }
        }
    }
}