<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Employee extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/login_model');
        $this->table = "tbl_users";
        $this->isLoggedIn();   
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
        $this->loadViews(ADMIN.$this->folder."Manage", $this->global, $data, NULL);
        //$this->load->view(ADMIN.$this->folder."Register", $data);
        
    }

    function EmployeeRegister()
    {
        $data['MainTitle'] = $this->MainTitle;
        $data['Controller'] = $this->Controller;
        $data['url'] = $this->url;
        $data['restaurant'] = $this->gr->get_restaurant();

        $this->global['pageTitle'] = ' : Manage '.$data['MainTitle'];
        // $this->loadViews(ADMIN.$this->folder."Manage", $this->global, $data, NULL);
        $this->load->view(ADMIN.$this->folder."Register", $data);
        
    }

    
    public function showForm( $id = '' ) {
        
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
            $data['Controller'] = $this->Controller;
            $data['assets'] = $this->assets;
            $this->global['pageTitle'] = ' : '.ucfirst($data['type']).' '.$data['MainTitle'];
            $this->loadViews(ADMIN.$this->folder."Form", $this->global, $data, NULL);
        }   
    }

    public function showView($id = '') {
        $this->load->helper('string');
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

                $posts = $this->HWT->hwt_join_1( $tbl,$join,$rows="*, user.status as user_status ",$where_array,$params );
                $data['view'] = $posts[0];
                $data['roleName'] = $this->HWT->get_column("tbl_roles","role", array( "roleId" => $data['view']['roleId'] ));
            } else {                
                $this->session->set_flashdata('error', 'Something Went Wrong..!');
                redirect(ADMIN_LINK.$this->url);
            }
            $data['MainTitle'] = $this->MainTitle;
            $data['tbl_id'] = $this->id;
            $data['url'] = $this->url;  
            $data['Controller'] = $this->Controller;
            $this->global['pageTitle'] = ' : '.ucfirst($data['type']).' '.$data['MainTitle'];
            $this->loadViews(ADMIN.$this->folder."View", $this->global, $data, NULL);
        }   
    }
    
  
    function save() {
        
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
        redirect(ADMIN_LINK.$this->url);
        
    }

    function saveFront()
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
        echo json_encode($response);
    }
    
    public function ajax_list()
    {
        $user_type = $this->input->post('user_type');
        $columns = array(0=>'email',1=>'name',2=>'mobile');
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $param['limit'] = array($start,$limit);
        $param['search_column'] = array("email","name","mobile");
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];
      
        $wh = array("isDelete"=>0,"roleId !=" => 1);
        $wh['roleId'] = 5;
        
        $user_role_Name = '';
        
        $totalData = $this->HWT->get_num_rows($this->table,$wh);        
        $totalFiltered = $totalData; 
        
        $search = $this->input->post('search')['value']; 
        $param['search'] = $search;
        $posts =  $this->HWT->get_hwt($this->table,"*",$wh,$param);                
        $param['limit'] = "";
        $totalFiltered = count($this->HWT->get_hwt($this->table,"*",$wh,$param));
    
        
        $data = array();
        
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                
                $statuslbl = $post['status'] == '1' ? 'Active' : 'Deactive';
                $statusColor = $post['status'] == '1' ? 'success' : 'danger';
                 
                $nestedData['email'] = $post['email'];                   
                $nestedData['name'] = $post['name'];
                $nestedData['mobile'] = $post['mobile'];
                $all_roles = $this->gr->get_roles( $post['roleId'] );
                $nestedData['role'] = $all_roles[0]['role']; 
                
                
                $nestedData['action'] = '<button data-id='.$post[$this->id].' class="btn btn-sm btn-danger rowDelete"><i class="fa fa-trash"></i></button>
                <a href='.ADMIN_LINK.$this->url.'/edit/'.$post[$this->id].' data-id='.$post[$this->id].' class="btn btn-sm btn-info " ><i class="fa fa-pencil"></i></a>
                <a href='.ADMIN_LINK.$this->url.'/view/'.$post[$this->id].' data-id='.$post[$this->id].' class="btn btn-sm btn-info " ><i class="fa fa-eye"></i></a>
                <button data-id='.$post[$this->id].' data-status='.$post['status'].' class="btn btn-sm btn-'.$statusColor.' rowStatus" >'.$statuslbl.'</button>';
                $data[] = $nestedData;
            }
        }              
        $json_data = array(
                    "draw"            => intval($this->input->post('draw')),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );                
        echo json_encode($json_data);
    }

    function delete()
    {
        if($this->isAdmin() == TRUE) { $this->loadThis(); } else
        {            
            $data['tbl'] = $this->table;
            $data['id'] = $this->id;
            $data['did'] = $this->input->post('id');
            
            $result = $this->HWT->hwt_delete($data);
            if ($result > 0) { 
                echo(json_encode(array('status'=>TRUE))); 
            }
            else { 
                echo(json_encode(array('status'=>FALSE))); 
            }
        }
    }

    function changeStatus()
    {
        if($this->isAdmin() == TRUE) { $this->loadThis(); } else
        {
            $data['tbl'] = $this->table;
            $data['id'] = $this->id;
            $data['editid'] = $this->input->post('id');
            $data['status'] = $this->input->post('status');
            $result =  $this->HWT->changeStatus($data);            
            if ($result > 0) { 
                echo(json_encode(array('status'=>TRUE))); 
            }
            else { 
                echo(json_encode(array('status'=>FALSE))); 
            }
        }
    }

    function send_an_active( ) {
             
        /* hwt_mail */

        $password = $this->input->post('password');
        $userId = $this->input->post('userId');
        $login_url = '<a href="'.ADMIN_LINK.'">click here</a>';
        $has_password = getHashedPassword($password);

        $mail_data = array();
        $sitesetting = $this->SiteSetting_model->getSiteSetting();
        $mail_data['site_logo'] = $sitesetting[0]->site_logo;
        $mail_data['site_name'] = $sitesetting[0]->site_name;
        $mail_data['address'] = $sitesetting[0]->address;
        $from_email = FROM_EMAIL;

        $users_details = $this->HWT->get_one_row("tbl_users","*", array( "userId" => $userId ) );

        $update = array(
            'password' => $has_password,
            'status' => 1,
        );
        $wh = array( "userId" => $userId );
        $this->HWT->update( 'tbl_users', $update, $wh );


        $subject = "Your Registration is Confirmed. Please Login";

        $inner_html = '<table border="0" class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Arial, sans-serif; margin: 0 auto; padding: 0; text-align: center; width: 570px;">';
        $inner_html .= '<tr>
            <td class="content-cell" align="left" style="box-sizing: border-box; font-family: Arial, sans-serif; padding: 5px; word-break: break-word;" colspan="2">
              This is your registration confiramation
            </td>
          </tr>
          <tr>
            <td class="content-cell" align="left" style="box-sizing: border-box; font-family: Arial, sans-serif; padding: 5px; word-break: break-word;">
              Name: -
            </td>
            <td class="content-cell" align="left" style="box-sizing: border-box; font-family: Arial, sans-serif; padding: 5px; word-break: break-word;">
              '.$users_details["name"].'
            </td>
          </tr>
          <tr>
            <td class="content-cell" align="left" style="box-sizing: border-box; font-family: Arial, sans-serif; padding: 5px; word-break: break-word;">
              Email :-
            </td>
            <td class="content-cell" align="left" style="box-sizing: border-box; font-family: Arial, sans-serif; padding: 5px; word-break: break-word;">
              '.$users_details["email"].'
            </td>
          </tr>
          <tr>
            <td class="content-cell" align="left" style="box-sizing: border-box; font-family: Arial, sans-serif; padding: 5px; word-break: break-word;">
              Password :-
            </td>
            <td class="content-cell" align="left" style="box-sizing: border-box; font-family: Arial, sans-serif; padding: 5px; word-break: break-word;">
              '.$password.'
            </td>
          </tr><tr>
            <td class="content-cell" align="left" style="box-sizing: border-box; font-family: Arial, sans-serif; padding: 5px; word-break: break-word;">
              Login :-
            </td>
            <td class="content-cell" align="left" style="box-sizing: border-box; font-family: Arial, sans-serif; padding: 5px; word-break: break-word;">
              '.$login_url.'
            </td>
          </tr>';

        $inner_html .= '</table><br/>';

        $mail_data['inner_html'] = $inner_html;

        $mail_data['user_name'] = $users_details["name"];
        $email = $users_details["email"];
        $message = $this->load->view('mail_template/common_template', $mail_data, TRUE);
        $mail_data_send['to_email'] = $email;
        $mail_data_send['bcc'] = "";
        $mail_data_send['subject'] = $subject;
        
        $mail_data_send['body'] = $message;
        $mail_result = $this->HWT->hwt_send_mail($mail_data_send);

        if( $mail_result ) {
            return true;
        } else {
            return false;
        }
        
    }

    /* Upload Files */
    public function upload_files()
    {
        /*ini_set('upload_max_filesize', '10M');
        ini_set('post_max_size', '10M');*/

        $path = MyPath;
        if(!is_dir($path)) {
            mkdir($path);
        }
        try {
            if (
                !isset($_FILES['file']['error']) ||
                is_array($_FILES['file']['error'])
            ) {
                throw new RuntimeException('Invalid parameters.');
            }

            switch ($_FILES['file']['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new RuntimeException('No file sent.');
                case UPLOAD_ERR_INI_SIZE:
                    throw new RuntimeException('Other Error.');
                case UPLOAD_ERR_FORM_SIZE:
                    throw new RuntimeException('Exceeded filesize limit.');
                default:
                    throw new RuntimeException('Unknown errors.');
            }
            $filename = uniqid().'_'.str_replace(" ", "_hwt_", $_FILES['file']['name']);
            // $filepath = sprintf(MyPath.'%s_%s', uniqid(), $_FILES['file']['name']);
            $filepath = MyPath.$filename;

            if (!move_uploaded_file($_FILES['file']['tmp_name'],$filepath)) {
                throw new RuntimeException('Failed to move uploaded file.');
            }

            // All good, send the response
            $data = array('status' => 'ok','path' => $filename);
            //echo json_encode($data);

        } catch (RuntimeException $e) {
            // Something went wrong, send the err message as JSON
            http_response_code(400);

            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
        echo json_encode($data);
    }


}
?>