<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>jQuery WeUI</title>
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
    <form action="/home/moments/getart" method="post" enctype="multipart/form-data">

    <div class="weui_cells weui_cells_form">
      <div class="weui_cell">
        <div class="weui_cell_bd weui_cell_primary">
          <textarea class="weui_textarea" name="title" placeholder="请输入标题" rows="1"></textarea>

        </div>
      </div>
    </div>
   <!-- <div class="weui_cells_title">文本域</div>-->
    <div class="weui_cells weui_cells_form">
      <div class="weui_cell">
        <div class="weui_cell_bd weui_cell_primary">
          <textarea class="weui_textarea" name="art" placeholder="请输入说说内容" rows="3"></textarea>
          <div class="weui_textarea_counter"><span>0</span>/200</div>
        </div>
      </div>
    </div>

    <div class="weui_cells weui_cells_form">
      <div class="weui_cell">
        <div class="weui_cell_bd weui_cell_primary">
          <div class="weui_uploader">
            <div class="weui_uploader_hd weui_cell">
              <div class="weui_cell_bd weui_cell_primary">图片上传</div>
              <div class="weui_cell_ft">0/2</div>
            </div>
            <div class="weui_uploader_bd">
              <ul class="weui_uploader_files">
               <!--  <li class="weui_uploader_file weui_uploader_status" style="background-image:url(http://shp.qpic.cn/weixinsrc_pic/pScBR7sbqjOBJomcuvVJ6iacVrbMJaoJZkFUIq4nzQZUIqzTKziam7ibg/)">
                  <div class="weui_uploader_status_content">
                    <i class="weui_icon_warn"></i>
                  </div>
                </li> -->
                <!-- <li class="weui_uploader_file weui_uploader_status" style="background-image:url(http://shp.qpic.cn/weixinsrc_pic/pScBR7sbqjOBJomcuvVJ6iacVrbMJaoJZkFUIq4nzQZUIqzTKziam7ibg/)">
                  <div class="weui_uploader_status_content">50%</div>
                </li> -->
              </ul>
              <div class="weui_uploader_input_wrp">
                <input class="weui_uploader_input" type="file" name=
                "img"/>
              </div>
            </div>
          </div>
        </div>
      </div>
         <div class="weui_cells_tips"></div>
      <div class="weui_btn_area">
        <input type="submit" class="weui_btn weui_btn_primary" value="确定"/>
      </div>
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

  </body>
</html>