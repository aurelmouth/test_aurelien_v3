var _dqeLive = new Object();
   _dqeLive.licence = 'PR16F16N';
   _dqeLive.url = 'https://prod2.dqe-software.com/';
   _dqeLive.debug = false;
   
var _dqeStuff = new Object();
   _dqeStuff.instance = 1;
   _dqeStuff.taille = 38;
   _dqeStuff.editCp = '';
   _dqeStuff.editVille = '';
   _dqeStuff.editAdr1 = '';
   _dqeStuff.editAdr2 = '';
   _dqeStuff.editAdr3 = '';
   _dqeStuff.editAdr4 = '';
   _dqeStuff.editSoc = '';
   _dqeStuff.zonevoie = '';
   _dqeStuff.zonelieu = '';
   _dqeStuff.zonecp2 = '';
   _dqeStuff.zonesociete = '';
   _dqeStuff.libAdr2 = '';
   _dqeStuff.listeVille = [];
   _dqeStuff.listeVoie = [];  
   _dqeStuff.listeNum = [];
   _dqeStuff.NbrNum = "0";
   _dqeStuff.listeCompl = [];
   _dqeStuff.avec_cedex = false;
   _dqeStuff.controleLanCp = 0;
   _dqeStuff.controleLanVoie = 0;
   _dqeStuff.controleLanNum = 0;
   _dqeStuff.controleLanCompl = 0;
   
// initialisation de l'_adresse
var _adresse = new Object();
   _adresse.pays="FRA";         // france
   _adresse.cp="";              // code postal
   _adresse.ville="";           // ville
   _adresse.lieudit="";           // lieudit
   _adresse.province="";           // province
   _adresse.codeville=0;        // code de la ville
   _adresse.typevoie = "";      // type de voie
   _adresse.voie = "";          // nom de la voie
   _adresse.adr1="";            // _adresse1
   _adresse.adr2="";            // _adresse2
   _adresse.adr3="";            // _adresse3
   _adresse.adr4="";            // _adresse4
   _adresse.societe="";            // _societe
   _adresse.codeadr=0;         // code _adresse
   _adresse.numrue="";          // numero de rue
   _adresse.codenumrue="";      // code numero de rue
   _adresse.valide = "OK";      // par défaut l'adresse est OK

// gestion de la saisie d'un code postal'
function verifCp(key, valeur, edit_cp, edit_ville, edit_adr1, edit_adr2, edit_adr3, edit_adr4, edit_soc, voie, lieudit, societe, cp2) {
   if ((key.keyCode != 40)&&(key.keyCode != 39)&&(key.keyCode != 38)&&(key.keyCode != 37)&&(key.keyCode != 13)&&(key.keyCode != 9)){
   
      _dqeStuff.editCp = '#'+edit_cp;
      _dqeStuff.editVille = '#'+edit_ville;
      _dqeStuff.editAdr1 = '#'+edit_adr1;
      _dqeStuff.editAdr2 = '#'+edit_adr2;
      _dqeStuff.editAdr3 = '#'+edit_adr3;
      _dqeStuff.editAdr4 = '#'+edit_adr4;
      _dqeStuff.editSoc = '#'+edit_soc;
      _dqeStuff.zonevoie = '#'+voie;
      _dqeStuff.zonesociete = '#'+societe;
      _dqeStuff.zonelieu = '#'+lieudit;
      _dqeStuff.zonecp2 = '#'+cp2;
      _dqeStuff.libAdr2 = edit_adr2;
	  
	  
	     if($('#Pays').val() == 'France' || $('#Pays').val() == '' ){
      if (valeur.length >= 5){
         if (_dqeLive.debug) {console.log("rechercheVille");}
         rechercheVille(valeur);
      } else if (valeur.length <= 3){
         zeroForm();
      }	
	} else {
		jQuery(_dqeStuff.editVille).removeAttr('readonly');
		jQuery(_dqeStuff.editAdr1).removeAttr('readonly');
		jQuery(_dqeStuff.editAdr2).removeAttr('readonly');
		jQuery(_dqeStuff.editAdr3).removeAttr('readonly');
	}
   }
}

// recherche des villes correspondantes à la saisie du code postal
function rechercheVille(val) {
   // on incrémente l'instance pour la recherche en mode asynchrone 
   _dqeStuff.instance += 1;
   // on regarde en que mode on souhaite faire la recherche
   if (_dqeStuff.controleLanCp!=0){
       try{
          recVille.abort();    
       }catch(e){
          if (_dqeLive.debug) {console.log("Probleme dans l'appel recVille.abort() "+e.toString());}
       }       
   }
   _dqeStuff.controleLanCp = 0;
   jQuery(_dqeStuff.editVille).removeAttr('readonly');
   jQuery(_dqeStuff.editAdr1).removeAttr('readonly');
   jQuery(_dqeStuff.editAdr2).removeAttr('readonly');
   jQuery(_dqeStuff.editAdr3).removeAttr('readonly');
   var recVille = jQuery.ajax({
                     type: 'GET',
                     url: _dqeLive.url+'CP/',
                     dataType: "jsonp",
                     cache: false,
                     data: {
                        Pays: _adresse.pays,
                        CodePostal: val,
                        Licence: _dqeLive.licence,
                        Instance: _dqeStuff.instance,
                        Alpha: false
                     },
                     jsonp: "callback",
                     timeout:2000,
                     crossDomain: true,
                     success: visuVille
                  });
   recVille.promise()
            .done(function () { if (_dqeLive.debug) {console.log("L'appel Ajax est réussi.");recVille.abort();} })  // Callback de réussite  callback(_listeVoie);
            .fail(function () { if (_dqeLive.debug) {console.log("L'appel Ajax est raté.");recVille.abort();} })   // Callback d'échec
}

