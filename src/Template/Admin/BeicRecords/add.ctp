<style>
.bold {
    font-weight: bold;
}
</style>
<div class="row" oncontextmenu="return false;">
    <?php echo $this->Form->create($beicRecord,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">Add Pre 1857 records(1670 to 1857 A.D) Records</div>
                        </div>
                        <div class="panel-body pan">
                            <div class="form-body pal">

                                <fieldset style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                    <legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Pre 1875 records(1670 to 1875 A.D) Records
                                        </b></legend>

                                    <div class="col-sm-6">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Record
                                                    Type <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('document_subtype_id',['class'=>'form-control','label'=>false,'error'=>false,'required'=>false,'empty'=>'Select Record Type']);?>
                                                    </div>
                                                    <?php if (isset($errors['document_subtype_id'])): ?>
                                                        <div class="error-message"><?php echo $errors['document_subtype_id']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Department
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('department',['class'=>'form-control','label'=>false,'error'=>false,'required'=>false,'placeholder'=>'Department']);?>

                                                    </div>
                                                    <?php if (isset($errors['department'])): ?>
                                                        <div class="error-message"><?php echo $errors['department']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">General No
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('general_no',['class'=>'form-control','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'1','required'=>false,'placeholder'=>'General No']);?>
                                                    </div>
                                                    <?php if (isset($errors['general_no'])): ?>
                                                        <div class="error-message"><?php echo $errors['general_no']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Volume
                                                    No <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('volume_no',['class'=>'form-control','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'1','required'=>false,'placeholder'=>'Volume No']);?>
                                                    </div>
                                                    <?php if (isset($errors['volume_no'])): ?>
                                                        <div class="error-message"><?php echo $errors['volume_no']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">From
                                                    Date
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('fromdate',['class'=>'form-control datepicker1 calendar','label'=>false,'error'=>false,'readonly'=>'readonly','type'=>'text','required'=>false,'placeholder'=>'From Date']);?>
                                                    </div>
                                                    <?php if (isset($errors['fromdate'])): ?>
                                                        <div class="error-message"><?php echo $errors['fromdate']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">To
                                                    Date
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('todate',['class'=>'form-control datepicker1 calendar','label'=>false,'error'=>false,'readonly'=>'readonly','type'=>'text','required'=>false,'placeholder'=>'To Date']);?>
                                                    </div>
                                                    <?php if (isset($errors['todate'])): ?>
                                                        <div class="error-message"><?php echo $errors['todate']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Keywords /
                                                    Tags
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('keyword_tag',['class'=>'form-control  alphanumericandcomma','label'=>false,'error'=>false,'rows'=>'2','minlength'=>'1','required'=>false,'placeholder'=>'Keyword/Tag']);?>

                                                    </div>
                                                    <?php if (isset($errors['keyword_tag'])): ?>
                                                        <div class="error-message"><?php echo $errors['keyword_tag']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Upload
                                                    Enclosure<span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('file_path',['class'=>'form-control document_path resumeUpload','type'=>'file','label'=>false,'error'=>false,'required'=>false]);?>
                                                        <small class="danger" style="color: tomato;"> Only PDF File
                                                            allowed.
                                                        </small>
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
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-actions text-right none-bg">
                                    <div class="col-md-offset-3 col-md-9">
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

    <?php echo $this->Form->End();?>
</div>
<style>
.disp {
    display: none;
}
</style>
<script>
$('.datepicker1').datepicker({endDate:new Date()});
$(function() {
    $("#FormID").validate({
        rules: {
            'document_subtype_id': {
                required: true
            },
            'go_department_id': {
                required: true
            },
            'volume_no': {
                required: true
            },
            'general_no': {
                required: true
            },

            'department': {
                required: true
            },
            'fromdate': {
                required: true
            },
            'todate': {
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
            'go_department_id': {
                required: "Select Department"
            },
            'volume_no': {
                required: "Enter Volume No"
            },
            'general_no': {
                required: "Enter General No"
            },
            'department': {
                required: "Enter Department"
            },
            'fromdate': {
                required: "Select From Date"
            },
            'todate': {
                required: "Select To Date"
            },
            'keyword_tag': {
                required: "Enter  Keywords/ Tags",
                minlength: 'Add More Keywords',
                maxlength: 'Maximum 150 character Length'
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