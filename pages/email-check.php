<?php session_start();
include('database.php');

$email = $_POST['email'];

  // echo $email;

$emailcheck = mysqli_query($link,"SELECT * FROM `users` WHERE `email` = '".$email."'");
$checkrow = mysqli_num_rows($emailcheck);

if($checkrow > 0)
{
	echo "email";
}
else
{
	echo "no email";
}



?>