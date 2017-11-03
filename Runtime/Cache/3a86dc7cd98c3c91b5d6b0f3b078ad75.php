<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="__PUBLIC__/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="__PUBLIC__/css/style.css" type="text/css" rel="stylesheet">
    <script src="__PUBLIC__/Js/jquery.js"></script>

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginColumns animated fadeInDown">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <h2>Welcome to tjt.web</h2>
                    <form class="m-t" role="form" action="__URL__/doLogin" method="post">
                        <div class="form-group">
                            <input type="number" name="id" class="form-control" placeholder="Student ID" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" name="pw" class="form-control" placeholder="Password" required="">
                        </div>

                        <input name="code" class="code" id="code_math"/>
                        <img src='__APP__/Public/code?w=100&h=40' onclick="this.src=this.src+'?'+Math.random()" id="getcode_math" title="看不清，点击换一张" />
                        <div class="clear" ></div>
                        <p class="m-t"> </p>
                        <button type="submit" name="submit" class="btn btn-primary block full-width m-b">Login</button>

                        <a href="login.html#"><small>Forgot password?</small></a>

                        <p class="text-muted text-center"><small>Do not have an account?</small></p>
                        <a class="btn btn-sm btn-white btn-block" href="../Register/register.html">Create an account</a>
                    </form>
                    <p class="m-t"> </p>
                    <div class="row">
                        <div class="col-md-6"><small>Copyright sspku tjt</small></div>
                        <div class="col-md-6 text-right"><small>© 2017&nbsp;&nbsp;&nbsp;&nbsp;</small></div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</body>

</html>