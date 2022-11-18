<?php
error_reporting(0);
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



$firstname = htmlspecialchars(trim($_POST['firstname']));
$lastname = htmlspecialchars(trim($_POST['lastname']));
$email = htmlspecialchars(trim($_POST['email']));
$password = htmlspecialchars(trim($_POST['password']));

  
  if (empty($firstname) || empty($lastname) || empty($email) || empty($password)) {
    echo '<div class="bg-danger text-white p-3 rounded-4">Please fill all required field</div>';
    }else{

    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);


    $sql = "INSERT INTO users(firstname, lastname, email, phone, address, birthdate, gender , password, verification_code, email_verified_at) VALUES ('" . $firstname . "', '" . $lastname . "', '" . $email . "','" . $phone . "', '" . $address . "', '" . $birthdate . "', '" . $gender . "', '" . $encrypted_password . "' ,'" . $verification_code . "', NULL)";

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

  

        // header("Location: otp.php?email=" . $email);
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     }
   }
    }
    

    // if ($res = mysqli_query($conn, $sql)) {
    //     echo '<div class="alert alert-success">data successfully inserted</div>';
    // } 






?>