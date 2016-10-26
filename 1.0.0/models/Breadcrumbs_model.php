<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Breadcrumbs Model
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
* Description:  Library to create dynamic breadcrumbs according to the page setup in the database
* 
*/

class Breadcrumbs_model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';
    private $pagesTable = "menus";
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_page($id=false,$controller=false,$action=false)
    {
    	if ($action=="index")$action=false;
    	if ($id) {
        	$query = $this->db->get_where($this->pagesTable, array('id' => $id));
    	}
    	else {
    		if ($action) {
    			$query = $this->db->get_where($this->pagesTable, array('name' => $controller,
        													   	       'slug'       => $action,
        													          ));
    		}
    		else {
    			$query = $this->db->get_where($this->pagesTable, array('name' => $controller));
    		}
    	}
        return $query->row();
    }

}