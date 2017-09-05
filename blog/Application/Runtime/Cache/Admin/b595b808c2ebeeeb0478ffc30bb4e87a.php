<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台管理系统</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/blog/Application/Admin/Public/css/list.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/blog/Application/Admin/Public/css/index.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/blog/Application/Admin/Public/css/iconfont.css">
	<script type="text/javascript" src="http://localhost/blog/Application/Admin/Public/js/html5shiv.js"></script>
	<script type="text/javascript" src="http://localhost/blog/Application/Admin/Public/js/jquery-3.1.0.min.js"></script>
	<script type="text/javascript" src="http://localhost/blog/Application/Admin/Public/js/main.js"></script>
</head>
<body>
	<header class="header clearfix">
	<nav class="clearfix navbar-nav">
		<h1 class="navbar-brand">后台管理系统</h1>
		<ul class="navbar-list clearfix">
			<li><a href="/blog/index.php/Admin/Index/index" class="active">首页</a></li>
			<li><a href="/blog/index.php/Home/Index/index">网站首页</a></li>
		</ul>
	</nav>
	<ul class="top-info-wrap clearfix">
		<li><a href="/blog/index.php/Admin/Admin/lst"><?php echo $_SESSION['username'];?></a></li>
		<li><a href="/blog/index.php/Admin/Admin/edi/adminid/<?php echo $_SESSION['id']?>">修改密码</a></li>
		<li><a href="/blog/index.php/Admin/Login/logout">退出</a></li>
	</ul>
</header>
	<div class="content clearfix">
		<aside class="content-left">
	<h1 class="sidebar-title">菜单</h1>
	<ul class="sidebar-item">
		 <li>
            <a href="#" class="top-menu"><i class="iconfont icon-document"></i>常用操作</a>
            <ul class="sub-menu">
                <li><a href="/blog/index.php/Admin/Article/lst"><i class="iconfont icon-document"></i>文章管理</a></li>
                <li><a href="/blog/index.php/Admin/Cate/lst"><i class="iconfont icon-document"></i>栏目管理</a></li>
                <li><a href="/blog/index.php/Admin/Link/lst"><i class="iconfont icon-document"></i>友情链接</a></li>
                <li><a href="/blog/index.php/Admin/Admin/lst"><i class="iconfont icon-document"></i>管理员管理</a></li>
            </ul>
        </li>
	</ul>
</aside>
		<div class="content-right">
			<div class="crumb-wrap">
	            <div class="crumb-list">
                    欢迎来到<a href="#">钬、混迹天涯</a>个人博客的后台管理系统   
                </div>
	        </div>
             <div class="main-content">
                <h1 class="img-bg">基本信息</h1>
                <ul class="main-info">
                    <li>
                        <label>博文数量</label>
                        <span><?php echo ($articleNum); ?></span>
                    </li>
                    <li>
                        <label>栏目数量</label>
                        <span><?php echo ($cateNum); ?></span>
                    </li>
                    <li>
                        <label>管理员数量</label>
                        <span><?php echo ($adminNum); ?></span>
                    </li>
                    <li>
                        <label>上传附件限制</label>
                        <span>2M</span>
                    </li>
                    <li>
                        <label>完成时间</label>
                        <span id="time">2017/8/31</span>
                    </li>
                </ul>
            </div>
		</div>
	</div>
</body>
</html>