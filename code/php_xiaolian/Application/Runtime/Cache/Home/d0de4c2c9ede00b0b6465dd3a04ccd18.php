<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>注册提示：</title>
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
    <h1 class="demos-title">注册提示</h1>
</header>

<article class="weui_article">
    <section>

        <section>
            <p>你还没有注册呢，按照以下步骤去注册才能用这些高级功能哦！</p>
            <p><img src="/Public/images/notlogintips.png"></p>
        </section>

        <section>
            <div class="weui-row">
                <div class="weui-col-100"><a href="<?php echo U('home/news/index');?>"  class="weui_btn weui_btn_plain_primary close-popup">返回到主页</a></div>
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