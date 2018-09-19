<?php
	require './lib/public.php';
	$db = database();

	//删除指定的分类
	$id = $_GET['id'];
	$db->where(['id'=>$id])->delete('article_category');

	header('Location:article_category_list.php');
