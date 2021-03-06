<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="笑脸">
	<link rel="stylesheet" href="/Public/lib/weui.min.css">
	<link rel="stylesheet" href="/Public/css/jquery-weui.css">
	<link rel="stylesheet" href="/Public/css/demos.css">
</head>
<style>
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
</style>
<body ontouchstart>
    <form action="/index.php/home/news/getcomment" method="post">

        <div class="comment">
            <div class="weui_cells weui_cells_form">
                <div class="weui_cell">
                    <div class="weui_cell_bd weui_cell_primary">
                        <textarea class="weui_textarea" placeholder="请留下您的宝贵意见" rows="4" id="suggestion" name="suggestion"></textarea>
                        <div class="weui_textarea_counter"><span class="OK">0</span>/200</div>
                        <input type="hidden" name="hid" value="<?php echo ($id); ?>" id="hid">
                    </div>
                </div>
            </div>
        </div>


    <div class="weui_cells weui_cells_form">
       <div class="weui_cells_tips"><img src="/Public/images/happy_face.png" width="8%" height="8%" style="margin-left:6%" class="emotion"></div>
      <div class="weui_btn_area">
        <input type="submit" class="weui_btn weui_btn_primary toptip"/>
      </div>
    </div>
</form>

<script src="/Public/lib/jquery-2.1.4.js"></script>
<script src="/Public/lib/fastclick.js"></script>
 <script  src="/Public/js/jquery.min.js"></script>
 <script type="text/javascript" src="/Public/js/jquery.qqFace.js"></script>
<script src="/Public/js/jquery-weui.js"></script>
    <script>
        $(function() {
            FastClick.attach(document.body);
        });
        $(".weui_textarea").keyup(function() {
            var len = $(".weui_textarea").val().length;
            var MAX_LENGTH=200;
            if (len>MAX_LENGTH){
                $(this).val($(this).val().substring(0,MAX_LENGTH));
                $.toast('字数已经够多啦','text');
            }
            $(".OK").text(len);
        })
        $(".toptip").click(function() {
            var text=$('.weui_textarea').val();
            if(!text){
                $.toptip('输入评论才能提交哦', 'warning');
                return false;
            }
        })
         $(function(){
          $('.emotion').qqFace({
            assign:'suggestion',
            path:'/Public/arclist/' //表情存放的路径
          });
        });

 </script>
</body>
</html>