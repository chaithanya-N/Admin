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

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
            </div>
            
            <ul class="nav navbar-top-links navbar-right">                             
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">                   
                        <li class="divider"></li>
                        <li><a href="login.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
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
                   <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="dashboard.php">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item">
                        <a href="manageproduct.php">Product Management</a>
                      </li>
                     <li class="breadcrumb-item active">Manage Items</li>
                    </ol>
              </div>
                <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
           <h1 style="font-size:24px;">Manage Items</h1>
          <hr>
        </div>
      </div>

  <!-- <div class="container"> -->
    <!-- Nav pills -->
   <div class="row" style="margin:5px;">          
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
           <div class="row" style="background:#f7f7f7; padding:20px;margin:15px;">
                <div class="col-md-8 col-md-offset-4" >
                  <form class="form-horizontal" action="process-createitems.php" id="createitemform" method="post" enctype="multipart/form-data"">
                    <div class="row" style="padding:15px;">
                         <label class="col-md-4"><b>Select Category</b></label>
                        <div class="col-md-8">
                          <select name="categoryn" class="form-control" id="status" required>                   
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
                          <select name="subcateg" class="form-control" id="status" required>                   
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
                         <label class="col-md-4"><b>Select Product</b></label>
                        <div class="col-md-8">
                          <select name="product" class="form-control" id="status" required>                   
                                <option selected="yes" value="selected" disabled="yes">select Product</option>
                                 <?php 
 
             $productselect = mysqli_query($link,"SELECT DISTINCT * FROM  products order BY `product_name` ASC");
            while($productrow = mysqli_fetch_assoc($productselect))
                                 {
                                ?>
             <option value="<?php echo $productrow['product_id']?>"><?php echo ucfirst($productrow['product_name']) ?></option>
                        
                                <?php 
                              }
                              ?>
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
           <div class="row" style="background:#f7f7f7; padding:20px;margin:15px;">
                <div class="col-md-8 col-md-offset-4" >
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
        <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Table Example</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Category Name</th>  
                    <th>Sub Category Name</th>  
                    <th>Product Name</th>  
                    <th>Item Name</th>  
                    <!-- <th>Item Price</th>    -->
                    <!-- <th>Item Description</th>                   -->
                    <th>Item Status<Status>
                    <th>Edit<Status>
                  </tr>
                </thead>
                 <tbody>
                <?php
                  $counter = 1;
 $w = mysqli_query($link,"SELECT * FROM items i INNER JOIN products p on i.product_id = p.product_id INNER JOIN sub_category s on s.subcategory_id = i.subcategory_id INNER JOIN category c on c.category_id = i.category_id ORDER BY item_name");
                 // $w = mysqli_query($link,"SELECT * FROM `items`");
                  while($wrow = mysqli_fetch_assoc($w))
                  {
                ?>
                  <tr>
                    <td><?php echo $counter; ?></td>
                    <td><?php echo $wrow['category_name']; ?></td>
                    <td><?php echo $wrow['subcategory_name']; ?></td>
                    <td><?php echo $wrow['product_name']; ?></td>
                    <td><?php echo $wrow['Item_name']; ?></td>
                    <!-- <td><?php echo $wrow['item_price']; ?></td> -->
                    <!-- <td><?php echo $wrow['item_description']; ?></td> -->
                    <td><?php echo $wrow['item_status']; ?></td>
                   <td><a href="edititem.php?id=<?php echo $wrow['item_id'];?>" id="<?php echo 
                   $wrow['item_id'];?>"><i class="fas fa-edit"></i></a></td>
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
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
