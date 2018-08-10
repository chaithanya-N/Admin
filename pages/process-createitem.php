<?php
session_start();
include("database.php");


 $itemname=isset($_POST['itemname']) ? $_POST['itemname'] : '';
 $itemprice=isset($_POST['itemprice']) ? $_POST['itemprice'] : '';
 $itemcolor=isset($_POST['itemcolor']) ? $_POST['itemcolor'] : '';
 $itemdescription=isset($_POST['itemdes']) ? $_POST['itemdes'] : '';

 
 // echo $itemdescription;
 $q = mysqli_query($link,"INSERT INTO `itemfeatures`(`item_id`,`item_price`,`item_color`,`item_description`) VALUES  ('$itemname','$itemprice',
 	'$itemcolor','$itemdescription')");

 header('location:manageitem.php');

?>