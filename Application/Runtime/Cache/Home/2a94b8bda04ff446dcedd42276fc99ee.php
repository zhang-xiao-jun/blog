<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>张俊个人博客</title>
  <meta name="keywords" content="个人博客模板,博客模板" />
  <meta name="description" content="寻梦主题的个人博客模板，优雅、稳重、大气,低调。" />
  <link href="/Public/Home/css/base.css" rel="stylesheet">
  <link href="/Public/Home/css/index.css" rel="stylesheet">
  <!--[if lt IE 9]>
  <script src="/Public/Home/js/modernizr.js"></script>
  <![endif]-->
  <style>
     .cloud  li  {
      width:150px;  margin-left:12px;  display:inline-block;  border-radius:8px;  margin-top:10px;  text-align:center;
    }
     .cloud  li a {
      color : #fff;
    }
    .cloud  li:nth-child(8n-7) { background: #8A9B0F }
    .cloud  li:nth-child(8n-6) { background: #EB6841 }
    .cloud  li:nth-child(8n-5) { background: #3FB8AF }
    .cloud  li:nth-child(8n-4) { background: #FE4365 }
    .cloud  li:nth-child(8n-3) { background: #FC9D9A }
    .cloud  li:nth-child(8n-2) { background: #EDC951 }
    .cloud  li:nth-child(8n-1) { background: #C8C8A9 }
    .cloud  li:nth-child(8n) { background: #83AF9B }
    .cloud  li:first-child { background: #036564 }
    .cloud  li:last-child { background: #3299BB }
    .cloud  li:hover { border-radius: 0; text-shadow: #000 1px 1px 1px }
  </style>
</head>
<body>
<header>
  <div id="logo"><a href="/"></a></div>
  <nav class="topnav" id="topnav"><a href="index.html"><span>首页</span>
    <span class="en">Protal</span></a><a href="about.html"><span>关于我</span>
    <span class="en">About</span></a><a href="newlist.html"><span>慢生活</span>
    <span class="en">Life</span></a><a href="moodlist.html"><span>碎言碎语</span>
    <span class="en">Doing</span></a><a href="share.html"><span>模板分享</span>
    <span class="en">Share</span></a><a href="knowledge.html"><span>学无止境</span>
    <span class="en">Learn</span></a><a href="book.html"><span>留言版</span>
    <span class="en">Gustbook</span></a></nav>
  </nav>
</header>
<div class="banner">
  <section class="box">
    <ul class="texts">
      <p>灾难总是接踵而至，这正是世间的常理。</p>
      <p>只要解释一下，就有谁会来救你吗？</p>
      <p>要是死了，就只能说明我不过是如此程度的男人。</p>
    </ul>
    <div class="avatar"><a href="#"><span>zhangjun</span></a> </div>
  </section>
</div>

<article>
  <h2 class="title_tj">
    <p>文章<span>推荐</span></p>
  </h2>

  <div class="bloglist left">
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><h3><?php echo ($vo["title"]); ?></h3>
    <figure><img src="/Public/Uploads/Article/<?php echo ($vo["thumb"]); ?>"></figure>
    <ul>
      <p><a href="index.php/Home/Article/lst/id/<?php echo ($vo["id"]); ?>" style="cursor:pointer;"><?php echo ($vo["introduce"]); ?>...</a></p>
      <a  href="index.php/Home/Article/lst/id/<?php echo ($vo["id"]); ?>" target="_blank" class="readmore">阅读全文>></a>
    </ul>
    <p class="dateview">
      <span>发布时间：<?php echo (date("Y-m-d",$vo["addtime"])); ?></span>
      <span>作者：<?php echo ($vo["author"]); ?></span>
      <span>个人博客：[<a href="/news/life/"><?php echo ($vo["cate_name"]); ?></a>]</span>
    </p><?php endforeach; endif; else: echo "" ;endif; ?>
  </div>

  <aside class="right">
    <div class="weather">
      <iframe width="250" scrolling="no" height="60" frameborder="0" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&id=12&icon=1&num=1">
      </iframe>
    </div>
    <div class="news">

      <!--最新文章 与 点击排行 外部引入-->
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

      <!--标签云-->
      <h3>
        <p>标签<span>云</span></p>
      </h3>
      <ul class = "cloud">
        <?php if(is_array($cateData)): $i = 0; $__LIST__ = $cateData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cateVo): $mod = ($i % 2 );++$i;?><li><a href="/"><font size="3"><?php echo ($cateVo["cate_name"]); ?>()</font></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>

      <!-- 友情链接 -->
      <h3 class="links">
        <p>友情<span>链接</span></p>
      </h3>
      <ul class="website">
        <li><a href="/">个人博客</a></li>
        <li><a href="/">谢泽文个人博客</a></li>
        <li><a href="/">3DST技术网</a></li>
        <li><a href="/">思衡网络</a></li>
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
    <a href="/" class="weixin"> </a>
  </aside>
</article>
<footer>
  <p>Design by DanceSmile <a href="http://www.mycodes.net/" title="源码之家" target="_blank">源码之家</a> <a href="/">网站统计</a></p>
</footer>
<script src="/Public/Home/js/silder.js"></script>
</body>
</html>