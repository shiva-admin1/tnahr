<style>
.bold{
	font-weight: bold;
}
</style>
<div class="row" oncontextmenu="return false;">
  	<?php echo $this->Form->create($fmbRecords, ['url' => ['action' => 'add'],'id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
	<div class="col-lg-12">
    	<div id="tab-form-actions" class="tab-pane fade active in">
      		<div class="row">
        		<div class="col-lg-12">
          			<div class="panel portlet box portlet-red">
                        <div class="portlet-header">
							<div class="caption">Add FMB Records</div>
						</div>
            			<div class="panel-body pan">
							<div class="form-body pal">
								
								<fieldset  style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;"><legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Record Details </b></legend>

									<div class="col-sm-6">
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">District Name <span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('district_name',['class'=>'form-control name','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'1','placeholder'=>'District Name','value'=>$adistrict]);?>
												</div>
												<?php if (isset($errors['district_name'])): ?>
                                                        <div class="error-message"><?php echo $errors['district_name']['_empty']; ?></div>
                                                    <?php endif; ?>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Taluk Name <span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('taluk_name',['class'=>'form-control name','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'1','placeholder'=>'Taluk Name','value'=>$ataluk]);?>
												</div>
												<?php if (isset($errors['taluk_name'])): ?>
                                                        <div class="error-message"><?php echo $errors['taluk_name']['_empty']; ?></div>
                                                    <?php endif; ?>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Village Name<span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('village_name',['class'=>'form-control name','label'=>false,'error'=>false,'rows'=>'2','minlength'=>'1','placeholder'=>'Village Name','value'=>$avilname]);?>
													
												</div>
												<?php if (isset($errors['village_name'])): ?>
                                                        <div class="error-message"><?php echo $errors['village_name']['_empty']; ?></div>
                                                    <?php endif; ?>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Village No<span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('village_no',['class'=>'form-control','label'=>false,'error'=>false,'minlength'=>'1','placeholder'=>'Village No']);?>
													
												</div>
												<?php if (isset($errors['village_no'])): ?>
                                                        <div class="error-message"><?php echo $errors['village_no']['_empty']; ?></div>
                                                    <?php endif; ?>
											</div>
										</div>
									</div>
									</div>
									<div class="col-sm-6">
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Sub-Category <span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('document_subtype_id',['class'=>'form-control','label'=>false,'error'=>false,'empty'=>'Select']);?>
												</div>
												<?php if (isset($errors['document_subtype_id'])): ?>
                                                        <div class="error-message"><?php echo $errors['document_subtype_id']['_empty']; ?></div>
                                                    <?php endif; ?>
											</div>
										</div>
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">File&nbsp;&nbsp;&nbsp;(Add upto 10 Files Maximum)<span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('uploadfile.',['class'=>'form-control num','label'=>false,'error'=>false,'type'=>'file','multiple'=>'multiple','onchange'=>'validdocs(this)']);?>
												</div>
												 <?php if (isset($errors['uploadfile']['_empty'])): ?>
                                                            <div class="error-message"><?php echo $errors['uploadfile']['_empty']; ?></div>
                                                        <?php endif; ?>
                                                         <?php if (isset($errors['uploadfile']['custom'])): ?>
                                                            <div class="error-message"><?php echo $errors['uploadfile']['custom']; ?></div>
                                                        <?php endif; ?>
														<small class="danger" style="color: tomato;"> Only jpeg,jpg,png,tif
                                                            File
                                                            allowed.
                                                     </small>
											</div>
										</div>
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
											<label for="inputContent" class="col-md-4 control-label bold">Keywords / Tags<span class="require">*</span></label>
											<div class="col-md-6">
												<div class="input text">
													<?php echo $this->Form->control('keyword_tag',['class'=>'form-control ','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'2','placeholder'=>'Enter Tags seperated by comma eg: osr,tiruppur','value'=>'']);?>
												</div>
												<?php if (isset($errors['keyword_tag'])): ?>
                                                        <div class="error-message"><?php echo $errors['keyword_tag']['_empty']; ?></div>
                                                    <?php endif; ?>
											</div>
										</div>
									</div>
							<div class="col-md-12">
								<div class="form-group">
									<div class="col-md-offset-1 col-md-10">
									<button name="save_only" type="submit" val="1" class="btn btn-secondary">Save</button>
									<button type="button" class="btn btn-danger" onclick="javascript:history.back()">Cancel</button>
									<button type="reset" class="btn btn-warning">Reset</button>
									</div>
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
var fmbImageArray =<?php echo(json_encode($osrFiles)); ?>;
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
function validdocs(oInput) {   
	var _validFileExtensions = [ ".jpg", ".jpeg", ".tif", ".png"];    
	if (oInput.type == "file") {
		var sFileName = oInput.value;
		if (sFileName.length > 0) {
			var blnValid = false;
			for (var j = 0; j < _validFileExtensions.length; j++) {
				var sCurExtension = _validFileExtensions[j];
				if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
					blnValid = true;
					break;
				}
			}
			if (!blnValid) {
			   alert( _validFileExtensions.join(", ")+ " File Formats only Allowed");
			   //alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
			   oInput.value = "";
			   return false;
			}
		}
		var file_size = oInput.files[0].size;
		 if(file_size>=5242880) {
			alert("File Maximum size is 5MB");
			oInput.value = "";
			return false;
		}

	}
    return true;
}
</script>