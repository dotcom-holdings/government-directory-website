<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class government_category extends CI_model {
    private $categories_government = 'categories_government';
    public function __construct(){
        $this->load->database();
    }

    //get all government categories
    function api_all(){
        $query = $this->db->query('SELECT id,name from categories_government');
        return $query->result();
    }
}
?>