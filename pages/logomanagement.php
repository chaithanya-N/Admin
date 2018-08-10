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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<style>
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
                    <h1 class="page-header">Manage Logo</h1>
                </div>
        </div>
            <div class="row">
              <div class="col-lg-12">
                  <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="dashboard.php">Dashboard</a>
                  </li>
                   <li class="breadcrumb-item">
                    <a href="logomanagement.php">Logo Management</a>
                  </li>
                  <li class="breadcrumb-item active">Manage Logo</li>
                </ol>
              </div>
                <!-- /.col-lg-12 -->
            </div>
            
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-2">
              <?php
                $q = mysqli_query($link,"SELECT logo from logo");
                $row = mysqli_num_rows($q);

                if($row > 0)
                {
                    $rowdata = mysqli_fetch_assoc($q);
             
                  if(empty($rowdata['logo']))
                  {
                    ?>
                      <img src="../images/default-placeholder.png" width="100%">
                    <?php 
                  }
                  else
                  {
                    ?>
                      <img src="<?php echo $rowdata['logo']; ?>" width="100%">
                    <?php
                  }
                   
              }
              else
              {
                ?>
                 <img src="../images/default-placeholder.png" width="100%">
                <?php
              }
              ?>
             </div>
             <div class="col-md-6">
               <form action="upload-logo.php" method="post" enctype="multipart/form-data">             
                   <div class="row" id="uploadpics1" style="padding:15px;">                       
                      <label class="col-md-4"><b>Upload Logo</b> </label>
                         <div class="col-md-8">
                            <input type="file" name="file"  class="btn btn-primary" id="file">
                         </div>
                    </div> 
                 <button class=" col-md-offset-8 btn btn-primary" style="margin:10px;" type="submit" 
                           value="Upload" id="upbtn">Upload</button>
               </form>
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

</body>

</html>
