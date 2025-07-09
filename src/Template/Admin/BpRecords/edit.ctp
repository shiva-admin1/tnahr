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
    <?php echo $this->Form->create($bpRecords,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-11">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">Edit Board Proceeding</div>
                        </div>
                        <div class="panel-body pan">
                            <div class="form-body pal">
                                <fieldset style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                    <legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Board Proceeding
                                        </b></legend>
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">BP Type
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('document_subtype_id',['class'=>'form-control','label'=>false,'error'=>false,'empty'=>'Select BP Type','required'=>false]);?>
                                                    </div>
                                                     <?php if (isset($errors['document_subtype_id'])): ?>
                                                        <div class="error-message"><?php echo $errors['document_subtype_id']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">BP No
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('bp_no',['class'=>'form-control ','label'=>false,'error'=>false,'maxlength'=>'30','minlength'=>'1','placeholder'=>'BP No','required'=>false]);?>
                                                    </div>
                                                     <?php if (isset($errors['bp_no'])): ?>
                                                        <div class="error-message"><?php echo $errors['bp_no']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">BP Date
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('bp_date',['class'=>'form-control datepicker1 calendar','label'=>false,'error'=>false,'readonly'=>'readonly','type'=>'text','placeholder'=>'BP Date','required'=>false,'value'=>date('d-m-Y',strtotime($bpRecords->bp_date))]);?>
                                                    </div>
                                                     <?php if (isset($errors['bp_date'])): ?>
                                                        <div class="error-message"><?php echo $errors['bp_date']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">BP Subject
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('abstract_subject',['class'=>'form-control ','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'1','rows'=>2,'placeholder'=>'BP Subject','required'=>false]);?>
                                                    </div>
                                                     <?php if (isset($errors['abstract_subject'])): ?>
                                                        <div class="error-message"><?php echo $errors['abstract_subject']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Keywords/
                                                    Tags <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('keyword_tag',['class'=>'form-control alphanumericandcomma','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'1','rows'=>2,'placeholder'=>'Keywords/Tags','required'=>false]);?>
                                                    </div>
                                                     <?php if (isset($errors['keyword_tag'])): ?>
                                                        <div class="error-message"><?php echo $errors['keyword_tag']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Upload BP
                                                    Enclosure <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('file_path',['class'=>'form-control document_path resumeUpload','type'=>'file','label'=>false,'error'=>false,'required'=>false]);?>
                                                          <?php echo $this->Form->control('file_path_1',['type'=>'hidden','label'=>false,'error'=>false,'required'=>false,'value'=>$bpRecords->file_path]); ?>
                                                    
													   <small class="danger" style="color: tomato;"> Only PDF File
                                                            allowed.
                                                        </small>
                                                    </div>
                                                    <?php if($bpRecords->file_path){ ?>
															<a target="_blank"
                                                            href="<?php echo $this->Url->build('/', true)?><?php echo $bpRecords->file_path; ?>"
                                                            style="color:#1ECBE4;"><i
                                                                class="fas fa-file-pdf"></i>&nbsp;View Enclosure</a>   
                                                     <?php } ?>
                                                      <?php if (isset($errors['file_path']['_empty'])): ?>
                                                            <div class="error-message"><?php echo $errors['file_path']['_empty']; ?></div>
                                                        <?php endif; ?>
                                                         <?php if (isset($errors['file_path']['custom'])): ?>
                                                            <div class="error-message"><?php echo $errors['file_path']['custom']; ?></div>
                                                        <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                                <div class="col-lg-7">
                                     <div class="form-actions text-right none-bg">
										 <div class="col-md-offset-3 col-md-9">
										    <input type="hidden" name="file_paths" id="file_paths" value="<?php echo ($bpRecords->file_path === "") ? '' : $bpRecords->file_path; ?>">
											<button type="submit" class="btn btn-secondary">Save</button>
											<button type="button" class="btn btn-danger"
												onclick="javascript:history.back()">Cancel</button>
											<button type="button" class="btn btn-warning" id="res"
												onclick="javascript:location.reload();">Reset</button>
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
$(document).ready(function() {
    $('.datepicker1').datepicker({endDate:new Date()});
});
$('.datepicker1').datepicker({endDate:new Date()});
$(function() {
    $("#FormID").validate({
        rules: {
            'bp_no': {
                required: true,
                minlength: 2,
                maxlength: 30
            },

            'bp_date': {
                required: true
            },
            'document_subtype_id': {
                required: true
            },
            'abstract_subject': {
                required: true,
                minlength: 1,
                maxlength: 250
            },

            'keyword_tag': {
                required: true,
                minlength: 1,
                maxlength: 250
            }
        },

        messages: {
            'bp_no': {
                required: "Enter BP NO",
                minlength: 'Enter Valid BP NO',
                maxlength: 'Enter Valid BP NO'
            },

            'bp_date': {
                required: "Select BP Date"
            },
            'document_subtype_id': {
                required: "Select BP Type"
            },
            'abstract_subject': {
                required: "Enter BP Subject",
                minlength: 'Enter Valid BP Subject',
                maxlength: 'Maximum 250 character Length '
            },
            'keyword_tag': {
                required: "Enter  Keywords/ Tags",
                minlength: 'Add More Keywords',
                maxlength: 'Maximum 250 character Length'
            }
        },
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