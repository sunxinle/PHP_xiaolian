<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title>校脸</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <link href="/Public/lib/weui.min.css" type="text/css" rel="stylesheet" />
  <link href="/Public/css/jquery-weui.min.css" type="text/css" rel="stylesheet" />

  <style type="text/css">
    img{
      width: 30px;
      height: 30px;
    }
    html,body{
      height: 100%;
    }
    .swiper-container {
      width: 100%;
    }
    .swiper-container img {
      display: block;
      /*width: 100%;*/
    }
    .weui_tab .weui_tab_bd .content img{
      /*width: 100%;*/
      display: block;
    }
    .back{
      position: fixed;
      top:2%;
      left: 5%;
      z-index: 100;
    }
    .mmessage{
      font-size: 16px;
      margin-left:50px;
    }
    .mmessage p{
      margin-top: 5px;
    }
  </style>

</head>
<body>

<div class="back">
  <a href="<?php echo U('home/my/index');?>"><img src="/Public/images/back.png" alt=""></a>
</div>
<!--顶部标题栏-->
<div class="weui_tab">
  <div class="weui_navbar">
    <a class="weui_navbar_item weui_bar_item_on">
      我接受的请求
    </a>
  </div>
  <div class="weui_tab_bd">
    <div class="content">
      <div class="weui_cells weui_cells_access">
        <div class="weui_cell">

          <div class="weui_cell_hd">
            <img src="<?php echo ($result["headimgurl"]); ?>" alt="" style="margin-top:-30px;">
          </div>

          <div class="weui_cell_bd weui_cell_primary">
            <p style="font-size:16px; height: 30px; color: #2a6496;"><?php echo ($result["nickname"]); ?></p>

            <p style="font-size:16px; height: 30px;">出发地：<?php echo ($result["to_uni"]["uniname"]); ?></p>
          </div>
        </div>
        <div class="mmessage">
          <p>昵称：<?php echo ($result["nickname"]); ?></p>
          <p>姓名：<?php echo ($result["name"]); ?></p>
          <p>预计到达时间：<?php echo ($result["mgotime"]); ?></p>
          <p>备注信息：<br /><?php echo ($result["mmessage"]); ?></p>

        </div>


      </div>
    </div>
  </div>
</div>
</body>
</html>