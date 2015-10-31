<?php 
class LoginController extends Controller{

	function login(){
		if(isset($_SESSION['no_rights'])){
			unset($_SESSION['no_rights']);
			$this->set('no_rights', 'yes');
		}
		
				
		if ($this->Session->read('logged'))
		{
			$this->redirect('pages/index');
		}
		else
		{
			if($this->request->data){
				$data = $this->request->data;
				$this->loadModel('XtkSession');
				$logged = $this->XtkSession->Logon($data->username, $data->password);

				if ($logged == 1){
					unset($_SESSION['wrong']);
					$this->Session->write('logged', 1);
					$this->Session->write('header', $this->XtkSession->get_header());
					$this->Session->write('sessionToken', $this->XtkSession->get_sessionToken());
					$this->Session->write('username', $data->username);
					
					$this->getConsiller('operator', 'xtk');
					
					
					$this->CreateLov('STATUT_PARTICULIER', 'transco_enum', 'pre');
					$this->CreateLov('SOUS_STATUT_PARTICULIER', 'transco_enum', 'pre');
					$this->CreateLov('CIVILITE', 'transco_enum', 'pre');
					$this->CreateLov('SITUATION_FAMILIALE', 'transco_enum', 'pre');
					$this->CreateLov('SITUATION_PROFESSIONNELLE', 'transco_enum', 'pre');
					$this->CreateLov('STATUT_AFFILIATION', 'transco_enum', 'pre');
					$this->CreateLov('LIEU_EVENEMENT', 'transco_enum', 'pre');
					$this->CreateLov('MODE_EVENEMENT', 'transco_enum', 'pre');
					$this->CreateLovMotifProspect('MOTIF_EVENEMENT', 'transco_enum', 'pre');
					$this->CreateLovMotifAffilie('MOTIF_EVENEMENT', 'transco_enum', 'pre');
					$this->CreateLov('RESULTAT_EVENEMENT', 'transco_enum', 'pre');
					
					
					$this->CreateLovAll('RESULTAT_EVENEMENT', 'transco_enum', 'pre');
					$this->CreateLovAll('MOTIF_EVENEMENT', 'transco_enum', 'pre');
					$this->CreateLovAll('MODE_EVENEMENT', 'transco_enum', 'pre');
					$this->CreateLovAll('LIEU_EVENEMENT', 'transco_enum', 'pre');
					
					
					$this->CreateLov('NATURE_CONTRAT', 'transco_enum', 'pre');
					$this->CreateLov('TYPE_VERSEMENT', 'transco_enum', 'pre');
					$this->CreateLov('MODE_REGLEMENT_RETRAITE_COTISANT', 'transco_enum', 'pre');
					$this->CreateLov('PERIODICITE_REGLEMENT_RETRAITE_COTISANT', 'transco_enum', 'pre');
					$this->CreateLov('STATUT_CONTRAT_RETRAITE_COTISANT', 'transco_enum', 'pre');
					$this->CreateLov('MOTIF_SORTIE_CONTRAT_RETRAITE_COTISANT', 'transco_enum', 'pre');
					$this->CreateLov('LIQUIDATION_CONTRAT_RETRAITE_COTISANT', 'transco_enum', 'pre');
					$this->CreateLov('SECTION_CONTRAT_RETRAITE_COTISANT', 'transco_enum', 'pre');
					$this->CreateLov('TYPE_PA_CONTRAT_RETRAITE_COTISANT', 'transco_enum', 'pre');	
					$this->CreateLov('STATUT_CONTRAT_RETRAITE_ALLOCATAIRE', 'transco_enum', 'pre');
					$this->CreateLov('STATUT_CONTRAT', 'transco_enum', 'pre');
					$this->CreateLov('MOTIF_SORTIE_CONTRAT_RETRAITE_ALLOCATAIRE', 'transco_enum', 'pre');
					$this->CreateLov('REVERSION_CONTRAT_RETRAITE_ALLOCATAIRE', 'transco_enum', 'pre');
					$this->CreateLov('DEPENDANCE_CONTRAT_RETRAITE_ALLOCATAIRE', 'transco_enum', 'pre');
					$this->CreateLov('MAJORATION_CONTRAT_RETRAITE_ALLOCATAIRE', 'transco_enum', 'pre');
					$this->CreateLov('TYPE_RENTE_CONTRAT_RETRAITE_ALLOCATAIRE', 'transco_enum', 'pre');
					$this->CreateLov('TYPE_COMPTE_CONTRAT_RETRAITE_ALLOCATAIRE', 'transco_enum', 'pre');
					$this->CreateLov('DEPENDANCE_CONTRAT_RETRAITE_ALLOCATAIRE', 'transco_enum', 'pre');

					$this->CreateLov('THEME_ENTRETIEN', 'transco_enum', 'pre');
					
					$this->CreateZoneGeographique('ZONE_GEOGRAPHIQUE', 'transco_enum', 'pre');

					
					$this->CreateLov('ETAT_CONTRAT_DEPENDANCE', 'transco_enum', 'pre');
					$this->CreateLov('MOTIF_SORTIE_CONTRAT_DEPENDANCE', 'transco_enum', 'pre');
					$this->CreateLov('TYPE_PRIME_CONTRAT_OBSEQUES', 'transco_enum', 'pre');
					$this->CreateLov('TYPE_GARANTIE_CONTRAT_DEPENDANCE', 'transco_enum', 'pre');
					
					
					$this->CreateLov('TYPE_COLLECTIVITE', 'transco_enum', 'pre');
					$this->CreateLov('CATEGORIE_COLLECTIVITE', 'transco_enum', 'pre');
					
					$this->CreateLov('TYPE_FORMULAIRE_WEB', 'transco_enum', 'pre');
					
					
					$this->CreateLov('TYPE_DEMANDE', 'transco_enum', 'pre');
					$this->CreateLov('STATUT_DEMANDE', 'transco_enum', 'pre');
					$this->CreateLov('MOTIF_FERMETURE_DEMANDE', 'transco_enum', 'pre');
					
					
					
					
					$this->CreateOrigine('origine', 'pre');
					$this->CreateSousOrigine('sous_origine', 'pre');
					$this->CreateSousOrigineAll('sous_origine', 'pre');
					

					$this->getScores('SCORING', 'transco_enum', 'pre');
						
					$this->redirect('pages/index');
				} else {
					$this->Session->write('wrong', 'yes');
				}
			}
		}
	}
	
