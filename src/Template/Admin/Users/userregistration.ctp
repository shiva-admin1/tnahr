<style>
.login_page_wrapper { width: 80%;}
.green{color: green;}
.red{color:red;}
.md-btn{font: 500 13px/30px Roboto,sans-serif !important;}
.control-label{
font-weight:bold;	
}
.backtxt a{
margin-top:10px;
color:blue;	
}
    li{
		line-height: 2em;
    	color: #000;
	}
	.page-form{margin: 0;}
</style>
<?php if(@$error != ""){?>
	<div id="error"><?php echo $error; ?></div>
<?php }?>
	<div class="row" style="background-color:#FFF;margin-top: 10px;">
		<div class="container">
			<div class="col-md-4">
				</div>
				
			<fieldset style="width:900px;">
				<div class="page-form col-md-7 mt-30">
				<?php echo $this->Form->create('User',['id'=>'userRegistration','class'=>'registration-form', "autocomplete"=>"off"]); ?>
                    <div class="header-content text-center"><h1>User Registration</h1></div>
					<div class="body-content">
						<div class="row">
							
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstname" class="control-label"><strong>Company Name: <span class="req">* </span></strong></label> 
									<input class="form-control" type="text" name="industry_name" placeholder="Company Name" id="industry_name" required>
									<div id="errFirst"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstname" class="control-label"><strong>Contact Person Name: <span class="req">* </span></strong></label>
									<input class="form-control lettersOnly" type="text" name="name" placeholder="Name" id="fname_reg" required>
									<div id="errFirst"></div>
								</div>
							</div>
							<!--<div class="col-md-12" style="padding-right: 5px;">
								<div class="form-group">
									<label for="firstname" class="control-label"><strong>Address: </strong></label> 
										<input class="form-control" type="text" name="address" placeholder="Address" id="address" >
									<div id="errFirst"></div>
								</div>
							</div>-->
							<div class="col-md-12" style="padding-right: 5px;">
								<div class="form-group">
									<label for="email" class="control-label"><strong> Email ID: <span class="req">* </span></strong></label> 
									<input class="md-input form-control" required="" type="email" placeholder="Email Address" name="email" id="email" required>
									<div class="status" id="status"></div>
									<p id="result"></p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="phonenumber" class="control-label"><strong>Mobile Number: <span class="req">* </span></strong></label> 
										<input required="" type="text" name="mobile_no" id="UserMobileNo" class="md-input form-control numbersonly" maxlength="10"  placeholder="Phone">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="mobile_no" class="control-label" style="color:#000000;"><strong>Enter mobile OTP <span class="req">* </span></strong></label> 
										<?php echo $this->Form->input('mobile_otp',['class'=>'form-control numbersonly','id'=>"UserMobileOtp",'required'=>'required','label'=>false,'error' => false,'autocomplete'=>'off','readonly'=>'readonly']);?>
								</div>
							</div>
							<div class="col-md-6" style="margin-top:20px;">
								<div class="form-group">
									<button type="button"  class="btn-primary otp_verify">Send OTP</button>&nbsp; 
									
								</div>
							</div>
							<div class="col-md-6" style="margin-top:20px;">
								<div class="form-group">
									<button type="button"  class="btn-primary change_mobile" style="display:none">Change mobile</button>
									<button type="button" id="otp_verify" class="btn-success"  disabled="disabled">Verify</button>
									<span class="green" style="display:none"> Verified</span><span class="red" style="display:none">Wrong verification code</span>
								</div>
							</div>
							<div class="col-md-3" style="display:none">
								<div class="form-group">
									<label for="mounumber" class="control-label"><strong> Mobile Verified: </strong></label> 
									<input type="text" name="mobile_verified" id="mobile_verified" class="form-control"  readonly>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="mounumber" class="control-label"><strong> GST No: </strong></label> 
									<input type="text" name="gst_no" id="gst_no" class="form-control" placeholder="GST No">
								</div>
							</div>
							
							
						</div>
					</div>
					<div >
						
						<div class="col-md-3 col-md-offset-3" style="margin-bottom:20px;">
							<button id="reg_button" type="submit"  class="btn btn-success">Sign Up</button>
						</div>
						<div class="col-md-3 backtxt" style="color:blue;margin-top:10px;">
							<?php echo $this->Html->link('Back to Login', array('controller' => 'users','action'=>'login')); ?>
						</div>
					</div><br>
				<?php echo $this->Form->end(); ?>
			</div>
			</fieldset>
		</div>
	</div>
