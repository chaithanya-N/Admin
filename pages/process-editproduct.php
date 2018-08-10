<?php
session_start();
include('database.php');


$productid =$_POST['productid'];
$categoryid =$_POST['categoryn'];
$subcategoryid = $_POST['subcateg'];
$productname = $_POST['product'];
$productstatus = $_POST['productstatus'];

  // echo $productid;
 
 $updatecategory = mysqli_query($link,"UPDATE `products` SET `product_name`='".$productname."',
 `category_id`='".$categoryid."',`subcategory_id`='".$subcategoryid."',`product_status`='".$productstatus."' 
 WHERE `product_id` = '".$productid."'");


  echo "Success";

?>








