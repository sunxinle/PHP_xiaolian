<?php
return array(
	 'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'php_xiaolian',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '',          // 密码
    'DB_PORT'               =>  '3306',      // 端口
    'DB_PREFIX'             =>  '',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数    
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE'        =>  0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE'        =>  false,       // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM'         =>  1, // 读写分离后 主服务器数量
    'DB_SLAVE_NO'           =>  '', // 指定从服务器序号

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