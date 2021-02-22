<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Employee extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/login_model');
        $this->table = "users_details";
        $this->isLoggedIn();   
        $this->id = "userId";  
        $this->MainTitle = " Employee";
        $this->folder = "employee/";
        $this->Controller = "Employee";
        $this->url = "employee"; 
    }

    function index()
    {
        $data['MainTitle'] = $this->MainTitle;
        $data['Controller'] = $this->Controller;
        $data['url'] = $this->url;
        $data['restaurant'] = $this->gr->get_restaurant();

        $this->global['pageTitle'] = ' : Manage '.$data['MainTitle'];
        $this->loadViews(ADMIN.$this->folder."Manage", $this->global, $data, NULL);
        //$this->load->view(ADMIN.$this->folder."Register", $data);
        
    }

    
    public function showForm( $user_type = '', $id = '' ) {
        $this->isLoggedIn();

        if($this->isAdmin() == TRUE) { $this->loadThis(); } else
        {
            $data['type'] = "add";
            $data['restaurant'] = $this->gr->get_restaurant();
            unset($data['roles'][0]);
            if($id!='') {
                $data['type'] = "edit";
                
                $params = array();

                $tbl = array("tbl_users as user","users_details as details");
                $join = array('user.userId = details.user_id');
                $where_array = array(
                    "user.isDelete"=>0,
                    "details.isDelete"=>0,
                    "user.userId" =>$id,
                );

                $posts = $this->HWT->hwt_join_1( $tbl,$join,$rows="*",$where_array,$params );
                $data['edit'] = $posts[0];
                $data['roleName'] = $this->HWT->get_column("tbl_roles","role", array( "roleId" => $data['edit']['roleId'] ));
            }
            $data['MainTitle'] = $this->MainTitle;
            $data['tbl_id'] = $this->id;
            $data['url'] = $this->url;  
            $this->global['pageTitle'] = ' : '.ucfirst($data['type']).' '.$data['MainTitle'];
            $this->loadViews(ADMIN.$this->folder."FormUser", $this->global, $data, NULL);
        }   
    }

    public function showView($id = '') {
        $this->isLoggedIn();
        if($this->isAdmin() == TRUE) { $this->loadThis(); } else
        {
            if($id!='') {
                $data['type'] = "View";

                $params = array();

                $tbl = array("tbl_users as user","users_details as details");
                $join = array('user.userId = details.user_id');
                $where_array = array(
                    "user.isDelete"=>0,
                    "details.isDelete"=>0,
                    "user.userId" =>$id,
                );

                $posts = $this->HWT->hwt_join_1( $tbl,$join,$rows="*",$where_array,$params );
                $data['view'] = $posts[0];
                $data['roleName'] = $this->HWT->get_column("tbl_roles","role", array( "roleId" => $data['view']['roleId'] ));
            } else {                
                $this->session->set_flashdata('error', 'Something Went Wrong..!');
                redirect(ADMIN_LINK.$this->url);
            }
            $data['MainTitle'] = $this->MainTitle;
            $data['tbl_id'] = $this->id;
            $data['url'] = $this->url;  
            $this->global['pageTitle'] = ' : '.ucfirst($data['type']).' '.$data['MainTitle'];
            $this->loadViews(ADMIN.$this->folder."View", $this->global, $data, NULL);
        }   
    }
    
  
    function saveEmployee() {
        
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
        
            
        $type = $this->input->post('type');
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
            $redirect_url = 'employee/add/employee';
        }


        
        if($type == "edit"){

            $editid = $this->input->post('editid'); 
            $DataInfo['updated_at'] = date('Y-m-d H:i:s');
            $editid = $this->input->post('editid'); 
            $result = $this->HWT->update('tbl_users',$DataInfo,array('userId'=>$editid));

            $last_user_id = $editid;

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
                //$DataInfoDetails['user_id'] = $last_user_id;
                $result = $this->HWT->update('users_details',$DataInfoDetails, array('user_id'=>$last_user_id));
                $response['status'] = 'success';
                $response['msg'] = 'Updated Successfully';
            

            } else {
                $response['status'] = 'error';
                $response['msg'] = 'Something Went wrong...!';
            }
            $redirect_url = 'employee/edit/employee/'.$editid;
        }

        
        $this->session->set_flashdata($response['status'], $response['msg']); 
        redirect(ADMIN_LINK.$redirect_url);
        
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

}
?>