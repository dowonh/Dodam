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

      $author = $_GET['id'];
      $content = $_GET['con'];



    }
?>