<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>杨青个人博客网站—一个站在web前段设计之路的女技术员个人博客网站</title>
    <meta name="keywords" content="个人博客" />
    <meta name="description" content="个人博客" />
    <link href="/Public/Home/css/base.css" rel="stylesheet">
    <link href="/Public/Home/css/new.css" rel="stylesheet">
    <style type='text/css'>
        .about {min-height:500px;}
        form .input {width:250px; height:30px; border:1px #ccc solid;}
        form .btn {width:70px; height:30px;}
        form textarea {resize:none;}
        form dl dt {width:80px; text-align:left; float:left;}
        form dl dd {vertical-align:middle; margin-bottom:20px;}
        #preview{width:219px;height:131px;border:1px solid #fff;overflow:hidden;}
        #imghead {filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=image);}
    </style>
    <!--[if lt IE 9]>
    <script src="/Public/Home/js/modernizr.js"></script>
    <![endif]-->
    <script src="/Public/Home/js/jquery.js"></script>
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
</head>
<body>
<header>
    <div id="logo"><a href="/"></a></div>
    <nav class="topnav" id="topnav"><a href="/"><span>首页</span><span class="en">Protal</span></a><a href="about.html"><span>关于我</span><span class="en">About</span></a><a href="newlist.html"><span>慢生活</span><span class="en">Life</span></a><a href="moodlist.html"><span>碎言碎语</span><span class="en">Doing</span></a><a href="share.html"><span>模板分享</span><span class="en">Share</span></a><a href="knowledge.html"><span>学无止境</span><span class="en">Learn</span></a><a href="6"><span>留言版</span><span class="en">Gustbook</span></a></nav>
    </nav>
</header>
<article class="blogs">
    <h1 class="t_nav"><span>您当前的位置：<a href="/index.html">首页</a>&nbsp;&gt;&nbsp;<a href="/news/s/">注册会员</a>&nbsp;&nbsp;<a href="/news/s/"><?php echo ($sort); ?></a>
    </span><a href="/" class="n1">网站首页</a><a href="/" class="n2">注册会员</a></h1>
    <br/><br/>

    <div class="index_about">
        <div class="about">
        <form action="/index.php/Home/Register/doRegister" method="post" enctype="multipart/form-data">
            <dl>
                <dt>用 户 名：</dt>
                <dd><input class="input" type="text" name="username" /><span id="usernameSpan"> *  请填写您的用户名</span></dd>
                <dt>密　　码：</dt>
                <dd><input class="input" type="password" name="password" /><span id="passwordSpan"> * 请填写您的密码</span></dd>
                <dt>确认密码：</dt>
                <dd><input class="input" type="password" name="repassword" /><span id="repasswordSpan"> * 请填写您的确认密码</span></dd>
                <dt>头　　像：</dt>
                <dd><input type="file" name="img" onchange="previewImage(this)" id="img"/></dd>
                <div id="preview" style="margin-left:78px">
                    <img id="imghead" width=100% height=auto border=0 src='/Public/Home/images/addpic.png'>
                </div>
                <script type="text/javascript">
                    $("#imghead").bind('click',function(){
                        $("#img").click();
                    })
                </script>
                <br/>
                <dt>备　　注：</dt>
                <dd>
                    <textarea name="remarks" cols='40' rows='6' placeholder='你需要一个伟大的个性签名'></textarea>
                </dd>
                <div style="clear:both;"></div>
                <dd>
                    <input style='margin-left:78px;' class="btn" type="submit" name="submit" value="注册" />
                    <input class="btn" type="reset" name="reset" value="重置" />
                </dd>
            </dl>
        </form>
        </div>

    </div>
    <aside class="right">
        <!-- Baidu Button BEGIN -->
        <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
        <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script>
        <script type="text/javascript" id="bdshell_js"></script>
        <script type="text/javascript">
            document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static//Public/Home/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
        </script>
        <!-- Baidu Button END -->
        <div class="blank"></div>
        <div class="news">
            <h3>
    <p>最新<span>文章</span></p>
</h3>
<ul class="rank">
    <?php if(is_array($new_article)): $i = 0; $__LIST__ = $new_article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new_vo): $mod = ($i % 2 );++$i;?><li><a href="index.php/Home/Article/lst/id/<?php echo ($new_vo["id"]); ?>" title="Column 三栏布局 个人网站模板" target="_blank"><?php echo ($new_vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>

<!--点击排行-->
<h3 class="ph">
    <p>点击<span>排行</span></p>
</h3>
<ul class="paih">
    <?php if(is_array($hits_article)): $i = 0; $__LIST__ = $hits_article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hits_vo): $mod = ($i % 2 );++$i;?><li><a href="index.php/Home/Article/lst/id/<?php echo ($hits_vo["id"]); ?>" title="Column 三栏布局 个人网站模板" target="_blank"><?php echo ($hits_vo["title"]); ?>(<?php echo ($hits+10); ?>)</a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
        </div>
        <div class="visitors">
            <h3>
                <p>最近访客</p>
            </h3>
            <ul>
            </ul>
        </div>
    </aside>
</article>
<footer>
    <p>Design by DanceSmile <a href="http://www.mycodes.net/" title="源码之家" target="_blank"></a> <a href="/">网站统计</a></p>
</footer>
<script src="/Public/Home/js/silder.js"></script>
<script type="text/javascript">
    //获取用户名，判断用户名是否为空，是否可用
    var username = $("input[name='username']");
    username.bind('blur',function(){
        var usernameVal = username.val();
        if(usernameVal == ''){
            $("#usernameSpan").html("<font color='red'> * 用户名不能为空</font>");
        }
        //发送ajax请求
        var data = {
          username:usernameVal
        };
        $.post("/index.php/Home/Register/chkUsername",data,function(msg){
            if(msg == 1){
                $("#usernameSpan").html("<font color='red'> * 用户名已经存在，请换一个用户名</font>");
            }
        })
    })
    //判断密码是否为空，长度是否是5-18位
    var password = $("input[name='password']");
    password.bind('blur',function(){
        var passwordVal = password.val();
        var passwordLength = passwordVal.length;
        if(passwordVal == ''){
            $("#passwordSpan").html("<font color='red'> * 密码不能为空</font>");
        }
        if(passwordLength < 5 || passwordLength > 18){
            $("#passwordSpan").html("<font color='red'> * 密码长度必须是5-18位</font>");
        }
    })
    //判断两次输入的密码是否一致
    var repassword = $("input[name='repassword']");
    repassword.bind('blur',function(){
        var passwordVal = password.val();
        var repasswordVal  = repassword.val();
        if(repasswordVal !== passwordVal){
            $("#repasswordSpan").html("<font color='red'> * 两次输入的密码不一致</font>");
        }
    })
</script>
</body>
</html>