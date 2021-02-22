<?php
$sitesetting = $this->SiteSetting_model->getSiteSetting();
$headerInfo['site_name'] = $sitesetting[0]->site_name;
$headerInfo['site_logo'] = $sitesetting[0]->site_logo;
$headerInfo['site_favicon'] = $sitesetting[0]->site_favicon;
$headerInfo['pageTitle'] = $sitesetting[0]->site_name .' '. '| Employee Registration';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?= $headerInfo['pageTitle'] ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo ADMIN_CSS_JS; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo ADMIN_CSS_JS; ?>/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
      .login-box, .register-box {
        width: 80%;
        margin: 0% auto;
      }
    </style>
    <script src="<?php echo ADMIN_CSS_JS; ?>/js/jQuery-2.1.4.min.js"></script>
    <link href="<?php echo ADMIN_CSS_JS; ?>bootstrap/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" /> 
    <script src="<?php echo ADMIN_CSS_JS; ?>bootstrap/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="<?= ADMIN_CSS_JS.'css/bootstrap-tagsinput.css' ?>">
    <script src="<?= ADMIN_CSS_JS; ?>js/custom.js"></script>
    <link rel="stylesheet" href="<?= ADMIN_CSS_JS; ?>css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link rel="stylesheet" href="<?= ADMIN_CSS_JS; ?>custom.css">
    <script src="<?= ADMIN_CSS_JS; ?>js/bootstrap-notify.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b><?= $headerInfo['site_name']; ?></b><br>Employee Registration</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <!-- <p class="login-box-msg">Registration</p> -->
        <?php $this->load->helper('form'); ?>
        <div class="row">
            <div class="col-md-12">
                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
            </div>
        </div>
        <?php
        $this->load->helper('form');
        $error = $this->session->flashdata('error');
        if($error)
        {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error; ?>                    
            </div>
        <?php }
        $success = $this->session->flashdata('success');
        if($success)
        {
            ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $success; ?>                    
            </div>
        <?php } ?>
        
        <form enctype="multipart/form-data" role="form" id="frm" name="frm" action="javascript:;" method="post" role="form">
            <?php $this->load->view(ADMIN.'employee/common_user_registration_form') ?>
        </form>

        
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- <script src="<?php echo ADMIN_CSS_JS; ?>js/jQuery-2.1.4.min.js"></script> -->

    <script src="<?php echo ADMIN_CSS_JS; ?>/bootstrap/js/bootstrap.min.js" type="text/javascript">
    </script>
    <script src="<?= ADMIN_CSS_JS.'js/bootstrap-tagsinput.min.js'; ?>"></script>
    <script src="<?= ADMIN_CSS_JS; ?>js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script src="<?php echo ADMIN_CSS_JS; ?>/js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo ADMIN_CSS_JS; ?>/js/validation.js" type="text/javascript"></script>
    <?php
    $date_formate = $this->gr->get_date_formate();
    ?>
    <script type="text/javascript">
      $(document).ready(function(){
          var addUserForm = $("#frm");
          var validator = addUserForm.validate({
              rules:{
                  multi_task_ids :{ required : true },
                  
              },
              messages:{
                  multi_task_ids :{ required : "Please enter Restaurant Name" },
                  
              },
             errorPlacement: function(error, element) {
                 if (element.attr("name") == "multi_task_ids") {
                      error.insertAfter(".multi_task_ids");
                  }
                  else{
                      error.insertAfter(element);
                  }
              }  
          });
      });


      $("#frm").on('submit',function(){

        var val_form = $("#frm").valid();
        if(!val_form) { return false; }
        $(".close").trigger("click");    
        var btn_old_val = $(".custom_submit").html();
        $(".custom_submit").html(btn_old_val+'...');
        $(".custom_submit").html('<?php echo WAIT; ?>');
        $(".custom_submit").attr("disabled", true);

        $.ajax({
              url: "<?php echo ADMIN_LINK.'employee/save' ?>",
              method: "POST",
              data: new FormData(this),
              contentType: false,  
              cache: false,  
              processData:false,  
              dataType: "json",
              success: function(data) {
                if(data.status == 'success') {
                  $.notify({message: data.msg },{type: 'success'});
                } else {
                  $.notify({message: data.msg },{type: 'danger'});
                }
                $(".custom_submit").html(btn_old_val);
                $("#frm")[0].reset();
                $(".custom_submit").attr("disabled", false);

                //var url = '<?php echo base_url('employer/profile'); ?>';
                //setTimeout(function(){ window.location = url; }, 2000);

              },
              error: function(data) {
                  console.log(data);
              }
          });
      });

      $("select").select2({
        allowClear: false,
      });
      // $("#roleId").select2({
      //     placeholder: "Select a state",
      //     allowClear: true
      // });
      
      let date_formate = '<?php echo $date_formate; ?>';
      jQuery('.datepicker').datepicker({
          format : date_formate,
          weekStart: 1,
          daysOfWeekHighlighted: "6,0",
          autoclose: true,
          todayHighlight: true,
      });
      $(document).ready(function() {      
          
          $('.bootstrap-tagsinput input').keydown(function( event ) {
              if ( event.which == 13 ) {
                  $(this).blur();
                  $(this).focus();
                  return false;
              }
          })
          
      });
    </script>
  </body>
</html>