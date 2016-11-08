<?php
/**
 * 入口文件
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/28
 * Time: 16:54
 */
    //1.设置响应头
    header("content-type:text/html;charset=utf-8");

    //2.定义入口应用文件
    define("APP_PATH","./Application/");

    //3.开启debug调试功能
    define("APP_DEBUG",true);

    //3.载入框架入口文件
    include "./ThinkPHP/ThinkPHP.php";