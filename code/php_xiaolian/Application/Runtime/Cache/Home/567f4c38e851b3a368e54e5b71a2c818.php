<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>大学内容页</title>
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

    <header class='demos-header'>
      <h1 class="demos-title">河北师大</h1>
    </header>

    <article class="weui_article">
      <h1>我的校园</h1>
      <section>
    
        <section>
          <p><?php echo ($unidata["unidescription"]); ?></p>

          <p>
            <img src="/Public/<?php echo ($unidata["uniimage"]); ?>" alt="河北师范大学校徽">
          </p>
        </section>
    
        <section>
            <div class="weui-row">
  				<div class="weui-col-50"><a href="javascript:;" onclick="history.go(-1)" class="weui_btn weui_btn_plain_primary close-popup">返回</a></div>
  				<div class="weui-col-50"><a href="<?php echo U('match/go',array('id'=>1));?>" class="weui_btn weui_btn_plain_primary close-popup">我要去</a></div>
			</div>
          </section>
      </section>
    </article>
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