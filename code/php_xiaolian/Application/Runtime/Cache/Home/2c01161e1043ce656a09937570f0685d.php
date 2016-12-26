<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>你想去的大学</title>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

<meta name="description" content="Write an awesome description for your new site here. You can edit this line in _config.yml. It will appear in your document head meta (for Google search results) and in your feed.xml site description.
">

<link rel="stylesheet" href="/Public/lib/weui.min.css">
<link rel="stylesheet" href="/Public/css/jquery-weui.css">
<link rel="stylesheet" href="/Public/css/demos.css">
<style type="text/css">
  .proposal{
    padding-left: 10%;
    list-style-type: none;
    margin-top: 3px;
    border-bottom: 1px solid #ADADAD;
  }
  .selected{
    color: #29b6f6;
  }
  .for_like{
    margin-top:0px;
    float: left;
    width: 100%;
  }
</style>

  </head>

  <body ontouchstart>
    <div class="weui_search_bar" id="search_bar">
      <form class="weui_search_outer" action="index.php">
        <div class="weui_search_inner">
          <i class="weui_icon_search"></i>
          <!-- 请注意：这个搜索框的name属性需要在autocomplete.js里面更改！！ -->
          <!-- <input type="search" class="weui_search_input" id="search_input" placeholder="输入你想去的大学" required/> -->
          <div id="search-form"></div>
          <a href="javascript:" class="weui_icon_clear" id="search_clear"></a>
          
        </div>
        <label for="search_input" class="weui_search_text" id="search_text">
          <i class="weui_icon_search"></i>
          <span >输入你想去的大学</span>
        </label>
      </form>
      <a href="javascript:void(0)" class="weui_search_cancel" id="search_cancel" style="color:#29b6f6">取消</a>
    </div>
    <div class="for_like"></div>
    <form  action="<?php echo U('home/match/go');?>" method="post">
      <div class='demos-content-padded' style="margin-top:80%;">
        <div id="message" >  </div>

        <input type="submit" class="weui_btn weui_btn_primary toptip weui_btn_plain_primary" vaule="确认">

        <a href="javascript:void(0);" onclick="history.go(-1)" class="weui_btn weui_btn_plain_primary">取消</a>
      </div>
    </form>
    <!--用php将分配过来的数组转换为json串，然后就可以在js中直接用了-->

    <script src="/Public/lib/jquery-2.1.4.js"></script>
<script src="/Public/lib/fastclick.js"></script>
<script src="/Public/js/jquery-weui.js"></script>
<script type="text/javascript" src="/Public/js/autocomplete.js"></script>
<script type="text/javascript">
/*  var proposals = new Array();*/
var proposals = eval('<?php echo $result; ?>');

console.log(proposals);
$(document).ready(function(){
  FastClick.attach(document.body);
  $('#search-form').autocomplete({
    hints: proposals,
    onSubmit: function(text){
      $('#message').html('<input type="hidden" name="university"  class="text" value="'+text+'"/>' );
    }
  });

})
.on("click", ".toptip", function() {
  var text=$('.text').val();
  if(!text){
    $.toptip('请输入你想去的大学', 'warning');
    return false;
  }
})
</script>
  </body>
</html>