	function logout(){
		
		unset($_SESSION['logged']);
		unset($_SESSION['header']);
		unset($_SESSION['sessionToken']);
		unset($_SESSION['username']);
		$this->redirect('login/login');

		
	}
	
	
	
	function CreateLov($lov, $schema, $namespace){
        $this->loadModel('XtkQueryDef');
        $dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), '<queryDef operation="select" schema="'.$namespace.':'.$schema.'" xtkschema="xtk:queryDef"><select><node expr="@id_prefon"/><node expr="@libelle"/></select><where><condition expr="@reference = \''.$lov.'\'"/><condition expr="@masque = 0"/><condition expr="@id_prefon IS NOT NULL"/></where><orderBy><node expr="@id_prefon" sortAsc="true"/></orderBy></queryDef>');

        foreach($dom->getElementsByTagName($schema) as $recip)
        {
            $_SESSION[$lov][$recip->getAttribute("id_prefon")] = $recip->getAttribute("libelle");

        }
		
        return 1;
    }
	
	function CreateLovMotifProspect($lov, $schema, $namespace){
        $this->loadModel('XtkQueryDef');
        $dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), '<queryDef operation="select" schema="'.$namespace.':'.$schema.'" xtkschema="xtk:queryDef"><select><node expr="@id_prefon"/><node expr="@libelle"/></select><where><condition expr="@reference = \''.$lov.'\'"/><condition expr="(@affichage = \'0\') OR (@affichage = \'2\')"/><condition expr="@masque = 0"/><condition expr="@id_prefon IS NOT NULL"/></where><orderBy><node expr="@ordre" sortAsc="true"/><node expr="@id_prefon" sortAsc="true"/></orderBy></queryDef>');

        foreach($dom->getElementsByTagName($schema) as $recip)
        {
            $_SESSION[$lov. '_PROSPECT'][$recip->getAttribute("id_prefon")] = $recip->getAttribute("libelle");
        }
		
        return 1;
    }
	
	function CreateLovMotifAffilie($lov, $schema, $namespace){
        $this->loadModel('XtkQueryDef');
        $dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), '<queryDef operation="select" schema="'.$namespace.':'.$schema.'" xtkschema="xtk:queryDef"><select><node expr="@id_prefon"/><node expr="@libelle"/></select><where><condition expr="@reference = \''.$lov.'\'"/><condition expr="(@affichage = \'0\') OR (@affichage = \'3\')"/><condition expr="@masque = 0"/><condition expr="@id_prefon IS NOT NULL"/></where><orderBy><node expr="@ordre" sortAsc="true"/><node expr="@id_prefon" sortAsc="true"/></orderBy></queryDef>');

        foreach($dom->getElementsByTagName($schema) as $recip)
        {
            $_SESSION[$lov . '_AFFILIE'][$recip->getAttribute("id_prefon")] = $recip->getAttribute("libelle");

        }
		
        return 1;
    }
	
    function CreateLovAll($lov, $schema, $namespace){
        $this->loadModel('XtkQueryDef');
        $dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), '<queryDef operation="select" schema="'.$namespace.':'.$schema.'" xtkschema="xtk:queryDef"><select><node expr="@id_prefon"/><node expr="@libelle"/></select><where><condition expr="@reference = \''.$lov.'\'"/><condition expr="@id_prefon IS NOT NULL"/></where><orderBy><node expr="@libelle"/></orderBy></queryDef>');

        foreach($dom->getElementsByTagName($schema) as $recip)
        {
            $_SESSION[$lov . '_ALL'][$recip->getAttribute("id_prefon")] = $recip->getAttribute("libelle");

        }
		
        return 1;
    }
	
    function CreateZoneGeographique($lov, $schema, $namespace){
        $this->loadModel('XtkQueryDef');
        $dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), '<queryDef operation="select" schema="'.$namespace.':'.$schema.'" xtkschema="xtk:queryDef"><select><node expr="@code"/><node expr="@libelle"/></select><where><condition expr="@reference = \''.$lov.'\'"/><condition expr="@id_prefon IS NOT NULL"/></where></queryDef>');

        foreach($dom->getElementsByTagName($schema) as $zone)
        {
            $_SESSION[$lov][$zone->getAttribute("code")] = $zone->getAttribute("libelle");

        }
		
        return 1;
    }
	
	function getScores($lov, $schema, $namespace){
        $this->loadModel('XtkQueryDef');
        $dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), '<queryDef operation="select" schema="'.$namespace.':'.$schema.'" xtkschema="xtk:queryDef"><select><node expr="@code"/><node expr="@id_prefon"/><node expr="@libelle"/></select><where><condition expr="@reference = \''.$lov.'\'"/><condition expr="@id_prefon IS NOT NULL"/></where><orderBy><node expr="@id_prefon" sortAsc="true"/></orderBy></queryDef>');

        foreach($dom->getElementsByTagName($schema) as $recip)
        {
            $_SESSION[$lov . '_SCORES'][$recip->getAttribute("libelle")] = $recip->getAttribute("code");
            $_SESSION[$lov . '_LABELS'][$recip->getAttribute("id_prefon")] = $recip->getAttribute("libelle");

        }
		
        return 1;
    }
	
	function getConsiller($schema, $namespace){
        $this->loadModel('XtkQueryDef');
        $dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), '<queryDef operation="select" schema="'.$namespace.':'.$schema.'" xtkschema="xtk:queryDef">
			<select>
				<node expr="@label"/>
				<node expr="@droits"/>
				<node expr="@lieu_evenement"/>
				<node expr="@mode_evenement"/>
				<node expr="@partenaires"/>
				<node expr="[module_crm/@recherche]" alias="@recherche"/>
				<node expr="[module_crm/@reception_ba]" alias="@reception_ba"/>
				<node expr="[module_crm/@affiliation]" alias="@affiliation"/>
				<node expr="[module_crm/@coupon_fidelite]" alias="@coupon_fidelite"/>
				<node expr="[module_crm/@coupon_prospect]" alias="@coupon_prospect"/>
				<node expr="[module_crm/@bordereaux]" alias="@bordereaux"/>
			</select>
			<where>
				<condition expr="@name = \''.$_SESSION['username'].'\'"/>
			</where>
			</queryDef>');

        foreach($dom->getElementsByTagName($schema) as $elem){
			$_SESSION['conseillerEnLigne'] = array();
			foreach($elem->attributes as $attrName => $attrNode){
				$_SESSION['conseillerEnLigne'][$attrName] = $attrNode->nodeValue;
			}
			
			if(!($elem->getAttribute('recherche') || $elem->getAttribute('reception_ba')  || $elem->getAttribute('affiliation') || $elem->getAttribute('coupon_fidelite') || $elem->getAttribute('coupon_prospect') || $elem->getAttribute('bordereaux'))){
				$_SESSION['no_rights'] = 'yes';
				unset($_SESSION['conseillerEnLigne']);
				$this->logout();
			}
			
			if($elem->getAttribute('droits') == 0){
				$_SESSION['wrong'] = 'yes';
				unset($_SESSION['conseillerEnLigne']);
				$this->logout();
			}
			
			
        }
        return 1;
    }
	
	
	

	  function CreateOrigine($schema, $namespace){
        $this->loadModel('XtkQueryDef');
        $dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), '<queryDef operation="select" schema="'.$namespace.':'.$schema.'" xtkschema="xtk:queryDef"><select><node expr="@idorigine"/><node expr="@libelle"/></select><where><condition expr="@masque = 0"/><condition expr="@idorigine IS NOT NULL"/></where><orderBy><node expr="@libelle"/></orderBy></queryDef>');

        foreach($dom->getElementsByTagName($schema) as $recip)
        {
            $_SESSION[$schema][$recip->getAttribute("idorigine")] = $recip->getAttribute("libelle");
        }
		//foreach($_SESSION['origine'] as $cle => $valeur)
				//echo $cle . '  ' . $valeur . '<br >';
        return 1;
    }
	
	function CreateSousOrigine($schema, $namespace){
        $this->loadModel('XtkQueryDef');
        $dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), '<queryDef operation="select" schema="'.$namespace.':'.$schema.'" xtkschema="xtk:queryDef"><select><node expr="@idsousorigine"/><node expr="@libelle"/><node expr="@origine_id"/></select><where><condition expr="@masque = 0"/><condition expr="@idsousorigine IS NOT NULL"/><condition expr="@origine_id IS NOT NULL"/></where><orderBy><node expr="@libelle"/></orderBy></queryDef>');

        foreach($dom->getElementsByTagName($schema) as $recip)
        {
            $_SESSION[$schema][$recip->getAttribute("origine_id")][$recip->getAttribute("idsousorigine")] = $recip->getAttribute("libelle");
            //echo $schema . ' ** ' .$recip->getAttribute("origine_id") . ' ** ' .$recip->getAttribute("idsousorigine") . ' ** ' .$recip->getAttribute("libelle") . '<br>';
        }
		/*
		foreach($_SESSION[$schema] as $cle => $valeur){
			foreach($valeur as $key => $value){
				echo $schema . ' ' . $cle . ' ' . $key . ' ' . $value . '<br>';
			}
		}
		*/

        return 1;
    }
	
	function CreateSousOrigineAll($schema, $namespace){
        $this->loadModel('XtkQueryDef');
        $dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), '<queryDef operation="select" schema="'.$namespace.':'.$schema.'" xtkschema="xtk:queryDef"><select><node expr="@idsousorigine"/><node expr="@libelle"/><node expr="@origine_id"/></select><where><condition expr="@idsousorigine IS NOT NULL"/><condition expr="@origine_id IS NOT NULL"/></where><orderBy><node expr="@libelle"/></orderBy></queryDef>');

        foreach($dom->getElementsByTagName($schema) as $recip)
        {
            $_SESSION[$schema . '_all'][$recip->getAttribute("origine_id")][$recip->getAttribute("idsousorigine")] = $recip->getAttribute("libelle");
        }

        return 1;
    }
	


}