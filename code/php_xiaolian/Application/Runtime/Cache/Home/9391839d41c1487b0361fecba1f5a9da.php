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
    .breathe-btn{ 
    	position:relative; width:340px; height:5px; margin:3px auto; line-height:40px; border:1px solid #2b92d4; border-radius:5px; color:#fff; font-size:20px; text-align:center; cursor:pointer; box-shadow:0 1px 2px rgba(0,0,0,.3); overflow:hidden; 
		background-image: -webkit-gradient(linear, left top, left bottom, from(#6cc3fe), to(#21a1d0));
		background-image: -moz-linear-gradient(#6cc3fe,#21a1d0);
       -webkit-animation-timing-function: ease-in-out;
       -webkit-animation-name: breathe;
       -webkit-animation-duration: 2700ms;
       -webkit-animation-iteration-count: infinite;
       -webkit-animation-direction: alternate;
	   animation:ease-in-out breathe 2700ms infinite alternate; 
    }
	@keyframes breathe{
	0% { opacity: .2; box-shadow:0 1px 2px rgba(255,255,255,0.1);}
    100% { opacity: 1; border:1px solid rgba(59,235,235,1); box-shadow:0 1px 30px rgba(59,255,255,1);}
	}
    @-webkit-keyframes breathe {
    0% { opacity: .2; box-shadow:0 1px 2px rgba(255,255,255,0.1);}
    100% { opacity: 1; border:1px solid rgba(59,235,235,1); box-shadow:0 1px 30px rgba(59,255,255,1);}
    }
    .zhengti{
      width:100%;
    }
    .tupian{
      float:left;
      width:40%;
      height:100%;
    }
    .wenzidiv{
      float:right;
      width:60%;
    }
    .tupian img{
      width:auto;
      height:auto;
      max-width: 100%;
      max-height: 100%;
      text-align: center;
    }
    .shuoshuo{
      background-color: #8B8989;
      border-radius: 15px;
      border:3px solid rgba(0,0,0,0.85);
      margin-top: 15px;
    }
    .panelbd{
      margin-left: 5px;
      margin-right: 5px;
    }
    .yuanjiao{
      border-radius: 15px;
      border:1px solid rgba(0,0,0,0.85);
    }
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
    <div class="weui-pull-to-refresh-layer">
      <div class='pull-to-refresh-arrow'></div>
      <div class='pull-to-refresh-preloader'></div>
      <div class="down">下拉刷新</div>
      <div class="up">释放刷新</div>
      <div class="refresh">上次刷新时间: <span id="time">未知</span></div>
    </div>
    <!--说说开始-->
    <div class="weui_panel">
      <!--<div class="weui_panel_hd" style="color:#29b6f6">校脸圈</div>-->
      <div class="breathe-btn"></div>
      <!--注意要避免name值跟id值相同，即使id值任意-->
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="weui_panel_bd panelbd">
          <div class="weui_media_box weui_media_text shuoshuo">
            <!--超链接href中意为将此条数据id值给detail方法便于进行进一步业务逻辑处理，而id值寻其源来自volist里的name值data,data又来自moments控制器里的index方法-->
            <a href="<?php echo U('moments/detail',array('id'=>$vo['xlaid']));?>" class="weui_media_title" style="color:#fff"><?php echo ($vo["xlaauthor"]); ?>
            </a>
            <div class="weui_panel_bd zhengti">
                <a href="<?php echo U('moments/detail',array('id'=>$vo['xlaid']));?>" class="weui_media_box weui_media_appmsg">
                  <div class="weui_media_hd tupian" style="width:100px;height:100px">
                    <img class="weui_media_appmsg_thumb yuanjiao" src="/Public/<?php echo ($vo["xlaimageurl"]); ?>" alt="">
                  </div>
                  <div class="wenzidiv">
                     <p class="weui_media_desc"
                     style="color:#fff;font-size:18px"><?php echo ($vo["xlacontent"]); ?>
                     </p>
                  </div>
                </a>
            </div>
            <ul c
            lass="weui_media_info">
              <li class="weui_media_info_meta" style="color:#fff"><?php echo ($vo["xlaaddtime"]); ?></li>
            </ul>
          </div> 
          </div><?php endforeach; endif; else: echo "" ;endif; ?>
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