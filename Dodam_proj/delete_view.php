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
      $total = $_GET['total'];

      if(

      $user = $_SESSION['login_user'];
      $author = $_GET['userid'];
      $festid = $_GET['festid'];

      if($user == $author) {
        $author = $user;
        $festid = $_GET['festid'];

        $sql = "SELECT * FROM view WHERE view_festID = '$festid' AND view_guestID = '$author'";
        $result = mysqli_query($conn, $sql);
        $result = mysqli_num_rows($result);

        if($result) {
            $sql_delete = "DELETE FROM view WHERE view_festID = '$festid' AND view_guestID = '$author'";
            $result_delete = mysqli_query($conn, $sql_delete);

            $prevPage = $_SERVER['HTTP_REFERER'];

            header('location:'.$prevPage);
        }

        else {
           echo "<script> alert('삭제 권한이 없습니다!');</script>";
        }
      }
    }
?>