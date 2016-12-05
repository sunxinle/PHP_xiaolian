<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title>校脸圈首页</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

  <meta name="description" content="Write an awesome description for your new site here. You can edit this line in _config.yml. It will appear in your document head meta (for Google search results) and in your feed.xml site description.
">

  <link rel="stylesheet" href="/Public/lib/weui.min.css">
  <link rel="stylesheet" href="/Public/css/jquery-weui.css">
  <link rel="stylesheet" href="/Public/css/demos.css">
  <style type="text/css">
    .the_plus{
      position: absolute;
      bottom: 80px;
      left: 80%;
    }

      .back{
      position: fixed;
      top: 10%;
      left: 5%;
    }
    .xiayipian{
      position: absolute;
      bottom: 0px;
      width: 100%;
    }
      .img_weui_media_desc{
    width: 100%;
    height: 10%;
  }
  .img_weui_media_info{
   margin-left:7%;
  }
  .like_weui_media_box{
    margin-top: -4%;
  }
  .like_weui_cell_primary p{
    float: left;
    font-size: 10px;
  }
  .content_weui_media_desc{
    font-size: 100px;
    margin-bottom: 3px;
  }
   .weui_tab .weui_tab_bd .content img{
          /*width: 100%;*/
          display: block;
        }
    .p_weui_cell_primary{
      float: left;
    }
  </style>
</head>

<body ontouchstart>
<div class="weui_tab_bd">
      <header class='demos-header'>
      <h1 class="demos-title">Article</h1>
    </header>

    <article class="weui_article">
      <h1><?php echo ($topcontent["tltitle"]); ?></h1>
      <section>
        <section>
          <p><?php echo ($topcontent["tlcontent"]); ?></p>

          <p>
            <img src="<?php echo ($topcontent["tlimage"]); ?>" alt="">
          </p>
        </section>
      </section>
    </article>

      <!--评论开始-->
     <div class="weui_panel">
       <div class="weui_cells weui_cells_access">
           <div class="weui_panel_hd">评论列表</div>  
           <?php if(is_array($topcomment)): $i = 0; $__LIST__ = $topcomment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i;?><a class="weui_cell" href="">
                   <div class="weui_cell_hd">
                      <img src="<?php echo ($va["tlcimage"]); ?>" alt=""  width="30px" height="30px">
                          </div>
                     <div class="weui_cell_bd weui_cell_primary">
                            <p style="font-size:10px;color:grey;"><?php echo ($va["tlcnickname"]); ?></p>
                            <p style="text-indent:1em;font-size:10px; "><?php echo ($va["tlccontent"]); ?></p>
                      </div>
                    <span style="font-size:8px; color:grey; margin-top:-16px;"><?php echo ($va["tlcaddtime"]); ?></span>
                </a><?php endforeach; endif; else: echo "" ;endif; ?>
                      </div>
              </div>
<!--评论结束-->

</div>

<!--下一篇+评论开始-->
    <div class="weui-row weui-no-gutter xiayipian">
          <div class="weui-col-50"><a href="<?php echo U('news/detail',array('id'=>$topcontent['tlid']+1));?>" class="weui_btn close-popup
          weui_btn_primary">下&nbsp;&nbsp;一&nbsp;&nbsp;篇</a></div>
          <div class="weui-col-50"><a href="<?php echo U('news/comment',array('id'=>$topcontent['tlid']));?>" class="weui_btn close-popup weui_btn_primary">评&nbsp;&nbsp;论</a></div>
      </div>
<!--下一篇+评论结束-->

</div>
  <div class="back">
      <a href="javascript:;" onclick="history.go(-1)"><img src="/Public/images/back.png" alt=""></a>
    </div>
<script src="/Public/lib/jquery-2.1.4.js"></script>
<script src="/Public/lib/fastclick.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
  });
</script>

<script src="/Public/js/jquery-weui.js"></script>

<script src="/Public/js/swiper.js"></script>
<script>
      $(document).on("open", ".weui-popup-modal", function() {
        console.log("open popup");
      }).on("close", ".weui-popup-modal", function() {
        console.log("close popup");
      });
    </script>
</body>
</html>