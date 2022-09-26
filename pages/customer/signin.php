<?php 

session_start();
require 'config/connection.php';
$errors = array();
// IF USER WANTS TO SIGN IN in signin.php
// if (isset($_POST["signin"])){
//   $email = $_POST["email"];
//   $password = $_POST["password"];


//   // check if credentials are okay, and email is verified
//   $sql = "SELECT * FROM users WHERE email = '" . $email . "'";
//   $result = mysqli_query($conn, $sql);

//   if (mysqli_num_rows($result) == 0)
//   {
//       die("Email not found.");
//   }

//   $user = mysqli_fetch_object($result);

//   if (!password_verify($password, $user->password))
//   {
//       die("Password is not correct");
//   }

//   if ($user->email_verified_at == null)
//   {
//       // die("Please verify your email <a href='../otp.php?email=" . $email . "'>from here</a>");
//       $errors['email-error'] = "Please verify your email <a href='../otp.php?email=" . $email . "'>here</a>";
//   }
//   $_SESSION['email'] = $email;
//     header('location: /pages/customer/home.php');
//   exit();
// }

    //IF USER WANTS TO LOGIN
    if(isset($_POST['signin'])){
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      $check_email = "SELECT * FROM users WHERE email = '$email'";

      $res = mysqli_query($conn, $check_email);
   
      if(mysqli_num_rows($res) > 0){
          $fetch = mysqli_fetch_assoc($res);
          $fetch_pass = $fetch['password'];
          if(password_verify($password, $fetch_pass)){
              $_SESSION['email'] = $email;
              $status = $fetch['email_verified_at'];
              $usertype = $fetch['usertype'];
              if($status == null){
                  $info = "It's look like you haven't still verify your email - $email";
                  $_SESSION['info'] = $info;
                  header('location: otp.php');
              }else{
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                  header('location: home.php');
              }
          }else{
              $errors['email'] = "Incorrect email or password!";
          }
      }else{
          $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
      }
  }


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign in</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>
  <link rel="stylesheet" href="/assets/css/signin.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css"
  rel="stylesheet"/>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<link rel="stylesheet" href="/assets/css/menubar.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top mask-custom shadow-0">
    <div class="container-fluid">
      <a class="navbar-brand" href="/index.php">
        <img src="/assets/img/avancenalogo.svg" alt="" width="80%">
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav me-auto">
          <a class="nav-link" aria-current="page" href="/index.php">Home</a>
          <a class="nav-link" href="/pages/customer/signin.php">Shop</a>
          <a class="nav-link" href="/about.php">About</a>
  
        </div>
  
        <ul class="navbar-nav d-flex flex-row">
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" href="/pages/customer/signin.php">
              Sign in
            </a>
          </li>
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" href="/pages/customer/signup.php">
              Sign up
            </a>
          </li>
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" href="./signin.php">
              <i class="fas fa-shopping-cart"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<div class="main-container">
  <div class="form-container">
    <div class="left-content">
        <img data-aos="zoom-in" class="" src="/assets/img/Secure login.svg" alt="">
    </div>

    <div class="right-content" data-aos="zoom-in">
      <h1>Welcome Back <span><img src="/assets/img/wavehand.png" alt=""></span></h1>
      <small>We Happy to see you Again. To use your account you should log in first.</small>
      <?php
        if(count($errors) > 0){
          ?>
          <div class="text-danger text-sm-center">
              <?php
              foreach($errors as $showerror){
                  echo $showerror;
              }
              ?>
          </div>
          <?php
        }
          ?>
      <form id="form" class="form" method="POST">
        <!-- Email input -->
        <div class="col">
        <div class="form-outline">
          <input type="email" id="email" class="form-control form-control-lg" name="email"/>
          <label class="form-label" for="email"><i class="fas fa-user-alt" ></i> Email address</label>
        </div>
        <small class="errorEmail"></small>
        </div>
      
        <!-- Password input -->
        <div class="col">
        <div class="form-outline">
          <input type="password" id="password" class="form-control form-control-lg" name="password"/>
          <label class="form-label" for="password"><i class="fas fa-unlock"></i> Password</label>
        </div>
        <small class="errorPass"></small>
       </div>
        
      
        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4 mt-5">
          <div class="col d-flex justify-content-center">
            <!-- Checkbox -->
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="form2Example34" checked />
              <label class="form-check-label" for="form2Example34"> Remember me </label>
            </div>
          </div>
      
          <div class="col">
            <!-- Simple link -->
            <a href="#!">Forgot password?</a>
          </div>
        </div>
      
        <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-lg btn-block btnSignin" name="signin">Sign in</button>
      
        <!-- Register buttons -->
        <div class="text-center mt-4">
          <p>Not a member? <a href="./signup.php">Register</a></p>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"
></script>
<script>
  AOS.init();
</script>
<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
<!-- <script src="/assets/js/signInConfig.js"></script> -->
</body>
</html>