<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bootstrap</title>
    <!-- Bootstrap -->
    <link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--http://www.bootcss.com/-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/Public/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/Public/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<nav>
    <?php echo ($pages); ?>
</nav>
<nav>
    <?php echo ($pages2); ?>
</nav>
<!--<nav>-->
    <!--<ul class="pagination">-->
        <!--<li><a href="#">&laquo;</a></li>-->
        <!--<li><a href="#">1</a></li>-->
        <!--<li><a href="#">2</a></li>-->
        <!--<li class="active"><a href="#">3</a></li>-->
        <!--<li><a href="#">4</a></li>-->
        <!--<li><a href="#">5</a></li>-->
        <!--<li><a href="#">&raquo;</a></li>-->
    <!--</ul>-->
<!--</nav>-->
</body>
</html>