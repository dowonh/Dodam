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
         if(!isset($_SESSION['login_user'])){
              echo "<meta http-equiv='refresh' content='0; url=login.php'>";
         }

         else {
               $user = $_SESSION['login_user'];



	$id = $_GET['festid'];
	$content = $_GET['com'];
	$datetime = date("Y-m-d H:i:s");



    $sql = "INSERT INTO comment (comment, festival_id, comment_name, comment_datetime) VALUES ('$content', '$id', '$user', '$datetime')";
    $result = mysqli_query($conn, $sql);

	$prevPage = $_SERVER['HTTP_REFERER'];

	header('location:'.$prevPage);


}
?>