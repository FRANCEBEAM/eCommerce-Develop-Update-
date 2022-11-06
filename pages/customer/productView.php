<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop</title>
  <?php include 'links/header.php' ?>
  <link rel="stylesheet" href="/assets/css/shop.css">
<link rel="stylesheet" href="/assets/css/menubar.css">
</head>


<body style="background-color: #E1E1EA">
  
<!-- Product List -->
<div class="item-container" id="item-list">
    <?php
    error_reporting(0);
        include('./config/connection.php');


        if(isset($_GET['product'])){
          $product = $_GET['product'];
          $query = "SELECT * FROM inventory WHERE product='$product' ";
          $result = mysqli_query($conn, $query);

          if($result){
            ?>
              <div class="cotainer">
                  <div class="row">
                      <div class="col-md-4">
                      <img src="<?=$result["image_path"]; ?>" class="card-img-top">
                      </div>
                      <div class="col-md-8">
                      <h4 class="card-text m-0"><?=$result["product"]; ?></h4>
                      </div>
                  </div>
              </div>
            <?php
          }else{
            echo "Product Not Found";
          }


        }else{
          echo "Something went wrong";
        }
    ?>
</div>


</section>
</div>

<script src="/assets/js/mdb.min.js"></script>
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/aos.js"></script>
<link rel="stylesheet" href="/assets/css/sweetalert2.min.css">
<script src="/assets/js/sweetalert2.all.min.js"></script>
<script>
AOS.init();
</script>

</body>
</html>