<style>
.bold {
    font-weight: bold;
}
</style>
<div class="row" oncontextmenu="return false;">
    <?php echo $this->Form->create($goRecords,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-11">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">Add Government Order</div>
                        </div>
                        <div class="panel-body pan">
                            <div class="form-body pal">
                                <fieldset style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                    <legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Government Order
                                        </b></legend>
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Record Type
                                                    <span class="require">*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('document_subtype_id',['class'=>'form-control','label'=>false,'required'=>false,'error'=>false,'empty'=>'Select Record Type']);?>
                                                    </div>
                                                     <?php if (isset($errors['document_subtype_id'])): ?>
                                                        <div class="error-message"><?php echo $errors['document_subtype_id']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Department
                                                    <span class="require">*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('go_department_id',['class'=>'form-control','required'=>false,'label'=>false,'error'=>false,'empty'=>'Select Department']);?>
                                                    </div>
                                                     <?php if (isset($errors['go_department_id'])): ?>
                                                        <div class="error-message"><?php echo $errors['go_department_id']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">GO Number
                                                    <span class="require">*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('go_no',['class'=>'form-control ','label'=>false,'error'=>false,'maxlength'=>'30','minlength'=>'2','placeholder'=>'Enter GO Number','required'=>false]);?>
                                                    </div>
                                                     <?php if (isset($errors['go_no'])): ?>
                                                        <div class="error-message"><?php echo $errors['go_no']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">GO Date
                                                    <span class="require">*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('go_date',['class'=>'form-control datepicker1 calendar','label'=>false,'error'=>false,'readonly'=>'readonly','type'=>'text','placeholder'=>'Go Date','required'=>false,'value'=>$this->Time->format($go->go_date,'d-M-Y')]);?>
                                                    </div>
                                                     <?php if (isset($errors['go_date'])): ?>
                                                        <div class="error-message"><?php echo $errors['go_date']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">GO Subject
                                                    <span class="require">*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('abstract_subject',['class'=>'form-control alphanumeric','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'1','rows'=>2,'required'=>false,'placeholder'=>'Enter GO Subject']);?>
                                                    </div>
                                                     <?php if (isset($errors['abstract_subject'])): ?>
                                                        <div class="error-message"><?php echo $errors['abstract_subject']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Keywords/
                                                    Tags <span class="require">*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('keyword_tag',['class'=>'form-control alphanumericandcomma','label'=>false,'error'=>false,'maxlength'=>'250','minlength'=>'1','rows'=>3,'required'=>false,'placeholder'=>'Enter Keywords/ Tags']);?>
                                                    </div>
                                                     <?php if (isset($errors['keyword_tag'])): ?>
                                                        <div class="error-message"><?php echo $errors['keyword_tag']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset><br>

                                <fieldset style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                    <legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Government Order Upload</b>
                                    </legend>
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-responsive">
                                            <thead class="row-table">
                                                <tr>
                                                    <th width="3%" style="text-align:center;">S.No.</th>
                                                    <th width="17%" style="text-align:center;">Document Copy</th>
                                                    <th width="16%" style="text-align:center;">Attachment</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php if ($uploadGoTypes){ $i=0;
											foreach($uploadGoTypes as $key => $asset){ ?>
                                                <tr>
                                                    <td class="trcount"><?php echo $i+1; ?></td>
                                                    <td>

                                                        <?php echo $this->Form->control('document_name['.$key.']',['label'=>false,'error' => false,'required'=>false,'type'=>'hidden','class'=>'form-control specialfield trimspace','required'=>false,'maxlength'=>'50','value'=>$asset]); ?>
                                                        <?php echo($asset); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo $this->Form->control('document_path['.$key.']',['class'=>'form-control document_path['.$key.'] resumeUpload','type'=>'file','label'=>false,'error'=>false,'required'=>false]);?>
                                                        <small class="danger" style="color: tomato;"> Only PDF File
                                                            allowed.
                                                        </small>
                                                        <?php if (isset($errors['document_path'][$key]['_required'])): ?>
                                                            <div class="error-message"><?php echo $errors['document_path'][$key]['_required']; ?></div>
                                                        <?php endif; ?>

                                                        <?php if (isset($errors['document_path'][$key]['_file'])): ?>
                                                            <div class="error-message"><?php echo $errors['document_path'][$key]['_file']; ?></div>
                                                        <?php endif; ?>

                                                        <?php if (isset($errors['document_path'][$key]['_fileSize'])): ?>
                                                            <div class="error-message"><?php echo $errors['document_path'][$key]['_fileSize']; ?></div>
                                                        <?php endif; ?>
                                                        
                                                    </td>
                                                </tr>
                                                <?php $i++; } } ?>

                                            </tbody>
                                        </table>
                                    </div> 
                            </div>


                            </fieldset><br>
                            <div class="col-lg-7">
                            <div class="form-actions text-right none-bg">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn btn-secondary">Save</button>
                                    <button type="button" class="btn btn-danger" onclick="javascript:history.back()">Cancel</button>
                                    <button type="button" class="btn btn-warning" id="res" onclick="javascript:location.reload();">Reset</button>
                                </div>
                            </div><br>
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
            'go_no': {
                required: true,
                minlength: 2,
                maxlength: 30
            },

            'go_date': {
                required: true
            },
            'document_subtype_id': {
                required: true
            },

            'go_department_id': {
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
            },
            'document_path[]': {
                required: true
            }
        },

        messages: {
            'go_no': {
                required: "Enter GO NO",
                minlength: 'Enter Valid GO NO',
                maxlength: 'Enter Valid GO NO'
            },

            'go_date': {
                required: "Select GO Date"
            },
            'document_subtype_id': {
                required: "Select Document Type"
            },
            'go_department_id': {
                required: "Select Department"
            },
            'abstract_subject': {
                required: "Enter Go Subject",
                minlength: 'Enter Valid GO Subject',
                maxlength: 'Maximum 250 character Length '
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