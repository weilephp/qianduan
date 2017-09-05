<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台登录</title>
    <link href="http://localhost/blog/Application/Admin/Public/css/admin_login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="admin_login_wrap">
    <h1>后台管理</h1>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="/blog/index.php/Admin/Login/login" method="post">
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="username" value="" id="user" size="35" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="password" value="" id="pwd" size="35" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="verify">验证码：</label>
                        <input type="text" name="verify" value="" id="verify" size="15" class="admin_input_style" style="width:120px;margin-right:10px" />
                        <img src="/blog/index.php/Admin/Login/verify" style="width:100px;height:40px;cursor:pointer;vertical-align: top;" onclick="this.src='/blog/index.php/Admin/Login/verify/'+Math.random()">
                    </li>
                    <li>
                        <input type="submit" tabindex="3" value="登录" class="btn-login" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
</html>