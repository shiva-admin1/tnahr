<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign In | Archives and Historical Research</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <!--Loading bootstrap css-->
<?php  
			header("X-XSS-Protection: 1; mode=block;");
			header('X-Content-Type-Options: nosniff');
			header('X-Frame-Options: SAMEORIGIN');
			header('X-Frame-Options: DENY');
			header("Pragma: no-cache");
			header("Cache-Control: no-cache, no-store, must-revalidate, private");
			header("Expires: 0");
			header("strict-transport-security: max-age=0");
			header("Cache-Control: pre-check=0, post-check=0, max-age=0, s-maxage=0");
			header("Content-Security-Policy: default-src 'self' 'unsafe-inline' 'unsafe-eval' 'script-src-elem';");
		?>
    <?php echo $this->Html->css('admin/jquery-ui-custom'); ?>
    <?php echo $this->Html->css('admin/font-awesome/css/all.min'); ?>
<?php echo $this->Html->css('bootstrap.min'); ?>




    <!--Loading style-->
    <?php echo $this->Html->css('admin/themes/style1/pink-blue'); ?>
    <?php echo $this->Html->css('admin/style-responsive'); ?>
    <?php echo $this->Html->script('admin/jquery.min');?>
    <?php echo $this->Html->script('admin/jquery-ui');?>
    <?php echo $this->Html->script('admin/bootstrap/js/bootstrap.min');?>
    <?php echo $this->Html->script('admin/jquery-validate/jquery.validate.min');?>
    <link rel="shortcut icon" href="<?php echo $this->Url->build('/', true)?>img/logo_small.png">
    <style type="text/css">
    html {
        font-size: inherit;
    }

    h4.header-title {
        font-size: 28px;
        font-weight: bold;
        padding: 10px 0;
        margin: 0;
        color: #333;
    }

    .admin-login-bg {
        background-image: url('<?php echo $this->Url->build('/', true)?>img/login-bg2.png');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
    </style>
</head>

<body id="signin-page">
    <div id="login-page">

        <div class="col-md-12 admin-login-bg " style="min-height: 500px;height: 100vh;">
            <!-- <div class="col-md-4 col-md-offset-8 col-xs-12 pull-right login-title">
				<h2 class="h2 text-right" style="color: #3B5998;line-height: 40px;text-transform: uppercase;">Real Time Project Proposal Funds Monitoring System</h2>
			</div> -->
            <?php echo $this->fetch('content'); ?>
            <?php echo $this->Flash->render() ?>
        </div>
    </div>

    <!-- Footer -->
    <!-- <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                  Copyright ©
            <script type="text/javascript">
              document.write(new Date().getFullYear());
            </script> <a class="grey-text text-lighten-4" href="http://www.tnarchives.tn.gov.in/" target="_blank">Archives and Historical Research</a> All rights reserved.
       
                            </div>
                        </div>
                    </div>
                </footer> -->
    <!-- End Footer -->

</body>

</html>

<script type="text/javascript">
$(document).on("input", ".lettersonly", function() {
    this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
});
$(document).on("input", ".num", function() {
    this.value = this.value.replace(/[^0-9\.]/g, '');
});
$(document).on("input", ".alphanumeric", function() {
    this.value = this.value.replace(/[^a-zA-Z0-9\s]/g, '');
});
</script>