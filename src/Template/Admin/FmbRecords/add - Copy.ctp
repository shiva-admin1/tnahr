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
								<div class="col-sm-6">
								<fieldset  style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;"><legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Records Details </b></legend>
									
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">District <span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('district_name',['class'=>'form-control name','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'2']);?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Taluk <span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('taluk_name',['class'=>'form-control name','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'2']);?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Village Name <span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('village_name',['class'=>'form-control name','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'2']);?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Village No <span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('village_no',['class'=>'form-control num','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'1']);?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">From Survey No <span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('from_survey_no',['class'=>'form-control num','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'1']);?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">To Survey No <span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('from_survey_no',['class'=>'form-control num','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'1']);?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Page No <span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('page_no',['class'=>'form-control num','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'1']);?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Keywords / Tags<span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('keyword_tag',['class'=>'form-control alphanumeric','label'=>false,'error'=>false,'rows'=>'2','minlength'=>'1']);?>
													
												</div>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-sm-6">
							<fieldset  style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;"><legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Records Image </b></legend>
									<div class="col-md-12">
										<div class="form-group">

        		<button type="button" class="btn btn-red" onclick="backward()"><<</button>
        		<button type="button" class="btn btn-red" onclick="forward()">>></button>

										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
										<?php echo $this->Form->control('file_name',['class'=>'form-control alphanumeric','label'=>false,'error'=>false,'type'=>'hidden','value'=>$osrFiles[1]]);?>
										
									&nbsp;&nbsp;&nbsp;<iframe id ="current_image" rel =<?php echo $osrFiles[1]; ?> allowFullScreen="true" frameborder="0" height="610px" width="450px" src="<?php echo $this->Url->build('/', true);?>uploads/OSR/<?php echo $osrFiles[1]; ?>" title="View T&C" style="border:none;"></iframe>
											
										</div>
									</div>

									
								</fieldset>
							
								</div>
							</div>
						</div><br><br>
					</div>
				</div>
			</div>	
		</div>
  	</div>
  	<div class="col-lg-7">
    	<div class="form-actions text-right none-bg">
      		<div class="col-md-offset-3 col-md-9">
        		<button name="save_continue" type="submit" class="btn btn-blue">Save and Continue</button>
        		<button name="save_only" type="submit" class="btn btn-green">Save</button>
        		<button type="button" class="btn btn-red" onclick="javascript:history.back()">Cancel</button>
        		<button type="button" class="btn btn-yellow" id="res" onclick="javascript:location.reload();">Reset</button>
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