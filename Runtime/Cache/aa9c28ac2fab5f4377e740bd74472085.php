<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index</title>

</head>
<body>
<div >
    <h1>欢迎你 <?php echo ($_SESSION['username']); ?>进入我的主页<a id='out' href="__APP__/Login/doLogout">退出</a></h1>
    <h1><a id='modifypassword' href="__APP__/ModifyPassword/modifypassword">修改密码</a></h1>
    <h1><a id='import' href="__APP__/StudentDataManage/import.html">导入用户数据</a></h1>
    <h1><a id='output' href="__APP__/StudentDataManage/output.html">导出用户数据</a></h1>
    <h1><a id='search' href="__APP__/StudentDataManage/search.html">查询用户数据</a></h1>
</div>


</body>
</html>