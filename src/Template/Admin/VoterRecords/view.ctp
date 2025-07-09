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
                <div class="col-lg-12">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">Voter Record (<?php echo($voterRecords->constituency_no) ?>)</div>
                        </div>
                        <div class="panel-body pan">
                            <div class="form-body pal">
                                <fieldset style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                    <legend style="font-size:18px;margin-left:10px;color:#00355F;">
                                        <b>(<?php echo($voterRecords->constituency_no) ?>)
                                        </b>
                                    </legend>
                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Year
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($voterRecords->record_year); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Document Type
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($voterRecords->document_subtype->name); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent"
                                                    class="col-md-5 control-label bold">Constituency No
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($voterRecords->constituency_no); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent"
                                                    class="col-md-5 control-label bold">Constituency
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($voterRecords->constituency_name); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">District
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($voterRecords->district_name); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Taluk
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($voterRecords->taluk_name); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent"
                                                    class="col-md-5 control-label bold">Village
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($voterRecords->village_name); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">Keywords /
                                                    Tags
                                                </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo($voterRecords->keyword_tag); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">
                                                    Voter
                                                    Document </label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <a target="_blank"
                                                            href="<?php echo $this->Url->build('/', true)?><?php echo $voterRecords->file_path; ?>"
                                                            style="color:#1ECBE4;"><i
                                                                class="fas fa-file-pdf"></i>&nbsp;View
                                                            Document</a>
                                                        <?php ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <center>
                        <iframe allowFullScreen="true" frameborder="1" height="445px" width="100%"
                            src="<?php echo $this->Url->build('/', true)?><?php echo $voterRecords['file_path']; ?>"
                            title="View T&C" style="border:none;"></iframe>
                    </center>
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
                minlength: 2,
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
                minlength: 2,
                maxlength: 150
            },
            'document_path[]': {
                required: true
            }
        },

        messages: {
            'record_year': {
                required: "Enter Record Year"
            },
            'document_subtype_id': {
                required: "Select Document Subtype"
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
                required: "Enter Town/Village Name"
            },

            'keyword_tag': {
                required: "Enter Keyword/Tag"
            },
            'document_path[]': {
                required: true
            }
        },
        submitHandler: function(form) {
            form.submit();
            $(".btn").prop('disabled', true);
        }
    });
});
</script>


<?php echo($voterRecords->bp_no); ?>