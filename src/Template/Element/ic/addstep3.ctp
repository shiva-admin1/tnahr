<style>
.container{
max-width: 1240px;
}
.blink_me {
   animation: blinker 1s linear infinite;
}

@keyframes blinker {  
   50% { opacity: 0; }
}
</style>
	<div  class="nested-top-padding">			
				<section id="slick">
					<div class="contact-form">
					<?php echo $this->Form->create($incentiveDetail,['id'=>'invoice', "autocomplete"=>"off",'enctype'=>'multipart/form-data']) ?>

					<div class="w-100">
						<div class="container">
							<div class="row">
								<div class="col-sm-12">							
									<div class="field text-center">
										<span class="blink_me" style="color:red;"> 
										 Details and Values should be given for this project (incentive applying for) only
										<span>										
									</div>
								</div>
							</div>
						
							<div class="row m-0">													
								<div class="col-sm-12">
									<p class="ratings mr-5">8. Details of Product Manufactured & Capacity for this Project</p>
									</div>
								<div class="col-sm-4">																	
									<p class="ratings mr-5">Product Manufactured *</p>
									<div class="field">
										<?php echo $this->Form->control('manufactured_product',['label'=>false,'error' => false,'class'=>'no-icon trimspace','required'=>'true', "autocomplete"=>"fddf",'options'=>$manufacturedProducts,'empty'=>'Select Product Manufactured']); ?>
										<span class="slick-tip left">Product Manufactured *</span>
									</div>	
									<div class="new">
										<p class="ratings mr-5">Installed Capacity</p>
										<div class="field row">
											<div class=" col-md-8 pr-0">
												<?php echo $this->Form->control('installed_capacity',['label'=>false,'error' => false,'required'=>'true','class'=>'no-icon num  trimspace', "autocomplete"=>"fddf",'placeholder'=>"Installed Capacity",'style'=>'text-align: right;padding-right:20px']); ?>
											</div>
											<div class=" col-md-4 pl-0">
												<?php echo $this->Form->control('installed_capacity_metrics',['label'=>false,'error' => false,'required'=>'false','class'=>'no-icon ','options'=>$unitMetrics,'style'=>'text-align: right;padding-right:5px']); ?>
											</div>	
										</div>	
									</div>	
								</div>
								<div class="col-sm-4 existing">	
									<p class="ratings mr-5">Existing Installed Capacity (Prior to Expansion) </p>
									<div class="field  row">
										<div class=" col-md-8 pr-0">
											<?php echo $this->Form->control('existing_installed_capacity',['label'=>false,'error' => false,'type'=>'text','class'=>'no-icon num trimspace','required'=>'false', "autocomplete"=>"fddf",'placeholder'=>"Existing Installed Capacity ",'style'=>'text-align: right;padding-right:20px']); ?>
										</div>
										<div class=" col-md-4 pl-0">
											<?php echo $this->Form->control('existing_installed_capacity_metrics',['label'=>false,'error' => false,'required'=>'false','class'=>'no-icon ','options'=>$unitMetrics,'style'=>'text-align: right;padding-right:5px']); ?>
										</div>
									</div>
									<p class="ratings mr-5">Existing (After to Expansion)</p>
									<div class="field  row">
										<div class=" col-md-8 pr-0">
											<?php echo $this->Form->control('existing_prior_expansion_capacity',['label'=>false,'error' => false,'required'=>'false','class'=>'no-icon num trimspace', "autocomplete"=>"fddf",'placeholder'=>"Existing (After to Expansion)",'style'=>'text-align: right;padding-right:20px']); ?>
										</div>
										<div class=" col-md-4 pl-0">
											<?php echo $this->Form->control('existing_prior_expansion_capacity_metrics',['label'=>false,'error' => false,'required'=>'false','class'=>'no-icon ','options'=>$unitMetrics,'style'=>'text-align: right;padding-right:5px']); ?>
										</div>
									</div>
								</div>
								<div class="col-sm-4 existing">
									<p class="ratings mr-5">Additional Capacity as per of the expansion </p>
									<div class="field  row">
										<div class=" col-md-8 pr-0">
											<?php echo $this->Form->control('expansion_capacity',['label'=>false,'error' => false,'required'=>'false','class'=>'no-icon num trimspace', "autocomplete"=>"fddf",'placeholder'=>"Additional Capacity as part of the expansion",'style'=>'text-align: right;padding-right:20px']); ?>
										</div>
										<div class=" col-md-4 pl-0">
											<?php echo $this->Form->control('expansion_capacity_metrics',['label'=>false,'error' => false,'required'=>'false','class'=>'no-icon ','options'=>$unitMetrics,'style'=>'text-align: right;padding-right:5px']); ?>
										</div>
									</div>
								</div>
							</div>						
							<div class="row">							
								<div class="col-sm-12">
									<p class="ratings mr-5">9. Details of Land for this Project<span style="color:red;"> (Rs in Lakhs)<span></p>
									<div class="field  table-responsive">
										<table class="table " id="landTable">
											<thead class="row-table">
												<tr>
													<th width="3%">S.No</th>
													<th width="25%">Land Type & Address
													</th>
													<th width="30%">Total Area </th>
													<th width="16%">Total Guidline Value (if own / Sipcot Lease)<span style="color:red;"> (Rs in Lakhs)<span> </th>
													<th width="16%">Total Document Value (if own / Sipcot Lease) <span style="color:red;"> (Rs in Lakhs)<span></th>
													<th width="10">
														<button type="button" class="btn btn-success btn-sm" onclick="addMoreLand(this);">Add
														Land</button>
													</th>
												</tr>
											</thead>
											<tbody>
												<?php if ($landLocationDetails){ $i=0;
												foreach($landLocationDetails as $key => $value){ ?>
												<tr>
													<td class="trcount"><?php echo $key+1; ?></td>
													<td>
														<?php echo $this->Form->control('land_type[]',['label'=>false,'error' => false,'required'=>'false','class'=>'no-icon landtype trimspace mb-2','empty'=>'-Select-','options'=>$landTypes,'value'=>$value['land_type'],'onchange'=>'change_doc_value(this);']); ?>
													
														<?php echo $this->Form->control('address[]',['label'=>false,'error' => false,'required'=>'false','class'=>'no-icon trimspace','type'=>'textarea','value'=>$value['address'],'autocomplete'=>'dsa','placeholder'=>'Address']); ?>
													</td>													
													<td>
														<div class="field  row">
															<div class=" col-md-8 pr-0">
															<?php echo $this->Form->control('total_area[]',['label'=>false,'error' => false,'required'=>'false','class'=>'no-icon amount trimspace mb-2','minlength'=>'2','maxlength'=>'70','value'=>$value['total_area'],'style'=>'text-align: right;padding-right:5px','placeholder'=>'Area']); ?>
															</div>
															<div class=" col-md-4 pl-0">
																<?php echo $this->Form->control('area_metrics[]',['label'=>false,'error' => false,'required'=>'false','class'=>'no-icon ','options'=>$areaMetrics,'style'=>'text-align: right;padding-right:5px','value'=>$value['area_metrics']]); ?>
															</div>
														</div>
												</td>
													<?php if ($value['land_type'] =="Lease"){  // to make the values readonly ?>
													
													<td>
														<?php echo $this->Form->control('guideline_value_if_own[]',['readonly'=>'readonly','label'=>false,'error' => false,'required'=>'false','class'=>'no-icon guidelineval amount trimspace','value'=>$value['guideline_value_if_own'],'style'=>'text-align: right;padding-right:5px','placeholder'=>'Guidline Value']); ?>
														
													</td>
													<td>
														<?php echo $this->Form->control('document_value_if_own[]',['readonly'=>'readonly','label'=>false,'error' => false,'required'=>'false','class'=>'no-icon documentval amount trimspace','maxlength'=>'10','value'=>$value['document_value_if_own'],'style'=>'text-align: right;padding-right:5px','placeholder'=>'Document Value']); ?>
														
													</td>
													<?php }else{ ?>
													
													
													<td>
														<?php echo $this->Form->control('guideline_value_if_own[]',['label'=>false,'error' => false,'required'=>'false','class'=>'no-icon guidelineval amount trimspace','value'=>$value['guideline_value_if_own'],'style'=>'text-align: right;padding-right:5px','placeholder'=>'Guidline Value']); ?>
														
													</td>
													<td>
														<?php echo $this->Form->control('document_value_if_own[]',['label'=>false,'error' => false,'required'=>'false','class'=>'no-icon documentval amount trimspace','maxlength'=>'10','value'=>$value['document_value_if_own'],'style'=>'text-align: right;padding-right:5px','placeholder'=>'Document Value']); ?>
														
													</td>
													<?php } ?>
													
													<td>
													<button  <?php echo ($i < 1 )?'style="display:none;"':''; ?> type="button" class="btn btn-danger btn-sm" id="partner_delete" rel="<?php echo $value['id']; ?>" onclick="$(this).closest('tr').remove();">Delete</button>
													</td>
												</tr>
													<?php  $i++; } } else{?>
												<tr>
													<td class="trcount">1</td>
													<td>
														<?php echo $this->Form->control('land_type[]',['label'=>false,'error' => false,'class'=>'no-icon landtype trimspace mb-2','required'=>'false','empty'=>'-Select-','options'=>$landTypes,'onchange'=>'change_doc_value(this);']); ?>
													
														<?php echo $this->Form->control('address[]',['label'=>false,'error' => false,'class'=>'no-icon trimspace','required'=>'false','type'=>'textarea','autocomplete'=>'dsa','placeholder'=>'Address']); ?>
													</td>
													<td>
														<?php echo $this->Form->control('total_area[]',['label'=>false,'error' => false,'required'=>'false','class'=>'no-icon amount trimspace mb-2','minlength'=>'2','maxlength'=>'70','placeholder'=>'Area']); ?>
														<?php echo $this->Form->control('area_metrics[]',['label'=>false,'error' => false,'required'=>'false','class'=>'no-icon ','options'=>$areaMetrics,'style'=>'text-align: right;padding-right:5px']); ?>
													</td>
													<td>
														<?php echo $this->Form->control('guideline_value_if_own[]',['label'=>false,'error' => false,'class'=>'no-icon guidelineval amount trimspace','required'=>'false','style'=>'width:130px;text-align: right;padding-right:5px','placeholder'=>'Guidline Value']); ?>
														
													</td>
													<td>
														<?php echo $this->Form->control('document_value_if_own[]',['label'=>false,'error' => false,'required'=>'false','class'=>'no-icon documentval amount trimspace','maxlength'=>'10','style'=>'text-align: right;padding-right:5px','placeholder'=>'Document Value']); ?>
														
													</td>
													<td>
													<button style="display:none;" type="button" class="btn btn-danger btn-sm" id="partner_delete" rel="0" onclick="$(this).closest('tr').remove();">Delete</button>
													</td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>									
								</div>
								<div class="col-sm-12">
									<p class="ratings mr-5">10. Details of  Building for this Project<span style="color:red;">  (Rs in Lakhs)</span> &nbsp;&nbsp;&nbsp;&nbsp;<a style="color:green;" class="blink_me" href="<?php echo $this->Url->build('/', true)?>uploads/incentive_forms/tiic_incentive_building_details_format.docx" target="_blank">Format of Building Document Upload Form</a></p>
									<div class="field">
										<table class="table  table-responsive" id="buildingTable">
											<thead class="row-table">
												<tr>
													<th width="5%">S.No.</th>
													<th width="15%">Total Area Building Constructed <span style="color:red;">  (in Sq.ft)<span></th>
													<th width="25%">Total Building Cost<span style="color:red;">  (Rs in Lakhs)<span></th>
													<th width="25%">Document<span style="color:red;"> ( only PDF )<span></th>
													<th width="30%">Remarks</th>
												</tr>
											</thead>
											<tbody>
												<?php if ($incentiveBuildingDetails){ $i=0;
												foreach($incentiveBuildingDetails as $key => $value){ ?>
												<tr>
													<td class="trcount"><?php echo $key+1; ?></td>
													<td>
														<?php echo $this->Form->control('construction_area[]',['label'=>false,'error' => false,'required'=>'false','class'=>'no-icon amount trimspace','type'=>'text','maxlength'=>'10','value'=>$value['construction_area'],'style'=>'text-align: right;padding-right:20px']); ?>
														
														<?php echo $this->Form->control('building_id[]',['label'=>false,'error' => false,'type'=>'hidden','value'=>$value['id']]); ?>
													</td>
													<td>
														<?php echo $this->Form->control('construction_value[]',['label'=>false,'error' => false,'required'=>'false','class'=>'no-icon amount trimspace','type'=>'text','maxlength'=>'10','value'=>$value['construction_value'],'style'=>'text-align: right;padding-right:20px;']); ?>
													</td>
													<td>
														<div class="field d-grid">
															<label class="upload" for="uploads">
															<div class="btn">
																 <?php echo $this->Form->control('building_uploads[]',['id'=>'img-path','class'=>'form-control','type'=>'file','label'=>false,'error'=>false,'onchange'=>'validdocs(this)']);?>
																										   
																<span class="entypo-upload"></span>
															</div>
															</label>
														<a class="z-btn z-back mt-2" href="<?php echo $this->Url->build('/', true);?>uploads/incentive_files/<?php echo $value['file_path']; ?>" target="_blank">View</a>
														</div>
														
													</td>
													<td>
														<?php echo $this->Form->control('building_remarks[]',['label'=>false,'error' => false,'required'=>'false','class'=>'no-icon specialfield trimspace','type'=>'textarea','value'=>$value['building_remarks']]); ?>
													</td>
												</tr>
													<?php  $i++; } } else{?>
												<tr>
													<td class="trcount">1</td>
													<td>
														<?php echo $this->Form->control('construction_area[]',['label'=>false,'error' => false,'required'=>'false','class'=>'no-icon amount trimspace','type'=>'text','maxlength'=>'10','style'=>'text-align: right;padding-right:20px']); ?>
													</td>
													<td>
														<?php echo $this->Form->control('construction_value[]',['label'=>false,'error' => false,'required'=>'false','class'=>'no-icon amount trimspace','type'=>'text','maxlength'=>'10','style'=>'text-align: right;padding-right:20px;']); ?>
													</td>
													<td>
														<div class="field d-grid">
															<label class="upload" for="uploads">
															<div class="btn">
																 <?php echo $this->Form->control('building_uploads[]',['id'=>'img-path','class'=>'form-control','type'=>'file','label'=>false,'error'=>false,'onchange'=>'validdocs(this)']);?>
																										   
																<span class="entypo-upload"></span>
															</div>
															</label>
														</div>
													</td>
													<td>
														<?php echo $this->Form->control('building_remarks[]',['label'=>false,'error' => false,'required'=>'false','class'=>'no-icon specialfield trimspace','type'=>'textarea']); ?>
													</td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>									
								</div>								
						</div>	
						<div class="row">
							<div class="col-sm-12">
								<p class="ratings mr-5">11. Details of Imported and Indigenous Machinery for this Project<span style="color:red;">  (Rs in Lakhs)</span> &nbsp;&nbsp;&nbsp;&nbsp; <a style="color:green;" class="blink_me" href="<?php echo $this->Url->build('/', true)?>uploads/incentive_forms/tiic_incentive_building_details_format.docx" target="_blank">Format of Machinery Document Upload Form</a></p>
								<div class="field tablefield">
									<table class="table  table-responsive" id="machineryTable">
										<thead class="row-table">
											<tr>
												<th width="5%">S.No.</th>
												<th width="15%">Purchase Origin </th>
												<th width="25%"> Total Value of the Machinery <span style="color:red;"> (Rs in Lakhs)<span></th>
												<th width="25%">Document<span style="color:red;"> ( only PDF )<span> </th>
												<th width="30%">Remarks</th>
												
											</tr>
										</thead>
										<tbody>
											<?php if ($incentivePlantMachineries){ 
											foreach($incentivePlantMachineries as $key => $value){
												if($value['machinery_type']=='IMPORTED'){ ?>
											<tr>
												<td class="trcount">1</td>
												<td>
													<?php echo $this->Form->control('machinery_type[]',['label'=>false,'error' => false,'class'=>'no-icon trimspace','readonly'=>'readonly','required'=>'false','value'=>$machineryTypes['IMPORTED']]); ?>
														<?php echo $this->Form->control('import_machine_id',['label'=>false,'error' => false,'type'=>'hidden','value'=>$value['id']]); ?>
												</td>
												<td>
													<?php echo $this->Form->control('purchase_value[]',['label'=>false,'error' => false,'class'=>'no-icon num trimspace','maxlength'=>'10','required'=>'false','style'=>'text-align: right;padding-right:20px','value'=>$value['purchase_value']]); ?>
												</td>
												<td>
														<div class="field d-grid">
															<label class="upload" for="uploads">
															<div class="btn">
																 <?php echo $this->Form->control('imported_uploads[]',['id'=>'img-path','class'=>'form-control','type'=>'file','label'=>false,'error'=>false,'onchange'=>'validdocs(this)']);?>
																										   
																<span class="entypo-upload"></span>
															</div>
															</label>
															<a class="z-btn z-back mt-2" href="<?php echo $this->Url->build('/', true);?>uploads/incentive_files/<?php echo $value['file_path']; ?>" target="_blank">View</a>
														</div>
														
												</td>
												<td>
												<?php echo $this->Form->control('imported_remarks[]',['label'=>false,'error' => false,'type'=>'textarea','class'=>'no-icon specialfield trimspace','minlength'=>'2','maxlength'=>'70','required'=>'false','value'=>$value['imported_remarks']]); ?>
												</td>
												
											</tr>
											<?php }else if($value['machinery_type']=='INDIGENOUS'){ ?>
											<tr>
												<td class="trcount">2</td>
												<td>
													<?php echo $this->Form->control('machinery_type[]',['label'=>false,'error' => false,'class'=>'no-icon trimspace','required'=>'false','readonly'=>'readonly','value'=>$machineryTypes['INDIGENOUS']]); ?>
													<?php echo $this->Form->control('indigenous_machine_id',['label'=>false,'error' => false,'type'=>'hidden','value'=>$value['id']]); ?>
												</td>
												<td>
													<?php echo $this->Form->control('purchase_value[]',['label'=>false,'error' => false,'class'=>'no-icon num trimspace capacity_prior_expansion','maxlength'=>'10','required'=>'false','style'=>'text-align: right;padding-right:20px','value'=>$value['purchase_value']]); ?>
												</td>
												<td>
														<div class="field d-grid">
															<label class="upload" for="uploads">
															<div class="btn">
																 <?php echo $this->Form->control('indigenous_uploads[]',['id'=>'img-path','class'=>'form-control','type'=>'file','label'=>false,'error'=>false,'onchange'=>'validdocs(this)']);?>
																										   
																<span class="entypo-upload"></span>
															</div>
															</label>
														</div>
														<a class="z-btn z-back mt-2" href="<?php echo $this->Url->build('/', true);?>uploads/incentive_files/<?php echo $value['file_path']; ?>" target="_blank">View</a>
										
												</td>
												<td>
													<?php echo $this->Form->control('indigenous_remarks[]',['label'=>false,'error' => false,'type'=>'textarea','class'=>'no-icon specialfield trimspace','minlength'=>'2','maxlength'=>'70','required'=>'false','value'=>$value['indigenous_remarks']]); ?>
												</td>
												
											</tr>
											<?php } } }else{ ?>
											<tr>
												<td class="trcount">1</td>
												<td>
													<?php echo $this->Form->control('machinery_type[]',['label'=>false,'error' => false,'class'=>'no-icon trimspace','readonly'=>'readonly','required'=>'false','value'=>$machineryTypes['IMPORTED']]); ?>
													
												</td>
												<td>
													<?php echo $this->Form->control('purchase_value[]',['label'=>false,'error' => false,'class'=>'no-icon num trimspace','maxlength'=>'10','required'=>'false','style'=>'text-align: right;padding-right:20px']); ?>
												</td>
												<td>
														<div class="field d-grid">
															<label class="upload" for="uploads">
															<div class="btn">
																 <?php echo $this->Form->control('imported_uploads[]',['id'=>'img-path','class'=>'form-control','type'=>'file','label'=>false,'error'=>false,'onchange'=>'validdocs(this)']);?>
																										   
																<span class="entypo-upload"></span>
															</div>
															</label>
														</div>
														
												</td>
												<td>
												<?php echo $this->Form->control('imported_remarks[]',['label'=>false,'error' => false,'class'=>'no-icon specialfield trimspace','type'=>'textarea','minlength'=>'2','maxlength'=>'70','required'=>'false']); ?>
												</td>
												
											</tr>
											<tr>
												<td class="trcount">2</td>
												<td>
													<?php echo $this->Form->control('machinery_type[]',['label'=>false,'error' => false,'class'=>'no-icon trimspace','readonly'=>'readonly','required'=>'false','value'=>$machineryTypes['INDIGENOUS']]); ?>
												
												</td>
												<td>
													<?php echo $this->Form->control('purchase_value[]',['label'=>false,'error' => false,'class'=>'no-icon num trimspace capacity_prior_expansion','maxlength'=>'10','required'=>'false','style'=>'text-align: right;padding-right:20px']); ?>
												</td>
												<td>
														<div class="field d-grid">
															<label class="upload" for="uploads">
															<div class="btn">
																 <?php echo $this->Form->control('indigenous_uploads[]',['id'=>'img-path','class'=>'form-control','type'=>'file','label'=>false,'error'=>false,'onchange'=>'validdocs(this)']);?>
																										   
																<span class="entypo-upload"></span>
															</div>
															</label>
														</div>
														
												</td>
												<td>
													<?php echo $this->Form->control('indigenous_remarks[]',['label'=>false,'error' => false,'class'=>'no-icon specialfield trimspace','type'=>'textarea','minlength'=>'2','maxlength'=>'70','required'=>'false']); ?>
												</td>
												
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>									
							</div>
							</div>
						</div>
					</div>
					<input type="submit" name="next" class="send" value="Save & Continue" />
					<?php echo $this->Form->end() ?>

					</div>          
				</section>
			</div>
</div>  
