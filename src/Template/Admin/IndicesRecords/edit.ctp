<style>
.bold {
    font-weight: bold;
}

.text-danger {
    color: #e8143b8f;
    font-size: 50%;
}
</style>
<div class="row" oncontextmenu="return false;">
    <?php echo $this->Form->create($IndicesRecords,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-11">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">Edit Indices Record</div>
                        </div>
                        <div class="panel-body pan">
                            <div class="form-body pal">
                                <fieldset style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                    <legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Indices Record
                                        </b></legend>
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Departments
                                                    
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('department_id',['class'=>'form-control','label'=>false,'error'=>false,'required'=>false,'options'=>$Departments,'placeholder'=>'Enter Department Name', 'empty' => 'Select Department']);?>
                                                    </div>
                                                    <?php if (isset($errors['department_id'])): ?>
                                                        <div class="error-message"><?php echo $errors['department_id']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                        <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Year 
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('indiceyear',['class'=>'form-control datepicker10','label'=>false,'error'=>false,'required'=>false,'maxlength'=>'70','minlength'=>'2','placeholder'=>'Select Year']);?>
                                                    </div>
                                                    <?php if (isset($errors['indiceyear'])): ?>
                                                        <div class="error-message"><?php echo $errors['indiceyear']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                   
                                
                                    </div>
                                    <div class="col-md-6">
                                  
                                  
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Keywords/
                                                    Tags <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('keyword_tag',['class'=>'form-control alphanumericandcomma','label'=>false,'error'=>false,'required'=>false,'maxlength'=>'250','minlength'=>'1','rows'=>3,'placeholder'=>'Enter Keywords/Tags']);?>
                                                    </div>
                                                    <?php if (isset($errors['district_name'])): ?>
                                                        <div class="error-message"><?php echo $errors['district_name']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Upload IFR
                                                    Enclosure <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('file_path',['class'=>'form-control document_path resumeUpload','required'=>false,'type'=>'file','label'=>false,'error'=>false]);?>
                                                        <?php echo $this->Form->control('file_path_1',['type'=>'hidden','label'=>false,'error'=>false,'required'=>false,'value'=>$IndicesRecords->file_path]); ?>
                                                    
														<small class="danger" style="color: tomato;"> Only PDF File
                                                            allowed.
                                                        </small>
                                                        <?php if (isset($errors['file_path']['_empty'])): ?>
                                                            <div class="error-message"><?php echo $errors['file_path']['_empty']; ?></div>
                                                        <?php endif; ?>
                                                         <?php if (isset($errors['file_path']['custom'])): ?>
                                                            <div class="error-message"><?php echo $errors['file_path']['custom']; ?></div>
                                                        <?php endif; ?><br>
                                                        <?php if($IndicesRecords->file_path){ ?>
                                                        <a target="_blank"
                                                            href="<?php echo $this->Url->build('/', true)?><?php echo $IndicesRecords->file_path; ?>"style="color:#1ECBE4;"><i
                                                                class="fas fa-file-pdf"></i>&nbsp;View
                                                            Enclosure</a>


                                                        <?php }?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="col-lg-7">
                                    <div class="form-actions text-right none-bg">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn btn-secondary">Save</button>
                                            <button type="button" class="btn btn-danger"
                                                onclick="javascript:history.back()">Cancel</button>
                                            <button type="reset" class="btn btn-warning"
                                                >Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $this->Form->End();?>
</div>
<style>
.disp {
    display: none;
}
</style>
<script>
$(function() {
    $('.datepicker10').datepicker({
    endDate: new Date(),
    minViewMode: 'years',
    format: 'yyyy' // Ensures the displayed format is only the year
});

    $("#FormID").validate({
        // rules: {
        //     'district_name': {
        //         required: true
        //     },

        //     'taluk_name': {
        //         required: true
        //     },
        //     'village_name': {
        //         required: true
        //     },

        //     'village_no': {
        //         required: true
        //     },
        //     'title_deed_no': {
        //         required: true
        //     },
        //     'sheet_no': {
        //         required: true
        //     },

        //     'keyword_tag': {
        //         required: true,
        //         minlength: 1,
        //         maxlength: 250
        //     }
        // },

        // messages: {
        //     'district_name': {
        //         required: "Enter District Name"
        //     },

        //     'taluk_name': {
        //         required: "Enter Taluk Name"
        //     },
        //     'village_name': {
        //         required: "Enter Village Name"
        //     },
        //     'village_no': {
        //         required: "Enter Village No"
        //     },
        //     'title_deed_no': {
        //         required: "Enter Title Deed No"
        //     },
        //     'sheet_no': {
        //         required: "Enter Sheet No"
        //     },

        //     'keyword_tag': {
        //         required: "Enter Keywords / Tags",
        //         minlength: 'Add More Keywords',
        //         maxlength: 'Maximum 250 character Length'
        //     }
        // },
        submitHandler: function(form) {
            form.submit();
            $(".btn").prop('disabled', true);
        }
    });
});


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
	    if(file_size>=1073741824) {
			alert("File Maximum size is 1GB");
			oInput.value = "";
			return false;
		}

	}
    return true;
}

</script>