<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台管理系统</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/blog/Application/Admin/Public/css/list.css">
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
		            <span class="crumb-step">&gt;</span>
		            <span class="crumb-name">管理员管理</span>
		        </div>
	        </div>
	        <div class="result-list">
	        	<div class="result-operation">
	        		<a href="/blog/index.php/Admin/Admin/add"><i class="iconfont icon-document"></i>新增管理员</a>
	        		<a href="#" id="pl_del"><i class="iconfont icon-document"></i>批量删除</a>
	        	</div>
	        	<div class="result-content">
	        		<table id="result_table">
	        			<tr class="gaoliang">
	        				<th width="5%"><input name="" type="checkbox" id="checkboxAll"></th>
                            <th width="30%">ID</th>
                            <th>管理员名称</th>
                            <th>操作</th>
	        			</tr>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td><input name="pl_opera" value="<?php echo ($vo["id"]); ?>" type="checkbox"></td>
                                <td><?php echo ($vo["id"]); ?></td>
                                <td><?php echo ($vo["username"]); ?></td>
                                <td>
                                    <a class="link-update" href="/blog/index.php/Admin/Admin/edi/adminid/<?php echo ($vo["id"]); ?>">修改</a>
                                    <a class="del" href="/blog/index.php/Admin/Admin/del/adminid/<?php echo ($vo["id"]); ?>">删除</a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
	        		</table>
	        	</div>
	        </div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			plDel('/blog/Admin/Admin/plDel');
		});
	</script>
</body>
</html>