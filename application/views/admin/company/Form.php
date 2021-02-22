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
                                                <label for="title">Company Name</label>
                                                <input type="text" class="form-control required" value="<?php if(isset($edit) && $edit['company_name']!='' ) { echo $edit['company_name']; } else { set_value('company_name'); } ?>" id="company_name" name="company_name" maxlength="128" autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Company Email</label>
                                                <input type="email" class="form-control required" value="<?php if(isset($edit) && $edit['company_email']!='' ) { echo $edit['company_email']; } else { set_value('company_email'); } ?>" id="company_email" name="company_email" >
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Company Phone</label>
                                                <input type="text" class="form-control required" value="<?php if(isset($edit) && $edit['company_phone']!='' ) { echo $edit['company_phone']; } else { set_value('company_phone'); } ?>" id="company_phone" name="company_phone" >
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Company Address</label>
                                                <textarea rows="5" class="form-control required" id="company_address" name="company_address" ><?php if(isset($edit) && $edit['company_address']!='' ) { echo $edit['company_address']; } else { set_value('company_address'); } ?></textarea>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Company Policy</label>
                                                <input type="file" name="company_policy" id="company_policy" class="form-control" accept="">
                                            </div>
                                            <?php if(isset($edit) && $edit['company_policy']!='') {
                                                $url = base_url().COMPANY_POLICY.$edit['company_policy'];
                                             ?> 
                                            <div class="form-group">
                                                <a href="<?= $url ?>" download><i class="fa fa-download"></i></a>
                                            </div>
                                            <?php } ?>
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
                company_name :{ required : true },
                company_email :{ required : true, email:true },
                company_phone :{ required : true, number:true },
                company_address :{ required : true },
            },
            messages:{
                company_name :{ required : "Company Name is required" },
                company_email :{ required : "Email is required" },
                company_phone :{ required : "Phone is required" },
                company_address :{ required : "Address is required" },
            }
        });
    });
</script>