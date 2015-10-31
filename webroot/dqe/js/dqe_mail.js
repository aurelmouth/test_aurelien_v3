// initialisation de l'_adrese
var _dqeLive = new Object();
   _dqeLive.licence = 'PR16F16N';		
   _dqeLive.url = 'https://prod2.dqe-software.com/';
   _dqeLive.debug = true;
   
var _dqeMail = new Object();
   _dqeMail.mail = "";
   _dqeMail.mailorigine = "";
   _dqeMail.mailDomaine = "";
   _dqeMail.mailArg1 = "";
   _dqeMail.mailArg2 = "";
   _dqeMail.erreur = "";

var _dqeStuff = new Object();
   _dqeStuff.instance = 1;
   _dqeStuff.editMail = '';
   _dqeStuff.Valide = '';
   _dqeStuff.Resultat = '';
   _dqeStuff.controleLan = 0;

// gestion de la saisie d'un code postal'
function verifMail(edit_mail, bouton_valide, text_resultat) {
	if($(edit_mail).val() != ''){
   _dqeStuff.editMail = edit_mail;
   _dqeStuff.Valide = bouton_valide;
   _dqeStuff.Resultat = text_resultat;
   jQuery(_dqeStuff.editMail).bind({ keyup: function(key) {netmail(key, jQuery(this).val());}});
      
   console.log("L'appel verifMail"+_dqeStuff.Valide);
   ValideMail();
	}
}

function netmail(key, val){
   if (key.which == 8) {
      if (_dqeLive.debug) {console.log("netmail key 8 : "+key.toString());}
      jQuery(_dqeStuff.Resultat).html("");
      jQuery(_dqeStuff.editMail).removeClass('dqe-anime');
   } 
   if (_dqeLive.debug) {console.log("netmail val : "+val.toString());}
}

function ValideMail() {
   console.log("L'appel Valide");
   jQuery(_dqeStuff.Resultat).html("");
   jQuery(_dqeStuff.editMail).addClass('dqe-anime');
   
   valmail = gestionAccentMail(jQuery(_dqeStuff.editMail).val().replace('+','%2b'));
   
   if (_dqeStuff.controleLan!=0){
       if (_dqeLive.debug) {console.log("recherchemail problem abort _dqeStuff.controleLan : "+_dqeStuff.controleLan.toString());}
       try{
          recMail.abort();    
       }catch(e){
          if (_dqeLive.debug) {console.log("Probleme dans l'appel recMail.abort() "+e.toString());}
       }       
   }
   _dqeStuff.controleLan = 0;
   
   var recMail = jQuery.ajax({
      url: _dqeLive.url+"DQEEMAILLOOKUP/?Email="+valmail+"&Licence="+_dqeLive.licence, 
      dataType: 'jsonp',
      crossDomain: true,
      success: visuMail
   });
   recMail.promise()
     .done(function () { if (_dqeLive.debug) {console.log("L'appel Ajax est réussi.");recMail.abort();jQuery(_dqeStuff.editMail).removeClass('dqe-anime');} })  // Callback de réussite  callback(_listeVoie);
     .fail(function () { if (_dqeLive.debug) {console.log("L'appel Ajax est raté.");recMail.abort();jQuery(_dqeStuff.editMail).removeClass('dqe-anime');} })
}

