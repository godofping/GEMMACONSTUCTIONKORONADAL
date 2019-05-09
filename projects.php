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
            <!-- Add new Modal -->
<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!--  Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add new project</h4>
      </div>
      <div class="modal-body">
        
        <br />
                    <form id="demo-form2" action="insert-project.php" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="projectname">Project Name <span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="projectname" name="projectname" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="stationlimit">Station Limit <small>(meters)</small><span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="number" id="stationlimit" name="stationlimit" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>




                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Project Engineer</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select class="form-control" name="projectengineer" id="projectengineer">
                            <option selected="" disabled="">Choose project engineer</option>
                            
                            <?php
                            $getEngineerListQry = mysqli_query($connection,"select * from project_engineer_table");

                            while ($getEngineerList = mysqli_fetch_assoc($getEngineerListQry)) {
                              ?>
                              <option value="<?php echo $getEngineerList['ProjectEngrID']; ?>"><?php echo $getEngineerList['ProjectEngrName']; ?></option>
                              <?php
                            }
                             ?>
                            
                          </select>
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

            

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Projects <small>Add | Edit | Delete Projects</small></h2>
                 
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="row"> <!-- code here -->
<div style="padding-bottom: 15px;"></div>

             <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal"><i style="font-size: 14px;" class="fa fa-plus-circle" aria-hidden="true"></i> Add new project</button>
