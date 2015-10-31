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
	<link type="text/css" href="<?php echo serveur_url.DS.'webroot'.DS; ?>dqe/css/redmond/jquery-ui-1.10.3.demo.css" rel="stylesheet" />
	<link type="text/css" href="<?php echo serveur_url.DS.'webroot'.DS; ?>dqe/css/dqe_demo.css" rel="stylesheet" />


    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
	
	<link rel="stylesheet" type="text/css" href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/bootstrap-datepicker/css/datepicker.css"/>
	
	
	<link rel="stylesheet" type="text/css" href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/select2/select2.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
	
	
	
	
	<!-- BEGIN THEME STYLES -->
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/style-conquer.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/pages/tasks.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/custom.css" rel="stylesheet" type="text/css"/>



	
	
	
    <!-- END THEME STYLES -->

	
	
	<style>
		#versements td{
			padding : 4px;
		}
	
		th{
			vertical-align: top;
		}
	
		.rib_iban{
			width : 12%;
			text-align:center;
		}
		
		.rib_bic{
			width : 50%;
			text-align:center;
		}
		
		.hideme{
			display:none;
		}
	</style>
	
	<link rel="icon" href="data:;base64,iVBORw0KGgo=">
	
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed" style="min-width:400px">
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
			<?php if(isset($this->request->params[0]) && $this->request->params[0] > 0){?>
			<h3 class="nav navbar-nav" style="color:white; margin-top : 8px; font-size:1.6em">
                <?php 
				$civilite = ($this->vars['qualite_id'] > 0 && $this->vars['qualite_id'] <= 2) ? (strtoupper($_SESSION['CIVILITE'][$this->vars['qualite_id']])) : ('');
				$sous_statut = '';
				if(isset($_SESSION['SOUS_STATUT_PARTICULIER'][$this->vars['sous_statut']])){
					$sous_statut = ' ' . $_SESSION['SOUS_STATUT_PARTICULIER'][$this->vars['sous_statut']] . ' ';
				}
				echo $civilite . ' ' .$this->vars['firstName'] . ' ' . $this->vars['lastName'] . ' I ' . ' ' . $_SESSION['STATUT_PARTICULIER'][$this->vars['statut_particulier']] . $sous_statut .  ' n° ' . $this->request->params[0] . ' <small style="color:white;"> I Créée le ' . lof::convertDateFromAdobeFormat($this->vars['created']) . ((strlen($this->vars['conseiller_creation']) > 0) ? ' Par ' . $this->vars['conseiller_creation'] : '') . ' , Modifiée le ' . lof::convertDateFromAdobeFormat($this->vars['lastModified']) . '</small> ' ;
				?>
            </h3>
			<?php } ?>

        <!-- BEGIN TOP NAVIGATION MENU -->
        <ul class="nav navbar-nav pull-right">
		<!-- BEGIN PARTICULIER DROPDOWN -->
            <li class="devider">
                &nbsp;
            </li>
            <!-- BEGIN USER LOGIN DROPDOWN -->
            <li class="dropdown user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <i class="fa fa-user"></i>
                    <span class="username username-hide-on-mobile" style="font-size : small;color:white"><?php echo $_SESSION['conseillerEnLigne']['label'];?></span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo Router::url('login/logout'); ?>"><i class="fa fa-key"></i>Se déconnecter</a>
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
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-fixed">
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <!-- DOC: for circle icon style menu apply page-sidebar-menu-circle-icons class right after sidebar-toggler-wrapper -->
            <ul class="page-sidebar-menu">
                <li class="sidebar-toggler-wrapper">
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler">
                    </div>
                    <div class="clearfix">
                    </div>
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                </li>
                <li  <?php if($this->request->action == 'edit') echo 'class="active"'?>>
                    <a href="<?php if(isset($this->request->params[0])){ echo Router::url('recipient/edit/'.$this->request->params[0]);} ?> ">
                        <i class="fa fa-users"></i>
                        <span class="title">Fiche particulier</span>
                        <span class="selected"></span>
                    </a>

                </li>
				<?php if(!isset($this->vars['creation']) && $this->vars['statut_particulier'] != 1) {?>
		
                
				<?php if($this->vars['statut_particulier'] == 2){?>
				<li <?php if($this->request->action == 'pre_aff') echo 'class="active"'?>>
                    <a href="<?php if(isset($this->request->params[0])){ echo Router::url('recipient/pre_aff/'.$this->request->params[0]);} ?>">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="title">Pré-affiliation</span>
                    </a>

                </li>
				<?php } ?>

				<?php if($this->vars['statut_particulier'] == 3){?>
				<li <?php if($this->request->action == 'contracts' || $this->request->action == 'contract_details') echo 'class="active"'?>>
                    <a href="<?php if(isset($this->request->params[0])){ echo Router::url('recipient/contracts/'.$this->request->params[0]);} ?>">
                        <i class="fa fa-folder-open-o"></i>
                        <span class="title">Vos contrats</span>
                    </a>

                </li>
				<?php } ?>

				
				<li <?php if($this->request->action == 'simulations' || $this->request->action == 'simulation_details' || $this->request->action == 'add_simulation') echo 'class="active"'?>>
					<a href="<?php if(isset($this->request->params[0])){ echo Router::url('recipient/simulations/'.$this->request->params[0]);} ?>">
						<i class="fa fa-history"></i>
						<span class="title">Simulations</span>
					</a>
				</li>
		
				<li <?php if($this->request->action == 'events' || $this->request->action == 'add_event' ||  $this->request->action == 'edit_event' ) echo 'class="active"'?>>
					<a href="<?php if(isset($this->request->params[0])){ echo Router::url('recipient/events/'.$this->request->params[0]);} ?>">
						<i class="fa fa-history"></i>
						<span class="title">Evènements</span>
					</a>
				</li>
				
				<?php if($_SESSION['conseillerEnLigne']['droits'] >= 3){?>
				<li <?php if($this->request->action == 'demandes_edition') echo 'class="active"'?>>
					<a href="<?php if(isset($this->request->params[0])){ echo Router::url('recipient/demandes_edition/'.$this->request->params[0]);} ?>">
						<i class="fa fa-history"></i>
						<span class="title">Demandes d'édition</span>
					</a>
				</li>
				<?php } ?>
				<?php } ?>
				<li>
					&nbsp;
				</li>
				
				<li>
					<a href="<?php echo Router::url('search/result/'); ?>">
						<i class="fa fa-search"></i>
						<span class="title">Retour aux résultats de la recherche</span>
					</a>
				</li>
				
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
    </div>
    <!-- END SIDEBAR -->
<!-- BEGIN CONTENT -->

    <div class="page-content-wrapper" style="padding-top:0px;">
        <div class="page-content">
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

            <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

            <!-- BEGIN PAGE HEADER-->
			<?php if(isset($this->request->params[0])) { ?>
			<!--<div style="position:fixed; z-index:10000; background-color:white; margin-top:0px">-->

			
			
            <!-- END PAGE HEADER-->
			<?php if($this->vars['statut_particulier'] != 1 ) {?>
			<div id="bandeau_vert" class="alert alert-dismissable alert-success col-md-12">
					<?php 
					if($this->request->data->domScores->getElementsByTagName('scoring') != null){
					echo '<div class="col-md-12">';
					foreach ($this->request->data->domScores->getElementsByTagName('scoring') as $scores) { 
					if(!($this->vars['statut_particulier'] == 3 && $scores->getAttribute('code_score') == 1)) {?>
					<div id="bandeau_vert_scores" class="col-md-4">
					<span class="label label-sm label-icon label-warning">
						<?php for($i = 1; $i <= $_SESSION['SCORING_SCORES'][$_SESSION['SCORING_LABELS'][$scores->getAttribute('code_score')]]; $i++){
							if($i <= $scores->getAttribute('valeur_score')){
								echo '<i class="fa fa-star"></i>';
							}else{
								echo '<i class="fa fa-star-o"></i>';
							}
						}?>
					</span>&nbsp;<span style="color:black"><?php echo $_SESSION['SCORING_LABELS'][$scores->getAttribute('code_score')];?></span><br/><br/>
					</div>
					<?php }
					}
					echo '</div>';			
					}?>


						<div id="bandeau_vert_infos" class="col-md-12">
						<?php if(isset($_SESSION['ZONE_GEOGRAPHIQUE'][substr($this->vars['code_postal'], 0, 2)]) && $this->vars['statut_particulier'] == '2'){?>
						<div class="col-md-4" style="color:black"><span ><i class="fa fa-map-marker" ></i> &nbsp;<span><?php echo $_SESSION['ZONE_GEOGRAPHIQUE'][substr($this->vars['code_postal'], 0, 2)];?></span></span><br/><br/></div>
						<?php } ?>
						<?php if(isset($this->vars['points_acquis_bruts']) && $this->vars['points_acquis_bruts'] > 0){?>
							<div class="col-md-4" style="color:black"><span><i class="fa fa-dot-circle-o"></i> &nbsp;<span>Points à date : <?php echo round($this->vars['points_acquis_bruts']);?></span></span><br/><br/></div>
						<?php } ?>
						</div>
						<?php
						if($this->request->action != "events" && $this->request->action != "add_event" && $this->request->action != "edit_event"){
						$events = new stdClass();
						foreach($this->request->data->domLastEvents->getElementsByTagName('evenement') as $events){?>
						<div id="bandeau_vert_events"class="col-md-12" style="color:black"><i class="fa fa-calendar"></i>&nbsp; &nbsp;<?php
						if(isset($_SESSION['MODE_EVENEMENT_ALL'][$events->getAttribute('MODE_EVENEMENT_Id')])){
							$mode = $_SESSION['MODE_EVENEMENT_ALL'][$events->getAttribute('MODE_EVENEMENT_Id')];
						}else{
							$mode = '';
						}
						if(isset($_SESSION['MOTIF_EVENEMENT_ALL'][$events->getAttribute('MOTIF_EVENEMENT_Id')])){
							$motif = $_SESSION['MOTIF_EVENEMENT_ALL'][$events->getAttribute('MOTIF_EVENEMENT_Id')];
						}else{
							$motif = '';
						}
						echo $mode . ' - ' . $motif . ' - ' . lof::convertDateFromAdobeFormat($events->getAttribute('Date_Evenement'));  ?></span></div>
						<?php } 
						}?>

				</div>
			

			<?php }
			}
			?>
   
   
   
		<?php echo $content_for_layout; ?>