function visuMail(Response) {
    var temp = eval('('+Response+')');
    _dqeStuff.controleLan = 0;
    var a = '';
    valerreur = "";
    var testok = 0;
    var resultat=new Array();
    jQuery.each(temp, function(nomRes,res) {
        resultat[nomRes]=res;
//      ## 91 = syntaxe erreur
//      ## 92 = domaine introuvable
//      ## 93 = domaine blaklisté
//      ## 94 = email est un spam
//      ## 99 = non disponible
//      ## 02 = email non trouvé dans le domaine
//      ## 01 = email est ok
//      ## 00 = email est ok

        if (resultat[nomRes].IdError == '00') {
            a = "<small>L'email est valide</small>";
            valerreur = 'OK';
            testok = 1;
        } else if (resultat[nomRes].IdError == '01'){
            console.log('controle email 01');
            a = "<small>L'email n'a pas été validé par le domaine</small>";
            valerreur = 'KO';
            testok = 2;
        } else if (resultat[nomRes].IdError == '02'){
            a = "<small>L'email n'a pas été identifié dans le domaine</small>";
            valerreur = 'KO';
        } else if (resultat[nomRes].IdError == '91'){
            a = "<small>L'email comporte une erreur de syntaxe</small>";
            valerreur = 'KO';
        } else if (resultat[nomRes].IdError == '92'){
            a = "<small>l'email comporte un nom de domaine introuvable</small>";
            valerreur = 'KO';
        } else if (resultat[nomRes].IdError == '93'){
            a = "L'email comporte un nom de domaine blacklisté</small>";
            valerreur = 'KO';
        } else if (resultat[nomRes].IdError == '94'){
            a = "<small>L'mail comporte un nom de domaine de spam</small>";
            valerreur = 'KO';
        } else if (resultat[nomRes].IdError == '99'){
            a = "<small>service non disponible</small>";
            valerreur = 'KO';
        } else {
            a = "<small>L'email est erronée</small>";
            valerreur = 'KO';
        }
        _dqeMail.erreur = valerreur;
    });
    jQuery(_dqeStuff.Resultat).html(a);  
    jQuery(_dqeStuff.editMail).removeClass('dqe-anime');
    jQuery(_dqeStuff.Resultat).removeClass('dqe-info-ko');
    jQuery(_dqeStuff.Resultat).removeClass('dqe-info-ok');
    jQuery(_dqeStuff.Resultat).removeClass('dqe-info-ook');
    jQuery(_dqeStuff.editMail).removeClass('dqe-coche');
    jQuery(_dqeStuff.editMail).removeClass('dqe-error');
	//jQuery(_dqeStuff.Resultat).closest('.form-group').removeClass('has-error');
    if (testok==1){
       if (valerreur == 'OK'){
         jQuery(_dqeStuff.Resultat).addClass('dqe-info-ok');
         jQuery(_dqeStuff.editMail).addClass('dqe-coche');
       } else {
         jQuery(_dqeStuff.Resultat).addClass('dqe-info-ook'); 
         jQuery(_dqeStuff.editMail).addClass('dqe-error');
       }
    } else if (testok==2){
       jQuery(_dqeStuff.Resultat).addClass('dqe-info-ook'); 
       jQuery(_dqeStuff.editMail).addClass('dqe-error');
    } else {
       jQuery(_dqeStuff.Resultat).addClass('dqe-info-ko');
       jQuery(_dqeStuff.Resultat).closest('.form-group').addClass('has-error');
       jQuery(_dqeStuff.editMail).addClass('dqe-error');
    }
}

function change_email(val){
   a = "Votre Adresse mail est valide";
   _dqeMail.erreur = 'OK';
   jQuery(_dqeStuff.Resultat).html(a);
   jQuery(_dqeStuff.Resultat).removeClass('dqe-info-ook');
   jQuery(_dqeStuff.editMail).removeClass('dqe-error');
   jQuery(_dqeStuff.Resultat).addClass('dqe-info-ok');
   jQuery(_dqeStuff.editMail).addClass('dqe-coche');
   jQuery(_dqeStuff.editMail).val(val);
}

function zeroFormMail(){
   jQuery(_dqeStuff.Resultat).html("&nbsp;");
   jQuery(_dqeStuff.editMail).removeClass('dqe-anime');
   jQuery(_dqeStuff.Resultat).removeClass('dqe-info-ko');
   jQuery(_dqeStuff.Resultat).removeClass('dqe-info-ok');
   jQuery(_dqeStuff.Resultat).removeClass('dqe-info-ook');
   jQuery(_dqeStuff.editMail).removeClass('dqe-coche');
   jQuery(_dqeStuff.editMail).removeClass('dqe-error');
   
   // remise a vide du formulaire saisie _adresse
   _dqeMail.mail = "";
   _dqeMail.mailorigine = "";
   _dqeMail.mailDomaine = "";
   _dqeMail.mailArg1 = "";
   _dqeMail.mailArg2 = "";
   _dqeMail.erreur = "";
   
   jQuery(_dqeStuff.editMail).val("");
   jQuery(_dqeStuff.editMail).focus();
}
    
// fonctions génériques
function gestionAccentMail(val){
    // gestion des accents
    retour = '';
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
        if (code == 160) {
            // on traite les espaces 
            retour += '%20';
            ok = true;
        }
        if (code == 39) {
            // on traite les apostrophes 
            retour += '%27';
            ok = true;
        }
        if (code == 38) {
            // on traite les & 
            retour += '%26';
            ok = true;
        }
        if (code == 35) {
            // on traite les # 
            retour += '%23';
            ok = true;
        }
        
        if (! ok){
            retour += val.charAt(i);
        }    
    } 
    return retour;
}



