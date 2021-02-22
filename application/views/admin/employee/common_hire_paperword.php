<?php $sr_img = 1; ?>
<div class="row">
  <!-- Achievements / awards photos / certificate here< -->
  <div class="col-md-12">
    <div class="col-md-6">
      <div id="achievements_main" class="dm-uploader p-5 text-center">
         <h3 class="mb-5 mt-5 text-muted">Drag &amp; drop Your Achievements / awards photos / certificate here</h3>
         <div class="btn btn-primary mb-5">
            <span>Open the file Browser</span>
            <input type="hidden" name="achievements" id="achievements" value="">
            <input type="file" name="achievements_img" title='Click to add Files' />
         </div>
         <div class="">  
            <ul class="list-unstyled p-2 d-flex flex-column col" id="files">
               <li class="text-muted text-center empty">No files uploaded.</li>
            </ul>
         </div>
      </div>
    </div>
    <div class="col-md-6">
      <?php

      if(isset($edit)) {
         if($edit['achievements'] != '') {
            $editImages = json_decode($edit['achievements'],true);
            ?>
            <div class="row">
            <?php
            foreach ($editImages as $img_key => $image) {
               if(file_exists($assets.$image)) {
               ?>
               <div class="col-md-3 delete_<?= $sr_img ?>">
                  <span class="multi_delete" data-value="<?= $sr_img ?>" ><i class="fa fa-trash" ></i></span>
                  <img src="<?php echo base_url().$assets.'/'.$image; ?>" class="img img-responsive" alt="Photos" height="50px">
               </div>
               <?php
               }
            $sr_img++;
            }
            ?>
            </div>
         <?php
         }
      }
      ?>
    </div>
  </div>
</div>
<br/>
<div class="row">
  <!-- Ids -->
  <div class="col-md-12">
    <div class="col-md-6">
      <div id="ids_main" class="dm-uploader p-5 text-center">
         <h3 class="mb-5 mt-5 text-muted">Drag &amp; drop Your Ids here</h3>
         <div class="btn btn-primary mb-5">
            <span>Open the file Browser</span>
            <input type="hidden" name="ids" id="ids" value="">
            <input type="file" name="ids_img" title='Click to add Files' />
         </div>
         <div class="">  
            <ul class="list-unstyled p-2 d-flex flex-column col" id="files">
               <li class="text-muted text-center empty">No files uploaded.</li>
            </ul>
         </div>
      </div>
    </div>
    <div class="col-md-6">
      <?php

      if(isset($edit) && $edit['ids'] != 'null') {
         if($edit['ids'] != '') {
            $editImages_ids = json_decode($edit['ids'],true);
            ?>
            <div class="row">
            <?php            
            foreach ($editImages_ids as $img_key => $image) {
               if(file_exists($assets.$image)) {
               ?>
               <div class="col-md-3 delete_<?= $sr_img ?>">
                  <span class="multi_delete" data-value="<?= $sr_img ?>" ><i class="fa fa-trash" ></i></span>
                  <img src="<?php echo base_url().$assets.'/'.$image; ?>" class="img img-responsive" alt="Photos" height="50px">
               </div>
               <?php
               }
            $sr_img++;
            }
            ?>
            </div>
         <?php
         }
      }
      ?>
    </div>
  </div>
</div>

<br/>
<div class="row">
  <!-- sss -->
  <div class="col-md-12">
    <div class="col-md-6">
      <div id="sss_main" class="dm-uploader p-5 text-center">
         <h3 class="mb-5 mt-5 text-muted">Drag &amp; drop Your social security number  here</h3>
         <div class="btn btn-primary mb-5">
            <span>Open the file Browser</span>
            <input type="hidden" name="sss" id="sss" value="">
            <input type="file" name="ids_img" title='Click to add Files' />
         </div>
         <div class="">  
            <ul class="list-unstyled p-2 d-flex flex-column col" id="files">
               <li class="text-muted text-center empty">No files uploaded.</li>
            </ul>
         </div>
      </div>
    </div>
    <div class="col-md-6">
      <?php
      if(isset($edit)) {
         if($edit['sss'] != '' && $edit['sss'] != 'null') {
            $editImages_sss = json_decode($edit['sss'],true);
            ?>
            <div class="row">
            <?php            
            foreach ($editImages_sss as $img_key => $image) {
               if(file_exists($assets.$image)) {
               ?>
               <div class="col-md-3 delete_<?= $sr_img ?>">
                  <span class="multi_delete" data-value="<?= $sr_img ?>" ><i class="fa fa-trash" ></i></span>
                  <img src="<?php echo base_url().$assets.'/'.$image; ?>" class="img img-responsive" alt="Photos" height="50px">
               </div>
               <?php
               }
            $sr_img++;
            }
            ?>
            </div>
         <?php
         }
      }
      ?>
    </div>
  </div>
</div>

