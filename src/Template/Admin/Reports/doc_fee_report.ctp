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
                                <div class="caption"><?php echo "Processing & Document Fee Report"?></div>								
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
                                        <div class="col-md-12">
                                            <div class="input text">
                                                <?php echo $this->Form->control('report_type',['class'=>'form-control','label'=>'Report Type','error'=>false,'options'=>[1=>'Date Wise',2 =>'Month Wise'],'empty'=>'Select Report Type','onchange'=>'loadtype(this.value)']);?>
                                            </div>
                                        </div>
                                    </div>
								</div>
							</div>
							<div class="col-md-12 date" <?php if($report_type != 1){  ?> style="display:none;"<?php  } ?>>                     
                                <div class="col-md-3">
								    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="input text">
                                                <?php echo $this->Form->control('from_date',['class'=>'form-control datepicker1 calendar','label'=>'From Date','error'=>false,'readonly']);?>
                                            </div>
                                        </div>
                                    </div>
								</div>
								<div class="col-md-3 " >
									<div class="form-group">
                                        <div class="col-md-12">
                                            <div class="input text">
                                                <?php echo $this->Form->control('to_date',['class'=>'form-control datepicker1 calendar','label'=>'To Date','error'=>false,'readonly']);?>
                                            </div>
                                        </div>
                                    </div>
								</div>															
							</div>															
                             <div class="col-md-12 month" <?php if($report_type != 2){  ?> style="display:none;"<?php  } ?>>                     
							 <div class="col-md-3" >
								    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="input text">
                                                <?php echo $this->Form->control('from_month',['class'=>'form-control monthpicker calendar','label'=>'From Month','error'=>false,'readonly']);?>
                                            </div>
                                        </div>
                                    </div>
								</div>
								<div class="col-md-3"> 
									<div class="form-group">
                                        <div class="col-md-12">
                                            <div class="input text">
                                                <?php echo $this->Form->control('to_month',['class'=>'form-control monthpicker calendar','label'=>'To Month','error'=>false,'readonly']);?>
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
						   <?php if($fee_details != ''){  ?>
							   <?php if(count($fee_details) != 0){  ?>
								<div class="panel-body pan">
									<div class="form-body pal">	
									  <fieldset  style="margin-left:1%;border:1px solid #00355F;border-radius:10px; margin-top:1%;">
									 <legend style="font-size:16px;margin-left:10px;color:#00355F;"><b></b></legend>
										
									  <div class="portlet-body"><a href="#" id="export_excel_button" title="doc_fee_details" style="float:right;margin-right:150px;"><img title="Excelsheet" src="<?php echo $this->Url->build('/', true)?>webroot/img/excel.png" height="22px"></a><br><br>
									
										<div id="report1">
										   <div class="row ">
											<div class="col-lg-12">
												<center><h4><b><?php  if($report_type == 1){echo "Date Wise&nbsp;&nbsp;"; }else if($report_type == 2){ echo "Month Wise&nbsp;&nbsp;"; } ?><?php echo "Processing and Document Fees Report"; if($from_date != '1970-01-01' && $report_type == 1){ echo " From ".date('d-m-Y',strtotime($from_date)); } if($to_date != '1970-01-01' && $report_type == 1){ echo " upto ".date('d-m-Y',strtotime($to_date)); } if($from_date != '1970-01' && $report_type == 2){ echo " From ".date('M-Y',strtotime($from_date)); } if($to_date != '1970-01' && $report_type == 2){ echo " upto ".date('M-Y',strtotime($to_date)); } ?></b></h4></center><br>
												<div class="table-responsive" style="overflow:auto">
													<table align ="center" style="width:50%;" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
														<thead class="info">
															<tr>
																<th>S.No</th>
																<?php if($report_type == 1){ ?>
																<th>Date</th>
																<?php }else if($report_type == 2){ ?>
																<th>Month</th>
																<?php } ?>
																<th>Processing Fees (Rs.)</th>
																<th>Document Fees (Rs.)</th>
															</tr>
														</thead>
														<tbody>
															<?php $sno =1; foreach ($fee_details as $fee_detail): ?>
															<tr>
																<td class="right"><?php echo($sno); ?></td>
																<td class="right"><?php if($report_type == 1){ echo $fee_detail['date']; }else if($report_type == 2){ echo $fee_detail['month'];  }  ?></td>                                                       
																<td class="right"><?php echo $fee_detail['processing_fee']; ?></td>                                                       
																<td class="right"><?php echo $fee_detail['doc_fee']; ?></td>                                                       
									
															<?php 
															$tot_pro_fee += $fee_detail['processing_fee'];
															$tot_doc_fee += $fee_detail['doc_fee'];
															
															$sno++; endforeach; ?>
														</tbody>
                                                         <tfoot>
															<th colspan="2"  class="right">Total</th>
															<th  class="right"><?php echo $tot_pro_fee;  ?></th>
															<th  class="right"><?php echo $tot_doc_fee  ?></th>
                                                         </tfoot>
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
 
<script type="text/javascript">
function loadtype(id){
 var id; 
 if(id == 1){
   $('#from-month').datepicker('setDate',null);
   $('#to-month').datepicker('setDate',null); 
   $('.date').show();
   $('.month').hide();
 }else if(id == 2){
   $('#from-date').datepicker('setDate',null);
   $('#to-date').datepicker('setDate',null);
   $('.month').show();   
   $('.date').hide();
 }

}
$('.datepicker1').datepicker({
  endDate:new Date(),
  todayHighlight:true
});


$('.monthpicker').datepicker({
	startView: 1,
	minViewMode: 1,
	format: "yyyy-mm",
	endDate:"m"
}); 

$(function() {
    $("#FormID").validate({
        rules: {
            'from_date': {
                required: true
            },
			'to_date': {
                required: true
            },
             'from_month': {
                required: true
            },
			'to_month': {
                required: true
            },
			'report_type': {
                required: true
            }
        },

        messages: {
            'from_date': {
                required: "Select Date"
            },
			'to_date': {
                required: "Select Date"
            },
            'from_month': {
                required: "Select Month"
            },
			'to_month': {
                required: "Select Month"
            },
			'report_type': {
                required: "Select Report Type"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});


$(document).ready(function(){
    $(function(){
    	$("#export_excel_button").click(function () {
			var filename = "Document_fee_and_processing_fee_report<?php echo date('YmdHis');?>";
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

</script>
