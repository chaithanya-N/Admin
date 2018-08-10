<?php
session_start();
include("database.php");

if(isset($_POST["subcateg"])){
    // Capture selected country
    $subcategoryid = $_POST["subcateg"];
    $subcategorystatus = $_POST["substatus"];

    // echo $subcatstatus;
     $q = mysqli_query($link,"SELECT * FROM products where `subcategory_id`='".$subcategoryid."' AND  product_status = '".$subcategorystatus."' ORDER BY `product_name` ASC");
     // $row = mysqli_fetch_array($q);

     while($row1 = mysqli_fetch_assoc($q))
        {
          echo '<option value="'.$row1['product_id'].'">'.$row1['product_name'].'</option>';
        }
     }

  ?>
 
 