<?php
session_start();
include('database.php');

$categoryid = $_POST['categoryn'];
$subcategory = $_POST['subcategory'];
$subcategory_status=isset($_POST['subcategorystatus']) ? $_POST['subcategorystatus'] : '';
 // echo $category;


$q = mysqli_query($link,"INSERT INTO `sub_category`(`subcategory_name`,`category_id`,`subcategory_status`) VALUES  
	('$subcategory','$categoryid','$subcategory_status')");

   echo "SUCCESS";

?>
