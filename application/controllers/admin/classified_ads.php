<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Classified_ads extends CI_Controller {
/**
* Dot Com Admin Panel for Codeigniter 
* Author: Leon van Rensburg
* Dot Com
* 
*/
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('common');
		$this->load->model('user');
		$this->load->model('classified_ad');
    }

    public function index() {
        $arr['page'] = 'classified_ad';
		$arr['classified_ads'] = $this->classified_ad->get_all_classified_ads();
		$arr['user_type'] = $this->session->userdata('user_type');
		$arr['user_id'] = $this->session->userdata('id');
        $this->load->view('admin/classified_ads_list',$arr);
    }
	
	public function getCompany()
    {
		if ( !isset($_GET['term']) )
			exit;
			$term = $_REQUEST['term'];
				$data = array();
				$rows = $this->classified_ad->getCompany($term);
					foreach( $rows as $row )
					{
						$data[] = array(
							'label' => $row->id.' | '.$row->name.' | '.$row->address,
							'value' => $row->id);   
					}
				echo json_encode($data);
				flush();
	}
	
	public function getCompanyName($id)
    {
				$name = $this->classified_ad->get_company_name($id);
				echo $name;
	}

   public function manage_classified_ad($id=0,$type='Update',$action='') {

		$data['message'] = "";
		$data['success'] = "";
		$data['button'] = $type;
		
		$data['user_type'] = $this->session->userdata('user_type');
		$data['user_id'] = $this->session->userdata('id');
		
		$data['website_dd_data'] = $this->common->dropdown('websites',0,1);
		//$data['company_dd_data'] = $this->common->dropdown('companies',0,1);
		$data['rank_dd_data'] = $this->common->dropdown('rank',0,1,0);
		$data['position_dd_data'] = $this->common->dropdown('position',0,1,0);
		$data['size_dd_data'] = $this->common->dropdown('adsize',0,1,0);
		$data['status_dd_data'] = $this->common->dropdown('status',0,0);

		$this->form_validation->set_rules('company_id', 'Company', 'trim|xss_filter|required');
		$this->form_validation->set_rules('website_id', 'Website', 'trim|xss_filter|required');
		$this->form_validation->set_rules('rank_id', 'Rank', 'trim|xss_filter|required');
		$this->form_validation->set_rules('position_id', 'Rank', 'trim|xss_filter|required');
		$this->form_validation->set_rules('size_id', 'Rank', 'trim|xss_filter|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|xss_filter');
		 
		if($this->input->post('Update'))
		{

			if ($this->form_validation->run() == TRUE)
			{
				if($this->classified_ad->update($id))
				{
					$data['message'] = "You have successfully updated the classified_ad";
					$data['success'] = "yes";
				}				
			}
			else
			{
				$data['message'] = validation_errors();
				$data['success'] = "no";
			}
		}
		else
		if($this->input->post('Add'))
		{
			if ($this->form_validation->run() == TRUE)
			{
				if($this->classified_ad->create()!==0)
				{
					$data['message'] = "You have successfully added the classified_ad";
					$data['success'] = "yes";
				}
				else
				{
					$data['message'] = "There is no classified ad loaded for this company!";
					$data['success'] = "no";
				}
				
			}
			else
			{
				$data['message'] = validation_errors();
				$data['success'] = "no";
			}
		}
		
        $data['page'] = 'classified_ad';
		if($type=="Update")
		{
			$classified_ad = $this->classified_ad->get_classified_ad($id);
			$data['classified_ad'] = $classified_ad[0];			
		}
		else
		{
			$data['classified_ad'] = array();
		}
        
        $this->load->view('admin/manage_classified_ad',$data);
    }

    
	public function delete($id) {
        $this->db->where('id', $id);
		$this->db->delete('classified_ads');
		
		redirect('admin/classified_ads', 'refresh');
    } 
	
	public function ajax_check_rankings($website_id,$position_id,$selected='')
    {
        $data['rankings'] = $this->classified_ad->get_available_rankings($website_id,$position_id);
		$data['selected'] = $selected;
        $this->load->view('admin/ajax_get_rankings',$data);
    }  

}

