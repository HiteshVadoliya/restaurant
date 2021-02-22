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
                           <th>Employee/Applied For Restaurant</th>
                           <td>
                              <?php
                              if( isset($view['multi_task_ids']) && !empty($view['multi_task_ids']) ) {

                                 $res_ids = explode(",", $view['multi_task_ids']);
                                 if( in_array(0, $res_ids) ) {
                                    
                                    $RestaurantList = $this->HWT->get_result("restaurant","*",  array("isDelete" => 0, "status" => 1 )  );
                                    foreach ($RestaurantList as $r_key => $r_value) {
                                       echo $r_value['res_name'];
                                       echo "<br>";
                                    }
                                 } else {

                                    foreach ($res_ids as $r_key => $r_value) {
                                       echo $this->HWT->get_column("restaurant","res_name", array("restaurant_id" => $r_value, "isDelete" => 0, "status" => 1 ) );
                                       echo "<br>";
                                    }

                                 }
                                 
                              }
                              ?>
                           </td>
                        </tr>
                        <tr>
                           <th>Name</th>
                           <td><?= $view['name']; ?></td>
                        </tr>
                        <tr>
                           <th>Role</th>
                           <td><?= $roleName; ?></td>
                        </tr>
                        <tr>
                           <th>Email</th>
                           <td><?= $view['email']; ?></td>
                        </tr>
                        <tr>
                           <th>Phone</th>
                           <td><?= $view['mobile']; ?></td>
                        </tr>
                        <tr>
                           <th>Date of Birth</th>
                           <td><?= $view['dob']; ?></td>
                        </tr>
                        <tr>
                           <th>Date of Joining</th>
                           <td><?= $view['doj']; ?></td>
                        </tr>
                        
                        <tr>
                           <th>Address</th>
                           <td><?= nl2br($view['address']); ?></td>
                        </tr>
                        <tr>
                           <th>Social Security Number</th>
                           <td><?= $view['social_security_number']; ?></td>
                        </tr>
                        <tr>
                           <th>Work Eligibility</th>
                           <td><?= $view['work_eligibility']; ?></td>
                        </tr>
                        <tr>
                           <th>Transformation</th>
                           <td><?= $view['transformation']; ?></td>
                        </tr>
                        <tr>
                           <th>Information on criminal or felony convictions</th>
                           <td><?= $view['criminal']; ?></td>
                        </tr>
                        <tr>
                           <th>School(s) attended</th>
                           <td><?= $view['school_attended']; ?></td>
                        </tr>
                        <tr>
                           <th>Degrees Obtained</th>
                           <td><?= $view['degrees_obtained']; ?></td>
                        </tr>
                        <tr>
                           <th>Graduation Date</th>
                           <td><?= $view['graduation_date']; ?></td>
                        </tr>
                        <tr>
                           <th>skills</th>
                           <td><?= $view['skills']; ?></td>
                        </tr>
                        <tr>
                           <th>Extra Curricular Activities</th>
                           <td><?= nl2br($view['extracurricular_activities']); ?></td>
                        </tr>
                        <tr>
                           <th>Address</th>
                           <td><?= nl2br($view['address']); ?></td>
                        </tr>
                        
                     </table>
                  </div>
               </div>
               <div class="box-footer" style="">
                  <div class="form-group">
                      <a class="btn btn-primary " href="javascript:;" onclick="goBack();" > Back</a>
                  </div>
               </div>
            </div>
            <!-- /.box -->
            <!-- Default box -->
            <div class="box collapsed-box">
               <div class="box-header with-border">
                  <h3 class="box-title">Previous Employer Details</h3>
                  <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                     <i class="fa fa-plus"></i></button>
                     <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                     <i class="fa fa-times"></i></button>
                  </div>
               </div>
               <div class="box-body" style="">
                  <div class="col-md-6">
                     <table class="table table-responsive">
                        <tr>
                           <th>Previous Employer Names</th>
                           <td><?= nl2br($view['previous_employer_names']); ?></td>
                        </tr>
                        <tr>
                           <th>Previous Contact Information</th>
                           <td><?= $view['previous_contact_information']; ?></td>
                        </tr>
                        <tr>
                           <th>Previous Employer Titles</th>
                           <td><?= $view['previous_titles']; ?></td>
                        </tr>
                        <tr>
                           <th>Previous Responsibilities</th>
                           <td><?= $view['previous_responsibilities']; ?></td>
                        </tr>
                        <tr>
                           <th>Reasons for Leaving</th>
                           <td><?= nl2br($view['reasons_for_leaving']); ?></td>
                        </tr>
                        <?php
                        $permission = array(
                           "0" => "No",
                           "1" => "Yes",
                        );
                        ?>
                        <tr>
                           <th>Previous Employer contact Permission </th>
                           <td><?php 
                           echo $permission[$view['previous_permission_to_contact']];
                           ?></td>
                        </tr>
                        <tr>
                           <th>references</th>
                           <td><?= $view['references']; ?></td>
                        </tr>
                        <tr>
                           <th>Suggestions</th>
                           <td><?= $view['open_for_suggestions']; ?></td>
                        </tr>
                     </table>
                  </div>
               </div>
               <div class="box-footer" style="">
                  <div class="form-group">
                      <a class="btn btn-primary " href="javascript:;" onclick="goBack();" > Back</a>
                  </div>
               </div>
            </div>
            <!-- /.box -->
         </section>
      </div>
   </section>
</div>