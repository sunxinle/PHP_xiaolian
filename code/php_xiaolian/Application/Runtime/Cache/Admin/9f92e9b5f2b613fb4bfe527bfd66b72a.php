<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>校脸后台新闻管理</title>
    <link rel="stylesheet" type="text/css" href="/Public/menu/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/menu/css/main.css"/>
    <script type="text/javascript" src="/Public/menu/js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.html">首页</a></li>
                <li><a href="#" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#"><?php echo ($name); ?></a></li>
                <li><a href="<?php echo U('home/root/logout');?>">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>新闻管理</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('admin/news/view');?>"><i class="icon-font">&#xe017;</i>所有新闻<li><a href="<?php echo U('admin/news/add');?>"><i class="icon-font">&#xe037;</i>添加新闻</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>高校管理</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('admin/university/view');?>"><i class="icon-font">&#xe017;</i>所有高校<li><a href="<?php echo U('admin/university/add');?>"><i class="icon-font">&#xe037;</i>添加高校</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>管理员管理</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('admin/root/view');?>"><i class="icon-font">&#xe017;</i>所有管理员<li><a href="<?php echo U('admin/root/add');?>"><i class="icon-font">&#xe037;</i>添加管理员</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">

        
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="./view">管理员管理</a><span class="crumb-step">&gt;</span><span>新增管理员</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="<?php echo U('admin/root/add');?>" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>管理员名称：</th>
                                <td>
                                    <input class="common-text required" id="title" name="name" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>密码：</th>
                                <td>
                                    <input class="common-text required" id="pw1" name="passwd" size="50" value="" type="password">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>确认密码：</th>
                                <td>
                                    <input class="common-text required" id="pw2" name="repasswd" size="50" value="" type="password" onblur="pw()" >
                                    <span id="tishi"></span>
                                </td>
                               
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" name="submit" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
<script type="text/javascript">
    function pw() {
              var pw1 = document.getElementById("pw1").value;
              var pw2 = document.getElementById("pw2").value;
              if(pw1 == pw2) {
                  document.getElementById("tishi").innerHTML="<font color='green'>两次密码相同</font>";
                  document.getElementById("submit").disabled = false;
              }
              else {
                  document.getElementById("tishi").innerHTML="<font color='red'>两次密码不相同</font>";
                document.getElementById("submit").disabled = true;
              }
          }
</script>
</html>
    </div>
    <!--/main-->
</div>
</body>
<script src="/Public/lib/jquery-2.1.4.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.delete').click(function(){
            var tag=confirm('是否确认删除');
            if(tag){
                //使用ajax方式删除记录
                var url = $(this).attr('href');
                var self = $(this);
                $.get(url,function(data){
                    console.log(data);
                    if(data==1){
                        //隐藏相应的行
                        self.parent().parent().children().hide();
                    }else{
                        alert('未知的错误，请联系开发者！');
                    }
                })
            }
            //阻止浏览器的默认操作
            return false;
        })
    })
</script>
</html>