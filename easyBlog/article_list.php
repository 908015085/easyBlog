<?php
	//引入数据库操作类
	require './lib/public.php';
	$db = database();
	//插入数据
	$rows = $db->select('article');
	
	//查出所有的文章分类
	$categories = $db->order(['id'=>'asc'])->select('article_category');
	$article_categories = [];
	foreach($categories as $category){
		$article_categories[$category['id']] = $category;
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>文章列表</title>
		<link rel="stylesheet" href="css/bootstrap.css" />
		<script type="text/javascript" src="js/jquery.js" ></script>
		<script type="text/javascript" src="js/bootstrap.js" ></script>
		<style>
			#list th,#list td{
				vertical-align: middle;
			}
			#list img{
				max-height: 30px;
			}
			
		</style>
	</head>
	<body style="padding-top: 70px;">
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
			<div class="alert alert-danger alert-dismissible">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Warning!</strong> 隔壁老王正在摇一摇,请看好自己的老婆!
			</div>
		</div>
		


		<div class="container" id="list">
			<a href="article_add.php" class="btn btn-success" style="margin-bottom:10px;">添加文章</a>
			<table class="table table-bordered table-striped">
				<tr>
					<th>文章id</th>
					<th><span class="glyphicon glyphicon-picture" aria-hidden="true"></span></th>
					<th>文章标题</th>
					<th>文章分类</th>
					<th>文章发布时间</th>
					<th>操作</th>
				</tr>
				<?php foreach($rows as $row){ ?>
				<tr>
					<td><?php echo $row['id'];?></td>
					<td><img src="<?php echo $row['thumb'];?>" class="img-rounded"/></td>
					<td><?php echo $row['title'];?></td>
					<td><?php echo $article_categories[$row['article_category_id']]['name'];?></td>
					<td><?php echo date('Y-m-d H:i:s',$row['create_time']);?></td>
					<td><a href="article_edit.php?id=<?php echo $row['id'];?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a> <a href="article_del.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td>
				</tr>
				<?php }?>
			</table>
		</div>
	</body>
</html>
