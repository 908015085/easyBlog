<?php
	require './lib/public.php';
	$db = database();
	
	$categories = $db->order(['id'=>'asc'])->select('article_category');
	// var_dump($_GET['category_id']);
	if(isset($_GET['category_id']))
	{
		$category_id = $_GET['category_id'];
		$db = $db->where(['article_category_id' => $category_id]);
	}
	else
	{
		$category_id = null;
	}
	
	if(isset($_GET['searchPara']))
	{
		$searchPara = $_GET['searchPara'];
		$db = $db->where('content LIKE ' . '"%'.$searchPara.'%"');
	}
	// exit;
	
	$pageSize = 4;
	$articles = $db->select('article');
	$count = count($articles);
	$pages = ceil($count/$pageSize);
	// $pages = 3;	
	// var_dump($pages);
	
	
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>小博客</title>
<meta name="keywords"/>
<meta name="description"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/base.css" rel="stylesheet">
<link href="css/index.css" rel="stylesheet">
<link href="css/m.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
<script>
window.onload = function ()
{
	var oH2 = document.getElementsByTagName("h2")[0];
	var oUl = document.getElementsByTagName("ul")[0];
	oH2.onclick = function ()
	{
		var style = oUl.style;
		style.display = style.display == "block" ? "none" : "block";
		oH2.className = style.display == "block" ? "open" : ""
	}
}
</script>
</head>
<body>
<header>
  <div class="tophead">
    <div class="logo"><a href="/">小博客</a></div>
    <nav class="topnav" id="topnav">
      <ul>
        <li><a href="list.php">网站首页</a></li>
				<?php foreach($categories as $category) {?>
        <li><a href="list.php?category_id=<?php echo $category['id'] ;?>"><?php echo $category['name']; ?></a></li>
				<?php }?>
      </ul>
    </nav>
  </div>
