<!DOCTYPE html>
<html lang="en">
<head><title>Sign In | TIIC</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
    <!--Loading bootstrap css-->
    
	<?php echo $this->Html->css('admin/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.css'); ?>
	<?php echo $this->Html->css('admin/font-awesome/css/font-awesome.min'); ?>
	<!-- <?php echo $this->Html->css('admin/bootstrap/css/bootstrap.min'); ?> -->

			 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

	
   
    <!--Loading style-->
	<?php echo $this->Html->css('admin/themes/style1/pink-blue'); ?>
	<?php echo $this->Html->css('admin/style-responsive'); ?>
	<?php echo $this->Html->script('admin/jquery-1.10.2.min');?>
	<?php echo $this->Html->script('admin/jquery-ui');?>
	<?php echo $this->Html->script('admin/bootstrap/js/bootstrap.min');?>
	<?php echo $this->Html->script('admin/jquery-validate/jquery.validate.min');?>
    <link rel="shortcut icon" href="<?php echo $this->Url->build('/', true)?>img/logo_small.png">
    <style type="text/css">
    	html{font-size: inherit;}
        div#login-page {
            padding: 5px 0;
            padding-top: 5px;
            padding-bottom: 5px;
            border-bottom: 4px solid rgb(39, 136, 191)!important;
        }
        h4.header-title{font-size: 28px;font-weight: bold;padding: 10px 0; margin: 0;}
    </style>
</head>
<body id="signin-page">
	 <div id="login-page">
         
          <div class="container-fluid" style="background-color:#007fe0;">
			<div class="page-title-box">
				<h4 class="text-center">
					<span class="col-md-12 col-xs-12"><img src="<?php echo $this->Url->build('/', true)?>img/logo.png" class="img-responsive" style="margin: 0 auto;"></span>
				</h4>

			</div>
		</div>
				
		<div class="col-md-12" style="background:url('<?php echo $this->Url->build('/', true)?>img/bg-pattern.jpg');min-height: 500px;">
			<!-- <div class="col-md-4 col-md-offset-8 col-xs-12 pull-right login-title">
				<h2 class="h2 text-right" style="color: #3B5998;line-height: 40px;text-transform: uppercase;">Real Time Project Proposal Funds Monitoring System</h2>
			</div> -->
			<?php echo $this->fetch('content'); ?>	
			<?= $this->Flash->render() ?>	
		</div>
	  </div>

	  <!-- Footer -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                  Copyright ©
            <script type="text/javascript">
              document.write(new Date().getFullYear());
            </script> <a class="grey-text text-lighten-4" href="https://www.tiic.org/" target="_blank">TIIC</a> All rights reserved.
       
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->

</body>

</html>

<script type="text/javascript">
$(document).on("input", ".lettersonly", function() {
	this.value = this.value.replace(/[^a-zA-Z\s]/g,'');
});
$(document).on("input", ".num", function() {
	this.value = this.value.replace(/[^0-9\.]/g,'');
});
$(document).on("input", ".alphanumeric", function() {
	this.value = this.value.replace(/[^a-zA-Z0-9\s]/g,'');
});
</script>