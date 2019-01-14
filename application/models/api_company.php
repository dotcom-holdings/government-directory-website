<?php 
class api_company extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    //for api calls
	function get_companies_by_category($category_id){

        $this->db->select('ccg.category_id,com.name,com.id,com.address,com.about_us,com.telephone,com.mobile,com.email,com.website,com.fax,logo.url')
            ->from('category_company_government as ccg')
            ->where('ccg.category_id',$category_id)
            ->join('companies as com','ccg.company_id = com.id','right')
            ->join('logos as logo','com.id = logo.company_id','left');
            $result = $this->db->get()->result();
            return $result;
    }
    
    function search_company($search_term){
         $this->db->select('comp.id,comp.name,comp.address,comp.address,comp.about_us,comp.telephone,comp.email,comp.mobile,comp.website,comp.fax,logo.url')
         ->from('companies as comp')
         ->join('logos as logo', 'comp.id = logo.company_id','left')
         ->like('comp.name',$search_term);
         $result = $this->db->get()->result();
         return $result;
        // $this->db->select('companies.name,companies.id,companies.address,companies.about_us,companies.telephone,companies.mobile,companies.email,companies.website,companies.fax')
        //     ->from('companies')
        //     ->like('companies.name',$search_term);
        //     //->join('logos as logo','companies.id = logo.company_id','left');
        //     $result = $this->db->get()->result();

        //     echo json_decode($result);
        //     exit();
        //     return $result;
    }

    #regionn create company
    #this function creates a new company instance in the database
    function create(array $company_details){
        $company_data  = array(
            'name' => $company_details['name'],
            'address' => $company_details['address'],
            'paddress' => $company_details['paddress'],
            'telephone' => $company_details['telephone'],
            'mobile' => $company_details['mobile'],
            'fax' => $company_details['fax'],
            'email' => $company_details['email'],
            'website' => $company_details['website'],
            'about_us' => $company_details['about_us'],
            'status' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $company_details['user_id'],
            'updated_at' => $company_details['Y-m-d H:i:s'],
            'country_id' => COUNTRY_ID,
            'province_id' => $company_details['province_id'],
            'freelisting' => 1,
        );

        $results = $this->db->insert('companies', $company_data);
        $id = $this->db->insert_id();

        return $id;
    }
}
?>