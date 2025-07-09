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
    <?php echo $this->Form->create($OldRecords, ['id' => 'FormID', 'class' => 'form-horizontal col s12 m12', "autocomplete" => "off", 'enctype' => 'multipart/form-data']); ?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-11">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">Edit Go Record</div>
                        </div>
                        <div class="panel-body pan">
                            <div class="form-body pal">
                                <fieldset style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                    <legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Go Record
                                        </b></legend>
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Document Type

                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('document_subtype_id', ['class' => 'form-control', 'label' => false, 'error' => false, 'empty' => 'Select Document Type', 'options' => $DocumentSubtypes,'value'=>$OldRecords["document_subtype_id"]]); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Year
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('year', ['class' => 'form-control', 'label' => false, 'error' => false,'type'=>'text','value'=>$OldRecords["year"]]); ?>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
										 <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">GO No
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('go_no', ['class' => 'form-control', 'label' => false,'type'=>'text','error' => false,'value'=>$OldRecords["go_no"]]); ?>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Title

                                                   </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('title', ['class' => 'form-control', 'label' => false,'type'=>'textarea', 'error' => false,'value'=>$OldRecords["title"]]); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Keywords
                                                    No
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('keywords', ['class' => 'form-control ', 'label' => false, 'error' => false,'type'=>'textarea',  'required' => false, 'maxlength' => '30', 'minlength' => '2', 'placeholder' => 'Enter Keywords','value'=>$OldRecords["keywords"]]); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									      <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Upload
                                                    Go Record<br>
                                                    Enclosure <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('filepath', ['class' => 'form-control document_path resumeUpload', 'type' => 'file', 'required' => false, 'label' => false, 'error' => false]); ?>
														 <?php echo $this->Form->control('filepath_1', ['type' => 'hidden', 'label' => false, 'error' => false, 'required' => false, 'value' => $OldRecords->filepath]); ?>
		                                                   <?php echo $this->Form->control('filename_1', ['type' => 'hidden', 'label' => false, 'error' => false, 'required' => false, 'value' => $OldRecords->filename]); ?>
                   
                                                        <?php if ($OldRecords->filepath) { ?>
                                                            <a target="_blank"
                                                                href="<?php echo $this->Url->build('/', true) ?>uploads/e-Governance/<?php echo $OldRecords->filepath; ?><?php echo $OldRecords->filename; ?>" style="color:#1ECBE4;"><i
                                                                    class="fas fa-file-pdf"></i>&nbsp;View
                                                                Enclosure</a>

                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                          
                                </fieldset>
                                <div class="col-lg-7">
                                    <div class="form-actions text-right none-bg">
                                        <div class="col-md-offset-3 col-md-9">
											<input type="hidden"  name="document_type_id" id="document_type_id" value="4">
                                            <button type="submit" class="btn btn-secondary">Update</button>
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
    <?php echo $this->Form->End(); ?>
</div>
<style>
    .disp {
        display: none;
    }
</style>
<script>
    $(function() {
        $("#FormID").validate({
            rules: {
                'document_subtype_id': {
                    required: true
                },
				'go_no': {
                    required: true
                },
                'title': {
                    required: true
                },
                'keywords': {
                    required: true,
                    minlength: 1,
                    maxlength: 250
                },
                'filepath': {
                    required: function () {
                    // Only require if empty
                    return $('#filepath_1').val().trim() === '';
                },
                    accept: "application/pdf"
                }
            },

            messages: {
                'document_subtype_id': {
                    required: "Select Document Sub Type"
                },
                 'go_no': {
                    required: "Enter the  GO NO"
                },
                'title': {
                    required: "Enter the Title"
                },
                'keywords': {
                    required: "Enter Keywords",
                    minlength: 'Add More Keywords',
                    maxlength: 'Maximum 250 character Length'
                },
                'file_path': {
                    required: "Upload GO Document",
                accept: "Only PDF files are allowed"
                }
            },
            submitHandler: function(form) {
                form.submit();
                $(".btn").prop('disabled', true);
            }
        });
    });


    function validdocs(oInput) {
        var _validFileExtensions = [".pdf"];
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
                    alert(_validFileExtensions.join(", ") + " File Formats only Allowed");
                    //alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    oInput.value = "";
                    return false;
                }
            }
            var file_size = oInput.files[0].size;
            if (file_size >= 1073741824) {
                alert("File Maximum size is 1GB");
                oInput.value = "";
                return false;
            }

        }
        return true;
    }




</script>
