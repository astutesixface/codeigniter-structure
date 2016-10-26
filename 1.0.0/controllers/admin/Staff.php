<?php

class Staff extends Backend_Controller {

    function __construct() {
        parent::__construct();


        /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->crud_model->ip_data();
        if (!$this->ion_auth->logged_in() || !$this->crud_model->admin_permission('admin')) {

            redirect(base_url() . 'auth/login', 'refresh');
        }
    }

    function sale() {
        $this->data['title'] = "Sale";
        $this->render();
    }

    function sale_lists($para1 = '4', $para2 = '') {
        if ($para2 != '') {
            $this->db->join('supervisor_groups', 'supervisor_groups.user_id=users.id')->where('supervisor_groups.supervisor_id', $para2);
        }
        $this->data['all_admins'] = $this->ion_auth->users(array($para1))->result_array();
        $this->data['group_list'] = $para1;

        $this->render();
    }

    /* Product Category add, edit, view, delete */

    function index() {

        $this->data['title'] = "Staff";
        $this->render();
    }

    function call_center() {

        $this->data['title'] = "Staff";
        $this->render();
    }

    function add($para1 = 'admin') {

        $this->data['assign_role'] = $para1;
        $this->load->library('form_validation');
        $this->render();
    }

    function edit($para1) {
        $this->load->library('form_validation');

        $this->data['admin_data'] = $this->db->get_where('users', array(
                    'username' => $para1
                ))->result_array();
        $this->render();
    }

    function update($id) {
        $data['first_name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['phone'] = $this->input->post('phone');
        $data['address'] = $this->input->post('address');
        $data['role'] = $this->input->post('role');
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
    }

    function do_add() {
        $data['name'] = $this->input->post('first_name');
        $data['email'] = $this->input->post('email');
        $data['phone'] = $this->input->post('phone');
        $data['address'] = $this->input->post('address');
        $password = $this->input->post('password'); //substr(hash('sha512', rand()), 0, 12);        
        $data['password'] = sha1($password);
        $data['role'] = $this->input->post('role');
        $data['timestamp'] = time();

        $username = strtolower($this->input->post('user_name'));
        $email = $this->input->post('email');
        //  $password = $this->input->post('password');

        $additional_data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'company' => 'Crm',
            'phone' => $this->input->post('phone'),
            'active' => 1,
        );
        $this->ion_auth->register($username, $password, $email, $additional_data, array($data['role']));
        //   $this->db->insert('admin', $data);
        //    $this->email_model->account_opening('admin', $data['email'], $password);
    }

    function lists_all($para1 = '1') {
        $this->data['all_admins'] = $this->ion_auth->users()->result_array();
        //print_r($this->data['all_admins']);

        foreach ($this->data['all_admins'] as $k => $user) {
            $this->data['all_admins'][$k]['user_id'] = $user['id'];
            $this->data['all_admins'][$k]['groups'] = $this->ion_auth->get_users_groups($user['id'])->result_array();
            $this->data['all_admins'][$k]['group_id'] = $this->data['all_admins'][$k]['groups'][0]['id'];
        }


        $this->data['group_list'] = $para1;
//        foreach ($this->data['all_admins'] as $k => $user) {
//            $this->data['all_admins'][$k]['groups'] = $this->ion_auth->get_users_groups($user['id'])->row_array();
//        }
        $this->render(NULL, 'lists');
    }

    function lists($para1 = '2', $para2 = '') {
        if ($para2 != '') {
            $this->db->join('supervisor_groups', 'supervisor_groups.user_id=users.id')->where('supervisor_groups.supervisor_id', $para2);
        }
        $this->data['all_admins'] = $this->ion_auth->users(array($para1))->result_array();
        $this->data['group_list'] = $para1;
//        foreach ($this->data['all_admins'] as $k => $user) {
//            $this->data['all_admins'][$k]['groups'] = $this->ion_auth->get_users_groups($user['id'])->row_array();
//        }
        $this->render();
    }

    function ajax_list($para1 = '', $para2 = '') {
        if ($para2) {
            $this->data['all_admins'] = $this->db->select('users.id,users.first_name')
                            ->join('supervisor_groups', 'supervisor_groups.user_id = users.id')
                            ->where('supervisor_groups.supervisor_id', $para2)
                            ->from('users')->get()->result_array();
            $this->data['group_list'] = $para1;
            $return = '<select name="supervisor" class="demo-chosen-select" tabindex="2" >';
            $return .= '<option value="">Choose one</option>';
            foreach ($this->data['all_admins'] as $row):
                $return .= '<option value="' . $row['id'] . '" ';
                $return .= '>' . $row['first_name'] . '</option>';
            endforeach;
            echo $return;
        }else {
            echo $this->crud_model->select_html('users', 'user_id', 'first_name', 'add', 'demo-chosen-select required', '', 'sub_category', $para1, 'get_pro_res'); //           
        }
    }

    function response($return) {
        $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode($return));
    }

    function delete($para1) {
        $this->ion_auth->delete_user($para1);
    }

    function view() {
        $this->data['admin_data'] = $this->db->get_where('admin', array(
                    'admin_id' => $para2
                ))->result_array();
        $this->render();
    }

    function assign() {

        $this->render();
    }

}
