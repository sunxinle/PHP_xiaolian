<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>注册页面</title>
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
      <h2 class="demos-title">校脸注册</h2>
    </header>

    <form action="/home/user/login" method="post">
    <div class="weui_cells weui_cells_form">
      <div class="weui_cell">
        <div class="weui_cell_hd"><label class="weui_label">大学</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input name="college" class="weui_input" type="text" placeholder="your university">
        </div>
      </div>
      <div class="weui_cell">
        <div class="weui_cell_hd"><label class="weui_label">姓名</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input name="name" class="weui_input" type="text" placeholder="your name">
        </div>
      </div>
      <div class="weui_cell">
        <div class="weui_cell_hd"><label class="weui_label">性别</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input name='sex' class="weui_input" type="text" placeholder="phone">
        </div>
      </div>
      <div class="weui_cell">
        <div class="weui_cell_hd"><label class="weui_label">学号</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input name="sno" class="weui_input" type="text" placeholder="student number">
        </div>
      </div>
         <div class="weui_cell">
        <div class="weui_cell_hd"><label class="weui_label">手机号</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input name='phonenumber' class="weui_input" type="text" placeholder="phone number">
        </div>
      </div>
      <div class="weui_cell">
        <div class="weui_cell_hd"><label for="" class="weui_label">入学日期</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" type="date" value="">
        </div>
      </div>
      <div class="weui_cells_tips">准确填写大学名称才能定位哦，童鞋</div>
      <div class="weui_btn_area">
        <input  type="submit" class="weui_btn weui_btn_primary"  id="showTooltips" value="提交">
      </div>
    </div>
    </form>

    <script src="/Public/lib/jquery-2.1.4.js"></script>
<script src="/Public/lib/fastclick.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
  });
      $("#showTooltips").click(function() {
        var tel = $('#tel').val();
        if(!tel || !/1[3|4|5|7|8]\d{9}/.test(tel)) $.toptip('请输入手机号');
        else $.toptip('提交成功', 'success');
      });
      $("#university").blur(function(){
          var university =$("#university").val();
          if(!university) $.toptip('你所输入的大学名称不正确');
      });
    </script>
<script src="/Public/js/jquery-weui.js"></script>

  </body>
</html>