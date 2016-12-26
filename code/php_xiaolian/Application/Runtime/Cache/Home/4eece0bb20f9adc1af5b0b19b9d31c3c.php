<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title>校脸圈动态</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

  <meta name="description" content="Write an awesome description for your new site here. You can edit this line in _config.yml. It will appear in your document head meta (for Google search results) and in your feed.xml site description.
">

  <link rel="stylesheet" href="/Public/lib/weui.min.css">
  <link rel="stylesheet" href="/Public/css/jquery-weui.css">
  <link rel="stylesheet" href="/Public/css/demos.css">
  <style type="text/css">
    .tupian{
    	width:auto;
    	height:auto;
    	max-width:100%;
      min-width:100%;
    }
    .panelbd{
      margin-left: 15px;
      margin-right: 15px;
    }
    .the_plus{
      position: absolute;
      bottom: 80px;
      left: 80%;
    }
    .delete{
      position: absolute;
      right:5%;
      top:15%;
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
      position: fixed;
      bottom: 0px;
      width: 100%;
    }
    .flor{
      color: #29b6f6;
      float: right;
    }
  </style>
</head>

<body ontouchstart>
<div class="weui_tab_bd">
<!--weui_tab_bd界面开始-->
    <!--在这里写主体的代码-->
    <!--说说详情开始-->
    <!--说说内容开始-->
    <div class="weui_panel weui_panel_access">
    <div class="weui_panel_bd">
      <div class="weui_media_box weui_media_text">
        <div class="back">
          <a href="<?php echo U('moments/index');?>"><img src="/Public/images/back.png" alt=""></a>
        </div>
        <!--删除开始-->
        <div class="delete" style="display:<?php echo ($tag); ?>;">
           <a href="<?php echo U('moments/delete',array('id'=>$art['xlaid']));?>"><img src="/Public/images/delete1.png"></a>
        </div>
        <!--删除结束-->
          <h2 class="weui_media_title" style="font-size:24px;color:#29b6f6"><?php echo ($art["xlaauthor"]); ?></h2>
          <ul class="weui_media_info">
            <li class="weui_media_info_meta" style="color:#363636"><?php echo ($art["xlaaddtime"]); ?></li>
          </ul>
          <br/>
          <p style="font-size:17px;color:#000"><?php echo ($art["xlacontent"]); ?></p>
      </div>
    </div>
      <div class="weui_media_hd panelbd">
        <img class="weui_media_appmsg_thumb tupian" src="/Public/<?php echo ($art["xlaimageurl"]); ?>" alt="">
      </div>
      <div>
  </div>  
  <!--说说内容结束-->
  <!--评论开始-->
  <div class="weui_panel">
  <div class="weui_panel_hd" style="color:#29b6f6">评论列表</div>
  <?php if(is_array($artc)): $i = 0; $__LIST__ = $artc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i;?><div class="weui_panel_bd">
    <div class="weui_media_box weui_media_text">
      <p class="flor"> <?php echo ($i); ?>楼</p>
      <h4 class="weui_media_title"><?php echo ($va["xlacnickname"]); ?></h4>
      <input type="hidden" value="<?php echo ($va["xlaccomment"]); ?>" class="suggestion"/>
      <p style="color:#000"><?php echo ($va["xlaccomment"]); ?></p>
      <ul class="weui_media_info">
        <li class="weui_media_info_meta" style="color:#363636"><?php echo ($va["xlacaddtime"]); ?></li>

      <?php if(($va["xlacnickname"]) == $_SESSION['tlcnickname']): ?><!--   <eq condition="($va.xlacnickname) eq ($Think.session.tlcnickname)"> -->
          <div style="display:block;"><a href="<?php echo U('moments/deletecom',array('id'=>$va['xlacid']));?>"><img class="flor" src="/Public/images/delete2.png"/></a></div>
        <?php else: ?> 
            <div style="display:none;"><a href="<?php echo U('moments/deletecom',array('id'=>$va['xlacid']));?>"><img class="flor" src="/Public/images/delete2.png"/></a></div><?php endif; ?>
        
      </ul>
    </div>
  </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<!--评论结束-->
<!--说说详情结束-->
</div>
<!--下一篇+评论开始-->
    <div class="weui-row xiayipian">
          <div class="weui-col-50"><a href="<?php echo U('moments/detail',array('id'=>$nextid));?>" class="weui_btn close-popup weui_btn_plain_primary">下&nbsp;&nbsp;一&nbsp;&nbsp;条</a></div>
          <div class="weui-col-50"><a href="<?php echo U('moments/comment',array('id'=>$art['xlaid']));?>" class="weui_btn close-popup weui_btn_plain_primary">评&nbsp;&nbsp;论</a></div>
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
    <script>
    $(function(){
        $(".suggestion").each(function(){
            $(this).next().html(replace_em($(this).val()));
        })
    })

      function replace_em(str){
          str = str.replace(/\</g,'&lt;');
          str = str.replace(/\>/g,'&gt;');
          str = str.replace(/\n/g,'<br/>');
          str = str.replace(/\[em_([0-9]*)\]/g,'<img src="/Public/arclist/$1.gif" border="0" />');
          return str;
      }
    </script>
</body>
</html>