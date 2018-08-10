<?php
session_start();
include('database.php');

 $sliderid = $_GET['id'];
// echo $sliderid;


$updateuser = mysqli_query($link,"DELETE FROM `bannerimage` WHERE `id` = '".$sliderid."'");

echo "Success";
 header('location:bannermanagement.php#del');

?>

