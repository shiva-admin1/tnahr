<style>
.bold {
    font-weight: bold;
}

.text-danger {
    color: #e8143b8f;
    font-size: 50%;
}

.disp {
    display: none;
}
input[type=checkbox] {
    margin:0px 0 0;
}
.checkbox { 
    margin-left: 20px;
}
</style>
<div class="row" style="margin-left:20px;" oncontextmenu="return true;">
    <?php echo $this->Form->create($rtiRequestRecord,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-11">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">Record Request Details</div>
                        </div>
                        <div class="panel-body pan">
                            <div class="form-body pal">								
								<div class="col-md-5">
									<fieldset  style="margin-left:1%;border:1px solid #00355F;border-radius:10px; margin-top:1%;">
									   <legend style="font-size:16px;margin-left:10px;color:#00355F;"><b>Record Request Details :</b></legend>
										<div class="col-md-12">
											 <div class="form-group">											    
												<label for="inputContent" class="col-md-5 control-label bold">Application Reference No<span class="require"></span></label>
												<div class="col-md-6">
													<div class="input text">
														<?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['application_reference_no']; ?>
													</div>
												</div>											
											</div>	
											<div class="form-group">											    
												<label for="inputContent" class="col-md-5 control-label bold">Application Date<span class="require"></span></label>
												<div class="col-md-6">
													<div class="input text">
														<?php echo "<b>:</b>&nbsp;&nbsp;".date('d-m-Y',strtotime($rtiRequestRecord['application_date'])); ?>
													</div>
												</div>											
											</div>	
											<div class="form-group">											    
												<label for="inputContent" class="col-md-5 control-label bold">Record Type<span class="require"></span></label>
												<div class="col-md-6">
													<div class="input text">
														<?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['document_type']['name']; ?>
													</div>
												</div>											
											</div>	
											<div class="form-group" <?php if($rtiRequestRecord['other_document'] == ""){  ?> style="display:none;" <?php } ?>>											    
												<label for="inputContent" class="col-md-5 control-label bold">Record Type Name<span class="require"></span></label>
												<div class="col-md-6">
													<div class="input text">
														<?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['other_document']; ?>
													</div>
												</div>											
											</div>	
											<div class ="otherDoc"  <?php if($rtiRequestRecord['other_doc_description'] == ""){  ?> style="display:none;" <?php } ?>>  					    
                                           <div class="form-group ">
                                                <label for="inputContent" class="col-md-5 control-label bold">Description<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                       <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['other_doc_description']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
											<div class="form-group subtype" <?php if($rtiRequestRecord['document_subtype'] == ""){  ?> style="display:none;" <?php } ?>>											    
												<label for="inputContent" class="col-md-5 control-label bold">Record SubType<span class="require"></span></label>
												<div class="col-md-6">
													<div class="input text">
														<?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['document_subtype']['name']; ?>
													</div>
												</div>					
											</div>	
											<div class ="voter" <?php if($rtiRequestRecord['document_type_id'] != 8){  ?>style="display:none;" <?php } ?>>
											 <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Constituency<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['voter_constituency_name']; ?>
                                                    </div>
                                                </div>
                                            </div>                                     
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Year<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                       <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['voter_record_year']; ?>
													</div>
                                                </div>
                                            </div>
                                            </div>
											<div class ="dist" <?php if($rtiRequestRecord['document_type_id'] !=1){  ?>style="display:none;" <?php } ?>>
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">District <span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['fmb_district_name'];?>
                                                    </div>
                                                </div>
                                            </div>                                     
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Taluk <span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['fmb_taluk_name']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Village <span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['fmb_village_name']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
											<div class ="dist" <?php if($rtiRequestRecord['document_type_id'] !=2){  ?>style="display:none;" <?php } ?>>
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">District Name<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['osr_district_name'];?>
                                                    </div>
                                                </div>
                                            </div>                                     
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Taluk Name<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['osr_taluk_name']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Village <span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['osr_village_name']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
											<div class ="dist" <?php if($rtiRequestRecord['document_type_id'] !=3){  ?>style="display:none;" <?php } ?>>
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">District <span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['ifr_district_name'];?>
                                                    </div>
                                                </div>
                                            </div>                                     
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Taluk <span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['ifr_taluk_name']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Village <span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['ifr_village_name']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>	
											<div class ="dist" <?php if($rtiRequestRecord['document_type_id'] !=8){  ?>style="display:none;" <?php } ?>>
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">District <span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['voter_district_name'];?>
                                                    </div>
                                                </div>
                                            </div>                                     
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Taluk <span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['voter_taluk_name']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Village <span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['voter_village_name']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>	
                                            <div class="form-group survey" <?php if($rtiRequestRecord['fmb_survey_no'] == ''){ ?> style="display:none;"<?php } ?>>
                                                <label for="inputContent" class="col-md-5 control-label bold">Survey No<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['fmb_survey_no']; ?>
                                                    </div>
                                                </div>
                                            </div> 
											<div class="form-group survey" <?php if($rtiRequestRecord['osr_survey_no'] == ''){ ?> style="display:none;"<?php } ?>>
                                                <label for="inputContent" class="col-md-5 control-label bold">Survey No<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['osr_survey_no']; ?>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="form-group ifr_title" <?php if($rtiRequestRecord['document_type_id'] != 3){  ?> style="display:none;" <?php } ?>>
                                                <label for="inputContent" class="col-md-5 control-label bold">Title Deed No<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['ifr_title_deed_no']; ?>
                                                    </div>
                                                </div>
                                            </div>                                         
											<div class ="beic"  <?php if($rtiRequestRecord['document_type_id'] != 6){  ?> style="display:none;" <?php } ?>>                                                                          
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">General No<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['beic_general_no']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" <?php if($rtiRequestRecord['beic_department'] == ''){  ?> style="display:none;" <?php } ?>>
                                                <label for="inputContent" class="col-md-5 control-label bold">Department<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['beic_department']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
											<div class ="bp"  <?php if($rtiRequestRecord['document_type_id'] != 5){  ?> style="display:none;" <?php } ?>>                                                                          
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">BP No<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['bp_no']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">BP Date<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                       <?php echo ($rtiRequestRecord['bp_date'] != '')?"<b>:</b>&nbsp;&nbsp;".date('d-m-Y',strtotime($rtiRequestRecord['bp_date'])):'';?>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Abstract Subject<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['bp_abstract_subject']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
											<div class ="go"  <?php if($rtiRequestRecord['document_type_id'] != 4){  ?> style="display:none;" <?php } ?>>   
											<div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">GO Department<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['go_department']['name']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">GO No<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['go_no']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">GO Date<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
														<?php echo ($rtiRequestRecord['go_date'] != '')?"<b>:</b>&nbsp;&nbsp;".date('d-m-Y',strtotime($rtiRequestRecord['go_date'])):''; ?> 
													 </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Abstract Subject<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['go_abstract_subject']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
											<div class ="gazette"  <?php if($rtiRequestRecord['document_type_id'] != 7){  ?> style="display:none;" <?php } ?>>  
										    <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Notification No<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['gazettes_notification_no']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Notification Date<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                       <?php echo ($rtiRequestRecord['gazettes_notification_date'] != '')?"<b>:</b>&nbsp;&nbsp;".date('d-m-Y',strtotime($rtiRequestRecord['gazettes_notification_date'])):''; ?>
                                                    </div>
                                                </div>
                                            </div>											
                                            </div>
											<div >  
											<div class ="book"  <?php if($rtiRequestRecord['document_type_id'] != 9){  ?> style="display:none;" <?php } ?>>  					    
                                            <div class="form-group ">
                                                <label for="inputContent" class="col-md-5 control-label bold">Publisher Name<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                       <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['book_publisher_name']; ?>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group book">
                                                <label for="inputContent" class="col-md-5 control-label bold">Author Name<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['book_author']; ?>
                                                    </div>
                                                </div>
                                            </div>
											 <div class="form-group  book" >
                                                <label for="inputContent" class="col-md-5 control-label bold">Book Title<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                       <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['book_title']; ?>
                                                    </div>
                                                </div>
                                            </div>	
											<div class="form-group  book" <?php if($rtiRequestRecord['book_publication_year'] == ''){  ?> style="display:none;" <?php } ?>>
                                                <label for="inputContent" class="col-md-5 control-label bold">Published Year<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                       <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['book_publication_year']; ?>
                                                    </div>
                                                </div>
                                            </div>	
											<div class="form-group  book" <?php if($rtiRequestRecord['book_subject'] == ''){  ?> style="display:none;" <?php } ?>>
                                                <label for="inputContent" class="col-md-5 control-label bold">Book Subject<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                       <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['book_subject']; ?>
                                                    </div>
                                                </div>
                                            </div>	
                                            </div>
											<div class="form-group" <?php if($rtiRequestRecord['processing_fee'] == ''){  ?> style="display:none;" <?php } ?>>
                                                <label for="inputContent" class="col-md-5 control-label bold">Processing Fee (Rs.)<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                       <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['processing_fee']; ?>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group" <?php if($rtiRequestRecord['processing_fee'] == ''){  ?> style="display:none;" <?php } ?>>
                                                <label for="inputContent" class="col-md-5 control-label bold">Record Request Mode<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                       <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['document_request']; ?>
                                                    </div>
                                                </div>
                                            </div>
											 <div class="form-group" <?php if($rtiRequestRecord['user_doc_file_path'] == ""){  ?> style="display:none;" <?php } ?>>
                                                <label for="inputContent" class="col-md-5 control-label bold">Applicant Record <span class="require"></span></label>
                                                <div class="col-md-6">												    
                                                    <div class="input text">
													     <a target="_blank"
                                                                href="<?php echo $this->Url->build('/', true)?>webroot/uploads/RTI/<?php echo $rtiRequestRecord['user_doc_file_path']; ?>" style="color:#1ECBE4;"><span style="color:black;"><b>:</b>&nbsp;&nbsp;</span><i
                                                                class="fas fa-file-pdf"></i>&nbsp;View Record
                                                         </a>                                                        
                                                    </div>
                                                </div>
                                            </div>
										</div>
									</fieldset><br>					
							
								</div>
								<div class="col-md-1">
								</div>
								<div class="col-md-5">
									<fieldset  style="margin-left:0%;border:1px solid #00355F;border-radius:10px; margin-top:1%;">
									   <legend style="font-size:16px;margin-left:10px;color:#00355F;"><b>Personel Details :</b></legend>
										  <div class="col-md-12">
											<div class="form-group">											    
												<label for="inputContent" class="col-md-5 control-label bold">Name<span class="require"></span></label>
												<div class="col-md-6">
													<div class="input text">
												        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['name']; ?>
                                                	</div>
												</div>											
											 </div>
											 <div class="form-group" <?php if($rtiRequestRecord['father_name'] == ""){  ?> style="display:none;" <?php } ?>>											    
												<label for="inputContent" class="col-md-5 control-label bold">Father /<br>Spouse Name<span class="require"></span></label>
												<div class="col-md-6">
													<div class="input text">
												       <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['father_name'];?>
                                                    </div>
												</div>									
											 </div>
											<div class="form-group">											    
												<label for="inputContent" class="col-md-5 control-label bold">Mobile<span class="require"></span></label>
												<div class="col-md-6">
													<div class="input text">
													    <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['mobile_no'];?>
                                                   </div>
												</div>											
											</div>
											<div class="form-group">						    
												<label for="inputContent" class="col-md-5 control-label bold">Email<span class="require"></span></label>
												<div class="col-md-6">
													<div class="input text">
												       <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['email'];?>
                                                	</div>
												</div>
											</div>					
											<div class="form-group">											    
												<label for="inputContent" class="col-md-5 control-label bold">Address<span class="require"></span></label>
												<div class="col-md-6">
													<div class="input text">
												       <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['address'];?>
                                                	</div>
												</div>										   
											</div>
											<div class="form-group">											    
												<label for="inputContent" class="col-md-5 control-label bold">District<span class="require"></span></label>
												<div class="col-md-6">
													<div class="input text">
												       <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['district']['name']; ?>
                                                	</div>
												</div>										   
											</div>
											<div class="form-group">											    
												<label for="inputContent" class="col-md-5 control-label bold">Taluk<span class="require"></span></label>
												<div class="col-md-6">
													<div class="input text">
												       <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['taluk']['name']; ?>
                                                	</div>
												</div>										   
											</div>
											<div class="form-group">											    
												<label for="inputContent" class="col-md-5 control-label bold">Pincode<span class="require"></span></label>
												<div class="col-md-6">
													<div class="input text">
												       <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['pincode']; ?>
                                                	</div>
												</div>										   
											</div>
										</div>
									</fieldset><br>
								</div>	
							 </div><br>							
							  <div class="col-md-11" style="margin-left:10px;">							    
								<fieldset  style="margin-left:0%;border:1px solid #00355F;border-radius:10px; margin-top:1%;">
								   <legend style="font-size:16px;margin-left:10px;color:#00355F;"><b>Status Update :</b></legend>
									<div class="col-md-12">
									   <div class="form-group">					    
										<label for="inputContent" class="col-md-3 control-label bold">Status<span class="require">*</span></label>
										<div class="col-md-3">
											<div class="input text">
												<?php echo $this->Form->control('status_id',['class'=>'form-control','label'=>false,'error'=>false,'options'=>$status,'empty'=>'Select','value'=>$current_status['status_id']]);?>
											</div>
										</div>										
										</div>										
									 </div>
								  
									<div class="col-md-12 forwardstatus">
									   <div class="form-group">											    
										<label for="inputContent" class="col-md-3 control-label bold">Dispatched Date<span class="require"></span></label>
										<div class="col-md-3">
											<div class="input text">
												<?php echo $this->Form->control('dispatched_date',['class'=>'form-control datepicker1 calendar','label'=>false,'error'=>false,'readonly','type'=>'text','value'=>($rtiRequestRecord['dispatched_date']!= '')?date('d-m-Y',strtotime($rtiRequestRecord['dispatched_date'])):'']);?>
											</div>
										</div>										
									 </div>
								   </div>						  
								    							  
								</fieldset><br>								
                            </div>
							<div class="col-lg-12">
								<div class="form-actions text-center none-bg">
									<div class="col-md-offset-2 col-md-8">
										<button type="submit" class="btn btn-green">Save</button>
										<button type="button" class="btn btn-red"
											onclick="javascript:history.back()">Cancel</button>
										<button type="button" class="btn btn-yellow" id="res"
											onclick="javascript:location.reload();">Reset</button>
									</div>
								</div>
							</div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $this->Form->End();?>
</div>

<script>
$('.datepicker1').datepicker({endDate:new Date()});
$(function() {
    $("#FormID").validate({
        rules: {
            'status_id'			: {
                required        : true
            }
        },

        messages: {
            'status_id'    		: {
                required        : "Select Status"
            }
        },
        submitHandler: function(form) {
            form.submit();
            $(".btn").prop('disabled', true);
        }
    });
});

function validdocs(oInput) {   
	var _validFileExtensions = [ ".pdf"];    
	if (oInput.type == "file") {
		var sFileName = oInput.value;
		if (sFileName.length > 0) {
			var blnValid = false;
			for (var j = 0; j < _validFileExtensions.length; j++) {
				var sCurExtension = _validFileExtensions[j];
				if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
					blnValid = true;
					break;
				}
			}
			if (!blnValid) {
			   alert( _validFileExtensions.join(", ")+ " File Formats only Allowed");
			   //alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
			   oInput.value = "";
			   return false;
			}
		}
		var file_size = oInput.files[0].size;
		if(file_size>=2097152) {
			alert("File Maximum size is 2MB");
			oInput.value = "";
			return false;
		}

	}
    return true;
}

</script>