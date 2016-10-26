<?php

class Sub_category extends Backend_Controller {

    function __construct() {
        parent::__construct();


       
        
        if (!$this->ion_auth->logged_in() || !$this->crud_model->admin_permission('category')) {
            redirect('auth', 'refresh');
        }
        /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->crud_model->ip_data();
    }

    /* Product Sub-category add, edit, view, delete */

    function index() {

        $this->data['all_sub_category'] = $this->db->get('sub_category')->result_array();
        $this->data['title'] = "Type";
        $this->render();        
    }

    function add() {
        $this->load->library('form_validation');
        $this->render();
    }

    function edit($para1) {
        $this->load->library('form_validation');
        $this->data['sub_category_data'] = $this->db->get_where('sub_category', array(
                    'sub_category_id' => $para1
                ))->result_array();
        $this->render();
        //$this->load->view('back/admin/category_edit', $page_data);
    }

    function update($para1) {
        $data['sub_category_name'] = $this->input->post('sub_category_name');        
        $this->db->where('sub_category_id', $para1);
        $this->db->update('sub_category', $data);
        redirect(base_url() . 'index.php/admin/sub_category/', 'refresh');
        recache();
    }

    function do_add() {
        $data['sub_category_name'] = $this->input->post('sub_category_name');        
        $this->db->insert('sub_category', $data);
        recache();
    }

    function lists() {
        $this->db->order_by('sub_category_id', 'desc');
        $this->data['all_sub_category'] = $this->db->get('sub_category')->result_array();
        $this->render();
    }

    function delete($para1) {
        $this->db->where('sub_category_id', $para1);
        $this->db->delete('sub_category');
        recache();
    }

}
