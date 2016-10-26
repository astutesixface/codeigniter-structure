<?php

class Newsletter extends Backend_Controller {

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

    /* Product Category add, edit, view, delete */

    function index() {
        $this->load->library('form_validation');
        $this->data['title'] = "newsletter";
        $this->data['users'] = $this->ion_auth->users(array(3))->result_array();
        $this->data['subscribers'] = $this->db->get('subscribe')->result_array();
        $this->render();
    }

    function send() {

        $this->load->model('email_model');
        $users = explode(',', $this->input->post('users'));
        $subscribers = explode(',', $this->input->post('subscribers'));
        $text = $this->input->post('text');
        $title = $this->input->post('title');
        $from = $this->input->post('from');
        foreach ($users as $key => $user) {
            if ($user !== '') {
                $this->email_model->newsletter($title, $text, $user, $from);
            }
        }
        foreach ($subscribers as $key => $subscriber) {
            if ($subscriber !== '') {
                $this->email_model->newsletter($title, $text, $subscriber, $from);
            }
        }
    }

}
