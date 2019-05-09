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

            

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Inventory <small>Manage inventory</small></h2>
                 
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="row"> <!-- code here -->
<div style="padding-bottom: 15px;"></div>

            
<div style="padding-bottom: 25px;"></div>


 <!-- start modal part-->
 <?php 
$getProductTableQry = mysqli_query($connection,"SELECT ProductID,ProductName,ProductDescription, SUM(InQuantity) AS instock FROM inventoryview GROUP BY ProductID");
while ($resultInGetProductTableQry = mysqli_fetch_assoc($getProductTableQry)) 
{
?>
            

<!-- editproductmodal  -->
<?php include("stockoutmodal.php"); ?>
<?php include ("viewstockinmodal.php"); ?>
<?php include("editstockinhistorymodal.php"); ?>
<?php include("addstockmodal.php"); ?>

<?php 
} 
?> <!-- end dito -->






 


<!-- start table -->
<table id="datatable-buttons" class="table table-striped table-bordered table-responsive">
                      <thead>
                        <tr>

                          <th>Product ID</th>
                          <th>Product Name</th>
                          <th>Product Description</th>
                          <th>In Stocks</th>
                          <th>Stock Out (Indirect)</th>
                          <th>Stock Out (Direct)</th>
                          <th>Action</th>
               
                    
                       
                       
                     
                        </tr>
                      </thead>


                      <tbody>
                        <?php  
                       
                        $getProductTableQry = mysqli_query($connection,"SELECT * FROM inventoryview1");
                        while ($resultInGetProductTableQry = mysqli_fetch_assoc($getProductTableQry)) {
                         ?>




                         <tr>
                           <td><?php echo $resultInGetProductTableQry['ProductID']; ?></td>
                           <td><?php echo $resultInGetProductTableQry['ProductName']; ?></td>
                           <td><?php echo $resultInGetProductTableQry['ProductDescription']; ?></td>
                           <td><?php

                           $getCurrentStockQry = mysqli_query($connection, "SELECT (SELECT SUM(InQuantity) FROM in_table WHERE ProductID = '" . $resultInGetProductTableQry['ProductID'] . "') - (SELECT COALESCE(SUM(OutQuantity),0) FROM outview WHERE ProductID = '" . $resultInGetProductTableQry['ProductID'] . "' AND IsApproved = 'Approved' AND Method = 'Indirect' ) as currentstocks");

                            


                           $getCurrentStockResult = mysqli_fetch_assoc($getCurrentStockQry);

                           if($getCurrentStockResult['currentstocks'] < 0)
                           {
                            echo "insufficient " . abs($getCurrentStockResult['currentstocks']); 
                           }
                           else
                           {
                             echo $getCurrentStockResult['currentstocks']; 
                           }
                            




                            ?>
                            
                           </td>

                           <td><?php 
                           $stockOutQry = mysqli_query($connection,"select *,COALESCE(sum(OutQuantity),0) as numberofstockout from outview where ProductID = '" . $resultInGetProductTableQry['ProductID'] . "' and isApproved = 'Approved' and Method = 'Indirect'");

                           $stockoutView = mysqli_fetch_assoc($stockOutQry);

                           echo $stockoutView['numberofstockout'];

                            ?>
                              


                            </td>

                            <td><?php 
                           $stockOutQry = mysqli_query($connection,"select *,COALESCE(sum(OutQuantity),0) as numberofstockout from outview where ProductID = '" . $resultInGetProductTableQry['ProductID'] . "' and isApproved = 'Approved' and Method = 'Direct product to site'");

                           $stockoutView = mysqli_fetch_assoc($stockOutQry);

                           echo $stockoutView['numberofstockout'];

                            ?>
                              


                            </td>
                          

                           <td style="text-align: center;">

                            <span data-toggle="tooltip" data-placement="top" title="View Stock Out History">
                               <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#viewStockOutHistory<?php echo $resultInGetProductTableQry['ProductID']; ?>"><i style="font-size: 14px;" class="fa fa-eye" aria-hidden="true"></i></button>
                             </span>

                            <span data-toggle="tooltip" data-placement="top" title="Add Stock">
                               <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#addStockModal<?php echo $resultInGetProductTableQry['ProductID']; ?>"><i style="font-size: 14px;" class="fa fa-plus-circle" aria-hidden="true"></i></button>
                             </span>


                             <span data-toggle="tooltip" data-placement="top" title="View Stock In History">
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#viewStockHistoryModal<?php echo $resultInGetProductTableQry['ProductID']; ?>"><i style="font-size: 14px;" class="fa fa-eye" aria-hidden="true"></i></button>
                             </span>

                             

                             <span data-toggle="tooltip" data-placement="top" title="Edit Stock History">
                                
                           <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editStockHistoryModal<?php echo $resultInGetProductTableQry['ProductID']; ?>"><i style="font-size: 14px;" class="fa fa-edit" aria-hidden="true"></i></button>
                             </span>




                           </td>

                        


                          

                      

                         </tr>
                         <?php
                        }
                         ?>
                        
                      </tbody>
                    </table>
<!-- end table -->
    
                      
                     
                      
                        
                    </div>  <!-- end code here -->
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
            ©<?php echo date("Y"); ?> All Rights Reserved. Gemma's Construction
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
  </body>
</html>