<!DOCTYPE html>
<?php
session_start();
require_once "sess.php";
//$_SESSION['currentuser']="era";
require_once('../../php/dbcon.php');


?>
<html>

<head>
 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SKMM| Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../fonts/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../icon/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../../css/mystyle.css">
  <!-- tab icon-->
  <link rel="icon" href="../../images/skmlogo.jpg">	
    <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!--bootstrap validation
  <link rel="stylesheet" href="../../css/bootstrapValidator.css"/>
  <script type="text/javascript" src="../../js/bootstrapValidator.js"></script>-->
  
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

  <header class="main-header" id="mainhead">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../../images/skmlogo.jpg" style="height:50px;" alt="User Image"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" ><img src="../../images/skmlogo.jpg" style="height:50px;" alt="User Image"><b>Dunlop</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
             <?php
				   //if($_SESSION['notificationcount']>0)
					   //echo "<span id=\"notificationc\" class=\"label label-danger\">".$_SESSION['notificationcount']." </span>";
				  ?>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php
					  // echo $_SESSION['notificationcount'];
 				?>   notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                 <?php
				/*while($row=mysqli_fetch_array($result)){//show details about quotation requesition
					$query2="SELECT user_user_name FROM customer WHERE r_id='".$row['regular_customer_r_id']."';";
					$resultinside=mysqli_query($conn,$query2);
					$rowinside=mysqli_fetch_array($resultinside);
				echo("
                  <li>
                    <a href=\"#\">
                      <i class=\"fa fa-calendar-check-o\" aria-hidden=\"true\"></i> Quotation request from ".$rowinside['user_user_name']."
                    </a>
                  </li>");
					  
				}*/
                 ?>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
             <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../images/user8-128x128.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php
				  echo $_SESSION['currentuser'];
				  ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../images/user8-128x128.jpg" class="img-circle" alt="User Image">

                <p>
                  Honorable chief manager
                 <small>S.K.Munasinghe Motors</small>
                </p>
              </li>
         
                     <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
				 
                <div class="pull-right">
                  <a href="../../php/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
				
				<div style="margin-left:77px;">
                  <a href="lockscreen.php" class="btn btn-default btn-flat">Lock Profile</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../images/user8-128x128.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php
				  echo $_SESSION['currentuser'];
				  ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" id="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li  id="dd" class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
       
        <li class="treeview">
         	<a href="#">
            	<i class="fa fa-edit"></i> <span>Reports</span>
            	<span class="pull-right-container">
              	<i class="fa fa-angle-left pull-right"></i>
           	 	</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#" name="reportm"><i class="fa fa-circle-o"></i>New report</a></li>
			  <li><a href="#" name="charts"><i class="fa fa-circle-o"></i>Charts</a></li>
           </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#" name="passchangeUI"><i class="fa fa-circle-o"></i>Change password</a></li>
            <li><a href="../../php/logout.php" name="findinvoice"><i class="fa fa-circle-o"></i>Log out</a></li>
          </ul>
        </li>
    
          
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="content-wrapper" >
    
    <!-- content will be loaded here -->
    
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      Sole Agent of Dunlop tires in Srilanka
    </div>
    <strong>S.K.Muanasinge Motors </strong> 
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
  
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>

<!-- jQuery 3.1.1 -->
<script src="../../js/jquery-3.1.1.min.js"></script>
<!-- Bootstrap no need 3.3.7 -->
<script src="../../js/bootstrap.min.js"></script>
<!-- FastClick no need -->
<script src="../../js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../js/demo.js"></script>
<script src="../../js/navigation_controler.js?v=3"></script>
</body>


</html>
