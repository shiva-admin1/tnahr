<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign In | Tamil Nadu Archives and Historical Research</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
    <link rel="shortcut icon" href="/img/logo_small.png">
    <link rel="apple-touch-icon" href="images/icons/favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icons/favicon-114x114.png">
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
    //	header("Content-Security-Policy: default-src 'self' 'unsafe-inline' 'unsafe-eval' 'script-src-elem';");
    header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval'; style-src 'self' 'unsafe-inline'; frame-ancestors 'self';");
    $value = session_id();
    header("Set-Cookie: Tnhra=$value; path=/;HttpOnly;Secure;SameSite=Strict;");
    ?>
    <?php echo $this->Html->css('admin/font-awesome/css/all'); ?>
    <?php echo $this->Html->css('admin/font-awesome/css/fontawesome'); ?>
    <?php echo $this->Html->css('admin/bootstrap/css/bootstrap.min'); ?>
    <!--LOADING STYLESHEET FOR PAGE-->
    <?php echo $this->Html->css('admin/intro.js/introjs'); ?>
    <?php echo $this->Html->css('admin/calendar/zabuto_calendar.min'); ?>
    <?php echo $this->Html->css('admin/sco.message/sco.message'); ?>

    <!--Loading style vendors-->
    <?php echo $this->Html->css('admin/animate.css/animate'); ?>
    <?php echo $this->Html->css('admin/jquery-pace/pace'); ?>
    <?php echo $this->Html->css('admin/iCheck/skins/all'); ?>
    <?php echo $this->Html->css('admin/jquery-notific8/jquery.notific8.min'); ?>
    <!--Loading style-->
    <?php echo $this->Html->css('admin/themes/style2/pink-violet'); ?>
    <?php echo $this->Html->css('admin/themes/style2/jplist-custom'); ?>
    <?php     //echo $this->Html->css('admin/themes/style1/orange-grey');
    ?>
    <?php echo $this->Html->css('admin/style-responsive'); ?>
    <?php echo $this->Html->css('admin/bootstrap-clockface/css/clockface'); ?>
    <?php echo $this->Html->css('admin/bootstrap-datepicker/css/datepicker'); ?>
    <?php echo $this->Html->css('admin/bootstrap-timepicker/css/bootstrap-timepicker'); ?>
    <?php echo $this->Html->css('admin/bootstrap-select/bootstrap-select.min'); ?>
    <?php echo $this->Html->css('admin/multi-select/css/multi-select-madmin'); ?>
    <?php echo $this->Html->css('admin/jquery-bootstrap-wizard/custom'); ?>

    <?php echo $this->Html->css('admin/DataTables/media/css/jquery.dataTables'); ?>
    <?php echo $this->Html->css('admin/DataTables/extensions/TableTools/css/dataTables.tableTools.min'); ?>
    <?php echo $this->Html->css('admin/DataTables/media/css/dataTables.bootstrap'); ?>
    <!-- <?php echo $this->Html->css('zozotabs/zozo.examples.min'); ?>
    <?php echo $this->Html->css('zozotabs/zozo.tabs.min'); ?>
    <?php echo $this->Html->css('zozotabs/zozo.tabs.flat.min'); ?> -->
    <?php echo $this->Html->css('admin/select2/select2'); ?>
    <?php echo $this->Html->script('admin/jquery-ui'); ?>
    <?php echo $this->Html->script('admin/jquery.min'); ?>
    <?php echo $this->Html->script('admin/jquery-migrate.min'); ?>
    <?php echo $this->Html->script('admin/custom'); ?>



    <!--loading bootstrap js-->
    <?php echo $this->Html->script('admin/bootstrap/js/bootstrap.min'); ?>
    <?php echo $this->Html->script('admin/bootstrap-hover-dropdown/bootstrap-hover-dropdown'); ?>
    <?php echo $this->Html->script('admin/html5shiv'); ?>
    <?php echo $this->Html->script('admin/respond.min'); ?>
    <?php echo $this->Html->script('admin/metisMenu/jquery.metisMenu'); ?>
    <?php echo $this->Html->script('admin/jquery-cookie/jquery.cookie'); ?>
    <?php echo $this->Html->script('admin/iCheck/icheck.min'); ?>
    <?php echo $this->Html->script('admin/iCheck/custom.min'); ?>
    <?php echo $this->Html->script('admin/jquery-notific8/jquery.notific8.min'); ?>
    <?php echo $this->Html->script('admin/jquery.menu'); ?>
    <?php echo $this->Html->script('admin/jquery-pace/pace.min'); ?>
    <?php echo $this->Html->script('admin/holder/holder'); ?>
    <?php echo $this->Html->script('admin/responsive-tabs/responsive-tabs'); ?>
    <?php echo $this->Html->script('admin/jquery-news-ticker/jquery.newsTicker.min'); ?>
    <?php echo $this->Html->script('admin/bootstrap-clockface/js/clockface'); ?>
    <?php echo $this->Html->script('admin/bootstrap-datepicker/js/bootstrap-datepicker'); ?>
    <?php echo $this->Html->script('admin/bootstrap-switch/js/bootstrap-switch.min'); ?>
    <?php echo $this->Html->script('admin/jquery-maskedinput/jquery-maskedinput'); ?>
    <?php echo $this->Html->script('admin/bootstrap-timepicker/js/bootstrap-timepicker'); ?>
    <?php echo $this->Html->script('admin/bootstrap-select/bootstrap-select.min'); ?>
    <?php echo $this->Html->script('admin/multi-select/js/jquery.multi-select'); ?>
    <?php echo $this->Html->script('admin/DataTables/media/js/jquery.dataTables'); ?>
    <?php echo $this->Html->script('admin/DataTables/media/js/dataTables.bootstrap'); ?>
    <?php echo $this->Html->script('jquery.battatech.excelexport.min'); ?>
    <?php echo $this->Html->script('moment.min'); ?>
    <?php echo $this->Html->script('print'); ?>
    <!--CORE JAVASCRIPT-->
    <?php echo $this->Html->script('admin/main'); ?>
    <?php echo $this->Html->script('admin/intro.js/intro'); ?>
    <?php echo $this->Html->script('admin/form-components'); ?>
    <?php echo $this->Html->script('admin/ui-dropdown-select'); ?>

    <!-- form validation -->
    <?php echo $this->Html->script('admin/jquery-validate/jquery.validate.min'); ?>
    <?php echo $this->Html->script('admin/form-validation'); ?>
    <?php echo $this->Html->script('admin/jquery-bootstrap-wizard/jquery.bootstrap.wizard.min'); ?>
    <?php echo $this->Html->script('admin/form-wizard'); ?>
    <?php echo $this->Html->script('admin/table-datatables'); ?>
    <?php echo $this->Html->script('tinymce/tinymce.min'); ?>
    <?php echo $this->Html->script('additional-methods'); ?>
    <!-- <?php echo $this->Html->script('zozotabs/zozo.tabs.min'); ?> -->

    <?php echo $this->Html->css('admin/select2/select2'); ?>
    <?php echo $this->Html->script('admin/select2/select2.min'); ?>


    <!--script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=zkbwogx23kfcisfrgl2klie111psw4tpaeaqkq68lej39x0r"></script-->
