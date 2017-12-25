<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);  //에러 발생시 표시하기 위한 부분

include("firstcon.php");

$connect=connect_db($servername, $username, $password, $dbname);

$guest_ID = $_POST['guest_ID'];
$guest_password = $_POST['guest_password'];
$guest_age = $_POST['guest_age'];
$guest_local = $_POST['guest_local'];

$query = "UPDATE guest SET guest_password = '$guest_password', guest_age = '$guest_age', guest_local = '$guest_local' WHERE guest_ID = '$guest_ID' ";
$result = mysqli_query($connect, $query);


mysqli_close($connect);



echo ('수정이 완료되었습니다. 이전 화면으로 이동합니다..');
echo("<meta http-equiv='Refresh' content='2; URL=about.html'>");

?>
