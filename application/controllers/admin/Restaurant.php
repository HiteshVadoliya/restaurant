<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Restaurant extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->table = "restaurant";   
        $this->id = "restaurant_id";  
        $this->MainTitle = " Restaurant";
        $this->folder = "restaurant/";
        $this->Controller = "Restaurant";
        $this->url = "restaurant"; 
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
            $data['admin'] = $this->HWT->get_result("tbl_users","*",array("isDelete"=>0,"status"=>1,"roleId" => ROLE_ADMIN));
            $data['manager'] =$this->HWT->get_result("tbl_users","*",array("isDelete"=>0,"status"=>1,"roleId" => ROLE_MANAGER));
            $data['weekday'] = $this->gr->get_weeks();
            if($id!='') {
                $data['type'] = "edit";
                $data['edit'] = $this->HWT->get_one_row($this->table,"*",array($this->id=>$id,"isDelete"=>0));
            }
            $data['MainTitle'] = $this->MainTitle;
            $data['tbl_id'] = $this->id;
            $data['url'] = $this->url;  
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
                $data['admin_name'] = $this->HWT->get_column('tbl_users',"name",array( "userId" => $data['view']['res_admin_id'] ));
                
                $data['manager_name'] = $this->HWT->get_column('tbl_users',"name",array( "userId" => $data['view']['res_manager_id'] ));
                $weekday = $this->gr->get_weeks( $data['view']['res_start_day'] );
                $data['startday'] = $weekday[0]['day_name'];
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
    
    public function ajax_list()
    {
        
        $columns = array(0=>'res_name',1=>'res_owner_name',2=>'res_email',"3"=>'res_phone');
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $param['limit'] = array($start,$limit);
        $param['search_column'] = array("res_name","res_owner_name","res_email","res_phone");
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];
      
        $wh = array("isDelete"=>0);

        
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
                 
                $nestedData['res_name'] = $post['res_name'];                   
                $nestedData['res_owner_name'] = $post['res_owner_name'];                   
                $nestedData['res_email'] = $post['res_email'];                   
                $nestedData['res_phone'] = $post['res_phone'];                   
                
                
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
            $this->form_validation->set_rules('res_name','Name','trim|required');
            $this->form_validation->set_rules('res_owner_name','Owner Name','trim|required');
            $this->form_validation->set_rules('res_admin_id','Admin','trim|required');
            $this->form_validation->set_rules('res_manager_id','Manager','trim|required');
            $this->form_validation->set_rules('res_phone','Phone','trim|required');
            $this->form_validation->set_rules('res_email','Email','trim|required');
            $this->form_validation->set_rules('res_minmum_wages','Wages','trim|required');
            $this->form_validation->set_rules('res_start_day','Day','trim|required');
            $this->form_validation->set_rules('res_hours','Hours','trim|required');
            $this->form_validation->set_rules('res_address','address','trim|required');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->showForm();
            }
            else
            {
                $post = $this->input->post();
                $type = $this->input->post('type');
                $res_name               = isset($post['res_name']) ? $post['res_name'] : '';
                $res_owner_name         = isset($post['res_owner_name']) ? $post['res_owner_name'] : '';
                $res_admin_id           = isset($post['res_admin_id']) ? $post['res_admin_id'] : '';
                $res_manager_id         = isset($post['res_manager_id']) ? $post['res_manager_id'] : '';
                $res_phone              = isset($post['res_phone']) ? $post['res_phone'] : '';
                $res_email              = isset($post['res_email']) ? $post['res_email'] : '';
                $res_minmum_wages       = isset($post['res_minmum_wages']) ? $post['res_minmum_wages'] : '';
                $res_start_day          = isset($post['res_start_day']) ? $post['res_start_day'] : '';
                $res_hours              = isset($post['res_hours']) ? $post['res_hours'] : '';
                $res_address            = isset($post['res_address']) ? $post['res_address'] : '';

                

                $DataInfo = array(
                    'res_name' => $res_name,
                    'res_owner_name' => $res_owner_name,
                    'res_admin_id' => $res_admin_id,
                    'res_manager_id' => $res_manager_id,
                    'res_phone' => $res_phone,
                    'res_email' => $res_email,
                    'res_minmum_wages' => $res_minmum_wages,
                    'res_start_day' => $res_start_day,
                    'res_hours' => $res_hours,
                    'res_address' => $res_address,
                );
                $DataInfo['createdBy'] = $this->session->userId;

                
                if( !empty($_FILES["res_pictures"]["name"]) ){

                    $config['upload_path']              = IMG_RESTAURANT;                    
                    $config['allowed_types']            = '*';
                    
                    $this->load->library('upload', $config);
                    if($this->upload->do_upload('res_pictures'))
                    {
                        $upload_data = $this->upload->data();
                        $filename = $upload_data['file_name']; 
                        $DataInfo['res_pictures'] = $filename;                         
                    }
                }

                if( !empty($_FILES["res_licence"]["name"]) ){

                    $config['upload_path']              = IMG_RESTAURANT;                    
                    $config['allowed_types']            = '*';
                    
                    $this->load->library('upload', $config);
                    if($this->upload->do_upload('res_licence'))
                    {
                        $upload_data = $this->upload->data();
                        $filename = $upload_data['file_name']; 
                        $DataInfo['res_licence'] = $filename;                         
                    }
                }

                if( !empty($_FILES["res_permit"]["name"]) ){

                    $config['upload_path']              = IMG_RESTAURANT;                    
                    $config['allowed_types']            = '*';
                    
                    $this->load->library('upload', $config);
                    if($this->upload->do_upload('res_permit'))
                    {
                        $upload_data = $this->upload->data();
                        $filename = $upload_data['file_name']; 
                        $DataInfo['res_permit'] = $filename;                         
                    }
                }

               

                if($type == "add"){
                    $DataInfo['created_at'] = date('Y-m-d H:i:s');
                    $DataInfo['status'] = '1';
                    $result = $this->HWT->insert($this->table,$DataInfo);
                }
               
                if($type == "edit"){

                    $editid = $this->input->post('editid'); 
                    $DataInfo['updated_at'] = date('Y-m-d H:i:s');
                    $DataInfo['updatedBy'] = $this->session->userId;
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