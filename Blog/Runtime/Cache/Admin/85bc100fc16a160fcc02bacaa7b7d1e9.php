<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title><?php echo (L("_Login_Logo_")); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <link rel="icon" href="/KyoMini/Blog/Admin/View/Public/Img/favicon.ico" mce_href="/KyoMini/Blog/Admin/View/Public/Img/favicon.ico" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/KyoMini/Blog/Admin/View/Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/KyoMini/Blog/Admin/View/Public/css/login.css">

    <!--[if lt IE 9]>
        <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
        <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  <meta charset="utf-8">
  </head>
  <body>

    <div class="container">
      <form class="form-signin" role="form" method="post" action="<?php echo U('Admin/Login/Login_in');?>">
        <h2 class="form-signin-heading"><?php echo (L("_Login_Logo_")); ?></h2>
        <input type="text" class="form-control" placeholder="<?php echo (L("_Login_Account_")); ?>" required autofocus name="name" title="<?php echo (L("_Login_Username_")); ?>">
        <input type="password" class="form-control" placeholder="<?php echo (L("_Login_Password_")); ?>" required name="password" title="<?php echo (L("_Login_Userpassword_")); ?>">
        <input type="verify" class="form-control" placeholder="<?php echo (L("_Verify_")); ?>" required name="verify" title="<?php echo (L("_Login_Userverify_")); ?>">
        <img src="<?php echo U('Admin/Login/verify');?>" class="verify" onclick='this.src=this.src+"?"+Math.random()'>
        <button class="btn btn-info" type="submit"><?php echo (L("_Login_")); ?></button>
        <button class="btn btn-info" type="submit"><?php echo (L("_Return_")); ?></button>
      </form>
    </div>

  </body>
</html>