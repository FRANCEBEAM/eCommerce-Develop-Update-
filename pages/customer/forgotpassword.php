<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
$errors = array();
//Load Composer's autoloader
require 'config/vendor/autoload.php';
require 'config/connection.php';
    // IF USER FORGET THE PASSWORD THEN CONTINUE BUTTON
    if (isset($_POST["checkEmail"])){
      $email = mysqli_real_escape_string($conn, $_POST['email']);

      $check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
      $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
      $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

      if(mysqli_num_rows($check_email) > 0){

          $mail = new PHPMailer(true);

          $message= '<p>Your reset verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
      
          try {
              //Enable verbose debug output
              $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
      
              //Send using SMTP
              $mail->isSMTP();
      
              //Set the SMTP server to send through
              $mail->Host = 'smtp.gmail.com';
      
              //Enable SMTP authentication
              $mail->SMTPAuth = true;
      
              //SMTP username
              $mail->Username = 'beefsassy2.8@gmail.com';
      
              //SMTP password
              $mail->Password = 'bnugdfwfkpyamfyz';
      
              //Enable TLS encryption;
              $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      
              //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
              $mail->Port = 587;
      
              //Recipients
              $mail->setFrom('beefsassy2.8@gmail.com', 'rjavancena.com');
              $mail->addAddress($_POST["email"]);
      
              //Add a recipient
              $mail->addAddress($email);
      
              //Set email format to HTML
              $mail->isHTML(true);
      
              $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
      
              $mail->Subject = 'Your reset code';
              $mail->Body    = $message;
      
              $mail->send();

              $_SESSION['info'] = $info;
              $_SESSION['email'] = $email;


            $info = "We've sent a passwrod reset otp to your email - $email";
              header("Location: ../customer/newpassword.php");
              exit();
          } catch (Exception $e) {
              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
           }
         }else {
          echo "<script>alert('Email not found.');</script>";
        }
      }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>
  <link rel="stylesheet" href="/assets/css/forgot.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css"
  rel="stylesheet"/>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
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
        <h2 class="mb-5">Forgot Password</h2>
        <img class="mb-4" src="/assets/img/forgot.png" alt="">
        <p class="mb-0">Please enter your email address to recieve a verification code.</p>
    </div>

    <?php
      if(count($errors) > 0){
          ?>
          <div class="alert alert-danger text-center">
              <?php 
                  foreach($errors as $error){
                      echo $error;
                  }
              ?>
          </div>
          <?php
      }
  ?>

    <form method="POST">


        <input type="text" class="form-control form-control-lg" name="email" placeholder="Your email address" required  value="<?php echo $email ?>">
        <br>

        <button type="submit" class="btn btn-primary btn-lg btn-block btnVerify" name="checkEmail">Continue</button>
    </form>
  </div>
</div>

<script type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"
></script>
<script>
  AOS.init();
</script>
<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
<script src="/assets/js/signInConfig.js"></script>
</body>
</html>