<?php /* Smarty version Smarty-3.1.6, created on 2017-11-03 11:34:50
         compiled from "/Applications/MAMP/htdocs/tjtlab/Tpl/Register/register.html" */ ?>
<?php /*%%SmartyHeaderCode:34702395959fbe3da66a5e8-44953593%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4073c1e6b4187ecce61e17875f8ba9856d2a0a77' => 
    array (
      0 => '/Applications/MAMP/htdocs/tjtlab/Tpl/Register/register.html',
      1 => 1509679965,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34702395959fbe3da66a5e8-44953593',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_59fbe3da6cd8a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59fbe3da6cd8a')) {function content_59fbe3da6cd8a($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="__PUBLIC__/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="__PUBLIC__/css/style.css" type="text/css" rel="stylesheet">
    <script src="__PUBLIC__/Js/jquery.js"></script>
    <script>
        $(function(){
            $('button[name="submitbtn"]').click(function(){
                var val=$('input:checkbox[name="mycheck"]:checked').val();
                if(val==1){
                    $('form[name="myForm"]').submit();
                }
                else{
                    alert('复选框没勾选')
                }
            });
        });
    </script>
</head>
<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>

        <h1 class="logo-name">^o^</h1>

        <form class="m-t" role="form" action="__URL__/doReg" method="post" name="myForm">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <input type="number" name="id" class="form-control" placeholder="Student ID">
            </div>
            <div class="form-group">
                <input type="password" name="pw" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" name="repw" class="form-control" placeholder="Verify">
            </div>
            <div class="form-group">
                <div class="checkbox i-checks">
                    <label>
                        <input type="checkbox" name="mycheck" value="1"> Agree the terms and policy
                    </label>
                </div>
            </div>
            <button type="button" class="btn btn-primary block full-width m-b" name="submitbtn">Register</button>

            <p class="text-muted text-center"><small>Already have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="../Login/login.html">Login</a>
        </form>
        <p class="m-t"> </p>
        <div class="row">
            <div class="col-md-6"><small>Copyright sspku tjt</small></div>
            <div class="col-md-6 text-right"><small>© 2017&nbsp;&nbsp;&nbsp;&nbsp;</small></div>
        </div>
    </div>
</div>


</body>

</html><?php }} ?>