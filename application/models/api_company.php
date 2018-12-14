<?php 
class api_company extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    //for api calls
	function get_companies_by_category($category_id){
		// $this->db->select('company_id');
		// $this->db->from('category_company_government');
		// $this->db->where('category_id',$category_id);
		// $result = $this->db->get()->result();
        // return sizeof($result);
        
        // $this->db->select('ccg.category_id, comp.name')
        // ->from('companies AS comp, category_company_government AS ccg')
        // ->where('comp.id == ccg.company_id')
        // ->where('ccg.category_id',$category_id);
        // $result = $this->db->get()->result();
        // return sizeof($result);

        $this->db->select('ccg.category_id,com.name,com.id,com.address,com.about_us,com.telephone,com.mobile,com.email,com.website,com.fax,logo.url')
            ->from('category_company_government as ccg')
            ->where('ccg.category_id',$category_id)
            ->join('companies as com','ccg.company_id = com.id','right')
            ->join('logos as logo','com.id = logo.company_id','left');
            $result = $this->db->get()->result();
            return $result;

	}
}
?>