<?php
	//判断是否提交了数据
	//如果提交了数据，就连接数据库，将数据保存下来
	if($_POST){
		$data = [
			'name'=>$_POST['name'],
			'sug'=>$_POST['sug'],
		];
		//引入数据库操作类
		require './lib/public.php';
		$db = database();
		//插入数据
		$rst = $db->insert('article_category',$data);
		header('Location: article_category_list.php');
		exit;
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
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
		<nav class="navbar navbar-inverse navbar-fixed-top">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="#" style="padding-top: 10px;"><img src="img/logo.png" style="max-height: 30px;"/></a>
		    </div>
		
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li><a href="article_category_list.php">文章分类</a></li>
		        <li><a href="article_list.php">文章</a></li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown">四哥 <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="#">退出</a></li>
		          </ul>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>
		
		<div class="container">
			<form class="" method="post">
				<div class="form-group">
					<label class="">
						分类名称
					</label>
					<input type="text" name="name" value="" class="form-control" placeholder="请输入分类名称"/>
				</div>
				<div class="form-group">
					<label class="">
						英文名称
					</label>
					<input type="text" name="sug" value="" class="form-control" placeholder="请输入英文名称"/>
				</div>
				<input type="submit" class="btn btn-primary" value="创建"/>
			</form>
		</div>
	</body>
</html>
