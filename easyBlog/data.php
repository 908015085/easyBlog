<?php
	$data = ['username' => 'yangfang', 'password' => '123456']
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>php和js</title>
	</head>
	<body>
		<script>
			var data = <?php echo json_encode($data);?>
		</script>	
	</body>
</html>