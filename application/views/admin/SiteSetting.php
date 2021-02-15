<div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Site Setting</h3>
                        </div>


                        <div class="col-md-12">
                            <?php if(validation_errors()){ ?>
                                <div class="alert alert-danger alert-dismissable">
                                <?php  echo validation_errors(); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                            <?php } ?>
                        
                          <?php $success = $this->session->flashdata('success');
                            if($success){?>
                              <div class="alert alert-success alert-dismissable">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                  <?php echo $this->session->flashdata('success'); ?>
                              </div>
                          <?php } ?>
                        </div>
                        

                        <!-- /.box-header -->
                        <!-- form start -->
                         <form action="<?php echo ADMIN_LINK; ?>sitesetting\store" id="form-slider" class="" role="form" method="POST"  enctype="multipart/form-data">
                            
                          <div class="box-body col-md-9 col-md-offset-1">
                              <div class="form-group row">
                                <div class="col-sm-3">
                                    <label for="exampleInputEmail1">Site Name</label>
                                </div>
                                <div class="col-sm-9">
                                  <input type="text" name="site_name" class="form-control" id="site_name" 
                                  value="<?php echo $siteSetting->site_name; ?>" placeholder="Site Name">
                                </div>
                              </div>

                              <div class="form-group row">
                                <div class="col-sm-3">
                                    <label for="exampleInputEmail1">Site Title</label>
                                </div>
                                <div class="col-sm-9">
                                  <input type="text" name="site_title" class="form-control" id="site_title" 
                                  value="<?php echo $siteSetting->site_title; ?>" placeholder="Site Name">
                                </div>
                              </div>
                              
                              <div class="form-group row">
                                <div class="col-sm-3">
                                  <label for="exampleInputFile">Site Logo</label>
                                </div>
                                <div class="col-sm-9">                                         
                                    <input type="file" name="site_logo" id="site_logo" class="validate[filesize[1]]">
                                    <img class="img-responsive img-thumbnail" src="<?php echo base_url('public/front/images/logo/'.$siteSetting->site_logo.' ');?>" style=" height: 50px;">
                                  
                                </div>
                              </div>

                              <div class="form-group row">
                                <div class="col-sm-3">
                                  <label for="exampleInputFile">Site Favicon</label>
                                </div>
                                <div class="col-sm-9">
                                  <input type="file" name="site_favicon" id="site_favicon" class="validate[filesize[1]]">
                                    <img class="img-responsive img-thumbnail" src="<?php echo base_url('public/front/images/logo/'.$siteSetting->site_favicon.' ');?>" style=" height: 50px;">
                                </div>
                              </div>


                              

                           

                              <div class="form-group row">
                                <div class="col-sm-3">
                                  <label for="exampleInputEmail1">Meta Tag</label>
                                </div>
                                <div class="col-sm-9">
                                  <input type="text" name="meta_tag" class="form-control" id="exampleInputEmail1" value="<?php echo $siteSetting->meta_tag; ?>" placeholder="Meta Tag">
                                </div>
                              </div>

                              <div class="form-group row">
                                <div class="col-sm-3">
                                  <label for="exampleInputEmail1">Meta Keyword</label>
                                </div>
                                <div class="col-sm-9">  
                                  <input type="text" name="meta_keyword" class="form-control" id="exampleInputEmail1" value="<?php echo $siteSetting->site_title; ?>" placeholder="Meta Keyword">
                                </div>
                              </div>

                              <div class="form-group row">
                                <div class="col-sm-3">
                                  <label for="exampleInputEmail1">Meta Description</label>
                                </div>
                                <div class="col-sm-9">
                                 <textarea class="form-control" name="meta_description" rows="3" placeholder="Description..."><?php echo $siteSetting->meta_description; ?></textarea>
                                </div>
                              </div>

                              <div class="form-group row">
                                <div class="col-sm-3">
                                  <label for="exampleInputEmail1"><button class="btn btn-primary btn-xs"><i class="fa fa-facebook"></i></button> Facebook Link 
                                  </label>
                                </div>
                                <div class="col-sm-9">
                                  <input type="text" name="fb_link" value="<?php echo $siteSetting->fb_link; ?>" class="form-control" id="fb_link" placeholder="Facebook Link">
                                </div>
                              </div>

                              <div class="form-group row">
                                <div class="col-sm-3">
                                  <label for="exampleInputEmail1"><button class="btn btn-primary btn-xs"><i class="fa fa-instagram"></i></button> Instagram Link 
                                  </label>
                                </div>
                                <div class="col-sm-9">
                                  <input type="text" name="instagram_link" value="<?php echo $siteSetting->instagram_link; ?>" class="form-control" id="instagram_link" placeholder="Facebook Link">
                                </div>
                              </div>

                            
                              <div class="form-group row">
                                <div class="col-sm-3">
                                  <label for="exampleInputEmail1">Map (embeded code)</label>
                                </div>
                                <div class="col-sm-9">
                                   <textarea class="form-control" id="map_embeded" name="map_embeded" rows="3" placeholder="Map (embeded code)..."  ><?php echo $siteSetting->map_embeded; ?></textarea>
                                </div>
                              </div>
                           

                              <div class="form-group row">
                                <div class="col-sm-3">
                                  <label for="exampleInputEmail1">Email</label>
                                </div>
                                <div class="col-sm-9">
                                  <input type="text" name="email" class="form-control" id="email" value="<?php echo $siteSetting->email; ?>" placeholder="Email">
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="col-sm-3">
                                  <label for="exampleInputEmail1">Address</label>
                                </div>
                                <div class="col-sm-9">
                                  <textarea  name="address" placeholder="Address" class="form-control" id="address"><?php echo $siteSetting->address; ?></textarea>
                                </div>
                              </div>

                              <div class="form-group row">
                                <div class="col-sm-3">
                                  <label for="exampleInputEmail1">Phone</label>
                                </div>
                                <div class="col-sm-9">
                                  <textarea  name="phone" id="phone" placeholder="Phone" class="form-control" id="address"><?php echo $siteSetting->phone; ?></textarea>
                                </div>
                              </div>


                              <div class="form-group row">
                                <div class="col-sm-3">
                                  <label for="exampleInputEmail1">latitude</label>
                                </div>
                                <div class="col-sm-9">
                                  <input type="text" name="latitude" class="form-control" id="latitude" value="<?php echo $siteSetting->latitude; ?>" placeholder="latitude">
                                </div>
                              </div>


                              <div class="form-group row">
                                <div class="col-sm-3">
                                  <label for="exampleInputEmail1">longitude</label>
                                </div>
                                <div class="col-sm-9">
                                  <input type="text" name="longitude" class="form-control" id="longitude" value="<?php echo $siteSetting->longitude; ?>" placeholder="Longitude">
                                </div>
                              </div>

                              <!-- paypal detail start -->
                              <hr>
                              <div class="form-group row">
                                <div class="col-sm-3">
                                  <label for="exampleInputEmail1">Paypal Username</label>
                                </div>
                                <div class="col-sm-9">
                                  <input type="text" name="paypal_username" class="form-control" id="latitude" value="<?php echo $siteSetting->paypal_username; ?>" placeholder="Paypal Username">
                                </div>
                              </div>


                              <div class="form-group row">
                                <div class="col-sm-3">
                                  <label for="exampleInputEmail1">Paypal Password</label>
                                </div>
                                <div class="col-sm-9">
                                  <input type="text" name="paypal_password" class="form-control" id="longitude" value="<?php echo $siteSetting->paypal_password; ?>" placeholder="Paypal Password">
                                </div>
                              </div>

                              <div class="form-group row">
                                <div class="col-sm-3">
                                  <label for="exampleInputEmail1">Paypal Sign</label>
                                </div>
                                <div class="col-sm-9">
                                  <input type="text" name="paypal_sign" class="form-control" id="longitude" value="<?php echo $siteSetting->paypal_sign; ?>" placeholder="Paypal Signature">
                                </div>
                              </div>
                              <!-- paypal detail end -->

                              <div class="form-group row">
                                <div class="col-sm-3">
                                  <label for="exampleInputEmail1">&nbsp;</label>
                                </div>
                                <div class="col-sm-9">
                                   <button type="submit" class="btn btn-primary">Submit</button> 
                                </div>
                              </div>
                           
                          </div>
                        <!-- /.box-body -->

              <div class="box-footer">
                
              </div>
            </form>





















                        
                    </div>

                </div>
            </div>
        </section>
    </div>





    <!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script>
    $(document).ready(function() {

        $('#address1').summernote({
            toolbar:[

              ['style', ['bold', 'italic', 'underline']],              
              ['fontsize', ['fontsize']],
              
            ]
        });
      
        $('#address1').summernote();
    });
  </script>