<?php
	
	//引入数据库操作类
	require './lib/public.php';
	$id = $_GET['id'];
	$db = database();
	$rows = $db->where(['id'=>$id])->select('article');
	$row = $rows[0];
	
	//获取文章分类列表
	$article_categories = $db->order(['id'=>'asc'])->select('article_category');

		
	//判断是否提交了数据
	//如果提交了数据，就连接数据库，将数据保存下来
	if($_POST){
		$data = [
			'title'=>$_POST['title'],
			'thumb'=>$_POST['thumb'],
			'content'=>$_POST['content'],
			'article_category_id'=>$_POST['article_category_id'],
		];

		//修改数据
		$rst = $db->where(['id'=>$id])->update('article',$data);
		header('Location: article_list.php');
		exit;
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>添加文章</title>
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
						文章标题
					</label>
					<input type="text" name="title" value="<?php echo $row['title'];?>" class="form-control" placeholder="请输入文章标题"/>
				</div>
				<div class="form-group">
					<label>文章分类</label>
					<select class="form-control" name="article_category_id">
						<option>请选择</option>
						<?php foreach($article_categories as $category){?>
						<option value="<?php echo $category['id'];?>" <?php if($category['id']==$row['article_category_id']){?>selected=""<?php }?>><?php echo $category['name'];?></option>
						<?php }?>
					</select>
				</div>
				<div class="form-group">
					<label class="">
						文章配图
					</label>
					<input type="text" name="thumb" value="<?php echo $row['thumb'];?>" class="form-control" placeholder="请输入配图URL"/>
				</div>
				<div class="form-group">
					<label class="">
						文章详情
					</label>
					<textarea class="form-control" rows="10" name="content"><?php echo $row['content'];?></textarea>
				</div>
				<input type="submit" class="btn btn-primary" value="保存"/>
			</form>
		</div>
	</body>
</html>
