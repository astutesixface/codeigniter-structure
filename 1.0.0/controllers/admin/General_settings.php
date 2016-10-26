<?php

class General_settings extends Backend_Controller {

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

    function index($para1 = '', $para2 = '') {

        if ($para1 == "terms") {
            $this->db->where('type', "terms_conditions");
            $this->db->update('general_settings', array(
                'value' => $this->input->post('terms')
            ));
        }
        if ($para1 == "privacy_policy") {
            $this->db->where('type', "privacy_policy");
            $this->db->update('general_settings', array(
                'value' => $this->input->post('privacy_policy')
            ));
        }
        if ($para1 == "set_slider") {
            $val = '';
            if ($para2 == 'true') {
                $val = 'ok';
            } else if ($para2 == 'false') {
                $val = 'no';
            }
            $this->db->where('type', "slider");
            $this->db->update('general_settings', array(
                'value' => $val
            ));
        }
        if ($para1 == "set_slides") {
            $val = '';
            if ($para2 == 'true') {
                $val = 'ok';
            } else if ($para2 == 'false') {
                $val = 'no';
            }
            $this->db->where('type', "slides");
            $this->db->update('general_settings', array(
                'value' => $val
            ));
        }
        if ($para1 == "set_admin_notification_sound") {
            $val = '';
            if ($para2 == 'true') {
                $val = 'ok';
            } else if ($para2 == 'false') {
                $val = 'no';
            } $this->db->where('type', "admin_notification_sound");
            $this->db->update('general_settings', array(
                'value' => $val
            ));
        }
        if ($para1 == "set_home_notification_sound") {
            $val = '';
            if ($para2 == 'true') {
                $val = 'ok';
            } else if ($para2 == 'false') {
                $val = 'no';
            }
            $this->db->where('type', "home_notification_sound");
            $this->db->update('general_settings', array(
                'value' => $val
            ));
        }
        if ($para1 == "fb_login_set") {
            $val = '';
            if ($para2 == 'true') {
                $val = 'ok';
            } else if ($para2 == 'false') {
                $val = 'no';
            }
            echo $val;
            $this->db->where('type', "fb_login_set");
            $this->db->update('general_settings', array(
                'value' => $val
            ));
        }
        if ($para1 == "g_login_set") {
            $val = '';
            if ($para2 == 'true') {
                $val = 'ok';
            } else if ($para2 == 'false') {
                $val = 'no';
            }
            echo $val;
            $this->db->where('type', "g_login_set");
            $this->db->update('general_settings', array(
                'value' => $val
            ));
        }
        if ($para1 == "favicon_settings") {
            $name = $_FILES["fav"]["name"];
            $ext = end((explode(".", $name)));
            move_uploaded_file($_FILES["fav"]['tmp_name'], 'uploads/others/favicon.' . $ext);
            $this->db->where('type', "fav_ext");
            $this->db->update('ui_settings', array(
                'value' => $ext
            ));
            recache();
        }
        if ($para1 == "social_login_settings") {
            $this->db->where('type', "fb_appid");
            $this->db->update('general_settings', array(
                'value' => $this->input->post('appid')
            ));
            $this->db->where('type', "fb_secret");
            $this->db->update('general_settings', array(
                'value' => $this->input->post('secret')
            ));
            $this->db->where('type', "application_name");
            $this->db->update('general_settings', array(
                'value' => $this->input->post('application_name')
            ));
            $this->db->where('type', "client_id");
            $this->db->update('general_settings', array(
                'value' => $this->input->post('client_id')
            ));
            $this->db->where('type', "client_secret");
            $this->db->update('general_settings', array(
                'value' => $this->input->post('client_secret')
            ));
            $this->db->where('type', "redirect_uri");
            $this->db->update('general_settings', array(
                'value' => $this->input->post('redirect_uri')
            ));
            $this->db->where('type', "api_key");
            $this->db->update('general_settings', array(
                'value' => $this->input->post('api_key')
            ));
        }
        if ($para1 == "product_comment") {
            $this->db->where('type', "discus_id");
            $this->db->update('general_settings', array(
                'value' => $this->input->post('discus_id')
            ));
            $this->db->where('type', "comment_type");
            $this->db->update('general_settings', array(
                'value' => $this->input->post('type')
            ));
            $this->db->where('type', "fb_comment_api");
            $this->db->update('general_settings', array(
                'value' => $this->input->post('fb_comment_api')
            ));
        }
        if ($para1 == "set") {
            $this->db->where('type', "system_name");
            $this->db->update('general_settings', array(
                'value' => $this->input->post('system_name')
            ));
            $this->db->where('type', "system_email");
            $this->db->update('general_settings', array(
                'value' => $this->input->post('system_email')
            ));

            $file_folder = $this->db->get_where('general_settings', array('type' => 'file_folder'))->row()->value;
            if (rename("uploads/file_products/" . $file_folder, "uploads/file_products/" . $this->input->post('file_folder'))) {
                $this->db->where('type', "file_folder");
                $this->db->update('general_settings', array(
                    'value' => $this->input->post('file_folder')
                ));
            }

            $this->db->where('type', "system_title");
            $this->db->update('general_settings', array(
                'value' => $this->input->post('system_title')
            ));
            $this->db->where('type', "cache_time");
            $this->db->update('general_settings', array(
                'value' => $this->input->post('cache_time')
            ));
            $this->db->where('type', "vendor_system");
            $this->db->update('general_settings', array(
                'value' => $this->input->post('vendor_system')
            ));
            $this->db->where('type', "language");
            $this->db->update('general_settings', array(
                'value' => $this->input->post('language')
            ));
            $volume = $this->input->post('admin_notification_volume');
            $this->db->where('type', "admin_notification_volume");
            $this->db->update('general_settings', array(
                'value' => $volume
            ));
            $volume = $this->input->post('homepage_notification_volume');
            $this->db->where('type', "homepage_notification_volume");
            $this->db->update('general_settings', array(
                'value' => $volume
            ));
        }
        if ($para1 == "contact") {
            $this->db->where('type', "contact_address");
            $this->db->update('general_settings', array(
                'value' => $this->input->post('contact_address')
            ));
            $this->db->where('type', "contact_email");
            $this->db->update('general_settings', array(
                'value' => $this->input->post('contact_email')
            ));
            $this->db->where('type', "contact_phone");
            $this->db->update('general_settings', array(
                'value' => $this->input->post('contact_phone')
            ));
            $this->db->where('type', "contact_website");
            $this->db->update('general_settings', array(
                'value' => $this->input->post('contact_website')
            ));
            $this->db->where('type', "contact_about");
            $this->db->update('general_settings', array(
                'value' => $this->input->post('contact_about')
            ));
        }
        if ($para1 == "footer") {
            $this->db->where('type', "footer_text");
            $this->db->update('general_settings', array(
                'value' => $this->input->post('footer_text', 'chaira_de')
            ));
            $this->db->where('type', "footer_category");
            $this->db->update('general_settings', array(
                'value' => json_encode($this->input->post('footer_category'))
            ));
        }
        if ($para1 == "color") {
            $this->db->where('type', "header_color");
            $this->db->update('ui_settings', array(
                'value' => $this->input->post('header_color')
            ));
            $this->db->where('type', "footer_color");
            $this->db->update('ui_settings', array(
                'value' => $this->input->post('footer_color')
            ));
        }
        recache();
    }

}
