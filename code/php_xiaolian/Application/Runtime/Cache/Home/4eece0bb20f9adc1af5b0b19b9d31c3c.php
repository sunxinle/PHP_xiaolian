<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title>校脸圈首页</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

  <meta name="description" content="Write an awesome description for your new site here. You can edit this line in _config.yml. It will appear in your document head meta (for Google search results) and in your feed.xml site description.
">

  <link rel="stylesheet" href="/Public/lib/weui.min.css">
  <link rel="stylesheet" href="/Public/css/jquery-weui.css">
  <link rel="stylesheet" href="/Public/css/demos.css">
  <style type="text/css">
    .the_plus{
      position: absolute;
      bottom: 80px;
      left: 80%;
    }
    .weui_media_title{
      color:#29b6f6;
    }
    .swiper-container {
        width: 100%;
      } 

    .swiper-container img {
        display: block;
        width: 100%;
      }
      .back{
      position: fixed;
      top: 10%;
      left: 5%;
    }
    .xiayipian{
      position: absolute;
      bottom: 0px;
      width: 100%;
    }
  </style>
</head>

<body ontouchstart>
<div class="weui_tab_bd">
<!--weui_tab_bd界面开始-->
    <!--在这里写主体的代码-->
    <!--说说详情开始-->
    <!--微信昵称，说说文字内容开始-->
    <div class="weui_panel weui_panel_access">
  <div class="weui_panel_bd">
    <div class="weui_media_box weui_media_text">
      <div class="back">
      <a href="<?php echo U('moments/index');?>"><img src="/Public/images/back.png" alt=""></a>
    </div>
      <h2 class="weui_media_title" style="font-size:24px;"
><?php echo ($art["xlatitle"]); ?></h2>
      <ul class="weui_media_info">
                <li class="weui_media_info_meta"><?php echo ($art["xlaaddtime"]); ?></li>
                <li class="weui_media_info_meta weui_media_info_meta_extra"><?php echo ($art["xlaauthor"]); ?></li>
              </ul><br1/>
      <p style="font-size:17px;color:#999"><?php echo ($art["xlacontent"]); ?></p>
    </div>
</div>
    <!--微信昵称，.说说文字内容结束-->
    <!--图片开始-->
    <div class="swiper-container">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide"><img src="/Public/images/swiper-11.jpg" /></div>
        <div class="swiper-slide"><img src="/Public/images/swiper-22.jpg" /></div>
        <div class="swiper-slide"><img src="/Public/images/swiper-33.jpg" /></div>
      </div>
      <!-- If we need pagination -->
      <div class="swiper-pagination"></div>
    </div>
<!--图片结束-->
      <!--评论开始-->
     <div class="weui_panel">
  <div class="weui_panel_hd">评论列表</div>
  <?php if(is_array($artc)): $i = 0; $__LIST__ = $artc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i;?><div class="weui_panel_bd">
    <div class="weui_media_box weui_media_text">
      <h4 class="weui_media_title">评论111111</h4>
      <p style="color:#999"><?php echo ($va["xlaccomment"]); ?></p>
      <ul class="weui_media_info">
        <li class="weui_media_info_meta"><?php echo ($va["xlacaddtime"]); ?></li>
        <li class="weui_media_info_meta weui_media_info_meta_extra"><?php echo ($va["xlacnickname"]); ?></li>
      </ul>
    </div>
  </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<!--评论结束-->
<!--说说详情结束-->
</div>
<!--下一篇+评论开始-->
    <div class="weui-row weui-no-gutter xiayipian">
          <div class="weui-col-50"><a href="<?php echo U('moments/detail',array('id'=>$nextid));?>" class="weui_btn close-popup
          weui_btn_primary">下&nbsp;&nbsp;一&nbsp;&nbsp;篇</a></div>
          <div class="weui-col-50"><a href="<?php echo U('moments/comment',array('id'=>$art['xlaid']));?>" class="weui_btn close-popup weui_btn_primary">评&nbsp;&nbsp;论</a></div>
      </div>
<!--下一篇+评论结束-->
<!--在这里写主体的代码结束-->
</div>
  <!--weui_tab_bd界面结束-->
<script src="/Public/lib/jquery-2.1.4.js"></script>
<script src="/Public/lib/fastclick.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
  });
</script>

<script src="/Public/js/jquery-weui.js"></script>

<script src="/Public/js/swiper.js"></script>
<script>
      $(document).on("open", ".weui-popup-modal", function() {
        console.log("open popup");
      }).on("close", ".weui-popup-modal", function() {
        console.log("close popup");
      });
    </script>
    <script>
      $(".swiper-container").swiper({
        loop: true,
        autoplay: 3000
      });
    </script>
</body>
</html>