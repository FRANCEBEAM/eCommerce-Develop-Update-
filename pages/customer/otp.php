<?php 
error_reporting(0);
  require_once "config/connection.php"; 
session_start();

$errors = array();
//VERIFICATION EMAIL FROM SIGN UP
if(isset($_POST['verify_email'])){
  $email = $_POST["email"];
  $verification_code = $_POST["verification_code"];
  $otp_code = mysqli_real_escape_string($conn, $_POST['verification_code']);
  $check_code = "SELECT * FROM users WHERE verification_code = $otp_code";
  $code_res = mysqli_query($conn, $check_code);
  if(mysqli_num_rows($code_res) > 0){
      $fetch_data = mysqli_fetch_assoc($code_res);
      $fetch_code = $fetch_data['verification_code'];
      $email = $fetch_data['email'];
      $code = 0;
      $status = 'verified';
      $update_otp = "UPDATE users SET email_verified_at = NOW() WHERE email = '" . $email . "' AND verification_code = '" . $verification_code . "'";
      $update_res = mysqli_query($conn, $update_otp);
      if($update_res){
          $_SESSION['email'] = $email;
          header('location: verified.php');
          exit();
      }else{
          $errors['otp-error'] = "Failed while updating code!";
      }
  }else{
      $errors['otp-error'] = "Incorrect verification code!";
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verification</title>
  <?php include '../customer/links/header.php' ?>

<link rel="stylesheet" href="/assets/css/verification.css">
<link rel="stylesheet" href="/assets/css/menubar.css">
</head>
<body style="background-color:  #E6E6E6;">
<nav class="navbar navbar-expand-lg navbar-light fixed-top mask-custom shadow-0">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
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
        <a class="nav-link" href="about.php">About</a>

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
          <a class="nav-link" href="/pages/customer/signin.php">
            <i class="fas fa-shopping-cart"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="main-container">
  <div class="form-container">
    <div class="head-content">
        <img src="/assets/img/Sending Email.svg" alt="">
        <h2>Check your email</h2>
        <p class="mb-0 sent">We sent a verification code to</p>
        <div class="email"><?php echo $_SESSION['email']; ?></div>
        <p class="mb-0">Please check your inbox and enter the code below.</p>
    </div>

    <form method="POST">
        <input type="hidden" name="email"  class="form-control form-control-lg" required>
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
        <input type="number" class="form-control form-control-lg" name="verification_code" placeholder="Enter 6-digits code" required />
        <br>
        <!-- <input type="submit" class="btn btn-primary btn-lg btn-block btnVerify" name="verify_email" value="Verify Email"> -->
        <button type="submit" class="btn btn-primary btn-lg btn-block btnVerify" name="verify_email">Verify Email</button>
    </form>
  </div>
</div>

<?php include 'links/footer.php' ?>

</body>
</html>