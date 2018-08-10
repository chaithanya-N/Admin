<?php
session_start();
include('database.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['psw'];
$usertype = isset($_POST['usertype']) ? $_POST['usertype'] : '';
$status =isset($_POST['ustatus']) ? $_POST['ustatus'] : '';


 // $q = mysqli_query($link,"INSERT INTO `users`(`name`, `email`, `password`, `user_type`, `status`) VALUES 
 	// ('$name','$email','$password',$usertype','$status')");
$q = mysqli_query($link,"INSERT INTO `users`(`name`,`email`,`password`,`user_type`,`status`) VALUES ('$name',
	'$email','$password','$usertype','$status')");

  echo "SUCCESS";

?>
