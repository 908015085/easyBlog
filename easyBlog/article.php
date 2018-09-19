<?php
	
	//引入数据库操作类
	require './lib/public.php';
	$db = database();
	//获取id
	$id = $_GET['id'];
	//获取文章详情
	$rows = $db->where(['id' => $id])->select('article');
	$row = $rows[0];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $row['title'];?></title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<script type="text/javascript" src="js/jquery.js" ></script>
		<script type="text/javascript" src="js/bootstrap.js" ></script>
		<style type="text/css">
			body{
				padding-top: 70px;
			}
		</style>
	</head>
	<body>
		<section class="container">
		
	</body>
</html>
