<aside class="main-sidebar">
         <section class="sidebar">
            <ul class="sidebar-menu">
               <li class="header">MAIN NAVIGATION</li>
               <li class="treeview">
                  <a href="<?php echo ADMIN_LINK; ?>dashboard">
                  <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                  </a>
               </li>

               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-cogs"></i> <span>Company</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="<?= base_url(ADMIN.'company'); ?>"><i class="fa fa-circle-o"></i>Manage Company</a></li>
                     <li><a href="<?= base_url(ADMIN.'company/add'); ?>"><i class="fa fa-circle-o"></i>Add Company</a></li>
                  </ul>
               </li>

               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-cogs"></i> <span>Restaurant</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="<?= base_url(ADMIN.'restaurant'); ?>"><i class="fa fa-circle-o"></i>Manage Restaurant</a></li>
                     <li><a href="<?= base_url(ADMIN.'restaurant/add'); ?>"><i class="fa fa-circle-o"></i>Add Restaurant</a></li>
                  </ul>
               </li>

               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-cogs"></i> <span>Users</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                    <!--  <li><a href="<?= base_url(ADMIN.'user'); ?>"><i class="fa fa-circle-o"></i>All User</a></li> -->
                     <!-- <li><a href="<?= base_url(ADMIN.'user/add'); ?>"><i class="fa fa-circle-o"></i>Add User</a></li> -->

                     <li><a href="<?= base_url(ADMIN.'adminuser'); ?>"><i class="fa fa-circle-o"></i>Manage Admin</a></li>
                     <li><a href="<?= base_url(ADMIN.'manager'); ?>"><i class="fa fa-circle-o"></i>Manage Manager</a></li>
                     <li><a href="<?= base_url(ADMIN.'shiftincharge'); ?>"><i class="fa fa-circle-o"></i>Manage Shift Incharge</a></li>
                     <li><a href="<?= base_url(ADMIN.'employee'); ?>"><i class="fa fa-circle-o"></i>Manage Employee</a></li>
                  </ul>
               </li>

               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-cogs"></i> <span>Tanning Material</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="<?= base_url(ADMIN.'training_materials'); ?>"><i class="fa fa-circle-o"></i>Manage Tanning Material</a></li>
                     <li><a href="<?= base_url(ADMIN.'training_materials/add'); ?>"><i class="fa fa-circle-o"></i>Upload Tanning Material</a></li>
                  </ul>
               </li>

               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-cogs"></i> <span> Cleaning </span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="<?= base_url(ADMIN.'cleaning_heading'); ?>"><i class="fa fa-circle-o"></i>Manager/Add Heading</a></li>
                     <li><a href="<?= base_url(ADMIN.'cleaning'); ?>"><i class="fa fa-circle-o"></i>Manage/Add List</a></li>
                     <li><a href="<?= base_url(ADMIN.'cleaning/view/1'); ?>"><i class="fa fa-circle-o"></i>View Day List</a></li>
                     <li><a href="<?= base_url(ADMIN.'cleaning/view/2'); ?>"><i class="fa fa-circle-o"></i>View Night List</a></li>
                  </ul>
               </li>

               <li class="treeview">
                  <a href="<?= base_url(ADMIN.'phone-dictionary'); ?>">
                  <i class="fa fa-phone"></i> <span>Phone Number</span>
                  </a>
               </li>

               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-cogs"></i> <span>Upload Invoice</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="<?= base_url(ADMIN.'invoice'); ?>"><i class="fa fa-circle-o"></i>Manage Invoice </a></li>
                     <li><a href="<?= base_url(ADMIN.'invoice/add'); ?>"><i class="fa fa-circle-o"></i>Add Invoice </a></li>
                  </ul>
               </li>

               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-cogs"></i> <span>Weekly Paperwork </span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="javascript:;"><i class="fa fa-circle-o"></i>Manage Weekly Paperwork </a></li>
                     <li><a href="javascript:;"><i class="fa fa-circle-o"></i>Upload Weekly Paperwork </a></li>
                  </ul>
               </li>

               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-cogs"></i> <span>Bulletin Bord</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="<?= base_url(ADMIN.'bulletinbord'); ?>"><i class="fa fa-circle-o"></i>Manage Bulletin Bord</a></li>
                     <li><a href="<?= base_url(ADMIN.'bulletinbord/add'); ?>"><i class="fa fa-circle-o"></i>Add Bulletin Bord</a></li>
                  </ul>
               </li>

               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-cogs"></i> <span>Suggestion</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="<?= base_url(ADMIN.'suggestion'); ?>"><i class="fa fa-circle-o"></i>Manage Suggestion</a></li>
                     <li><a href="<?= base_url(ADMIN.'suggestion/add'); ?>"><i class="fa fa-circle-o"></i>Add Suggestion</a></li>
                  </ul>
               </li>

               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-cogs"></i> <span>Job Duties</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="javascript:;"><i class="fa fa-circle-o"></i>Manage Job Duties</a></li>
                     <li><a href="javascript:;"><i class="fa fa-circle-o"></i>Upload Job Duties</a></li>
                  </ul>
               </li>

               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-cogs"></i> <span>Employee</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="javascript:;"><i class="fa fa-circle-o"></i>Manage</a></li>
                     <li><a href="javascript:;"><i class="fa fa-circle-o"></i>Upload</a></li>
                  </ul>
               </li>

               <li class="header">DAILY PAPER WORK</li>

               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-cogs"></i> <span>Bread count</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="javascript:;"><i class="fa fa-circle-o"></i>COMING SOON</a></li>
                     <li><a href="javascript:;"><i class="fa fa-circle-o"></i>COMMING SOON</a></li>
                  </ul>
               </li>

               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-cogs"></i> <span>Cash in</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="javascript:;"><i class="fa fa-circle-o"></i>COMING SOON</a></li>
                     <li><a href="javascript:;"><i class="fa fa-circle-o"></i>COMMING SOON</a></li>
                  </ul>
               </li>

               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-cogs"></i> <span>Temp Log</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="javascript:;"><i class="fa fa-circle-o"></i>COMING SOON</a></li>
                     <li><a href="javascript:;"><i class="fa fa-circle-o"></i>COMMING SOON</a></li>
                  </ul>
               </li>

              

               <!-- <li class="treeview">
                  <a href="#">
                  <i class="fa fa-cogs"></i> <span>Category</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="<?php echo ADMIN_LINK; ?>category"><i class="fa fa-circle-o"></i>Manage Category</a></li>
                     <li><a href="<?php echo ADMIN_LINK; ?>category/add"><i class="fa fa-circle-o"></i>Add Category</a></li>
                  </ul>
               </li>
               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-bars"></i> <span>Newspaper</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="<?php echo ADMIN_LINK; ?>newspaper"><i class="fa fa-circle-o"></i>Manage Newspaper</a></li>
                     <li><a href="<?php echo ADMIN_LINK; ?>newspaper/add"><i class="fa fa-circle-o"></i>Add Newspaper</a></li>
                  </ul>
               </li> -->
               <li class="treeview">
                  <a href="#">
                  <i class="fa fa-cogs"></i> <span>Settings</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                     <li><a href="<?php echo ADMIN_LINK; ?>loadChangePass"><i class="fa fa-circle-o"></i>Change Password</a></li>
                     <li><a href="<?php echo ADMIN_LINK; ?>sitesetting"><i class="fa fa-circle-o"></i>General Setting</a></li>
                  </ul>
               </li>
            </ul>
         </section>
      </aside>