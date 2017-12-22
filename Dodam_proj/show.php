<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	require_once("dbconfig.php");
?>
<?php
	$id = $_GET['id'];
	$sql = 'select * from festival where festival_id='.$id;
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
	$sql = 'select * from locale where local_id='.$id;
	$result = $db->query($sql);
	$row2 = $result->fetch_assoc();
	$sql = 'select * from period where month_id='.$id;
	$result = $db->query($sql);
	$row3 = $result->fetch_assoc();
	
	$name = $row['festival_name'];
	echo $name.'<br>';
	$content = $row['festival_content'];
	echo $content.'<br>';
	$image = $row['thumbnail'];
	echo '<img src ="'.$image.'"></image><br>';
	$homepage = $row['homepage'];
	echo '홈페이지 : '.$homepage.'<br>';
	echo '연락처  : '.$row2['phone_number'].'<br>';
	echo '장소   : '.$row2['local_name'].' '.$row2['city'].' '.$row2['detail'].'<br>';
	echo '기간   : '.$row3['start'].' ~ '.$row3['end'].'<br>';
?>