</div>
</div>



</div>
<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->
<div class="copyright" align="center" style="margin-top:10px; margin-bottom:10px; color:#999;" >
    Copyright  &copy; 2015 Préfon   I  Mentions légales  I  Crédits.
</div>
<!-- END FOOTER -->


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
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/jquery.sticky.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->



<!-- END PAGE LEVEL PLUGINS -->

<script type="text/javascript" src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/scripts/app.js" type="text/javascript"></script>
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/scripts/index.js" type="text/javascript"></script>

<script type="text/javascript">
	<?php if(isset($this->request->params[0])){ ?>
		var creation = false;
	<?php } else { ?>
		var creation = true;
	<?php }?>
</script>

<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/scripts/form-components.js"></script>

<?php if(isset($this->request->params[0]) && $this->vars['statut_particulier'] != 1) {?>
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/scripts/recipient.js"></script>
<?php } ?>

<?php if(!isset($this->request->params[0]) && $this->request->action == 'edit') {?>
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/scripts/create.js"></script>
<?php } ?>


<?php if($this->request->action == 'pre_aff') {?>
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/scripts/email.js"></script>
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/scripts/jquery.sticky.js"></script>
<?php } ?>


<script type="text/javascript" src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/scripts/app.js"></script>
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/scripts/moment.js"></script>
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/scripts/table-advanced.js"></script>






<script type="text/javascript" src="<?php echo serveur_url.DS.'webroot'.DS; ?>dqe/js/cp.js"></script>
<script type="text/javascript" src="<?php echo serveur_url.DS.'webroot'.DS; ?>dqe/js/dqe_mail.js"></script>
<script type="text/javascript" src="<?php echo serveur_url.DS.'webroot'.DS; ?>dqe/js/dqe_tele.js"></script>



<!-- END PAGE LEVEL SCRIPTS -->
<script>

//$('#dqe').modal('show');

window.submit_form = 0;
window.myData = '';
window.detailListe = {};
window.tableRachat = {};
window.tableMontantCotisation = {};
window.tableStatutParticulier = {};
window.tableThemesEntretien = {};

window.partenaire = <?php echo $_SESSION['conseillerEnLigne']['partenaires'];?>;

<?php foreach(lof::$listeValeurs['CLASSE_COTISATION_MONTANT'] as $cle => $valeur) {?>
	window.tableMontantCotisation[<?php echo $cle;?>] = <?php echo $valeur;?>;
<?php }?>

<?php foreach($_SESSION['STATUT_PARTICULIER'] as $cle => $valeur) {?>
	window.tableStatutParticulier[<?php echo $cle;?>] = "<?php echo $valeur;?>";
<?php }?>

<?php foreach($_SESSION['THEME_ENTRETIEN'] as $cle => $valeur) {?>
	window.tableThemesEntretien['<?php echo $cle;?>'] = "<?php echo $valeur;?>";
<?php }?>

var sous_origine = {
    <?php foreach($_SESSION['sous_origine'] as $idorigine => $sous_origine){
		  echo '"' . $idorigine . '" : {';
		  foreach($sous_origine as $cle => $valeur){ ?>
			"<?php echo $cle;?>" : "<?php echo $valeur;?>",
		  <?php }?>},
	<?php } ?>
	
}

function addClasse(selectedValue){			
			selectTag = $($('select[name="Classe_Cotisation_Mois"]').parent().html());
			return selectTag;
}

function convertToProperDate(myDate){
	if(myDate.length == 10){
		var arr = myDate.split('-');
		return arr[2] + '/' + arr[1] + '/' + arr[0];
	}else{
		return '';
	}
}


<?php if($this->request->action == "add_simulation"){ ?>
function ageLimite(){
			var tsBirth = moment($('input[name="tsBirth"]').val(), "DD/MM/YYYY");
			var date_souscription = moment($('input[name="date_souscription"]').val(), "DD/MM/YYYY");
			var age_affiliation = moment(date_souscription).years() - moment(tsBirth).years();
			$('input[name="age_affiliation"]').val(age_affiliation + ' ans');
			
			var ageLimite = 0;
			if($('input[name="age_limite_liquidation"]').val() == '' || $('input[name="age_limite_liquidation"]').val() == 0) {
				var myData = 'algo=AGE&dateN=' + $('input[name="tsBirth"]').val() + '&dateS=' + $('input[name="date_souscription"]').val();
				$.ajax({
				   url : 'http://simulateur.prefon.fr',
				   type : 'POST',
				   data : myData,
				   dataType: "html",
				   async: false
				}).done(function(donnees){
					$(donnees).find("AGE_LIMITE").each(function(){
						ageLimite = $(this).text();
						$('input[name="age_limite_liquidation"]').val($(this).text() + ' ans');
					});
				});
			}else{
				ageLimite = parseInt($('input[name="age_limite_liquidation"]').val());
			}
			//console.log(parseInt(tsBirth.get('years')) + parseInt(ageLimite));
			//var anneeLiquidation = (ageLimite - age_affiliation) + date_souscription.get('years') ;
			var anneeLiquidation = (ageLimite - age_affiliation) + date_souscription.get('years') ;
			$('select[name="annee"]').html(function(){
				return '';
			});

			var anneeMinLiquidation = ((tsBirth.year() + 55) < moment().get('years')) ? (moment().get('years')) : (tsBirth.year() + 55);
			
			for(var i = anneeMinLiquidation; i <= anneeLiquidation; i++){
				var o = new Option(i, i);
				$(o).html(i);
				$('select[name="annee"]').append(o);
			}
			
			naissance = moment(tsBirth);
			
			naissance = naissance.add(65, 'y').format('DD/MM/YYYY');
			
			var arr = naissance.split('/');
			
			$('select[name="mois"] option[value="' + arr[1] +'"]').prop('selected', true);
			$('select[name="annee"] option[value="' + arr[2] +'"]').prop('selected', true);
}

function appelSimu(table_details_simulation, table_rente){
			var nbAR = 4;
			/*
			console.log(moment($('input[name="date_souscription"]').val(), "DD/MM/YYYY").format('YYYY'));
			if(parseInt(moment($('input[name="date_souscription"]').val(), "DD/MM/YYYY").format('YYYY')) - parseInt(moment().format('YYYY'))){
				nbAR = parseInt($('select[name="annee"]').val()) - parseInt(moment().format('YYYY'));
			}else if(parseInt($('input[name="annne_dernier_versement"]').val()) > 0){
				nbAR = parseInt($('select[name="annee"]').val()) - parseInt($('select[name="annne_dernier_versement"]').val());
			}else{
				nbAR = parseInt($('select[name="annee"]').val()) - parseInt(moment().format('YYYY')) - 2;
			}
			console.log(nbAR);
			*/
			window.myData = 'algo=DETAIL&dateN=' + $('input[name="tsBirth"]').val() + 
					 '&dateS=' + $('input[name="date_souscription"]').val()  +
					 '&dateL=' + $('input[name="jour"]').val()  + '/'+ $('select[name="mois"]').val() + '/' + $('select[name="annee"]').val() +
					 '&abond=' + $('input[name="abondementpuph"]:checked').val()  +
					 '&revers' + new Date().getFullYear() + '=' + $('input[name="reversion"]:checked').val()  +
					 '&revers' + ($('select[name="annee"]').val() - 1) + '=' + $('input[name="reversion"]:checked').val()  +
					 '&nbAR=' + nbAR  +
					 '&c=' + $('select[name="Classe_Cotisation"]').val()<?php 
					  if(isset($this->vars['section_retraite_cotisant_id'])){
						  echo "+ '&section=" . $this->vars['section_retraite_cotisant_id'] . "&anneeEx=" . $this->vars['dernier_exercice_complet']. "&rachat" . date('Y') ."=" . round($this->vars['rachat_annee_courante'], 2) ."&ptsB=" . $this->vars['points_acquis_bruts_der_exerc'] ."&ptsN=" . $this->vars['points_acquis_nets_der_exerc'] ."'";
					  }
					 ?>;
			
			for(var x in window.detailListe){
				window.myData += '&' + x + '=' + window.detailListe[x];
			}		 
			
			console.log(window.myData);
			
			$.ajax({
				url : 'http://simulateur.prefon.fr',
				type : 'POST',
				data : myData,
				dataType: "html",
				async: false
			}).done(function(donnees){
				table_details_simulation.clear().draw();
				table_rente.clear().draw();
				$(donnees).find("DETAILS").each(function(){
					$(this).find("DETAIL").each(function(){
					var nombreAnneeRachat = (window.tableRachat["annee" + $(this).find('ANNEE').text()] === undefined) ? 0 : window.tableRachat["annee" + $(this).find('ANNEE').text()];
					table_details_simulation.row.add([
						$(this).find('ANNEE').text(),
						$(this).find('AGE').text(),
						'<select name="c' + $(this).find('ANNEE').text() +'">'+ addClasse($(this).find('CLASSE').text()).html() + '</select>',
						format_money($(this).find('COTISATION').text()),
						'<input name="annee' + $(this).find('ANNEE').text() + '" value="' + nombreAnneeRachat +'" size="2"/>&nbsp;/&nbsp;<input name="rachat' + $(this).find('ANNEE').text() +'" value="' + $(this).find('RACHAT').text() + '" size="5">',
						format_money($(this).find('COTISATION').text()),
						'<select name="revers' + $(this).find('ANNEE').text() +'"><option value="0">Non</option><option value="1">Oui</option></select>',
						format_points(Math.round($(this).find('POINTS_BRUTS').text())),
						format_points(Math.round($(this).find('CUMUL_BRUT').text())),
						format_points(Math.round($(this).find('POINTS_NETS').text())),
						format_points(Math.round($(this).find('CUMUL_NET').text()))
						]).draw();
						$('select[name="c' + $(this).find('ANNEE').text() + '"]').val($(this).find('CLASSE').text());
						//var reversion = ($('input[name="reversion"]:checked').val()) ? true : false;
						//console.log(parseInt($(this).find('ANNEE').text()) >= (parseInt($('select[name="annee"]').val()) - 1) && !reversion);
						if(parseInt($(this).find('ANNEE').text()) >= (parseInt($('select[name="annee"]').val()) - 1)){
							$('select[name="revers' + $(this).find('ANNEE').text() + '"]').attr('disabled', 'disabled');
						}else{
							$('select[name="revers' + $(this).find('ANNEE').text() + '"]').val($(this).find('REVERSION').text());
						}
					});
				});
				
				if($('input[name="abondementpuph"][value="1"]').is(":checked")){
					table_details_simulation.column(5).visible(true);
                }else{
					table_details_simulation.column(5).visible(false);
				}
				
				var boldRow = -1;
				var counter = 0;
				$(donnees).find("RETRAITES").each(function(){
					$(this).find("RETRAITE").each(function(){
						if(parseInt($(this).find('AGE').text()) == parseInt($('input[name="age_liquidation"]').val())){
							boldRow = counter;
						}
						table_rente.row.add([
						format_points(Math.round($(this).find('CUMUL_POINTS_BRUTS').text())),
						format_points(Math.round($(this).find('CUMUL_POINTS_NETS').text())),
						convertToProperDate($(this).find('DATE_LIQUIDATION').text()),
						$(this).find('AGE').text(),
						parseFloat($(this).find('COEFFICIENT_LIQUIDATION').text()).toFixed(3).toString().replace('.', ','),
						format_points(Math.round($(this).find('POINTS_LIQUIDES').text())),
						format_money($(this).find('RENTE_ANNUELLE').text())
						]).draw();
						counter++;
					});
				});
				
				table_rente.row(boldRow).nodes().to$().css( 'font-weight', 'bold');
				
			});
}

function save_simu(table_details_simulation, table_rente){
				if($('.login-form').valid()){
				
					var myXML = '';
					//partie pour remplir la table simulation
					myXML += '<SIM>';
					myXML += '<SIMULATION>';
					myXML += '<NOM_SIMULATION>' + $('input[name="nom_simulation"]').val() + '</NOM_SIMULATION><DATE_LIQUIDATION>' + $('input[name=jour]').val() + '/' + $('select[name="mois"]').val() + '/' + $('select[name="annee"]').val() + '</DATE_LIQUIDATION><AGE_LIQUIDATION>' + parseInt($('input[name="age_liquidation"]').val()) + '</AGE_LIQUIDATION><PROGRESSION_PALIER>' + $('input[name="Progression_Palier_O_N"]').val() + '</PROGRESSION_PALIER><REVERSION>' + $('input[name="reversion"]:checked').val() + '</REVERSION><ABONDEMENT>' + $('input[name="abondementpuph"]:checked').val() + '</ABONDEMENT>'  
					myXML += '</SIMULATION>'
					
					// partie pour remplir la table simulation_detail
					myXML += '<SIMULATION_DETAILS>';
					for(var i = 0; i < table_details_simulation.data().length; i++){
						myXML += '<DETAIL>';
						annee = table_details_simulation.row(i).data()[0];
						myXML += '<ANNEE>' + annee + '</ANNEE>';
						myXML += '<AGE>' + table_details_simulation.row(i).data()[1] + '</AGE>';
						myXML += '<CLASSE>' + $('select[name="c' + annee + '"]').val() + '</CLASSE>';
						myXML += '<COTISATION>' + parseFloat(table_details_simulation.row(i).data()[3].replace(/ /g, '').replace(/,/g, '.')) + '</COTISATION>';
						myXML += '<NB_ANNEE_RACHAT>' + $('input[name="annee' + annee + '"]').val() + '</NB_ANNEE_RACHAT>';
						myXML += '<RACHAT>' + $('input[name="rachat' + annee + '"]').val() + '</RACHAT>';
						myXML += '<REVERSION>' + $('select[name="revers' + annee + '"]').val() + '</REVERSION>';
						myXML += '<POINTS_BRUTS>' + parseFloat(table_details_simulation.row(i).data()[7].replace(/ /g, '')) + '</POINTS_BRUTS>';
						myXML += '<CUMUL_BRUTS>' + parseFloat(table_details_simulation.row(i).data()[8].replace(/ /g, '')) + '</CUMUL_BRUTS>';
						myXML += '<POINTS_NETS>' + parseFloat(table_details_simulation.row(i).data()[9].replace(/ /g, '')) + '</POINTS_NETS>';
						myXML += '<CUMUL_NETS>' + parseFloat(table_details_simulation.row(i).data()[10].replace(/ /g, '')) + '</CUMUL_NETS>';
						myXML += '</DETAIL>'
					}
					myXML += '</SIMULATION_DETAILS>';
					
					//Partie pour remplir la partie simulation_resultats
					myXML += '<SIMULATION_RESULTATS>';
					for(var i = 0; i < table_rente.data().length; i++){
						myXML += '<RESULTAT>';
						myXML += '<TOTAL_BRUTS>' + parseFloat(table_rente.row(i).data()[0].replace(/ /g, '')) + '</TOTAL_BRUTS>';
						myXML += '<TOTAL_NETS>' + parseFloat(table_rente.row(i).data()[1].replace(/ /g, '')) + '</TOTAL_NETS>';
						myXML += '<DATE_LIQUIDATION>' + table_rente.row(i).data()[2] + '</DATE_LIQUIDATION>';
						myXML += '<AGE_LIQUIDATION>' + table_rente.row(i).data()[3] + '</AGE_LIQUIDATION>';
						myXML += '<COEFF_LIQUIDATION>' + parseFloat(table_rente.row(i).data()[4].replace(/,/, '.')) + '</COEFF_LIQUIDATION>';
						myXML += '<TOTAL_POINTS_LIQUIDATION>' + parseFloat(table_rente.row(i).data()[5].replace(/ /g, '')) + '</TOTAL_POINTS_LIQUIDATION>';
						myXML += '<RENTE_ANNUELLE_BRUTE>' + parseFloat(table_rente.row(i).data()[6].replace(/ /g, '').replace(/,/, '.')) + '</RENTE_ANNUELLE_BRUTE>';
						myXML += '</RESULTAT>'
					}
					myXML += '</SIMULATION_RESULTATS>';
					myXML += '</SIM>';
					
					ajoutSimulation(myXML);
				}else{
					$('#name_missing').modal('show');
				}
}

<?php } ?>

