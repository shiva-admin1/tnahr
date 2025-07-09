<style>
.bold{
	font-weight: bold;
}
</style>
<!-- Start Drag and Drop File Upload-->
		
		<?php echo $this->Html->css('admin/dragupload');?>
		<?php echo $this->Html->script('admin/filereader');?>
		<?php echo $this->Html->script('admin/script');?>
				
	<!-- End Drag and Drop File Upload-->
<div class="row" oncontextmenu="return false;">
  	<?php echo $this->Form->create($osrRecords,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
	<div class="col-lg-12">
    	<div id="tab-form-actions" class="tab-pane fade active in">
      		<div class="row">
        		<div class="col-lg-12">
          			<div class="panel portlet box portlet-red">
                        <div class="portlet-header">
							<div class="caption">Add OSR Records</div>
						</div>
            			<div class="panel-body pan">
							<div class="form-body pal">
								
								<fieldset  style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;"><legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Record Details </b></legend>

									<div class="col-md-12">
									<div class="col-md-4">
										<div class="form-group">
											<label for="inputContent" class="col-md-3 control-label bold">District <span class="require">*</span></label>
											<div class="col-md-8">
												<div class="input text">
													<?php echo $this->Form->control('district_name',['class'=>'form-control name','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'2','placeholder'=>'District Name','value'=>'']);?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="inputContent" class="col-md-3 control-label bold">Taluk <span class="require">*</span></label>
											<div class="col-md-8">
												<div class="input text">
													<?php echo $this->Form->control('taluk_name',['class'=>'form-control name','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'2','placeholder'=>'Taluk Name','value'=>'']);?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="inputContent" class="col-md-3 control-label bold">Village  <span class="require">*</span></label>
											<div class="col-md-8">
												<div class="input text">
													<?php echo $this->Form->control('village_name',['class'=>'form-control name','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'2','placeholder'=>'Village Name','value'=>'']);?>
												</div>
											</div>
										</div>
									</div>
									
									</div>
									
									
									<div class="col-md-12">
									
									<div class="col-md-4">
										<div class="form-group">
											<label for="inputContent" class="col-md-3 control-label bold">Village No <span class="require">*</span></label>
											<div class="col-md-8">
												<div class="input text">
													<?php echo $this->Form->control('village_no',['class'=>'form-control num','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'1','placeholder'=>'Village Number']);?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-8">
										<div class="form-group">
											<label for="inputContent" class="col-md-3 control-label bold">Keywords / Tags<span class="require">*</span></label>
											<div class="col-md-8">
												<div class="input text">
													<?php echo $this->Form->control('keyword_tag',['class'=>'form-control ','label'=>false,'error'=>false,'rows'=>'2','minlength'=>'1','placeholder'=>'Enter Tags seperated by comma eg: osr,tiruppur','value'=>'']);?>
													
												</div>
											</div>
										</div>
									</div>
									</div>
									<div class="col-md-12" style="display:none;">
									<div class="col-md-4">
										<div class="form-group">
											<div class="col-md-offset-1 col-md-10">
											<button name="save_only" type="submit" val="1" class="btn btn-green">Save</button>
											<button type="button" class="btn btn-red" onclick="javascript:history.back()">Cancel</button>
											<button type="button" class="btn btn-yellow" id="res" onclick="javascript:location.reload();">Reset</button>
											</div>
										</div>
									</div>
									</div>
									</div>
								</fieldset>
							
								<fieldset  style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;"><legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Record Image </b></legend>
									<div class="col-md-12">
									<p style="color:red;font-weight:bold;text-align:center;" class="blink_me"><blink>Note: Please enter Record Details before start draging Images. Only .jpeg/.png supports. </blink></p>
										<div id="dropbox">
											<div class="text">
												Drop Images Here
											</div>
										</div>
									</div>
								</fieldset>

							</div>
						</div><br><br>
					</div>
				</div>
			</div>	
		</div>
  	</div>
  	
  	<?php echo $this->Form->End();?> 
</div>
<style>.disp{display:none;}</style>
<script>
$('body').addClass('sidebar-collapsed');
</script>