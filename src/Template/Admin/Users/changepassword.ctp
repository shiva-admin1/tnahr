<div id="breadcrumbs-wrapper">
	<div class="header-search-wrapper grey lighten-2 hide-on-large-only">
	  <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
	</div>
	<div class="container">
		<div class="row">
			<div class="col s10 m6 l6">
				<ol class="breadcrumbs">
					<li>
						<?php  echo $this->Html->link('Dashboard',['controller' => 'Dashboard','action'=>'index'], ['escape' => false]);?>
					</li>
					<li>
						<?php  echo $this->Html->link('Users',['controller' => 'Users','action'=>'index'], ['escape' => false]);?>
						
					</li>
					<li class="active">Change Password</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<div class='row' id='content-wrapper'>
	<div class="container">
		<div class="section">
			<div class="divider"></div>
			<?php echo $this->Form->templates(['inputContainer' => '{{content}}']);
			echo  $this->Form->create('',['id'=>'users_add','class'=>'form-horizontal  col s10 m10', "autocomplete"=>"off"]) ?>
			<div class="row">
				<div class="col s9 m9 l9">
					<div class="card-panel">
						<h4 class="header2">Change Password</h4>
						<div class="row">
							<div class="input-field col s12">

								<?php echo $this->Form->control('oldpassword',['class'=>' ','type'=>password,'label'=>false,'error'=>false,'minlength'=>8,'maxlength'=>20]);?>
								<label for="oldpassword" class="active">Current Password</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<?php echo $this->Form->control('password',['class'=>'','type'=>password,'label'=>false,'error'=>false,'minlength'=>8,'maxlength'=>20]);?>
								<label for="newpassword" class="active">New Password</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<?php echo $this->Form->control('confirmpassword',['class'=>'','type'=>password,'label'=>false,'error'=>false,'minlength'=>8,'maxlength'=>20]);?>
								<label for="confirmpassword" class="active">Confirm Password</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
								<i class="material-icons right">send</i>
							</button>
							<button class="btn waves-effect waves-light red right" type="reset" name="action">Reset
								<i class="material-icons right">replay</i>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
   $(function() { $("#users_add").validate({
	rules: {
		'oldpassword'  		: {
			required        : true,
			minlength       : 5,
			maxlength       : 20
		},
		'password'  		: {
			required        : true,
			minlength       : 5,
			maxlength       : 20
		},
		'confirmpassword'  : {
			required        : true,
			minlength       : 5,
			maxlength       : 20,
			equalTo			: '#password'
		}
	},
	messages: {
		'oldpassword'  		: {
			required        : "Enter Password",
			minlength      	: "Password must be at least 5 characters long",
			maxlength      	: "Password maximum of 20 characters long"
		},
		'password'  		: {
			required        : "Enter Password",
			minlength      	: "Password must be at least 5 characters long",
			maxlength      	: "Password maximum of 20 characters long"
		},
		'confirmpassword'  	: {
			required        : "Enter Password",
			minlength      	: "Password must be at least 5 characters long",
			maxlength      	: "Password maximum of 20 characters long",
			equalTo			: "Password and Confirm Password mismatch"
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