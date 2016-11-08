<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>张俊个人博客</title>
  <meta name="keywords" content="个人博客" />
  <meta name="description" content="个人博客" />
  <link href="/Public/Home/css/base.css" rel="stylesheet">
  <link href="/Public/Home/css/new.css" rel="stylesheet">
  <!--[if lt IE 9]>
  <script src="/Public/Home/js/modernizr.js"></script>
  <![endif]-->
</head>
<body>
<header>
  <div id="logo"><a href="/"></a></div>
  <nav class="topnav" id="topnav"><a href="/"><span>首页</span><span class="en">Protal</span></a><a href="about.html"><span>关于我</span><span class="en">About</span></a><a href="newlist.html"><span>慢生活</span><span class="en">Life</span></a><a href="moodlist.html"><span>碎言碎语</span><span class="en">Doing</span></a><a href="share.html"><span>模板分享</span><span class="en">Share</span></a><a href="knowledge.html"><span>学无止境</span><span class="en">Learn</span></a><a href="6"><span>留言版</span><span class="en">Gustbook</span></a></nav>
  </nav>
</header>
<article class="blogs">
  <h1 class="t_nav"><span>您当前的位置：<a href="/index.html">首页</a>&nbsp;&gt;&nbsp;<a href="/news/s/"><?php echo ($cate_sort); ?></a>&nbsp;&gt;&nbsp;<a href="/news/s/"><?php echo ($sort); ?></a></span><a href="/" class="n1">网站首页</a><a href="/" class="n2"><?php echo ($sort); ?></a></h1>
  <div class="index_about">
    <h2 class="c_titile"><?php echo ($data["title"]); ?></h2>
    <p class="box_c"><span class="d_time">发布时间：<?php echo (date("Y-m-d",$data["addtime"])); ?></span><span>编辑：<?php echo ($data["author"]); ?></span></p>
    <ul class="infos">
      <?php echo ($data["content"]); ?>
    </ul>
    <div class="keybq">
      <p><span>关键字词</span>：<?php echo ($data["keyword"]); ?></p>

    </div>
    <div class="ad"> </div>
    <div class="nextinfo">
      <p>上一篇：
        <?php if(!empty($prev)): ?><a href="/index.php/Home/Article/lst/id/<?php echo ($prev["id"]); ?>"><?php echo ($prev["title"]); ?></a><?php else: ?><a href="">没有了</a><?php endif; ?></p>
      <p>下一篇：
        <?php if(!empty($next)): ?><a href="/index.php/Home/Article/lst/id/<?php echo ($next["id"]); ?>"><?php echo ($next["title"]); ?></a><?php else: ?><a href="">没有了</a><?php endif; ?></p>
    </div>
    <div class="otherlink">
      <h2>相关文章</h2>
      <ul>
        <?php if(is_array($connect_data)): $i = 0; $__LIST__ = $connect_data;if( count($__LIST__)==0 ) : echo "还没有相关文章" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/index.php/Home/Article/lst/id/<?php echo ($vo["id"]); ?>" ><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "还没有相关文章" ;endif; ?>
      </ul>
    </div>

    <!-- 用户评论部分 -->
    <div class="otherlink">
      <h2>评论列表</h2>

    </div>

    <div class="otherlink">
      <h2>我的评论</h2><br/>
    </div>
    <div>
      &nbsp;&nbsp;&nbsp;&nbsp;
        <span>
          <a style="cursor:pointer">登录</a> |
          <a style="cursor:pointer" href="/index.php/Home/Register/lst">注册</a>
        </span><br/><br/>
      <form>
      &nbsp;&nbsp;&nbsp;&nbsp;<textarea placeholder="  说点什么吧…" title="Ctrl+Enter快捷提交" name="content" cols="90" rows="10"></textarea>
        &nbsp;&nbsp;&nbsp;&nbsp;<input type="image" src="/Public/Home/images/comment.png">
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
</body>
</html>