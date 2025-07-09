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


.btn-grad {
    background-image: linear-gradient(to right, #FF512F 0%, #F09819 51%, #FF512F 100%)
}

.btn-grad {
    margin: 1px;
    padding: 10px;
    text-align: center;
    text-transform: uppercase;
    transition: 0.5s;
    background-size: 200% auto;
    color: white;
    box-shadow: 0 0 20px #eee;
    border-radius: 10px;
    display: block;
}

.btn-grad:hover {
    background-position: right center;
    /* change the direction of the change here */
    color: #fff;
    text-decoration: none;
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
    padding: .70rem .5rem;
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
</style>
<div class="row" oncontextmenu="return true;">
    <?php echo $this->Form->create($user,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>
    <div class="col-lg-12">
        <div id="tab-form-actions" class="tab-pane fade active in">
            <div class="row">
                <div class="col-lg-7">
                    <div class="panel portlet box portlet-red">
                        <div class="portlet-header">
                            <div class="caption">Change Mobile Number</div>
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
                                                <label for="inputContent" class="col-md-5 control-label bold">Old Mobile
                                                    No</label>
                                                <div class="col-md-5">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('old_mobile_no',['class'=>'form-control','label'=>false,'error'=>false,'value'=>$user['mobile_no'],'readonly']);?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputContent" class="col-md-5 control-label bold">New Mobile
                                                    No<span class="require">* </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="input text">
                                                        <?php echo $this->Form->control('new_mobile_no',['class'=>'form-control num','label'=>false,'error'=>false,'minlength'=>'1','maxlength'=>'10']);?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="margin-left:55%;margin-top:-10px;">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-grad btn-xs otp_verify">Send
                                                        OTP</button>&nbsp;
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="mobile_no" class="col-md-5 control-label bold">Enter
                                                    Mobile OTP <span class="require">* </span></label>
                                                <div class="col-md-5">
                                                    <div class="input text">
                                                        <?php echo $this->Form->input('mobile_otp',['class'=>'form-control num','id'=>"UserMobileOtp",'required'=>'required','label'=>false,'error' => false,'autocomplete'=>'off','readonly'=>'readonly','placeholder'=>'OTP']);?>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6" style="margin-left:56%;margin-top:-10px;">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-grad btn-xs change_mobile"
                                                        style="display:none">Change
                                                        mobile</button>
                                                    <button type="button" id="otp_verify" class="btn btn-grad btn-xs"
                                                        disabled="disabled">Verify</button>
                                                    <span class="green" style="display:none"><i
                                                            class="fa fa-check-circle"></i>
                                                        Verified</span><span class="red" style="display:none">Wrong
                                                        Verification
                                                        code</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3" style="display:none">
                                                <div class="form-group">
                                                    <label for="mounumber" class="control-label black"> Mobile Verified
                                                    </label>
                                                    <input type="text" name="mobile_verified" id="mobile_verified"
                                                        class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="col-lg-7">
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
<style>
.disp {
    display: none;
}
</style>
<script>
$(function() {
    $("#FormID").validate({
        rules: {
            'new_mobile_no': {
                required: true
            }
        },

        messages: {
            'new_mobile_no': {
                required: "Enter New Mobile No"
            }
        },
        submitHandler: function(form) {
            $verified = $("#mobile_verified").val();
            if ($verified == 1) {
                form.submit();
                $(".btn").prop('disabled', true);
            } else {
                alert("Please Verify Mobile No");
            }
        }
    });
});

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

$("#new-mobile-no").keyup(function() {
    $("#new-mobile-no").parent().removeClass('state-error');
    $("#new-mobile-no").parent().parent().find("em").remove()
    $(".otp_verify").prop("disabled", "");
});

$(".change_mobile").click(function() {

    if (confirm("Are you sure to change the mobile number ?")) {
        $("#new-mobile-no").prop("readonly", "");
        $(".otp_verify").prop("disabled", "").text("Send OTP");
        $(".red,.change_mobile").hide();
        $("#UserMobileOtp").prop("readonly", "readonly").val("");
        $("#otp_verify").prop("disabled", "disabled");
    }

});


$(".otp_verify").click(function() {
    $("#new-mobile-no").prop("readonly", "readonly");
    $("#otp_verify").prop("disabled", "disabled");

    var mno = $("#new-mobile-no").val();
    alert(mno);
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
                    $("#new-mobile-no").prop("readonly", "readonly");
                    $(".otp_verify").prop("disabled", "disabled").text("Resend OTP");
                    $("#UserMobileOtp").prop("readonly", "");
                    $("#otp_verify").prop("disabled", "")
                    timerstart();
                    timer();
                } else {
                    $("#new-mobile-no").parent().removeClass('state-error');
                    $("#new-mobile-no").parent().parent().find("em").remove();
                    $("#UserMobileOtp").prop("readonly", "readonly");
                    $("#new-mobile-no").parent().removeClass("state-success").addClass(
                        'state-error');
                    $("#new-mobile-no").parent().parent().append(
                        '<em for="#SchoolId" class="invalid">' + response + '</em>');
                }
            }
        });

        return false;
    } else {
        alert("Enter Valid Mobile Number");
    }
});

$("#otp_verify").click(function() {
    var mno = $("#new-mobile-no").val();
    var code = $("#UserMobileOtp").val();
    //alert(mno);
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




function validate_mobile_number(mobile) {
    var pattern = /^\d{10}$/;

    $("#UserMobileNo").parent().removeClass('state-error');
    $("#UserMobileNo").parent().parent().find("em").remove();
    if ((mobile < 6000000000) || (mobile > 9999999999) || (mobile.length < 10) || (!pattern.test(mobile))) {
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