<?php

class User extends Backend_Controller {

    function __construct() {
        parent::__construct();


        /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->crud_model->ip_data();
        if (!$this->ion_auth->logged_in() || !$this->crud_model->admin_permission('user')) {

            redirect(base_url() . 'auth/login', 'refresh');
        }
    }

    /* Product blog add, edit, view, delete */

    function index($para1 = '', $para2 = '') {

        if ($para1 == 'do_add') {
            $data['username'] = $this->input->post('user_name');
            $data['description'] = $this->input->post('description');
            $this->db->insert('user', $data);
        } else if ($para1 == 'edit') {
            $this->data['user_data'] = $this->db->get_where('users', array(
                        'id' => $para2
                    ))->result_array();
            $this->load->library(array('form_validation'));
            $this->render(NULL, $para1);
            //$this->load->view('back/admin/user_edit', $this->data);
        } elseif ($para1 == "update") {
            $data['first_name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['phone'] = $this->input->post('phone');
            $data['role'] = $this->input->post('role');
            $id = $para2;
            $user = $this->ion_auth->user($id)->row();
            $groups = $this->ion_auth->groups()->result_array();
            $currentGroups = $this->ion_auth->get_users_groups($id)->result();


            // Only allow updating groups if user is admin
            //Update the groups user belongs to
            $groupData[0] = $this->input->post('role');

            if (isset($groupData) && !empty($groupData)) {

                $this->ion_auth->remove_from_group('', $id);

                foreach ($groupData as $grp) {
                    $this->ion_auth->add_to_group($grp, $id);
                }
            }

            // check to see if we are updating the user
            $this->ion_auth->update($user->id, $data);
        } elseif ($para1 == 'delete') {
            $this->db->where('user_id', $para2);
            $this->db->delete('user');
        } elseif ($para1 == 'list') {
            $this->load->library('cart');
            $this->db->order_by('user_id', 'desc');
            $this->data['all_users'] = $this->ion_auth->users()->result_array();            
            $this->render(NULL, $para1);
        } elseif ($para1 == 'view') {
            $this->data['user_data'] = $this->ion_auth->user($para2)->result_array();

            $this->render(NULL, 'user_view');
        } elseif ($para1 == 'add') {
            $this->load->library(array('form_validation'));
            $this->render(NULL, $para1);            
        } else {
            $this->data['page_name'] = "user";
            $this->data['all_users'] = $this->ion_auth->users(3)->result_array();
            $this->render();
        }
    }

}
