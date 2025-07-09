<style type="text/css">
.error {
color: red;
}

.table{
  pointer-events: none;
}
    
</style>
<div class="row">
<?php $error = $this->Session->flash(); ?>
<?php if($error != ''){?>
<div class="col-lg-10">
<div class="note note-success"> <?php echo $error;?> </div>
</div>
<?php }?>
<div class="col-lg-10">
<div class="row">
<div class="panel panel-red">
<div class="portlet box portlet-red">
<div class="portlet-header">
<div class="caption"><?php echo "User Entry Reports"?></div>
</div>
</div>
<?php echo $this->Form->create('',['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
<div class="panel-body pan">
<div class="form-body pal">
<div class="col-md-12">
<div class="col-md-4">
<div class="form-group">
<div class="col-md-12"><label for="inputContent">Record Type<span class="require">&nbsp;*</span></label>
<div class="input text">
<?php echo $this->Form->control('report_type',['class'=>'form-control','label'=>false,'error'=>false,'empty'=>'Select Record Type','options'=>$reportTypes]);?>
</div>
</div>
</div>
</div>
<div class="col-md-6" style="margin-top:10px;">
<div class="form-actions text-right none-bg">
<div class="col-md-offset-3 col-md-2">
<button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i>&nbsp; Search</button>
</div>
</div>
</div>
</div>
</div>
</div>
<?php echo $this->Form->End();?>
<div class="panel-body pan">
	<div class="row"><br>
	<div class="col-md-2">
	</div>
	<div class="col-md-8">
		<div class="table-responsive" style="overflow:auto">
		 	<?php if($records != ''){
		 	  if(count($records) >0){
		 	?>   
	    <a href="#" id="export_excel_button" title="record count_details" style="float:right;margin-right:100px;"><img title="Excelsheet" src="<?php echo $this->Url->build('/', true)?>webroot/img/excel.png" height="22px"></a><br><br>
		  <div id = "report1">                            
			<table class="table table-hover table-striped table-bordered table-advanced  display">
			<caption style="text-align:center;"><h1><?php echo $reportHead;?></h1><br></caption>
				<thead class="info">
					<tr>
						<th scope="col"><?php echo$this->Paginator->sort('sno') ?></th>
						<th scope="col"><?php echo$this->Paginator->sort('document_type') ?></th>
						<th scope="col"><?php echo$this->Paginator->sort('Count') ?></th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($records) >0){?>
						<?php $sno =1; foreach ($records as $record): ?>
						<tr>
							<td><?php echo($sno); ?></td>
							<td style="text-align:left;"><?php echo $record['name'];?> </td>
							<td style="text-align:right"><?php echo $record['updatedcount'];?>/<?php echo $record['valcount'];?></td>    
						</tr>
						<?php $sno++; endforeach; }else{ ?>
						<tr>
							<td colspan=3 style="text-align:center;"><?php echo("No Data available."); ?></td>					
						</tr>
						<?php } ?>
				</tbody>
			</table>
		  </div>
		    
		  <?php }else{ echo "No Record Found"; } } ?>
		</div>
	</div>
	</div>
</div>
</div>
</div>
</div>
</div>
<script>
$(function() {
    $("#FormID").validate({
        rules: {
            'report_type': {
                required: true
            }
        },

        messages: {
            'report_type': {
                required: "Select Record Type!"
            }
        },
        submitHandler: function(form) {

            form.submit();
            $(".btn").prop('disabled', true);
        }
    });
});
$(document).ready(function(){
var date = <?php echo date('Y_m_d_H_i_s'); ?>;
    $(function(){
    	$("#export_excel_button").click(function () {
			var filename = "<?php echo $reportHead.'_report';?>_"+date;
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