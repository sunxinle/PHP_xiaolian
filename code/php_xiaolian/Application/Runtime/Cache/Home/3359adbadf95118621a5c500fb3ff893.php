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
    <script type="text/javascript" src="/Public/chatjs/jquery-1.11.1.js"></script>
    <script type="text/javascript" src="/Public/chatjs/strophe-custom-2.0.1.js"></script>
    <script type="text/javascript" src="/Public/chatjs/json2.js"></script>
    <script type="text/javascript" src="/Public/chatjs/easemob.im-1.0.7.js"></script>
    <script type="text/javascript" src="/Public/chatjs/bootstrap.js"></script>

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
      <!-- 换新注册操作界面 -->
            <table>
              <tr>
                <td><label>用户名:</label>
                  <input type="text" value="" id="regist_username" tabindex="1" />
                  <label>密码:</label>
                  <input type="password" value="" id="regist_password" tabindex="2" />
                </td>
              </tr>
            </table>

      <!-- huanxin注册操作界面 -->
      <div class="weui_cells_tips">准确填写大学名称才能定位哦，童鞋</div>
      <div class="weui_btn_area">
        <input  type="submit" class="weui_btn weui_btn_primary"  id="showTooltips" onclick="regist()" value="提交">
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
  <script type="text/javascript">
    var xmppURL = null;
    var apiURL = null;
    var curUserId = null;
    var curChatUserId = null;
    var conn = null;
    var curRoomId = null;
    var msgCardDivId = "chat01";
    var talkToDivId = "talkTo";
    var talkInputId = "talkInputId";
    var fileInputId = "fileInput";
    var bothRoster = [];
    var toRoster = [];
    var maxWidth = 200;
    var groupFlagMark = "group--";
    var groupQuering = false;
    var textSending = false;
    var appkey = "1180161208115132#xiaolian";
    var time = 0;

    //easemobwebim-sdk注册回调函数列表
    $(document).ready(function() {
      conn = new Easemob.im.Connection();
    });
    //注册新用户操作方法
    var regist = function() {
      var user = $("#regist_username").val();
      var pass = $("#regist_password").val();
      var nickname = $("#regist_nickname").val();
      if (user == '' || pass == '') {
        alert("你的聊天功能出现问题，请联系公众号管理员");
        return;
      }
      var options = {
        username : user,
        password : pass,
        nickname : nickname,
        appKey : appkey,
        success : function(result) {
          alert("注册成功!");

        },
        error : function(e) {
          alert(e.error);
        },
        apiUrl : apiURL
      };
      Easemob.im.Helper.registerUser(options);
    };
  </script>
</html>