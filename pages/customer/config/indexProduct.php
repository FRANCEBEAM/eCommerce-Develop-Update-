<link rel="stylesheet" href="/assets/css/livesearch.css">
<link rel="stylesheet" href="/assets/css/index.css">

<?php
error_reporting(0);
$connect = new PDO("mysql:host=localhost; dbname=rjavancena", "root", "");

/*function get_total_row($connect)
{
  $query = "
  SELECT * FROM tbl_webslesson_post
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  return $statement->rowCount();
}

$total_record = get_total_row($connect);*/

$limit = '12';
$page = 1;
if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}

$query = "
SELECT * FROM inventory 
";

if($_POST['query'] != '')
{
  $query .= '
  WHERE product LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" 
  ';
}

$query .= 'ORDER BY id ASC ';

$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();

$output = '

';
if($total_data > 0)
{
  foreach($result as $row)
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

        <a href="/pages/customer/signin.php" class="btn d-md-block addItemBtn text-center" style="background:#0D6EFD"><i class="fa-solid fa-cart-shopping"></i> &nbsp;Add to cart</a> 
      </form>
        </div>
      </div>
    </div>
  </div>
</div>
    ';
  }
}
else
{
  $output .= '
  <tr>
  <h5 class="mb-5">No product search found &nbsp;<iconify-icon icon="icon-park-outline:ad-product"></iconify-icon></h5>
  </tr>
  ';
}


$output .= '
';

$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

//echo $total_links;

if($total_links > 4)
{
  if($page < 5)
  {
    for($count = 1; $count <= 5; $count++)
    {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else
  {
    $end_limit = $total_links - 5;
    if($page > $end_limit)
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
    else
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}
else
{
  for($count = 1; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}
if(!$total_data == 0) {
for($count = 0; $count < count($page_array); $count++)
{
  if($page == $page_array[$count])
  {
    $page_link .= '
   ';

    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
      $previous_link = '';
    }
    else
    {
      $previous_link = '
      
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id > $total_links)
    {
      $next_link = '
     
        ';
    }
    else
    {
      $next_link = '';
    }
  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
     
      ';
    }
    else
    {
      $page_link .= '
     
      ';
    }
  }
}
}

$output .= $previous_link . $page_link . $next_link;
$output .= '

';

echo $output;

?>