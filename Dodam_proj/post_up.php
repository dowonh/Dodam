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

$title = $_POST['title'];
$cont = $_POST['subject'];

echo $title, ", ", $cont,", ", $user;


$sql = "INSERT INTO community1 (com_title, com_content, com_author) VALUES ('$title', '$cont', '$user')";

if(mysqli_query($conn, $sql)) {
    echo "<meta http-equiv='refresh' content='0; url=blog.html'>";
}

else
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);

mysqli_close($conn);
?>