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
                        <a href="search.html"><i class="fa fa-th-large"></i> <span class="nav-label">查询用户列表</span></a>
                    </li>
                    <li>
                        <a href="import.html"><i class="fa fa-diamond"></i> <span class="nav-label">导入用户数据</span></a>
                    </li>
                    <li>
                        <a href="output.html"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">导出用户数据</span></a>
                    </li>
                    <li>
                        <a href="searchInfo.html"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">查询用户详细信息</span></a>
                    </li>
                    <li>
                        <a href="outputInfo.html"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">导出用户详细信息</span></a>
                    </li>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">

                            <div class="ibox-content">

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example" style="width:60%">
                                        <form name='outputExcel' id='outputExcel' method='POST' action='__URL__/export' enctype="multipart/form-data">
                                            <!--<P><a href="<?php echo U('StudentDataManage/expUser');?>" >导出数据并生成excel</a></P><br/>-->
                                            <input class="btn btn-custom btn-info " href="<?php echo U('StudentDataManage/expUser');?>" id="uploadExcelFile" name="uploadExcelFile" type="submit" onclick="check();" value="导出">

                                        </form>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>

    </div>

</body>
</html>