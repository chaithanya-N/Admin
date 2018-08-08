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

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>
<style>
/*a:hover {
    text-decoration:none; 
}
li>.active{background-color:#337ab7;color:#fff;}*/
</style>

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
            <!-- /.navbar-header -->

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
                         <a href="slidermanagement.php">Image Management</a>
                      </li>
                      <li class="breadcrumb-item active">Manage Banner Image</li>
                    </ol>
              </div>
                <div class="container-fluid">
     <div class="row">
        <div class="col-md-12">
          <h1 style="font-size:24px;">Manage Banner Image</h1>
          <hr>
        </div>
      </div>

  <!-- <div class="container"> -->
    <!-- Nav pills -->
    <ul class="nav nav-pills" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="pill" href="#home">Upload Banner IMages</a>
      </li>
      <li id="del" class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu1">Delete Photos</a>
      </li>
    </ul>


 <div class="tab-content">
      
      
        </div>
    <!-- Tab panes -->
    <div class="tab-content">
      <div id="home" class="container tab-pane active">
        <div class="row" style="background:#f7f7f7; padding:20px;margin:5px;text-align:left;">
              <div class="col-md-6 col-md-offset-3" >
               <!-- <h1 style="font-size:16px;"> Upload Slider Image</h1> -->
                  <form action="upload-bannerimage.php" method="post" enctype="multipart/form-data">
                      <div class="row" >
                        <div class="row" id="uploadpics1" style="padding:15px;">                       
                          <label class="col-md-4"><b>Upload  images</b> </label>
                        <div class="col-md-8">
                            <input type="file" name="file[]" multiple class="btn btn-primary" id="file">
                        </div>
                    </div> 
                    <div class="row" id="uploadpics1" style="padding:15px;">                         
                        <label class="col-md-4"><b>select status</b></label>
                        <div class="col-md-8">
                          <select name="users" class="form-control" id="statusct" required>                               
                                <option selected="yes" value="selected" disabled="yes">select status</option>
                                 <option value="Active">Active</option>
                                  <option value="Deactive">Deactive</option>
                             </select>                                 
                        </div>
                      </div>
                           <button class=" col-md-offset-8 btn btn-primary" style="margin:10px;" type="submit" 
                           value="Upload" id="upbtn">Upload</button>
                      </div>                                                       
                   </form>
                 </div>
           </div>
      </div>
      
        <div id="menu1" class="container tab-pane fade">
         <div class="col-md-12" style="padding:10px;">
          <div class="row">
         <?php    
                      $w = mysqli_query($link,"SELECT * FROM `bannerimage`");
                      while($wrow = mysqli_fetch_assoc($w))
                      {
                    ?>             
                     <div class="col-md-3" style="border:1px solid; padding:10px; ">
                      <div class="thumbnail">
                        <a href="/w3images/lights.jpg">
                         <img  src="../images/bannerimages/<?php echo $wrow['banner_image']; ?>" alt="" class="img-responsive"  style="width:100%;">
                          <div class="caption">
                            <p>
                            <a href="deletebanner.php?id=<?php echo $wrow['id'];?>" id="<?php echo $wrow['id'];?>">
                        <span style="color:red; cursor:pointer" class="fas fa-trash-alt" id="bannerimage"></span></a> 
                                </p>
                          </div>
                        </a>
                      </div>
                    </div>
                        
                    <?php
                    }
                    ?>
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

    <!-- Flot Charts JavaScript -->
    <script src="../vendor/flot/excanvas.min.js"></script>
    <script src="../vendor/flot/jquery.flot.js"></script>
    <script src="../vendor/flot/jquery.flot.pie.js"></script>
    <script src="../vendor/flot/jquery.flot.resize.js"></script>
    <script src="../vendor/flot/jquery.flot.time.js"></script>
    <script src="../vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="../data/flot-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
     <script>
 $(document).ready(function(){
    $('#home').addClass('active');


    var full_url = document.URL; // Get current url
    var url_array = full_url.split('#') // Split the string into an array with / as separator
    var last_segment = url_array[url_array.length-1];  // Get the last part of the array (-1)
    // alert( last_segment ); // Alert last segment


    if(last_segment == "del")
    {
        $('.nav-pills li>a.active').removeClass('active');
        $('#del').addClass('active');
         $('#home').removeClass('active');
        $('#menu1').addClass('in');
        $('#menu1').addClass('active');
     }

   });
</script>

</body>

</html>
