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
                                                <label for="title">Shift Type</label>
                                                <select name="shift_id" id="shift_id" class="form-control">
                                                    <option value="">-- Select Shift --</option>
                                                    <?php
                                                    foreach ($shift as $shift_key => $shif) {
                                                        $sel = '';
                                                        if(isset($edit)) {
                                                            $sel = ($edit['shift_id']==$shift_key) ? 'selected' : '';
                                                        }
                                                        ?><option <?= $sel ?> value="<?= $shift_key ?>" ><?= $shif ?></option><?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="title">Heading</label>
                                                <select name="ch_id" id="ch_id" class="form-control">
                                                    <option value="">-- Select Heading --</option>
                                                    <?php
                                                    foreach ($cheading as $ch_key => $chead) {
                                                        $sel = '';
                                                        if(isset($edit)) {
                                                            $sel = ($edit['ch_id']==$chead['ch_id']) ? 'selected' : '';
                                                        }
                                                        ?><option <?= $sel ?> value="<?= $chead['ch_id']; ?>" ><?= $chead['ch_title'] ?></option><?php
                                                    }
                                                    ?>
                                                </select>
                                            </div> 

                                            <div class="form-group">
                                                <label for="title">List</label>
                                                <input type="text" class="form-control required" value="<?php if(isset($edit) && $edit['title']!='' ) { echo $edit['title']; } else { set_value('title'); } ?>" id="title" name="title" maxlength="128" autofocus>
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
                title :{ required : true },
                ch_id :{ required : true },
                shift_id :{ required : true },
            },
            messages:{
                title :{ required : "Please enter title" },
                ch_id :{ required : "Please select heading" },
                shift_id :{ required : "Please select shift" },
            }
        });
    });
</script>