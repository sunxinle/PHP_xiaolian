<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title>校脸圈</title>
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
      font-weight: bolder;
    }  
  </style>
</head>

<body ontouchstart>

<div class="weui_tab">
<!--weui_tab_bd界面开始-->
  <div class="weui_tab_bd">
    <!--在这里写主体的代码-->
    <!--说说开始-->
    <div class="weui_panel">
      <div class="weui_panel_hd">校脸圈</div>
      <div class="weui_panel_bd">
        <!--注意要避免name值跟id值相同，即使id值任意-->
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="weui_media_box weui_media_text">
            <!--超链接href中意为将此条数据id值给detail方法便于进行进一步业务逻辑处理，而id值寻其源来自volist里的name值data,data又来自moments控制器里的index方法-->
            <a href="<?php echo U('moments/detail',array('id'=>$vo['xlaid']));?>" class="weui_media_title"><?php echo ($vo["xlatitle"]); ?>
            </a>
            <a href="<?php echo U('moments/detail',array('id'=>$vo['xlaid']));?>">
              <p class="weui_media_desc"><?php echo ($vo["xlacontent"]); ?>
              </p>
            </a>
            <p class="weui_media_desc">
              <div class="weui_panel_bd">
                <a href="<?php echo U('moments/detail',array('id'=>$vo['xlaid']));?>" class="weui_media_box weui_media_appmsg">
                  <div class="weui_media_hd">
                    <img class="weui_media_appmsg_thumb" src="/Public/images/swiper-11.jpg" alt="">
                  </div>
                </a>
              </div>
            </p>
            <ul class="weui_media_info">
              <li class="weui_media_info_meta"><?php echo ($vo["xlaaddtime"]); ?></li>
              <li class="weui_media_info_meta weui_media_info_meta_extra"><?php echo ($vo["xlaauthor"]); ?></li>
            </ul>
          </div><?php endforeach; endif; else: echo "" ;endif; ?>
      </div>
    </div>
    <!--说说结束-->
    <!--在这里写主体的代码结束-->
  </div>
  <!--加号的界面-->
    <div class="the_plus">
      <a href="<?php echo U('home/moments/add');?>"><img src="/Public/images/plus1.png" alt="发说说的加号"></a>
    </div>
    <!--加号界面的结束-->
  </div>

  <!--weui_tab_bd界面结束-->

<!--导航栏开始-->
  <div class="weui_tabbar">
    <a href="<?php echo U('home/news/index');?>" class="weui_tabbar_item">
      <div class="weui_tabbar_icon">
        <img src="/Public/images/toutiao.png" alt="">
      </div>
      <p class="weui_tabbar_label" >头条</p>
    </a>
    <a href="<?php echo U('home/university/index');?>" class="weui_tabbar_item">
      <div class="weui_tabbar_icon">
        <img src="/Public/images/daxue.png" alt="">
      </div>
      <p class="weui_tabbar_label">大学</p>
    </a>
    <a href="<?php echo U('home/moments/index');?>" class="weui_tabbar_item">
      <div class="weui_tabbar_icon">
        <img src="/Public/images/xiaolianquanc.png" alt="">
      </div>
      <p class="weui_tabbar_label" style="color:#29b6f6">校脸圈</p>
    </a>
    <a href="<?php echo U('home/my/index');?>" class="weui_tabbar_item">
      <div class="weui_tabbar_icon">
        <img src="/Public/images/wode.png" alt="">
      </div>
      <p class="weui_tabbar_label">我的</p>
    </a>
  </div>
  <!--导航栏结束-->
</div>



<script src="/Public/lib/jquery-2.1.4.js"></script>
<script src="/Public/lib/fastclick.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
  });
</script>
<script>
  $(document).on("open", ".weui-popup-modal", function() {
    console.log("open popup");
    $(".weui_tabbar").hide();
  }).on("close", ".weui-popup-modal", function() {
    console.log("close popup");
    $(".weui_tabbar").show();
  });
</script>
<script src="/Public/js/jquery-weui.js"></script>
</body>
</html>