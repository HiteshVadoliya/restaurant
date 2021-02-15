<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class CategoryController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->table = "category";   
        $this->id = "cat_id";  
        $this->MainTitle = "Category";
        $this->folder = "category/"; 
        $this->Controller = "CategoryController"; 
    }

    function index()
    {
        if($this->isAdmin() == TRUE) { $this->loadThis(); } else
        {     
            $data['MainTitle'] = $this->MainTitle;
            $data['Controller'] = $this->Controller;
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
            $this->global['pageTitle'] = ' : '.ucfirst($data['type']).' '.$data['MainTitle'];
            $this->loadViews(ADMIN.$this->folder."Form", $this->global, $data, NULL);
        }   
    }
    
    public function ajax_list()
    {
        $columns = array(0=>'title');
        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $param['limit'] = array($start,$limit);
        $param['search_column'] = array("cat_id","title","status");
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];
      
        $wh = array("isDelete"=>0);
        $totalData = $this->HWT->get_num_rows($this->table,$wh);
        
            $totalFiltered = $totalData; 
            if(empty($this->input->post('search')['value']))
            {            
                $posts = $this->HWT->get_hwt($this->table,"*",$wh,$param);
            }
            else {
                $search = $this->input->post('search')['value']; 
                $param['search'] = $search;
                $posts =  $this->HWT->get_hwt($this->table,"*",$wh,$param);
                
                $param['limit'] = "";
                $totalFiltered = count($this->HWT->get_hwt($this->table,"*",$wh,$param));
            }

            $data = array();
            if(!empty($posts))
            {
                foreach ($posts as $post)
                {
                    $statuslbl = $post['status'] == '1' ? 'Active' : 'Deactive';
                    $statusColor = $post['status'] == '1' ? 'success' : 'danger';
                    $nestedData['title'] = $post['title'];

                    $img_name = $post['img_src'];
                    if($img_name!='' && file_exists(IMG_SRC.$img_name)) {
                        $pre_img = APP_URL.IMG_SRC.$img_name;
                    } else {
                        $pre_img = APP_URL.IMG_SRC.DEFAULT_BANNER_IMG;
                    }
                    $nestedData['img_src'] = '<img src='.$pre_img.' title='.$post['title'].' alt='.$post['title'].' height="150" >';
                    
                    $nestedData['action'] = '<button data-id='.$post[$this->id].' class="btn btn-sm btn-danger rowDelete"><i class="fa fa-trash"></i></button>
                    <a href='.ADMIN_LINK.'category/edit/'.$post[$this->id].' data-id='.$post[$this->id].' class="btn btn-sm btn-info " ><i class="fa fa-pencil"></i></a>
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
            
            $this->form_validation->set_rules('title','Title Name','trim|required');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->showForm();
            }
            else
            {
                $type = $this->input->post('type');
                $title = ucwords($this->input->post('title'));
                $DataInfo = array(
                    'title'=>$title,
                );
                if( !empty($_FILES["img_src"]["name"]) ){

                    $config['upload_path']              = IMG_SRC;
                    
                    $config['allowed_types']        = 'jpg|jpeg|png|gif';
                    
                    $this->load->library('upload', $config);
                    
                    if($this->upload->do_upload('img_src'))
                    {
                        $upload_data = $this->upload->data();
                        $filename = $upload_data['file_name']; 
                        $DataInfo['img_src'] = $filename;
                    }else{
                        $this->session->set_flashdata('error', 'Media Source not uploaded..!');
                        redirect(ADMIN_LINK.$this->url);                        
                    }
                }
                if($type == "add"){                    
                    $DataInfo['created_at'] = date('Y-m-d H:i:s');
                    $DataInfo['status'] = '1';
                    $result = $this->HWT->insert($this->table,$DataInfo);
                }
                if($type == "edit"){

                    $old_img = $this->input->post('old_img');
                    if($old_img!='' && file_exists(IMG_SRC.$old_img)) {
                        $pre_old_img = IMG_SRC.$old_img;
                        @unlink($pre_old_img);
                    }

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
                redirect(ADMIN_LINK."category");
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