// Récupération de la réponse du web service en mode JSON ou en mode SOAP
function visuVille(RtnData) {
   _dqeStuff.listeVille = [];
   _dqeStuff.controleLanCp = 1;
   if (_dqeLive.debug) {console.log("L'appel visuVille 2");}
   if (RtnData=='{}'){
      if (_dqeLive.debug) {console.log("L'appel visuVille vide");}
      Return;
   }
   var repville = eval('(' + RtnData + ')');
   pos = 1;
      
   var MemInstance = 0;
   var resultat=new Array();
   try {
      jQuery.each(repville, function(nomRes,res) {
          resultat[nomRes]=res;
          if ("Voie" in resultat[nomRes]){
             // on est dans le cas d'un cédex     
             var tpvoie = recupval(resultat[nomRes].Voie).split(',');
             var tpentreprise = '';
             var tplieudit = resultat[nomRes].LieuDit;
             if (tpvoie.length==3){
                tp_voie = tpvoie[2];
                _dqeStuff.avec_cedex = true;
                tp_comp2 = tpvoie[1];
                tpentreprise = tpvoie[0];
             } else {
                if (tpvoie[0].indexOf('PO BOX')!=-1){            
                  tp_voie = "";
                  tp_comp2 = ''; 
                  tplieudit = tpvoie[0];
                } else {
                  tp_voie = tpvoie[0];
                  tp_comp2 = '';
                }
             }  
             if (_dqeLive.debug) {console.log("tpentreprise "+tpentreprise.toString());}
             if (tpentreprise==''){
               tpentreprise = recupval(resultat[nomRes].Entreprise);
             }
             if (_dqeLive.debug) {console.log("label "+resultat[nomRes].Localite + ' ' +jQuery.trim( tp_voie+ ' '+tpentreprise.toString()));}
             _dqeStuff.listeVille.push({label: resultat[nomRes].Localite + ' ' +jQuery.trim( tp_voie+ ' '+tpentreprise.toString()),
                    value: jQuery.trim(resultat[nomRes].Localite), id: pos, codeville: resultat[nomRes].IDLocalite,
                    ville: resultat[nomRes].Localite, lieudit: tplieudit, cp: resultat[nomRes].CodePostal,
                    province: recupval(resultat[nomRes].Province), voie: tp_voie, complement:recupval(resultat[nomRes].Complement), entreprise:tpentreprise.toString(),
                    numero:recupval(resultat[nomRes].Numero), complement2:tp_comp2}); 
          } else {
             var cptp = testnum2(resultat[nomRes].CodePostal);
             _dqeStuff.listeVille.push({label: jQuery.trim(cptp+' '+resultat[nomRes].Localite) + ' ' + resultat[nomRes].LieuDit,
                 value: jQuery.trim(resultat[nomRes].Localite), id: pos, codeville: resultat[nomRes].IDLocalite,
                 ville: resultat[nomRes].Localite, lieudit: resultat[nomRes].LieuDit, cp: resultat[nomRes].CodePostal, entreprise:'',
                 province: resultat[nomRes].Province}); 
          }
          MemInstance = resultat[nomRes].Instance;
          pos=pos+1;
      });
      pos -= 1;  
      _dqeStuff.controleLanCp = 2;
      
      jQuery(_dqeStuff.editVille).focus();
      if (pos > 1) {
         console.log('_dqeStuff.listeVille : '+_dqeStuff.listeVille);
         jQuery(_dqeStuff.editVille).autocomplete({
            options: { delay: 1, minLength: 3 },     // par défaut on ne lance pas de recherche avant 3 caractères
            source: _dqeStuff.listeVille,
            open: function( event, ui ) {
               if (_dqeStuff.listeVille.length < 6){
                  if (_dqeStuff.listeVille.length <= 1){
                     jQuery('.ui-autocomplete').css("max-height",'25px');
                  } else {
                     jQuery('.ui-autocomplete').css("max-height",(_dqeStuff.listeVille.length*25)+'px');
                     if (_dqeLive.debug) {console.log("recherche ville _dqeStuff.listeVille : "+_dqeStuff.listeVille.length.toString());}
                  }
               } else {
                  jQuery('.ui-autocomplete').css("max-height",'150px');
               };
            },
            close: function(){           
               if (_dqeLive.debug) {console.log("autocomplete close cp 2");};           
               if ((_adresse.ville=='') && (_dqeStuff.listeVille.length >=1)){
                  enregistreVilleCpTab(_dqeStuff.listeVille[0]);
               };
            },
            select: function(event, ui) {
               enregistreVilleCp(ui);
               _dqeStuff.controleLanCp = 0;
               jQuery(this).autocomplete("close");
            }
         }).autocomplete("search", " ");
         console.log('apres autocomplete'+_dqeStuff.editVille);
      } else if (pos == 1) {
         // il n'existe qu'une ville pour ce code postal
         jQuery(_dqeStuff.editVille).val(_dqeStuff.listeVille[0]['ville']);
         _adresse.ville = jQuery.trim(_dqeStuff.listeVille[0]['ville']);
         _adresse.cp = jQuery.trim(_dqeStuff.listeVille[0]['cp']);
         _adresse.codeville = _dqeStuff.listeVille[0]['codeville'];
         _adresse.lieudit = jQuery.trim(_dqeStuff.listeVille[0]['lieudit']);
         _adresse.province = jQuery.trim(_dqeStuff.listeVille[0]['province']);
         if ((_adresse.province != '') && (_adresse.province != '*')){
           jQuery(_dqeStuff.editVille).val(_adresse.ville+' ('+_adresse.province+')');
         }
         if ((_adresse.lieudit != '') && (_adresse.lieudit != '*')){
            
            var lab="<td class='col1'><label id='lib_lieudit' class='label-tous'>Lieu-dit :</label></td>";
            lab+="<td class='col2'><input id='dqe_adr1' type='text' class='dqe-input-medium ui-corner-all' autocomplete='off' tabindex=3 placeholder='Ex : BP 859 / La Bergerie'/></td>";
            
            jQuery(_dqeStuff.zonelieu).html(lab);
            jQuery(_dqeStuff.editAdr1).val(_adresse.lieudit);
         }
         _dqeStuff.controleLanCp = 0;
         
         // on met en place l'autocomplétion sur la voie
         gestionVoie();
      };
   } catch(e){
      if (_dqeLive.debug) {console.log("Problem dans l'appel visuVille "+e.toString());}
   }
}

