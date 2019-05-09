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

  <body class="nav-md" <?php 
if(!isset($_GET['s']))
{

}
else
{
  ?>

  onload="openThirdTab()"
  <?php
}
   ?>>

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

            

           
                 
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="row"> <!-- code here -->

             <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  

             
                  <div class="x_title">
                    <h2><i class="fa fa-address-card"></i> Profile <small>view and edit profile, change password</small></h2>
              
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="false">Profile</a>
                        </li>

                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Edit Profile</a>
                        </li>
                        
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Change Password</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                           <form id="demo-form2"   data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ProjectEngrName">Username <span class="required"></span>
                        </label>

                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="ProjectEngrName" name="ProjectEngrName" required="required" class="form-control col-md-7 col-xs-12" disabled="" value="<?php echo $result['username'] ?>" >
                        </div>
                      </div>

                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ProjectEngrName">Full Name <span class="required"></span>
                        </label>

                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="ProjectEngrName" name="ProjectEngrName" required="required" class="form-control col-md-7 col-xs-12" disabled="" value="<?php echo $result['ProjectEngrName'] ?>" >
                        </div>
                      </div>


                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ProjectEngrPhoneNum">Phone Number <span class="required"></span>
                        </label>

                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="ProjectEngrPhoneNum" name="ProjectEngrPhoneNum" required="required" class="form-control col-md-7 col-xs-12" disabled="" value="<?php echo $result['ProjectEngrPhoneNum'] ?>" >
                        </div>
                      </div>



                      </form>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          
                    <form id="demo-form2" action="update-engineer-profile.php" data-parsley-validate class="form-horizontal form-label-left">

                      

                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ProjectEngrName">Full Name <span class="required"></span>
                        </label>

                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="ProjectEngrName" name="ProjectEngrName" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $result['ProjectEngrName'] ?>" >
                        </div>
                      </div>


                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ProjectEngrPhoneNum">Phone Number <span class="required"></span>
                        </label>

                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="text" id="ProjectEngrPhoneNum" name="ProjectEngrPhoneNum" required="required" class="form-control col-md-7 col-xs-12"  value="<?php echo $result['ProjectEngrPhoneNum'] ?>" >
                        </div>
                      </div>


                      

                      <div class="col-md-11 col-sm-11 col-xs-12">
                          <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
                        </div>

                      
                      </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                          <form id="demo-form2" action="update-engineer-profile.php" data-parsley-validate class="form-horizontal form-label-left">

                      <input type="text" name="changepass"  hidden value="true">
                      
                      <?php 

                      if(isset($_GET['s']) and $_GET['s'] == '1' )
                      {
                        ?>
                    
                      
                       <div class="row">
                       <div class="col-md-3"></div>
                          <div class="col-md-4">
                            <div class="alert alert-warning alert-dismissible fade in " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Incorrect</strong> old password or the new and confirmation password doesn't match
                          </div>
                          </div>
                       </div>
                        

                        <?php
                      }elseif(isset($_GET['s']) and $_GET['s'] == '2')
                      {

                       ?>

                          <div class="row">
                       <div class="col-md-3"></div>
                          <div class="col-md-4">
                            <div class="alert alert-success alert-dismissible fade in " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Success</strong> changing password!
                          </div>
                          </div>
                       </div>
                        


                       <?php } ?>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="oldpassword">Old password <span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="password" id="oldpassword" name="oldpassword" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="newpassword">New password <span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="password" id="newpassword" name="newpassword" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirmnewpassword">Confirm new password <span class="required"></span>
                        </label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                          <input type="password" id="confirmnewpassword" name="confirmnewpassword" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>

                      

                      <div class="col-md-11 col-sm-11 col-xs-12">
                          <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
                        </div>

                      
                      </form>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>


    
                      
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

          <script>
function openThirdTab() {
    document.getElementById("profile-tab3").click();
}
</script>
  </body>
</html>