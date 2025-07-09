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
                                <div class="caption"><?php echo "User Count Report"?></div>								
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
                                        <div class="col-md-12"><label for="inputContent">District<span class="require">&nbsp;</span></label>
                                            <div class="input text">
                                                <?php echo $this->Form->control('district_id',['class'=>'form-control','label'=>false,'error'=>false,'empty'=>'-ALL-','options'=>$districts_list,'onchange'=>'loadreport();']);?>
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
						   <?php if($user_details != ''){  ?>
							   <?php if(count($user_details) != 0){  ?>
								<div class="panel-body pan">
									<div class="form-body pal">	
									  <fieldset  style="margin-left:1%;border:1px solid #00355F;border-radius:10px; margin-top:1%;">
									 <legend style="font-size:16px;margin-left:10px;color:#00355F;"><b></b></legend>
										
									  <div class="portlet-body"><!--<a href="#" id="export_excel_button" title="rti_details" style="float:right;margin-right:150px;"><img title="Excelsheet" src="<?php echo $this->Url->build('/', true)?>webroot/img/excel.png" height="22px"></a><br><br>-->
										 <div style="text-align: right; margin-right: 100px; color:blue"><a href="javascript:printArea('print1')" onclick="printPreview()"><img title="Printer" src="<?php echo $this->Url->build('/', true)?>webroot/img/print.png" height="22px"></a>&nbsp;&nbsp;<a href="#" id="export_excel_button" title="rti_details" style="float:right;"><img title="Excelsheet" src="<?php echo $this->Url->build('/', true)?>webroot/img/excel.png" height="22px"></a></div><br><br>
		
										<div id="report1">
										   <div class="row ">
											<div class="col-lg-12">
												<center><h4>Districtwise User Count</h4></center>
												<div class="table-responsive" style="overflow:auto">
													<table align ="center" style="width:30%;" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
														<thead class="info">
															<tr>
																<th class="left">S.No</th>
																<th class="center">District</th>
																<th class="center" >Count</th>
															</tr>															
														</thead>
														<tbody>
															<?php $sno =1; foreach ($user_details as $user_detail): ?>
															<tr>
																<td class="left"><?php echo($sno); ?></td>
																<td class="left"><?php echo $user_detail['district']; ?></td>                                                       
																<td class="right"><?php  
																if($user_detail['count'] != 0){ ?>
																	 <a href="javascript:void(0);" id ="rti_con" style="text-decoration:underline;font-weight:bold,color:black;" onclick="getdetails('<?php echo $user_detail['district_id']; ?>');"><?php echo  $user_detail['count']; ?></a>
																<?php  }else{
																	 echo "0";
																  }
																?></td>								
															
															</tr>
															<?php 
															 $total += $user_detail['count'];
															$sno++; endforeach; ?>
														</tbody>
														<tfoot>
															<tr>
															   <th class="right" colspan="2">Total</th>
															   <th class="right"><?php echo $total;  ?></th>
															</tr>
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
			<th class="left">S.No</th>
			<th class="center">District</th>
			<th class="center" >Count</th>
		</tr>															
	</thead>
	<tbody>
		<?php $sno =1; foreach ($user_details as $user_detail): ?>
		<tr>
			<td class="left"><?php echo($sno); ?></td>
			<td class="left"><?php echo $user_detail['district']; ?></td>                                                       
			<td class="right"><?php  
			if($user_detail['count'] != 0){ ?>
				 <a href="javascript:void(0);" id ="rti_con" style="text-decoration:underline;font-weight:bold,color:black;" onclick="getdetails('<?php echo $user_detail['district_id']; ?>');"><?php echo  $user_detail['count']; ?></a>
			<?php  }else{
				 echo "0";
			  }
			?></td>								
		
		</tr>
		<?php 
		 $total += $user_detail['count'];
		$sno++; endforeach; ?>
	</tbody>
	<tfoot>
		<tr>
		   <th class="right" colspan="2">Total</th>
		   <th class="right"><?php echo $total;  ?></th>
		</tr>
	</tfoot>
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
            'district_id': {
                required: false
            }
        },

        messages: {
            'district_id': {
                required: "Select District"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});

function getdetails(dist_id){
	$(".add-unsent-form").html("<span class='erro'>Fetching data!!!!!");
	$("#modal-add-unsent").modal('show');
    //alert(location_id);
		$.ajax({
			async    : true,  
			dataType : "html",  
			type     : "post",
			url:"<?php echo $this->Url->build('/', true)?>admin/reports/ajaxgetuserdetails/"+dist_id,
			success  : function (data, textStatus) {
				$(".add-unsent-form").html(data);				
			}
		}); 	

}

$(document).ready(function(){
    $(function(){
    	$("#export_excel_button").click(function () {
			var filename = "user_count_report<?php echo date('YmdHis');?>";
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
