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
              </div>
    <!-- Nav pills -->
   <div class="row tag" style="margin:5px;">          
 <ul class="nav nav-pills" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="pill" href="#home">Create Item</a>
  </li>
  <li  class="nav-item">
    <a  id="del" class="nav-link" data-toggle="pill" href="#menu1">Add Item features</a>
  </li>
  <li  class="nav-item">
    <a  id="del" class="nav-link" data-toggle="pill" href="#menu2">Item List</a>
  </li>
</ul>
</div>

    <!-- Tab panes -->
    <div class="tab-content">
     <div id="home" class="container tab-pane active"><br>
           <div class="row" style="background:#f7f7f7; padding:20px;margin:-15px;">
                <div class="col-md-8" >
                  <form class="form-horizontal" action="process-createitems.php" id="createitemform" method="post" enctype="multipart/form-data"">
                    <input type="hidden" name="substatus" value="Active" id="substatus">
                    <div class="row" style="padding:15px;">
                         <label class="col-md-4"><b>Select Category</b></label>
                        <div class="col-md-8">
                          <select name="categoryn" class="form-control" id="categoryn" required>                   
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
                        <label class="col-md-4"><b>Select SubCategory</b> </label>
                        <div class="col-md-8">
                              <!-- <select name="client" class="form-control" id="response"> -->
                                <select name="subcateg" class="form-control" id="response" required>        
                                <option value="" selected="yes" disabled="disabled">Select SubCategory</option>
                                <option value=""></option>
                                  
                             </select>
                             

                        </div>
                    </div>
                    <div class="row" style="padding:15px;">
                        <label class="col-md-4"><b>Select Product</b> </label>
                        <div class="col-md-8">
                                <select name="Product" class="form-control" id="response1" required>        
                                <option value="" selected="yes" disabled="disabled">Select Product</option>
                                <option value=""></option>
                                  
                             </select>
                             

                        </div>
                    </div>

                       <div class="row" style="padding:15px;">
                          <label class="col-md-4"><b>Create Item</b> </label>
                          <div class="col-md-8">
                              <input type="text" class="form-control" id="itemname" name="itemname" placeholder="Enter Item">
                           </div>                         
                      </div>              
                         <div class="row" style="padding:15px;">
                         <label class="col-md-4"><b>select status</b></label>
                        <div class="col-md-8">
                          <select name="itemstatus" class="form-control" id="status" required>
                                <option value="" selected="yes" disabled="disabled">select status</option>
                                 <option value="Active">Active</option>
                                  <option value="Deactive">Deactive</option>
                             </select>                                 
                        </div>  
                        </div>  
                       <div class="row" id="uploadpics1" style="padding:15px;">                       
                          <label class="col-md-4"><b>Upload  images</b> </label>
                        <div class="col-md-8">
                            <input type="file" name="file" class="btn btn-primary" id="file">
                        </div>
                    </div>        
                      <button class=" col-md-offset-8 btn btn-primary" style="margin:10px;" type="submit" 
                             value="Upload" id="createitembtn">Create</button>                                                                         
                     </form>
                     </div>    
                   </div>
            </div>
      <div id="menu1" class="container tab-pane fade"><br>
           <div class="row" style="background:#f7f7f7; padding:20px;margin:-15px;">
                <div class="col-md-8" >
                  <form class="form-horizontal" action="process-itemimages.php" id="createitemfeaturesform" method="post" enctype="multipart/form-data"">
                    

                     <div class="row" style="padding:15px;">
                         <label class="col-md-4"><b>Select Item</b></label>
                        <div class="col-md-8">
                          <select name="itemname" class="form-control" id="status" required>                   
                                <option selected="yes" value="selected" disabled="yes">select item</option>
                                 <?php 
 
             $itemselect = mysqli_query($link,"SELECT DISTINCT * FROM  items order BY `item_name` ASC");
            while($itemrow = mysqli_fetch_assoc($itemselect))
                                 {
                                ?>
         <option value="<?php echo $itemrow['item_id']?>"><?php echo ucfirst($itemrow['Item_name']) ?></option>
                        
                                <?php 
                              }
                              ?>
                             </select>                                 
                        </div>  
                    </div> 

                        <div class="row" style="padding:15px;">
                          <label class="col-md-4"><b>Item price</b> </label>
                          <div class="col-md-8">
                              <input type="text" class="form-control" id="itemprice" name="itemprice" placeholder="Enter price">
                           </div>                         
                        </div> 
                         <div class="row" style="padding:15px;">
                          <label class="col-md-4"><b>Item Color</b> </label>
                          <div class="col-md-8">
                              <input type="text" class="form-control" id="itemcolor" name="itemcolor" placeholder="Enter Color">
                           </div>                         
                        </div> 
                       
                        <div class="row" style="padding:15px;">
                          <label class="col-md-4"><b>Item Description</b> </label>
                          <div class="col-md-8">
           <textarea style="resize:none" class="form-control" id="name" name="itemdes" placeholder="Enter Description"></textarea>
                           </div>                         
                        </div> 
                         
                         <div class="row" id="uploadpics1" style="padding:15px;">                       
                          <label class="col-md-4"><b>Upload  images</b> </label>
                        <div class="col-md-8">
                            <input type="file" name="file[]" multiple class="btn btn-primary" id="file">
                        </div>
                    </div>            
                            <button class=" col-md-offset-8 btn btn-primary" style="margin:10px;" type="submit" 
                             value="Upload" id="createitemfeaturesbtn">Add</button>                                                                         
                     </form>
                     </div>    
                   </div>
            </div>
            <div id="menu2" class="container tab-pane fade" style="padding:15px;">
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Category Name</th>  
                    <th>Sub Category Name</th>  
                    <th>Product Name</th>  
                    <th>Item Name</th> 
                    <th>Item Image</th>   
                    <th>Item Status<Status>
                    <th>Edit<Status>
                  </tr>
                </thead>
                 <tbody>
                <?php
                  $counter = 1;
 $w = mysqli_query($link,"SELECT * FROM items i INNER JOIN products p on i.product_id = p.product_id INNER JOIN sub_category s on s.subcategory_id = i.subcategory_id INNER JOIN category c on c.category_id = i.category_id ORDER BY item_name");
                 // $w = mysqli_query($link,"SELECT * FROM `items`");
                  while($row = mysqli_fetch_assoc($w))
                  {
                ?>
                  <tr>
                    <td><?php echo $counter; ?></td>
                    <td><?php echo $row['category_name']; ?></td>
                    <td><?php echo $row['subcategory_name']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['Item_name']; ?></td>
                     <td><img src="<?php echo $row['item_image']; ?>" style="height:25%;width:25%;"></td>
                    <td><?php echo $row['item_status']; ?></td>
                   <td><a href="edititem.php?id=<?php echo $row['item_id'];?>" id="<?php echo 
                   $row['item_id'];?>"><i class="fas fa-edit"></i></a></td>
                  </tr>
                  
                <?php
                $counter++; }
                ?>
                  
                  </tbody>
            </table>
          </div>
        </div>
      </div>
         </div>      
             </div>
               </div>
            </div>        
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    
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

    $('#createitemfeaturesbtn').click(function(){
      var data = $('#createitemfeaturesform').serialize();
         // console.log(data);
         // alert();
         $.ajax({
              url: 'process-createitem.php',     
                type: 'POST', // performing a POST request
                data : data,
                                
               success: function(result)         
                {
                     // alert(result);
                     window.location.href = "manageitem.php";
                  //  if(result = "SUCCESS")
                  //   {
                  // //alert(result);
                  //        // window.location.href = "manageproduct.php";
                  // // //  //   $('#usercreate').modal('show'); 
                  // // //  //  $('#usercreate').on('hidden.bs.modal', function () {
                  // // //  // window.location.href = "createuser.php";
                  // // //  //   })
                  // }
                }
         });
    })


 $("#categoryn").change(function(){
        var selectcategory = $("#categoryn option:selected").val();
        var substatus = $("#substatus").val();

        // alert(substatus);
        $.ajax({
            type: "POST",
            url: "process-select-category.php",
            data: {categoryn : selectcategory,substatus : substatus} 
        }).done(function(result){

              // alert(result);
             $("#response").html(result);
        });
    });


 $("#response").change(function(){
        var selectsubcategory = $("#response option:selected").val();
        var substatus = $("#substatus").val();

        // alert(substatus);
        $.ajax({
            type: "POST",
            url: "process-select-sucategory.php",
            data: {subcateg : selectsubcategory,substatus : substatus} 
        }).done(function(result){

             // alert(result);
             $("#response1").html(result);
        });
    });

});

    </script>

</body>

</html>
