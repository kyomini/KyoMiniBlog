<?php if (!defined('THINK_PATH')) exit();?>﻿<section class="widget">
  <h3 class="widget-title">最新文章</h3>
  <ul class="widget-list">
    <?php if(is_array($news)): foreach($news as $key=>$news): ?><li><a href="<?php echo U('/content/'.$news['aid']);?>"><?php echo ($news["title"]); ?></a></li><?php endforeach; endif; ?>
  </ul>
</section>