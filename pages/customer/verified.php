
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account Verified</title>
  <?php include 'links/header.php' ?>
  <link rel="stylesheet" href="/assets/css/verified.css">
  <link rel="stylesheet" href="/assets/css/menubar.css">
</head>
<body style="background-color:  #E6E6E6;">
  <nav class="navbar navbar-expand-lg navbar-light fixed-top mask-custom shadow-0">
    <div class="container-fluid">
      <a class="navbar-brand" href="/index.html">
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
          <a class="nav-link" aria-current="page" href="/index.php">Home</a>
          <a class="nav-link" href="/pages/customer/signin.php">Shop</a>
          <a class="nav-link" href="about.php">About</a>
  
        </div>
  
        <ul class="navbar-nav d-flex flex-row">
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" href="/pages/customer/signin.php">
              Sign in
            </a>
          </li>
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" href="/pages/customer/signup.php">
              Sign up
            </a>
          </li>
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" href="/pages/customer/signin.php">
              <i class="fas fa-shopping-cart"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<div class="main-container">
  <div class="form-container">
    <div class="head-content">
      <svg width="101" height="101" viewBox="0 0 101 101" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M46.0809 53.4458L40.2945 47.5542C39.4528 46.7125 38.454 46.2917 37.2981 46.2917C36.1394 46.2917 35.1393 46.7125 34.2976 47.5542C33.4559 48.3958 33.0183 49.3946 32.9846 50.5505C32.9481 51.7092 33.3507 52.7094 34.1924 53.551L43.1351 62.4938C43.9768 63.3354 44.9587 63.7562 46.0809 63.7562C47.2031 63.7562 48.1851 63.3354 49.0268 62.4938L66.9122 44.6083C67.7538 43.7667 68.1747 42.7665 68.1747 41.6078C68.1747 40.4519 67.7538 39.4531 66.9122 38.6115C66.0705 37.7698 65.0717 37.349 63.9158 37.349C62.7571 37.349 61.757 37.7698 60.9153 38.6115L46.0809 53.4458ZM50.4997 92.2677H49.4476C49.0969 92.2677 48.7813 92.1976 48.5007 92.0573C39.3125 89.1816 31.7375 83.4821 25.7757 74.9588C19.8139 66.4384 16.833 57.0229 16.833 46.7125V26.8281C16.833 25.0746 17.3422 23.4965 18.3606 22.0937C19.3762 20.691 20.6906 19.674 22.3038 19.0427L47.5538 9.57395C48.5358 9.22326 49.5177 9.04791 50.4997 9.04791C51.4816 9.04791 52.4636 9.22326 53.4455 9.57395L78.6955 19.0427C80.3087 19.674 81.6245 20.691 82.6429 22.0937C83.6585 23.4965 84.1663 25.0746 84.1663 26.8281V46.7125C84.1663 57.0229 81.1854 66.4384 75.2236 74.9588C69.2618 83.4821 61.6868 89.1816 52.4986 92.0573C52.1479 92.1976 51.4816 92.2677 50.4997 92.2677V92.2677Z" fill="#29B260"/>
        </svg>
        
        <h2>Verified</h2>
        <span><img src="/assets/img/fireworks_1f386.png" alt=""></span>
        <p>Congratulations</p>
    </div>

    <form method="POST">
      <a class="btn btn-primary btn-lg btn-block btnStarted" href="/pages/customer/signin.php">Get Started</a>
    </form>
    
    <div class="footer">
      <p>Verified is always doing best for their customer and build quality</p>
    </div>
  </div>
</div>
<?php include 'links/footer.php' ?>
</body>
</html>
