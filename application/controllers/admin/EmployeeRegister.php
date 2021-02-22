<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class EmployeeRegister extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/login_model');
        $this->table = "tbl_users";
        $this->id = "userId";  
        $this->MainTitle = " Employee";
        $this->folder = "employee/";
        $this->Controller = "Employee";
        $this->url = "employee";
        $this->assets = IMG_EMPLOYEE_DOC;  
    }

    function index()
    {
        $data['MainTitle'] = $this->MainTitle;
        $data['Controller'] = $this->Controller;
        $data['url'] = $this->url;
        $data['restaurant'] = $this->gr->get_restaurant();
        $this->global['pageTitle'] = ' : Manage '.$data['MainTitle'];
        $this->load->view(ADMIN.$this->folder."Register", $data);        
    }

   
    function save()
    {
        $post = $this->input->post();
        

        $multi_task_ids = $post['multi_task_ids'];
        if(isset($multi_task_ids) && !empty($multi_task_ids))
            { $multi_task_ids = implode(",", $multi_task_ids); 
        } else {
             $multi_task_ids = '';   
        }

        $name                       =   isset($post['name']) ? $post['name'] : '';
        $email                      =   isset($post['email']) ? $post['email'] : '';
        $mobile                     =   isset($post['mobile']) ? $post['mobile'] : '';
        $social_security_number     =   isset($post['social_security_number']) ? $post['social_security_number'] : '';
        $work_eligibility           =   isset($post['work_eligibility']) ? $post['work_eligibility'] : '';
        $transformation             =   isset($post['transformation']) ? $post['transformation'] : '';
        $criminal                   =   isset($post['criminal']) ? $post['criminal'] : '';
        $school_attended            =   isset($post['school_attended']) ? $post['school_attended'] : '';
        $degrees_obtained           =   isset($post['degrees_obtained']) ? $post['degrees_obtained'] : '';
        $dob                        =   isset($post['dob']) ? $post['dob'] : '';
        $graduation_date            =   isset($post['graduation_date']) ? $post['graduation_date'] : '';
        $skills                     =   isset($post['skills']) ? $post['skills'] : '';
        $extracurricular_activities =   isset($post['extracurricular_activities']) ? nl2br($post['extracurricular_activities']) : '';
        $address                    =   isset($post['address']) ? nl2br($post['address']) : '';
        $previous_employer_names    =   isset($post['previous_employer_names']) ? $post['previous_employer_names'] : '';
        $previous_contact_information   =   isset($post['previous_contact_information']) ? $post['previous_contact_information'] : '';
        $previous_titles            =   isset($post['previous_titles']) ? $post['previous_titles'] : '';
        $previous_responsibilities  =   isset($post['previous_responsibilities']) ? nl2br($post['previous_responsibilities']) : '';
        $reasons_for_leaving        =   isset($post['reasons_for_leaving']) ? nl2br($post['reasons_for_leaving']) : '';
        $previous_permission_to_contact     =   isset($post['previous_permission_to_contact']) ? $post['previous_permission_to_contact'] : '';
        $references                 =   isset($post['references']) ? $post['references'] : '';
        $open_for_suggestions       =   isset($post['open_for_suggestions']) ? nl2br($post['open_for_suggestions']) : '';
        
            
        $type = 'add'; //$this->input->post('type');
        $createdBy = 0;
        $password_text = '123456';
        $password = getHashedPassword($password_text);
        $roleId = 5;
        $dob = $this->gr->save_date_formate( $this->input->post('dob') );
        $doj = $this->gr->save_date_formate( $this->input->post('doj') );
        
        $response['status'] = '0';
        $response['msg'] = '0';
        $DataInfo = array(
            'roleId'    =>  $roleId,
            'name'      =>    $name,
            'email'     =>   $email,
            'mobile'    =>  $mobile,
            'createdBy' =>  $createdBy,
            'password' =>  $password,
            'dob' =>  $dob,
            'multi_task_ids' => $multi_task_ids,
        );

        if($type == "add"){
            if(!$this->login_model->checkEmailExist($email))
            {
                $DataInfo['created_at'] = date('Y-m-d H:i:s');
                $DataInfo['status'] = '0';
                $result = $this->HWT->insert('tbl_users',$DataInfo);
                $last_user_id = $this->db->insert_id();

                if($last_user_id) {
                    $DataInfoDetails = array(
                        'social_security_number' => $social_security_number,
                        'work_eligibility' => $work_eligibility,
                        'transformation' => $transformation,
                        'criminal' => $criminal,
                        'school_attended' => $school_attended,
                        'degrees_obtained' => $degrees_obtained,
                        'graduation_date' => $graduation_date,
                        'skills' => $skills,
                        'extracurricular_activities' => $extracurricular_activities,
                        'address' => $address,
                        'previous_employer_names' => $previous_employer_names,
                        'previous_contact_information' => $previous_contact_information,
                        'previous_titles' => $previous_titles,
                        'previous_responsibilities' => $previous_responsibilities,
                        'reasons_for_leaving' => $reasons_for_leaving,
                        'previous_permission_to_contact' => $previous_permission_to_contact,
                        'references' => $references,
                        'open_for_suggestions' => $open_for_suggestions,
                    );
                    $DataInfoDetails['user_id'] = $last_user_id;
                    $result = $this->HWT->insert('users_details',$DataInfoDetails);
                    $last_user_id2 = $this->db->insert_id();
                    if( $last_user_id2 ) {
                        $response['status'] = 'success';
                        $response['msg'] = 'Please check mail. You are registred successfully. we will contact you soon.';
                        @$this->HWT->sendConfirmation($post);
                    } else {
                        $response['status'] = 'error';
                        $response['msg'] = 'Something Went wrong...!';
                    }

                } else {
                    $response['status'] = 'error';
                    $response['msg'] = 'Something Went wrong...!';
                }
            } else {
                $response['status'] = 'error';
                $response['msg'] = 'This email is already registerd';
            }
        }
        
        echo json_encode($response);
        die();
    
    }


    function savePaperWork()
    {

        // echo "<pre>";
        // print_r($_FILES);
        // echo "</pre>";
        
        // $post = $this->input->post();
        // echo "<pre>";
        // print_r($post);
        // echo "</pre>";
        // die();
        $response = array();
        
        $post = $this->input->post();
        $type = $this->input->post('type');
        
        if($type == "add"){
            
            
        }

        if( $type == 'edit' ) {

            $editid = $this->input->post('editid2'); 
            
            if($post['achievements'] != '') {

                $path = $this->assets;
                if(!is_dir($path)) {
                    mkdir($path);
                }
                
                $Images = array();
                $old_achievements_old = $this->HWT->get_column('users_details','achievements',array("user_id"=>$editid)); //$post['old_achievements'];
                
                $achievements = json_decode($post['achievements'], true);
                foreach ($achievements as $key => $value) {
                    $src = MyPath.$value;
                    $dest = $this->assets.$value;
                    @copy($src, $dest);
                    unlink($src);
                }

                if($old_achievements_old != '') {
                    $old_achievements_old = json_decode($old_achievements_old, true);
                    $Images = array_merge($old_achievements_old,$achievements);
                    $Images = json_encode($Images);
                    $DataInfo['achievements'] = $Images;
                }
                else {
                    $DataInfo['achievements'] = $post['achievements'];
                }                
            }

            if($post['ids'] != '') {

                $path = $this->assets;
                if(!is_dir($path)) {
                    mkdir($path);
                }
                
                $Images = array();
                $old_ids_old = $this->HWT->get_column('users_details','ids',array("user_id"=>$editid));

                 //$post['old_ids'];
                
                $ids = json_decode($post['ids'], true);
                foreach ($ids as $key => $value) {
                    $src = MyPath.$value;
                    $dest = $this->assets.$value;
                    @copy($src, $dest);
                    unlink($src);
                }

                if($old_ids_old != '' && $old_ids_old!='null') {
                    $old_ids_old = json_decode($old_ids_old, true);
                    $Images = array_merge($old_ids_old,$ids);
                    $Images = json_encode($Images);
                    $DataInfo['ids'] = $Images;
                }
                else {
                    $DataInfo['ids'] = $post['ids'];
                }                
            }

            if($post['sss'] != '') {

                $path = $this->assets;
                if(!is_dir($path)) {
                    mkdir($path);
                }
                
                $Images = array();
                $old_img_src_old = $this->HWT->get_column('users_details','sss',array("user_id"=>$editid)); //$post['old_ids'];
                
                $sss = json_decode($post['sss'], true);
                foreach ($sss as $key => $value) {
                    $src = MyPath.$value;
                    $dest = $this->assets.$value;
                    @copy($src, $dest);
                    unlink($src);
                }

                if($old_img_src_old != '' && $old_img_src_old != 'null' ) {
                    $old_img_src_old = json_decode($old_img_src_old, true);
                    $Images = array_merge($old_img_src_old,$sss);
                    $Images = json_encode($Images);
                    $DataInfo['sss'] = $Images;
                }
                else {
                    $DataInfo['sss'] = $post['sss'];
                }
            }

            if($post['work_permit'] != '') {

                $path = $this->assets;
                if(!is_dir($path)) {
                    mkdir($path);
                }
                
                $Images = array();
                $old_work_permit_old = $this->HWT->get_column('users_details','work_permit',array("user_id"=>$editid)); //$post['old_ids'];
                
                $work_permit = json_decode($post['work_permit'], true);
                foreach ($work_permit as $key => $value) {
                    $src = MyPath.$value;
                    $dest = $this->assets.$value;
                    @copy($src, $dest);
                    unlink($src);
                }

                if($old_work_permit_old != '' && $old_work_permit_old != 'null' ) {
                    $old_work_permit_old = json_decode($old_work_permit_old, true);
                    $Images = array_merge($old_work_permit_old,$work_permit);
                    $Images = json_encode($Images);
                    $DataInfo['work_permit'] = $Images;
                }
                else {
                    $DataInfo['work_permit'] = $post['work_permit'];
                }                
            }

            if($post['parental_permission'] != '') {

                $path = $this->assets;
                if(!is_dir($path)) {
                    mkdir($path);
                }
                
                $Images = array();
                $old_parental_permission_old = $this->HWT->get_column('users_details','parental_permission',array("user_id"=>$editid)); //$post['old_ids'];
                
                $parental_permission = json_decode($post['parental_permission'], true);
                foreach ($parental_permission as $key => $value) {
                    $src = MyPath.$value;
                    $dest = $this->assets.$value;
                    @copy($src, $dest);
                    unlink($src);
                }

                if($old_parental_permission_old != '' && $old_parental_permission_old != 'null' ) {
                    $old_parental_permission_old = json_decode($old_parental_permission_old, true);
                    $Images = array_merge($old_parental_permission_old,$parental_permission);
                    $Images = json_encode($Images);
                    $DataInfo['parental_permission'] = $Images;
                }
                else {
                    $DataInfo['parental_permission'] = $post['parental_permission'];
                }                
            }

            if($post['disciplinary_form'] != '') {

                $path = $this->assets;
                if(!is_dir($path)) {
                    mkdir($path);
                }
                
                $Images = array();
                $old_disciplinary_form_old = $this->HWT->get_column('users_details','disciplinary_form',array("user_id"=>$editid)); //$post['old_ids'];
                
                $disciplinary_form = json_decode($post['disciplinary_form'], true);
                foreach ($disciplinary_form as $key => $value) {
                    $src = MyPath.$value;
                    $dest = $this->assets.$value;
                    @copy($src, $dest);
                    unlink($src);
                }

                if($old_disciplinary_form_old != '' && $old_disciplinary_form_old != 'null' ) {
                    $old_disciplinary_form_old = json_decode($old_disciplinary_form_old, true);
                    $Images = array_merge($old_disciplinary_form_old,$disciplinary_form);
                    $Images = json_encode($Images);
                    $DataInfo['disciplinary_form'] = $Images;
                }
                else {
                    $DataInfo['disciplinary_form'] = $post['disciplinary_form'];
                }                
            }

            // echo "<pre>";
            // print_r($DataInfo);
            // echo "</pre>";
            
            $DataInfo['updated_at'] = date('Y-m-d H:i:s');
            $result = $this->HWT->update('users_details',$DataInfo,array('user_id'=>$editid));

        }

        // echo $this->db->last_query();
        // die();
        $this->session->set_flashdata('success', 'Data updated successfully');
        redirect(ADMIN_LINK.'employee/edit/'.$editid);
        
        die();
    }

    
}
?>