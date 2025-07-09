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
</style>
<div class="row" style="margin-left:20px;" oncontextmenu="return false;">  
    <?php echo $this->Form->create($rtirequest,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-11">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">Record Request Form</div>
                        </div>
                        <div class="panel-body pan">
                            <div class="form-body pal">	
							    <div class="col-lg-11">
								<fieldset  style="margin-left:0%;border:1px solid #00355F;border-radius:10px; margin-top:1%;">
								   <legend style="font-size:16px;margin-left:10px;color:#00355F;"><b>Application Type :</b></legend>
									<div class="col-md-12">
									   <div class="form-group">	
									   <label for="inputContent" class="col-md-3 control-label bold"> Request Type<span class="require">&nbsp;*</span></label>
										<div class="col-md-3">
											<div class="input text">
												<?php echo $this->Form->control('rti_request_type_id',['class'=>'form-control','label'=>false,'error'=>false,'options'=>$req_types,'empty'=>'Select']);?>
											</div>
											 <?php //echo $this->Form->error('rti_request_type_id'); ?>
										</div>	
									 </div>
								   </div>
								</fieldset><br><br>
								</div><br>
									<div class="col-md-5">
									<fieldset  style="margin-left:1%;border:1px solid #00355F;border-radius:10px; margin-top:1%;">
									   <legend style="font-size:16px;margin-left:10px;color:#00355F;"><b>Record Request  :</b></legend>
										<div class="col-md-12">										  
											<div class="form-group">											    
												<label for="inputContent" class="col-md-4 control-label bold">Record Type<span class="require">&nbsp;*</span></label>
												<div class="col-md-6">
													<div class="input text">
														<?php echo $this->Form->input('document_type_id',['class'=>'form-control','label'=>false,'error' => false,'options'=>$documentTypes,'empty'=>'Select Record']); ?>
													</div>
													 <?php //echo $this->Form->error('document_type_id'); ?>
												</div>											
											</div>											
											 <div class="form-group other_doc" style="display:none;">
                                                <label for="inputContent" class="col-md-4 control-label bold">Other Record Type <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('other_document',['class'=>'form-control other_doc','label'=>false,'error'=>false,'maxlength'=>'70','minlength'=>'2','placeholder'=>'Enter Other Document']);?>
                                                    </div>
                                                     <?php //echo $this->Form->error('other_document'); ?>
                                                </div>
                                            </div>
											 <div class="form-group other_doc" style="display:none;">
                                                <label for="inputContent" class="col-md-4 control-label bold">Description<span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('other_doc_description',['class'=>'form-control other_doc','label'=>false,'error'=>false,'minlength'=>'2','maxlength'=>'150','placeholder'=>'Enter Other Document Description','type'=>'textarea','rows'=>3]);?>
                                                    </div>
                                                     <?php //echo $this->Form->error('other_doc_description'); ?>
                                                </div>
                                            </div>
											<div class="form-group subtype">											    
												<label for="inputContent" class="col-md-4 control-label bold">Record SubType<span class="require">&nbsp;*</span></label>
												<div class="col-md-6">
													<div class="input text">
														<?php echo $this->Form->input('document_subtype_id',['class'=>'form-control','label'=>false,'error' => false,'options'=>'','empty'=>'Select Record Sub Type']); ?>
													</div>
													 <?php //echo $this->Form->error('document_subtype_id'); ?>
												</div>					
											</div>	
											<div class ="voter" style="display:none;">
											 <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Constituency <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('voter_constituency_name',['class'=>'form-control voter','label'=>false,'error'=>false,'maxlength'=>'70','minlength'=>'2','placeholder'=>'Enter Constituency Name']);?>
                                                    </div>
                                                     <?php //echo $this->Form->error('voter_constituency_name'); ?>
                                                </div>
                                            </div>                                     
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Year<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                       <?php echo $this->Form->control('voter_record_year',['class'=>'form-control num yop','label'=>false,'error'=>false,'minlength'=>4,'maxlength'=>4,'placeholder'=>'Record Year','onblur'=>'callYear(this.value)']);?>
													</div>
													 <?php //echo $this->Form->error('voter_record_year'); ?>
                                                </div>
                                            </div>
                                            </div>
											<div class ="dist" style="display:none;">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">District <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('district_name',['class'=>'form-control dist','label'=>false,'error'=>false,'maxlength'=>'70','minlength'=>'2','placeholder'=>'Enter District Name']);?>
                                                    </div>
                                                     <?php //echo $this->Form->error('district_name'); ?>
                                                </div>
                                            </div>                                     
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Taluk <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('taluk_name',['class'=>'form-control dist','label'=>false,'error'=>false,'maxlength'=>'70','minlength'=>'2','placeholder'=>'Enter Taluk Name']);?>
                                                    </div>
                                                     <?php //echo $this->Form->error('taluk_name'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Village <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('village_name',['class'=>'form-control dist','label'=>false,'error'=>false,'maxlength'=>'70','minlength'=>'2','placeholder'=>'Enter Village Name']);?>
                                                    </div>
                                                     <?php //echo $this->Form->error('village_name'); ?>
                                                </div>
                                            </div>
                                            </div>											                                                                      
                                            <div class="form-group survey" style="display:none;">
                                                <label for="inputContent" class="col-md-4 control-label bold">Survey No<span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('survey_no',['class'=>'form-control survey','label'=>false,'error'=>false,'minlength'=>'1','maxlength'=>'6','placeholder'=>'Enter Survey No']);?>
                                                    </div>
                                                     <?php //echo $this->Form->error('survey_no'); ?>
                                                </div>
                                            </div>                                            									                                                                       
                                            <div class="form-group ifr_title" style="display:none;">
                                                <label for="inputContent" class="col-md-4 control-label bold">Title Deed No<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('title_deed_no',['class'=>'form-control ','label'=>false,'error'=>false,'maxlength'=>'50','minlength'=>'2','placeholder'=>'Enter Title Deed No']);?>
                                                    </div>
                                                </div>
                                            </div>                                         
											<div class ="beic" style="display:none;">                                                                          
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">General No<span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('beic_general_no',['class'=>'form-control beic','label'=>false,'error'=>false,'maxlength'=>'50','minlength'=>'2','placeholder'=>'Enter General No']);?>
                                                    </div>
                                                     <?php //echo $this->Form->error('beic_general_no'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Department<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('beic_department',['class'=>'form-control ','label'=>false,'error'=>false,'maxlength'=>'50','minlength'=>'2','placeholder'=>'Enter Department No']);?>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
											<div class ="bp" style="display:none;">                                                                          
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">BP No<span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('bp_no',['class'=>'form-control bp','label'=>false,'error'=>false,'maxlength'=>'50','minlength'=>'2','placeholder'=>'Enter BP No']);?>
                                                    </div>
                                                     <?php //echo $this->Form->error('bp_no'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">BP Date<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                       <?php echo $this->Form->control('bp_date',['class'=>'form-control bp datepicker1 calendar','label'=>false,'error'=>false,'readonly'=>'readonly','type'=>'text','placeholder'=>'BP Date']);?>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Abstract Subject<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('bp_abstract_subject',['class'=>'form-control ','label'=>false,'error'=>false,'maxlength'=>'50','minlength'=>'2','placeholder'=>'Enter Abstract Subject']);?>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
											<div class ="go" style="display:none;">   
											<div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">GO Department<span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('go_department_id',['class'=>'form-control go','label'=>false,'error'=>false,'options'=>$go_departments,'empty'=>'Select GO Department']);?>
                                                    </div>
                                                     <?php //echo $this->Form->error('go_department_id'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">GO No<span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('go_no',['class'=>'form-control go','label'=>false,'error'=>false,'maxlength'=>'50','minlength'=>'2','placeholder'=>'Enter GO No']);?>
                                                    </div>
                                                     <?php //echo $this->Form->error('go_no'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">GO Date<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                       <?php echo $this->Form->control('go_date',['class'=>'form-control go datepicker1 calendar','label'=>false,'error'=>false,'readonly'=>'readonly','type'=>'text','placeholder'=>'GO Date']);?>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Abstract Subject<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('go_abstract_subject',['class'=>'form-control ','label'=>false,'error'=>false,'minlength'=>'2','placeholder'=>'Enter Abstract Subject']);?>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
											<div class ="gazette" style="display:none;">  
										    <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Notification No<span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('gazettes_notification_no',['class'=>'form-control gazette','label'=>false,'error'=>false,'maxlength'=>'50','minlength'=>'2','placeholder'=>'Enter Notification No']);?>
                                                    </div>
                                                     <?php //echo $this->Form->error('gazettes_notification_no'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Notification Date<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                       <?php echo $this->Form->control('gazettes_notification_date',['class'=>'form-control datepicker1 calendar','label'=>false,'error'=>false,'readonly'=>'readonly','type'=>'text','placeholder'=>'Notification Date']);?>
                                                    </div>
                                                </div>
                                            </div>											
                                            </div>
											<div >  
											 <div class="form-group search"  style="display:none;">
                                                <label for="inputContent" class="col-md-4 control-label bold">Search By<span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('search',['type' => 'radio','class'=>'search','options' =>[1=>'Author',2=>'Publisher'],'label' => false, 'onchange'=>'getbookdetails(this.value)']);?>

                                                    </div>
                                                     <?php //echo $this->Form->error('search'); ?>
                                                </div>
                                            </div>										    
                                            <div class="form-group publisher" style="display:none;">
                                                <label for="inputContent" class="col-md-4 control-label bold">Publisher Name<span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                       <?php echo $this->Form->control('book_publisher_name',['class'=>'form-control publisher','label'=>false,'error'=>false,'options'=>$publisher,'empty'=>'Select Publisher']);?>
                                                    </div>
                                                     <?php //echo $this->Form->error('book_publisher_name'); ?>
                                                </div>
                                            </div>
											<div class="form-group book" style="display:none;">
                                                <label for="inputContent" class="col-md-4 control-label bold">Author Name<span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('book_author',['class'=>'form-control book','label'=>false,'error'=>false,'options'=>$authors,'empty'=>'Select Author']);?>
                                                    </div>
                                                     <?php //echo $this->Form->error('book_author'); ?>
                                                </div>
                                            </div>
											 <div class="form-group  book" style="display:none;">
                                                <label for="inputContent" class="col-md-4 control-label bold">Book Title<span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                       <?php echo $this->Form->control('book_title',['class'=>'form-control book','label'=>false,'options'=>$booktitles,'empty'=>'Select Title']);?>
                                                    </div>
                                                     <?php //echo $this->Form->error('book_title'); ?>
                                                </div>
                                            </div>	
											<div class="form-group  book" style="display:none;">
                                                <label for="inputContent" class="col-md-4 control-label bold">Published Year<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                       <?php echo $this->Form->control('book_publication_year',['class'=>'form-control num yop','label'=>false,'error'=>false,'minlength'=>'4','maxlength'=>'4','onblur'=>'callYear(this.value)']);?>
                                                    </div>
                                                </div>
                                            </div>	
											<div class="form-group  book" style="display:none;">
                                                <label for="inputContent" class="col-md-4 control-label bold">Book Subject<span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                       <?php echo $this->Form->control('book_subject',['class'=>'form-control alphanumeric','label'=>false,'error'=>false,'type'=>'text','placeholder'=>'Enter Subject']);?>
                                                    </div>
                                                     <?php //echo $this->Form->error('book_subject'); ?>
                                                </div>
                                            </div>	
                                            </div>
											 <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Processing fee (Rs.)<span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('processing_fee',['class'=>'form-control num','label'=>false,'error'=>false,'min'=>1,'maxlength'=>'4','required'=>true,'placeholder'=>'Processing Fee','value'=>10]);?>
                                                    </div>
                                                     <?php //echo $this->Form->error('processing_fee'); ?>
                                                </div>
                                            </div>
											 <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Record Request Mode<span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('document_request',['class'=>'form-control','label'=>false,'error'=>false,'required'=>false,'empty'=>'Select','options'=>['Hard copy'=>'Hard copy','Soft copy'=>'Soft copy']]);?>
                                                    </div>
                                                     <?php //echo $this->Form->error('document_request'); ?>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Enclosure<span class="require"></span></label>
                                                <div class="col-md-3">
                                                    <div class="input text">
                                                       <?php echo $this->Form->control('is_document',['type'=>'checkbox','label'=>false,'error'=>false]);?>
                                                    </div>
                                                     <?php //echo $this->Form->error('is_document'); ?>
                                                </div>
                                            </div>  	
											 <div class="form-group document" style ="display:none;">
                                                <label for="inputContent" class="col-md-4 control-label bold">Upload<br>Enclosure <span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('file_path',['class'=>'form-control document_path resumeUpload','type'=>'file','label'=>false,'error'=>false,'required'=>'true','onchange'=>'validdocs(this)']);?>
                                                        <small class="danger" style="color: tomato;"> Only PDF File
                                                            allowed <br>(maximum 2MB).  
                                                        </small>
                                                    </div>
                                                     <?php //echo $this->Form->error('file_path'); ?>
                                                </div>
                                            </div>
										</div>
									</fieldset><br>							
								</div>								
								<div class="col-md-1">
								</div>
								<div class="col-md-5">
									<fieldset  style="margin-left:0%;border:1px solid #00355F;border-radius:10px; margin-top:1%;">
									   <legend style="font-size:16px;margin-left:10px;color:#00355F;"><b>Personal Details :</b></legend>
										  <div class="col-md-12">
											<div class="form-group">											    
												<label for="inputContent" class="col-md-4 control-label bold">Name<span class="require">&nbsp;*</span></label>
												<div class="col-md-6">
													<div class="input text">
												        <?php echo $this->Form->control('applicant_name',['class'=>'form-control name','label'=>false,'error'=>false,'maxlength'=>'70','minlength'=>'2','placeholder'=>'Enter Name','value'=>$user['name']]);?>
                                                	</div>
                                                	 <?php //echo $this->Form->error('applicant_name'); ?>
												</div>											
											 </div>
											 <div class="form-group">											    
												<label for="inputContent" class="col-md-4 control-label bold">Father /Spouse Name<span class="require"></span></label>
												<div class="col-md-6">
													<div class="input text">
												       <?php echo $this->Form->control('father_name',['class'=>'form-control name','label'=>false,'error'=>false,'maxlength'=>'70','minlength'=>'2','placeholder'=>'Enter Father Name','value'=>$user['father_name']]);?>
                                                    </div>
												</div>									
											 </div>
											<div class="form-group">											    
												<label for="inputContent" class="col-md-4 control-label bold">Mobile<span class="require">&nbsp;*</span></label>
												<div class="col-md-6">
													<div class="input text">
													    <?php echo $this->Form->control('mobile_no',['class'=>'form-control num','label'=>false,'error'=>false,'maxlength'=>'10','minlength'=>'10','placeholder'=>'Enter Mobile No','value'=>$user['mobile_no']]);?>
                                                   </div>
                                                    <?php //echo $this->Form->error('mobile_no'); ?>
												</div>											
											</div>
											<div class="form-group">						    
												<label for="inputContent" class="col-md-4 control-label bold">Email<span class="require">&nbsp;*</span></label>
												<div class="col-md-6">
													<div class="input text">
												       <?php echo $this->Form->control('email',['class'=>'form-control ','label'=>false,'error'=>false,'maxlength'=>'50','minlength'=>'2','placeholder'=>'Enter Email','value'=>$user['email']]);?>
                                                	</div>
                                                	 <?php //echo $this->Form->error('email'); ?>
												</div>
											</div>					
											<div class="form-group">											    
												<label for="inputContent" class="col-md-4 control-label bold">Address<span class="require">&nbsp;*</span></label>
												<div class="col-md-6">
													<div class="input text">
												       <?php echo $this->Form->control('address',['class'=>'form-control ','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'2','rows'=>2,'value'=>$user['address']]);?>
                                                	</div>
                                                	 <?php //echo $this->Form->error('address'); ?>
												</div>										   
											</div>
											<div class="form-group">											    
												<label for="inputContent" class="col-md-4 control-label bold">District<span class="require">&nbsp;*</span></label>
												<div class="col-md-6">
													<div class="input text">
												       <?php echo $this->Form->control('district_id',['class'=>'form-control','label'=>false,'error'=>false,'options'=>$districts,'empty'=>'Select District','value'=>$user['district_id']]);?>
                                                	</div>
                                                	 <?php //echo $this->Form->error('district_id'); ?>
												</div>										   
											</div>
											<div class="form-group">											    
												<label for="inputContent" class="col-md-4 control-label bold">Taluk<span class="require">&nbsp;*</span></label>
												<div class="col-md-6">
													<div class="input text">
												       <?php echo $this->Form->control('taluk_id',['class'=>'form-control','label'=>false,'error'=>false,'options'=>'','empty'=>'Select Taluk','options'=>$taluks,'value'=>$user['taluk_id']]);?>
                                                	</div>
                                                	 <?php //echo $this->Form->error('taluk_id'); ?>
												</div>										   
											</div>
											<div class="form-group">											    
												<label for="inputContent" class="col-md-4 control-label bold">Pincode<span class="require">&nbsp;*</span></label>
												<div class="col-md-6">
													<div class="input text">
												       <?php echo $this->Form->control('pincode',['class'=>'form-control','label'=>false,'error'=>false,'maxlength'=>'6','minlength'=>'6','placeholder'=>'Enter Pincode','value'=>$user['pincode']]);?>
                                                	</div>
                                                	 <?php //echo $this->Form->error('pincode'); ?>
												</div>										   
											</div>
										</div>
									</fieldset><br>		
							    </div><br>										
                            </div>
							<div class="col-lg-12">
								<div class="form-actions text-center none-bg">
									<div class="col-md-offset-2 col-md-8">
										<button type="submit" class="btn btn-secondary">Save</button>
										<button type="button" class="btn btn-danger"
											onclick="javascript:history.back()">Cancel</button>
										<button type="button" class="btn btn-warning" id="res"
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
    <?php echo $this->Form->End();?>
</div>

<script>
$('.datepicker1').datepicker({endDate:new Date()});
function callYear(yop){
var current_year = new Date().getFullYear();
var yop;
	if((parseInt(yop)) <= 1600  || (parseInt(yop)) >  current_year){
		$('#book-publication-year').val('');
		$('#voter-record-year').val('');
		alert('Invalid Year Value');
		return false;
	}else{
        return true;
    }	
}

$('#document-type-id').change(function() {
	$('#document-subtype-id').val('');
    $('#district-name').val('');
    $('#village-name').val(''); 
    $('#taluk-name').val(''); 
    $('#survey-no').val(''); 
    $('#voter-constituency-name').val(''); 
    $('#voter-record-year').val(''); 
    $('#title-deed-no').val(''); 
    $('#gazettes-notification-no').val(''); 
    $('#gazettes-notification-date').datepicker('setDate', null); 
    $('#beic-general-no').val(''); 
    $('#beic-department').val('');
	$('#bp-no').val(''); 
    $('#bp-date').datepicker('setDate', null);
    $('#bp-abstract-subject').val('');
	$('#go-no').val(''); 
    $('#go-date').datepicker('setDate', null);	
    $('#go-abstract-subject').val('');
	$('input[name="search"]').attr('checked', false);
    $('#book-publisher-name').val(''); 
	$('#book-author').val(''); 
	$('#book-author').val(''); 
	$('#book-title').val(''); 
	$('#book-publication-year').val(''); 
	$('#book-subject').val('');    
    $('.other_doc').val('');	
	
    var doctype = $('#document-type-id').val();
	
	if(doctype != ''){
		$.ajax({
			async: true,
			dataType: "html",
			url: "<?php echo $this->Url->build('/', true)?>rti-request-records/ajaxdocsubtype/" + doctype,
			method: 'get',
			success: function(data, textStatus) { //alert(data);
				$('#document-subtype-id').html(data);
			}
		});
    }
	
	
    if (doctype == 1){ 
	    $('.other_doc').hide().attr('required', false);
	    $('.search').hide().attr('required', false);
        $('.publisher').hide().attr('required', false);
		$('.subtype').hide().attr('required', false);
        $('.book').hide().attr('required', false);  		    
		$('.beic').hide().attr('required', false); 
		$('.bp').hide().attr('required', false); 
		$('.ifr_title').hide().attr('required', false); 
		$('.go').hide().attr('required', false);  
		$('.gazette').hide().attr('required', false);  
		$('.voter').hide().attr('required', false);  
		$('.dist').show().attr('required', true);
		$('.survey').show().attr('required', true); 
    }else if (doctype == 2){
	    $('.other_doc').hide().attr('required', false);
        $('.book').hide().attr('required', false);  	
        $('.search').hide().attr('required', false); 
        $('.publisher').hide().attr('required', false); 
		$('.subtype').hide().attr('required', false);
		$('.beic').hide().attr('required', false); 
		$('.bp').hide().attr('required', false); 
		$('.ifr_title').hide().attr('required', false);  
		$('.go').hide().attr('required', false);  
		$('.gazette').hide().attr('required', false);  
		$('.voter').hide().attr('required', false);  
		$('.dist').show().attr('required', true);  
		$('.survey').show().attr('required', true);
    }else if (doctype == 3){
	    $('.other_doc').hide().attr('required', false);
		$('.book').hide().attr('required', false);  
        $('.search').hide().attr('required', false); 
        $('.publisher').hide().attr('required', false); 	 		
        $('.subtype').hide().attr('required', false);
      	$('.beic').hide().attr('required', false); 
        $('.bp').hide().attr('required', false);  
		$('.survey').hide().attr('required', false);
		$('.go').hide().attr('required', false);
        $('.gazette').hide().attr('required', false); 
		$('.voter').hide().attr('required', false); 		
		$('.dist').show().attr('required', true);  
		$('.ifr_title').show();  
    }else if (doctype == 4) {
	    $('.other_doc').hide().attr('required', false);
		$('.book').hide().attr('required', false);
        $('.search').hide().attr('required', false); 
 		$('.publisher').hide().attr('required', false);			
        $('.dist').hide().attr('required', false);  
		$('.beic').hide().attr('required', false);    
		$('.bp').hide().attr('required', false);
		$('.survey').hide().attr('required', false);
		$('.gazette').hide().attr('required', false); 
		$('.ifr_title').hide().attr('required', false);
        $('.voter').hide().attr('required', false);
		$('.subtype').show().attr('required', true);
		$('.go').show().attr('required', true); 
    }else if (doctype == 5) {
	    $('.other_doc').hide().attr('required', false);
		$('.book').hide().attr('required', false); 
        $('.search').hide().attr('required', false);
        $('.publisher').hide().attr('required', false);	 		
        $('.dist').hide().attr('required', false); 
		$('.beic').hide().attr('required', false); 
		$('.survey').hide().attr('required', false);
		$('.ifr_title').hide().attr('required', false);
		$('.go').hide().attr('required', false); 
		$('.gazette').hide().attr('required', false); 
		$('.voter').hide().attr('required', false); 
		$('.subtype').show().attr('required', true);
		$('.bp').show().attr('required', true);	
   }else if (doctype == 6) {
        $('.other_doc').hide().attr('required', false);
	    $('.book').hide().attr('required', false);
        $('.search').hide().attr('required', false);
        $('.publisher').hide().attr('required', false);			
        $('.dist').hide().attr('required', false);
		$('.bp').hide().attr('required', false);
		$('.survey').hide().attr('required', false);		
		$('.ifr_title').hide().attr('required', false); 
		$('.go').hide().attr('required', false); 
		$('.gazette').hide().attr('required', false);
		$('.voter').hide().attr('required', false); 
		$('.subtype').show().attr('required', true);
		$('.beic').show().attr('required', true);
    }else if (doctype == 7) {
	    $('.other_doc').hide().attr('required', false);
		$('.book').hide().attr('required', false); 
		$('.bp').hide().attr('required', false);
        $('.search').hide().attr('required', false);	
        $('.publisher').hide().attr('required', false);			
		$('.dist').hide().attr('required', false);  
		$('.beic').hide().attr('required', false); 
		$('.survey').hide().attr('required', false);
		$('.go').hide().attr('required', false); 
		$('.ifr_title').hide().attr('required', false); 
		$('.voter').hide().attr('required', false);
		$('.subtype').show().attr('required', true);
		$('.gazette').show().attr('required', true); 
    }else if (doctype == 8) {
	    $('.other_doc').hide().attr('required', false);
        $('.book').hide().attr('required', false);
		$('.search').hide().attr('required', false); 
		$('.publisher').hide().attr('required', false);	
		$('.beic').hide().attr('required', false);       
        $('.bp').hide().attr('required', false);
		$('.survey').hide().attr('required', false);
		$('.ifr_title').hide().attr('required', false); 
		$('.gazette').hide().attr('required', false);
		$('.go').hide().attr('required', false); 
		$('.voter').show().attr('required', true); 
		$('.dist').show().attr('required', true);  
    }else if (doctype == 9) {
	    $('.other_doc').hide().attr('required', false);
		$('.dist').hide().attr('required', false);  
		$('.search').hide().attr('required', false);
        $('.publisher').hide().attr('required', false);			
		$('.beic').hide().attr('required', false); 
		$('.bp').hide().attr('required', false);
		$('.survey').hide().attr('required', false);
		$('.ifr_title').hide().attr('required', false); 
		$('.go').hide().attr('required', false); 
		$('.gazette').hide().attr('required', false);
		$('.subtype').show().attr('required', true);
	    $('.voter').hide().attr('required', false); 		
    }else if (doctype == 10){
	    $('.other_doc').show().attr('required', true); 
	    $('.dist').hide().attr('required', false);  
		$('.subtype').hide().attr('required', false);
		$('.search').hide().attr('required', false);
        $('.publisher').hide().attr('required', false);			
		$('.beic').hide().attr('required', false); 
		$('.bp').hide().attr('required', false);
		$('.survey').hide().attr('required', false);
		$('.ifr_title').hide().attr('required', false); 
		$('.go').hide().attr('required', false); 
		$('.gazette').hide().attr('required', false);		
	    $('.voter').hide().attr('required', false); 
	}   
   
});

function getbookdetails(id){
	var id;
	$('#book-publisher-name').val(''); 
	$('#book-author').val(''); 
	$('#book-title').val(''); 
	$('#book-publication-year').val(''); 
	$('#book-subject').val(''); 
	if(id == 1){
	   $('.book').show().attr('required', true);
	   $('.publisher').hide();	
	}else if(id == 2){
	   $('.book').show().attr('required', true);		
	  $('.publisher').show().attr('required', true);	
	}
}

$('#document-subtype-id').change(function() {
	 var subtype = $('#document-subtype-id').val();
	 if(subtype == '44'){
		$('.search').show().attr('required', true); 
			  
	 }else{
		 $('#book-publisher-name').val(''); 
         $('#book-author').val(''); 
         $('#book-author').val(''); 
         $('#book-title').val(''); 
         $('#book-publication-year').val(''); 
         $('#book-subject').val('');   
         $('input[name="search"]').attr('checked', false); 
         $('.search').hide().attr('required', false); 		 
         $('.book').hide().attr('required', false); 
 		 $('.publisher').hide().attr('required', false); 	 
	 }		 
});


$('#book-publisher-name').change(function() {	
	$('#book-title').val('');
	 var publisher = $('#book-publisher-name').val();
	 if(publisher != ''){
		$.ajax({
			async: true,
			dataType: "html",
			url: "<?php echo $this->Url->build('/', true)?>rti-request-records/ajaxgetauthor/" + publisher,
			method: 'get',
			success: function(data, textStatus) { //alert();
				$('#book-author').html(data);
			}
		});
	  }
   });		


$('#book-author').change(function() {
	 var author    = $('#book-author').val();
	 if(author != ''){
		$.ajax({
			async: true,
			dataType: "html",
			url: "<?php echo $this->Url->build('/', true)?>rti-request-records/ajaxgetbooktitle/" + author,
			method: 'get',
			success: function(data, textStatus) { //alert();
				$('#book-title').html(data);
			}
		});
     }
});


$('#district-id').change(function() {
	 var district_id    = $('#district-id').val();	 
	 if(district_id != ''){
		$.ajax({
			async: true,
			dataType: "html",
			url: "<?php echo $this->Url->build('/', true)?>rti-request-records/ajaxgettaluk/" + district_id,
			method: 'get',
			success: function(data, textStatus) { //alert();
				$('#taluk-id').html(data);
			}
		});
     }
});


$("#is-document").change(function() {
    if(this.checked) {
       $('.document').show().attr('required', true);
    }else{
	   $('#file-path').val('');
	   $('.document').hide().attr('required', false);
	}
});



$(function() {
    $("#FormID").validate({
         rules: {
            'applicant_name'	: {
               required        : true
             },
            'mobile_no'   		: {
                 required  	    : true             
           },
             'email'             : {
                required        : true				
            },
             'address'           : {
                 required        : true
            },
             'district_id'       : {
                required        : true
			},
             'taluk_id'          : {
                 required        : true
             },
             'pincode'           : {
                required        : true
            },
 			'document_type_id'  : {
                 required        : true
             },
			'document_subtype_id' : {
                required        : true
             },
			'rti_request_type_id' : {
               required        : true
            },
			'application_request_type' : {
                required        : true
             },
			 'bp_no'            	:{
			  required              :true
			 },
			 'bp_date'             :{
			  required             :true
			 },
			 'document_request'     :{
			  required             :true
			 }
        },

         messages: {
             'applicant_name'    : {
                 required        : "Enter Name"
            },
             'mobile_no'         : {
                 required        : "Enter Mobile No"				
             },
            'email'		        : {
                required        : "Enter Email id"             
            },
            'address'           : {
                required        : "Enter Address"
           },
             'district_id'       : {
                 required        : "Select District"
            },
             'taluk_id'          : {
                 required        : "Select Taluk"
             },
             'pincode'           : {
                required        : "Enter Pincode"
             },
			'document_type_id'  : {
                required        : "Select Document Type"
            },
			'document_subtype_id' : {
                required        : "Select Document Sub Type"
            },
			'rti_request_type_id' : {
                 required        : "Select Request Type"
             },
 			'application_request_type' : {
                required        : "Select Application Request Type"
             },
			 'bp_no'            	:{
			  required              :"Enter BP No"
			 },
			 'bp_date'             :{
			  required             :"Select BP Date"
			 },
			 'document_request'     :{
			  required             :"Select Document Request"
			 }
         },
        submitHandler: function(form) {
		    if(($('#book-publication-year').val() != '') || ($('#voter-record-year').val() != '')){
				  
				if(($('#book-publication-year').val() != '')){
				 var yop = $('#book-publication-year').val();
				 callYear(yop);
				}else if(($('#voter-record-year').val() != '')){
				 var yop = $('#voter-record-year').val();
				 callYear(yop);
				}			
			}
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