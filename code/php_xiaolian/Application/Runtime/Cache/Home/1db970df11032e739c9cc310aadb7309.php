<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>头条评论页</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="河北师范大学软件学院微官网">
	<link rel="stylesheet" href="/Public/lib/weui.min.css">
	<link rel="stylesheet" href="/Public/css/jquery-weui.css">
	<link rel="stylesheet" href="/Public/css/demos.css">
</head>
 <style type="text/css">
     .weui_tabbar{
            position: fixed;
            bottom: 0;
          }
    .weui_tab{
      height: 20%;
    }
    .demos-title{
        color: #ea7c14;
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
    .nixiang{
      background-color: #555555;
    }
    .back{
      position: fixed;
      top: 10%;
      left: 5%;
    }
  </style>
<body ontouchstart>
    <form action="/home/moments/getcomment" method="post">
    <div class="weui_cells weui_cells_form">
      <div id="show">  </div>
      <div class="weui_cell">
        <div class="weui_cell_bd weui_cell_primary">
          <textarea class="weui_textarea" placeholder="略微小评一下" rows="3" id="suggestion" name="suggestion"></textarea>
          <div class="weui_textarea_counter"><span>0</span>/200</div>
          <input type="hidden" name="hid" value="<?php echo ($id); ?>" id="hid"> 
        </div>
      </div>
    </div>


    <div class="weui_cells weui_cells_form">
       <div class="weui_cells_tips"><img src="/Public/images/happy_face.png" width="8%" height="8%" style="margin-left:6%" class="emotion"></div>
      <div class="weui_btn_area">
        <input type="submit" class="weui_btn weui_btn_primary sub_btn" value="提交"/>
      </div>
    </div>

   <!--说说开始-->

    </form>
    <!--说说结束-->
<script src="/Public/lib/jquery-2.1.4.js"></script>
<script src="/Public/lib/fastclick.js"></script>
<script>
	$(function() {
		FastClick.attach(document.body);
	});
</script>
<script src="/Public/js/jquery-weui.js"></script>
    <script>
      $("#showTooltips").click(function() {
        var sug = $('#suggestion').val();
        if(!sug) $.toptip('还没有填写评论啊');
        else $.toptip('评论成功啦', 'success');
      });
      $(function(){
  $('.emotion').qqFace({
    id : 'facebox', 
    assign:'suggestion', 
    path:'arclist/' //表情存放的路径
  });
  $(".sub_btn").click(function(){
    var str = $("#suggestion").val();
    $("#show").html(replace_em(str));
  });
});
//查看结果
function replace_em(str){
  str = str.replace(/\</g,'&lt;');
  str = str.replace(/\>/g,'&gt;');
  str = str.replace(/\n/g,'<br/>');
  str = str.replace(/\[em_([0-9]*)\]/g,'<img src="arclist/$1.gif" border="0" />');
  return str;
}
    </script>
<script  src="/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/Public/js/jquery.qqFace.js"></script>
</body>
</html>