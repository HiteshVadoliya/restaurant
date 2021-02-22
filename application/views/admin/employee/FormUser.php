<?php echo "employee/form user"; die; ?>
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
                    <form enctype="multipart/form-data" role="form" id="frm" name="frm" action="<?php echo ADMIN_LINK; ?>/employee/save/employee" method="post" role="form">
                        <input type="hidden" name="editid" id="editid" value="<?= $edit[$tbl_id] ?>">
                    <?php } else { ?>
                    <form enctype="multipart/form-data" role="form" id="frm" name="frm" action="<?php echo ADMIN_LINK; ?>/employee/save/employee" method="post" role="form">
                    <?php } ?>
                        <input type="hidden" name="type" id="type" value="<?= $type ?>">
                        <div class="box-body">
                            <?php $this->load->view(ADMIN.'employee/common_user_registration_form') ?>
                            <input type="hidden" name="roleId" value="<?php echo 5; ?>" >
                        </div><!-- /.box-body -->
                        
                    </form>
                </div>
            </div>
            

        </div>    
    </section>
    
</div>

<script type="text/javascript">
    $(document).ready(function() {      
        
        $('.bootstrap-tagsinput input').keydown(function( event ) {
            if ( event.which == 13 ) {
                $(this).blur();
                $(this).focus();
                return false;
            }
        })
        
    });
    $(document).ready(function(){
        var addUserForm = $("#frm");
        var validator = addUserForm.validate({
            rules:{
                roleId :{ required : true },
                name :{ required : true },
                email :{ required : true, email:true },
                mobile :{ required : true, number:true },
                dob :{ required : true },
                doj :{ required : true },
            },
            messages:{
                roleId :{ required : "Please select role" },
                name :{ required : "Please enter name" },
                email :{ required : "Please enter email" },
                mobile :{ required : "Pleasa enter mobile" },
                dob :{ required : "Pleasa select Date of Birth" },
                doj :{ required : "Pleasa select Joining Date" },
            }
        });
    });
</script>