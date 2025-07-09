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
.control-label{
   margin-left:10px;
}

#remarkside:hover + .showremark {
  display: block;  
}
</style>
<style>
.bold{
font-weight :bold;
}
.col-md-12{
padding : 5px;

}
.table.table-advanced thead tr th{border-width: 1px !important;text-align:center;}
#district_full > thead.info tr th{background: #0a819c none repeat scroll 0 0;color: #FFF;}
#division_full > thead.info tr th{background: #40c9e8 none repeat scroll 0 0;}
#scheme_full > thead.info tr th{background: #8DAD5A none repeat scroll 0 0;}
#asset_full > thead.info tr th{background: #68B7B3 none repeat scroll 0 0;}

.nav.nav-tabs{display: none;}
.tab-content>.tab-pane{display: block;}
.fade{opacity: 1;}

</style>
<div class="row" style="margin-left:20px;" oncontextmenu="return true;">
    <?php echo $this->Form->create($rtiRequestRecord,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-11">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">RTI Request Details</div>
                        </div>
                        <div class="panel-body pan">
                            <div class="form-body pal">								
								<div class="col-md-5">
									<fieldset  style="margin-left:1%;border:1px solid #00355F;border-radius:10px; margin-top:1%;">
									   <legend style="font-size:16px;margin-left:10px;color:#00355F;"><b>RTI Request Details :</b></legend>
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
												<label for="inputContent" class="col-md-5 control-label bold">Document Type<span class="require"></span></label>
												<div class="col-md-6">
													<div class="input text">
														<?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['document_type']['name']; ?>
													</div>
												</div>											
											</div>								
											<div class="form-group subtype" <?php if($rtiRequestRecord['document_subtype'] == ""){  ?> style="display:none;" <?php } ?>>											    
												<label for="inputContent" class="col-md-5 control-label bold">Document SubType<span class="require"></span></label>
												<div class="col-md-6">
													<div class="input text">
														<?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['document_subtype']['name']; ?>
													</div>
												</div>					
											</div>	
											<div class ="voter" <?php if($rtiRequestRecord['document_type_id'] != 8){  ?>style="display:none;" <?php } ?>>
											 <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Constituency <span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['voter_constituency_name']; ?>
                                                    </div>
                                                </div>
                                            </div>                                     
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Record Year<span class="require"></span></label>
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
                                                <label for="inputContent" class="col-md-5 control-label bold">District <span class="require"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo "<b>:</b>&nbsp;&nbsp;".$rtiRequestRecord['osr_district_name'];?>
                                                    </div>
                                                </div>
                                            </div>                                     
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Taluk <span class="require"></span></label>
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
                                                       <?php echo ($rtiRequestRecord['go_date'] != '')?"<b>:</b>&nbsp;&nbsp;".date('d-m-Y',strtotime($rtiRequestRecord['bp_date'])):'';?>
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
											 <div class="form-group document" <?php if($rtiRequestRecord['user_doc_file_path'] == ""){  ?> style="display:none;" <?php } ?>>
                                                <label for="inputContent" class="col-md-5 control-label bold">Document <span class="require"></span></label>
                                                <div class="col-md-6">
												    
                                                    <div class="input text">
													     <a target="_blank"
                                                                href="<?php echo $this->Url->build('/', true)?>webroot/uploads/RTI/<?php echo $rtiRequestRecord['user_doc_file_path']; ?>"><b style="color:#171919">:</b>&nbsp;&nbsp;<span style="color:#1ECBE4;">View</span>
                                                         </a>                                                        
                                                    </div>
                                                </div>
                                            </div>
										</div>										
									</fieldset><br>	
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
							   <div class="col-lg-5">
							  <?php if($rti_status_logs != ''){  ?>
							 <div class="tab-pane fade" id="settings">
								<div class="col-lg-12">
							<div class="timeline-centered timeline-sm" style="width:350px;margin-left:100px;">
							<?php $i=0; foreach ($rti_status_logs as $key_id => $rti_status){		//print_r($projectTransaction);exit;						
							?>
								<article class="timeline-entry">
									<div class="timeline-entry-inner">  
										<time datetime="<?php echo date("Y-m-d",strtotime($rti_status->created_date)); ?>" class="timeline-time"><span>
										<?php 
											echo date("d/m/Y",strtotime($rti_status['created_date']));  
										 ?><br>
										<?php 
											echo $rti_status['admin_user']['name'];  
										 ?> 
										</span>									
										</time>
									    <div class="timeline-icon">
											<i class="fa fa-group"></i>  
										</div>
										<div class="timeline-label bg-white box-shadow">
											<div class="row">												
												<div class="col-md-12 col-xs-12">													
													<div class="col-md-6 col-xs-12">
														<span class="label" style="color:#300567;font-weight:bold"><?php echo $rti_status['status']['name']; ?></span>
													</div>									
												</div>
												<div class="col-md-12 col-xs-12">	
													<div class="col-md-12 col-xs-12 " >												       
													    <?php										
														    if($rti_status['internal_communication'] != ""){ ?>
														    <hr>
														       <div id="remarkside"><b>Remarks :</b></div><br> 
													       <div class ="showremark"><?php echo "&nbsp;".$rti_status['internal_communication'];  ?></div>
													    <?php }  ?>    
													</div>						
												</div>
											</div>																		
											<div class="row">   
												<div class="col-xs-12">  
													<?php if($rti_status['document_upload'] != ''){ ?>  
														 <hr>
														<span style="font-size:11px;"><b> Document&nbsp;:</b></span>&nbsp;&nbsp;
														<a target="_blank" href="<?php echo $this->Url->build('/', true)?>webroot/uploads/RTI/<?php echo $rti_status['document_upload'] ; ?>" role="button" class="btn btn-success btn-xs"><span class="download_icon" style="background-color: transparent;font-size: inherit;"><i class="fa fa-file-pdf-o"></i></span></a>
													<?php } ?> 												
												</div>
											</div>
										</div>
										
									</div>
								</article>
							<?php $i++; } ?>				
							</div>
						    </div>							
		                    </div>
							 <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $this->Form->End();?>
</div>
