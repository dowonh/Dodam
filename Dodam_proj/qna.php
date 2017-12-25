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



	$q_NUM = $_GET['q_id'];
	$content = $_GET['com'];
	$author = $_GET['userid'];
	$datetime = date("Y-m-d H:i:s");



    $sql = "INSERT INTO answer (answer_guestID, answer_content, answer_datetime, answer_fpNUM) VALUES ('$author', '$content', '$datetime', '$q_NUM')";
    $result = mysqli_query($conn, $sql);

    if($result) {
        $sql_count = "UPDATE footprint SET fp_comment = fp_comment + 1 WHERE fp_NUM = '$q_NUM'";
        $result_count = mysqli_query($conn, $sql_count);



	$prevPage = $_SERVER['HTTP_REFERER'];

	header('location:'.$prevPage);
    }


}
?>