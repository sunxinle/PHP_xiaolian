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
  </head>

  <body ontouchstart>
    <header class='demos-header'>

    </header>
    <form action="<?php echo U('home/match/successTips');?>" method="post">
    <div class="weui_cells weui_cells_form">
      <div class="weui_cell">
        <div class="weui_cell_hd" ><label class="weui_label" >目的地</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <div  id='show-toast-forbidden' class="weui_input" ><?php echo ($university); ?></div>
        </div>
      </div>
      <div class="weui_cell">
        <div class="weui_cell_hd"><label for="" class="weui_label">到达时间</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input type="hidden" name="University" value="<?php echo ($university); ?>"/>
          <input class="weui_input" type="text" value="" id='datetime-picker' name="ReachTime">
        </div>
      </div>
    </div>
    <div class="weui_cells_title">备注信息</div>
    <div class="weui_cells weui_cells_form">
      <div class="weui_cell">
        <div class="weui_cell_bd weui_cell_primary">
          <textarea class="weui_textarea" placeholder="输入一些其他信息，例如您的个人资料" rows="5" name="NoteMsg"></textarea>
          <div class="weui_textarea_counter"><span>0</span>/200</div>
        </div>
      </div>
    </div>
      <div class='demos-content-padded'>
        <input type="submit" class="weui_btn weui_btn_primary" value="GO"/>
      </div>
    </form>
    <script src="/Public/lib/jquery-2.1.4.js"></script>
<script src="/Public/lib/fastclick.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
  });
</script>
<script src="/Public/js/jquery-weui.js"></script>
<script>
      $("#datetime-picker").datetimePicker();
      $(document).on("click", "#show-toast-forbidden", function() {
        $.toast("禁止操作", "forbidden");
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