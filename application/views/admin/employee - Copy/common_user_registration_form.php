<div class="row">
  <div class="col-md-6">
        <h3 for="title">Details</h3>
        <div class="form-group">
            <label for="title">Select Restaurant</label>
            <select name="multi_task_ids[]" id="multi_task_ids" class="form-control" class="selectpicker form-control" multiple data-live-search="true" data-placeholder="Select a state"  data-allow-clear="true">
                <option disabled="">-- Select Restaurant --</option>
                <option value="0">All</option>
                <?php
                foreach ($restaurant as $res_key => $res) {
                    $sel = '';
                    if(isset($edit)) {
                        //$sel = ($edit['roleId']==$role['roleId']) ? 'selected' : '';
                        echo $sel = $this->HWT->hwt_selected( $res['restaurant_id'] , $edit['multi_task_ids'] );
                    }
                    ?><option <?= $sel ?> value="<?= $res['restaurant_id'] ?>" ><?= $res['res_name'] ?></option><?php
                }
                ?>
            </select>
            <span class="multi_task_ids"></span>
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
        <div class="form-group">
            <label for="title">Social Security Number</label>
            <input type="text" class="form-control required" value="<?php if(isset($edit) && $edit['social_security_number']!='' ) { echo $edit['social_security_number']; } else { set_value('social_security_number'); } ?>" id="social_security_number" name="social_security_number" >
        </div>
        <div class="form-group">
            <label for="title">Work Eligibility</label>
            <input type="text" class="form-control required" value="<?php if(isset($edit) && $edit['work_eligibility']!='' ) { echo $edit['work_eligibility']; } else { set_value('work_eligibility'); } ?>" id="work_eligibility" name="work_eligibility" >
        </div>
        <div class="form-group">
            <label for="title">Transformation</label>
            <input type="text" class="form-control required" value="<?php if(isset($edit) && $edit['transformation']!='' ) { echo $edit['transformation']; } else { set_value('transformation'); } ?>" id="transformation" name="transformation" >
        </div>
        <div class="form-group">
            <label for="title">Information on criminal or felony convictions</label>
            <input type="text" class="form-control required" value="<?php if(isset($edit) && $edit['criminal']!='' ) { echo $edit['criminal']; } else { set_value('criminal'); } ?>" id="criminal" name="criminal" >
        </div>
        <div class="form-group">
            <label for="title">School(s) attended</label>
            <input type="text" class="form-control required" value="<?php if(isset($edit) && $edit['school_attended']!='' ) { echo $edit['school_attended']; } else { set_value('school_attended'); } ?>" id="school_attended" name="school_attended" >
        </div>
        <div class="form-group">
            <label for="title">Degrees Obtained</label>
            <input type="text" class="form-control required" value="<?php if(isset($edit) && $edit['degrees_obtained']!='' ) { echo $edit['degrees_obtained']; } else { set_value('degrees_obtained'); } ?>" id="degrees_obtained" name="degrees_obtained" >
        </div>
        <div class="form-group has-feedback">
            <label for="title">Date of Birth</label>
            <input autocomplete="off" type="text" class="form-control required datepicker" value="<?php if(isset($edit) && $edit['dob']!='' ) { echo $this->gr->display_date_formate( $edit['dob'] ); } else { echo date('d-m-Y'); } ?>" id="dob" name="dob"  >
            <span class="glyphicon glyphicon-time form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            <label for="title">Graduation Date</label>
            <input autocomplete="off" type="text" class="form-control required datepicker" value="<?php if(isset($edit) && $edit['graduation_date']!='' ) { echo $this->gr->display_date_formate( $edit['graduation_date'] ); } else { echo date('d-m-Y'); } ?>" id="graduation_date" name="graduation_date"  >
            <span class="glyphicon glyphicon-time form-control-feedback"></span>
        </div>

        <div class="form-group">
            <label for="title">skills</label>
            <input name="skills" id="skills" class=" tagsinput_text_ tags" type="text" value="<?= (isset($edit) && !empty($edit['skills'])) ? $edit['skills'] : '';  ?>" data-role="tagsinput" style="display: none;" />
        </div>

        <div class="form-group">
             <label for="title">Extra Curricular Activities</label>
             <textarea rows="5" class="form-control required" id="extracurricular_activities" name="extracurricular_activities" ><?php if(isset($edit) && $edit['extracurricular_activities']!='' ) { echo strip_tags($edit['extracurricular_activities']); } else { set_value('extracurricular_activities'); } ?></textarea>
        </div>
        <div class="form-group">
             <label for="title">address</label>
             <textarea rows="5" class="form-control required" id="address" name="address" ><?php if(isset($edit) && $edit['address']!='' ) { echo strip_tags($edit['address']); } else { set_value('address'); } ?></textarea>
        </div>
  </div>
  <div class="col-md-6">
        <h3 for="title">Previous Employer Details</h3>
        <div class="form-group">
            <label for="title">Previous Employer Names</label>
            <input type="text" class="form-control required" value="<?php if(isset($edit) && $edit['previous_employer_names']!='' ) { echo $edit['previous_employer_names']; } else { set_value('previous_employer_names'); } ?>" id="previous_employer_names" name="previous_employer_names" >
        </div>
        <div class="form-group">
            <label for="title">Previous Contact Information</label>
            <input type="text" class="form-control required" value="<?php if(isset($edit) && $edit['previous_contact_information']!='' ) { echo $edit['previous_contact_information']; } else { set_value('previous_contact_information'); } ?>" id="previous_contact_information" name="previous_contact_information" >
        </div>
        <div class="form-group">
            <label for="title">Previous Employer Titles</label>
            <input type="text" class="form-control required" value="<?php if(isset($edit) && $edit['previous_titles']!='' ) { echo $edit['previous_titles']; } else { set_value('previous_titles'); } ?>" id="previous_titles" name="previous_titles" >
        </div>

        <div class="form-group">
             <label for="title">Previous Responsibilities</label>
             <textarea rows="5" class="form-control required" id="previous_responsibilities" name="previous_responsibilities" ><?php if(isset($edit) && $edit['previous_responsibilities']!='' ) { echo strip_tags($edit['previous_responsibilities']); } else { set_value('previous_responsibilities'); } ?></textarea>
        </div>
        <div class="form-group">
             <label for="title">Reasons for Leaving</label>
             <textarea rows="5" class="form-control required" id="reasons_for_leaving" name="reasons_for_leaving" ><?php if(isset($edit) && $edit['reasons_for_leaving']!='' ) { echo strip_tags($edit['reasons_for_leaving']); } else { set_value('reasons_for_leaving'); } ?></textarea>
        </div>
        <div class="form-group">
            <label for="title">Previous Employer contact Permission</label>
            <select name="previous_permission_to_contact" id="previous_permission_to_contact" class="form-control">
                <option value="">-- Select Permission --</option>
                <option value="1">Yes</option>
                <option value="0">No</option>                          
            </select>
        </div>

        <div class="form-group">
            <label for="title">References</label>
            <input type="text" class="form-control required" value="<?php if(isset($edit) && $edit['references']!='' ) { echo $edit['references']; } else { set_value('references'); } ?>" id="references" name="references" >
        </div>

        <div class="form-group">
             <label for="title">suggestions</label>
             <textarea rows="5" class="form-control required" id="open_for_suggestions" name="open_for_suggestions" ><?php if(isset($edit) && $edit['open_for_suggestions']!='' ) { echo strip_tags($edit['open_for_suggestions']); } else { set_value('open_for_suggestions'); } ?></textarea>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary custom_submit">Submit</button>
        </div>
        
    </div>
</div>