<div style="padding-bottom: 25px;"></div>

 <!-- start modal -->
 <?php 
                        $getProjectTableQry = mysqli_query($connection,"select * from projectview");
                        while ($resultInGetProjectTableQry = mysqli_fetch_assoc($getProjectTableQry)) {
                         ?>
                                     <!-- edit Modal -->
            <div id="editModal<?php echo $resultInGetProjectTableQry['ProjectID']; ?>" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!--  Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit product</h4>
                  </div>
                  <div class="modal-body">
                    
                    <br />
                                <form id="demo-form2" action="update-project.php" data-parsley-validate class="form-horizontal form-label-left">

                                <input type="text" name="ProjectID" value="<?php echo $resultInGetProjectTableQry['ProjectID']; ?>" hidden>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="projectname">Project Name <span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="projectname" name="projectname" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $resultInGetProjectTableQry['ProjectName']; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="stationlimit">Station Limit <small>(meters)</small><span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="number" id="stationlimit" name="stationlimit" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $resultInGetProjectTableQry['StationLimit']; ?>">
                        </div>
                      </div>




                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Project Engineer</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select class="form-control" required name="projectengineer" id="projectengineer">
                            <option selected="" value="<?php echo $resultInGetProjectTableQry['ProjectEngrID']; ?>" ><?php echo $resultInGetProjectTableQry['ProjectEngrName']; ?></option>
                            
                            <?php
                            $getEngineerListQry = mysqli_query($connection,"select * from project_engineer_table");

                            while ($getEngineerList = mysqli_fetch_assoc($getEngineerListQry)) {
                              ?>
                              <option value="<?php echo $getEngineerList['ProjectEngrID']; ?>"><?php echo $getEngineerList['ProjectEngrName']; ?></option>
                              <?php
                            }
                             ?>
                            
                          </select>
                        </div>
                      </div>



                     
                      
                      
        
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-success"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
       </form>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close" data-dismiss="modal" aria-hidden="true"></i> Close</button>
                  </div>
                </div>

              </div>
            </div>

            <!-- end modal -->





<!-- view Request Claim material Modal -->
            <div id="viewRequestClaimModal<?php echo $resultInGetProjectTableQry['ProjectID']; ?>" class="modal fade" role="dialog">
              <div class="modal-dialog modal-lg">

                <!--  Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Request claim of materials</h4>
                  </div>
                  <div class="modal-body" style="  max-height: calc(100vh - 210px);overflow-y: auto;">


                  <p><b>Project ID:</b> <?php echo $resultInGetProjectTableQry['ProjectEngrID']; ?></p>
                  <p><b>Project Name:</b> <?php echo $resultInGetProjectTableQry['ProjectName']; ?></p>
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
                                <form id="demo-form2" action="update-out-table.php" data-parsley-validate class="form-horizontal form-label-left">

                                

                      <table id="datatable" class="table table-striped table-bordered table-responsive">
                        <thead>
                          <tr>
                            
                            <th>Product Name</th>
                            <th>Requested Quantity</th>
                            <th>Requested Date</th>
                            <th>Approval Status</th>
                            <th>Approval Date</th>
                            <th>Action</th>
                            <th>Action</th>
                      
                         
                        </tr>
                        </thead>

                        <tbody>
                            
                            <?php

         $getMaterialTableQuery = mysqli_query($connection, "select * from outview where ProjectID = '" . $resultInGetProjectTableQry['ProjectID'] . "'");
         
         

          while ($getMaterialTableResult = mysqli_fetch_assoc($getMaterialTableQuery)) {
          
          ?>

          <tr>
           <td><?php echo $getMaterialTableResult['ProductName']; ?></td>
           <td><?php echo $getMaterialTableResult['OutQuantity']; ?></td>
        <td><?php echo $getMaterialTableResult['RequestDate']; ?></td>
        <td><?php echo $getMaterialTableResult['IsApproved']; ?></td>
        <td><?php 

        if ($getMaterialTableResult['IsApproved'] == "Approved") {
          echo $getMaterialTableResult['OutDate']; 
        }
        


        ?></td>

        <input type="text" name="OutID" value="<?php echo $getMaterialTableResult['OutID']; ?>" hidden>
        <td>


                          <select id="IsApproved" name="IsApproved" class="form-control" required>
                            
                            <option value="Approved">Approved</option>
                            <option value="Not Approved">Not Approved</option>
                            <option value="Pending">Pending</option>
                          </select>

        </td>

<td>


<span data-toggle="tooltip" data-placement="top" title="Save">
                               <button type="submit" class="btn btn-success"><i class="fa fa-save" aria-hidden="true"></i></button>
                             </span>



       </form>

        <form  action="delete-requested-materials-admin.php">

        <span data-toggle="tooltip" data-placement="top" title="Delete">
         <input type="text" name="OutID" value="<?php echo $getMaterialTableResult['OutID']; ?>" hidden > 
                              <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                             </span>



           </td>
           
          </form>
          

         </tr>

        <?php
         } ?>

                        </tbody>
                      </table>



      </div>
      <div class="modal-footer">
      
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close" data-dismiss="modal" aria-hidden="true"></i> Close</button>
                  </div>
                </div>

              </div>
            </div>

            <!-- end modal -->









<!-- View material Modal -->
            <div id="viewMaterialModal<?php echo $resultInGetProjectTableQry['ProjectID']; ?>" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!--  Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">View material</h4>
                  </div>
                  <div class="modal-body">
                    
                    <br />
                                <form id="demo-form2" action="insert-material.php" data-parsley-validate class="form-horizontal form-label-left">

                                <input type="text" name="ProjectID" value="<?php echo $resultInGetProjectTableQry['ProjectID']; ?>" hidden>

                      <table class="table table-striped table-bordered table-responsive">
                        <thead>
                          <tr>
                            
                            <th>Added by</th>
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
          <td><?php 

            $getAdminQry1 = mysqli_query($connection,"select * from admin_table where adminid = '" . $getMaterialTableResult['adminid'] . "'");
                           
                      $getAdminResult = mysqli_fetch_assoc($getAdminQry1);

                      echo $getAdminResult['fullname'];
           ?></td>
           <td><?php echo $getMaterialTableResult['ProductName']; ?></td>
           <td><?php echo $getMaterialTableResult['Method']; ?></td>
           <td><?php  if($getNumberOFClaimedMaterialsResult['TotalClaimed'] == '')
           {
            echo 0;}else{echo $getNumberOFClaimedMaterialsResult['TotalClaimed'];} ?>/<?php echo $getMaterialTableResult['Quantity']; ?></td>
          

         </tr>

        <?php
         } ?>

                        </tbody>
                      </table>



      </div>
      <div class="modal-footer">
      <!-- <button type="submit" class="btn btn-success"><i class="fa fa-save" aria-hidden="true"></i> Save</button> -->
       </form>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close" data-dismiss="modal" aria-hidden="true"></i> Close</button>
                  </div>
                </div>

              </div>
            </div>

            <!-- end modal -->




              <!-- Add material Modal -->
            <div id="addMaterialModal<?php echo $resultInGetProjectTableQry['ProjectID']; ?>" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!--  Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add material</h4>
                  </div>
                  <div class="modal-body">
                    
                    <br />
                                <form id="demo-form2" action="insert-material.php" data-parsley-validate class="form-horizontal form-label-left">

                                <input type="text" name="ProjectID" value="<?php echo $resultInGetProjectTableQry['ProjectID']; ?>" hidden>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Product</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select class="form-control" name="ProductID" id="ProductID">
                         <!--    <option selected="" disabled="">Choose product</option> -->
                            
                            <?php
                            $getProductListQuery = mysqli_query($connection,"select * from product_table");

                            while ($getProductListResult = mysqli_fetch_assoc($getProductListQuery)) {
                              ?>
                              <option value="<?php echo $getProductListResult['ProductID']; ?>"><?php echo $getProductListResult['ProductName']; ?></option>
                              <?php
                            }
                             ?>
                            
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Method</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <select class="form-control" name="Method" id="Method">
                            <option value="Direct product to site">Direct product to site</option>
                            <option value="Indirect">Indirect</option>
                           
                            
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Quantity">Quantity<span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="number" id="Quantity" name="Quantity" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>



      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-success"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
       </form>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close" data-dismiss="modal" aria-hidden="true"></i> Close</button>
                  </div>
                </div>

              </div>
            </div>

            <!-- end modal -->





