<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>import</title>
    <link href="__PUBLIC__/css/ace.min.css" rel="stylesheet"/>
    <link href="__PUBLIC__/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="__PUBLIC__/css/style.css" type="text/css" rel="stylesheet">
</head>
<body>

    <!--<nav class="navbar-default navbar-static-side" role="navigation">-->
        <!--<div class="sidebar-collapse">-->
            <!--<ul class="nav metismenu" id="side-menu">-->
                <!--<li class="nav-header">-->
                    <!--<div class="dropdown profile-element">-->
                        <!--<a data-toggle="dropdown" class="dropdown-toggle" >-->
                            <!--<span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Tang Jiting</strong>-->
                             <!--</span> </span> </a>-->
                    <!--</div>-->

                <!--</li>-->
                <!--<li>-->
                    <!--<a href="search.html"><i class="fa fa-th-large"></i> <span class="nav-label">查询用户列表</span> <span class="fa arrow"></span></a>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<a href="import.html"><i class="fa fa-diamond"></i> <span class="nav-label">导入用户数据</span></a>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<a href="output.html#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">导出用户数据</span><span class="fa arrow"></span></a>-->
                <!--</li>-->
            <!--</ul>-->

        <!--</div>-->
    <!--</nav>-->



<div class="main-container" id="main-container">
    <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
    </script>

    <div class="main-container-inner">
        <a class="menu-toggler" id="menu-toggler" href="#">
            <span class="menu-text"></span>
        </a>

        <div class="main-content">
            <div class="breadcrumbs" id="breadcrumbs">
                <script type="text/javascript">
                    try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                </script>

            </div>


            <div class="page-content">

                <!-- /section:settings.box -->
                <div class="page-content-area">
                    <!-- PAGE CONTENT BEGINS -->
                    <fieldset>
                        <div style="display:none">{}</div>
                        <form name='importExcel' id='importExcel' method='POST' action='__URL__/processImportExcel' enctype="multipart/form-data">
                                 <span><label class="col-sm-3" style="padding-top:6px">请选择要导入的Excel文件:</label></span>
                                 <span class="col-sm-3" width="50%" style="border-bottom:1px solid #eee; padding:5px;"><input type="file" name="file" id="file" /><p class="col-sm-3" style="color:red"><?php echo $warning;?></p></span>
                                 <input class="btn btn-custom btn-info " id="uploadExcelFile" name="uploadExcelFile" type="submit" onclick="check();" value="导入">
                                 <span style="padding-top:6px;margin-left:20px"><a href="__APP__/StudentDataManage/exportStudentDataTemplate">导出excel模版</a></span>
                        </form>
                    </fieldset>	

                    <fieldset>
                        <div class="main">
                            <!-- 表格部分 用于现实数据 -->
                            <div class="table-responsive">
                                <span id='msg' style="color:red"><?php echo ($message); ?></span>
                                <br />
                                <br />
                                <table class="table table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>学号</th>
                                            <th>姓名</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_array($errorData)): foreach($errorData as $key=>$it): ?><tr>
                                        <?php if(is_array($it)): foreach($it as $key=>$element): ?><td class="tableCell"><?php echo ($element); ?></td><?php endforeach; endif; ?>
                                    </tr><?php endforeach; endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </fieldset>	
                    <div class="process" style="display:none">
                        <br><br><br><br><br><br>
                        <div align="center"><img src="__PUBLIC__/img/process.gif"><h3>正在为你处理数据 请稍等  ...</h3></div>
                    </div>	
                    <div>
                        <br />
                        <br />
                        <span>导入数据格式说明:</span>
                        <pre style="color:red">
                            1.数据格式必须为学号，姓名且顺序一致
                            2.学号：不能跟已有的学号重复
                        </pre>
                    </div>
                </div>
                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.page-content-area -->
        </div><!-- /.page-content -->

    </div>
</div><!-- /.main-content -->

    <script type="text/javascript">
        function check() {
            var fileContent = document.getElementById('file');
            if(fileContent.value == '') {
                alert('没有选择导入文件！！！');
            } 
        }
    </script>
    </div>>

    </body>
</html>