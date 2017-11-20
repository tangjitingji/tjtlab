<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>导出学生数据</title>
    <link href="__PUBLIC__/css/ace.min.css" rel="stylesheet"/>
    <link href="__PUBLIC__/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="__PUBLIC__/css/style.css" type="text/css" rel="stylesheet">
    <link href="__PUBLIC__/css/font-awesome.css" rel="stylesheet">
    <link href="__PUBLIC__/css/datatables.min.css" rel="stylesheet">
    <link href="__PUBLIC__/css/animate.css" rel="stylesheet">

</head>
<body>
    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                                    <span>
                                        <img alt="image" class="img-circle" src="__PUBLIC__/img/tangjiting.jpeg" />
                                    </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" >
                                        <span class="clear">
                                            <span class="block m-t-xs"> <strong class="font-bold">Tang Jiting</strong></span>
                                        </span>
                            </a>
                        </div>
                    </li>
                    <li>
                        <a href="__APP__/Index/index.html"><i class="fa fa-th-large"></i> <span class="nav-label">首页</span></a>
                    </li>
                    <li>
                        <a href="__APP__/StudentDataManage/search.html"><i class="fa fa-th-large"></i> <span class="nav-label">查询用户列表</span></a>
                    </li>
                    <li>
                        <a href="__APP__/StudentDataManage/import.html"><i class="fa fa-diamond"></i> <span class="nav-label">导入用户数据</span></a>
                    </li>
                    <li>
                        <a href="__APP__/StudentDataManage/output.html"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">导出用户数据</span></a>
                    </li>
                    <li>
                        <a href="__APP__/StudentDataManage/searchInfo.html"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">查询用户详细信息</span></a>
                    </li>
                    <li>
                        <a href="__APP__/StudentDataManage/outputInfo.html"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">导出用户详细信息</span></a>
                    </li>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <h1>欢迎你<?php echo ($_SESSION['userid']); ?>   进入我的主页</h1>
            <h1><a id='out fa-sign-out' href="__APP__/Login/doLogout">Log out</a></h1>
            <h1><a id='modifypassword' href="__APP__/ModifyPassword/modifypassword">修改密码</a></h1>

        </div>
    </div>

</body>