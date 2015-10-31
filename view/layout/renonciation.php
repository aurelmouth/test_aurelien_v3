<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>CRM - Préfon</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="LineUP 7"/>
    <meta name="MobileOptimized" content="320">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
	
	<!-- DQE -->

    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
	

	<!-- BEGIN THEME STYLES -->
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/style-conquer.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/pages/search.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/custom.css" rel="stylesheet" type="text/css"/>

	<link type="text/css" href="<?php echo serveur_url.DS.'webroot'.DS; ?>dqe/css/redmond/jquery-ui-1.10.3.demo.css" rel="stylesheet" />
	<link type="text/css" href="<?php echo serveur_url.DS.'webroot'.DS; ?>dqe_demo.css" rel="stylesheet" />


	
	
	
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
	
</head>
<!-- BEGIN BODY -->

		<?php if($this->request->action == 'result') { ?>
	<body class="page-header-fixed">
	<?php } else {?>
	<body class="search"> 
	<?php } ?>



<!-- BEGIN HEADER -->
<div class="header navbar navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="<?php echo serveur_url.DS ?>pages/index">
                <img src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/img/logo_prefon.png" alt="Préfon"/>
            </a>
        </div>

        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <img src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/img/menu-toggler.png" alt=""/>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->


        <!-- BEGIN TOP NAVIGATION MENU -->
        <ul class="nav navbar-nav pull-right">
            <li class="devider">
                &nbsp;
            </li>
            <!-- BEGIN USER LOGIN DROPDOWN -->
            <li class="dropdown user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <i class="fa fa-user"></i>
                    <span class="username username-hide-on-mobile"><?php echo $this->Session->read('username');?></span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo Router::url('login/logout'); ?>"><i class="fa fa-key"></i> Log Out</a>
                    </li>
                </ul>
            </li>
            <!-- END USER LOGIN DROPDOWN -->
        </ul>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->





	<?php echo $content_for_layout; ?>




<!-- BEGIN COPYRIGHT -->

<div class="copyright">
    Copyright  &copy; 2015 Préfon   I  Mentions légales  I  Crédits.
</div>

<!-- END COPYRIGHT -->

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->

<script type="text/javascript" src="<?php echo serveur_url.DS.'webroot'.DS; ?>dqe/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo serveur_url.DS.'webroot'.DS; ?>dqe/js/jquery-ui-1.10.3.custom.min.js"></script>



<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>


<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/scripts/app.js"></script>


<script type="text/javascript" src="<?php echo serveur_url.DS.'webroot'.DS; ?>dqe/js/cp.js"></script>
<script type="text/javascript" src="<?php echo serveur_url.DS.'webroot'.DS; ?>dqe/js/dqe_mail.js"></script>
<script type="text/javascript" src="<?php echo serveur_url.DS.'webroot'.DS; ?>dqe/js/dqe_tele.js"></script>


<script>

jQuery(document).ready(function() {       
    App.init();
	
	$('#recipient_form input, #recipient_form select').attr('disabled', 'disabled');

});








</script>
<script src='//rum.monitis.com/get/jsbenchmark.min.js?id=105924' type='text/javascript' async='async'></script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
