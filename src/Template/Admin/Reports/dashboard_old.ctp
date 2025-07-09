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
								<h4>OSR Records</h4>
								<h4 style="color:green;"><?php echo ($osrallcount[0]['totalrecordcount'])?($osrallcount[0]['totalrecordcount']):0; ?></h4>

								<h6 style="color:green;">Districts&nbsp;&nbsp;<?php echo ($osrallcount[0]['districtcount'])?($osrallcount[0]['districtcount']):0; ?>&nbsp;&nbsp;&nbsp;&nbsp;Taluks&nbsp;&nbsp;<?php echo ($osrallcount[0]['talukcount'])?($osrallcount[0]['talukcount']):0; ?>&nbsp;&nbsp;&nbsp;&nbsp;Villages&nbsp;&nbsp;<?php echo ($osrallcount[0]['villagecount'])?($osrallcount[0]['villagecount']):0; ?></h6>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<h4>FMB Records</h4>
								<h4 style="color:green;"><?php echo ($fmballcount[0]['totalrecordcount'])?($fmballcount[0]['totalrecordcount']):0; ?></h4>

								<h6 style="color:green;">Districts&nbsp;&nbsp;<?php echo ($fmballcount[0]['districtcount'])?($fmballcount[0]['districtcount']):0; ?>&nbsp;&nbsp;&nbsp;&nbsp;Taluks&nbsp;&nbsp;<?php echo ($fmballcount[0]['talukcount'])?($fmballcount[0]['talukcount']):0; ?>&nbsp;&nbsp;&nbsp;&nbsp;Villages&nbsp;&nbsp;<?php echo ($fmballcount[0]['villagecount'])?($fmballcount[0]['villagecount']):0; ?></h6>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<h4>IFR Records</h4>
								<h4 style="color:green;"><?php echo ($ifrallcount[0]['totalrecordcount'])?($ifrallcount[0]['totalrecordcount']):0; ?></h4>

								<h6 style="color:green;">Districts&nbsp;&nbsp;<?php echo ($ifrallcount[0]['districtcount'])?($ifrallcount[0]['districtcount']):0; ?>&nbsp;&nbsp;&nbsp;&nbsp;Taluks&nbsp;&nbsp;<?php echo ($ifrallcount[0]['talukcount'])?($ifrallcount[0]['talukcount']):0; ?>&nbsp;&nbsp;&nbsp;&nbsp;Villages&nbsp;&nbsp;<?php echo ($ifrallcount[0]['villagecount'])?($ifrallcount[0]['villagecount']):0; ?></h6>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<h4>GO Records</h4>
								<h4 style="color:green;"><?php echo ($ifrallcount[0]['totalrecordcount'])?($ifrallcount[0]['totalrecordcount']):0; ?></h4>
								<h6 style="color:green;">&nbsp;</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<br>
	<div class="row">
		<div class="col-sm-12">
			<div class="card-box">
				<div class="row">
					<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<h4 class="text-center">Government Orders</h4>
								<?php foreach($godeptcount as $key => $value){?>
								<h6 class="text-left" style="color:green;"><?php echo ($value['name']); ?>&nbsp;&nbsp;<?php echo ($value['valcount']); ?></h6>
								<?php $sno++; } ?>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<h4 class="text-center">GO Types</h4>
								<?php foreach($godoctypcount as $key => $value){?>
								<h6 class="text-left" style="color:green;"><?php echo ($value['name']); ?>&nbsp;&nbsp;<?php echo ($value['valcount']); ?></h6>
								<?php $sno++; } ?>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<h4 class="text-center">Board Proceedings</h4>
								<?php foreach($bpcount as $key => $value){?>
								<h6 class="text-left" style="color:green;"><?php echo ($value['name']); ?>&nbsp;&nbsp;<?php echo ($value['valcount']); ?></h6>
								<?php $sno++; } ?>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<h4 class="text-center">Gazettes</h4>
								<?php foreach($gazettescount as $key => $value){?>
								<h6 class="text-left" style="color:green;"><?php echo ($value['name']); ?>&nbsp;&nbsp;<?php echo ($value['valcount']); ?></h6>
								<?php $sno++; } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-12">
			<div class="card-box">
				<div class="row">
					<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<h4 class="text-center">Pre 1875 records(1670 to 1875 A.D)</h4>
								<?php foreach($beicdeptcount as $key => $value){?>
								<h6 class="text-left" style="color:green;"><?php echo ($value['department']); ?>&nbsp;&nbsp;<?php echo ($value['valcount']); ?></h6>
								<?php $sno++; } ?>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<h4 class="text-center">BEIC Types</h4>
								<?php foreach($beicdoctypcount as $key => $value){?>
								<h6 class="text-left" style="color:green;"><?php echo ($value['name']); ?>&nbsp;&nbsp;<?php echo ($value['valcount']); ?></h6>
								<?php $sno++; } ?>
							</div>
						</div>
					</div>					
					<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<h4 class="text-center">Voter Data</h4>
								<?php foreach($votertypcount as $key => $value){?>
								<h6 class="text-left" style="color:green;"><?php echo ($value['name']); ?>&nbsp;&nbsp;<?php echo ($value['valcount']); ?></h6>
								<?php $sno++; } ?>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<h4 class="text-center">Constituency</h4>
								<?php foreach($constituencycount as $key => $value){?>
								<h6 class="text-left" style="color:green;"><?php echo ($value['constituency_name']); ?>&nbsp;&nbsp;<?php echo ($value['valcount']); ?></h6>
								<?php $sno++; } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-12">
			<div class="card-box">
				<div class="row">
					<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<h4 class="text-center">Books</h4>
								<?php foreach($bookcount as $key => $value){?>
								<h6 class="text-left" style="color:green;"><?php echo ($value['name']); ?>&nbsp;&nbsp;<?php echo ($value['valcount']); ?></h6>
								<?php $sno++; } ?>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<h4 class="text-center">Authors</h4>
								<?php foreach($authorcount as $key => $value){?>
								<h6 class="text-left" style="color:green;"><?php echo ($value['author']); ?>&nbsp;&nbsp;<?php echo ($value['valcount']); ?></h6>
								<?php $sno++; } ?>
							</div>
						</div>
					</div>					
					<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<h4 class="text-center">Publishers</h4>
								<?php foreach($publishercount as $key => $value){?>
								<h6 class="text-left" style="color:green;"><?php echo ($value['publisher_name']); ?>&nbsp;&nbsp;<?php echo ($value['valcount']); ?></h6>
								<?php $sno++; } ?>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="col-sm-4">
				<h3><?php echo('OSR Villages Count') ?></h3>
				<table class ="table" cellpadding="0" cellspacing="0" border = 1>
					<thead>
						<tr>
							<th width='40%' style="text-align:center;background-color:#337ab7;color:white;">District</th>
							<th width='40%' style="text-align:center;background-color:#337ab7;color:white;">Taluk</th>
							<th width='20%' style="text-align:center;background-color:#337ab7;color:white;">Village Count</th>
						</tr>
						<?php foreach($osrtalukwiseVillagecount as $key => $value){?>
							<tr>
						<td style="text-align:left"><?php echo $value['district_name'];?></td>
							<td style="text-align:left"><?php echo $value['taluk_name'];?></td>
							<td style="text-align:right"><?php echo $value['valcount'];?></td>
						
						</tr><?php } ?>
					</thead>
				</table>
			</div>
			<div class="col-sm-4">
				<h3><?php echo('FMB Villages Count') ?></h3>
				<table class ="table" cellpadding="0" cellspacing="0" border = 1>
					<thead>
						<tr>
							<th width='40%' style="text-align:center;background-color:#337ab7;color:white;">District</th>
							<th width='40%' style="text-align:center;background-color:#337ab7;color:white;">Taluk</th>
							<th width='20%' style="text-align:center;background-color:#337ab7;color:white;">Village Count</th>
						</tr>
						<?php if(count($fmbtalukwiseVillagecount) >0){
							foreach($fmbtalukwiseVillagecount as $key => $value){?>
							<tr>
						<td style="text-align:left"><?php echo $value['district_name'];?></td>
							<td style="text-align:left"><?php echo $value['taluk_name'];?></td>
							<td style="text-align:right"><?php echo $value['valcount'];?></td>
						
						</tr><?php } }else{ ?>
						<tr><td style="text-align:center" colspan="3">NO Data Available</td>
						</tr>
						<?php }?>
					</thead>
				</table>
			</div>
			<div class="col-sm-4">
				<h3><?php echo('IFR Villages Count') ?></h3>
				<table class ="table" cellpadding="0" cellspacing="0" border = 1>
					<thead>
						<tr>
							<th width='40%' style="text-align:center;background-color:#337ab7;color:white;">District</th>
							<th width='40%' style="text-align:center;background-color:#337ab7;color:white;">Taluk</th>
							<th width='20%' style="text-align:center;background-color:#337ab7;color:white;">Village Count</th>
						</tr>
						<?php if(count($ifrtalukwiseVillagecount) >0){
							foreach($ifrtalukwiseVillagecount as $key => $value){?>
							<tr>
						<td style="text-align:left"><?php echo $value['district_name'];?></td>
							<td style="text-align:left"><?php echo $value['taluk_name'];?></td>
							<td style="text-align:right"><?php echo $value['valcount'];?></td>
						
						</tr><?php } }else{ ?>
						<tr><td style="text-align:center" colspan="3">NO Data Available</td>
						</tr>
						<?php }?>
					</thead>
				</table>
			</div>
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