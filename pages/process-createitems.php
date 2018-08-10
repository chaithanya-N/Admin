<?php
session_start();
include('database.php');

 $product=isset($_POST['Product']) ? $_POST['Product'] : '';
 $itemstatus=isset($_POST['itemstatus']) ? $_POST['itemstatus'] : '';
 $subcategid=isset($_POST['subcateg']) ? $_POST['subcateg'] : '';
 $categoryid=isset($_POST['categoryn']) ? $_POST['categoryn'] : '';
 $itemname=isset($_POST['itemname']) ? $_POST['itemname'] : '';

  // echo $product;


$q = mysqli_query($link,"INSERT INTO `items`(`product_id`,`subcategory_id`,`category_id`,`Item_name`,`item_status` ) VALUES 
	('$product','$subcategid','$categoryid','$itemname','$itemstatus')");

 
$last_id = $link->insert_id;
echo $last_id;
$dir = "../images/itemimages/".$last_id;

if(!file_exists($dir))
{
 	mkdir("../images/itemimages/".$last_id);
  	if(is_array($_FILES)) {
	  		
		 $filename = $_FILES['file']['name'];
 			$path = "../images/itemimages/".$last_id;
		 if(is_uploaded_file($_FILES['file']['tmp_name'])) {
		 	$sourcePath = $_FILES['file']['tmp_name'];
 		 	$targetPath = $path."/".$filename;
		 	$image_name = addslashes($filename);	
		 
		 	if(move_uploaded_file($sourcePath,$targetPath)) {
 		 		$q = mysqli_query($link,"UPDATE `items` SET `item_image`= '".$targetPath."' WHERE item_id = '".$last_id."'");
 				}
 			}
		 }
}
else
{
 	 
 	  	if(is_array($_FILES)) {
	  		
		 $filename = $_FILES['file']['name'];
 
		 if(is_uploaded_file($_FILES['file']['tmp_name'])) {
		 	$sourcePath = $_FILES['file']['tmp_name'];
 		 	$targetPath = "../images/itemimages/".$filename;
		 	$image_name = addslashes($filename);	
		 
		 	if(move_uploaded_file($sourcePath,$targetPath)) {
 		 		$q = mysqli_query($link,"UPDATE `items` SET `item_image`= '".$targetPath."' WHERE item_id = '".$last_id."'");
 				}
 			}
		 }
}
 


      header('location:manageitem.php');

?>