function dqe_fill_table(dqe_table, data){

				dqe_table.clear().draw();
				$(data).find("CANDIDATES").each(function(){
					$(this).find("CANDIDATE").each(function(){
						dqe_table.row.add([
							'<a onclick="fiche_particulier(' + $(this).find('ID').text() + ')">' + window.tableStatutParticulier[$(this).find('STATUT_PARTICULIER').text()] + '</a>',
							'<a onclick="fiche_particulier(' + $(this).find('ID').text() + ')">' + $(this).find('ID').text() + '</a>',
							'<a onclick="fiche_particulier(' + $(this).find('ID').text() + ')">' + $(this).find('SLASTNAME').text() + '</a>',
							'<a onclick="fiche_particulier(' + $(this).find('ID').text() + ')">' + $(this).find('SFIRSTNAME').text() + '</a>',
							'<a onclick="fiche_particulier(' + $(this).find('ID').text() + ')">' + convertToProperDate($(this).find('TSBIRTH').text()) + '</a>',
							'<a onclick="fiche_particulier(' + $(this).find('ID').text() + ')">' + (($(this).find('ADRESSE_3').text().length > 0) ? ($(this).find('ADRESSE_3').text() + '<br>') : ('')) + $(this).find('CODE_POSTAL').text() + ' ' + $(this).find('VILLE').text() +  '</a>',
							($(this).find('CREATED').text().length >= 10) ? ('<a onclick="fiche_particulier(' + $(this).find('ID').text() + ')">' + convertToProperDate($(this).find('CREATED').text().substr(0, 10)) + '</a>') : (''),
							($(this).find('STATUT_PARTICULIER').text() == "2") ? ('<a class="btn btn-danger" onclick="fusionner_dqe(' + $(this).find('ID').text() + ')">Fusionner</a>') : ('')
						]).draw();
					});
				});
				
}



function dateDuJour(){
	var auj = new Date();
	var jj = auj.getDate();
	var mm = auj.getMonth()+1; //January is 0!

	var aaaa = auj.getFullYear();
	if(jj<10){
		jj='0'+jj
	} 
	if(mm<10){
		mm='0'+mm
	} 
	return jj+'/'+mm+'/'+aaaa;
}

function isDate(txtDate)

{

  var currVal = txtDate;

  if(currVal == '')

    return false;

   

  //Declare Regex 

  var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;

  var dtArray = currVal.match(rxDatePattern); // is format OK?

 

  if (dtArray == null)

     return false;

  

  //Checks for mm/dd/yyyy format.

  dtMonth = dtArray[3];

  dtDay= dtArray[1];

  dtYear = dtArray[5];

 

  if (dtMonth < 1 || dtMonth > 12)

      return false;

  else if (dtDay < 1 || dtDay> 31)

      return false;

  else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31)

      return false;

  else if (dtMonth == 2)

  {

     var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));

     if (dtDay> 29 || (dtDay ==29 && !isleap))

          return false;

  }

  return true;

}

function majusculeSansAccents(str){
  var minus = "aàâäbcçdeéèêëfghiîïjklmnoôöpqrstuùûvwxyz"        
  var majus = "AAAABCCDEEEEEFGHIIIJKLMNOOOPQRSTUUUVWXYZ"
  var entree = str;
  var sortie = "";
  for (var i = 0 ; i < entree.length ; i++)
  {
    var car = entree.substr(i, 1);
    sortie += (minus.indexOf(car) != -1) ? majus.substr(minus.indexOf(car), 1) : car;
  }
  return sortie;
}


function format_points(n) {
    return n.toString().replace(/./g, function(c, i, a) {
        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? " " + c : c;
    });
}

function format_money(n) {
    return (parseFloat(n).toFixed(2).replace(/./g, function(c, i, a) {
        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? " " + c : c;
    }) + " €").replace('.', ',');
}

