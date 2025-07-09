<div id ="rti_report">
	<div class="table-responsive">
        <div class="portlet-body">
		 <div style="text-align: right; margin-right: 100px; color:blue"><a href="javascript:printArea('print')" onclick="printPreview()"><img title="Printer" src="<?php echo $this->Url->build('/', true)?>webroot/img/print.png" height="22px"></a>&nbsp;&nbsp;<a href="#" id="export_excel_button_1" title="rti_details" style="float:right;"><img title="Excelsheet" src="<?php echo $this->Url->build('/', true)?>webroot/img/excel.png" height="22px"></a></div><br><br>
			<div id ="report2">
          <?php if($rtiRequestRecords != ""){ ?>
			<center><h4><b> List of <?php echo $rtiRequestRecords[0]['doc_type_name']; ?>  Applications <?php  if($from_date != ''){ echo " From ".date('d-m-Y',strtotime($from_date)); } if($to_date != ''){ echo " upto ".date('d-m-Y',strtotime($to_date)); } ?> </b></h4></center><br>
					
		  <table id="" class="table table-bordered" style="width:100%">  
			<thead  style="background-color:#607b8a;color:#ffff;">
				<tr>
					<th style="width:2%;text-align:center;">S.No</th>							
					<th style="width:10%;text-align:center;">Application Type</th>					
					<th style="width:10%;text-align:center;">Application Request Type</th>					
					<th style="width:10%;text-align:center;">Name</th>
					<th style="width:10%;text-align:center;">Mobile No</th>
					<th style="width:10%;text-align:center;">Email</th>					
					<th style="width:10%;text-align:center;">Application Reference no</th>						 
					<th style="width:10%;text-align:center;">Application Date</th>						 
					<th style="width:10%;text-align:center;">Deadline Date</th>						 
					<th style="width:10%;text-align:center;">Application Status</th>  						 
				</tr>				
			</thead>
			<tbody>
				<?php 	$i=1;							
					 foreach ($rtiRequestRecords as $rtiRequestRecord){  ?> 
				<tr>
					<td><?php echo  $i; ?></td>							
					<td><?php echo  $rtiRequestRecord['request_type'] ?></td>					
					<td><?php echo  $rtiRequestRecord['application_request_type'] ?></td>					
					<td><?php echo  $rtiRequestRecord['name'] ?></td>
					<td><?php echo  $rtiRequestRecord['mobile_no'] ?></td>
					<td><?php echo  $rtiRequestRecord['email'] ?></td>
					<td><?php echo  $rtiRequestRecord['application_reference_no'] ?></td>
					<td style="text-align:center;"><?php echo  date('d-m-Y',strtotime($rtiRequestRecord['application_date'])); ?></td>
					<td style="text-align:center;"><?php echo  ($rtiRequestRecord['deadline_date'])?"<b style='color:red;'>".date('d-m-Y',strtotime($rtiRequestRecord['deadline_date']))."</b>":''; ?></td>
					<td style="text-align:center;"><?php echo  $rtiRequestRecord['application_status']; ?></td>
				</tr>
				 <?php                                                
				 $i++; }
				    ?> 
			</tbody>								
		</table>
         <?php } ?>		
	   </div>
	</div>
  </div>
</div>
<div id ="print" style="display:none;" >
  <center><h2><b> List of <?php echo $rtiRequestRecords[0]['doc_type_name']; ?>  Applications <?php  if($from_date != ''){ echo " From ".date('d-m-Y',strtotime($from_date)); } if($to_date != ''){ echo " upto ".date('d-m-Y',strtotime($to_date)); } ?> </b></h2></center><br><br>
	 <table id="" border="1" style="width:100%" cellspacing="0" cellpadding="3" >
		<thead>
			<tr>
				<th style="width:2%;text-align:center;">S.No</th>							
				<th style="width:10%;text-align:center;">Application Type</th>
				<th style="width:10%;text-align:center;">Application Request Type</th>
				<th style="width:10%;text-align:center;">Name</th>
				<th style="width:10%;text-align:center;">Mobile No</th>
				<th style="width:10%;text-align:center;">Email</th>					
				<th style="width:10%;text-align:center;">Application Reference no</th>						 
				<th style="width:10%;text-align:center;">Application Date</th>						 
				<th style="width:10%;text-align:center;">Deadline Date</th>						 
				<th style="width:10%;text-align:center;">Application Status</th>						 
			</tr>				
		</thead>
		<tbody>
			<?php 	$i=1;							
				 foreach ($rtiRequestRecords as $rtiRequestRecord){  ?> 
			<tr>
				<td><?php echo  $i; ?></td>							
				<td><?php echo  $rtiRequestRecord['request_type'] ?></td>
				<td><?php echo  $rtiRequestRecord['application_request_type'] ?></td>			
				<td><?php echo  $rtiRequestRecord['name'] ?></td>
				<td><?php echo  $rtiRequestRecord['mobile_no'] ?></td>
				<td><?php echo  $rtiRequestRecord['email'] ?></td>
				<td><?php echo  $rtiRequestRecord['application_reference_no'] ?></td>
				<td style="text-align:center;"><?php echo  date('d/m/Y',strtotime($rtiRequestRecord['application_date'])); ?></td>
				<td style="text-align:center;"><?php echo  ($rtiRequestRecord['deadline_date'])?"<b style='color:red;'>".date('d/m/Y',strtotime($rtiRequestRecord['deadline_date']))."</b>":''; ?></td>
				<td style="text-align:center;"><?php echo  $rtiRequestRecord['application_status']; ?></td>
			</tr>
			 <?php                                                
			 $i++; }
				?> 
		</tbody>								
	</table>
</div>
<script>
$(document).ready(function(){
 $(function(){
    	$("#export_excel_button_1").click(function () {
			var filename = "RTI_applications_list_report<?php echo date('YmdHis');?>";
			var uri = $("#report2").btechco_excelexport({
					containerid: "report2", 
					datatype: $datatype.Table,
					returnUri: true
			   
			});
			$(this).attr('download', filename+".xls") // set file name (you want to put formatted date here)
               .attr('href', uri)                     // data to download
               .attr('target', '_blank')              // open in new window (optional)
    	    });
    });
  });  
  
  
  /*function printPreview(){
  
    $('#print').show();
  
  }*/
</script>