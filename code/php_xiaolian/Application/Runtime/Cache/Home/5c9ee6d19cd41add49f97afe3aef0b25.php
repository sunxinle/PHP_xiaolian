<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
</head>
<body>
<form action="/home/user/dologin" method="post">
    <p>
        username: <input type="text" name="username" />
    </p>
    <p>
        password: <input type="password" name="password" />
    </p>
    <p>
        <input type="submit" />
    </p>
</form>
</body>
</html>