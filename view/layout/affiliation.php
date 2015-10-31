<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>Prefon CRM | Recherche</title>
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
	<link rel="stylesheet" type="text/css" href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME STYLES -->
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/style-conquer.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/pages/search.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
	
	<style>
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
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/scripts/recipient.js"></script>


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

window.tableMontantCotisation = {};

<?php foreach(lof::$listeValeurs['CLASSE_COTISATION_MONTANT'] as $cle => $valeur) {?>
	window.tableMontantCotisation[<?php echo $cle;?>] = <?php echo $valeur;?>;
<?php }?>

function recherche_particulier_conjoint() {
		type="conjoint";
		popup = window.open('<?php echo serveur_url.DS.'popup/search'; ?>','Recherche compte','width=1000,height=600,toolbar=no,location=no,directories=no,menubar=no,scrollbars=yes,copyhistory=no,resizable=no');
	}
	
function supprimer_particulier_conjoint() {
		$('input[name="Id_Conjoint"]').attr('value', '0')
		$('#Conjoint').attr('value', "")
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

function format_points(n) {
    return n.toString().replace(/./g, function(c, i, a) {
        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? " " + c : c;
    });
}


function saisir_ba(id_particulier){
	$('#saisir_ba #num_particulier').html(function(){
		return id_particulier;
	});
	$('#saisir_ba #saisir_ba_particulier').attr('href', '<?php echo Router::url('affiliation/saisir_ba/');?>' + id_particulier);
	$("#saisir_ba").modal('show');
}

function ba_refuse(id_particulier, id_evenement){
	$('#ba_refuse #num_particulier').html(function(){
		return id_particulier;
	});
	$('#ba_refuse #ba_refuse_particulier').attr('href', '<?php echo Router::url('affiliation/ba_refuse/');?>' + id_particulier + '/' + id_evenement);
	$("#ba_refuse").modal('show');
}

function fiche_particulier(id_particulier){
	var left = (screen.width/2)-(1000/2);
	var top = (screen.height/2)-(600/2);
	popup = window.open('<?php echo serveur_url.DS.'popup/fiche/'; ?>' + id_particulier,'Fiche particulier N° ' + id_particulier,'width=1000,height=600, top='+top+', left='+left+', toolbar=no,location=no,directories=no,menubar=no,scrollbars=yes,copyhistory=no,resizable=no');
}

function ouvrir_fiche_conjoint(){
		var id_conjoint = $('input[name="Id_Conjoint"]').attr('value');

		if( id_conjoint > 0){
			window.open("<?php echo Router::url('recipient/edit/');?>" + id_conjoint);
			fiche_particulier(id_conjoint);
		}
}



jQuery.extend( jQuery.fn.dataTableExt.oSort, {
"date-uk-pre": function ( a ) {
    var ukDatea = a.split('/');
	console.log("well; wemm");
    return (ukDatea[2] + ukDatea[1] + ukDatea[0]) * 1;
},



"date-uk-asc": function ( a, b ) {
    return ((a < b) ? -1 : ((a > b) ? 1 : 0));
},

"date-uk-desc": function ( a, b ) {
    return ((a < b) ? 1 : ((a > b) ? -1 : 0));
}
} );

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


jQuery(document).ready(function() {  
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
	
$.validator.methods.range = function (value, element, param) {
    var globalizedValue = value.replace(",", ".");
    return this.optional(element) || (globalizedValue >= param[0] && globalizedValue <= param[1]);
}
 
$.validator.methods.number = function (value, element) {
    return this.optional(element) || /^-?(?:\d+|\d{1,3}(?:[\s\.,]\d{3})+)(?:[\.,]\d+)?$/.test(value);
}

	 App.init(); // initlayout and core plugins
	 Recipient.init();
	 
		$('.login-form input[name!="sEmail"]').on('keyup paste ', function(){
			$(this).val(majusculeSansAccents($(this).val()));
		});
	 
		$('a.btn-success').click(function () {
			$('#saisie').modal('show');
		});

		$('#ba_refuse_particulier').click(function () {
			console.log('Yatta');
			$('#saisie').modal('hide');
			$('.login-form').validate();
		});
		
	 
	 
		$('input[name="sFirstName"], input[name="sLastName"], input[name="Nom_Naissance"], #adresse_block input[type="text"]').blur(function(){
			$(this).val($(this).val().toUpperCase());
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
		
		$('input[name="Reversion"]').change(function(){
			if($('input[name="Reversion"][value="1"]').is(":checked")){
					$('#reversion').show();
                }else{
					$('#reversion').hide();
					$('#reversion input').attr("value", "");
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
		
		$('select[name="STATUT_AFFILIATION_Id"]').change(function(){
			if($(this).val() == 1 || $(this).val() == 2){
				$('#affiliation_div').show(); 
			}else if($(this).val() == 4) {
				$('#affiliation_div').hide();
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
				$('#mois_prelevement').hide();
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
		
		$('select[name="Nb_Annees_Rachat"]').change(function(){
			if($(this).val() == -1){
				$('input[name="Montant_Versement_Exceptionnel"]').val("");
				$('#montant_libre').show();
			}else{
				console.log($(this).val() * 228);
				$('#montant_libre').hide();
				$('input[name="Montant_Versement_Exceptionnel"]').attr("value", $(this).val() * 228);
			}
		});
	
<?php if(isset($_SESSION['zero_resultat'])){?>
	$('.alert-danger').show();
<?php } ?>

<?php if(isset($this->vars['id'])){?>
	$("#ba_recu").modal('show');
<?php } ?>

var i = 0;
$('.valider').on('click', function(e){
	$('#saisie_affiliation').modal('show');
});

$('#validation_saisie').on('click', function(){
	$('#valider').attr('name', 'valider');
	$('.login-form').submit();
});

$('select[name="MODE_REGLEMENT_RETRAITE_COTISANT_Id"]').change(function(){
	if($(this).val() == 3){
		$('.imprimer_precompte').show();
	}else{
		$('.imprimer_precompte').hide();
	}
});

$('input, select').change(function(){
	i++;
	console.log(i);
});

<?php if($this->request->action == "saisir_ba") {?>
$('.imprimer_precompte').on('click', function(e){
	if(i > 0){
		$('#no_print').modal('show');
	}else{
		window.location.href = "<?php echo Router::url('affiliation/imprimer_precompte/'.$this->request->params[0]); ?>";
	}
});
<?php } ?>

$('.rib_iban').on('keyup paste', function(){
	$(this).val($(this).val().toUpperCase());
	if($(this).val().length == 4){
		if(this.name[11] != 7){
			$('input[name="Mandat_IBAN' + (parseInt(this.name[11]) + 1) + '"]').focus();
		}
	}
});


$('.search-form').on('keyup keypress blur change paste cut', function(){
	$('.alert-danger').hide();
});


   
$('#result').DataTable( {

	"lengthMenu": [[25, 50, 75, 100], [25, 50, 75, 100]],
    "sDom": '<"top"ilf>rt<"bottom"ip><"clear">',
    "autoWidth": false,
	"aaSorting": [ [7,'desc'], [2,'asc'] ],
	  "columnDefs": [
		{ "width": "26%", "targets": 8}
		],
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
	"sEmptyTable":     "Aucune donnée disponible dans le tableau",
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
