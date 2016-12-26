<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>捞一捞</title>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

<meta name="description" content="Write an awesome description for your new site here. You can edit this line in _config.yml. It will appear in your document head meta (for Google search results) and in your feed.xml site description.
">

<link rel="stylesheet" href="/Public/lib/weui.min.css">
<link rel="stylesheet" href="/Public/css/jquery-weui.css">
<link rel="stylesheet" href="/Public/css/demos.css">
<style>
  .demos-title{
    color:#fff;
  }
  .weui_btn_primary{
    background-color: transparent;
    background-color:rgba(42,100,150,0.5);
  }
  .headimg{
    height:30px;
    width:30px;
    margin-right: 10px;
  }
  .username{
    display: inline;
    color: #2a6496;
    margin-right: 5px;
    clear: right;
  }
  .demos-title{
    font-size: 20px;
  }
  #show-custom{
    margin-top: 50%;
  }
  .cancel{
    margin-top: 80%;
    width: 50%;
  }
</style>
  </head>

  <body ontouchstart>



    <div class='demos-content-padded'>
      <a href="javascript:;" id='show-custom' class="weui_btn weui_btn_primary">捞一捞</a>
    </div>
    <div class='demos-content-padded'>
      <a href="javascript:;" onclick="window.history.go(-1);" class="weui_btn weui_btn_primary cancel">返回</a>
    </div>
    <script src="/Public/lib/jquery-2.1.4.js"></script>
<script src="/Public/lib/fastclick.js"></script>
<script>
  $(function() {
    FastClick.attach(document.body);
  });
</script>
<script src="/Public/js/jquery-weui.js"></script>
    <script>

      $(function () {
        var bg = Math.floor(Math.random() * 10 + 1);
        console.log(bg);
        $('body').css('background-size','100% 100%');
        $('body').css('background-image','url(/Public/searchimage/image' + bg + '.jpg)');
      })

      $(document).on("click", "#show-custom", function() {
          //使用ajax方式删除记录
          var url = "<?php echo U('home/my/getOneMessage');?>";
          var self = $(this);
          var mychar = 'nothing';
          $.post(url,function(data){
            console.log(data);
            if (data===mychar) {
              function hei(mychar) {
                $.modal({
                  title: '没有瓶子啦',
                  text: '已经没有新的请求啦，请点击下面的重来重新开始',
                  buttons: [
                    { text: "重来", onClick: function(){
                      var url = "<?=U('home/my/refreshGetOneMessage');?>";
                      $.get(url,function(newdata){
                        if(newdata==1){
                          //跳转到相应的行
                          $.alert('成功！');
                        }else{
                          console.log(newdata);
                          $.alert(newdata);
                        }
                      })
                    } },

                    { text: "取消", className: "default", onClick: function(){ console.log('取消了刷新')} },

                  ]
                });
              }
              hei(mychar);

            } else if(data==='toomuch') {
              function hei(mychar) {
                $.modal({
                  title: '次数过多提醒',
                  text: '您今天捞瓶子的次数已经超过了三次，明天再来试试吧',
                  buttons: [

                    { text: "取消", className: "default", onClick: function(){ console.log('取消了刷新')} },

                  ]
                });
              }
              hei(mychar);

            } else{
              var dataObj = JSON.parse(data);
              function haha(dataObj) {
                $.modal({
                  title: '来自'+dataObj.from_uni.uniname+'的瓶子',
                  text: '<img class="headimg" src= '+ dataObj.headimgurl + '>' +'<div class="username">'+ dataObj.nickname +'</div><br />' + dataObj.mmessage,
                  buttons: [
                    { text: "接受他", onClick: function(){
                      var url = "<?=U('home/my/acceptOneMessage/id');?>" + '/' + dataObj.mid;
                      $.get(url,function(newdata){
                        if(newdata==1){
                          //跳转到相应的行
                          window.location.href = "<?=U('home/my/index');?>";
                        }else{
                          console.log(newdata);
                          $.alert(newdata);
                        }
                      })
                    } },

                    { text: "拒绝他", className: "default", onClick: function(){ console.log('拒绝了请求')} },

                  ]
                });
              }
              haha(dataObj);
            }
          //阻止浏览器的默认操作
          return false;
        })
      })
    </script>
  </body>
</html>