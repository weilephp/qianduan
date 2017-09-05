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
    <script type="text/javascript" src="http://localhost/blog/Application/Admin/Public/js/article.js"></script>
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
		            <span class="crumb-name">文章管理</span>
		        </div>
	        </div>
	        <div class="search-content">
                <form action="/blog/index.php/Admin/Article/searchLst" method="post" class="clearfix">
                   <div class="form-group">
                   		<label>选择分类：</label>
                   		<select class="search-select" id="search_select">
                   			<option selected>全部</option>
                            <?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["catename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                   		</select>
                   </div>
                   <div class="form-group">
                   		<label>关键字：</label>
                   		<input type="text" name="keyWord" placeholder="关键字" class="search-text">
                   </div>
                   <div class="form-group">
                   		<input type="submit" name="" value="查询" class="search-submit">
                   </div>
                </form>
	        </div>
	        <div class="result-list">
	        	<div class="result-operation">
	        		<a href="/blog/index.php/Admin/Article/add"><i class="iconfont icon-document"></i>新增文章</a>
	        		<a href="#" id="pl_del"><i class="iconfont icon-document"></i>批量删除</a>
	        	</div>
	        	<div class="result-content">
	        		<table id="result_table">
	        			<tr class="gaoliang">
	        				<th width="5%"><input name="" type="checkbox" id="checkboxAll"></th>
                            <th>ID</th>
                            <th>标题</th>
                            <th width="30%">简略描述</th>
                            <th>缩略图</th>
                            <th>栏目名称</th>
                            <th>是否推荐</th>
                            <th>更新时间</th>
                            <th>操作</th>
	        			</tr>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td><input name="pl_opera" value="<?php echo ($vo["id"]); ?>" type="checkbox"></td>
                                <td><?php echo ($vo["id"]); ?></td>
                                <td title=""><?php echo ($vo["title"]); ?></td>
                                <td><?php echo ($vo["descr"]); ?></td>
                                <td>
                                    <?php if($vo['pic'] == ''): ?>暂无缩略图
                                    <?php else: ?>
                                        <img src="/blog/<?php echo ($vo["pic"]); ?>" alt="<?php echo ($vo["title"]); ?>" width="70px" height="40px"><?php endif; ?> 
                                </td>
                                <td><?php echo ($vo["catename"]); ?></td>
                                <td><?php echo ($vo["recommend"]); ?></td>
                                <td><?php echo (substr($vo["time"],0,10)); ?></td>
                                <td>
                                    <a class="link-update" href="/blog/index.php/Admin/Article/edi/aid/<?php echo ($vo["id"]); ?>">修改</a>
                                    <a class="del" href="/blog/index.php/Admin/Article/del/aid/<?php echo ($vo["id"]); ?>">删除</a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
	        		</table>
	        		<div class="list-page"><?php echo ($page); ?></div>
	        	</div>
	        </div>
		</div>
	</div>
</body>
</html>