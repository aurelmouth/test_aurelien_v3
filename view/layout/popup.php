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
</head>
<!-- BEGIN BODY -->
	<?php if($this->request->action == 'result') { ?>
	<body class="page-header-fixed">
	<?php } else {?>
	<body class="search"> 
	<?php } ?>

<!-- BEGIN HEADER -->






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

<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>

<script src="<?php echo serveur_url.DS. 'webroot' .DS; ?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>


<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>

<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/scripts/search.js"></script>


<script type="text/javascript" src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/scripts/app.js"></script>


<script src="<?php echo serveur_url.DS.'webroot'.DS; ?>assets/scripts/table-advanced.js"></script>
<script>

<?php foreach($_SESSION['CIVILITE'] as $cle => $valeur) {?>
	window.tableCivilite[<?php echo $cle;?>] = "<?php echo $valeur;?>";
<?php }?>

function isDate(txtDate){

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

function formreturn(idParticulier, prenomParticulier, nomParticulier, statut, civilite){
	if (window.opener.type == 'parrain'){
		window.opener.$('input[name="Id_Parrain"]').attr('value', idParticulier);
		window.opener.$('#Parrain').attr('value', civilite + prenomParticulier + " " + nomParticulier + ' | ' + statut + ' n° ' + idParticulier);
	}
	
	if(window.opener.type == 'conjoint'){
		window.opener.$('input[name="Id_Conjoint"]').attr('value', idParticulier);
		window.opener.$('#Conjoint').attr('value', civilite +  prenomParticulier + " " + nomParticulier + ' | ' + statut + ' n° ' + idParticulier);
	}
	
	window.close();

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

 
	App.init(); 
	
	Search.init();

   
   <?php if($this->request->action == 'fiche') {?>
		$('input, select').attr('disabled', 'disabled');
   <?php }?>
   
   <?php if(isset($this->vars['zero_resultat'])){?>
		$('.alert-danger').show();
		$('.search-form').on('keyup keypress blur change paste cut', function(){
			$('.alert-danger').hide();
		});
   <?php } ?>
   



   
$('#sample_6').DataTable( {
    "sDom": '<"top"lf>rt<"bottom"ip><"clear">',
	"language" : {
	"sProcessing":     "Traitement en cours...",
	"sSearch":         "Rechercher&nbsp;:",
    "sLengthMenu":     "Afficher _MENU_ &nbsp;particuliers",
	"sInfo":           "Affichage du particulier _START_ à _END_ sur _TOTAL_ particuliers",
	"sInfoEmpty":      "Affichage du particulier 0 à 0 sur 0 particulier",
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


</script>

<script src='//rum.monitis.com/get/jsbenchmark.min.js?id=105924' type='text/javascript' async='async'></script>

<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
