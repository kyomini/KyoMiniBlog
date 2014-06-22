<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
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
  <div class="page-header">
    <h3>备份</h3>
  </div>

     <div class="input-append">
          <a id="export" class="btn btn-info "href="javascript:;" autocomplete="off">立即备份</a>
        <a id="optimize" class="btn btn-info " href="<?php echo U('optimize');?>">优化表</a>
        <a id="repair" class="btn btn-info " href="<?php echo U('repair');?>">修复表</a>
                <a id="repair" class="btn btn-info " href="<?php echo U('/Admin/Import');?>">还原备份</a>

</div>
       
 

    <!-- 应用列表 -->
    <div class="data-table table-striped">
        <form id="export-form" method="post" action="<?php echo U('export');?>">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="48"><input class="check-all" checked="chedked" type="checkbox" value=""></th>
                        <th class="table-textcenter">表名</th>
                        <th width="120" class="table-textcenter">数据量</th>
                        <th width="120" class="table-textcenter">数据大小</th>
                        <th width="160" class="table-textcenter">创建时间</th>
                        <th width="160" class="table-textcenter">备份状态</th>
                        <th width="120" class="table-textcenter">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$table): $mod = ($i % 2 );++$i;?><tr>
                            <td class="num">
                                <input class="ids" checked="chedked" type="checkbox" name="tables[]" value="<?php echo ($table["name"]); ?>">
                            </td>
                            <td><?php echo ($table["name"]); ?></td>
                            <td><?php echo ($table["rows"]); ?></td>
                            <td><?php echo (format_bytes($table["data_length"])); ?></td>
                            <td><?php echo ($table["create_time"]); ?></td>
                            <td class="info">未备份</td>
                            <td class="action">
                                <a href="<?php echo U('optimize?tables='.$table['name']);?>">优化表</a>&nbsp;
                                <a href="<?php echo U('repair?tables='.$table['name']);?>">修复表</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </form>
    </div>
        <div class="footer">
        <p>&copy; 2014 <a href="#">www.kyomini.com</a> All Rights Reserved.</p>
</div>
<script src="/KyoMini/Blog/Admin/View/Public/Js/jquery-1.11.0.min.js"></script> 
<script src="/KyoMini/Blog/Admin/View/Public/Js/bootstrap.min.js"></script> 

  </div>

<script type="text/javascript">
    (function($){
        var $form = $("#export-form"), $export = $("#export"), tables
            $optimize = $("#optimize"), $repair = $("#repair");

        $optimize.add($repair).click(function(){
            $.post(this.href, $form.serialize(), function(data){
                if(data.status){
                    alert(data.info);
                } else {
                    alert(data.info,'alert-error');
                }
            }, "json");
            return false;
        });

        $export.click(function(){
            $export.parent().children().addClass("disabled");
            $export.html("正在发送备份请求...");
            $.post(
                $form.attr("action"),
                $form.serialize(),
                function(data){
                    if(data.status){
                        tables = data.tables;
                        $export.html(data.info + "开始备份，请不要关闭本页面！");
                        backup(data.tab);
                        window.onbeforeunload = function(){ return "正在备份数据库，请不要关闭！" }
                    } else {
                        alert(data.info);
                        $export.parent().children().removeClass("disabled");
                        $export.html("立即备份");
                    }
                },
                "json"
            );
            return false;
        });

        function backup(tab, status){
            status && showmsg(tab.id, "开始备份...(0%)");
            $.get($form.attr("action"), tab, function(data){
                if(data.status){
                    showmsg(tab.id, data.info);

                    if(!$.isPlainObject(data.tab)){
                        $export.parent().children().removeClass("disabled");
                        $export.html("备份完成，点击重新备份");
                        window.onbeforeunload = function(){ return null }
                        return;
                    }
                    backup(data.tab, tab.id != data.tab.id);
                } else {
                    alert(data.info);
                    $export.parent().children().removeClass("disabled");
                    $export.html("立即备份");
                }
            }, "json");

        }

        function showmsg(id, msg){
            $form.find("input[value=" + tables[id] + "]").closest("tr").find(".info").html(msg);
        }
    })(jQuery);
    </script>