<div class="row">
  	<?php echo $this->Form->create('User',['class'=>'form-horizontal', 'id'=>'ChangePasswordForm','novalidate'=>'novalidate']); ?>
  	<div class="col-lg-8">
    	<div id="tab-form-actions" class="tab-pane fade active in">
      		<div class="row">
        		<div class="col-lg-offset-3 col-lg-10">
          			<div class="panel panel-blue">
            			<div class="panel-heading" style="color:black;"><b>Password Reset</b></div>
            			<div class="panel-body pan">
              				<div class="form-body pal">
								<div class="form-group">
									<div class="col-md-4"><b><font face="Verdana" size="2">Users</font></b></div>
                  					<div class="col-md-7">
                    					<div class="input text"> <?php echo $this->Form->input('user_id',['class'=>'form-control','label'=>false,'error' => false,'empty'=>'Select','options'=>$users]);?> </div>
                  					</div>
                				</div>
                				<div class="form-group">
									<div class="col-md-4"><b><font face="Verdana" size="2">Password</font></b></div>
                  					<div class="col-md-7">
                    					<div class="input text"> <?php echo $this->Form->input('password',['class'=>'form-control','label'=>false,'error' => false,'value'=>"",'type'=>'password','maxlength'=>15,'value'=>$password]);?> </div>
                  					</div>
                				</div>
							</div>
            			</div>
          			</div>
        		</div>
      		</div>
    	</div>	
  	</div>
  	<div class="col-lg-12">
    	<div class="form-actions text-right none-bg">
      		<div class="col-md-9">
        		<button type="submit" class="btn btn-primary" >Submit</button>
        		<button type="button" class="btn" onclick="javascript:location.reload();">Reset</button>
      		</div>
    	</div>
  	</div>
  	<?php echo $this->Form->End();?> 
</div>

<?php if(@$password_hash) { ?>
	<div class="row">
	<?php echo $this->Form->create('User',['class'=>'form-horizontal', 'id'=>'ChangePasswordForm','novalidate'=>'novalidate']); ?>
	<div class="col-lg-8">
    	<div id="tab-form-actions" class="tab-pane fade active in">
      		<div class="row">
        		<div class="col-lg-offset-3 col-lg-10">
          			<div class="panel panel-blue">
            			<div class="panel-heading" style="color:black;"><b>User Details</b></div>
            			<div class="panel-body pan">
              				<div class="form-body pal">
								<div class="row">
								<div class="form-group row">
									<div class="col-md-3"><b><font face="Verdana" size="2">User Name</font></b></div>
                  					<div class="col-md-3">
                    					<?php echo $user_dtl['username'];?>
										<?php echo $this->Form->input('username',['value'=>$user_dtl['username'],'type'=>'hidden']);?>
								</div>
								</div>
                				<div class="form-group row">
									<div class="col-md-3"><b><font face="Verdana" size="2">Name</font></b></div>
                  					<div class="col-md-3">
                    					<?php echo $user_dtl['name'];?>
										<?php echo $this->Form->input('name',['value'=>$user_dtl['name'],'type'=>'hidden']);?>
								</div>
								</div>
								
								<div class="form-group row">
									<div class="col-md-3"><b><font face="Verdana" size="2">Password</font></b></div>
                  					<div class="col-md-3">
                    					<?php echo $password;?>
										<?php echo $this->Form->input('password',['value'=>$password,'type'=>'hidden']);?>
                				</div>
                				</div>
                				<div class="form-group row">
								<div class="col-md-3"><b><font face="Verdana" size="2">Password Ecryption </font></b></div>
                  					<div class="col-md-3">
                    					 <?php echo $password_hash;?>
										 <?php echo $this->Form->input('password_reset',['value'=>$password_hash,'type'=>'hidden']);?>
										 <?php echo $this->Form->input('user_id',['value'=>$user_dtl['id'],'type'=>'hidden']);?>
								</div>
								
              				</div>
							<div class="col-lg-10">
								<div class="form-actions text-right none-bg">
									<div class="col-md-9">
										<button type="submit" class="btn btn-primary" >Reset</button>
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
  	</div>
  		
  	<?php echo $this->Form->End();?> 
	</div>
<?php } ?>
<script>
$(function() {
	$.validator.addMethod("atLeastOneLowercaseLetter", function (value, element) {
		return this.optional(element) || /[a-z]+/.test(value);
	}, "<br />Must have at least one lowercase letter");

	$.validator.addMethod("atLeastOneUppercaseLetter", function (value, element) {
		return this.optional(element) || /[A-Z]+/.test(value);
	}, "<br />Must have at least one uppercase letter");
	 

	$.validator.addMethod("atLeastOneNumber", function (value, element) {
		return this.optional(element) || /[0-9]+/.test(value);
	}, "<br />Must have at least one number");
	 

	$.validator.addMethod("atLeastOneSymbol", function (value, element) {
		return this.optional(element) || /[!@#$%^&*()_]+/.test(value);
	}, "<br />Must have at least one special character");
	$("#ChangePasswordForm").validate({
		rules								: {
			'user_id'  					    : {
				required        			: true
			},
			'password'  					: {
				required        			: true,
				atLeastOneLowercaseLetter	: true,
				atLeastOneUppercaseLetter	: true,
				atLeastOneNumber			: true,
				atLeastOneSymbol			: true,
				minlength					: 8,
				maxlength					: 15
			}
			
		},
		messages: {
			'user_id' 						: {
				 required        			: "Select User",
			},
			'password' 					    : {
				 required        			: "Enter Password",
				 minlength       			: "New Password must be at least 8 characters long",
				 maxlength       			: "New Password maximum of 15 characters long"
			}
		},
		submitHandler: function(form) {
			form.submit();  
		}
	});
});
</script>