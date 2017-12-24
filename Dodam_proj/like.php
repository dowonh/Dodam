<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	require_once("dbconfig.php");
?>
<?php
    session_start();

    if(!isset($_SESSION['login_user'])){
         echo "<meta http-equiv='refresh' content='0; url=login.php'>";
    }

    else {
          $user = $_SESSION['login_user'];
    }

	$id = $_GET['id'];

	$sql = 'update festival set like_count = like_count + 1 where festival_id='.$id;
	$db->query($sql);

	$prevPage = $_SERVER['HTTP_REFERER'];

	header('location:'.$prevPage);
?>