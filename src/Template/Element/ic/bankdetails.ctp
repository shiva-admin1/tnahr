<style>
.container{
max-width: 1340px;
}
</style>
<div class="nested-top-padding">
	<section id="slick">
		<div class="contact-form">
			<div class="w-100">
			<?php if(count($bank_dtls) >= 1){ ?>
				<div class="container">
					<h6 style="text-align:center;"><p class="blink_me" style="color:red;">Upload Documents should be in jpg / png / pdf format only (Upto 5MB Size only)</p></h6><br>
					<?php echo $this->Form->create($incentiveDetail,[ 'id'=>'documents',"autocomplete"=>"off",'enctype'=>'multipart/form-data']) ?>
			
					<div class="row">
						<table class="table  table-borderless">
							
							<?php $i = 1;
							foreach($bank_dtls as $bank){ ?>
							
							<tr>
								<td width="4%">
									<p class="text"><?php echo($i);?></p>
									
									
								</td>
								<td>
										
									<?php echo($bank['note_to_applicant']);?>
									<?php echo $this->Form->control('id',['label'=>false,'error' => false,'required'=>'false','type'=>'hidden','value'=>$bank['id']]); ?>
														
								</td>								
								<td>
									<div class="field">
										<?php echo $this->Form->control('account_no', ['label'=>'Account NO','required'=>'true','class'=>'no-icon num trimspace','value'=>$bank['account_no']]); ?>
									</div>
								<br>
									<div class="field">
										<?php echo $this->Form->control('account_name', ['label'=>'Account Name','required'=>'true','class'=>'no-icon specialfield trimspace','value'=>$bank['account_name']]); ?>
									</div>
									<br>
									<div class="field">
										<?php echo $this->Form->control('account_type', ['label'=>'Account Type','required'=>'true','class'=>'no-icon name trimspace','value'=>$bank['account_type']]); ?>
									</div>
								</td>
								<td>
									<div class="field">
										<?php echo $this->Form->control('bank_name', ['label'=>'Bank','required'=>'true','class'=>'no-icon name trimspace','value'=>$bank['bank_name']]); ?>
									</div>
									<br>
									<div class="field">
										<?php echo $this->Form->control('branch_name', ['label'=>'Branch','required'=>'true','class'=>'no-icon alphanumeric trimspace','value'=>$bank['branch_name']]); ?>
									</div>
									<br>
									<div class="field">
										<?php echo $this->Form->control('ifsc_code', ['label'=>'IFSC','required'=>'true','class'=>'no-icon alphanumeric trimspace','value'=>$bank['ifsc_code']]); ?>
									</div>
								</td>
								<td width="25%">
									<?php if($bank['applicant_bank_passbook'] ){ ?>											
									
									<p><b>Upload crossed cheque / First page of the Passbook </b></p>
									<div class="field d-grid">
									<label class="upload" for="uploads">
									<div class="btn">
										 <?php echo $this->Form->control('uploads[]',['id'=>'img-path','class'=>'form-control','type'=>'file','label'=>false,'error'=>false,'onchange'=>'validdocs(this)']);?>
																				   
										<span class="entypo-upload"></span>
									</div>
								   </label>
									</div>
									<br>
											<a class="z-btn z-back mt-2" href="<?php echo $this->Url->build('/', true);?>uploads/BankDetailDisbursements/<?php echo $bank['applicant_bank_passbook']; ?>" target="_blank">View Passbook Copy</a>
									<?php }else{ ?>
										
										<p><b>Upload crossed cheque / First page of the Passbook </b></p>
										<div class="field d-grid">
										<label class="upload" for="uploads">
										<div class="btn">
											 <?php echo $this->Form->control('uploads[]',['id'=>'img-path','required'=>'true','class'=>'form-control','type'=>'file','label'=>false,'error'=>false,'onchange'=>'validdocs(this)']);?>
																					   
											<span class="entypo-upload"></span>
										</div>
									   </label>
										</div>
										<br>								
									
									<?php } ?>	
									<br>
									<div class="field">
										<?php echo $this->Form->control('applicant_remarks', ['label'=>'Remarks','class'=>'no-icon specialfield trimspace','value'=>$bank['applicant_remarks']]); ?>
									</div>
								</td>
								
								<td width="10%">
								<input type="submit" name="next" class="send" value="Upload" />
									<?php echo $this->Form->end() ?>
														
								</td>
							
							</tr>
							
							<?php $i = $i+1; } ?>
								
							</table>
							
							
					</div>
					<div class="row ">
							<input type="submit" name="reupload" class="send" value="Submit Bank Account Details" />
					</div>
				</div>
				<?php } ?>
			</div>	
			
		</div>    
		
	</section>
</div>
