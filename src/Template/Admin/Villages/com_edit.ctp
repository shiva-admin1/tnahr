<style>
.bold {
    font-weight: bold;
}
</style>
<div class="row" oncontextmenu="return false;">
    <?php echo $this->Form->create($village,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
    <div class="col-lg-10">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">Edit Taluk used in IFR/OSR</div>
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
                                                        class="col-md-4 control-label bold">District <span
                                                            class="require">*</span></label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo $this->Form->control('district_id',['class'=>'form-control','label'=>false,'error'=>false,'options'=>$districts,'empty'=>'-Select District-']);?>
                                                        </div>
                                                    </div>
                                                </div>
												  	 <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">Taluk<span
                                                            class="require">*</span></label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo $this->Form->control('taluk_id',['class'=>'form-control','label'=>false,'error'=>false,'options'=>$taluks,'empty'=>'-Select Taluk-']);?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">Village Name<span
                                                            class="require">*</span></label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo $this->Form->control('name',['class'=>'form-control name','label'=>false,'error'=>false,'maximum'=>250,'type'=>'text','placeholder'=>'Village Name']);?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputContent"
                                                        class="col-md-4 control-label bold">Village No<span
                                                            class="require">*</span></label>
                                                    <div class="col-md-6">
                                                        <div class="input text">
                                                            <?php echo $this->Form->control('village_no',['class'=>'form-control','label'=>false,'error'=>false,'maximum'=>50,'type'=>'text','placeholder'=>'Village No']);?>
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
            'district_id': {
                required: true
            },
             'taluk_id': {
                required: true
            },
			'name': {
                required: true
            },
			'village_no': {
                required: true
            }
        },

        messages: {
            'district_id': {
                required: "Select District"
            },
            'taluk_id': {
                required: "Select Taluk"
            },
			'name': {
                required: "Enter Village Name"
            },
			'village_no': {
                required: "Enter Village No"
            }
        },
        submitHandler: function(form) {
            form.submit();
            $(".btn").prop('disabled', true);
        }
    });
});


   function loadtaluk(dist_id){
	   var dist_id;
	   if (dist_id) {
            $.ajax({
                type: 'POST',
                url: '<?php echo $this->Url->webroot ?>/tnahr/admin/villages/ajaxtaluk/'+dist_id,
                success: function(data, textStatus) {
                     //alert(data);
                    $('#taluk-id').html(data);
                }
            });
        } else {
            $('#taluk_id').html('<option value="">Select Work Type</option>');

        }	
	}



</script>