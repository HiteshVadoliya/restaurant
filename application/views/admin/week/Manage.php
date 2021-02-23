<link rel="stylesheet" href="<?= ADMIN_CSS_JS; ?>css/jquery-confirm.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/datatables.net/css/dataTables.bootstrap.min.css">

<link rel="stylesheet" href="<?php echo base_url(); ?>public/backend/week/css/mobiscroll.jquery.min.css">
<script src="<?php echo base_url(); ?>public/backend/week/js/mobiscroll.jquery.min.js"></script>

<style type="text/css">
    body {
        margin: 0;
        padding: 0;
    }

    button {
        display: inline-block;
        margin: 5px 5px 0 0;
        padding: 10px 30px;
        outline: 0;
        border: 0;
        cursor: pointer;
        background: #5185a8;
        color: #fff;
        text-decoration: none;
        font-family: arial, verdana, sans-serif;
        font-size: 14px;
        font-weight: 100;
    }

    input {
        width: 100%;
        margin: 0 0 5px 0;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 0;
        font-family: arial, verdana, sans-serif;
        font-size: 14px;
        box-sizing: border-box;
        -webkit-appearance: none;
    }

    .mbsc-page {
        padding: 1em;
    }

</style>




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $MainTitle." Manage "; ?>
      </h1>
    </section>
    <section class="content">
      

      <div mbsc-page class="demo-week-view">
        <div style="height:100%">
            <div id="demo-1-week"></div>
        </div>
      </div>

      <div id="demo-daily-events"></div>

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
                               <th>Name</th>
                               <th>Role</th>
                               <th>Email</th>
                               <th>Phone</th>
                               <th style="width: 20%">Action</th>
                        </thead>        
                   </table>
                </div>
              </div>
            </div>
        </div>
    </section>
</div>

<script>

    mobiscroll.setOptions({
        locale: mobiscroll.localeEn,  // Specify language like: locale: mobiscroll.localePl or omit setting to use default
        theme: 'ios',                 // Specify theme like: theme: 'ios' or omit setting to use default
            themeVariant: 'light'     // More info about themeVariant: https://docs.mobiscroll.com/5-0-7/calendar#opt-themeVariant
    });
    
    $(function () {
        // Mobiscroll Calendar initialization
        $('#demo-1-week').mobiscroll().datepicker({
            controls: ['calendar'],   // More info about controls: https://docs.mobiscroll.com/5-0-7/calendar#opt-controls
            display: 'inline',        // Specify display mode like: display: 'bottom' or omit setting to use default
            calendarType: 'week',
            showWeekNumbers: true,
            weeks: 1                  // More info about weeks: https://docs.mobiscroll.com/5-0-7/calendar#opt-weeks
        });
    
        // Mobiscroll Calendar initialization
        $('#demo-2-weeks').mobiscroll().datepicker({
            controls: ['calendar'],   // More info about controls: https://docs.mobiscroll.com/5-0-7/calendar#opt-controls
            display: 'inline',        // Specify display mode like: display: 'bottom' or omit setting to use default
            calendarType: 'week',
            showWeekNumbers: true,
            weeks: 2                  // More info about weeks: https://docs.mobiscroll.com/5-0-7/calendar#opt-weeks
        });
    
        // Mobiscroll Calendar initialization
        $('#demo-3-weeks').mobiscroll().datepicker({
            controls: ['calendar'],   // More info about controls: https://docs.mobiscroll.com/5-0-7/calendar#opt-controls
            display: 'inline',        // Specify display mode like: display: 'bottom' or omit setting to use default
            calendarType: 'week',
            showWeekNumbers: true,
            weeks: 3                  // More info about weeks: https://docs.mobiscroll.com/5-0-7/calendar#opt-weeks
        });
    });


    console.log($('#demo-1-week').mobiscroll('getVal'));
</script>

<script type="text/javascript">
  mobiscroll.setOptions({
    theme: 'material',
    themeVariant: 'light',
    
});

$(function () {

    var inst = $('#demo-daily-events').mobiscroll().eventcalendar({
        view: {
            calendar: { type: 'week' },
            agenda: { type: 'day' }
        },
        onEventClick: function (event, inst) {
            mobiscroll.toast({
                message: event.event.title
            });
        }
    }).mobiscroll('getInst');

    $.getJSON('https://trial.mobiscroll.com/events/?vers=5&callback=?', function (events) {
        inst.setEvents(events);
    });
});
</script>













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
                  { "data": "name" },
                  { "data": "role" },
                  { "data": "email" },
                  { "data": "mobile" },
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