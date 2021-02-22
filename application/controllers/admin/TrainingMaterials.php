<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class TrainingMaterials extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->table = "training_materials";   
        $this->id = "id";  
        $this->MainTitle = " Training Materials";
        $this->folder = "training_materials/";
        $this->Controller = "TrainingMaterials";
        $this->url = "training_materials";
        $this->assets = IMG_TRAINING_MATERIALS; 
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
        
        $columns = array(0=>'title',1=>'description',);
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $param['limit'] = array($start,$limit);
        $param['search_column'] = array("title","description");
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
                 
                $nestedData['title'] = $post['title'];                   
                $nestedData['description'] = nl2br($post['description']);                   
                
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
            $this->form_validation->set_rules('title','Name','trim|required');
            $this->form_validation->set_rules('description','Notes','trim|required');
            
            
            if($this->form_validation->run() == FALSE)
            {
                $this->showForm();
            }
            else
            {
                $post = $this->input->post();
                $type = $this->input->post('type');
                $title               = isset($post['title']) ? $post['title'] : '';
                $description         = isset($post['description']) ? $post['description'] : '';
                

                $DataInfo = array(
                    'title' => $title,
                    'description' => $description,
                );
                $DataInfo['createdBy'] = $this->session->userId;

                
                if( !empty($_FILES["img_src"]["name"]) ){

                    $config['upload_path']              = $this->assets;                    
                    $config['allowed_types']            = '*';
                    
                    $this->load->library('upload', $config);
                    if($this->upload->do_upload('img_src'))
                    {
                        $upload_data = $this->upload->data();
                        $filename = $upload_data['file_name']; 
                        $DataInfo['img_src'] = $filename;                         
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