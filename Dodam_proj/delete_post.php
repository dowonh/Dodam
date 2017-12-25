<?php
$servername = "27.116.81.3";
$username = "hwadmin";
$password = "1234";
$dbname = "festivalhw";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_query("set names euckr");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

session_start();

if(!isset($_SESSION['login_user'])){
        echo "<meta http-equiv='refresh' content='0; url=login.php'>";
    }

    else {
      $user = $_SESSION['login_user'];
      $comid = $_GET['comid'];
      $festid = $_GET['festid'];
      $author = $_GET['author'];


      if($user == $author) {
        $author = $user;

        $sql = "SELECT * FROM community1 WHERE com_NUM = '$comid'";
        $result = mysqli_query($conn, $sql);
        $result = mysqli_num_rows($result);

        if($result) {
            $sql_delete = "DELETE FROM community1 WHERE com_NUM = '$comid'";
            $result_delete = mysqli_query($conn, $sql_delete);

            echo "<script> alert('삭제 완료!');</script>";
            echo "<meta http-equiv='refresh' content='0; url=blog.html'>";
        }

        else {
           echo "<script> alert('삭제 권한이 없습니다!');</script>";
        }
      }
    }
?>