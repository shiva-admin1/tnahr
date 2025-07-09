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
    <?php echo $this->Form->create($gazettes,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">Edit Gazette</div>
                        </div>
                        <div class="panel-body pan">
                            <div class="form-body pal">
                                <fieldset style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                    <legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Gazettes</b>
                                    </legend>
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Record
                                                    Type <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('document_subtype_id',['class'=>'form-control','label'=>false,'required'=>'false','error'=>false,'empty'=>'Select Record Type']);?>
                                                    </div>
                                                    <?php if (isset($errors['document_subtype_id'])): ?>
                                                        <div class="error-message"><?php echo $errors['document_subtype_id']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent"
                                                    class="col-md-5 control-label bold">Notification No <span
                                                        class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('notification_no',['class'=>'form-control alphanumeric','label'=>false,'required'=>'false','error'=>false,'maxlength'=>'30','minlength'=>'1','placeholder'=>'Notification No']);?>
                                                    </div>
                                                    <?php if (isset($errors['notification_no'])): ?>
                                                        <div class="error-message"><?php echo $errors['notification_no']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
										 <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent"
                                                    class="col-md-5 control-label bold">Notification Date <span
                                                        class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('notification_date',['class'=>'form-control datepicker1','label'=>false,'required'=>'false','error'=>false,'readonly'=>'readonly','type'=>'text','placeholder'=>'Notification Date','value'=>date('d-m-Y',strtotime($gazettes->notification_date))]);?>
                                                    </div>
                                                    <?php if (isset($errors['notification_date'])): ?>
                                                        <div class="error-message"><?php echo $errors['notification_date']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
										<div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Part
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('gpart',['class'=>'form-control','label'=>false,'error'=>false,'required'=>'false','maxlength'=>'150','minlength'=>'1','placeholder'=>'Part']);?>
                                                    </div>
                                                    <?php if (isset($errors['gpart'])): ?>
                                                        <div class="error-message"><?php echo $errors['gpart']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
										
										<div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">
                                                     Section<span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('gsection',['class'=>'form-control','label'=>false,'error'=>false,'required'=>'false','maxlength'=>'150','minlength'=>'1','placeholder'=>'Section']);?>
                                                    </div>
                                                    <?php if (isset($errors['gsection'])): ?>
                                                        <div class="error-message"><?php echo $errors['gsection']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                       

                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Abstract /
                                                    Subject
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('abstract_subject',['class'=>'form-control ','label'=>false,'required'=>'false','error'=>false,'rows'=>3,'placeholder'=>'Abstract/Subject']);?>
                                                    </div>
                                                    <?php if (isset($errors['abstract_subject'])): ?>
                                                        <div class="error-message"><?php echo $errors['abstract_subject']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Keywords /
                                                    Tags <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('keyword_tag',['class'=>'form-control alphanumericandcomma','label'=>false,'error'=>false,'required'=>'false','maxlength'=>'250','minlength'=>'1','rows'=>3,'placeholder'=>'Keywords/Tags']);?>
                                                    </div>
                                                    <?php if (isset($errors['document_subtype_id'])): ?>
                                                        <div class="error-message"><?php echo $errors['document_subtype_id']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                       

                                        
										
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Upload
                                                    Gazette <br> Enclosure
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('file_path',['class'=>'form-control document_path resumeUpload','required'=>'false','type'=>'file','label'=>false,'error'=>false]);?>
                                                        <?php echo $this->Form->control('file_path_1',['type'=>'hidden','label'=>false,'error'=>false,'required'=>false,'value'=>$gazettes->file_path]); ?>
                                                    
														<small class="danger" style="color: tomato;"> Only PDF
                                                            File
                                                            allowed.
                                                        </small>
                                                        <?php if (isset($errors['file_path']['_empty'])): ?>
                                                            <div class="error-message"><?php echo $errors['file_path']['_empty']; ?></div>
                                                        <?php endif; ?>
                                                         <?php if (isset($errors['file_path']['custom'])): ?>
                                                            <div class="error-message"><?php echo $errors['file_path']['custom']; ?></div>
                                                        <?php endif; ?>
                                                    </div>                  
													<?php if($gazettes->file_path){ ?>
															<a target="_blank"
                                                            href="<?php echo $this->Url->build('/', true)?><?php echo $gazettes->file_path; ?>"
                                                            style="color:#1ECBE4;"><i
                                                                class="fas fa-file-pdf"></i>&nbsp;View Enclosure</a>   
                                                     <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="col-lg-7">
                                    <div class="form-actions text-right none-bg">
                                        <div class="col-md-offset-3 col-md-9">
                                        <input type="hidden" name="file_paths" id="file_paths" value="<?php echo ($gazettes->file_path === "") ? '' : $bookRecord->file_path; ?>">
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
$(function() {
    $("#FormID").validate({
        rules: {
            'document_subtype_id': {
                required: true
            },
            'notification_no': {
                required: true,
                minlength: 1,
                maxlength: 30
            },

            'notification_date': {
                required: true
            },


            'gpart': {
                required: true
            },
            'gsection': {
                required: true
            },
            'abstract_subject': {
                required: true
            },

            'keyword_tag': {
                required: true,
                minlength: 1,
                maxlength: 250
            },
            'document_path[]': {
                required: true
            }
        },

        messages: {
            'document_subtype_id': {
                required: "Select Record Type"
            },
            'notification_no': {
                required: "Enter Notification No",
                minlength: 'Enter Valid Notification No',
                maxlength: 'Enter Valid Notification No'
            },

            'notification_date': {
                required: "Select Notification Date"
            },
            'gpart': {
                required: "Enter Part"
            },
            'gsection': {
                required: "Enter Section"
            },
            'abstract_subject': {
                required: "Enter Abstract/Subject"
            },
            'keyword_tag': {
                required: "Enter  Keywords/ Tags",
                minlength: 'Add More Keywords',
                maxlength: 'Maximum 250 character Length'
            },
            'document_path[]': {
                required: "Upload GO Document"
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