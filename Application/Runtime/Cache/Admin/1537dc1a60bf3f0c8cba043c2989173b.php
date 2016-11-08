<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理-分类信息显示表</title>
    <link rel="stylesheet" href="/Public/Admin/css/pintuer.css">
    <link rel="stylesheet" href="/Public/Admin/css/admin.css">
    <script src="/Public/Admin/js/jquery.js"></script>
    <script src="/Public/Admin/js/pintuer.js"></script>
    <script src="/Public/Admin/js/respond.js"></script>
    <script src="/Public/Admin/js/admin.js"></script>
    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
    <link href="/favicon.ico" rel="bookmark icon" />
    <script>
        $(function(){
            //添加操作
             $("#btnadd").bind('click',function(){
                window.location.href = "/index.php/Admin/Cate/add";
             })

            //删除多条的操作
            $("#btndel").bind('click',function(){
                //得到选中的id
                var che = $(":checkbox:checked");
                if(che.length == 0){
                    alert('请选择要删除的元素');
                }  else {
                    var res =   window.confirm("您确认删除吗?");
                    //如果点 取消 返回不执行删除操作
                    if(!res){
                        return;
                    }
                   //定义数组来接收删除的元素
                    var id = new Array();
                    for(var i = 0;i<che.length;i++){
                        //把jquery对象转化为dom对象
                        id[i] = che[i].value;
                    }
                    var id = id.toString();
                    window.location.href="/index.php/Admin/Cate/delAll/id/"+id;
                }
            })
        })
    </script>
</head>

<body>
<div class="lefter">
    <div class="logo"><a href="#" target="_blank"><img src="/Public/Admin/images/logo.png" alt="后台管理系统" /></a></div>
</div>
<div class="righter nav-navicon" id="admin-nav">

    <!--引入公共部分-->
    
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
        <div class="tab-head"> <strong>分类设置</strong>
            <ul class="tab-nav">
                <li ><a href="<?php echo U('Admin/Cate/add');?>">添加分类</a></li>
                <li class="active"><a>分类显示</a></li>
            </ul>
        </div>
        <div class="tab-body">
    </div>

	<form method="post">
    <div class="panel admin-panel">
    	<div class="panel-head"><strong>内容列表</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="id[]" value="全选" />
            <input type="button" class="button button-small border-green"  value="添加文章" id="btnadd" />
            <input type="button" class="button button-small border-yellow" value="批量删除" id="btndel"/>
            <input type="button" class="button button-small border-blue"   value="回收站" />
        </div>

        <!--列表list显示界面-->
        <table class="table table-hover">
        	<tr>
                <th width="100">选择</th>
                <th width="60">排序</th>
                <th width="200">分类名称</th>
                <th width="100">所属类别</th>
                <th width="*">分类描述</th>
                <th width="200">分类时间</th>
                <th width="100">操作</th>
            </tr>

            <?php if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
                    <td><input type="checkbox" name="id[]" value="<?php echo ($vo["cate_id"]); ?>" /></td>
                    <td><?php echo ($k); ?></td>
                    <td>
                        <?php echo (str_repeat("-",$vo["level"]*8)); echo ($vo["cate_name"]); ?>
                    </td>
                    <td>
                        <?php echo ($vo["name"]); ?>
                    </td>
                    <td><?php echo ($vo["cate_remark"]); ?></td>
                    <td><?php echo (date("Y-m-d",$vo["cate_addtime"])); ?></td>
                    <td>
                        <a class="button border-blue button-little" href="/index.php/Admin/Cate/edit/id/<?php echo ($vo["cate_id"]); ?>" >修改</a>
                        <a class="button border-yellow button-little" href="/index.php/Admin/Cate/delOne/id/<?php echo ($vo["cate_id"]); ?>" onclick="return confirm('您确认删除该记录吗？')">删除</a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
           
        </table>

    </div>
    </form>
    <br />
    <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">拼图前端框架</a>构建</p>
</div>

</body>
</html>