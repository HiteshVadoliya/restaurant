<div class="content-wrapper">
   <section class="content">
      <div class="row">
         <!-- left column -->
         <div class="col-md-4">
            <?php
               $error = $this->session->flashdata('error');
               if($error)
               {
               ?>
            <div class="alert alert-danger alert-dismissable">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <?php echo $this->session->flashdata('error'); ?>                    
            </div>
            <?php } ?>
            <?php  
               $success = $this->session->flashdata('success');
               if($success)
               {
               ?>
            <div class="alert alert-success alert-dismissable">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <?php echo $this->session->flashdata('success'); ?>
            </div>
            <?php } ?>
         </div>
         <div class="col-md-12">
            <?php if(validation_errors()){ ?>
            <div class="alert alert-danger alert-dismissable">
               <?php  echo validation_errors(); ?>
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            </div>
            <?php } ?>
         </div>
         <section class="content">
            <!-- Default box -->
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title"><?= ucfirst($type)." ".$MainTitle ?></h3>
                  <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                     <i class="fa fa-minus"></i></button>
                     <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                     <i class="fa fa-times"></i></button>
                  </div>
               </div>

               <div class="box-body" style="">
                  <div class="col-md-12">
                     <table class="table table-responsive cleaning_view_table">
                     <?php
                     
                     if( isset($restaurant) && !empty($restaurant) ) {
                        foreach ($restaurant as $res_key => $res_value) {
                           ?>
                           <tr>
                              <th class="view_th" colspan="4"><?= $res_value['res_name']."<span class='res_phone'> <i class='fa fa-phone'></i> ".$res_value['res_phone']."</span>" ?></th>
                           </tr>
                           <?php
                           if( isset($roles) && !empty($roles) ) {
                              unset($roles[0]);
                              foreach ($roles as $roles_key => $role) {
                                 $wh_list = array(
                                    "roleId" => $role['roleId'],
                                    "mobile !=" => '',
                                    "status" => 1,
                                    "isDelete" => 0,
                                 );
                                 $this->db->select("*")->from("tbl_users");
                                 $this->db->where($wh_list);
                                 $this->db->where('find_in_set("'.$res_value['restaurant_id'].'", multi_task_ids) <> 0');
                                
                                 $list_phone_number = $this->db->get()->result_array();
                                 if( isset($list_phone_number) && !empty($list_phone_number) ) {
                                    ?>
                                    <tr>
                                       <td class="view_th_role" colspan="4"><?php echo $role['role']; ?></td>
                                    </tr>
                                    <?php
                                    $i = 1;
                                    foreach ($list_phone_number as $p_key => $p_value) {
                                       ?>
                                       <tr>
                                          <td><?php echo $i; $i++; ?></td>
                                          <td><?php echo $p_value['name']; ?></td>
                                          <td><?php echo $p_value['mobile']; ?></td>
                                          <td><?php echo $p_value['email']; ?></td>
                                       </tr>
                                       <?php
                                    }
                                 }
                              }
                           }
                        }
                     }          
                     ?>              
                     </table>
                  </div>
               </div>

                   <div class="col-xs-12 text-right">              
                       
                   </div>
               
               <div class="box-footer" style="">
                  <div class="form-group">
                      <a class="btn btn-primary " href="<?= base_url(ADMIN.$url); ?>" > Back</a>
                  </div>
               </div>
            </div>
            <!-- /.box -->
         </section>
      </div>
   </section>
</div>