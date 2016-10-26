<?php

class Site_settings extends Backend_Controller {

    function __construct() {
        parent::__construct();

        
        /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->crud_model->ip_data();
        if (!$this->ion_auth->logged_in() || !$this->crud_model->admin_permission('site_settings')) {    
            
            redirect(base_url().'auth/login', 'refresh');
        }
    }

    /* Product Category add, edit, view, delete */

    function index($para1 = 'general_settings') {
        
        $this->data['title'] = "site_settings";
         $this->load->library('form_validation');
         $this->data['tab_name']  = $para1;
        $this->render();
    }
    

}
