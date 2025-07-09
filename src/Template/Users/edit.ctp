<style>
.bold {
    font-weight: bold;
}

.btn-group-xs>.btn,
.btn-xs {
    padding: .60rem .4rem;
    font-size: .900rem;
    line-height: .5;
    border-radius: .2rem;
}
</style>
<div class="row" oncontextmenu="return false;">
    <?php echo $this->Form->create($user,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-11">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">Edit Profile</div>
                        </div>
                        <div class="panel-body pan">
                            <div class="form-body pal">

                                <fieldset style="width:98%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                    <legend style="font-size:18px;margin-left:10px;color:#00355F;">
                                        <b><?php echo $LOGGEDNAME;?>
                                        </b>
                                    </legend>
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent"
                                                    class="col-md-4 control-label bold">Name <span class="require">&nbsp;*</span> </label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('name',['class'=>'form-control name','label'=>false,'error'=>false]);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent"
                                                    class="col-md-4 control-label bold">Father/Spouse
                                                    Name <span class="require">&nbsp;*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('father_name',['class'=>'form-control','label'=>false,'error'=>false]);?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Address <span class="require">&nbsp;*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('address',['class'=>'form-control','label'=>false,'error'=>false,'rows'=>'2']);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">District <span class="require">&nbsp;*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('district_id',['class'=>'form-control','label'=>false,'error'=>false,'value'=>$user->district_id]);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Taluk <span class="require">&nbsp;*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('taluk_id',['class'=>'form-control','label'=>false,'error'=>false,'value'=>$user->taluk_id]);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Pincode <span class="require">&nbsp;*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('pincode',['class'=>'form-control','label'=>false,'error'=>false,'minlength'=>'1','maxlength'=>'6']);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-actions text-right none-bg">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-green">Save</button>
                                        <button type="button" class="btn btn-red"
                                            onclick="javascript:history.back()">Cancel</button>
                                        <button type="button" class="btn btn-yellow" id="res"
                                            onclick="javascript:location.reload();">Reset</button>
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
$(function() {
    $("#FormID").validate({
        rules: {
            'name': {
                required: true
            },
            'father_name': {
                required: true
            },
            'address': {
                required: true
            },
			'district_id': {
                required: true
            },
            'taluk_id': {
                required: true
            },
            'pincode': {
                required: true,
                minlength: 6,
                maxlength: 6
            }
        },

        messages: {
            'name': {
                required: "Enter Name"
            },
            'father_name': {
                required: "Enter Father/Spouse Name"
            },
            'address': {
                required: "Enter Address"
            },
            'district_id': {
                required: "Select District"
            },
            'taluk_id': {
                required: "Select Taluk"
            },
            'pincode': {
                required: "Enter Pincode",
                minlength: "Enter only 6 digits",
                maxlength: "Enter only 6 digits"
            }
        },
        submitHandler: function(form) {
            form.submit();
            $(".btn").prop('disabled', true);
        }
    });
});
</script>