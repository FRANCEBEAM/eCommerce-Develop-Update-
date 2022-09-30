<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: signin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <?php include 'links/header.php' ?>
  <link rel="stylesheet" href="/assets/css/index.css">
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
        <a class="nav-link active fw-bold" aria-current="page" href="/pages/customer/home.php">Home</a>
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
    <!-- Main Container -->
      <section class="hero-container">
          <div class="left-content">
            <small>Good Tools for Good Works.</small>
            <h1 data-aos="fade-right" data-aos-duration="2000">Making your Life Simple.</h1>
              <p data-aos="fade-left" data-aos-duration="2000">Digital online selling product & heavy equipment for sales. Worth and satiesfied to order only high quality equipment tools.</p>
              <a href="/pages/customer/shop.php" type="button" class="btn btn-lg btnShop">Show now &nbsp; &nbsp;<svg width="45" height="16" viewBox="0 0 45 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M44.7071 8.7071C45.0976 8.31658 45.0976 7.68341 44.7071 7.29289L38.3431 0.928929C37.9526 0.538405 37.3195 0.538405 36.9289 0.928929C36.5384 1.31945 36.5384 1.95262 36.9289 2.34314L42.5858 8L36.9289 13.6569C36.5384 14.0474 36.5384 14.6805 36.9289 15.0711C37.3195 15.4616 37.9526 15.4616 38.3431 15.0711L44.7071 8.7071ZM8.74228e-08 9L44 9L44 7L-8.74228e-08 7L8.74228e-08 9Z" fill="white"/>
                </svg>
                </a>
          </div>
            <div class="right-content"></div>
      </section>

<!-- Store Info -->
<section class="store-container">
  <div class="store">
    <div class="info-content mb-4">
      <iconify-icon icon="carbon:delivery-truck" style="color: #6f42c1;"></iconify-icon>
    <div class="body-info">
          <h5>Offer truck deliver</h5>
            <p data-aos="flip-left">Minimum 100 quantity. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nec eget posuere in ac. Tincidunt aliquet nunc turpis ut. Nec eget posuere in ac. Tincidunt aliquet nunc turpis ut. </p>
      </div>
    </div>
    <div class="info-content mb-4">
      <iconify-icon icon="akar-icons:clock" style="color: #6f42c1;"></iconify-icon>
    <div class="body-info">
          <h5>Offer truck deliver</h5>
            <p data-aos="flip-left">7:00 AM to 5:00 PM. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nec eget posuere in ac. Tincidunt aliquet nunc turpis ut. Nec eget posuere in ac. Tincidunt aliquet nunc turpis ut. </p>
      </div>
    </div>
    <div class="info-content">
      <iconify-icon icon="akar-icons:location" style="color: #6f42c1;"></iconify-icon>
    <div class="body-info">
          <h5>Offer truck deliver</h5>
            <p data-aos="flip-left">Area B SJDM Bulacan, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nec eget posuere in ac. Tincidunt aliquet nunc turpis ut. Nec eget posuere in ac. Tincidunt aliquet nunc turpis ut. </p>
      </div>
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

</body>

<?php include 'links/footer.php' ?>
<script src="/assets/js/addcart.js"></script>
</html>