function ajoutSimulation(myXML){
	$('#xml_input').val(myXML);
	$('#xml_modal').modal('show');
}

// fonction pour faire apparaitre la modale quand on envoie un mail

function envoyer_mail(url){
	$('#envoie_mail_ok').attr('href', url);
	$('#envoyer_mail').modal('show');
}

$.validator.setDefaults({
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});





jQuery(document).ready(function() {

		var hasChanged = 0;
		
        App.init(); // initlayout and core plugins
		<?php if(isset($this->request->params[0]) && $this->vars['statut_particulier'] != 1) {?>
		Recipient.init();
		<?php } ?>
		
		<?php if(!isset($this->request->params[0]) && $this->request->action == 'edit') {?>
		createRecipient.init();
		<?php } ?>
		

		$('#yourForm').on('submit', function() {
			$('input [disabled="disabled"], select[disabled="disabled"]').attr('disabled', false);
		});
		
		
		<?php if($this->request->action == 'edit'){?>
		$('input, select').on('change', function(){
			hasChanged++;
		});
		
		$('a:not(".btn")').on('click', function(e){
			if(hasChanged > 0){
				e.preventDefault();
				$('#test_modal_continuer').attr('href', $(this).attr('href'));
				$('#test').modal('show');
			}
		});
		
		$('#test_modal_sauvegarder').on('click', function(){
			$('.login-form').submit();
		});
		<?php } ?>

//début gestion bandeau vert
<?php 
	if(isset($this->request->params[0])){
	if($this->request->action != "events" && $this->request->action != "add_event" && $this->request->action != "edit_event"){
		if(!(isset($_SESSION['ZONE_GEOGRAPHIQUE'][substr($this->vars['code_postal'], 0, 2)]) && $this->vars['statut_particulier'] == '2') && !(isset($this->vars['points_acquis_bruts']) && $this->vars['points_acquis_bruts'] > 0) && $this->request->data->domLastEvents->getElementsByTagName('evenement')->item(0) == null && $this->request->data->domScores->getElementsByTagName('scoring')->item(0) == null){
			echo "$('#bandeau_vert').hide()";
		}
	}else{
		if(!(isset($_SESSION['ZONE_GEOGRAPHIQUE'][substr($this->vars['code_postal'], 0, 2)]) && $this->vars['statut_particulier'] == '2') && !(isset($this->vars['points_acquis_bruts']) && $this->vars['points_acquis_bruts'] > 0) && $this->request->data->domScores->getElementsByTagName('scoring')->item(0) == null){
			echo "$('#bandeau_vert').hide()";
		}
	}
	}?>
	
//fin gestion bandeau vert		


	
	


$.validator.methods.date = function(value, element) {
        if(value == '')
			return true;
		else
			return isDate(value);
    }; 
	
$.validator.methods.range = function (value, element, param) {
    var globalizedValue = value.replace(",", ".");
    return this.optional(element) || (globalizedValue >= param[0] && globalizedValue <= param[1]);
}
 
$.validator.methods.number = function (value, element) {
    return this.optional(element) || /^-?(?:\d+|\d{1,3}(?:[\s\.,]\d{3})+)(?:[\.,]\d+)?$/.test(value);
}
	


		
		//$('#attention').modal('toggle');
		
		<?php if(isset($this->vars['statut_particulier']) && $this->vars['statut_particulier'] == 1) {?>
		
		// début partie fichier loué
		$("input, select").attr("disabled", "disabled");
		$("#optin_block input").removeAttr("disabled");
		
		$('a.collapse').attr('class', 'expand');
		$('div.portlet-body').hide();
		
		$('#optin_block a.expand').attr('class', 'collapse');
		$('#optin_block div.portlet-body').show();
		
		
		
		
		hasChanged = false;
		$('#recipient_form').change(function(){
			$('#recipient_form a[name="convertir"]').attr('href', '#attention');
			$('#recipient_form a[name="convertir"]').attr('data-toggle', 'modal');
		});
		// fin partie fichier loué
		<?php } ?>
		
		<?php if($this->request->action == 'contract_details') {?>
			$('#points_retraite a.collapse, #info_reversion a.collapse, #collectivite a.collapse, #reseau_apporteur a.collapse, #adresse_contrat a.collapse, #releve_versements a.collapse').attr('class', 'expand');
			$('#points_retraite div.portlet-body, #info_reversion div.portlet-body, #collectivite div.portlet-body, #reseau_apporteur div.portlet-body, #adresse_contrat div.portlet-body, #releve_versements div.portlet-body').hide();	
			<?php if(isset($this->vars['allocataire'])) {?>
				$('#info_contrat_cotisant a.collapse, #info_cotisation a.collapse, #derniers_versements a.collapse').attr('class', 'expand');
				$('#info_contrat_cotisant div.portlet-body, #info_cotisation div.portlet-body, #derniers_versements div.portlet-body').hide();
		<?php } 
		}?>
		
		<?php if($this->request->action == 'add_simulation') {?>

		console.log('debut');
		// début partie Simulation
		var table_details_simulation = $('#simulation_details').DataTable( {
			initComplete: function () {
				this.api().columns().every( function () {
					var column = this;
					$(column.header()).css("vertical-align", "top");
					$(column.header()).css("text-align", "center");
				} );
			},
			  "columnDefs": [
				{ "width": "18%", "targets": 4 }
				],
			"sDom": '<"top">rt<"bottom"><"clear">',
			"bPaginate": false,
			"bSort": false,
			"language" : {
			"sProcessing":     "Traitement en cours...",
			"sSearch":         "Rechercher&nbsp;:",
			"sLengthMenu":     "Afficher _MENU_ &nbsp;détails",
			"sProcessing":     "Traitement en cours...",
			"sInfoEmpty":      "0 simulations",              
			"sSearch":         "Rechercher&nbsp;:",
			"sInfo":           "Affichage du détail _START_ à _END_ sur _TOTAL_ détail(s)",
			"sInfoFiltered":   "(filtré de _MAX_ détails au total)",
			"sInfoPostFix":    "",
			"sLoadingRecords": "Chargement en cours...",
			"sZeroRecords":    "Aucun contrat à afficher",
			"sEmptyTable":     "Aucun contrat disponible",
			"oPaginate": {
				"sFirst":      "Premier",
				"sPrevious":   "Précédent",
				"sNext":       "Suivant",
				"sLast":       "Dernier"
			}
			},
		  } );
		  
		  
		var table_rente = $('#table_rente').DataTable( {
			initComplete: function () {
				this.api().columns().every( function () {
					var column = this;
					$(column.header()).css("vertical-align", "top");
					$(column.header()).css("text-align", "center");
				} );
			},
			  "columnDefs": [
				{ "width": "10%", "targets": 4 }
				],
			"sDom": '<"top">rt<"bottom"><"clear">',
			"bSort": false,
			"bPaginate": false,
			"language" : {
			"sProcessing":     "Traitement en cours...",
			"sSearch":         "Rechercher&nbsp;:",
			"sLengthMenu":     "",
			"sProcessing":     "Traitement en cours...",
			"sInfoEmpty":      "",              
			"sSearch":         "",
			"sInfo":           "",
			"sInfoFiltered":   "",
			"sInfoPostFix":    "",
			"sLoadingRecords": "Chargement en cours...",
			"sZeroRecords":    "",
			"sEmptyTable":     "",
			"oPaginate": {
				"sFirst":      "Premier",
				"sPrevious":   "Précédent",
				"sNext":       "Suivant",
				"sLast":       "Dernier"
			}
			},
		  } );
			
			if($('input[name="tsBirth"]').val() == '' || (moment().format('YYYY') - moment($('input[name="tsBirth"]').val(), "DD/MM/YYYY").years() >= 70)){
				$('#static').modal('toggle');
			}
			$('#continue').on('click', function(){
				if(isDate($('input[name="date_naissance"]').val()) && (moment().format('YYYY') - moment($('input[name="date_naissance"]').val(), "DD/MM/YYYY").years() < 70) && (moment().format('YYYY') - moment($('input[name="date_naissance"]').val(), "DD/MM/YYYY").years() > 20)) {
					/*$('input[name="tsBirth"]').val($('input[name="date_naissance"]').val());
					$('#static').modal('hide');
					ageLimite();
					appelSimu(table_details_simulation, table_rente);*/
					$('#validate_tsBirth').submit();
				}else{
					$('.alert-danger').show();
				}
			});
			
			$('#continue_mail').on('click', function(){
				console.log('YATA');
				if($('input[name="email"]').val().length > 6 ) {
					console.log('YATA2');
					/*$('input[name="tsBirth"]').val($('input[name="date_naissance"]').val());
					$('#static').modal('hide');
					ageLimite();
					appelSimu(table_details_simulation, table_rente);*/
					$('#validate_mail').submit();
				}else{
					$('#mail_missing .alert-danger').show();
				}
			});
		
			ageLimite();

			/*
			$('#params').on('ready change blur', function(){
				console.log('this is sparta');
			});
			*/
			
			appelSimu(table_details_simulation, table_rente);

			$('#params').change(function(){
				window.detailListe = {};
				if($('input:checkbox[name="Progression_Palier_O_N"][value="1"]').is(":checked")){
					var anneeDebut = parseInt(table_details_simulation.row(0).data()[0]);
					var indexClasseDebut = parseInt($('select[name="Classe_Cotisation"]')[0].selectedIndex);
					var anneeLiq = parseInt($('select[name="annee"]').val());
					for(var i=(anneeDebut + 5),j = (indexClasseDebut + 1); i <= anneeLiq && j <= 12; i+=5, j++){
						//console.log("c"+i+" => " +  $('select[name="Classe_Cotisation"] option').eq(j).val());
						window.detailListe["c"+i] = $('select[name="Classe_Cotisation"] option').eq(j).val();
					}
				}
				appelSimu(table_details_simulation, table_rente);
			});
			
			$('#sim').change(function(element){
				if(element.target.name.substr(0, 5) == 'annee'){
					$('#sim input[name="rachat' + element.target.name.substr(5, 4) +'"]').val(element.target.value * window.tableMontantCotisation[$('#sim select[name="c' + element.target.name.substr(5, 4) +'"]').val()]);
					window.detailListe['rachat' + element.target.name.substr(5, 4)] = $('#sim input[name="rachat' + element.target.name.substr(5, 4) +'"]').val();
					window.tableRachat[element.target.name]= (element.target.value == '') ? '0' : element.target.value;
					appelSimu(table_details_simulation, table_rente);
				}else if(element.target.name.substr(0, 6) == 'rachat'){
					if(element.target.value == 0 || element.target.value == ''){
						$('#sim input[name="annee' + element.target.name.substr(6, 4) +'"]').val('0');
							window.detailListe[element.target.name] = element.target.value;
							appelSimu(table_details_simulation, table_rente);
					}else{
						if(!isNaN(element.target.value.trim().replace(' ', '')) && Number.isInteger(parseFloat(element.target.value.replace(' ', '')))){
							if(Number.isInteger(parseFloat(element.target.value.trim().replace(' ', '')) / window.tableMontantCotisation[$('select[name="c' + element.target.name.substr(6, 4) +'"]').val()])){
								$('#sim input[name="annee' + element.target.name.substr(6, 4) +'"]').val(parseFloat(element.target.value.trim().replace(' ', '')) / window.tableMontantCotisation[$('select[name="c' + element.target.name.substr(6, 4) +'"]').val()]);
								window.tableRachat["annee" + element.target.name.substr(6, 4)]= parseFloat(element.target.value.trim().replace(' ', '')) / window.tableMontantCotisation[$('select[name="c' + element.target.name.substr(6, 4) +'"]').val()];
							}else{
								window.tableRachat["annee" + element.target.name.substr(6, 4)] = 0;
							}
						}else{
							window.tableRachat["annee" + element.target.name.substr(6, 4)] = 0;
						}
						window.detailListe[element.target.name] = parseFloat(element.target.value.trim().replace(',', '.').replace(' ', ''));
						appelSimu(table_details_simulation, table_rente);
					}
				}
				else {	
				window.detailListe[element.target.name] = element.target.value;
				appelSimu(table_details_simulation, table_rente);
				}
			});
		   	
			$('.trigger').on('click', function(){
				$('#modal_sim_p').html("Voulez-vous sauvegarder cette simulation ? <br>");
				$('#xml_form').attr('action', '<?php echo Router::url('recipient/add_simulation/' .$this->request->params[0]); ?>');
				save_simu(table_details_simulation, table_rente);
			});
			
			$('.send_mail_sim').on('click', function(){
				if(<?php echo (strlen($this->vars['semail']) > 6) ? 'true' : 'false';?>){
				$('#modal_sim_p').html("Voulez-vous sauvegarder et envoyer cette simulation à <?php echo $this->vars['semail'];?>? <br>");
				<?php if(isset($this->vars['idcontrat']) && $this->vars['idcontrat'] > 0){?>
				$('#xml_form').attr('action', '<?php echo Router::url('recipient/add_simulation/' .$this->request->params[0] . '/'. $this->vars['idcontrat'] . '/0'); ?>');
				<?php } else {?>
				$('#xml_form').attr('action', '<?php echo Router::url('recipient/add_simulation/' .$this->request->params[0] . '/0/0'); ?>');
				<?php } ?>
				save_simu(table_details_simulation, table_rente);
				}else{
					$('#mail_missing').modal('show');
				}
			});
			
			$('.imprimer_sim').on('click', function(){
				$('#modal_sim_p').html("Voulez-vous sauvegarder et imprimer cette simulation ?<br>");
				<?php if(isset($this->vars['idcontrat']) && $this->vars['idcontrat'] > 0){?>
				$('#xml_form').attr('action', '<?php echo Router::url('recipient/add_simulation/' .$this->request->params[0] . '/'. $this->vars['idcontrat'] . '/1'); ?>');
				<?php } else {?>
				$('#xml_form').attr('action', '<?php echo Router::url('recipient/add_simulation/' .$this->request->params[0] . '/0/1'); ?>');
				<?php } ?>
				save_simu(table_details_simulation, table_rente);
			});
			
			$('#validate_simulation').on('click', function(){
				$('#xml_modal').modal('hide');
				$('#xml_form').submit();
			});
			
			$('#nom_sim_form').submit(function(event){
			  return false;
			});
			
			$('#nom_sim_form').keydown(function (e) {
				if (e.keyCode == 13) {
					e.preventDefault();
					save_simu(table_details_simulation, table_rente);
				}
			});
			
			$('form[id="validate_mail"]').keydown(function (e) {
				if (e.keyCode == 13) {
				if($('input[name="email"]').val().length > 6 ) {
					$('#validate_mail').submit();
				}else{
					$('#mail_missing .alert-danger').show();
				}
				}
			});

			
		$('select[name="annee"], select[name="mois"]').on('change', function(){
			var tsBirth = moment($('input[name="tsBirth"]').val(), "DD/MM/YYYY");
			var date_liquidation = moment($('input[name="jour"]').val() + '/' + $('select[name="mois"]').val() + '/' + $('select[name="annee"]').val(), "DD/MM/YYYY");
			var age_liquidation = 0;
			if((date_liquidation.diff(tsBirth, 'months') % 12 == 11) && date_liquidation.month() == tsBirth.month()){
				age_liquidation = (moment(date_liquidation).years() - moment(tsBirth).years());
			}else{
				age_liquidation = date_liquidation.diff(tsBirth, 'years');
			}
			
			//var age_liquidation = (moment(date_liquidation).years() - moment(tsBirth).years());
			$('input[name="age_liquidation"]').val(age_liquidation + ' ans');
		});

			
			
		// fin partie Simulation
		<?php } ?>
		
		// Partie view simulation
		<?php if($this->request->action == 'view_simulation'){?>
			$('.send_mail_sim_view').on('click', function(){
				if(<?php echo (strlen($this->vars['semail']) > 6) ? 'true' : 'false';?>){
					$('#send_mail_modal').modal('show');
				}else{
					$('#mail_missing').modal('show');
				}
			});
			
			$('#continue_mail').on('click', function(){
				if($('input[name="email"]').val().length > 6 ) {
					$('#validate_mail').submit();
				}else{
					$('#mail_missing .alert-danger').show();
				}
			});
		<?php }?>
		
		
		<?php if($this->request->action == "simulations" && isset($this->request->params[0]) && isset($this->vars['simulation_id'])){?>
			window.location.href = "<?php echo Router::url('recipient/imprimer_simulation/'. $this->request->params[0] .'/'. $this->vars['simulation_id']); ?>";
		<?php } ?>
		
		//Mettre quelques champs en Majuscule on blur
		
		$('input[name="sFirstName"], input[name="sLastName"], input[name="Nom_Naissance"], #adresse_block input[type="text"]').blur(function(){
			$(this).val($(this).val().toUpperCase());
		});
		
		
		var action = location.hash.substr(1);
          if (action == 'createaccount') {
              $('.forget-form').hide();
          } else if (action == 'forgetpassword')  {
              $('.forget-form').show();
          }
		
		
		$('select[name="ORIGINE_Id"]').change(function(){
				var origine = $(this).val();
				$('select[name="SOUS_ORIGINE_Id"]').html("");
				$('select[name="SOUS_ORIGINE_Id"]').append("<option value=\"\"></option>");
				Object.keys(sous_origine[origine]).forEach(function(key) {
					$('select[name="SOUS_ORIGINE_Id"]').append("<option value=\""+key+"\">"+sous_origine[origine][key]+"</option>");
				});
				
				// gérer la partie numéro de partenaire
				
				if(origine == 117){
					$('#num_partenaire').show();
				}else{
					$('input[name="Num_Partenaire"]').attr('value', '');
					$('#num_partenaire').hide();
				}
				
		});
		
		
		jQuery('#sPhone').blur(function(event) { verifTel('3', '#dqe_pays', '#sPhone', '','#resultPhone'); });
		jQuery('#tel_fixe_pro').blur(function(event) { verifTel('3', '#dqe_pays', '#tel_fixe_pro', '','#resultPhonePro'); });
		jQuery('#sMobilePhone').blur(function(event) { verifTel('3', '#dqe_pays', '#sMobilePhone', '','#resultMobile'); });
		jQuery('#sEmail').blur(function(event) { verifMail('#sEmail', '', '#resultMail'); });
		jQuery('#email_pro').blur(function(event) { verifMail('#email_pro', '', '#resultMailPro'); });
		
		jQuery('#sEmailPreAff').blur(function(event) { verifMail('#sEmailPreAff', '', '#resultMailPreAff'); });
		
		jQuery('#CP').bind({ keyup: function(key) {verifCp(key, jQuery(this).val(), 'CP', 'Ville','Adresse_1','Adresse_3','Adresse_2');}});


		<?php if (!isset($this->vars['code_postal']) || strlen($this->vars['code_postal']) < 5) { ?> 
		jQuery('#Ville').attr('readonly', 'readonly');
		jQuery('#Adresse_1').attr('readonly', 'readonly');
		jQuery('#Adresse_2').attr('readonly', 'readonly');
		jQuery('#Adresse_3').attr('readonly', 'readonly');
		<?php } ?>
		
		
		
		
		/*
		if($(window).width() > 900){
		$("#sticker").sticky({topSpacing:46});
		}else{
			$("#sticker").sticky({topSpacing:0});	
		}
		*/
		
		
		
		
		
		
	    $('input[name="Placement_Autre"]').change(function(){
			if($('input[name="Placement_Autre"][value="1"]').is(":checked")){
					$('input[name="Libelle_Placement_Autre"]').removeAttr('readonly');
                }else{
					$('input[name="Libelle_Placement_Autre"]').attr('readonly', 'readonly');
					$('input[name="Libelle_Placement_Autre"]').attr('placeholder', $('input[name="Libelle_Placement_Autre"]').attr('value'));
					$('input[name="Libelle_Placement_Autre"]').attr('value', '');			
				}
        });
		
		
		
		$('input[name="Reversion"]').change(function(){
			if($('input[name="Reversion"][value="1"]').is(":checked")){
					$('#reversion').show();
                }else{
					$('#reversion').hide();
					$('#reversion input').attr("value", "");
				}
        });
		
		$('#adresse_block input[type="text"], #adresse_block select').change(function(){
			$('input[name="Date_Modification_Adresse"]').attr('value', dateDuJour());
			if($('input[name="Adresse_PND_O_N"][value="1"]').is(":checked")){
					$('input[name="Adresse_PND_O_N"][value="1"]').parent('span').removeClass('checked');
					$('input[name="Adresse_PND_O_N"][value="1"]').removeAttr('checked');
					$('input[name="Adresse_PND_O_N"][value="0"]').parent('span').addClass('checked');
					$('input[name="Adresse_PND_O_N"][value="0"]').attr('checked','checked');
					$('input[name="Adresse_PND_O_N"][type="hidden"]').attr('value','0');
			}
        });
		
		$('#tel_email_block input, #tel_email_block select').change(function(){
			$('input[name="date_modif_section_tel_email"]').attr('value', dateDuJour());
        });
		
		$('#optin_block input').change(function(){
			$('input[name="date_modif_section_optin"]').attr('value', dateDuJour());
        });
		
		$('#optin input:checkbox[name="iBlackList"][value="1"]').change(function(){
			if($(this).is(":checked")){
					$('#optin input:radio[value="1"]').parent('span').removeClass('checked');
					$('#optin input:radio[value="1"]').removeAttr('checked');
					$('#optin input:radio[value="0"]').parent('span').addClass('checked');
					$('#optin input:radio[value="0"]').attr('checked','checked');
                }
        });
		
		$('#optin input:radio').change(function(){
				if($(this).val() == 1){
					if($('#optin input:checkbox[name="iBlackList"][value="1"]').is(":checked")){
						$('#optin input:checkbox[name="iBlackList"][value="1"]').parent('span').removeClass('checked');
						$('#optin input:checkbox[name="iBlackList"][value="1"]').removeAttr('checked');
					}
				}
        });
		
		$('#optin input:radio').change(function(){
			var counter = 0;
				$('#optin input:radio[value="0"]:checked').each(function(){
					counter++;
				});
				if(counter == 5){
					$('#optin input:checkbox[name="iBlackList"][value="1"]').parent('span').addClass('checked');
					$('#optin input:checkbox[name="iBlackList"][value="1"]').attr('checked','checked');
				}
        });
		
		<?php if($this->request->action == "pre_aff") { ?>
			$('select[name="Classe_Cotisation"]').change(function(){
				$('#montant_libre').hide();
				$('input[name="Montant_Versement_Exceptionnel"]').attr("value", "");
				var classeChoisie = $(this).val();
				$('select[name="Nb_Annees_Rachat"]').html("");
				$('select[name="Nb_Annees_Rachat"]').append('<option value="0">Pas de rachat</option>');
				$('select[name="Nb_Annees_Rachat"]').append('<option value="-1">Montant libre</option>');
				$('select[name="Nb_Annees_Rachat"]').append('<option value="1">1 an soit : ' + format_points(window.tableMontantCotisation[classeChoisie]) + ' &euro;</option>');
				for(var i = 2; i <= 42; i++){
					$('select[name="Nb_Annees_Rachat"]').append('<option value="' + i +'">' + i + ' ans soit : '+ format_points(window.tableMontantCotisation[classeChoisie] * i) + ' &euro;</option>');
				}
				
				if($('select[name="MODE_REGLEMENT_RETRAITE_COTISANT_Id"]').val() == 1 || $('select[name="MODE_REGLEMENT_RETRAITE_COTISANT_Id"]').val() == 2 || $('select[name="MODE_REGLEMENT_RETRAITE_COTISANT_Id"]').val() == 9 || $('select[name="MODE_REGLEMENT_RETRAITE_COTISANT_Id"]').val() == 10){
						$('input[name="Montant_Cotisation_Annuelle"]').attr('value', window.tableMontantCotisation[$('select[name="Classe_Cotisation"]').val()]);
				}

			});
			
			$('.valider_pre_aff').on('click', function(){
				if($('#sEmailPreAff').attr('value').trim().length == 0){
					$('#mail_missing').modal('show');
				}
			});
			
			
			$('.login-form input[name!="sEmailPreAff"]').on('keyup paste ', function(){
				$(this).val(majusculeSansAccents($(this).val()));
			});
			
			$('.rib_iban').on('keyup paste', function(){
				$(this).val(majusculeSansAccents($(this).val()));
				if($(this).val().length == 4){
					if(this.name[11] != 7){
						$('input[name="Mandat_IBAN' + (parseInt(this.name[11]) + 1) + '"]').focus();
					}
				}
			});
			
			
		<?php } ?>
		
		<?php if($this->request->action == "pre_aff" && isset($_SESSION[$this->request->params[0].'_pre_aff_post'])) { ?>
			$("input, select").attr("disabled", "disabled");
			$('#privisualiser_pdf').modal('show');
		<?php } ?>
		
		<?php if($this->request->action == "add_event" && isset($_SESSION[$this->request->params[0].'_pre_aff_post'])) { ?>
		$('select[name="MOTIF_EVENEMENT_Id"], select[name="RESULTAT_EVENEMENT_Id"], :checkbox').attr("disabled", "disabled");
		<?php } ?>
		

		
		<?php if($_SESSION['conseillerEnLigne']['partenaires'] == 0){?>
		$('select[name="MOTIF_EVENEMENT_Id"]').change(function(){
			if($(this).val() == 1 || $(this).val() == 17){
				$('input:checkbox[name="EnvoyerKitAffiliation"][value="1"]').parent('span').addClass('checked');
				$('input:checkbox[name="EnvoyerKitAffiliation"][value="1"]').attr('checked', 'checked');
				$('#bloc_envoie_courrier').show();
			}else{
				$('input:checkbox[name="EnvoyerKitAffiliation"][value="1"]').parent('span').removeClass('checked');
				$('input:checkbox[name="EnvoyerKitAffiliation"][value="1"]').removeAttr('checked');
				$('input:checkbox[name="envoi_courrier"]').parent('span').removeClass('checked');
				$('input:checkbox[name="envoi_courrier"]').removeAttr('checked');
				$('#bloc_envoie_courrier').hide();
			}
		});
		<?php } ?>
		
		
		$('input:checkbox[name="EnvoyerKitAffiliation"][value="1"]').change(function(){
			if($(this).is(":checked")){
					$('#bloc_envoie_courrier').show();
                }else{
					$('input:checkbox[name="envoi_courrier"]').parent('span').removeClass('checked');
					$('input:checkbox[name="envoi_courrier"]').removeAttr('checked');
					$('#bloc_envoie_courrier').hide();
				}
        });
		
		<?php if($this->request->action == 'add_event' && $_SESSION['conseillerEnLigne']['partenaires'] == 0 && $this->vars['statut_particulier'] == 2){?>
			$('select[name="MODE_EVENEMENT_Id"], select[name="RESULTAT_EVENEMENT_Id"]').change(function(){
				if($('select[name="MODE_EVENEMENT_Id"]').val() == 1 && $('select[name="RESULTAT_EVENEMENT_Id"]').val() > 0 && $('select[name="RESULTAT_EVENEMENT_Id"]').val() != 2 && $('select[name="RESULTAT_EVENEMENT_Id"]').val() != 3){
						if(moment().add(10, 'd').day() == 6){
							$('input[name="Date_Rappel"]').val(moment().add(12, 'd').format('DD/MM/YYYY'));
						}else if(moment().add(10, 'd').day() == 0){
							$('input[name="Date_Rappel"]').val(moment().add(11, 'd').format('DD/MM/YYYY'));
						}else{
							$('input[name="Date_Rappel"]').val(moment().add(10, 'd').format('DD/MM/YYYY'));
						}
				}else{
						$('input[name="Date_Rappel"]').val('');
				}
			});
		<?php } ?>
		
		//&& ( $('select[name="RESULTAT_EVENEMENT_Id"]').val() != 3)
		$('select[name="STATUT_AFFILIATION_Id"]').change(function(){
			if($(this).val() == 1 || $(this).val() == 2){
				$('#affiliation_div').show(); 
			}else if($(this).val() == 4) {
				$('#affiliation_div').hide();
				$('#conjoint').show();
			}else if($(this).val() == 6){
				$('#affiliation_div').hide();
				$('#autre_affiliation').show();
			}else{
				$('#affiliation_div').hide();
				$('#autre_affiliation').hide();
			}
		});
		
		
		$('select[name="MODE_REGLEMENT_RETRAITE_COTISANT_Id"]').change(function(){
			if($(this).val() == 3){
				$('#mois_prelevement').show();
				$('select[name="Mois_Debut_Prelevement"]').val(new Date().getMonth() + 2);
				$('#rib').hide();
				$('input[name="Montant_Cotisation_Annuelle"]').attr('value', '0');
			} else if($(this).val() >= 4 && $(this).val() <= 7){
				$('#rib').show();
				$('#mois_prelevement').show();
				$('select[name="Mois_Debut_Prelevement"]').val(new Date().getMonth() + 2);
				$('input[name="Montant_Cotisation_Annuelle"]').attr('value', '0');
			}else{
				$('#rib').hide();
				$('#mois_prelevement').hide();
				$('input[name="Montant_Cotisation_Annuelle"]').attr('value', window.tableMontantCotisation[$('select[name="Classe_Cotisation"]').val()]);

			}
		});
		
		$('select[name="Nb_Annees_Rachat"]').change(function(){
			if($(this).val() == -1){
				$('input[name="Montant_Versement_Exceptionnel"]').val("");
				$('#montant_libre').show();
			}else{
				console.log($(this).val() * window.tableMontantCotisation[$('select[name="Classe_Cotisation"]').val()]);
				$('#montant_libre').hide();
				$('input[name="Montant_Versement_Exceptionnel"]').attr("value", $(this).val() * window.tableMontantCotisation[$('select[name="Classe_Cotisation"]').val()]);
			}
		});
		
		
		$(window).resize(function(){
		if($(window).width() > 900){
		$(".page-content #sticker").sticky({topSpacing:46});
		}else{
			$(".page-content #sticker").sticky({topSpacing:0});	
		}});
		
		Index.init();


		
       
		$('.date-picker').datepicker();
		
	
$('#table_contracts').DataTable( {
	initComplete: function () {
		this.api().columns().every( function () {
			var column = this;
			$(column.header()).css("vertical-align", "top");
			$(column.header()).css("text-align", "center");
		} );
	},
	"sDom": '<"top"f>rt<"bottom"i><"clear">',
	"language" : {
	"sProcessing":     "Traitement en cours...",
	"sSearch":         "Rechercher&nbsp;:",
	"sLengthMenu":     "Afficher _MENU_ &nbsp;contrats",
	"sProcessing":     "Traitement en cours...",
	"sInfoEmpty":      "0 contrat",              
	"sSearch":         "Rechercher&nbsp;:",
	"sInfo":           "Affichage du contrat _START_ à _END_ sur _TOTAL_ contrat(s)",
	"sInfoFiltered":   "(filtré de _MAX_ contrats au total)",
	"sInfoPostFix":    "",
	"sLoadingRecords": "Chargement en cours...",
	"sZeroRecords":    "Aucun contrat à afficher",
	"sEmptyTable":     "Aucun contrat disponible",
	"oPaginate": {
		"sFirst":      "Premier",
		"sPrevious":   "Précédent",
		"sNext":       "Suivant",
		"sLast":       "Dernier"
	}
	},
  } );

  
  $('#table_contracts_dependance').DataTable( {
	initComplete: function () {
		this.api().columns().every( function () {
			var column = this;
			$(column.header()).css("vertical-align", "top");
			$(column.header()).css("text-align", "center");
		} );
	},
	"sDom": '<"top"f>rt<"bottom"i><"clear">',
	"language" : {
	"sProcessing":     "Traitement en cours...",
	"sSearch":         "Rechercher&nbsp;:",
	"sLengthMenu":     "Afficher _MENU_ &nbsp;contrats",
	"sProcessing":     "Traitement en cours...",
	"sInfoEmpty":      "0 contrat",              
	"sSearch":         "Rechercher&nbsp;:",
	"sInfo":           "Affichage du contrat _START_ à _END_ sur _TOTAL_ contrat(s)",
	"sInfoFiltered":   "(filtré de _MAX_ contrats au total)",
	"sInfoPostFix":    "",
	"sLoadingRecords": "Chargement en cours...",
	"sZeroRecords":    "Aucun contrat à afficher",
	"sEmptyTable":     "Aucun contrat disponible",
	"oPaginate": {
		"sFirst":      "Premier",
		"sPrevious":   "Précédent",
		"sNext":       "Suivant",
		"sLast":       "Dernier"
	}
	},
  } );
 


	$('#table_simulations').DataTable( {
		initComplete: function () {
			this.api().columns().every( function () {
				var column = this;
				$(column.header()).css("vertical-align", "top");
				$(column.header()).css("text-align", "center");
			} );
		},
		"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Tout"]],
		"aaSorting": [],
		"language" : {
		"sProcessing":     "Traitement en cours...",
		"sSearch":         "Rechercher&nbsp;:",
		"sLengthMenu":     "Afficher _MENU_ &nbsp;simulations",
		"sProcessing":     "Traitement en cours...",
		"sInfoEmpty":      "0 simlation",              
		"sSearch":         "Rechercher&nbsp;:",
		"sInfo":           "Affichage de la simulation _START_ à _END_ sur _TOTAL_ simulation(s)",
		"sInfoFiltered":   "(filtré de _MAX_ simulations au total)",
		"sInfoPostFix":    "",
		"sLoadingRecords": "Chargement en cours...",
		"sZeroRecords":    "Aucune simulation à afficher",
		"sEmptyTable":     "Aucune simulation disponible",
		"oPaginate": {
			"sFirst":      "Premier",
			"sPrevious":   "Précédent",
			"sNext":       "Suivant",
			"sLast":       "Dernier"
		}
		},
  } );
 

