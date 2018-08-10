<?php
session_start();
include('database.php');

$categoryid=isset($_POST['subcategoryn']) ? $_POST['subcategoryn'] : '';
$subid=isset($_POST['subcateg']) ? $_POST['subcateg'] : '';
$productname=isset($_POST['product']) ? $_POST['product'] : '';
$product_status=isset($_POST['productstatus']) ? $_POST['productstatus'] : '';
  echo $categoryid;


  $q = mysqli_query($link,"INSERT INTO `products`(`product_name`,`category_id`,`subcategory_id`,`product_status`) VALUES  
  	('$productname','$categoryid','$subid','$product_status')");

    echo "SUCCESS";

?>
