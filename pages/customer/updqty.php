<?php 
session_start();
include('config/connection.php');

// $cartid=$_POST['cart_id'];
// $qty=$_POST['qty'];

// $upd="UPDATE cart SET qty='$qty' WHERE id='$cartid'";
// $conn->query($upd);


if(isset($_POST['scope'])){
	$id = $_POST['id'];
	$email = $_SESSION['email']; //getting this email using session
	$quantity = $_POST['quantity']; // product 
    
	
	$chk_existing_cart = "SELECT * FROM cart WHERE id='$id' AND email='$email' ";
	$chk_existing_cart_run = mysqli_query ($conn, $chk_existing_cart);

	if(mysqli_num_rows($chk_existing_cart_run) >0){

		$update_query = "UPDATE cart SET qty='$quantity' WHERE id='$id' AND email='$email' ";

		$update_query_run = mysqli_query($conn, $update_query);

		if($update_query_run){
			echo '<script>alert(200)</script>';
		}else{
			echo '<script>alert(500)</script>';
		}
	}else{
		echo '<script>alert("something wrong")</script>';
	}
}








// if(isset($_POST['scope'])){
//   $scope = $_POST['scope'];
//   switch ($scope){
//     case "update":
//       $id = $_POST['id'];
//       $quantity=$_POST['inputQty'];

    
//       $chk_existing_cart = "SELECT * FROM cart WHERE id ='$id'";
//       $chk_existing_cart_run = mysqli_query ($conn, $chk_existing_cart);

//       $update_query_run = mysqli_query($conn, $update_query);
//       if(mysqli_num_rows($chk_existing_cart_run) >0){
//         $upd="UPDATE cart SET qty='$quantity' WHERE id='$id'";
//         $conn->query($upd);
//         if($update_query_run){
//           echo '<script>alert(200)</script>';
//         }else{
//           echo '<script>alert(500)</script>';
//         }
//       }else{
//         echo '<script>alert("something wrong")</script>';
//       }
//   }
// }

?>
