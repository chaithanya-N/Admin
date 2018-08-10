<?php
session_start();
include('database.php');

$email = $_POST['email'];

$updateuser = mysqli_query($link,"DELETE FROM `users` WHERE `email` = '".$email."'");

echo "Success";


?>