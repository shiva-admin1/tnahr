<style>
.login_page_wrapper {
    width: 80%;
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

.black {
    color: #000000;
    font-weight: bold;
}

.card-align {
    margin-left: 2.3%;
}
</style>

<div class="row justify-content-center align-items-center bg-red">
    <div class="col-sm-7">
        <div class="col-md-2 logo" style="left: 4%;"><img
                src="<?php echo $this->Url->build('/', true)?>img/TamilNadu_Logo.png" class="img-fluid"></div>
        <h1 class="text-white logo col-md-10"><strong style="font-weight: bold;">Archives and Historical Research
                Department</strong><br><small>Chennai</small></h1>
        <div class="overlay"></div>
        <div id="text"></div>
    </div>
    <div class="col-sm-4 card m-t-1 card-align ">
        <div class="card-body">

            <?php echo $this->Form->create($user, ['id'=>'FormID', 'class'=>'form-horizontal col-md-12', "autocomplete"=>"off", 'enctype'=>'multipart/form-data']);?>
            <h4 class="m-t-0 header-title text-center" style="padding-bottom:20px;">Mobile Verfication</h4>
            <div class="error-msg">
                <center><?php echo $this->Flash->render() ?></center>
            </div>
            <div class="row">
                <div class="col-md-12 m-t-1">

                    <div class="form-group black">
                        <div class="control-label col-md-10 offset-md-1"><label for="exampleInputEmail1"><b>Enter Mobile
                                    OTP <span class="req">*
                                    </span></b></label>
                            <?php echo $this->Form->control('mobile_otp', ['class'=>'form-control numbersonly','id'=>"UserMobileOtp",'required'=>'required','label'=>false, 'error'=>false,'autocomplete'=>'off','placeholder'=>'Enter OTP']);?>
                        </div>
                    </div>

                    <div class="form-group sendotp">
                        <div class="col-md-12 text-center"><button type="button" id="otp_verify"
                                class="btn btn-success">Verify
                            </button></div>
                    </div>
                    <!-- <div class="col-md-6 btnotp" style="margin-top:20px;margin-left:37%;display:none;">
                        <div class="form-group">
                            <span class="green" style="display:none"><i class="fa fa-check-circle"></i>
                                Verified</span>
                            <span class="red" style="display:none"><i class="far fa-times-circle"></i> Wrong
                                Verification Code</span>
                            <input type="hidden" name="otp_verify_flag" id="otp_verify_flag" value="">
                            <input type="hidden" name="UserMobileNo" id="UserMobileNo"
                                value="<?php echo $old_user[0]['mobile_no'];?>">
                        </div>
                    </div> -->
                    <span class="red" style="margin-bottom:20px;margin-left:150px;display:none"><i
                            class="fa fa-times-circle"></i> Wrong
                        Verification Code</span><br>
                    <span class="green" style="margin-bottom:20px;margin-left:178px;display:none"><i
                            class="fa fa-check-circle green"></i>
                        Verified</span><br>
                    <input type="hidden" name="otp_verify_flag" id="otp_verify_flag" value="">
                    <input type="hidden" name="UserMobileNo" id="UserMobileNo"
                        value="<?php echo $old_user[0]['mobile_no'];?>"><br>
                    <div class="col-md-12 col-md-offset-5" id="forbtn" style="display:none;">
                        <button id="reg_button" type="submit" class="btn btn-success"
                            style="margin-bottom:20px;margin-left:160px;">Submit</button>
                    </div>
                </div>
                <div class="form-group back-to-login">
                    <label class="lbl-pk"><a href="<?php echo $this->Url->build('/', true)?>Users/login"><i
                                class="fa fa-arrow-left"></i>&nbsp; Back to Login
                        </a></label>
                </div>
                <?php echo $this->Form->End();?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(function() {
    alert("OTP has been sent to your mobile number.");
    $("#mobileverify").validate({
        rules: {
            'mobile_otp': {
                required: true
            }
        },
        messages: {
            'mobile_otp': {
                required: "Enter Valid OTP"
            }

        },
        submitHandler: function(form) {
            if (otp_verified_flag == 1) {
                form.submit();
            } else {
                alert("Enter Valid OTP");
            }
        }
    });
});
</script>
<script>
var time = 30;
var otp_verified_flag = 1;

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
        url: "../otp_verify",
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
                $(".green").show();
                $("#reg_button").prop("disabled", "");
                $("#otp_verify_flag").val(1);
                $("#forbtn").show();
                otp_verified_flag = 1
            } else {
                $(".red").show();
                $("#otp_verify_flag").val('');
                // alert("Invalid OTP");

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
            url: "../Users/sendforget_otp/" + mno,
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

$(".otp_verify").click(function() {

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
$(document).on("input", ".numbersonly", function() {
    this.value = this.value.replace(/[^0-9\s]/g, '');
});
</script>