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
        $url = 'login.php';
        header("location: $url");
    }

    else
      $user = $_SESSION['login_user'];

$content = $_POST['fp'];
$datetime = date("Y-m-d H:i:s");


$sql = "INSERT INTO footprint (fp_author, fp_content, fp_datetime) VALUES ('$user', '$content', '$datetime')";

if(mysqli_query($conn, $sql)) {
    echo "<meta http-equiv='refresh' content='0; url=contact.html'>";
}

else
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);

mysqli_close($conn);
?>