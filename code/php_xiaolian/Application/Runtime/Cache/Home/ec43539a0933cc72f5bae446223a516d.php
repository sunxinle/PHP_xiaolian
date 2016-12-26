<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>校脸圈</title>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

<meta name="description" content="Write an awesome description for your new site here. You can edit this line in _config.yml. It will appear in your document head meta (for Google search results) and in your feed.xml site description.
">

<link rel="stylesheet" href="/Public/lib/weui.min.css">
<link rel="stylesheet" href="/Public/css/jquery-weui.css">
<link rel="stylesheet" href="/Public/css/demos.css">
<style>
#uploadPreview {
    width: 150px;
    height: 150px;                          
    background-position: center center;
    background-size: cover;
    border: 4px solid #fff;
    -webkit-box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, 0);
    display: inline-block;
    }
</style>
  </head>

  <body ontouchstart>
    <form action="/home/moments/getart" method="post" enctype="multipart/form-data">
    <div class="weui_cells weui_cells_form">
      <div class="weui_cell">
        <div class="weui_cell_bd weui_cell_primary">
          <textarea class="weui_textarea" name="art" placeholder="请输入说说内容" rows="3"></textarea>
          <div class="weui_textarea_counter"><span class="OK">0</span>/200</div>
        </div>
      </div>
    </div>
  <div class="weui_cell weui_cell_warn">
      <div class="weui_cell">
        <div class="weui_cell_bd weui_cell_primary">
          <div class="weui_uploader">
            <div class="weui_uploader_hd weui_cell">
              <div class="weui_cell_bd weui_cell_primary" style="color:#29b6f6">挑出你最喜欢的一张吧(点小窗户~~)</div>
            </div>
            <div class="weui_uploader_bd">
              <div class="weui_uploader_input_wrp" id="uploadPreview">
              </div>
              <div class="weui_uploader_input_wrp" style="width:50px;height:50px">
                <input class="weui_uploader_input" id="uploadImage" type="file" multiple="" name=
                "img" onchange="PreviewImage();"/>
              </div>
            </div>
          </div>
        </div>
      </div>
         <div class="weui_cells_tips"></div>
      
    </div>
    <!--取消+确定开始-->
    <div class="weui-row">
        <div class="weui-col-50"><a href="javascript:;" onclick="history.go(-1)" class="weui_btn weui_btn_plain_primary close-popup">取&nbsp;&nbsp;&nbsp;&nbsp;消</a></div>
        <div class="weui-col-50"><input type="submit" class="weui_btn weui_btn_plain_primary close-popup toptip" value="确&nbsp;&nbsp;&nbsp;&nbsp;定"></div>
      </div>
    <!--取消+确定结束-->
    </form>

    <script src="/Public/lib/jquery-2.1.4.js"></script>
<script src="/Public/lib/fastclick.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
  });
    $(".toptip").click(function() {
      var sug = $('.weui_textarea').val();
      if(!sug) {
         $.toptip('亲文字+图片才是说说呢', 'warning');
          return false;
      }
      else $.toptip('评论成功啦', 'success');
  })
  $(".weui_textarea").keyup(function() {
    var len = $(".weui_textarea").val().length;
    var MAX_LENGTH=200;
    if (len>MAX_LENGTH){
      $(this).val($(this).val().substring(0,MAX_LENGTH));
      $.toast('字数已经够多啦','text');
    }
    $(".OK").text(len);
  });
</script>
<script src="/Public/js/jquery-weui.js"></script>
<script>
$("#uploadImage").on("change", function(){
    // Get a reference to the fileList
    var files = !!this.files ? this.files : [];
 
    // If no files were selected, or no FileReader support, return
    if (!files.length || !window.FileReader) return;
 
    // Only proceed if the selected file is an image
    if (/^image/.test( files[0].type)){
 
        // Create a new instance of the FileReader
        var reader = new FileReader();
 
        // Read the local file as a DataURL
        reader.readAsDataURL(files[0]);
 
        // When loaded, set image data as background of div
        reader.onloadend = function(){
  
       $("#uploadPreview").css("background-image", "url("+this.result+")");
        
        }
 
    }
 
});
</script>
  </body>
</html>