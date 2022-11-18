<?php
include 'connection.php';

if(!empty($_POST["email"])) {
  $query = "SELECT * FROM users WHERE email='" . $_POST["email"] . "'";
  $result = mysqli_query($conn,$query);
  $count = mysqli_num_rows($result);
  if($count>0) {
    echo "<span class='text-danger'>Email address already exist</span>";
    echo "<script>$('#btnSignup').prop('disabled',true);</script>";
  }else{
    echo "<script>$('#btnSignup').prop('disabled',false);</script>";
  }
}
?>