function testnum2(val){
    retour = val;
    test = jQuery.trim(val);
    for (i=0; i<test.length; i++){
        if (_dqeStuff.debug) {console.log("testnum : "+test[i]);}
        if (!(test[i] in [0,1,2,3,4,5,6,7,8,9])){
            retour = '';
            break;
        }
    }
    if (_dqeStuff.debug) {console.log("_dqeStuff.listeVoie : "+retour.toString());}
    return retour;
}

function enregistreVilleCpTab(listetab) {
   _adresse.ville = jQuery.trim(listetab['ville']);
   _adresse.codeville = listetab['codeville'];
   _adresse.cp = listetab['cp']; 
   _adresse.lieudit = listetab['lieudit'];
   _adresse.province = listetab['province'];
   jQuery(_dqeStuff.editCp).val(_adresse.cp);

   jQuery(_dqeStuff.editVille).val(_adresse.ville);
   
   if (_dqeLive.debug) {console.log("enregistreVilleCp : "+_adresse.province);}

   if ((_adresse.lieudit != '') && (_adresse.lieudit != '*')){
      var lab="<td class='col1'><label id='lib_lieudit' class='label-tous'>Lieu-dit :</label></td>";
      lab+="<td class='col2'><input id='dqe_adr1' type='text' class='dqe-input-medium ui-corner-all' autocomplete='off' tabindex=3 placeholder='Ex : BP 859 / La Bergerie'/></td>";
            
      jQuery(_dqeStuff.zonelieu).html(lab);
      jQuery(_dqeStuff.editAdr1).val(_adresse.lieudit);
   }

   if (jQuery.trim(listetab['entreprise'])!==''){      
      _adresse.adr1 = listetab['voie'];
      _adresse.numrue = listetab['numero'];
      _adresse.adr2 = listetab['complement'];
      _adresse.adr4 = jQuery.trim(listetab['complement2']); 
      _adresse.societe = jQuery.trim(listetab['entreprise']); 
      if (_dqeLive.debug) {console.log("_adresse.numrue : "+_adresse.numrue);}
      if (_dqeLive.debug) {console.log("_adresse.adr1 : "+_adresse.adr1);}
      var a = '';
      if (_adresse.societe!=''){
         a = "<td class='col1'><label id='lib_societe' class='label-tous'>Soci&eacute;t&eacute; :</label></td>";
         a += "<td class='col2'><input id='dqe_societe' class='dqe-input-medium ui-corner-all' autocomplete='off' tabindex=1 /></td>";    
         jQuery(_dqeStuff.zonesociete).html(a);
         jQuery(_dqeStuff.editSoc).val(_adresse.societe);
      }else{
         jQuery(_dqeStuff.zonesociete).html("");
      }
      if (_adresse.adr4!=''){
         a = "<td class='col1'><label id='lib_compl2' class='label-tous'>Compl&eacute;ments 2 :</label></td>";
         a += "<td class='col2'><input id='dqe_adr4' class='dqe-input-medium ui-corner-all' autocomplete='off' tabindex=7 /></td>";
         jQuery(_dqeStuff.zonecp2).html(a);
         jQuery(_dqeStuff.editAdr4).val(_adresse.adr4);
      }else{
         jQuery(_dqeStuff.zonecp2).html("");
      }
      if (_adresse.numrue!=''){
          jQuery(_dqeStuff.editAdr2).val(_adresse.numrue+' '+_adresse.adr1);
      } else {
          jQuery(_dqeStuff.editAdr2).val(_adresse.adr1);
      }
      jQuery(_dqeStuff.editAdr3).val(_adresse.adr2);
      jQuery(_dqeStuff.editAdr3).focus();
   } else {
      gestionVoie();
   };
}

function enregistreVilleCp(ui) {
   _adresse.ville = jQuery.trim(ui.item['ville']);
   _adresse.codeville = ui.item['codeville'];
   _adresse.cp = ui.item['cp']; 
   _adresse.lieudit = ui.item['lieudit'];
   _adresse.province = ui.item['province'];
   
   if (_dqeLive.debug) {console.log("enregistreVilleCp : "+_adresse.province);}
   
   if ((_adresse.lieudit != '') && (_adresse.lieudit != '*')){
      var lab="<td class='col1'><label id='lib_lieudit' class='label-tous'>Lieu-dit :</label></td>";
      lab+="<td class='col2'><input id='dqe_adr1' type='text' class='dqe-input-medium ui-corner-all' autocomplete='off' tabindex=3 placeholder='Ex : BP 859 / La Bergerie'/></td>";
      jQuery(_dqeStuff.zonelieu).html(lab);
      jQuery(_dqeStuff.editAdr1).val(_adresse.lieudit);
   }
   
   if (jQuery.trim(ui.item['entreprise'])!==''){      
      _adresse.adr1 = ui.item['voie'];
      _adresse.numrue = ui.item['numero'];
      _adresse.adr2 = ui.item['complement'];
      _adresse.adr4 = jQuery.trim(ui.item['complement2']); 
      _adresse.societe = jQuery.trim(ui.item['entreprise']); 
      if (_dqeLive.debug) {console.log("_adresse.numrue : "+_adresse.numrue);}
      if (_dqeLive.debug) {console.log("_adresse.adr1 : "+_adresse.adr1);}
      var a = '';
      if (_adresse.societe!=''){
         a = "<td class='col1'><label id='lib_societe' class='label-tous'>Soci&eacute;t&eacute; :</label></td>";
         a += "<td class='col2'><input id='dqe_societe' class='dqe-input-medium ui-corner-all' autocomplete='off' tabindex=1 /></td>";    
         jQuery(_dqeStuff.zonesociete).html(a);
         jQuery(_dqeStuff.editSoc).val(_adresse.societe);
      }else{
         jQuery(_dqeStuff.zonesociete).html("");
      }
      if (_adresse.adr4!=''){
         a = "<td class='col1'><label id='lib_compl2' class='label-tous'>Compl&eacute;ments 2 :</label></td>";
         a += "<td class='col2'><input id='dqe_adr4' class='dqe-input-medium ui-corner-all' autocomplete='off' tabindex=7 /></td>";
         jQuery(_dqeStuff.zonecp2).html(a);
         jQuery(_dqeStuff.editAdr4).val(_adresse.adr4);
      }else{
         jQuery(_dqeStuff.zonecp2).html("");
      }
      if (_adresse.numrue!=''){
          jQuery(_dqeStuff.editAdr2).val(_adresse.numrue+' '+_adresse.adr1);
      } else {
          jQuery(_dqeStuff.editAdr2).val(_adresse.adr1);
      }
      jQuery(_dqeStuff.editAdr3).val(_adresse.adr2);
      jQuery(_dqeStuff.editAdr3).focus();
   } else {
      gestionVoie();
   };
}

