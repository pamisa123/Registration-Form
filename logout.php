<?php
    session_start();  //start session to access session variables
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        session_destroy();  //destroy session to log out user
        header("Location: login.php");  //redirect to login page after logout
    }
?>