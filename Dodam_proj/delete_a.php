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
      $q_NUM = $_GET['q_id'];

      if($user == $author) {
        $author = $user;
        $content = $_GET['content'];

        $sql = "SELECT * FROM answer WHERE answer_fpNUM = '$q_NUM' AND answer_content = '$content' AND answer_guestID = '$author'";
        $result = mysqli_query($conn, $sql);
        $result = mysqli_num_rows($result);

        if($result) {
            $sql_delete = "DELETE FROM answer WHERE answer_fpNUM = '$q_NUM' AND answer_content = '$content' AND answer_guestID = '$author'";
            $result_delete = mysqli_query($conn, $sql_delete);

                $sql_update = "UPDATE footprint SET fp_comment = fp_comment - 1 WHERE fp_NUM = '$q_NUM'";
                $result_update = mysqli_query($conn, $sql_update);

                $prevPage = $_SERVER['HTTP_REFERER'];

                 header('location:'.$prevPage);


         }
        }


        else {
           echo "<script> alert('삭제 권한이 없습니다!');</script>";
           echo "<meta http-equiv='refresh' content='0; url=contact.html'>";

        }

}
?>