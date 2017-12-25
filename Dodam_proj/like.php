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



	$id = $_POST['id'];
	$datetime = date("Y-m-d H:i:s");

    $sql = "select * from heart where like_guestID = '$user' and like_festID = '$id'";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_num_rows($result);

    if(!$result) {
      $sql = "insert into heart (like_guestID, like_festID, like_datetime) VALUES ('$user', '$id', '$datetime')";
    $sql2 = "update festival set like_count = like_count + 1 where festival_id = '$id' ";
    }

    else {
        $sql = "UPDATE festival SET like_count = like_count - 1 WHERE festival_id = '$id' ";
        		$sql2 = "DELETE FROM heart WHERE like_guestID = '$user' and like_festID = '$id'";
    }

	mysqli_query($conn, $sql);
	mysqli_query($conn, $sql2);

	$prevPage = $_SERVER['HTTP_REFERER'];

	header('location:'.$prevPage);
}
?>