<script type="text/javascript">
$(function() {
	$("#userRegistration").validate({
		rules								: {
			'name'  						: {
				required        			: true
			},
			'industry_name'  				: {
				required        			: true
			},
			'email'  						: {
				required        			: true,
				email						: true
			},
			'mobile_no'						: {
				required        			: true,
				minlength					: 10,
				maxlength					: 10
			},
			'mobile_verified'				: {
				required        			: true,
			}
		},
		messages: {
			'name' 							: {
				 required        			: "Enter Contact Person Name"
			},
			'industry_name' 				: {
				 required        			: "Enter Company Name"
			},
			'email' 						: {
				 required        			: "Enter Valid Email",
			},
			'mobile_no'						: {
				required					: "Enter Mobile No",
				minlength       			: "Mobile Number Must be minimum 10 characters",
				maxlength       			: "Mobile Number Must be maximum 10 characters"
			},
			'mobile_verified'				: {
				required        			: "Invalid Mobile No",
			}
		   
		},
		submitHandler: function(form) {
			if(mobile_verified==1){
				form.submit();
			}else{
				alert("Invalid OTP");
			}
		}
	});
});
</script>
<script>
var time =30; 
var mobile_verified =0; 
 function timerstart()
 {
 	time=30;
 }
 function timer()
	{
		if(time>0)
		{
			console.log(time);
			time = time-1;
			setTimeout('timer()', 1000);
			$(".otp_verify").text("("+time+") Resend OTP");
			
		}
		else
		{
			$(".otp_verify").prop("disabled","").text("Resend OTP");
			$(".change_mobile").show();
		}

	//	$(".otp_verify").prop("disabled","disabled").text("Resend OTP");
		
	}
	
$("#UserMobileNo").keyup(function(){
	$("#UserMobileNo").parent().removeClass('state-error');
	$("#UserMobileNo").parent().parent().find("em").remove()
	$(".otp_verify").prop("disabled","");
});

$(".change_mobile").click(function(){

		if(confirm("Are you sure to change the mobile number ?"))
		{
			$("#UserMobileNo").prop("readonly","");
			$(".otp_verify").prop("disabled","").text("Send OTP");
			$(".red,.change_mobile").hide();
			$("#UserMobileOtp").prop("readonly","readonly").val("");
			$("#otp_verify").prop("disabled","disabled");
		}
	
});	
$("#otp_verify").click(function() {
	var mno = $("#UserMobileNo").val();
	var code = $("#UserMobileOtp").val();
	var response ='';
		$.ajax({
			async : true,
			dataType: "html",
			type : "post",
			url  : "../Users/otp_verify",
			beforeSend: function (xhr) {
				xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			},
			data: { MobileNo : mno,code:code,rand:Math.random(999) },
			success : function (data, textStatus) {
				response = data;
			  	if(response == 'success'){
					$("#UserMobileOtp").prop("readonly","readonly");
					$("#otp_verify,.otp_verify").prop("disabled","disabled");
					$("#otp_verify").hide();
					$(".red,.change_mobile,.otp_verify").hide();
					$(".green").show();
					$("#reg_button").prop("disabled","");
					$("#mobile_verified").val(1);
					mobile_verified=1
				}else{
					$(".red").show();
				}
			}
		});
		return false;
});


$(".otp_verify").click(function() {
	$("#UserMobileOtp").prop("readonly","readonly");
	$("#otp_verify").prop("disabled","disabled");

	var mno = $("#UserMobileNo").val();
	var response ='';
	if((validate_mobile_number(mno))){	
		$.ajax({
			async : true,
			dataType: "html",
			type : "post",
			url  : "../Users/send_otp/"+mno,
			beforeSend: function (xhr) {
				xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			},
			data: { MobileNo : mno },
			success : function (data, textStatus) {
				response = data;

				if(response == 'success'){
					alert('OTP has been sent to your mobile');
					$("#UserMobileNo").prop("readonly","readonly");
					$(".otp_verify").prop("disabled","disabled").text("Resend OTP");
					$("#UserMobileOtp").prop("readonly","");
					$("#otp_verify").prop("disabled","")
					timerstart();
					timer();	
				}else{
					$("#UserMobileNo").parent().removeClass('state-error');
					$("#UserMobileNo").parent().parent().find("em").remove();
					$("#UserMobileOtp").prop("readonly","readonly");
					$("#UserMobileNo").parent().removeClass("state-success").addClass('state-error');
					$("#UserMobileNo").parent().parent().append('<em for="#SchoolId" class="invalid">'+response+'</em>');
				}
			}
		});
		
		return false;
	}else{
			alert("Enter Valid Mobile Number");
	}
});

function validate_mobile_number(mobile)
{
	var pattern = /^\d{10}$/;
			
	$("#UserMobileNo").parent().removeClass('state-error');
	$("#UserMobileNo").parent().parent().find("em").remove();
	if((mobile<7000000000) || (mobile >9999999999) || (mobile.length<10) || (!pattern.test(mobile)))
	{
	$("#UserMobileNo").parent().removeClass("state-success").addClass('state-error');
	$("#UserMobileNo").parent().parent().append('<em for="#UserMobileNo" class="invalid">Enter valid mobile number</em>');
		return false;
	}
	else
	{
		console.log('valid');
		$("#UserMobileNo").parent().removeClass('state-error').addClass("state-success");
		$("#UserMobileNo").parent().parent().find("em").remove();
		return true;
	}
}
$(document).on("input", ".numbersonly", function() {
	this.value = this.value.replace(/[^0-9\s]/g,'');
});
$(document).on("input", ".lettersOnly", function() {
	this.value = this.value.replace(/[^a-zA-Z\s]/g,'');
});
    function district_chg(district_id)
    {      
        $.ajax({ 
            url:"ajaxschemetypedetails/"+district_id,
            success:function (result) {
			     $('.scheme_form').html(result);
            }
        });
    }
</script>