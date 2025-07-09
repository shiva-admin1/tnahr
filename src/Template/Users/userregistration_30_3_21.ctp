<style>
.login_page_wrapper {
    width: 80%;
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

.sign-up {
    left: 50%;
    padding-bottom: 5px;
}

.btn-group-xs>.btn,
.btn-xs {
    padding: .40rem .4rem;
    font-size: .875rem;
    line-height: .5;
    border-radius: .2rem;
}

.back-to-login {
    margin-top: -30px;
    padding-bottom: 5px;
}

.control-label {
    font-weight: bold;
}

.backtxt a {
    margin-top: 10px;
    color: blue;
}

li {
    line-height: 2em;
    color: #000;
}

.card-align {
    margin-left: 2.3%;
}
</style>


<div class="row justify-content-center align-items-center bg-red">
    <div class="col-sm-7">
        <div class="col-md-1 logo" style="left: 2%;"><img
                src="<?php echo $this->Url->build('/', true)?>img/TamilNadu_Logo.png" class="img-fluid">
        </div>
        <h1 class="text-white logo col-md-10"><strong style="font-weight: bold;">Archives and Historical
                Research Department</strong><br><small>Chennai</small></h1>

        <div class="overlay"></div>
        <div id="text">

        </div>
    </div>
    <div class="col-sm-4 card m-t-1 card-align">
        <div class="card-body">

            <?php echo $this->Form->create($user,['id'=>'FormID','class'=>'form-horizontal col-md-12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>

            <h4 class="m-t-0 header-title text-center">User Registration</h4>
            <div class="error-msg">
                <center> <?php echo $this->Flash->render() ?>
                </center>
            </div><br><br>

            <div class="row">
                <!--   <div class="col-md-12 m-t-50"> -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="control-label black">Name <span class="require">*
                            </span></label>
                        <input class="form-control lettersOnly" type="text" name="name" placeholder="Name" id="name">
                        <div id="errFirst"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="father_name" class="control-label black">Father/Spouse
                            Name <span class="require">*
                            </span></label>
                        <input class="form-control lettersOnly" type="text" name="father_name"
                            placeholder="Father/Spouse Name" id="father_name">
                        <div id="errFirst"></div>
                    </div>
                </div>
                <div class="col-md-12" style="padding-right: 5px;">
                    <div class="form-group">
                        <label for="email" class="control-label black"> Email <span class="require">*
                            </span></label>
                        <input class="md-input form-control" type="email" placeholder="Email Address" name="email"
                            id="email">
                        <div class="status" id="status"></div>
                        <p id="result"></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phonenumber" class="control-label black">Mobile Number <span class="require">*
                            </span></label>
                        <input type="text" name="mobile_no" id="UserMobileNo" class="md-input form-control numbersonly"
                            maxlength="10" placeholder="Phone">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mobile_no" class="control-label black" style="color:#000000;">Enter
                            Mobile OTP <span class="require">* </span></label>
                        <?php echo $this->Form->input('mobile_otp',['class'=>'form-control numbersonly','id'=>"UserMobileOtp",'required'=>'required','label'=>false,'error' => false,'autocomplete'=>'off','readonly'=>'readonly','placeholder'=>'OTP']);?>
                    </div>
                </div>
                <div class="col-md-6" style="margin-top:4px;">
                    <div class="form-group">
                        <button type="button" class="btn btn-outline-info btn-xs otp_verify">Send
                            OTP</button>&nbsp;
                    </div>
                </div>
                <div class="col-md-6" style="margin-top:4px;">
                    <div class="form-group">
                        <button type="button" class="btn btn-outline-info btn-xs change_mobile"
                            style="display:none">Change
                            mobile</button>
                        <button type="button" id="otp_verify" class="btn btn-outline-info btn-xs"
                            disabled="disabled">Verify</button>
                        <span class="green" style="display:none"><i class="fa fa-check-circle"></i> Verified</span><span
                            class="red" style="display:none">Wrong Verification code</span>
                    </div>
                </div>
                <div class="col-md-3" style="display:none">
                    <div class="form-group">
                        <label for="mounumber" class="control-label black"> Mobile Verified
                        </label>
                        <input type="text" name="mobile_verified" id="mobile_verified" class="form-control" readonly>
                    </div>
                </div>

                <div class="col-md-12 is_mobile_verified" style="display:none">
                    <div class="form-group">
                        <label for="address" class="control-label black">Address <span class="require">*
                            </span></label>
                        <textarea class="form-control" rows="2" width="100%" name="address" placeholder="Address"
                            id="address"></textarea>
                        <div id="errFirst"></div>
                    </div>
                </div>
                <div class="col-md-6 is_mobile_verified" style="display:none">
                    <div class="form-group">
                        <label for="district" class="control-label black">District <span class="require">*
                            </span></label>
                        <?php echo $this->Form->control('district_id',['class'=>'form-control','label'=>false,'error'=>true,'empty'=>'Select District','options' => $districts]);?>
                    </div>
                </div>
                <div class="col-md-6 is_mobile_verified" style="display:none">
                    <div class="form-group">
                        <label for="inputContent" class="control-label black">Taluk
                            <span class="require">*</span></label>
                        <?php echo $this->Form->control('taluk_id',['class'=>'form-control','label'=>false,'error'=>false,'empty'=>'Select Taluk','options' => $taluks]);?>
                    </div>
                </div>

                <div class="col-md-6 is_mobile_verified" style="display:none">
                    <div class="form-group">
                        <label for="pincode" class="control-label black">Pincode <span class="require">*
                            </span></label>
                        <input type="text" name="pincode" id="pincode" class="md-input form-control numbersonly"
                            maxlength="6" placeholder="Pincode">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-right sign-up">
            <button type="submit" class="btn btn-success">Sign Up &nbsp;<i class="fa fa-sign-out"></i></button>
        </div>

        <div class="col-md-6">
            <!-- <div class="col-md-12"> -->
            <div class="form-group back-to-login">
                <label class="lbl-pk"><a href="<?php echo $this->Url->build('/', true)?>Users/login"><i
                            class="fa fa-arrow-left"></i>&nbsp; Back to Login
                    </a></label>
            </div>
        </div>
    </div>
</div>



<?php echo $this->Form->End();?>

</div>
</div>

<script type="text/javascript">
$(function() {
    $("#FormID").validate({
        rules: {
            'name': {
                required: true
            },
            'father_name': {
                required: true
            },
            'email': {
                required: true,
                email: true
            },
            'mobile_no': {
                required: true,
                minlength: 10,
                maxlength: 10
            },
            'mobile_verified': {
                required: true,
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
                required: true
            },
        },
        messages: {
            'name': {
                required: "Enter your Name"
            },
            'father_name': {
                required: "Enter your Father/Spouse Name"
            },
            'email': {
                required: "Enter Valid Email",
            },
            'mobile_no': {
                required: "Enter Mobile No",
                minlength: "Mobile No Must be min 10 characters",
                maxlength: "Mobile No Must be max 10 characters"
            },
            'mobile_verified': {
                required: "Invalid Mobile No",
            },
            'address': {
                required: "Enter Address",
            },
            'district_id': {
                required: "Select District",
            },
            'taluk_id': {
                required: "Select Taluk",
            },
            'pincode': {
                required: "Enter Pincode",
            },

        },
        submitHandler: function(form) {
            if (mobile_verified == 1) {
                form.submit();
            } else {
                alert("Invalid OTP");
            }
        }
    });
});
</script>

<script type="text/javascript">
$(document).on("input", ".numbersonly", function() {
    this.value = this.value.replace(/[^0-9\s]/g, '');
});
$(document).on("input", ".lettersOnly", function() {
    this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
});
</script>

<script>
var time = 30;
var mobile_verified = 0;

function timerstart() {
    time = 30;
}

function timer() {
    if (time > 0) {
        console.log(time);
        time = time - 1;
        setTimeout('timer()', 1000);
        $(".otp_verify").text("(" + time + ") Resend OTP");

    } else {
        $(".otp_verify").prop("disabled", "").text("Resend OTP");
        $(".change_mobile").show();
    }

    //	$(".otp_verify").prop("disabled","disabled").text("Resend OTP");

}

$("#UserMobileNo").keyup(function() {
    $("#UserMobileNo").parent().removeClass('state-error');
    $("#UserMobileNo").parent().parent().find("em").remove()
    $(".otp_verify").prop("disabled", "");
});

$(".change_mobile").click(function() {

    if (confirm("Are you sure to change the mobile number ?")) {
        $("#UserMobileNo").prop("readonly", "");
        $(".otp_verify").prop("disabled", "").text("Send OTP");
        $(".red,.change_mobile").hide();
        $("#UserMobileOtp").prop("readonly", "readonly").val("");
        $("#otp_verify").prop("disabled", "disabled");
    }

});
$("#otp_verify").click(function() {
    var mno = $("#UserMobileNo").val();
    var code = $("#UserMobileOtp").val();
    var response = '';
    $.ajax({
        async: true,
        dataType: "html",
        type: "post",
        url: "../Users/otp_verify",
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
        },
        data: {
            MobileNo: mno,
            code: code,
            rand: Math.random(999)
        },
        success: function(data, textStatus) {
            response = data;
            if (response == 'success') {
                $("#UserMobileOtp").prop("readonly", "readonly");
                $("#otp_verify,.otp_verify").prop("disabled", "disabled");
                $("#otp_verify").hide();
                $(".red,.change_mobile,.otp_verify").hide();
                $(".is_mobile_verified").show();
                $(".green").show();
                $("#reg_button").prop("disabled", "");
                $("#mobile_verified").val(1);
                mobile_verified = 1
            } else {
                $(".is_mobile_verified").hide();
                $(".red").show();
            }
        }
    });
    return false;
});


$(".otp_verify").click(function() {
    $("#UserMobileOtp").prop("readonly", "readonly");
    $("#otp_verify").prop("disabled", "disabled");

    var mno = $("#UserMobileNo").val();
    var response = '';
    if ((validate_mobile_number(mno))) {
        $.ajax({
            async: true,
            dataType: "html",
            type: "post",
            url: "../Users/send_otp/" + mno,
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
            },
            data: {
                MobileNo: mno
            },
            success: function(data, textStatus) {
                response = data;

                if (response == 'success') {
                    alert('OTP has been sent to your mobile');
                    $("#UserMobileNo").prop("readonly", "readonly");
                    $(".otp_verify").prop("disabled", "disabled").text("Resend OTP");
                    $("#UserMobileOtp").prop("readonly", "");
                    $("#otp_verify").prop("disabled", "")
                    timerstart();
                    timer();
                } else {
                    $("#UserMobileNo").parent().removeClass('state-error');
                    $("#UserMobileNo").parent().parent().find("em").remove();
                    $("#UserMobileOtp").prop("readonly", "readonly");
                    $("#UserMobileNo").parent().removeClass("state-success").addClass(
                        'state-error');
                    $("#UserMobileNo").parent().parent().append(
                        '<em for="#SchoolId" class="invalid">' + response + '</em>');
                }
            }
        });

        return false;
    } else {
        alert("Enter Valid Mobile Number");
    }
});

function validate_mobile_number(mobile) {
    var pattern = /^\d{10}$/;

    $("#UserMobileNo").parent().removeClass('state-error');
    $("#UserMobileNo").parent().parent().find("em").remove();
    if ((mobile < 7000000000) || (mobile > 9999999999) || (mobile.length < 10) || (!pattern.test(mobile))) {
        $("#UserMobileNo").parent().removeClass("state-success").addClass('state-error');
        $("#UserMobileNo").parent().parent().append(
            '<em for="#UserMobileNo" class="invalid">Enter valid mobile number</em>');
        return false;
    } else {
        console.log('valid');
        $("#UserMobileNo").parent().removeClass('state-error').addClass("state-success");
        $("#UserMobileNo").parent().parent().find("em").remove();
        return true;
    }
}
</script>