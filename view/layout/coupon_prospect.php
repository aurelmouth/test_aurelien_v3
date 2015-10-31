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
	
	
	<link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/pages/search.css" rel="stylesheet" type="text/css"/>
	
	<!-- BEGIN THEME STYLES -->
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/style-conquer.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/pages/tasks.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/custom.css" rel="stylesheet" type="text/css"/>

	<link type="text/css" href="<?php echo serveur_url.DS.'webroot'.DS; ?>dqe/css/redmond/jquery-ui-1.10.3.demo.css" rel="stylesheet" />
	<link type="text/css" href="<?php echo serveur_url.DS.'webroot'.DS; ?>dqe_demo.css" rel="stylesheet" />


	    
	
	
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
                    <span class="username username-hide-on-mobile"><?php echo $_SESSION['conseillerEnLigne']['label'];?></span>
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





	<?php echo $content_for_layout; ?>




<!-- BEGIN COPYRIGHT -->
<?php if($this->request->action === 'result') { ?>
<!-- BEGIN FOOTER -->
<div class="footer">
    <div class="footer-inner">
        Copyright &copy; 2015 Préfon I Mentions légales I Crédits.
    </div>
    <div class="footer-tools">
		<span class="go-top">
		<i class="fa fa-angle-up"></i>
		</span>
    </div>
</div>
<!-- END FOOTER -->
<?php } else {?>
<div class="copyright">
    Copyright  &copy; 2015 Préfon   I  Mentions légales  I  Crédits.
</div>
<?php } ?>
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
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/jquery.sticky.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->



<!-- END PAGE LEVEL PLUGINS -->

<script type="text/javascript" src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/scripts/app.js" type="text/javascript"></script>
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/scripts/index.js" type="text/javascript"></script>

<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/scripts/form-components.js"></script>

<script type="text/javascript">
var creation = true;
</script>

<?php if(!isset($_SESSION['statut_particulier']) || $_SESSION['statut_particulier'] != 1) {?>
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/scripts/recipient.js"></script>
<?php } ?>


<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/scripts/search.js"></script>


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

<script>
var sous_origine = {
    <?php foreach($_SESSION['sous_origine'] as $idorigine => $sous_origine){
		  echo '"' . $idorigine . '" : {';
		  foreach($sous_origine as $cle => $valeur){ ?>
			"<?php echo $cle;?>" : "<?php echo $valeur;?>",
		  <?php }?>},
	<?php } ?>
	
}



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

function recherche_particulier_parrain() {
		type = "parrain";
		popup = window.open('<?php echo serveur_url.DS.'popup/search'; ?>','Recherche compte','width=1000,height=600,toolbar=no,location=no,directories=no,menubar=no,scrollbars=yes,copyhistory=no,resizable=no');
	}

function convertir_prospect(id_particulier, prenom, nom){
	$('#convertir_prospect #nom_particulier').html(function(){
		return nom + " " + prenom;
	});
	$('#convertir_prospect #convertir_prospect_particulier').attr('href', '<?php echo Router::url('coupon_prospect/convertir_prospect/');?>' + id_particulier);
	$("#convertir_prospect").modal('show');
}

function stop_com(id_particulier){
	$('#stop_com #num_particulier').html(function(){
		return id_particulier;
	});
	$('#stop_com #stop_com_particulier').attr('href',  '<?php echo Router::url('coupon_prospect/stop_com/');?>' + id_particulier);
	$("#stop_com").modal('show');
}

function saisie_coupon(id_particulier){
	$('#saisie_coupon #num_particulier').html(function(){
		return id_particulier;
	});
	$('#saisie_coupon #saisie_coupon_particulier').attr('href',  '<?php echo Router::url('coupon_prospect/saisie_coupon/');?>' + id_particulier);
	$("#saisie_coupon").modal('show');
}

