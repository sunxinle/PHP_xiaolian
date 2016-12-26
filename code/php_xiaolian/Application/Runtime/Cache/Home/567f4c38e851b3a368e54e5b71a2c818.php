<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title><?php echo ($unidata["uniname"]); ?></title>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

<meta name="description" content="Write an awesome description for your new site here. You can edit this line in _config.yml. It will appear in your document head meta (for Google search results) and in your feed.xml site description.
">

<link rel="stylesheet" href="/Public/lib/weui.min.css">
<link rel="stylesheet" href="/Public/css/jquery-weui.css">
<link rel="stylesheet" href="/Public/css/demos.css">
<style>
 .back{
  position: fixed;
      top: 13%;
      left: 5%;
 }
 .fanhui{
  position: fixed;
  bottom: 0px;
  width: 100%;
 }
 .uninamediv{
  padding:35px 0 10px 0;
 }
 .uniarticle{
  padding: 5px 15px;
 }
 .uniarticle p{
  margin: 0 10px;
 }
</style>
  </head>

  <body ontouchstart>

    <header class='demos-header uninamediv'>
      <p class="demos-title uniname" style="font-size:24px"><?php echo ($unidata["uniname"]); ?></p>
    </header>

    <article class="weui_article uniarticle">
      <section>
    
        <section>
          <p style="font-size:18px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($unidata["unidescription"]); ?></p>

          <p>
            <img src="/Public/<?php echo ($unidata["uniimage"]); ?>" alt="河北师范大学校徽">
          </p>
        </section>
			
      </section>
    </article>
    <!--返回+我要去开始-->
    <div class="weui-row fanhui">
        <div class="weui-col-50"><a href="javascript:;" onclick="history.go(-1)" class="weui_btn weui_btn_plain_primary close-popup">返&nbsp;&nbsp;&nbsp;&nbsp;回</a></div>
        <div class="weui-col-50"><a href="<?php echo U('match/select',array('id'=>1));?>" class="weui_btn weui_btn_plain_primary close-popup">我&nbsp;&nbsp;要&nbsp;&nbsp;去</a></div><!--跳转select页面-->
      </div>
    <!--返回+我要去结束-->
    <!--back开始-->
    <div class="back">
      <a href="<?php echo U('university/index');?>"><img src="/Public/images/back.png" alt=""></a>
    </div>
    <!--back结束-->
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