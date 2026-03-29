<?php

//Get Request vs Post Request
// print_r($_GET);       //?name=john&surname=harry =>query parameter

//Handle Post Request
// echo"<pre>";
// print_r(($_SERVER));
// echo"</pre>";

if($_SERVER['REQUEST_METHOD'] === 'POST') {

$formData = $_POST;     //form data

$registeredEmails =[
  'john@example.com',
  'jane@example.com'
];

$name= htmlspecialchars(trim($formData['fullname']));     //space trim garxa
$email=  trim($formData['email']);
$password= $formData['password'];  
$confirmPassword = $formData['confirmpassword'];
$errors=[];
      //name validation
      if($name ===''){
        $errors['fullname']= "Name is required";
      }

      if(strlen($name) < 3){
        $errors['fullname']= "Name must be at least 3 characters";
      }
      
      //email validation
      if($email==''){
        $errors['email']="Email is required";
      }
      else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        $errors['email']="Invalid email format";
      }else if(in_array($email,$registeredEmails)){
        $errors['email']="Email is already registered";
      }


      //password validation
      if($password==''){
        $errors['password']="Password is required";
      }
      if(strlen($password) < 6){
        $errors['password']="Password must be at least 6 characters";
      } 

      //confirm password validation
      if($confirmPassword==''){
        $errors['confirmPassword']="Confirm Password is required";
      }
      if($password !== $confirmPassword){
        $errors['confirmPassword']="Passwords do not match";
      }

      if(empty($errors)){
        // echo "Form is valid. Proceed with registration."; 
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
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container">
      <form action="/index.php" name="registerForm" method="post">
        <h2>Create an account</h2>

        <div class="form-group">
          <label for="fullname">Name</label>
          <input type="text" class="<?= isset($errors['fullname']) ? 'error-input' : '' ?>"
                                  name="fullname" id="fullname" />
          <span class="error-text" id="fullnameErrorText">
           <?= isset($errors['fullname']) ?$errors['fullname'] : ''; ?>   <!-- //"" is same as echo -->
          </span>
        </div>

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

        <div class="form-group">
          <label for="confirmpassword">ConfirmPassword</label>
          <input type="password" class="<?= isset($errors['confirmPassword']) ? 'error-input' : '' ?>"
                                 name="confirmpassword" id="confirmpassword" />
          <span class="error-text" id="confirmpasswordErrorText">
            <?= isset($errors['confirmPassword']) ?$errors['confirmPassword'] : ''; ?>
          </span> 
        </div>

        <button type="submit" class="registerBtn">Register</button>
      </form>
    </div>
    <!-- <script src="./script.js"></script> -->
  </body>
</html>
