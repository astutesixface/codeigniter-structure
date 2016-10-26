<?php

class Language_settings extends Backend_Controller {

    function __construct() {
        parent::__construct();


        /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->crud_model->ip_data();
        if (!$this->ion_auth->logged_in() || !$this->crud_model->admin_permission('language')) {

            redirect(base_url() . 'auth/login', 'refresh');
        }
    }

    /* Manage Languages */
    function index($para1 = "", $para2 = "", $para3 = "")
    {
        
        if ($para1 == 'add_lang') {
            $this->render(NULL,'language_add');            
        } elseif ($para1 == 'lang_list') {
            //if($para2 !== ''){
            $this->load->library('form_validation');
            $this->db->order_by('word_id', 'desc');
            $this->data['words'] = $this->db->get('language')->result_array();
            $this->data['lang']  = $para2;
            $this->render(NULL,'language_list');             
            //}
        } elseif ($para1 == 'add_word') {
            $this->data['lang'] = $para2;
            $this->render(NULL,'language_word_add');            
            recache();
        } elseif ($para1 == 'upd_trn') {
            $word_id     = $para2;
            $translation = $this->input->post('translation');
            $language    = $this->input->post('lang');
            $word        = $this->db->get_where('language', array(
                'word_id' => $word_id
            ))->row()->word;
            add_translation($word, $language, $translation);
            recache();
        } elseif ($para1 == 'do_add_word') {
            $language = $para2;
            $word     = $this->input->post('word');
            add_lang_word($word);
            recache();
        } elseif ($para1 == 'do_add_lang') {
            $language = $this->input->post('language');
            add_language($language);
            recache();
        } elseif ($para1 == 'check_existed') {
            echo lang_check_exists($para2);
        } elseif ($para1 == 'lang_select') {
            $this->render(NULL,'language_select');            
        } elseif ($para1 == 'dlt_lang') {
            $this->load->dbforge();
            $this->dbforge->drop_column('language', $para2);
            recache();
        } elseif ($para1 == 'dlt_word') {
            $this->db->where('word_id', $para2);
            $this->db->delete('language');
            recache();
        } else {
            $this->data['page_name'] = "language";
            $this->render();            
        }
    }

}
