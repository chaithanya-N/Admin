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
                    <h1 class="page-header">Edit User</h1>
                </div>
              <div class="col-lg-12">
                   <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="dashboard.php">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item">
                         <a href="createuser.php">Usermanagement</a>
                      </li>
                       <li class="breadcrumb-item active">edit User</li>
                    </ol>
              </div>
          <?php 
            $id = $_GET['id'];
            // echo $id;
            $euser = mysqli_query($link,"SELECT * FROM users WHERE id = '".$id."'");
            $row = mysqli_fetch_assoc($euser);
          ?>
    
    
      <div class="col-md-8" style="color:#000;"> 
          <form class="form-horizontal" action="" id="edituserform">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="name">Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="email">Email</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row
                    ['email']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="name">Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" id="psw" name="psw" value="<?php echo $row
                    ['password']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="pwd">User Type</label>
                  <div class="col-sm-9"> 
                    <select class="form-control" id="usertype" name="usertype">
                      <option value="" selected="yes" disabled="disabled">Select User Type</option>
                      <option value="Admin">Admin</option>
                      <option value="Moderator">Moderator</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="pwd">Status</label>
                  <div class="col-sm-9"> 
                    <select class="form-control" id="status" name="ustatus">
                      <option value="" selected="yes" disabled="disabled">Select status</option>
                      <option value="Active">Active</option>
                      <option value="Deactive">Deactive</option>
                    </select>
                  </div>
                </div>
                 <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="button" class="btn btn-warning" id="updateuser">Update</button>
             <a href="existinguser.php" type="button" class="btn btn-info"id="canceledituser">Cancel</a> 
                <!-- <button type="button" class="btn btn-info" id="deleteuser"><a classs="clbtn" href="existinguser">Cancel</a></button> -->
                <button type="button" class="btn btn-danger" id="deleteuser">Delete</button>
              </div>
            </div>
              </form>
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
// get user type from db
  $('#usertype option').each(function(){

      var ut = '<?php echo $row['user_type']; ?>';
      if($(this).val() == ut)
      {
        $(this).addClass("active");
        $(this).attr("selected","selected");
      }
    });
  // get status from db
  $('#status option').each(function(){

      var ut = '<?php echo $row['status']; ?>';
      if($(this).val() == ut)
      {
        $(this).addClass("active");
        $(this).attr("selected","selected");
      }
    });
// insert user data to db
    $('#createuserformbtn').click(function(){
      var data = $('#createuserform').serialize();
         // console.log(data);
         // alert();
         $.ajax({
              url: 'process-createuser.php',     
                type: 'POST', // performing a POST request
                data : data,
                                
               success: function(result)         
                {
                   // alert(result);
                  if(result = "SUCCESS")
                     {
                         alert(result);
                          window.location.href = "createuser.php";
                   //   $('#usercreate').modal('show'); 
                   //  $('#usercreate').on('hidden.bs.modal', function () {
                   // window.location.href = "createuser.php";
                   //   })
                      }
                }
         });
    })
// insert user data to db end

// update userdata
    $('#updateuser').click(function(){
  var data = $('#edituserform').serialize();

   // alert();
  $.ajax({
    url:'process-edituser.php',
    type:'POST',
    data:data,
    success:function(result)
    {
       // alert(result);
        window.location.href = "existinguser.php";
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
 // update userdata end
 // delete user
 $('#deleteuser').click(function(){

  var data = $('#edituserform').serialize();

  $.ajax({
    url:'process-deleteuser.php',
    type:'POST',
    data:data,

    success:function(result)
    {
       // alert(result);
       window.location.href = "existinguser.php";
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
 // delete user end
});




    
    </script>

</body>

</html>
