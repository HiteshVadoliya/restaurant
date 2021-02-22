<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Manager extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('admin/login_model');
        $this->table = "tbl_users";   
        $this->id = "userId";  
        $this->MainTitle = " Manager";
        $this->folder = "manager/";
        $this->Controller = "Manager";
        $this->url = "manager";
        $this->assets = ''; 
    }

    function index()
    {
        if($this->isAdmin() == TRUE) { $this->loadThis(); } else
        {     
            $data['MainTitle'] = $this->MainTitle;
            $data['Controller'] = $this->Controller;
            $data['url'] = $this->url;
            $this->global['pageTitle'] = ' : Manage '.$data['MainTitle'];
            $this->loadViews(ADMIN.$this->folder."Manage", $this->global, $data, NULL);
        }
    }

    
    public function showForm($id = '') {
        if($this->isAdmin() == TRUE) { $this->loadThis(); } else
        {
            $data['type'] = "add";
            $data['roles'] = $this->gr->get_roles();
            if($id!='') {
                $data['type'] = "edit";
                $data['edit'] = $this->HWT->get_one_row($this->table,"*",array($this->id=>$id,"isDelete"=>0));

            }
            $data['MainTitle'] = $this->MainTitle;
            $data['tbl_id'] = $this->id;
            $data['url'] = $this->url;
            $data['assets']  = $this->assets;
            $this->global['pageTitle'] = ' : '.ucfirst($data['type']).' '.$data['MainTitle'];
            $this->loadViews(ADMIN.$this->folder."Form", $this->global, $data, NULL);
        }   
    }

    public function showView($id = '') {

        if($this->isAdmin() == TRUE) { $this->loadThis(); } else
        {
            if($id!='') {
                $data['type'] = "View";
                $data['view'] = $this->HWT->get_one_row($this->table,"*",array($this->id=>$id,"isDelete"=>0));
                $data['roleName'] = $this->HWT->get_column( "tbl_roles", "role", array( "roleId" => $data['view']['roleId'] ) );
            } else {                
                $this->session->set_flashdata('error', 'Something Went Wrong..!');
                redirect(ADMIN_LINK.$this->url);
            }
            $data['MainTitle'] = $this->MainTitle;
            $data['tbl_id'] = $this->id;
            $data['url'] = $this->url;
            $data['assets']  = $this->assets;
            $this->global['pageTitle'] = ' : '.ucfirst($data['type']).' '.$data['MainTitle'];
            $this->loadViews(ADMIN.$this->folder."View", $this->global, $data, NULL);
        }   
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
        $wh['roleId'] = 3;
        
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

    function save()
    {
        if($this->isAdmin() == TRUE) { $this->loadThis(); } else
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('roleId','role','trim|required');
            $this->form_validation->set_rules('name','name','trim|required');
            $this->form_validation->set_rules('email','email','trim|required');
            $this->form_validation->set_rules('mobile','mobile','trim|required');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->showForm();
            }
            else
            {
                
                $type = $this->input->post('type');
                $roleId   = $this->input->post('roleId');
                $name  = $this->input->post('name');
                $email = $this->security->xss_clean($this->input->post('email'));
                $mobile = $this->input->post('mobile');
                $createdBy = $this->session->userId;
                $password_text = '123456';
                $password = getHashedPassword($password_text);

                $dob = $this->gr->save_date_formate( $this->input->post('dob') );
                $doj = $this->gr->save_date_formate( $this->input->post('doj') );
                

                $DataInfo = array(
                    'roleId'    =>  $roleId,
                    'name'      =>    $name,
                    'email'     =>   $email,
                    'mobile'    =>  $mobile,
                    'createdBy' =>  $createdBy,
                    'password' =>  $password,
                    'dob' =>  $dob,
                    'doj' =>  $doj,
                );

                if( !empty($_FILES["company_policy"]["name"]) ){

                    $config['upload_path']              = COMPANY_POLICY;                    
                    $config['allowed_types']            = '*';
                    
                    $this->load->library('upload', $config);
                    if($this->upload->do_upload('company_policy'))
                    {
                        $upload_data = $this->upload->data();
                        $filename = $upload_data['file_name']; 
                        $DataInfo['company_policy'] = $filename;                         
                    }else{
                        /*$this->session->set_flashdata('error', 'Media Source not uploaded..!');
                        redirect(ADMIN_LINK.$this->url);                        */
                    }
                }

               

                if($type == "add"){
                    if(!$this->login_model->checkEmailExist($email))
                    {
                        $DataInfo['created_at'] = date('Y-m-d H:i:s');
                        $DataInfo['status'] = '1';
                        $result = $this->HWT->insert($this->table,$DataInfo);
                    } else {
                        $this->session->set_flashdata('error', 'This email Already registered..!');
                        redirect(ADMIN_LINK.$this->url);
                    }
                }
               
                if($type == "edit"){

                    $editid = $this->input->post('editid'); 
                    $DataInfo['updated_at'] = date('Y-m-d H:i:s');
                    $editid = $this->input->post('editid'); 
                    $result = $this->HWT->update($this->table,$DataInfo,array($this->id=>$editid));
                }
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Details Add successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Something Went Wrong..!');
                }
                redirect(ADMIN_LINK.$this->url);
            }
        }
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
}
?>