<?php
class PopupController extends Controller{



    function search(){
        // Tester si l'utilisateur est bien loggué, sinon on le renvoie vers la page de login
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		if(isset($_SESSION['zero_resultat'])){
			unset($_SESSION['zero_resultat']);
			$this->set('zero_resultat', 'yes');
		}
    }

    function result(){
		
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		
		if(isset($_SESSION['zero_resultat'])){
			unset($_SESSION['zero_resultat']);
		}
		
	
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		if(isset($this->request->data->departement) && strlen($this->request->data->departement) > 0){
			$tab = explode(',', $this->request->data->departement);
			if(count($tab) > 1){
				$resultat = "'" . trim($tab[0]) . "'";
				for($i = 1; $i < count($tab); $i++){
					$resultat .= ", '" . trim($tab[$i]) . "'";
				}
			}else{
				$resultat = "'" . trim($tab[0]) . "'";
			}
		}
		
        $req='';

        if ($this->request->data->IRecipientId <> '')
            $req .= '<condition expr="@id = \''.$this->request->data->IRecipientId.'\'"/>';
		
        if ($this->request->data->sFirstName <> '')
            $req .= '<condition expr="Upper([infos_individu/@firstName]) LIKE \''.addslashes(mb_strtoupper($this->request->data->sFirstName,'UTF-8')).'\' + \'%\'"/>';

        if ($this->request->data->Num_Cotisant <> '')
            $req .= '<condition expr="(Upper([infos_individu/@num_cotisant]) LIKE \''.mb_strtoupper($this->request->data->Num_Cotisant,'UTF-8').'\' + \'%\') OR (Upper([infos_individu/@num_allocataire]) LIKE \''.mb_strtoupper($this->request->data->Num_Cotisant,'UTF-8').'\' + \'%\')"/>';

        if ($this->request->data->Num_Partenaire <> '')
            $req .= '<condition expr="Upper([infos_individu/@num_partenaire]) LIKE \''.mb_strtoupper($this->request->data->Num_Partenaire,'UTF-8').'\' + \'%\'"/>';

        if ($this->request->data->sLastName <> '')
            $req .= '<condition expr="([infos_individu/@nom_naissance] LIKE \''.addslashes(mb_strtoupper($this->request->data->sLastName,'UTF-8')).'\' + \'%\') OR ([infos_individu/@lastName] LIKE \''.addslashes(mb_strtoupper($this->request->data->sLastName,'UTF-8')).'\' + \'%\')"/>';

		if ($this->request->data->departement <> '')
            $req .= '<condition expr="Substring([adresse-particulier/@code_postal],1 ,2 ) IN ('.$resultat.')"/>';
		
        if ($this->request->data->tsBirth <> '' && strlen($this->request->data->tsBirth) == 10){
            $req .= '<condition expr="[infos_individu/@tsBirth]=\''. lof::convertDateToAdobeFormat($this->request->data->tsBirth) .'\'"/>';
		}

        if ($this->request->data->sEmail <> '')
            $req .= '<condition expr="Upper([contactabilite/@semail]) LIKE \'%\' + \''.mb_strtoupper($this->request->data->sEmail).'\' + \'%\'"/>';

		
		
		
		
		$select = '<select>
                <node expr="@id"/>
                <node expr="[infos_individu/@statut_particulier]" alias="@statut_particulier"/>
                <node expr="[infos_individu/@lastName]" alias="@lastName"/>
                <node expr="[infos_individu/@firstName]" alias="@firstName"/>
                <node expr="[infos_individu/@tsBirth]" alias="@tsBirth"/>
                <node expr="[adresse-particulier/@adresse_3]" alias="@adresse_3"/>
                <node expr="[adresse-particulier/@code_postal]" alias="@code_postal"/>
                <node expr="[adresse-particulier/@ville]" alias="@ville"/>
                <node expr="[infos_individu/@num_cotisant]" alias="@num_cotisant"/>
                <node expr="[infos_individu/@num_allocataire]" alias="@num_allocataire"/>
				<node expr="[origine/@origine_id]" alias="@origine_id"/>
				<node expr="[particulier_data-particulier/@created]" alias="@created"/>
				<node expr="[infos_individu/@qualite_id]" alias="@qualite_id"/>
				<node expr="[contactabilite/@semail]" alias="@semail"/>
            </select>';
		
			$req = '<condition expr="@id > 0"/>' . $req;
			$select .=          
            '<where>
                '.$req.'
            </where>';
			
	
		
        // Recherche des particuliers répondant aux critères de recherche
        $this->loadModel('XtkQueryDef');
        $this->request->data->dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), '<queryDef operation="select" schema="nms:recipient" lineCount="300" xtkschema="xtk:queryDef">' . $select . '</queryDef>');
		
			if($this->request->data->dom->getElementsByTagName('recipient')->item(0) == null){
				$_SESSION['zero_resultat'] = "yes";
				$this->redirect('popup/search');
			} 
			
		

	}
	
	function fiche($id){
		
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		
		if(isset($id)){
		$this->request->data = new stdClass();
		$this->loadModel('XtkQueryDef');

		$req = '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef">
			<select>
				<node expr="@created" alias="@created"/>
				<node expr="@lastModified" alias="@lastModified"/>
				<node expr="[infos_individu/@code_vip]" alias="@code_vip"/>
				<node expr="[infos_individu/@ville_naissance]" alias="@ville_naissance"/>
				<node expr="[infos_individu/@statut_particulier]" alias="@statut_particulier"/>
				<node expr="[infos_individu/@sous_statut]" alias="@sous_statut"/>
				<node expr="[infos_individu/@situation_professionnelle_id]" alias="@situation_professionnelle_id"/>
				<node expr="[infos_individu/@situation_familiale_id]" alias="@situation_familiale_id"/>
				<node expr="[infos_individu/@firstName]" alias="@firstName"/>
				<node expr="[infos_individu/@lastName]" alias="@lastName"/>
				<node expr="[infos_individu/@pays_naissance]" alias="@pays_naissance"/>
				<node expr="[infos_individu/@id_parrain]" alias="@id_parrain"/>
				<node expr="[infos_individu/@num_partenaire]" alias="@num_partenaire"/>
				<node expr="[infos_individu/@num_cotisant]" alias="@num_cotisant"/>
				<node expr="[infos_individu/@num_allocataire]" alias="@num_allocataire"/>
				<node expr="[infos_individu/@num_adherent]" alias="@num_adherent"/>
				<node expr="[infos_individu/@date_maj_adherent]" alias="@date_maj_adherent"/>
				<node expr="[infos_individu/@num_insee]" alias="@num_insee"/>
				<node expr="[infos_individu/@nom_naissance]" alias="@nom_naissance"/>
				<node expr="[infos_individu/@qualite_id]" alias="@qualite_id"/>
				<node expr="[infos_individu/@dept_naissance]" alias="@dept_naissance"/>
				<node expr="[infos_individu/@date_prospect]" alias="@date_prospect"/>
				<node expr="[infos_individu/@annee_entree_corps]" alias="@annee_entree_corps"/>
				<node expr="[infos_individu/@tsBirth]" alias="@tsBirth"/>
				<node expr="[infos_individu/@date_deces]" alias="@date_deces"/>
				<node expr="[infos_individu/@conseiller]" alias="@conseiller"/>
				<node expr="[infos_individu/@id_conjoint]" alias="@id_conjoint"/>
				<node expr="[infos_individu/@categorie_fonctionnaire_id]" alias="@categorie_fonctionnaire_id"/>
				
				<node expr="[origine/@origine_id]" alias="@origine_id"/>
				<node expr="[origine/@sous_origine_id]" alias="@sous_origine_id"/>
				
				<node expr="[infos_contrat/@date_prospect_affilie]" alias="@date_prospect_affilie"/>
				<node expr="[infos_contrat/@date_saisie]" alias="@date_saisie"/>
				<node expr="[infos_contrat/@statut_affiliation_id]" alias="@statut_affiliation_id"/>
				
				<node expr="[contactabilite/@smobilephone]" alias="@smobilephone"/>
				<node expr="[contactabilite/@sphone]" alias="@sphone"/>
				<node expr="[contactabilite/@tel_fixe_pro]" alias="@tel_fixe_pro"/>
				<node expr="[contactabilite/@plage_horaire_preferee]" alias="@plage_horaire_preferee"/>
				<node expr="[contactabilite/@semail]" alias="@semail"/>
				<node expr="[contactabilite/@email_pro]" alias="@email_pro"/>
				<node expr="[contactabilite/@date_modif_section_tel_email]" alias="@date_modif_section_tel_email"/>
				
				<node expr="[contactabilite/@iblacklist]" alias="@iblacklist"/>
				<node expr="[contactabilite/@adresse_pnd_o_n]" alias="@adresse_pnd_o_n"/>
				<node expr="[contactabilite/@date_retour_pnd]" alias="@date_retour_pnd"/>
				<node expr="[contactabilite/@optin_prefon_telephone]" alias="@optin_prefon_telephone"/>
				<node expr="[contactabilite/@optin_prefon_sms]" alias="@optin_prefon_sms"/>
				<node expr="[contactabilite/@optin_prefon_email]" alias="@optin_prefon_email"/>
				<node expr="[contactabilite/@optin_prefon_courrier]" alias="@optin_prefon_courrier"/>
				<node expr="[contactabilite/@optin_partenaires]" alias="@optin_partenaires"/>
				<node expr="[contactabilite/@date_modif_section_optin]" alias="@date_modif_section_optin"/>
				
				<node expr="[contactabilite/@date_retour_pnd]" alias="@date_retour_pnd"/>
				
				<node expr="[adresse-particulier/@adresse_4]" alias="@adresse_4"/>
				<node expr="[adresse-particulier/@code_postal]" alias="@code_postal"/>
				<node expr="[adresse-particulier/@adresse_2]" alias="@adresse_2"/>
				<node expr="[adresse-particulier/@adresse_1]" alias="@adresse_1"/>
				<node expr="[adresse-particulier/@lastModified]" alias="@lastModifiedAdr"/>
				<node expr="[adresse-particulier/@adresse_3]" alias="@adresse_3"/>
				<node expr="[adresse-particulier/@ville]" alias="@ville"/>
				<node expr="[adresse-particulier/@pays]" alias="@pays"/>
				
				<node expr="[particulier_data-particulier/@Administration_Nom]" alias="@Administration_Nom"/>
				<node expr="[particulier_data-particulier/@Administration_Adresse_1]" alias="@Administration_Adresse_1"/>
				<node expr="[particulier_data-particulier/@Administration_Adresse_2]" alias="@Administration_Adresse_2"/>
				<node expr="[particulier_data-particulier/@Administration_Adresse_3]" alias="@Administration_Adresse_3"/>
				<node expr="[particulier_data-particulier/@Administration_Adresse_4]" alias="@Administration_Adresse_4"/>
				<node expr="[particulier_data-particulier/@Administration_CP]" alias="@Administration_CP"/>
				<node expr="[particulier_data-particulier/@Administration_Ville]" alias="@Administration_Ville"/>
				<node expr="[particulier_data-particulier/@Administration_Pays]" alias="@Administration_Pays"/>
				<node expr="[particulier_data-particulier/@Placement_Assurance_Vie]" alias="@Placement_Assurance_Vie"/>
				<node expr="[particulier_data-particulier/@Placement_PERP]" alias="@Placement_PERP"/>
				<node expr="[particulier_data-particulier/@Placement_Compte_Titre]" alias="@Placement_Compte_Titre"/>
				<node expr="[particulier_data-particulier/@placement_autre]" alias="@placement_autre"/>
				<node expr="[particulier_data-particulier/@Libelle_Placement_Autre]" alias="@Libelle_Placement_Autre"/>
				
				<node expr="[particulier_data-particulier/@Profession]" alias="@Profession"/>				
				<node expr="[particulier_data-particulier/@Tranche_Revenu]" alias="@Tranche_Revenu"/>
				<node expr="[particulier_data-particulier/@Occupation_Logement]" alias="@Occupation_Logement"/>
				<node expr="[particulier_data-particulier/@Proprietaire_Locatif]" alias="@Proprietaire_Locatif"/>
				<node expr="[particulier_data-particulier/@Nombre_Enfants]" alias="@Nombre_Enfants"/>
				
				<node expr="[particulier_data-particulier/@Type_Logement]" alias="@Type_Logement"/>
				<node expr="[particulier_data-particulier/@Structure_Familiale]" alias="@Structure_Familiale"/>
				<node expr="[particulier_data-particulier/@Montant_Impots]" alias="@Montant_Impots"/>
				<node expr="[particulier_data-particulier/@Presence_Enfants]" alias="@Presence_Enfants"/>
				<node expr="[particulier_data-particulier/@Exercice_Impots]" alias="@Exercice_Impots"/>
				
				<node expr="[particulier_data-particulier/@annee_imposition]" alias="@annee_imposition"/>
				<node expr="[particulier_data-particulier/@capacite_epargne_mensuelle]" alias="@capacite_epargne_mensuelle"/>
				<node expr="[particulier_data-particulier/@estimation_patrimoine_foyer]" alias="@estimation_patrimoine_foyer"/>
				<node expr="[particulier_data-particulier/@impot_paye]" alias="@impot_paye"/>
				
				<node expr="[conjoint/infos_individu/@lastName]" alias="@lastName_conjoint"/>
				<node expr="[conjoint/infos_individu/@firstName]" alias="@firstName_conjoint"/>
				<node expr="[parrain/infos_individu/@lastName]" alias="@lastName_parrain"/>
				<node expr="[parrain/infos_individu/@lastName]" alias="@firstName_parrain"/>
				
				<node expr="[presouscription-particulier/@Date_Envoi_Email]" alias="@Date_Envoi_Email"/>
				
				
			</select>
				<where><condition expr="@id = '.$id.'"/></where>
			</queryDef>';
			
			$reqFilleuls = '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef">
				<select>
					<node expr="[infos_individu/@firstName]" alias="@firstName"/>
					<node expr="[infos_individu/@lastName]" alias="@lastName"/>			
				</select>
					<where><condition expr="[infos_individu/@id_parrain] = '.$id.'"/></where>
				</queryDef>';
			
			$this->request->data->dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req);
			$this->request->data->domFilleuls = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqFilleuls);
			
			$listeFilleuls = '';
			$countFilleuls = 0;
			foreach($this->request->data->domFilleuls->getElementsByTagName('recipient') as $filleuls){
				if($countFilleuls != 0){
					$listeFilleuls .= ', ';
				}
				
				$listeFilleuls .= $filleuls->getAttribute('firstName') . ' ' . $filleuls->getAttribute('lastName'); 
				
				$countFilleuls++;
			}
			
			
			$this->set('listeFilleuls', $listeFilleuls);
		
		foreach($this->request->data->dom->getElementsByTagName('recipient') as $recip){
			
				foreach($recip->attributes as $attrName => $attrNode){
					$this->set($attrName, $attrNode->nodeValue);
				}
		}
		
		}
	}
	
}