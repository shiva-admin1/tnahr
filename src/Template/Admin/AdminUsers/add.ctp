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

.alert-danger {
    background-color: white;
    border-color: white;
}

.dept {
  background-color: #e8f1f8;
  width : 210px; 
  height : 100px; 
  border: 1px solid grey;
  padding: 10px;
  margin: 15px;
  margin-top :0px;
  margin-bottom :0px;
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
                            <div class="caption">Add Admin User</div>
                        </div>

                        <div class="panel-body pan">
                            <div class="form-body pal">
                                <fieldset style="width:95%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                    <legend style="font-size:18px;margin-left:10px;color:#00355F;"><b>Admin User Details
                                        </b></legend>

                                    <div class="col-sm-6">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Role <span
                                                        class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('role_id',['class'=>'form-control','label'=>false,'error'=>false,'empty'=>'Select Role']);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 section_ass" style="display:none;">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Department Sections
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('department_section_id',['class'=>'form-control','label'=>false,'error'=>false,'empty'=>'Select Department Section','options'=>$departmentSections]);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Username
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('username',['class'=>'form-control name','label'=>false,'error'=>false,'placeholder'=>'Username','onblur'=>'uniquefieldvalidation("username",this.value)']);?>
                                                        <span class="alert-danger username"> </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Name <span
                                                        class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('name',['class'=>'form-control name','label'=>false,'error'=>false,'placeholder'=>'Fullname']);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Password
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('password',['class'=>'form-control','type'=>'password','label'=>false,'error'=>false,'minlength'=>'8','placeholder'=>'Password']);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Mobile
                                                    Number <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('mobile_no',['class'=>'form-control num','label'=>false,'error'=>false,'minlength'=>'10','maxlength'=>'10','placeholder'=>'Mobile Number','onblur'=>'uniquefieldvalidation("mobile_no",this.value)']);?>
                                                        <span class="alert-danger mobile_no"> </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Email
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('email',['class'=>'form-control','label'=>false,'error'=>false,'placeholder'=>'Email','onblur'=>'uniquefieldvalidation("email",this.value)']);?>
                                                        <span class='alert-danger email'>

                                                        </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 section_ass" style="display:none;">
											 <div class="form-group">
												<label for="inputContent" class="col-md-4 control-label bold">Report Types
												<span class="require"></span></label>
												<div class="col-md-6 dept">
												  
												</div>											
											</div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Address
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('address',['class'=>'form-control','type'=>'textarea','label'=>false,'error'=>false,'placeholder'=>'Residential Address','rows'=>3,'style'=>'resize: vertical;']);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">District
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('district_id',['class'=>'form-control','label'=>false,'error'=>true,'empty'=>'Select District','options' => $districts]);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Taluk
                                                    <span class="require">&nbsp;*</span></label>
                                                <div class="col-md-6">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('taluk_id',['class'=>'form-control','label'=>false,'error'=>false,'empty'=>'Select Taluk','options' =>'']);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="col-lg-7">
                                    <div class="form-actions text-right none-bg">
                                        <div class="col-md-offset-4 col-md-7">
                                            <button type="submit" class="btn btn-secondary">Submit</button>&nbsp;&nbsp;
                                             <button type="reset" class="btn btn-warning" >Reset</button>
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
            },

            'department_section_id': {
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
            },

            'department_section_id': {
                required: "Select Department Section!"
            }
        },
        submitHandler: function(form) {
            form.submit();
            $(".btn").prop('disabled', true);
        }
    });
});


function uniquefieldvalidation(paramfiled, paramvalue) {

    $.ajax({
        async: true,
        dataType: "html",
        type: "get",
        url: "<?php echo $this->Url->build('/', true)?>admin/AdminUsers/uniquefieldvalidation/" + paramfiled +
            "/" +
            paramvalue + "/",
        success: function(data, textStatus) {
            if (data != "Success") {

                $('span.' + paramfiled).html(data);
                alert(data);
                $('#' + paramfiled).val('');
                return false;


            } else {
                $('span.' + paramfiled).html('');
            }

        }
    });
}

function validate_mobile_number(mobile) {
    var pattern = /^\d{10}$/;

    $("#UserMobileNo").parent().removeClass('state-error');
    $("#UserMobileNo").parent().parent().find("em").remove();
    if ((mobile < 7000000000) || (mobile > 9999999999) || (mobile.length < 10) || (!pattern
            .test(mobile))) {
        $("#UserMobileNo").parent().removeClass("state-success").addClass('state-error');
        $("#UserMobileNo").parent().parent().append(
            '<em for="#UserMobileNo" class="invalid">Enter valid mobile number</em>'
        );
        return false;
    } else {
        console.log('valid');
        $("#UserMobileNo").parent().removeClass('state-error').addClass("state-success");
        $("#UserMobileNo").parent().parent().find("em").remove();
        return true;
    }
}

$('#district-id').change(function() {
	 var district_id    = $('#district-id').val();	 
	 if(district_id != ''){
		$.ajax({
			async: true,
			dataType: "html",
			url: "<?php echo $this->Url->build('/', true)?>admin/admin_users/ajaxgettaluk/" + district_id,
			method: 'get',
			success: function(data, textStatus) { //alert();
				$('#taluk-id').html(data);
			}
		});
     }
});


$('#role-id').change(function() {
	 var role    = $('#role-id').val();	 
	 if(role == 5 || role ==9){
		$('.section_ass').show();
     }else{
		$('#department-section-id').val(''); 
		$('.dept').html('');
		$('.section_ass').hide(); 		 
	 }
});


$('#department-section-id').change(function() { 
	 var dept_sec   = $('#department-section-id').val();	 
	 if(dept_sec != ''){
		$.ajax({
			async: true,
			dataType: "html",
			url: "<?php echo $this->Url->build('/', true)?>admin/admin_users/ajaxgetdoctypes/" + dept_sec,
			method: 'get',
			success: function(data, textStatus) { //alert();
				$('.dept').html(data);
			}
		});		
	 }else{	   
		$('.dept').html('');		
	 }    
});
</script>