function recupval(val){
   var retour = '';
   if (typeof(val) != 'undefined'){
      retour = val;
   }
   return retour;   
}

function gestionVoie() {   
   _dqeStuff.listeVoie = [];                                    // stock la liste des _adresses
   _dqeStuff.listeNum = [];
   if (_dqeLive.debug) {console.log("gestionVoie debut");}

   try { 
      jQuery(_dqeStuff.editAdr2).val("");
   } catch(e) {      
   } 

   jQuery(_dqeStuff.editAdr2).focus();
   if (_dqeLive.debug) {console.log("gestionVoie debut de la saisie");}
    
   voie_autocomplete(); 
}

function voie_autocomplete(){
   try {
      // mise en place de l'autocompletion
      var valide_saisie = false;
      jQuery(_dqeStuff.editAdr2).autocomplete({
          options: { delay: 10, minLength: 1 },     // par défaut on ne lance pas de recherche avant 3 caractères
          source: function(request, callback) {
              console.log("voie_autocomplete frappe");
              if (request.term.length > 2) {
                  if (_dqeLive.debug) {console.log("gestionVoie action source");}
                  _dqeStuff.instance += 1;         // gère les instances afin d'éviter les conflits
                  var valadr = '';
                  if (_dqeLive.debug) {console.log("gestionVoie : "+_adresse.cp);}
                  var valadr = gestionAccent(request.term);
                  if (_dqeStuff.controleLanVoie!=0){
                     if (_dqeLive.debug) {console.log("voie_autocomplete problem abort _dqeStuff.controleLanVoie : "+_dqeStuff.controleLanCp.toString());}
                     try{
                       ajaxCall.abort();    
                     }catch(e){
                       if (_dqeLive.debug) {console.log("Probleme dans l'appel recVille.abort() "+e.toString());}
                     }  
                  }
                  _dqeStuff.controleLanVoie = 0;
                  _dqeStuff.listeVoie = [];
                  var ajaxCall =jQuery.ajax({
                       url: _dqeLive.url + "ADR/",
                       cache: false,
                       dataType: "jsonp",
                       data: {
                           Pays: _adresse.pays,
                           Adresse: valadr,
                           IDLocalite:_adresse.codeville,
                           Licence: _dqeLive.licence,
                           Taille: _dqeStuff.taille,
                           Instance: _dqeStuff.instance
                       },
                       jsonp: "callback",
                       crossDomain: true,
                       success: function(dat) {
                           _dqeStuff.controleLanVoie = 0;
                           afficheVoie(dat);
                           callback(_dqeStuff.listeVoie);
                       },
                       error: function (jqXHR, textStatus, errorThrown) {
                            if (_dqeLive.debug) {console.log("L'appel Ajax est un échec.");}
                       }
                  });
                  ajaxCall.promise()
                     .done(function () { if (_dqeLive.debug) {console.log("L'appel Ajax est réussi.");ajaxCall.abort();} })  // Callback de réussite  callback(_listeVoie);
                     .fail(function () { if (_dqeLive.debug) {console.log("L'appel Ajax est raté.");ajaxCall.abort();} })   // Callback d'échec
              
              } else {
                 if (_dqeLive.debug) {console.log("gestionVoie vide");}
                 _dqeStuff.listeVoie = [];
              }
          },
          open: function( event, ui ) {
               valide_saisie = false;
               if (_dqeStuff.listeVoie.length < 6){
                  if (_dqeStuff.listeVoie.length <= 1){
                     jQuery('.ui-autocomplete').css("max-height",'26px');
                  } else {
                     jQuery('.ui-autocomplete').css("max-height",(_dqeStuff.listeVoie.length*26)+'px');
                     if (_dqeLive.debug) {console.log("recherche voie _dqeStuff.listeVoie : "+_dqeStuff.listeVoie.length.toString());}
                  }
               } else {
                  jQuery('.ui-autocomplete').css("max-height",'150px');
               };
          },
          close: function() {
             if (_dqeLive.debug) {console.log("dqe_adr2 autocomplete valide_saisie: "+valide_saisie);}
             if (jQuery(_dqeStuff.editAdr2).val().length > 2){
                  if (! valide_saisie) {
                     if (_dqeLive.debug) {console.log("dqe_adr2 autocomplete not valide_saisie");}
                     if (_dqeStuff.listeVoie.length>=1){
                        if (_dqeLive.debug) {console.log("dqe_adr2 autocomplete close");}
                        enregistreVoieTab(_dqeStuff.listeVoie[0]);
	                     if (_dqeLive.debug) {console.log("dqe_adr2 autocomplete après close");}
                     };
                  };
               };
          },
          select: function(event, ui) {
              if (_dqeLive.debug) {console.log("dqe_adr2 autocomplete select");}
              valide_saisie = true;
              enregistreVoie(ui);
          }
      }).autocomplete("search", " ");
   } catch(e) {
      jQuery(_dqeStuff.editAdr2).val(''); 
   } 
}
function afficheVoie(RtnData) {
    // lecture de la reponse
    _dqeStuff.controleLanVoie = 1;
    listeVoieMem = [];
    MemInstance = 0;
    var replibre = eval('(' + RtnData + ')');
    pos = 0;
    var resultat = new Array();
    jQuery.each(replibre, function(nomRes, res) {
        resultat[nomRes] = res;
        var tpvoie = recupval(resultat[nomRes].Voie).split(',');
        var tp_comp2 = "";
        var tplieudit = "";
        var tpentreprise = "";
        if (tpvoie.length==3){
             tp_voie = tpvoie[2];
             _dqeStuff.avec_cedex = true;
             tp_comp2 = tpvoie[1];
             tpentreprise = tpvoie[0];
        } else {
             if (tpvoie[0].indexOf('PO BOX')!=-1){            
               tp_voie = "";
               tp_comp2 = ''; 
               tplieudit = tpvoie[0];
             } else {
               tp_voie = tpvoie[0];
               tp_comp2 = '';
             }
        }   
	     var vnumero = recupval(resultat[nomRes].Numero);
        var voknum = false;
        console.log(vnumero.toString());
        if (recupval(resultat[nomRes].ListeNumero) != '') {
           listetp = recupval(resultat[nomRes].ListeNumero).split(';');
           console.log(listetp.toString());
           if (listetp[0] != '') {
               for (c = 0; c < listetp.length; c = c + 1) {
                  console.log(listetp[c].toString());
                  if (listetp[c] == vnumero){
                     voknum = true;
                     break;
                  }
               }
           }
        }
        if (! voknum) {
           vnumero = "";
        }
        _dqeStuff.controleLanVoie = 2;
        if (TestPays(_adresse.pays)){
           
           listeVoieMem.push({ label: tp_voie+' '+vnumero,
             value: tp_voie+' '+vnumero, lieudit: tplieudit, 
             id: pos, cp: resultat[nomRes].CodePostal, numero: vnumero, 
             nbnumero: resultat[nomRes].NbNumero, voie: tp_voie, complement2:tp_comp2,
             listenum: resultat[nomRes].ListeNumero, adr1: tp_voie, 
             codeadr: resultat[nomRes].CodeVoie, entreprise:tpentreprise});
         
        } else {
           listeVoieMem.push({ label: vnumero+' '+tp_voie,
             value: vnumero+' '+tp_voie,lieudit: tplieudit, 
             id: pos, cp: resultat[nomRes].CodePostal, numero: vnumero, 
             nbnumero: resultat[nomRes].NbNumero, voie: tp_voie, complement2:tp_comp2,
             listenum: resultat[nomRes].ListeNumero, adr1: tp_voie, 
             codeadr: resultat[nomRes].CodeVoie, entreprise:tpentreprise});
        };
        MemInstance = resultat[nomRes].Instance;
        pos = pos + 1;
    });
    _dqeStuff.controleLanVoie = 3;
    if (((MemInstance > 0) && (MemInstance == _dqeStuff.instance)) || (MemInstance == 0)) {	
        if (((pos == 1) && (listeVoieMem[0]['cp'] == '')) || (pos == 0)) {
            tbis = nettoieconserver(jQuery(_dqeStuff.editAdr2).val());
            t = 'conserver <' + tbis + '>';
            lg = _dqeStuff.listeVoie.length;
            if (lg > 0) {
                if (_dqeStuff.listeVoie[lg - 1]['label'].substr(0, 11) == 'conserver <') {
                    // on remplace
                    _dqeStuff.listeVoie[lg - 1]['label'] = t;
                    _dqeStuff.listeVoie[lg - 1]['value'] = tbis;
                } else {
                    // on ajoute
                    _dqeStuff.listeVoie.push({ label: t,
                        value: tbis, id: pos, cp: '', numero: '0', 
                        nbnumero: '', voie: '', complement2: '',
                        listenum: '0', adr1: t, codeadr: '0',
                        entreprise: '', lieudit: ''
                    });
                }
            } else {             
                _dqeStuff.listeVoie.push({ label: t,
                    value: tbis, id: pos, cp: '', numero: '0', 
                    nbnumero: '', voie: '', complement2: '',
                    listenum: '0', adr1: t, codeadr: '0',
                    entreprise: '', lieudit: ''
                });
            };
        } else {
            if (listeVoieMem.length==0){
               listeVoieMem.push({ label: '',
                    value: '', id: pos, cp: '', numero: '0', 
                    nbnumero: '', voie: '', complement2: '',
                    listenum: '0', adr1: t, codeadr: '0',
                    entreprise: '', lieudit: ''
                });  
            }
            _dqeStuff.listeVoie = [];
            _dqeStuff.listeVoie = listeVoieMem;
        };
    };
    _dqeStuff.controleLanVoie = 4;
}

