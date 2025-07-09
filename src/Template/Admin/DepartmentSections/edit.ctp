<style>
.bold {
    font-weight: bold;
}
</style>
<div class="row" oncontextmenu="return false;">
    <?php echo $this->Form->create($departmentSection,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
    <div class="col-lg-10">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">Edit Department Section</div>
                        </div>

                        <div class="panel-body pan">
                            <div class="form-body pal">
                                <fieldset style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                    <legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>
                                             </b></legend>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">Department Section <span
                                                            class="require">*</span></label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo $this->Form->control('name',['class'=>'form-control alphanumeric','label'=>false,'error'=>false,'maximum'=>255,'placeholder'=>'Department Section Name']);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="col-lg-12">
                                     <div class="form-actions text-right none-bg">
                                     <div class="col-md-offset-2 col-md-6">
                                        <button type="submit" class="btn btn-secondary">Save</button>                                      
                                        <button type="reset" class="btn btn-danger">Reset</button>       
												
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
            'name': {
                required: true
            }
        },

        messages: {
            'name': {
                required: "Enter Department Section"
            }
        },
        submitHandler: function(form) {
            form.submit();
            $(".btn").prop('disabled', true);
        }
    });
});
</script>