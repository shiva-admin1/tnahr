<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign In | Archives and Historical Research</title>
	<?php  
			  $allowedHost = 'digitamilnaduarchives.tn.gov.in';
            $requestHost = $_SERVER['HTTP_HOST'];
	    if ($requestHost !== $allowedHost) {
                header("HTTP/1.1 400 Bad Request");
                exit("Invalid hostname");
            }
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
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
    <!--<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
		-->
    <link rel="shortcut icon" href="/img/logo_small.png">
    <link rel="apple-touch-icon" href="images/icons/favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icons/favicon-114x114.png">
    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet"
        href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
    <?php 	echo $this->Html->css('admin/font-awesome/css/all.min');?>
    <?php 	echo $this->Html->css('admin/font-awesome/css/font-awesome.min');?>
    <?php 	echo $this->Html->css('admin/bootstrap/css/bootstrap.min');?>
    <!--LOADING STYLESHEET FOR PAGE-->
    <?php 	echo $this->Html->css('admin/intro.js/introjs');?>
    <?php 	echo $this->Html->css('admin/calendar/zabuto_calendar.min');?>
    <?php 	echo $this->Html->css('admin/sco.message/sco.message');?>

    <!--Loading style vendors-->
    <?php 	echo $this->Html->css('admin/animate.css/animate');?>
    <?php 	echo $this->Html->css('admin/jquery-pace/pace');?>
    <?php 	echo $this->Html->css('admin/iCheck/skins/all');?>
    <?php 	echo $this->Html->css('admin/jquery-notific8/jquery.notific8.min');?>
    <!--Loading style-->
    <?php 	echo $this->Html->css('admin/themes/style2/pink-violet');?>
    <?php 	echo $this->Html->css('admin/themes/style2/jplist-custom');?>
    <?php 	//echo $this->Html->css('admin/themes/style1/orange-grey');?>
    <?php 	echo $this->Html->css('admin/style-responsive');?>
    <?php   echo $this->Html->css('admin/bootstrap-clockface/css/clockface');?>
    <?php 	echo $this->Html->css('admin/bootstrap-datepicker/css/datepicker');?>
    <?php 	echo $this->Html->css('admin/bootstrap-timepicker/css/bootstrap-timepicker');?>
    <?php 	echo $this->Html->css('admin/bootstrap-select/bootstrap-select.min');?>
    <?php 	echo $this->Html->css('admin/multi-select/css/multi-select-madmin');?>
    <?php 	echo $this->Html->css('admin/jquery-bootstrap-wizard/custom');?>

    <?php echo $this->Html->css('admin/DataTables/media/css/jquery.dataTables');?>
    <?php echo $this->Html->css('admin/DataTables/extensions/TableTools/css/dataTables.tableTools.min');?>
    <?php echo $this->Html->css('admin/DataTables/media/css/dataTables.bootstrap');?>
    <?php 	echo $this->Html->css('zozotabs/zozo.examples.min');?>
    <?php 	echo $this->Html->css('zozotabs/zozo.tabs.min');?>
    <?php 	echo $this->Html->css('zozotabs/zozo.tabs.flat.min');?>
    <?php 	echo $this->Html->css('admin/select2/select2');?>
    <?php echo $this->Html->script('admin/jquery-ui');?>
    <?php echo $this->Html->script('admin/jquery.min');?>
    <?php echo $this->Html->script('admin/jquery-migrate.min');?>
    <?php echo $this->Html->script('admin/custom');?>



    <!--loading bootstrap js-->
    <?php echo $this->Html->script('admin/bootstrap/js/bootstrap.min');?>
    <?php echo $this->Html->script('admin/bootstrap-hover-dropdown/bootstrap-hover-dropdown');?>
    <?php echo $this->Html->script('admin/html5shiv');?>
    <?php echo $this->Html->script('admin/respond.min');?>
    <?php echo $this->Html->script('admin/metisMenu/jquery.metisMenu');?>
    <?php echo $this->Html->script('admin/jquery-cookie/jquery.cookie');?>
    <?php echo $this->Html->script('admin/iCheck/icheck.min');?>
    <?php echo $this->Html->script('admin/iCheck/custom.min');?>
    <?php echo $this->Html->script('admin/jquery-notific8/jquery.notific8.min');?>
    <?php echo $this->Html->script('admin/jquery.menu');?>
    <?php echo $this->Html->script('admin/jquery-pace/pace.min');?>
    <?php echo $this->Html->script('admin/holder/holder');?>
    <?php echo $this->Html->script('admin/responsive-tabs/responsive-tabs');?>
    <?php echo $this->Html->script('admin/jquery-news-ticker/jquery.newsTicker.min');?>
    <?php echo $this->Html->script('admin/bootstrap-clockface/js/clockface');?>
    <?php echo $this->Html->script('admin/bootstrap-datepicker/js/bootstrap-datepicker');?>
    <?php echo $this->Html->script('admin/bootstrap-switch/js/bootstrap-switch.min');?>
    <?php echo $this->Html->script('admin/jquery-maskedinput/jquery-maskedinput');?>
    <?php echo $this->Html->script('admin/bootstrap-timepicker/js/bootstrap-timepicker');?>
    <?php echo $this->Html->script('admin/bootstrap-select/bootstrap-select.min');?>
    <?php echo $this->Html->script('admin/multi-select/js/jquery.multi-select');?>
    <?php echo $this->Html->script('admin/DataTables/media/js/jquery.dataTables');?>
    <?php echo $this->Html->script('admin/DataTables/media/js/dataTables.bootstrap');?>
    <?php echo $this->Html->script('jquery.battatech.excelexport.min');?>
    <?php echo $this->Html->script('moment.min');?>
    <!--CORE JAVASCRIPT-->
    <?php echo $this->Html->script('admin/main');?>
    <?php echo $this->Html->script('admin/intro.js/intro');?>
    <?php echo $this->Html->script('admin/form-components');?>
    <?php echo $this->Html->script('admin/ui-dropdown-select');?>

    <!-- form validation -->
    <?php echo $this->Html->script('admin/jquery-validate/jquery.validate.min');?>
    <?php echo $this->Html->script('admin/form-validation');?>
    <?php echo $this->Html->script('admin/jquery-bootstrap-wizard/jquery.bootstrap.wizard.min');?>
    <?php echo $this->Html->script('admin/form-wizard');?>
    <?php echo $this->Html->script('admin/table-datatables');?>
    <?php echo $this->Html->script('tinymce/tinymce.min');?>
    <?php echo $this->Html->script('additional-methods');?>
    <?php echo $this->Html->script('zozotabs/zozo.tabs.min');?>

    <?php echo $this->Html->css('admin/select2/select2');?>
    <?php echo $this->Html->script('admin/select2/select2.min');?>
    <!--script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=zkbwogx23kfcisfrgl2klie111psw4tpaeaqkq68lej39x0r"></script-->
	<style>
	body.sidebar-collapsed #page-wrapper{margin:0!important;}
	</style>
