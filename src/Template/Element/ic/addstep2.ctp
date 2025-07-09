<div class="nested-top-padding">

			<!-- Zozo Tabs 2 (nested) Start-->
	<section id="slick">
			<!-- Contact form -->
		<div class="contact-form">
			<?php echo $this->Form->create($incentiveDetail,['id'=>'management', "autocomplete"=>"off",'enctype'=>'multipart/form-data']) ?>
			<div class="w-100">
					<!-- Form fields -->
				<div class="container">
					<div class="row">
						<div class="col-sm-5">
							<p class="ratings mr-5">6 a. Constitution of the unit *</p>
							<div class="field">
									<?php echo $this->Form->control('constitution_id', ['label'=>false,'class'=>'grayed','options' => $constitutions,'empty'=>'Select Constitution']); ?>
								<div id="arrow-select"></div>
								<svg id="arrow-select-svg"></svg>
								<span class="entypo-book icon"></span>
								<span class="slick-tip left">Choose subject</span>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="other_constitution" style="display:none">
								<p class="ratings mr-5">Other Constitution *</p>
								<div class="field">
									<?php echo $this->Form->control('other_constitution_type', ['label'=>false,'class'=>'name trimspace grayed','minlength'=>'2','maxlength'=>'70']); ?>
									<span class="entypo-book icon"></span>
									<span class="slick-tip left">Choose subject</span>
								</div>
							</div>
						</div>
					</div>
										
					<div class="row">
						<div class="col-sm-12">
							<p class="ratings mr-5">6 b. Details of Directors of the Company</p>
							<div class="field">
								<table class="table table-responsive" id="ShareholdingTable">
									<thead class="row-table">
										<tr>
											<th class="text-center">S.No.</th>
											<th class="text-center">Name</th>
											<th class="text-center">Age</th>
											<th class="text-center">Percentage of shareholding</th>
											<th class="text-center">Whether Professional Director</th>
											<th class="text-center">DIN</th>
											<th class="text-center"><button type="button" class="btn btn-success btn-sm" onclick="addMoreShareholder(this);">Add</button></th>
										</tr>
									</thead>
									<tbody>
										<?php if ($incentiveShareholdings){ $i=0;
										foreach($incentiveShareholdings as $key => $value){ ?>
										<tr>
											<td class="trcount"><?php echo $key+1; ?></td>
											<td>
												<?php echo $this->Form->control('shareholder_name[]',['label'=>false,'error' => false,'required'=>'true','class'=>'name trimspace no-icon','minlength'=>'2','maxlength'=>'70','placeholder'=>"Name",'value'=>$value['shareholder_name']]); ?>
											</td>
											<td>
												<?php echo $this->Form->control('age[]',['label'=>false,'error' => false,'type'=>'number','required'=>'false','class'=>'no-icon','max'=>100,'placeholder'=>"Age",'value'=>$value['age']]); ?>
											</td>
											<td>
												<?php echo $this->Form->control('percentage_of_shareholding[]',['label'=>false,'error' => false,'required'=>'true','class'=>'share_percentage no-icon','type'=>'number','min'=>'1','max'=>'100','placeholder'=>'Percentage','value'=>$value['percentage_of_shareholding']]); ?>
											</td>
											<td>
												<?php echo $this->Form->control('is_professional_director[]',['label'=>false,'error' => false,'required'=>'true','class'=>'no-icon','options'=>$is_professional_director,'value'=>$value['is_professional_director']]); ?>
											</td>
												<td>
												<?php echo $this->Form->control('din[]',['label'=>false,'error' => false,'required'=>'false','class'=>'num trimspace no-icon','minlength'=>'8','maxlength'=>'8','placeholder'=>'DIN','value'=>$value['din']]); ?>
											</td>
											<td>
											<button <?php echo ($i < 1 )?'style="display:none;"':''; ?> type="button" class="btn btn-danger btn-sm" id="sharholder_delete" rel="<?php echo $value['id']; ?>"  onclick="$(this).closest('tr').remove();">Delete</button>
											</td>
										</tr>
										<?php  $i++; } } else{?>
										<tr>
											<td class="trcount">1</td>
											<td>
												<?php echo $this->Form->control('shareholder_name[]',['label'=>false,'error' => false,'required'=>'false','class'=>'shareholder name trimspace no-icon','minlength'=>'2','maxlength'=>'70','placeholder'=>'Name']); ?>
											</td>
											<td>
												<?php echo $this->Form->control('age[]',['label'=>false,'error' => false,'required'=>'false','class'=>'num trimspace no-icon','max'=>100,'placeholder'=>'Age']); ?>
											</td>
											<td>
												<?php echo $this->Form->control('percentage_of_shareholding[]',['label'=>false,'error' => false,'required'=>'false','class'=>'share_percentage no-icon','type'=>'number','min'=>'0','max'=>'100','placeholder'=>'Percentage']); ?>
											</td>
											<td>
												<?php echo $this->Form->control('is_professional_director[]',['label'=>false,'error' => false,'required'=>'true','class'=>'no-icon','options'=>$is_professional_director,]); ?>
											</td>
											<td>
												<?php echo $this->Form->control('din[]',['label'=>false,'error' => false,'required'=>'false','class'=>'num trimspace no-icon','minlength'=>'8','maxlength'=>'8','placeholder'=>'DIN']); ?>
											</td>
											<td>
											<button style="display:none;" type="button" class="btn btn-danger btn-sm" id="sharholder_delete" rel="0" onclick="$(this).closest('tr').remove();">Delete</button>
											</td>
										</tr>
										<?php } ?>
										<?php echo $this->Form->control('total_percentage_of_shareholding', ['label'=>false,'class'=>'grayed','type' => 'hidden', 'value'=>0]); ?>
							
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<p class="ratings mr-5">6 c. Details of the Shareholding of the Company *</p>
							<div class="field d-grid">
								<label class="upload" for="uploads">
									<div class="btn">
										<?php echo $this->Form->control('directors_shareholding_doc',['id'=>'img-path','class'=>'form-control mb-2','type'=>'file','label'=>false,'error'=>false,'onchange'=>'validdocs(this)']);?>
										<span class="entypo-upload"></span>
									</div>
								</label>
							</div>	
						</div>
						<div class="col-sm-2">
							<?php if($incentiveDetail->directors_shareholding_doc ){ ?>											
								<a class="z-btn z-back mt-2" href="<?php echo $this->Url->build('/', true);?>uploads/shareholders/<?php echo $incentiveDetail->directors_shareholding_doc; ?>" target="_blank">View Document</a>
							<?php } ?>
						</div>
						<div class="col-sm-5">
														
							<p class="ratings mr-5">6 d. Details of the unit in which the present promoters associated </p>
							<div class="field">
								<?php echo $this->Form->control('details_of_unit_present_director',['label'=>false,'error' => false,'required'=>'false','class'=>'no-icon trimspace', "type"=>"textarea",'placeholder'=>"Details of Unit",'rows'=>'2','value'=>$incentiveDetail["details_of_unit_present_director"]]); ?>
								
							</div>
						</div>
					</div>
							
					<div class="row">
													
							<div class="col-sm-12">
							<p class="ratings mr-5">7. Details of Registrations</p><br><br>
								
							</div>
							<div class="col-sm-5">
															
								<p class="ratings mr-5">a. SIA / Udyog Adhar</p>
								<div class="field">
									<?php echo $this->Form->control('dor_sia_udyog_no',['label'=>false,'error' => false,'required'=>'false','class'=>'trimspace', "autocomplete"=>"fddf",'placeholder'=>"SIA / Udyog Adhar",'minlength'=>'6','maxlength'=>'20']); ?>
									<span class="entypo-user icon"></span>
								</div>
							<!-- Select input -->
								<p class="ratings mr-5">b. ROC / Firm Registration Certificate</p>
								<div class="field">
									<?php echo $this->Form->control('dor_roc_frim_registration_no', ['type'=>'text','label'=>false,'class'=>'grayed','placeholder'=>'ROC / Firm Registration Certificate','minlength'=>'6','maxlength'=>'20']); ?>
									<span class="entypo-book icon"></span>
								</div>
								<p class="ratings mr-5">c. GSTIN</p>
								<div class="field">
									<?php echo $this->Form->control('dor_gstin_no',['type'=>'text','label'=>false,'error' => false,'required'=>'true','class'=>'specialfield trimspace gstno', "autocomplete"=>"fddf",'placeholder'=>"GSTIN",'minlength'=>'15','maxlength'=>'15']); ?>
									<span class="entypo-user icon"></span>
									<span style="color:red;"  class="gst-alert  alert-danger"></span>
								</div>
							</div>
							<div class="col-sm-5">
															
								<p class="ratings mr-5">d. PAN</p>
								<div class="field">
									<?php echo $this->Form->control('dor_pan_no', ['type'=>'text','label'=>false,'class'=>'panno grayed','required'=>'true','placeholder'=>'PAN','minlength'=>'10','maxlength'=>'10']); ?>
									<span class="entypo-book icon"></span>
									<span style="color:red;" class="pan-alert  alert-danger"></span>
								</div>
								<p class="ratings mr-5">e. TIN&nbsp;</p>
								<div class="field">
									<?php echo $this->Form->control('dor_tin_no', ['type'=>'text','label'=>false,'class'=>'grayed tinno','placeholder'=>'TIN','minlength'=>'11','maxlength'=>'11']); ?>
									<span class="entypo-book icon"></span>
									<span style="color:red;"  class="tin-alert  alert-danger"></span>
								</div>
								
								<p class="ratings mr-5">f. CIN</p>
								<div class="field">
									<?php echo $this->Form->control('dor_cin_no',['type'=>'text','label'=>false,'error' => false,'required'=>'false','class'=>'specialfield trimspace cinno', "autocomplete"=>"fddf",'placeholder'=>"CIN",'minlength'=>'21','maxlength'=>'21']); ?>
									<span class="entypo-user icon"></span>
									<span style="color:red;"  class="cin-alert alert-danger"></span>
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