function nettoieconserver(val){
   vretour = val;
   if (val.indexOf('conserver <')>-1) {
      vretour = val.substring(12,val.lastIndexOf('>'))
   }
   return vretour;
}

// gestion de la voie
function testville(result_cp, saisie_cp, result_ville, saisie_ville){
	retour = false;
	if (result_ville == saisie_ville){
		retour = true;
	} else if (result_cp == saisie_cp){
		retour = true;
	}
	return retour
}

function enregistreVoieTab(listetab, vcpComplex) {
    var vcpComplex = vcpComplex || false;
    if (_dqeLive.debug) {console.log("enregistreVoieTab : "+listetab.toString());}
    if (listetab['label'] !== "") {
        _adresse.adr1 = listetab['value'];
        _adresse.voie = listetab['voie'];
        var position = listetab['label'].indexOf('conserver <');
        if (position == -1){
            _adresse.cp = listetab['cp'];
            _adresse.codeadr = listetab['codeadr'];
        }
        _adresse.numrue = listetab['numero'];
    };
    if (vcpComplex){
       _adresse.codeadr = listetab['codeadr']; 
    };
    if (_dqeLive.debug) {console.log("_adresse.cp 2 : "+_adresse.cp);}
    if (_dqeLive.debug) {console.log("_adresse.localite 2 : "+_adresse.ville);}
    if (_dqeLive.debug) {console.log("_dqeStuff.editCpVille 2 : "+_dqeStuff.editCp);}
    jQuery(_dqeStuff.editCp).val(_adresse.cp);
    
    if (_dqeLive.debug) {console.log("_dqeStuff.editCpVille 2 : "+_adresse.Num);}
    
    if (_adresse.numrue==""){
       getNum(listetab['numero'], listetab['listenum'], vcpComplex);
    } else {
       verifComplement();
    }
}

