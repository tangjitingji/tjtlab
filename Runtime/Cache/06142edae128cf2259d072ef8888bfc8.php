<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Modify Password</title>

	<link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet">

	<link href="__PUBLIC__/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginColumns animated fadeInDown">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">p
			<div class="ibox-content">
				<h2>Welcome to tjt.web</h2>
				<h4> modify password</h4>
				<form class="m-t" role="form" action="__URL__/doModify" method="post">
					<div class="form-group">
						<input type="password" class="form-control" placeholder="old password" required="">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="new password" required="">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="new password again" required="">
					</div>

					<div class="clear" ></div>
					<p class="m-t"> </p>
					<div class="row">
						<div class="col-md-6">
							<button type="submit" class="form-control gray-bg">Cannel</button>
						</div>
						<div class="col-md-6 text-right">
							<button type="submit" class="btn btn-primary block full-width m-b">Submit</button>
						</div>

					</div>

				</form>


			</div>
		</div>
	</div>

</div>

</body>

</html>