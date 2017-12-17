<?php
$servername = "27.116.81.3";
$username = "hwadmin";
$password = "1234";
$dbname = "festivalhw";

function connect_db($servername, $username, $password, $dbname)
{
    return mysqli_connect($servername, $username, $password, $dbname);
}

?>
