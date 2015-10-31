<!DOCTYPE html>
<html> 
	<head>
		<meta charset="utf-8"/>
		<title>Prefon CRM | Login</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
		<meta content="" name="description"/>
		<meta content="" name="author"/>
		<meta name="MobileOptimized" content="320">
		<!-- BEGIN GLOBAL MANDATORY STYLES -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
		<link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
		<!-- END GLOBAL MANDATORY STYLES -->
		<!-- BEGIN PAGE LEVEL STYLES -->
		<link rel="stylesheet" type="text/css" href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/select2/select2.css"/>
		<!-- END PAGE LEVEL SCRIPTS -->
		<!-- BEGIN THEME STYLES -->
		<link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/style-conquer.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
		<link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/pages/login.css" rel="stylesheet" type="text/css"/ >
		<link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/custom.css" rel="stylesheet" type="text/css"/>

	<!-- The Search stylesheet -->
		<link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/pages/search.css" rel="stylesheet" type="text/css"/>

		<!-- END THEME STYLES -->
		<link rel="icon" href="data:;base64,iVBORw0KGgo=">
	</head>
	
	<body class="login">


		<div class="container">
	<!-- BEGIN LOGO -->
				<div class="logo">
					<a href="<?php echo serveur_url.DS ?>pages/index">
					<img src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/img/logo_PREFON_home.png" alt=""/>
					</a>
				</div>
	<!-- END LOGO -->

		<?php echo $content_for_layout; ?>

		

<div class="copyright">
    Copyright  &copy; 2015 Préfon   I  Mentions légales  I  Crédits.
</div>

	
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/scripts/app.js" type="text/javascript"></script>
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/scripts/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
  App.init();
  Login.init();
  var action = location.hash.substr(1);
          if (action == 'createaccount') {
              $('.register-form').show();
              $('.login-form').hide();
              $('.forget-form').hide();
          } else if (action == 'forgetpassword')  {
              $('.register-form').hide();
              $('.login-form').hide();
              $('.forget-form').show();
          }
});
</script>
<script src='//rum.monitis.com/get/jsbenchmark.min.js?id=105924' type='text/javascript' async='async'></script>
</body>
</html>
