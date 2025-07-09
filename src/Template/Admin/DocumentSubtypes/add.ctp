<style>
.bold {
    font-weight: bold;
}
</style>
<div class="row" oncontextmenu="return false;">
    <?php echo $this->Form->create($documentSubtype,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
    <div class="col-lg-8">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-10">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">Add Record Subtype</div>
                        </div>
                        <div class="panel-body pan">
                            <div class="form-body pal">
                                <fieldset style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                    <legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Record Subtype
                                        </b>
                                    </legend>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent" class="col-md-4 control-label bold">
                                                        Record Type
                                                        <span class="require">*</span></label>
                                                    <div class="col-md-8">
                                                        <div class="input text">
                                                            <?php echo $this->Form->control('document_type_id',['class'=>'form-control','label'=>false,'error'=>false, 'empty'=>'Select Record Type']);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent" class="col-md-4 control-label bold">
                                                        Record Subtype
                                                        <span class="require">*</span></label>
                                                    <div class="col-md-8">
                                                        <div class="input text">
                                                            <?php echo $this->Form->control('name',['class'=>'form-control name','label'=>false,'error'=>false,'placeholder'=>'Record Type Name']);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent" class="col-md-4 control-label bold"> Code
                                                        <span class="require">*</span></label>
                                                    <div class="col-md-8">
                                                        <div class="input text">
                                                            <?php echo $this->Form->control('code',['class'=>'form-control','label'=>false,'error'=>false,'placeholder'=>'Record Type Code']);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="col-lg-8">
                                    <div class="form-actions text-right none-bg">
                                        <div class="col-md-offset-9 col-md-9">
                                            <button type="submit" class="btn btn-secondary">Submit</button>&nbsp;&nbsp;
                                            <button type="button" class="btn btn-danger"
                                                onclick="javascript:history.back()">Cancel</button>
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

<script>
$(function() {
    $("#FormID").validate({
        rules: {
            'document_type_id': {
                required: true
            },
            'name': {
                required: true
            },

            'code': {
                required: true
            }
        },

        messages: {
            'document_type_id': {
                required: "Select Record Type"
            },
            'name': {
                required: "Enter Record Subtype Name"
            },

            'code': {
                required: "Enter Record Subtype Code"
            }
        },
        submitHandler: function(form) {
            form.submit();
            $(".btn").prop('disabled', true);
        }
    });
});
</script>