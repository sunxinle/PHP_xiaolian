<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>校脸</title>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

<meta name="description" content="Write an awesome description for your new site here. You can edit this line in _config.yml. It will appear in your document head meta (for Google search results) and in your feed.xml site description.
">

<link rel="stylesheet" href="/Public/lib/weui.min.css">
<link rel="stylesheet" href="/Public/css/jquery-weui.css">
<link rel="stylesheet" href="/Public/css/demos.css">

  </head>

  <body ontouchstart>

    <div class="weui_msg">
      <div class="weui_icon_area"><i class="weui_icon_success weui_icon_msg"></i></div>
      <div class="weui_text_area">
        <h2 class="weui_msg_title">操作成功</h2>
        <p class="weui_msg_desc">请耐心等待~亲(づ￣3￣)❤</p>
       <!-- <?php
 header("refresh:5;url=go"); ?>-->
          <meta http-equiv="refresh" content="2;URL=<?php echo U('home/my/index');?>">
      </div>
      <div class="weui_extra_area">
        <a href="<?php echo U('home/my/index');?>">查看详情</a>
      </div>
    </div>

    <script src="/Public/lib/jquery-2.1.4.js"></script>
<script src="/Public/lib/fastclick.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
  });

</script>
<script src="/Public/js/jquery-weui.js"></script>

  </body>
</html>