<?php

class Profile extends Backend_Controller {

    function __construct() {
        parent::__construct();


        /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->crud_model->ip_data();
        // || !$this->crud_model->admin_permission('blog')
        if (!$this->ion_auth->logged_in()) {

            redirect(base_url() . 'auth/login', 'refresh');
        }
        $this->load->library('form_validation');
    }

    /* Add, Edit, Delete, Duplicate, Enable, Disable Sliders */

    function index() {

        $this->load->library('cart');
        $this->data['page_name'] = "profile";
        $this->data['page_title'] = translate('my_profile');
        $this->data['all_products'] = $this->ion_auth->user()->result_array();
        $this->data['user_info'] = $this->ion_auth->user()->result_array();


        $this->render();
    }

    function process($para1 = "", $para2 = "") {
        $safe = 'yes';
        $char = '';
        foreach ($_POST as $k => $row) {
            if (preg_match('/[\'^":()}{#~><>|=+¬]/', $row, $match)) {
                if ($k !== 'password1' && $k !== 'password2') {
                    $safe = 'no';
                    $char = $match[0];
                }
            }
        }

        $this->load->library('form_validation');
        $this->data['page_name'] = "registration";
        if ($para1 == "update_info") {

            $id = $this->session->userdata('user_id');
            $user = $this->ion_auth->user($id)->row();
            $groups = $this->ion_auth->groups()->result_array();
            $currentGroups = $this->ion_auth->get_users_groups($id)->result();

            // validate form input
            $this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required');
            $this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required');
            $this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required');
            // $this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'required');

            if (isset($_POST) && !empty($_POST)) {


                // update the password if it was posted
                if ($this->input->post('password')) {
                    $this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
                    $this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
                }

                if ($this->form_validation->run() === TRUE) {
                    $data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'company' => $this->input->post('company'),
                        'phone' => $this->input->post('phone'),
                        'notification_sound' => $this->input->post('notification_sound') ? 'ok' : 'no',
                    );

                    $data['surname'] = $this->input->post('first_name');
                    $data['address'] = $this->input->post('address');
                    $data['phone'] = $this->input->post('phone');

                    $this->crud_model->file_up('image', 'user', $id);
                    // update the password if it was posted
                    if ($this->input->post('password')) {
                        $data['password'] = $this->input->post('password');
                    }




                    // check to see if we are updating the user
                    if ($this->ion_auth->update($user->id, $data)) {
                        // redirect them back to the admin page if admin, or to the base url if non admin
                        $this->session->set_flashdata('message', $this->ion_auth->messages());
                    } else {
                        // redirect them back to the admin page if admin, or to the base url if non admin
                        $this->session->set_flashdata('message', $this->ion_auth->errors());
                    }
                }
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                print_r($this->data['message']);
            }
        } else if ($para1 == "update_password") {

            $this->form_validation->set_rules('password', 'Old password', 'required');
            $this->form_validation->set_rules('password1', 'New Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password2]');
            $this->form_validation->set_rules('password2', 'Confirm New Password', 'required');

            if (!$this->ion_auth->logged_in()) {
                redirect('', 'refresh');
            }

            $user = $this->ion_auth->user()->row();

            if ($this->form_validation->run() == true) { //display the form
                $identity = $this->session->userdata($this->config->item('identity', 'ion_auth'));

                $change = $this->ion_auth->change_password($identity, $this->input->post('password'), $this->input->post('password1'));

                if ($change) { //if the password was successfully changed
                    $this->session->set_flashdata('message', $this->ion_auth->messages());
                } else {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                }
            }
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            print_r($this->data['message']);
        } else {
            $this->load->view('front/registration', $this->data);
        }
    }

}
