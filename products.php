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
                    <li><a href="javascript:;"> Profile</a></li>
                    
                    
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
                    <h2>Products <small>Add | Edit | Delete Products</small></h2>
                 
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="row"> <!-- code here -->
<div style="padding-bottom: 15px;"></div>

             <!-- Trigger the modal with a button -->
<button disabled="" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i style="font-size: 14px;" class="fa fa-plus-circle" aria-hidden="true"></i> Add new product</button>
<div style="padding-bottom: 25px;"></div>

 <!-- start modal -->
 <?php 
                        $getProductTableQry = mysqli_query($connection,"select * from product_table");
                        while ($resultInGetProductTableQry = mysqli_fetch_assoc($getProductTableQry)) {
                         ?>
                                     <!-- edit Modal -->
            <div id="editModal<?php echo $resultInGetProductTableQry['ProductID']; ?>" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!--  Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit product</h4>
                  </div>
                  <div class="modal-body">
                    
                    <br />
                                <form id="editProductForm" action="update-product.php" data-parsley-validate class="form-horizontal form-label-left">

                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="productname">Product Name <span class="required"></span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                      <input type="text" id="productname" value="<?php echo $resultInGetProductTableQry['ProductName']; ?>" name="productname" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                  </div>


                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="productdescription">Product Description <span class="required"></span>
                                    </label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                      <textarea rows= "3" type="text" id="productdescription" name="productdescription" required="required" class="form-control col-md-7 col-xs-12"><?php echo $resultInGetProductTableQry['ProductDescription']; ?></textarea>
                                    </div>
                                  </div>
                                    
                                    <input type="text" name="productid" value="<?php echo $resultInGetProductTableQry['ProductID']; ?>" hidden>
                              

                              

                  </div>
                  <div class="modal-footer">
                  <button type="submit" class="btn btn-success"><i style="font-size: 14px;" class="fa fa-save" aria-hidden="true"></i> Save</button>
                    </form>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close" data-dismiss="modal" aria-hidden="true"></i> Close</button>
                  </div>
                </div>

              </div>
            </div>

            <!-- end modal -->



            <!-- Delete Modal -->
<div id="deleteModal<?php echo $resultInGetProductTableQry['ProductID']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete dialog</h4>
      </div>
      <div class="modal-body">
        <p>You are about to delete this item this procedure is irreversible !</p>
        <p>Do you want to proceed?</p>

        <form id="editProductForm" action="delete-product.php" data-parsley-validate class="form-horizontal form-label-left">
        <input type="text" name="productid" value="<?php echo $resultInGetProductTableQry['ProductID']; ?>" hidden>
       

      </div>


      <div class="modal-footer">
        <button type="submit" class="btn btn-info"><i class="fa fa-check" aria-hidden="true"></i> Yes</button>
         </form>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close" data-dismiss="modal" aria-hidden="true"></i> No</button>
      </div>
    </div>

  </div>
</div>

<!-- end modal -->


                         <?php } ?>



 <!-- Add new Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!--  Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add new product</h4>
      </div>
      <div class="modal-body">
        
        <br />
                    <form id="demo-form2" action="insert-product.php" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="productname">Product Name <span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="productname" name="productname" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="productdescription">Product Description <span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <textarea rows= "3" type="text" id="productdescription" name="productdescription" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="InQuantity">Initial Quantity <span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="number" id="InQuantity" name="InQuantity" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      
        
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-success"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
       </form>

        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i>  Close</button>
      </div>
    </div>

  </div>
</div>

<!-- end modal -->


<!-- start table -->
<table id="datatable-buttons" class="table table-striped table-bordered table-responsive">
                      <thead>
                        <tr>

                          <th>Product ID</th>
                          <th>Product Name</th>
                          <th>Product Description</th>
                          <th>Action</th>
                         
                       
                     
                        </tr>
                      </thead>


                      <tbody>
                        <?php 
                        $getProductTableQry = mysqli_query($connection,"select * from product_table");
                        while ($resultInGetProductTableQry = mysqli_fetch_assoc($getProductTableQry)) {
                         ?>




                         <tr>
                           <td><?php echo $resultInGetProductTableQry['ProductID']; ?></td>
                           <td><?php echo $resultInGetProductTableQry['ProductName']; ?></td>
                           <td><?php echo $resultInGetProductTableQry['ProductDescription']; ?></td>


                             <span data-toggle="tooltip" data-placement="top" title="Edit">
                                
                            <td style="text-align: center;"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal<?php echo $resultInGetProductTableQry['ProductID']; ?>"><i style="font-size: 14px;" class="fa fa-edit" aria-hidden="true"></i></button>

                             </span>

                              <span data-toggle="tooltip" data-placement="top" title="Delete">
                                
                           <button disabled="" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?php echo $resultInGetProductTableQry['ProductID']; ?>"><i style="font-size: 14px;" class="fa fa-trash" aria-hidden="true"></i></button></td>

                             </span>
                           

                           
                         

                          

                      

                         </tr>
                         <?php
                        }
                         ?>
                        
                      </tbody>
                    </table>
<!-- end table -->
    
                      
                     
                      
                   			
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