<!-- Add material Modal -->
            <div id="viewMaterialModal<?php echo $resultInGetProjectTableQry['ProjectID']; ?>" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!--  Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">View material</h4>
                  </div>
                  <div class="modal-body">
                    
                    <br />
                                <form id="demo-form2" action="insert-material.php" data-parsley-validate class="form-horizontal form-label-left">

                                <input type="text" name="ProjectID" value="<?php echo $resultInGetProjectTableQry['ProjectID']; ?>" hidden>

                      <table class="table table-striped table-bordered table-responsive">
                        <thead>
                          <tr>
                          
                            <th>Product Name</th>
                            <th>Quantity</th>
                         
                        </tr>
                        </thead>

                        <tbody>
                            
                            <?php

         $getMaterialTableQuery = mysqli_query($connection, "select * from materialview where ProjectID = '" . $resultInGetProjectTableQry['ProjectID'] . "'");

          while ($getMaterialTableResult = mysqli_fetch_assoc($getMaterialTableQuery)) {
          
          ?>

          <tr>
           <td><?php echo $getMaterialTableResult['ProductName']; ?></td>
           <td><?php echo $getMaterialTableResult['Quantity']; ?></td>
          

         </tr>

        <?php
         } ?>

                        </tbody>
                      </table>



      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-success"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
       </form>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close" data-dismiss="modal" aria-hidden="true"></i> Close</button>
                  </div>
                </div>

              </div>
            </div>

            <!-- end modal -->


            <!-- Delete Modal -->
<div id="deleteModal<?php echo $resultInGetProjectTableQry['ProjectID']; ?>" class="modal fade" role="dialog">
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

        <form action="delete-project.php" data-parsley-validate class="form-horizontal form-label-left">
        <input type="text" name="ProjectID" value="<?php echo $resultInGetProjectTableQry['ProjectID']; ?>" hidden>
       

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


<!-- finish project Modal -->
<div id="unfinishProjectModal<?php echo $resultInGetProjectTableQry['ProjectID']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Unfinish project dialog</h4>
      </div>
      <div class="modal-body">
        <p>Confirm finish project. Do you want to proceed?</p>

        <form action="unfinish-project.php" data-parsley-validate class="form-horizontal form-label-left">
        <input type="text" name="ProjectID" value="<?php echo $resultInGetProjectTableQry['ProjectID']; ?>" hidden>
       

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


 <!-- finish project Modal -->
<div id="finishProjectModal<?php echo $resultInGetProjectTableQry['ProjectID']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Finish project dialog</h4>
      </div>
      <div class="modal-body">
        <p>Confirm finish project. Do you want to proceed?</p>

        <form action="finish-project.php" data-parsley-validate class="form-horizontal form-label-left">
        <input type="text" name="ProjectID" value="<?php echo $resultInGetProjectTableQry['ProjectID']; ?>" hidden>
       

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