function enregistreVoie(ui, vcpComplex) {
    var vcpComplex = vcpComplex || false;
    if (_dqeLive.debug) {console.log("_adresse.cp 1 : "+_adresse.cp);}
    if (_dqeLive.debug) {console.log("_adresse.localite 1 : "+_adresse.ville);}
    if (ui.item['label'] !== "") {
        _adresse.adr1 = ui.item['value'];
        _adresse.voie = ui.item['voie'];
        var position = ui.item['label'].indexOf('conserver <');
        if (_dqeLive.debug) {console.log("_adresse position ? : "+position.toString());}
        if (position == -1){
            _adresse.cp = ui.item['cp'];
            _adresse.codeadr = ui.item['codeadr'];
        }
        _adresse.numrue = ui.item['numero'];
    };
    if (vcpComplex){
       _adresse.codeadr = ui.item['codeadr']; 
    };
    if (_dqeLive.debug) {console.log("_adresse.cp 2 : "+_adresse.cp);}
    if (_dqeLive.debug) {console.log("_adresse.localite 2 : "+_adresse.ville);}
    if (_dqeLive.debug) {console.log("_dqeStuff.editCpVille 2 : "+_dqeStuff.editCp);}
    jQuery(_dqeStuff.editCp).val(_adresse.cp);
    
    if (_dqeLive.debug) {console.log("_dqeStuff.editCpVille 2 : "+_adresse.Num);}
    
    if (_adresse.numrue==""){
       getNum(ui.item['numero'], ui.item['listenum'], vcpComplex);
    } else {
       verifComplement();
    }
}

function getNum(vnumero, vliste, vcomplex){
    if (_dqeLive.debug) {console.log("getNum _adresse.codeadr :"+_adresse.codeadr);}
    jQuery(_dqeStuff.editAdr3).removeAttr('readonly');
    if (vliste != ''){
        // on a la liste de numéro disponible
        if (_dqeLive.debug) {console.log("getNum _dqeStuff.listeNum :"+vliste);}
        _dqeStuff.listeNum = recupListeNum(vliste);
        gestionAffiche_numero(vnumero);
   } else {
        // on n'a pas la liste de numéro disponible
        if (_dqeStuff.controleLanNum!=0){
            if (_dqeLive.debug) {console.log("voie_autocomplete problem abort _dqeStuff.controleLanNum : "+_dqeStuff.controleLanNum.toString());}
            try{
              ajaxCallNum.abort();    
            }catch(e){
              if (_dqeLive.debug) {console.log("Probleme dans l'appel ajaxCallNum.abort() "+e.toString());}
            }  
         }
         _dqeStuff.controleLanNum = 0;
        // on interroge le serveur
        var ajaxCallNum = jQuery.ajax({
            url: _dqeLive.url + "NUM/",
            cache: false,
            dataType: "jsonp",
            data: {
                Pays: _adresse.pays,
                CodePostal: sansEspace(_adresse.cp),
                IDLocalite:_adresse.codeville,
                IDVoie:_adresse.codeadr,
                Licence: _dqeLive.licence
            },
            jsonp: "callback",
            crossDomain: true,
            success: function(dat) { 
               afficheNum(dat);
               _dqeStuff.controleLanNum = 0;
               gestionNum();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                if (_dqeLive.debug) {console.log("L'appel Ajax est un Ã©chec.");}
            }
        });
        ajaxCallNum.promise()
            .done(function () { if (_dqeLive.debug) {console.log("L'appel Ajax est réussi.");ajaxCallNum.abort();} })  // Callback de rÃ©ussite  callback(_listeVoie);
            .fail(function () { if (_dqeLive.debug) {console.log("L'appel Ajax est raté.");ajaxCallNum.abort();} })   // Callback d'Ã©chec
   }
}

function afficheNum(reponse){
   _dqeStuff.controleLanNum = 1;
	_dqeStuff.listeNum = [];	
	if (_dqeLive.debug) {console.log("afficheNum : "+reponse);}
   var listeNumero = "";
   try{
      var repnum = eval('(' + reponse + ')');
      listeNumero = repnum["1"].ListeNumero;
      _dqeStuff.NbrNum = repnum["1"].Nbnumero;
   } catch(e) {
      listeNumero = "";
      _dqeStuff.NbrNum = "0";
   }

	if ((_dqeStuff.NbrNum!="0") && (_dqeStuff.NbrNum!="")) {
      _dqeStuff.listeNum = recupListeNum(listeNumero);
	};
	if (_dqeLive.debug) {console.log("afficheNum fin");}
   _dqeStuff.controleLanNum = 2;
}

function gestionNum() {
    jQuery(_dqeStuff.editNum).focus();
    if (_dqeLive.debug) {console.log("gestionNum");}
    if (_dqeStuff.listeNum==""){
       verifComplement();
    } else {
       gestionAffiche_numero("");
    };
}

// bloc boite de dialogue pour la vérification du numéro
function gestionAffiche_numero(numSaisie, vlast) {
    var vlast = vlast || false;
    var a = "";
    jQuery("#libvoie").html("Vous devez indiquer le numéro de la voie !");
    jQuery("#libvoie").addClass('dqe-info-ko');
    if (TestPays(_adresse.pays)){
       a = "<input id='dqe_adr2' dqe-info-koclass='dqe-input-xsmedium ui-corner-all' autocomplete='off' tabindex=5 value='"+_adresse.adr1+"'/><input id='dqe_num' type='text' class='dqe-input-xsmall ui-corner-all' autocomplete='off' tabindex=6 />";
    } else {
       a = "<input id='dqe_num' type='text' class='dqe-input-xsmall ui-corner-all' autocomplete='off' tabindex=5 /><input id='dqe_adr2' class='dqe-input-xmedium ui-corner-all' autocomplete='off' tabindex=6 value='"+_adresse.adr1+"'/>";
    }
    jQuery('#voie').html(a);
    jQuery('#dqe_num').focus();
    // mise en place de l'autocompletion
    gestionRueSaisieAssistee(numSaisie,vlast);
}

