<?php session_start(); 

include_once('conn.php');

if(isset($_SESSION["ProjectEngrID"]))
{

}
else
{
  header("Location: index.php");
}


$result = mysqli_query($connection,"select * from project_engineer_table where ProjectEngrID = '" . $_SESSION["ProjectEngrID"] . "'");


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

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="engineer-home.php" class="site_title"><i class="fa fa-truck"></i> <span>Gemma's Con. IS</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $result['ProjectEngrName']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <?php include('engineer-side-menu.php'); ?>

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
                    <img src="images/user.png" alt=""><?php echo $result['ProjectEngrName']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="engineer-profile.php"> Profile</a></li>
                    
                    
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
                    <h2>Projects <small>list of projects</small></h2>
                 
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="row"> <!-- code here -->


                    <?php

                    $getProjectableQry = mysqli_query($connection,"select * from projectview where ProjectEngrID = '" . $result['ProjectEngrID'] . "'");
                        while ($resultInGetProjectTableQry = mysqli_fetch_assoc($getProjectableQry)) {

                        ?>





<!-- view requested material Modal -->
            <div id="requestRequestedMaterialModal<?php echo $resultInGetProjectTableQry['ProjectID']; ?>" class="modal fade" role="dialog">
              <div class="modal-dialog modal-lg">

                <!--  Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Requested material</h4>
                  </div>
                  <div class="modal-body">

                  <p><b>Project ID:</b> <?php echo $resultInGetProjectTableQry['ProjectEngrID']; ?></p>
                  <p><b>Project ID:</b> <?php echo $resultInGetProjectTableQry['ProjectName']; ?></p>
                  <p><b>Station Limit:</b> <?php echo $resultInGetProjectTableQry['StationLimit']; ?></p>

                  <p><b>Quantity Claimed/Allocated Quantity:</b> 

                  <?php 

                    $getMaterialTableQuery1 = mysqli_query($connection, "select * from materialview where ProjectID = '" . $resultInGetProjectTableQry['ProjectID'] . "'");




                    $getMaterialTableResult1 = mysqli_fetch_assoc($getMaterialTableQuery1);




             $getNumberOFClaimedMaterialsQuery1 = mysqli_query($connection,"SELECT *,SUM(OutQuantity) AS TotalClaimed FROM out_table WHERE ProjectID = '" . $resultInGetProjectTableQry['ProjectID'] . "' AND IsApproved = 'Approved' GROUP BY ProjectID");

          $getNumberOFClaimedMaterialsResult1 = mysqli_fetch_assoc($getNumberOFClaimedMaterialsQuery1);
            


        
           
            if($getNumberOFClaimedMaterialsResult1['TotalClaimed'] == '')
           {
            echo 0;

          }
          else{
            echo $getNumberOFClaimedMaterialsResult1['TotalClaimed'];
          }  

           echo "/";

          if($getMaterialTableResult1['Quantity'] == '')
           {
            echo 0;

          }
          else{
            echo $getMaterialTableResult1['Quantity'];
          }

       


                  ?>


                  </p>


                    
                    <br />
                                <form id="demo-form2" action="request-material.php" data-parsley-validate class="form-horizontal form-label-left">

                                <input type="text" name="ProjectID" value="<?php echo $resultInGetProjectTableQry['ProjectID']; ?>" hidden>

                      <table id="datatable" class="table table-striped table-bordered table-responsive">
                        <thead>
                          <tr>
                          
                            <th>Product Name</th>
                            <th>Requested Quantity</th>
                            <th>Requested Date</th>
                            <th>Approval Status</th>
                            <th>Action</th>

                            <form>
                         
                        </tr>
                        </thead>

                        <tbody>
                            
                            <?php

         $getMaterialTableQuery = mysqli_query($connection, "select * from outview where ProjectID = '" . $resultInGetProjectTableQry['ProjectID'] . "' ");

         

          while ($getMaterialTableResult = mysqli_fetch_assoc($getMaterialTableQuery)) {
          
          ?>

          <tr>
           <td><?php echo $getMaterialTableResult['ProductName']; ?></td>
           <td><?php echo $getMaterialTableResult['OutQuantity']; ?></td>
        <td><?php echo $getMaterialTableResult['RequestDate']; ?></td>
        <td><?php echo $getMaterialTableResult['IsApproved']; ?></td>

      
         

          <?php if ($getMaterialTableResult['IsApproved'] == 'Approved') {
            ?>
            <td style="text-align: center;"><a href="delete-requested-materials.php?OutID=<?php echo $getMaterialTableResult['OutID']; ?>"><button type="button" disabled="" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button></a></td>  </td>
            <?php
          }else { ?>


             
            <td style="text-align: center;">

          
            <a href="delete-requested-materials.php?OutID=<?php echo $getMaterialTableResult['OutID']; ?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button></a></td>
               


            <?php } ?>

            
      
        

  

         </tr>

         </form>

        <?php
         } ?>

                        </tbody>
                      </table>



      </div>
      <div class="modal-footer">
   
       </form>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close" data-dismiss="modal" aria-hidden="true"></i> Close</button>
                  </div>
                </div>

              </div>
            </div>

            <!-- end modal -->




<!-- request material Modal -->
            <div id="requestMaterialModal<?php echo $resultInGetProjectTableQry['ProjectID']; ?>" class="modal fade" role="dialog">
              <div class="modal-dialog modal-lg">

                <!--  Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Request materials</h4>
                  </div>
                  <div class="modal-body">

                  <p><b>Project ID:</b> <?php echo $resultInGetProjectTableQry['ProjectEngrID']; ?></p>
                  <p><b>Project ID:</b> <?php echo $resultInGetProjectTableQry['ProjectName']; ?></p>
                  <p><b>Station Limit:</b> <?php echo $resultInGetProjectTableQry['StationLimit']; ?></p>


                    
                    <br />
                                <form id="demo-form2" action="request-material.php" data-parsley-validate class="form-horizontal form-label-left">

                                <input type="text" name="ProjectID" value="<?php echo $resultInGetProjectTableQry['ProjectID']; ?>" hidden>

                      <table class="table table-striped table-bordered table-responsive">
                        <thead>
                          <tr>
                          
                            <th>Product Name</th>
                            <th>Method</th>
                            <th>Quantity Claimed/Allocated Quantity</th>
                            <th>Request Quantity</th>
                            <th>Action</th>

                            <form>
                         
                        </tr>
                        </thead>

                        <tbody>
                            
                            <?php

         $getMaterialTableQuery = mysqli_query($connection, "select * from materialview where ProjectID = '" . $resultInGetProjectTableQry['ProjectID'] . "'");


          while ($getMaterialTableResult = mysqli_fetch_assoc($getMaterialTableQuery)) {


          $getNumberOFClaimedMaterialsQuery = mysqli_query($connection,"SELECT *,SUM(OutQuantity) AS TotalClaimed FROM out_table WHERE ProjectID = '" . $resultInGetProjectTableQry['ProjectID'] . "' AND IsApproved = 'Approved' GROUP BY ProjectID");

          $getNumberOFClaimedMaterialsResult = mysqli_fetch_assoc($getNumberOFClaimedMaterialsQuery);

          
          ?>

          <tr>
           <td><?php echo $getMaterialTableResult['ProductName']; ?></td>
           <td><?php echo $getMaterialTableResult['Method']; ?></td>
           <td><?php 

           if(empty($getNumberOFClaimedMaterialsResult['TotalClaimed']))
           {
            echo "0";
           }
           else{
           echo $getNumberOFClaimedMaterialsResult['TotalClaimed']; 
}

           ?>/<?php echo $getMaterialTableResult['Quantity']; ?></td>
           <td>
            
            <input type="text" name="ProductID" value="<?php echo $getMaterialTableResult['ProductID']; ?>" hidden>
            <input type="text" name="MaterialID" value="<?php echo $getMaterialTableResult['MaterialID']; ?>" hidden>
            


              <div class="form-group">
                       
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="number" id="OutQuantity" name="OutQuantity" required="required" class="form-control col-md-7 col-xs-12" placeholder="Max <?php echo $getMaterialTableResult['Quantity'] - $getNumberOFClaimedMaterialsResult['TotalClaimed']; ?>"  max="<?php echo $getMaterialTableResult['Quantity'] - $getNumberOFClaimedMaterialsResult['TotalClaimed']; ?>">
                        </div>
                      </div>

           

           </td>

           <td>



            <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Request</button>



           </td>
          

         </tr>

         </form>

        <?php
         } ?>

                        </tbody>
                      </table>



      </div>
      <div class="modal-footer">
   
       </form>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close" data-dismiss="modal" aria-hidden="true"></i> Close</button>
                  </div>
                </div>

              </div>
            </div>

            <!-- end modal -->




<!-- Add material Modal -->
            <div id="viewAllocatedMaterialModal<?php echo $resultInGetProjectTableQry['ProjectID']; ?>" class="modal fade" role="dialog">
              <div class="modal-dialog modal-lg">

                <!--  Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Allocated materials</h4>
                  </div>
                  <div class="modal-body">
                    
                    <br />
                                <form id="demo-form2" action="insert-material.php" data-parsley-validate class="form-horizontal form-label-left">

                                <input type="text" name="ProjectID" value="<?php echo $resultInGetProjectTableQry['ProjectID']; ?>" hidden>

                      <table class="table table-striped table-bordered table-responsive">
                        <thead>
                          <tr>
                          
                            <th>Product Name</th>
                            <th>Method</th>
                            <th>Quantity Claimed/Allocated Quantity</th>
                         
                        </tr>
                        </thead>

                        <tbody>
                            
                            <?php

         $getMaterialTableQuery = mysqli_query($connection, "select * from materialview where ProjectID = '" . $resultInGetProjectTableQry['ProjectID'] . "'");

          while ($getMaterialTableResult = mysqli_fetch_assoc($getMaterialTableQuery)) {
          
          $getNumberOFClaimedMaterialsQuery = mysqli_query($connection,"SELECT *,SUM(OutQuantity) AS TotalClaimed FROM out_table WHERE ProjectID = '" . $resultInGetProjectTableQry['ProjectID'] . "' AND IsApproved = 'Approved' GROUP BY ProjectID");

          $getNumberOFClaimedMaterialsResult = mysqli_fetch_assoc($getNumberOFClaimedMaterialsQuery);


          ?>

          <tr>
           <td><?php echo $getMaterialTableResult['ProductName']; ?></td>
           <td><?php echo $getMaterialTableResult['Method']; ?></td>
           <td><?php
           if( empty($getNumberOFClaimedMaterialsResult['TotalClaimed']))
           {
            echo "0";
           }else{
            echo $getNumberOFClaimedMaterialsResult['TotalClaimed'];
}

             ?>/<?php echo $getMaterialTableResult['Quantity']; ?></td>
          

         </tr>

        <?php
         } ?>

                        </tbody>
                      </table>



      </div>
      <div class="modal-footer">
   
       </form>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close" data-dismiss="modal" aria-hidden="true"></i> Close</button>
                  </div>
                </div>

              </div>
            </div>

            <!-- end modal -->




                        <?php } ?>
             


