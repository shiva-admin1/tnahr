<?php echo $this->Form->create($incentiveDetail,['id'=>'declaration', "autocomplete"=>"off"]) ?>
<div class="incentiveDetails">
	<section id="slick">
		<div class="contact-form d-flex justify-content-center">
			<div class="w-100">
			<div class="row">
				
				<div class="col-sm-6">
					<h4 class="ratings mr-5"><?php echo __('1. Company Details') ?></h4>
					<table class="table table-borderless">
						<tr>
							<td><?php echo __('Name of the Company') ?></td>
							<td><?php echo h($incentiveDetail->company_name) ?></td>
						</tr>
						<tr>
							<td><?php echo __('Industry Type') ?></td>
							<td><?php echo h($incentiveDetail->industry_type->name) ?></td>
						</tr>
						<tr>
							<td><?php echo __('Product Type') ?></td>
							<td><?php echo h($incentiveDetail->product_type->name) ?></td>
						</tr>
						<tr>
							<td><?php echo __('Constitution') ?></td>
							<td>
							
							<?php if( $incentiveDetail->constitution_id == 7){ 
							
									echo h( $incentiveDetail->other_constitution_type);
									
								}else{
									echo h( $incentiveDetail->constitution->name);
								}
							?>
							
							</td>
						</tr>
						<tr>
							<td><?php echo __('Incentive Type applying for') ?></td>
							<td>
							<?php foreach ($incentiveApplicationTypes as $appkey =>$value):
								if($value['incentive_detail_id'] == $incentiveDetail->id){
								echo($value['incentive']); 
								
								
								} 
								endforeach;
								?>
							</td>
						</tr>
						<tr>
							<td>Unit Type</td>
							<td><?php echo h($incentiveDetail->company_unit_type->name) ?></td>
						</tr>
						<tr>
							<td><?php echo __('Unit Location') ?></td>
							<td>
							<?php echo $sipcotlocation ?>
							</td>
						</tr>
						<tr>
							<td><?php echo __('Website') ?></td>
							<td>
							<?php echo ($incentiveDetail->company_website !='')?$incentiveDetail->company_website : "---"; ?>
							</td>
						</tr>
					</table>
				</div>
				<div class="col-sm-6">
						<h4 class="ratings mr-5"><?php echo __('2. Contact Details ') ?></h4>
						<table class="table">
							<tr>
								<th><?php echo __(' Contact') ?></th>
								<th><?php echo __(' Name') ?></th>
								<th><?php echo __(' Mobile') ?></th>
								<th><?php echo __(' Email') ?></th>
								<th><?php echo __(' Landline') ?></th>
							</tr>
							
							<tr>
								<td><?php echo __('Company') ?></td>
								
								<td>
									---
								</td>
								<td>
									<?php echo h($incentiveDetail->company_mobile) ?>
								</td>
								<td>
									<?php echo h($incentiveDetail->company_email) ?>
								</td>
								<td>
									<?php echo $incentiveDetail->company_landline ?>
								</td>
							</tr>
							<tr>
								<td><?php echo __(' Authorized Contact') ?></td>
								
								<td>
									<?php echo h($incentiveDetail->contact_person_name) ?>
								</td>
								<td>
									<?php echo h($incentiveDetail->contact_mobile_no) ?>
								</td>
								<td>
									<?php echo h($incentiveDetail->contact_person_email) ?>
								</td>
								<td>
									---
								</td>
							</tr>
						</table>
					</div>
			</div>
			<div class="row">
				
				<div class="col-sm-6">
					<h4 class="ratings mr-5"><?php echo __('3. Registered Office Address') ?></h4>
					<table class="table table-borderless">
						<tr>
							<td><?php echo __('Building / Survey No. or Name') ?></td>
							<td><?php echo $this->Text->autoParagraph(h($incentiveDetail->company_address)); ?></td>
						</tr>
						<tr>
							<td><?php echo __('Street Name') ?></td>
							<td>
								<?php echo h($incentiveDetail->company_street_name) ?>
							</td>
						</tr>
						<tr>
							<td><?php echo __('Village/Town/CIty') ?></td>
							<td>
								<?php echo h($incentiveDetail->company_village) ?>
							</td>
						</tr>
						<tr>
							<td><?php echo __('Taluk') ?></td>
							<?php if($incentiveDetail->company_other_taluk_name != ''){ ?>
								<td>
									<?php echo $incentiveDetail->company_other_taluk_name ?>
								</td>
							<?php }else{ ?>
								<td>
									<?php echo $incentiveDetail->taluk->name ?>
								</td>
							<?php } ?>
						</tr>
						<tr>
							<td><?php echo __('District') ?></td>
							<?php if($incentiveDetail->company_other_district_name != ''){ ?>
								<td>
									<?php echo $incentiveDetail->company_other_district_name ?>
								</td>
							<?php }else{ ?>
								<td>
									<?php echo $incentiveDetail->district->name ?>
								</td>
							<?php } ?>
							
						</tr>
						<tr>
							<td><?php echo __('State') ?></td>
							<td>
								<?php echo h( $incentiveDetail->state->name) ?>
							</td>
						</tr>
						<tr>
							<td><?php echo __('Pincode') ?></td>
							<td>
								<?php echo $incentiveDetail->company_pincode ?>
							</td>
						</tr>
					</table>
				</div>
				<div class="col-sm-6">
					<h4 class="ratings mr-5"><?php echo __('4. Details of Registration') ?></h4>
						<table class="table table-borderless">

							<tr>
								<td><?php echo __('SIA / Udyog Adhar') ?></td>
								<td><?php echo h($incentiveDetail->dor_sia_udyog_no) ?></td>
							</tr>
							<tr>
								<td><?php echo __(' ROC / Firm Registration Certificate') ?></td>
								<td><?php echo h($incentiveDetail->dor_roc_frim_registration_no) ?></td>
							</tr>
							<tr>
								<td><?php echo __(' GSTIN') ?></td>
								<td><?php echo h($incentiveDetail->dor_gstin_no) ?></td>
							</tr>
							<tr>
								<td><?php echo __(' PAN') ?></td>
								<td><?php echo h($incentiveDetail->dor_pan_no) ?></td>
							</tr>
							<tr>
								<td><?php echo __(' TIN') ?></td>
								<td><?php echo h($incentiveDetail->dor_tin_no) ?></td>
							</tr>
							<tr>
								<td><?php echo __(' CIN') ?></td>
								<td><?php echo h($incentiveDetail->dor_cin_no) ?></td>
							</tr>
						</table>
					</div>
					
			</div>
			<div class="row">
				<div class="col-sm-5">
					<h4 class="ratings mr-5"><?php echo __('5. Location of Factory Units') ?></h4>
					<table class="table">
						<tr>
							<th width="80%" colspan=2 class="text-center" scope="col"><?php echo __('Address') ?></th>
							<th width="20%" scope="col"><?php echo __('IS Incentive applying for this Unit') ?></th>
						</tr>
						<?php $i=1; 
									foreach ($incentiveFactoryUnits as $fu => $value): 
									
									?>
												
						<tr>
							<td>
								<b>Street Name<br>
								Village/Town/City <br>
								Taluk<br>
								District<br>
								Pincode </b>	<br>
							</td>
							<td width="60%">
								<?php echo h($value['address']); ?><br>
								<?php echo h($value['village']); ?><br>
								<?php echo h($value['taluk']['name']); ?><br>
								<?php echo h($value['district']['name']); ?><br>
								<?php echo h($value['pincode']); ?>	<br>
							</td>
							<td>
							<?php echo ($value['is_incentive_applying_for'] ==1)?" YES":"NO" ; ?>
							</td>
						</tr>
						<?php  $i++;  endforeach; ?>
					</table>
				</div>
				<div class="col-sm-7">
					<h4 class="ratings mr-5"><?php echo __('6 a. Details of Directors of the Company') ?></h4>
					<?php if (!empty($incentiveDetail->incentive_shareholdings)){ ?>
						<table   class="table">
							<tr>
								<th width="5%" scope="col"><?php echo __('S.NO') ?></th>
								<th width="30%" scope="col"><?php echo __('Name') ?></th>
								<th width="10%" scope="col"><?php echo __('Age') ?></th>
								<th width="15%" scope="col"><?php echo __('Percentage Of Shareholding') ?></th>
								<th width="10%" scope="col"><?php echo __('Whether Professional Director') ?></th>
								<th width="30%" scope="col"><?php echo __('DIN') ?></th>
							</tr>
							<?php $i=1; 
							foreach ($incentiveDetail->incentive_shareholdings as $incentiveShareholdings): 
							if ($incentiveShareholdings->is_active ==True){
							?>
							<tr>
								<td><?php echo h($i) ?></td>
								<td><?php echo h($incentiveShareholdings->shareholder_name) ?></td>
								<td><?php echo h($incentiveShareholdings->age) ?></td>
								<td style="text-align:right"><?php echo h($incentiveShareholdings->percentage_of_shareholding) ?></td>
								<td style="text-align:right"><?php echo h($incentiveShareholdings->is_professional_director) ?></td>
								<td style="text-align:right"><?php echo h($incentiveShareholdings->din) ?></td>
							</tr>
							<?php  $i++; } endforeach; ?>
						</table>
					<?php }else{ echo "Shareholding details not provided." ;} ?>
					
						<h4 class="ratings mr-5"><?php echo __("6 b. Details of the Shareholding of the Company ") ?></h4>
						<?php if($incentiveDetail->directors_shareholding_doc){ ?>
								<a class="z-btn z-back mt-2" href="<?php echo $this->Url->build('/', true);?>uploads/shareholders/<?php echo $incentiveDetail->directors_shareholding_doc; ?>" target="_blank">View</a>
						<?php }else{ echo "Details not provided." ;} ?>			
						
						<h4 class="ratings mr-5"><?php echo __("6 c. Details of the unit in which the present promoters associated") ?></h4>
						<?php if($incentiveDetail->details_of_unit_present_director){ ?>
							<?php echo $incentiveDetail->details_of_unit_present_director; ?>
					 <?php }else{ echo "Details not provided." ;} ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-10">
					<h4 class="ratings mr-5"><?php echo __('7.Details of Land for this Project') ?><span style="color:red;"> (Rs in Lakhs) </span></h4>
					<table   class="table">
							<tr>
								<th width="3%" scope="col"><?php echo __('S.NO') ?></th>
								<th width="10%" scope="col"><?php echo __('Land Type') ?></th>
								<th width="22%" scope="col"><?php echo __('Address') ?></th>
								<th width="10%" scope="col"><?php echo __('Area') ?></th>
								<th width="12%" scope="col"><?php echo __('Total Guidline Value (Rs in Lakhs)') ?></th>
								<th width="12%"scope="col"><?php echo __('Total Document Value (Rs in Lakhs)') ?></th>
								</tr>
							<?php if (!empty($incentiveDetail->land_location_details)){ ?>
							<?php $i=1; 
							foreach ($incentiveDetail->land_location_details as $incentiveShareholdings): 
							if ($incentiveShareholdings->is_active ==True){
							?>
							<tr>
								<td><?php echo h($i) ?></td>
								<td><?php echo h($incentiveShareholdings->land_type) ?></td>
								<td style="text-align:right"><?php echo h($incentiveShareholdings->address) ?></td>
								<td style="text-align:right"><?php echo h($incentiveShareholdings->total_area) ?>&nbsp;<?php echo h($incentiveShareholdings->area_metrics) ?></td>
								<td style="text-align:right"><?php echo h($incentiveShareholdings->guideline_value_if_own) ?></td>
								<td style="text-align:right"><?php echo h($incentiveShareholdings->document_value_if_own) ?></td>
							</tr>
							<?php  $i++; } endforeach; ?>
							<?php }else{ ?>
								<tr><td  style="text-align:center" colspan="5"> No Data Provided</td></tr>
							<?php } ?>
						</table>
				</div>			
			</div>
			<div class="row">
				<div class="col-sm-8">
					<h4 class="ratings mr-5"><?php echo __('8.Details of Building for this Project') ?><span style="color:red;"> (Rs in Lakhs) </span></h4>
						<table   class="table">
							<tr>
								<th width="5%" scope="col"><?php echo __('S.NO') ?></th>
								<th width="20%" scope="col"><?php echo __('Total Area Building Constructed (in Sq.ft)') ?></th>
								<th width="20%" scope="col"><?php echo __('Total Building Cost (Rs in Lakhs)') ?></th>
								<th width="20%" scope="col"><?php echo __('Document') ?></th>
								<th width="40%" scope="col"><?php echo __('Remarks') ?></th>
							</tr>
							<?php if (!empty($incentiveDetail->incentive_building_details)){ ?>
					
							<?php $i=1; 
							foreach ($incentiveDetail->incentive_building_details as $incentiveShareholdings): 
							if ($incentiveShareholdings->is_active ==True){
							?>
							<tr>
								<td><?php echo h($i) ?></td>
								<td style="text-align:right"><?php echo h($incentiveShareholdings->construction_area) ?></td>
								<td style="text-align:right"><?php echo h($incentiveShareholdings->construction_value) ?></td>
								<td><a class="z-btn z-back mt-2" href="<?php echo $this->Url->build('/', true);?>uploads/incentive_files/<?php echo $incentiveShareholdings->file_path; ?>" target="_blank">View</a>
								</td>
								<td><?php echo h($incentiveShareholdings->building_remarks) ?></td>
							</tr>
							<?php  $i++; } endforeach; ?>
							<?php }else{ ?>
								<tr><td  style="text-align:center" colspan="5"> No Data Provided</td></tr>
							<?php } ?>
						</table>
					
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">
					<h4 class="ratings mr-5"><?php echo __('9.Details of Machinery for this Project') ?><span style="color:red;"> (Rs in Lakhs) </span></h4>
						<table   class="table">
							<tr>
								<th width="5%"  scope="col"><?php echo __('S.NO') ?></th>
								<th width="10%" scope="col"><?php echo __('Purchase Origin') ?></th>
								<th width="12%" scope="col"><?php echo __('Total Machinery Value(Rs in Lakhs)') ?></th>
								<th width="12%" scope="col"><?php echo __('Document') ?></th>
								<th width="12%" scope="col"><?php echo __('Remarks') ?></th>
							</tr>
							<?php if (!empty($incentiveDetail->incentive_plant_machineries)){ ?>
								<?php $i=1; 
								foreach ($incentiveDetail->incentive_plant_machineries as $machineries): 
								if (($machineries->is_active ==True) && ($machineries->machinery_type =='IMPORTED')){
								?>
							<tr>
								<td><?php echo h($i) ?></td>
								<td style="text-align:left"><?php echo h($machineries->machinery_type) ?></td>
								<td style="text-align:right"><?php echo h($machineries->purchase_value) ?></td>
								<td><a class="z-btn z-back mt-2" href="<?php echo $this->Url->build('/', true);?>uploads/incentive_files/<?php echo $machineries->file_path; ?>" target="_blank">View</a>
								</td>
								<td style="text-align:right"><?php echo h($machineries->imported_remarks) ?></td>
							</tr>
							<?php  }else if(($machineries->is_active ==True) && ($machineries->machinery_type =='INDIGENOUS')){ ?>
							<tr>
								<td><?php echo h($i) ?></td>
								<td style="text-align:left"><?php echo h($machineries->machinery_type) ?></td>
								<td style="text-align:right"><?php echo h($machineries->purchase_value) ?></td>
								<td><a class="z-btn z-back mt-2" href="<?php echo $this->Url->build('/', true);?>uploads/incentive_files/<?php echo $machineries->file_path; ?>" target="_blank">View</a>
								</td>
								<td style="text-align:right"><?php echo h($machineries->indigenous_remarks) ?></td>
							</tr>
							
							<?php  } $i++; endforeach; ?>
							<?php }else{ ?>
								<tr><td  style="text-align:center" colspan="5"> No Data Provided</td></tr>
							<?php } ?>
						</table>
					
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<h4 class="ratings mr-5"><?php echo __('10. Details of the investment made on the assets of the unit ') ?> <span style="color:red;"> (Rs in Lakhs) </span></h4>
						<table   class="table">
							<tr>
								<th width="5%" scope="col"><?php echo __('S.NO') ?></th>
								<th width="35%" scope="col"><?php echo __('Asset') ?></th>
								<th width="20%" scope="col"><?php echo __('Funded by Bank / Financial Institute (Rs in Lakhs)') ?></th>
								<th width="20%" scope="col"><?php echo __('Own Fund (Rs in Lakhs)') ?></th>
								<th width="20%" scope="col"><?php echo __('Amount Invested (Rs in Lakhs)') ?></th>
							</tr>
						<?php if (!empty($incentiveDetail->incentive_asset_investments)){ ?>
							<?php $i=1; 
							foreach ($incentiveDetail->incentive_asset_investments as $incentiveShareholdings): 
							if ($incentiveShareholdings->is_active ==True){
							?>
							<tr>
								<td><?php echo h($i) ?></td>
								<td><?php echo h($incentiveShareholdings->asset_name) ?></td>
								<td style="text-align:right"><?php echo h($incentiveShareholdings->total_bank_fi_fund_amount) ?></td>
								<td style="text-align:right"><?php echo h($incentiveShareholdings->total_own_fund_amount) ?></td>
								<td style="text-align:right"><?php echo h($incentiveShareholdings->total_investment_amount) ?></td>
								
							</tr>
							<?php  $i++; } endforeach; ?>
							<?php }else{ ?>
								<tr><td  style="text-align:center" colspan="5"> No Data Provided</td></tr>
							<?php } ?>
						</table>
					
				</div>
				<div class="col-sm-6">
					<h4 class="ratings mr-5"><?php echo __('11. Details of Product Manufactured & Capacity for this Project') ?></h4>
						<table class="table table-borderless">
								<tr>
									<td><?php echo __('Product Manufactured ') ?></td>
									<td><?php echo h($incentiveDetail->manufactured_product) ?></td>
								</tr>
								<?php if($incentiveDetail->manufactured_product=='New'){ ?>
								<tr>
									<td><?php echo __('Installed Capacity ') ?></td>
									<td><?php echo h($incentiveDetail->installed_capacity) ?> &nbsp;&nbsp; <?php echo h($incentiveDetail->installed_capacity_metrics) ?></td>
								</tr>
								<?php }else{ ?>
								<tr>
									<td><?php echo __('Existing Installed Capacity (Prior to Expansion)  ') ?></td>
									<td><?php echo h($incentiveDetail->existing_installed_capacity) ?>&nbsp;&nbsp; <?php echo h($incentiveDetail->existing_installed_capacity_metrics) ?></td>
								</tr>
								<tr>
									<td><?php echo __('Existing (After to Expansion)') ?></td>
									<td><?php echo h($incentiveDetail->existing_prior_expansion_capacity) ?>&nbsp;&nbsp; <?php echo h($incentiveDetail->existing_prior_expansion_capacity_metrics) ?></td>
								</tr>
								<tr>
									<td><?php echo __('Additional Capacity as part of the expansion') ?></td>
									<td><?php echo h($incentiveDetail->expansion_capacity) ?>&nbsp;&nbsp; <?php echo h($incentiveDetail->expansion_capacity_metrics) ?></td>
								</tr>
								<?php } ?>
						</table>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<h4 class="ratings mr-5"><?php echo __('12. Details of Project Implementation for this Project') ?></h4>
					<table class="table table-borderless">
						<tr>
							<td><?php echo __(' Project Implemented with ') ?></td>
							<td><?php echo h($incentiveDetail->project_implementation_type) ?></td>
						</tr>
						<tr>
							<td><?php echo __('Investment in eligible Fixed assets (during the investment period as per G.O)') ?></td>
							<td><?php echo h($incentiveDetail->investment_on_fixed_asset_period) ?></td>
						</tr>
							
					</table>
				</div>
				<div class="col-sm-6">
					<h4 class="ratings mr-5"><?php echo __('13. Details of Commercial Commencement for this Project') ?></h4>
						<table class="table table-borderless">								
							<tr>
								<td><?php echo __('Date of Commencement of Commercial Production') ?></td>
								<td><?php echo date('d-m-Y', strtotime(($incentiveDetail->commencement_of_commericial_production_date))) ?></td>
							</tr>
							<tr>
								<td><?php echo __('Date of First Sale Invoice') ?></td>
								<td><?php echo date('d-m-Y', strtotime(($incentiveDetail->date_of_first_sale_invoice))) ?></td>
							</tr>
							<?php if($incentiveDetail->company_unit_type_id != 1 ){?>
							<tr>
								<td><?php echo __('Previous Date of Commercial Production ') ?></td>
								<td><?php echo date('d-m-Y', strtotime(($incentiveDetail->previous_commencement_of_commericial_production_date))) ?></td>
							</tr>
							<?php }?>
							<tr>
								<td><?php echo __('Details of First Invoice for this Project') ?></td>
								<td><?php echo h($incentiveDetail->details_of_first_invoice) ?></td>
								</tr>
						</table>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-10">
					<h4 class="ratings mr-5"><p>14. Details of subsidy application registered if any, for this project with other institutions <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/agency of the Central / State Government / any other agencies  for this project') </p></h4>
					<table class="table">
						<tr>
							<td style="border:1px solid #d9d7ce;"><?php echo h($incentiveDetail->details_of_subsity_from_other_agencies)?$incentiveDetail->details_of_subsity_from_other_agencies:"No Data Provided" ?></td>
						</tr>
					</table>
				</div>
			</div>	
			<?php if($incentiveDetail['project_implementation_type'] != 'Own Fund'){ ?> 
			<div class="row">
				<div class="col-sm-10">
					<h4 class="ratings mr-5"><?php echo __('15 a. Details of Financial Assistance with Bank / Financial Institute for this Project') ?> <span style="color:red;"> (Rs in Lakhs) </span></h4>
					<table  class="table">
							<tr>
								<th scope="col" rowspan =2>S.No.</th>
								<th scope="col" rowspan =2>Name of the Bank / FI</th>
								<th scope="col" rowspan =2>Date of Sanctioned</th>
								<th scope="col" rowspan =2>Amount Sanctioned</th>
								<th scope="col" rowspan =2>Amount Disbursed</th>
								<th scope="col" colspan =2>Amount Outstanding</th>
								<th scope="col" colspan =2>Amount Overdue, if any</th>
							</tr>
							<tr>
								<th>Principal</th>
								<th>Interest</th>														
								<th>Principal</th>
								<th>Interest</th>
							</tr>
							
							
							<?php if ($incentiveDetail->incentive_financial_assistances){ ?>
								<?php $i=1; 
								foreach ($incentiveDetail->incentive_financial_assistances as $incentiveShareholdings): 
								if ($incentiveShareholdings->is_active ==True){
								?>
							<tr>
								<td class="trcount"><?php echo $i; ?></td>
								<td>
									<?php echo ($incentiveShareholdings->bank_name); ?>
									<?php echo ($incentiveShareholdings->name_of_bank_fi); ?>
									
								</td>
								<td>
									<?php echo ($this->Time->format($incentiveShareholdings->date_of_sanction,'d-M-Y')); ?>
								</td>
								<td style="text-align:right">
									<?php echo ($incentiveShareholdings->amount_sanctioned); ?>
								</td>
								<td style="text-align:right">
									<?php echo ($incentiveShareholdings->amount_disbursed); ?>
								</td>
								<td style="text-align:right">
									<?php echo ($incentiveShareholdings->outstanding_principle); ?>
								</td>
								<td style="text-align:right">
									<?php echo ($incentiveShareholdings->outstanding_interest); ?>
								</td>
								<td style="text-align:right">
									<?php echo ($incentiveShareholdings->overdue_principle); ?>
								</td>
								<td style="text-align:right">
									<?php echo ($incentiveShareholdings->overdue_interest); ?>
								</td>
							</tr>
							<?php  $i++; } endforeach; ?>
							<?php }else{ ?>
								<tr><td  style="text-align:center" colspan="9"> No Data Provided</td></tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<?php }else{ echo "15 a. Details of Financial Assistance Not Applicable"; } ?>
			<?php if(array_intersect($incentiveApplicationTypeIDs,array(3,4))){?>
			<div class="row">
				<div class="col-sm-6">
					<h4 class="ratings mr-5"><?php echo __('15 b. Details of Last Three Years Prodution & Sale  for this Project') ?></h4>
					<table  class="table">
						<tr>
								<th style="text-align:center;"  width="5%">S.No.</th>
								<th style="text-align:center;" width="30%">Sale Period </th>
								<th style="text-align:center;" width="20%">Financial Year </th>
								<th style="text-align:center;" width="45%">Details of Prodution & Sale </th>												
									
						</tr>
						<?php if ($productionSales){ $i=0;
						foreach($productionSales as $key => $value){ ?>
						<tr>
							<td class="trcount"><?php echo $key+1; ?></td>
							<td>
								<?php echo $value['sale_period']; ?>
							
							</td>
							<td>
							<?php echo $value['financial_year']; ?>
							
							</td>
							<td>
								<?php echo $value['details_of_prodution_sale']; ?>
							
							</td>
						</tr>
							<?php  $i++; }  ?>
							<?php }else{ ?>
								<tr><td  style="text-align:center" colspan="4"> No Data Provided</td></tr>
							<?php } ?>
					</table>
				</div>
				<div class="col-sm-6">
					<h4 class="ratings mr-5"><?php echo __('15 c.Details of Last Three Years  VAT & CST remitted  for this Project') ?></h4>
					<table  class="table">
						<tr>
							<th style="text-align:center;" width="5%">S.No.</th>
							<th style="text-align:center;" width="30%">Tax Period </th>
							<th style="text-align:center;" width="20%">Financial Year </th>
							<th style="text-align:center;" width="45%">Details of VAT & CST remitted </th>
											
						</tr>
						<?php if ($taxDetails){ $i=0;
						foreach($taxDetails as $key => $value){ ?>
						<tr>
							<td class="trcount"><?php echo $key+1; ?></td>
							<td>
								<?php echo $value['tax_period']; ?>
							</td>
							<td>
								<?php echo $value['financial_year']; ?>
							</td>
							<td>
								<?php echo $value['details_of_tax']; ?>
							</td>
						</tr>
							<?php  $i++; }  ?>
							<?php }else{ ?>
								<tr><td  style="text-align:center" colspan="4"> No Data Provided</td></tr>
							<?php } ?>
					</table>
				</div>
			</div>	   
			<?php } ?>
			<div class="row">
				<div class="col-sm-10">
					<h4  style="text-align:center;" class="ratings mr-5"><?php echo __('INVESTMENTS MADE IN ELIGIBLE FIXED ASSETS FOR THE PROJECT FOR THE PERIOD FROM '.$incentiveDetail->investment_on_fixed_asset_from_period.' TO '.$incentiveDetail->investment_on_fixed_asset_to_period) ?></h4>
						
				</div>
			</div>
			<div class="row">
				<div class="col-sm-5">
					<h4 class="ratings mr-5"><?php echo __('16.Cost of the Project  for this Project') ?><span style="color:red;"> (Rs in Lakhs) </span></h4>
					<table  class="table">
						<tr>
							<th style="text-align:center"><?php echo __('Project Cost Type') ?></th>
							<th style="text-align:center"><?php echo __('Amount in Lakhs') ?></th>
						</tr>
						<?php 
							if($incentiveProjectCosts){
							$i=1; 
							foreach ($incentiveProjectCosts  as $key => $incentiveProducts): 
							
							?>
						 <tr>
							<td width="10%"><?php print_r($incentiveProducts['project_cost_type']['name']); ?></td>
							<td width="5%" style="text-align:right"><?php echo $this->Number->format($incentiveProducts['amount']) ?></td>
						</tr>
						<?php  $i++;  endforeach; ?>
						
						<?php }else{ ?>
								<tr><td  style="text-align:center" colspan="2"> No Data Provided</td></tr>
							<?php } ?>
						<tr>
							<th><?php echo __('Total Cost of Project') ?></th>
							<th style="text-align:right"><?php echo $this->Number->format($incentiveDetail->total_project_cost) ?></th>
						</tr>        
					</table>
				</div>
				<div class="col-sm-5">
					<h4 class="ratings mr-5"><?php echo __('17.Means of Finance  Details for this Project') ?><span style="color:red;"> (Rs in Lakhs) </span></h4>
					<table  class="table">
						<tr>
							<th style="text-align:center"><?php echo __('MOF Type') ?></th>
							<th style="text-align:center"><?php echo __('Amount (Rs in Lakhs)') ?></th>
						</tr>
						<?php 
							if($incentiveMeansOfFinances){
							$i=1; 
							foreach ($incentiveMeansOfFinances  as $key => $mof): 
							
							?>
						 <tr>
							<td width="10%"><?php print_r($mof['means_of_finance_type']['name']); ?></td>
							<td width="5%" style="text-align:right"><?php echo $this->Number->format($mof['amount']) ?></td>
						</tr>
						<?php  $i++;  endforeach; ?>
						<?php }else{ ?>
								<tr><td  style="text-align:center" colspan="2"> No Data Provided</td></tr>
							<?php } ?>
						<tr>
							<th><?php echo __('Total Means of Finance') ?></th>
							<th style="text-align:right"><?php echo $this->Number->format($incentiveDetail->total_mof_cost) ?></th>
						</tr>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<h4 class="ratings mr-5"><?php echo __('18.Employee  Details for this Project') ?></h4>
					<table  class="table">
						<tr>
							<th>Employee Type</th>
							<th>No of Employees</th>
						</tr>
						 <?php 
								if($incentiveEmployeeDetails){
								$i=1; 
								foreach ($incentiveEmployeeDetails as $emp => $employees): 
								
								?>
							 <tr>
								<td width="10%"><?php echo($employees['employee_type']['name']); ?></td>
								<td width="5%" style="text-align:right"><?php echo $this->Number->format($employees['emp_count']) ?></td>
							</tr>
							<?php  $i++;  endforeach; ?>
							<?php }else{ ?>
								<tr><td  style="text-align:center" colspan="2"> No Data Provided</td></tr>
							<?php } ?>
							<tr>
						<th><?php echo __('Total no of Employees') ?></th>
						<th style="text-align:right"><?php echo $this->Number->format($incentiveDetail->total_no_of_employees) ?></th>
						</tr>
					</table>
				</div>
				<div class="col-sm-8 ">
					<h4 class="ratings mr-5"><?php echo __('19. Statutory Approvals') ?></h4>
						<table  class="table">
							<tr>
								<th><?php echo __('S.NO') ?></th>
								<th><?php echo __('Document Type') ?></th>
								<th><?php echo __('Approval Date') ?></th>
								<th><?php echo __('Approving Authority') ?></th>
								<th><?php echo __('Document') ?></th>
								<th><?php echo __('Remarks') ?></th>
							</tr>
							<?php
							if($statutoryApprovals){
							$i=1; 
							foreach ($statutoryApprovals as $key => $value):  
							?>
								<tr>
									<td><?php echo h($i) ?></td>
									<td><?php echo h($value->document_name) ?></td>
									<td><?php echo date('d-m-Y',strtotime($value->approval_date)); ?></td>
									<td><?php echo h($value->approving_authority) ?></td>
									<td><a class="z-btn z-back mt-2" href="<?php echo $this->Url->build('/', true);?>uploads/statutory_approvals/<?php echo $value['file_path']; ?>" target="_blank">View</a>
																</td>
									<td><?php echo h($value->applicant_remarks) ?></td>
									</tr>
							<?php  $i++; endforeach; ?>
							<?php }else{ ?>
								<tr><td  style="text-align:center" colspan="6"> No Data Provided</td></tr>
							<?php } ?>
						</table>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-8 ">
					<h4 class="ratings mr-5"><?php echo __('20. Document Enclosers') ?></h4>
					<table  class="table table-responsive">
						<tr>
							<th scope="col"><?php echo __('S.NO') ?></th>
							<th scope="col"><?php echo __('Document Type') ?></th>
							<th scope="col"><?php echo __('Document') ?></th>
							<th scope="col"><?php echo __('Remarks') ?></th>
						</tr>
						<?php 
						if($incentiveFiles_dtls){
						$i=1; 
						foreach ($incentiveFiles_dtls as $key => $value):  
						?>
							<tr>
								<td><?php echo h($i) ?></td>
								<td><?php echo h($value->incentive_document_type->name) ?></td>
								<td><a class="z-btn z-back mt-2" href="<?php echo $this->Url->build('/', true);?>uploads/incentive_files/<?php echo $value['img_path']; ?>" target="_blank">View</a>
															</td>
								<td><?php echo h($value->applicant_remarks) ?></td>
							</tr>
						<?php  $i++; endforeach; ?>
						<?php }else{ ?>
								<tr><td  style="text-align:center" colspan="4"> No Data Provided</td></tr>
							<?php } ?>
					</table>
				</div>
			</div>
			<div class="row">	
				<div class="col-sm-8 ">
					<h4 class="ratings mr-5"><?php echo __('21.Payment Details') ?></h4>
					<table  class="table table-responsive">
						<tr>
							<th>Payment</th>
							<th>Amount</th>
						</tr>
						<tr>
							<td><strong>Processing Fee (Rs)</strong></td>
							<td style="text-align:right">
							<?php echo formatInIndianStyle($incentiveDetail->processing_fee,false,true,false);?>
							</td>
						</tr>
						<tr>
							<td><strong>GST (Rs)</strong></td>
							<td style="text-align:right">
							<?php echo formatInIndianStyle($incentiveDetail->gst_amount,false,true,false);?>
							</td>
							
						</tr>
						<tr>
							<th><strong>Total Fee (Rs)</strong></th>
							<th style="text-align:right">
							<?php echo formatInIndianStyle($incentiveDetail->payment_amount,false,true,false);?>
							</th>
						</tr>		
					</table>
				</div>
			</div>
			<div class="relate">
					<h4 class="ratings mr-5"></h4>
					<table class="table table-borderless" id="productsTable">
						<tr>
							<td>
								<?php echo $this->Form->input('terms', ['templates'=> ['inputContainer' => '{{content}}'],'type'=>'checkbox','id'=>'terms-agree','label'=>false,'value'=>1,'div'=>false] ); ?>
								<label for='terms-agree' class="tick" ><span><?php echo "I/We hereby declare that the information given above is true and correct.";?></span></label>

							</td>
						</tr>
					</table>
					
				</div>
				
			<div class="row">
				<div class="col-sm-12">							
					<div class="field text-center">
						<span class="blink_me" style="color:red;"> 
						 Please verify and make sure the details, document attachments and values given for this project (incentive applying for) only. The application once submitted, you cannot edit anymore. 
						<span>										
					</div>
				</div>
			</div>
			<div class="clrfx col-sm-12 p-0">
				<div class="row">
					<div class="col-sm-12">
						<input type="submit" name="next" class="send" value="Submit Application" />
					</div>
				</div>
			</div>
			
			<?php echo $this->Form->end(); ?>	
			</div>
		</div>
	</section>
</div>

<?php 
function formatInIndianStyle($num =0,$rs=true,$decimal=true,$tag =true){
	$num = round($num,2);
	$pos = strpos((string)$num, ".");
	if (($pos === false) && ($decimal===true)) {
		$decimalpart=".00";
	}
	if (!($pos === false)) {
		// $decimalpart= ".".substr($num, $pos+1, 2); $num = substr($num,0,$pos);
		$decimalpart= ".".str_pad(substr($num, $pos+1, 2),2,0,STR_PAD_RIGHT); $num = substr($num,0,$pos);
	}

	if(strlen($num)>3 & strlen(round($num)) <= 15){
		$last3digits = substr($num, -3 );
		$numexceptlastdigits = substr($num, 0, -3 );
		$formatted = makeComma($numexceptlastdigits);
		$stringtoreturn = $formatted.",".$last3digits.$decimalpart ;
	}elseif(strlen($num)<=3){
		$stringtoreturn = $num.$decimalpart ;
	}elseif(strlen(round($num))>9){
		$last3digits = substr($num, -3 );
		$numexceptlastdigits = substr($num, 0, -3 );
		$cnumber = substr($numexceptlastdigits, 0, -4 );
		$numexceptlastdigits =  ($numexceptlastdigits - $cnumber10000 );
		$formatted = makeComma($numexceptlastdigits);
		$stringtoreturn = $cnumber.",".$formatted.",".$last3digits.$decimalpart ;
	}

	if(substr($stringtoreturn,0,2)=="-,"){
		$stringtoreturn = "---".substr($stringtoreturn,2 );
	}

	if($tag)
	{
		if($rs)
			return "<span style='float:left'>&nbsp;Rs.</span>&nbsp;".$stringtoreturn;
		else
			return "<span style='float:right'>".$stringtoreturn."</span>";
	}
	else
	{
		if($rs)
			return "Rs.&nbsp;".$stringtoreturn;
		else
			return $stringtoreturn;
	}
}
function makeComma($input){
	// This function is written by some anonymous person - I got it from Google
	if(strlen($input)<=2)
	{ 
		return $input; 
	}
	$length=substr($input,0,strlen($input)-2);
	$formatted_input = makeComma($length).",".substr($input,-2);
	return $formatted_input;
}
?>