</head>

<body class="sidebar-colors header-static">
    <style>
        #hvr:hover {
            backgroud-color: #607b8a;
            color: #ffffff;
        }

        .sorting_disabled {
            pointer-events: none;
        }

        .icn {
            margin-left: 120px;
            margin-top: 3px;
            color: #000;
            transition: .5s ease;
        }

        #colap:focus .icn,
        #colap:hover .icn {
            color: #ffffff;
            transform: rotate(90deg);
        }

        .rotate-arrow:focus .go-d,
        .rotate-arrow:focus .go-t {
            transform: rotate(180deg);
        }

        .rotate-arrow:focus .beic-d,
        .rotate-arrow:focus .beic-t {
            transform: rotate(180deg);
        }

        .rotate-arrow:focus .vr-c,
        .rotate-arrow:focus .vr-t {
            transform: rotate(180deg);
        }


        .icn.arrow-down {
            transform: rotate(90deg) translateX(-.4em);
        }
    </style>
    <div>
        <div id="header-topbar-option-demo" class="page-header-topbar">
            <nav id="topbar" role="navigation" style="margin-bottom: 0; z-index: 2;"
                class="navbar navbar-default navbar-static-top">
                <?php if ($LOGGED_GROUP != 6) {  ?>
                    <div class="navbar-header">
                        <button type="button" data-toggle="collapse" data-target=".sidebar-collapse"
                            class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span
                                class="icon-bar"></span><span class="icon-bar"></span><span
                                class="icon-bar"></span></button>
                        <?php echo $this->Html->link('<img width="50" height="50" src="' . $this->Url->build('/', true) . 'img/TamilNadu_Logo.png" class="img-responsive" /> <span style="display: none" class="logo-text-icon">TIIC</span>', ['controller' => 'Reports', 'action' => 'dashboard'], ['id' => 'logo', 'class' => 'navbar-brand', 'escape' => false]); ?>
                    </div>
                <?php } else { ?>
                    <div class="navbar-header">
                        <button type="button" data-toggle="collapse" data-target=".sidebar-collapse"
                            class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span
                                class="icon-bar"></span><span class="icon-bar"></span><span
                                class="icon-bar"></span></button>
                        <a id='logo' class='navbar-brand'><span class="fa fa-rocket"></span><img src="/img/logo_small.png"
                                class="img-responsive" /> <span style="display: none"
                                class="logo-text-icon">TNAHR</span></a>
                    </div>
                <?php } ?>
                <div class="topbar-main hidden-xs"><a id="menu-toggle" href="#" class="hidden-xs"><i
                            class="fa fa-bars"></i></a>
                    <ul class="nav navbar navbar-top-links navbar-right mbn">
                        <li class="dropdown topbar-user"><a data-hover="dropdown" href="#"
                                class="dropdown-toggle">&nbsp;<span class="hidden-xs">Welcome,
                                    <?php echo $LOGGEDNAME; ?></span>&nbsp;<span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-user pull-right" style="margin-top: 10px;">
                                <li><?php echo $this->Html->link('<i class="fas fa-key"></i>&nbsp;Change Password', ['controller' => 'AdminUsers', 'action' => 'changepassword'], ['escape' => false]); ?>
                                </li>

                                <li><?php echo $this->Html->link('<i class="fas fa-sign-out-alt"></i>&nbsp;Logout', ['controller' => 'AdminUsers', 'action' => 'logout'], ['escape' => false]); ?>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <!--END TOPBAR-->
            <div id="wrapper">
                <!--BEGIN SIDEBAR MENU-->
                <nav id="sidebar" role="navigation" class="navbar-default navbar-static-side">
                    <div class="sidebar-collapse menu-scroll">
                        <ul id="side-menu" class="nav">
                            <li class="user-panel">
                                <div class="thumb"></div>
                                <div class="info"><span style="font-size: 0.8em;">You are logged in as,</span>
                                    <h4><?php echo $LOGGEDNAME; ?></h4>
                                </div>
                                <!-- <div class="clearfix"></div> -->
                            </li>
                            <?php if (in_array($LOGGED_ROLE, array(1))) {  // Research Officer 
                            ?>
                                <!-- <li <//?php if ($this->request->getParam('controller') == 'reports') { ?>class="active"
                                    <?php //} 
                                    ?>>
                                    <//?php echo $this->Html->link('<i class="fas fa-project-diagram">&nbsp;<div class="icon-bg bg-yellow"></div></i> <span class="menu-title">Document Request Dashboard</span>', array('controller' => 'reports', 'action' => 'rtidashboard'), array('escape' => false, 'class' => '')); ?>

                                </li> -->
                                <li <?php if ($this->request->getParam('controller') == 'dashboard') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="fas fa-chart-line">&nbsp;<div class="icon-bg bg-yellow"></div></i> <span class="menu-title">Dashboard</span>', array('controller' => 'reports', 'action' => 'dashboard'), array('escape' => false, 'class' => '')); ?>

                                </li>

                                <!-- <li <//?php if ($this->request->getParam('controller') == 'rti_request_records') { ?>class="active"
                                    <?php //} 
                                    ?>>
                                    <//?php echo $this->Html->link('<i class="fas fa-mail-bulk">&nbsp;<div class="icon-bg bg-yellow"></div></i> <span class="menu-title">Record Requests</span>', array('controller' => 'rti_request_records', 'action' => 'rti_details'), array('escape' => false, 'class' => '')); ?>

                                </li> -->
                                <!-- <li <? //php if ($this->request->getParam('controller') == 'OsrRecords') { 
                                            ?>class="active"
                                    <? //php } 
                                    ?>>
                                    <? //php echo $this->Html->link('<i class="fas fa-search">&nbsp;<div class="icon-bg bg-yellow"></div></i> <span class="menu-title">OSR Records</span>', array('controller' => 'OsrRecords', 'action' => 'searchosr'), array('escape' => false, 'class' => '')); 
                                    ?>

                                </li> -->

                                <li <?php if ($this->request->getParam('controller') == 'OsrRecords') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="fas fa-file-alt fa-fw">&nbsp;<div class="icon-bg bg-yellow"></div></i> <span class="menu-title">OSR Records</span>', array('controller' => 'OsrRecords', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>
                                <li <?php if ($this->request->getParam('controller') == 'IfrRecords') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="fas fa-file-alt fa-fw">&nbsp;<div class="icon-bg bg-yellow"></div></i> <span class="menu-title">Inam Fair Register</span>', array('controller' => 'IfrRecords', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>
                                <li <?php if ($this->request->getParam('controller') == 'IndicesRecords') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="fas fa-file-alt fa-fw">&nbsp;<div class="icon-bg bg-yellow"></div></i> <span class="menu-title">Indices Records</span>', array('controller' => 'IndicesRecords', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>
                                <li <?php if ($this->request->getParam('controller') == 'BeicRecords') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="fas fa-file-alt fa-fw">&nbsp;<div class="icon-bg bg-yellow"></div></i> <span class="menu-title">Pre 1857 records(1670 to 1857 A.D)</span>', array('controller' => 'BeicRecords', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>

                                <li <?php if ($this->request->getParam('controller') == 'BpRecords') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="fas fa-file-alt fa-fw">&nbsp;<div class="icon-bg bg-yellow"></div></i> <span class="menu-title">Board Proceedings</span>', array('controller' => 'BpRecords', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>

                                <li <?php if ($this->request->getParam('controller') == 'GoRecords') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="fas fa-file-pdf fa-fw">&nbsp;<div class="icon-bg bg-yellow"></div></i> <span class="menu-title">Government Order</span>', array('controller' => 'GoRecords', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>

                                <li <?php if ($this->request->getParam('controller') == 'Gazettes') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="fas fa-clipboard-list fa-fw">&nbsp;<div class="icon-bg bg-yellow"></div></i> <span class="menu-title">Gazettes</span>', array('controller' => 'Gazettes', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>

                                <li <?php if ($this->request->getParam('controller') == 'BookRecords') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="fas fa-book fa-fw"><div class="icon-bg bg-yellow"></div></i> <span class="menu-title">Books</span>', array('controller' => 'BookRecords', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>
                                <li <?php if ($this->request->getParam('controller') == 'VoterRecords') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="fas fa-poll-h fa-fw">&nbsp;<div class="icon-bg bg-yellow"></div></i> <span class="menu-title">Voter List</span>', array('controller' => 'VoterRecords', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>

                                <li <?php if ($this->request->getParam('controller') == 'FmbRecords') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="fas fa-file-export fa-fw">&nbsp;<div class="icon-bg bg-yellow"></div></i> <span class="menu-title">Field Measurement Book</span>', array('controller' => 'FmbRecords', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>


                                <li
                                    <?php $reports = array('customize_detail_report', 'customize_userentry_report', 'record_count_report', 'customize_rti_report', 'doc_fee_report', 'user_count_report');
                                    echo (in_array($this->request->getParam('action'), $reports)) ? 'class="active"' : ' '; ?>>
                                    <a href="#" id="colap">
                                        <i class="fa fa-table fa-fw">
                                            <div class="icon-bg bg-blue"></div>
                                        </i>
                                        <span class="menu-title">Reports</span><span class="fas fa-chevron-right icn"></span></a>
                                    <ul class="nav nav-second-level" id="colap-show/hide">
                                        <li
                                            <?php echo (in_array($this->request->getParam('controller'), $reports)) ? 'class="active"' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fa fa-th-large"></i>&nbsp; Record Detail Report', array('controller' => 'reports', 'action' => 'customize_detail_report'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                        <li
                                            <?php echo (in_array($this->request->getParam('controller'), $reports)) ? 'class="active"' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fa fa-th-large"></i>&nbsp; Record Count Report', array('controller' => 'reports', 'action' => 'record_count_report'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                        <li
                                            <?php echo (in_array($this->request->getParam('controller'), $reports)) ? 'class="active"' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fa fa-th-large"></i>&nbsp; User Entry Report', array('controller' => 'reports', 'action' => 'customize_userentry_report'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                        <li
                                            <?php echo (in_array($this->request->getParam('controller'), $reports)) ? 'class="active"' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fa fa-th-large"></i>&nbsp; Record Request Report', array('controller' => 'reports', 'action' => 'customize_rti_report'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                        <li
                                            <?php echo (in_array($this->request->getParam('controller'), $reports)) ? 'class="active"' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fa fa-th-large"></i>&nbsp; Document Fee Report', array('controller' => 'reports', 'action' => 'doc_fee_report'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                        <li
                                            <?php echo (in_array($this->request->getParam('controller'), $reports)) ? 'class="active"' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fa fa-th-large"></i>&nbsp; User Count Report', array('controller' => 'reports', 'action' => 'user_count_report'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                    </ul>
                                </li>







                                <li <?php if ($this->request->getParam('controller') == 'OsrRecords') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="fas fa-file-archive fa-fw">&nbsp;<div class="icon-bg bg-yellow"></div></i> <span class="menu-title">Old Settlement Register</span>', array('controller' => 'OsrRecords', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>


                                <li
                                    <?php $masters = array('Districts', 'Taluks', 'DocumentTypes', 'DocumentSubtypes', 'Roles', 'AdminUsers', 'DepartmentSections');
                                    echo (in_array($this->request->getParam('controller'), $masters)) ? 'class="active"' : ' '; ?>>
                                    <a href="#" id="colap">
                                        <i class="fas fa-th fa-fw">
                                            <!-- <div class="icon-bg bg-blue"></div> -->
                                        </i>
                                        <span class="menu-title">&nbsp;Masters</span><span class="fas fa-chevron-right icn"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li id="hvr"
                                            <?php echo (in_array($this->request->getParam('controller'), $masters)) ? 'class=""' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fas fa-chart-area"><div class="icon-bg bg-yellow"></div></i>&nbsp; Districts used in OSR', array('controller' => 'Districts', 'action' => 'osr_index'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                        <li id="hvr"
                                            <?php echo (in_array($this->request->getParam('controller'), $masters)) ? 'class=""' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fas fa-chart-area"><div class="icon-bg bg-yellow"></div></i>&nbsp; Districts used in IFR', array('controller' => 'Districts', 'action' => 'ifr_index'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                        <li id="hvr"
                                            <?php echo (in_array($this->request->getParam('controller'), $masters)) ? 'class=""' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fas fa-map-marked-alt"><div class="icon-bg bg-yellow"></div></i>&nbsp; Taluks used in OSR', array('controller' => 'Taluks', 'action' => 'osr_index'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                        <li id="hvr"
                                            <?php echo (in_array($this->request->getParam('controller'), $masters)) ? 'class=""' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fas fa-map-marked-alt"><div class="icon-bg bg-yellow"></div></i>&nbsp; Taluks used in IFR', array('controller' => 'Taluks', 'action' => 'ifr_index'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                        <li
                                            <?php echo (in_array($this->request->getParam('controller'), $masters)) ? 'class=""' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fas fa-file-alt"></i>&nbsp;Villages used in OSR', array('controller' => 'Villages', 'action' => 'index_osr'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                        <li
                                            <?php echo (in_array($this->request->getParam('controller'), $masters)) ? 'class=""' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fas fa-file-alt"></i>&nbsp;Villages used in IFR', array('controller' => 'Villages', 'action' => 'ifr_index'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                        <li id="hvr"
                                            <?php echo (in_array($this->request->getParam('controller'), $masters)) ? 'class=""' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fas fa-chart-area"><div class="icon-bg bg-yellow"></div></i>&nbsp; Districts', array('controller' => 'Districts', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                        <li id="hvr"
                                            <?php echo (in_array($this->request->getParam('controller'), $masters)) ? 'class=""' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fas fa-map-marked-alt"><div class="icon-bg bg-yellow"></div></i>&nbsp; Taluks', array('controller' => 'Taluks', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                        <li id="hvr"
                                            <?php echo (in_array($this->request->getParam('controller'), $masters)) ? 'class=""' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fas fa-map-marked-alt"><div class="icon-bg bg-yellow"></div></i>&nbsp; Villages', array('controller' => 'Villages', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                        <li
                                            <?php echo (in_array($this->request->getParam('controller'), $masters)) ? 'class=""' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fas fa-file-alt"></i>&nbsp; Record Types', array('controller' => 'DocumentTypes', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                        <li
                                            <?php echo (in_array($this->request->getParam('controller'), $masters)) ? 'class=""' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="far fa-file-alt"></i>&nbsp; Record Subtypes', array('controller' => 'DocumentSubtypes', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                        <li
                                            <?php echo (in_array($this->request->getParam('controller'), $masters)) ? 'class=""' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fa fa-user-tie"></i>&nbsp; Roles', array('controller' => 'Roles', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                        <li
                                            <?php echo (in_array($this->request->getParam('controller'), $masters)) ? 'class=""' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fab fa-elementor"></i>&nbsp; Department Sections', array('controller' => 'DepartmentSections', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                        <li
                                            <?php echo (in_array($this->request->getParam('controller'), $masters)) ? 'class=""' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fas fa-file-invoice"></i>&nbsp; Department Section &<br>&nbsp; Record Type Mapping', array('controller' => 'DepartmentSections', 'action' => 'deptsec_doc_mappings'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                        <li
                                            <?php echo (in_array($this->request->getParam('controller'), $masters)) ? 'class=""' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fas fa-users"></i>&nbsp; Admin Users', array('controller' => 'AdminUsers', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                        <li
                                            <?php echo (in_array($this->request->getParam('controller'), $masters)) ? 'class=""' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fas fa-users"></i>&nbsp; Users', array('controller' => 'AdminUsers', 'action' => 'user_details'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                    </ul>
                                </li>
                            <?php } else if ($LOGGED_ROLE == 2) { ?>

                                <li <?php if ($this->request->getParam('controller') == 'BeicRecords') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="far fa-file-alt  fa-fw"><div class="icon-bg bg-yellow"></div></i> <span class="menu-title">BEIC Records</span>', array('controller' => 'BeicRecords', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>
                                <li <?php if ($this->request->getParam('controller') == 'BookRecords') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="far fa-file-alt  fa-fw"><div class="icon-bg bg-yellow"></div></i> <span class="menu-title">Book Records</span>', array('controller' => 'BookRecords', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>
                                <li <?php if ($this->request->getParam('controller') == 'BpRecords') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="far fa-file-alt  fa-fw"><div class="icon-bg bg-yellow"></div></i> <span class="menu-title">BP Records</span>', array('controller' => 'BpRecords', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>
                                <li <?php if ($this->request->getParam('controller') == 'FmbRecords') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="far fa-file-alt  fa-fw"><div class="icon-bg bg-yellow"></div></i> <span class="menu-title">FMB Records</span>', array('controller' => 'FmbRecords', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>
                                <li <?php if ($this->request->getParam('controller') == 'Gazettes') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="far fa-file-alt  fa-fw"><div class="icon-bg bg-yellow"></div></i> <span class="menu-title">Gazettes</span>', array('controller' => 'Gazettes', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>
                                <li <?php if ($this->request->getParam('controller') == 'GoRecords') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="far fa-file-alt  fa-fw"><div class="icon-bg bg-yellow"></div></i> <span class="menu-title">GO Records</span>', array('controller' => 'GoRecords', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>
                                <li <?php if ($this->request->getParam('controller') == 'IfrRecords') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="far fa-file-alt  fa-fw"><div class="icon-bg bg-yellow"></div></i> <span class="menu-title">IFR Records</span>', array('controller' => 'IfrRecords', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>
                                <li <?php if ($this->request->getParam('controller') == 'OsrRecords') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="far fa-file-alt  fa-fw"><div class="icon-bg bg-yellow"></div></i> <span class="menu-title">OSR Records</span>', array('controller' => 'OsrRecords', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>
                                <li <?php if ($this->request->getParam('controller') == 'VoterRecords') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="far fa-file-alt  fa-fw"><div class="icon-bg bg-yellow"></div></i> <span class="menu-title">Voters Records</span>', array('controller' => 'VoterRecords', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>
                            <?php }  ?>
                            <?php if (in_array($LOGGED_ROLE, array(3))) {  ?>
                                <li <?php if ($this->request->getParam('action') == 'rti_add') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="far fa-file-alt  fa-fw"><div class="icon-bg bg-yellow"></div></i> <span class="menu-title">New Request </span>', array('controller' => 'RtiRequestRecords', 'action' => 'rti_add'), array('escape' => false, 'class' => '')); ?>

                                </li>
                            <?php } ?>

                            <?php if (in_array($LOGGED_ROLE, array(3, 4, 5, 9))) {  ?>
                                <li <?php if ($this->request->getParam('action') == 'rti_details') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="far fa-file-alt  fa-fw"><div class="icon-bg bg-yellow"></div></i> <span class="menu-title">Record Request Details</span>', array('controller' => 'RtiRequestRecords', 'action' => 'rti_details'), array('escape' => false, 'class' => '')); ?>

                                </li>

                            <?php  } ?>
                            <?php if (in_array($LOGGED_ROLE, array(3, 5, 9))) {  ?>
                                <li
                                    <?php $reports = array('customize_rti_report');
                                    echo (in_array($this->request->getParam('action'), $reports)) ? 'class="active"' : ' '; ?>>
                                    <a href="#">
                                        <i class="fa fa-table fa-fw">
                                            <div class="icon-bg bg-blue"></div>
                                        </i>
                                        <span class="menu-title">Report</span><span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li
                                            <?php echo (in_array($this->request->getParam('controller'), $reports)) ? 'class="active"' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fa fa-th-large"></i> Record Request Count Report', array('controller' => 'reports', 'action' => 'customize_rti_report'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                    </ul>
                                </li>
                            <?php }  ?>
                            <?php if (($LOGGED_SECTION == 1) && (in_array($LOGGED_ROLE, array(5, 9)))) {  ?>

                                <li <?php if ($this->request->getParam('controller') == 'OsrRecords') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="far fa-file-alt  fa-fw">&nbsp;<div class="icon-bg bg-yellow"></div></i> <span class="menu-title">OSR Records</span>', array('controller' => 'OsrRecords', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>

                                <li <?php if ($this->request->getParam('controller') == 'FmbRecords') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="far fa-file-alt  fa-fw"><div class="icon-bg bg-yellow"></div></i> <span class="menu-title">FMB Records</span>', array('controller' => 'FmbRecords', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>
                                <li <?php if ($this->request->getParam('controller') == 'IfrRecords') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="far fa-file-alt  fa-fw"><div class="icon-bg bg-yellow"></div></i> <span class="menu-title">IFR Records</span>', array('controller' => 'IfrRecords', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>


                            <?php  } ?>
                            <?php if (($LOGGED_SECTION == 2) && (in_array($LOGGED_ROLE, array(5, 9)))) {  ?>
                                <li <?php if ($this->request->getParam('controller') == 'GoRecords') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="far fa-file-alt  fa-fw"><div class="icon-bg bg-yellow"></div></i> <span class="menu-title">GO Records</span>', array('controller' => 'GoRecords', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>
                                <li <?php if ($this->request->getParam('controller') == 'BpRecords') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="far fa-file-alt  fa-fw"><div class="icon-bg bg-yellow"></div></i> <span class="menu-title">BP Records</span>', array('controller' => 'BpRecords', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>

                            <?php  } ?>
                            <?php if (($LOGGED_SECTION == 3) && (in_array($LOGGED_ROLE, array(5, 9)))) {  ?>
                                <li <?php if ($this->request->getParam('controller') == 'BeicRecords') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="fas fa-file-alt fa-fw">&nbsp;<div class="icon-bg bg-yellow"></div></i> <span class="menu-title">Pre 1857 records(1670 to 1857 A.D)</span>', array('controller' => 'BeicRecords', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>
                                </li>
                                <li <?php if ($this->request->getParam('controller') == 'Gazettes') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="far fa-file-alt  fa-fw"><div class="icon-bg bg-yellow"></div></i> <span class="menu-title">Gazettes</span>', array('controller' => 'Gazettes', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>
                                </li>

                            <?php  } ?>
                            <?php if (($LOGGED_SECTION == 4) && (in_array($LOGGED_ROLE, array(5, 9)))) {  ?>
                                <li <?php if ($this->request->getParam('controller') == 'BookRecords') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="far fa-file-alt  fa-fw"><div class="icon-bg bg-yellow"></div></i> <span class="menu-title">Book Records</span>', array('controller' => 'BookRecords', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>
                                <li <?php if ($this->request->getParam('controller') == 'VoterRecords') { ?>class="active"
                                    <?php } ?>>
                                    <?php echo $this->Html->link('<i class="far fa-file-alt  fa-fw"><div class="icon-bg bg-yellow"></div></i> <span class="menu-title">Voters Records</span>', array('controller' => 'VoterRecords', 'action' => 'index'), array('escape' => false, 'class' => '')); ?>

                                </li>
                            <?php  } ?>

                            <?php if (in_array($LOGGED_ROLE, array(4))) {  ?>
                                <li
                                    <?php $reports = array('customize_detail_report', 'customize_userentry_report', 'record_count_report', 'customize_rti_report', 'doc_fee_report');
                                    echo (in_array($this->request->getParam('action'), $reports)) ? 'class="active"' : ' '; ?>>
                                    <a href="#" id="colap">
                                        <i class="fa fa-table fa-fw">
                                            <div class="icon-bg bg-blue"></div>
                                        </i>
                                        <span class="menu-title">Reports</span><span class="fas fa-chevron-right icn"></span></a>
                                    <ul class="nav nav-second-level" id="colap-show/hide">
                                        <li
                                            <?php echo (in_array($this->request->getParam('controller'), $reports)) ? 'class="active"' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fa fa-th-large"></i>&nbsp; Record Detail Report', array('controller' => 'reports', 'action' => 'customize_detail_report'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                        <li
                                            <?php echo (in_array($this->request->getParam('controller'), $reports)) ? 'class="active"' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fa fa-th-large"></i>&nbsp; Record Count Report', array('controller' => 'reports', 'action' => 'record_count_report'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                        <li
                                            <?php echo (in_array($this->request->getParam('controller'), $reports)) ? 'class="active"' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fa fa-th-large"></i>&nbsp; User Entry Report', array('controller' => 'reports', 'action' => 'customize_userentry_report'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                        <li
                                            <?php echo (in_array($this->request->getParam('controller'), $reports)) ? 'class="active"' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fa fa-th-large"></i>&nbsp; Record Request Report', array('controller' => 'reports', 'action' => 'customize_rti_report'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                        <li
                                            <?php echo (in_array($this->request->getParam('controller'), $reports)) ? 'class="active"' : ' '; ?>>
                                            <?php echo $this->Html->link('<i class="fa fa-th-large"></i>&nbsp; Document Fee Report', array('controller' => 'reports', 'action' => 'doc_fee_report'), array('escape' => false, 'class' => '')); ?>
                                        </li>
                                    </ul>
                                </li>
                            <?php }  ?>
                            <li>
                                <?php echo $this->Html->link('<i class="fas fa-sign-out-alt fa-fw"><div class="icon-bg bg-orange"></div></i><span class="menu-title">Logout</span>', array('controller' => 'AdminUsers', 'action' => 'logout'), array('escape' => false)); ?>
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
                <!--
				<div id="footer">
					<div class="copyright">2018 </div>
				</div>
				-->
            </div>
        </div>
    </div>
</body>
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
            window.location.href = "<?php echo $this->Url->build('/', true) ?>/admin/admin_users/logout";
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

</html>
