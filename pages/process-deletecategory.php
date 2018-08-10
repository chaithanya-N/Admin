<?php
session_start();
include('database.php');

 $categoryid =$_POST['categoryid'];
echo $categoryid;


 $deletecategory = mysqli_query($link,"DELETE FROM `category` WHERE `category_id` = '".$categoryid."'");

 echo "Success";
//  header('location:category.php');

?>

