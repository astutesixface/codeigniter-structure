<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Name:  Backend_Controller
 * 
 * Author: Arumugam
 * 		  sixfacedeveloper@gmail.com
 *         @sixface
 *          
 * Added Awesomeness: Phil Sturgeon
 * 
 * Location: http://github.com/astutesixface
 *          
 * Created:  18.06.2016
 * 
 * Description:  Class to extend the CodeIgniter Controller Class.  All controllers should extend this class.
 * 
 */
class Frontend_Controller extends CI_Controller {

    protected $data = Array();
    protected $controller_name;
    protected $action_name;
    protected $previous_controller_name;
    protected $previous_action_name;
    protected $save_previous_url = false;
    protected $page_title;

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'ion_auth', 'breadcrumbs'));

        $this->load->helper(array('url', 'assets'));

        $this->load->config('super_admin');
        $this->load->helper('language_helper');
        $this->load->model('Crud_model');
        $this->load->library('form_validation');
        //save the previous controller and action name from session
        $this->previous_controller_name = $this->session->flashdata('previous_controller_name');
        $this->previous_action_name = $this->session->flashdata('previous_action_name');

        //set the current controller and action name
        $this->controller_name = $this->router->fetch_directory() . $this->router->fetch_class();
        $this->action_name = $this->router->fetch_method();
        $this->data['content'] = '';
        $this->data['css'] = '';
        $this->data['headhtml'] = '';
        $this->data['footerhtml'] = '';

        $this->data['css_development'] = TRUE;

        // Trun TRUE once worked with CSS and JS. 
        // Again turn FALSE to rebuiled minified faster loading CSS and JS
        $this->data['rebuild'] = FALSE;

        $this->data['vendor_system'] = $this->db->get_where('general_settings', array('type' => 'vendor_system'))->row()->value;
        $this->data['description'] = $this->db->get_where('general_settings', array('type' => 'meta_description'))->row()->value;
        $this->data['keywords'] = $this->db->get_where('general_settings', array('type' => 'meta_keywords'))->row()->value;
        $this->data['author'] = $this->db->get_where('general_settings', array('type' => 'meta_author'))->row()->value;
        $this->data['system_name'] = $this->db->get_where('general_settings', array('type' => 'system_name'))->row()->value;
        $this->data['system_title'] = $this->db->get_where('general_settings', array('type' => 'system_title'))->row()->value;
        $this->data['revisit_after'] = $this->db->get_where('general_settings', array('type' => 'revisit_after'))->row()->value;
        $this->data['slider'] = $this->db->get_where('general_settings', array('type' => 'slider'))->row()->value;
        $this->data['slides'] = $this->db->get_where('general_settings', array('type' => 'slides'))->row()->value;
    }

    protected function render($template = 'frontend') {

        //$this->load->model('page_model');
        //save the controller and action names in session
        if ($this->save_previous_url) {
            $this->session->set_flashdata('previous_controller_name', $this->previous_controller_name);
            $this->session->set_flashdata('previous_action_name', $this->previous_action_name);
        } else {
            $this->session->set_flashdata('previous_controller_name', $this->controller_name);
            $this->session->set_flashdata('previous_action_name', $this->action_name);
        }
        $view_path = 'pages/' . $template . '/' . $this->controller_name . '/' . $this->action_name . '.php'; //set the path off the view
        $head_path = 'pages/' . $template . '/' . $this->controller_name . '/head/' . $this->action_name . '.php'; //set the path off the view
        $footer_path = 'pages/' . $template . '/' . $this->controller_name . '/footer/' . $this->action_name . '.php'; //set the path off the view
        if (file_exists(APPPATH . 'views/' . $view_path)) {
            if (file_exists(APPPATH . 'views/' . $head_path)) {
                $this->data['headhtml'] .= $this->load->view($head_path, $this->data, true);
            }

            if (file_exists(APPPATH . 'views/' . $footer_path)) {
                $this->data['footerhtml'] .= $this->load->view($footer_path, $this->data, true);
            }


            $this->data['content'] .= $this->load->view($view_path, $this->data, true);  //load the view
        }
        $this->add_title();

        $this->load->view("layouts/$template.tpl.php", $this->data);  //load the template
    }

    protected function add_title() {
        $this->load->model('page_model');

        //the default page title will be whats set in the controller
        //but if there is an entry in the db override the controller's title with the title from the db
        $page_title = $this->page_model->get_title($this->controller_name, $this->action_name);
        if ($page_title) {
            $this->data['title'] = $page_title;
        }else{
            $this->data['title'] =  $this->action_name;
        }
    }

    protected function save_url() {
        $this->save_previous_url = true;
    }

}
