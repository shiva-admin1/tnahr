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
    <?php echo $this->Form->create($ifrRecord, ['id' => 'FormID', 'class' => 'form-horizontal col s12 m12', "autocomplete" => "off", 'enctype' => 'multipart/form-data']); ?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-11">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">Add IFR Record</div>
                        </div>
                        <div class="panel-body pan">
                            <div class="form-body pal">
                                <fieldset style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                    <legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>IFR Record
                                        </b></legend>
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">District

                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('district_id', ['class' => 'form-control', 'label' => false, 'error' => false, 'empty' => 'Select District', 'options' => $districts, 'onchange' => 'loadtaluk(this.value)']); ?>
                                                    </div>
                                                    <?php if (isset($errors['district_id'])): ?>
                                                        <div class="error-message">
                                                            <?php echo $errors['district_id']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Taluk
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('taluk_id', ['class' => 'form-control', 'label' => false, 'error' => false, 'empty' => 'Select Taluk', 'onchange' => 'loadvillage(this.value)']); ?>
                                                    </div>
                                                    <?php if (isset($errors['taluk_id'])): ?>
                                                        <div class="error-message">
                                                            <?php echo $errors['taluk_id']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Village

                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('village_id', ['class' => 'form-control', 'label' => false, 'error' => false, 'empty' => 'Select Village', 'onchange' => 'villagecheck(this.value)']); ?>
                                                    </div>
                                                    <?php if (isset($errors['village_id'])): ?>
                                                        <div class="error-message">
                                                            <?php echo $errors['village_id']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Village
                                                    No
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('village_no', ['class' => 'form-control ', 'label' => false, 'error' => false, 'required' => false, 'maxlength' => '30', 'minlength' => '2', 'placeholder' => 'Enter Village No']); ?>
                                                    </div>
                                                    <?php if (isset($errors['village_no'])): ?>
                                                        <div class="error-message">
                                                            <?php echo $errors['village_no']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Title Deed
                                                    No
                                                    <span class="require">&nbsp;</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('title_deed_no', ['class' => 'form-control ', 'label' => false, 'error' => false, 'required' => false, 'maxlength' => '30', 'minlength' => '2', 'placeholder' => 'Enter Title Deed No']); ?>
                                                    </div>
                                                    <?php if (isset($errors['title_deed_no'])): ?>
                                                        <div class="error-message">
                                                            <?php echo $errors['title_deed_no']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Sheet
                                                    No
                                                    <span class="require">&nbsp;</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('sheet_no', ['class' => 'form-control ', 'label' => false, 'error' => false, 'required' => false, 'maxlength' => '70', 'minlength' => '1', 'placeholder' => 'Enter Sheet No']); ?>
                                                    </div>
                                                    <?php if (isset($errors['sheet_no'])): ?>
                                                        <div class="error-message">
                                                            <?php echo $errors['sheet_no']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Keywords
                                                    /<br>
                                                    Tags <span class="require">&nbsp;</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('keyword_tag', ['class' => 'form-control alphanumericandcomma', 'label' => false, 'required' => false, 'error' => false, 'maxlength' => '250', 'minlength' => '1', 'rows' => 2, 'placeholder' => 'Enter Keywords/Tags']); ?>
                                                    </div>
                                                    <?php if (isset($errors['keyword_tag'])): ?>
                                                        <div class="error-message">
                                                            <?php echo $errors['keyword_tag']['_empty']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Upload
                                                    IFR<br>
                                                    Enclosure <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('file_path', ['class' => 'form-control document_path resumeUpload', 'type' => 'file', 'required' => false, 'label' => false, 'error' => false]); ?>
                                                        <small class="danger" style="color: tomato;"> Only PDF File
                                                            allowed.
                                                        </small>
                                                        <?php if (isset($errors['file_path']['_empty'])): ?>
                                                            <div class="error-message">
                                                                <?php echo $errors['file_path']['_empty']; ?></div>
                                                        <?php endif; ?>
                                                        <?php if (isset($errors['file_path']['custom'])): ?>
                                                            <div class="error-message">
                                                                <?php echo $errors['file_path']['custom']; ?></div>
                                                        <?php endif; ?>
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
                'district_id': {
                    required: true
                },

                'taluk_id': {
                    required: true
                },
                'village_id': {
                    required: true
                },

                'village_no': {
                    required: true
                },
                'title_deed_no': {
                    required: true
                },
                'sheet_no': {
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
                // 'village_id': {
                //     required: true
                // }
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
                'village_no': {
                    required: "Enter Village No"
                },
                'title_deed_no': {
                    required: "Enter Title Deed No"
                },
                'sheet_no': {
                    required: "Enter Sheet No"
                },

                'keyword_tag': {
                    required: "Enter Keywords / Tags",
                    minlength: 'Add More Keywords',
                    maxlength: 'Maximum 250 character Length'
                },
                'document_path[]': {
                    required: "Upload GO Document"
                }
                // 'village_id': {
                //     required: "Enter Sheet No"
                // }
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
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() ==
                        sCurExtension.toLowerCase()) {
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

    function loadtaluk(dist_id) {
        $('#village-id').val('');
        var dist_id;
        // alert(dist_id);

        $.ajax({
            async: true,
            dataType: "html",
            url: "<?php echo $this->Url->build('/', true) ?>admin/ifr_records/ajaxoptionifrtaluk/" + dist_id,
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
            },
            success: function(data, textStatus) {
                // alert(data);
                $('#taluk-id').html(data);
            }
        });


    }



    function loadvillage(taluk_id) {
        var taluk_id;
        var district_id = $('#district-id').val();
        // alert(district_id);
        // alert(taluk_id);
        $.ajax({
            async: true,
            dataType: "html",
            url: "<?php echo $this->Url->build('/', true) ?>admin/ifr_records/ajaxoptionifrvillages/" + district_id + '/' + taluk_id,
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
            },
            success: function(data, textStatus) {
                $('#village-id').html(data);
            }
        });


    }

    function villagecheck(val) {

        var district_id = $('#district-id').val();
        var taluk_id = $('#taluk-id').val();
        // alert(val);
        $.ajax({

            async: true,
            dataType: "html",

            url: '<?php echo $this->Url->webroot; ?>ajaxcalling/' + district_id + '/' + taluk_id + '/' + val,


            success: function(data, textStatus) {
                // alert(data);
                if (data == 1) {

                    alert('Village name Already inserted!Try another village!!')
                    // $("#district-id").val('').trigger('change');
                    // $("#taluk-id").val('').trigger('change');
                    $("#village-id").val('').trigger('change');

                }
                //alert(data);
            }


        });
    }
</script>