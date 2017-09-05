<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台管理系统</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/blog/Application/Admin/Public/css/list.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/blog/Application/Admin/Public/css/add.css">
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
		            <i class="iconfont icon-document"></i>
		            <a href="/jscss/admin">首页</a>
		            <span>&gt;</span>
		            <a href="#">栏目管理</a>
                    <span>&gt;</span>
                    <span>新增栏目</span>
		        </div>
	        </div>
	        <div class="result-list">
	        	<div class="result-content">
                    <form method="post" action="/blog/index.php/Admin/Cate/edi" enctype="multipart/form-data">
                        <input type="hidden" name="cateid" value="<?php echo ($catedata["id"]); ?>">
    	        		<table class="add-table">
                            <tr>
                                <th><i class="require-red">*</i>栏目名称：</th>
                                <td>
                                    <input class="common-text required" id="" name="catename" size="50" value="<?php echo ($catedata["catename"]); ?>" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>排序：</th>
                                <td>
                                    <input class="common-text required" id="title" name="sort" size="50" value="<?php echo ($catedata["sort"]); ?>" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-submit " value="提交" type="submit">
                                    <input class="btn btn-return" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
    	        		</table>
                    </form>
	        	</div>
	        </div>
		</div>
	</div>
</body>
</html>