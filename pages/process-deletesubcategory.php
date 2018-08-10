<?php
session_start();
include('database.php');

 $scategoryid =$_POST['subid'];
echo $scategoryid;


 $deletesubcategory = mysqli_query($link,"DELETE FROM `sub_category` WHERE `subcategory_id` = '".$scategoryid."'");

 echo "Success";
//  header('location:category.php');

?>

