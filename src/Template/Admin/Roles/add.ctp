<style>
.bold {
    font-weight: bold;
}
</style>
<div class="row" oncontextmenu="return false;">
    <?php echo $this->Form->create($role,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">Add Role</div>
                        </div>

                        <div class="panel-body pan">
                            <div class="form-body pal">
                                <fieldset style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                    <legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Enter Role Details
                                        </b></legend>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputContent" class="col-md-4 control-label bold">Role &nbsp;
                                                <span class="require">*</span></label>
                                            <div class="col-md-7">
                                                <div class="input text">
                                                    <?php echo $this->Form->control('name',['class'=>'form-control','label'=>false,'error'=>false,'placeholder'=>'Role Name']);?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-actions text-right none-bg">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-green">Submit</button>
                                        <button type="button" class="btn btn-red"
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
    <?php echo $this->Form->End();?>
</div>

<script>
$(function() {
    $("#FormID").validate({
        rules: {
            'name': {
                required: true
            }
        },

        messages: {
            'name': {
                required: "Enter Role Name"
            }
        },
        submitHandler: function(form) {
            form.submit();
            $(".btn").prop('disabled', true);
        }
    });
});
</script>