// bloc de fonction concernant le champ dqe_num
function gestionRueSaisieAssistee(valSaisie, vlast) {
   jQuery('#dqe_num').autocomplete({
       options: { delay: 0 },
       source: _dqeStuff.listeNum,
       select: function(event, ui) {
          enrNum(valSaisie, ui, vlast);
          if (!vlast){
              verifComplement();
          }
       },
       close: function( event, ui ) {
             if (_dqeLive.debug) {console.log("gestionRueSaisieAssistee close");}
             if ((_adresse.codenumrue=='') && (jQuery('#dqe_num').val()!='')){
                _adresse.numrue=jQuery.trim(jQuery('#dqe_num').val());
                _adresse.adr1=jQuery('#dqe_adr2').val();
                _adresse.codenumrue='N_'+jQuery('#dqe_num').val();
                if (_adresse.adr1.indexOf('BP_') != -1){
                   _adresse.adr1 = _adresse.adr1.replace('BP_',_adresse.numrue);
                } else {
                     vlast = TestPays(_adresse.pays);
                     if (vlast) {
                       _adresse.adr1=_adresse.adr1+' '+_adresse.numrue;
                     } else {
                       _adresse.adr1=_adresse.numrue+ ' '+_adresse.adr1;
                     };
                };
             };
             ajout_voie(_adresse.pays);
             jQuery('#dqe_adr2').attr("value", _adresse.adr1);
             voie_autocomplete();
       },
       change : function(event, ui){
             jQuery(this).autocomplete( "enable" );
       },
       open: function( event, ui ) {
            _dqeStuff.instance = 0; 
            if (_dqeStuff.listeNum.length < 6){
               if (_dqeStuff.listeNum.length <= 1){
                  jQuery('.ui-autocomplete').css("max-height",'25px');
               } else {
                  jQuery('.ui-autocomplete').css("max-height",(_dqeStuff.listeNum.length*25)+'px');
                  if (_dqeLive.debug) {console.log("recherche _dqeStuff.listeNum : "+_dqeStuff.listeNum.length.toString());}
               }
            } else {
               jQuery('.ui-autocomplete').css("max-height",'150px');
            };
        }
   }).autocomplete("search", " ");
}

function verifComplement() {
   try {
      jQuery('#dqe_num').autocomplete("close");
      jQuery('#dqe_num').autocomplete("destroy");
   } catch (e){   
   }
   try {
      jQuery(_dqeStuff.editAdr3).val("");
      _adresse.adr2="";
   } catch (e){   
   }
   jQuery(_dqeStuff.editAdr3).focus();
   
   if (_dqeStuff.controleLanCompl!=0){
       try{
          AjaxCallCompl.abort();    
       }catch(e){
          if (_dqeLive.debug) {console.log("Probleme dans l'appel AjaxCallCompl.abort() "+e.toString());}
       }       
   }
   _dqeStuff.controleLanCompl = 0;
   // vérification si complement d'adresse
   AjaxCallCompl = jQuery.ajax({
      url: _dqeLive.url + "COMPL/",
      dataType: "jsonp",
      cache: false,
      data: {
          Pays: _adresse.pays,
          IDVoie: _adresse.codeadr,
          IDNum: _adresse.numrue,
          Taille: _dqeStuff.taille,
          Licence: _dqeLive.licence
      },
      jsonp: "callback",
      crossDomain: true,
      success: function(dat){      
         afficheComplement(dat);
         _dqeStuff.controleLanCompl = 0;
      },
      error: function (jqXHR, textStatus, errorThrown) {
          if (_dqeLive.debug) {console.log("L'appel Ajax est un échec.");}
      }
   });
}

function afficheComplement(RtnData) {
    _dqeStuff.controleLanCompl = 1;
    _dqeStuff.listeCompl = [];
    var repcompl = eval('(' + RtnData + ')');
    pos = 0;
    var resultat = new Array();
    jQuery.each(repcompl, function(nomRes, res) {
        resultat[nomRes] = res;
        _dqeStuff.listeCompl.push(resultat[nomRes].Batiment + " ");
        pos = pos + 1;
    });
    
    if (pos > 1) {
        jQuery(_dqeStuff.editAdr3).autocomplete({
            options: { delay: 10, minLength: 0 },
            source: _dqeStuff.listeCompl,
            open: function( event, ui ) {
               if (_dqeStuff.listeCompl.length < 6){
                  if (_dqeStuff.listeCompl.length <= 1){
                     jQuery('.ui-autocomplete').css("max-height",'25px');
                  } else {
                     jQuery('.ui-autocomplete').css("max-height",(_dqeStuff.listeCompl.length*25)+'px');
                     if (_dqeLive.debug) {console.log("gestionCompl _dqeStuff.listeCompl : "+_dqeStuff.listeCompl.length.toString());}
                  }
               } else {
                  jQuery('.ui-autocomplete').css("max-height",'150px');
               };
            },
            select: function(event, ui) {
                enregistreCompl(ui);
                _adresse.valide = "OK";
                jQuery(this).autocomplete("close");
            }
        }).autocomplete("search", " ");
    } else {
        _adresse.valide = "OK";
        if (pos == 1) {
           if (jQuery.trim(_dqeStuff.listeCompl[0])!= ""){
              _adresse.adr2=jQuery.trim(_dqeStuff.listeCompl[0]);
              jQuery(_dqeStuff.editAdr3).val(jQuery.trim(_dqeStuff.listeCompl[0]));
           } else {
              _adresse.adr2='';
              jQuery(_dqeStuff.editAdr3).val("");
           };          
        };
    };
    _dqeStuff.controleLanCompl = 2;
}

