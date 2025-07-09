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
</style>
<?php if(@$error != ""){?>
	<div id="error"><?php echo $error; ?></div>
<?php }?>
	<?php echo $this->Form->create('User',['id'=>'forgotPassword','class'=>'registration-form', "autocomplete"=>"off"]); ?>
	<div class="row" style="background-color:#FFF;margin-top: 10px;">
		<div class="container">
			<fieldset style="width:600px;margin-left:280px;">
				<div class="page-form col-md-12 col-xs-12 mt-30">
				<?php echo $this->Form->create('User',['id'=>'forgotPassword','class'=>'registration-form', "autocomplete"=>"off"]); ?>
                    <div class="header-content"><h1>Forgot Password</h1></div>
					<div class="body-content">
						<div class="row">
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
								<div class="form-group mobileotp" style="display:none;">
									<label for="mobile_no" class="control-label" style="color:#000000;"><strong>Enter mobile OTP <span class="req">* </span></strong></label> 
										<?php echo $this->Form->input('mobile_otp',['class'=>'form-control numbersonly','id'=>"UserMobileOtp",'required'=>'required','label'=>false,'error' => false,'autocomplete'=>'off','readonly'=>'readonly']);?>
								</div>
							</div>
							
						</div>
					</div>
					<div >
						
						<div class="col-md-3 col-md-offset-3" id="forbtn" style="margin-bottom:20px;">
							<button id="reg_button" type="submit"  class="btn btn-success" >Submit</button>
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
	$("#forgotPassword").validate({
		rules								: {
			'email'  						: {
				required        			: true,
				email						: true
			},
			'mobile_no'						: {
				required        			: true,
				minlength					: 10,
				maxlength					: 10
			}
		},
		messages: {
			'email' 						: {
				 required        			: "Enter Email",
				 email        				: "Enter Email"
			},
			'mobile_no'						: {
				required					: "Enter Mobile No",
				minlength       			: "Mobile Number Must be minimum 10 characters",
				maxlength       			: "Mobile Number Must be maximum 10 characters"
			}
		   
		},
		submitHandler: function(form) {
			form.submit();  
		}
	});
});
function validate_mobile_number(mobile)
{
	var pattern = /^\d{10}$/;
			
	$("#UserMobileNo").parent().removeClass('state-error');
	$("#UserMobileNo").parent().parent().find("em").remove();
	if((mobile<7000000000) || (mobile.length<10) || (!pattern.test(mobile)))
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

</script>
