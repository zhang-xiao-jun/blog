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
 <!-- 引入ueditor -->
 <script  src="/Public/Admin/ueditor/ueditor.config.js"></script>
  <script src="/Public/Admin/ueditor/ueditor.all.js"></script>
  <!-- 实例化编辑器 -->
  

  <!--图像上传预览-->
  <script type="text/javascript">
    //图片上传预览    IE是用了滤镜。
    function previewImage(file)
    {
      var MAXWIDTH  = 260;
      var MAXHEIGHT = 180;
      var div = document.getElementById('preview');
      if (file.files && file.files[0])
      {
        div.innerHTML ='<img id=imghead>';
        var img = document.getElementById('imghead');
        img.onload = function(){
          var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
          img.width  =  rect.width;
          img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
          img.style.marginTop = rect.top+'px';
        }
        var reader = new FileReader();
        reader.onload = function(evt){img.src = evt.target.result;}
        reader.readAsDataURL(file.files[0]);
      }
      else //兼容IE
      {
        var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
        file.select();
        var src = document.selection.createRange().text;
        div.innerHTML = '<img id=imghead>';
        var img = document.getElementById('imghead');
        img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
        var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
        status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
        div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
      }
    }
    function clacImgZoomParam( maxWidth, maxHeight, width, height ){
      var param = {top:0, left:0, width:width, height:height};
      if( width>maxWidth || height>maxHeight )
      {
        rateWidth = width / maxWidth;
        rateHeight = height / maxHeight;

        if( rateWidth > rateHeight )
        {
          param.width =  maxWidth;
          param.height = Math.round(height / rateWidth);
        }else
        {
          param.width = Math.round(width / rateHeight);
          param.height = maxHeight;
        }
      }
      param.left = Math.round((maxWidth - param.width) / 2);
      param.top = Math.round((maxHeight - param.height) / 2);
      return param;
    }

  </script>

  <!-- 调整预览图片的位置 -->
  <style>
    #preview{
      position:absolute;
      left:350px;
      top:320px;
    }
  </style>

  <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
<link href="/favicon.ico" rel="bookmark icon" />
  <!--调整表单的宽度-->

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
  <div class="tab">
  
    <div class="tab-head"> <strong>文章设置</strong>
      <ul class="tab-nav">
        <li class="active"><a href="#tab-set">添加文章</a></li>
        <li><a href="/index.php/Admin/Article/lst">文章显示</a></li>
      </ul>
    </div>

    <div class="tab-body"> <br />

    <!--添加内容部分-->
      <div class="tab-panel active" id="tab-set">
        <form method="post" class="form-x" action="/index.php/Admin/Article/edit" enctype="multipart/form-data">
          <!--1.文章标题-->
          <div class="form-group">
            <div class="label">
              <label for="sitename">文章标题</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="sitename" name="title" size="50" placeholder="标题名称" data-validate="required:请填写你的文章标题" value="<?php echo ($data["title"]); ?>"/>
            </div>
          </div>


          <!--2.所属类别-->
           <div class="form-group">
            <div class="label">
              <label for="sitename">所属类别</label>
            </div>
            <div class="field">
              <select name="pid">
                <option value="0">主类别</option>
                <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- disabled 表单不能选中 -->
                  <option value="<?php echo ($vo["cate_id"]); ?>"
                    <?php if($vo["cate_pid"] == 0): ?>disabled="disabled"<?php endif; ?>
                    <?php if($data["pid"] == $vo['cate_id']): ?>selected=selected<?php endif; ?>
                  ><?php echo (str_repeat("-",$vo["level"]*8)); echo ($vo["cate_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
              </select>
            </div>
          </div>

          <!--3.关键词-->
          <div class="form-group">
            <div class="label">
              <label for="sitename">关键词</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="sitename" name="keyword" value="<?php echo ($data["keyword"]); ?>" size="50" placeholder="关键词" data-validate="required:请填写你的文章关键词" />
            </div>
          </div>

          <!--4.是否推荐-->
          <div class="form-group">
            <div class="label">
              <label for="sitename">推荐</label>
            </div>
            <div class="field">

              <input type="radio" name="isrecommend" value="0" <?php if($data["isrecommend"] == 0): ?>checked=checked<?php endif; ?> />不推荐
              <input type="radio" naem="isrecommend" value="1" <?php if($data["isrecommend"] == 1): ?>checked=checked<?php endif; ?> />推荐
            </div>
          </div>

          <!--5.文章作者-->
          <div class="form-group">
            <div class="label">
              <label for="sitename">文章作者</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="sitename" name="author" value="<?php echo ($data["author"]); ?>" size="50" placeholder="文章作者" data-validate="required:请填写你的文章作者" />
            </div>
          </div>
          <br/><br/>


          <!-- 6.图片上传 -->
          <div class="form-group">
            <div class="label"><label for="logo">上传图片</label></div>
            <div class="field">
              <a class="button input-file" href="javascript:void(0);" >+ 浏览文件<input size="100" type="file" name="images"  onchange="previewImage(this)"  id="upload_img"/></a>
            </div>
          </div>
          <div style="padding-left:100px;"> <span><font color="red">*</font></span> 不重新上传将使用原图片 </div>
      <br/><br/><br/>

          <!--原图形和缩略图-->
          <input type="hidden" name="old_images" value="<?php echo ($data['images']); ?>" />
          <input type="hidden" name="old_thumb" value="<?php echo ($data['thumb']); ?>" />

          <div id="preview">
            <img id="imghead" width=219 height=auto border=0 src='/Public/Admin/images/addpic.png'>
          </div>

          <!--加一个点击事件-->
          <script>
            $("#imghead").bind('click',function(){
              $("#upload_img").click();
            })
          </script>


          <!--7.文章介绍-->
          <div class="form-group">
            <div class="label">
              <label for="sitename">文章介绍</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="sitename" name="introduce" value="<?php echo ($data["introduce"]); ?>" size="50" placeholder="文章介绍" data-validate="required:请填写你的文章介绍" />
            </div>
          </div>

          <!--8.内容描述-->
          <div class="form-group">
            <div class="label">
              <label for="readme">文章内容</label>
            </div>
            <div class="field">
              <script id="container" name="content" type="text/plain">
                 <?php echo ($data["content"]); ?>
              </script>
            </div>
            <!-- 实例化编辑器 -->
            <script type="text/javascript">
              var ue = UE.getEditor('container');
            </script>
          </div>
          
          <!--9.排序-->
          <div class="form-group">
            <div class="label">
              <label for="siteurl">文章排序</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="siteurl" name="orders" size="50" placeholder="请填写排序" data-validate="required:请填写排序" value="<?php echo ($data["orders"]); ?>" />
            </div>
          </div>
           
           <!--添加操作-->    
          <div class="form-button">
            <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>">
            <button class="button bg-main" type="submit">修改</button>
            <!-- reset 按钮中的重置按钮 -->
            <button class="button bg-main" type="reset" id="btnReset">清空内容</button>
          </div>


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