</header>
<article>
  <h1 class="t_nav"><span>不要轻易放弃。学习成长的路上，我们长路漫漫，只因学无止境。 </span><a href="/" class="n1">网站首页</a><a href="/" class="n2">学无止境</a></h1>
  <div class="blogs">
    <div class="mt20"></div>
		<?php foreach($articles as $article) {?>
    <li> <span class="blogpic"><a href="info.php?id=<?php echo $article['id']; ?>"><img src="<?php echo $article['thumb']; ?>"></a></span>
      <h3 class="blogtitle"><a href="info.php?id=<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a></h3>
      <div class="bloginfo">
        <p><?php echo export($article['content']); ?></p>
      </div>
      <div class="autor"><span class="lm"><a href="/" title="CSS3|Html5" target="_blank" class="classname">CSS3|Html5</a></span><span class="dtime"><?php echo date('Y-m-d',$article['create_time']); ?></span><span class="viewnum">浏览（<a href="/">0</a>）</span><span class="readmore">
			<a href="info.php?id=<?php echo $article['id'];?>">阅读原文</a></span></div>
    </li>
		<?php }?>
    <div class="pagelist"><a title="Total record">&nbsp;
		<b>共<?php echo $count ;?>条<b>
		</a>&nbsp;&nbsp;&nbsp;
		
		<?php for($index = 1; $index <= $pages; $index++) {?>
			<b>第<?php echo $index ;?>页</b>&nbsp;<a href="/download/index_2.html"></a>
		<?php }?>
		</div>
  </div>
	
	
  <div class="sidebar">
    <div class="search">
      <form action="list.php" method="get">
        <input name="searchPara" class="input_text" value="请输入关键字" style="color: rgb(153, 153, 153);" onfocus="if(value=='请输入关键字'){this.style.color='#000';value=''}" onblur="if(value==''){this.style.color='#999';value='请输入关键字'}" type="text">
        <input name="Submit" class="input_submit" value="提交" type="submit">
      </form>
    </div>
		
		
    <div class="lmnav">
      <h2 class="hometitle">栏目导航</h2>
      <ul class="navbor">
        <li><a href="#">关于我</a></li>
        <li><a href="share.html">模板分享</a>
          <ul>
            <li><a href="list.html">个人博客模板</a></li>
            <li><a href="#">HTML5模板</a></li>
          </ul>
        </li>
        <li><a href="list.html">学无止境</a>
          <ul>
            <li><a href="list.html">学习笔记</a></li>
            <li><a href="#">HTML5+CSS3</a></li>
            <li><a href="#">网站建设</a></li>
          </ul>
        </li>
        <li><a href="#">慢生活</a></li>
      </ul>
    </div>
		
		
    <div class="paihang">
      <h2 class="hometitle">点击排行</h2>
      <ul>
        <li><b><a href="/download/div/2015-04-10/746.html" target="_blank">【活动作品】柠檬绿兔小白个人博客模板30...</a></b>
          <p><i><img src="img/t02.jpg"></i>展示的是首页html，博客页面布局格式简单，没有复杂的背景，色彩局部点缀，动态的幻灯片展示，切换卡，标...</p>
        </li>
        <li><b><a href="/download/div/2014-02-19/649.html" target="_blank"> 个人博客模板（2014草根寻梦）30...</a></b>
          <p><i><img src="img/b03.jpg"></i>2014第一版《草根寻梦》个人博客模板简单、优雅、稳重、大气、低调。专为年轻有志向却又低调的草根站长设...</p>
        </li>
        <li><b><a href="/download/div/2013-08-08/571.html" target="_blank">黑色质感时间轴html5个人博客模板30...</a></b>
          <p><i><img src="img/b04.jpg"></i>黑色时间轴html5个人博客模板颜色以黑色为主色，添加了彩色作为网页的一个亮点，导航高亮显示、banner图片...</p>
        </li>
        <li><b><a href="/download/div/2014-09-18/730.html" target="_blank">情侣博客模板系列之《回忆》Html30...</a></b>
          <p><i><img src="img/b05.jpg"></i>Html5+css3情侣博客模板，主题《回忆》，使用css3技术实现网站动画效果，主题《回忆》,分为四个主要部分，...</p>
        </li>
        <li><b><a href="/download/div/2014-04-17/661.html" target="_blank">黑色Html5个人博客模板主题《如影随形》30...</a></b>
          <p><i><img src="img/b06.jpg"></i>014第二版黑色Html5个人博客模板主题《如影随形》，如精灵般的影子会给人一种神秘的感觉。一张剪影图黑白...</p>
        </li>
        <li><b><a href="/jstt/bj/2015-01-09/740.html" target="_blank">【匆匆那些年】总结个人博客经历的这四年…30...</a></b>
          <p><i><img src="img/mb02.jpg"></i>博客从最初的域名购买，到上线已经有四年的时间了，这四年的时间，有笑过，有怨过，有悔过，有执着过，也...</p>
        </li>
      </ul>
    </div>
		
		
    <div class="cloud">
      <h2 class="hometitle">标签云</h2>
      <ul>
        <a href="/">陌上花开</a> <a href="/">校园生活</a> <a href="/">html5</a> <a href="/">SumSung</a> <a href="/">青春</a> <a href="/">温暖</a> <a href="/">阳光</a> <a href="/">三星</a><a href="/">索尼</a> <a href="/">华维荣耀</a> <a href="/">三星</a> <a href="/">索尼</a>
      </ul>
    </div>
		
    <div class="paihang">
      <h2 class="hometitle">站长推荐</h2>
      <ul>
        <li><b><a href="/download/div/2015-04-10/746.html" target="_blank">【活动作品】柠檬绿兔小白个人博客模板30...</a></b>
          <p><i><img src="img/t02.jpg"></i>展示的是首页html，博客页面布局格式简单，没有复杂的背景，色彩局部点缀，动态的幻灯片展示，切换卡，标...</p>
        </li>
        <li><b><a href="/download/div/2014-02-19/649.html" target="_blank"> 个人博客模板（2014草根寻梦）30...</a></b>
          <p><i><img src="img/b03.jpg"></i>2014第一版《草根寻梦》个人博客模板简单、优雅、稳重、大气、低调。专为年轻有志向却又低调的草根站长设...</p>
        </li>
        <li><b><a href="/download/div/2013-08-08/571.html" target="_blank">黑色质感时间轴html5个人博客模板30...</a></b>
          <p><i><img src="img/b04.jpg"></i>黑色时间轴html5个人博客模板颜色以黑色为主色，添加了彩色作为网页的一个亮点，导航高亮显示、banner图片...</p>
        </li>
        <li><b><a href="/download/div/2014-09-18/730.html" target="_blank">情侣博客模板系列之《回忆》Html30...</a></b>
          <p><i><img src="img/b05.jpg"></i>Html5+css3情侣博客模板，主题《回忆》，使用css3技术实现网站动画效果，主题《回忆》,分为四个主要部分，...</p>
        </li>
        <li><b><a href="/download/div/2014-04-17/661.html" target="_blank">黑色Html5个人博客模板主题《如影随形》30...</a></b>
          <p><i><img src="img/b06.jpg"></i>014第二版黑色Html5个人博客模板主题《如影随形》，如精灵般的影子会给人一种神秘的感觉。一张剪影图黑白...</p>
        </li>
        <li><b><a href="/jstt/bj/2015-01-09/740.html" target="_blank">【匆匆那些年】总结个人博客经历的这四年…30...</a></b>
          <p><i><img src="img/mb02.jpg"></i>博客从最初的域名购买，到上线已经有四年的时间了，这四年的时间，有笑过，有怨过，有悔过，有执着过，也...</p>
        </li>
      </ul>
    </div>
		
		
    <div class="weixin">
      <h2 class="hometitle">官方微信</h2>
      <ul>
        <img src="img/wx.jpg">
      </ul>
    </div>
  </div>
	
</article>
<footer>
  <p>Design by <a href="/">杨青个人博客</a> <a href="/">蜀ICP备11002373号-1</a></p>
</footer>
<script src="js/nav.js"></script>
</body>
</html>