<br/>
<div class="row">
  <!-- work_permit -->
  <div class="col-md-12">
    <div class="col-md-6">
      <div id="work_permit_main" class="dm-uploader p-5 text-center">
         <h3 class="mb-5 mt-5 text-muted">Drag &amp; drop Your Work Permit  here</h3>
         <div class="btn btn-primary mb-5">
            <span>Open the file Browser</span>
            <input type="hidden" name="work_permit" id="work_permit" value="">
            <input type="file" name="ids_img" title='Click to add Files' />
         </div>
         <div class="">  
            <ul class="list-unstyled p-2 d-flex flex-column col" id="files">
               <li class="text-muted text-center empty">No files uploaded.</li>
            </ul>
         </div>
      </div>
    </div>
    <div class="col-md-6">
      <?php
      if(isset($edit)) {
         if($edit['work_permit'] != '' && $edit['work_permit'] != 'null' ) {
            $editImages_work_permit = json_decode($edit['work_permit'],true);
            ?>
            <div class="row">
            <?php            
            foreach ($editImages_work_permit as $img_key => $image) {
               if(file_exists($assets.$image)) {
               ?>
               <div class="col-md-3 delete_<?= $sr_img ?>">
                  <span class="multi_delete" data-value="<?= $sr_img ?>" ><i class="fa fa-trash" ></i></span>
                  <img src="<?php echo base_url().$assets.'/'.$image; ?>" class="img img-responsive" alt="Photos" height="50px">
               </div>
               <?php
               }
            $sr_img++;
            }
            ?>
            </div>
         <?php
         }
      }
      ?>
    </div>
  </div>
</div>

<br/>
<div class="row">
  <!-- parental_permission -->
  <div class="col-md-12">
    <div class="col-md-6">
      <div id="parental_permission_main" class="dm-uploader p-5 text-center">
         <h3 class="mb-5 mt-5 text-muted">Drag &amp; drop Your Parental Permission  here</h3>
         <div class="btn btn-primary mb-5">
            <span>Open the file Browser</span>
            <input type="hidden" name="parental_permission" id="parental_permission" value="">
            <input type="file" name="ids_img" title='Click to add Files' />
         </div>
         <div class="">  
            <ul class="list-unstyled p-2 d-flex flex-column col" id="files">
               <li class="text-muted text-center empty">No files uploaded.</li>
            </ul>
         </div>
      </div>
    </div>
    <div class="col-md-6">
      <?php
      if(isset($edit)) {
         if($edit['parental_permission'] != '' && $edit['parental_permission'] != 'null' ) {
            $editImages_parental_permission = json_decode($edit['parental_permission'],true);
            ?>
            <div class="row">
            <?php            
            foreach ($editImages_parental_permission as $img_key => $image) {
               if(file_exists($assets.$image)) {
               ?>
               <div class="col-md-3 delete_<?= $sr_img ?>">
                  <span class="multi_delete" data-value="<?= $sr_img ?>" ><i class="fa fa-trash" ></i></span>
                  <img src="<?php echo base_url().$assets.'/'.$image; ?>" class="img img-responsive" alt="Photos" height="50px">
               </div>
               <?php
               }
            $sr_img++;
            }
            ?>
            </div>
         <?php
         }
      }
      ?>
    </div>
  </div>
</div>


<br/>
<div class="row">
  <!-- disciplinary_form -->
  <div class="col-md-12">
    <div class="col-md-6">
      <div id="disciplinary_form_main" class="dm-uploader p-5 text-center">
         <h3 class="mb-5 mt-5 text-muted">Drag &amp; drop Your disciplinary form here</h3>
         <div class="btn btn-primary mb-5">
            <span>Open the file Browser</span>
            <input type="hidden" name="disciplinary_form" id="disciplinary_form" value="">
            <input type="file" name="ids_img" title='Click to add Files' />
         </div>
         <div class="">  
            <ul class="list-unstyled p-2 d-flex flex-column col" id="files">
               <li class="text-muted text-center empty">No files uploaded.</li>
            </ul>
         </div>
      </div>
    </div>
    <div class="col-md-6">
      <?php
      if(isset($edit)) {
         if($edit['disciplinary_form'] != '' && $edit['disciplinary_form'] != 'null'  ) {
            $editImages_disciplinary_form = json_decode($edit['disciplinary_form'],true);
            ?>
            <div class="row">
            <?php            
            foreach ($editImages_disciplinary_form as $img_key => $image) {
               if(file_exists($assets.$image)) {
               ?>
               <div class="col-md-3 delete_<?= $sr_img ?>">
                  <span class="multi_delete" data-value="<?= $sr_img ?>" ><i class="fa fa-trash" ></i></span>
                  <img src="<?php echo base_url().$assets.'/'.$image; ?>" class="img img-responsive" alt="Photos" height="50px">
               </div>
               <?php
               }
            $sr_img++;
            }
            ?>
            </div>
         <?php
         }
      }
      ?>
    </div>
  </div>
</div>






<div class="box-footer">
    <input type="submit" class="btn btn-primary" value="Submit" />
    <!-- <input type="reset" class="btn btn-default" value="Reset" /> -->
