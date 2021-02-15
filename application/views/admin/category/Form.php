<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <?= ucfirst($type)." ".$MainTitle ?>
      </h1>
    </section>    
    <section class="content">    
        <div class="row">
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
                    <?php if(isset($edit)) { ?>
                    <form enctype="multipart/form-data" role="form" id="frm" name="frm" action="<?php echo ADMIN_LINK; ?>category/save" method="post" role="form">
                        <input type="hidden" name="editid" id="editid" value="<?= $edit['cat_id'] ?>">
                    <?php } else { ?>
                    <form enctype="multipart/form-data" role="form" id="frm" name="frm" action="<?php echo ADMIN_LINK; ?>category/save" method="post" role="form">
                    <?php } ?>
                        <input type="hidden" name="type" id="type" value="<?= $type ?>">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="title">Category</label>
                                        <input type="text" class="form-control required" value="<?php if(isset($edit) && $edit['title']!='' ) { echo $edit['title']; } else { set_value('fname'); } ?>" id="title" name="title" maxlength="128">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Background Image (jpg|jpeg|png|gif)</label>
                                        <input type="file" name="img_src" id="img_src" class="form-control" accept="image/x-png,image/gif,image/jpeg">
                                    </div>
                                    <?php if(isset($edit) && $edit['img_src']!='') { ?> 
                                    <div class="form-group">
                                        <img src="<?php echo base_url().IMG_SRC.$edit['img_src']; ?>" width="100px" >
                                        <input type="hidden" name="old_img" value="<?= $edit['img_src'] ?>">
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>    
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
                title :{ required : true },
            },
            messages:{
                title :{ required : "This field is required" },
            }
        });
    });
</script>