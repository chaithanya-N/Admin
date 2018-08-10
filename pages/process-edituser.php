<?php
session_start();
include('database.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['psw'];
$usertype = isset($_POST['usertype']) ? $_POST['usertype'] : '';
$status =isset($_POST['ustatus']) ? $_POST['ustatus'] : '';

 echo $name;
 
$updateuser = mysqli_query($link,"UPDATE `users` SET `name`='".$name."',`email`='".$email."',
	`password`='".$password."',`user_type`= '".$usertype."' ,`status`= '".$status."' WHERE `email` = '".$email."'");

// echo "Success";

?>








