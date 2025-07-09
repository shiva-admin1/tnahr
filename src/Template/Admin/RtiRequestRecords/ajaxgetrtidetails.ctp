<div id="report">
    <div class="row" style="margin-left:50px;">
    <?php echo $this->Form->create($rtiRequestRecord,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
    <div class="col-lg-11">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">Record Request Details</div>
                        </div>
                        <div class="panel-body pan">
                            <div class="form-body pal">								
								<div class="col-md-12">
									<fieldset  style="margin-left:0%;border:1px solid #00355F;border-radius:10px; margin-top:1%;">
									   <legend style="font-size:16px;margin-left:10px;color:#00355F;"><b>Record Request Details :</b></legend>
										<div class="col-md-12">
											 <div class="form-group">											    
												<label for="inputContent" class="col-md-3 control-label bold">Application Reference No<span class="require"></span></label>
												<div class="col-md-3">
													<div class="input text">
														<?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['application_reference_no']; ?>
													</div>
												</div>	
												<label for="inputContent" class="col-md-3 control-label bold">Application Date<span class="require"></span></label>
												<div class="col-md-3">
													<div class="input text">
														<?php echo "<b>:</b>&nbsp;&nbsp;".date('d-m-Y',strtotime($rtiRequestRecord['application_date'])); ?>
													</div>
												</div>	
											</div>											
											<div class="form-group">											    
												<label for="inputContent" class="col-md-3 control-label bold">Record Type<span class="require"></span></label>
												<div class="col-md-3">
													<div class="input text">
														<?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['document_type']['name']; ?>
													</div>
												</div>	
												<div class="form-group subtype" <?php if($rtiRequestRecord['document_subtype'] == ""){  ?> style="display:none;" <?php } ?>>											    
												<label for="inputContent" class="col-md-3 control-label bold">Record SubType<span class="require"></span></label>
												<div class="col-md-3">
													<div class="input text">
														<?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['document_subtype']['name']; ?>
													</div>
												</div>					
											</div>	
								 			</div>							
											
										
											<div class ="dist" <?php if($rtiRequestRecord['document_type_id'] !=1){  ?>style="display:none;" <?php } ?>>
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-3 control-label bold">District <span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['fmb_district_name'];?>
                                                    </div>
                                                </div>
												 <label for="inputContent" class="col-md-3 control-label bold">Taluk <span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['fmb_taluk_name']; ?>
                                                    </div>
                                                </div>
                                            </div>                                   
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-3 control-label bold">Village <span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['fmb_village_name']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
											<div class ="dist" <?php if($rtiRequestRecord['document_type_id'] !=2){  ?>style="display:none;" <?php } ?>>
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-3 control-label bold">District <span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['osr_district_name'];?>
                                                    </div>
                                                </div>
												 <label for="inputContent" class="col-md-3 control-label bold">Taluk<span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['osr_taluk_name']; ?>
                                                    </div>
                                                </div>
                                            </div>                                    
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-3 control-label bold">Village <span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['osr_village_name']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
											<div class ="dist" <?php if($rtiRequestRecord['document_type_id'] !=3){  ?>style="display:none;" <?php } ?>>
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-3 control-label bold">District <span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['ifr_district_name'];?>
                                                    </div>
                                                </div>
												<label for="inputContent" class="col-md-3 control-label bold">Taluk <span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['ifr_taluk_name']; ?>
                                                    </div>
                                                </div>
                                            </div>                                    
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-3 control-label bold">Village <span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['ifr_village_name']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
												<div class ="voter" <?php if($rtiRequestRecord['document_type_id'] != 8){  ?>style="display:none;" <?php } ?>>
											 <div class="form-group">
                                                <label for="inputContent" class="col-md-3 control-label bold">Constituency<span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['voter_constituency_name']; ?>
                                                    </div>
                                                </div>
												<label for="inputContent" class="col-md-3 control-label bold">Record Year<span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                       <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['voter_record_year']; ?>
													</div>
                                                </div>
                                            </div>                                    
                                          
                                            </div>
											<div class ="dist" <?php if($rtiRequestRecord['document_type_id'] !=8){  ?>style="display:none;" <?php } ?>>
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-3 control-label bold">District <span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['voter_district_name'];?>
                                                    </div>
                                                </div>
												<label for="inputContent" class="col-md-3 control-label bold">Taluk <span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['voter_taluk_name']; ?>
                                                    </div>
                                                </div>
                                            </div>                                   
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-3 control-label bold">Village <span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['voter_village_name']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>	
                                            <div class="form-group survey" <?php if($rtiRequestRecord['fmb_survey_no'] == ''){ ?> style="display:none;"<?php } ?>>
                                                <label for="inputContent" class="col-md-3 control-label bold">Survey No<span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['fmb_survey_no']; ?>
                                                    </div>
                                                </div>
                                            </div> 
											<div class="form-group survey" <?php if($rtiRequestRecord['osr_survey_no'] == ''){ ?> style="display:none;"<?php } ?>>
                                                <label for="inputContent" class="col-md-3 control-label bold">Survey No<span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['osr_survey_no']; ?>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="form-group ifr_title" <?php if($rtiRequestRecord['document_type_id'] != 3){  ?> style="display:none;" <?php } ?>>
                                                <label for="inputContent" class="col-md-3 control-label bold">Title Deed No<span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['ifr_title_deed_no']; ?>
                                                    </div>
                                                </div>
                                            </div>                                         
											<div class ="beic"  <?php if($rtiRequestRecord['document_type_id'] != 6){  ?> style="display:none;" <?php } ?>>                                                                          
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-3 control-label bold">General No<span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['beic_general_no']; ?>
                                                    </div>
                                                </div>
												 <div  class="dept" <?php if($rtiRequestRecord['beic_department'] == ''){  ?> style="display:none;" <?php } ?>>
                                                <label for="inputContent" class="col-md-3 control-label bold">Department<span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['beic_department']; ?>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>                                           
                                            </div>
											<div class ="bp"  <?php if($rtiRequestRecord['document_type_id'] != 5){  ?> style="display:none;" <?php } ?>>                                                                          
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-3 control-label bold">BP No<span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['bp_no']; ?>
                                                    </div>
                                                </div>
												 <label for="inputContent" class="col-md-3 control-label bold">BP Date<span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                       <?php echo ($rtiRequestRecord['bp_date'] != '')?"<b>:</b>&nbsp;&nbsp;".date('d-m-Y',strtotime($rtiRequestRecord['bp_date'])):'';?>
                                                    </div>
                                                </div>
                                            </div>                                           
											<div class="form-group">
                                                <label for="inputContent" class="col-md-3 control-label bold">Abstract Subject<span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['bp_abstract_subject']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
											<div class ="go"  <?php if($rtiRequestRecord['document_type_id'] != 4){  ?> style="display:none;" <?php } ?>>   
											<div class="form-group">
                                                <label for="inputContent" class="col-md-3 control-label bold">GO Department<span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['go_department']['name']; ?>
                                                    </div>
                                                </div>
												 <label for="inputContent" class="col-md-3 control-label bold">GO No<span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['go_no']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-3 control-label bold">GO Date<span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
														<?php echo ($rtiRequestRecord['go_date'] != '')?"<b>:</b>&nbsp;&nbsp;".date('d-m-Y',strtotime($rtiRequestRecord['go_date'])):''; ?> 
													 </div>
                                                </div>
												 <label for="inputContent" class="col-md-3 control-label bold">Abstract Subject<span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['go_abstract_subject']; ?>
                                                    </div>
                                                </div>
                                            </div>											
                                            </div>
											<div class ="gazette"  <?php if($rtiRequestRecord['document_type_id'] != 7){  ?> style="display:none;" <?php } ?>>  
										    <div class="form-group">
                                                <label for="inputContent" class="col-md-3 control-label bold">Notification No<span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['gazettes_notification_no']; ?>
                                                    </div>
                                                </div>
												 <label for="inputContent" class="col-md-3 control-label bold">Notification Date<span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                       <?php echo ($rtiRequestRecord['gazettes_notification_date'] != '')?"<b>:</b>&nbsp;&nbsp;".date('d-m-Y',strtotime($rtiRequestRecord['gazettes_notification_date'])):''; ?>
                                                    </div>
                                                </div>
                                            </div>                                           											
                                            </div>											
											<div class ="book"  <?php if($rtiRequestRecord['document_type_id'] != 9){  ?> style="display:none;" <?php } ?>>  					    
                                            <div class="form-group ">
                                                <label for="inputContent" class="col-md-3 control-label bold">Publisher Name<span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                       <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['book_publisher_name']; ?>
                                                    </div>
                                                </div>
												<label for="inputContent" class="col-md-3 control-label bold">Author Name<span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['book_author']; ?>
                                                    </div>
                                                </div>
                                            </div>											
											 <div class="form-group  book" >
                                                <label for="inputContent" class="col-md-3 control-label bold">Book Title<span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                       <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['book_title']; ?>
                                                    </div>
                                                </div>
												<div class="book" <?php if($rtiRequestRecord['book_publication_year'] == ''){  ?> style="display:none;" <?php } ?>>
                                                <label for="inputContent" class="col-md-3 control-label bold">Published Year<span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                       <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['book_publication_year']; ?>
                                                    </div>
                                                </div>
                                                </div>	
                                            </div>
											
											<div class="form-group  book" <?php if($rtiRequestRecord['book_subject'] == ''){  ?> style="display:none;" <?php } ?>>
                                                <label for="inputContent" class="col-md-3 control-label bold">Book Subject<span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                       <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['book_subject']; ?>
                                                    </div>
                                                </div>
                                            </div>	
                                            </div>	
											<div class="form-group">
                                                <label for="inputContent" class="col-md-3 control-label bold">Processing Fee (Rs.)<span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                       <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['processing_fee']; ?>
                                                    </div>
                                                </div>
												<label for="inputContent" class="col-md-3 control-label bold">Record Request Mode<span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                       <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['document_request']; ?>
                                                    </div>
                                                </div>
                                            </div>
										</div>
									</fieldset><br>
									<?php if($sec_ass_Status != ''){ ?>
									<fieldset  style="margin-left:0%;border:1px solid #00355F;border-radius:10px; margin-top:1%;">
									   <legend style="font-size:16px;margin-left:10px;color:#00355F;"><b>Section Assistant Status :</b></legend>
										<div class="col-md-12">
										    <div class="form-group">											    
												<label for="inputContent" class="col-md-3 control-label bold">Put up Note<span class="require"></span></label>
												<div class="col-md-9">
													<div class="input text">
														<?php echo "<b>:</b>&nbsp;&nbsp;".$sec_ass_Status['putup_note']; ?>
													</div>
												</div>
											</div>
											<div class="form-group">										    
												<label for="inputContent" class="col-md-3 control-label bold">Document Fee (Rs.)<span class="require"></span></label>
												<div class="col-md-3">
													<div class="input text">
														<?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['document_fee']; ?>
													</div>
												</div>
												<?php if($rtiRequestRecord['archive_uploaded_document'] != ""){  ?> 
												<label for="inputContent" class="col-md-3 control-label bold">Record Found <span class="require"></span></label>
                                                <div class="col-md-3">
												    <div class="input text">
													 <a target="_blank"
															href="<?php echo $this->Url->build('/', true)?><?php echo $rtiRequestRecord['archive_uploaded_document']; ?>"><b style="color:#171919">:</b>&nbsp;&nbsp;<span style="color:#1ECBE4;">View</span>
													 </a>                                                        
                                                    </div>
                                                </div>
												<?php } ?>
												
											</div>	
											 <div class="form-group">											    
												<label for="inputContent" class="col-md-3 control-label bold">Internal Communication<span class="require"></span></label>
												<div class="col-md-9">
													<div class="input text">
														<?php echo "<b>:</b>&nbsp;&nbsp;".$sec_ass_Status['internal_communication']; ?>
													</div>
												</div>
												<?php if($sec_ass_Status['upload_document'] != ""){  ?> 
												<label for="inputContent" class="col-md-3 control-label bold">Enclosure <span class="require"></span></label>
                                                <div class="col-md-3">
												    <div class="input text">
													 <a target="_blank"
															href="<?php echo $this->Url->build('/', true)?>uploads/RTI/<?php echo $sec_ass_Status['upload_document']; ?>"><b style="color:#171919">:</b>&nbsp;&nbsp;<span style="color:#1ECBE4;">View</span>
													 </a>                                                        
                                                    </div>
                                                </div>
												<?php } ?>
											</div>		
									     </div>
									</fieldset><br>
									<?php  }  ?>
									<?php if($sec_head_Status != ''){ ?>
									<fieldset  style="margin-left:0%;border:1px solid #00355F;border-radius:10px; margin-top:1%;">
									   <legend style="font-size:16px;margin-left:10px;color:#00355F;"><b>Section Head Status :</b></legend>
										<div class="col-md-12">
										    <div class="form-group">											    
												<label for="inputContent" class="col-md-3 control-label bold">Internal Communication<span class="require"></span></label>
												<div class="col-md-3">
													<div class="input text">
														<?php echo "<b>:</b>&nbsp;&nbsp;".$sec_head_Status['internal_communication']; ?>
													</div>
												</div>
												<?php if($sec_head_Status['upload_document'] != ""){  ?> 
												<label for="inputContent" class="col-md-3 control-label bold">Enclosure <span class="require"></span></label>
                                                <div class="col-md-3">
												    <div class="input text">
													 <a target="_blank"
															href="<?php echo $this->Url->build('/', true)?>uploads/RTI/<?php echo $sec_head_Status['upload_document']; ?>"><b style="color:#171919">:</b>&nbsp;&nbsp;<span style="color:#1ECBE4;">View</span>
													 </a>                                                        
                                                    </div>
                                                </div>
												<?php } ?>
											</div>											
									     </div>
									</fieldset><br>
									<?php  }  ?>
								</div><br>												
							  <div class="col-md-12">
								<fieldset  style="margin-left:0%;border:1px solid #00355F;border-radius:10px; margin-top:1%;">
								   <legend style="font-size:16px;margin-left:10px;color:#00355F;"><b>Status Update :</b></legend>
									<div class="col-md-12">
									   <div class="form-group">											    
										<label for="inputContent" class="col-md-3 control-label bold">Status<span class="require">*</span></label>
										<div class="col-md-3">
											<div class="input text">
												<?php echo $this->Form->control('status_id',['class'=>'form-control status','label'=>false,'error'=>false,'options'=>$statuses,'empty'=>'Select']);?>
											</div>
										</div>
										<label for="inputContent" class="col-md-3 control-label bold">Internal Communication<span class="require"></span></label>
										<div class="col-md-3">
											<div class="input text">
												<?php echo $this->Form->control('internal_communication',['class'=>'form-control','label'=>false,'error'=>false,'type'=>'textarea','rows'=>2]);?>
											</div>
										</div>										
									 </div>
								   </div>															  
								</fieldset><br>		
                            </div>
							<div class="col-lg-12">
								<div class="form-actions text-center none-bg">
									<div class="col-md-offset-2 col-md-8">
										<button type="button" class="btn btn-green" onclick="formvalidate();">Submit</button>										
										<?php echo $this->Form->control('rti_id',['type'=>'hidden','label'=>false,'error'=>false,'value'=>$rtiRequestRecord['id']]);?>
																				
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
</div>
<script>
/*$(function() {
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
});*/
 function formvalidate(){
    var rti_id = $('#rti-id').val();
    var status = $('.status').val();
	//alert(rti_id);
    var int_communication = $('#internal-communication').val();
	if(status != ''){	
	$.ajax({
			async: true,
			dataType: "html",
			url: "<?php echo $this->Url->build('/', true)?>admin/rti_request_records/ro_status_update/"+rti_id+"/"+ status+"/"+int_communication,
			method: 'get',
			success: function(data, textStatus) { //alert();
				$("#modal-add-unsent").modal('hide');  
				 location.reload();
			}
		});	
	
	}else{
	alert("Select Status");
    return false;
   }
 
 }
</script>

