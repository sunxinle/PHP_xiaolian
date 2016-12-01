<?php
/**
 * Created by PhpStorm.
 * User: 家牧
 * Date: 2016/11/30
 * Time: 19:43
 */
return array(
    /* 数据库设置 */
    'DB_TYPE'                => 'mysql', // 数据库类型
    'DB_HOST'                => 'localhost', // 服务器地址
    'DB_NAME'                => 'php_xiaolian', // 数据库名
    'DB_USER'                => 'root', // 用户名
    'DB_PWD'                 => '', // 密码
    'DB_PORT'                => '3306', // 端口
    'DB_PREFIX'              => 'xl_', // 数据库表前缀


    /* 默认设定 */
    'DEFAULT_M_LAYER'        => 'Model', // 默认的模型层名称
    'DEFAULT_C_LAYER'        => 'Controller', // 默认的控制器层名称
    'DEFAULT_V_LAYER'        => 'View', // 默认的视图层名称
    'DEFAULT_LANG'           => 'zh-cn', // 默认语言
    'DEFAULT_THEME'          => '', // 默认模板主题名称
    'DEFAULT_MODULE'         => 'Admin', // 默认模块
    'DEFAULT_CONTROLLER'     => 'News', // 默认控制器名称
    'DEFAULT_ACTION'         => 'view', // 默认操作名称
    'DEFAULT_CHARSET'        => 'utf-8', // 默认输出编码
    'DEFAULT_TIMEZONE'       => 'PRC', // 默认时区
    'DEFAULT_AJAX_RETURN'    => 'JSON', // 默认AJAX 数据返回格式,可选JSON XML ...
    'DEFAULT_JSONP_HANDLER'  => 'jsonpReturn', // 默认JSONP格式返回的处理方法
    'DEFAULT_FILTER'         => 'htmlspecialchars', // 默认参数过滤方法 用于I函数...

    /*layout视图*/
    'TMPL_LAYOUT_ITEM'       => '{__CONTENT__}', // 布局模板的内容替换标识
    'LAYOUT_ON'              => true, // 是否启用布局
    'LAYOUT_NAME'            => 'layout', // 当前布局名称 默认为layout

);