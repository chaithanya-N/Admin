<?php
session_start();
include("database.php");

if(isset($_POST["categoryn"])){
    // Capture selected country
    $category = $_POST["categoryn"];
    $categorystatus = $_POST["substatus"];

    // echo $subcatstatus;
     
     $q = mysqli_query($link,"SELECT * FROM sub_category where `category_id`='".$category."' AND 
      subcategory_status = '".$categorystatus."' ORDER BY `subcategory_name` ASC");
     // $row = mysqli_fetch_array($q);

     while($row1 = mysqli_fetch_array($q))
        {
          echo '<option value="'.$row1['subcategory_id'].'">'.$row1['subcategory_name'].'</option>';
        }
     }

  ?>
 