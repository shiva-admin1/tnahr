<style type="text/css">
	li{
		line-height: 2em;
    	color: #000;
	}
	.page-form{margin-left: 33.33333333%;}
</style>
<div class="row" style="background-color:#FFF;">
	<div class="container">
		<!-- <div class="col-md-8 col-xs-12">
		  <img src="<?php echo $this->Url->build('/', true)?>img/sipcot.jpg" class="img-responsive" style="height:345px;width:730px;margin: 0 auto;">
		  
		</div> -->
		
		<div class="page-form col-md-4 col-md-offset-4 col-xs-12">
			<?php echo $this->Form->create('User',['id'=>'userLogin','class'=>'login-form', "autocomplete"=>"off"]); ?>
				<div class="header-content"><h1>HO Officers Login</h1></div>
				<div class="body-content">		
					<div class="form-group">
						<div class="input-icon right">
							<i class="fa fa-user"></i><input type="text" placeholder="Username" name="username" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<div class="input-icon right">
							<i class="fa fa-key"></i><input type="password" placeholder="Password" name="password" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<p style="color:red;"><?php if(@$error){ echo @$error; }?></p>
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-success">Log In&nbsp;<i class="fa fa-chevron-circle-right"></i></button>
					</div>
					<!--<div class="form-group text-center">
						<label for="exampleInputPassword1"><a href="<?php echo $this->Url->build('/', true)?>Users/userregistration">Create An Account</a></label>
						&nbsp;&nbsp;|&nbsp;&nbsp;
						<label for="exampleInputPassword1"><a href="<?php echo $this->Url->build('/', true)?>Users/forgetPassword">Forgot Password <i class="fa fa-question-circle"></i></a></label>
						
						
					</div> -->         
					<div class="clearfix"></div>
				</div>
		   <?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>

	<!-- <div class="row" style="background-color:#FFF;">
		<div class="container" style="background-color:#FFF;border-bottom:3px solid #5255A8;">
			<div class="col-md-6">
				<h3 class="text-center" style="width: fit-content;border-bottom: 1px solid;margin: 0 auto;margin-bottom: 20px;font-size: 2.5em;">Features</h3>
			</div>
			<div class="col-md-8">
				<p>To give main thrust to area development activities, 
				the organization involves in the formation of industrial 
				complexes by providing basic and comprehensive infrastructure 
				facilities for the industries to set up their units. 
				SIPCOT has so far developed 20 Industrial Complexes in 12 districts 
				and Six Sector Specific Special Economic Zones (SEZs) across Tamil Nadu. 
				SIPCOT also acts as a Nodal Agency of Government of Tamil Nadu in the sanction / disbursement of 
				Structured Package of Assistance to large industrial units.</p>
				<p>To give main thrust to area development activities, 
				the organization involves in the formation of industrial complexes 
				by providing basic and comprehensive infrastructure facilities for the 
				industries to set up their units. SIPCOT has so far developed 20 Industrial Complexes in 12 districts 
				and Six Sector Specific Special Economic Zones (SEZs) across Tamil Nadu. 
				SIPCOT also acts as a Nodal Agency of Government of Tamil Nadu in the sanction / disbursement of 
				Structured Package of Assistance to large industrial units.</p>
			</div>
			<div class="col-md-6">
				<ul>
					<li style="line-height: 2em;">Basic vehicle details</li>
					<li style="line-height: 2em;">Vehicle & Driver allocation</li>
					<li style="line-height: 2em;">Manage vehicle documents</li>
					<li style="line-height: 2em;">Vehicle registration & insurance</li>
					<li style="line-height: 2em;">Service & Repairs</li>
					<li style="line-height: 2em;">Infringement / Offence & Accident</li>
					<li style="line-height: 2em;">GPS Tracking</li>
					<li style="line-height: 2em;">Automatic reminder of renewal of vehicle documents</li>
					<li style="line-height: 2em;">Alerts and Notification options via SMS, email and system</li>
				</ul>
			</div>
		</div>
	</div> -->

<style>
.error{color:red;}
.success{color: #51d170;}
.message{
	color:#000000;
    font-size: 1.0em;
    padding: 1px 3px;
}
.light, .page-footer .footer-copyright{font-weight: normal!important;font-size: 13px;}
.icon-block h5{font-size: 1.2rem!important;}

.modal-title {
  margin: 0;
  line-height: 1.02857143;
  color: #002060;
}
.modal-body {
  position: relative;
}
.modal-backdrop.fade {
  filter: alpha(opacity=0);
  opacity: 0;
}
.modal-backdrop.in {
  filter: alpha(opacity=50);
  opacity: .5;
}
.modal-header {
  border-bottom: 1px solid #e5e5e5;
}
.modal-header .close {
    margin-top: -2px;
    border: none;
    background: #f10f0f;
    color: #FFF;
    border-radius: 50%;
}

</style>
<script type="text/javascript">
$(function() {
$("#userLogin").validate({
            rules: {
               'username'  								: {
                    required        					: true,
					minlength							: 2,
					maxlength							: 50
                },
				'password'  							: {
                    required        					: true,
					minlength							: 3,
					maxlength							: 25
                }
            },
            messages: {
            	'username'  							: {
                   required        						: "Enter Username",
				   minlength       						: "Username must be at least 3 characters long",
				   maxlength       						: "Username maximum of 50 characters long"
                },
				'password'  							: {
                   required        					    : "Enter Password",
				   minlength       						: "Password must be at least 3 characters long",
				   maxlength       						: "Password maximum of 25 characters long"
                }
			},
            submitHandler: function(form) {
			 form.submit();
            }
        });
      });

</script>