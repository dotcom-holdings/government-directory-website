<section class="section">

                <div class="row">
                    

                    <div class="col-md-12">
                        <div class="card mb-r">
                            <div class="card-block" style="padding: 25px; max-height: 600px;overflow-y: scroll">
                                <strong style="font-size: 24px; color: #333;">
									Visitors by Country
								</strong>
                                   <table class="table large-header">
                                    <thead>
                                        <tr>
                                            <th>Country</th>
                                            <th>New Visits</th>
                                            <th>Returned Visits</th>
                                        </tr>
                                    </thead>
                                    
                                     <?php 
							   
							
								if( $month > 1 && $year==2010 || $year==2011 || $year==2012 || $year==2013 || $year==2014 || $year==2015|| $year==2016 ){ 
									 if( $month > 1){
									?>
                                     <tbody><tr>
                                     
										<td> Botswana</td>
										<td> <?php echo round(round($returned_visits ));?></td>
										<td> <?php echo round($returned_visits);?></td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Lesotho</td>
										<td> <?php echo round( round($returned_visits));?></td>
										<td> <?php echo round($returned_visits);?></td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Namibia</td>
										<td> <?php echo round( round($returned_visits ));?></td>
										<td> <?php echo round($returned_visits );?></td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> South Africa </td>
										<td> <?php echo round( round($returned_visits));?></td>
										<td> <?php echo round($returned_visits);?></td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Swaziland</td>
										<td> <?php echo round( round($returned_visits ));?></td>
										<td> <?php echo round($returned_visits );?></td>
												
									 </tr></tbody>
                                   

                                   <tbody><tr>
                                     
										<td> Zambia</td>
										<td> <?php echo round( round($returned_visit));?></td>
										<td> <?php echo round($returned_visits );?></td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zimbabwe</td>
										<td> <?php echo round( round($returned_visits ));?></td>
										<td> <?php echo round($returned_visits);?></td>
												
									 </tr></tbody>
                                     
                                      <?php }elseif($month==1 && $year==2010 || $year==2011 || $year==2012 || $year==2013 || $year==2014 || $year==2015|| $year==2016){
								   	   
								if($year==2010){ 
									if($month==1){
										echo "<tbody><tr>
                                     
										<td> Botswana</td>
										<td> 3977</td>
										<td> 429</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Lesotho</td>
										<td> 2650</td>
										<td>280</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Namibia</td>
										<td> 1330</td>
										<td>151</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> South Africa </td>
										<td> 5320</td>
										<td> 560</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Swaziland</td>
										<td> 2156</td>
										<td> 284</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zambia</td>
										<td> 3847</td>
										<td> 420</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zimbabwe</td>
										<td> 1330</td>
										<td> 140</td>
												
									 </tr></tbody>";
									}
								}
								elseif($year==2011){ 
									if($month==1){echo "<tbody><tr>
                                     
										<td> Botswana</td>
										<td> 5896</td>
										<td> 654</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Lesotho</td>
										<td> 3651</td>
										<td>280</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Namibia</td>
										<td> 1330</td>
										<td>151</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> South Africa </td>
										<td> 5320</td>
										<td> 560</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Swaziland</td>
										<td> 2156</td>
										<td> 284</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zambia</td>
										<td> 3847</td>
										<td> 420</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zimbabwe</td>
										<td> 1330</td>
										<td> 140</td>
												
									 </tr></tbody>";}
									
								}
							
							elseif($year==2012){ 
									if($month==1){echo "<tbody><tr>
                                     
										<td> Botswana</td>
										<td> 7436</td>
										<td> 1204</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Lesotho</td>
										<td> 5173</td>
										<td> 482 </td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Namibia</td>
										<td> 1957</td>
										<td>223</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> South Africa </td>
										<td> 6923</td>
										<td> 726</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Swaziland</td>
										<td> 3596</td>
										<td> 321</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zambia</td>
										<td> 4934</td>
										<td> 648</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zimbabwe</td>
										<td> 1542</td>
										<td> 207</td>
												
									 </tr></tbody>";}
									
								}
							elseif($year==2013){ 
									if($month==1){echo "<tbody><tr>
                                     
										<td> Botswana</td>
										<td> 8156</td>
										<td> 1505</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Lesotho</td>
										<td> 6125</td>
										<td>539</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Namibia</td>
										<td> 2069</td>
										<td> 261</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> South Africa </td>
										<td> 7483</td>
										<td> 842</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Swaziland</td>
										<td> 3961</td>
										<td> 354</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zambia</td>
										<td> 4812</td>
										<td> 768</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zimbabwe</td>
										<td> 1401</td>
										<td> 291</td>
												
									 </tr></tbody>";}
									
								}
							elseif($year==2014){ 
									if($month==1){echo "<tbody><tr>
                                     
										<td> Botswana</td>
										<td> 9215</td>
										<td> 1708</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Lesotho</td>
										<td> 7852</td>
										<td>756</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Namibia</td>
										<td> 2456</td>
										<td>421</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> South Africa </td>
										<td> 8126</td>
										<td> 996</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Swaziland</td>
										<td> 4521</td>

										<td> 547</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zambia</td>
										<td> 5637</td>
										<td> 1034</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zimbabwe</td>
										<td> 1745</td>
										<td> 403</td>
												
									 </tr></tbody>";}
									
								}
							elseif($year==2015){ 
									if($month==1){echo "<tbody><tr>
                                     
										<td> Botswana</td>
										<td> 9152</td>
										<td> 1900</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Lesotho</td>
										<td> 7956</td>
										<td>845</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Namibia</td>
										<td> 2547</td>
										<td>541</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> South Africa </td>
										<td> 8514</td>
										<td> 1256</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Swaziland</td>
										<td> 5965</td>
										<td> 648</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zambia</td>
										<td> 5982</td>
										<td> 1542</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zimbabwe</td>
										<td> 1589</td>
										<td> 456</td>
												
									 </tr></tbody>";}
									
								}
							elseif($year==2016){ 
									if($month==1){echo "<tbody><tr>
                                     
										<td> Botswana</td>
										<td> 10015</td>
										<td> 2521</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Lesotho</td>
										<td> 9115</td>
										<td>974</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Namibia</td>
										<td> 2845</td>
										<td>612</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> South Africa </td>
										<td> 8954</td>
										<td> 1469</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Swaziland</td>
										<td> 5852</td>
										<td> 751</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zambia</td>
										<td> 7001</td>
										<td> 1754</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zimbabwe</td>
										<td> 1654</td>
										<td> 451</td>
												
									 </tr></tbody>";}
									
								}
								}}
									else{;?>

                                    
                                    <tbody>
                                     <?php foreach($tests as $test) { ?>
											<tr>
												<td><?php if($test->country=="Angola" 
																|| $test->country=="Botswana"
														 		|| $test->country=="Congo"
														 		|| $test->country=="Lesotho"
														 		|| $test->country=="Madagascar"
														 		|| $test->country=="Malawi"
														 		|| $test->country=="Mauritius"
														 		|| $test->country=="Mozambique"
														 		|| $test->country=="Namibia"
														 		|| $test->country=="Seychelles"
														 		|| $test->country=="South Africa"
														 		|| $test->country=="Swaziland"
														 		|| $test->country=="Tanzania"
														 		|| $test->country=="Zambia"
														 		|| $test->country=="Zimbabwe"
														){?>
												
												<img src="<?php echo HTTP_IMG_PATH; ?>/sadc_flags/<?php echo $test->country;?>.png" width="40px" height="25PX" > <?php if($test->country == ""){echo "Other" ;}
															else
														{
											 				echo $test->country;
														}?>
												 
												<?php; }else{?>
												<img src="https://vignette.wikia.nocookie.net/cybernations/images/d/d0/Placeholder_Flag.svg/revision/latest?cb=20100430021730" width="40px" height="25PX" > 
													
													<?php if($test->country == ""){echo "Other" ;}
															else
														{
											 				echo $test->country;
														}?>
														
												<?php }?>
												
												</td>
												
												<td><?php echo $test->total;?></td>
												<td>
												<?php 
												$CI = &get_instance();
												$this->db2 = $CI->load->database('db2', TRUE);
											$country=$test->country;
												 $query = $this->db2->query('SELECT count(id) as total 
												 FROM stats_visit
												 WHERE 
													country = "'.$country.'"
													and
													MONTH(timestamp) = '.$month.' 
													and
													YEAR(timestamp) = '.$year.' 
													and website_id = '.WEBSITE_ID.'');

												foreach($query->result_array() as $row1) {
												echo  $row1['total'] ;
												}
											
												?></td>
												
												
												
											</tr>
                                        <?php };?>
                                    </tbody>
                                     <?php };?>
                                    
                                </table>
                             </div>
                         </div>
                     </div> 
                </div>                    

            </section>