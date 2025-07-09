<style>
.login_page_wrapper {
    width: 80%;
}

.black {
    color: #000000;
    font-weight: bold;
}

.card-align {
    margin-left: 2.3%;
}
</style>
<?php 
echo $this->Html->script('enc/rollups/aes');
echo $this->Html->script('enc/components/pad-zeropadding');
?>	

<div class="row justify-content-center align-items-center bg-red">
    <div class="col-sm-7">
        <div class="col-md-2 logo" style="left: 4%;"><img
                src="<?php echo $this->Url->build('/', true)?>img/TamilNadu_Logo.png" class="img-fluid"></div>
        <h1 class="text-white logo col-md-10"><strong style="font-weight: bold;">Tamil Nadu Archives and Historical Research
                Department</strong><br><small>Chennai</small></h1>
        <div class="overlay"></div>
        <div id="text"></div>
    </div>
    <div class="col-sm-4 card m-t-1 card-align">
        <div class="card-body">
            <div>
                <?php echo $this->Form->create($user, ['id'=>'FormID', 'class'=>'form-horizontal col-md-12', "autocomplete"=>"off", 'enctype'=>'multipart/form-data']);?>
                <h4 class="m-t-0 header-title text-center" style="padding-bottom:10px;">User Login</h4>
                <div class="error-msg">
                    <center><i class="fa fa-exclamation"></i><?php echo $this->Flash->render() ?></center>   
                </div>
                <div class="row">
                    <div class="col-md-12 m-t-50">
                        <div class="form-group black">
                            <div class="control-label col-md-10 offset-md-1"><label
                                    for="exampleInputEmail1"><b>Username</b></label><?php echo $this->Form->control('username', ['class'=>'form-control email', 'label'=>false, 'error'=>false,'placeholder'=>'Username']);?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-label col-md-10 offset-md-1 black"><label
                                    for="exampleInputPassword1"><b>Password</b></label><?php echo $this->Form->control('password', ['class'=>'form-control', 'label'=>false, 'error'=>false,'placeholder'=>'Password','type'=>'password']);?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <input type="hidden" name="data[_Token][key]" value="<?php echo $apikey; ?>" />
                            <div class="col-md-12 text-center"><button type="submit" class="btn btn-success">Login
                                    &nbsp;
                                    <i class="fa fa-sign-in"></i></button></div>
                        </div><?php echo $this->Form->End(); ?>
                    </div>
                </div>
            </div><br>
            <!-- <div class="input-field col-md-12"> -->
            <div class="form-group text-center"><label for="exampleInputPassword1"><a
                        href="<?php echo $this->Url->build('/', true)?>Users/userregistration"><i
                            class="fa fa-user-plus"></i>&nbsp;
                        New User </a></label>&nbsp;
                &nbsp;
                <span style="color:black;">|</span>&nbsp;
                &nbsp;

                <label for="exampleInputPassword1"><a
                        href="<?php echo $this->Url->build('/', true)?>Users/forgetPassword">Forgot Password <i
                            class="fa fa-question-circle"></i></a></label>
            </div>
            <!-- </div> -->
        </div>
    </div>
    <script>
    /*$(function() {
            $("#FormID").validate({
                    rules: {
                        'username': {
                            required: true
                        }

                        ,
                        'password': {
                            required: true
                        }
                    }

                    ,
                    messages: {
                        username: {
                            required: "Enter your Username"
                        }

                        ,
                        password: {
                            required: "Enter your password",
                        }
                    }
                    ,
                    // errorElement: 'div',
                    // errorPlacement: function(error, element) {
                    //     var placement = $(element).data('error');
                    //     if (placement) {
                    //         $(placement).append(error)
                    //     } else {
                    //         error.insertAfter(element);
                    //     }
                    // }
                }

            );
        }

    );*/
    
    
    $(function() {
	$("#FormID").validate({
		rules: {
			'usernameT'  				: {
				required        		: true
				
			},
			'passwordT'  				: {
				required        		: true
			
			}
		},
		messages: {
			'usernameT' 					: {
				 required        		: "Enter Username"
				
			},
			'passwordT' 					: {
				 required        		: "Enter Password"
				 
			}
		},
		submitHandler: function(form) {
		 	loginenc("<?php echo $ivkey; ?>");
			form.submit();  
		}
	});
});
function loginenc(ivd) {
	var p=$("#password").val();
	var e=$("input[name='data[_Token][key]']").val();
	var key = CryptoJS.enc.Hex.parse(e);
	var iv =  CryptoJS.enc.Hex.parse(ivd);
	var ciphertext = CryptoJS.AES.encrypt(p, key,  {iv: iv, padding: CryptoJS.pad.ZeroPadding, mode: CryptoJS.mode.CBC});
	$("#password").val(ciphertext.toString()); 
}
    </script>