<?php
$servername = "27.116.81.3";
$username = "hwadmin";
$password = "1234";
$dbname = "festivalhw";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

$g_name = $g_pw = "";

$g_name = $_POST['uname'];
$g_pw = $_POST['psw'];

$sql = "SELECT * FROM guest WHERE guest_ID = '$g_name' and guest_password = '$g_pw'";
$result = mysqli_query($conn, $sql);
$result = mysqli_num_rows($result);

if($result) {
    $sql = "UPDATE guest SET guest_login = 1 WHERE guest_ID = '$g_name'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        $_SESSION['login_user']=$g_name;

        echo "<meta http-equiv='refresh' content='0; url=index_Login.html'>";
        }
}

else {
      echo "<script> alert('비밀번호를 입력해주세요!');</script>";
    echo "<meta http-equiv='refresh' content='0; url=login.html'>";
}

mysqli_close($conn);


?>
