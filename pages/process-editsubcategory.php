<?php
session_start();
include('database.php');

$subid =$_POST['subid'];
 $categoryid =$_POST['categoryn'];
$subcategory = $_POST['subcategory'];
$category_status = $_POST['subcategorystatus'];

    // echo $category;

   $updatesubcategory = mysqli_query($link," UPDATE `sub_category` SET `subcategory_name`='".$subcategory."',
   `category_id`='".$categoryid."',`subcategory_status`='".$category_status."'  WHERE `subcategory_id` = '".$subid."'");

    echo "Success";

?>






