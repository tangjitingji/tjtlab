<?php /* Smarty version 2.6.28, created on 2017-11-03 11:08:29
         compiled from Register/register.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Register</title>
    <link href="__PUBLIC__/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="__PUBLIC__/css/style.css" type="text/css" rel="stylesheet">
    <script src="__PUBLIC__/Js/jquery.js"></script>
    
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
                <button type="submit" class="btn btn-primary block full-width m-b" name="submitbtn">Register</button>

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

</html>