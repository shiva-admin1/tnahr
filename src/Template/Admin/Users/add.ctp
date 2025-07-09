<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>


<style>
.bold {
    font-weight: bold;
}
</style>
<div class="row" oncontextmenu="return false;">
    <?php echo $this->Form->create($user,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">Add User</div>
                        </div>

                        <div class="panel-body pan">
                            <div class="form-body pal">
                                <fieldset style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                    <legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Enter User Details
                                        </b></legend>

                                    <div class="col-sm-6">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Role <span
                                                        class="require">*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('role_id',['class'=>'form-control','label'=>false,'error'=>false,'empty'=>'Select Role']);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Username
                                                    <span class="require">*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('username',['class'=>'form-control','label'=>false,'error'=>false,'placeholder'=>'Username']);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Name <span
                                                        class="require">*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('name',['class'=>'form-control name','label'=>false,'error'=>false,'placeholder'=>'Fullname']);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Password
                                                    <span class="require">*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('password',['class'=>'form-control','type'=>'password','label'=>false,'error'=>false,'minlength'=>'8','placeholder'=>'Password']);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Mobile
                                                    Number <span class="require">*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('mobile_no',['class'=>'form-control num','label'=>false,'error'=>false,'minlength'=>'10','maxlength'=>'10','placeholder'=>'Mobile Number']);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Email
                                                    <span class="require">*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('email',['class'=>'form-control','label'=>false,'error'=>false,'placeholder'=>'Email']);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Address
                                                    <span class="require">*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('address',['class'=>'form-control name','type'=>'textarea','label'=>false,'error'=>false,'placeholder'=>'Residential Address']);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">District
                                                    <span class="require">*</span></label>
                                                <div class="col-md-7">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('district_id',['class'=>'form-control','label'=>false,'error'=>true,'empty'=>'Select District','options' => $districts]);?>
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
                                                        <?php echo $this->Form->control('taluk_id',['class'=>'form-control','label'=>false,'error'=>false,'empty'=>'Select Taluk','options' => $taluks]);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                                <div class="col-lg-6">
                                    <div class="form-actions text-right none-bg">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn btn-green">Submit</button>&nbsp;&nbsp;
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
    </div>
    <?php echo $this->Form->End();?>
</div>

<script>
$(function() {
    $("#FormID").validate({
        rules: {
            'role_id': {
                required: true
            },

            'username': {
                required: true
            },

            'name': {
                required: true
            },

            'password': {
                required: true
            },

            'mobile_no': {
                required: true
            },

            'email': {
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
            }
        },

        messages: {
            'role_id': {
                required: "Select Role!"
            },

            'username': {
                required: "Enter a Username!"
            },

            'name': {
                required: "Enter a Fullname!"
            },

            'password': {
                required: "Enter a Password!"
            },

            'mobile_no': {
                required: "Enter a Mobile Number!"
            },

            'email': {
                required: "Enter a Email!"
            },

            'address': {
                required: "Enter a Address!"
            },

            'district_id': {
                required: "Select District!"
            },

            'taluk_id': {
                required: "Select Taluk!"
            }
        },
        submitHandler: function(form) {
            form.submit();
            $(".btn").prop('disabled', true);
        }
    });
});
</script>