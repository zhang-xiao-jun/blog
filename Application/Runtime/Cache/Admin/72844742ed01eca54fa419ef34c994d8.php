<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
                window.location.href = "/index.php/Admin/Article/add";
             })

            //删除多条的操作
            $("#btndel").bind('click',function(){
                //得到选中的id
                var che = $(":checkbox:checked");
                if(che.length == 0){
                    alert('请选择要删除的元素');
                }  else {
                    var res =   window.confirm("您确认把记录放入回收站吗?");
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
                    window.location.href="/index.php/Admin/Article/del/id/"+id;
                }
            })

        })

        //ajax实现推荐与不推荐的修改
        function change_it(who,id,field){
            //得到该记录的src
            var src = $(who).attr('src');
            //判断是 no.gif 还是yes.gif  src.indexOf()判断字符串中是否含有某个子字符串

            var value = 0;
            if(src.indexOf('yes.gif') == -1){ //不含yes.gif,即为no.gif
                 value = 0;
            }   else {
                 value = 1;
            }

            var data = {
                id:id,
                value:value,
                field:field,
                _:new Date().getTime()

            }
            //编写ajax请求
            $.get('/index.php/Admin/Article/change_recom',data,function(msg){
                  if(msg == 0){  //修改成功
                      if(value == 0){  //no.gif -> yes.gif
                           srcs = src.replace('no.gif','yes.gif');
                      } else {
                           srcs = src.replace('yes.gif','no.gif');
                      }
                      $(who).attr('src',srcs);
                  }
            });
        }
    </script>

    <!--分页样式-->
    <style>
        .pages a,.pages span {
            display:inline-block;
            padding:2px 5px;
            margin:0 1px;
            border:1px solid #f0f0f0;
            -webkit-border-radius:3px;
            -moz-border-radius:3px;
            border-radius:3px;
        }
        .pages a,.pages li {
            display:inline-block;
            list-style: none;
            text-decoration:none; color:#58A0D3;
        }
        .pages a.first,.pages a.prev,.pages a.next,.pages a.end{
            margin:0;
        }
        .pages a:hover{
            border-color:#50A8E6;
        }
        .pages span.current{
            background:#50A8E6;
            color:#FFF;
            font-weight:700;
            border-color:#50A8E6;
        }

    </style>


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
        <div class="tab-head"> <strong>文章设置</strong>
            <ul class="tab-nav">
                <li ><a href="<?php echo U('Admin/Article/add');?>">添加文章</a></li>
                <li class="active" ><a href="<?php echo U('Admin/Article/lst');?>">文章显示</a></li>
            </ul>
        </div>
        <div class="tab-body">
    </div>

	<form method="post" >
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
                <th width="100">文章标题</th>
                <th width="100">所属类别</th>
                <th width="100">关键词</th>
                <th width="200">是否推荐</th>
                <th width="100">作者</th>
                <th width="*">介绍</th>
                <th width="60">点击量</th>
                <th width="60">评论量</th>
                <th width="100">操作</th>
            </tr>

            <?php if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
                    <td><input type="checkbox" name="id[]" value="<?php echo ($vo["id"]); ?>" /></td>
                    <td><?php echo ($k+$offset); ?></td>
                    <td>
                        <?php echo ($vo["title"]); ?>
                    </td>
                    <td><?php echo ($vo["cate_name"]); ?></td>
                    <td><?php echo ($vo["keyword"]); ?></td>
                    <td>
                      <img src="/Public/Admin/images/<?php if($vo["isrecommend"] == 0): ?>no<?php else: ?>yes<?php endif; ?>.gif" onclick="change_it(this,<?php echo ($vo["id"]); ?>,'isrecommend')" style="cursor:pointer">
                    </td>
                    <td><?php echo ($vo["author"]); ?></td>
                    <td><?php echo ($vo["introduce"]); ?></td>
                    <td><?php echo ($vo["hits"]); ?></td>
                    <td><?php echo ($vo["comments"]); ?></td>
                    <td>
                        <a class="button border-blue button-little" href="/index.php/Admin/Article/edit/id/<?php echo ($vo["id"]); ?>" >修改</a>
                        <a class="button border-yellow button-little" href="/index.php/Admin/Article/del/id/<?php echo ($vo["id"]); ?>" onclick="return confirm('您确认将该记录放入回收站吗？')">删除</a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
           
        </table>

        <div  class="pages" style="float:right;">
            <?php echo ($pageStr); ?>
        </div>
        <div style="clear:both"></div>

    </div>
    </form>
    <br />
    <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">拼图前端框架</a>构建</p>
</div>

</body>
</html>