function fiche_particulier(id_particulier){
	var left = (screen.width/2)-(1000/2);
	var top = (screen.height/2)-(600/2);
	popup = window.open('<?php echo serveur_url.DS.'popup/fiche/'; ?>' + id_particulier,'Fiche particulier N° ' + id_particulier,'width=1000,height=600, top='+top+', left='+left+', toolbar=no,location=no,directories=no,menubar=no,scrollbars=yes,copyhistory=no,resizable=no');
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
	App.init();

	<?php if($this->request->action == 'search') {?>
	Search.init();
	<?php }?>

	<?php if($this->request->action == 'saisie_coupon'){?>
	Recipient.init();
	<?php } ?>

	$('.search-form').on('keyup keypress blur change paste cut', function(){
		$('.alert-danger').hide();
	});

	
	<?php if($this->request->action == 'saisie_coupon'){?>
	$('input[name="sFirstName"], input[name="sLastName"], input[name="Nom_Naissance"], #adresse_block input[type="text"]').on('keyup keypress blur change paste cut', function(){
		$(this).val($(this).val().toUpperCase());
	});
	<?php }?>

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

$.validator.methods.date = function(value, element) {
        if(value == '')
			return true;
		else
			return isDate(value);
    }; 
	
$('select[name="ORIGINE_Id"]').change(function(){
		var origine = $(this).val();
		$('select[name="SOUS_ORIGINE_Id"]').html("");
		$('select[name="SOUS_ORIGINE_Id"]').append("<option value=\"\"></option>");
		Object.keys(sous_origine[origine]).forEach(function(key) {
			$('select[name="SOUS_ORIGINE_Id"]').append("<option value=\""+key+"\">"+sous_origine[origine][key]+"</option>");
		});
});

<?php if(isset($_SESSION['created'])){?>
	$('#created').modal('show');
<?php } ?>

<?php if(isset($_SESSION['event_added'])){?>
	$('#event_added').modal('show');
<?php } ?>

<?php if(isset($_SESSION['conversion_reussie'])){?>
	$('#converted').modal('show');
<?php } ?>




   
$('#result').DataTable( {
	"lengthMenu": [[25, 50, 75, 100], [25, 50, 75, 100]],
    "sDom": '<"top"ilf>rt<"bottom"ip><"clear">',
	"order": [[ 2, "asc" ]],
	 columnDefs: [ {
		targets: [ 2 ],
		orderData: [ 2, 3 ]
		} ],

    "autoWidth": false,
	"language" : {
	"sProcessing":     "Traitement en cours...",
	"sSearch":         "Rechercher&nbsp;:",
    "sLengthMenu":     "&nbsp;&nbsp;&nbsp;Afficher _MENU_ &nbsp;particuliers",
	"sInfo":           "&nbsp;&nbsp;&nbsp;Affichage du particulier _START_ à _END_ sur _TOTAL_ particuliers",
	"sInfoEmpty":      "&nbsp;&nbsp;&nbsp;Affichage du particulier 0 à 0 sur 0 particulier",
	"sInfoFiltered":   "(filtré de _MAX_ particuliers au total)",
	"sInfoPostFix":    "",
	"sLoadingRecords": "Chargement en cours...",
    "sZeroRecords":    "Aucun particuier à afficher",
	"sEmptyTable":     "Aucune particulier ne correspond à la recherche",
	"oPaginate": {
		"sFirst":      "Premier",
		"sPrevious":   "Précédent",
		"sNext":       "Suivant",
		"sLast":       "Dernier"
	},
	"oAria": {
		"sSortAscending":  ": activer pour trier la colonne par ordre croissant",
		"sSortDescending": ": activer pour trier la colonne par ordre décroissant"
	}
},
	responsive : true
  } );
   
   
   
   
});

</script>

<script type="text/javascript">



</script>

<script src='//rum.monitis.com/get/jsbenchmark.min.js?id=105924' type='text/javascript' async='async'></script>

<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