<!-- edit material Modal -->
            <div id="editMaterialModal<?php echo $resultInGetProjectTableQry['ProjectID']; ?>" class="modal fade" role="dialog">
              <div class="modal-dialog modal-lg">

                <!--  Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit material</h4>
                  </div>
                  <div class="modal-body">
                   
                      <br />
                                <form id="demo-form2" action="update-material.php" data-parsley-validate class="form-horizontal form-label-left">

                                

                      <table  class="table table-striped table-bordered table-responsive">
                        <thead>
                          <tr>
                          
                            <th>Product Name</th>
                            <th>Method</th>
                            <th>Quantity</th>                           
                            <th>Action</th>
                            <th>Action</th>
                         
                        </tr>
                        </thead>

                        <tbody>
                            
                            <?php

         $getMaterialTableQuery = mysqli_query($connection, "select * from materialview where ProjectID = '" . $resultInGetProjectTableQry['ProjectID'] . "'");



          while ($getMaterialTableResult = mysqli_fetch_assoc($getMaterialTableQuery)) {
          
          ?>

          <tr>


           <td>
               <div class="form-group">
                       
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <select class="form-control" name="ProductID" id="ProductID">

                            <option selected value="<?php echo $getMaterialTableResult['ProductID']; ?>" disabled><?php echo $getMaterialTableResult['ProductName']; ?></option>
                            
                            <?php
                            $getProductListQuery = mysqli_query($connection,"select * from product_table");

                            while ($getProductListResult = mysqli_fetch_assoc($getProductListQuery)) {
                              ?>
                              <option value="<?php echo $getProductListResult['ProductID']; ?>"><?php echo $getProductListResult['ProductName']; ?></option>
                              <?php
                            }
                             ?>
                            
                          </select>
                        </div>
                      </div>



           </td>


                    <td>
 <input type="text" name="MaterialID" value="<?php echo $getMaterialTableResult['MaterialID']; ?>" hidden >
 <input type="text" name="ProductID" value="<?php echo $getMaterialTableResult['ProductID']; ?>" hidden >

                      <div class="form-group">
                       
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <select class="form-control" name="Method" id="Method">

                            <option selected value="<?php echo $getMaterialTableResult['Method']; ?>" disabled><?php echo $getMaterialTableResult['Method']; ?></option>
                            
                            <option value="Direct product to site">Direct product to site</option>
                            <option value="Indirect">Indirect</option>
                            
                            
                          </select>
                        </div>
                      </div>

           </td>

           <td>

            <div class="form-group">
                                    
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                      <input type="number" id="Quantity" value="<?php echo $getMaterialTableResult['Quantity']; ?>" name="Quantity" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                  </div>
             

           </td>


           <td>
           
            <button type="submit" class="btn btn-success"><i class="fa fa-save" aria-hidden="true"></i> Save</button>

           </td>
          

           </form>

           <td>
           <form action="delete-allocated-materials.php">
           <input type="text" name="MaterialID" value="<?php echo $getMaterialTableResult['MaterialID']; ?>" hidden >
           <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
            </form>
           </td>

         </tr>

        <?php
         } ?>

                        </tbody>
                      </table>




                  </div>
                  <div class="modal-footer">
                  
                  
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close" data-dismiss="modal" aria-hidden="true"></i> Close</button>
                              </div>
                            </div>

                          </div>
                        </div>

                        <!-- end modal -->





            


                         <?php } ?> <!-- the very last -->



 



<div class="table-responsive">
  
