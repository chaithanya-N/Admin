<?php
session_start();
include('database.php');

$category = $_POST['category'];
$category_status = $_POST['categorystatus'];
// echo $category_status;


$q = mysqli_query($link,"INSERT INTO `category`(`category_name`,`category_status`) VALUES ('$category',
	'$category_status')");

  echo "SUCCESS";

?>
