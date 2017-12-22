<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);  //에러 발생시 표시하기 위한 부분

include("firstcon.php");

$connect=connect_db($servername, $username, $password, $dbname);

$data_stream = "'".$_POST['guest_ID']."', '".$_POST['guest_password']."', '".$_POST['guest_age']."', '".$_POST['guest_local']."'";
$query = "insert into guest(guest_ID, guest_password, guest_age, guest_local) values (".$data_stream.")";
$result = mysqli_query($connect, $query);

mysqli_close($connect);

echo ('가입이 완료되었습니다. 메인 화면으로 이동합니다..');
echo("<meta http-equiv='Refresh' content='2; URL=index.html'>");

?>
