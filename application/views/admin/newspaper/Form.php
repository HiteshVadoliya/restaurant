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
                    <div class="box-header">
                        <h3 class="box-title">Enter User Details</h3>
                    </div><!-- /.box-header -->
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
                                                <label for="title">Animal Name</label>
                                                <input type="text" class="form-control required" value="<?php if(isset($edit) && $edit['title']!='' ) { echo $edit['title']; } else { set_value('fname'); } ?>" id="title" name="title" maxlength="128" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="title">Main Category</label>
                                        <select name="cat_id" id="cat_id" class="form-control">
                                            <option value="">-- Select Main Type --</option>
                                            <?php
                                            foreach ($main_category as $key => $cat) {
                                                $sel = '';
                                                if(isset($edit)) {
                                                    $sel = ($edit['cat_id']==$cat['cat_id']) ? 'selected' : '';

                                                }
                                                //$sel = (1==$cat['cat_id']) ? 'selected' : '';
                                                ?><option <?= $sel ?> value="<?= $cat['cat_id'] ?>" ><?= $cat['title'] ?></option><?php
                                            }
                                            ?>
                                        </select>
                                    </div>                                    
                                    
                                    <div class="form-group">
                                    <label for="title">Animal Image (jpg|jpeg|png|gif)</label>
                                        <input type="file" name="img_src" id="img_src" class="form-control" accept="image/x-png,image/gif,image/jpeg">
                                    </div>
                                    <?php if(isset($edit) && $edit['img_src']!='') { ?> 
                                    <div class="form-group">
                                        <img src="<?php echo base_url().IMG_SRC.$edit['img_src']; ?>" width="150" >
                                    </div>
                                    <?php } ?>

                                    <div class="form-group">
                                        <label for="title">Upload Sound</label>
                                        <input type="file" name="sound_src" id="sound_src" class="form-control" accept=".mp3,audio/">
                                    </div>
                                    <?php if(isset($edit) && $edit['sound_src']!='') { ?> 
                                    <div class="form-group">
                                        <audio controls>
                                          <source src="<?php echo base_url().IMG_SRC.$edit['sound_src']; ?>" type="audio/ogg">
                                          <source src="<?php echo base_url().IMG_SRC.$edit['sound_src']; ?>" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                        </audio>
                                    </div>
                                    <?php } ?>
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
                cat_id :{ required : true },
                url :{ required : true },
                descr :{ required : true },
            },
            messages:{
                cat_id :{ required : "This field is required" },
                url :{ required : "This field is required" },
                descr :{ required : "This field is required" },
            }
        });
    });
</script>