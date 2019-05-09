<?php session_start(); 

include_once('conn.php');

if(isset($_SESSION["adminid"]))
{

}
else
{
  header("Location: index.php");
}


$result = mysqli_query($connection,"select * from admin_table where adminid = '" . $_SESSION["adminid"] . "'");


$result = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gemma's Construction</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">


  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="admin-home.php" class="site_title"><i class="fa fa-truck"></i> <span>Gemma's Con. IS</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $result['fullname']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <?php include('admin-side-menu.php'); ?>

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/user.png" alt=""><?php echo $result['fullname']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="profile.php"> Profile</a></li>
                    
                    
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

               
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

         <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              

          
            </div>

            <div class="clearfix"></div>

            <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-product-hunt"></i></div>
                  <div class="count"><?php 
                  $projectQry = mysqli_query($connection, "select count(*) as count from project_table");
                  $projectRes = mysqli_fetch_assoc($projectQry);
                  echo $projectRes['count'];
                   ?></div>
                  <h3>Projects</h3>
                  <p>number of projects</p>
                </div>
              </div>
             <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-bus"></i></div>
                  <div class="count"><?php 
                  $projectQry = mysqli_query($connection, "select count(*) as count from product_table");
                  $projectRes = mysqli_fetch_assoc($projectQry);
                  echo $projectRes['count'];
                   ?></div>
                  <h3>products</h3>
                  <p>number of products</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-user"></i></div>
                  <div class="count"><?php 
                  $projectQry = mysqli_query($connection, "select count(*) as count from project_engineer_table");
                  $projectRes = mysqli_fetch_assoc($projectQry);
                  echo $projectRes['count'];
                   ?></div>
                  <h3>Engineers</h3>
                  <p>number of engineers</p>
                </div>
              </div>
          
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Dashboard <small>request</small></h2>
                 
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="row"> <!-- code here -->

             
                    <table id="datatable-buttons" class="table table-striped table-bordered table-responsive">
                      <thead>
                        <tr>
                        <th>Project ID</th>
                        <th>Project Name</th>
                          <th>Product Name</th>
                          <th>Requested Quantity</th>
                          <th>Requested Date</th>
                          <th>Approval Status</th>
                          <th>Engineer Name</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <?php 

                          $getqry = mysqli_query($connection,"select * from outview where isOpened = 'False'");

                          while ($getResult = mysqli_fetch_assoc($getqry)) {
                          
                            ?>
                            <tr>
                            <td><?php echo $getResult['ProjectID']; ?></td>
                            <td><?php echo $getResult['ProjectName']; ?></td>
                            <td><?php echo $getResult['ProductName']; ?></td>
                            <td><?php echo $getResult['OutQuantity']; ?></td>
                            <td><?php echo $getResult['RequestDate']; ?></td>
                            <td><?php echo $getResult['IsApproved']; ?></td>
                            <td><?php echo $getResult['ProjectEngrName']; ?></td>
                            <td><?php if ($getResult['isOpened'] == 'False') {
                              echo "<b>New</b>";
                            }?></td>
                            </tr>
                            <?php
                          }
                           ?>
                        </tr>
                      </tbody>
                    </table>

    
                      
                     
                      
                   			
                    </div>	<!-- end code here -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            ©<?php echo date("Y"); ?> All Rights Reserved. Clarita's Lodge
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

      <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

       <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
  </body>
</html>