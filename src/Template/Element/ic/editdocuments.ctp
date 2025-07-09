<style>
.container{
max-width: 1340px;
}
</style>
<div class="nested-top-padding">
	<section id="slick">
		<div class="contact-form">
			<div class="w-100">
			<?php if(count($incentive_files) >= 1){ ?>
				<div class="container">
					<h6 style="text-align:center;"><p class="blink_me" style="color:red;">All Documents should be in jpg / png / pdf format only (Upto 5MB Size only)</p></h6><br>
					<h6 style="text-align:center;"><p class="blink_me" style="color:red;">Upload Each file one by one</p></h6><br>
					<h5 style="text-align:center;"><p class="blink_me" style="color:red;">Merge PDF and Upload if more than one document comes under same category</p></h5><br>
					 <?php echo $this->Form->create($incentiveDetail,[ 'id'=>'documents',"autocomplete"=>"off",'enctype'=>'multipart/form-data']) ?>
			
					<div class="row">
						<table class="table  table-borderless">
							
							<?php $i = 1;
							foreach($incentive_files as $incentiveDocumentType){ ?>
							
							<tr>
								<td width="4%">
									<p class="text"><?php echo($i);?></p>
									
									
								</td>
								<td width="36%">
										<?php foreach($incentiveFiles_dtls as $key1 => $value){ 
										if($value['incentive_document_type_id'] == $incentiveDocumentType['id'] ){ ?>
										
											<?php if( $value['img_path'] !='' ){  ?>
							
											<img height="30px" width="30px" src="<?php echo $this->Url->build('/', true)?>/img/tick.png"  />
										<?php }?>
										<?php } } ?>
									
									
										
									<?php echo($incentiveDocumentType['incentive_document_type']['name']);?>
									<?php echo $this->Form->control('incentive_document_type_id[]',['label'=>false,'error' => false,'required'=>'false','type'=>'hidden','value'=>$incentiveDocumentType['incentive_document_type_id']]); ?>
								
									<?php if($incentiveDocumentType['mandatory_flag']==1){ ?><span style="color:red;">*<span><?php } ?>
									</p>
									<?php foreach($incentiveFiles_dtls as $key1 => $value){ 
										if($value['incentive_document_type_id'] == $incentiveDocumentType['incentive_document_type_id'] ){ ?>
										
										<a class="z-btn z-back mt-2" href="<?php echo $this->Url->build('/', true);?>uploads/incentive_files/<?php echo $value['img_path']; ?>" target="_blank">View</a>
									<?php } } ?>	

									<p class="text">( Query : <?php echo $incentiveDocumentType['remarks']?> )</p>									
								</td>								
								<td width="25%">
									<div class="field">
										<?php echo $this->Form->control('applicant_remarks[]', ['label'=>'Remarks','class'=>'no-icon specialfield trimspace','value'=>$remarks[$incentiveDocumentType['incentive_document_type_id']]]); ?>
									</div>
								</td>
								<td width="25%">
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
							<input type="submit" name="reupload" class="send" value="Resubmit Documents" />
					</div>
				</div>
				<?php } ?>
			</div>	
			
		</div>    
		
	</section>
</div>
