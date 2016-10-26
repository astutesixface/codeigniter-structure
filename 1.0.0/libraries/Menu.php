<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/*
 * 	@author : Astute Sixface
 *  @support: support@astutesixface.com
 * 	date	: 05 June, 2015
 * 	Easy Inventory
 * 	http://www.astutesixface.com/
 *  version: 1.0
 */

class Menu {

    public function dynamicMenu() {
        $CI = &get_instance();
        $CI->load->library(array('ion_auth', 'menu', 'breadcrumbs'));
        $employee_login_id = $CI->session->userdata('user_id');
        $user_type = $CI->session->userdata('group');
        $CI->load->model('crud_model');
        $role = $CI->ion_auth->get_users_groups()->row()->id;
        // Create a multidimensional array to conatin a list of items and parents
        $menu = array(
            'items' => array(),
            'parents' => array(),
        );
        if ($role != 1) {
            // query for employee employee role
            
            $permission = json_decode($CI->db->where('groups_id',$role)->get('groups')->row()->permission);
            
            $user_menus = $CI->db->where_in('menu_id',$permission)->get('tbl_menu')->result_array();
        } else { // get all menu for admin
            $user_menu = $CI->db->query('SELECT menu_id, label, link, icon, parent FROM tbl_menu ORDER BY sort');
            $user_menus = $user_menu->result_array();
        }




        // Builds the array lists with data from the menu table
        foreach ($user_menus as $items) {

            // Creates entry into items array with current menu item id ie. $menu['items'][1]
            $menu['items'][$items['menu_id']] = $items;

            // Creates entry into parents array. Parents array contains a list of all items with children
            $menu['parents'][$items['parent']][] = $items['menu_id'];
        }

        return $output = $this->buildMenu(0, $menu);
    }

    public function buildMenu($parent, $menu, $flag = null) {
        $html = '';

        if (isset($menu['parents'][$parent])) {

            if ($flag != null) {
                $html .= '<ul class="inner-drop list-unstyled">';
            } else {
                $html .= '<ul class="list-unstyled clearfix nav-list mb15">';
            }

            foreach ($menu['parents'][$parent] as $itemId) {
                $result = $this->active_menu_id($menu['items'][$itemId]['menu_id']);
                if ($result) {
                    $active = 'active';
                    $opened = 'open';
                } else {
                    $active = '';
                    $opened = '';
                }

                if (!isset($menu['parents'][$itemId])) { //if condition is false                    
                    if ($menu['items'][$itemId]['parent'] == '0') {
                        $html .= "<li class='" . $active . "' >\n  <a href='" . base_url() . $menu['items'][$itemId]['link'] . "'> <i class='" . $menu['items'][$itemId]['icon'] . "'></i><span class='text' >" . $menu['items'][$itemId]['label'] . "</span></a>\n</li> \n";
                    } else {
                        $html .= "<li class='" . $active . "' >\n  <a href='" . base_url() . $menu['items'][$itemId]['link'] . "'><span >" . $menu['items'][$itemId]['label'] . "</span></a>\n</li> \n";
                    }
                }

                if (isset($menu['parents'][$itemId])) { //if condition is true
                    $html .= "<li class='" . $opened . ' ' . "'>\n  <a href='" . base_url() . $menu['items'][$itemId]['link'] . "'> <i class='" . $menu['items'][$itemId]['icon'] . "'></i><span class='text'>" . $menu['items'][$itemId]['label'] . "</span> <i class='fa fa-angle-left pull-right'></i> </a>\n";
                    $html .= self::buildMenu($itemId, $menu, $flag = 1);
                    $html .= "</li> \n";
                }
            }

            $html .= "</ul> \n";
        }

        return $html;
    }

    public function active_menu_id($id) {
        $CI = &get_instance();
        $CI->load->helper('url');
        //set the current controller and action name
        $controller_name = $CI->router->fetch_directory() . $CI->router->fetch_class();

        $action_name = $CI->router->fetch_method();
$uriSegment =  uri_string();
      //  $uriSegment = str_replace('/index', '', $controller_name . '/' . $action_name);
        $CI->load->model("login_model");
       // echo $uriSegment;
        //$menu_uri['menu_active_id'] = $CI->login_model->select_menu_by_uri(uri_string());
        $activeId = $CI->login_model->select_menu_by_uri($uriSegment);

        if (!empty($activeId)) {
            foreach ($activeId as $v_activeId) {
                if ($id == $v_activeId) {
                    return true;
                }
            }
        }

        return false;
    }

}
