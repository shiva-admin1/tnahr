 <div class="row">
	<div class="col-sm-6 offset-sm-3 card m-t-1">
		<div class="card-body">
		<?php echo $this->Form->create($user,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>

			<h4 class="m-t-0 header-title text-center">TNAHR  Admin Login</h4>
			
			<div class="row">
				     
				<div class="col-md-12 m-t-50">                      
						<div class="form-group">
							<div class="col-md-6 offset-md-3">
								<label for="exampleInputEmail1">Username</label>
								<?php echo $this->Form->control('username',['class'=>'form-control name','label'=>false,'error'=>false]);?>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 offset-md-3">
								<label for="exampleInputPassword1">Password</label>
							   <?php echo $this->Form->control('password',['class'=>'form-control','label'=>false,'error'=>false]);?>
								
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12 text-center">
								<button type="submit" class="btn btn-lg btn-success">Submit</button>
							</div>
						</div>
					 <div class="input-field col s6 m6 l6">

				<div class="form-group text-center">
						<label for="exampleInputPassword1"><a href="<?php echo $this->Url->build('/', true)?>admin/Users/forgetpassword">Forgot Password <i class="fa fa-question-circle"></i></a></label>
						
						
					</div>          
				
            </div>	
				</div>

	<?php echo $this->Form->End();?> 
	<div class="error-msg">
				  <i class="fa fa"></i><?php echo $this->Flash->render() ?>
			</div>
		</div>
	</div>
</div>
</div>  
<script>
   $(function() { $("#userLogin").validate({
    rules: {
			'username'  					: {
				required        			: true
			},
			'password'  						: {
				required        			: true
			},
			
			
		},
    messages: {
        username						:{
            required                    : "Enter your Username"
        },
        password						:{
            required                    : "Enter your password",
        },
    },
    errorElement : 'div',
    errorPlacement: function(error, element) {
      var placement = $(element).data('error');
      if (placement) {
        $(placement).append(error)
      } else {
        error.insertAfter(element);
      }
    }
 });
});
</script>