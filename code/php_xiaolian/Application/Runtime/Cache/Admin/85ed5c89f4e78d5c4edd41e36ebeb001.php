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

            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">

        
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="allNewses.html">新闻管理</a><span class="crumb-step">&gt;</span><span>更新新闻</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="<?php echo U('admin/news/update');?>" method="post" enctype= "multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>标题：</th>
                                <td>
                                    <input class="common-text required" id="title" name="title" size="50" value="<?php echo ($result['tltitle']); ?>" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>内容：</th>
                                <td><textarea name="content" class="common-textarea" id="content" cols="30" style="width: 98%;" rows="10"><?php echo ($result['tlcontent']); ?></textarea></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input type="hidden" name="id" value="<?php echo ($result['tlid']); ?>">
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
<script src="/Public/lib/jquery-2.1.4.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.delete').click(function(){
            var tag=confirm('是够确认删除');
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