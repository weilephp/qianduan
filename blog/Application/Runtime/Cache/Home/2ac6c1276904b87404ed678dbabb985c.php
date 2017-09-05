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
			<li><a href="/blog/index.php/Home/Index/index" <?php if('/blog/index.php/Home/Article' == '/blog/index.php/Home/Index'): ?>class="active"<?php endif; ?>>首页</a></li>
			<li><a href="#">关于我</a></li>
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
						<h1 class="article-title"><?php echo ($artidata["title"]); ?></h1>
						<p class="article-message"><span class="fabu-time">日期：<?php echo (substr($artidata["time"],0,10)); ?></span><span class="author">作者：伍伟乐</span><span>所属栏目：<?php echo ($cate["catename"]); ?></span></p>
						<div class="article">
							<?php echo (htmlspecialchars_decode($artidata["content"])); ?>
						</div>
						<div class="article-footer">
							<p>
								上一篇：
								<?php if($prev['id'] == ''): ?>暂无上一篇
								<?php else: ?>
									<a href="/blog/index.php/Home/Article/index/aid/<?php echo ($prev["id"]); ?>" class="prev-article"><?php echo ($prev["title"]); ?></a><?php endif; ?>
							</p>
							<p>
								下一篇：
								<?php if($next['id'] == ''): ?>暂无下一篇
								<?php else: ?>
									<a href="/blog/index.php/Home/Article/index/aid/<?php echo ($next["id"]); ?>" class="next-article"><?php echo ($next["title"]); ?></a><?php endif; ?>
							</p>
						</div>
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
			<p><a href="#">钬、混迹天涯</a>独家制作，详请请点击查看</p>
		</div>
	</div>
</footer>

	<script type="text/javascript">
		var contact_item = getID("contact_icon").children;
		var caret = getID("caret");
		var contact_wrap = getID("contact_wrap");
		var contact_msg = getID("contact_msg");
		var last_li = null,target = null;
		for(var i=0;i<contact_item.length;i++){
			contact_item[i].onclick = (function(i){
				return function(event){
					event = eventUtil.getEvent(event);
					target = eventUtil.getTarget(event);
					if(contact_msg.style.display == "none"){
						visibility(contact_msg);
						module.animate(contact_msg,"opacity",100,50);
						last_li = target;
					}else if(contact_msg.style.display == "block"){
						if(target == last_li){
							module.animate(contact_msg,"opacity",0,50);
						}
					}
					last_li = target;
					var left = this.offsetLeft+this.offsetWidth/2-13;
					caret.style.left = left+"px";
					contact_wrap.style.top = -i*25+"px";
				}
			})(i);
		}

		var clientHeight = clientheight();
		var gotop = getID("gotop");
		var timer = null;
		function toggleGoTop(){
			var scrollTop = scrolltop();
			if(scrollTop > clientHeight){
				gotop.style.display = "block";
			}else{
				gotop.style.display = "none";
			}
		}

		function goToTop(){
			clearInterval(timer);
			var target = 0,speed=0,nowTop;
			timer = setInterval(function(){
				var scrollTop = scrolltop();
				if(scrollTop == undefined){
					clearInterval(timer);
				}else{
					speed = speed > 0 ? Math.ceil((target-scrollTop)/10) : Math.floor((target-scrollTop)/10);
					nowTop = scrollTop+speed;
					window.scrollTo(0,nowTop);
				}
			},10)
		}

		eventUtil.addHandler(window,"scroll",toggleGoTop);
		eventUtil.addHandler(gotop,"click",goToTop);
		selectMon('/blog/Home/Cate/articleDateLstSolve');
		window.unload = function(){
			eventUtil.removeHandler(window,"scroll",toggleGoTop);
			eventUtil.removeHandler(gotop,"click",goToTop);
		}
	</script>
</body>
</html>