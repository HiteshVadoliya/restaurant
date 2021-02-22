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
                                                <label for="title">User Role</label>
                                                <select name="roleId" id="roleId" class="form-control">
                                                    <option value="">-- Select User Role --</option>
                                                    <?php
                                                    foreach ($roles as $role_key => $role) {
                                                        $sel = '';
                                                        if(isset($edit)) {
                                                            $sel = ($edit['roleId']==$role['roleId']) ? 'selected' : '';
                                                        }
                                                        ?><option <?= $sel ?> value="<?= $role['roleId'] ?>" ><?= $role['role'] ?></option><?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Name</label>
                                                <input type="text" class="form-control required" value="<?php if(isset($edit) && $edit['name']!='' ) { echo $edit['name']; } else { set_value('name'); } ?>" id="name" name="name" maxlength="128" autofocus>
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Email</label>
                                                <input type="email" class="form-control required" value="<?php if(isset($edit) && $edit['email']!='' ) { echo $edit['email']; } else { set_value('email'); } ?>" id="email" name="email" >
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Phone</label>
                                                <input type="text" class="form-control required" value="<?php if(isset($edit) && $edit['mobile']!='' ) { echo $edit['mobile']; } else { set_value('mobile'); } ?>" id="mobile" name="mobile" >
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="title">Date of Birth</label>
                                                <input autocomplete="off" type="text" class="form-control required datepicker" value="<?php if(isset($edit) && $edit['dob']!='' ) { echo $this->gr->display_date_formate( $edit['dob'] );  } else { echo date('d-m-Y');  } ?>" id="dob" name="dob"  >
                                                <span class="glyphicon glyphicon-time form-control-feedback"></span>
                                            </div>

                                            <div class="form-group has-feedback">
                                                <label for="title">Date of Joining</label>
                                                <input autocomplete="off" type="text" class="form-control required datepicker" value="<?php if(isset($edit) && $edit['doj']!='' ) { echo $this->gr->display_date_formate( $edit['doj'] ); } else { echo date('d-m-Y'); } ?>" id="doj" name="doj"  >
                                                <span class="glyphicon glyphicon-time form-control-feedback"></span>
                                            </div>
                                            
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