<?php

require 'connection.php';

session_start();
if (!isset($_SESSION['email'])) {
    header("Location: signin.php");
}
$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$run_Sql = mysqli_query($conn, $sql);
$fetch_info = mysqli_fetch_assoc($run_Sql);

  // Get all input fields
$user_id = $_SESSION["email"];
$oldpass = $_POST["oldpass"];
$newpass = $_POST["newpass"];
$conpass = $_POST["conpass"];

//IF USERS WANTS TO CHANGE THEIR PASSWORD
if (isset($_POST["newpass"])){


  // Check if current password is correct
  $sql = "SELECT * FROM users WHERE email = '".$user_id."'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_object($result);
  
  if (password_verify($oldpass, $row->password)){
    // Check if password is same
    if ($newpass == $conpass)
    {
				// Change password
				$sql = "UPDATE users SET password = '" . password_hash($newpass, PASSWORD_DEFAULT) . "' WHERE email = '".$user_id."'";
				mysqli_query($conn, $sql);

				echo "
                <div class='alert alert-success'><i class='far fa-check-circle'></i> Password has been changed</div>
                ";
     
    }
    else
    {
      echo "<div class='alert alert-danger p-4 rounded-4'><i class='fas fa-exclamation-circle'> Password does not match</div>";
    
    }
  }
  else
  {
    echo "<div class='alert alert-danger p-4 rounded-4'><i class='fas fa-exclamation-circle'></i> Old password not matched</div>";
  
  }
}
?>