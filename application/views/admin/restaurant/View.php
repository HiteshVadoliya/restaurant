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
                  <div class="col-md-6">
                     <table class="table table-responsive">
                        <tr>
                           <th>Restaurant Name</th>
                           <td><?= $view['res_name']; ?></td>
                        </tr>
                        <tr>
                           <th>Restaurant Owner Name</th>
                           <td><?= $view['res_owner_name']; ?></td>
                        </tr>
                        <tr>
                           <th>Restaurant Admin</th>
                           <td><?= $admin_name; ?></td>
                        </tr>
                        <tr>
                           <th>Restaurant Manager</th>
                           <td><?= $manager_name; ?></td>
                        </tr>
                        <tr>
                           <th>Restaurant Phone</th>
                           <td><?= $view['res_phone']; ?></td>
                        </tr>
                        <tr>
                           <th>Restaurant Email</th>
                           <td><?= $view['res_email']; ?></td>
                        </tr>
                        <tr>
                           <th>Restaurant Minimum Wager</th>
                           <td><?= $view['res_minmum_wages']; ?></td>
                        </tr>
                        <tr>
                           <th>Restaurant Start Day</th>
                           <td><?= $startday; ?></td>
                        </tr>
                        <tr>
                           <th>Restaurant Hours</th>
                           <td><?= $view['res_hours']; ?></td>
                        </tr>
                        <tr>
                           <th>Company Address</th>
                           <td><?= nl2br($view['res_address']); ?></td>
                        </tr>
                        <tr>
                           <th>Restaurant Pictures</th>
                           <td><?php $url1 = base_url().IMG_RESTAURANT.$view['res_pictures']; ?> 
                              <a href="<?= $url1 ?>" download><i class="fa fa-download"></i></a>
                           </td>
                        </tr>
                        <tr>
                           <th>Restaurant Licence</th>
                           <td><?php $url2 = base_url().IMG_RESTAURANT.$view['res_licence']; ?> 
                              <a href="<?= $url2 ?>" download><i class="fa fa-download"></i></a>
                           </td>
                        </tr>
                        <tr>
                           <th>Restaurant Permit</th>
                           <td><?php $url3 = base_url().IMG_RESTAURANT.$view['res_permit']; ?> 
                              <a href="<?= $url3 ?>" download><i class="fa fa-download"></i></a>
                           </td>
                        </tr>
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