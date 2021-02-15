<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Sitesetting extends BaseController
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/SiteSetting_model');
        $this->isLoggedIn();   
    }

    function index()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {      
            $result = $this->SiteSetting_model->getSiteSetting();
            $data["siteSetting"] = $result[0];
            $this->global['pageTitle'] = ' : Site Setting';
            $this->loadViews(ADMIN."SiteSetting", $this->global, $data, NULL);
        }
    }

   
    function store()
    {
        
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('site_name','Site Name Name','trim|required');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->index();
            }
            else
            { 
                

                $settingInfo = array(
                        'site_name'=>$this->input->post('site_name'),
                        'site_title'=>$this->input->post('site_title'),
                        'meta_tag'=>$this->input->post('meta_tag'),
                        'meta_keyword'=>$this->input->post('meta_keyword'),
                        'meta_description'=>$this->input->post('meta_description'),
                        'fb_link'=>$this->input->post('fb_link'),
                        'instagram_link'=>$this->input->post('instagram_link'),
                        'map_embeded'=>$this->input->post('map_embeded'),
                        'email'=>$this->input->post('email'),
                        'address'=>$this->input->post('address'),
                        'phone'=>$this->input->post('phone'),
                        'longitude'=>$this->input->post('longitude'),
                        'paypal_username'=>$this->input->post('paypal_username'),
                        'paypal_password'=>$this->input->post('paypal_password'),
                        'paypal_sign'=>$this->input->post('paypal_sign'),
                        'updated_at'=>date('Y-m-d H:i:s')
                        );
               
                $config['upload_path']          = 'public/front/images/logo';
                $config['allowed_types']        = '*';
                $config['max_size']             = 1000;

                $this->load->library('upload', $config);                
                if ( $this->upload->do_upload('site_logo'))
                {
                    $data = array('upload_data' => $this->upload->data());
                    $site_logo_name = $data['upload_data']['file_name'];
                    $settingInfo["site_logo"] = $site_logo_name;
                    
                }
                if ( $this->upload->do_upload('site_favicon'))
                {
                    $data = array('upload_data' => $this->upload->data());
                    $site_logo_name = $data['upload_data']['file_name'];
                    $settingInfo["site_favicon"] = $site_logo_name;
                    
                }
                $result = $this->SiteSetting_model->storeSiteSetting($settingInfo);
              
              
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Site Setting Update successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Site Setting Update failed');
                }
                
                redirect(ADMIN.'sitesetting');
            }
            
        }

    }

   
}

?>