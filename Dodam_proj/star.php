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

	$festid = $_GET['festid'];
	$guestid = $_GET['userid'];
	$value = $_GET['star'];
	$total = 0;
	$average = 0;

    $sql = "SELECT * FROM star WHERE star_guest = '$guestid' AND star_festival = '$festid'";
    $result = mysqli_query($conn, $sql);
    $resultNum = mysqli_num_rows($result);

    if(!$resultNum) {
    $sql = "INSERT INTO star (star_guest, star_festival, star_total) VALUES ('$guestid', '$festid', '$value')";
    $result = mysqli_query($conn, $sql);

    $sql2 = "SELECT star_total FROM star WHERE star_festival = '$festid'";
    $result2 = mysqli_query($conn, $sql2);
    while($row = mysqli_fetch_assoc($result2)) {
        $total = $total + $row['star_total'];
    }

    $num = mysqli_num_rows($result2);
    $average = $total / $num;

    $sql3 = "UPDATE festival SET festival_star = $average WHERE festival_id = '$festid'";
    $result3 = mysqli_query($conn, $sql3);

   $prevPage = $_SERVER['HTTP_REFERER'];

   header('location:'.$prevPage);
}
    else {
        $sql = "UPDATE star SET star_total=$value WHERE star_guest = '$guestid' AND star_festival = '$festid'";
        $result = mysqli_query($conn, $sql);

        $sql2 = "SELECT star_total FROM star WHERE star_festival = '$festid'";
            $result2 = mysqli_query($conn, $sql2);
            while($row = mysqli_fetch_assoc($result2)) {
                $total = $total + $row['star_total'];
            }

            $num = mysqli_num_rows($result2);
            $average = $total / $num;

            $sql3 = "UPDATE festival SET festival_star = $average WHERE festival_id = '$festid'";
            $result3 = mysqli_query($conn, $sql3);

            echo $average;

        $prevPage = $_SERVER['HTTP_REFERER'];

        header('location:'.$prevPage);
    }

}
?>