function enregistreCompl(ui){
    _adresse.adr2=jQuery.trim(ui.item['value']);
    return true;
}

function TestPays(val){
   // positionnement du numéro de rue en fonction du pays
   retour = false;      // par défaut on positionne le numéro au début de l'adresse
   if ((val == 'POR') || (val == 'CHE') || (val == 'DEU') || (val == 'BEL') || (val == 'ROU') || (val == 'LUX') || (val == 'ESP')|| (val == 'ITA')) {
      retour = true;
   } 
   return retour;
}

function getTailleMiniCp(val){
   vretour = 3;
   if ((val == 'CHE') || (val == 'BEL') || (val == 'LUX') || (val == 'ESP')|| (val == 'ITA')) {
      retour = 4;
   }
   if ((val == 'DEU') || (val == 'ESP') || (val == 'ITA') || (val == 'FRA')) {
      retour = 5;
   }
   if ((val == 'POR') || (val == 'GBR') || (val == 'ROU')) {
      retour = 6;
   }
   return retour;
}

function enrNum(val, ui, vlast) {
    if (_dqeLive.debug) {console.log("enrnum val : ",val);}
    if (_dqeLive.debug) {console.log("enrnum ui : ",ui.item['value']);}
    _adresse.numrue=jQuery.trim(ui.item['value']);
    _adresse.adr1=_adresse.adr1.replace(val,"");
    _adresse.codenumrue='N_'+jQuery.trim(ui.item['value']);
    if (_adresse.adr1.indexOf('BP_') != -1){
       _adresse.adr1 = _adresse.adr1.replace('BP_',_adresse.numrue);
    } else {
         vlast = TestPays(_adresse.pays);
         if (vlast) {
           _adresse.adr1=_adresse.adr1+' '+_adresse.numrue;  
         } else {
           _adresse.adr1=_adresse.numrue+ ' '+_adresse.adr1;
         }
    }
    jQuery(_dqeStuff.editAdr2).val(_adresse.adr1);
    
    return true;
}

function recupListeNum(valListe) {
    var retour = [];
    if (valListe != '') {
        tab3 = valListe.split(';');
        if (tab3[0] != '') {
            for (c = 0; c < tab3.length; c = c + 1) {
               retour.push(tab3[c]+" ");
            }
        }
    }
    retour.sort(classement);
    return retour;
}

function classement(a,b){
   return(a-b);
}

function ajout_voie(vpays){
   if (vpays == 'FRA'){
      jQuery(_dqeStuff.zonevoie).html("<input id='"+_dqeStuff.libAdr2+"' class='dqe-input-medium ui-corner-all' autocomplete='off' tabindex=6 placeholder=\"Ex:'2 Joffre' pour '2 Av. du Maréchal Joffre'\"/>");
   }
}

function zeroForm (val){
   var val = val || '';
   if (_dqeLive.debug) {console.log("zeroForm",val);}

   // remise a vide du formulaire saisie _adresse
   _adresse.cp="";
   _adresse.ville="";
   _adresse.lieudit = "";
   _adresse.province = "";
   _adresse.codeville=0;
   _adresse.typevoie = ""; 
   _adresse.voie = "";          // nom de la voie
   _adresse.adr1 = "";
   _adresse.adr2 = "";
   _adresse.adr3="";            // _adresse3
   _adresse.adr4="";            // _adresse4
   _adresse.societe="";            // _societe
   _adresse.codeadr = 0;
   _adresse.numrue = "";
   _adresse.codenumrue = "";
   _adresse.valide = "OK";
   
   if (_dqeLive.debug) {console.log("zeroForm reinit ");}
     
   _dqeStuff.instance = 1;                      // attribut un numéro d'instance à une transaction du webservice
   _dqeStuff.listeNum = [];                     // stock la liste des numéros
   _dqeStuff.listeVoie = [];                    // stock la liste des compléments d'adresse
   _dqeStuff.listeVille = [];
   _dqeStuff.listeCompl = [];
   _dqeStuff.avec_cedex = false;
   _dqeStuff.controleLanCp = 0;
   _dqeStuff.controleLanVoie = 0;
   _dqeStuff.controleLanNum = 0;
   _dqeStuff.controleLanCompl = 0;
   
   //mise a blanc des informations de la saisie assistée
   if (val=='all'){
      jQuery(_dqeStuff.editCp).val("");
      jQuery(_dqeStuff.editVille).val("");
   }
   
   $("#demo-container").height(240); 

   jQuery(_dqeStuff.zonesociete).html('');
   jQuery(_dqeStuff.zonelieu).html('');
   
   if (val!='debut'){
      ajout_voie(_adresse.pays);
      jQuery(_dqeStuff.editVille).attr('readonly', 'readonly');
      jQuery(_dqeStuff.editAdr2).val("");
      jQuery(_dqeStuff.editAdr3).val("");
      jQuery(_dqeStuff.editAdr4).val("");
      jQuery(_dqeStuff.editAdr2).attr('readonly', 'readonly');
      jQuery(_dqeStuff.editAdr3).attr('readonly', 'readonly');
      jQuery(_dqeStuff.editAdr4).attr('readonly', 'readonly');
   }
   
   jQuery(_dqeStuff.editCp).focus();
   if (_dqeLive.debug) {console.log("zeroForm fin ");}
}
 
// fonctions génériques
function sansEspace(val){
   // gestion des accents
   retour = '';
   for (var i=0; i<val.length; i++) {
      if (val.charAt(i)!=' '){
         retour += val.charAt(i);
      }
   }
   return retour;
}

function gestionAccent(val){
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
        if  (code == 44) {
            // on traite la virgule
            retour += ',';
            ok = true;
        }
	if  (code == 146) {
            // on traite la virgule
            retour += ' ';
            ok = true;
        }
        if (! ok){
            retour += ' ';
        }    
    } 
    return retour;
}



