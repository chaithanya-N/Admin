<?php
session_start();
include('database.php');


$categoryid =$_POST['categoryid'];
$category = $_POST['category'];
$category_status = $_POST['categorystatus'];

 // echo $categoryid;
 
$updatecategory = mysqli_query($link,"UPDATE `category` SET `category_name`='".$category."',
`category_status`='".$category_status."' WHERE `category_id` = '".$categoryid."'");

 echo "Success";

?>








