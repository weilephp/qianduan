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
    <script type="text/javascript" src="http://localhost/blog/Application/Admin/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="http://localhost/blog/Application/Admin/Public/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" src="http://localhost/blog/Application/Admin/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
    <style type="text/css">
        .is-recommend{
            width:20px;
            height:20px;
            vertical-align: top;
        }
    </style>
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
                <li><a href="/blog/index.php/Admin/Aboutme/index"><i class="iconfont icon-document"></i>关于我</a></li>
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
		            <a href="#">文章管理</a>
                    <span>&gt;</span>
                    <span>新增文章</span>
		        </div>
	        </div>
	        <div class="result-list">
	        	<div class="result-content">
                    <form method="post" action="/blog/index.php/Admin/Article/add" enctype="multipart/form-data">
    	        		<table class="add-table">
    	        			<tr>
                                <th width="120"><i class="require-red">*</i>分类：</th>
                                <td>
                                    <select name="cateid" id="cateid" class="required">
                                        <option value="" selected="selected" hidden="hidden">请选择</option>
                                        <?php if(is_array($catedata)): $i = 0; $__LIST__ = $catedata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["catename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>标题：</th>
                                <td>
                                    <input class="common-text required" id="title" name="title" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th>文章描述：</th>
                                <td><textarea class="common-textarea" name="descr" rows="5"></textarea></td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>缩略图：</th>
                                <td><input name="pic" id="" type="file"></td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>是否推荐：</th>
                                <td>
                                    <input name="recommend" id="" type="radio" value="是" checked class="is-recommend">是
                                    <input name="recommend" id="" type="radio" value="否" class="is-recommend">否
                                </td>
                            </tr>
                            <tr>
                                <th>内容：</th>
                                <td><textarea name="content" class="common-textarea" id="content" cols="30" rows="10"></textarea></td>
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

    <script type="text/javascript">
        UE.getEditor('content',{initialFrameWidth:900,initialFrameHeight:400});
    </script>
</body>
</html>