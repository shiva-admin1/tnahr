<style>
.login_page_wrapper {
    width: 80%;
}

.bold {
    font-weight: bold;
}

.black {
    color: #000000;
}

.green {
    color: green;
}

.red {
    color: red;
}

.md-btn {
    font: 500 13px/30px Roboto, sans-serif !important;
}

.control-label {
    font-weight: bold;
}

.backtxt a {
    margin-top: 10px;
    color: blue;
}
</style>

<div class="row" oncontextmenu="return false;">
    <?php echo $this->Form->create('User',['class'=>'form-horizontal', 'id'=>'ChangePasswordForm','novalidate'=>'novalidate']); ?>
    <!-- <?php echo $this->Form->create($user,['id'=>'FormID','class'=>'form-horizontal col s12 m12','id'=>'ChangePasswordForm','novalidate'=>'novalidate', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?> -->
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-7">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">Change Password</div>
                        </div>
                        <div class="panel-body pan">
                            <div class="form-body pal">

                                <fieldset style="width:98%;margin-left:1%;border:1px solid #00355F;border-radius:10px;">
                                    <legend style="font-size:18px;margin-left:10px;color:#00355F;">
                                        <b><?php echo $LOGGEDNAME;?>
                                        </b>
                                    </legend>

                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-4 control-label bold">Old
                                                    Password</label>
                                                <div class="col-md-4">
                                                    <div class="input text">
                                                        <?php echo $this->Form->input('password',['class'=>'form-control show-pass1','label'=>false,'error' => false,'value'=>"",'placeholder'=>'Old Password','type'=>'password','maxlength'=>15,'value'=>($password!="")?$password:'']);?>
                                                    </div>
                                                </div>
                                                 <div class="col-md-4">
                                                    <button type="button" class="btn btn-success btn-sm " align="left" onclick="sendpassword()">Verify Password</button>
                                                </div>
                                                    
                                            </div>

                                            <div class="form-group" id="Newpassword" style="display:none">
                                                <label for="inputContent" class="col-md-5 control-label bold">New
                                                    Password<span class="require">* </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="input text">
                                                        <?php echo $this->Form->input('newpassword',['class'=>'form-control show-pass2','label'=>false,'placeholder'=>'New Password','error' => false,'type'=>'password','maxlength'=>15]);?>
                                                    </div>
                                                      <?php if (isset($errors['newpassword']['custom'])): ?>
                                                        <div class="error-message"><?php echo $errors['newpassword']['custom']; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="form-group" id="Confirmpassword" style="display:none">
                                                <label for="mobile_no" class="col-md-5 control-label bold">Confirm
                                                    Password <span class="require">* </span></label>
                                                <div class="col-md-5">
                                                    <div class="input text">
                                                        <?php echo $this->Form->input('confirmpassword',['class'=>'form-control show-pass3','label'=>false,'placeholder'=>'Confirm Password','error' => false,'type'=>'password','maxlength'=>15]);?>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </fieldset>
                                <div class="col-lg-7" id="submit" style="display: none">
                                    <div class="form-actions text-right none-bg">
                                        <div class="col-md-offset-4 col-md-9">
                                            <button type="submit" class="btn btn-green">Save</button>
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
var pass=<?php echo ($password!="")?"'$password'":"''"; ?>;
if(pass!=""){
    $('#Newpassword').css('display', 'block');
    $('#Confirmpassword').css('display','block');
       $('#submit').css('display', 'block')
}
// Convert Password Field To Text On Hover.
var passField1 = $('input[type=password]');
$('.show-pass1').hover(function() {
    passField1.attr('type', 'text');
}, function() {
    passField1.attr('type', 'password');
})
var passField2 = $('input[type=password]');
$('.show-pass2').hover(function() {
    passField2.attr('type', 'text');
}, function() {
    passField2.attr('type', 'password');
})
var passField3 = $('input[type=password]');
$('.show-pass3').hover(function() {
    passField3.attr('type', 'text');
}, function() {
    passField3.attr('type', 'password');
})

$(function() {
    $.validator.addMethod("atLeastOneLowercaseLetter", function(value, element) {
        return this.optional(element) || /[a-z]+/.test(value);
    }, "<br />Must have at least one lowercase letter");

    $.validator.addMethod("atLeastOneUppercaseLetter", function(value, element) {
        return this.optional(element) || /[A-Z]+/.test(value);
    }, "<br />Must have at least one uppercase letter");


    $.validator.addMethod("atLeastOneNumber", function(value, element) {
        return this.optional(element) || /[0-9]+/.test(value);
    }, "<br />Must have at least one number");


    $.validator.addMethod("atLeastOneSymbol", function(value, element) {
        return this.optional(element) || /[!@#$%^&*()_]+/.test(value);
    }, "<br />Must have at least one special character");
    $("#ChangePasswordForm").validate({
        rules: {
            'password': {
                required: true,
                minlength: 8,
                maxlength: 15
            },
            'newpassword': {
                required: true,
                atLeastOneLowercaseLetter: true,
                atLeastOneUppercaseLetter: true,
                atLeastOneNumber: true,
                atLeastOneSymbol: true,
                minlength: 8,
                maxlength: 15
            },
            'confirmpassword': {
                required: true,
                minlength: 8,
                maxlength: 15,
                equalTo: '#newpassword'
            }
        },
        messages: {
            'password': {
                required: "Enter Password",
                minlength: "Password must be at least 8 characters long",
                maxlength: "Password maximum of 15 characters long"
            },
            'newpassword': {
                required: "Enter New Password",
                minlength: "New Password must be at least 8 characters long",
                maxlength: "New Password maximum of 15 characters long"
            },
            'confirmpassword': {
                required: "Enter Confirm Password",
                minlength: "Confirm Password must be at least 8 characters long",
                maxlength: "Confirm Password maximum of 15 characters long",
                equalTo: 'Password does not match'
            }

        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});
function sendpassword() {
    var password = $("#password").val();

    // Get the CSRF token from the hidden input field
    var csrfToken = $("input[name='_csrfToken']").val();

    $.ajax({
        async: true,
        dataType: "html",
        type: "post",
        url: "<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'verifypassword']) ?>",
        data: {
            password: password
        },
        // Include the CSRF token in the request headers
        headers: {
            'X-CSRF-Token': csrfToken
        },
        success: function(response, textStatus) {
            if (response == 'success') {
                alert("Password Verified")
                $('#Oldpassword').css('display', 'none')
                $('#Oldpassword').hide();
                $('#Newpassword').css('display', 'block')
                $('#Confirmpassword').css('display', 'block')
                $('#submit').css('display', 'block')
            } else {
                alert('Wrong Password');
            }
        }
    });
    return false;
}

</script>