$('#table_events').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
				if(this.index() != 0 && this.index() != 6 ){
					var bis = [];
					var column = this;
					$(column.header()).css("vertical-align", "top");
					$(column.header()).css("text-align", "center");
					var select = $("<br/><select><option value=\"\"></option></select>")
						.appendTo( $(column.header()) )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
							);
	 
							
							column
								.search( val ? '^'+val+'$' : '', true, false )
								.draw();
								
						} );
					
					column.data().unique().sort().each( function ( d, j ) {
						if($.inArray($(d).html(), bis) == -1 && $(d).html() != ''){
							bis.push($(d).html());
							select.append("<option value=\""+$(d).html()+"\">" + d + "</option>");
						}
					} );
					
				}else{
					var column = this;
					$(column.header()).css("vertical-align", "top");
					$(column.header()).css("text-align", "center");
					/*
					var column = this;
					var select = $('<br/><div style="height:20px">&nbsp;</div>')
						.appendTo( $(column.header()) );
					*/
				}
            } );
        },
		"bSort" : false,
		"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Tout"]],

		"language" : {
		"sProcessing":     "Traitement en cours...",
		"sSearch":         "Rechercher&nbsp;:",
		"sLengthMenu":     "Afficher _MENU_ &nbsp;événements",
		"sProcessing":     "Traitement en cours...",
		"sInfoEmpty":      "0 événements",              
		"sSearch":         "Rechercher&nbsp;:",
		"sInfo":           "Affichage de l'événement _START_ à _END_ sur _TOTAL_ événement(s)",
		"sInfoFiltered":   "(filtré de _MAX_ événement au total)",
		"sInfoPostFix":    "",
		"sLoadingRecords": "Chargement en cours...",
		"sZeroRecords":    "Aucun événement à afficher",
		"sEmptyTable":     "Aucune donnée disponible",
		"oPaginate": {
			"sFirst":      "Premier",
			"sPrevious":   "Précédent",
			"sNext":       "Suivant",
			"sLast":       "Dernier"
		}
		},
		
		
		
		} );

  
  
  
 $('#table_versements').DataTable( {
		"sDom": '<"top"lf>rt<"bottom"ip><"clear">',
		"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "Tout"]],
		"order": [[ 0, "desc" ]],
		"language" : {
		"sProcessing":     "Traitement en cours...",
		"sSearch":         "Rechercher&nbsp;:",
		"sLengthMenu":     "Afficher _MENU_ &nbsp;versements",
		"sProcessing":     "Traitement en cours...",
		"sInfoEmpty":      "0 versement",              
		"sSearch":         "Rechercher&nbsp;:",
		"sInfo":           "Affichage du versement _START_ à _END_ sur _TOTAL_ versement(s)",
		"sInfoFiltered":   "(filtré de _MAX_ versemens au total)",
		"sInfoPostFix":    "",
		"sLoadingRecords": "Chargement en cours...",
		"sZeroRecords":    "Aucun versement à afficher",
		"sEmptyTable":     "Aucune donnée disponible",
		"oPaginate": {
			"sFirst":      "Premier",
			"sPrevious":   "Précédent",
			"sNext":       "Suivant",
			"sLast":       "Dernier"
		}
		},
		
		
		
		} );
		
	$('.formulaire').DataTable( {
		"sDom": '<"top">rt<"bottom"><"clear">',
		  "columnDefs": [
			{ "width": "60%", "targets": 0 }
		  ],
		  "bSort" : false,
		initComplete: function () {
			this.api().column(0).nodes().to$().css('vertical-align', 'middle');
			this.api().column(1).nodes().to$().attr('align', 'center');
		}

  } );
			 <?php if(!isset($this->request->params[0]) && $this->request->action == 'edit'){?>
					
					var submit_form = 0;
					var form;
					var table_dqe = $('#table_dqe').DataTable( {
						initComplete: function () {
							this.api().columns().every( function () {
								var column = this;
								$(column.header()).css("vertical-align", "top");
								$(column.header()).css("text-align", "center");
							} );
						},
					"sDom": '<"top"lf>rt<"bottom"ip><"clear">',
					"columnDefs": [
						{ "width": "90%", "targets": 7 }
						],
					"lengthMenu": [[5], [5]],
					"language" : {
					"sProcessing":     "Traitement en cours...",
					"sSearch":         "Rechercher&nbsp;:",
					"sLengthMenu":     "Afficher _MENU_ &nbsp;particuliers",
					"sProcessing":     "Traitement en cours...",
					"sInfoEmpty":      "0 contrat",              
					"sSearch":         "Rechercher&nbsp;:",
					"sInfo":           "Affichage du particulier _START_ à _END_ sur _TOTAL_ particulier(s)",
					"sInfoFiltered":   "(filtré de _MAX_ particuliers au total)",
					"sInfoPostFix":    "",
					"sLoadingRecords": "Chargement en cours...",
					"sZeroRecords":    "Aucun contrat à afficher",
					"sEmptyTable":     "Aucun contrat disponible",
					"oPaginate": {
						"sFirst":      "Premier",
						"sPrevious":   "Précédent",
						"sNext":       "Suivant",
						"sLast":       "Dernier"
					}}
					  } );
					
				
					$('.login-form').on('submit', function(){
						var nombre_candidats = 0;
						if(window.submit_form == 0){
						if($('.login-form').valid()){
							//$('#dqe').modal('show');
								form = this;
								var myData = 'nom=' + $('input[name="sLastName"]').val() + '&nom_naissance=' + $('input[name="Nom_Naissance"]').val() + '&prenom=' + $('input[name="sFirstName"]').val() + '&code_postal=' + $('input[name="Code_Postal"]').val();
								$.ajax({
								   url : '<?php echo serveur_url . '/dqe/index'?>',
								   type : 'POST',
								   data : myData,
								   dataType: "html",
								   async: false
								}).done(function(donnees){
									nombre_candidats = $(donnees).find('CANDIDATE').length;
									if($(donnees).find('CANDIDATE').length > 0){
										dqe_fill_table(table_dqe, donnees);
										$('#dqe').modal('show');
									}
								});
								if(nombre_candidats > 0){
									return false;
								}
							}
						}else{
							return true;
						}
					});

					$('#continuer_dqe').on('click', function(){
						$('#dqe').modal('hide');
						window.submit_form = 1;
						$('.login-form').submit();
					});
			 <?php } ?>
			 
			 <?php if($this->request->action=="add_event"){?>
				
				$('select[name="theme_entretien_1"]').change(function(){
					theme_choisi = $(this).val();
					if($('select[name="theme_entretien_2"]').val() == null || $('select[name="theme_entretien_2"]').val() == 0 || $('select[name="theme_entretien_2').val() == theme_choisi){
						$('select[name="theme_entretien_2"]').html("");
						$('select[name="theme_entretien_2"]').append('<option value="0">Séléctionner</option>');
						for(key in window.tableThemesEntretien){
							if(theme_choisi != key){
								$('select[name="theme_entretien_2"]').append("<option value=\""+key+"\">"+window.tableThemesEntretien[key]+"</option>");
							}
						}
						
						
					}
					
					if($('select[name="theme_entretien_3').val() == theme_choisi){
						$('select[name="theme_entretien_3"]').html("");
						$('select[name="theme_entretien_3"]').append('<option value="0">Séléctionner</option>');
						for(key in window.tableThemesEntretien){
							if(theme_choisi != key && $('select[name="theme_entretien_2"]').val() != key){
								$('select[name="theme_entretien_3"]').append("<option value=\""+key+"\">"+window.tableThemesEntretien[key]+"</option>");
							}
						}
					}
					
					if($('select[name="theme_entretien_2').val() > 0 && theme_choisi != $('select[name="theme_entretien_2').val()){
						val_entretien2 = $('select[name="theme_entretien_2').val();
						$('select[name="theme_entretien_2"]').html("");
						$('select[name="theme_entretien_2"]').append('<option value="0">Séléctionner</option>');
						for(key in window.tableThemesEntretien){
							if(theme_choisi != key && $('select[name="theme_entretien_3"]').val() != key){
								$('select[name="theme_entretien_2"]').append("<option value=\""+key+"\">"+window.tableThemesEntretien[key]+"</option>");
							}
						}
						$('select[name="theme_entretien_2"]').val(val_entretien2);
					}
					
					if($('select[name="theme_entretien_3').val() > 0 && theme_choisi != $('select[name="theme_entretien_3').val() ){
						val_entretien3 = $('select[name="theme_entretien_3').val();
						$('select[name="theme_entretien_3"]').html("");
						$('select[name="theme_entretien_3"]').append('<option value="0">Séléctionner</option>');
						for(key in window.tableThemesEntretien){
							if(theme_choisi != key && $('select[name="theme_entretien_2"]').val() != key){
								$('select[name="theme_entretien_3"]').append("<option value=\""+key+"\">"+window.tableThemesEntretien[key]+"</option>");
							}
						}
						$('select[name="theme_entretien_3"]').val(val_entretien3);
					}
					
				});
				
				$('select[name="theme_entretien_2"]').change(function(){
					theme_choisi = $(this).val();
					if($('select[name="theme_entretien_3"]').val() == null || $('select[name="theme_entretien_3"]').val() == 0 || $('select[name="theme_entretien_3').val() == theme_choisi){
						$('select[name="theme_entretien_3"]').html("");
						$('select[name="theme_entretien_3"]').append('<option value="0">Séléctionner</option>');
						for(key in window.tableThemesEntretien){
							if(theme_choisi != key && $('select[name="theme_entretien_1"]').val() != key){
								$('select[name="theme_entretien_3"]').append("<option value=\""+key+"\">"+window.tableThemesEntretien[key]+"</option>");
							}
						}
					}
					
					if($('select[name="theme_entretien_3').val() > 0 && theme_choisi != $('select[name="theme_entretien_3').val() ){
						val_entretien3 = $('select[name="theme_entretien_3').val();
						$('select[name="theme_entretien_3"]').html("");
						$('select[name="theme_entretien_3"]').append('<option value="0">Séléctionner</option>');
						for(key in window.tableThemesEntretien){
							if(theme_choisi != key && $('select[name="theme_entretien_1"]').val() != key){
								$('select[name="theme_entretien_3"]').append("<option value=\""+key+"\">"+window.tableThemesEntretien[key]+"</option>");
							}
						}
						$('select[name="theme_entretien_3"]').val(val_entretien3);
					}
					
				});

				$('#enregistrer').on('click', function(){
					if($('.login-form').valid()){
						$('#themes_entretien').modal('show');
					}
				});
				
				$('#envoi_mail_entretien').on('click', function(){
					if($('select[name="theme_entretien_1"]').val() > 0 || $('select[name="theme_entretien_2"]').val() > 0 || $('select[name="theme_entretien_3"]').val() > 0){
						$('#themes_entretien .alert-danger').hide();
						$('input[name="theme_entretien_1"]').attr('value', $('select[name="theme_entretien_1"]').val());
						$('input[name="theme_entretien_2"]').attr('value', $('select[name="theme_entretien_2"]').val());
						$('input[name="theme_entretien_3"]').attr('value', $('select[name="theme_entretien_3"]').val());
						$('input[name="envoyer_mail"]').attr('value', '1');
						//$('.login-form').submit();
						if(<?php echo (strlen($this->vars['semail']) > 6) ? 'true' : 'false';?>){
							$('.login-form').submit();
						}else{
							$('#mail_missing').modal('show');
						}
					}else{
						$('#themes_entretien .alert-danger').show();
					}
				});
				
				// au cas ou on envoie pas de mail, on envoie le formulaire directement
				$('#no_envoi_mail_entretien').on('click', function(){
					$('.login-form').submit();
				});
				
				
				$('#continue_mail').on('click', function(){
				if($('input[name="email"]').val().length > 6 ) {
					$('input[name="mail_saisi"]').attr('value', $('input[name="email"]').val());
					$('.login-form').submit();
				}else{
					$('#mail_missing .alert-danger').show();
				}
			});
			<?php } ?>


		
			<?php if($_SESSION['conseillerEnLigne']['droits'] == 1 || $_SESSION['conseillerEnLigne']['droits'] == 2 && $this->request->action != 'add_simulation'){?>
				$('input, select, button, a.btn').attr('disabled', 'disabled');
				$('#table input, #table select, #table button, #table a').removeAttr('disabled');
				$('#events_search input, #events_search select, #events_search button, #events_search a').removeAttr('disabled');
				$('a[name="back_events"]').removeAttr('disabled');
			<?php }
				if($_SESSION['conseillerEnLigne']['droits'] == 2 && ($this->request->action == 'simulations' || $this->request->action == 'add_simulation')) {?>
				$('input, select, button, a').removeAttr('disabled');	
				<?php }
				
				if($_SESSION['conseillerEnLigne']['droits'] == 3 && $this->request->action == "edit_event" && $this->vars['CONSEILLER'] != $_SESSION['conseillerEnLigne']['label']) {?>
						$('input, select, button, a.btn').attr('disabled', 'disabled');
						$('a[name="back_events"]').removeAttr('disabled');
				<?php } ?>
				
		
		$('#envoie_mail_ok').on('click', function(){
			$('#envoyer_mail').modal('hide');
		});
		
		

    });
	
	
	
	

