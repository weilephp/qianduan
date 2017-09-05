<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>钬、混迹天涯的博客</title>
	<link rel="shortcut icon" href="/blog/Public/images/Panda.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="/blog/Public/css/index.css">
	<link rel="stylesheet" type="text/css" href="/blog/Public/css/article.css">
	<script type="text/javascript" src="/blog/Public/js/html5shiv.js"></script>
	<script type="text/javascript" src="/blog/Public/js/jquery-3.1.0.min.js"></script>
	<script src="/blog/Public/js/script.js"></script>
</head>
<body>
	<div class="body-top"></div>
	<div class="container">
		<header class="header">
	<div class="header-top">
		<img src="/blog/Public/images/touxiang.jpg" class="touxiang" alt="钬、混迹天涯的头像">
		<h1>钬、混迹天涯的博客</h1>
	</div>
	<nav>
		<ul class="nav">
			<li><a href="/blog/index.php/Home/Index/index" <?php if('/blog/index.php/Home/Aboutme' == '/blog/index.php/Home/Index'): ?>class="active"<?php endif; ?>>首页</a></li>
			<li><a href="/blog/index.php/Home/Aboutme/index" <?php if('/blog/index.php/Home/Aboutme' == '/blog/index.php/Home/Aboutme'): ?>class="active"<?php endif; ?>>关于我</a></li>
			<?php if(is_array($cateres)): $i = 0; $__LIST__ = $cateres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/blog/index.php/Home/Cate/index/cid/<?php echo ($vo["id"]); ?>" <?php if($vo['id'] == $cateid): ?>class="active"<?php endif; ?>><?php echo ($vo["catename"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>	
		</ul>
	</nav>
	<form class="form-search clearfix" method="post" action="/blog/index.php/Home/Cate/searchLst">
		<input type="text" name="keyWord" class="search-text" autocomplete="off" id="search_text">
		<input type="submit" name="" class="search-submit" value="搜索">
	</form>
</header>

		<div class="content">
			<div class="content-top"></div>
			<div class="content-body-outer">
				<div class="content-body clearfix">
					<div class="content-body-left" id="content_body_left">
						<h1 class="article-title" style="margin-bottom: 20px;">个人简介</h1>
						<div><?php echo (htmlspecialchars_decode($result["content"])); ?></div>
					</div><!--内容部分左边结束-->
					<aside class="content-body-right">
	<div class="notice-me">
		<h1 class="title">关注我</h1>
		<ul class="clearfix" id="contact_icon">
			<li id="phone"></li>
			<li id="email"></li>
			<li id="qq"></li>
			<li id="huizhang"></li>
		</ul>
		<div class="contact-msg" id="contact_msg" style="display: none;">
			<span class="caret" id="caret"></span>
			<div class="contact-outer-wrap">
				<div class="contact-wrap" id="contact_wrap">
					<p>phone：15521214104</p>
					<p>email：weile_php@163.com</p>
					<p>qq：1172010632</p>
					<p>徽章：暂无</p>
				</div>
			</div>
		</div>
	</div>
	<div class="tuwen-tuijian">
		<h1 class="title">图文推荐</h1>
		<ul class="media">
			<?php if(is_array($recoArtres)): $i = 0; $__LIST__ = $recoArtres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="clearfix">
					<a href="/blog/index.php/Home/Article/index/aid/<?php echo ($vo["id"]); ?>" class="wrap-img img-link"><img src="/blog/<?php echo ($vo["pic"]); ?>" alt="<?php echo ($vo["title"]); ?>"></a>
					<div class="media-left">
						<h1><a href="/blog/index.php/Home/Article/index/aid/<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a></h1>
						<span class="message"><?php echo ($vo["catename"]); ?></span>
						<span class="time"><?php echo (substr($vo["time"],0,10)); ?></span>
					</div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
	<div class="recent-update">
		<h1 class="title">最新更新</h1>
		<ul>
			<?php if(is_array($articleres)): $i = 0; $__LIST__ = $articleres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/blog/index.php/Home/Article/index/aid/<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
	<div class="youqing-link">
		<h1 class="title">友情链接</h1>
		<ul class="clearfix">
			<?php if(is_array($linkres)): $i = 0; $__LIST__ = $linkres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>" rel="nofollow" target="_blank"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
	<div class="select-date-wrap">
		<h1 class="title">时间分类</h1>
		<select class="select-date" id="select_date">
			<option selected>选择月份</option>
			<?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["date_mon"]); ?>"><?php echo ($vo["date_mon"]); ?>&nbsp;(<?php echo ($vo["count"]); ?>)</option><?php endforeach; endif; else: echo "" ;endif; ?>
		</select>
	</div>
	<div class="shanshuihua"></div>
</aside>
				</div>
			</div>
			<div class="content-bottom"></div>
			<div class="gotop" id="gotop"></div>
		</div>
	</div>
	<footer class="footer">
	<div class="container">
		<div class="footer-content">
			<p>2017&nbsp;&nbsp;All&nbsp;Rights&nbsp;Reserved&nbsp;版权所有</p>
			<p><a href="/blog/index.php/Home/Aboutme/index">钬、混迹天涯</a>独家制作，详请请点击查看</p>
		</div>
	</div>
</footer>

	<script type="text/javascript">
		showMessage();
		selectMon('/blog/Home/Cate/articleDateLstSolve');
		returnTop()
	</script>
</body>
</html>