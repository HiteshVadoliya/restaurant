<link rel="stylesheet" href="<?= ADMIN_CSS_JS; ?>css/jquery-confirm.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/datatables.net/css/dataTables.bootstrap.min.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $MainTitle." Manage "; ?>
      </h1>
    </section>
    <section class="content">
      <div class="msgsuccess"></div>
        <div class="row">
            <div class="col-xs-12 text-right">              
                <div class="form-group">
                    <a class="btn btn-primary " href="<?= ADMIN_LINK.$url."/add/" ?>" ><i class="fa fa-plus"></i> Add New <?= $MainTitle; ?></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?= $MainTitle; ?> List</h3>
                </div>                
                <div class="box-body table-responsive ">
                    <table class="table table-bordered table-striped" id="posts">
                        <thead>
                               <th>Restaurant Name</th>
                               <th>Restaurant Owner</th>
                               <th>Restaurant Email</th>
                               <th>Restaurant Phone</th>
                               <th style="width: 20%">Action</th>
                        </thead>        
                   </table>
                </div>
              </div>
            </div>
        </div>
    </section>
</div>

<script src="<?php echo base_url(); ?>public/backend/datatables.net/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/backend/datatables.net/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('#posts').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
           "url": "<?php echo ADMIN_LINK.$Controller ?>/ajax_list",
           "dataType": "json",
           "type": "POST",
           "data":{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }
                       },
          "columns": [
                  { "data": "res_name" },
                  { "data": "res_owner_name" },
                  { "data": "res_email" },
                  { "data": "res_phone" },
                  { "data": "action","bSortable": false  },
               ]
      });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.1.0/jquery-confirm.min.js"></script>
<script type="text/javascript">
  $(document).on("click",".rowDelete",function(){        
        var id = $(this).attr("data-id");
        var r = confirm("Are you sure to delete");
        if(!r) { return false; }
        $.ajax(
        {
            url: '<?php echo ADMIN_LINK.$Controller ?>/delete',
            dataType: "JSON",
            method:"POST",
            data: {
                "id": id,
                "img_src_name" : img_src_name
            },
            success: function ()
            {
                $('#posts').DataTable().ajax.reload();
                $('.msgsuccess').html('<div class="alert alert-success">Data has been deleted successfully!</div>');
            }
        });
  });  
  $(document).on("click",".rowStatus",function(){
      var id = $(this).attr("data-id");             
      var status = $(this).attr("data-status");             
      $.ajax(
      {
          url: '<?php echo ADMIN_LINK.$Controller ?>/changeStatus',
          dataType: "JSON",
          method:"POST",
          data: {
              "id": id,
              "status": status,
          },
          success: function (response)
          { 
               $('#posts').DataTable().ajax.reload();
          }
      });              
  });   
</script>