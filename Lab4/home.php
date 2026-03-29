<?php
    session_start();   //start session to store user data across multiple pages
    $islogin = $_SESSION['islogin'];

    if(!isset($_SESSION['userIsLogin']) || $_SESSION['userIsLogin'] === false){
        header("Location: login.php");   //redirect to login page if user is not logged in
        exit(0);
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <h1>Homepage of our App</h1>
    <form action="logout.php" method="post">
        <button type="submit">LogOut</button>
    </form>
    
</body>
</html>