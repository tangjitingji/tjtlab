<?php
	class UserModel extends Model{
		protected $_validate=array(
			array('code','require','验证码必须填写！'),
			array('code','checkCode','验证码错误',0,'callback',1),
			array('username','require','用户必须填写！'),
			array('username','','用户已经存在',0,'unique',1),
			array('username','/^[a-zA-Z0-9]{6,10}$/','用户名必须是6个以上10个以下的字母或数字',0,'regex',1),
			array('password','require','密码必须填写！'),
			array('password','/^[a-zA-Z0-9]{6,}$/','密码必须是6个以上的字母或数字',0,'regex',1),
			array('repassword','password','确认密码不正确',0,'confirm'),
		);

	}
?>