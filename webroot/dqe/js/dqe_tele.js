var _dqeLive = new Object();
   _dqeLive.licence = 'PR16F16N';
   _dqeLive.url = 'https://prod2.dqe-software.com/';
   //_dqeLive.url = 'http://127.0.0.1:10001/';
   _dqeLive.debug = true;
   
// initialisation de l'_adresse
var _dqeTel = new Object();
   _dqeTel.tel = "";
   _dqeTel.pays = "FRA";
   _dqeTel.telorigine = "";
   _dqeTel.erreur = "";

var _dqeStuff = new Object();
   _dqeStuff.instance = 1;
   _dqeStuff.editTel = '';
   _dqeStuff.editPays = '';
   _dqeStuff.Valide = '';
   _dqeStuff.Resultat = '';
   _dqeStuff.editFormat = '';
   _dqeStuff.controleLan = 0;

// gestion de la saisie d'un code postal'
function verifTel(vformat, edit_pays, edit_tel, bouton_valide, text_resultat) {
	if($(edit_tel).val() != ''){
   _dqeStuff.editTel = edit_tel;
   _dqeStuff.editPays = edit_pays;
   _dqeStuff.Valide = bouton_valide;
   _dqeStuff.Resultat = text_resultat;
   _dqeStuff.editFormat = vformat;
      
   console.log("L'appel verifTel"+_dqeStuff.Valide);
   ValideTel();
	}
}

function nettel(key, vformat, edit_tel, bouton_valide, text_resultat){
   if (_dqeStuff.editTel==''){
      _dqeStuff.editTel = edit_tel;
      _dqeStuff.Valide = bouton_valide;
      _dqeStuff.Resultat = text_resultat;
      _dqeStuff.editFormat = vformat;
   }
   if (key.which == 8) {
      if (_dqeLive.debug) {console.log("nettel key 8 : "+key.which.toString());}
      jQuery(_dqeStuff.Resultat).html("");
      jQuery(_dqeStuff.editTel).removeClass('dqe-anime');
      jQuery(_dqeStuff.editTel).removeClass('dqe-coche');
      jQuery(_dqeStuff.editTel).removeClass('dqe-error-tel');
   } 
   if (key.which == 13) {
      if (_dqeLive.debug) {console.log("nettel key 13 : "+key.which.toString());}
      jQuery(_dqeStuff.editTel).removeClass('dqe-anime');
      ValideTel();
   }
}

function ValideTel() {
   console.log("L'appel Valide");
   jQuery(_dqeStuff.Resultat).html("");
   jQuery(_dqeStuff.editTel).removeClass('dqe-coche');
   jQuery(_dqeStuff.editTel).removeClass('dqe-error-tel');
   jQuery(_dqeStuff.editTel).addClass('dqe-anime');
   
   valtel = jQuery(_dqeStuff.editTel).val();
   valpays = jQuery(_dqeStuff.editPays).val();
   //valtel = gestionAccentTel(jQuery(_dqeStuff.editTel).val().replace('+',''));
   valformat = "3";
   
   if (_dqeStuff.controleLan!=0){
       if (_dqeLive.debug) {console.log("recherchetel problem abort _dqeStuff.controleLan : "+_dqeStuff.controleLan.toString());}
       try{
          recTel.abort();    
       }catch(e){
          if (_dqeLive.debug) {console.log("Probleme dans l'appel recTel.abort() "+e.toString());}
       }       
   }
   _dqeStuff.controleLan = 0;
   if (_dqeLive.debug) {console.log("recherchetel valtelxx : "+valtel);}
   
   var recTel = jQuery.ajax({
      url: _dqeLive.url+"TEL/?Tel="+valtel+"&Format="+valformat+"&Licence="+_dqeLive.licence+"&Pays="+valpays,
      dataType: 'jsonp',
      crossDomain: true,
      success: visuTel
   });
   recTel.promise()
     .done(function () { if (_dqeLive.debug) {console.log("L'appel Ajax est réussi.");recTel.abort();} })  // Callback de réussite  callback(_listeVoie);
     .fail(function () { if (_dqeLive.debug) {console.log("L'appel Ajax est raté.");recTel.abort();} })
}

