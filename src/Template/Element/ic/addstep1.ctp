
<div>
	<section id="slick">
		<!-- Contact form -->
		<div class="contact-form">
			<?php echo $this->Form->create($incentiveDetail,['id'=>'basic', "autocomplete"=>"off"]) ?>	
				<div class="w-100">
				<!-- Form fields -->
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
							
								<p class="ratings mr-5 blink_me"> <span  style="color:red;"> Note : </span> Ineligible <span style="color:red;">*</span>Projects  for incentive </p>
								<div class="field">
									<span style="color:red;"> 
									Sugar Mills, Edible Oil Industries, Rice, Wheat and Flour Mills, Mineral Water and Aerated Soft Drinks, Alcoholic Beverages, Fertilizer and animal feed manufacturing, Mining and Beneficiation, Steel re-rolling, Steeel fabrication, stainless steel utensils, Tobacco processing, cigaratte or beedi Manufacturing,
									Timber or wood processing, Service or repair facilities, Service sector, Cement Industry,Power Generration projects and any other industries as may be notified by Government from time to time.
									
									<span>
									
								</div>
							</div>
						</div>
							<div class="row">
							<div class="col-sm-1">
							</div>
							<div class="col-sm-5">
								<p class="ratings mr-5">1 a. Type of Incentive </p>
								<div class="field">
									<?php echo $this->Form->control('incentive_type_id', ['label'=>false,'style'=>"width: 400px;",'class'=>'js-select2 mselect','required'=>'true','options' => $incentiveTypes,'multiple'=>'multiple','value'=>$incentiveApplicationTypes]); ?>
									
									<span class="slick-tip left">Type of Incentive</span>
								</div>
								<p class="ratings mr-5">2 a. Name of the Company</p>
								<div class="field">
									<?php echo $this->Form->control('company_name',['label'=>false,'error' => false,'class'=>'specialfield trimspace','required'=>'true', "autocomplete"=>"fddf",'placeholder'=>"Name of the Unit",'value'=>$incentiveDetail['company_name']]); ?>
									<span class="entypo-user icon"></span>
									<span class="slick-tip left">Name of the Unit</span>
								</div>								
								<p class="ratings mr-5">2 b. Unit Type</p>
								<div class="field">
									<?php echo $this->Form->control('company_unit_type_id',['label'=>false,'error' => false,'class'=>'trimspace','required'=>'true', "autocomplete"=>"fddf",'empty'=>'Select Unit Type']); ?>
									<span class="entypo-user icon"></span>
									<span class="slick-tip left">Unit Type*</span>
								</div>								
								<p class="ratings mr-5">3. Registered Office Address </p>
								<div class="field">
									<?php echo $this->Form->control('company_address',['label'=>false,'error' => false,'type'=>'text','class'=>'specialfield trimspace','required'=>'true', "autocomplete"=>"fddf",'placeholder'=>"Building / Survey No. or Name"]); ?>
									
									<span class="entypo-user icon"></span>
									<span class="slick-tip left">Building / Survey No or Name</span>
								</div>
								<div class="field">
									<?php echo $this->Form->control('company_street_name',['label'=>false,'error' => false,'required'=>'true','class'=>'specialfield trimspace', "autocomplete"=>"fddf",'placeholder'=>"Street Name / No"]); ?>
									<span class="entypo-user icon"></span>
									<span class="slick-tip left">Street Name / No</span>
								</div>
								<div class="field">
									<?php echo $this->Form->control('company_village',['label'=>false,'error' => false,'required'=>'false','class'=>'specialfield trimspace', "autocomplete"=>"fddf",'placeholder'=>"Village/Town"]); ?>
									<span class="entypo-user icon"></span>
									<span class="slick-tip left">Village/Town</span>
								</div>
							<!-- Select input -->
								<div class="field">
									<?php echo $this->Form->control('company_state_id', ['label'=>false,'class'=>'grayed','options' => $states,'empty'=>'Select State','onchange'=>'selState(this.value);']); ?>
									<div id="arrow-select"></div>
									<svg id="arrow-select-svg"></svg>
									<span class="entypo-book icon"></span>
									<span class="slick-tip left">Choose State</span>
								</div>
								<div   id="display-tamilnadu-district-taluk">
									<div class="field">
										<?php echo $this->Form->control('company_district_id', ['label'=>false,'class'=>'grayed','empty'=>'Select District','options'=>$districts]); ?>
										<div id="arrow-select"></div>
										<svg id="arrow-select-svg"></svg>
										<span class="entypo-book icon"></span>
										<span class="slick-tip left">Choose District</span>
									</div>

									<div class="field">
										<?php echo $this->Form->control('company_taluk_id', ['label'=>false,'class'=>'grayed','empty'=>'Select Taluk','options' => $taluks]); ?>
										<div id="arrow-select"></div>
										<svg id="arrow-select-svg"></svg>
										<span class="entypo-book icon"></span>
										<span class="slick-tip left">Choose Taluk</span>
									</div>
								</div>
								<div id="display-other-state-district" style="display:none">
									<div class="field">
										<?php echo $this->Form->control('company_other_district_name',['type'=>'text','label'=>false,'error' => false,'required'=>'false','class'=>'specialfield trimspace', "autocomplete"=>"fddf",'placeholder'=>"District"]); ?>
										<span class="entypo-user icon"></span>
										<span class="slick-tip left">District</span>
									</div>
									<div class="field">
										<?php echo $this->Form->control('company_other_taluk_name',['type'=>'text','label'=>false,'error' => false,'required'=>'false','class'=>'specialfield trimspace', "autocomplete"=>"fddf",'placeholder'=>"Taluk"]); ?>
										<span class="entypo-user icon"></span>
										<span class="slick-tip left">Taluk</span>
									</div>
								</div>
								<!-- Email input -->
								<div class="field">
									<?php echo $this->Form->control('company_pincode',['label'=>false,'error' => false,'required'=>'true','type'=>'text','minlength'=>'6','maxlength'=>'6','class'=>'num trimspace', "autocomplete"=>"fddf",'placeholder'=>"Pin code"]); ?>
									<span class="entypo-mail icon"></span>
									<span class="slick-tip left">Pin code</span>
								</div>

								<!-- Address input -->
							</div>
							<div class="col-sm-1">
							</div>
							
							<div class="col-sm-5">
								<div class="other_incentive_type" style="display:none;">
									<p class="ratings mr-5">Other Type of Incentive</p>
									<div class="field">
										<?php echo $this->Form->control('other_incentive_type',['label'=>false,'error' => false,'class'=>'specialfield trimspace','required'=>'false', "autocomplete"=>"fddf",'placeholder'=>"Other Incentive Type"]); ?>
										<span class="entypo-user icon"></span>
										<span class="slick-tip left">Name of the Company</span>
									</div>
								</div>
								<p class="ratings mr-5">1 b. Industry Type</p>
								<div class="field">
									<?php echo $this->Form->control('industry_type_id',['label'=>false,'error' => false,'class'=>'trimspace','required'=>'true', "autocomplete"=>"fddf",'empty'=>'Select Industry Type']); ?>
									<span class="entypo-user icon"></span>
									<span class="slick-tip left">Industry Type</span>
								</div>
								
								<div class="">
									<p class="ratings mr-5">1 c. Product Type</p>
									<div class="field">
										<?php echo $this->Form->control('product_type_id',['label'=>false,'error' => false,'class'=>'trimspace','required'=>'true', "autocomplete"=>"fddf",'empty'=>'Select Product Type']); ?>
									<span class="entypo-user icon"></span>
									<span class="slick-tip left">Product Type</span>
									</div>
								</div>
								<p class="ratings mr-5">2 c. Unit Location*</p>
								<div class="field">
									<?php echo $this->Form->control('company_unit_location_id', ['label'=>false,'empty'=>'Select Unit Location']); ?>
									<span class="entypo-user icon"></span>
									<span class="slick-tip left">Unit Location*</span>
									<span style="color:red;">A copy of SIPCOT’s allotment letter shall be enclosed*</span>
								</div>
									<!-- 
								<div class="field">
								<input type="checkbox" name="same_as_address"  id="sameas-address" <?php if($incentiveDetail['same_as_address']==1){?> checked="checked" value="1" <?php }else{ ?> value="0" <?php } ?> onclick="getsamergisteredaddr(this.value)" style="opacity: 3;visibility: visible;display: block;margin-left: -135px;"> <span style="margin-left: -135px;">Same as Registered Office Address</span>
								</div>

								<p class="ratings mr-5">4. Factory Address *</p>
								<div class="field">
									<?php echo $this->Form->control('factory_address',['label'=>false,'error' => false,'type'=>'text','class'=>'specialfield trimspace','required'=>'false', "autocomplete"=>"fddf",'placeholder'=>"Building / Survey No. or Name"]); ?>
									<span class="entypo-user icon"></span>
									<span class="slick-tip left">Address of Manufacturing Unit </span>
								</div>
								<div class="field">
									<?php echo $this->Form->control('factory_street_name',['label'=>false,'error' => false,'required'=>'true','class'=>'specialfield trimspace', "autocomplete"=>"fddf",'placeholder'=>"Street Name / No"]); ?>
									<span class="entypo-user icon"></span>
									<span class="slick-tip left">Street Name / No</span>
								</div>
								<div class="field">
									<?php echo $this->Form->control('factory_village',['label'=>false,'error' => false,'required'=>'false','class'=>'specialfield trimspace', "autocomplete"=>"fddf",'placeholder'=>"Village/Town"]); ?>
									<span class="entypo-user icon"></span>
									<span class="slick-tip left">Village/Town</span>
								</div>
								<div class="field">
									<?php echo $this->Form->control('factory_state_id', ['label'=>false,'class'=>'grayed','options' => $tnstates,'empty'=>'Select State']); ?>
									<div id="arrow-select"></div>
									<svg id="arrow-select-svg"></svg>
									<span class="entypo-book icon"></span>
									<span class="slick-tip left">Choose State</span>
								</div>
								<div  id="display-tamilnadu-district-taluk-factory" >
									<div class="field">
										<?php echo $this->Form->control('factory_district_id', ['label'=>false,'class'=>'grayed','options' => $districts,'empty'=>'Select District']); ?>
										<div id="arrow-select"></div>
										<svg id="arrow-select-svg"></svg>
										<span class="entypo-book icon"></span>
										<span class="slick-tip left">Choose District</span>
									</div>
									<div class="field">
										<?php echo $this->Form->control('factory_taluk_id', ['label'=>false,'class'=>'grayed','empty'=>'Select Taluk','options'=>$taluks]); ?>
										<div id="arrow-select"></div>
										<svg id="arrow-select-svg"></svg>
										<span class="entypo-book icon"></span>
										<span class="slick-tip left">Choose Taluk</span>
									</div>
								</div>		
								<div class="field">
									<?php echo $this->Form->control('factory_pincode',['label'=>false,'error' => false,'required'=>'true','type'=>'text','minlength'=>'6','maxlength'=>'6','class'=>'num trimspace', "autocomplete"=>"fddf",'placeholder'=>"Pin code"]); ?>
									<span class="entypo-mail icon"></span>
									<span class="slick-tip left">Pin code</span>
								</div>
								 -->
								<p class="ratings mr-5">4. Registered Office Contact Details </p>
																<div class="field">
									<?php echo $this->Form->control('company_mobile',['label'=>false,'error' => false,'required'=>'true','minlength'=>'10','maxlength'=>'10','class'=>'num trimspace', "autocomplete"=>"fddf",'placeholder'=>"Mobile Number"]); ?>
									<span class="entypo-mobile icon"></span>
									<span class="slick-tip left">Mobile Number</span>
								</div>
								<div class="field">
									<?php echo $this->Form->control('company_landline',['label'=>false,'error' => false,'required'=>'true','minlength'=>'10','maxlength'=>'12','class'=>'num trimspace', "autocomplete"=>"fddf",'placeholder'=>"Landline Number"]); ?>
									<span class="entypo-comment icon"></span>
									<span class="slick-tip left">Landline Number</span>
								</div>
								<div class="field">
									<?php echo $this->Form->control('company_email',['label'=>false,'error' => false,'required'=>'true','class'=>'email trimspace', "autocomplete"=>"fddf",'placeholder'=>"Email"]); ?>
									<span class="entypo-mail icon"></span>
									<span class="slick-tip left">Email</span>
								</div>
								<div class="field">
									<?php echo $this->Form->control('company_website',['label'=>false,'error' => false,'class'=>'trimspace','required'=>'false', "autocomplete"=>"fddf",'placeholder'=>"Website"]); ?>
									<span class="entypo-mail icon"></span>
									<span class="slick-tip left">Website</span>
								</div>
								<p class="ratings mr-5">5. Authorized Contact Details </p>
								<div class="field">
									<?php echo $this->Form->control('contact_person_name',['label'=>false,'error' => false,'class'=>'name trimspace','minlength'=>'2','maxlength'=>'70','required'=>'true', "autocomplete"=>"fddf",'placeholder'=>"Contact Person Name"]); ?>
									
									<span class="entypo-user icon"></span>
									<span class="slick-tip left">Contact Person Name</span>
								</div>
								<div class="field">
									<?php echo $this->Form->control('contact_mobile_no',['label'=>false,'error' => false,'required'=>'true','minlength'=>'10','maxlength'=>'10','class'=>'num trimspace', "autocomplete"=>"fddf",'placeholder'=>"Mobile Number"]); ?>
									<span class="entypo-mobile icon"></span>
									<span class="slick-tip left">Mobile Number</span>
								</div>
								<div class="field">
									<?php echo $this->Form->control('contact_person_email',['label'=>false,'error' => false,'class'=>'email trimspace','required'=>'true', "autocomplete"=>"fddf",'maxlength'=>'70','placeholder'=>"Email Id"]); ?>
									<span class="entypo-mail icon"></span>
									<span class="slick-tip left">Email</span>
									<span class=""></span>
								</div>
								
							</div>
						</div>
						<div class="row">
						<div class="col-sm-12">
							<p class="ratings mr-5">6. Details of Factory Unit <span class="blink_me" style="color:red;"> (Incentive applying for the Factory unit should be inside Tamilnadu)<span></p>
							<div class="field">
								<table class="table table-responsive" id="FactoryTable">
									<thead class="row-table">
										<tr>
											<th class="text-center">S.No</th>
											<th class="text-center">Factory Address</th>
											<th class="text-center">Village/Town</th>
											<th class="text-center">District </th>
											<th class="text-center">Taluk</th>
											<th  width="11%" class="text-center">Pincode</th>
											<th width="5%" class="text-center">IS Incentive applying for this Unit
											
											<span class="blink_me" style="color:red;"> Select any one as "Yes"<span>
											</th>
											<th><button type="button" class="btn btn-success btn-sm" onclick="addMoreShareholder(this);">Add Unit</button></th>
										</tr>
									</thead>
									<tbody>
										<?php if ($incentiveFactoryUnits){ $i=0;
										foreach($incentiveFactoryUnits as $key => $value){ ?>
										<tr>
											<td class="trcount"><?php echo $key+1; ?></td>
											<td>
												<?php echo $this->Form->control('address[]',['label'=>false,'error' => false,'type'=>'text','class'=>'specialfield trimspace no-icon','required'=>'true', "autocomplete"=>"fddf",'placeholder'=>"Address",'value'=>$value['address']]); ?>
											</td>
											<td>
												<?php echo $this->Form->control('village[]',['label'=>false,'error' => false,'required'=>'true','class'=>'specialfield trimspace no-icon', "autocomplete"=>"fddf",'placeholder'=>"Village/Town",'value'=>$value['village']]); ?>
											</td>
											<td>
												<?php echo $this->Form->control('district[]', ['label'=>false,'class'=>'district no-icon','required'=>'true','options' => $districts,'empty'=>'Select District','value'=>$value['district_id'],'onchange'=>'get_taluk(this);']); ?>
											</td>
											<td>
												<?php echo $this->Form->control('taluk[]',['type'=>'select','label'=>false,'error' => false,'required'=>'true','class'=>'taluk no-icon', 'empty'=>"Select Taluk",'options'=>$factorytaluks[$value['id']],'value'=>$value['taluk_id']]); ?>
											</td>
											<td>
												<?php echo $this->Form->control('pincode[]',['label'=>false,'error' => false,'required'=>'true','type'=>'text','minlength'=>'6','maxlength'=>'6','class'=>'num trimspace  no-icon', "autocomplete"=>"fddf",'placeholder'=>"Pincode",'value'=>$value['pincode']]); ?>
											</td>
											<td>
												<?php echo $this->Form->control('is_incentive_applying_for[]',['label'=>false,'error' => false,'required'=>'true','class'=>'no-icon is_incentive_applied','options'=>$is_incentive_applying_for,'value'=>$value['is_incentive_applying_for']]); ?>
											</td>
										<td>
											<button <?php echo ($i < 1 )?'style="display:none;"':''; ?> type="button" class="btn btn-danger btn-sm" id="sharholder_delete" rel="<?php echo $value['id']; ?>"  onclick="$(this).closest('tr').remove();">Delete</button>
											</td>
										</tr>
										<?php  $i++; } } else{?>
										<tr>
											<td class="trcount">1</td>
											<td>
											<?php echo $this->Form->control('address[]',['label'=>false,'error' => false,'type'=>'text','class'=>'specialfield trimspace no-icon','required'=>'true', "autocomplete"=>"fddf",'placeholder'=>"Address"]); ?>
											</td>
											<td>
												<?php echo $this->Form->control('village[]',['label'=>false,'error' => false,'required'=>'true','class'=>'specialfield trimspace no-icon', "autocomplete"=>"fddf",'placeholder'=>"Village/Town"]); ?>
											</td>
											<td>
												<?php echo $this->Form->control('district[]', ['label'=>false,'class'=>'district no-icon','required'=>'true','options' => $districts,'empty'=>'Select District','onchange'=>'get_taluk(this);']); ?>
											</td>
											<td>
												<?php echo $this->Form->control('taluk[]',['type'=>'select','label'=>false,'error' => false,'required'=>'true','class'=>'taluk no-icon', 'empty'=>"Select Taluk"]); ?>
											</td>
											<td>
												<?php echo $this->Form->control('pincode[]',['label'=>false,'error' => false,'required'=>'true','type'=>'text','minlength'=>'6','maxlength'=>'6','class'=>'num trimspace no-icon', "autocomplete"=>"fddf",'placeholder'=>"Pincode"]); ?>
											</td>
											<td>
												<?php echo $this->Form->control('is_incentive_applying_for[]',['label'=>false,'error' => false,'required'=>'true','class'=>'no-icon','options'=>$is_incentive_applying_for]); ?>
											</td>
											<td>
											<button style="display:none;" type="button" class="btn btn-danger btn-sm" id="sharholder_delete" rel="0" onclick="$(this).closest('tr').remove();">Delete</button>
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