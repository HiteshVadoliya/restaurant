<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <?= ucfirst($type)." ".$MainTitle ?>
      </h1>
    </section>
    
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
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
            <?php } ?>
            </div>
            
            <div class="col-md-12">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <?php if(isset($edit)) { ?>
                    <form enctype="multipart/form-data" role="form" id="frm" name="frm" action="<?php echo ADMIN_LINK.$url; ?>/save" method="post" role="form">
                        <input type="hidden" name="editid" id="editid" value="<?= $edit[$tbl_id] ?>">
                    <?php } else { ?>
                    <form enctype="multipart/form-data" role="form" id="frm" name="frm" action="<?php echo ADMIN_LINK.$url; ?>/save" method="post" role="form">
                    <?php } ?>
                        <input type="hidden" name="type" id="type" value="<?= $type ?>">
                        <div class="box-body">
                            <div class="row">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6">                                
                                            <div class="form-group">
                                                <label for="title">Restaurant Name</label>
                                                <input type="text" class="form-control required" value="<?php if(isset($edit) && $edit['res_name']!='' ) { echo $edit['res_name']; } else { set_value('res_name'); } ?>" id="res_name" name="res_name" maxlength="128" autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Restaurant Owner Name</label>
                                                <input type="text" class="form-control required" value="<?php if(isset($edit) && $edit['res_owner_name']!='' ) { echo $edit['res_owner_name']; } else { set_value('res_owner_name'); } ?>" id="res_owner_name" name="res_owner_name" >
                                            </div>

                                            <div class="form-group">
                                                <label for="title">Restaurant Admin</label>
                                                <select name="res_admin_id" id="res_admin_id" class="form-control">
                                                    <option value="">-- Select Restaurant Admin --</option>
                                                    <?php
                                                    foreach ($admin as $adm_key => $adm) {
                                                        $sel = '';
                                                        if(isset($edit)) {
                                                            $sel = ($edit['res_admin_id']==$adm['userId']) ? 'selected' : '';
                                                        }
                                                        ?><option <?= $sel ?> value="<?= $adm['userId'] ?>" ><?= $adm['name'] ?></option><?php
                                                    }
                                                    ?>
                                                </select>
                                                <span class="res_admin_id"></span>
                                            </div> 

                                            <div class="form-group">
                                                <label for="title">Restaurant Manager</label>
                                                <select name="res_manager_id" id="res_manager_id" class="form-control">
                                                    <option value="">-- Select Restaurant Manager --</option>
                                                    <?php
                                                    foreach ($manager as $man_key => $man) {
                                                        $sel2 = '';
                                                        if(isset($edit)) {
                                                            $sel2 = ($edit['res_manager_id']==$man['userId']) ? 'selected' : '';
                                                        }
                                                        ?><option <?= $sel2 ?> value="<?= $man['userId'] ?>" ><?= $man['name'] ?></option><?php
                                                    }
                                                    ?>
                                                </select>
                                                <span class="res_manager_id"></span>
                                            </div>  
                                            
                                            <div class="form-group">
                                                <label for="title">Restaurant Phone</label>
                                                <input type="text" class="form-control required" value="<?php if(isset($edit) && $edit['res_phone']!='' ) { echo $edit['res_phone']; } else { set_value('res_phone'); } ?>" id="res_phone" name="res_phone" >
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Restaurant Email</label>
                                                <input type="email" class="form-control required" value="<?php if(isset($edit) && $edit['res_email']!='' ) { echo $edit['res_email']; } else { set_value('res_email'); } ?>" id="res_email" name="res_email" >
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Restaurant Minimum Wages</label>
                                                <input type="text" class="form-control required" value="<?php if(isset($edit) && $edit['res_minmum_wages']!='' ) { echo $edit['res_minmum_wages']; } else { set_value('res_minmum_wages'); } ?>" id="res_minmum_wages" name="res_minmum_wages" >
                                            </div>

                                            <div class="form-group">
                                                <label for="title">Restaurant Start Day</label>
                                                <select name="res_start_day" id="res_start_day" class="form-control">
                                                    <option value="">-- Select Restaurant Start Day --</option>
                                                    <?php
                                                    foreach ($weekday as $week_key => $week) {
                                                        $sel = '';
                                                        if(isset($edit)) {
                                                            $sel = ($edit['res_start_day']==$week['day_id']) ? 'selected' : '';
                                                        }
                                                        ?><option <?= $sel ?> value="<?= $week['day_number'] ?>" ><?= $week['day_name'] ?></option><?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="title">Restaurant Hours</label>
                                                <input type="text" class="form-control required" value="<?php if(isset($edit) && $edit['res_hours']!='' ) { echo $edit['res_hours']; } else { set_value('res_hours'); } ?>" id="res_hours" name="res_hours" >
                                            </div>

                                            <div class="form-group">
                                                <label for="title">Restaurant Address</label>
                                                <textarea rows="5" class="form-control required" id="res_address" name="res_address" ><?php if(isset($edit) && $edit['res_address']!='' ) { echo $edit['res_address']; } else { set_value('res_address'); } ?></textarea>
                                                
                                            </div>
                                        </div>

                                        <div class="col-md-6">   
                                            <div class="form-group">
                                                <label for="title">Company Pictures</label>
                                                <input type="file" name="res_pictures" id="res_pictures" class="form-control" accept="">
                                            </div>
                                            <?php if(isset($edit) && $edit['res_pictures']!='') {
                                                $url = base_url().IMG_RESTAURANT.$edit['res_pictures'];
                                                ?>
                                                <div class="form-group">
                                                    <a href="<?= $url ?>" download><i class="fa fa-download"></i></a>
                                                </div>
                                                <?php
                                            }
                                            ?> 

                                            <div class="form-group">
                                                <label for="title">Company Licence</label>
                                                <input type="file" name="res_licence" id="res_licence" class="form-control" accept="">
                                            </div>
                                            <?php if(isset($edit) && $edit['res_licence']!='') {
                                                $url2 = base_url().IMG_RESTAURANT.$edit['res_licence'];
                                                ?>
                                                <div class="form-group">
                                                    <a href="<?= $url2 ?>" download><i class="fa fa-download"></i></a>
                                                </div>
                                                <?php
                                            }
                                            ?> 

                                            <div class="form-group">
                                                <label for="title">Company Permit</label>
                                                <input type="file" name="res_permit" id="res_permit" class="form-control" accept="">
                                            </div>
                                            <?php if(isset($edit) && $edit['res_permit']!='') {
                                                $url3 = base_url().IMG_RESTAURANT.$edit['res_permit'];
                                                ?>
                                                <div class="form-group">
                                                    <a href="<?= $url3 ?>" download><i class="fa fa-download"></i></a>
                                                </div>
                                                <?php
                                            }
                                            ?> 


                                        </div>
                                    </div>
                                </div>
                                                     
                            </div>                            
                        </div><!-- /.box-body -->
                        
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            

        </div>    
    </section>
    
</div>

<script type="text/javascript">
    $(document).ready(function(){
        var addUserForm = $("#frm");
        var validator = addUserForm.validate({
            rules:{
                res_name :{ required : true },
                res_owner_name :{ required : true },
                res_admin_id :{ required : true },
                res_manager_id :{ required : true },
                res_phone :{ required : true },
                res_email :{ required : true, email:true },
                res_minmum_wages :{ required : true },
                res_start_day :{ required : true },
                res_hours :{ required : true },
                res_address :{ required : true },
            },
            messages:{
                res_name :{ required : "Please enter Restaurant Name" },
                res_owner_name :{ required : "Please enter Owner Name" },
                res_admin_id :{ required : "Please select Admin for Restaurant" },
                res_manager_id :{ required : "Please select Manager for Restaurant" },
                res_phone :{ required : "Please enter Phone Number" },
                res_email :{ required : "Please enter Email" },
                res_minmum_wages :{ required : "Please enter wager" },
                res_start_day :{ required : "Please select Day" },
                res_hours :{ required : "Please enter hours" },
                res_address :{ required : "Please enter Address" },
            },
            errorPlacement: function(error, element) {
                 if (element.attr("name") == "res_manager_id") {
                      error.insertAfter(".res_manager_id");
                  } else if (element.attr("name") == "res_admin_id") {
                      error.insertAfter(".res_admin_id");
                  }
                  else{
                      error.insertAfter(element);
                  }
              }
        });
    });
</script>