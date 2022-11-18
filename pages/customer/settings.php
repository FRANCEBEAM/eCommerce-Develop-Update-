<?php

  require 'config/connection.php';
  session_start();
  if (!isset($_SESSION['email'])) {
      header("Location: signin.php");
  }
  $user_id = $_SESSION["email"];
  $email = $_SESSION['email'];
  $sql = "SELECT * FROM users WHERE email = '$email'";
  $run_Sql = mysqli_query($conn, $sql);
  $fetch_info = mysqli_fetch_assoc($run_Sql);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Settings</title>
  <?php include 'links/header.php' ?>
  <link rel="stylesheet" href="/assets/css/settings.css">
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
    <i class="fas fa-shopping-cart fa-lg"></i>
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
      <i class="fas fa-bell fa-lg"></i>
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
    <?php
         $email = $_SESSION['email'];
         $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="upload/default.png" class="rounded-circle"
            height="25">';
         }else{
            echo '<img src="upload/'.$fetch['image'].'" class="rounded-circle"
            height="25">';
         }
      ?>
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

<body>
  <div class="main-container">
      <div class="form-container">
      <div class="left-content">
      <div class="left-head">
        <h1>Account Setting</h1>
        <p>Fill all the information and personalize as your profile settings and security.</p>
      </div>
      <div class="img-container">
        <img src="/assets/img/accountSec.svg" alt="">
      </div>
      </div>
      <div class="right-content">
      <div class="right-head">
        <h1><?php echo $fetch_info['firstname']; ?> <?php echo $fetch_info['lastname']; ?></h1>
        <p><?php echo $_SESSION['email']; ?></p>
         <div id="message"></div>
      </div>
      <div class="form-content">
        <form method="POST" id="form">
            <div class="oldpass mb-4">
                <h1>Old Password:</h1>
                 <input type="password" id="oldpass" class="form-control" name="oldpass"/>
            </div>

            <div class="newpass mb-4">
                <h1>New Password:</h1>
                    <input type="password" class="form-control mt-2" id="newpass" name="newpass" placeholder="Enter your new password" required>
                    <small class="errorPass text-danger mb-4" id="errorPassword"></small>
            </div>

            <div class="conpass mb-4">
                <h1>Confirm Password:</h1>
                    <input type="password" class="form-control mt-2" id="conpass" name="conpass" placeholder="Re-enter your new password" required>
                    <small class="errorConpass text-danger mb-4" id="errorConPass"></small>
            </div>
        <button type="button" class="btn btn-primary btn-lg mt-4" id="btnChange" name="btnChange">Save changes</button>
      </form>
      </div>
      </div>
      </div>
  </div>

  <?php include 'links/footer.php' ?>
<script src="/assets/js/settingsConfig.js"></script>
<script src="/assets/js/addcart.js"></script>
</body>
</html>