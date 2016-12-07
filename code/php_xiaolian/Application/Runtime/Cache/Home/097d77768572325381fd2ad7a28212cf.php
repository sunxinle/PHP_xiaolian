<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<title>笑脸</title>
<link rel="stylesheet" href="/Public/css/university.css">
<link rel="stylesheet" href="/Public/lib/weui.min.css">
<link rel="stylesheet" href="/Public/css/jquery-weui.css">
<link rel="stylesheet" href="/Public/css/demos.css">
<style type="text/css">
	.weui_tabbar{
		position: fixed;
		bottom: 0px;
	}
	.the_plus{
      position: fixed;
      bottom: 80px;
      left: 80%;
      z-index: 1;
    }
    .initials{
    	z-index: 1;
    }
</style>
</head>
<body>
<div class="the_plus">
      <a href="javascript:;" class="open-popup" data-target="#half"><img src="/Public/images/plus.png" alt=""></a>
    </div>
<!-- 代码部分begin -->
<header class="fixed">
	<div class="header">
		支持的大学列表
	</div>
</header>


<div id="letter" ></div>
<div class="sort_box">
	<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="sort_list"><a href="detail/id/<?php echo ($vo["uniid"]); ?>">
		<div class="num_logo"><img src="/Public/<?php echo ($vo["uniimage"]); ?>" /></div>
		<div class="num_name"><?php echo ($vo["uniname"]); ?></div>
		</a>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>
	
</div>




<div class="initials">
	<ul>
		<li><img src="/Public/images/guide_star.png"></li>
	</ul>
</div>


<!-- weui_tab_bd界面结束 -->
<!--导航栏开始-->
  <div class="weui_tabbar">
    <a href="<?php echo U('home/news/index');?>" class="weui_tabbar_item">
      <div class="weui_tabbar_icon">
        <img src="/Public/images/toutiao.png" alt="">
      </div>
      <p class="weui_tabbar_label">头条</p>
    </a>
    <a href="javascript:;" class="weui_tabbar_item weui_bar_item_on">
      <div class="weui_tabbar_icon">
        <img src="/Public/images/daxuec.png" alt="">
      </div>
      <p class="weui_tabbar_label" style="color:#29b6f6">大学</p>
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
<script src="/Public/lib/jquery-2.1.4.js"></script>
<script src="/Public/js/jquery.charfirst.pinyin.js"></script>
<script src="/Public/js/sort.js"></script>
<script src="/Public/lib/fastclick.js"></script>
<script src="/Public/js/jquery-weui.js"></script>
<!-- 代码部分end -->
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
</body>
</html>