<?php
require 'config/connection.php';
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: signin.php");
}
$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$run_Sql = mysqli_query($conn, $sql);
$fetch_info = mysqli_fetch_assoc($run_Sql);
  

//IF USERS WANTS TO CHANGE THEIR PASSWORD
$user_id = $_SESSION["email"];
$passChange = "";
if (isset($_POST["btnChange"])){
  // Get all input fields
  $oldpass = $_POST["oldpass"];
  $newpass = $_POST["newpass"];
  $conpass = $_POST["conpass"];


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

				$passChange = "
                <div class='alert alert-success'>Password has been changed</div>
                ";
     
    }
    else
    {
      $passChange = "<div class='alert alert-danger'>Password does not match</div>";
    
    }
  }
  else
  {
    $passChange = "<div class='alert alert-danger'>Old password not matched</div>";
  
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Settings</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>
  <link rel="stylesheet" href="/assets/css/settings.css">
  <link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css"
  rel="stylesheet"
/>
<link rel="stylesheet" href="/assets/css/menubar.css">
</head>
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
        <a class="nav-link" aria-current="page" href="/pages/customer/home.php">Home</a>
        <a class="nav-link" href="/pages/customer/shop.php">Shop</a>
        <a class="nav-link" href="/pages/customer/about.php">About</a>
      </div>

<!-- Right elements -->
<div class="d-flex align-items-center">
  <!-- Icon -->
  <a class="text-reset me-3" href="./cart.php">
    <i class="fas fa-shopping-cart"></i>
    <span class="badge rounded-pill badge-notification bg-danger" id="cart-item"></span>
  </a>

  <!-- Notifications -->
  <div class="dropdown">
    <a
      class="text-reset me-3 dropdown-toggle hidden-arrow"
      href="#"
      id="navbarDropdownMenuLink"
      role="button"
      data-mdb-toggle="dropdown"
      aria-expanded="false"
    >
      <i class="fas fa-bell"></i>
      <span class="badge rounded-pill badge-notification bg-danger">1</span>
    </a>
    <ul
      class="dropdown-menu dropdown-menu-end"
      aria-labelledby="navbarDropdownMenuLink"
    >
    <li>
      <a class="dropdown-item" href="#">Confirm your order</a>
    </li>
    <li>
      <a class="dropdown-item" href="#">New Product Available</a>
    </li>
    <li>
      <a class="dropdown-item" href="#">Your order will deliver now</a>
    </li>
    </ul>
  </div>
  <!-- Avatar -->
  <div class="dropdown">
    <a
      class="dropdown-toggle d-flex align-items-center hidden-arrow"
      href="#"
      id="navbarDropdownMenuAvatar"
      role="button"
      data-mdb-toggle="dropdown"
      aria-expanded="false"
    >
      <img
        src="/assets/img/profile.jpg"
        class="rounded-circle"
        height="25"
        alt="Black and White Portrait of a Man"
        loading="lazy"
      />
    </a>
    <ul
      class="dropdown-menu dropdown-menu-end"
      aria-labelledby="navbarDropdownMenuAvatar"
    >
      <li>
        <a class="dropdown-item" href="./profile.php">My profile</a>
      </li>
      <li>
        <a class="dropdown-item" href="./settings.php">Settings</a>
      </li>
      <li>
        <a class="dropdown-item" href="./logout.php">Logout</a>
      </li>
    </ul>
  </div>
</div>
<!-- Right elements -->
    </div>
    
  </div>
</nav>

<body style="background-color: #E1E1EA">
  <div class="main-container">
      <div class="form-container">
      <div class="left-content">
      <div class="left-head">
        <h1>Account Setting</h1>
        <p>Fill all the information and personalize as your profile settings and security.</p>
      </div>
      <div class="img-container">
        <img src="/assets/img/settings.svg" alt="">
      </div>
      </div>
      <div class="right-content">
      <div class="right-head">
        <h1><?php echo $fetch_info['firstname']; ?> <?php echo $fetch_info['lastname']; ?></h1>
        <p><?php echo $_SESSION['email']; ?></p>
        <?php 
            if($passChange){
                ?>
                 <div class="text-danger text-sm-center">            
                   <?php echo $passChange; ?>              
                </div>
                <?php
            }
            ?>
      </div>
      <div class="form-content">
        <form method="POST" action="./settings.php" >
            <div class="oldpass mb-4">
                <h1>Old Password:</h1>
                 <input type="password" id="form2Example2" class="form-control" name="oldpass"/>
            </div>

            <div class="newpass mb-4">
                <h1>New Password:</h1>
                    <input type="password" class="form-control mt-2" id="formGroupExampleInput" name="newpass" placeholder="Enter your new password" required>
            </div>

            <div class="conpass mb-4">
                <h1>Confirm Password:</h1>
                    <input type="password" class="form-control mt-2" id="formGroupExampleInput" name="conpass" placeholder="Re-enter your new password" required>
            </div>
        <button type="submit" class="btn btn-primary btn-lg mt-4" name="btnChange">Save changes</button>
      </form>
      </div>
      </div>
      </div>
  </div>


<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"
></script>
<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/assets/js/addcart.js"></script>
</body>
</html>