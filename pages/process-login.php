<?php session_start();

$email = $_POST['email'];
$password = $_POST['password'];

 	include("database.php");
    $login = mysqli_query($link,"SELECT * From `users` where email = '".$email."' ");
	$row = mysqli_fetch_assoc($login);
	
	 
  		if($row['password'] != $_POST['password'] )		
        	{
				echo("Password-Mismatch");
			}
			else{
		  			$_SESSION = array();
					$_SESSION['email']=$row['email'];
					$_SESSION['status']=$row['status'];
					$_SESSION['password']=$row['password'];
		 			$_SESSION['name'] = $row['name'];
 		  			$_SESSION['userid'] = $row['id'];
 		  			$_SESSION['usertype'] = $row['user_type'];
 
		  			echo($_SESSION['usertype']);
  				}
  	
?>