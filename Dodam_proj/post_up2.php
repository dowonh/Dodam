

<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	require_once("dbconfig.php");
?>
<?php
$servername = "27.116.81.3";
$username = "hwadmin";
$password = "1234";
$dbname = "festivalhw";

// Create connection
/*
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_query("set names euckr");
*/
// Check connection
/*
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
*/
session_start();

if(!isset($_SESSION['login_user'])){
        $url = 'login.php';
        header("location: $url");
    }

    else
      $user = $_SESSION['login_user'];

$title = $_POST['title'];
$cont = $_POST['subject'];
$datetime = date("Y-m-d H:i:s");
$fest_name = $_REQUEST['myInput'];
/*
$sql = "INSERT INTO community1 (com_title, com_content, com_author, com_datetime) VALUES ('$title', '$cont', '$user', '$datetime')";

if(mysqli_query($conn, $sql)) {
    echo "<meta http-equiv='refresh' content='0; url=blog.html'>";
}

else
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);

mysqli_close($conn);
*/

$sql = 'select festival_id from festival where festival_name = "'.$fest_name.'"';
$result = $db->query($sql);
$row = $result->fetch_assoc();
$fest_id = $row['festival_id'];

$sql = 'insert into community1 (com_title, com_content, com_author, com_datetime, festival_id) values("'.$title.'","'.$cont.'","'.$user.'","'.$datetime.'","'.$fest_id.'")';
echo $sql;
$result1 = $db->query($sql);


echo "<meta http-equiv='refresh' content='0; url=blog.html'>";


?>