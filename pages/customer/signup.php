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
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $birthdate = $_POST["birthdate"];
    $gender = $_POST["gender"];

    $check_email = mysqli_num_rows(mysqli_query($conn, "SELECT email FROM users WHERE email='$email'"));
    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
    
    if($password !==$conpassword){
      $errors['password'] = "Confirm password not matched!";
    }elseif ($check_email > 0) {
      $errors['email'] = "Email that you have entered is already exist!";
     }else{
        $sql = "INSERT INTO users(firstname, lastname, username, email, phone, address, birthdate, gender , password, verification_code, email_verified_at) VALUES ('" . $firstname . "', '" . $lastname . "', '" . $username . "', '" . $email . "','" . $phone . "', '" . $address . "', '" . $birthdate . "', '" . $gender . "', '" . $encrypted_password . "', '" . $verification_code . "', NULL)";

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
        $mail->Body = '<p style="font-size: 20px";>
        <div style="background-color: #0D6EFD; width:100%; padding: 3em;"></div>
        <img src="https://cdn-icons-png.flaticon.com/512/4144/4144845.png" width="8%" height="8%"/>
        <h2><b>Verify email address.</b></h2>
        Hi '.$firstname.',     
         <br>
         <br>
        Thank you for signing up for R.J. Avanceña Store, to get started, we need to verify your email address.
        <br>
        <br>
        Your verification code is: <b style="font-size: 20px; border: 2px solid black; padding: 5px;">' . $verification_code . '</b>       
        <br>
        <br>
        Enter this code in our website to activate your account.
        <br>
        <br>
        <br>
        <b>Need Support?</b>
        <br>
        Feel free to message us if you have any questions, concerns and suggestions. We\'ll be happy to resolve your issues.
        <br>
        <br>
        Thank you!
        </p>';

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
  <?php include 'links/header.php' ?>
  <link rel="stylesheet" href="/assets/css/signup.css">
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

      <!-- Phone input -->
      <div class="col mb-4">
        <div class="form-outline">
          <input type="number" class="form-control" id="phone" name="phone"/>
          <label class="form-label" for="phone">Phone number</label>
        </div>
        <small class="errorEmail"></small>
      </div>

      <!-- Address input -->
      <div class="col mb-4">
        <div class="form-outline">
          <input type="text" class="form-control" id="address" name="address"/>
          <label class="form-label" for="address">Address</label>
        </div>
        <small class="errorEmail"></small>
      </div>

      <!-- Birthdate input -->
      <div class="col mb-4">
        <div class="input-group date" id="datepicker">
            <input type="text" class="form-control date" id="datepicker" name="birthdate">
            <span class="input-group-append">
                <span class="input-group-text bg-white">
                    <i class="fa fa-calendar"></i>
                </span>
            </span>   
          </div>
      </div>

      <!-- Gender input -->
      <div class="input-group mb-3">
          <select class="form-select" id = "genderSelect" aria-label="Default select example" name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
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

<?php include 'links/footer.php' ?>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> -->
<script src="/assets/js/datepicker.min.js"></script>

<script>
        $(function() {
            $('#datepicker').datepicker();
        });
</script>

</body>
</html>