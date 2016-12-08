<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>校脸</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="Write an awesome description for your new site here. You can edit this line in _config.yml. It will appear in your document head meta (for Google search results) and in your feed.xml site description.">
    <link rel="stylesheet" href="/Public/lib/weui.min.css">
    <link rel="stylesheet" href="/Public/css/jquery-weui.css">
    <link rel="stylesheet" href="/Public/css/demos.css">
    <style type="text/css">
    .weui_btn.weui_btn_mini {
    line-height: 1.9;
    font-size: 35px;
    padding: 0 .75em;
    display: inline-block;
  }
    </style>
  </head>

  <body ontouchstart>
    <header class='demos-header'>
      
    </header>   
    <div class="weui_cells weui_cells_form">
      <div class="weui_cell">
        <div class="weui_cell_hd" ><label class="weui_label" >目的地</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input href="javascript:;" id='show-toast-forbidden' class="weui_input" type="tel" placeholder="获取您要去的地方">
        </div>
      </div>
      <div class="weui_cell">
        <div class="weui_cell_hd"><label for="" class="weui_label">到达时间</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" href="javascript:;" id='show-toast-forbidden' type="datetime-local" value="" placeholder="">
        </div>
      </div>
    </div>
    <div class="weui_cells_title">备注信息</div>
    <div class="weui_cells weui_cells_form">
      <div class="weui_cell">
        <div class="weui_cell_bd weui_cell_primary">
          <textarea class="weui_textarea" href="javascript:;" id='show-toast-forbidden' placeholder="输入一些其他信息，例如您的个人资料" rows="5"></textarea>
          <div class="weui_textarea_counter"><span>0</span>/200</div>
        </div>
      </div>
    </div>

   <div class='demos-content-padded'>
      <a  href="list.html" class="weui_btn weui_btn_primary">返回</a>
    </div>
    <script src="/Public/lib/jquery-2.1.4.js"></script>
<script src="/Public/lib/fastclick.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
  });
</script>
<script src="/Public/js/jquery-weui.js"></script>
<script>
      $(document).on("click", "#show-toast", function() {
        $.toast("操作成功", function() {
          console.log('close');
        });
      })
      .on("click", "#show-toast-cancel", function() {
        $.toast("取消操作", "cancel", function(toast) {
          console.log(toast);
        });
      })
      .on("click", "#show-toast-forbidden", function() {
        $.toast("禁止操作", "forbidden");
      })
      .on("click", "#show-toast-text", function() {
        $.toast("纯文本", "text");
      })
      .on("click", "#show-loading", function() {
        $.showLoading();

        setTimeout(function() {
          $.hideLoading();
        }, 3000)
      });
    </script>
  </body>
</html>