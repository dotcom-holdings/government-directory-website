<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Import extends CI_Controller {
/**
* Dot Com Admin Panel for Codeigniter 
* Author: Leon van Rensburg
* Dot Com
* 
*/
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index() {
		//insert ignore into category_company_government (company_id) select id from companies left join website_company on website_company.company_id=companies.id where website_company.website_id=12; (+13)(+15)
		
		//update category_company_government left join categories_entries_new on categories_entries_new.entry_id=category_company_government.company_id set category_company_government.category_id=categories_entries_new.category_id where categories_entries_new.entry_id=category_company_government.company_id;
		
		$query = $this->db->query("SELECT id,old_id as catid from categories_government");	
		foreach($query->result() as $co){
			if($co->catid!='0'){
				$old_cat = explode(',',$co->catid);
				for($x=0;$x<sizeof($old_cat);$x++){
					$web_query = $this->db->query("select id_relations_to_old.current_id as id from categories_entries left join id_relations_to_old on id_relations_to_old.old_id=categories_entries.entry_id where categories_entries.category_id=".$old_cat[$x]);
					if ($web_query->num_rows() > 0){
						foreach($web_query->result() as $result){
							if(!is_null($result->id))
							 $this->update_cat($result->id,$co->id);
							echo $result->id.' - '.$co->id.'<br>';
						}
					}
				}
			}
		}
	}
		
	function update_cat($co_id,$cat_id) {
			$data = array(
				'category_id'=>$cat_id,
				'company_id'=>$co_id
			);
		
	 		$this->db->where('company_id', $co_id);
			$query = $this->db->get('category_company_government');
			if ($query->num_rows() > 0){
				$this->db->where('company_id', $co_id);
				$this->db->update('category_company_government', $data);
			}
			else{
				$this->db->insert('category_company_government', $data);
			}
		return;
	}


}

?>