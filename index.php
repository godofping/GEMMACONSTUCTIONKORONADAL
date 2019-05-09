<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gemma's Construction</title>

  <!-- bootstrap -->




    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">


      <a class="hiddenanchor" id="signin"></a>

      <?php 
      if( isset($_GET['s']))
      { ?>
 <div class="login_wrapper"> <!-- start -->
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action = "authentication.php">
              <h1>Login Form</h1>
                <div class="row">
                       
                          <div class="col-md-12">
                            <div class="alert alert-error alert-dismissible fade in " role="alert">
                            <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> -->
                            </button>
                            <strong>Incorrect</strong> username and/or password!
                          </div>
                          </div>
                       </div>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <input type= "submit" class="btn btn-default submit" value="Submit">
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
               

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-truck"></i> Gemmas' Construction Inventory System</h1>
                  <p>©<?php echo date("Y"); ?> All Rights Reserved. Gemma's Construction</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div> <!-- end -->
 <?php }else{ ?>
 <div class="login_wrapper"> <!-- start -->
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action = "authentication.php">
              <h1>Login Form</h1>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <input type= "submit" class="btn btn-default submit" value="Submit">
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
               

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-truck"></i> Gemmas' Construction Inventory System</h1>
                  <p>©<?php echo date("Y"); ?> All Rights Reserved. Gemma's Construction</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div> <!-- end -->

 <?php } ?>

 <script type="text/javascript">
   <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>

 </script>
  </body>
</html>
