<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index</title>

</head>
<body>
<div >
    <h1>欢迎你 <?php echo ($_SESSION['username']); ?>进入我的主页<a id='out' href="__APP__/Login/doLogout">退出</a></h1>
    <h1><a id='out' href="__APP__/ModifyPassword/modifypassword">修改密码</a></h1>
</div>


</body>
</html>