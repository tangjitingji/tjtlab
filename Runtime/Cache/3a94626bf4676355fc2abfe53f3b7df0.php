<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Modify Password</title>

	<link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet">
	<link href="__PUBLIC__/css/style.css" rel="stylesheet">
	<script src="__PUBLIC__/Js/jquery.js"></script>
	<script>
		$(function(){
			$('button[name="subbtn"]').click(function(){
				var val=$('input:password[name="oldpwd"]').val();
				var val2=$('input:password[name="newpwd"]').val();
				var val3=$('input:password[name="renewpwd"]').val();
				if(val!=val2){
					if(val3==val2){
						$('form[name="myModifyForm"]').submit();
					}else {
						alert('两次输入的新密码不同');
					}
				} else{
					alert('新密码与旧密码相同')
				}
			});
		});
	</script>

</head>

<body class="gray-bg">

<div class="middle-box text-center loginColumns animated fadeInDown">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="ibox-content">
				<h2>Welcome to tjt.web</h2>
				<h4> modify password</h4>
				<form class="m-t" role="form" name="myModifyForm" action="__URL__/doModify" method="post">
					<div class="form-group">
						<input type="password" class="form-control" name="oldpwd" placeholder="old password" required="">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="newpwd" placeholder="new password" required="">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="renewpwd" placeholder="new password again" required="">
					</div>

					<div class="clear" ></div>
					<p class="m-t"> </p>
					<div class="row">
						<div class="col-md-6">
							<button type="submit" class="form-control gray-bg">Cannel</button>
						</div>
						<div class="col-md-6 text-right">
							<button type="submit" name="subbtn" class="btn btn-primary block full-width m-b">Submit</button>
						</div>

					</div>

				</form>


			</div>
		</div>
	</div>

</div>

</body>

</html>