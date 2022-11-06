<?php
error_reporting(0);
require 'config/connection.php';
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: signin.php");
}

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
  <title>About</title>
  <?php include 'links/header.php' ?>
  <link rel="stylesheet" href="/assets/css/about.css">
<link rel="stylesheet" href="/assets/css/menubar.css">
</head>
<nav class="navbar navbar-expand-lg navbar-light fixed-top mask-custom shadow-0">
  <div class="container-fluid">
  <a class="navbar-brand" href="./home.php">
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
        <a class="nav-link active fw-bold" href="/pages/customer/about.php">About</a>
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
      class="text-reset dropdown-toggle d-flex align-items-center hidden-arrow"
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

<body style="background-color: #E1E1EA">
<div class="main-container">
    <section class="store-name">
        <h1><span>R.J.</span> Avanceña</h1>
        <img class="mt-5" src="/assets/img/establishement.png" alt="">
        <div class="text-content mt-5">
          <p> R.J. Avanceña Enterprises is a construction hardware store branch located in Kadiwa, Area B, Sapang Palay which offers a wide variety of construction materials such as different types of wood, paint, PVC, cement, and necessary hardware tools. The hardware store is owned by Reynaldo Avanceña and established since in 1990. It is growing and active until now. They serve an estimate of fifty to seventy (70) customer transactions per day and can offer approximately thirty (30) variety of products with a thousand of items in the inventory.</p> 
        </div>
    </section>

    <section class="about-online mt-5">
        <h1>About Online Stores</h1>
        <p class="mt-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet, elementum nullam facilisis cursus commodo pellentesque et. Nullam convallis mollis eget arcu leo sed. Leo facilisis volutpat, turpis vitae. In id mauris morbi commodo varius nunc dignissim in at. Luctus blandit dapibus et magna tellus sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet, elementum nullam facilisis cursus commodo pellentesque et. Nullam convallis mollis eget arcu leo sed. Leo facilisis volutpat, turpis vitae. In id mauris morbi commodo varius nunc dignissim in at. Luctus blandit dapibus et magna tellus sem.</p>
    </section>

    <section class="features">
        <div class="shop-store">
            <div class="left-content">
              <img data-aos="fade-right" src="/assets/img/shoppingStore.svg" alt="">
            </div>
            <div class="right-content">
              <h1 class="mt-4" data-aos="fade-left">High Quality Products</h1>
              <p class="mt-4" data-aos="fade-left">Tools, Equipments & More</p>
                <p data-aos="fade-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet, elementum nullam facilisis cursus commodo pellentesque et. Nullam convallis mollis eget arcu leo sed. Leo facilisis volutpat, turpis vitae. In id mauris morbi commodo varius nunc dignissim in at. Luctus blandit dapibus et magna tellus sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>

        <div class="shop-security">
          <div class="left-content">
            <img data-aos="fade-left" src="/assets/img/shopSecurity.svg" alt="">
          </div>
          <div class="right-content">
            <h1 class="mt-4" data-aos="fade-right">Account Security and Information</h1>
            <p class="mt-4" data-aos="fade-right">Data and Privacy</p>
              <p data-aos="fade-right">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet, elementum nullam facilisis cursus commodo pellentesque et. Nullam convallis mollis eget arcu leo sed. Leo facilisis volutpat, turpis vitae. In id mauris morbi commodo varius nunc dignissim in at. Luctus blandit dapibus et magna tellus sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
      </div>

      <div class="shop-details">
        <div class="left-content">
          <img data-aos="fade-right" src="/assets/img/shopDetails.svg" alt="">
        </div>
        <div class="right-content">
          <h1 class="mt-4" data-aos="fade-left">Contact and Details</h1>
          <p class="mt-4" data-aos="fade-left">Establishment</p>
            <p data-aos="fade-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet, elementum nullam facilisis cursus commodo pellentesque et. Nullam convallis mollis eget arcu leo sed. Leo facilisis volutpat, turpis vitae. In id mauris morbi commodo varius nunc dignissim in at. Luctus blandit dapibus et magna tellus sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </div>

    <div class="participants mt-5">
        <h1>Participants</h1>
          <div class="profile mt-4">
            <a href="https://www.facebook.com/johnroque.racelis"><img src="/assets/img/ROQS.png" alt=""></a>
            <a href="https://www.facebook.com/shinxzxzxz"><img src="/assets/img/JED.png" alt=""></a>
            <a href="https://www.facebook.com/nat.13.torr"><img src="/assets/img/NATH.png" alt=""></a>
            <a href="https://www.facebook.com/francisbeam.santander"><img src="/assets/img/FRANCIS.png" alt=""></a>
            <a href="https://www.facebook.com/noisune"><img src="/assets/img/NEO.png" alt=""></a>
          </div>
    </div>
    </section>

</div>

<section class="about-container">
  <footer class="text-center text-lg-start">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <!-- Left Content-->
      <div class="me-5 d-none d-lg-block">
        <span>Get connected with us on social networks:</span>
      </div>
  
      <!-- Right Content -->
      <div class="right-content">
        <a href="" class="me-4 link-secondary">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="me-4 link-secondary">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="me-4 link-secondary">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="me-4 link-secondary">
          <i class="fab fa-linkedin"></i>
        </a>
      </div>
    </section>

    <!-- Social media -->
    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <div class="row mt-3">
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3 text-secondary"></i>R.J. Avanceña
            </h6>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis ducimus officiis ea reprehenderit repudiandae, deleniti ipsam. Assumenda cum natus unde.
            </p>
          </div>
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">
              Products
            </h6>
            <p>
              <a href="#!" class="text-reset">Woods</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Tools & Equipment</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Drill</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Cement</a>
            </p>
          </div>
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">
              Useful links
            </h6>
            <p>
              <a href="#!" class="text-reset">Pricing</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Orders</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Help</a>
            </p>
          </div>
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p><i class="fas fa-home me-3 text-secondary"></i> Area B, Sapang Palay Bulacan</p>
            <p>
              <i class="fas fa-envelope me-3 text-secondary"></i>
              rjavancena@gmail.com
            </p>
            <p><i class="fas fa-phone me-3 text-secondary"></i> + 63 935 4815 881</p>
            <p><i class="fas fa-print me-3 text-secondary"></i> + 01 333 333 333</p>
          </div>
        </div>
      </div>
    </section>
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
      © 2021 Copyright:
      <a class="text-reset fw-bold" href="https://mdbootstrap.com/">RJAvancena.com</a>
    </div>
  </footer>
  </section>

  <?php include 'links/footer.php' ?>
<script src="/assets/js/addcart.js"></script>
</body>
</html>