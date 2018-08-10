<?php
 session_start();
include("database.php");
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}
  ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<style>
a:hover {
    text-decoration:none; 
}
.tag>ul>li>.active{background-color:#337ab7;color:#fff;}
.logo{width:50%;}
</style>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <ul class="nav navbar-top-links navbar-right">                             
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">                   
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <?php include 'navbar.php'; ?>

             </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                    <h1 class="page-header">Manage Items</h1>
                </div>
              <div class="col-lg-12">
                   <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="dashboard.php">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item">
                        <a href="manageitem.php">Product Management</a>
                      </li>
                     <li class="breadcrumb-item active">Manage Items</li>
                    </ol>
    
                  
              <?php 
                  $id = $_GET['id'];
                  // echo $id;
                  $product = mysqli_query($link,"SELECT * FROM   products  WHERE    product_id = '".$id."'");
                  $row = mysqli_fetch_assoc($product);
                        ?>
                <div class="col-md-8 " style="color:#000;"> 
                  <form class="form-horizontal" action="" id="createproductform" method="post">
                    <div class="row" style="padding:15px;">
                         <label class="col-md-4"><b>Select Category</b></label>
                        <div class="col-md-8">
                          <select name="categoryn" class="form-control" id="categoryname" required>                   
                                <option selected="yes" value="selected" disabled="yes">select Category</option>
                                 <?php 
 
             $categoryselect = mysqli_query($link,"SELECT DISTINCT * FROM  category order BY `category_name` ASC");
            while($categorytrow = mysqli_fetch_assoc($categoryselect))
                                 {
                                ?>
             <option value="<?php echo $categorytrow['category_id']?>"><?php echo ucfirst($categorytrow['category_name']) ?></option>
                        
                                <?php 
                              }
                              ?>
                             </select>                                 
                        </div>  
                        </div>   

                     <div class="row" style="padding:15px;">
                         <label class="col-md-4"><b>Select SubCategory</b></label>
                        <div class="col-md-8">
                          <select name="subcateg" class="form-control" id="SubCategoryname" required>                   
                                <option selected="yes" value="selected" disabled="yes">select SubCategory</option>
                                 <?php 
 
             $categoryselect = mysqli_query($link,"SELECT DISTINCT * FROM  sub_category order BY `subcategory_name` ASC");
            while($categorytrow = mysqli_fetch_assoc($categoryselect))
                                 {
                                ?>
         <option value="<?php echo $categorytrow['subcategory_id']?>"><?php echo ucfirst($categorytrow['subcategory_name']) ?></option>
                        
                                <?php 
                              }
                              ?>
                             </select>                                 
                        </div>  
                    </div>   

                       <div class="row" style="padding:15px;">
                          <label class="col-md-4"><b>Create Product</b> </label>
                          <div class="col-md-8">
                              <input type="text" class="form-control" id="name" name="product" value="<?php echo $row['product_name'];?>">
                           </div>                         
                        </div> 
                         <div class="row" style="padding:15px;">
                         <label class="col-md-4"><b>select status</b></label>
                        <div class="col-md-8">
                          <select name="productstatus" class="form-control" id="productstatus" required>
                                <option value="" selected="yes" disabled="disabled">select status</option>
                                <option selected="yes" value="selected" disabled="yes">select status</option>
                                 <option value="Active">Active</option>
                                  <option value="Deactive">Deactive</option>
                             </select>                                 
                        </div>  
                        </div>                                                                                     
                         <input type="hidden" class="form-control" id="name1" name="productid" 
                            value="<?php echo $row['product_id']; ?>">                                               
                    
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" class="btn btn-warning" id="updateproduct">Update</button>
                            <a href="manageproduct.php" type="button" class="btn btn-info"id="cancelecategory">Cancel</a> 
                              <button type="button" class="btn btn-danger" id="deleteproduct">Delete</button>
                            </div>
                          </div> 

                           </form>                                                                                                                    
                                                             
              </div>
  
    
            </div>     
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
  </div>

    
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
   <script>
         
 $(document).ready(function() {
   // get category from db
   $('#categoryname option').each(function(){

      var ut = '<?php echo $row['category_id']; ?>';
      if($(this).val() == ut)
      {
        $(this).addClass("active");
        $(this).attr("selected","selected");
      }
    

});
    // get category from db
  // get subcategory_status from db
  $('#SubCategoryname option').each(function(){

      var ut = '<?php echo $row['subcategory_id']; ?>';
      if($(this).val() == ut)
      {
        $(this).addClass("active");
        $(this).attr("selected","selected");
      }
    

});
// update subcategory_status
$('#productstatus option').each(function(){

      var ut = '<?php echo $row['product_status']; ?>';
      if($(this).val() == ut)
      {
        $(this).addClass("active");
        $(this).attr("selected","selected");
      }
    

});

    $('#updateproduct').click(function(){
  var data = $('#createproductform').serialize();

   // alert();
  $.ajax({
    url:'process-edititem.php',
    type:'POST',
    data:data,
    success:function(result)
    {
       // alert(result);
       window.location.href = "manageitem.php";
      // if(result='Success')
      // {
      //   $('#editsuccess').modal('show'); 
      //           $('#editsuccess').on('hidden.bs.modal', function () {
      //           window.location.href = "existinguser.php";
      //           })
      // }
    }

  })
})
 // update subcategory_status end
 // delete subcategory_status
 $('#deleteproduct').click(function(){

  var data = $('#createproductform').serialize();

  $.ajax({
    url:'process-deleteitem.php',
    type:'POST',
    data:data,

    success:function(result)
    {
        // alert(result);
        window.location.href = "manageitem.php";
      // if(result == 'Success')
      // {
      //   $('#deletesuccess').modal('show'); 
      //               $('#deletesuccess').on('hidden.bs.modal', function () {
      //               window.location.href = "existinguser.php";
      //               })
      // }
    }

  })
})
 // delete subcategory_status end
});





    </script>


</body>

</html>
