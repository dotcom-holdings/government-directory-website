<?php
    
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ajax extends CI_Controller { 
/**
* Dot Com Admin Panel for Codeigniter 
* Author: Leon van Rensburg
* Dot Com
*
*/
    function __construct() {
        parent::__construct();
    }
	
    function index()
    { 
    }
	
	function get_lease_expiry()
	{
		$this->load->database();
		$this->load->helper('form');
		$id = $this->input->post('tenant_id');
		$lease_type = $this->input->post('type_selected');
		$lease_start_date = $this->input->post('lease_start_date');
		
		$this->db->select('months,login_expiry');
		$this->db->from('lease_types');
		$this->db->where('id',$lease_type);
		$query = $this->db->get();	
		foreach($query->result() as $item){
			$months = $item->months;
			$login_expiry = $item->login_expiry;
		}
		if(date("d", strtotime($lease_start_date))=='1')
			$expiry_date = date('Y-m-d', strtotime("+".$months." months - 1 month", strtotime($lease_start_date)));
		else
			$expiry_date = date('Y-m-d', strtotime("+".$months." months - 1 month - 1 hour", strtotime($lease_start_date)));
		$expiry_date = date('Y-m-d', strtotime('last day of '.$expiry_date));
		$login_expiry_date = date('Y-m-d', strtotime("+".$login_expiry." months", strtotime($expiry_date)));
		echo json_encode(array($expiry_date,$login_expiry_date));
	}
	
	function get_user()
	{
		$this->load->database();
		$this->load->helper('form');
		$id = $this->input->post('user_id');
		
		$this->db->select('name,cell,email');
		$this->db->from('users');
		$this->db->where('id',$id);
		$query = $this->db->get();	
		foreach($query->result() as $item){
			$name = $item->name;
			$cell = $item->cell;
			$email = $item->email;
		}
		
		echo json_encode(array($name,$cell,$email));
	}
	
	function get_property()
	{
		$this->load->database();
		$this->load->helper('form');
		$id = $this->input->post('tenant_id');

		if($id) {
			$sql = "SELECT property_id,unit_number,unit_type,concat(firstname,' ',surname) as name,property.name as property FROM tenant left join property on property.id =tenant.property_id WHERE tenant.id=".$id;
		
			$query = $this->db->query($sql);
			foreach ($query->result_array() as $tablerow) {
			  $property_id = $tablerow['property_id'];
			  $unit_number = $tablerow['unit_number'];
			  $unit_type = $tablerow['unit_type'];
			  $tenant = $tablerow['name'];
			  $property = $tablerow['property'];
			}
			
			$tenant_area = "Property: ".$unit_number. " &nbsp;".$property. " ";
			
			$sql = "SELECT kitchen,dining,lounge,patio,balcony,bedrooms,bathrooms,toilets,carports,garages,garden FROM unit_type where id=".$unit_type;
		
			$query = $this->db->query($sql);
			
			$dd_data = array();
			$dd_data[0] = "Please Select";
			foreach ($query->result_array() as $tablerow) {
				if($tablerow['kitchen']>0){
					if($tablerow['kitchen']>1){
						for($k=1;$k<=$tablerow['kitchen'];$k++){
							$dd_data['kitchen_'.$k] = 'Kitchen '.$k;
						}
					}
					else{
						$dd_data['kitchen'] = 'Kitchen';
					}
				}
				if($tablerow['dining']>0){
					if($tablerow['dining']>1){
						for($k=1;$k<=$tablerow['dining'];$k++){
							$dd_data['dining_'.$k] = 'Dining '.$k;
						}
					}
					else{
						$dd_data['dining'] = 'Dining';
					}
				}
				if($tablerow['lounge']>0){
					if($tablerow['lounge']>1){
						for($k=1;$k<=$tablerow['lounge'];$k++){
							$dd_data['lounge_'.$k] = 'Lounge '.$k;
						}
					}
					else{
						$dd_data['lounge'] = 'Lounge';
					}
				}
				if($tablerow['patio']>0){
					if($tablerow['patio']>1){
						for($k=1;$k<=$tablerow['patio'];$k++){
							$dd_data['patio_'.$k] = 'Patio '.$k;
						}
					}
					else{
						$dd_data['patio'] = 'Patio';
					}
				}
				if($tablerow['balcony']>0){
					if($tablerow['balcony']>1){
						for($k=1;$k<=$tablerow['balcony'];$k++){
							$dd_data['balcony_'.$k] = 'Balcony '.$k;
						}
					}
					else{
						$dd_data['balcony'] = 'Balcony';
					}
				}
				if($tablerow['bedrooms']>0){
					if($tablerow['bedrooms']>1){
						for($k=1;$k<=$tablerow['bedrooms'];$k++){
							$dd_data['bedrooms_'.$k] = 'Bedroom '.$k;
						}
					}
					else{
						$dd_data['bedrooms'] = 'Bedroom';
					}
				}
				if($tablerow['bathrooms']>0){
					if($tablerow['bathrooms']>1){
						for($k=1;$k<=$tablerow['bathrooms'];$k++){
							$dd_data['bathrooms_'.$k] = 'Bathroom '.$k;
						}
					}
					else{
						$dd_data['bathrooms'] = 'Bathroom';
					}
				}
				if($tablerow['toilets']>0){
					if($tablerow['toilets']>1){
						for($k=1;$k<=$tablerow['toilets'];$k++){
							$dd_data['toilets_'.$k] = 'Toilet '.$k;
						}
					}
					else{
						$dd_data['toilets'] = 'Toilet';
					}
				}
				if($tablerow['carports']>0){
					if($tablerow['carports']>1){
						for($k=1;$k<=$tablerow['carports'];$k++){
							$dd_data['carports_'.$k] = 'Carport '.$k;
						}
					}
					else{
						$dd_data['carports'] = 'Carport';
					}
				}
				if($tablerow['garages']>0){
					if($tablerow['garages']>1){
						for($k=1;$k<=$tablerow['garages'];$k++){
							$dd_data['garages_'.$k] = 'Garage '.$k;
						}
					}
					else{
						$dd_data['garages'] = 'Garage';
					}
				}
				if($tablerow['garden']>0){
					if($tablerow['garden']>1){
						for($k=1;$k<=$tablerow['garden'];$k++){
							$dd_data['garden_'.$k] = 'Garden '.$k;
						}
					}
					else{
						$dd_data['garden'] = 'Garden';
					}
				}
			}
			
		}	
	
                $output = "<label>Fault Area</label>
					".form_dropdown('fault_area_id', isset($dd_data)?$dd_data:array(), set_value('fault_area_id'),"class='form-control' id='fault_area_id'")."
				";
		
		echo json_encode(array($output,$property_id,$unit_type,$tenant_area)); 
	}
	
	function get_lease_login_expiry()
	{
		$this->load->database();
		$this->load->helper('form');
		$lease_type = $this->input->post('type_selected');
		$expire_date = $this->input->post('expire_date');
		
		$this->db->select('login_expiry');
		$this->db->from('lease_types');
		$this->db->where('id',$lease_type);
		$query = $this->db->get();	
		foreach($query->result() as $item){
			$months = $item->login_expiry;
		}
		
		$expiry_date = date('Y-m-d', strtotime("+".$months." months", strtotime($expire_date)));
		echo $expiry_date;
	}
	
	function get_item()
	{
		$this->load->database();
		$this->load->helper('form');
		$id = $this->input->post('type_selected');
		if($this->input->post('item_id'))
			$item_id = $this->input->post('item_id');
		$fault_area_id = $this->input->post('fault_area_id');
		$property_id = $this->input->post('property_id');
		$unit_type_id = $this->input->post('unit_type_id');
				
		if($id) {
			$this->db->select('fault_items.id,fault_items.area_id,fault_items.name');
			$this->db->from('fault_items');
			$this->db->join('fault_types_to_items','fault_types_to_items.fault_item_id=fault_items.id','inner');
			$this->db->where('fault_types_to_items.fault_type_id',$id);
			$this->db->where('property_id',$property_id);
			$this->db->where('unit_type_id',$unit_type_id);
			$query = $this->db->get();	
	
			foreach($query->result() as $item){
				$area_id = unserialize($item->area_id);
				for($y=0;$y<sizeof($area_id);$y++){
				if($fault_area_id == $area_id[$y])
				{
				if(isset($item_id)){
						if($item_id==$item->name){
							$checked = 'checked';
						}
						else
							$checked='';
				}
				else{
					$checked='';
				}

				$checkboxes[] = '<div class="col-lg-12"> <span class="checkbox"><input type="radio" class="item_id" '.$checked.' name="item_id" onclick="get_dept()" value="'.$item->name.'"> '.$item->name.'</input></div>';
				}
				}
			}
		}
	
		$output = "<label>Fault Item</label>";
		if(isset($checkboxes))
		for ($x=0;$x<sizeof($checkboxes);$x++)
		{
			$output .= $checkboxes[$x];
		}
		$output .= "";
		
		echo $output; 
	}
	
	function get_unit_type()
	{
		$this->load->database();
		$this->load->helper('form');
		$id = $this->input->post('property');
		$unit_type_id = $this->input->post('unit_type_id');

		if($id) {
			$sql = "SELECT id,name FROM unit_type WHERE property_id=".$id;
		
			$query = $this->db->query($sql);
			
			$dd_data = array();
			$dd_data[0] = "Please Select";
			foreach ($query->result_array() as $tablerow) {
			  $dd_data[$tablerow['id']] = $tablerow['name'];
			}
			
		}	
	
                $output = "<label>Unit Type</label>
					".form_dropdown('unit_type_id', isset($dd_data)?$dd_data:array(), isset($unit_type_id)?$unit_type_id:set_value('unit_type_id'),"class='form-control' id='unit_type_id' onchange='get_area();'")."
				";
		
		
		echo isset($output)?$output:''; 
	}
	
	function get_area()
	{
		$this->load->database();
		$this->load->helper('form');
		$id = $this->input->post('type_selected');
		$item_id = $this->input->post('item_id');

			$sql = "SELECT kitchen,dining,lounge,patio,balcony,bedrooms,bathrooms,toilets,carports,garages,garden FROM unit_type where id=".$id;
		
			$query = $this->db->query($sql);
			
			$dd_data = array();
			foreach ($query->result_array() as $tablerow) {
				if($tablerow['kitchen']>0){
					if($tablerow['kitchen']>1){
						for($k=1;$k<=$tablerow['kitchen'];$k++){
							$dd_data['kitchen_'.$k] = 'Kitchen '.$k;
						}
					}
					else{
						$dd_data['kitchen'] = 'Kitchen';
					}
				}
				if($tablerow['dining']>0){
					if($tablerow['dining']>1){
						for($k=1;$k<=$tablerow['dining'];$k++){
							$dd_data['dining_'.$k] = 'Dining '.$k;
						}
					}
					else{
						$dd_data['dining'] = 'Dining';
					}
				}
				if($tablerow['lounge']>0){
					if($tablerow['lounge']>1){
						for($k=1;$k<=$tablerow['lounge'];$k++){
							$dd_data['lounge_'.$k] = 'Lounge '.$k;
						}
					}
					else{
						$dd_data['lounge'] = 'Lounge';
					}
				}
				if($tablerow['patio']>0){
					if($tablerow['patio']>1){
						for($k=1;$k<=$tablerow['patio'];$k++){
							$dd_data['patio_'.$k] = 'Patio '.$k;
						}
					}
					else{
						$dd_data['patio'] = 'Patio';
					}
				}
				if($tablerow['balcony']>0){
					if($tablerow['balcony']>1){
						for($k=1;$k<=$tablerow['balcony'];$k++){
							$dd_data['balcony_'.$k] = 'Balcony '.$k;
						}
					}
					else{
						$dd_data['balcony'] = 'Balcony';
					}
				}
				if($tablerow['bedrooms']>0){
					if($tablerow['bedrooms']>1){
						for($k=1;$k<=$tablerow['bedrooms'];$k++){
							$dd_data['bedrooms_'.$k] = 'Bedroom '.$k;
						}
					}
					else{
						$dd_data['bedrooms'] = 'Bedroom';
					}
				}
				if($tablerow['bathrooms']>0){
					if($tablerow['bathrooms']>1){
						for($k=1;$k<=$tablerow['bathrooms'];$k++){
							$dd_data['bathrooms_'.$k] = 'Bathroom '.$k;
						}
					}
					else{
						$dd_data['bathrooms'] = 'Bathroom';
					}
				}
				if($tablerow['toilets']>0){
					if($tablerow['toilets']>1){
						for($k=1;$k<=$tablerow['toilets'];$k++){
							$dd_data['toilets_'.$k] = 'Toilet '.$k;
						}
					}
					else{
						$dd_data['toilets'] = 'Toilet';
					}
				}
				if($tablerow['carports']>0){
					if($tablerow['carports']>1){
						for($k=1;$k<=$tablerow['carports'];$k++){
							$dd_data['carports_'.$k] = 'Carport '.$k;
						}
					}
					else{
						$dd_data['carports'] = 'Carport';
					}
				}
				if($tablerow['garages']>0){
					if($tablerow['garages']>1){
						for($k=1;$k<=$tablerow['garages'];$k++){
							$dd_data['garages_'.$k] = 'Garage '.$k;
						}
					}
					else{
						$dd_data['garages'] = 'Garage';
					}
				}
				if($tablerow['garden']>0){
					if($tablerow['garden']>1){
						for($k=1;$k<=$tablerow['garden'];$k++){
							$dd_data['garden_'.$k] = 'Garden '.$k;
						}
					}
					else{
						$dd_data['garden'] = 'Garden';
					}
				}
			}
		
			if($item_id) {
				$this->db->select('area_id');
				$this->db->from('fault_items');
				$this->db->where('id',$item_id);
				$this->db->where('unit_type_id',$id);
				$query = $this->db->get();	
				foreach($query->result() as $item){ 
						$area_id = unserialize($item->area_id);
				}
			}
			foreach($dd_data as $fault_area_id => $area_value){
				$checked='';
				if(isset($area_id)){
					for($y=0;$y<sizeof($area_id);$y++){
							if($fault_area_id == $area_id[$y])
							{
								$checked = 'checked';
								break;
							}
							else
							{
								$checked='';
							}
					}
				}

				$checkboxes[] = '<span class="checkbox"><input type="checkbox" '.$checked.' name="area_id[]" value="'.$fault_area_id.'"> '.$area_value.'</input></span>';
				
			}

	
		$output = "<div class='form-group col-lg-12'><label>Associated Areas</label>";
		if(isset($checkboxes))
		for ($x=0;$x<sizeof($checkboxes);$x++)
		{
			$output .= $checkboxes[$x];
		}
		$output .= "</div>";
		
		echo $output; 
	}
	
	function addRollover($timestamp, $hoursToAdd, $skipWeekends = true) {
    // Set constants
    $dayStart = 8;
    $dayEnd = 16;

    // For every hour to add
    for($i = 0; $i < $hoursToAdd; $i++)
    {
        // Add the hour
        $timestamp += 3600;

        // If the time is between 1800 and 0800
        if ((date('G', $timestamp) >= $dayEnd && date('i', $timestamp) >= 0 && date('s', $timestamp) > 0) || (date('G', $timestamp) < $dayStart))
        {
            // If on an evening
            if (date('G', $timestamp) >= $dayEnd)
            {
                // Skip to following morning at 08XX
                $timestamp += 3600 * ((24 - date('G', $timestamp)) + $dayStart);
            }
            // If on a morning
            else
            {
                // Skip forward to 08XX
                $timestamp += 3600 * ($dayStart - date('G', $timestamp));
            }
        }

        // If the time is on a weekend
        if ($skipWeekends && (date('N', $timestamp) == 6 || date('N', $timestamp) == 7))
        {
            // Skip to Monday
            $timestamp += 3600 * (24 * (8 - date('N', $timestamp)));
        }
    }

    // Return
    return $timestamp;
	}


	function get_dept()
	{
		$this->load->database();
		$this->load->helper('form');   
		$name = $this->input->post('item_selected');
		$create_date = $this->input->post('create_date');
		$user_type = $this->input->post('user_type');
		
		$this->db->select('id,response_time,resolution_time');
			$this->db->from('categories');
			$query = $this->db->get();
			$cat_html = "";
			foreach($query->result_array() as $row) {
				$cat_html .= "<div class='col-lg-12'><i><b>Category ".$row['id']." fault:</b></i><br><i class='text-info'>Estimated Response Time: ".$row['response_time']." Working Hours</i>";
				if($user_type!='T')
					$cat_html .= "<br><i class='text-success'>Estimated Resolution Time: ".$row['resolution_time']." Working Hours</i>";
				$cat_html .= "</div>";
			}

			$this->db->select('departments.id,departments.name,categories.id as category_id,categories.response_time,categories.resolution_time,categories.id as cat_id');
			$this->db->from('fault_items');
			$this->db->join('departments','departments.id=fault_items.dept_id', 'left');
			$this->db->join('fault_actions','fault_actions.id=fault_items.action_id','left');
			$this->db->join('categories','categories.id=fault_actions.category_id','left');
			$this->db->where('fault_items.name',$name);
			$query = $this->db->get();

			foreach($query->result_array() as $row) {
				$dept = $row['name'];
				$dept_id = $row['id'];
				$cat_id = $row['cat_id'];
				$category = $row['category_id'];
				$response_date = $this->addRollover(strtotime($create_date),$row['response_time']);
				$response_date = date('D j F Y H:i',$response_date);
				$resolution_date = $this->addRollover(strtotime($create_date),$row['resolution_time']);
				$resolution_date = date('D j F Y H:i',$resolution_date);
			}


		$output = "<label>Department</label>";
		if(isset($dept))
		{
			$output .= "<span class='checkbox'><h4>".$dept."<input type='hidden' name='dept_id' value='".$dept_id."'></h4></span>";
            $output .= "<a id='cathover' href='#'><u>Category</u><span class='extra'>".$cat_html."</span></a><br>";
			$output .= '<div class="col-lg-12" id="cathover2" style="display: none">'.$cat_html.'</div>';
			$output .= '<div class="col-lg-12" id="cathover3" style="display: none">Categories Explanation</div>';
			$output .= "<i>Cat. ".$category." fault: &nbsp;</i><br><i class='text-info'>Estimated Response Time: ".$response_date."</i> <br><i class='text-success'>";
			if($user_type!='T')
				$output .= "Estimated Resolution Time: ".$resolution_date;
			$output .= "</i>";
			$output .= '<input type="hidden" name="category_id" value="'.$cat_id.'">';
		}
		else
			$output .= '';
		$output .= '
		<style>
		.extra { 
			display: none;
		}

		a:hover .extra {
			display: inline-block;
		}
		</style>';
		/*$output .= '
			<style>
			.popover{
				max-width: 25%;
			}
			</style>
			<script type="text/javascript">
			$(document).ready(function(){
			$("#cathover").popover({
					html : true, 
					content: function() {
					  return $("#cathover2").html();
					},
					title: function() {
					  return $("#cathover3").html();
					},
					trigger: "hover",
					container: "body"
				});
				$(".popover").css({"max-width":"55%","left":"250px !important"});
			});
			</script>';*/ 
		echo $output; 
	}

}
