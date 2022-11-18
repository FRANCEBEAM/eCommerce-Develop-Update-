<?php
// error_reporting(0);
require '../config/connection.php';
session_start();
$errors = array();





    //IF USER CLICK THE CHANGE PASSWORD BUTTON
//     if(isset($_POST['resetPassword'])){
//       $_SESSION['info'] = "";
//       $password = $_POST['password'];
//       $cpassword = $_POST["cpassword"];
//       if($password !== $cpassword){
//           $errors['password'] = "Confirm password not matched!";
//       }else{
//           $code = 0;
//           $email = $_SESSION['email']; //getting this email using session
//           $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
//           $update_pass = "UPDATE users SET verification_code = $code, password = '$encrypted_password' WHERE email = '$email'";
//           $run_query = mysqli_query($conn, $update_pass);
//           if($run_query){
//               $info = "Your password changed. Now you can login with your new password.";
//               $_SESSION['info'] = $info;
//               header("Location: ../customer/changed.php");
//           }else{
//               $errors['db-error'] = "Failed to change your password!";
//           }
//       }
//   }


//   $password = $_POST['password'];
//   $cpassword = $_POST["cpassword"];
    $password = $_POST['password'];

        $code = 0;
      
        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
        $update_pass = "UPDATE users SET verification_code = $code, password = '$encrypted_password' WHERE email = '$email'";
        $run_query = mysqli_query($conn, $update_pass);
        if($run_query){
            $info = "Your password changed. Now you can login with your new password.";
            $_SESSION['info'] = $info;
            // header("Location: ../customer/changed.php");
        }



?>