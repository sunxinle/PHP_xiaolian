<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title>校脸</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <link href="/Public/lib/weui.min.css" type="text/css" rel="stylesheet" />
  <link href="/Public/css/jquery-weui.min.css" type="text/css" rel="stylesheet" />

  <style type="text/css">
   img{ 
      width: 30px;
      height: 30px;
    }
    html,body{
      height: 100%;
    }
    .swiper-container {
    width: 100%;
    }
    .swiper-container img {
    display: block;
    /*width: 100%;*/
    }
    .weui_tab .weui_tab_bd .content img{
      /*width: 100%;*/
      display: block;
    }
   .back{
     position: fixed;
     top:2%;
     left: 5%;
     z-index: 100;
   }
  </style>

</head>
<body>

  <div class="back">
    <a href="<?php echo U('home/my/index');?>"><img src="/Public/images/back.png" alt=""></a>
  </div>
  <!--顶部标题栏-->
  <div class="weui_tab">
  <div class="weui_navbar">
    <a class="weui_navbar_item weui_bar_item_on">
      我的请求
    </a>
  </div>
  <div class="weui_tab_bd">

    <div class="content">

            <div class="weui_cells weui_cells_access">
              <a class="weui_cell" href="javascript:;">
                <div class="weui_cell_hd">
                  <img src="<?php echo ($myrequest["headimgurl"]); ?>" alt="" style="margin-top:-30px;">
                </div>
                <div class="weui_cell_bd weui_cell_primary">
                  <p style="font-size:16px; height: 30px;">目的地：<?php echo ($myrequest["to_uni"]["uniname"]); ?></p>
                  <p style="text-indent:1em;font-size:10px;">前往时间：<?php echo ($myrequest["mgotime"]); ?></p>
                  <p style="text-indent:1em;font-size:9px;">&nbsp&nbsp&nbsp&nbsp&nbsp发送时间：<?php echo ($myrequest["msendtime"]); ?></p>
                </div>

              </a>
                    <?php if(is_array($myConfirm)): $i = 0; $__LIST__ = $myConfirm;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$myc): $mod = ($i % 2 );++$i;?><div class="reply">
                        <a class="weui_cell" href="javascript:;" style="margin-left: 5%;">

                          <div class="weui_cell_bd weui_cell_primary" >
                              <div style="float:left;"><img src="<?php echo ($myc["confirm_user"]["headimgurl"]); ?>" alt=""></div>
                              <div style="float: left;">
                            <p style="font-size:16px; height: 32px; "><span style="color: #2a6496;">&nbsp;<?php echo ($myc["confirm_user"]["nickname"]); ?></span> 同意带您游玩</p>
                            <p style="text-indent:1em;font-size:10px;">&nbsp;同意时间：<?php echo ($myc["agreetime"]); ?></p>
                              </div>
                           </div>
                          <a href="<?php echo U('home/my/deleteOneReply',array('id'=>$myc['rrid']));?>" class="weui_btn weui_btn_mini weui_btn_warn delete" style="margin-left:50px; width: 100px;">不好意思</a>
                          <a href="<?php echo U('home/my/agreeReply',array('id'=>$myc['rrid']));?>" class="weui_btn weui_btn_mini weui_btn_primary agree" style="margin-left:15px; width: 100px;">同意并聊天</a>
                        </a>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
          </div>
  </div>
</div>
</body>
<script type="text/javascript" src="/Public/lib/jquery-2.1.4.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.delete').click(function(){
        //使用ajax方式删除记录
        var url = $(this).attr('href');
        var self = $(this);
        $.get(url,function(data){
          console.log(data);
          if(data==1){
            //隐藏相应的行
            self.parent(".reply").children().animate({
              height:'hide'
            });
          }else{
            alert('未知的错误，请联系开发者！');
          }
        })
      //阻止浏览器的默认操作
      return false;
    });
    $('.agree').click(function(){
      //使用ajax方式删除记录
      var url = $(this).attr('href');
      var self = $(this);
      $.get(url,function(data){
        if(data==1){
          //隐藏相应的行
          window.location.href = "<?=U('home/my/index');?>";
        }else{
          console.log(data);
          alert(data);
        }
      })
      //阻止浏览器的默认操作
      return false;
    })
  })
</script>

  <script type="text/javascript" src="/Public/js/jquery-weui.min.js"></script>
  <script type="text/javascript" src="/Public/js/swiper.js"></script>
</html>