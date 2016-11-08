<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title>后台管理首页</title>
<link rel="stylesheet" href="/Public/Admin/css/pintuer.css">
<link rel="stylesheet" href="/Public/Admin/css/admin.css">
<script src="/Public/Admin/js/jquery.js"></script>
<script src="/Public/Admin/js/pintuer.js"></script>
<script src="/Public/Admin/js/respond.js"></script>
<script src="/Public/Admin/js/admin.js"></script>
<link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
<link href="/favicon.ico" rel="bookmark icon" />
</head>

<body>
<div class="lefter">
  <div class="logo"><a href="#" target="_blank"><img src="/Public/Admin/images/logo.png" alt="后台管理系统" /></a></div>
</div>
<div class="righter nav-navicon" id="admin-nav">

    <!--公共部分-->
    <!--xml 语法严格 必须在结尾加 / -->
    
<div class="mainer">
    <div class="admin-navbar">
        <span class="float-right">
            <a class="button button-little bg-main" href="#" target="_blank">前台首页</a>
            <a class="button button-little bg-yellow" href="<?php echo U('Admin/Login/logout');?>">注销登录</a>
        </span>
        <ul class="nav nav-inline admin-nav">
            <li class="active"><a href="<?php echo U('Admin/Index/index');?>" class="icon-home"> 开始</a>
                <ul>
                    <li><a href="system.html">系统设置</a></li>
                    <li><a href="content.html">内容管理</a></li>
                    <li><a href="#">订单管理</a></li>
                    <li class="active"><a href="#">会员管理</a></li>
                    <li><a href="#">文件管理</a></li>
                    <li><a href="#">栏目管理</a></li>
                </ul>
            </li>
            <li><a href="<?php echo U('Admin/Cate/index');?>" class="icon-cog"> 分类管理</a>
                <ul>
                    <li><a href="#">添加分类</a></li>
                    <li class="active"><a href="#">显示分类</a></li>
                </ul>
            </li>
            <li><a href="<?php echo U('Admin/Article/lst');?>" class="icon-file-text"> 文章界面</a>
                <ul>
                    <li><a href="<?php echo U('Admin/Article/add');?>">添加文章</a></li>
                    <li class="active"><a href="<?php echo U('Admin/Article/lst');?>">文章列表</a></li>
                </ul>
            </li>
            <li><a href="#" class="icon-shopping-cart"> 订单</a></li>
            <li><a href="#" class="icon-user"> 会员</a></li>
            <li><a href="#" class="icon-file"> 文件</a></li>
            <li><a href="#" class="icon-th-list"> 栏目</a></li>
        </ul>
    </div>
    <div class="admin-bread"> <span>您好，<?php echo ($admin_name); ?>，欢迎您的光临。</span>
        <ul class="bread">
            <li><a href="index.html" class="icon-home"> 开始</a></li>
            <li>后台首页</li>
        </ul>
    </div>
</div>

</div>
<div class="admin">
  <div class="line-big">
    <div class="xm3">
      <div class="panel border-back">
        <div class="panel-body text-center"> <img src="/Public/Admin/images/face.jpg" width="120" class="radius-circle" /><br />
          admin </div>
        <div class="panel-foot bg-back border-back">您好，<?php echo ($admin_name); ?>，这是您第<?php echo ($data["num"]); ?>次登录，上次登录为<?php echo (date("Y-m-d",$data["prev_login"])); ?>。</div>
      </div>
      <br />
      <div class="panel">
        <div class="panel-head"><strong>站点统计</strong></div>
        <ul class="list-group">
          <li><span class="float-right badge bg-red">88</span><span class="icon-user"></span> 会员</li>
          <li><span class="float-right badge bg-main">828</span><span class="icon-file"></span> 文件</li>
          <li><span class="float-right badge bg-main">828</span><span class="icon-shopping-cart"></span> 订单</li>
          <li><span class="float-right badge bg-main">828</span><span class="icon-file-text"></span> 内容</li>
          <li><span class="float-right badge bg-main">828</span><span class="icon-database"></span> 数据库</li>
        </ul>
      </div>
      <br />
    </div>
    <div class="xm9">
      <div class="alert alert-yellow"><span class="close"></span><strong>注意：</strong>您有5条未读信息，<a href="#">点击查看</a>。</div>
      <div class="alert">
        <h4>拼图前端框架介绍</h4>
        <p class="text-gray padding-top">拼图是优秀的响应式前端CSS框架，国内前端框架先驱及领导者，自动适应手机、平板、电脑等设备，让前端开发像游戏般快乐、简单、灵活、便捷。</p>
          <a target="_blank" class="button bg-dot icon-code" href="#"> 下载示例代码</a>
          <a target="_blank" class="button bg-main icon-download" href="#"> 下载拼图框架</a>
          <a target="_blank" class="button border-main icon-file" href="#"> 拼图使用教程</a>
      </div>
      <div class="panel">
        <div class="panel-head"><strong>系统信息</strong></div>
        <table class="table">
          <tr>
            <th colspan="2">服务器信息</th>
            <th colspan="2">系统信息</th>
          </tr>
          <tr>
            <td width="110" align="right">操作系统：</td>
            <td>Windows 2008</td>
            <td width="90" align="right">系统开发：</td>
            <td><a href="#" target="_blank">拼图前端框架</a></td>
          </tr>
          <tr>
            <td align="right">Web服务器：</td>
            <td>Apache</td>
            <td align="right">主页：</td>
            <td><a href="#" target="_blank">#</a></td>
          </tr>
          <tr>
            <td align="right">程序语言：</td>
            <td>PHP</td>
            <td align="right">演示：</td>
            <td><a href="#" target="_blank">http://demo.pintuer.com</a></td>
          </tr>
          <tr>
            <td align="right">数据库：</td>
            <td>MySQL</td>
            <td align="right">群交流：</td>
            <td><a>201916085</a> (点击加入)</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">拼图前端框架</a>构建   来源:<a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
  <div class="clearfix text-center"> <a class="button button-big bg-main badge-corner" href="#" target="_blank">拼图最美中文后台-后翘<span class="badge bg-red">会员</span></a> <br />
    <br />
    <a href="#" target="_blank"><img src="/Public/Admin/images/index.jpg" class="img-responsive" alt="会员版-登录" /></a><br />
    <a href="#" target="_blank"><img src="/Public/Admin/images/login.jpg" class="img-responsive" alt="会员版-首页" /></a> </div>
  <br />
</div>
</body>
</html>