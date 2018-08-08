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

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<style>
.error{font-size:13px; color:red;}
</style>

<body class="bg-dark">
 <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
        <form id="loginform" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" name="email" id="email" type="email" aria-describedby="emailHelp" placeholder="Enter email">
              <span id="email-error" class="error"> </span>
             <!-- <span style="color:red" id="emaile">Please enter valid email<span> -->
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="password" type="password" placeholder="Password" name="password">
            <span id="pwd-error" class="error"> </span>
            <!-- <span style="color:red" id="pswe">Please enter password<span> -->
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>
          <!-- <a class="btn btn-primary btn-block" href="dashb.html" id="loginbtn">Login</a> -->
        <input type="button" id="loginbtn" value="Login" 
         class="btn btn-primary btn-block">
        </form>
        <div class="row">
         <div class="text-center" style="padding:10px;">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
        </div>
    </div>
      
                    </div>
                </div>
            </div>
        </div>
    </div>
   <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

   <script type="text/javascript">

    $(document).ready(function() {

    $('#email').blur(function(){
       var emailid = $(this).val();
      // alert (emailid);

      if(emailid != '')
      {
        $('#email-error').text('');
         $.ajax({
          url:'email-check.php',
          type:'POST',
          data: {'email':emailid},

          success:function(result)
          {
              // alert(result);
            if(result == 'no email')
            {
              $('#email-error').text('Your Email is not Registered');
            }
             if(result == 'email')
            {
              $('#email-error').text('');

              $('#loginbtn').click(function(){

                var data = $('#loginform').serialize();
                // console.log(data);
                $.ajax({
                  url:'process-login.php',
                  type:'POST',
                  data:data,

                  success:function(result)
                  {
                      // alert(result);

                    if(result == 'Password-Mismatch')
                    {
                      $('#pwd-error').text('Password Mismatch');
                      // window.location.href = 'index.php';
                    }

                    if(result == 'Admin')
                    {
                      window.location.href = 'dashboard.php';
                    }
                   
                  }
                })

              })


            }
          }
         })
      }
      else
      {
        $('#email-error').text('Email Should Not Be Empty');
       }

    })

 
// enable enter button 
$("#password").keyup(function(){
  if(event.keyCode == 13) {
        $("#loginbtn").click();
    }
 });

   })

  </script>


</body>

</html>
