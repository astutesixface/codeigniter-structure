<?php

class Logo_settings extends Backend_Controller {

    function __construct() {
        parent::__construct();


        /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->crud_model->ip_data();
        if (!$this->ion_auth->logged_in() || !$this->crud_model->admin_permission('site_settings')) {

            redirect(base_url() . 'auth/login', 'refresh');
        }
    }

    /* Product Category add, edit, view, delete */

    function index($para1 = '') {

        $this->data['title'] = "site_settings";
        $this->load->library('form_validation');
        $this->data['tab_name'] = $para1;
        $this->render();
    }

    function select_logo() {
        $this->data['page_name'] = "select_logo";
    }

    function delete_logo($para2 = '') {
        if (file_exists("uploads/logo_image/logo_" . $para2 . ".png")) {
            unlink("uploads/logo_image/logo_" . $para2 . ".png");
        }
        $this->db->where('logo_id', $para2);
        $this->db->delete('logo');
        recache();
    }

    function set_logo() {
        $type = $this->input->post('type');
        $logo_id = $this->input->post('logo_id');
        $this->db->where('type', $type);
        $this->db->update('ui_settings', array(
            'value' => $logo_id
        ));
        recache();
    }

    function show_all($para2 = '', $para3 = '') {
        $this->data['logo'] = $this->db->get('logo')->result_array();
        if ($para2 == "") {
        $this->data['para'] = '';    
           // $this->load->view('back/admin/all_logo', $page_data);
        }
        if ($para2 == "selectable") {
            $this->load->library('form_validation');
             $this->data['para'] = 'selectable';  
             $this->data['logo_type'] = $para3;
         //   $this->load->view('back/admin/select_logo', $page_data);
        }
        $this->render();
    }

    function upload_logo() {
        foreach ($_FILES["file"]['name'] as $i => $row) {
            $data['name'] = '';
            $this->db->insert("logo", $data);
            $id = $this->db->insert_id();
            move_uploaded_file($_FILES["file"]['tmp_name'][$i], 'uploads/logo_image/logo_' . $id . '.png');
        }
        return;
    }

}
