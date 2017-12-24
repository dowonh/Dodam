<?php
    session_start();
    if(isset($_SESSION['login_user'])){
        unset($_SESSION['login_user']);
        session_destroy();

         echo "<meta http-equiv='refresh' content='0; url=index.html'>";

        exit();
    }
    echo "logout error";
?>