</script>







<script>
//Centrer la modale
	function centerModals(){
	  $('.modal').each(function(i){
		var $clone = $(this).clone().css('display', 'block').appendTo('body');
		var top = Math.round(($clone.height() - $clone.find('.modal-content').height()) / 2);
		top = top > 0 ? top : 0;
		$clone.remove();
		$(this).find('.modal-content').css("margin-top", top);
	  });
	}
	$('.modal').on('show.bs.modal', centerModals);
	$(window).on('resize', centerModals);
//Centrer la modale



;(function($){
	$.fn.datepicker.dates['fr'] = {
		days: ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"],
		daysShort: ["dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam."],
		daysMin: ["d", "l", "ma", "me", "j", "v", "s"],
		months: ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"],
		monthsShort: ["janv.", "févr.", "mars", "avril", "mai", "juin", "juil.", "août", "sept.", "oct.", "nov.", "déc."],
		today: "Aujourd'hui",
		clear: "Effacer",
		weekStart: 1,
		format: "dd/mm/yyyy"
	};
}(jQuery));




$('.date-picker').datepicker({
   language: "fr"
});


var type = "";

function fiche_particulier(id_particulier){
	var left = (screen.width/2)-(1000/2);
	var top = (screen.height/2)-(600/2);
	popup = window.open('<?php echo serveur_url.DS.'popup/fiche/'; ?>' + id_particulier,'Fiche particulier N° ' + id_particulier,'width=1000,height=600, top='+top+', left='+left+', toolbar=no,location=no,directories=no,menubar=no,scrollbars=yes,copyhistory=no,resizable=no');
}

