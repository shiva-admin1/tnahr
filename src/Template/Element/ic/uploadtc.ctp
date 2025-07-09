<style>
.container{
max-width: 1340px;
}
</style>
<div class="nested-top-padding">
	<section id="slick">
		<div class="contact-form">
			<div class="w-100">
			<?php if(count($tc_dtls) >= 1){ ?>
				<div class="container">
					<h6 style="text-align:center;"><p class="blink_me" style="color:red;">Documents should be in jpg / png / pdf format only (Upto 5MB Size only)</p></h6><br>
					<h6 style="text-align:center;"><p class="blink_me" style="color:red;">Please Read all Terms and Condition carefully before sign the Document</p></h6><br>
					<h5 style="text-align:center;"><p class="blink_me" style="color:red;">Download PDF , Read Carefully, Sign and Upload. Once submitted, document cannot be modified </p></h5><br>
					 <?php echo $this->Form->create($incentiveDetail,[ 'id'=>'documents',"autocomplete"=>"off",'enctype'=>'multipart/form-data']) ?>
			
					<div class="row">
						<table class="table  table-borderless">
							
							<?php $i = 1;
							foreach($tc_dtls as $incentiveDocumentType){ ?>
							
							<tr>
								<td width="4%">
									<p class="text"><?php echo($i);?></p>
									
									
								</td>
								<td width="36%">
										
									<?php echo($incentiveDocumentType['note_to_applicant']);?>
									<?php echo $this->Form->control('id[]',['label'=>false,'error' => false,'required'=>'false','type'=>'hidden','value'=>$incentiveDocumentType['id']]); ?>
								<br>
									<a class="z-btn z-back mt-2" href="<?php echo $this->Url->build('/', true);?>uploads/TermsAndConditions/<?php echo $incentiveDocumentType['tc_doc_to_applicant']; ?>" target="_blank">Download T&C </a>
									

															
								</td>								
								<td width="25%">
									<div class="field">
										<?php echo $this->Form->control('applicant_remarks[]', ['label'=>'Remarks','class'=>'no-icon specialfield trimspace','value'=>$incentiveDocumentType['applicant_remarks']]); ?>
									</div>
								</td>
								<td width="25%">
								
								<?php if($incentiveDocumentType['tc_applicant_signed_copy'] ){ ?>	
									<a class="z-btn z-back mt-2" href="<?php echo $this->Url->build('/', true);?>uploads/TermsAndConditions/<?php echo $incentiveDocumentType['tc_doc_to_applicant']; ?>" target="_blank">View T&C Signed Copy </a>
									<?php } ?>
								<br>
									<div class="field d-grid">
									<label class="upload" for="uploads">
									<div class="btn">
										 <?php echo $this->Form->control('uploads[]',['id'=>'img-path','class'=>'form-control','type'=>'file','label'=>false,'error'=>false,'onchange'=>'validdocs(this)']);?>
																				   
										<span class="entypo-upload"></span>
									</div>
								   </label>
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
							<input type="submit" name="reupload" class="send" value="Submit Terms & Condition" />
					</div>
				</div>
				<?php } ?>
			</div>	
			
		</div>    
		
	</section>
</div>
