<style type="text/css">
.error {
    color: red;
}
.red {
    color: red;
}

</style>
<div class="row" >
    <?php $error = $this->Session->flash(); ?>
    <?php if($error != ''){?>
    <div class="col-lg-12">
        <div class="note note-success"> <?php echo $error;?> </div>
    </div>
    <?php }?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-red">
                        <div class="portlet box portlet-red">
                            <div class="portlet-header">
                                <div class="caption"><?php echo "Record Request Details"?></div>
								<div class="actions">
								 <?php if($LOGGED_ROLE == 3){ echo $this->Html->link('<i class="fas fa-plus-circle"></i>&nbsp;Add Record Request',array('action'=>'rti_add'), array('escape' => false,'class'=>'btn btn-outline-secondary','target'=>'_blank')); } ?>
                                </div>
                            </div>
                        </div>   
						  <?php echo $this->Form->create('',['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
                        <div class="panel-body pan">
                            <div class="form-body pal">
							    <div class="col-md-12">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-md-12"> <label for="inputContent">Record Type<span class="require">&nbsp;*</span></label>

                                            <div class="input text">
                                                <?php echo $this->Form->control('document_type_id',['class'=>'form-control','label'=>false,'error'=>false,'empty'=>'Select Record Type','options'=>$documentTypes]);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="input text">
                                                <?php echo $this->Form->control('rti_request_type',['class'=>'form-control','label'=>'Request Type','error'=>false,'empty'=>'Select Request Type','options'=>$req_types]);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="input text">
                                                <?php echo $this->Form->control('application_request_type',['class'=>'form-control','label'=>'Application Type','error'=>false,'empty'=>'Select Application Type','options'=>$app_types]);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
								<div class="col-md-12">
								<div class="col-md-3">
								    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="input text">
                                                <?php echo $this->Form->control('from_date',['class'=>'form-control datepicker1 calendar','label'=>'From Date','error'=>false,'readonly']);?>
                                            </div>
                                        </div>
                                    </div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
                                        <div class="col-md-12">
                                            <div class="input text">
                                                <?php echo $this->Form->control('to_date',['class'=>'form-control datepicker1 calendar','label'=>'To Date','type'=>'text','error'=>false,'readonly']);?>
                                            </div>
                                        </div>
                                    </div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
                                        <div class="col-md-12">
                                            <div class="input text">
                                            </div>
                                        </div>
                                    </div>
								</div>
								</div>
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-actions text-right none-bg">
                                            <div class="col-md-offset-3 col-md-10">
                                                <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i>&nbsp; Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo $this->Form->End();?>
                    <div class="row">                  
                  	<div class="col-lg-12">
					   <?php if($rtiRequestRecords != ''){  ?>
                           <?php if(count($rtiRequestRecords) != 0){  ?>
						<div class="panel panel-red">						   
							<div class="panel-body pan">
								<div class="form-body pal">						

									<div class="row">
										<div class="col-lg-12">
										    <center><h4><b><?php echo $rtiRequestRecords[0]['doc_type_name']." Applications"; if($from_date != '1970-01-01'){ echo " From ".date('d-m-Y',strtotime($from_date)); } if($to_date != '1970-01-01'){ echo " upto ".date('d-m-Y',strtotime($to_date)); } ?></b></h4></center>
											<div class="table-responsive" style="overflow:auto">
												<table id="table_id"
													class="table table-hover table-striped table-bordered table-advanced tablesorter display">
													<thead class="info">
														<tr>
															<th scope="col"><?php echo $this->Paginator->sort('sno') ?></th>
															<th scope="col">
																<?php echo $this->Paginator->sort('application_request_type') ?>
															</th>
															<th scope="col">
																<?php echo $this->Paginator->sort('application_reference_no') ?>
															</th>
															<th scope="col">
																<?php echo $this->Paginator->sort('application_date') ?>
															</th>
															<th scope="col">
																<?php echo $this->Paginator->sort('deadline_date') ?>
															</th>
															<th scope="col">
																<?php echo $this->Paginator->sort('application_status') ?>
															</th>                                                        
															 <th scope="col">
																<?php echo $this->Paginator->sort('Action') ?>
															</th>
														</tr>

													</thead>
													<tbody>
														<?php $sno =1; foreach ($rtiRequestRecords as $rtiRequestRecord): ?>
														<tr>
															<td><?php echo($sno); ?></td>
															<td><?php echo $rtiRequestRecord['request_type']." - ".$rtiRequestRecord['application_request_type'] ?></td>
															<td><?php echo $rtiRequestRecord['application_reference_no'] ?></td>
															<td class="center"><?php echo date('d-m-Y',strtotime($rtiRequestRecord['application_date'])) ?></td>                                                       
															<td class="center"><?php echo ($rtiRequestRecord['deadline_date'] != '')?"<b><p style = 'color:green;'>".date('d-m-Y',strtotime($rtiRequestRecord['deadline_date']))."</p></b>":''; ?></td>                                                       
															<td class="left"><?php echo $rtiRequestRecord['application_status'];  ?></td>
															<td class="center" style="width:20%;">
																<?php echo $this->Html->link(__('<i class="fa fa-eye"></i>&nbsp;View'), ['action' => 'rti_view', $rtiRequestRecord['id']], ['escape' => false,'class'=>'btn btn-outline-success btn-xs  btn-xs','target'=>'_blank']) ?>
																	&nbsp;&nbsp;
																<?php if(($LOGGED_ROLE == 5) && ($rtiRequestRecord['officer_level'] == 5)  && ($rtiRequestRecord['dispatch_flag'] == 0)){  ?>
																<?php echo $this->Html->link(__('<i class="fa fa-edit"></i>&nbsp;Update'), ['action' => 'sa_record_update', $rtiRequestRecord['id']], ['escape' => false,'class'=>'btn btn-outline-secondary  btn-xs']) ?>
																<?php  }  ?>
																<?php if(($LOGGED_ROLE == 5) && ($rtiRequestRecord['dispatched_date'] == '') && ($rtiRequestRecord['dispatch_flag'] == 1)){  ?>
															    <?php echo $this->Html->link(__('<i class="fa fa-edit"></i>&nbsp;Update'), ['action' => 'sa_dispatch_update', $rtiRequestRecord['id']], ['escape' => false,'class'=>'btn btn-outline-secondary  btn-xs']) ?>
															   <?php  }  ?>
																<?php if(($LOGGED_ROLE == 9) && ($rtiRequestRecord['officer_level'] == 9)){  ?>
																<?php echo $this->Html->link(__('<i class="fa fa-edit"></i>&nbsp;Update'), ['action' => 'sh_record_update', $rtiRequestRecord['id']], ['escape' => false,'class'=>'btn btn-outline-secondary  btn-xs']) ?>
																<?php  }  ?>
																<?php if(($LOGGED_ROLE == 4) && ($rtiRequestRecord['officer_level'] == 4)){  ?>
																<button type="button" class= "btn btn-outline-secondary  btn-xs" onclick="getdetails('<?php echo $rtiRequestRecord['id'] ;?>')"><i class="fa fa-edit">Verify</i></button> 
																<?php  }  ?>
																
															</td>
														</tr>
														<?php $sno++; endforeach; ?>
													</tbody>

												</table>
											</div>
										</div>
									</div>							
								</div>
							</div> 						 
						</div>
						 <?php }else{ echo "No Record Found"; } } ?>		
					</div>                				
                 </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <div id="modal-add-unsent" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade col-lg-12">
	<div class="modal-dialog" style="width:80%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
			</div>
			<div class="modal-body">
				<div class="form add-unsent-form">
					  
				</div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
$(document).ready(function() {
    $('.datepicker1').datepicker({ endDate: new Date() });
});

$(function() {
    $("#FormID").validate({
        rules: {
            'document_type_id': {
                required: true
            }
        },

        messages: {
            'document_type_id': {
                required: "Select Record Type"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});

function getdetails(rti_id){
	$(".add-unsent-form").html("<span class='erro'>Fetching data!!!!!");
	$("#modal-add-unsent").modal('show');
    //alert(location_id);
		$.ajax({
			async    : true,  
			dataType : "html",  
			type     : "post",
			url:"<?php echo $this->Url->build('/', true)?>admin/rti_request_records/ajaxgetrtidetails/"+rti_id,
			success  : function (data, textStatus) {
				$(".add-unsent-form").html(data);
				
			}
		}); 			

}
</script>
