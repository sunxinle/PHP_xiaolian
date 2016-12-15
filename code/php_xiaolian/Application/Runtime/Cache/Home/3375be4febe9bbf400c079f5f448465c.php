<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title>我的</title>
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
    .headimg{ 
      width: 30px;
      height: 30px;
     
    }
    html,body{
      height: 100%;
    }
    .swiper-container {
        width: 100%;
        } 
        .swiper-container .headimg {
        display: block;
        /*width: 100%;*/
        }
        .weui_tab .weui_tab_bd .content .headmig{
          /*width: 100%;*/
          display: block;
        }
  </style>
</head>

<body ontouchstart>

<div class="weui_tab">

  <div class="weui_tab_bd">
      <!--导航栏开始-->
        <div class="weui_tab">
          <div class="weui_navbar">
            <a class="weui_navbar_item weui_bar_item_on">
              我的请求
            </a>
            <a class="weui_navbar_item">
              接收的请求
            </a>

          </div>
        <div class="weui_tab_bd">
        <!--第一个选项卡-->
          <div class="content">
            <div class="weui_cells weui_cells_access">
              <?php if(is_array($myrequest)): $i = 0; $__LIST__ = $myrequest;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$myreq): $mod = ($i % 2 );++$i;?><a class="weui_cell" href="<?php echo U('home/my/request/',array('id'=>$myreq['mid']));?>">
                  <div class="weui_cell_hd">
                    <!--防止微信公众平台防盗链的方法 http://read.html5.qq.com/image?src=forum&q=5&r=0&imgflag=7&imageUrl= -->
                    <img src="<?php echo ($myreq["headimgurl"]); ?>" class="headimg" alt="" style="margin-top:-30px;">
                  </div>
                  <div class="weui_cell_bd weui_cell_primary">
                    <p style="font-size:16px; height: 30px;">&nbsp;<?php echo ($myreq["nickname"]); ?> <?php echo ($myreq["from_uni"]["uniname"]); ?></p>
                    <p style="text-indent:1em;font-size:16px;font-weight:bold;">去<?php echo ($myreq["to_uni"]["uniname"]); ?></p>
                  </div>
                  <span class="weui_cell_ft"></span>
                </a><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
          </div>
          <!--第二个选项卡-->
          <div class="content" style="display:none">
            <div class="weui_cells weui_cells_access">
              <?php if(is_array($myreceive)): $i = 0; $__LIST__ = $myreceive;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$myrec): $mod = ($i % 2 );++$i;?><a class="weui_cell" href="<?php echo U('home/my/receive');?>">
                  <div class="weui_cell_hd">
                    <img src="<?php echo ($myrec["headimgurl"]); ?>" class="headimg" alt="" style="margin-top:-30px;">
                  </div>
                  <div class="weui_cell_bd weui_cell_primary">
                    <p style="font-size:16px; height: 30px;"><?php echo ($myrec["nickname"]); ?> <?php echo ($myrec["from_uni"]["uniname"]); ?></p>
                    <p style="text-indent:1em;font-size:16px;font-weight:bold;">去<?php echo ($myrec["to_uni"]["uniname"]); ?></p>
                  </div>

                  <a href="contents.html" class="weui_btn weui_btn_mini weui_btn_primary" style="margin-left:50px;">查看详情</a>
                </a><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
          </div>

        </div>
      </div>
      <!--导航栏结束-->

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
        <img src="/Public/images/toutiao.png" alt="">
      </div>
      <p class="weui_tabbar_label" style="color:grey">头条</p>
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
        <img src="/Public/images/wodec.png" alt="">
      </div>
      <p class="weui_tabbar_label" style="color:#29b6f6">我的</p>
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
   $(".weui_navbar .weui_navbar_item").click(function() {
      $(".weui_navbar .weui_navbar_item").removeClass("weui_bar_item_on");//移除所有on效果
      $(this).addClass("weui_bar_item_on");//单击后添加on效果
      //判断点击第几个选项卡
      var which=$(this).index();
      //让所有内容区域隐藏
      $(".weui_tab_bd .content").hide();
      //按索引显示对应内容
      $(".weui_tab_bd .content:eq("+which+")").show();

      console.log(which);
    })
</script>
<script src="/Public/js/jquery-weui.js"></script>
</body>
</html>