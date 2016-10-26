<?php

class Contact_message extends Backend_Controller {

    function __construct() {
        parent::__construct();

        /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->crud_model->ip_data();
        if (!$this->ion_auth->logged_in() || !$this->crud_model->admin_permission('newsletter')) {

            redirect(base_url() . 'auth/login', 'refresh');
        }
    }

    /* Manage Frontend User Messages */

    function index() {
        $this->load->library('form_validation');
        $this->data['title'] = "contact message";
        $this->data['contact_messages'] = $this->db->get('contact_message')->result_array();
        $this->render();
    }

    function delete($para2 = '') {

        $this->db->where('contact_message_id', $para2);
        $this->db->delete('contact_message');
    }

    function lists() {
        $this->db->order_by('contact_message_id', 'desc');
        $this->data['contact_messages'] = $this->db->get('contact_message')->result_array();
        $this->render();
    }

    function reply($para2) {
        $this->load->model('email_model');
        $data['reply'] = $this->input->post('reply');
        $this->db->where('contact_message_id', $para2);
        $this->db->update('contact_message', $data);
        $this->db->order_by('contact_message_id', 'desc');
        $query = $this->db->get_where('contact_message', array(
                    'contact_message_id' => $para2
                ))->row();
        $this->email_model->do_email($data['reply'], 'RE: ' . $query->subject, $query->email);
    }

    function view($para2 = '') {
        $this->data['message_data'] = $this->db->get_where('contact_message', array(
                    'contact_message_id' => $para2
                ))->result_array();
        $this->render();
    }

    function reply_form($para2 = '') {
        $this->load->library('form_validation');
        $this->data['message_data'] = $this->db->get_where('contact_message', array(
                    'contact_message_id' => $para2
                ))->result_array();
        $this->render();
    }

}
