<?php

require 'connection.php';

$oldpass = $_POST["oldpass"];
$newpass = $_POST["newpass"];
$conpass = $_POST["conpass"];

//IF USERS WANTS TO CHANGE THEIR PASSWORD
// $user_id = $_SESSION["email"];
$passChange = "";
if (isset($_POST["oldpass"])){
  // Get all input fields
  $user_id = $_SESSION["email"];
//   $oldpass = $_POST["oldpass"];
//   $newpass = $_POST["newpass"];
//   $conpass = $_POST["conpass"];


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
                <div class='alert alert-success'>Password has been changed</div>
                ";
     
    }
    else
    {
      echo "<div class='alert alert-danger'>Password does not match</div>";
    
    }
  }
  else
  {
    echo "<div class='alert alert-danger'>Old password not matched</div>";
  
  }
}
?>