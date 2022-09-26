<?php 
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
//Load Composer's autoloader
require 'config/vendor/autoload.php';
require 'config/connection.php';

$username = "";
$firstname ="";
$email = "";
$errors = array();

// IF USERS WANTS TO SIGNUP IN signup.php
if (isset($_POST["signup"])){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $conpassword = $_POST["conpassword"];

    $check_email = mysqli_num_rows(mysqli_query($conn, "SELECT email FROM users WHERE email='$email'"));
    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
    
    if($password !==$conpassword){
      $errors['password'] = "Confirm password not matched!";
    }elseif ($check_email > 0) {
      $errors['email'] = "Email that you have entered is already exist!";
     }else{
        $sql = "INSERT INTO users(firstname, lastname, username, email, password, verification_code, email_verified_at) VALUES ('" . $firstname . "', '" . $lastname . "', '" . $username . "', '" . $email . "', '" . $encrypted_password . "', '" . $verification_code . "', NULL)";
        $result = mysqli_query($conn, $sql);

    
    if($result){

    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

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

        // $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        $mail->Subject = 'Email verification';
        $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

        $mail->send();
        // echo 'Message has been sent';

        // $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

        $_SESSION['info'] = $info;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;

        header("Location: ../customer/otp.php?email=" . $email);
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     }
   }
  }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>
  <link rel="stylesheet" href="/assets/css/signup.css">
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
    <div class="left-content" data-aos="zoom-in">
        <img class="" src="/assets/img/signup.svg" alt="">
    </div>

    <div class="right-content">
      <h1>Create New Account <span><img src="/assets/img/fire.png" alt=""></span></h1>
      <small>Please fill in the forms to continue.</small>
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
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row">
          <div class="col">
            <div class="form-outline mb-3">
              <input type="text" class="form-control" id="firstName" name="firstname"/>
              <label class="form-label" for="firstName">First name</label>
            </div>
            <small class="errorFirst"></small>
          </div>
          <div class="col mb-4">
            <div class="form-outline">
              <input type="text" id="lastName" class="form-control" name="lastname"/>
              <label class="form-label" for="lastName">Last name</label>
            </div>
            <small class="errorLast"></small>
          </div>
        </div>

          <!-- Username input -->
          <div class="col mb-4">
          <div class="form-outline">
            <input type="text" class="form-control" id="username" name="username"/>
            <label class="form-label" for="username">Username</label>
          </div>
          <small class="errorUsername"></small>
        </div>

        <!-- Email input -->
        <div class="col mb-4">
        <div class="form-outline">
          <input type="email" class="form-control" id="email" name="email"/>
          <label class="form-label" for="email">Email address</label>
        </div>
        <small class="errorEmail"></small>
      </div>
      
        <!-- Password input -->
        <div class="col mb-4">
        <div class="form-outline">
          <input type="password" class="form-control" id="password" name="password"/>
          <label class="form-label" for="password">Password</label>
        </div>
        <small class="errorPass"></small>
      </div>

        <!-- Confirm Password input -->
        <div class="col mb-4">
        <div class="form-outline">
          <input type="password" class="form-control" id="conpassword" name="conpassword"/>
          <label class="form-label" for="conpassword">Confirm Password</label>
        </div>
        <small class="errorConpass"></small>
      </div>
      
        <!-- Checkbox -->
        <div class="form-check d-flex justify-content-center mb-4 mt-5">
          <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" required/>
          <label class="form-check-label" for="form2Example33">
            I agree to terms & conditions.
          </label>
        </div>
      
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-lg btn-block mb-4" name="signup">Sign up</button>
      
      </form>
    </div>
  </div>
</div>
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"
></script>
<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
<script>
  AOS.init();
</script>
<!-- <script src="/assets/js/signupConfig.js"></script> -->
</body>
</html>