function visuTel(Response) {
    var temp = eval('('+Response+')');
    _dqeStuff.controleLan = 0;
    var a = '';
    valerreur = "";
    var testok = false;
    var resultat=new Array();
    jQuery.each(temp, function(nomRes,res) {
        resultat[nomRes]=res;
        if (resultat[nomRes].IdError == 1) {
            // telephone valide
            a = '<small>Le numéro de téléphone est valide</small>';
            valerreur = 'OK';
            testok = true;
        } else if (resultat[nomRes].IdError == 2) {
            testok = true;
            a = "<small>Le numéro de téléphone n'a pas été contrôlé (international?)</small>";
            valerreur = 'OK';
        } else {
            a = "<small>Le numéro de téléphone n'est pas valide</small>";
            valerreur = 'KO';
        }
	
        _dqeTel.tel = resultat[nomRes].Tel;
        //alert(_dqeTel.tel);
        _dqeTel.telorigine = resultat[nomRes].TelOrigine;
        _dqeTel.valerreur = valerreur;
        jQuery(_dqeStuff.editTel).val(_dqeTel.tel);
    });
    jQuery(_dqeStuff.Resultat).html(a);  
    jQuery(_dqeStuff.editTel).removeClass('dqe-anime');
    jQuery(_dqeStuff.Resultat).removeClass('dqe-info-ko');
    jQuery(_dqeStuff.Resultat).removeClass('dqe-info-ok');
    jQuery(_dqeStuff.Resultat).removeClass('dqe-info-ook');
    jQuery(_dqeStuff.editTel).removeClass('dqe-coche');
    jQuery(_dqeStuff.editTel).removeClass('dqe-error-tel');
	jQuery(_dqeStuff.Resultat).closest('.form-group').removeClass('has-error');
    if (testok){
       jQuery(_dqeStuff.Resultat).addClass('dqe-info-ok');
       jQuery(_dqeStuff.editTel).addClass('dqe-coche');
    } else {
       jQuery(_dqeStuff.Resultat).addClass('dqe-info-ko');
	   jQuery(_dqeStuff.Resultat).closest('.form-group').addClass('has-error');
       jQuery(_dqeStuff.editTel).addClass('dqe-error-tel');
    }
}

function zeroFormTel(){
   jQuery(_dqeStuff.Resultat).html("&nbsp;");
   jQuery(_dqeStuff.editTel).removeClass('dqe-anime');
   jQuery(_dqeStuff.Resultat).removeClass('dqe-info-ko');
   jQuery(_dqeStuff.Resultat).removeClass('dqe-info-ok');
   jQuery(_dqeStuff.Resultat).removeClass('dqe-info-ook');
   jQuery(_dqeStuff.editTel).removeClass('dqe-coche');
   jQuery(_dqeStuff.editTel).removeClass('dqe-error-tel');
   
   // remise a vide du formulaire saisie _adresse
   _dqeTel.tel = "";
   _dqeTel.telorigine = "";
   _dqeTel.valerreur = "";
   
   jQuery(_dqeStuff.editTel).val("");
   jQuery(_dqeStuff.editTel).focus();
}
    
// fonctions génériques
function gestionAccentTel(val){
    // gestion des accents
    retour = '';
    if (_dqeLive.debug) {
       console.log("test gestionAccentTel : "+val.toString());
    }
    for (var i=0; i<val.length; i++) {
        ok=false;
        code = val.charCodeAt(i);
	
        if ((code >= 48) && (code <= 57)) {
            // on traite les chiffres 
            retour += val.charAt(i);
            ok = true;
        }
        if ((code >= 65) && (code <= 90)) {
            // on traite les lettre majuscule 
            retour += val.charAt(i);
            ok = true;
        }
        if ((code >= 97) && (code <= 122)) {
            // on traite les lettres minuscules
            retour += val.charAt(i);
            ok = true;
        }
        if ((code >= 224) && (code <= 229)) {
            // on traite les a 
            retour += 'a';
            ok = true;
        }
        if ((code >= 249) && (code <= 252)) {
            // on traite les u 
            retour += 'u';
            ok = true;
        }
        if ((code >= 232) && (code <= 235)) {
            // on traite les e
            retour += 'e';
            ok = true;
        }
        if ((code >= 236) && (code <= 239)) {
            // on traite les i 
            retour += 'i';
            ok = true;
        }
        if ((code >= 242) && (code <= 246)) {
            // on traite les o 
            retour += 'o';
            ok = true;
        }
        if (code == 231) {
            // on traite les chiffres 
            retour += 'c';
            ok = true;
        }
        if (code == 43) {
            // on traite les plus 
            retour += '+';
            if (_dqeLive.debug) {
               console.log("test sgne plus.");
            }
            ok = true;
        }
        
        if (! ok){
            retour += val.charAt(i);
        }    
    } 
    return retour;
}



