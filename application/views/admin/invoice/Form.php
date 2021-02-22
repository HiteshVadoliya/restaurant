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
                                                <label for="title">Restaurant</label>
                                                <select name="res_id" id="res_id" class="form-control">
                                                    <option value="">-- Select Restaurant --</option>
                                                    <?php
                                                    foreach ($restaurant as $res_key => $res) {
                                                        $sel = '';
                                                        if(isset($edit)) {
                                                            $sel = ($edit['res_id']==$res['restaurant_id']) ? 'selected' : '';
                                                        }
                                                        ?><option <?= $sel ?> value="<?= $res['restaurant_id'] ?>" ><?= $res['res_name'] ?></option><?php
                                                    }
                                                    ?>
                                                </select>
                                            </div> 

                                            <div class="form-group has-feedback">
                                                <label for="title">Invoice Date</label>
                                                <input autocomplete="off" type="text" class="form-control required datepicker" value="<?php if(isset($edit) && $edit['inv_date']!='' ) { echo $this->gr->display_date_formate( $edit['inv_date'] ); } else { echo date('d-m-Y'); } ?>" id="inv_date" name="inv_date"  >
                                                <span class="glyphicon glyphicon-time form-control-feedback"></span>
                                            </div>

                                            <div class="form-group">
                                                <label for="title">Invoice about</label>
                                                <input type="text" class="form-control required" value="<?php if(isset($edit) && $edit['title']!='' ) { echo $edit['title']; } else { set_value('title'); } ?>" id="title" name="title" maxlength="128" >
                                            </div>
                                            
                                            

                                            <div class="form-group">
                                                <label for="title">Notes</label>
                                                <textarea rows="5" class="form-control required" id="notes" name="notes" ><?php if(isset($edit) && $edit['notes']!='' ) { echo $edit['notes']; } else { set_value('notes'); } ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="title">Invoice</label>
                                                <input type="file" name="invoice" id="invoice" class="form-control" accept="">
                                            </div>
                                            <?php if(isset($edit) && $edit['invoice']!='') {
                                                $url1 = base_url().$assets.$edit['invoice'];
                                                ?>
                                                <div class="form-group">
                                                    <a href="<?= $url1 ?>" download><i class="fa fa-download"></i></a>
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
                title :{ required : true },
                res_id :{ required : true },
                inv_date :{ required : true },
                notes :{ required : true },
            },
            messages:{
                title :{ required : "Please enter title" },
                res_id :{ required : "Please select restaurant" },
                inv_date :{ required : "Please select invoice date" },
                notes :{ required : "Please enter notes" },
            }
        });
    });
</script>