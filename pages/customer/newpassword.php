
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
  <!-- <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script> -->
  <link rel="stylesheet" href="/assets/css/newpass.css">
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css"
  rel="stylesheet"/> -->
  <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> -->
<link rel="stylesheet" href="/assets/css/menubar.css">
<?php include '../customer/links/header.php' ?>
</head>
<body style="background-color:  #E6E6E6;">
<nav class="navbar navbar-expand-lg navbar-light fixed-top mask-custom shadow-0">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
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
        <h2 class="mb-5 text">Create new password</h2>
          <p>Hi! to continue. Set a new password</p>
    </div>

    <form method="POST" id="form">

    <div id="message"></div>

        <div class="col mb-4">
        <div class="form-outline">
        <input type="password" class="form-control form-control-lg" id="password" name="password" />
          <label class="form-label" for="password">Password</label>
        </div>
        <small class="errorPass text-danger mb-4" id="errorPassword"></small>
      </div>

      <div class="col mb-4">
        <div class="form-outline">
        <input type="password" class="form-control form-control-lg" id="cpassword" name="cpassword"/>
          <label class="form-label" for="password">Confirm password</label>
        </div>
        <small class="errorConpass text-danger mb-4" id="errorConPass"></small>
      </div>


        <button type="button" class="btn btn-primary btn-lg btn-block resetPassword" id="btnResetPass" name="resetPassword">Change</button>
    </form>
  </div>
</div>

<!-- <script type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"
></script> -->
<?php include '../customer/links/footer.php' ?>
<!-- <script>
  AOS.init();
</script> -->
<!-- <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script> -->
<script src="/assets/js/newpassConfig.js"></script>
</body>
</html>