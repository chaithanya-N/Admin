<?php
session_start();
include('database.php');

 $productid =$_POST['productid'];
echo $productid;


 $deletecategory = mysqli_query($link,"DELETE FROM `products` WHERE `product_id` = '".$productid."'");

 echo "Success";
//  header('location:category.php');

?>

