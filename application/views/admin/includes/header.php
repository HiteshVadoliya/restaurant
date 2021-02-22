<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title><?php echo $pageTitle; ?></title>
      <link rel="shortcut icon" href="<?php echo base_url('public/front/images/logo/'.$site_favicon );?>">
      <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
      <!-- Bootstrap 3.3.4 -->
      <link href="<?php echo ADMIN_CSS_JS; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo ADMIN_CSS_JS; ?>custom.css" rel="stylesheet" type="text/css" />
      <!-- FontAwesome 4.3.0 -->
      <link href="<?php echo ADMIN_CSS_JS; ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
      <!-- Ionicons 2.0.0 -->
      <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
      <!-- Theme style -->
      <link href="<?php echo ADMIN_CSS_JS; ?>/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
      <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
      <link href="<?php echo ADMIN_CSS_JS; ?>/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="<?= ADMIN_CSS_JS; ?>css/select2.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
      <link rel="stylesheet" type="text/css" href="<?= ADMIN_CSS_JS.'fileupload/css/jquery.dm-uploader.css' ?>">
      <link rel="stylesheet" type="text/css" href="<?= ADMIN_CSS_JS.'fileupload/css/styles.css' ?>">
      <script src="<?= ADMIN_CSS_JS; ?>js/custom.js"></script>

      
      

      <style>
         .error{
         color:red;
         font-weight: normal;
         }
      </style>
      <!-- jQuery 2.1.4 -->
      <script src="<?php echo ADMIN_CSS_JS; ?>/js/jQuery-2.1.4.min.js"></script>
      
      <link href="<?php echo ADMIN_CSS_JS; ?>bootstrap/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" /> 
      <script src="<?php echo ADMIN_CSS_JS; ?>bootstrap/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
      <script src="<?= ADMIN_CSS_JS; ?>js/bootstrap-notify.js"></script>
      <link rel="stylesheet" type="text/css" href="<?= ADMIN_CSS_JS.'css/bootstrap-tagsinput.css' ?>">
      <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> -->

      <script type="text/javascript">
         var baseURL = "<?php echo base_url(); ?>";
      </script>
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="skin-blue sidebar-mini">
      <div class="wrapper">
      <header class="main-header">
         <a href="<?php echo base_url(); ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>B</b>W</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b><?=$site_name;?></b></span>
         </a>
         <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
               <ul class="nav navbar-nav">
                  <li class="dropdown messages-menu ">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                     <i class="fa fa-envelope-o"></i>
                     <span class="label label-success">4</span>
                     </a>
                     <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li>
                           <!-- inner menu: contains the actual data -->
                           <ul class="menu">
                              <li>
                                 <!-- start message -->
                                 <a href="#">
                                    <div class="pull-left">
                                       <img src="" class="img-circle" alt="User Image">
                                    </div>
                                    <h4>
                                       Support Team
                                       <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                    </h4>
                                    <p>Why not buy a new awesome theme?</p>
                                 </a>
                              </li>
                              <!-- end message -->
                              <li>
                                 <a href="#">
                                    <div class="pull-left">
                                       <img src="" class="img-circle" alt="User Image">
                                    </div>
                                    <h4>
                                       AdminLTE Design Team
                                       <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                    </h4>
                                    <p>Why not buy a new awesome theme?</p>
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                    <div class="pull-left">
                                       <img src="" class="img-circle" alt="User Image">
                                    </div>
                                    <h4>
                                       Developers
                                       <small><i class="fa fa-clock-o"></i> Today</small>
                                    </h4>
                                    <p>Why not buy a new awesome theme?</p>
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                    <div class="pull-left">
                                       <img src="" class="img-circle" alt="User Image">
                                    </div>
                                    <h4>
                                       Sales Department
                                       <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                    </h4>
                                    <p>Why not buy a new awesome theme?</p>
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                    <div class="pull-left">
                                       <img src="" class="img-circle" alt="User Image">
                                    </div>
                                    <h4>
                                       Reviewers
                                       <small><i class="fa fa-clock-o"></i> 2 days</small>
                                    </h4>
                                    <p>Why not buy a new awesome theme?</p>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                     </ul>
                  </li>
                  <li class="dropdown tasks-menu ">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                     <i class="fa fa-flag-o"></i>
                     <span class="label label-danger">9</span>
                     </a>
                     <ul class="dropdown-menu">
                        <li class="header">You have 9 tasks</li>
                        <li>
                           <!-- inner menu: contains the actual data -->
                           <ul class="menu">
                              <li>
                                 <!-- Task item -->
                                 <a href="#">
                                    <h3>
                                       Design some buttons
                                       <small class="pull-right">20%</small>
                                    </h3>
                                    <div class="progress xs">
                                       <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                          <span class="sr-only">20% Complete</span>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <!-- end task item -->
                              <li>
                                 <!-- Task item -->
                                 <a href="#">
                                    <h3>
                                       Create a nice theme
                                       <small class="pull-right">40%</small>
                                    </h3>
                                    <div class="progress xs">
                                       <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                          <span class="sr-only">40% Complete</span>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <!-- end task item -->
                              <li>
                                 <!-- Task item -->
                                 <a href="#">
                                    <h3>
                                       Some task I need to do
                                       <small class="pull-right">60%</small>
                                    </h3>
                                    <div class="progress xs">
                                       <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                          <span class="sr-only">60% Complete</span>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <!-- end task item -->
                              <li>
                                 <!-- Task item -->
                                 <a href="#">
                                    <h3>
                                       Make beautiful transitions
                                       <small class="pull-right">80%</small>
                                    </h3>
                                    <div class="progress xs">
                                       <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                          <span class="sr-only">80% Complete</span>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <!-- end task item -->
                           </ul>
                        </li>
                        <li class="footer">
                           <a href="#">View all tasks</a>
                        </li>
                     </ul>
                  </li>
                  <?php $this->load->view( ADMIN.'notification' ); ?>
                  <li class="dropdown tasks-menu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                     <i class="fa fa-history"></i>
                     </a>
                     <ul class="dropdown-menu">
                        <li class="header"> Last Login : <i class="fa fa-clock-o"></i> <?= empty($last_login) ? "First Time Login" : $last_login; ?></li>
                     </ul>
                  </li>
                  <!-- User Account: style can be found in dropdown.less -->
                  <li class="dropdown user user-menu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <img src="<?php echo ADMIN_CSS_JS; ?>/dist/img/avatar.png" class="user-image" alt="User Image"/>
                     <span class="hidden-xs"><?php echo $name; ?></span>
                     </a>
                     <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                           <img src="<?php echo ADMIN_CSS_JS; ?>/dist/img/avatar.png" class="img-circle" alt="User Image" />
                           <p>
                              <?php echo $name; ?>
                              <small><?php echo $role_text; ?></small>
                           </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                           <div class="pull-left">
                              <a href="<?php echo base_url(); ?>admin/loadChangePass" class="btn btn-default btn-flat"><i class="fa fa-key"></i> Change Password</a>
                           </div>
                           <div class="pull-right">
                              <a href="<?php echo base_url(); ?>admin/logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                           </div>
                        </li>
                     </ul>
                  </li>
                  <li>
                     <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                  </li>
               </ul>
            </div>
         </nav>
      </header>
      <?php $this->load->view(ADMIN.'includes/sidebar'); ?>