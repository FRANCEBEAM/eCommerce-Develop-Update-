<link rel="stylesheet" href="/assets/css/livesearch.css">
<?php
error_reporting(0);
require 'config/connection.php';
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query = "
	SELECT * FROM inventory 
	WHERE product LIKE '%".$search."%'";
}
else
{
	$query = "
	SELECT * FROM inventory ORDER BY id";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

	while($row = mysqli_fetch_array($result))
	{
		$output .= '
    <div class="mb-5 card-container" data-mdb-toggle="modal" data-mdb-target="#exampleModal'.$row["id"].'" style="cursor:pointer;">

    <img src='.$row["image_path"].' class="card-img-top">
    <div class="card-body">
      <h5 class="card-title mt-3"><b><i class="fa-solid fa-peso-sign"></i>&nbsp;'.$row["price"].'</b></h5>
      <p class="card-text m-0">'.$row["product"].'</p>
      <small>'.$row["supplier"].'</small>
      
      <form action="" class="form-submit">
      <input type="hidden" class="form-control quantity" value="1">
      <input type="hidden" class="id" value="'.$row["id"].'">
      <input type="hidden" class="product" value=" '.$row["product"].'">
      <input type="hidden" class="price" value=" '.$row["price"].' ">
      <input type="hidden" class="supplier" value=" '.$row["supplier"].' ">
      <input type="hidden" class="image_file" value=" '.$row["image_file"].' ">
      <input type="hidden" class="image_path" value=" '.$row["image_path"].' ">
      <input type="hidden" class="serialnumber" value="  '.$row["serialnumber"].'  ">
    
    </form>
    </div>
    </div>


<div class="modal fade" id="exampleModal'.$row["id"].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content w-100">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product Detail</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="left-content">
        <img src='.$row["image_path"].' class="card-img-top">
        </div>

        <div class="right-content">
        <h1 class="card-text m-0 fw-bold">'.$row["product"].'</h1>
        <small>'.$row["supplier"].'</small>
        <h5 class="card-title mt-3"><b><i class="fa-solid fa-peso-sign"></i>&nbsp;'.$row["price"].'</b></h5>
        <p class="card-title mt-3 inv-qty">Available Stock: <b>'.$row["quantity"].'</b></p>
        <p class="description">'.$row["descriptions"].'</p>
        <form action="" class="form-submit">
        <input type="hidden" class="form-control quantity" value="1">
        <input type="hidden" class="id" value="'.$row["id"].'">
        <input type="hidden" class="product" value=" '.$row["product"].'">
        <input type="hidden" class="price" value=" '.$row["price"].' ">
        <input type="hidden" class="supplier" value=" '.$row["supplier"].' ">
        <input type="hidden" class="image_file" value=" '.$row["image_file"].' ">
        <input type="hidden" class="image_path" value=" '.$row["image_path"].' ">
        <input type="hidden" class="serialnumber" value="  '.$row["serialnumber"].'  ">

        <a href="#" class="btn d-md-block addItemBtn text-center" style="background:#0D6EFD"><i class="fa-solid fa-cart-shopping"></i> &nbsp;Add to cart</a> 
      </form>
        </div>
      </div>
    </div>
  </div>
</div>
		';
	}
	echo $output;
}
else
{
	echo '<h5>No product search found &nbsp;<iconify-icon icon="icon-park-outline:ad-product"></iconify-icon></h5>';
}

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="/assets/css/sweetalert2.min.css">
<script src="/assets/js/sweetalert2.all.min.js"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/assets/js/addcart.js"></script>


