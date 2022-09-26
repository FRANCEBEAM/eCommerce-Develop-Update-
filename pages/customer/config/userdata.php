<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
//Load Composer's autoloader
require 'vendor/autoload.php';
require 'connection.php';

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


    if($password !==$conpassword){
        echo "<script>alert('Password did not match.');</script>";
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

        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        $mail->Subject = 'Email verification';
        $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

        $mail->send();
        // echo 'Message has been sent';

        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

        // connect with database
        // $conn = mysqli_connect("localhost", "root", "", "rjavancena");

        // insert in users table
        // $sql = "INSERT INTO users(firstname, lastname, username, email, password, verification_code, email_verified_at) VALUES ('" . $firstname . "', '" . $lastname . "', '" . $username . "', '" . $email . "', '" . $encrypted_password . "', '" . $verification_code . "', NULL)";
        // mysqli_query($conn, $sql);
        

 
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;

        header("Location: ../otp.php?email=" . $email);
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     }
   }
  }
}

//VERIFICATION EMAIL FROM SIGN UP
if (isset($_POST["verify_email"]))
{
    $email = $_POST["email"];
    $verification_code = $_POST["verification_code"];

    // mark email as verified
    $sql = "UPDATE users SET email_verified_at = NOW() WHERE email = '" . $email . "' AND verification_code = '" . $verification_code . "'";
    $result  = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) == 0)
    {
        die("Verification code failed.");
    }
    header("Location: verified.php");

    exit();
}




// IF USER WANTS TO SIGN IN in signin.php
// $username = "";
// $email    = "";

if (isset($_POST["signin"])){
    $email = $_POST["email"];
    $password = $_POST["password"];


    // check if credentials are okay, and email is verified
    $sql = "SELECT * FROM users WHERE email = '" . $email . "'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0)
    {
        die("Email not found.");
    }

    $user = mysqli_fetch_object($result);

    if (!password_verify($password, $user->password))
    {
        die("Password is not correct");
    }

    if ($user->email_verified_at == null)
    {
        die("Please verify your email <a href='../otp.php?email=" . $email . "'>from here</a>");
    }
    $_SESSION['email'] = $email;
      header('location: /pages/customer/home.php');
    exit();
}

//IF USERS WANTS TO UPDATE PROFILE
$success = "";
if (isset($_POST["btnSave"])) {
$phone = mysqli_real_escape_string($conn, $_POST["phone"]);
$address = mysqli_real_escape_string($conn, $_POST["address"]);
$datebirth = mysqli_real_escape_string($conn, $_POST["datebirth"]);
$gender = mysqli_real_escape_string($conn, $_POST["gender"]);


$sql = "UPDATE users SET phone='$phone', address='$address', datebirth='$datebirth', gender= '$gender' WHERE email='{$_SESSION["email"]}'";
$result = mysqli_query($conn, $sql);
if ($result) {
    $success = 'Profile updated successfully';


} else {
    echo "<script>alert('Profile can not Updated.');</script>";
    echo  $conn->error;
}
}


//IF USERS WANTS TO CHANGE THEIR PASSWORD
$user_id = $_SESSION["email"];
// Connect with database
// include "config/connect.php";

$passChange = "";
// This will be called once form is submitted
if (isset($_POST["btnChange"]))
{
  // Get all input fields
  $oldpass = $_POST["oldpass"];
  $newpass = $_POST["newpass"];
  $conpass = $_POST["conpass"];


  // Check if current password is correct
  $sql = "SELECT * FROM users WHERE email = '".$user_id."'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_object($result);
  
  if (password_verify($oldpass, $row->password))
  {
    // Check if password is same
    if ($newpass == $conpass)
    {
				// Change password
				$sql = "UPDATE users SET password = '" . password_hash($newpass, PASSWORD_DEFAULT) . "' WHERE email = '".$user_id."'";
				mysqli_query($conn, $sql);

				$passChange = "
                <div class='alert alert-success'>Password has been changed.</div>.
                ";
     
    }
    else
    {
      $passChange = "<div class='alert alert-danger'>Password does not match.</div>";
    
    }
  }
  else
  {
    $passChange = "<div class='alert alert-danger'>Old password is not correct.</div>";
  
  }
}



?>