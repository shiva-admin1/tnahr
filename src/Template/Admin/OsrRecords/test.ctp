<style>
.bold{
	font-weight: bold;
}
</style>
<div class="row" oncontextmenu="return false;">
  	<?php echo $this->Form->create($employeeDetail,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
	<div class="col-lg-12">
    	<div id="tab-form-actions" class="tab-pane fade active in">
      		<div class="row">
        		<div class="col-lg-11">
          			<div class="panel portlet box portlet-red">
                        <div class="portlet-header">
							<div class="caption">Add OSR Records</div>
						</div>
            			<div class="panel-body pan">
							<div class="form-body pal">
								
								<fieldset  style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;"><legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Record Details </b></legend>

									<div class="col-sm-6">
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">From Survey No <span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('from_survey_no',['class'=>'form-control num','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'1','placeholder'=>'From Survey No','value'=>'']);?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">To Survey No <span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('to_survey_no',['class'=>'form-control num','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'1','placeholder'=>'To Survey No','value'=>'']);?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Page No <span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('page_no',['class'=>'form-control num','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'1','placeholder'=>'Page No','value'=>'']);?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Keywords / Tags<span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('keyword_tag',['class'=>'form-control ','label'=>false,'error'=>false,'rows'=>'2','minlength'=>'1','placeholder'=>'Enter Tags seperated by comma eg: osr,tiruppur','value'=>'']);?>
													
												</div>
											</div>
										</div>
									</div>
									</div>
																		<div class="col-sm-6">
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">District Name<span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('district_name',['class'=>'form-control name','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'2','placeholder'=>'District Name','value'=>'Tiruppur']);?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Taluk Name<span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('taluk_name',['class'=>'form-control name','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'2','placeholder'=>'Taluk Name','value'=>'Palladam']);?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Village Name <span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('village_name',['class'=>'form-control name','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'2','placeholder'=>'Village Name','value'=>'Pongalur']);?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Village No <span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('village_no',['class'=>'form-control num','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'1','placeholder'=>'Village Name','value'=>2]);?>
												</div>
											</div>
										</div>
									</div>
									</div>
								</fieldset>
							
							<fieldset  style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;"><legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Record Image </b></legend>
							<div class="col-md-12">
								<div class="form-group">
									<div class="col-md-offset-1 col-md-10">
									<button type="button" class="btn btn-red" onclick="backward()"><<</button>
									<button type="button" class="btn btn-red" onclick="forward()">>></button>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<button name="save_continue" type="submit" val="1" class="btn btn-blue">Save and Continue</button>
									<button name="save_only" type="submit" val="1" class="btn btn-green">Save</button>
									<button type="button" class="btn btn-red" onclick="javascript:history.back()">Cancel</button>
									<button type="button" class="btn btn-yellow" id="res" onclick="javascript:location.reload();">Reset</button>
									</div>
								</div>
							</div>
									<div class="col-md-12">
										<div class="form-group">
										<div id="dropbox">
		<div class="text">
			Drop Images Here
		</div>
	</div>
	<span class="upload-progress"></span>
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
var osrImageArray =<?php echo(json_encode($osrFiles)); ?>;
function forward(){
	
	var currentImage = $('#current_image').attr('rel');
	$.each(osrImageArray, function(key, value) {
		
	if(currentImage == value){
		
	   var nextImage = osrImageArray[parseInt(key)+1];
	   if(nextImage){
		   
		$('#current_image').attr('rel',nextImage);
		$('#current_image').attr('src',"<?php echo $this->Url->build('/', true);?>uploads/OSR/"+nextImage);
		
		$('#file-name').val(nextImage);
	   } 
   }
});
}
function backward(){
	var currentImage = $('#current_image').attr('rel');
	var arrayLength = Object.keys(osrImageArray).length;
	
	$.each(osrImageArray, function(key, value) {
	if(currentImage == value){
		if(parseInt(key) == 1){
			
			var nextImage = osrImageArray[arrayLength];
		}
		else{
			var nextImage = osrImageArray[parseInt(key)-1];
			
		}
	   
	   if(nextImage){
		   console.log('backward_'+key);
		$('#current_image').attr('rel',nextImage);
		$('#current_image').attr('src',"<?php echo $this->Url->build('/', true);?>uploads/OSR/"+nextImage);
		$('#file-name').val(nextImage);
	   } 
   }
});
}
</script>
