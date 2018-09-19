<?php
//数据库连接
function database() {
    require_once('./lib/mysql.class.php');
    //连接数据库
    $configArr = array(
        'host'   => 'localhost',
        'port'   => '3306',
        'user'   => 'root',
        'passwd' => 'usbw',
        'dbname' => 'gongkaike',
    );
    return $mysql = new MMysql($configArr);
}

function export($content) {
	$contentLen = mb_strlen($content, 'utf-8');
	if ($contentLen > 80) {
		return mb_substr($content, 0, 80, 'utf-8'). '...';
	}
	return $content;
}
