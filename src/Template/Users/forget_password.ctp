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
    <div class="col-sm-4 card m-t-1 card-align">
        <div class="card-body">

            <?php echo $this->Form->create($user, ['id'=>'FormID', 'class'=>'form-horizontal col-md-12', "autocomplete"=>"off", 'enctype'=>'multipart/form-data']);?>
            <h4 class="m-t-0 header-title text-center" style="padding-bottom:20px;">Forget Password</h4>
            <div class="error-msg">
                <center><?php echo $this->Flash->render() ?></center>
            </div>
            <div class="row">
                <div class="col-md-12 m-t-50">
                    <div class="form-group black">
                        <div class="control-label col-md-10 offset-md-1"><label
                                for="exampleInputEmail1"><b>Email</b></label><?php echo $this->Form->control('email', ['class'=>'form-control email', 'label'=>false, 'error'=>false,'placeholder'=>'Email']);?>
                        </div>
                    </div>

                    <div class="form-group black">
                        <div class="control-label col-md-10 offset-md-1 black"><label
                                for="exampleInputPassword1"><b>Mobile
                                    Number</b></label><?php echo $this->Form->control('mobile_no', ['class'=>'form-control num', 'label'=>false, 'error'=>false,'placeholder'=>'Mobile Number','maxlength'=>'10']);?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 text-center"><button type="submit" class="btn btn-success">Send <i
                                    class="fa fa-paper-plane"></i>
                            </button></div>
                    </div><?php echo $this->Form->End();?>
                </div>
                <div class="form-group back-to-login">
                    <label class="lbl-pk"><a href="<?php echo $this->Url->build('/', true)?>Users/login"><i
                                class="fa fa-arrow-left"></i>&nbsp; Back to Login
                        </a></label>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(function() {
    $("#FormID").validate({
        rules: {
            'email': {
                required: true,
                email: true
            },
            'mobile_no': {
                required: true,
                minlength: 10,
                maxlength: 10
            }
        },
        messages: {
            'email': {
                required: "Enter Email",
                email: "Enter Email"
            },
            'mobile_no': {
                required: "Enter Mobile No",
                minlength: "Mobile Number Must be minimum 10 characters",
                maxlength: "Mobile Number Must be maximum 10 characters"
            }

        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});

function validate_mobile_number(mobile) {
    var pattern = /^\d{10}$/;

    $("#mobile-no").parent().removeClass('state-error');
    $("#mobile-no").parent().parent().find("em").remove();
    if ((mobile < 7000000000) || (mobile.length < 10) || (!pattern.test(mobile))) {
        $("#mobile-no").parent().removeClass("state-success").addClass('state-error');
        $("#mobile-no").parent().parent().append(
            '<em for="#mobile-no" class="invalid">Enter valid mobile number</em>');
        return false;
    } else {
        console.log('valid');
        $("#mobile-no").parent().removeClass('state-error').addClass("state-success");
        $("#mobile-no").parent().parent().find("em").remove();
        return true;
    }
}
$(document).on("input", ".numbersonly", function() {
    this.value = this.value.replace(/[^0-9\s]/g, '');
});
</script>