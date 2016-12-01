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
                <li><a href="<?php echo U('home/user/logout');?>">退出</a></li>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">所有新闻</span></div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="<?php echo U('admin/news/add');?>"><i class="icon-font"></i>新增新闻</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>ID</th>
                            <th>标题</th>
                            <th>发布时间</th>
                            <th>操作</th>
                        </tr>

                        <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                                <td><?php echo ($vo["tlid"]); ?></td>
                                <td><a target="_blank" href="<?php echo U('admin/news/show',array('id'=>$vo['tlid']));?>" title="<?php echo ($vo["tltitle"]); ?>"><?php echo (msubstr($vo["tltitle"],0,10)); ?> </a>
                                </td>
                                <td><?php echo ($vo["tladdtime"]); ?></td>
                                <td>
                                    <a class="link-update" href="<?php echo U('admin/news/update',array('id'=>$vo['tlid']));?>">修改</a>
                                    <a class="link-del delete" href="<?php echo U('admin/news/delete',array('id'=>$vo['tlid']));?>">删除</a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                    </table>
                    <div class="list-page"> 2 条 1/1 页</div>
                </div>
            </form>
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