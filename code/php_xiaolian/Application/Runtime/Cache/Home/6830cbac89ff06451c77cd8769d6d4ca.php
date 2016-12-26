<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>个人中心</title>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

<meta name="description" content="Write an awesome description for your new site here. You can edit this line in _config.yml. It will appear in your document head meta (for Google search results) and in your feed.xml site description.
">
    <script type="text/javascript" src="/Public/chatjs/jquery-1.11.1.js"></script>
    <script type="text/javascript" src="/Public/chatjs/strophe-custom-2.0.1.js"></script>
    <script type="text/javascript" src="/Public/chatjs/json2.js"></script>
    <script type="text/javascript" src="/Public/chatjs/easemob.im-1.0.7.js"></script>
    <script type="text/javascript" src="/Public/chatjs/bootstrap.js"></script>
<link rel="stylesheet" href="/Public/lib/weui.min.css">
<link rel="stylesheet" href="/Public/css/jquery-weui.css">
<link rel="stylesheet" href="/Public/css/demos.css">
<style>
body{
  padding:0;
  margin:0;
}
.titleheader{
  padding:0;
  margin: 0;
}
.title{
  padding:0;
  margin:0;
}
</style>
 </head>

  <body ontouchstart>

     <a href="<?php echo U('home/news/index');?>">
        <img src="/Public/images/xiaolian.png"/>
      </a>
    <header class='demos-header titleheader'>

      <h2 class="demos-title title">
      等你来@<?php echo ($user["nickname"]); ?></h2>
    </header>

    <form action="<?php echo U('home/user/login');?>" method="post">

    <div class="weui_cells weui_cells_form">
      <div class="weui_cell">
        <div class="weui_cell_hd"><label class="weui_label">大学</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input name="college" class="weui_input" id="university" type="text" placeholder="your university" value="<?php echo ($user["college"]); ?>">
        </div>
      </div>

      <div class="weui_cell">
        <div class="weui_cell_hd"><label class="weui_label">姓名</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input name="name" class="weui_input" type="text" id="name" placeholder="your name" value="<?php echo ($user["name"]); ?>">
        </div>
      </div>
      <div class="weui_cell">
        <div class="weui_cell_hd"><label class="weui_label">学号</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input name="sno" class="weui_input" id="sno" type="text" placeholder="student number" value="<?php echo ($user["sno"]); ?>">
        </div>
      </div>
         <div class="weui_cell">
        <div class="weui_cell_hd"><label class="weui_label" >手机号</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input name='phonenumber' id="tel" class="weui_input" type="text" placeholder="phone number" value="<?php echo ($user["phonenumber"]); ?>">
        </div>
      </div>
      <div class="weui_cell">
        <div class="weui_cell_hd"><label for="date2" class="weui_label">入学日期</label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input name='enrollmentDate' class="weui_input" id="date2" type="text" value="<?php echo ($user["enrollmentDate"]); ?>">
        </div>
      </div>

      <input type="hidden"value="<?php echo ($user["account"]); ?>" id="regist_username" name="account" tabindex="1" >
      <input type="hidden" value="<?php echo ($user["password"]); ?>" id="regist_password" name="password" tabindex="2" >
      <input type="hidden" value="<?php echo ($user["nickname"]); ?>" id="regist_nickname" tabindex="3" />
      <input type="hidden" name="openid" value="<?php echo ($user["openid"]); ?>"> 
      <input type="hidden" name="nickname" value="<?php echo ($user["nickname"]); ?>"> 
      <input type="hidden" name="sex" value="<?php echo ($user["sex"]); ?>"> 
      <input type="hidden" name="headimgurl" value="<?php echo ($user["headimgurl"]); ?>"> 
      <div class="weui_cells_tips" style="color:#29b6f6"><?php echo ($user["prompt"]); ?></div>
      <div class="weui_btn_area">
        <input  type="submit" class="weui_btn weui_btn_primary weui_btn_plain_primary"  id="showTooltips" value="提交">
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
        /*环信接口数据*/
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
          //  alert("注册成功!");

          },
          error : function(e) {
            //alert(e.error);
          },
          apiUrl : apiURL
        };
        Easemob.im.Helper.registerUser(options);
      };
       /*环信接口数据*/
        var university=$('#university').val();
        var tel = $('#tel').val();
        var name=$('#name').val();
        var sno =$('#sno').val();
        if(!university){
           $.toptip('请输入你所在大学','warning');
           return false;
        }
          if(!name){
           $.toptip('请输入你的姓名','warning');
           return false;
        }
          if(!sno){
           $.toptip('请输入你的学号','warning');
           return false;
        }
         if(!tel || !/1[3|4|5|7|8]\d{9}/.test(tel))
        {
          $.toptip('请输入正确手机号','warning');
           return false;
         }
         else 
          {
             regist();
            $.toptip('提交成功', 'success'); 
          }

      });
 $("#tel").blur(function(){
     var tel = $('#tel').val();
        if(!tel || !/1[3|4|5|7|8]\d{9}/.test(tel))
        {
          $.toptip('请输入正确手机号','warning');
         } 
 })
/*  $("#sno").blur(function(){
       var sno =$('#sno').val();
        if(!sno)
        {
          $.toptip('请输入你的学号','warning');
         } 
 })
    $("#name").blur(function(){
       var name =$('#name').val();
        if(!name)
        {
          $.toptip('请输入你的姓名','warning');
         } 
 })*/
    </script>
<script src="/Public/js/jquery-weui.js"></script>
    <script>
      $(function() {
        FastClick.attach(document.body);
      });
    </script>

    <script>
      $("#university").picker({
        title: "请选择您的大学",
        cols: [
          {
            textAlign: 'center',
            values: ['河北师范大学', '河北科技大学', '河北医科大学', '河北经贸大学', '河北大学', '河北农业大学', '河北工业大学']
          }
        ],
        onChange: function(p, v, dv) {
          console.log(p, v, dv);
        },
        onClose: function(p, v, d) {
          console.log("close");
        }
      });
      $("#date2").calendar({
        value: ['2016-12-12'],
        dateFormat: 'yyyy年mm月dd日' , // 自定义格式的时候，不能通过 input 的value属性赋值 '2016年12月12日' 来定义初始值，这样会导致无法解析初始值而报错。只能通过js中设置 value 的形式来赋值，并且需要按标准形式赋值（yyyy-mm-dd 或者时间戳)
        onChange: function(p, v, dv) {
          console.log(p, v, dv);
        },
        onClose: function(p, v, d) {
          console.log("close");
        }
      });

    </script>
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
          //  alert("注册成功!");

          },
          error : function(e) {
            //alert(e.error);
          },
          apiUrl : apiURL
        };
        Easemob.im.Helper.registerUser(options);
      };
    </script>
  </body>
</html>