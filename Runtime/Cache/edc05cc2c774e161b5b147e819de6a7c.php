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

                                <div class="padding-20">

                                    <div class="student margintop-20">
                                        <div class="student-header ">
                                            <!--<form role="form" action="__URL__/index" >-->
                                            <form>
                                                <div class="form-inline">
                                                    <div class="form-group">
                                                        <label for="name">学号:</label>
                                                        <input type="text" class="form-control" id="id" placeholder="输入要查找的学号"   name="userid"  value="<?php if($userid!=0)echo $userid; ?>" >
                                                    </div>
                                                    <!--<div class="form-group">-->
                                                        <!--<input class="btn btn-custom btn-info "  id="submit1" type="submit" value="查询">-->
                                                    <!--</div>-->
                                                    <div class="form-group">
                                                        <label for="name">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;姓名:</label>
                                                        <input type="text" class="form-control" id="name" placeholder="输入要查找的姓名"   name="username"  value="<?php if($username!=0)echo $username; ?>" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                        <input class="btn btn-custom btn-info "  id="submit2" type="submit" value="查询">
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                        <h3></h3>
                                        <!-- 表格 -->
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example" style="width:60%">
                                                <thead>
                                                <tr>
                                                    <th class="center">学号</th>
                                                    <th class="center">姓名</th>
                                                    <th class="center">密码</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(is_array($admins)): foreach($admins as $key=>$it): ?><tr>
                                                        <td><?php echo ($it["userid"]); ?></td>
                                                        <td><?php echo ($it["username"]); ?></td>
                                                        <td><?php echo ($it["userpsw"]); ?></td>

                                                    </tr><?php endforeach; endif; ?>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="text-center">
                                            <ul class="pagination">
                                                <?php echo $page; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Mainly scripts -->
    <script src="__PUBLIC__/js/jquery-2.1.1.js"></script>
    <script src="__PUBLIC__/js/bootstrap.min.js"></script>
    <script src="__PUBLIC__/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="__PUBLIC__/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="__PUBLIC__/js/plugins/jeditable/jquery.jeditable.js"></script>

    <script src="__PUBLIC__/js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="__PUBLIC__/js/inspinia.js"></script>
    <script src="__PUBLIC__/js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                        }
                    }
                ]

            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

    </script>

</body>
</html>