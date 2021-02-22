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
                           <th>Heading</th>
                           <td><?= $view['title']; ?></td>
                        </tr>
                        <tr>
                           <th>Description</th>
                           <td><?= nl2br($view['description']); ?></td>
                        </tr>
                        
                        <tr>
                           <th>Material</th>
                           <td><?php $url1 = base_url().$assets.$view['img_src']; ?> 
                              <a href="<?= $url1 ?>" download><i class="fa fa-download"></i></a>
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