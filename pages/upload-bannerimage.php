<?php 
session_start();

include'database.php';
 $status =isset($_POST['users']) ? $_POST['users'] : '';
 echo $status;

 $destination = "../images/bannerimages/";

 extract($_POST);
$error=array();
$extension = array("jpeg","jpg","png","gif");

foreach ($_FILES['file']['tmp_name'] as $key => $tmp_name) {
	 
	 $file_name = $_FILES['file']['name'][$key];
	 $file_tmp = $_FILES['file']['tmp_name'][$key];

	 $ext = pathinfo($file_name,PATHINFO_EXTENSION);
	 if(in_array($ext,$extension))
	 {
	 	move_uploaded_file($file_tmp = $_FILES['file']['tmp_name'][$key],$destination.'/'.$file_name);
	 	
	 $q = mysqli_query($link,"INSERT INTO `bannerimage`(`banner_image`,`status`) VALUES
	  ('$file_name','$status')");
	 	  header('location:bannermanagement.php');
	 	
	 }

}



?>