</head>
<style>
.white {
color:#ffff;

}
</style>
<body class="header-static  pace-done sidebar-collapsed">
	<div id="header-topbar-option-demo" class="page-header-topbar">
		<nav id="topbar" role="navigation" style="margin-bottom: 0; z-index: 2;" class="navbar navbar-default navbar-static-top">
			 <div class="navbar-header">                
				   <?php echo $this->Html->link('<img width="50" height="50" src="'. $this->Url->build('/', true).'img/TamilNadu_Logo.png" class="img-responsive" /> <span style="display: none" class="logo-text-icon">TNAHR</span>',['controller' => 'RtiRequestRecords','action'=>'index'], ['id' => 'logo', 'class' => 'navbar-brand', 'escape' => false]);?>
			  </div>  
			<div class="topbar-main"> 
				<ul class="nav navbar navbar-top-links navbar-right mbn">                   
				   <li class="topbar-user"><?php echo $this->Html->link('<i class="submenu-title"></i><span class="menu-title white">Home</span>',array('admin'=>false,'controller' => 'RtiRequestRecords','action'=>'index'), array('escape' => false));?>
					</li>								
					<li class="topbar-user"><?php echo $this->Html->link('<i class="submenu-title"></i><span class="menu-title white">Apply RTI</span>',array('admin'=>false,'controller' => 'RtiRequestRecords','action'=>'add'), array('escape' => false));?>
					</li>
					<li class="dropdown topbar-user"><a data-hover="dropdown" href="javascript:void(0);" class="dropdown-toggle">&nbsp;<span class="hidden-xs white">Welcome,
								<?php echo $LOGGEDNAME;?></span>&nbsp;<span class="caret white"></span></a>
						<ul class="dropdown-menu dropdown-user pull-right">
							<li><?php  echo $this->Html->link('<i class="fa fa-pencil"></i>Edit Profile',array('admin'=>false,'controller' => 'users','action'=>'edit'), array('escape' => false));?></li>
							<li><?php  echo $this->Html->link('<i class="fa fa-user"></i>Change Password',array('admin'=>false,'controller' => 'users','action'=>'changepassword'), array('escape' => false));?></li>
							<li><?php  echo $this->Html->link('<i class="fa fa-mobile"></i>&nbsp;Change Mobile Number',['controller' => 'Users','action'=>'changemobileno'], ['escape' => false]);?>
                                </li>
<li><?php  echo $this->Html->link('<i class="fa fa-power-off"></i>Log Out',array('admin'=>false,'controller' => 'users','action'=>'logout'), array('escape' => false));?></li>
						</ul>
					</li>						
				</ul>
			</div> 
		</nav>
		<div id="page-wrapper">
			<div class="page-content">
				<?php echo $this->Flash->render() ?>
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
		<div id="footer">
			<div class="copyright">Developed by &nbsp; &nbsp;<a href="http://mslabs.in" target="_blank">Muthu Soft labs</a></div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
function lsTest() {
    var test = 'test';
    try {
        localStorage.setItem(test, test);
        localStorage.removeItem(test);
        return true;
    } catch (e) {
        return false;
    }
}

// listen to storage event
window.addEventListener('storage', function(event) {
    // do what you want on logout-event
    if (event.key == 'logout-event') {
        //$('#console').html('Received logout event! Insert logout script here.');
        window.location.href = "<?php echo $this->Url->build('/', true)?>/users/logout";
    }
}, false);

$(document).ready(function() {
    // Restrict form submit on enter
    $(window).keydown(function(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });

    if (lsTest()) {
        $('#logout').on('click', function() {
            // change logout-event and therefore send an event
            localStorage.setItem('logout-event', 'logout' + Math.random());
            return true;
        });
    } else {
        // setInterval or setTimeout
    }
});
</script>

<script type="text/javascript">
$(document).on("input", ".name", function() {
    this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
});
$(document).on("input", ".num", function() {
    this.value = this.value.replace(/[^0-9\.]/g, '');
});
$(document).on("input", ".alphanumeric", function() {
    this.value = this.value.replace(/[^a-zA-Z0-9\s]/g, '');
});

jQuery('body').on('keyup', '.amount', function(e) {
    this.value = this.value.replace(/[^0-9\.]/g, '').replace(/  +/g, ' ');
});
</script>