</div>
<script type="text/javascript">
  $(".multi_delete").on("click",function(){
    var did = $(this).attr('data-value');
    $(".delete_"+did).remove();
    console.log("delete_"+did);
  });

$(function(){

  /* multiple */
  $('#achievements_main').dmUploader({ //
     url: '<?= base_url(ADMIN.$Controller.'/upload_files'); ?>',
     maxFileSize: 30000000, // 3 Megs max
     multiple: true,
     allowedTypes: '*',
     content: 'application/json',
     //extFilter: ['jpg','png','jpeg'],
     onDragEnter: function(){
        // Happens when dragging something over the DnD area
        this.addClass('active');
     },
     onDragLeave: function(){
        // Happens when dragging something OUT of the DnD area
        this.removeClass('active');
     },
     onInit: function(){
        // Plugin is ready to use
        ui_add_log('Penguin initialized :)', 'info');
        //this.find('input[type="text"]').val('');
     },
     onComplete: function(){
        // All files in the queue are processed (success or error)
        ui_add_log('All pending tranfers finished');
     },
     onNewFile: function(id, file){
        // When a new file is added using the file selector or the DnD area
        ui_add_log('New file added #' + id);
        if (typeof FileReader !== "undefined"){
           var reader = new FileReader();
           var img = this.find('img');
           reader.onload = function (e) {
               img.attr('src', e.target.result);
           }
           reader.readAsDataURL(file);
        }
        ui_multi_add_file(id, file, this);
     },
     onBeforeUpload: function(id){
        // about tho start uploading a file
        ui_add_log('Starting the upload of #' + id);
        /*ui_single_update_progress(this, 0, true);      
        ui_single_update_active(this, true);
        ui_single_update_status(this, 'Uploading...');*/
        ui_multi_update_file_progress(id, 0, '', true);
        ui_multi_update_file_status(id, 'uploading', 'Uploading...');
     },
     onUploadProgress: function(id, percent){
        // Updating file progress
        /*ui_single_update_progress(this, percent);*/
        ui_multi_update_file_progress(id, percent);
     },
     onUploadSuccess: function(id, data) {
        $(id).find('.status').html('');
        var customData = jQuery.parseJSON(data);
        // console.log(customData.path);
        var response = JSON.stringify(data);
        // A file was successfully uploaded
        ui_add_log('Server Response for file #' + id + ': ' + response);
        ui_add_log('Upload of file #' + id + ' COMPLETED', 'success');
        /*ui_single_update_active(this, false);*/
        // You should probably do something with the response data, we just show it
        // this.find('input[type="text"]').val(customData.path);
        let bulletinImagesVal = $('#achievements').val();
        let newArr = [];
        if(bulletinImagesVal != '') {
           // console.log(bulletinImagesVal);
           newArr = jQuery.parseJSON(bulletinImagesVal);
           newArr.push(customData.path);
        }
        else {
           newArr.push(customData.path);
        }
        newArr = JSON.stringify(newArr);
        console.log(newArr);
        $('#achievements').val(newArr);
        /*ui_single_update_status(this, 'Upload completed.', 'success');*/
        ui_multi_update_file_status(id, 'success', 'Upload Complete');
        ui_multi_update_file_progress(id, 100, 'success', false);
     },
     onUploadError: function(id, xhr, status, message){
        // Happens when an upload error happens
        /*ui_single_update_active(this, false);
        ui_single_update_status(this, 'Error: ' + message, 'danger');*/
        ui_multi_update_file_status(id, 'danger', message);
        ui_multi_update_file_progress(id, 0, 'danger', false);
     },
     onFallbackMode: function(){
        // When the browser doesn't support this plugin :(
        ui_add_log('Plugin cant be used here, running Fallback callback', 'danger');
     },
     onFileSizeError: function(file){
        ui_single_update_status(this, 'File excess the size limit', 'danger');
        ui_add_log('File \'' + file.name + '\' cannot be added: size excess limit', 'danger');
     },
     onFileTypeError: function(file){
        ui_single_update_status(this, 'Please Select Image Only', 'danger');
        ui_add_log('File \'' + file.name + '\' cannot be added: must be an image (type error)', 'danger');
     },
     onFileExtError: function(file){
        ui_single_update_status(this, 'Please Select Image Only', 'danger');
        ui_add_log('File \'' + file.name + '\' cannot be added: must be an image (extension error)', 'danger');
     }
  });

  $('#ids_main').dmUploader({ //
     url: '<?= base_url(ADMIN.$Controller.'/upload_files'); ?>',
     maxFileSize: 30000000, // 3 Megs max
     multiple: true,
     allowedTypes: '*',
     content: 'application/json',
     //extFilter: ['jpg','png','jpeg'],
     onDragEnter: function(){
        // Happens when dragging something over the DnD area
        this.addClass('active');
     },
     onDragLeave: function(){
        // Happens when dragging something OUT of the DnD area
        this.removeClass('active');
     },
     onInit: function(){
        // Plugin is ready to use
        ui_add_log('Penguin initialized :)', 'info');
        //this.find('input[type="text"]').val('');
     },
     onComplete: function(){
        // All files in the queue are processed (success or error)
        ui_add_log('All pending tranfers finished');
     },
     onNewFile: function(id, file){
        // When a new file is added using the file selector or the DnD area
        ui_add_log('New file added #' + id);
        if (typeof FileReader !== "undefined"){
           var reader = new FileReader();
           var img = this.find('img');
           reader.onload = function (e) {
               img.attr('src', e.target.result);
           }
           reader.readAsDataURL(file);
        }
        ui_multi_add_file(id, file, this);
     },
     onBeforeUpload: function(id){
        // about tho start uploading a file
        ui_add_log('Starting the upload of #' + id);
        /*ui_single_update_progress(this, 0, true);      
        ui_single_update_active(this, true);
        ui_single_update_status(this, 'Uploading...');*/
        ui_multi_update_file_progress(id, 0, '', true);
        ui_multi_update_file_status(id, 'uploading', 'Uploading...');
     },
     onUploadProgress: function(id, percent){
        // Updating file progress
        /*ui_single_update_progress(this, percent);*/
        ui_multi_update_file_progress(id, percent);
     },
     onUploadSuccess: function(id, data) {
        $(id).find('.status').html('');
        var customData = jQuery.parseJSON(data);
        // console.log(customData.path);
        var response = JSON.stringify(data);
        // A file was successfully uploaded
        ui_add_log('Server Response for file #' + id + ': ' + response);
        ui_add_log('Upload of file #' + id + ' COMPLETED', 'success');
        /*ui_single_update_active(this, false);*/
        // You should probably do something with the response data, we just show it
        // this.find('input[type="text"]').val(customData.path);
        let bulletinImagesVal = $('#ids').val();
        let newArr = [];
        if(bulletinImagesVal != '') {
           // console.log(bulletinImagesVal);
           newArr = jQuery.parseJSON(bulletinImagesVal);
           newArr.push(customData.path);
        }
        else {
           newArr.push(customData.path);
        }
        newArr = JSON.stringify(newArr);
        console.log(newArr);
        $('#ids').val(newArr);
        /*ui_single_update_status(this, 'Upload completed.', 'success');*/
        ui_multi_update_file_status(id, 'success', 'Upload Complete');
        ui_multi_update_file_progress(id, 100, 'success', false);
     },
     onUploadError: function(id, xhr, status, message){
        // Happens when an upload error happens
        /*ui_single_update_active(this, false);
        ui_single_update_status(this, 'Error: ' + message, 'danger');*/
        ui_multi_update_file_status(id, 'danger', message);
        ui_multi_update_file_progress(id, 0, 'danger', false);
     },
     onFallbackMode: function(){
        // When the browser doesn't support this plugin :(
        ui_add_log('Plugin cant be used here, running Fallback callback', 'danger');
     },
     onFileSizeError: function(file){
        ui_single_update_status(this, 'File excess the size limit', 'danger');
        ui_add_log('File \'' + file.name + '\' cannot be added: size excess limit', 'danger');
     },
     onFileTypeError: function(file){
        ui_single_update_status(this, 'Please Select Image Only', 'danger');
        ui_add_log('File \'' + file.name + '\' cannot be added: must be an image (type error)', 'danger');
     },
     onFileExtError: function(file){
        ui_single_update_status(this, 'Please Select Image Only', 'danger');
        ui_add_log('File \'' + file.name + '\' cannot be added: must be an image (extension error)', 'danger');
     }
  });

  $('#sss_main').dmUploader({ //
     url: '<?= base_url(ADMIN.$Controller.'/upload_files'); ?>',
     maxFileSize: 30000000, // 3 Megs max
     multiple: true,
     allowedTypes: '*',
     content: 'application/json',
     //extFilter: ['jpg','png','jpeg'],
     onDragEnter: function(){
        // Happens when dragging something over the DnD area
        this.addClass('active');
     },
     onDragLeave: function(){
        // Happens when dragging something OUT of the DnD area
        this.removeClass('active');
     },
     onInit: function(){
        // Plugin is ready to use
        ui_add_log('Penguin initialized :)', 'info');
        //this.find('input[type="text"]').val('');
     },
     onComplete: function(){
        // All files in the queue are processed (success or error)
        ui_add_log('All pending tranfers finished');
     },
     onNewFile: function(id, file){
        // When a new file is added using the file selector or the DnD area
        ui_add_log('New file added #' + id);
        if (typeof FileReader !== "undefined"){
           var reader = new FileReader();
           var img = this.find('img');
           reader.onload = function (e) {
               img.attr('src', e.target.result);
           }
           reader.readAsDataURL(file);
        }
        ui_multi_add_file(id, file, this);
     },
     onBeforeUpload: function(id){
        // about tho start uploading a file
        ui_add_log('Starting the upload of #' + id);
        /*ui_single_update_progress(this, 0, true);      
        ui_single_update_active(this, true);
        ui_single_update_status(this, 'Uploading...');*/
        ui_multi_update_file_progress(id, 0, '', true);
        ui_multi_update_file_status(id, 'uploading', 'Uploading...');
     },
     onUploadProgress: function(id, percent){
        // Updating file progress
        /*ui_single_update_progress(this, percent);*/
        ui_multi_update_file_progress(id, percent);
     },
     onUploadSuccess: function(id, data) {
        $(id).find('.status').html('');
        var customData = jQuery.parseJSON(data);
        // console.log(customData.path);
        var response = JSON.stringify(data);
        // A file was successfully uploaded
        ui_add_log('Server Response for file #' + id + ': ' + response);
        ui_add_log('Upload of file #' + id + ' COMPLETED', 'success');
        /*ui_single_update_active(this, false);*/
        // You should probably do something with the response data, we just show it
        // this.find('input[type="text"]').val(customData.path);
        let bulletinImagesVal = $('#sss').val();
        let newArr = [];
        if(bulletinImagesVal != '') {
           // console.log(bulletinImagesVal);
           newArr = jQuery.parseJSON(bulletinImagesVal);
           newArr.push(customData.path);
        }
        else {
           newArr.push(customData.path);
        }
        newArr = JSON.stringify(newArr);
        console.log(newArr);
        $('#sss').val(newArr);
        /*ui_single_update_status(this, 'Upload completed.', 'success');*/
        ui_multi_update_file_status(id, 'success', 'Upload Complete');
        ui_multi_update_file_progress(id, 100, 'success', false);
     },
     onUploadError: function(id, xhr, status, message){
        // Happens when an upload error happens
        /*ui_single_update_active(this, false);
        ui_single_update_status(this, 'Error: ' + message, 'danger');*/
        ui_multi_update_file_status(id, 'danger', message);
        ui_multi_update_file_progress(id, 0, 'danger', false);
     },
     onFallbackMode: function(){
        // When the browser doesn't support this plugin :(
        ui_add_log('Plugin cant be used here, running Fallback callback', 'danger');
     },
     onFileSizeError: function(file){
        ui_single_update_status(this, 'File excess the size limit', 'danger');
        ui_add_log('File \'' + file.name + '\' cannot be added: size excess limit', 'danger');
     },
     onFileTypeError: function(file){
        ui_single_update_status(this, 'Please Select Image Only', 'danger');
        ui_add_log('File \'' + file.name + '\' cannot be added: must be an image (type error)', 'danger');
     },
     onFileExtError: function(file){
        ui_single_update_status(this, 'Please Select Image Only', 'danger');
        ui_add_log('File \'' + file.name + '\' cannot be added: must be an image (extension error)', 'danger');
     }
  });

  $('#work_permit_main').dmUploader({ //
     url: '<?= base_url(ADMIN.$Controller.'/upload_files'); ?>',
     maxFileSize: 30000000, // 3 Megs max
     multiple: true,
     allowedTypes: '*',
     content: 'application/json',
     //extFilter: ['jpg','png','jpeg'],
     onDragEnter: function(){
        // Happens when dragging something over the DnD area
        this.addClass('active');
     },
     onDragLeave: function(){
        // Happens when dragging something OUT of the DnD area
        this.removeClass('active');
     },
     onInit: function(){
        // Plugin is ready to use
        ui_add_log('Penguin initialized :)', 'info');
        //this.find('input[type="text"]').val('');
     },
     onComplete: function(){
        // All files in the queue are processed (success or error)
        ui_add_log('All pending tranfers finished');
     },
     onNewFile: function(id, file){
        // When a new file is added using the file selector or the DnD area
        ui_add_log('New file added #' + id);
        if (typeof FileReader !== "undefined"){
           var reader = new FileReader();
           var img = this.find('img');
           reader.onload = function (e) {
               img.attr('src', e.target.result);
           }
           reader.readAsDataURL(file);
        }
        ui_multi_add_file(id, file, this);
     },
     onBeforeUpload: function(id){
        // about tho start uploading a file
        ui_add_log('Starting the upload of #' + id);
        /*ui_single_update_progress(this, 0, true);      
        ui_single_update_active(this, true);
        ui_single_update_status(this, 'Uploading...');*/
        ui_multi_update_file_progress(id, 0, '', true);
        ui_multi_update_file_status(id, 'uploading', 'Uploading...');
     },
     onUploadProgress: function(id, percent){
        // Updating file progress
        /*ui_single_update_progress(this, percent);*/
        ui_multi_update_file_progress(id, percent);
     },
     onUploadSuccess: function(id, data) {
        $(id).find('.status').html('');
        var customData = jQuery.parseJSON(data);
        // console.log(customData.path);
        var response = JSON.stringify(data);
        // A file was successfully uploaded
        ui_add_log('Server Response for file #' + id + ': ' + response);
        ui_add_log('Upload of file #' + id + ' COMPLETED', 'success');
        /*ui_single_update_active(this, false);*/
        // You should probably do something with the response data, we just show it
        // this.find('input[type="text"]').val(customData.path);
        let bulletinImagesVal = $('#work_permit').val();
        let newArr = [];
        if(bulletinImagesVal != '') {
           // console.log(bulletinImagesVal);
           newArr = jQuery.parseJSON(bulletinImagesVal);
           newArr.push(customData.path);
        }
        else {
           newArr.push(customData.path);
        }
        newArr = JSON.stringify(newArr);
        console.log(newArr);
        $('#work_permit').val(newArr);
        /*ui_single_update_status(this, 'Upload completed.', 'success');*/
        ui_multi_update_file_status(id, 'success', 'Upload Complete');
        ui_multi_update_file_progress(id, 100, 'success', false);
     },
     onUploadError: function(id, xhr, status, message){
        // Happens when an upload error happens
        /*ui_single_update_active(this, false);
        ui_single_update_status(this, 'Error: ' + message, 'danger');*/
        ui_multi_update_file_status(id, 'danger', message);
        ui_multi_update_file_progress(id, 0, 'danger', false);
     },
     onFallbackMode: function(){
        // When the browser doesn't support this plugin :(
        ui_add_log('Plugin cant be used here, running Fallback callback', 'danger');
     },
     onFileSizeError: function(file){
        ui_single_update_status(this, 'File excess the size limit', 'danger');
        ui_add_log('File \'' + file.name + '\' cannot be added: size excess limit', 'danger');
     },
     onFileTypeError: function(file){
        ui_single_update_status(this, 'Please Select Image Only', 'danger');
        ui_add_log('File \'' + file.name + '\' cannot be added: must be an image (type error)', 'danger');
     },
     onFileExtError: function(file){
        ui_single_update_status(this, 'Please Select Image Only', 'danger');
        ui_add_log('File \'' + file.name + '\' cannot be added: must be an image (extension error)', 'danger');
     }
  });

  $('#parental_permission_main').dmUploader({ //
     url: '<?= base_url(ADMIN.$Controller.'/upload_files'); ?>',
     maxFileSize: 30000000, // 3 Megs max
     multiple: true,
     allowedTypes: '*',
     content: 'application/json',
     //extFilter: ['jpg','png','jpeg'],
     onDragEnter: function(){
        // Happens when dragging something over the DnD area
        this.addClass('active');
     },
     onDragLeave: function(){
        // Happens when dragging something OUT of the DnD area
        this.removeClass('active');
     },
     onInit: function(){
        // Plugin is ready to use
        ui_add_log('Penguin initialized :)', 'info');
        //this.find('input[type="text"]').val('');
     },
     onComplete: function(){
        // All files in the queue are processed (success or error)
        ui_add_log('All pending tranfers finished');
     },
     onNewFile: function(id, file){
        // When a new file is added using the file selector or the DnD area
        ui_add_log('New file added #' + id);
        if (typeof FileReader !== "undefined"){
           var reader = new FileReader();
           var img = this.find('img');
           reader.onload = function (e) {
               img.attr('src', e.target.result);
           }
           reader.readAsDataURL(file);
        }
        ui_multi_add_file(id, file, this);
     },
     onBeforeUpload: function(id){
        // about tho start uploading a file
        ui_add_log('Starting the upload of #' + id);
        /*ui_single_update_progress(this, 0, true);      
        ui_single_update_active(this, true);
        ui_single_update_status(this, 'Uploading...');*/
        ui_multi_update_file_progress(id, 0, '', true);
        ui_multi_update_file_status(id, 'uploading', 'Uploading...');
     },
     onUploadProgress: function(id, percent){
        // Updating file progress
        /*ui_single_update_progress(this, percent);*/
        ui_multi_update_file_progress(id, percent);
     },
     onUploadSuccess: function(id, data) {
        $(id).find('.status').html('');
        var customData = jQuery.parseJSON(data);
        // console.log(customData.path);
        var response = JSON.stringify(data);
        // A file was successfully uploaded
        ui_add_log('Server Response for file #' + id + ': ' + response);
        ui_add_log('Upload of file #' + id + ' COMPLETED', 'success');
        /*ui_single_update_active(this, false);*/
        // You should probably do something with the response data, we just show it
        // this.find('input[type="text"]').val(customData.path);
        let bulletinImagesVal = $('#parental_permission').val();
        let newArr = [];
        if(bulletinImagesVal != '') {
           // console.log(bulletinImagesVal);
           newArr = jQuery.parseJSON(bulletinImagesVal);
           newArr.push(customData.path);
        }
        else {
           newArr.push(customData.path);
        }
        newArr = JSON.stringify(newArr);
        console.log(newArr);
        $('#parental_permission').val(newArr);
        /*ui_single_update_status(this, 'Upload completed.', 'success');*/
        ui_multi_update_file_status(id, 'success', 'Upload Complete');
        ui_multi_update_file_progress(id, 100, 'success', false);
     },
     onUploadError: function(id, xhr, status, message){
        // Happens when an upload error happens
        /*ui_single_update_active(this, false);
        ui_single_update_status(this, 'Error: ' + message, 'danger');*/
        ui_multi_update_file_status(id, 'danger', message);
        ui_multi_update_file_progress(id, 0, 'danger', false);
     },
     onFallbackMode: function(){
        // When the browser doesn't support this plugin :(
        ui_add_log('Plugin cant be used here, running Fallback callback', 'danger');
     },
     onFileSizeError: function(file){
        ui_single_update_status(this, 'File excess the size limit', 'danger');
        ui_add_log('File \'' + file.name + '\' cannot be added: size excess limit', 'danger');
     },
     onFileTypeError: function(file){
        ui_single_update_status(this, 'Please Select Image Only', 'danger');
        ui_add_log('File \'' + file.name + '\' cannot be added: must be an image (type error)', 'danger');
     },
     onFileExtError: function(file){
        ui_single_update_status(this, 'Please Select Image Only', 'danger');
        ui_add_log('File \'' + file.name + '\' cannot be added: must be an image (extension error)', 'danger');
     }
  });

  $('#parental_permission_main').dmUploader({ //
     url: '<?= base_url(ADMIN.$Controller.'/upload_files'); ?>',
     maxFileSize: 30000000, // 3 Megs max
     multiple: true,
     allowedTypes: '*',
     content: 'application/json',
     //extFilter: ['jpg','png','jpeg'],
     onDragEnter: function(){
        // Happens when dragging something over the DnD area
        this.addClass('active');
     },
     onDragLeave: function(){
        // Happens when dragging something OUT of the DnD area
        this.removeClass('active');
     },
     onInit: function(){
        // Plugin is ready to use
        ui_add_log('Penguin initialized :)', 'info');
        //this.find('input[type="text"]').val('');
     },
     onComplete: function(){
        // All files in the queue are processed (success or error)
        ui_add_log('All pending tranfers finished');
     },
     onNewFile: function(id, file){
        // When a new file is added using the file selector or the DnD area
        ui_add_log('New file added #' + id);
        if (typeof FileReader !== "undefined"){
           var reader = new FileReader();
           var img = this.find('img');
           reader.onload = function (e) {
               img.attr('src', e.target.result);
           }
           reader.readAsDataURL(file);
        }
        ui_multi_add_file(id, file, this);
     },
     onBeforeUpload: function(id){
        // about tho start uploading a file
        ui_add_log('Starting the upload of #' + id);
        /*ui_single_update_progress(this, 0, true);      
        ui_single_update_active(this, true);
        ui_single_update_status(this, 'Uploading...');*/
        ui_multi_update_file_progress(id, 0, '', true);
        ui_multi_update_file_status(id, 'uploading', 'Uploading...');
     },
     onUploadProgress: function(id, percent){
        // Updating file progress
        /*ui_single_update_progress(this, percent);*/
        ui_multi_update_file_progress(id, percent);
     },
     onUploadSuccess: function(id, data) {
        $(id).find('.status').html('');
        var customData = jQuery.parseJSON(data);
        // console.log(customData.path);
        var response = JSON.stringify(data);
        // A file was successfully uploaded
        ui_add_log('Server Response for file #' + id + ': ' + response);
        ui_add_log('Upload of file #' + id + ' COMPLETED', 'success');
        /*ui_single_update_active(this, false);*/
        // You should probably do something with the response data, we just show it
        // this.find('input[type="text"]').val(customData.path);
        let bulletinImagesVal = $('#parental_permission').val();
        let newArr = [];
        if(bulletinImagesVal != '') {
           // console.log(bulletinImagesVal);
           newArr = jQuery.parseJSON(bulletinImagesVal);
           newArr.push(customData.path);
        }
        else {
           newArr.push(customData.path);
        }
        newArr = JSON.stringify(newArr);
        console.log(newArr);
        $('#parental_permission').val(newArr);
        /*ui_single_update_status(this, 'Upload completed.', 'success');*/
        ui_multi_update_file_status(id, 'success', 'Upload Complete');
        ui_multi_update_file_progress(id, 100, 'success', false);
     },
     onUploadError: function(id, xhr, status, message){
        // Happens when an upload error happens
        /*ui_single_update_active(this, false);
        ui_single_update_status(this, 'Error: ' + message, 'danger');*/
        ui_multi_update_file_status(id, 'danger', message);
        ui_multi_update_file_progress(id, 0, 'danger', false);
     },
     onFallbackMode: function(){
        // When the browser doesn't support this plugin :(
        ui_add_log('Plugin cant be used here, running Fallback callback', 'danger');
     },
     onFileSizeError: function(file){
        ui_single_update_status(this, 'File excess the size limit', 'danger');
        ui_add_log('File \'' + file.name + '\' cannot be added: size excess limit', 'danger');
     },
     onFileTypeError: function(file){
        ui_single_update_status(this, 'Please Select Image Only', 'danger');
        ui_add_log('File \'' + file.name + '\' cannot be added: must be an image (type error)', 'danger');
     },
     onFileExtError: function(file){
        ui_single_update_status(this, 'Please Select Image Only', 'danger');
        ui_add_log('File \'' + file.name + '\' cannot be added: must be an image (extension error)', 'danger');
     }
  });

  $('#disciplinary_form_main').dmUploader({ //
     url: '<?= base_url(ADMIN.$Controller.'/upload_files'); ?>',
     maxFileSize: 30000000, // 3 Megs max
     multiple: true,
     allowedTypes: '*',
     content: 'application/json',
     //extFilter: ['jpg','png','jpeg'],
     onDragEnter: function(){
        // Happens when dragging something over the DnD area
        this.addClass('active');
     },
     onDragLeave: function(){
        // Happens when dragging something OUT of the DnD area
        this.removeClass('active');
     },
     onInit: function(){
        // Plugin is ready to use
        ui_add_log('Penguin initialized :)', 'info');
        //this.find('input[type="text"]').val('');
     },
     onComplete: function(){
        // All files in the queue are processed (success or error)
        ui_add_log('All pending tranfers finished');
     },
     onNewFile: function(id, file){
        // When a new file is added using the file selector or the DnD area
        ui_add_log('New file added #' + id);
        if (typeof FileReader !== "undefined"){
           var reader = new FileReader();
           var img = this.find('img');
           reader.onload = function (e) {
               img.attr('src', e.target.result);
           }
           reader.readAsDataURL(file);
        }
        ui_multi_add_file(id, file, this);
     },
     onBeforeUpload: function(id){
        // about tho start uploading a file
        ui_add_log('Starting the upload of #' + id);
        /*ui_single_update_progress(this, 0, true);      
        ui_single_update_active(this, true);
        ui_single_update_status(this, 'Uploading...');*/
        ui_multi_update_file_progress(id, 0, '', true);
        ui_multi_update_file_status(id, 'uploading', 'Uploading...');
     },
     onUploadProgress: function(id, percent){
        // Updating file progress
        /*ui_single_update_progress(this, percent);*/
        ui_multi_update_file_progress(id, percent);
     },
     onUploadSuccess: function(id, data) {
        $(id).find('.status').html('');
        var customData = jQuery.parseJSON(data);
        // console.log(customData.path);
        var response = JSON.stringify(data);
        // A file was successfully uploaded
        ui_add_log('Server Response for file #' + id + ': ' + response);
        ui_add_log('Upload of file #' + id + ' COMPLETED', 'success');
        /*ui_single_update_active(this, false);*/
        // You should probably do something with the response data, we just show it
        // this.find('input[type="text"]').val(customData.path);
        let bulletinImagesVal = $('#disciplinary_form').val();
        let newArr = [];
        if(bulletinImagesVal != '') {
           // console.log(bulletinImagesVal);
           newArr = jQuery.parseJSON(bulletinImagesVal);
           newArr.push(customData.path);
        }
        else {
           newArr.push(customData.path);
        }
        newArr = JSON.stringify(newArr);
        console.log(newArr);
        $('#disciplinary_form').val(newArr);
        /*ui_single_update_status(this, 'Upload completed.', 'success');*/
        ui_multi_update_file_status(id, 'success', 'Upload Complete');
        ui_multi_update_file_progress(id, 100, 'success', false);
     },
     onUploadError: function(id, xhr, status, message){
        // Happens when an upload error happens
        /*ui_single_update_active(this, false);
        ui_single_update_status(this, 'Error: ' + message, 'danger');*/
        ui_multi_update_file_status(id, 'danger', message);
        ui_multi_update_file_progress(id, 0, 'danger', false);
     },
     onFallbackMode: function(){
        // When the browser doesn't support this plugin :(
        ui_add_log('Plugin cant be used here, running Fallback callback', 'danger');
     },
     onFileSizeError: function(file){
        ui_single_update_status(this, 'File excess the size limit', 'danger');
        ui_add_log('File \'' + file.name + '\' cannot be added: size excess limit', 'danger');
     },
     onFileTypeError: function(file){
        ui_single_update_status(this, 'Please Select Image Only', 'danger');
        ui_add_log('File \'' + file.name + '\' cannot be added: must be an image (type error)', 'danger');
     },
     onFileExtError: function(file){
        ui_single_update_status(this, 'Please Select Image Only', 'danger');
        ui_add_log('File \'' + file.name + '\' cannot be added: must be an image (extension error)', 'danger');
     }
  });


});

</script>
<!-- File item template -->
<script type="text/html" id="files-template">
   <li class="media">
      <hr class="mt-1 mb-1" />
      <div class="media-body mb-1">
         <p class="mb-2">
            <strong>%%filename%%</strong> - Status: <span class="text-muted">Waiting</span>
         </p>
         <div class="progress mb-2">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
         </div>
      </div>
   </li>
</script>