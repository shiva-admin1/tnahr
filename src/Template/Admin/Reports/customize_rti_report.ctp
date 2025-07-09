<style type="text/css">
.error {
    color: red;
}
.red {
    color: red;
} 	
#rti_con:link {
	color: blue;
	font-weight:bold;
}
a:hover {
 color: black;
   }
 label {
    font-weight: bold;
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
                                <div class="caption"><?php echo "Record Request Report"?></div>								
                            </div>
                        </div>   
						  <?php echo $this->Form->create('',['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
                        <div class="panel-body pan">
                            <div class="form-body pal">
							   <fieldset  style="margin-left:1%;border:1px solid #00355F;border-radius:10px; margin-top:1%;">
								 <legend style="font-size:16px;margin-left:10px;color:#00355F;"><b>Report :</b></legend>
									
							    <div class="col-md-12">
                                
								<div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-md-12"><label for="inputContent">Record Type<span class="require">&nbsp;*</span></label>
                                            <div class="input text">
                                                <?php echo $this->Form->control('document_type_id',['class'=>'form-control','label'=>false,'error'=>false,'empty'=>'Select Record Type','options'=>$documentTypes,'onchange'=>'loadreport();']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>                           
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
                                                <?php echo $this->Form->control('to_date',['class'=>'form-control datepicker1 calendar','label'=>'To Date','error'=>false,'readonly']);?>
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
							 </fieldset>	
                         </div>                     
                    </div>
                    <?php echo $this->Form->End();?>
                    <div class="row report">                  
						<div class="col-lg-12">
						   <?php if($rtiRequestRecords != ''){  ?>
							   <?php if(count($rtiRequestRecords) != 0){  ?>
								<div class="panel-body pan">
									<div class="form-body pal">	
									  <fieldset  style="margin-left:1%;border:1px solid #00355F;border-radius:10px; margin-top:1%;">
									 <legend style="font-size:16px;margin-left:10px;color:#00355F;"><b></b></legend>
										
									  <div class="portlet-body"><!--<a href="#" id="export_excel_button" title="rti_details" style="float:right;margin-right:150px;"><img title="Excelsheet" src="<?php echo $this->Url->build('/', true)?>webroot/img/excel.png" height="22px"></a><br><br>-->
										 <div style="text-align: right; margin-right: 100px; color:blue"><a href="javascript:printArea('print1')" onclick="printPreview()"><img title="Printer" src="<?php echo $this->Url->build('/', true)?>webroot/img/print.png" height="22px"></a>&nbsp;&nbsp;<a href="#" id="export_excel_button" title="rti_details" style="float:right;"><img title="Excelsheet" src="<?php echo $this->Url->build('/', true)?>webroot/img/excel.png" height="22px"></a></div><br><br>
		
										<div id="report1">
										   <div class="row ">
											<div class="col-lg-12">
												<center><h4><b><?php echo "No of ".$doc_name." Applications"; if($from_date != '1970-01-01'){ echo " From ".date('d-m-Y',strtotime($from_date)); } if($to_date != '1970-01-01'){ echo " upto ".date('d-m-Y',strtotime($to_date)); } ?></b></h4></center>
												<div class="table-responsive" style="overflow:auto">
													<table align ="center" style="width:50%;" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
														<thead class="info">
															<tr>
																<th class="center" rowspan="2">S.No</th>
																<th class="center" rowspan="2">Record Type</th>
																<th class="center" colspan="2" style="text-align:center;border-bottom:1px solid white;width:24%;">Count</th>
																<th class="center" rowspan="2">Total</th>
															</tr>
															<tr>
																<th style="text-align:center;width:12%;">RTI</th>
																<th style="text-align:center;width:12%;">Normal</th>																
															</tr>
														</thead>
														<tbody>
															<?php $sno =1; foreach ($rtiRequestRecords as $rtiRequestRecord): ?>
															<tr>
																<td class="center"><?php echo($sno); ?></td>
																<td class="center"><?php echo $doc_name; ?></td>                                                       
																<td class="center"><?php  
																if($rtiRequestRecord['rti_count']){ ?>
																	 <a href="javascript:void(0);" id ="rti_con" style="text-decoration:underline;font-weight:bold,color:black;" onclick="getrtidetails('<?php echo $doc_type_id; ?>','1','<?php echo ($from_date != '1970-01-01')?$from_date:''; ?>','<?php echo ($to_date != '1970-01-01')?$to_date:''; ?>');"><?php echo  $rtiRequestRecord['rti_count']; ?></a>
											
																<?php  }else{
																	 echo "0";
																  }

																?></td>
																<td class="center"><?php  
																if($rtiRequestRecord['normal_count']){ ?>
																	 <a href="javascript:void(0);" id ="rti_con" style="text-decoration:underline;font-weight:bold,color:black;" onclick="getrtidetails('<?php echo $doc_type_id; ?>','2','<?php echo ($from_date != '1970-01-01')?$from_date:''; ?>','<?php echo ($to_date != '1970-01-01')?$to_date:''; ?>');"><?php echo  $rtiRequestRecord['normal_count']; ?></a>
											
																<?php  }else{
																	 echo "0";
																  }

																?></td>
																<td class="center"><?php  
																if($rtiRequestRecord['rti_count']){ ?>
																	 <a href="javascript:void(0);" id ="rti_con" style="text-decoration:underline;font-weight:bold,color:black;" onclick="getrtidetails('<?php echo $doc_type_id; ?>','0','<?php echo ($from_date != '1970-01-01')?$from_date:''; ?>','<?php echo ($to_date != '1970-01-01')?$to_date:''; ?>');"><?php echo  $rtiRequestRecord['rti_count']+$rtiRequestRecord['normal_count']; ?></a>
											
																<?php  }else{
																	 echo "0";
																  }

																?></td>
															</tr>
															<?php $sno++; endforeach; ?>
														</tbody>

													</table>
												</div>
											</div>
										</div>							
										</div>							
									</div>
									</fieldset>
								</div>				 
							
							 <?php }else{ echo "No Record Found"; } } ?>		
						</div>                				
					 </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id ="print1" style="display:none;" >
   <table align="center" border="1" style="width:100%" cellspacing="0" cellpadding="3" >
		<thead class="info">
			<tr>
				<th>S.No</th>
				<th>Record Type</th>
				<th>Count</th>
			</tr>
		</thead>
		<tbody>
			<?php $sno =1; foreach ($rtiRequestRecords as $rtiRequestRecord): ?>
			<tr>
				<td class="center"><?php echo($sno); ?></td>
				<td class="center"><?php echo $doc_name; ?></td>                                                       
				<td class="right"><?php  
				if($rtiRequestRecord['rti_count']){ 
					  echo  $rtiRequestRecord['rti_count']; 
				  }else{
					 echo "0";
				  } ?>
			   </td>
			</tr>
			<?php $sno++; endforeach; ?>
		</tbody>
	</table>
</div>
 <div id="modal-add-unsent" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade col-lg-12">
	<div class="modal-dialog" style="width:95%;">  
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button><br>
			</div>
			<div class="modal-body">
				<div class="form add-unsent-form">
					  
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$('.datepicker1').datepicker({
  endDate:new Date()
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

function getrtidetails(doc_id,req_id,from_date,to_date){
	$(".add-unsent-form").html("<span class='erro'>Fetching data!!!!!");
	$("#modal-add-unsent").modal('show');
    //alert(location_id);
		$.ajax({
			async    : true,  
			dataType : "html",  
			type     : "post",
			url:"<?php echo $this->Url->build('/', true)?>admin/reports/ajaxgetrtidetails/"+doc_id+"/"+req_id+"/"+from_date+"/"+to_date,
			success  : function (data, textStatus) {
				$(".add-unsent-form").html(data);				
			}
		}); 	

}

$(document).ready(function(){
    $(function(){
    	$("#export_excel_button").click(function () {
			var filename = "RTI_applications_report<?php echo date('YmdHis');?>";
			var uri = $("#report1").btechco_excelexport({
					containerid: "report1", 
					datatype: $datatype.Table,
					returnUri: true
			   
			});
			$(this).attr('download', filename+".xls") // set file name (you want to put formatted date here)
               .attr('href', uri)                     // data to download
               .attr('target', '_blank')              // open in new window (optional)
    	    });
    });
});

function loadreport(){
 $('.report').html('');

}
</script>
