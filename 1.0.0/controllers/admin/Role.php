<?php

class Role extends Backend_Controller {

    function __construct() {
        parent::__construct();


        /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->crud_model->ip_data();
        if (!$this->ion_auth->logged_in() || !$this->crud_model->admin_permission('role')) {

            redirect(base_url() . 'auth/login', 'refresh');
        }
    }

    /* Product Category add, edit, view, delete */

    function index() {
        $this->data['all_roles'] = $this->db->get('groups')->result_array();
        $this->data['title'] = "Role";
        $this->render();
    }

    function add() {
        $this->load->library('form_validation');
        $this->data['all_permissions'] = $this->db->get('permission')->result_array();
        $this->render();
    }

    function edit($para1) {
        $this->load->library('form_validation');
        $this->data['all_permissions'] = $this->db->get('permission')->result_array();
        $this->data['role_data'] = $this->db->get_where('groups', array(
                    'groups_id' => $para1
                ))->result_array();
        $this->render();
    }

    function update($para1) {
        $data['name'] = $this->input->post('name');
        $data['permission'] = json_encode($this->input->post('permission'));
        $data['description'] = $this->input->post('description');
        $this->db->where('groups_id', $para1);
        $this->db->update('groups', $data);
    }

    function do_add() {
        $data['name'] = $this->input->post('name');
        $data['permission'] = json_encode($this->input->post('permission'));
        $data['description'] = $this->input->post('description');
        $this->db->insert('groups', $data);
    }

    function lists() {
        $this->db->order_by('groups_id', 'desc');
        $this->data['all_roles'] = $this->db->get('groups')->result_array();
        $this->render();
    }

    function delete($para1) {
        $this->db->where('groups_id', $para1);
        $this->db->delete('groups');
    }

    function view($para1) {
        $this->data['role_data'] = $this->db->get_where('groups', array(
                    'groups_id' => $para1
                ))->result_array();
        $this->render();
    }

}
