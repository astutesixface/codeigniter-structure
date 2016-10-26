<?php

class Welcome extends Backend_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
    }

    function index() {

        $this->data['title'] = "Welcome";

        $this->render();
    }

// controller
    public function send_gcm() {
        // simple loading
        // note: you have to specify API key in config before
        $this->load->library('gcm');

        // simple adding message. You can also add message in the data,
        // but if you specified it with setMesage() already
        // then setMessage's messages will have bigger priority
        $this->gcm->setMessage('1,Arumugam,HAL Airport Road,2016-10-01,10:00-13:00 ' . date('d.m.Y H:s:i'));

        // add recepient or few
        $this->gcm->addRecepient('davK8LHvUvk:APA91bEilePbfdpdeFUVMcvTSsTJ9mlxF8IEJXcAjBCkQHEsZWWWFzVhy52tGNs4fgmZuCyvqVunWpTZOQA3wz9ulMSyz0WlRBzCJduP7KkXJj7qwcSs_YrVcTKWyuhbiOEG-uKFx2a-');


        // set additional data
        // $this->gcm->setData(array(
        //      'some_key' => 'some_val'
        //  ));
        // also you can add time to live
        $this->gcm->setTtl(500);
        // and unset in further
        $this->gcm->setTtl(false);

        // set group for messages if needed
        $this->gcm->setGroup('Test');
        // or set to default
        $this->gcm->setGroup(false);

        // then send
        if ($this->gcm->send())
            echo 'Success for all messages';
        else
            echo 'Some messages have errors';

        // and see responses for more info
        print_r($this->gcm->status);
        print_r($this->gcm->messagesStatuses);

        die(' Worked.');
    }

    function sub_by_cat($para1 = '') {
        echo $this->crud_model->select_html('sub_category', 'sub_category', 'sub_category_name', 'add', 'demo-chosen-select required', '', 'category', $para1, 'get_sub_res');
    }

    /* Checking Login Stat */

    function is_logged() {
        if ($this->ion_auth->logged_in() == 'yes') {
            echo 'yah!good';
        } else {
            echo 'nope!bad';
        }
    }

    /* Checking if email exists */

    function exists($id) {
        
        $email = $this->input->post('email');
        if($id){
            $this->db->where('id !=',$id);
        }
        $admin = $this->db->where('email', $email)->get('users')->result_array();
        $exists = 'no';
        foreach ($admin as $row) {
            if ($row['email'] == $email) {
                $exists = 'yes';
            }
        }
        echo $exists;
    }

    /* Checking if phone exists */

    function phone() {
        $email = $this->input->post('email');
        $admin = $this->db->where('email', $email)->get('users')->result_array();
        $exists = 'no';
        foreach ($admin as $row) {
            if ($row['email'] == $email) {
                $exists = 'yes';
            }
        }
        echo $exists;
    }

    function phonenumber() {
        $phone = preg_replace('/[^0-9]/', '', $this->input->post('phonenumber'));
        $exists = 'no';
        if (strlen($phone) === 10) {

            $admin = $this->db->select('lead_status_id')
                            ->where('contact_no1', $phone)
                            ->or_where('contact_no2', $phone)
                            ->from('appointment')
                            ->get()->result_array();

            foreach ($admin as $row) {
                $lead = $this->db->select('status')->where('lead_status_id', $row['lead_status_id'])->get('lead_status')->row_array();
                if ($lead['status'] != 'doc_picked_up') {
                    $exists = 'yes';
                }
            }
        } else {
            $exists = 'notValid';
        }
        echo $exists;
    }

    /* Checking if phone exists */

    function username() {
        $username = $this->input->post('username');
        $exists = 'no';
        if ($this->ion_auth->username_check($username)) {
            $exists = 'yes';
        }
        echo $exists;
    }

}
