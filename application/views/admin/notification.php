<?php
$total_notification = 0;
$today_month = date("m");
$today_date = date("d");
$like_query =  date("-m-d"); //  "-".$today_month."-".$today_date;
$param_birth['search'] = $like_query;
$param_birth['search_column'] = array('dob');
$birth_list = $this->HWT->get_hwt( 'tbl_users','*',array('status'=>1, 'isDelete' =>0 ), $param_birth );
$total_birth_notification = 0;
if( isset($birth_list) && !empty($birth_list) ) {
   $total_birth_notification = count($birth_list);
   $total_notification++;
}

$total_anniversary = 0;
$param_ani['search'] = $like_query;
$param_ani['search_column'] = array('doj');
$anni_list = $this->HWT->get_hwt( 'tbl_users','*',array('status'=>1, 'isDelete' =>0 ), $param_ani );
$total_ani_notification = 0;
if( isset($anni_list) && !empty($anni_list) ) {
   $total_ani_notification = count($anni_list);
   $total_notification++;
}

?>
<li class="dropdown notifications-menu ">
   <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
   <i class="fa fa-bell-o"></i>
   <span class="label label-warning"><?= $total_notification; ?></span>
   </a>
   <ul class="dropdown-menu">
      <li class="header">You have <?= $total_notification; ?> notifications</li>
      <li>
         <!-- inner menu: contains the actual data -->
         <ul class="menu">
            <?php if( $total_birth_notification > 0 ) { ?> 
            <li>
               <a href="#">
               <i class="fa fa-users text-aqua"></i> <?= $total_birth_notification." member have birthday today "; ?>
               </a>
            </li>
            <?php } ?>
            <?php if( $total_ani_notification > 0 ) { ?> 
            <li>
               <a href="#">
               <i class="fa fa-users text-red"></i> <?= $total_ani_notification." members joined today "; ?>
               </a>
            </li>
            <?php } ?>
            <!-- 
            <li>
               <a href="#">
               <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
               page and may cause design problems
               </a>
            </li>
            <li>
               <a href="#">
               <i class="fa fa-users text-red"></i> 5 new members joined
               </a>
            </li>
            <li>
               <a href="#">
               <i class="fa fa-shopping-cart text-green"></i> 25 sales made
               </a>
            </li>
            <li>
               <a href="#">
               <i class="fa fa-user text-red"></i> You changed your username
               </a>
            </li> -->
         </ul>
      </li>
      <!-- <li class="footer"><a href="#">View all</a></li> -->
   </ul>
</li>