function recherche_particulier_parrain() {
		type = "parrain";
		popup = window.open('<?php echo serveur_url.DS.'popup/search'; ?>','Recherche compte','width=1000,height=600,toolbar=no,location=no,directories=no,menubar=no,scrollbars=yes,copyhistory=no,resizable=no');
	}

function recherche_particulier_conjoint() {
		type="conjoint";
		popup = window.open('<?php echo serveur_url.DS.'popup/search'; ?>','Recherche compte','width=1000,height=600,toolbar=no,location=no,directories=no,menubar=no,scrollbars=yes,copyhistory=no,resizable=no');
	}
	
function supprimer_particulier_parrain() {
		$('input[name="Id_Parrain"]').attr('value', '0')
		$('#Parrain').attr('value', "")
	}
	
	
function supprimer_particulier_conjoint() {
		$('input[name="Id_Conjoint"]').attr('value', '0')
		$('#Conjoint').attr('value', "")
	}

function ouvrir_fiche_conjoint(){
		var id_conjoint = $('input[name="Id_Conjoint"]').attr('value');

		if( id_conjoint > 0){
			window.open("<?php echo Router::url('recipient/edit/');?>" + id_conjoint);
		}
}

function ouvrir_fiche_parrain(){
		var id_parrain = $('input[name="Id_Parrain"]').attr('value');

		if( id_parrain > 0){
			window.open("<?php echo Router::url('recipient/edit/');?>" + id_parrain);
		}
}
	
function fusionner_dqe(id_particulier){
	window.submit_form = 1;
	$('.login-form').attr('action', '<?php echo Router::url('recipient/fusionner_dqe/');?>' + id_particulier);
	$('.login-form').submit();
}


	
	
</script>

<script src='//rum.monitis.com/get/jsbenchmark.min.js?id=105924' type='text/javascript' async='async'></script>

<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
