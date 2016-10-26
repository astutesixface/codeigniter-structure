<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/*
 *	@author : Astute Sixface
 *  @support: support@astutesixface.com
 *	date	: 05 June, 2015
 *	Easy Inventory
 *	http://www.astutesixface.com/
 *  version: 1.0
 */

class Login_Model extends CI_Model
{
    protected $_table_name;
    protected $_order_by;
    

    public function login()
    {
        $this->_table_name = 'tbl_user';
        $this->_order_by = 'user_id';

        $user = $this->get_by(array(
                'user_name' => $this->input->post('user_name'),
                'password' => $this->hash($this->input->post('password')),
                    ), true);

        if (count($user)) {
            $data = array(
                    'user_name' => $user->user_name,
                    'name' => $user->name,
                    'employee_id' => $user->user_id,
                    'employee_login_id' => $user->user_id,
                    'loggedin' => true,
                    'user_type' => $user->flag,
                    'user_pic' => $user->filename,
                    'url' => 'admin/dashboard',
                );
            $this->session->set_userdata($data);
        }
    }

   

    public function hash($string)
    {
        return hash('sha512', $string.config_item('encryption_key'));
    }
    public function select_menu_by_uri($uriSegment)
    {      
        $this->db->select('tbl_menu.*', false);
        $this->db->from('tbl_menu');
        $this->db->where('link', $uriSegment);
        $query_result = $this->db->get();
        $result = $query_result->row();
        if (count($result)) {
            $menuId[] = $result->menu_id;
            $menuId = $this->select_menu_by_id($result->parent, $menuId);
        } else {
            return false;
        }
        if (!empty($menuId)) {
            $lastId = end($menuId);
            $parrent = $this->select_menu_first_parent($lastId);
            array_push($menuId, $parrent->parent);

            return $menuId;
        }
    }

    public function select_menu_by_id($id, $menuId)
    {
        $this->db->select('tbl_menu.*', false);
        $this->db->from('tbl_menu');
        $this->db->where('menu_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        if (count($result)) {
            array_push($menuId, $result->menu_id);
            if ($result->parent != 0) {
                $result = self::select_menu_by_id($result->parent, $menuId);
            }
        }

        return $menuId;
    }

    public function select_menu_first_parent($lastId)
    {
        $this->db->select('tbl_menu.*', false);
        $this->db->from('tbl_menu');
        $this->db->where('menu_id', $lastId);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }
}
