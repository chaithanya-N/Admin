<?php

session_start();

include 'database.php';


if(is_array($_FILES)) {

 $filename = $_FILES['file']['name'];
 if(is_uploaded_file($_FILES['file']['tmp_name'])) {
 $sourcePath = $_FILES['file']['tmp_name'];
 $targetPath = "../images/logos/".$filename;
 $image_name = addslashes($filename);	
 
 if(move_uploaded_file($sourcePath,$targetPath)) {
  // echo $sourcePath.','.$targetPath;
 	$q = mysqli_query($link,"SELECT logo from logo");
	$row = mysqli_num_rows($q);

	if($row > 0)
	{
		$ulogo = mysqli_query($link,"UPDATE `logo` SET  `logo`= '$targetPath'");
		echo '
			<script>
				window.location.href="logomanagement.php";
				alert("photo updated Successfully");
			</script>
		';	
		// header("Location:logomanagement.php");
	}
	else
	{
		$ulogo = mysqli_query($link,"INSERT INTO `logo`(`logo`) VALUES ('$targetPath')");
		echo '
			<script>
				
				window.location.href="logomanagement.php";
				alert("photo Added Successfully");
			</script>
		';	
		// header("Location:logomanagement.php");
	}

 }


	}
 }


?>