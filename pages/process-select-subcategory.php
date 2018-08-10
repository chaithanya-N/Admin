<?php
session_start();
include("database.php");

if(isset($_POST["subcategoryn"])){
    // Capture selected country
    $subcategory = $_POST["subcategoryn"];
    $subcatstatus = $_POST["substatus"];

    // echo $subcatstatus;
     
     $q = mysqli_query($link,"SELECT * FROM sub_category where `category_id`='".$subcategory."' AND 
      subcategory_status = '".$subcatstatus."' ORDER BY `subcategory_name` ASC");
     // $row = mysqli_fetch_array($q);

     while($row1 = mysqli_fetch_array($q))
        {
          echo '<option value="'.$row1['subcategory_id'].'">'.$row1['subcategory_name'].'</option>';
        }
     }

  ?>
 