<div>
  
<!-- start table -->
<table id="datatable-buttons" class="table table-striped table-bordered table-responsive">
                      <thead>
                        <tr>

                          <th>Project ID</th>
                          <th>Project Name</th>
                          <th>Station Limit</th>
                          <th>Project Engineer</th>
                          <th>Materials</th>
                          
                        
                       
                     
                        </tr>
                      </thead>


                      <tbody>
                        <?php

                        $getProjectableQry = mysqli_query($connection,"select * from projectview where ProjectEngrID = '" . $result['ProjectEngrID'] . "'");

                        while ($resultInGetProjectTableQry = mysqli_fetch_assoc($getProjectableQry)) {

                         ?>




                         <tr>
                           <td><?php echo $resultInGetProjectTableQry['ProjectID']; ?></td>
                           <td><?php echo $resultInGetProjectTableQry['ProjectName']; ?></td>
                           <td><?php echo $resultInGetProjectTableQry['StationLimit'] . " meters"; ?></td>
                           <td><?php echo $resultInGetProjectTableQry['ProjectEngrName']; ?></td>

                           <td style="text-align: center;">

                           

                             <span data-toggle="tooltip" data-placement="top" title="View Allocated Materials">
                               <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#viewAllocatedMaterialModal<?php echo $resultInGetProjectTableQry['ProjectID']; ?>"><i style="font-size: 14px;" class="fa fa-eye" aria-hidden="true" ></i></button>
                             </span>

                             <span data-toggle="tooltip" data-placement="top" title="Request Materials">
                               <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#requestMaterialModal<?php echo $resultInGetProjectTableQry['ProjectID']; ?>"><i style="font-size: 14px;" class="fa fa-file-text-o" aria-hidden="true" ></i></button>
                             </span>

                               <span data-toggle="tooltip" data-placement="top" title="View Requested Materials">
                               <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#requestRequestedMaterialModal<?php echo $resultInGetProjectTableQry['ProjectID']; ?>"><i style="font-size: 14px;" class="fa fa-wpforms" aria-hidden="true" ></i></button>
                             </span>
                            
                          
                          

                           </td>


                       
                          
                         

                          

                      

                         </tr>
                         <?php
                        }
                         ?>
                        
                      </tbody>
                    </table>
<!-- end table -->
    

                  
    
                      
                     
                      
                      </div>      
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
  </body>
</html>