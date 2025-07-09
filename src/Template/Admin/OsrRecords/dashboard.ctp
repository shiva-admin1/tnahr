<style type="text/css">
	.card{
		border:1px solid #DDD;
		border-radius: 10px;
		box-shadow: 0 0 5px #CCC;
	}
	.card-body{padding: 8px;}
</style>
<div class="col-lg-12">
<div class="portlet box portlet-red">
<div class="portlet-body">
         
	<div class="row">
		<div class="col-sm-12">
			<div class="card-box">
				<div class="row">
					<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<h4>Total Records</h4>
								<h4 style="color:green;"><?php echo ($totalcount[0]['valcount'])?($totalcount[0]['valcount']):0; ?></h4>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<h4>Districts</h4>
								<h4 style="color:green;"><?php echo ($districtcount[0]['valcount'])?($districtcount[0]['valcount']):0; ?></h4>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<h4>Taluks</h4>
								<h4 style="color:green;"><?php echo ($talukcount[0]['valcount'])?($talukcount[0]['valcount']):0; ?></h4>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<h4>Villages</h4>
								<h4 style="color:green;"><?php echo ($villagecount[0]['valcount'])?($villagecount[0]['valcount']):0; ?></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  	<!--div class="row">
		<div class="col-sm-12">
			<div class="card-box">
				<div class="row">
					<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<h2>Total Records</h2>
								<h4 style="color:green;"><?php echo ($totalcount)?($totalcount):0; ?></h4>
							</div>
						</div>
					</div>
				<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<h4>Received Applications</h4>
								<h5 style="color:green;">Legal - <?php echo ($applicantlegalCount[0]['legalcount'])?($applicantlegalCount[0]['legalcount']):0; ?>&nbsp;&nbsp;&nbsp;Finance - <?php echo ($newapplicantfinanceCount[0]['financecount'])?($newapplicantfinanceCount[0]['financecount']):0; ?>&nbsp;&nbsp;&nbsp;Projects - <?php echo ($applicantprojectCount[0]['projectcount'])?($applicantprojectCount[0]['projectcount']):0; ?></h5>
								
								
							</div>
						</div>
					</div>
				
					<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<h4>Approved Applications</h4>
								<h5 style="color:green;">Legal - <?php echo ($applicantlegalCount[0]['legal_approvedcount'])?($applicantlegalCount[0]['legal_approvedcount']):0; ?>
								&nbsp;&nbsp;&nbsp;Finance - <?php echo ($newapplicantfinanceCount[0]['finance_approvedcount'])?($newapplicantfinanceCount[0]['finance_approvedcount']):0; ?>&nbsp;&nbsp;&nbsp;Projects - <?php echo ($applicantprojectCount[0]['project_approvedcount'])?($applicantprojectCount[0]['project_approvedcount']):0; ?></h5>
								
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<h4>Rejected Applications</h3>
								<h5 style="color:red;">Rejected</h6>
								<h5 style="color:green;">Legal - <?php echo ($applicantlegalCount[0]['legal_rejectedcount'])?($applicantlegalCount[0]['legal_rejectedcount']):0; ?>
								&nbsp;&nbsp;&nbsp;Finance - <?php echo ($newapplicantfinanceCount[0]['finance_rejectedcount'])?($newapplicantfinanceCount[0]['finance_rejectedcount']):0; ?>&nbsp;&nbsp;&nbsp;Projects - <?php echo ($applicantprojectCount[0]['project_rejectedcount'])?($applicantprojectCount[0]['project_rejectedcount']):0; ?></h5>
								
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div-->  
	<div class="row">
		<div class="col-sm-12">
			<div class="col-sm-10">
				<h3><?php echo('DEO Progress') ?></h3>
				<table class ="table" cellpadding="0" cellspacing="0" border = 1>
					<thead>
						<tr>
							<?php foreach($deouserentry as $key => $value){?>
							<th style="text-align:center;background-color:#337ab7;color:white;"><?php echo $value['name'];?> </th>
							<?php } ?>
						</tr>
						<tr>
							<?php foreach($deouserentry as $key => $value){?>
							<td style="text-align:right"><?php echo $value['updatedcount'];?>/<?php echo $value['valcount'];?></td>
							<?php } ?>
						</tr>
					</thead>
				</table>
			</div>
			
		</div>
	</div>
		<div class="row">
		<div class="col-sm-12">
			<div class="col-sm-6">
				<h3><?php echo('Villages Count') ?></h3>
				<table class ="table" cellpadding="0" cellspacing="0" border = 1>
					<thead>
						<tr>
							<th style="text-align:center;background-color:#337ab7;color:white;">District</th>
							<th style="text-align:center;background-color:#337ab7;color:white;">Taluk</th>
							<th style="text-align:center;background-color:#337ab7;color:white;">Village Count</th>
						</tr>
						<?php foreach($talukVillagecount as $key => $value){?>
							<tr>
						<td style="text-align:right"><?php echo $value['district_name'];?></td>
							<td style="text-align:right"><?php echo $value['taluk_name'];?></td>
							<td style="text-align:right"><?php echo $value['valcount'];?></td>
						
						</tr><?php } ?>
					</thead>
				</table>
			</div>
			<?php if(count($villagewisecount) >0){?>
						
			<div class="col-sm-6">
				<h3><?php echo('Village Wise Record Count') ?></h3>
				<table class ="table" cellpadding="0" cellspacing="0" border = 1>
					<thead>
						<tr>
							<th style="text-align:center;background-color:#337ab7;color:white;">District</th>
							<th style="text-align:center;background-color:#337ab7;color:white;">Taluk</th>
							<th style="text-align:center;background-color:#337ab7;color:white;">Village</th>
							<th style="text-align:center;background-color:#337ab7;color:white;">Record Count</th>
							<th style="text-align:center;background-color:#337ab7;color:white;">Updated Record Count</th>
						</tr>
						<?php foreach($villagewisecount as $key => $value){?>
						<tr>
							<td style="text-align:right"><?php echo $value['district_name'];?></td>
							<td style="text-align:right"><?php echo $value['taluk_name'];?></td>
							<td style="text-align:right"><?php echo $value['village_name'];?></td>
							<td style="text-align:right"><?php echo $value['valcount'];?></td>
							<td style="text-align:right"><?php echo $value['valcount'];?></td>
						</tr>
						<?php } ?>
						
					</thead>
				</table>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
</div>
</div>


 <div id="modal-add-unsent" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade col-lg-12">
	<div class="modal-dialog" style="width:100%;">
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
<script>
    
    function getapplicant(type,status){
      $(".add-unsent-form").html("<span class='erro'>Fetching data!!!!!</span>");
	$("#modal-add-unsent").modal('show');
       $.ajax({
			async : true,
			dataType: "html",
			type : "get",
			url  : "<?php echo $this->Url->build('/', true)?>admin/employee_reports/ajaxgetapplicant/"+type+"/"+status,
			success : function (data, textStatus) {
				
				$(".add-unsent-form").html(data);
			}
		}); 
		
		
        
        
    }
    
</script>