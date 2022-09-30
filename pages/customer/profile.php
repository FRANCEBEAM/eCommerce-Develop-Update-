<?php
require 'config/connection.php';
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: signin.php");
}

//IF USERS WANTS TO UPDATE PROFILE
$success = "";
if (isset($_POST["btnSave"])) {
$phone = mysqli_real_escape_string($conn, $_POST["phone"]);
$address = mysqli_real_escape_string($conn, $_POST["address"]);
$birthdate = mysqli_real_escape_string($conn, $_POST["birthdate"]);
$gender = mysqli_real_escape_string($conn, $_POST["gender"]);


$sql = "UPDATE users SET phone='$phone', address='$address', birthdate='$birthdate', gender= '$gender' WHERE email='{$_SESSION["email"]}'";
$result = mysqli_query($conn, $sql);
if ($result) {
    $success = 'Profile updated successfully';


} else {
    echo "<script>alert('Profile can not Updated.');</script>";
    echo  $conn->error;
}
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
  <title>Profile</title>
  <?php include 'links/header.php' ?>
  <link rel="stylesheet" href="/assets/css/profile.css">
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
    <!--PROFILE SECTION-->
      <div class="head-container">
        <h1 class="profileInfo mb-3">Profile Information</h1>
        <p>Fill all the information and personalize as your profile settings and security.</p>
      </div>
  
      <div class="information-container">
        <h1><?php echo $fetch_info['firstname']; ?> <?php echo $fetch_info['lastname']; ?></h1>
        <p><?php echo $_SESSION['email']; ?></p>
        <?php 
            if($success){
                ?>
                 <div class="row justify-content-center mt-5">
                      <div class="alert alert-success text-center col-4">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg> <?php echo $success; ?>
                      </div>
                </div>
                <?php
            }
            ?>
      </div>
  
        <div class="form-container">
          <form action= "./profile.php" method="POST" >
          <div class="card">
            <div class="card-body">
              <div class="card-head">
                <h1 class="mb-4">Phone Number: <i class="fa-solid fa-phone"></i></h1>
              </div>
              <p class="card-text">Set your phone number in your account to recognize as a customer.</p>
              <div class="input-group mb-3">
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="phone" value="<?php echo $fetch_info['phone'] ?>">
              </div>
            </div>
          </div>
  
          <div class="card">
            <div class="card-body">
              <div class="card-head">
                <h1 class="mb-4">Address: <i class="fa-solid fa-location-arrow"></i></h1>
              </div>
              <p class="card-text">Provide your address location. This might help for the store to deliver your product.</p>
              <div class="input-group mb-3">
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="address" value="<?php echo $fetch_info['address'] ?>">
              </div>
            </div>
          </div>
  
          <div class="card">
            <div class="card-body">
              <div class="card-head">
                <h1 class="mb-4">Date of Birth: <i class="fa-solid fa-calendar-days"></i></h1>
              </div>
              <p class="card-text">Fill your date of birth to recognize your age. This will consider as your information.</p>
              <div class="input-group mb-3">
              <input type='text' class="form-control" name="birthdate" placeholder= "mm/dd/yyyy" value='<?php echo $fetch_info['birthdate'] ?>'>
              </div>
            </div>
          </div>
  
          <div class="card">
            <div class="card-body">
              <div class="card-head">
                <h1 class="mb-4">Gender: <i class="fa-sharp fa-solid fa-person"></i></i></h1>
              </div>
              <p class="card-text">Setup your identity.</p>

              <div class="input-group mb-3" style="padding-top:24px;">
                <select class="form-select"" id = "genderSelect" aria-label="Default select example" name="gender">
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>
          </div>
      
          <button type="submit" class="btn btn-primary btn-lg mt-5" name="btnSave" id="btnSave">Save changes</button>
      </form>
    </div>
  </div>
</div>
<?php include 'links/footer.php' ?>
<script>
  document.querySelector('#genderSelect').value = "<?php echo $fetch_info['gender']   
            ?>";
</script>

<script src="/assets/js/addcart.js"></script>
</body>
</html>