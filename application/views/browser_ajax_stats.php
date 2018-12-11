
            <strong style="font-size: 24px; color: #333;">
                Browser Traffic for this website <?php echo $year;  ?></strong><br><br>
           
                           
                                <table class="table large-header">
                                    <thead>
                                        <tr>
                                            <th>Browser</th>
                                            <th>Visits</th>
                                            <th>Frequent Version</th>
                                        </tr>
                                    </thead>
                                     <tbody>
                                     
                                     
                                      <?php foreach($get_web_visits as $web) { ?>
											<tr>
												<td><?php if($web->browser=='Mozilla'){echo "Internet Explorer";}else{
														echo $web->browser;}
													if($web->browser==''){echo "Other";}?>
											    </td>
												<td>
												<?php 
																			  
												@$browser=$web->browser;
												 $CI = &get_instance();
												$this->db2 = $CI->load->database('db2', TRUE);

												@$query = $this->db2->query('SELECT count(id) as total
												 FROM stat_tracker
												 WHERE 
													browser = "'.$browser.'"
													and
													website_id = '.WEBSITE_ID.' and year = '.$year.'');

												foreach($query->result_array() as $row1) {
												echo  @$row1['total'] ;
												}
													
													?></td>
												<td>
													<?php 
													@$browser=$web->browser;

												@$query1 = $this->db2->query('SELECT `browser_version`,
															 COUNT(`browser_version`) AS `value_occurrence` 
													FROM     `stat_tracker`
													WHERE
													website_id = '.WEBSITE_ID.'
													and year = '.$year.'
													and
													browser = "'.$browser.'"
													GROUP BY `browser_version`
													ORDER BY `value_occurrence` DESC
													LIMIT    1;');

												foreach($query1->result_array() as $row2) {
												echo  @$row2['browser_version'] ;
												}
													
													?>
												</td>

											</tr>
                                        <?php };?>
                                             
                                    </tbody>
                                 </table>
                          
     
     