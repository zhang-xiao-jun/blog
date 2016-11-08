<?php
return array(
	//'配置项'=>'配置值'

    /* URL设置 */
    'URL_CASE_INSENSITIVE'  =>  true,   // 默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'             =>  1,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式

    //默认设置
    'DEFAULT_MODULE'        =>  'Home',  // 默认模块
    'DEFAULT_CONTROLLER'    =>  'Index', // 默认控制器名称
    'DEFAULT_ACTION'        =>  'index', // 默认操作名称

    //设置允许访问的文件夹
    'MODULE_ALLOW_LIST'      =>  array('Admin','Home'),

    //自定义路径常量
    'TMPL_PARSE_STRING' => array(
        //模版常量名称 => 模版常量的值
        '__ADMIN__' => '/Public/Admin',
    ),

    //开启代码追踪
    'SHOW_PAGE_TRACE' => true,

     /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'blogagain',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'blogag_',    // 数据库表前缀
);