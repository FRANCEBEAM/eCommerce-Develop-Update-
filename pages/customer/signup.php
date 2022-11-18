
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign up</title>
  <?php include 'links/header.php' ?>
  <link rel="stylesheet" href="/assets/css/signup.css">
<link rel="stylesheet" href="/assets/css/menubar.css">
</head>
<body>
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
          <a class="nav-link" aria-current="page" href="/index.php">Home</a>
          <a class="nav-link" href="/pages/customer/signin.php">Shop</a>
          <a class="nav-link" href="/about.php">About</a>
  
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
            <a class="nav-link" href="./signin.php">
              <i class="fas fa-shopping-cart"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<div class="main-container">
  <div class="form-container">
    <div class="left-content" data-aos="zoom-in">
        <img class="" src="/assets/img/signup.svg" alt="">
    </div>

    <div class="right-content">
      <h1>Create New Account <span><img src="/assets/img/fire.png" alt=""></span></h1>
      <small>Please fill in the forms to continue.</small>

      <div class="mt-2" id="message"></div>

      <form id="form" class="form" method="POST">
        <!-- 2 column grid layout with text inputs for the first and last names -->
        
        <div class="row">
          <div class="col mb-4">
            <div class="form-outline">
              <input type="text" class="form-control form-control-lg" id="firstName" name="firstname"/>
              <label class="form-label" for="firstName">First name</label>
            </div>
            <small class="errorFirst text-danger" id="errorFirst"></small>
          </div>

          <div class="col mb-4">
            <div class="form-outline">
              <input type="text" id="lastName" class="form-control form-control-lg" name="lastname"/>
              <label class="form-label" for="lastName">Last name</label>
            </div>
            <small class="errorLast text-danger" id="errorLast"></small>
          </div>
        </div>

        <!-- Email input -->
        <div class="col mb-4">
        <div class="form-outline">
          <input type="email" class="form-control form-control-lg" id="email" name="email"/>
          <label class="form-label" for="email">Email address</label>
        </div>
        <small class="errorEmail text-danger" id="errorEmail"></small>
        <small class="errorEmail text-danger" id="errorEmailDB"></small>
      </div>

        <!-- Password input -->
        <div class="col mb-4">
        <div class="form-outline">
          <input type="password" class="form-control form-control-lg" id="password" name="password"/>
          <label class="form-label" for="password">Password</label>
        </div>
        <small class="errorPass text-danger" id="errorPassword"></small>
 
      </div>


        <!-- Confirm Password input -->
        <div class="col mb-4">
        <div class="form-outline">
          <input type="password" class="form-control form-control-lg" id="conpassword" name="conpassword"/>
          <label class="form-label" for="conpassword">Confirm Password</label>
        </div>
        <small class="errorConpass text-danger" id="errorConPass"></small>
      </div>


        <!-- Checkbox -->
        <div class="form-check d-flex justify-content-center mb-4">
          <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" required/>
          <label class="form-check-label" for="form2Example33">
            I agree to terms & conditions.
          </label>
        </div>
      
        <!-- Submit button -->
        <button type="button" class="btn btn-primary p-3 btn-block mb-4" id="btnSignup" name="signup">Sign up</button>
      
      </form>
    </div>
  </div>
</div>

<?php include 'links/footer.php' ?>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> -->

<script src="/assets/js/signupConfig.js"></script>

</body>
</html>