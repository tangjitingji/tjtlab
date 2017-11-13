<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Data Tables</title>
    <link href="__PUBLIC__/css/ace.min.css" rel="stylesheet"/>
    <link href="__PUBLIC__/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="__PUBLIC__/css/style.css" type="text/css" rel="stylesheet">
    <link href="__PUBLIC__/css/font-awesome.css" rel="stylesheet">
    <link href="__PUBLIC__/css/datatables.min.css" rel="stylesheet">
    <link href="__PUBLIC__/css/animate.css" rel="stylesheet">

    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
    <!--<link href="font-awesome/css/font-awesome.css" rel="stylesheet">-->

    <!--<link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">-->

    <!--<link href="css/animate.css" rel="stylesheet">-->
    <!--<link href="css/style.css" rel="stylesheet">-->

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
                        <a href="search_results.html"><i class="fa fa-th-large"></i> <span class="nav-label">查询用户列表</span></a>
                    </li>
                    <li>
                        <a href="import.html"><i class="fa fa-diamond"></i> <span class="nav-label">导入用户数据</span></a>
                    </li>
                    <li>
                        <a href="output.html"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">导出用户数据</span></a>
                    </li>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="table_data_tables.html#"><i class="fa fa-bars"></i> </a>
                <form role="search" class="navbar-form-custom" action="search_results.html">
                    <div class="form-group">
                        <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                    </div>
                </form>
            </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Welcome to TJTweb Admin Theme.</span>
                    </li>
                    <li>
                        <a href="../Login/login.html">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
            </div>
                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-10">
                        <h2></h2>

                        <fieldset>
                            <div style="display:none">{}</div>
                            <form name='importExcel' id='importExcel' method='POST' action='__URL__/processImportExcel' enctype="multipart/form-data">
                                <span><label class="col-sm-3" style="padding-top:7px">请选择要导入的Excel文件:</label></span>
                                <span class="col-sm-3" width="50%" style="border-bottom:1px solid #eee; padding:5px;"><input type="file" name="file" id="file" /><p class="col-sm-3" style="color:red"><?php echo $warning;?></p></span>
                                <input class="btn btn-custom btn-info " id="uploadExcelFile" name="uploadExcelFile" type="submit" onclick="check();" value="导入">
                            </form>
                        </fieldset>

                    </div>

                    <div class="col-lg-2">
                    </div>
                </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">

                            <div class="ibox-content">

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example" style="width:60%">

                                        <h3>导入数据格式说明:</h3>
                                        <h4> 1.数据格式必须为学号，姓名且顺序一致</h4>
                                        <h4> 2.学号不能跟已有的学号重复</h4>
                                        <h4> 3.学号和姓名均为必填项目</h4>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">

                            <div class="ibox-content">

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example" style="width:60%">
                                        <h3>用户数据示例：</h3>
                                        <thead>
                                            <tr>
                                                <th class="center">学号</th>
                                                <th class="center">姓名</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="center">111</td>
                                                <td class="center">啦啦啦</td>

                                            </tr>
                                            <tr>
                                                <td class="center">222</td>
                                                <td class="center">咔咔咔</td>

                                            </tr>
                                            <tr>
                                                <td class="center">333</td>
                                                <td class="center">嘎嘎嘎</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

    <script src="js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

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

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>

</body>

</html>