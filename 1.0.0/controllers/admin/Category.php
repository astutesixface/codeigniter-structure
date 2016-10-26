<?php

class Category extends Backend_Controller {

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

    /* Product Category add, edit, view, delete */
    function index() {
        $this->data['all_categories'] = $this->db->get('category')->result_array();
        $this->data['title'] = "category";
        $this->render();
    }
  function subcategory() {
        $this->data['cat'] = $this->db->get('category')->result_array();
        $this->data['title'] = "subcategory";
        $this->render();
    }
    function add() {
        $this->load->library('form_validation');
        $this->render();
    }

    function edit($para1) {
        $this->load->library('form_validation');
        $this->data['category_data'] = $this->db->get_where('category', array(
                    'category_id' => $para1
                ))->result_array();
        $this->render();      
    }

    function update($para1) {
        $data['category_name'] = $this->input->post('category_name');
        $this->db->where('category_id', $para1);
        $this->db->update('category', $data);
        recache();
    }

    function do_add() {
        $data['category_name'] = $this->input->post('category_name');
        $this->db->insert('category', $data);
        recache();
    }
 function do_add_subcategory() {
        $data['category_name'] = $this->input->post('category_name');
        $this->db->insert('category', $data);
        recache();
    }
    function lists() {
        $this->db->order_by('category_id', 'desc');
        $this->data['all_categories'] = $this->db->get('category')->result_array();
        $this->render();      
    }
      function sub_lists() {
        $this->db->order_by('category_id', 'desc');
        $this->data['all_categories'] = $this->db->get('subcategory')->result_array();
        //print_r( $this->data['all_categories']);
        $this->render();      
    }

    function delete($para1) {
        $this->db->where('category_id', $para1);
        $this->db->delete('category');
        recache();
    }

}
