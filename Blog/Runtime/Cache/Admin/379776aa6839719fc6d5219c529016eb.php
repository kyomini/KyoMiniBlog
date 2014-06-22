<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<title>Admin | KyoMini Blog</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <link rel="stylesheet" href="/KyoMini/Blog/Admin/View/Public/css/bootstrap.css">
     <link rel="stylesheet" href="/KyoMini/Blog/Admin/View/Public/css/admin.css">
            <!--[if lt IE 9]>
               <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
               <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
             <![endif]-->
</head>


<body>
<?php  $db=M('Admin'); $admin=$db->where('id=1')->getField('nickname'); ?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo U('/Admin');?>"><?php echo (L("_Admin_Logo_")); ?></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li><a href="<?php echo U('/Admin');?>">概览</a></li>
            <li><a href="<?php echo U('/Admin/Article/Article_add');?>">撰写</a></li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">管理<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo U('/Admin/Article ');?>">文章</a></li>
                    <li><a href="<?php echo U('/Admin/Category');?>">分类</a></li>
                    <li><a href="<?php echo U('/Admin/Comment ');?>">评论</a></li>
                    <li><a href="<?php echo U('/Admin/Page');?>">独立页</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo U('/Admin/Menu');?>">导航</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">配置<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo U('/Admin/Settings');?>">基本配置</a></li>
                    <li><a href="<?php echo U('/Admin/Picture');?>">图片</a></li>
                    <li><a href="<?php echo U('/Admin/Template');?>">外观</a></li>
                    <li><a href="<?php echo U('/Admin/Lang');?>">语言</a></li>
                     

                    <li class="divider"></li>
                    <li><a href="<?php echo U('/Admin/Database');?>">备份</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">您好，<?php echo ($admin); ?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="/KyoMini">进入前台</a></li>
                    <li><a href="<?php echo U('Index/cache_del');?>">更新缓存</a></li>
                    <li id="aboutus_menu"><a href="<?php echo U('/Admin/About');?>">关于博客</a></li>
                    <li class="divider"></li>
                    <li><a href="#" data-toggle="modal" data-target="#password">修改密码</a></li>
                </ul>
            </li>
            <li><a href="<?php echo U('Index/login_out');?>">退出</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container"> 
  <!--内容开始-->
  
  <div class="page-header">
    <h3>增加独立页</h3>
  </div>
  <div class="MiniBox2">
    <form role="form" method="post" action="<?php echo U('add');?>">
      <div class="MiniBox2_left">
        <input type="text" class="form-control miniinput" placeholder="名称" name="title"/>
      </div>
      <textarea class="form-control miniinput3" rows="20" id="editor_id" name="content"></textarea>
      <input type="text" class="form-control miniinput" placeholder="描述"  style="margin-top:20px" name="keywords"/>
      <input type="text" class="form-control miniinput" placeholder="关键词" name="description"/>
      <button type="submit" class="btn btn-info minibtn">发布</button>
      <button type="reset" class="btn btn-info minibtn">重写</button>
    </form>
  </div>
  
  <!--内容结束--> 
    <div class="footer">
        <p>&copy; 2014 <a href="#">www.kyomini.com</a> All Rights Reserved.</p>
</div>
<script src="/KyoMini/Blog/Admin/View/Public/Js/jquery-1.11.0.min.js"></script> 
<script src="/KyoMini/Blog/Admin/View/Public/Js/bootstrap.min.js"></script>  </div>

<script src="/KyoMini/Blog/Admin/View/Public/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script> 
<script charset="utf-8" src="/KyoMini/Blog/Admin/View/Public/editor/kindeditor.js"></script> 
<script charset="utf-8" src="/KyoMini/Blog/Admin/View/Public/editor/lang/zh_CN.js"></script> 
<script>
          var editor;
			KindEditor.ready(function(K) {
				
				
				editor = K.create('textarea[name="content"]', {
				uploadJson : '/KyoMini/Blog/Admin/View/Public/editor/php/upload_json.php',
				fileManagerJson : '/KyoMini/Blog/Admin/View/Public/editor/php/file_manager_json.php',               
				themeType : 'simple',
				allowFileManager : false,
				allowPreviewEmoticons : true,//远程图片关闭
				allowImageUpload : true, //显示上传图片按钮
				afterBlur:function(){this.sync();},
				items : ['source', '|', 'fullscreen', 'undo', 'redo', 'print', 'cut', 'copy', 'paste',
'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
'superscript',
'title', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
'italic', 'underline', 'strikethrough', 'removeformat', '|', 'image',
'flash', 'media', 'advtable',  'emoticons', 'link', 'unlink', 
'|', 'map','code','about'],

});
});
</script>
</html>