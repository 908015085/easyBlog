<?php
	require './lib/public.php';
	$db = database();
	
	//获取要删除的文章标志id
	$id = $_GET['id'];
	$db->where(['id'=>$id])->delete('article');
	header('Location:article_list.php');
