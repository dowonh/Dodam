<?php
session_start();

if(!isset($_SESSION['login_user'])) {
     echo "<meta http-equiv='refresh' content='0; url=login.html'>";
}

else {
    $user=$_SESSION['login_user'];
    echo "<meta http-equiv='refresh' content='0; url=blog.html'>";
}

?>