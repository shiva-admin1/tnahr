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
  	<?php echo $this->Form->create($osrRecords,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data','action'=>'insert_pdf']); ?>
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
														<?php echo $this->Form->control('district_id',['class'=>'form-control','label'=>false,'error'=>false,'options'=>$districts,'empty'=>'-Select District-','onchange'=>'loadtaluk(this.value)']);?>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="inputContent" class="col-md-3 control-label bold">Taluk <span class="require">*</span></label>
												<div class="col-md-8">
													<div class="input text">
														<?php echo $this->Form->control('taluk_id',['class'=>'form-control','label'=>false,'error'=>false,'options'=>'','empty'=>'-Select Taluk-','onchange'=>'loadvillage(this.value)']);?>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="inputContent" class="col-md-3 control-label bold">Village  <span class="require">*</span></label>
												<div class="col-md-8">
													<div class="input text">
													    <?php echo $this->Form->control('village_id',['class'=>'form-control','label'=>false,'error'=>false,'options'=>'','empty'=>'-Select Village-','onchange'=>'loadvillagenumber(this.value)']);?>
													</div>
												</div>
											</div>
										</div>									
									</div>						
									<div class="col-md-12">									
										<div class="col-md-4">
											<div class="form-group">
												<label for="inputContent" class="col-md-3 control-label bold">Village No <span class="require"></span></label>
												<div class="col-md-8">
													<div class="input text">
														<?php echo $this->Form->control('village_no',['class'=>'form-control num','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'1','placeholder'=>'Village Number','readonly']);?>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-8">
											<div class="form-group">
												<label for="inputContent" class="col-md-3 control-label bold">Keywords / Tags<span class="require"></span></label>
												<div class="col-md-8">
													<div class="input text">
														<?php echo $this->Form->control('keyword_tag',['class'=>'form-control ','label'=>false,'error'=>false,'rows'=>'2','minlength'=>'1','placeholder'=>'Enter Tags seperated by comma eg: osr,tiruppur','value'=>'']);?>
														
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">									
										<div class="col-md-4">
											<div class="form-group">
												<label for="inputContent" class="col-md-3 control-label bold">Record Type <span class="require">*</span></label>
												<div class="col-md-8">
													<div class="input text">
														<?php echo $this->Form->control('type',['class'=>'form-control','label'=>false,'error'=>false,'options'=>[1=>'Image',2=>'PDF'],'empty'=>'-Select-','onchange'=>'loaddocument(this.value)']);?>
													</div>
												</div>
											</div>
										</div>
										<!--div class="col-md-8">
											<div class="form-group">
												<label for="inputContent" class="col-md-3 control-label bold">Keywords / Tags<span class="require"></span></label>
												<div class="col-md-8">
													<div class="input text">
														<?php //echo $this->Form->control('keyword_tag',['class'=>'form-control ','label'=>false,'error'=>false,'rows'=>'2','minlength'=>'1','placeholder'=>'Enter Tags seperated by comma eg: osr,tiruppur','value'=>'']);?>
														
													</div>
												</div>
											</div>
										</div-->
									</div>
									<div class="col-md-12 pdf" style="display:none;">  									
										<div class="col-md-4">
											<div class="form-group">
												<label for="inputContent" class="col-md-3 control-label bold"> PDF  Filepath<span class="require">*</span></label>
												<div class="col-md-8">
													<div class="input text">
													<?php echo $this->Form->control('file_path',['class'=>'form-control document_path resumeUpload','type'=>'file','label'=>false,'error'=>false,'required'=>true,'onchange'=>'validdocs(this)']);?>
													<small class="danger" style="color: tomato;font-size:13px;"> Only PDF File 	allowed.
													</small>
													</div>
												</div>
											</div>
										</div>
									</div>
								    	
									<div class="col-md-12 pdf" style="display:none;">
									<div class="col-md-8">
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
							    <div class = "image" style="display:none;">
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
  function loadtaluk(dist_id){
	   var dist_id;
	   if (dist_id) {
            $.ajax({
                type: 'POST',
                url: '<?php echo $this->Url->webroot ?>/admin/ifr_records/ajaxtaluk/'+dist_id,
                success: function(data, textStatus) {
                     //alert(data);
                    $('#taluk-id').html(data);
                }
            });
        } else {
		   alert('Add District in Master');
		   $('#district-id').val('');
		   $('#taluk-id').val('');
           $('#village-id').val('');

        }	
	}
	
	
	 function loadvillage(tak_id){
	   var dist_id = $('#district-id').val();
	   if (dist_id != '') {
            $.ajax({
                type: 'POST',
                url: '<?php echo $this->Url->webroot ?>/admin/ifr_records/ajaxvillage/'+dist_id+'/'+tak_id,
                success: function(data, textStatus) {
                     //alert(data);
                    $('#village-id').html(data);
                }
            });
        } else {
		   alert('Select District');
		   $('#district-id').val('');
		   $('#taluk-id').val('');
           $('#village-id').val('');
            //$('#taluk_id').html('<option value="">Select Work Type</option>');

        }	
	}
	
	
	function loadvillagenumber(vill_id){
	 var dist_id = $('#district-id').val();
	 var tak_id = $('#taluk-id').val();
	    if (dist_id != '' && tak_id != '' && vill_id != '') {
            $.ajax({
                type: 'POST',
                url: '<?php echo $this->Url->webroot ?>/admin/ifr_records/ajaxvillageno/'+vill_id,
                success: function(data, textStatus) {
                     //alert(data);
                    $('#village-no').val(data);
                }
            });
        }else if(dist_id == '' && tak_id == ''){
		   alert('Select District and Taluk');
		   $('#district-id').val('');
		   $('#taluk-id').val('');
           $('#village-id').val('');
            //$('#taluk_id').html('<option value="">Select Work Type</option>');

        }else if(dist_id == '' && tak_id != ''){
		   alert('Select District');
		   $('#district-id').val('');
		   $('#taluk-id').val('');
           $('#village-id').val('');
            //$('#taluk_id').html('<option value="">Select Work Type</option>');

        }else if(dist_id != '' && tak_id == ''){
		   alert('Select Taluk');
		   $('#district-id').val('');
		   $('#taluk-id').val('');
           $('#village-id').val('');
            //$('#taluk_id').html('<option value="">Select Work Type</option>');

        }			
	}
	
	
	function loaddocument(id){	
	   var id;	
		if(id == 1){
		  $('.pdf').hide();
		  $('.image').show();
		}else if(id == 2){
			$('.image').hide();
			$('.pdf').show();
		}	
	}
	
	
	function validdocs(oInput) {   
	var _validFileExtensions = [ ".pdf"];    
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
	    if(file_size>=209715200) {
			alert("File Maximum size is 200MB");
			oInput.value = "";
			return false;
		}

	}
    return true;
}


$(function() {
    $("#FormID").validate({
        rules: {
            'district_id': {
                required: true
            },
             'taluk_id': {
                required: true
            },
			'village_id': {
                required: true
            },
			'type': {
                required: false
            }
        },

        messages: {
            'district_id': {
                required: "Select District"
            },
            'taluk_id': {
                required: "Select Taluk"
            },
			'village_id': {
                required: "Select Village"
            },
			'type': {
                required: "Select Record Type"
            }
        },
        submitHandler: function(form) {
            form.submit();
            $(".btn").prop('disabled', true);
        }
    });
});
</script>