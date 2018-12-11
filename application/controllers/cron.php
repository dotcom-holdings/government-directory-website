<?php  
//error_reporting(E_ALL);
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 1); 
set_time_limit(0); 
ignore_user_abort(true); 
class Cron extends CI_Controller{

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('common');
		$this->load->model('fault');
		$this->load->model('fault_history');
		$this->load->model('department');
		$this->load->model('category');
		$this->load->model('sms');
		$this->load->model('alert');
		$this->load->model('sendmail');
		$this->load->model('escalation');
	}

	function index ()
	{
		//$this->check_for_fault_escalations();
		echo "Checked escalations!<br><br>";
		$this->send_daily_report();
		echo "Sent admin report!<br><br>";
		echo "Done!";
		gc_collect_cycles();
	}
	
	function check_for_fault_escalations() {
		$faults = $this->fault->get_all_faults();
		
		$manager_details = $this->escalation->get_all_escalations();
		
		for($x=0;$x<sizeof($faults);$x++)
		{
			$cat = $this->category->get_category($faults[$x]->category_id);
			$escalation_interval = $cat[0]->escalation_interval;
			$dept_head = $this->department->get_department_head($faults[$x]->dept_id);
			$dept_head = $dept_head[0]->dept_head;
			$date = date("Y-m-d H:i:s");
			$response_date = $this->addRollover(strtotime($faults[$x]->create_date),$cat[0]->response_time);
			$response_date = date('Y-m-d H:i:s',$response_date);
			$resolution_date = $this->addRollover(strtotime($faults[$x]->create_date),$cat[0]->resolution_time);
			$resolution_date = date('Y-m-d H:i:s',$resolution_date);
			$response_escalation_date = $this->addRollover(strtotime($response_date),$cat[0]->escalation_interval);
			$response_escalation_date = date('Y-m-d H:i:s',$response_escalation_date);
			$resolution_escalation_date = $this->addRollover(strtotime($resolution_date),$cat[0]->escalation_interval);
			$resolution_escalation_date = date('Y-m-d H:i:s',$resolution_escalation_date);
			$tenant_userid = $this->common->get_userid_from_tenant($faults[$x]->tenant_id); 
			$contractor_userid = $this->common->get_userid_from_contractor($faults[$x]->contractor_id);
			
			if($date>=$response_date && $faults[$x]->status==1)//normal first escalation of open fault
			{
				$this->fault->update_status($faults[$x]->id,4);
				//update fault history
				$values = array(
							'fault_id'=>$faults[$x]->id,
							'tenant_id'=>$faults[$x]->tenant_id,
							'contractor_id'=>$faults[$x]->contractor_id,
							'reference'=>$faults[$x]->reference,
							'datetime'=>date('Y-m-d H:i:s'),
							'description'=>'Fault escalated',
							'user_id'=>1,
							'username'=>'Admin'
					);
				$this->fault_history->create($values);
				//send out alerts
				$values = array(
							'user_id'=>$contractor_userid,
							'message'=>'A fault has been escalated! Reference: '.$faults[$x]->reference,
							'datetime'=>date('Y-m-d H:i:s')
					);
				$this->alert->create($values);
				$values = array(
							'user_id'=>$tenant_userid,
							'message'=>'Your fault has been escalated! Reference: '.$faults[$x]->reference,
							'datetime'=>date('Y-m-d H:i:s')
					);
				$this->alert->create($values);
				$values = array(
							'user_id'=>$dept_head,
							'message'=>'A fault has been escalated! Reference: '.$faults[$x]->reference,
							'datetime'=>date('Y-m-d H:i:s')
					);
				$this->alert->create($values);
				//send out email and sms
				//contractor
				$to = $this->common->get_email_from_contractor($faults[$x]->contractor_id);	
				$subject = "Dot Com Holdings Fault Escalation";
				$message = "A fault has been escalated! Reference: ".$faults[$x]->reference."<br><br>Please tend to this fault as a matter of urgency.<br><br>Regards<br>Dot Com Holdings";
				$this->sendmail->send_email($to, $subject, $message);
				$cell = $this->common->get_cell_from_contractor($faults[$x]->contractor_id);	
				$cell_message = "A fault has been escalated! Reference: ".$faults[$x]->reference.". Please tend to this fault as a matter of urgency. Regards, Dot Com Holdings";				
				$sms_result = $this->sms->message_send($cell, $cell_message);
				//tenant
				$to = $this->common->get_email_from_tenant($faults[$x]->tenant_id);	
				$subject = "Dot Com Holdings Fault Escalation";
				$message = "Your fault has been escalated! Reference: ".$faults[$x]->reference."<br><br>A contractor will tend to this fault asap.<br><br>Regards<br>Dot Com Holdings";
				$this->sendmail->send_email($to, $subject, $message);
				$cell = $this->common->get_cell_from_contractor($faults[$x]->contractor_id);	
				$cell_message = "Your fault has been escalated! Reference: ".$faults[$x]->reference.". A contractor will tend to this fault asap. Regards, Dot Com Holdings";				
				$sms_result = $this->sms->message_send($cell, $cell_message);
				//dept head
				$to = $this->common->get_email_from_user($dept_head);	
				$subject = "Dot Com Holdings Fault Escalation";
				$message = "A fault has been escalated! Reference: ".$faults[$x]->reference."<br><br>Please look into this asap.<br><br>Regards<br>Dot Com Holdings";
				$this->sendmail->send_email($to, $subject, $message);
				$cell = $this->common->get_cell_from_user($dept_head);	
				$cell_message = "A fault has been escalated! Reference: ".$faults[$x]->reference.". Please look into this asap. Regards, Dot Com Holdings";				
				$sms_result = $this->sms->message_send($cell, $cell_message);
				
				for($x=0;$x<sizeof($manager_details);$x++){
					$this->sendmail->send_email($manager_details[$x]->email, $subject, $message);
					$sms_result = $this->sms->message_send($manager_details[$x]->cell, $cell_message);
				}				
			}
			elseif($date>=$response_escalation_date && $faults[$x]->status==4)//second escalation of escalated fault
			{
				$this->fault->update_status($faults[$x]->id,4);
				//update fault history
				$values = array(
							'fault_id'=>$faults[$x]->id,
							'tenant_id'=>$faults[$x]->tenant_id,
							'contractor_id'=>$faults[$x]->contractor_id,
							'reference'=>$faults[$x]->reference,
							'datetime'=>date('Y-m-d H:i:s'),
							'description'=>'Fault escalated',
							'user_id'=>1,
							'username'=>'Admin'
					);
				$this->fault_history->create($values);
				//send out alerts
				$values = array(
							'user_id'=>$contractor_userid,
							'message'=>'A fault has been escalated for the second time! Reference: '.$faults[$x]->reference,
							'datetime'=>date('Y-m-d H:i:s')
					);
				$this->alert->create($values);
				$values = array(
							'user_id'=>$tenant_userid,
							'message'=>'Your fault has been escalated! Reference: '.$faults[$x]->reference,
							'datetime'=>date('Y-m-d H:i:s')
					);
				$this->alert->create($values);
				$values = array(
							'user_id'=>$dept_head,
							'message'=>'A fault has been escalated for the second time! Reference: '.$faults[$x]->reference,
							'datetime'=>date('Y-m-d H:i:s')
					);
				$this->alert->create($values);
				//send out email and sms
				//contractor
				$to = $this->common->get_email_from_contractor($faults[$x]->contractor_id);	
				$subject = "Dot Com Holdings Fault Escalation";
				$message = "A fault has been escalated for the second time! Reference: ".$faults[$x]->reference."<br><br>Please tend to this fault as a matter of urgency.<br><br>Regards<br>Dot Com Holdings";
				$this->sendmail->send_email($to, $subject, $message);
				$cell = $this->common->get_cell_from_contractor($faults[$x]->contractor_id);	
				$cell_message = "A fault has been escalated for the second time! Reference: ".$faults[$x]->reference.". Please tend to this fault as a matter of urgency. Regards, Dot Com Holdings";				
				$sms_result = $this->sms->message_send($cell, $cell_message);
				//tenant
				$to = $this->common->get_email_from_tenant($faults[$x]->tenant_id);	
				$subject = "Dot Com Holdings Fault Escalation";
				$message = "Your fault has been escalated! Reference: ".$faults[$x]->reference."<br><br>A contractor will tend to this fault asap.<br><br>Regards<br>Dot Com Holdings";
				$this->sendmail->send_email($to, $subject, $message);
				$cell = $this->common->get_cell_from_contractor($faults[$x]->contractor_id);	
				$cell_message = "Your fault has been escalated! Reference: ".$faults[$x]->reference.". A contractor will tend to this fault asap. Regards, Dot Com Holdings";				
				$sms_result = $this->sms->message_send($cell, $cell_message);
				//dept head
				$to = $this->common->get_email_from_user($dept_head);	
				$subject = "Dot Com Holdings Fault Escalation";
				$message = "A fault has been escalated for the second time! Reference: ".$faults[$x]->reference."<br><br>Please look into this asap.<br><br>Regards<br>Dot Com Holdings";
				$this->sendmail->send_email($to, $subject, $message);
				$cell = $this->common->get_cell_from_user($dept_head);	
				$cell_message = "A fault has been escalated for the second time! Reference: ".$faults[$x]->reference.". Please look into this asap. Regards, Dot Com Holdings";				
				$sms_result = $this->sms->message_send($cell, $cell_message);	
				
				for($x=0;$x<sizeof($manager_details);$x++){
					$this->sendmail->send_email($manager_details[$x]->email, $subject, $message);
					$sms_result = $this->sms->message_send($manager_details[$x]->cell, $cell_message);
				}				
			}
			elseif($date>=$resolution_date && $faults[$x]->status==3)//normal first escalation of in progress fault
			{
				$this->fault->update_status($faults[$x]->id,5);
				//update fault history
				$values = array(
							'fault_id'=>$faults[$x]->id,
							'tenant_id'=>$faults[$x]->tenant_id,
							'contractor_id'=>$faults[$x]->contractor_id,
							'reference'=>$faults[$x]->reference,
							'datetime'=>date('Y-m-d H:i:s'),
							'description'=>'Fault escalated',
							'user_id'=>1,
							'username'=>'Admin'
					);
				$this->fault_history->create($values);
				//send out alerts
				$values = array(
							'user_id'=>$contractor_userid,
							'message'=>'A fault has been escalated! Reference: '.$faults[$x]->reference,
							'datetime'=>date('Y-m-d H:i:s')
					);
				$this->alert->create($values);
				$values = array(
							'user_id'=>$tenant_userid,
							'message'=>'Your fault has been escalated! Reference: '.$faults[$x]->reference,
							'datetime'=>date('Y-m-d H:i:s')
					);
				$this->alert->create($values);
				$values = array(
							'user_id'=>$dept_head,
							'message'=>'A fault has been escalated! Reference: '.$faults[$x]->reference,
							'datetime'=>date('Y-m-d H:i:s')
					);
				$this->alert->create($values);
				//send out email and sms
				//contractor
				$to = $this->common->get_email_from_contractor($faults[$x]->contractor_id);	
				$subject = "Dot Com Holdings Fault Escalation";
				$message = "A fault has been escalated! Reference: ".$faults[$x]->reference."<br><br>Please resolve this fault as a matter of urgency.<br><br>Regards<br>Dot Com Holdings";
				$this->sendmail->send_email($to, $subject, $message);
				$cell = $this->common->get_cell_from_contractor($faults[$x]->contractor_id);	
				$cell_message = "A fault has been escalated! Reference: ".$faults[$x]->reference.". Please resolve this fault as a matter of urgency. Regards, Dot Com Holdings";				
				$sms_result = $this->sms->message_send($cell, $cell_message);
				//tenant
				$to = $this->common->get_email_from_tenant($faults[$x]->tenant_id);	
				$subject = "Dot Com Holdings Fault Escalation";
				$message = "Your fault has been escalated! Reference: ".$faults[$x]->reference."<br><br>The contractor will resolve this fault asap.<br><br>Regards<br>Dot Com Holdings";
				$this->sendmail->send_email($to, $subject, $message);
				$cell = $this->common->get_cell_from_contractor($faults[$x]->contractor_id);	
				$cell_message = "Your fault has been escalated! Reference: ".$faults[$x]->reference.". The contractor will resolve this fault asap. Regards, Dot Com Holdings";				
				$sms_result = $this->sms->message_send($cell, $cell_message);
				//dept head
				$to = $this->common->get_email_from_user($dept_head);	
				$subject = "Dot Com Holdings Fault Escalation";
				$message = "A fault has been escalated! Reference: ".$faults[$x]->reference."<br><br>Please look into this asap.<br><br>Regards<br>Dot Com Holdings";
				$this->sendmail->send_email($to, $subject, $message);
				$cell = $this->common->get_cell_from_user($dept_head);	
				$cell_message = "A fault has been escalated! Reference: ".$faults[$x]->reference.". Please look into this asap. Regards, Dot Com Holdings";				
				$sms_result = $this->sms->message_send($cell, $cell_message);	
				
				for($x=0;$x<sizeof($manager_details);$x++){
					$this->sendmail->send_email($manager_details[$x]->email, $subject, $message);
					$sms_result = $this->sms->message_send($manager_details[$x]->cell, $cell_message);
				}				
			}
			elseif($date>=$resolution_escalation_date && $faults[$x]->status==5)//second escalation of in progress fault
			{
				$this->fault->update_status($faults[$x]->id,5);
				//update fault history
				$values = array(
							'fault_id'=>$faults[$x]->id,
							'tenant_id'=>$faults[$x]->tenant_id,
							'contractor_id'=>$faults[$x]->contractor_id,
							'reference'=>$faults[$x]->reference,
							'datetime'=>date('Y-m-d H:i:s'),
							'description'=>'Fault escalated',
							'user_id'=>1,
							'username'=>'Admin'
					);
				$this->fault_history->create($values);
				//send out alerts
				$values = array(
							'user_id'=>$contractor_userid,
							'message'=>'A fault has been escalated for the second time! Reference: '.$faults[$x]->reference,
							'datetime'=>date('Y-m-d H:i:s')
					);
				$this->alert->create($values);
				$values = array(
							'user_id'=>$tenant_userid,
							'message'=>'Your fault has been escalated! Reference: '.$faults[$x]->reference,
							'datetime'=>date('Y-m-d H:i:s')
					);
				$this->alert->create($values);
				$values = array(
							'user_id'=>$dept_head,
							'message'=>'A fault has been escalated for the second time! Reference: '.$faults[$x]->reference,
							'datetime'=>date('Y-m-d H:i:s')
					);
				$this->alert->create($values);
				//send out email and sms
				//contractor
				$to = $this->common->get_email_from_contractor($faults[$x]->contractor_id);	
				$subject = "Dot Com Holdings Fault Escalation";
				$message = "A fault has been escalated for the second time! Reference: ".$faults[$x]->reference."<br><br>Please resolve this fault as a matter of urgency.<br><br>Regards<br>Dot Com Holdings";
				$this->sendmail->send_email($to, $subject, $message);
				$cell = $this->common->get_cell_from_contractor($faults[$x]->contractor_id);	
				$cell_message = "A fault has been escalated for the second time! Reference: ".$faults[$x]->reference.". Please resolve this fault as a matter of urgency. Regards, Dot Com Holdings";				
				$sms_result = $this->sms->message_send($cell, $cell_message);
				//tenant
				$to = $this->common->get_email_from_tenant($faults[$x]->tenant_id);	
				$subject = "Dot Com Holdings Fault Escalation";
				$message = "Your fault has been escalated! Reference: ".$faults[$x]->reference."<br><br>The contractor will resolve this fault asap.<br><br>Regards<br>Dot Com Holdings";
				$this->sendmail->send_email($to, $subject, $message);
				$cell = $this->common->get_cell_from_contractor($faults[$x]->contractor_id);	
				$cell_message = "Your fault has been escalated! Reference: ".$faults[$x]->reference.". The contractor will resolve this fault asap. Regards, Dot Com Holdings";				
				$sms_result = $this->sms->message_send($cell, $cell_message);
				//dept head
				$to = $this->common->get_email_from_user($dept_head);	
				$subject = "Dot Com Holdings Fault Escalation";
				$message = "A fault has been escalated for the second time! Reference: ".$faults[$x]->reference."<br><br>Please look into this asap.<br><br>Regards<br>Dot Com Holdings";
				$this->sendmail->send_email($to, $subject, $message);
				$cell = $this->common->get_cell_from_user($dept_head);	
				$cell_message = "A fault has been escalated for the second time! Reference: ".$faults[$x]->reference.". Please look into this asap. Regards, Dot Com Holdings";				
				$sms_result = $this->sms->message_send($cell, $cell_message);	
				for($x=0;$x<sizeof($manager_details);$x++){
					$this->sendmail->send_email($manager_details[$x]->email, $subject, $message);
					$sms_result = $this->sms->message_send($manager_details[$x]->cell, $cell_message);
				}				
			}
		}
	}
	
	function send_daily_report()
	{
		$faults = $this->fault->get_all_faults_unresolved();
		//print_r($faults);exit;
		
		$html = '<style type="text/css">
		<!--
		table {
		  max-width: 100%;
		  background-color: transparent;
		}
		th {
		  text-align: left;
		}
		.table {
		  width: 100%;
		  margin-bottom: 20px;
		}
		.table > thead > tr > th,
		.table > tbody > tr > th,
		.table > tfoot > tr > th,
		.table > thead > tr > td,
		.table > tbody > tr > td,
		.table > tfoot > tr > td {
		  padding: 8px;
		  line-height: 1.428571429;
		  vertical-align: top;
		  border-top: 1px solid #ddd;
		}
		.table > thead > tr > th {
		  vertical-align: bottom;
		  border-bottom: 2px solid #ddd;
		}
		.table > caption + thead > tr:first-child > th,
		.table > colgroup + thead > tr:first-child > th,
		.table > thead:first-child > tr:first-child > th,
		.table > caption + thead > tr:first-child > td,
		.table > colgroup + thead > tr:first-child > td,
		.table > thead:first-child > tr:first-child > td {
		  border-top: 0;
		}
		.table > tbody + tbody {
		  border-top: 2px solid #ddd;
		}
		.table .table {
		  background-color: #fff;
		}
		.table-condensed > thead > tr > th,
		.table-condensed > tbody > tr > th,
		.table-condensed > tfoot > tr > th,
		.table-condensed > thead > tr > td,
		.table-condensed > tbody > tr > td,
		.table-condensed > tfoot > tr > td {
		  padding: 5px;
		}
		.table-bordered {
		  border: 1px solid #ddd;
		}
		.table-bordered > thead > tr > th,
		.table-bordered > tbody > tr > th,
		.table-bordered > tfoot > tr > th,
		.table-bordered > thead > tr > td,
		.table-bordered > tbody > tr > td,
		.table-bordered > tfoot > tr > td {
		  border: 1px solid #ddd;
		}
		.table-bordered > thead > tr > th,
		.table-bordered > thead > tr > td {
		  border-bottom-width: 2px;
		}
		.table-striped > tbody > tr:nth-child(odd) > td,
		.table-striped > tbody > tr:nth-child(odd) > th {
		  background-color: #f9f9f9;
		}
		.table-hover > tbody > tr:hover > td,
		.table-hover > tbody > tr:hover > th {
		  background-color: #f5f5f5;
		}
		table col[class*="col-"] {
		  position: static;
		  display: table-column;
		  float: none;
		}
		table td[class*="col-"],
		table th[class*="col-"] {
		  position: static;
		  display: table-cell;
		  float: none;
		}
		.table > thead > tr > td.active,
		.table > tbody > tr > td.active,
		.table > tfoot > tr > td.active,
		.table > thead > tr > th.active,
		.table > tbody > tr > th.active,
		.table > tfoot > tr > th.active,
		.table > thead > tr.active > td,
		.table > tbody > tr.active > td,
		.table > tfoot > tr.active > td,
		.table > thead > tr.active > th,
		.table > tbody > tr.active > th,
		.table > tfoot > tr.active > th {
		  background-color: #f5f5f5;
		}
		.table-hover > tbody > tr > td.active:hover,
		.table-hover > tbody > tr > th.active:hover,
		.table-hover > tbody > tr.active:hover > td,
		.table-hover > tbody > tr.active:hover > th {
		  background-color: #e8e8e8;
		}
		.table > thead > tr > td.success,
		.table > tbody > tr > td.success,
		.table > tfoot > tr > td.success,
		.table > thead > tr > th.success,
		.table > tbody > tr > th.success,
		.table > tfoot > tr > th.success,
		.table > thead > tr.success > td,
		.table > tbody > tr.success > td,
		.table > tfoot > tr.success > td,
		.table > thead > tr.success > th,
		.table > tbody > tr.success > th,
		.table > tfoot > tr.success > th {
		  background-color: #dff0d8;
		}
		.table-hover > tbody > tr > td.success:hover,
		.table-hover > tbody > tr > th.success:hover,
		.table-hover > tbody > tr.success:hover > td,
		.table-hover > tbody > tr.success:hover > th {
		  background-color: #d0e9c6;
		}
		.table > thead > tr > td.info,
		.table > tbody > tr > td.info,
		.table > tfoot > tr > td.info,
		.table > thead > tr > th.info,
		.table > tbody > tr > th.info,
		.table > tfoot > tr > th.info,
		.table > thead > tr.info > td,
		.table > tbody > tr.info > td,
		.table > tfoot > tr.info > td,
		.table > thead > tr.info > th,
		.table > tbody > tr.info > th,
		.table > tfoot > tr.info > th {
		  background-color: #d9edf7;
		}
		.table-hover > tbody > tr > td.info:hover,
		.table-hover > tbody > tr > th.info:hover,
		.table-hover > tbody > tr.info:hover > td,
		.table-hover > tbody > tr.info:hover > th {
		  background-color: #c4e3f3;
		}
		.table > thead > tr > td.warning,
		.table > tbody > tr > td.warning,
		.table > tfoot > tr > td.warning,
		.table > thead > tr > th.warning,
		.table > tbody > tr > th.warning,
		.table > tfoot > tr > th.warning,
		.table > thead > tr.warning > td,
		.table > tbody > tr.warning > td,
		.table > tfoot > tr.warning > td,
		.table > thead > tr.warning > th,
		.table > tbody > tr.warning > th,
		.table > tfoot > tr.warning > th {
		  background-color: #fcf8e3;
		}
		.table-hover > tbody > tr > td.warning:hover,
		.table-hover > tbody > tr > th.warning:hover,
		.table-hover > tbody > tr.warning:hover > td,
		.table-hover > tbody > tr.warning:hover > th {
		  background-color: #faf2cc;
		}
		.table > thead > tr > td.danger,
		.table > tbody > tr > td.danger,
		.table > tfoot > tr > td.danger,
		.table > thead > tr > th.danger,
		.table > tbody > tr > th.danger,
		.table > tfoot > tr > th.danger,
		.table > thead > tr.danger > td,
		.table > tbody > tr.danger > td,
		.table > tfoot > tr.danger > td,
		.table > thead > tr.danger > th,
		.table > tbody > tr.danger > th,
		.table > tfoot > tr.danger > th {
		  background-color: #f2dede;
		}
		.table-hover > tbody > tr > td.danger:hover,
		.table-hover > tbody > tr > th.danger:hover,
		.table-hover > tbody > tr.danger:hover > td,
		.table-hover > tbody > tr.danger:hover > th {
		  background-color: #ebcccc;
		}
		-->
		</style>';
		
		$html .= '<p>
		Hello Admin,<br>
		Here is your daily faults report on UNRESOLVED faults.
		</p>';
		      $html .= '<table class="table">
                <thead>
                  <tr>
                    <th>Reference </th>
                    <th>Fault Type </th>
                    <th>Property </th>
                    <th>Unit No </th>
                    <th>Tenant </th>
                    <th>Contractor </th>
                    <th>Resolved </th>
                    <th>Create Date </th>
                    <th>Logged by </th>
                  </tr>
                </thead>
                <tbody>';

				for($x=0;$x<sizeof($faults);$x++) {
					//print_r($faults[$x]->id);echo '<br>';
                    $html .= '<tr>
                            	<td>'.$faults[$x]->reference.'</td>
                                <td><a href="'.base_url().'admin/faults/manage_fault/'.$faults[$x]->id.'/Update">'.$this->fault->get_fault_type($faults[$x]->type_id).'</a></td>
                                <td>'.$this->fault->get_property($faults[$x]->property_id).'</td>
                                <td>'.$this->fault->get_unit_no($faults[$x]->tenant_id).'</td>
                                <td>'.$this->fault->get_tenant($faults[$x]->tenant_id).'</td>
                                <td>'.($faults[$x]->contractor_id>0?$this->fault->get_contractor($faults[$x]->contractor_id):"Not assigned yet").'</td>';                             
								if($faults[$x]->status==4||$faults[$x]->status==5)
									$html .= '<td style="color:red">*(Esc) ';
								else
									$html .= '<td style="color:black">';
								$html .= isset($faults[$x]->resolved)&&$faults[$x]->resolved==1?'Yes':'No';								
                                $html .= '</td>';
                                
								if($faults[$x]->status==4||$faults[$x]->status==5)
									$html .= '<td style="color:red">';
								else
									$html .= '<td style="color:black">';
								$html .= $faults[$x]->create_date;								
                               $html .= '</td>
                                <td style="color:black">'.($faults[$x]->user_id>0?$this->common->get_user_name($faults[$x]->user_id):"No user logged").'</td>';
								 
                            $html .= '</tr>';
					}
                $html .= '</tbody>
              </table>';
		
		//exit;
		//print_r($html);
		$this->load->model('user');
		$subject = "Dot Com Daily Fault Report";
						$users = $this->user->get_escalation_managers();
						for($x=0;$x<sizeof($users);$x++)
						{
								$to = $users[$x]->email; 
								$this->sendmail->send_email($to, $subject, $html);
						}
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
	

}
?>