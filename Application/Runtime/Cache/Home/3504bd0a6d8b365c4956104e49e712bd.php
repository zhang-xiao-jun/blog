<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>张俊个人博客</title>
    <meta name="keywords" content="个人博客" />
    <meta name="description" content="" />
    <link href="/Public/Home/css/base.css" rel="stylesheet">
    <link href="/Public/Home/css/style.css" rel="stylesheet">
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
            text-decoration:none; color:#5EA51B;
        }
        .pages a.first,.pages a.prev,.pages a.next,.pages a.end{
            margin:0;
        }
        .pages a:hover{
            border-color:#5EA51B;
        }
        .pages span.current{
            background:#5EA51B;
            color:#FFF;
            font-weight:bolder;
            border-color:#5EA51B;
        }
    </style>
    <!--[if lt IE 9]>
    <script src="/Public/Home/js/modernizr.js"></script>
    <![endif]-->
</head>
<body>
<header>
    <div id="logo"><a href="/"></a></div>
    <nav class="topnav" id="topnav"><a href="index.html"><span>首页</span><span class="en">Protal</span></a><a href="about.html"><span>关于我</span><span class="en">About</span></a><a href="newlist.html"><span>慢生活</span><span class="en">Life</span></a><a href="moodlist.html"><span>碎言碎语</span><span class="en">Doing</span></a><a href="share.html"><span>模板分享</span><span class="en">Share</span></a><a href="knowledge.html"><span>学无止境</span><span class="en">Learn</span></a><a href="book.html"><span>留言版</span><span class="en">Gustbook</span></a></nav>
    </nav>
</header>
<article class="blogs">
    <h1 class="t_nav"><span>“慢生活”不是懒惰，放慢速度不是拖延时间，而是让我们在生活中寻找到平衡。</span><a href="/" class="n1">网站首页</a><a href="" class="n2"><?php echo ($cateDatas['cate_name']); ?></a></h1>
    <div class="newblog left">
        <?php if(is_array($articleData)): $i = 0; $__LIST__ = $articleData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$articleVo): $mod = ($i % 2 );++$i;?><h2><?php echo ($articleVo["title"]); ?></h2>
        <p class="dateview"><span>发布时间：<?php echo (date("Y-m-d",$articleVo["addtime"])); ?></span><span>作者：<?php echo ($articleVo["author"]); ?></span><span>分类：[<a href="/news/life/"><?php echo ($articleVo["pid"]); ?></a>]</span></p>
        <ul class="nlist">
            <span><b><?php echo ($articleVo["introduce"]); ?>...</b><a title="/" href="/" target="_blank">[ <font color="green">阅读全文</font> ]</a></span>
        </ul>
        <div class="line"></div><?php endforeach; endif; else: echo "" ;endif; ?>

        <div class="blank"></div>

        <div class="pages"><?php echo ($page); ?></div>
    </div>
    <aside class="right">
        <div class="rnav">
            <ul>
                <?php if(is_array($otherCataData)): $k = 0; $__LIST__ = $otherCataData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li class="rnav<?php echo ($k); ?>"><a href="/index.php/Home/ArticleList/lst/id/<?php echo ($vo["cate_id"]); ?>" ><?php echo ($vo["cate_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>

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

        <div class="visitors">
            <h3><p>最近访客</p></h3>
            <ul>

            </ul>
        </div>
        <!-- Baidu Button BEGIN -->
        <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
        <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script>
        <script type="text/javascript" id="bdshell_js"></script>
        <script type="text/javascript">
            document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static//Public/Home/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
        </script>
        <!-- Baidu Button END -->
    </aside>
</article>
<footer>
    <p>Design by DanceSmile <a href="http://www.mycodes.net/" title="源码之家" target="_blank">源码之家</a> <a href="/">网站统计</a></p>
</footer>
<script src="/Public/Home/js/silder.js"></script>
</body>
</html>