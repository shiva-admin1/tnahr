<style>
    .bold {
        font-weight: bold;
    }
</style>
<!-- Start Drag and Drop File Upload-->

<?php echo $this->Html->css('admin/dragupload'); ?>
<?php echo $this->Html->script('admin/filereader'); ?>
<?php echo $this->Html->script('admin/script'); ?>

<!-- End Drag and Drop File Upload-->
<div class="row" oncontextmenu="return false;">
    <?php echo $this->Form->create($osrRecords, ['id' => 'FormID', 'class' => 'form-horizontal col s12 m12', "autocomplete" => "off", 'enctype' => 'multipart/form-data']); ?>
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

                                <fieldset style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                    <legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Record Details
                                        </b></legend>
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">District
                                                    <span class="require">*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('district_id', ['class' => 'form-control', 'label' => false, 'error' => false, 'empty' => 'Select District', 'options' => $districts, 'onchange' => 'loadtaluk(this.value)']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Taluk
                                                    <span class="require">*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('taluk_id', ['class' => 'form-control', 'label' => false, 'error' => false, 'empty' => 'Select Taluk', 'options' => ($taluks) ? $taluks : '', 'onchange' => 'loadvillage(this.value)']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Village
                                                    <span class="require">*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('village_id', ['class' => 'form-control', 'label' => false, 'error' => false, 'empty' => 'Select Village', 'options' => $villages, 'onchange' => 'villagecheck(this.value)']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Village No
                                                    <span class="require">*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('village_no', ['class' => 'form-control num', 'label' => false, 'error' => false, 'maxlength' => '250', 'minlength' => '1', 'placeholder' => 'Village Number']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Keywords /
                                                    Tags<span class="require">*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('keyword_tag', ['class' => 'form-control ', 'label' => false, 'error' => false, 'rows' => '2', 'minlength' => '1', 'placeholder' => 'Enter Tags seperated by comma eg: osr,tiruppur', 'value' => '']); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Upload
                                                    OSR<br>
                                                    Enclosure <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('file_path', ['class' => 'form-control document_path resumeUpload', 'type' => 'file', 'required' => false, 'label' => false, 'error' => false]); ?>
                                                        <small class="danger" style="font-size:15px;color: tomato;">
                                                            Only PDF File
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
                                    <!--div class="col-md-12">									
										<div class="col-md-4">
											<div class="form-group">
												<label for="inputContent" class="col-md-3 control-label bold">Record Type <span class="require">*</span></label>
												<div class="col-md-8">
													<div class="input text">
														<?php echo $this->Form->control('type', ['class' => 'form-control', 'label' => false, 'error' => false, 'options' => [1 => 'Image', 2 => 'PDF'], 'empty' => '-Select-', 'onchange' => 'loaddocument(this.value)']); ?>
													</div>
												</div>
											</div>
										</div>
										
									</div-->
                                    <!-- <div class="col-md-12 pdf" style="display:none;">
										<div class="col-md-4">
											<div class="form-group">
												<label for="inputContent" class="col-md-3 control-label bold"> PDF
													Filepath<span class="require">*</span></label>
												<div class="col-md-8">
													<div class="input text">
														<?php echo $this->Form->control('file_path', ['class' => 'form-control document_path resumeUpload', 'type' => 'file', 'label' => false, 'error' => false, 'required' => true, 'onchange' => 'validdocs(this)']); ?>
														<small class="danger" style="color: tomato;font-size:13px;">
															Only PDF File allowed.
														</small>
													</div>
												</div>
											</div>
										</div>
									</div> -->


                                </fieldset>
                                <div class="col-log-12 form-actions text-center  none-bg">
                                    <div class="form-group">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button name="save_only" type="submit" val="1"
                                                class="btn btn-secondary">Save</button>
                                            <button type="submit" class="btn btn-danger"
                                                onclick="javascript:history.back()">Cancel</button>
                                            <button type="reset" class="btn btn-warning">Reset</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- <fieldset style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
									<legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Record Image </b>
									</legend>
									<div class="col-md-12">
										<p style="color:red;font-weight:bold;text-align:center;" class="blink_me">
											<blink>Note: Please enter Record Details before start draging Images. Only
												.jpeg/.png supports. </blink>
										</p>
										<div id="dropbox">
											<div class="text">
												Drop Images Here
											</div>
										</div>
									</div>
								</fieldset> -->

                            </div>
                        </div>
                    </div><br><br>
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
                'from_survey_no': {
                    required: true,
                    minlength: 1,
                    maxlength: 10
                },

                'to_survey_no': {
                    required: true,
                    minlength: 1,
                    maxlength: 10
                },
                'village_id': {
                    required: true

                },

                'district_id': {
                    required: true

                },
                'taluk_id': {
                    required: true

                },

                'keyword_tag': {
                    required: true,
                    minlength: 2,
                    maxlength: 150
                },
                'page_no': {
                    required: true,
                    minlength: 1,
                    maxlength: 9
                }
            },

            messages: {
                'from_survey_no': {
                    required: "Enter From Survey NO",
                    minlength: 'Enter Valid GO NO',
                    maxlength: 'Enter Valid GO NO'
                },
                'to_survey_no': {
                    required: "Enter TO Survey NO",
                    minlength: 'Enter Valid GO NO',
                    maxlength: 'Enter Valid GO NO'
                },
                'district_id': {
                    required: "Select District"

                },
                'taluk_id': {
                    required: "Select Taluk"

                },
                'village_id': {
                    required: "Select Village"

                },
                'page_no': {
                    required: "Enter Page NO",
                    minlength: 'Enter Valid Page NO',
                    maxlength: 'Enter Valid Page NO'
                },
                'keyword_tag': {
                    required: "Enter  Keywords/ Tags",
                    minlength: 'Add More Keywords',
                    maxlength: 'Maximum 150 character Length'
                }
            },
            submitHandler: function(form) {
                form.submit();
                $(".btn").prop('disabled', true);
            }
        });
    });


    function loaddocument(id) {
        var id;
        if (id == 1) {
            $('.pdf').hide();
            $('.image').show();
        } else if (id == 2) {
            $('.image').hide();
            $('.pdf').show();
        }
    }


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
            if (file_size >= 209715200) {
                alert("File Maximum size is 200MB");
                oInput.value = "";
                return false;
            }

        }
        return true;
    }
    $('body').addClass('sidebar-collapsed');


    function loadtaluk(dist_id) {
        $('#village-id').val('');
        var dist_id;
        // alert(dist_id);

        $.ajax({
            async: true,
            dataType: "html",
            url: "<?php echo $this->Url->build('/', true) ?>admin/osr_records/ajaxtalukoption/" + dist_id,
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
            url: "<?php echo $this->Url->build('/', true) ?>admin/osr_records/ajaxoptionvillages/" + district_id + '/' + taluk_id,
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