<style>
.bold {
    font-weight: bold;
}
</style>
<div class="row" oncontextmenu="return false;">
    <?php echo $this->Form->create($departmentSection,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-11">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">Edit Department Section and Record Type Mapping</div>
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
                                                    <div class="col-md-5">
                                                        <div class="input text">
                                                              <?php echo $departmentname; ?>
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>
										 <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputContent"
													class="col-md-4 control-label bold">Record Types<span
														class="require">  *</span></label>
                                                    <div class="col-md-5" style="margin-left:20px;">
                                                        <div class="input text">
														   <?php $i=1; foreach($doc_types as $doc_type){  ?>
                                                          	<input type="checkbox" id="doc_type_<?php echo $doc_type['id'];?>" name="document_type_id[]" value="<?php echo $doc_type['id']; ?>">
																		<label for="doc<?php echo $doc_type['id'];?>"><?php echo "&nbsp;".$doc_type['name'];  ?></label><br>
										                    <?php $i++; }  ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="col-lg-12">
                                     <div class="form-actions text-right none-bg">
                                     <div class="col-md-offset-2 col-md-5">
                                        <button type="submit" class="btn btn-secondary">Submit</button>                                      
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
            'department_section_id'   : {
                required              : true
            }
        },

        messages: {
            'department_section_id'   : {
                required              : "Select Department Section"
            }
        },
        submitHandler: function(form) {
            if($('input[type=checkbox]:checked').length == 0)
			{
				alert ( "ERROR! Please select at least one checkbox" );
				return false;
			}else{			
			form.submit();
            $(".btn").prop('disabled', true);
			}
        }
    });
});

<?php foreach($Predoc_types as $pdoc_type){   ?>
var id = <?php echo $pdoc_type['id'];  ?>;

$('#doc_type_'+id).prop("checked", true);

<?php } ?>

</script>