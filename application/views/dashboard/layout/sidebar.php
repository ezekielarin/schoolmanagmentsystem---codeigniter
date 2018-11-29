<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
        <!--left-fixed -navigation-->
        <aside class="sidebar-left">
      <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href=""><span class="glyphicon glyphicon-education"></span> Glass Cup<span class="dashboard_text">School Tool</span></a></h1>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>
              <li class="treeview">
                <a href="<?php echo base_url()?>dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
              </li>
              <li class="treeview">
                <a href="<?php echo base_url()?>dashboard/faculty">
                <i class="fa fa-laptop"></i>
                <span>Faculities</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
               
              </li>
              <li class="treeview">
                <a href="<?php echo base_url()?>dashboard/courses">
                <i class="fa fa-pie-chart"></i>
                <span>Courses</span>
                <span class="label label-primary pull-right">new</span>
                </a>
              </li>
              
              <li class="treeview">
                <a href="<?php echo base_url()?>dashboard/timetable">
                <i class="fa fa-laptop"></i>
                <span>Time Table</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                
              </li>
              <li>
                <a href="<?php echo base_url()?>dashboard/venues">
                <i class="fa fa-th"></i> <span>Venues</span>
                <small class="label pull-right label-info">08</small>
                </a>
              </li>
              
              <li class="treeview">
                <a href="<?php echo base_url()?>dashboard/levels">
                <i class="fa fa-edit"></i> <span>Level</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
              </li>
              <?php 
              //Admin section only available to admins 
              if ($this->ion_auth->is_admin()) // only admin can view this menu
              {
                ?>
              <li>
                <a href="<?php echo base_url()?>dashboard/users">
                <i class="fa fa-users"></i> <span>Users</span>
                <small class="label pull-right label-info">08</small>
                </a>
              </li>
              <li class="header">LABELS</li>
              <li>
                <a href="<?php echo base_url()?>dashboard/hostels"><i class="fa fa-suitcase text-red"></i> <span>Hostels</span>
              </a>
            </li>
              <li>
                <a href="<?php echo base_url()?>dashboard/settings"><i class="fa fa-cog text-yellow"></i> <span>Settings</span></a>
              </li>
   
                
               <?php 
              }
              ?>
              
            </ul>
          </div>
          <!-- /.navbar-collapse -->
      </nav>
    </aside>
    </div>
        <!--left-fixed -navigation-->
        <body class="cbp-spmenu-push">
    <div class="main-content">
        <!-- main content start-->
        <div id="page-wrapper">
            <div class="main-page">
    
        