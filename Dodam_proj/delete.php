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
      $author = $_GET['userid'];

      if($user == $author) {
        $author = $user;
        $content = $_GET['content'];
        $festid = $_GET['festid'];

        $sql = "SELECT * FROM comment WHERE festival_id = '$festid' AND comment = '$content' AND comment_name = '$author'";
        $result = mysqli_query($conn, $sql);
        $result = mysqli_num_rows($result);

        if($result) {
            $sql_delete = "DELETE FROM comment WHERE festival_id = '$festid' AND comment = '$content' AND comment_name = '$author'";
            $result_delete = mysqli_query($conn, $sql_delete);

            $prevPage = $_SERVER['HTTP_REFERER'];

            header('location:'.$prevPage);
        }

        else {
            echo "Fail";
        }
      }
    }
?>