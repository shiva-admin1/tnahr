<div id ="rti_report">
	<div class="table-responsive">
        <div class="portlet-body">
			<div id ="report2">
          <?php if($rtiRequestRecords != ""){ ?>
			<center><h4><b> List of  Applications has Deadline  <?php if($type == 1){ echo "Today";    }else if($type == 2){ echo "Tomorrow";  }else if($type == 3){ echo "Next 30 Days";  }   ?></b></h4></center><br>
					
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
