<?php
return array(
    /* 数据库设置 */
    'DB_TYPE'                => 'mysql', // 数据库类型
    'DB_HOST'                => 'localhost', // 服务器地址
    'DB_NAME'                => 'php_xiaolian', // 数据库名
    'DB_USER'                => 'root', // 用户名
    'DB_PWD'                 => '', // 密码
    'DB_PORT'                => '3306', // 端口
    'DB_PREFIX'              => '', // 数据库表前缀

    // RBAC相关配置项
    'USER_AUTH_ON'  => true,
    'USER_AUTH_TYPE'    =>  1,  // 登录后，把用户的权限信息写入到session中默认认证类型1.登录认证2.实时认证
    'USER_AUTH_KEY' =>  'authid',   // $_SESSION['authid'] = ***;用户认证session标记
    'REQUIRE_AUTH_MODULE'   =>  'Admin,Ttt',
    'NOT_AUTH_MODULE'   =>  'Home',               //默认无需认证模块
    'USER_AUTH_GATEWAY' =>  '/Home/user/index',  // 默认认证网关
    'USER_AUTH_MODEL'   =>  'think_user',   // 用户表的数据表名或模型类名  默认验证数据表模型
    'RBAC_ROLE_TABLE'   =>  'think_role',     //用户表
    'RBAC_USER_TABLE'   =>  'think_role_user',  // 角色用户关联表的名称
    'RBAC_ACCESS_TABLE' =>  'think_access',     // 角色权限关联表
    'RBAC_NODE_TABLE'   =>  'think_node',
    'GUEST_AUTH_ON'     =>  false,   // 是否允许游客访问
    'GUEST_AUTH_ID'     =>  0,      // 游客的用户表id值
);