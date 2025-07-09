<style>
.container{
max-width: 1340px;
}
</style>
<div>
	<section id="slick">
		<div class="contact-form"><?php echo $this->Form->create($incentiveDetail,['id'=>'employee','autocomplete'=>'off','enctype'=>'multipart/form-data']) ?>
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
						
								<?php if ($errors): ?>
						<p class="error"><?php echo $errors; ?></p>
						<?php endif; ?>
					</div>
						
					<div class="col-sm-12">
						<h4 class="ratings mr-5">21. Employment Created
						<span style="color:red;"> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; On Roll Employee – in persons
						<span>
						</h4>
						<div class="row">
							<div class="col-sm-4">
								<p class="ratings mr-5">a. Managerial*</p>
								<div class="field">
									<?php echo $this->Form->control('emp_[1]',['label'=>false,'error' => false,'required'=>'false','type'=>'text','class'=>'num trimspace emp_count','maxlength'=>'10','placeholder'=>"Managerial",'onchange'=>'calc_no_emp();','style'=>'text-align: right;padding-right:60px','value'=>$incentiveEmployeeDetails[1]]); ?>
									<span class="icon-new">Persons</span>
									<span class="slick-tip left">Managerial</span>
								</div>

								<p class="ratings mr-5">b. Supervisory / Technical*</p>
								<div class="field">
									<?php echo $this->Form->control('emp_[2]',['label'=>false,'error' => false,'required'=>'false','type'=>'text','class'=>'num trimspace emp_count','maxlength'=>'10','placeholder'=>" Supervisory / Technical",'onchange'=>'calc_no_emp();','style'=>'text-align: right;padding-right:60px','value'=>$incentiveEmployeeDetails[2]]); ?>
									<span class="icon-new">Persons</span>
									<span class="slick-tip left">Supervisory / Technical</span>
								</div>
								<p class="ratings mr-5">c. Non-Technical*</p>
								<div class="field">
									<?php echo $this->Form->control('emp_[3]',['label'=>false,'error' => false,'required'=>'false','type'=>'text','class'=>'num trimspace emp_count','maxlength'=>'10','placeholder'=>" Non-Technical",'onchange'=>'calc_no_emp();','style'=>'text-align: right;padding-right:60px','value'=>$incentiveEmployeeDetails[3]]); ?>
									<span class="icon-new">Persons</span>
									<span class="slick-tip left">Non-Technical</span>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="row">
									<div class="col-sm-12">						
										<p class="ratings mr-5">d. Workers </p>
										<div class="field">
										</div>						
										<p class="ratings mr-5">i. Skilled*</p>
										<div class="field">
											<?php echo $this->Form->control('emp_[4]',['label'=>false,'error' => false,'required'=>'false','type'=>'text','class'=>'num trimspace emp_count','maxlength'=>'10','placeholder'=>"Skilled",'onchange'=>'calc_no_emp();','style'=>'text-align: right;padding-right:60px','value'=>$incentiveEmployeeDetails[4]]); ?>
											<span class="icon-new">Persons</span>
											<span class="slick-tip left">Skilled</span>
										</div>						
										<p class="ratings mr-5">ii. Semiskilled*</p>
										<div class="field">
											<?php echo $this->Form->control('emp_[5]',['label'=>false,'error' => false,'required'=>'false','type'=>'text','class'=>'num trimspace emp_count','maxlength'=>'10','placeholder'=>"Semiskilled",'onchange'=>'calc_no_emp();','style'=>'text-align: right;padding-right:60px','value'=>$incentiveEmployeeDetails[5]]); ?>
											<span class="icon-new">Persons</span>
											<span class="slick-tip left">Semiskilled</span>
										</div>						
										<p class="ratings mr-5">iii. Unskilled*</p>
										<div class="field">
											<?php echo $this->Form->control('emp_[6]',['label'=>false,'error' => false,'required'=>'false','type'=>'text','class'=>'num trimspace emp_count','maxlength'=>'10','placeholder'=>"Unskilled",'onchange'=>'calc_no_emp();','style'=>'text-align: right;padding-right:60px','value'=>$incentiveEmployeeDetails[6]]); ?>
											<span class="icon-new">Persons</span>
											<span class="slick-tip left">Unskilled</span>
										</div>		
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="row">
									<div class="col-sm-12">						
												
										<p class="ratings mr-5">e. Contract Workers*
										<span style="color:red;">On Contract Employee – in persons (Shall not exceed 30%)
						<span>
						
										</p>
										<div class="field">
											<?php echo $this->Form->control('emp_[7]',['label'=>false,'error' => false,'required'=>'false','type'=>'text','class'=>'num trimspace emp_count','maxlength'=>'10','placeholder'=>"Contract workers",'onchange'=>'calc_no_emp();','style'=>'text-align: right;padding-right:60px','value'=>$incentiveEmployeeDetails[7]]); ?>
											<span class="icon-new">Persons</span>
											<span class="slick-tip left">Contract Workers</span>
										</div>						
										<p class="ratings mr-5"> Total Number of Employees*</p>
										<div class="field">
											<?php echo $this->Form->control('total_no_of_employees',['label'=>false,'error' => false,'required'=>'false','placeholder'=>"Total Number of Employees",'readonly'=>'readonly','style'=>'text-align: right;padding-right:60px']); ?>
											<span class="icon-new">Persons</span>
											<span class="slick-tip left">Total Number of Employees</span>
										</div>
									</div>
								</div>
							</div>
						</div>   
					</div>
					<div class="row">
						<div class="col-sm-12">
							<p class="ratings mr-5">22.  Statutory Approvals</p>
							<div class="field">
								<table class="table table-responsive" >
									<thead class="row-table">
										<tr>
											<th style="text-align:center;" >S.No.</th>
											<th style="text-align:center;" >Document Name</th>
											<th style="text-align:center;" >Date of Approval & Approval Authority</th>
											<th style="text-align:center;" >Remarks</th>
											<th style="text-align:center;" >Upload Document</th>
											<th style="text-align:center;" >Action</th>
											
										</tr>
									</thead>
									<tbody>
										<?php if ($statutoryApprovalDocs){ $i=0;
												foreach($statutoryApprovalDocs as $key => $asset){ ?>
										<tr>
											<td class="trcount"><?php echo $i+1; ?></td>
											<td>
												<?php echo $this->Form->control('document_name['.$key.']',['label'=>false,'error' => false,'required'=>'false','type'=>'hidden','class'=>'no-icon specialfield trimspace','maxlength'=>'50','value'=>$asset]); ?> 
												<?php if(($statutoryApprovals[$asset]['file_path'] !='') && ($statutoryApprovals[$asset]['approval_date'] != '')){  ?>
									
													<img height="30px" width="30px" src="<?php echo $this->Url->build('/', true)?>/img/tick.png"  />
												<?php } ?>
												<?php echo($asset); ?>
												
											</td>
											<td>
												<?php echo $this->Form->control('approval_date['.$key.']', ['label'=>false,'class'=>'datepicker trimspace mb-2 ','type'=>'text','value'=>$this->Time->format($statutoryApprovals[$asset]['approval_date'],'d-M-Y'),'placeholder'=>'DD-MM-YYYY']); ?>
									
												<?php echo $this->Form->control('approving_authority['.$key.']',['label'=>false,'error' => false,'required'=>'false','type'=>'text','class'=>'no-icon specialfield trimspace','maxlength'=>'90',"onchange"=>"calcTotalInvestment(".$key.");",'value'=>$statutoryApprovals[$asset]['approving_authority'],'placeholder'=>'Approval Authority']); ?>
											</td>
											<td>
												<?php echo $this->Form->control('applicant_remarks['.$key.']',['label'=>false,'error' => false,'required'=>'false','type'=>'textarea','class'=>'no-icon specialfield trimspace','maxlength'=>'150','value'=>$statutoryApprovals[$asset]['applicant_remarks'],'style'=>'text-align: right;padding-right:25px']); ?>
											</td>
											<td>
												<div class="field d-grid">
													<label class="upload" for="uploads">
													<div class="btn">
														 <?php echo $this->Form->control('file_path['.$key.']',['id'=>'img-path','class'=>'form-control','type'=>'file','label'=>false,'error'=>false,'onchange'=>'validdocs(this)']);?>
																								   
														<span class="entypo-upload"></span>
													</div>
													</label>
													<?php if($statutoryApprovals[$asset]['file_path']){ ?>
														<a class="z-btn z-back mt-2" href="<?php echo $this->Url->build('/', true);?>uploads/statutory_approvals/<?php echo $statutoryApprovals[$asset]['file_path']; ?>" target="_blank">View</a>
														
														
														
														<?php echo $this->Form->control('file_name['.$key.']',['label'=>false,'error' => false,'type'=>'hidden','value'=>$statutoryApprovals[$asset]['file_path']]); ?>
														
														
													<?php } ?>
												</div>
											</td>
											<td>
												<input type="submit" name="upload" class="send" value="Save" />
											</td>
										</tr>
											<?php  $i++; } ?>
										<?php  } ?>
									</tbody>
								</table>
							</div>						
						</div>
					</div>
					<input type="submit" name="next" class="send" value="Save & Continue" />
					<?php echo $this->Form->end() ?>
									
				</div>
			</div>
		</div>
	</section>
</div> 