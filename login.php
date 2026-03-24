<?php
 
  session_start();   //start session to store user data across multiple pages

  if(isset($_SESSION['userIsLogin']) && $_SESSION['userIsLogin'] === true){
    header("Location: home.php");   //redirect to home page if user is already logged in
    exit;
  }

//Get Request vs Post Request
// print_r($_GET);       //?name=john&surname=harry =>query parameter

//Handle Post Request
// echo"<pre>";
// print_r(($_SERVER));
// echo"</pre>";

if($_SERVER['REQUEST_METHOD'] === 'POST') {

$formData = $_POST;     //form data

//Setcookie using php
// setcookie("email","john@gmail.com", time() + 86400);
// $cookies= $_COOKIE;
// print_r($cookies);


$_SESSION['islogin']  = true;   //set data to session variable to indicate user is logged in


$registeredUsers =[
  'john@gmail.com'=>'abc12345'
];
   
$email=  trim($formData['email']);
$password= $formData['password'];  

$errors=[];
      
      //email validation
      if($email==''){
        $errors['email']="Email is required";
      }
      else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        $errors['email']="Invalid email format";
      }else if(!in_array($email,array_keys($registeredUsers))){
        $errors['email']="Email is not registered";
      }


      //password validation
      if($password==''){
        $errors['password']="Password is required";
      }
      if(strlen($password) < 6){
        $errors['password']="Password must be at least 6 characters";
      } 



      if(empty($errors)){
        // echo "Form is valid. Proceed with registration."; 

        //check password
        if($password === $registeredUsers[$email]){
            //login
            $_SESSION['userIsLogin'] = true;   //set session variable to indicate user is logged in
            header("Location: home.php");           //REDIRECTS GARNEY TO THE HOME.PHP
        }else{
            $errors['password']="Incorrect password";
        }
      }

      // if(isset($errors['fullname'])){
      //   return $errors['fullname'];
      // }
      // else{
      //   return '';
      // }

      // isset($errors['fullname']) ? $errors['fullname'] : '';
}
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login page</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container">
      <form action="/login.php" name="loginForm" method="post">
        <h2>Login</h2>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="<?= isset($errors['email']) ? 'error-input' : '' ?>"
                                 name="email" id="email" />
          <span class="error-text" id="emailErrorText">
            <?= isset($errors['email']) ?$errors['email'] : ''; ?>
          </span>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="<?= isset($errors['password']) ? 'error-input' : '' ?>"
                                 name="password" id="password" />
          <span class="error-text" id="passwordErrorText">
            <?= isset($errors['password']) ?$errors['password'] : ''; ?>
            </span>
        </div>


        <button type="submit" class="registerBtn">Register</button>
      </form>
    </div>
    <!-- <script src="./script.js"></script> -->
  </body>
</html>
