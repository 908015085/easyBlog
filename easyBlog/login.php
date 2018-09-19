<?php
	header('Content-Type: text/html; charset=utf-8');
	if($_POST) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		if($username && $password) {
			//引入数据库操作类
			require './lib/public.php';
			$db = database();
			//插入数据
			$rst = $db->where(['username' => '"'. $username. '"'])->select('admin');
			// var_dump($rst);
			//拿到密码进行比较
			$row = $rst[0];
			$password = md5(md5($password).$row['salt']);
			if($password == $row['password']) {
				var_dump('登录成功');
				setcookie('login_flag', '1', time() + 3600);
				header('Location: article_list.php');
			}
			
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>登录</title>
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
				<h1>登录</h1>
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
				<input class="btn btn-primary" type="submit" value="登录"/>
			</form>
		</div>
	</body>
</html>