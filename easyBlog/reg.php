<?php
	header('Content-Type: text/html; charset=utf-8');
	if($_POST) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$salt = md5(mcrypt_create_iv(32));
		$data = [
			'username' => $username,
			'salt' => $salt,
			'password' => md5(md5($password).$salt)
		];
		
		//引入数据库操作类
		require './lib/public.php';
		$db = database();
		//插入数据
		$rst = $db->insert('admin',$data);
		header('Location: login.php');
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>注册</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<style type="text/css">
			.b1{
				width: 40%;
				position: absolute;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				padding: 10px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="text-center">
				<h1>注册</h1>
			</div>
			<form method="post" class="b1">
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">用户名</div>
						<input type="text" class="form-control" name="username"/>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">密码</div>
						<input type="password" class="form-control" name="password"/>
					</div>
				</div>
				<input class="btn btn-primary" type="submit" value="注册"/>
			</form>
		</div>
	</body>
</html>