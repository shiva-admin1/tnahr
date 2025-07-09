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
    <?php echo $this->Form->create($voterRecords,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-11">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">Edit Voter List</div>
                        </div>
                        <div class="panel-body pan">
                            <div class="form-body pal">
                                <fieldset style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                    <legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Voter List
                                        </b></legend>
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Year
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('record_year',['class'=>'form-control num','label'=>false,'error'=>false,'placeholder'=>'Record Year','required'=>false,'onblur'=>'callYop(this);']);?>
                                                    </div>
                                                    <?php if (isset($errors['record_year'])): ?>
                                                        <div class="error-message"><?php echo $errors['record_year']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent"
                                                    class="col-md-5 control-label bold">Constituency No
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('constituency_no',['class'=>'form-control','label'=>false,'error'=>false,'required'=>false,'placeholder'=>'Constituency No']);?>
                                                    </div>
                                                    <?php if (isset($errors['constituency_no'])): ?>
                                                        <div class="error-message"><?php echo $errors['constituency_no']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent"
                                                    class="col-md-5 control-label bold">Constituency
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('constituency_name',['class'=>'form-control name','label'=>false,'error'=>false,'required'=>false,'placeholder'=>'Constituency Name']);?>
                                                    </div>
                                                    <?php if (isset($errors['constituency_name'])): ?>
                                                        <div class="error-message"><?php echo $errors['constituency_name']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
										<div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Record Type
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-7">
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
                                                <label for="inputContent" class="col-md-5 control-label bold">District
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('district_name',['class'=>'form-control name','label'=>false,'error'=>false,'required'=>false,'maxlength'=>'30','minlength'=>'1','placeholder'=>'District Name']);?>
                                                    </div>
                                                    <?php if (isset($errors['district_name'])): ?>
                                                        <div class="error-message"><?php echo $errors['district_name']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                      
                                    </div>

                                    <div class="col-md-6">
									
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Taluk
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('taluk_name',['class'=>'form-control name','label'=>false,'error'=>false,'required'=>false,'maxlength'=>'30','minlength'=>'1','placeholder'=>'Taluk Name']);?>
                                                    </div>
                                                    <?php if (isset($errors['taluk_name'])): ?>
                                                        <div class="error-message"><?php echo $errors['taluk_name']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent"
                                                    class="col-md-5 control-label bold">Village
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('village_name',['class'=>'form-control name','label'=>false,'error'=>false,'required'=>false,'maxlength'=>'30','minlength'=>'1','placeholder'=>'Village Name']);?>
                                                    </div>
                                                    <?php if (isset($errors['village_name'])): ?>
                                                        <div class="error-message"><?php echo $errors['village_name']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
										  <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Keywords /
                                                    Tags
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('keyword_tag',['class'=>'form-control alphanumericandcomma','label'=>false,'required'=>false,'error'=>false,'rows'=>'2','minlength'=>'1','placeholder'=>'Keywords / Tags']);?>

                                                    </div>
                                                    <?php if (isset($errors['keyword_tag'])): ?>
                                                        <div class="error-message"><?php echo $errors['keyword_tag']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Upload
                                                    <br>
                                                    Enclosure <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('file_path',['class'=>'form-control document_path resumeUpload','type'=>'file','label'=>false,'required'=>false,'error'=>false]);?>
                                                        <?php echo $this->Form->control('file_path_1',['type'=>'hidden','label'=>false,'error'=>false,'required'=>false,'value'=>$voterRecords->file_path]); ?>
                                                      <small class="danger" style="color: tomato;"> Only PDF File
                                                            allowed.
                                                        </small>
                                                        <?php if (isset($errors['file_path']['_empty'])): ?>
                                                            <div class="error-message"><?php echo $errors['file_path']['_empty']; ?></div>
                                                        <?php endif; ?>
                                                         <?php if (isset($errors['file_path']['custom'])): ?>
                                                            <div class="error-message"><?php echo $errors['file_path']['custom']; ?></div>
                                                        <?php endif; ?>
                                                        <?php if($voterRecords->file_path){ ?>
                                                        <a target="_blank"
                                                            href="<?php echo $this->Url->build('/', true)?><?php echo $voterRecords->file_path; ?>"style="color:#1ECBE4;"><br><i
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
                                            <button type="reset" class="btn btn-warning">Reset</button>
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

function callYop(yop){

var yopval = $(yop).val();
		if( (parseInt(yopval)) <= 1600  || (parseInt(yopval) > 2020 )){
			$(yop).val('');
			alert('Invalid Value');
		}
		
}

$(function() {
    $("#FormID").validate({
        rules: {
            'record_year': {
                required: true
            },
            'document_subtype_id': {
                required: true
            },
            'constituency_no': {
                required: true,
                minlength: 1,
                maxlength: 30
            },

            'constituency_name': {
                required: true
            },
            'district_name': {
                required: true
            },

            'taluk_name': {
                required: true
            },

            'village_name': {
                required: true
            },

            'keyword_tag': {
                required: true,
                minlength: 1,
                maxlength: 250
            }
        },

        messages: {
            'record_year': {
                required: "Enter Record Year"
            },
            'document_subtype_id': {
                required: "Select Record Type"
            },
            'constituency_no': {
                required: "Enter Constituency No"
            },

            'constituency_name': {
                required: "Enter Constituency Name"
            },
            'district_name': {
                required: "Enter District Name"
            },

            'taluk_name': {
                required: "Enter Taluk Name"
            },

            'village_name': {
                required: "Enter Village Name"
            },

            'keyword_tag': {
                required: "Enter Keywords / Tags"
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