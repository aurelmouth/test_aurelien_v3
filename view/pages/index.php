<!-- BEGIN SEARCH -->
<div class="content2">

    <!-- BEGIN SEARCH FORM -->


            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<div class="row">
			<?php if($_SESSION['conseillerEnLigne']['recherche']) {?>
			<div class="col-xs-6 col-sm-4 col-md-4" style="margin-bottom:10px">
				<a href="<?php echo serveur_url.DS ?>search/search"><img src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/img/screen/search.png"></a>
            </div>
			<?php } ?>
			
			<?php if($_SESSION['conseillerEnLigne']['reception_ba']) {?>
			<div class="col-xs-6 col-sm-4 col-md-4" style="margin-bottom:10px">
				<a href="<?php echo serveur_url.DS ?>receptionba/search"><img src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/img/screen/receptionBA.png"></a>
            </div>
			<?php } ?>

			<?php if($_SESSION['conseillerEnLigne']['affiliation']) {?>
			<div class="col-xs-6 col-sm-4 col-md-4" style="margin-bottom:10px">
				<a href="<?php echo serveur_url.DS ?>affiliation/result"><img src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/img/screen/affiliation.png"></a>
            </div>
			<?php } ?>
			

			<?php if($_SESSION['conseillerEnLigne']['coupon_fidelite']) {?>
			<div class="col-xs-6 col-sm-4 col-md-4" style="margin-bottom:10px">
				<a href="<?php echo serveur_url.DS ?>coupon_fid/index"><img src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/img/screen/coupon_fidel.png"></a>
            </div>
			<?php } ?>
			
			<?php if($_SESSION['conseillerEnLigne']['coupon_prospect']) {?>
			<div class="col-xs-6 col-sm-4 col-md-4" style="margin-bottom:10px">
				<a href="<?php echo serveur_url.DS ?>coupon_prospect/search"><img src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/img/screen/coupon_prospect.png"></a>
            </div>
			<?php } ?>
			
			<?php if($_SESSION['conseillerEnLigne']['bordereaux']) {?>
			<div class="col-xs-6 col-sm-4 col-md-4" style="margin-bottom:10px">
				<a href="<?php echo serveur_url.DS ?>bordereaux/result"><img src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/img/screen/bordereaux.png"></a>
            </div>
			<?php } ?>
			
			</div>




	</div>




	
	
	

<!-- END SEARCH -->