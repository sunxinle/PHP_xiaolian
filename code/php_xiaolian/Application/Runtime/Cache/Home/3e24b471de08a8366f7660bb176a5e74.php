<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title>高校资讯</title>
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
  </style>
</head>

<body ontouchstart>

<div class="weui_tab">

  <div class="weui_tab_bd">
    <!--在这里写主体的代码-->
    <div class="weui-pull-to-refresh-layer">
      <div class='pull-to-refresh-arrow'></div>
      <div class='pull-to-refresh-preloader'></div>
      <div class="down">下拉刷新</div>
      <div class="up">释放刷新</div>
      <div class="refresh">上次刷新时间: <span id="time">未知</span></div>
    </div>
      <!--头条开始-->
   <div class="weui_panel weui_panel_access">
  <div class="weui_panel_hd">热门头条</div>
  <div class="weui_panel_bd">

  <?php if(is_array($topline)): $i = 0; $__LIST__ = $topline;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('news/detail',array('id'=>$vo['tlid']));?>">
    <div class="weui_media_box weui_media_text">
      <p class="weui_media_desc"> <div><img src="/Public/<?php echo ($vo["tlimage"]); ?>" width="98%" height="180px"></div></p>
      <h4 class="weui_panel_hd"><?php echo ($vo["tltitle"]); ?></h4>
    </div>
    </a><?php endforeach; endif; else: echo "" ;endif; ?>

  </div>
  <a href="javascript:void(0);" class="weui_panel_ft">查看更多</a>
</div>
<!--头条结束-->

    <!--在这里写主体的代码结束-->
    <!--加号的界面-->
    <div class="the_plus">
      <a href="javascript:;" class="open-popup" data-target="#half"><img src="/Public/images/plus.png" alt=""></a>
    </div>
    <!--加号界面的结束-->
    <!--点击加号界面出来的弹窗-->
    <div id="half" class='weui-popup-container popup-bottom'>
      <div class="weui-popup-overlay"></div>
      <div class="weui-popup-modal">
        <div class="toolbar">
          <div class="toolbar-inner">
            <a href="javascript:;" class="picker-button close-popup">关闭</a>
            <h1 class="title">快捷功能</h1>
          </div>
        </div>
        <div class="modal-content">
          <div class="weui_grids">

            <a href="<?php echo U('home/match/select');?>" class="weui_grid js_grid" data-id="progress">
              <div class="weui_grid_icon">
                <img src="/Public/images/gothere.png" alt="">
              </div>
              <p class="weui_grid_label">
                我要去
              </p>
            </a>
            <a href="<?php echo U('home/my/index');?>" class="weui_grid js_grid" data-id="msg">
              <div class="weui_grid_icon">
                <img src="/Public/images/hasgone.png" alt="">
              </div>
              <p class="weui_grid_label">
                我去过
              </p>
            </a>
            <a href="<?php echo U('home/my/index');?>" class="weui_grid js_grid" data-id="msg">
              <div class="weui_grid_icon">
                <img src="/Public/images/match.png" alt="">
              </div>
              <p class="weui_grid_label">
                捞一捞
              </p>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!--点击加号界面出来的弹窗结束-->
  </div>

  <!--weui_tab_bd界面结束-->

<!--导航栏开始-->
  <div class="weui_tabbar">
    <a href="<?php echo U('home/news/index');?>" class="weui_tabbar_item weui_bar_item_on">
      <div class="weui_tabbar_icon">
        <img src="/Public/images/toutiaoc.png" alt="">
      </div>
      <p class="weui_tabbar_label" style="color:#29b6f6">头条</p>
    </a>
    <a href="<?php echo U('home/university/index');?>" class="weui_tabbar_item">
      <div class="weui_tabbar_icon">
        <img src="/Public/images/daxue.png" alt="">
      </div>
      <p class="weui_tabbar_label">大学</p>
    </a>
    <a href="<?php echo U('home/moments/index');?>" class="weui_tabbar_item">
      <div class="weui_tabbar_icon">
        <img src="/Public/images/xiaolianquan.png" alt="">
      </div>
      <p class="weui_tabbar_label">校脸圈</p>
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
<script src="/Public/js/jquery-weui.js"></script>
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
  $(".weui_tab_bd").pullToRefresh().on("pull-to-refresh", function() {
        setTimeout(function() {
          var myDate = new Date();

          $("#time").text(myDate.getHours()+':'+myDate.getMinutes()+':'+myDate.getSeconds());
          $(".weui_tab_bd").pullToRefreshDone();
        }, 2000);
      });
</script>

</body>
</html>