<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title><?php echo (C("blogname")); ?>_<?php echo (C("subtitle")); ?></title>
     <!--[if lt IE 9]>
        <script src="/KyoMini/Template/Default/Style/Js/html5shiv.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/KyoMini/Template/Default/Style/Css/normalize.css">
    <link rel="stylesheet" href="/KyoMini/Template/Default/Style/Css/style.css">
    <meta name="keywords" content="<?php echo (C("keywords")); ?>" />
    <meta name="description" content="<?php echo (C("description")); ?>">

</head>
<body>
<header id="header" class="clearfix">
  <div class="container">
    <div class="col-group">
      <div class="site-name"> <a id="logo" href="/KyoMini"> <?php echo (C("blogname")); ?> </a>
        <h1><?php echo (C("blogname")); ?></h1>
      </div>
      <div>
        <nav id="nav-menu" class="clearfix">
          <?php if(is_array($menu)): foreach($menu as $key=>$m): ?><a class="<?php if(($m["mname"] == 博客)): ?>current<?php else: endif; ?>" href="<?php echo ($m["url"]); ?>"  title="<?php echo ($m["mname"]); ?>"><?php echo ($m["mname"]); ?></a><?php endforeach; endif; ?>
        </nav>
      </div>
    </div>
  </div>
</header>
<div id="body">
<div class="container">
<div class="col-group">
<div class="col-8" id="main">
<div class="res-cons">
<?php if(is_array($list)): foreach($list as $key=>$list): ?><article class="post">
<header>
<h2 class="post-title"> <a href="<?php echo U('/content/'.$list['aid']);?>"><?php echo ($list["title"]); ?></a> </h2>
</heaer>
<date class="post-meta"> 

<?php echo (date('F,d Y',$list["time"])); ?> | <a href="<?php echo U('/List/'.$list['cid']);?>"><?php echo ($list["cname"]); ?></a>
</date>
<div class="post-content"> <?php echo (subtext($list["content"],300)); ?> </div>
</article><?php endforeach; endif; ?>

<?php echo ($page); ?>
</div>
</div>


<div id="secondary">
 <?php echo W('Search/Index');?>
 <?php echo W('News/Index');?>
  
  <section class="widget">
    <h3 class="widget-title">文章归档</h3>
    <ul class="widget-list">
      <li><a href="http://pickcho.com/2014/05/">May 2014</a></li>
      <li><a href="http://pickcho.com/2014/04/">April 2014</a></li>
    </ul>
  </section>
    <?php echo W('Admin/Index');?>
</div>
</div>
</div>
</div>
</div>
<footer id="footer">
	<div class="container">
		<?php echo (C("copy")); ?>
	</div>
</footer> 
</body>
</html>