<!-- start table -->
<table id="datatable-buttons" class="table table-striped table-bordered table-responsive">
                      <thead>
                        <tr>

                          <th>Project ID</th>
                          <th>Project Name</th>
                          <th>Station Limit</th>
                          <th>Project Engineer</th>
                          <th>Added by</th>
                          <th>Status</th>
                          <th>Materials</th>
                          <th>Action</th>
                        
                       
                     
                        </tr>
                      </thead>


                      <tbody>
                        <?php 
                        $getProjectableQry = mysqli_query($connection,"select * from projectview");
                        while ($resultInGetProjectTableQry = mysqli_fetch_assoc($getProjectableQry)) {
                         ?>




                         <tr>
                           <td><?php echo $resultInGetProjectTableQry['ProjectID']; ?></td>
                           <td><?php echo $resultInGetProjectTableQry['ProjectName']; ?></td>
                           <td><?php echo $resultInGetProjectTableQry['StationLimit'] . " meters"; ?></td>
                           <td><?php echo $resultInGetProjectTableQry['ProjectEngrName']; ?></td>
                           <td><?php

                           $getAdminQry = mysqli_query($connection,"select * from admin_table where adminid = '" . $resultInGetProjectTableQry['adminid'] . "'");
                           

                      $getAdminResult = mysqli_fetch_assoc($getAdminQry);

                            echo $getAdminResult['fullname']; 


                            ?></td>
                            <td><?php echo $resultInGetProjectTableQry['ProjectStatus']; ?></td>

                           <td style="text-align: center;">

                          <?php 
                          $checkifexistinmaterial = mysqli_query($connection,"select * from materialview where ProjectID = '" . $resultInGetProjectTableQry['ProjectID'] . "'");

                          $numrowsofresult = mysqli_num_rows($checkifexistinmaterial);

                          if($numrowsofresult <= 0)
                          {
                            ?>
                            <span data-toggle="tooltip" data-placement="top" title="Add materials for this project">
                               <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#addMaterialModal<?php echo $resultInGetProjectTableQry['ProjectID']; ?>"><i style="font-size: 14px;" class="fa fa-plus-square" aria-hidden="true" ></i></button>
                             </span>
                            <?php

                          }
                          else
                          {
                           ?>
                           <span data-toggle="tooltip" data-placement="top" title="Disabled because you already added material on this project">
                               <button type="button" disabled class="btn btn-dark btn-sm" data-toggle="modal" data-target="#addMaterialModal<?php echo $resultInGetProjectTableQry['ProjectID']; ?>"><i style="font-size: 14px;" class="fa fa-plus-square" aria-hidden="true" ></i></button>
                             </span>

                           <?php } ?>
                              

                             <span data-toggle="tooltip" data-placement="top" title="View allocated materials for this project">
                               <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#viewMaterialModal<?php echo $resultInGetProjectTableQry['ProjectID']; ?>"><i style="font-size: 14px;" class="fa fa-eye" aria-hidden="true" ></i></button>
                             </span>

                             <span data-toggle="tooltip" data-placement="top" title="Edit allocated materials for this project">
                               <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editMaterialModal<?php echo $resultInGetProjectTableQry['ProjectID']; ?>"><i style="font-size: 14px;" class="fa fa-edit" aria-hidden="true" ></i></button>
                             </span>
                            
                             <span data-toggle="tooltip" data-placement="top" title="View requested claims of materials">
                               <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#viewRequestClaimModal<?php echo $resultInGetProjectTableQry['ProjectID']; ?>"><i style="font-size: 14px;" class="fa fa-signing" aria-hidden="true" ></i></button>
                             </span>

                          

                           </td>


                           <td style="text-align: center;">

                            <?php

                            if($resultInGetProjectTableQry['ProjectStatus'] == 'Finished')
                            {
                              ?>

                               <span data-toggle="tooltip" data-placement="top" title="Unfinish Project">
                               <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#unfinishProjectModal<?php echo $resultInGetProjectTableQry['ProjectID']; ?>"><i style="font-size: 14px;" class="fa fa-close" aria-hidden="true" ></i></button>
                             </span>

                              <?php

                            }

                            else
                            {

                             ?>
                               <span data-toggle="tooltip" data-placement="top" title="Finish Project">
                               <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#finishProjectModal<?php echo $resultInGetProjectTableQry['ProjectID']; ?>"><i style="font-size: 14px;" class="fa fa-check" aria-hidden="true" ></i></button>
                             </span>

                             <?php } ?>

                          
                           

                             

                            
                             <?php if($resultInGetProjectTableQry['ProjectStatus'] == 'Finished')
                             { ?>

                               <span data-toggle="tooltip" data-placement="top" title="Edit Project">
                               <button type="button" disabled class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal<?php echo $resultInGetProjectTableQry['ProjectID']; ?>"><i style="font-size: 14px;" class="fa fa-edit" aria-hidden="true" ></i></button>
                             </span>

                             <span data-toggle="tooltip" data-placement="top" title="Delete Project">
                               <button type="button" disabled="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?php echo $resultInGetProjectTableQry['ProjectID']; ?>"><i style="font-size: 14px;" class="fa fa-trash" aria-hidden="true"></i></button>
                             </span>

                           
                           

                             <?php }else{ ?>

                            <span data-toggle="tooltip" data-placement="top" title="Edit Project">
                               <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal<?php echo $resultInGetProjectTableQry['ProjectID']; ?>"><i style="font-size: 14px;" class="fa fa-edit" aria-hidden="true" ></i></button>
                             </span>
                           

                              <span data-toggle="tooltip" data-placement="top" title="Delete Project">
                               <button type="button"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?php echo $resultInGetProjectTableQry['ProjectID']; ?>"><i style="font-size: 14px;" class="fa fa-trash" aria-hidden="true"></i></button>
                             </span>

                             <?php } ?>

                           </td>

                          
                         

                          

                      

                         </tr>
                         <?php
                        }
                         ?>
                        
                      </tbody>
                    </table>
<!-- end table -->
    
</div>
                      
                     
                      
                   			
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