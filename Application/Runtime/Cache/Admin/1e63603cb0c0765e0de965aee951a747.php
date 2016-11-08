<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title>拼图后台管理-后台管理</title>
<link rel="stylesheet" href="/Public/Admin/css/pintuer.css">
<link rel="stylesheet" href="/Public/Admin/css/admin.css">
<script src="/Public/Admin/js/jquery.js"></script>
<script src="/Public/Admin/js/pintuer.js"></script>
<script src="/Public/Admin/js/respond.js"></script>
<script src="/Public/Admin/js/admin.js"></script>
<link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
<link href="/favicon.ico" rel="bookmark icon" />
  <!--调整表单的宽度-->
  <style>
    .input{
      width:45%;
    }
  </style>
</head>

<body>
<div class="lefter">
  <div class="logo"><a href="#" target="_blank"><img src="/Public/Admin/images/logo.png" alt="后台管理系统" /></a></div>
</div>
<div class="righter nav-navicon" id="admin-nav">

  <!--公共部分-->
  
<div class="mainer">
    <div class="admin-navbar">
        <span class="float-right">
            <a class="button button-little bg-main" href="#" target="_blank">前台首页</a>
            <a class="button button-little bg-yellow" href="<?php echo U('Admin/Login/logout');?>">注销登录</a>
        </span>
        <ul class="nav nav-inline admin-nav">
            <li class="active"><a href="index.html" class="icon-home"> 开始</a>
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
  <div class="tab">
  
    <div class="tab-head"> <strong>分类设置</strong>
      <ul class="tab-nav">
        <li class="active"><a href="#tab-set">添加分类</a></li>
        <li><a href="<?php echo U('Admin/Cate/index');?>">分类显示</a></li>
      </ul>
    </div>

    <div class="tab-body"> <br />

    <!--添加内容部分-->
      <div class="tab-panel active" id="tab-set">
        <form method="post" class="form-x" action="<?php echo U('Admin/Cate/addok');?>">
          <!--分类名称-->
          <div class="form-group">
            <div class="label">
              <label for="sitename">分类名称</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="sitename" name="cate_name" size="50" placeholder="分类名称" data-validate="required:请填写你的分类名称" />
            </div>
          </div>

          <!--所属类别-->
           <div class="form-group">
            <div class="label">
              <label for="sitename">所属类别</label>
            </div>
            <div class="field">
              <select name="cate_pid">
                <option value="0">主类别</option>
                <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["cate_id"]); ?>"><?php echo (str_repeat("-",$vo["level"]*8)); echo ($vo["cate_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
              </select>
            </div>
          </div>
          
          <!--内容描述-->
          <div class="form-group">
            <div class="label">
              <label for="readme">分类描述</label>
            </div>
            <div class="field">
              <textarea class="input" rows="5" cols="50" placeholder="请填写分类说明" data-validate="required:请填写分类说明" name="cate_remark"></textarea>
            </div>
          </div>
          
          <!--排序-->
          <div class="form-group">
            <div class="label">
              <label for="siteurl">排序</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="siteurl" name="cate_order" size="50" placeholder="请填写排序" data-validate="required:请填写排序" />
            </div>
          </div>
           
           <!--添加操作-->    
          <div class="form-button">
            <button class="button bg-main" type="submit">添加</button>
            <button class="button bg-main" type="button" id="btnReset">清空内容</button>
          </div>
            <script>
              $("#btnReset").bind('click',function(){
                $("form")[0].reset();
              })
            </script>

        </form>
      </div>
      <div class="tab-panel" id="tab-email">邮件设置</div>
      <div class="tab-panel" id="tab-upload">上传设置</div>
      <div class="tab-panel" id="tab-visit">访问限制</div>
    </div>
  </div>
  <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">拼图前端框架</a>构建</p>
</div>
</body>
</html>