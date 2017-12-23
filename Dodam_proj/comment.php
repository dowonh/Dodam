<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	require_once("dbconfig.php");
?>
<?php
	$number = (int)$_GET['count']+1;
	$sql = 'insert into comment values('.$number.',"'.$_GET['comment'].'",'.$_GET['id'].','.$_GET['point'].',"'.$_GET['name'].'","'.$_GET['password'].'",'.$_GET['islogin'].')';
	echo $sql;
	$db->query($sql);
	$prevPage = $_SERVER['HTTP_REFERER'];
	header('location:'.$prevPage);
?>