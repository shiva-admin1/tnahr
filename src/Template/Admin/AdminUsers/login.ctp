 <style>
.bs {
    box-shadow: 1px 3px 19px 5px rgba(0, 0, 0, 0.72);
    -webkit-box-shadow: 1px 3px 19px 7px rgba(0, 0, 0, 0.72);
    -moz-box-shadow: 1px 3px 19px 7px rgba(0, 0, 0, 0.72);
    border-radius: 10px;
}

.mt {
    margin-top: 4%;
}

.mx{
	margin-left: 170px;  
}

.white {
    color: white;
}

.h {
    font-family: 'Poppins'san-serif;
    font-size: 14px;
}

.cg{
  background-color:fffffff7;
}
 </style>
 <?php 
echo $this->Html->script('enc/rollups/aes');
echo $this->Html->script('enc/components/pad-zeropadding');
?>
 <span class="bg">
     <div class="row">
         <div class="col-md-8 offset-md-3 m-t-5 mx mt">
             <div class="row">
                 <div class="col-md-2">
                     <img src="<?php echo $this->Url->build('/', true)?>img/TamilNadu_Logo.png" class="img-fluid"
                         style="max-width: 75px;margin-left:100px;">
                 </div>
                 <div class="col-md-10">
                     <span class="white">
                         <h3><center><strong style="font-weight: bold;">Tamil Nadu Archives and Historical Research
                                 Department</strong><br><small><strong>Chennai</strong></small></center></h3>
						 		 
                     </span>
                 </div>
             </div>
         </div>
         <div class="col-sm-4 offset-sm-4 card m-t-30 bs mt">
             <div class="card-body cg">
                 <?php echo $this->Form->create($user,['id'=>'FormID','class'=>'form-horizontal col s12 m12', "autocomplete"=>"off",'enctype'=>'multipart/form-data']); ?>

                 <h4 class="m-t-0 header-title text-center h">Admin Login</h4><br>

                 <div class="row">

                     <div class="col-md-12 m-t-50">
                         <div class="form-group">
                             <div class="col-md-10 offset-md-1">
                                 <label class="h" for="exampleInputEmail1"><b>Username</b></label>
                                 <?php echo $this->Form->control('username',['class'=>'form-control name','label'=>false,'error'=>false]);?>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-md-10 offset-md-1">
                                 <label class="h" for="exampleInputPassword1"><b>Password</b></label>
                                 <?php echo $this->Form->control('password',['class'=>'form-control','label'=>false,'error'=>false]);?>

                             </div>
                         </div><br>
                          
						
                         <div class="form-group">
                              <input type="hidden" name="data[_Token][key]" value="<?php echo $apikey; ?>" />
                             <div class="col-md-12 text-center">
                                 <button type="submit" class="btn btn-secondary">Login &nbsp;<i
                                         class="fas fa-sign-in-alt"></i></button>
                             </div>
                         </div>
                         
                        <?php echo $this->Form->End();?>
                         <!--div class="input-field col-md-12">
					<div class="form-group text-center">
							<label for="exampleInputPassword1"><a href="<?php echo $this->Url->build('/', true)?>admin/Users/forgetpassword">Forgot Password <i class="fa fa-question-circle"></i></a></label>
					</div>          						
	            </div-->
                     </div>

                    
                     <div class="error-msg">
                         <i class="fa fa"></i><?php echo $this->Flash->render() ?>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </span>

 <script>
$(function() {
    $("#FormID").validate({
        rules: {
            'username': {
                required: true
            },
            'password': {
                required: true
            },


        },
        messages: {
            'username': {
                required: "Enter your Username"
            },
            'password': {
                required: "Enter your password",
            },
        },
        	submitHandler: function(form) {
		 	loginenc("<?php echo $ivkey; ?>");
			form.submit();  
		}
        /*errorElement: 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        }
         loginenc("<?php  //echo $ivkey; ?>");*/
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