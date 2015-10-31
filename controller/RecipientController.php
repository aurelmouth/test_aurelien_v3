<?php 
class RecipientController extends Controller{

function edit($id = null){
	
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		
		/*
			Si le conseiller modifie les informations de préaffiliation mais n'envoie pas de mail et retourne à l'écran particulier,
			on unset cette variable responsable de mettre tout les champs de préaffiliation en readOnly 
		*/
		
		if(isset($_SESSION[$id.'_pre_aff_post'])){
			unset($_SESSION[$id.'_pre_aff_post']);
		}
		
	
		//si des données en POST existent
		if($this->request->data){

			// Manipulation pour obtenir l'id particulier à l'insertion
			$date_jour = getdate();
			$id_crm_temp = $this->Session->read('username').$date_jour['seconds'].$date_jour['minutes'].$date_jour['hours'].$date_jour['mday'].$date_jour['mon'].$date_jour['year'];

			// si l'id et les données de POST existent déjà, alors c'est un update qu'on doit faire
			if(isset($id)){
				/*
					l'update d'un particulier, on le fait table par table, 3 requêtes différentes
				*/

				// reqûete 1, Tout ce qui se trouve dans la table particulier
				$req = '<recipient xtkschema="nms:recipient" id="'. $id .'" _key="@id"  _operation="insertOrUpdate">
					<infos_individu
						qualite_id="'.$this->request->data->qualite_id.'"
						firstName="'.trim($this->request->data->sFirstName).'"
						nom_naissance="'.trim($this->request->data->Nom_Naissance).'"
						lastName="'.trim($this->request->data->sLastName).'"
						tsBirth="'. lof::convertDateToAdobeFormat(trim($this->request->data->tsBirth)) .'"
						dept_naissance="'.trim($this->request->data->Dept_Naissance).'"
						pays_naissance="'.trim($this->request->data->Pays_Naissance).'"
						ville_naissance="'.trim($this->request->data->Ville_Naissance).'"
						annee_entree_corps="'.trim($this->request->data->Annee_Entree_Corps).'"
						situation_familiale_id="'.$this->request->data->SITUATION_FAMILIALE_Id.'"
						num_insee="'.trim($this->request->data->Num_INSEE).'"
						id_parrain="'.$this->request->data->Id_Parrain.'"
						id_conjoint="'.$this->request->data->Id_Conjoint.'"
						code_vip="'.$this->request->data->Code_VIP.'"
						situation_professionnelle_id="'.$this->request->data->SITUATION_PROFESSIONNELLE_Id.'"
						categorie_fonctionnaire_id="'.$this->request->data->CATEGORIE_FONCTIONNAIRE_Id.'"
						date_prospect="'.date('Y/m/d H:i:s').'"
						num_partenaire="'.trim($this->request->data->Num_Partenaire).'"
					/>
					
					<origine
						origine_id="'.$this->request->data->ORIGINE_Id.'"
						sous_origine_id="'.$this->request->data->SOUS_ORIGINE_Id.'"
					/>
					
					<infos_contrat
						statut_affiliation_id="'.$this->request->data->STATUT_AFFILIATION_Id.'"
					/>
					<contactabilite
						optin_prefon_courrier="'.$this->request->data->Optin_Prefon_Courrier.'"
						optin_prefon_telephone="'.$this->request->data->Optin_Prefon_Telephone.'"
						optin_prefon_sms="'.$this->request->data->Optin_Prefon_SMS.'"
						optin_prefon_email="'.$this->request->data->Optin_Prefon_Email.'"
						optin_partenaires="'.$this->request->data->Optin_Partenaires.'"
						date_modif_section_optin="'.lof::convertDateToAdobeFormat($this->request->data->date_modif_section_optin).'"
						
						semail="'.trim($this->request->data->sEmail).'"
						email_pro="'.trim($this->request->data->email_pro).'"
						sphone="'.trim($this->request->data->sPhone).'"
						tel_fixe_pro="'.trim($this->request->data->tel_fixe_pro).'"
						smobilephone="'.trim($this->request->data->sMobilePhone).'"
						plage_horaire_preferee="'.trim($this->request->data->plage_horaire_preferee).'"
						adresse_pnd_o_n="'.$this->request->data->Adresse_PND_O_N.'"	
						date_modif_section_tel_email="'.lof::convertDateToAdobeFormat($this->request->data->date_modif_section_tel_email).'"

						
						Libelle_Autre_Statut_Affiliation="'.trim($this->request->data->Libelle_Autre_Statut_Affiliation).'"	
									
					/>
					
					<dqe
						export_dqe="0"
					/>
					
			</recipient>';
			
			// requête 2, update de la table adresse, la clé c'est le particulier_id
			$req2 = '<adresse xtkschema="pre:adresse" particulier_id="'. $id .'" _key="@particulier_id"  _operation="insertOrUpdate" 
				adresse_1="'.trim($this->request->data->Adresse_1).'"
				adresse_2="'.trim($this->request->data->Adresse_2).'"
				adresse_3="'.trim($this->request->data->Adresse_3).'"
				adresse_4="'.trim($this->request->data->Adresse_4).'"
				code_postal="'.trim($this->request->data->Code_Postal).'"
				ville="'.trim($this->request->data->Ville).'"
				pays="'.trim($this->request->data->Pays).'"			
			/>';
			
			// requête 3, update de la table particulier_data, la clé c'est le particulier_id
			$req3 = '<particulier_data xtkschema="pre:particulier_data" particulier_id="'. $id .'" _key="@particulier_id"  _operation="insertOrUpdate" 
				Administration_Nom="'.trim($this->request->data->Administration_Nom).'"
				Administration_Adresse_1="'.trim($this->request->data->Administration_Adresse_1).'"
				Administration_Adresse_2="'.trim($this->request->data->Administration_Adresse_2).'"
				Administration_Adresse_3="'.trim($this->request->data->Administration_Adresse_3).'"
				Administration_Adresse_4="'.trim($this->request->data->Administration_Adresse_4).'"
				Administration_CP="'.trim($this->request->data->Administration_CP).'"
				Administration_Ville="'.trim($this->request->data->Administration_Ville).'"
				Administration_Pays="'.trim($this->request->data->Administration_Pays).'"
				Placement_Assurance_Vie="'.$this->request->data->Placement_Assurance_Vie.'"
				Placement_PERP="'.$this->request->data->Placement_PERP.'"
				Placement_Compte_Titre="'.$this->request->data->Placement_Compte_Titre.'"
				placement_autre="'.$this->request->data->Placement_Autre.'"
				Nombre_Enfants="'.$this->request->data->Nombre_Enfants.'"
				Profession="'.trim($this->request->data->Profession).'"
				Libelle_Placement_Autre="'.trim($this->request->data->Libelle_Placement_Autre).'"
				Occupation_Logement="'.$this->request->data->Occupation_Logement.'"
				Proprietaire_Locatif="'.$this->request->data->Proprietaire_Locatif.'"
				Tranche_Revenu="'.$this->request->data->Tranche_Revenu.'"				
				annee_imposition="'.trim($this->request->data->annee_imposition).'"				
				capacite_epargne_mensuelle="'.$this->request->data->capacite_epargne_mensuelle.'"				
				estimation_patrimoine_foyer="'.$this->request->data->estimation_patrimoine_foyer.'"				
				impot_paye="'.$this->request->data->impot_paye.'"								
			/>';
			
			
			
			
			

			
			
			
			
			
			/*
				on Load le model, et on fait nos appels WS.
			*/
						
			$this->loadModel('XtkSession');
			$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req);
			$res2 = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req2);
			$res3 = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req3);

			
			//Update du conjoint, si l'id coinjoint est rensigné, on fait l'update de l'id conjoint aussi
			if(isset($this->request->data->Id_Conjoint) && $this->request->data->Id_Conjoint > 0){
				$reqConjoint = '<recipient xtkschema="nms:recipient" id="'. $this->request->data->Id_Conjoint .'" _key="@id"  _operation="insertOrUpdate">
					<infos_individu
						id_conjoint="'.$id.'"
					/>
					</recipient>';
				$res4 = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $reqConjoint);
			}
			
			if(isset($this->request->data->Old_Id_Conjoint) && $this->request->data->Old_Id_Conjoint != $this->request->data->Id_Conjoint && $this->request->data->Old_Id_Conjoint > 0){
				$reqConjoint = '<recipient xtkschema="nms:recipient" id="'. $this->request->data->Old_Id_Conjoint .'" _key="@id"  _operation="insertOrUpdate">
					<infos_individu
						id_conjoint="0"
					/>
					</recipient>';
				$res4 = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $reqConjoint);
			}
			
			
			
			
			$this->redirect('recipient/edit/'.$id);
			
			} else {
				// Si l'id n'existe pas et il y a des données en POST, alors forcément c'est un insert
				$req = '<recipient xtkschema="nms:recipient"  _operation="insert">
					<infos_individu
						qualite_id="'.$this->request->data->qualite_id.'"
						firstName="'.trim($this->request->data->sFirstName).'"
						nom_naissance="'.trim($this->request->data->Nom_Naissance).'"
						lastName="'.trim($this->request->data->sLastName).'"
						tsBirth="'. lof::convertDateToAdobeFormat(trim($this->request->data->tsBirth)) .'"
						dept_naissance="'.trim($this->request->data->Dept_Naissance).'"
						pays_naissance="'.trim($this->request->data->Pays_Naissance).'"
						conseiller="'.trim($_SESSION['conseillerEnLigne']['label']).'"
						num_partenaire="'.trim($this->request->data->Num_Partenaire).'"
						ville_naissance="'.trim($this->request->data->Ville_Naissance).'"	
						annee_entree_corps="'.trim($this->request->data->Annee_Entree_Corps).'"
						situation_familiale_id="'.trim($this->request->data->SITUATION_FAMILIALE_Id).'"
						num_insee="'.trim($this->request->data->Num_INSEE).'"
						statut_particulier="2" 
						id_parrain="'.$this->request->data->Id_Parrain.'"
						id_conjoint="'.$this->request->data->Id_Conjoint.'"
						code_vip="'.$this->request->data->Code_VIP.'"
						situation_professionnelle_id="'.$this->request->data->SITUATION_PROFESSIONNELLE_Id.'"
						categorie_fonctionnaire_id="'.$this->request->data->CATEGORIE_FONCTIONNAIRE_Id.'"
						date_prospect="'.date('Y/m/d H:i:s').'"
						id_crm_temp="'.$id_crm_temp.'"							
					/>
				
					<origine
						origine_id="'.$this->request->data->ORIGINE_Id.'"
						sous_origine_id="'.$this->request->data->SOUS_ORIGINE_Id.'"
					/>
					
					
					<infos_contrat
						statut_affiliation_id="'.$this->request->data->STATUT_AFFILIATION_Id.'"
					/>
					<contactabilite
						optin_prefon_courrier="'.$this->request->data->Optin_Prefon_Courrier.'"
						optin_prefon_telephone="'.$this->request->data->Optin_Prefon_Telephone.'"
						optin_prefon_sms="'.$this->request->data->Optin_Prefon_SMS.'"
						optin_prefon_email="'.$this->request->data->Optin_Prefon_Email.'"
						optin_partenaires="'.$this->request->data->Optin_Partenaires.'"
						date_modif_section_optin="'.lof::convertDateToAdobeFormat($this->request->data->date_modif_section_optin).'"
						
						semail="'.trim($this->request->data->sEmail).'"
						email_pro="'.trim($this->request->data->email_pro).'"
						sphone="'.trim($this->request->data->sPhone).'"
						tel_fixe_pro="'.trim($this->request->data->tel_fixe_pro).'"
						smobilephone="'.trim($this->request->data->sMobilePhone).'"
						plage_horaire_preferee="'.trim($this->request->data->plage_horaire_preferee).'"
						adresse_pnd_o_n="'.trim($this->request->data->Adresse_PND_O_N).'"	
						date_modif_section_tel_email="'.lof::convertDateToAdobeFormat($this->request->data->date_modif_section_tel_email).'"

						Libelle_Autre_Statut_Affiliation="'.trim($this->request->data->Libelle_Autre_Statut_Affiliation).'"
						
					/>
					
					<adresse-particulier
						adresse_1="'.trim($this->request->data->Adresse_1).'"
						adresse_2="'.trim($this->request->data->Adresse_2).'"
						adresse_3="'.trim($this->request->data->Adresse_3).'"
						adresse_4="'.trim($this->request->data->Adresse_4).'"
						code_postal="'.trim($this->request->data->Code_Postal).'"
						ville="'.trim($this->request->data->Ville).'"
						pays="'.trim($this->request->data->Pays).'"
					/>
					<particulier_data-particulier notNull="true"
						Administration_Nom="'.trim($this->request->data->Administration_Nom).'"
						Administration_Adresse_1="'.trim($this->request->data->Administration_Adresse_1).'"
						Administration_Adresse_2="'.trim($this->request->data->Administration_Adresse_2).'"
						Administration_Adresse_3="'.trim($this->request->data->Administration_Adresse_3).'"
						Administration_Adresse_4="'.trim($this->request->data->Administration_Adresse_4).'"
						Administration_CP="'.trim($this->request->data->Administration_CP).'"
						Administration_Ville="'.trim($this->request->data->Administration_Ville).'"
						Administration_Pays="'.trim($this->request->data->Administration_Pays).'"
						Placement_Assurance_Vie="'.$this->request->data->Placement_Assurance_Vie.'" 
						Placement_PERP="'.$this->request->data->Placement_PERP.'"
						Placement_Compte_Titre="'.$this->request->data->Placement_Compte_Titre.'"
						placement_autre="'.$this->request->data->Placement_Autre.'"
						Nombre_Enfants="'.$this->request->data->Nombre_Enfants.'" 
						Profession="'.trim($this->request->data->Profession).'"
						Libelle_Placement_Autre="'.trim($this->request->data->Libelle_Placement_Autre).'"
						Occupation_Logement="'.$this->request->data->Occupation_Logement.'"
						Proprietaire_Locatif="'.$this->request->data->Proprietaire_Locatif.'"
						Tranche_Revenu="'.$this->request->data->Tranche_Revenu.'"
						annee_imposition="'.trim($this->request->data->annee_imposition).'"				
						capacite_epargne_mensuelle="'.$this->request->data->capacite_epargne_mensuelle.'"				
						estimation_patrimoine_foyer="'.$this->request->data->estimation_patrimoine_foyer.'"				
						impot_paye="'.$this->request->data->impot_paye.'"	
						
					/>
				</recipient>';

						
	
			
			
			$this->loadModel('XtkSession');
			$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req);
			
			
			$this->loadModel('XtkQueryDef');
			$dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef"><select><node expr="@id"/></select><where><condition expr="[infos_individu/@id_crm_temp] = \''.$id_crm_temp.'\'"/></where></queryDef>');
			foreach($dom->getElementsByTagName('recipient') as $recip){
				$this->request->data->id = $recip->getAttribute("id");
			}
			
			// si l'id existe, on fait la mise à jour de conjoint, et affiche la fiche particulier après
			if (isset($this->request->data->id)){
				if(isset($this->request->data->Id_Conjoint) && $this->request->data->Id_Conjoint > 0){
					$reqConjoint = '<recipient xtkschema="nms:recipient" id="'. $this->request->data->Id_Conjoint .'" _key="@id"  _operation="insertOrUpdate">
						<infos_individu
							id_conjoint="'.$this->request->data->id.'"
						/>
						</recipient>';
					$res2 = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $reqConjoint);
				}
				$this->redirect('recipient/edit/'.$this->request->data->id);
			}
			
		}	

		
	} else {
		
		if(isset($this->request->params[0])){
		// Si les données n'existent pas, mais que l'id existe, alors c'est un select
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
				<node expr="[infos_individu/@conseiller]" alias="@conseiller_creation"/>
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
				<node expr="[contactabilite/@Libelle_Autre_Statut_Affiliation]" alias="@Libelle_Autre_Statut_Affiliation"/>
				
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
				<node expr="[conjoint/infos_individu/@statut_particulier]" alias="@statut_particulier_conjoint"/>
				<node expr="[conjoint/infos_individu/@qualite_id]" alias="@qualite_id_conjoint"/>
				<node expr="[parrain/infos_individu/@lastName]" alias="@lastName_parrain"/>
				<node expr="[parrain/infos_individu/@firstName]" alias="@firstName_parrain"/>
				<node expr="[parrain/infos_individu/@statut_particulier]" alias="@statut_particulier_parrain"/>
				<node expr="[parrain/infos_individu/@qualite_id]" alias="@qualite_id_parrain"/>
				
				<node expr="[presouscription-particulier/@Date_Envoi_Email]" alias="@Date_Envoi_Email"/>
				
				
			</select>
				<where><condition expr="@id = '.$id.'"/></where>
			</queryDef>';
		
		// requete pour prendre les deux derniers evenements
		$reqLastEvents = '<queryDef operation="select" schema="pre:evenement" xtkschema="xtk:queryDef" lineCount="2">
			<select>
				<node expr="@Date_Evenement" alias="@Date_Evenement"/>
				<node expr="@MODE_EVENEMENT_Id" alias="@MODE_EVENEMENT_Id"/>
				<node expr="@MOTIF_EVENEMENT_Id" alias="@MOTIF_EVENEMENT_Id"/>
	
			</select>
				<where><condition expr="@particulier_id = '.$id.'"/></where>
				<orderBy><node expr="@Date_Evenement" sortDesc="true"/></orderBy>
			</queryDef>';
			
		$reqScores = '<queryDef operation="select" schema="pre:scoring" xtkschema="xtk:queryDef">
			<select>
				<node expr="@code_score" alias="@code_score"/>
				<node expr="@valeur_score" alias="@valeur_score"/>
	
			</select>
				<where><condition expr="@particulier_id = '.$id.'"/></where>
			</queryDef>';
			
		$reqFilleuls = '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef">
			<select>
				<node expr="@id" alias="@id"/>
				<node expr="[infos_individu/@statut_particulier]" alias="@statut_particulier"/>
				<node expr="[infos_individu/@firstName]" alias="@firstName"/>
				<node expr="[infos_individu/@lastName]" alias="@lastName"/>			
				<node expr="[infos_individu/@qualite_id]" alias="@qualite_id"/>			
			</select>
				<where><condition expr="[infos_individu/@id_parrain] = '.$id.'"/></where>
			</queryDef>';
			
			$reqPointsAcquis = '<queryDef operation="select" schema="pre:contrat" xtkschema="xtk:queryDef">
			<select>
				<node expr="[identification/@idcontrat]" alias="@idcontrat"/>
				<node expr="[contrat_retraite_cotisant/@points_acquis_bruts]" alias="@points_acquis_bruts"/>
			</select>
				<where>
					<condition expr="[identification/@particulier_id] = '.$id.'"/>
					<condition expr="[identification/@nature_contrat_id] = 1"/>
				</where>
			</queryDef>';
		
		
		$this->request->data->dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req);
		$this->request->data->domLastEvents = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqLastEvents);
		$this->request->data->domFilleuls = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqFilleuls);
		$this->request->data->domScores = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqScores);
		$this->request->data->domPointsAcquis = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqPointsAcquis);
		if(!$this->request->data->dom){
			echo 'erreur de la requête ';
			exit();
		}
		
		$listeFilleuls = '';
		$countFilleuls = 0;
		foreach($this->request->data->domFilleuls->getElementsByTagName('recipient') as $filleuls){
			if($countFilleuls != 0){
				$listeFilleuls .= "\n";
			}
			
			$civilite = ($filleuls->getAttribute('qualite_id') > 0 && $filleuls->getAttribute('qualite_id') <= 2) ? (strtoupper($_SESSION['CIVILITE'][$filleuls->getAttribute('qualite_id')])) . ' ' : ('');
			
			$listeFilleuls .= $civilite . $filleuls->getAttribute('firstName') . ' ' . $filleuls->getAttribute('lastName') . ' | ' . $_SESSION['STATUT_PARTICULIER'][$filleuls->getAttribute('statut_particulier')] . ' n° ' .  $filleuls->getAttribute('id'); 
			
			$countFilleuls++;
		}
		
		
		$this->set('listeFilleuls', $listeFilleuls);
		

		
		foreach($this->request->data->domPointsAcquis->getElementsByTagName('contrat') as $cont){
			foreach($cont->attributes as $attrName => $attrNode){
					$this->set($attrName, $attrNode->nodeValue);
			}
		}
		
		foreach($this->request->data->dom->getElementsByTagName('recipient') as $recip){
			
				foreach($recip->attributes as $attrName => $attrNode){
					$this->set($attrName, $attrNode->nodeValue);
				}


			}
			
			

		} else {
			if($_SESSION['conseillerEnLigne']['droits'] < 3) {
				$this->redirect('search/search');
			}
			
			
			if($_SESSION['conseillerEnLigne']['partenaires'] > 0){
				$this->set('origine_id', '117');
				$this->set('sous_origine_id', $_SESSION['conseillerEnLigne']['partenaires']);
			}
			$this->set('creation', 'oui');
			$this->set('pays_naissance', 'France');
			$this->set('pays', 'France');
			$this->set('Administration_Pays', 'France');
			
		}	

	}
}

	


	function conversion_prospect($id=null){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		
		if(isset($id)){
				$req = '<recipient xtkschema="nms:recipient" id="'. $id .'" _key="@id"  _operation="insertOrUpdate">
					<infos_individu
						statut_particulier="2"
					/>
					</recipient>';

				$this->loadModel('XtkSession');
				$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req);
				if($res){
					$this->redirect('recipient/edit/'.$id);
				}
		}else{
			$this->redirect('recipient/edit/'.$id);
		}
	}
	
	
	function fichierLoue($id=null){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		
		if(isset($id)){
				$req = '<recipient xtkschema="nms:recipient" id="'. $id .'" _key="@id"  _operation="insertOrUpdate">
					<contactabilite
						optin_prefon_courrier="'.$this->request->data->Optin_Prefon_Courrier.'"
						optin_prefon_telephone="'.$this->request->data->Optin_Prefon_Telephone.'"
						optin_prefon_sms="'.$this->request->data->Optin_Prefon_SMS.'"
						optin_prefon_email="'.$this->request->data->Optin_Prefon_Email.'"
						optin_partenaires="'.$this->request->data->Optin_Partenaires.'"
						date_modif_section_optin="'.lof::convertDateToAdobeFormat($this->request->data->date_modif_section_optin).'"
					/>	
			</recipient>';

				$this->loadModel('XtkSession');
				$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req);
				if($res){
					$this->redirect('recipient/edit/'.$id);
				}
		}else{
			$this->redirect('recipient/edit/'.$id);
		}
	}
	
	

	
	
	function pre_aff($id=null){	
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		if($this->request->data){
			
			// récupérer le IBAN champ par champ et l'affecter à une seule variable pour pourvoir le stocker
			$mandat_iban = '';
			for($i=1; $i<=7; $i++){
				$name="Mandat_IBAN" . $i;
				$mandat_iban .= $this->request->data->$name;
			}
			
			$req = '<recipient xtkschema="nms:recipient" id="'. $id .'" _key="@id"  _operation="insertOrUpdate">
				<infos_individu
					qualite_id="'.$this->request->data->qualite_id.'"
					tsBirth="'. lof::convertDateToAdobeFormat(trim($this->request->data->tsBirth)).'"
					firstName="'.trim($this->request->data->sFirstName).'"
					nom_naissance="'.trim($this->request->data->Nom_Naissance).'"
					lastName="'.trim($this->request->data->sLastName).'"
					dept_naissance="'.trim($this->request->data->Dept_Naissance).'"
					pays_naissance="'.trim($this->request->data->Pays_Naissance).'"
					nationalite="'.trim($this->request->data->Nationalite).'"
					ville_naissance="'.trim($this->request->data->Ville_Naissance).'"
					situation_professionnelle_id="'.$this->request->data->SITUATION_PROFESSIONNELLE_Id.'"
					situation_familiale_id="'.$this->request->data->SITUATION_FAMILIALE_Id.'"
					id_conjoint="'.$this->request->data->Id_Conjoint.'"
					num_insee="'.$this->request->data->Num_INSEE.'"
					categorie_fonctionnaire_id="'.$this->request->data->CATEGORIE_FONCTIONNAIRE_Id.'"
					Residence_Fiscale_Francaise="'.$this->request->data->Residence_Fiscale_Francaise.'"
					Majeur_Protege="'.$this->request->data->Majeur_Protege.'"
				/>
				
				<infos_contrat
					statut_affiliation_id="'.$this->request->data->STATUT_AFFILIATION_Id.'"
				/>
				
				<contactabilite
					optin_prefon_courrier="'.$this->request->data->Optin_Prefon_Courrier.'"
					optin_prefon_telephone="'.$this->request->data->Optin_Prefon_Telephone.'"
					optin_prefon_sms="'.$this->request->data->Optin_Prefon_SMS.'"
					optin_prefon_email="'.$this->request->data->Optin_Prefon_Email.'"
					optin_partenaires="'.$this->request->data->Optin_Partenaires.'"
					semail="'.$this->request->data->sEmailPreAff.'"
					sphone="'.$this->request->data->sPhone.'"
					smobilephone="'.$this->request->data->sMobilePhone.'"
					Libelle_Autre_Statut_Affiliation="'.trim($this->request->data->Libelle_Autre_Statut_Affiliation).'"
				/>
				
				<dqe
					export_dqe="0"
				/>
		</recipient>';
			
			$req2 = '<adresse xtkschema="pre:adresse" particulier_id="'. $id .'" _key="@particulier_id"  _operation="insertOrUpdate" 
				adresse_1="'.trim($this->request->data->Adresse_1).'"
				adresse_2="'.trim($this->request->data->Adresse_2).'"
				adresse_3="'.trim($this->request->data->Adresse_3).'"
				adresse_4="'.trim($this->request->data->Adresse_4).'"
				code_postal="'.trim($this->request->data->Code_Postal).'"
				ville="'.trim($this->request->data->Ville).'"
				pays="'.trim($this->request->data->Pays).'"			
			/>';
			
			
			$req3 = '<particulier_data xtkschema="pre:particulier_data" particulier_id="'. $id .'" _key="@particulier_id"  _operation="insertOrUpdate" 
				Administration_Nom="'.trim($this->request->data->Administration_Nom).'"
				Administration_Adresse_1="'.trim($this->request->data->Administration_Adresse_1).'"
				Administration_Adresse_2="'.trim($this->request->data->Administration_Adresse_2).'"
				Administration_Adresse_3="'.trim($this->request->data->Administration_Adresse_3).'"
				Administration_Adresse_4="'.trim($this->request->data->Administration_Adresse_4).'"
				Administration_CP="'.trim($this->request->data->Administration_CP).'"
				Administration_Ville="'.trim($this->request->data->Administration_Ville).'"
				Administration_Pays="'.trim($this->request->data->Administration_Pays).'"				
			/>';
			
			
			$req4 = '<presouscription xtkschema="pre:presouscription" PARTICULIER_Id="'. $id .'" _key="@PARTICULIER_Id"  _operation="insertOrUpdate" 
				Classe_Cotisation="'.$this->request->data->Classe_Cotisation.'"
				MODE_REGLEMENT_RETRAITE_COTISANT_Id="'.$this->request->data->MODE_REGLEMENT_RETRAITE_COTISANT_Id.'"
				Montant_Cotisation_Annuelle="'.trim($this->request->data->Montant_Cotisation_Annuelle).'"
				Mois_Debut_Prelevement="'.$this->request->data->Mois_Debut_Prelevement.'"
				Transfert_Contrat="'.$this->request->data->Transfert_Contrat.'"
				Nb_Annees_Rachat="'.$this->request->data->Nb_Annees_Rachat.'"
				Reversion="'.$this->request->data->Reversion.'"							
				Mandat_IBAN="'. trim($mandat_iban) . '"				
				Mandat_BIC="'.trim($this->request->data->Mandat_BIC).'"											
				Montant_Versement_Exceptionnel="'.floatval(str_replace(' ', '', str_replace(',', '.',trim($this->request->data->Montant_Versement_Exceptionnel)))).'"											
				Reversion_Conjoint="'.$this->request->data->Reversion_Conjoint.'"											
				Reversion_Beneficiaire_Nom="'.trim($this->request->data->Reversion_Beneficiaire_Nom).'"											
				Reversion_Beneficiaire_Prenom="'.trim($this->request->data->Reversion_Beneficiaire_Prenom).'"											
				Reversion_Beneficiaire_Date_Naissance="'.lof::convertDateToAdobeFormat(trim($this->request->data->Reversion_Beneficiaire_Date_Naissance)).'"											
			/>';
			

			
			$this->loadModel('XtkSession');
			$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req);
			$res2 = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req2);
			$res3 = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req3);
			$res4 = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req4);
			
			//Update du conjoint, si l'id coinjoint est rensigné, on fait l'update de l'id conjoint aussi
			if(isset($this->request->data->Id_Conjoint) && $this->request->data->Id_Conjoint > 0){
				$reqConjoint = '<recipient xtkschema="nms:recipient" id="'. $this->request->data->Id_Conjoint .'" _key="@id"  _operation="insertOrUpdate">
					<infos_individu
						id_conjoint="'.$id.'"
					/>
					</recipient>';
				$res4 = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $reqConjoint);
			}
			
			if(isset($this->request->data->Old_Id_Conjoint) && $this->request->data->Old_Id_Conjoint != $this->request->data->Id_Conjoint && $this->request->data->Old_Id_Conjoint > 0){
				$reqConjoint = '<recipient xtkschema="nms:recipient" id="'. $this->request->data->Old_Id_Conjoint .'" _key="@id"  _operation="insertOrUpdate">
					<infos_individu
						id_conjoint="0"
					/>
					</recipient>';
				$res4 = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $reqConjoint);
			}

			if($res && $res2 && $res3){
				$_SESSION[$id.'_pre_aff_post'] = "1";
				$this->redirect('recipient/pre_aff/'. $id);
			}
			
			
		}else{
			$req = '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef">
			<select>
				<node expr="@created" alias="@created"/>
				<node expr="@lastModified" alias="@lastModified"/>
				<node expr="[infos_individu/@conseiller]" alias="@conseiller_creation"/>
				<node expr="[infos_individu/@ville_naissance]" alias="@ville_naissance"/>
				<node expr="[infos_individu/@statut_particulier]" alias="@statut_particulier"/>
				<node expr="[infos_individu/@sous_statut]" alias="@sous_statut"/>
				<node expr="[infos_individu/@situation_professionnelle_id]" alias="@situation_professionnelle_id"/>
				<node expr="[infos_individu/@situation_familiale_id]" alias="@situation_familiale_id"/>
				<node expr="[infos_individu/@firstName]" alias="@firstName"/>
				<node expr="[infos_individu/@lastName]" alias="@lastName"/>
				<node expr="[infos_individu/@pays_naissance]" alias="@pays_naissance"/>
				<node expr="[infos_individu/@nationalite]" alias="@nationalite"/>
				<node expr="[infos_individu/@num_insee]" alias="@num_insee"/>
				<node expr="[infos_individu/@nom_naissance]" alias="@nom_naissance"/>
				<node expr="[infos_individu/@qualite_id]" alias="@qualite_id"/>
				<node expr="[infos_individu/@dept_naissance]" alias="@dept_naissance"/>
				<node expr="[infos_individu/@date_prospect]" alias="@date_prospect"/>
				<node expr="[infos_individu/@tsBirth]" alias="@tsBirth"/>
				<node expr="[infos_individu/@date_deces]" alias="@date_deces"/>
				<node expr="[infos_individu/@categorie_fonctionnaire_id]" alias="@categorie_fonctionnaire_id"/>
				<node expr="[infos_individu/@Residence_Fiscale_Francaise]" alias="@Residence_Fiscale_Francaise"/>
				<node expr="[infos_individu/@Majeur_Protege]" alias="@Majeur_Protege"/>
				<node expr="[infos_individu/@id_conjoint]" alias="@id_conjoint"/>
				
				<node expr="[infos_contrat/@statut_affiliation_id]" alias="@statut_affiliation_id"/>
				
				
				<node expr="[adresse-particulier/@adresse_4]" alias="@adresse_4"/>
				<node expr="[adresse-particulier/@code_postal]" alias="@code_postal"/>
				<node expr="[adresse-particulier/@adresse_2]" alias="@adresse_2"/>
				<node expr="[adresse-particulier/@adresse_1]" alias="@adresse_1"/>
				<node expr="[adresse-particulier/@adresse_3]" alias="@adresse_3"/>
				<node expr="[adresse-particulier/@ville]" alias="@ville"/>
				<node expr="[adresse-particulier/@pays]" alias="@pays"/>
				
				
				<node expr="[contactabilite/@smobilephone]" alias="@smobilephone"/>
				<node expr="[contactabilite/@sphone]" alias="@sphone"/>
				<node expr="[contactabilite/@semail]" alias="@semail"/>
				<node expr="[contactabilite/@iblacklist]" alias="@iblacklist"/>
				<node expr="[contactabilite/@date_retour_pnd]" alias="@date_retour_pnd"/>
				<node expr="[contactabilite/@optin_prefon_telephone]" alias="@optin_prefon_telephone"/>
				<node expr="[contactabilite/@optin_prefon_sms]" alias="@optin_prefon_sms"/>
				<node expr="[contactabilite/@optin_prefon_email]" alias="@optin_prefon_email"/>
				<node expr="[contactabilite/@optin_prefon_courrier]" alias="@optin_prefon_courrier"/>
				<node expr="[contactabilite/@optin_partenaires]" alias="@optin_partenaires"/>
				<node expr="[contactabilite/@Libelle_Autre_Statut_Affiliation]" alias="@Libelle_Autre_Statut_Affiliation"/>
				
				<node expr="[conjoint/infos_individu/@lastName]" alias="@lastName_conjoint"/>
				<node expr="[conjoint/infos_individu/@firstName]" alias="@firstName_conjoint"/>
				<node expr="[conjoint/infos_individu/@statut_particulier]" alias="@statut_particulier_conjoint"/>
				<node expr="[conjoint/infos_individu/@qualite_id]" alias="@qualite_id_conjoint"/>
				
				<node expr="[particulier_data-particulier/@Administration_Nom]" alias="@Administration_Nom"/>
				<node expr="[particulier_data-particulier/@Administration_Adresse_1]" alias="@Administration_Adresse_1"/>
				<node expr="[particulier_data-particulier/@Administration_Adresse_2]" alias="@Administration_Adresse_2"/>
				<node expr="[particulier_data-particulier/@Administration_Adresse_3]" alias="@Administration_Adresse_3"/>
				<node expr="[particulier_data-particulier/@Administration_Adresse_4]" alias="@Administration_Adresse_4"/>
				<node expr="[particulier_data-particulier/@Administration_CP]" alias="@Administration_CP"/>
				<node expr="[particulier_data-particulier/@Administration_Ville]" alias="@Administration_Ville"/>
				<node expr="[particulier_data-particulier/@Administration_Pays]" alias="@Administration_Pays"/>
				
				<node expr="[presouscription-particulier/@Classe_Cotisation]" alias="@Classe_Cotisation"/>
				<node expr="[presouscription-particulier/@MODE_REGLEMENT_RETRAITE_COTISANT_Id]" alias="@MODE_REGLEMENT_RETRAITE_COTISANT_Id"/>
				<node expr="[presouscription-particulier/@Mois_Debut_Prelevement]" alias="@Mois_Debut_Prelevement"/>
				<node expr="[presouscription-particulier/@Montant_Cotisation_Annuelle]" alias="@Montant_Cotisation_Annuelle"/>
				<node expr="[presouscription-particulier/@Transfert_Contrat]" alias="@Transfert_Contrat"/>
				<node expr="[presouscription-particulier/@Montant_Versement_Exceptionnel]" alias="@Montant_Versement_Exceptionnel"/>
				<node expr="[presouscription-particulier/@Nb_Annees_Rachat]" alias="@Nb_Annees_Rachat"/>
				<node expr="[presouscription-particulier/@Reversion]" alias="@Reversion"/>
				<node expr="[presouscription-particulier/@Mandat_IBAN]" alias="@Mandat_IBAN"/>
				<node expr="[presouscription-particulier/@Mandat_BIC]" alias="@Mandat_BIC"/>
				<node expr="[presouscription-particulier/@Reversion_Conjoint]" alias="@Reversion_Conjoint"/>
				<node expr="[presouscription-particulier/@Reversion_Beneficiaire_Nom]" alias="@Reversion_Beneficiaire_Nom"/>
				<node expr="[presouscription-particulier/@Reversion_Beneficiaire_Prenom]" alias="@Reversion_Beneficiaire_Prenom"/>
				<node expr="[presouscription-particulier/@Reversion_Beneficiaire_Date_Naissance]" alias="@Reversion_Beneficiaire_Date_Naissance"/>
				
			</select>
				<where><condition expr="@id = '.$id.'"/></where>
			</queryDef>';
			
			
			$reqLastEvents = '<queryDef operation="select" schema="pre:evenement" xtkschema="xtk:queryDef" lineCount="2">
			<select>
				<node expr="@Date_Evenement" alias="@Date_Evenement"/>
				<node expr="@MODE_EVENEMENT_Id" alias="@MODE_EVENEMENT_Id"/>
				<node expr="@MOTIF_EVENEMENT_Id" alias="@MOTIF_EVENEMENT_Id"/>
	
			</select>
				<where><condition expr="@particulier_id = '.$id.'"/></where>
				<orderBy><node expr="@Date_Evenement" sortDesc="true"/></orderBy>
			</queryDef>';
			
			$reqScores = '<queryDef operation="select" schema="pre:scoring" xtkschema="xtk:queryDef">
			<select>
				<node expr="@code_score" alias="@code_score"/>
				<node expr="@valeur_score" alias="@valeur_score"/>

			</select>
				<where><condition expr="@particulier_id = '.$id.'"/></where>
			</queryDef>';

			$this->request->data = new stdClass();
			$this->loadModel('XtkQueryDef');
			$this->request->data->dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req);
			$this->request->data->domScores = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqScores);
			$this->request->data->domLastEvents = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqLastEvents);
			if(!$this->request->data->dom){
				echo 'erreur de la requête ';
				exit();
			}
		
			foreach($this->request->data->dom->getElementsByTagName('recipient') as $pre_aff){			
				foreach($pre_aff->attributes as $attrName => $attrNode){
					$this->set($attrName, $attrNode->nodeValue);
					
					if($attrName == 'MODE_REGLEMENT_RETRAITE_COTISANT_Id' && $attrNode->nodeValue < 1){
							$this->set('MODE_REGLEMENT_RETRAITE_COTISANT_Id', '7');		
					}

					if($attrName == 'Mois_Debut_Prelevement' && $attrNode->nodeValue < 1){
							$this->set('Mois_Debut_Prelevement', (date('m') + 1));			
					}
					
					if($attrName == 'pays_naissance'){
						if(trim($attrNode->nodeValue) == ''){
							$this->set('pays_naissance', 'France');
						}
					}
				
					if($attrName == 'nationalite'){
						if(trim($attrNode->nodeValue) == ''){
							$this->set('nationalite', 'France');
						}
					}
				}
			}	
					
		}
	}
	
	function pre_aff_pdf($id, $send_mail=false){
		$req = '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef">
		<select>
			<node expr="@id" alias="@id"/>
			<node expr="[infos_individu/@ville_naissance]" alias="@ville_naissance"/>
			<node expr="[infos_individu/@statut_particulier]" alias="@statut_particulier"/>
			<node expr="[infos_individu/@situation_professionnelle_id]" alias="@situation_professionnelle_id"/>
			<node expr="[infos_individu/@situation_familiale_id]" alias="@situation_familiale_id"/>
			<node expr="[infos_individu/@firstName]" alias="@firstName"/>
			<node expr="[infos_individu/@lastName]" alias="@lastName"/>
			<node expr="[infos_individu/@pays_naissance]" alias="@pays_naissance"/>
			<node expr="[infos_individu/@nationalite]" alias="@nationalite"/>
			<node expr="[infos_individu/@num_insee]" alias="@num_insee"/>
			<node expr="[infos_individu/@nom_naissance]" alias="@nom_naissance"/>
			<node expr="[infos_individu/@qualite_id]" alias="@qualite_id"/>
			<node expr="[infos_individu/@dept_naissance]" alias="@dept_naissance"/>
			<node expr="[infos_individu/@date_prospect]" alias="@date_prospect"/>
			<node expr="[infos_individu/@tsBirth]" alias="@tsBirth"/>
			<node expr="[infos_individu/@date_deces]" alias="@date_deces"/>
			<node expr="[infos_individu/@categorie_fonctionnaire_id]" alias="@categorie_fonctionnaire_id"/>
			<node expr="[infos_individu/@Residence_Fiscale_Francaise]" alias="@Residence_Fiscale_Francaise"/>
			<node expr="[infos_individu/@Majeur_Protege]" alias="@Majeur_Protege"/>
			<node expr="[infos_individu/@num_partenaire]" alias="@num_partenaire"/>
			
			<node expr="[infos_contrat/@statut_affiliation_id]" alias="@statut_affiliation_id"/>
		
			<node expr="[origine/@origine_id]" alias="@origine_id"/>
			<node expr="[origine/@sous_origine_id]" alias="@sous_origine_id"/>		
			
			<node expr="[adresse-particulier/@adresse_4]" alias="@adresse_4"/>
			<node expr="[adresse-particulier/@code_postal]" alias="@code_postal"/>
			<node expr="[adresse-particulier/@adresse_2]" alias="@adresse_2"/>
			<node expr="[adresse-particulier/@adresse_1]" alias="@adresse_1"/>
			<node expr="[adresse-particulier/@adresse_3]" alias="@adresse_3"/>
			<node expr="[adresse-particulier/@ville]" alias="@ville"/>
			<node expr="[adresse-particulier/@pays]" alias="@pays"/>
			
			
			<node expr="[contactabilite/@smobilephone]" alias="@smobilephone"/>
			<node expr="[contactabilite/@sphone]" alias="@sphone"/>
			<node expr="[contactabilite/@semail]" alias="@semail"/>
			<node expr="[contactabilite/@iblacklist]" alias="@iblacklist"/>
			<node expr="[contactabilite/@date_retour_pnd]" alias="@date_retour_pnd"/>
			<node expr="[contactabilite/@optin_prefon_telephone]" alias="@optin_prefon_telephone"/>
			<node expr="[contactabilite/@optin_prefon_sms]" alias="@optin_prefon_sms"/>
			<node expr="[contactabilite/@optin_prefon_email]" alias="@optin_prefon_email"/>
			<node expr="[contactabilite/@optin_prefon_courrier]" alias="@optin_prefon_courrier"/>
			<node expr="[contactabilite/@optin_partenaires]" alias="@optin_partenaires"/>
			<node expr="[contactabilite/@Libelle_Autre_Statut_Affiliation]" alias="@Libelle_Autre_Statut_Affiliation"/>
			
			<node expr="[conjoint/infos_individu/@lastName]" alias="@lastName_conjoint"/>
			<node expr="[conjoint/infos_individu/@firstName]" alias="@firstName_conjoint"/>
			<node expr="[conjoint/infos_individu/@num_cotisant]" alias="@num_cotisant_conjoint"/>
			
			<node expr="[particulier_data-particulier/@Administration_Nom]" alias="@Administration_Nom"/>
			<node expr="[particulier_data-particulier/@Administration_Adresse_1]" alias="@Administration_Adresse_1"/>
			<node expr="[particulier_data-particulier/@Administration_Adresse_2]" alias="@Administration_Adresse_2"/>
			<node expr="[particulier_data-particulier/@Administration_Adresse_3]" alias="@Administration_Adresse_3"/>
			<node expr="[particulier_data-particulier/@Administration_Adresse_4]" alias="@Administration_Adresse_4"/>
			<node expr="[particulier_data-particulier/@Administration_CP]" alias="@Administration_CP"/>
			<node expr="[particulier_data-particulier/@Administration_Ville]" alias="@Administration_Ville"/>
			<node expr="[particulier_data-particulier/@Administration_Pays]" alias="@Administration_Pays"/>
			
			<node expr="[presouscription-particulier/@Classe_Cotisation]" alias="@Classe_Cotisation"/>
			<node expr="[presouscription-particulier/@MODE_REGLEMENT_RETRAITE_COTISANT_Id]" alias="@MODE_REGLEMENT_RETRAITE_COTISANT_Id"/>
			<node expr="[presouscription-particulier/@Mois_Debut_Prelevement]" alias="@Mois_Debut_Prelevement"/>
			<node expr="[presouscription-particulier/@Montant_Cotisation_Annuelle]" alias="@Montant_Cotisation_Annuelle"/>
			<node expr="[presouscription-particulier/@Transfert_Contrat]" alias="@Transfert_Contrat"/>
			<node expr="[presouscription-particulier/@Montant_Versement_Exceptionnel]" alias="@Montant_Versement_Exceptionnel"/>
			<node expr="[presouscription-particulier/@Nb_Annees_Rachat]" alias="@Nb_Annees_Rachat"/>
			<node expr="[presouscription-particulier/@Reversion]" alias="@Reversion"/>
			<node expr="[presouscription-particulier/@Mandat_IBAN]" alias="@Mandat_IBAN"/>
			<node expr="[presouscription-particulier/@Mandat_BIC]" alias="@Mandat_BIC"/>
			<node expr="[presouscription-particulier/@Reversion_Conjoint]" alias="@Reversion_Conjoint"/>
			<node expr="[presouscription-particulier/@Reversion_Beneficiaire_Nom]" alias="@Reversion_Beneficiaire_Nom"/>
			<node expr="[presouscription-particulier/@Reversion_Beneficiaire_Prenom]" alias="@Reversion_Beneficiaire_Prenom"/>
			<node expr="[presouscription-particulier/@Reversion_Beneficiaire_Date_Naissance]" alias="@Reversion_Beneficiaire_Date_Naissance"/>
			
		</select>
			<where><condition expr="@id = '.$id.'"/></where>
		</queryDef>';
		
		$this->request->data = new stdClass();
		$this->loadModel('XtkQueryDef');
		$this->request->data->dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req);
		
		if($this->request->data->dom->getElementsByTagName('recipient')->item(0) != null)
			pdf::pre_aff($this->request->data->dom->getElementsByTagName('recipient')->item(0), $send_mail);
		else
			$this->redirect('recipient/pre_aff/'. $id);
	}
	
	function pre_aff_unset($id){
		if(isset($id)){
			if(isset($_SESSION[$id.'_pre_aff_post'])){
				unset($_SESSION[$id.'_pre_aff_post']);
				$this->redirect('recipient/pre_aff/'. $id);
			}
		}
	}
	
	function events($id=null){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		if(isset($_SESSION[$id.'_pre_aff_post'])){
			unset($_SESSION[$id.'_pre_aff_post']);
		}
		
		if($this->request->data){
			
			if(isset($_SESSION['date_debut_evenement']) || isset($_SESSION['date_fin_evenement'])){
				unset($_SESSION['date_debut_evenement']);
				unset($_SESSION['date_fin_evenement']);	
			}
			
			
			$filter = '';
			
			if(isset($this->request->data->date_debut_evenement) && strlen($this->request->data->date_debut_evenement) == 10){
				$filter .= '<condition expr="@Date_Evenement &gt;= #' . lof::convertDateToAdobeFormat($this->request->data->date_debut_evenement) . '#"/>';
				$_SESSION['date_debut_evenement'] = $this->request->data->date_debut_evenement;
			}
			
			if(isset($this->request->data->date_fin_evenement) && strlen($this->request->data->date_fin_evenement) == 10){
				$filter .= '<condition expr="@Date_Evenement &lt;= #' . lof::convertDateToAdobeFormat($this->request->data->date_fin_evenement) . '#"/>';
				$_SESSION['date_fin_evenement'] = $this->request->data->date_fin_evenement;
			}
			
			$req = '<queryDef operation="select" schema="pre:evenement" xtkschema="xtk:queryDef">
			<select>
				<node expr="@id" alias="@id"/>
				<node expr="@Date_Evenement" alias="@Date_Evenement"/>
				<node expr="@LIEU_Id" alias="@LIEU_Id"/>
				<node expr="@CONSEILLER" alias="@CONSEILLER"/>
				<node expr="@MODE_EVENEMENT_Id" alias="@MODE_EVENEMENT_Id"/>
				<node expr="@MOTIF_EVENEMENT_Id" alias="@MOTIF_EVENEMENT_Id"/>
				<node expr="@EnvoyerKitAffiliation" alias="@EnvoyerKitAffiliation"/>
				<node expr="@RESULTAT_EVENEMENT_Id" alias="@RESULTAT_EVENEMENT_Id"/>
				<node expr="@Date_Rappel" alias="@Date_Rappel"/>
				<node expr="Commentaire" alias="Commentaire"/>
	
			</select>
				<where>
					<condition expr="@particulier_id = '. $id .'"/>
					' . $filter . '
				</where>
				<orderBy><node expr="@Date_Evenement" sortDesc="true"/></orderBy>
			</queryDef>';
			
			$reqParticulier = '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef">
			<select>
				<node expr="@created" alias="@created"/>
				<node expr="@lastModified" alias="@lastModified"/>
				<node expr="[infos_individu/@conseiller]" alias="@conseiller_creation"/>
				<node expr="[infos_individu/@statut_particulier]" alias="@statut_particulier"/>
				<node expr="[infos_individu/@sous_statut]" alias="@sous_statut"/>
				<node expr="[infos_individu/@firstName]" alias="@firstName"/>
				<node expr="[infos_individu/@lastName]" alias="@lastName"/>
				<node expr="[infos_individu/@qualite_id]" alias="@qualite_id"/>
				<node expr="[infos_individu/@tsBirth]" alias="@tsBirth"/>
				
				<node expr="[adresse-particulier/@code_postal]" alias="@code_postal"/>
				
			</select>
				<where><condition expr="@id = '.$id.'"/></where>
			</queryDef>';
			
			$reqScores = '<queryDef operation="select" schema="pre:scoring" xtkschema="xtk:queryDef">
			<select>
				<node expr="@code_score" alias="@code_score"/>
				<node expr="@valeur_score" alias="@valeur_score"/>

			</select>
				<where><condition expr="@particulier_id = '.$id.'"/></where>
			</queryDef>';
			
			$reqPointsAcquis = '<queryDef operation="select" schema="pre:contrat" xtkschema="xtk:queryDef">
			<select>
				<node expr="[identification/@idcontrat]" alias="@idcontrat"/>
				<node expr="[contrat_retraite_cotisant/@points_acquis_bruts]" alias="@points_acquis_bruts"/>
			</select>
				<where>
					<condition expr="[identification/@particulier_id] = '.$id.'"/>
					<condition expr="[identification/@nature_contrat_id] = 1"/>
				</where>
			</queryDef>';
			
			$this->request->data = new stdClass();
			$this->loadModel('XtkQueryDef');
			$this->request->data->dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req);
			$this->request->data->domParticulier = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqParticulier);
			$this->request->data->domScores = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqScores);
			$this->request->data->domPointsAcquis = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqPointsAcquis);
			
			if(!$this->request->data->dom){
				echo 'erreur de la requête ';
				exit();
			}
			
			foreach($this->request->data->domParticulier->getElementsByTagName('recipient') as $particulier){			
				foreach($particulier->attributes as $attrName => $attrNode){
					$this->set($attrName, $attrNode->nodeValue);
				}
			}
			
			foreach($this->request->data->domPointsAcquis->getElementsByTagName('contrat') as $cont){
				foreach($cont->attributes as $attrName => $attrNode){
						$this->set($attrName, $attrNode->nodeValue);
				}
			}
			
		} else{
			$req = '<queryDef operation="select" schema="pre:evenement" xtkschema="xtk:queryDef">
			<select>
				<node expr="@id" alias="@id"/>
				<node expr="@Date_Evenement" alias="@Date_Evenement"/>
				<node expr="@LIEU_Id" alias="@LIEU_Id"/>
				<node expr="@CONSEILLER" alias="@CONSEILLER"/>
				<node expr="@MODE_EVENEMENT_Id" alias="@MODE_EVENEMENT_Id"/>
				<node expr="@MOTIF_EVENEMENT_Id" alias="@MOTIF_EVENEMENT_Id"/>
				<node expr="@EnvoyerKitAffiliation" alias="@EnvoyerKitAffiliation"/>
				<node expr="@RESULTAT_EVENEMENT_Id" alias="@RESULTAT_EVENEMENT_Id"/>
				<node expr="@Date_Rappel" alias="@Date_Rappel"/>
				<node expr="Commentaire" alias="Commentaire"/>
	
			</select>
				<where><condition expr="@particulier_id = '.$id.'"/></where>
				<orderBy><node expr="@Date_Evenement" sortDesc="true"/></orderBy>
			</queryDef>';
			
			$reqParticulier = '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef">
			<select>
				<node expr="@created" alias="@created"/>
				<node expr="@lastModified" alias="@lastModified"/>
				<node expr="[infos_individu/@conseiller]" alias="@conseiller_creation"/>
				<node expr="[infos_individu/@statut_particulier]" alias="@statut_particulier"/>
				<node expr="[infos_individu/@sous_statut]" alias="@sous_statut"/>
				<node expr="[infos_individu/@firstName]" alias="@firstName"/>
				<node expr="[infos_individu/@lastName]" alias="@lastName"/>
				<node expr="[infos_individu/@qualite_id]" alias="@qualite_id"/>
				<node expr="[infos_individu/@tsBirth]" alias="@tsBirth"/>
				
				<node expr="[adresse-particulier/@code_postal]" alias="@code_postal"/>
				
			</select>
				<where><condition expr="@id = '.$id.'"/></where>
			</queryDef>';
			
			$reqScores = '<queryDef operation="select" schema="pre:scoring" xtkschema="xtk:queryDef">
			<select>
				<node expr="@code_score" alias="@code_score"/>
				<node expr="@valeur_score" alias="@valeur_score"/>

			</select>
				<where><condition expr="@particulier_id = '.$id.'"/></where>
			</queryDef>';
			
			$reqPointsAcquis = '<queryDef operation="select" schema="pre:contrat" xtkschema="xtk:queryDef">
			<select>
				<node expr="[identification/@idcontrat]" alias="@idcontrat"/>
				<node expr="[contrat_retraite_cotisant/@points_acquis_bruts]" alias="@points_acquis_bruts"/>
			</select>
				<where>
					<condition expr="[identification/@particulier_id] = '.$id.'"/>
					<condition expr="[identification/@nature_contrat_id] = 1"/>
				</where>
			</queryDef>';
			
			$this->request->data = new stdClass();
			$this->loadModel('XtkQueryDef');
			$this->request->data->dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req);
			$this->request->data->domParticulier = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqParticulier);
			$this->request->data->domScores = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqScores);
			$this->request->data->domPointsAcquis = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqPointsAcquis);
			
			
			foreach($this->request->data->domParticulier->getElementsByTagName('recipient') as $particulier){			
				foreach($particulier->attributes as $attrName => $attrNode){
					$this->set($attrName, $attrNode->nodeValue);
				}
			}
			
			foreach($this->request->data->domPointsAcquis->getElementsByTagName('contrat') as $cont){
				foreach($cont->attributes as $attrName => $attrNode){
						$this->set($attrName, $attrNode->nodeValue);
				}
			}
			
			if(!$this->request->data->dom){
				echo 'erreur de la requête ';
				exit();
			}
			
			
		}	
	}
	
	function add_event($id=null){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		if($this->request->data){

				if(strlen($this->request->data->mail_saisi) > 6){
					$reqUpdateMail = '<recipient xtkschema="nms:recipient" id="'. $id .'" _key="@id"  _operation="update">
					<contactabilite
						semail="'. $this->request->data->mail_saisi .'"
					/>
					</recipient>';

					$this->loadModel('XtkSession');
					$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $reqUpdateMail);
				}
				
				
				// Lancement workflow
				if(isset($this->request->data->EnvoyerKitAffiliation) && $this->request->data->EnvoyerKitAffiliation == "1"){
					$this->loadModel('XtkWorkflow');
					$this->XtkWorkflow->PostEvent($this->Session->read('header'), $this->Session->read('sessionToken'),'pre_camp_recur_envoi_email_pack_souscription','signal','','<variables recipientid=\''. $id .'\'/>',false);	
				}
				
				
				
				$reqEntretien ='';
				if(isset($this->request->data->envoyer_mail) && $this->request->data->envoyer_mail){
					// récupérer 
					$reqEntretien .= '
					TRANSCO_ENUM_Theme_entretien_Id_1="'.$this->request->data->theme_entretien_1.'"
					TRANSCO_ENUM_Theme_entretien_Id_2="'.$this->request->data->theme_entretien_2.'"
					TRANSCO_ENUM_Theme_entretien_Id_3="'.$this->request->data->theme_entretien_3.'"
					';	
					
				$this->loadModel('XtkWorkflow');
				$this->XtkWorkflow->PostEvent($this->Session->read('header'), $this->Session->read('sessionToken'),'pre_camp_recur_cr_entretien','signal','','<variables recipientid=\''. $id .'\' theme1=\''. $this->request->data->theme_entretien_1 .'\' theme2=\''. $this->request->data->theme_entretien_2 .'\' theme3=\''. $this->request->data->theme_entretien_3 .'\'/>',false);	
				}
				
				
				// requête d'ajout d'évènement
				$req = '<evenement xtkschema="pre:evenement"  _operation="insert"
							Date_Evenement="'. date('Y-m-d H:i:s')  .'"
							LIEU_Id="'.$this->request->data->LIEU_Id.'"
							CONSEILLER="'. $_SESSION['conseillerEnLigne']['label'].'"
							MODE_EVENEMENT_Id="'. $this->request->data->MODE_EVENEMENT_Id .'"
							MOTIF_EVENEMENT_Id="'.$this->request->data->MOTIF_EVENEMENT_Id.'"
							EnvoyerKitAffiliation="'.$this->request->data->EnvoyerKitAffiliation.'"
							envoi_courrier="'.$this->request->data->envoi_courrier.'"
							RESULTAT_EVENEMENT_Id="'.$this->request->data->RESULTAT_EVENEMENT_Id.'"
							Date_Rappel="'. lof::convertDateToAdobeFormat(trim($this->request->data->Date_Rappel)) .'"
							particulier_id="'. $id .'"
							' . $reqEntretien . '
						>
						<Commentaire>'.trim($this->request->data->Commentaire). '</Commentaire>
						
						</evenement>';
				$this->loadModel('XtkSession');
				$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req);

				if($res){
					$this->redirect('recipient/events/'. $id);
				}
				
	
				
			}else{
				if(isset($_SESSION[$id.'_pre_aff_post'])){
					$this->pre_aff_pdf($id, true);
					$this->loadModel('XtkSession');
					$req = '<presouscription xtkschema="pre:presouscription" PARTICULIER_Id="'. $id .'" _key="@PARTICULIER_Id"  _operation="insertOrUpdate" 
						Date_Envoi_Email="' . date('Y/m/d H:i:s') . '"									
					/>';
					$req2 = '<recipient xtkschema="nms:recipient" id="'. $id .'" _key="@id"  _operation="insertOrUpdate">
						<infos_individu
						sous_statut="5"
						/>
						</recipient>';
					
					
					$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req);
					$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req2);
					if($res){
						$this->set('LIEU_Id', $_SESSION['conseillerEnLigne']['lieu_evenement']);
						$this->set('MODE_EVENEMENT_Id', $_SESSION['conseillerEnLigne']['mode_evenement']);
						$this->set('MOTIF_EVENEMENT_Id', '3');
						$this->set('RESULTAT_EVENEMENT_Id', '7');
					}else{
						$this->redirect('recipient/pre-aff/'. $id);
					}
				}else{
						$this->set('LIEU_Id', $_SESSION['conseillerEnLigne']['lieu_evenement']);
						$this->set('MODE_EVENEMENT_Id', $_SESSION['conseillerEnLigne']['mode_evenement']);
						
					if($_SESSION['conseillerEnLigne']['partenaires'] == 1239){
						$this->set('LIEU_Id', '9');
					}
						
				}
				
				
				$reqParticulier = '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef">
				<select>
					<node expr="@created" alias="@created"/>
					<node expr="@lastModified" alias="@lastModified"/>
					<node expr="[infos_individu/@conseiller]" alias="@conseiller_creation"/>
					<node expr="[infos_individu/@statut_particulier]" alias="@statut_particulier"/>
					<node expr="[infos_individu/@sous_statut]" alias="@sous_statut"/>
					<node expr="[infos_individu/@firstName]" alias="@firstName"/>
					<node expr="[infos_individu/@lastName]" alias="@lastName"/>
					<node expr="[infos_individu/@qualite_id]" alias="@qualite_id"/>
					<node expr="[infos_individu/@tsBirth]" alias="@tsBirth"/>
					<node expr="[contactabilite/@semail]" alias="@semail"/>
					<node expr="[adresse-particulier/@code_postal]" alias="@code_postal"/>
					
				</select>
					<where><condition expr="@id = '.$id.'"/></where>
				</queryDef>';
				
				$reqScores = '<queryDef operation="select" schema="pre:scoring" xtkschema="xtk:queryDef">
				<select>
					<node expr="@code_score" alias="@code_score"/>
					<node expr="@valeur_score" alias="@valeur_score"/>

				</select>
					<where><condition expr="@particulier_id = '.$id.'"/></where>
				</queryDef>';
				
				$reqPointsAcquis = '<queryDef operation="select" schema="pre:contrat" xtkschema="xtk:queryDef">
				<select>
					<node expr="[identification/@idcontrat]" alias="@idcontrat"/>
					<node expr="[contrat_retraite_cotisant/@points_acquis_bruts]" alias="@points_acquis_bruts"/>
				</select>
					<where>
						<condition expr="[identification/@particulier_id] = '.$id.'"/>
						<condition expr="[identification/@nature_contrat_id] = 1"/>
					</where>
				</queryDef>';
				
				
				$this->request->data = new stdClass();
				$this->loadModel('XtkQueryDef');
				$this->request->data->domParticulier = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqParticulier);
				$this->request->data->domScores = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqScores);
				$this->request->data->domPointsAcquis = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqPointsAcquis);
				
				foreach($this->request->data->domParticulier->getElementsByTagName('recipient') as $particulier){			
					foreach($particulier->attributes as $attrName => $attrNode){
						$this->set($attrName, $attrNode->nodeValue);
					}
				}

				foreach($this->request->data->domPointsAcquis->getElementsByTagName('contrat') as $cont){
					foreach($cont->attributes as $attrName => $attrNode){
							$this->set($attrName, $attrNode->nodeValue);
					}
				}				
				
		}
	}
	
	function add_event_pre_aff($id=null){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		if($this->request->data){
			
				if(strlen($this->request->data->mail_saisi) > 6){
					$reqUpdateMail = '<recipient xtkschema="nms:recipient" id="'. $id .'" _key="@id"  _operation="update">
					<contactabilite
						semail="'. trim($this->request->data->mail_saisi) .'"
					/>
					</recipient>';

					$this->loadModel('XtkSession');
					$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $reqUpdateMail);
				}
				
				
				// Lancement workflow
				if(isset($this->request->data->EnvoyerKitAffiliation) && $this->request->data->EnvoyerKitAffiliation == "1"){
					$this->loadModel('XtkWorkflow');
					$this->XtkWorkflow->PostEvent($this->Session->read('header'), $this->Session->read('sessionToken'),'pre_camp_recur_envoi_email_pack_souscription','signal','','<variables recipientid=\''. $id .'\'/>',false);	
				}
				
				
				
				$reqEntretien ='';
				if(isset($this->request->data->envoyer_mail) && $this->request->data->envoyer_mail){
					// récupérer 
					$reqEntretien .= '
					TRANSCO_ENUM_Theme_entretien_Id_1="'.$this->request->data->theme_entretien_1.'"
					TRANSCO_ENUM_Theme_entretien_Id_2="'.$this->request->data->theme_entretien_2.'"
					TRANSCO_ENUM_Theme_entretien_Id_3="'.$this->request->data->theme_entretien_3.'"
					';	
					
				$this->loadModel('XtkWorkflow');
				$this->XtkWorkflow->PostEvent($this->Session->read('header'), $this->Session->read('sessionToken'),'pre_camp_recur_cr_entretien','signal','','<variables recipientid=\''. $id .'\' theme1=\''. $this->request->data->theme_entretien_1 .'\' theme2=\''. $this->request->data->theme_entretien_2 .'\' theme3=\''. $this->request->data->theme_entretien_3 .'\'/>',false);	
				}		
	
				$req = '<evenement xtkschema="pre:evenement"  _operation="insert"
					Date_Evenement="'. date('Y-m-d H:i:s')  .'"
					LIEU_Id="'.$this->request->data->LIEU_Id.'"
					CONSEILLER="'. $_SESSION['conseillerEnLigne']['label'].'"
					MODE_EVENEMENT_Id="'. $this->request->data->MODE_EVENEMENT_Id .'"
					MOTIF_EVENEMENT_Id="'.$this->request->data->MOTIF_EVENEMENT_Id.'"
					EnvoyerKitAffiliation="'.$this->request->data->EnvoyerKitAffiliation.'"
					envoi_courrier="'.$this->request->data->envoi_courrier.'"
					
					RESULTAT_EVENEMENT_Id="'.$this->request->data->RESULTAT_EVENEMENT_Id.'"
					Date_Rappel="'. lof::convertDateToAdobeFormat($this->request->data->Date_Rappel) .'"
					particulier_id="'. $id .'"
					' . $reqEntretien . '
				>
					<Commentaire>'.trim($this->request->data->Commentaire) . '</Commentaire>
				
					</evenement>';
				
			
			
			$this->loadModel('XtkSession');
			$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req);
			if($res){
				unset($_SESSION[$id.'_pre_aff_post']);
				$this->redirect('recipient/events/'. $id);
			}
		}
	}
	
	
	
	
	
	
	
	function edit_event($particulier_id, $event_id){	
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		if(isset($_SESSION[$particulier_id.'_pre_aff_post'])){
			unset($_SESSION[$particulier_id.'_pre_aff_post']);
		}
		
		if($this->request->data){
			$req = '<evenement xtkschema="pre:evenement" id="' . $event_id . '" _key="@id" _operation="update"
			LIEU_Id="'.$this->request->data->LIEU_Id.'"
			MODE_EVENEMENT_Id="'. $this->request->data->MODE_EVENEMENT_Id .'"
			MOTIF_EVENEMENT_Id="'.$this->request->data->MOTIF_EVENEMENT_Id.'"
			EnvoyerKitAffiliation="'.$this->request->data->EnvoyerKitAffiliation.'"
			envoi_courrier="'.$this->request->data->envoi_courrier.'"
			RESULTAT_EVENEMENT_Id="'.$this->request->data->RESULTAT_EVENEMENT_Id.'"
			Date_Rappel="'. lof::convertDateToAdobeFormat($this->request->data->Date_Rappel) .'"';
			
			if($this->request->data->MOTIF_EVENEMENT_Id == 7){
				
				if(isset($this->request->data->Code_Campagne) &&  strlen(trim($this->request->data->Code_Campagne)) > 0){
					$req .= ' Code_Campagne="'.trim($this->request->data->Code_Campagne).'"';
				}
				
				if(isset($this->request->data->Montant_Versement) &&  floatval(trim($this->request->data->Montant_Versement)) > 0){
					$req .= ' Montant_Versement="'.floatval(str_replace(' ', '',  str_replace(',', '.', trim($this->request->data->Montant_Versement)))).'"';
				}
				
				if(isset($this->request->data->Nb_Annees_Rachat) && intval(trim($this->request->data->Nb_Annees_Rachat)) > 0){
					$req .= ' Nb_Annees_Rachat="'.floatval(str_replace(' ', '',  str_replace(',', '.', trim($this->request->data->Nb_Annees_Rachat)))).'"';
				}
				
				if(isset($this->request->data->Classe_Actuelle) && intval(trim($this->request->data->Classe_Actuelle)) > 0){
					$req .= ' Classe_Actuelle="'.floatval(str_replace(' ', '',  str_replace(',', '.',trim($this->request->data->Classe_Actuelle)))).'"';
				}
				
				if(isset($this->request->data->Classe_Nouvelle) && intval(trim($this->request->data->Classe_Nouvelle)) > 0){
					$req .= ' Classe_Nouvelle="'.floatval(str_replace(' ', '',  str_replace(',', '.', trim($this->request->data->Classe_Nouvelle)))).'"';
				}
				
			}
			
			$req .='>
			<Commentaire>'.trim($this->request->data->Commentaire) . '</Commentaire>
			</evenement>';
			
			$this->loadModel('XtkSession');
			$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req);
			$this->redirect('recipient/events/' . $particulier_id);
			
		} else {
			$req = '<queryDef operation="select" schema="pre:evenement" xtkschema="xtk:queryDef">
			<select>
				<node expr="@Date_Evenement" alias="@Date_Evenement"/>
				<node expr="@LIEU_Id" alias="@LIEU_Id"/>
				<node expr="@CONSEILLER" alias="@CONSEILLER"/>
				<node expr="@MODE_EVENEMENT_Id" alias="@MODE_EVENEMENT_Id"/>
				<node expr="@MOTIF_EVENEMENT_Id" alias="@MOTIF_EVENEMENT_Id"/>
				<node expr="@EnvoyerKitAffiliation" alias="@EnvoyerKitAffiliation"/>
				<node expr="@RESULTAT_EVENEMENT_Id" alias="@RESULTAT_EVENEMENT_Id"/>
				<node expr="@Date_Rappel" alias="@Date_Rappel"/>
				<node expr="@envoi_courrier" alias="@envoi_courrier"/>
				<node expr="Commentaire" alias="Commentaire"/>
				
				<node expr="sous_resultat_apso" alias="sous_resultat_apso"/>
				
				<node expr="@TRANSCO_ENUM_Theme_entretien_Id_1" alias="@TRANSCO_ENUM_Theme_entretien_Id_1"/>
				<node expr="@TRANSCO_ENUM_Theme_entretien_Id_2" alias="@TRANSCO_ENUM_Theme_entretien_Id_2"/>
				<node expr="@TRANSCO_ENUM_Theme_entretien_Id_3" alias="@TRANSCO_ENUM_Theme_entretien_Id_3"/>
				
				<node expr="@TRANSCO_ENUM_Type_formulaire_web" alias="@TRANSCO_ENUM_Type_formulaire_web"/>
				<node expr="@Type_espace_web" alias="@Type_espace_web"/>
				<node expr="@Type_Landing_Page" alias="@Type_Landing_Page"/>
				<node expr="@Code_Campagne" alias="@Code_Campagne"/>
				<node expr="@Etape_Souscription_Web" alias="@Etape_Souscription_Web"/>
				
				<node expr="@Num_Demande" alias="@Num_Demande"/>
				<node expr="@TRANSCO_ENUM_Type_demande" alias="@TRANSCO_ENUM_Type_demande"/>
				<node expr="@TRANSCO_ENUM_Processus_Gestion_Demande" alias="@TRANSCO_ENUM_Processus_Gestion_Demande"/>
				<node expr="@TRANSCO_ENUM_Statut_demande" alias="@TRANSCO_ENUM_Statut_demande"/>
				<node expr="@Date_Cloture_Demande" alias="@Date_Cloture_Demande"/>
				<node expr="@TRANSCO_ENUM_Motif_Cloture_Demande" alias="@TRANSCO_ENUM_Motif_Cloture_Demande"/>
				
				<node expr="@Montant_Versement" alias="@Montant_Versement"/>
				<node expr="@Nb_Annees_Rachat" alias="@Nb_Annees_Rachat"/>
				<node expr="@Classe_Actuelle" alias="@Classe_Actuelle"/>
				<node expr="@Classe_Nouvelle" alias="@Classe_Nouvelle"/>
				
			</select>
				<where><condition expr="@id = '.$event_id.'"/></where>
			</queryDef>';
			
			$reqParticulier = '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef">
			<select>
				<node expr="@created" alias="@created"/>
				<node expr="@lastModified" alias="@lastModified"/>
				<node expr="[infos_individu/@conseiller]" alias="@conseiller_creation"/>
				<node expr="[infos_individu/@statut_particulier]" alias="@statut_particulier"/>
				<node expr="[infos_individu/@sous_statut]" alias="@sous_statut"/>
				<node expr="[infos_individu/@firstName]" alias="@firstName"/>
				<node expr="[infos_individu/@lastName]" alias="@lastName"/>
				<node expr="[infos_individu/@qualite_id]" alias="@qualite_id"/>
				<node expr="[infos_individu/@tsBirth]" alias="@tsBirth"/>
				
				<node expr="[adresse-particulier/@code_postal]" alias="@code_postal"/>
				
			</select>
				<where><condition expr="@id = '.$particulier_id.'"/></where>
			</queryDef>';
			
			$reqScores = '<queryDef operation="select" schema="pre:scoring" xtkschema="xtk:queryDef">
			<select>
				<node expr="@code_score" alias="@code_score"/>
				<node expr="@valeur_score" alias="@valeur_score"/>

			</select>
				<where><condition expr="@particulier_id = '.$particulier_id.'"/></where>
			</queryDef>';
				
			$reqPointsAcquis = '<queryDef operation="select" schema="pre:contrat" xtkschema="xtk:queryDef">
			<select>
				<node expr="[identification/@idcontrat]" alias="@idcontrat"/>
				<node expr="[contrat_retraite_cotisant/@points_acquis_bruts]" alias="@points_acquis_bruts"/>
			</select>
				<where>
					<condition expr="[identification/@particulier_id] = '.$particulier_id.'"/>
					<condition expr="[identification/@nature_contrat_id] = 1"/>
				</where>
			</queryDef>';

				

			
			
			$this->request->data = new stdClass();
			$this->loadModel('XtkQueryDef');
			$this->request->data->dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req);
			$this->request->data->domParticulier = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqParticulier);
			$this->request->data->domScores = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqScores);
			$this->request->data->domPointsAcquis = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqPointsAcquis);
			if(!$this->request->data->dom){
				echo 'erreur de la requête ';
				exit();
			}
			
			
			foreach($this->request->data->dom->getElementsByTagName('evenement') as $even){			
				foreach($even->attributes as $attrName => $attrNode){
					$this->set($attrName, $attrNode->nodeValue);
				}

				foreach($even->getElementsByTagName('Commentaire') as $com){
					$this->set('Commentaire', $com->nodeValue);
				}

				foreach($even->getElementsByTagName('sous_resultat_apso') as $sous_res){
					$this->set('sous_resultat_apso', $sous_res->nodeValue);
				}					
			}

			foreach($this->request->data->domParticulier->getElementsByTagName('recipient') as $particulier){			
				foreach($particulier->attributes as $attrName => $attrNode){
					$this->set($attrName, $attrNode->nodeValue);
				}
			}
			
			foreach($this->request->data->domPointsAcquis->getElementsByTagName('contrat') as $cont){
				foreach($cont->attributes as $attrName => $attrNode){
						$this->set($attrName, $attrNode->nodeValue);
				}
			}
			
		}
	}	
	
	
	
	
	
	
	
	
	function contracts($particulier_id){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		if(isset($_SESSION[$particulier_id.'_pre_aff_post'])){
			unset($_SESSION[$particulier_id.'_pre_aff_post']);
		}
		
		if(isset($particulier_id)){
			$req = '<queryDef operation="select" schema="pre:contrat" xtkschema="xtk:queryDef">
			<select>
				<node expr="@id" alias="@id"/>
				<node expr="@montant_rente_allocataire" alias="@montant_rente_allocataire"/>
				<node expr="@sous_statut" alias="@sous_statut"/>
				<node expr="[identification/@num_contrat]" alias="@num_contrat"/>
				<node expr="[identification/@num_contrat_allocataire]" alias="@num_contrat_allocataire"/>
				<node expr="[identification/@idcontrat]" alias="@idcontrat"/>
				<node expr="[identification/@nature_contrat_id]" alias="@nature_contrat_id"/>
				<node expr="[identification/@date_souscription]" alias="@date_souscription"/>
				<node expr="[contrat_retraite_cotisant/@statut_retraite_cotisant_id]" alias="@statut_retraite_cotisant_id"/>
				<node expr="[contrat_retraite_cotisant/@date_liquidation]" alias="@date_liquidation"/>
				<node expr="[contrat_retraite_cotisant/@reversion]" alias="@reversion"/>
				<node expr="[contrat_retraite_cotisant/@points_acquis_bruts]" alias="@points_acquis_bruts"/>
				


	
			</select>
				<where><condition expr="[identification/@particulier_id] = '.$particulier_id.'"/></where>
			</queryDef>';
			
			// Les deux derniers événements
			$reqLastEvents = '<queryDef operation="select" schema="pre:evenement" xtkschema="xtk:queryDef" lineCount="2">
			<select>
				<node expr="@Date_Evenement" alias="@Date_Evenement"/>
				<node expr="@MODE_EVENEMENT_Id" alias="@MODE_EVENEMENT_Id"/>
				<node expr="@MOTIF_EVENEMENT_Id" alias="@MOTIF_EVENEMENT_Id"/>
	
			</select>
				<where><condition expr="@particulier_id = '.$particulier_id.'"/></where>
				<orderBy><node expr="@Date_Evenement" sortDesc="true"/></orderBy>
			</queryDef>';
			
			$reqParticulier = '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef">
			<select>
				<node expr="@created" alias="@created"/>
				<node expr="@lastModified" alias="@lastModified"/>
				<node expr="[infos_individu/@conseiller]" alias="@conseiller_creation"/>
				<node expr="[infos_individu/@statut_particulier]" alias="@statut_particulier"/>
				<node expr="[infos_individu/@sous_statut]" alias="@sous_statut"/>
				<node expr="[infos_individu/@firstName]" alias="@firstName"/>
				<node expr="[infos_individu/@lastName]" alias="@lastName"/>
				<node expr="[infos_individu/@qualite_id]" alias="@qualite_id"/>
				<node expr="[infos_individu/@tsBirth]" alias="@tsBirth"/>
				
				<node expr="[adresse-particulier/@code_postal]" alias="@code_postal"/>
				
			</select>
				<where><condition expr="@id = '.$particulier_id.'"/></where>
			</queryDef>';
			
			$reqScores = '<queryDef operation="select" schema="pre:scoring" xtkschema="xtk:queryDef">
			<select>
				<node expr="@code_score" alias="@code_score"/>
				<node expr="@valeur_score" alias="@valeur_score"/>

			</select>
				<where><condition expr="@particulier_id = '.$particulier_id.'"/></where>
			</queryDef>';
			
			$reqPointsAcquis = '<queryDef operation="select" schema="pre:contrat" xtkschema="xtk:queryDef">
			<select>
				<node expr="[identification/@idcontrat]" alias="@idcontrat"/>
				<node expr="[contrat_retraite_cotisant/@points_acquis_bruts]" alias="@points_acquis_bruts"/>
			</select>
				<where>
					<condition expr="[identification/@particulier_id] = '.$particulier_id.'"/>
					<condition expr="[identification/@nature_contrat_id] = 1"/>
				</where>
			</queryDef>';
			
			
			$this->request->data = new stdClass();
			$this->loadModel('XtkQueryDef');
			$this->request->data->dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req);
			$this->request->data->domLastEvents = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqLastEvents);
			$this->request->data->domParticulier = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqParticulier);
			$this->request->data->domScores = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqScores);
			$this->request->data->domPointsAcquis = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqPointsAcquis);
			
			if(!$this->request->data->dom){
				echo 'erreur de la requête ';
				exit();
			}
			
			foreach($this->request->data->domParticulier->getElementsByTagName('recipient') as $particulier){			
				foreach($particulier->attributes as $attrName => $attrNode){
					$this->set($attrName, $attrNode->nodeValue);
				}
			}

			foreach($this->request->data->domPointsAcquis->getElementsByTagName('contrat') as $cont){
				foreach($cont->attributes as $attrName => $attrNode){
						$this->set($attrName, $attrNode->nodeValue);
				}
			}

			
		}
	}	
	
	
	
	
	
	
	
	function contract_details($particulier_id, $contrat_id = null){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		if(isset($_SESSION[$particulier_id.'_pre_aff_post'])){
			unset($_SESSION[$particulier_id.'_pre_aff_post']);
		}
			
		if(isset($contrat_id)){
			$req = '<queryDef operation="select" schema="pre:contrat" xtkschema="xtk:queryDef">
			<select>
				<node expr="@id" alias="@id"/>
				<node expr="@age_limite_liquidation" alias="@age_limite_liquidation"/>
				<node expr="@bic_prelevement" alias="@bic_prelevement"/>
				<node expr="@nb_annees_capacite_versement" alias="@nb_annees_capacite_versement"/>
				<node expr="@rib_clef_compte" alias="@rib_clef_compte"/>
				<node expr="@rib_code_banque" alias="@rib_code_banque"/>
				<node expr="@rib_code_guichet" alias="@rib_code_guichet"/>
				<node expr="@collectivite_retraite_cotisant_id" alias="@collectivite_retraite_cotisant_id"/>
				<node expr="@date_maj_adresse_contrat" alias="@date_maj_adresse_contrat"/>
				<node expr="@date_limite_liquidation" alias="@date_limite_liquidation"/>
				<node expr="@reversataire_date_naissance" alias="@reversataire_date_naissance"/>
				<node expr="@date_sortie_contrat_allocataire" alias="@date_sortie_contrat_allocataire"/>
				<node expr="@date_statut_contrat_allocataire" alias="@date_statut_contrat_allocataire"/>
				<node expr="@rib_domiciliation" alias="@rib_domiciliation"/>
				<node expr="@etat_contrat_dependance_id" alias="@etat_contrat_dependance_id"/>
				<node expr="@ifu_dernier_exercice" alias="@ifu_dernier_exercice"/>
				<node expr="@iban_prelevement" alias="@iban_prelevement"/>
				<node expr="@code_reseau_apporteur" alias="@code_reseau_apporteur"/>
				<node expr="@libelle_reseau_apporteur" alias="@libelle_reseau_apporteur"/>
				<node expr="@reversataire_lieu_naissance" alias="@reversataire_lieu_naissance"/>
				<node expr="@majoration_retraite_allocataire_id" alias="@majoration_retraite_allocataire_id"/>
				<node expr="@liquidation_retraite_cotisant_id" alias="@liquidation_retraite_cotisant_id"/>
				<node expr="@montant_capacite_versement" alias="@montant_capacite_versement"/>
				<node expr="@montant_capital" alias="@montant_capital"/>
				<node expr="@ifu_montant_cotisations" alias="@ifu_montant_cotisations"/>
				<node expr="@montant_epargne" alias="@montant_epargne"/>
				<node expr="@montant_garantie_origine" alias="@montant_garantie_origine"/>
				<node expr="@montant_prime_annuelle" alias="@montant_prime_annuelle"/>
				<node expr="@ifu_montant_rachats" alias="@ifu_montant_rachats"/>
				<node expr="@motif_sortie_dependance_id" alias="@motif_sortie_dependance_id"/>
				<node expr="@motif_sortie_retraite_allocataire_id" alias="@motif_sortie_retraite_allocataire_id"/>
				<node expr="@nombre_uc" alias="@nombre_uc"/>
				<node expr="@reversataire_nom" alias="@reversataire_nom"/>
				<node expr="@adresse_npai_o_n" alias="@adresse_npai_o_n"/>
				<node expr="@reversataire_num_adherent" alias="@reversataire_num_adherent"/>
				<node expr="@rib_num_compte" alias="@rib_num_compte"/>
				<node expr="@conjoint_num_contrat" alias="@conjoint_num_contrat"/>
				<node expr="@reversataire_num_contrat" alias="@reversataire_num_contrat"/>
				<node expr="@dependance_retraite_allocataire_id" alias="@dependance_retraite_allocataire_id"/>
				<node expr="@reversion_retraite_allocataire_id" alias="@reversion_retraite_allocataire_id"/>
				<node expr="@abondementpuph" alias="@abondementpuph"/>
				<node expr="@reversataire_prenom" alias="@reversataire_prenom"/>
				<node expr="@periodicite_reglement_retraite_cotisant_id" alias="@periodicite_reglement_retraite_cotisant_id"/>
				<node expr="@montant_rente_allocataire" alias="@montant_rente_allocataire"/>
				<node expr="@rib_prelevement_o_n" alias="@rib_prelevement_o_n"/>
				<node expr="@sous_statut" alias="@sous_statut"/>
				<node expr="@statut_retraite_allocataire_id" alias="@statut_retraite_allocataire_id"/>
				<node expr="@type_compte_retraite_allocataire_id" alias="@type_compte_retraite_allocataire_id"/>
				<node expr="@type_garantie_dependance_id" alias="@type_garantie_dependance_id"/>
				<node expr="@type_prime_obseques_id" alias="@type_prime_obseques_id"/>
				<node expr="@type_rente_retraite_allocataire_id" alias="@type_rente_retraite_allocataire_id"/>
				
				<node expr="[identification/@date_souscription]" alias="@date_souscription"/>
				<node expr="[identification/@idcontrat]" alias="@idcontrat"/>
				<node expr="[identification/@nature_contrat_id]" alias="@nature_contrat_id"/>
				<node expr="[identification/@num_adherent_contrat]" alias="@num_adherent_contrat"/>
				<node expr="[identification/@num_contrat_allocataire]" alias="@num_contrat_allocataire"/>
				<node expr="[identification/@num_contrat]" alias="@num_contrat"/>
				<node expr="[identification/@particulier_id]" alias="@particulier_id"/>
				
				<node expr="[cotisant_cnp/@date_maj_contrat_cotisant]" alias="@date_maj_contrat_cotisant"/>
				<node expr="[cotisant_cnp/@date_naissance_import_cotisant]" alias="@date_naissance_import_cotisant"/>
				<node expr="[cotisant_cnp/@num_transfert_import_cotisant]" alias="@num_transfert_import_cotisant"/>
				
				<node expr="[allocataire_cnp/@date_maj_contrat_allocataire]" alias="@date_maj_contrat_allocataire"/>
				
				<node expr="[contrat_retraite_cotisant/@classe]" alias="@classe"/>
				<node expr="[contrat_retraite_cotisant/@type_pa_retraite_cotisant_id]" alias="@type_pa_retraite_cotisant_id"/>
				<node expr="[contrat_retraite_cotisant/@inactif_o_n]" alias="@inactif_o_n"/>
				<node expr="[contrat_retraite_cotisant/@date_liquidation]" alias="@date_liquidation"/>
				<node expr="[contrat_retraite_cotisant/@date_maj_inactif]" alias="@date_maj_inactif"/>
				<node expr="[contrat_retraite_cotisant/@date_debut_reversion]" alias="@date_debut_reversion"/>
				<node expr="[contrat_retraite_cotisant/@date_fin_reversion]" alias="@date_fin_reversion"/>
				<node expr="[contrat_retraite_cotisant/@dernier_exercice_complet]" alias="@dernier_exercice_complet"/>
				<node expr="[contrat_retraite_cotisant/@statut_retraite_cotisant_id]" alias="@statut_retraite_cotisant_id"/>
				<node expr="[contrat_retraite_cotisant/@mode_reglement_retraite_cotisant_id]" alias="@mode_reglement_retraite_cotisant_id"/>
				<node expr="[contrat_retraite_cotisant/@date_debut_precompte]" alias="@date_debut_precompte"/>
				<node expr="[contrat_retraite_cotisant/@points_acquis_bruts]" alias="@points_acquis_bruts"/>
				<node expr="[contrat_retraite_cotisant/@points_acquis_nets]" alias="@points_acquis_nets"/>
				<node expr="[contrat_retraite_cotisant/@points_rachetes_bruts]" alias="@points_rachetes_bruts"/>
				<node expr="[contrat_retraite_cotisant/@reversion]" alias="@reversion"/>
				<node expr="[contrat_retraite_cotisant/@section_retraite_cotisant_id]" alias="@section_retraite_cotisant_id"/>
				<node expr="[contrat_retraite_cotisant/@points_acquis_bruts_der_exerc]" alias="@points_acquis_bruts_der_exerc"/>
				<node expr="[contrat_retraite_cotisant/@motif_sortie_retraite_cotisant_id]" alias="@motif_sortie_retraite_cotisant_id"/>
				
				<node expr="[info_particulier_cnp/@semail]" alias="@semail"/>
				<node expr="[info_particulier_cnp/@sphone]" alias="@sphone"/>
				<node expr="[info_particulier_cnp/@smobilephone]" alias="@smobilephone"/>
				<node expr="[info_particulier_cnp/@date_maj_emailtelcnp]" alias="@date_maj_emailtelcnp"/>
				
	
			</select>
				<where><condition expr="[identification/@idcontrat] = '.$contrat_id.'"/></where>
			</queryDef>';
			

			/*
			//Requete originale pour les versements
			$req22 = '<queryDef operation="select" schema="pre:versement" xtkschema="xtk:queryDef" lineCount="4">
			  <select>
				<node expr="@Exercice_Fiscal" alias="@Exercice_Fiscal"/>
				<node expr="max(@Classe)" alias="@Classe"/>
				<node expr="toDouble(sum(Case(When(@TYPE_VERSEMENT_Id = 2, @Montant_Versement), Else(0))))" alias="@Cotisations_Annuelles"/>
				<node expr="toDouble(sum(Case(When(@TYPE_VERSEMENT_Id = 1, @Montant_Versement), Else(0))))" alias="@Rachat"/>
				<node expr="toDouble(sum(Case(When(@TYPE_VERSEMENT_Id = 5, @Montant_Versement), Else(0))))" alias="@Abondement"/>
				<node expr="toDouble(sum(Case(When(@TYPE_VERSEMENT_Id = 3 OR @TYPE_VERSEMENT_Id = 4 OR @TYPE_VERSEMENT_Id = 6 OR @TYPE_VERSEMENT_Id = 7 OR @TYPE_VERSEMENT_Id = 8 OR @TYPE_VERSEMENT_Id = 9 OR @TYPE_VERSEMENT_Id = 10, @Montant_Versement), Else(0))))" alias="@AutreType"/>
				<node expr="sum(@Montant_Versement)" alias="@SommeVersement"/>
				<node expr="sum(@Points_Acquis_Bruts)" alias="@Points_Acquis_Bruts"/>
				<node expr="sum(@Points_Acquis_Net)" alias="@Points_Acquis_Net"/>
			  </select>
				<where>
					<condition expr="@contrat_id = ' . $id . ' "/>
				</where>
				<groupBy>
					<node expr="@Exercice_Fiscal"/>
				</groupBy>
				<orderBy>
					<node expr="@Exercice_Fiscal" sort="1" sortDesc="1"/>
				</orderBy>
			</queryDef>';
			*/
			

			$req2 = '<queryDef operation="select" schema="pre:detail_contrat" xtkschema="xtk:queryDef" lineCount="4">
			  <select>
				<node expr="@annee" alias="@Exercice_Fiscal"/>
				<node expr="@Class" alias="@Classe"/>
				<node expr="@Cotisations_Annuelles" alias="@Cotisations_Annuelles"/>
				<node expr="@Rachat" alias="@Rachat"/>
				<node expr="@Abondement" alias="@Abondement"/>
				<node expr="@AutreType" alias="@AutreType"/>
				<node expr="@SommeVersement" alias="@SommeVersement"/>
				<node expr="@Points_Acquis_Bruts" alias="@Points_Acquis_Bruts"/>
				<node expr="@Cumul_points_bruts" alias="@Cumul_points_bruts"/>
				<node expr="@Points_Acquis_Net" alias="@Points_Acquis_Net"/>
			  </select>
				<where>
					<condition expr="@contrat_id = ' . $contrat_id . ' "/>
				</where>
				<orderBy>
					<node expr="@annee" sort="1" sortDesc="1"/>
				</orderBy>
			</queryDef>';
			
			$req3 = '<queryDef operation="select" schema="pre:adresse" xtkschema="xtk:queryDef">
			  <select>
				<node expr="@adresse_4" alias="@adresse_4"/>
				<node expr="@code_postal" alias="@code_postal"/>
				<node expr="@adresse_2" alias="@adresse_2"/>
				<node expr="@adresse_1" alias="@adresse_1"/>
				<node expr="@lastModified" alias="@lastModifiedAdr"/>
				<node expr="@adresse_3" alias="@adresse_3"/>
				<node expr="@ville" alias="@ville"/>
				<node expr="@pays" alias="@pays"/>
			  </select>
				<where>
					<condition expr="@contrat_id = ' . $contrat_id . ' "/>
				</where>
			</queryDef>';
			
			
			$req4 = '<queryDef operation="select" schema="pre:versement" xtkschema="xtk:queryDef">
			  <select>
				<node expr="@Exercice_Fiscal" alias="@Exercice_Fiscal"/>
				<node expr="@Date_Valeur_Versement" alias="@Date_Valeur_Versement"/>
				<node expr="@TYPE_VERSEMENT_Id" alias="@TYPE_VERSEMENT_Id"/>
				<node expr="@Montant_Versement" alias="@Montant_Versement"/>
				<node expr="@Points_Acquis_Bruts" alias="@Points_Acquis_Bruts"/>
				<node expr="@Classe" alias="@Classe"/>
				<node expr="@Date_Creation_Versement" alias="@Date_Creation_Versement"/>
				<node expr="@Date_Modification_Versement" alias="@Date_Modification_Versement"/>
				</select>
				<where>
					<condition expr="@contrat_id = ' . $contrat_id . ' "/>
				</where>
				<orderBy>
					<node expr="@Date_Valeur_Versement" sortDesc="true"/>
				</orderBy>
			</queryDef>';
			
			$reqParticulier = '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef">
			<select>
				<node expr="@created" alias="@created"/>
				<node expr="@lastModified" alias="@lastModified"/>
				<node expr="[infos_individu/@conseiller]" alias="@conseiller_creation"/>
				<node expr="[infos_individu/@statut_particulier]" alias="@statut_particulier"/>
				<node expr="[infos_individu/@sous_statut]" alias="@sous_statut"/>
				<node expr="[infos_individu/@firstName]" alias="@firstName"/>
				<node expr="[infos_individu/@lastName]" alias="@lastName"/>
				<node expr="[infos_individu/@qualite_id]" alias="@qualite_id"/>
				<node expr="[infos_individu/@tsBirth]" alias="@tsBirth"/>
				
				<node expr="[adresse-particulier/@code_postal]" alias="@code_postal"/>
				
			</select>
				<where><condition expr="@id = '.$particulier_id.'"/></where>
			</queryDef>';
			
			$reqScores = '<queryDef operation="select" schema="pre:scoring" xtkschema="xtk:queryDef">
			<select>
				<node expr="@code_score" alias="@code_score"/>
				<node expr="@valeur_score" alias="@valeur_score"/>

			</select>
				<where><condition expr="@particulier_id = '.$particulier_id.'"/></where>
			</queryDef>';
			
			$reqLastEvents = '<queryDef operation="select" schema="pre:evenement" xtkschema="xtk:queryDef" lineCount="2">
			<select>
				<node expr="@Date_Evenement" alias="@Date_Evenement"/>
				<node expr="@MODE_EVENEMENT_Id" alias="@MODE_EVENEMENT_Id"/>
				<node expr="@MOTIF_EVENEMENT_Id" alias="@MOTIF_EVENEMENT_Id"/>
	
			</select>
				<where><condition expr="@particulier_id = '.$particulier_id.'"/></where>
				<orderBy><node expr="@Date_Evenement" sortDesc="true"/></orderBy>
			</queryDef>';

			
			
			$this->request->data = new stdClass();
			$this->loadModel('XtkQueryDef');
			
			$this->request->data->dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req);
			$this->request->data->dom2 = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req2);
			$this->request->data->dom3 = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req3);
			$this->request->data->dom4 = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req4);
			$this->request->data->domParticulier = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqParticulier);
			$this->request->data->domScores = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqScores);
			$this->request->data->domLastEvents = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqLastEvents);
			
			if(!$this->request->data->dom){
				echo 'erreur de la requête ';
				exit();
			}

			$collectivite_id = 0;
			$section_id = 0;
			
			foreach($this->request->data->dom->getElementsByTagName('contrat') as $contr){			
				foreach($contr->attributes as $attrName => $attrNode){
					$this->set($attrName, $attrNode->nodeValue);
					if($attrName == 'section_retraite_cotisant_id'){
						$section_id = $attrNode->nodeValue;
					}
					if($attrName == 'collectivite_retraite_cotisant_id'){
						$collectivite_id = $attrNode->nodeValue;
					}
					
					if($attrName == 'num_contrat_allocataire' && strlen($attrNode->nodeValue) > 0) {
						$this->set('allocataire', 'yes');
					}	

				}		
			}
			
			
			// RG : si le section_id == 1 et le collectivite_id est renseigné alors on cherche les info de collectivite
			if($section_id == 1 && $collectivite_id > 0){
				$req5 = '<queryDef operation="select" schema="pre:collectivite_retraite_cotisant" xtkschema="xtk:queryDef">
				  <select>
					<node expr="@nom_collectivite" alias="@nom_collectivite"/>
					<node expr="@code_postal" alias="@code_postal_collectivite"/>
					<node expr="@adresse_1" alias="@collectivite_adresse_1"/>
					<node expr="@adresse_2" alias="@collectivite_adresse_2"/>
					<node expr="@adresse_3" alias="@collectivite_adresse_3"/>
					<node expr="@adresse_4" alias="@collectivite_adresse_4"/>
					<node expr="@ville" alias="@collectivite_ville"/>
					<node expr="@type_collectivite_id" alias="@type_collectivite_id"/>
					<node expr="@categorie_collectivite_id" alias="@categorie_collectivite_id"/>
					<node expr="@code_nace" alias="@code_nace"/>
					<node expr="@pseudo_siret" alias="@pseudo_siret"/>
				  </select>
					<where>
						<condition expr="@id = ' . $collectivite_id . ' "/>
					</where>
				</queryDef>';
				
					$this->request->data->dom5 = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req5);
					foreach($this->request->data->dom5->getElementsByTagName('collectivite_retraite_cotisant') as $col){			
						foreach($col->attributes as $attrName => $attrNode){
							$this->set($attrName, $attrNode->nodeValue);
						}		
					}	
			}
			
			
			
			foreach($this->request->data->dom3->getElementsByTagName('adresse') as $adr){			
				foreach($adr->attributes as $attrName => $attrNode){
					$this->set($attrName, $attrNode->nodeValue);
				}		
			}
			
			foreach($this->request->data->domParticulier->getElementsByTagName('recipient') as $particulier){			
				foreach($particulier->attributes as $attrName => $attrNode){
					$this->set($attrName, $attrNode->nodeValue);
				}
			}
			
			$this->request->data->Abondement = false;
			
			foreach($this->request->data->dom2->getElementsByTagName('detail_contrat') as $vers){
				if($vers->getAttribute('Abondement') > 0){
					$this->request->data->Abondement = true;
					break;
				}
			}
			
			if($this->request->data->dom4->getElementsByTagName('versement')->item(0) !== null){
				$this->set('date_dernier_versement', $this->request->data->dom4->getElementsByTagName('versement')->item(0)->getAttribute('Date_Valeur_Versement'));
			}
			
			
		}
		
		
	}

	
	
	
	
	
	
	
	//SIMULATION
	function simulations($particulier_id){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		
		if(isset($_SESSION[$particulier_id.'_pre_aff_post'])){
			unset($_SESSION[$particulier_id.'_pre_aff_post']);
		}	
		if(isset($_SESSION[$particulier_id .'_simulation_id'])){
			$this->set('simulation_id', $_SESSION[$particulier_id .'_simulation_id']);
			unset($_SESSION[$particulier_id .'_simulation_id']);
			//$this->imprimer_simulation($particulier_id, $simulation_id);
		}


		
		$this->request->data = new stdClass();
		$this->loadModel('XtkQueryDef');
		
		$req = '<queryDef operation="select" schema="pre:simulation" xtkschema="xtk:queryDef">
		  <select>
			<node expr="@id" alias="@id"/>
			<node expr="@created" alias="@created"/>
			<node expr="[createdBy/@label]" alias="@label"/>
			<node expr="@Nom_Simulation" alias="@Nom_Simulation"/>
			<node expr="@Date_Liquidation" alias="@Date_Liquidation"/>
			<node expr="@Age_Liquidation" alias="@Age_Liquidation"/>
			<node expr="@lastModified" alias="@lastModified"/>
		  </select>
			<where>
				<condition expr="@particulier_id = ' . $particulier_id . ' "/>
			</where>
			<orderBy>
				<node expr="@created" sortDesc="true"/>
			</orderBy>
		</queryDef>';
		
		
		
		$reqParticulier = '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef">
		<select>
			<node expr="@created" alias="@created"/>
			<node expr="@lastModified" alias="@lastModified"/>
			<node expr="[infos_individu/@conseiller]" alias="@conseiller_creation"/>
			<node expr="[infos_individu/@statut_particulier]" alias="@statut_particulier"/>
			<node expr="[infos_individu/@sous_statut]" alias="@sous_statut"/>
			<node expr="[infos_individu/@firstName]" alias="@firstName"/>
			<node expr="[infos_individu/@lastName]" alias="@lastName"/>
			<node expr="[infos_individu/@qualite_id]" alias="@qualite_id"/>
			<node expr="[infos_individu/@tsBirth]" alias="@tsBirth"/>
			
			<node expr="[adresse-particulier/@code_postal]" alias="@code_postal"/>
			
		</select>
			<where><condition expr="@id = '.$particulier_id.'"/></where>
		</queryDef>';
		
		$reqScores = '<queryDef operation="select" schema="pre:scoring" xtkschema="xtk:queryDef">
		<select>
			<node expr="@code_score" alias="@code_score"/>
			<node expr="@valeur_score" alias="@valeur_score"/>

		</select>
			<where><condition expr="@particulier_id = '.$particulier_id.'"/></where>
		</queryDef>';
		
		$reqLastEvents = '<queryDef operation="select" schema="pre:evenement" xtkschema="xtk:queryDef" lineCount="2">
			<select>
				<node expr="@Date_Evenement" alias="@Date_Evenement"/>
				<node expr="@MODE_EVENEMENT_Id" alias="@MODE_EVENEMENT_Id"/>
				<node expr="@MOTIF_EVENEMENT_Id" alias="@MOTIF_EVENEMENT_Id"/>
	
			</select>
				<where><condition expr="@particulier_id = '.$particulier_id.'"/></where>
				<orderBy><node expr="@Date_Evenement" sortDesc="true"/></orderBy>
			</queryDef>';
			
			$reqPointsAcquis = '<queryDef operation="select" schema="pre:contrat" xtkschema="xtk:queryDef">
			<select>
				<node expr="[identification/@idcontrat]" alias="@idcontrat"/>
				<node expr="[contrat_retraite_cotisant/@points_acquis_bruts]" alias="@points_acquis_bruts"/>
			</select>
				<where>
					<condition expr="[identification/@particulier_id] = '.$particulier_id.'"/>
					<condition expr="[identification/@nature_contrat_id] = 1"/>
				</where>
			</queryDef>';
			
		
		
		$this->request->data = new stdClass();
		$this->loadModel('XtkQueryDef');
		$this->request->data->domSimulations = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req);
		$this->request->data->domParticulier = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqParticulier);
		$this->request->data->domScores = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqScores);
		$this->request->data->domLastEvents = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqLastEvents);
		$this->request->data->domPointsAcquis = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqPointsAcquis);
		
		if($this->request->data->domParticulier->getElementsByTagName('recipient')->item(0)->getAttribute('statut_particulier') == 3){
			$reqStatut = '<queryDef operation="select" schema="pre:contrat" xtkschema="xtk:queryDef">
				<select>
					<node expr="[identification/@idcontrat]" alias="@idcontrat"/>
				</select>
					<where>
						<condition expr="[identification/@particulier_id] = '.$particulier_id.'"/>
						<condition expr="[identification/@nature_contrat_id] = 1"/>
						<condition expr="[contrat_retraite_cotisant/@statut_retraite_cotisant_id] = 3"/>
					</where>
				</queryDef>';
			$this->request->data->domStatut = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqStatut);
			if($this->request->data->domStatut->getElementsByTagName('contrat')->item(0)){
				$this->set('allocataire', 'true');
			}
		}

		// Obtenir la classe pour chaque simulation dans la table des simlations
		
		foreach($this->request->data->domSimulations->getElementsByTagName('simulation') as $sim){
			$reqClasse = '<queryDef operation="select" schema="pre:simulation_detail" xtkschema="xtk:queryDef">
			  <select>
				<node expr="@classe" alias="@classe"/>
			  </select>
				<where>
					<condition expr="@simulation_id = ' . $sim->getAttribute('id') . ' "/>
				</where>
				<orderBy>
					<node expr="@annee" sortAsc="true"/>
				</orderBy>
			</queryDef>';
			
			$this->request->data->domClasse = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqClasse);
			if($this->request->data->domClasse->getELementsByTagName('simulation_detail')->item(0) != null)
				$this->set('classe_cotisation_' . $sim->getAttribute('id'), $this->request->data->domClasse->getELementsByTagName('simulation_detail')->item(0)->getAttribute('classe'));
			else
				$this->set('classe_cotisation_' . $sim->getAttribute('id'), "0");
		}
		
		foreach($this->request->data->domParticulier->getElementsByTagName('recipient') as $particulier){			
			foreach($particulier->attributes as $attrName => $attrNode){
				$this->set($attrName, $attrNode->nodeValue);
			}
		}
		
		foreach($this->request->data->domPointsAcquis->getElementsByTagName('contrat') as $cont){
			foreach($cont->attributes as $attrName => $attrNode){
					$this->set($attrName, $attrNode->nodeValue);
			}
		}

		

		
	}
	
	//SIMULATION_DETAILS
	
	//Maj de la date de naissance si elle est manquante dans l'ajout d'une simulation
	
	function update_tsBirth($id_particulier){
		if($this->request->data){
				$req = '<recipient xtkschema="nms:recipient" id="'. $id_particulier .'" _key="@id"  _operation="update">
				<infos_individu
					tsBirth="'. lof::convertDateToAdobeFormat($this->request->data->date_naissance) .'"
				/>
		</recipient>';
		
		$this->loadModel('XtkSession');
		$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req);
		
		if($res){
			$this->redirect('recipient/add_simulation/' . $id_particulier);
		}
		
		}else{
			$this->redirect('pages/index');
		}
	}
	
	// Update du mail au cas ou il est pas renseigné
	function update_email($id_particulier, $id_simulation=null){
		if($this->request->data){
				$req = '<recipient xtkschema="nms:recipient" id="'. $id_particulier .'" _key="@id"  _operation="update">
				<contactabilite
					semail="'. trim($this->request->data->email) .'"
				/>
		</recipient>';
		
		$this->loadModel('XtkSession');
		$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req);
		
		if($res){
			if($id_simulation > 0){
				$this->redirect('recipient/view_simulation/' . $id_particulier . '/'. $id_simulation);
			}else{
				$this->redirect('recipient/add_simulation/' . $id_particulier);
			}
		}
		
		}else{
			$this->redirect('pages/index');
		}

	}
	
	
	function add_simulation($particulier_id=null, $contrat_id=null, $print_sim=null){
		if($this->request->data){			
			$myDom = new DOMDocument();
			$myDom->loadXML($this->request->data->xml);
			// récupérer le max de technical id simulation
			//j'ajoute 1 à la veleur et je l'ajoute avc le simulation
			//Cette valeur va me permettre de récupérer l'id après pour pouvoir l'insérer dans les autres tables
			$nextTkId = 0;
			$reqGetNextId = '<queryDef operation="select" schema="pre:simulation" xtkschema="xtk:queryDef">
				<select>
					<node expr="max(@tk_id_simulation)" alias="@tk_id_simulation"/>
				</select>
			</queryDef>';
			
			$this->loadModel('XtkQueryDef');
			$this->request->data->domNextId = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqGetNextId);
			//le nextTkId
			$nextTkId = intval($this->request->data->domNextId->getElementsByTagName('simulation')->item(0)->getAttribute('tk_id_simulation')) + 1;
			
			
			
			
			$id_simulation = 0;
			foreach($myDom->getELementsByTagName('SIMULATION') as $sim){
			$req = '<simulation xtkschema="pre:simulation"  _operation="insert" 
				particulier_id="'.$particulier_id.'"
				Nom_Simulation="'.trim($sim->getElementsByTagName('NOM_SIMULATION')->item(0)->textContent).'"
				created="'.date('Y-m-d H:i:s').'"
				Date_Liquidation="'.lof::convertDateToAdobeFormat($sim->getElementsByTagName('DATE_LIQUIDATION')->item(0)->textContent).'"
				Age_Liquidation="'.$sim->getElementsByTagName('AGE_LIQUIDATION')->item(0)->textContent.'"
				Progression_Palier_O_N="'.$sim->getElementsByTagName('PROGRESSION_PALIER')->item(0)->textContent.'"
				Option_Reversion="'.$sim->getElementsByTagName('REVERSION')->item(0)->textContent.'"							
				Abondement="'. $sim->getElementsByTagName('ABONDEMENT')->item(0)->textContent . '"															
				tk_id_simulation="'. $nextTkId . '"															
				/>';
				$this->loadModel('XtkSession');
				$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req);
				
				if($res){
					$reqId = '<queryDef operation="select" schema="pre:simulation" xtkschema="xtk:queryDef">
					<select>
						<node expr="@id" alias="@id"/>
					</select>
					<where>
						<condition expr="@tk_id_simulation = '.$nextTkId.'"/>
					</where>
					</queryDef>';
					$this->loadModel('XtkQueryDef');
					$this->request->data->domId = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqId);
					$id_simulation = intval($this->request->data->domId->getElementsByTagName('simulation')->item(0)->getAttribute('id'));
				}else{
					
				}	
			}
			
			
			$this->loadModel('XtkSession');
			foreach($myDom->getELementsByTagName('SIMULATION_DETAILS') as $sim_details){
				foreach($sim_details->getELementsByTagName('DETAIL') as $detail){
					$reqDetail = '<simulation_detail xtkschema="pre:simulation_detail"  _operation="insert" 
						simulation_id="'.$id_simulation.'"													
						annee="'.$detail->getElementsByTagName('ANNEE')->item(0)->textContent.'"													
						created="'.date('Y-m-d H:i:s').'"
						age="'.$detail->getElementsByTagName('AGE')->item(0)->textContent.'"													
						classe="'.$detail->getElementsByTagName('CLASSE')->item(0)->textContent.'"																									
						nb_annees_rachat="'.trim($detail->getElementsByTagName('NB_ANNEE_RACHAT')->item(0)->textContent).'"													
						montant_rachat="'.trim($detail->getElementsByTagName('RACHAT')->item(0)->textContent).'"													
						option_reversion="'.$detail->getElementsByTagName('REVERSION')->item(0)->textContent.'"													
						points_brut="'.$detail->getElementsByTagName('POINTS_BRUTS')->item(0)->textContent.'"													
						points_brut_cumul="'.$detail->getElementsByTagName('CUMUL_BRUTS')->item(0)->textContent.'"													
						points_net="'.$detail->getElementsByTagName('POINTS_NETS')->item(0)->textContent.'"													
						points_net_cumul="'.$detail->getElementsByTagName('CUMUL_NETS')->item(0)->textContent.'"

											
					/>';
					
						$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $reqDetail);
				}
			}
			
			foreach($myDom->getELementsByTagName('SIMULATION_RESULTATS') as $sim_resultats){
				foreach($sim_resultats->getELementsByTagName('RESULTAT') as $resultat){
					$reqResultat = '<simulation_resultats xtkschema="pre:simulation_resultats"  _operation="insert" 
						simulation_id="'.$id_simulation.'"													
						created="'.date('Y-m-d H:i:s').'"
						total_points_acquis_brut="'.$resultat->getElementsByTagName('TOTAL_BRUTS')->item(0)->textContent.'"													
						total_points_acquis_net="'.$resultat->getElementsByTagName('TOTAL_NETS')->item(0)->textContent.'"													
						date_liquidation="'.lof::convertDateToAdobeFormat($resultat->getElementsByTagName('DATE_LIQUIDATION')->item(0)->textContent).'"																									
						age_liquidation="'.$resultat->getElementsByTagName('AGE_LIQUIDATION')->item(0)->textContent.'"													
						coefficient_liquidation="'.$resultat->getElementsByTagName('COEFF_LIQUIDATION')->item(0)->textContent.'"													
						total_points_liquides_net="'.$resultat->getElementsByTagName('TOTAL_POINTS_LIQUIDATION')->item(0)->textContent.'"													
						montant_rente_annuelle_brut="'.$resultat->getElementsByTagName('RENTE_ANNUELLE_BRUTE')->item(0)->textContent.'"																								
					/>';
					
						$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $reqResultat);
				}
			}
			
			// gérer les cas, si envoie de mail, si impession .. etc
			// si un seul param renseigné, enregistement
			// 2 et 3, soit envoie de mail, soit impression
			
			// Affilié
			if(isset($contrat_id) && $contrat_id > 0 && $print_sim == 0){
				$this->loadModel('XtkWorkflow');
				$this->XtkWorkflow->PostEvent($this->Session->read('header'), $this->Session->read('sessionToken'),'pre_camp_recur_simulation_affilies','signal','','<variables recipientid=\''. $particulier_id .'\' simulationid=\''. $id_simulation .'\' contratid=\''. $contrat_id .'\'/>',false);	
				$this->redirect('recipient/simulations/' . $particulier_id);
			}
			
			//prospect
			if(isset($contrat_id) && $contrat_id == 0 && $print_sim == 0){
				$this->loadModel('XtkWorkflow');
				$this->XtkWorkflow->PostEvent($this->Session->read('header'), $this->Session->read('sessionToken'),'pre_camp_recur_simulation_prospects','signal','','<variables recipientid=\''. $particulier_id .'\' simulationid=\''. $id_simulation .'\'/>',false);	
				$this->redirect('recipient/simulations/' . $particulier_id);
			}
			
			//Print, on s'occupe que du troisième pamas, vu que le contrat est géré dans la fonction elle même
			if($print_sim == 1){
				$_SESSION[$particulier_id .'_simulation_id'] = $id_simulation;
				$this->redirect('recipient/simulations/'.$particulier_id);
				
			}
			
			$this->redirect('recipient/simulations/'. $particulier_id);
			
			
		}else{
		$îd_contrat = 0;
		
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		if(isset($_SESSION[$particulier_id]['pre_aff_post'])){
			unset($_SESSION[$particulier_id]['pre_aff_post']);
		}	
		
		$this->request->data = new stdClass();
		$this->loadModel('XtkQueryDef');
		
		$reqNature = '<queryDef operation="select" schema="pre:contrat" xtkschema="xtk:queryDef">
			<select>
				<node expr="[identification/@idcontrat]" alias="@idcontrat"/>
			</select>
				<where>
					<condition expr="[identification/@particulier_id] = '.$particulier_id.'"/>
					<condition expr="[identification/@nature_contrat_id] = 1"/>
					<condition expr="[contrat_retraite_cotisant/@statut_retraite_cotisant_id] &lt;&gt; 3"/>
				</where>
			</queryDef>';
			
		$this->request->data->domNature = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqNature);
		
		if($this->request->data->domNature->getElementsByTagName('contrat')->item(0)){
			$id_contrat = $this->request->data->domNature->getElementsByTagName('contrat')->item(0)->getAttribute('idcontrat');
			$this->set('retraite', 'true');
		}
		
		$req = '';
		
		if(isset($particulier_id) && $this->request->data->domNature->getElementsByTagName('contrat')->item(0)){
			$req = '<queryDef operation="select" schema="pre:contrat" xtkschema="xtk:queryDef">
			<select>
				<node expr="@age_limite_liquidation" alias="@age_limite_liquidation"/>

				<node expr="@date_limite_liquidation" alias="@date_limite_liquidation"/>

				<node expr="@abondementpuph" alias="@abondementpuph"/>
				<node expr="@montant_capacite_versement" alias="@montant_capacite_versement"/>
				<node expr="@nb_annees_capacite_versement" alias="@nb_annees_capacite_versement"/>
				
				<node expr="[identification/@date_souscription]" alias="@date_souscription"/>
				<node expr="[identification/@idcontrat]" alias="@idcontrat"/>

				<node expr="[cotisant_cnp/@date_maj_contrat_cotisant]" alias="@date_maj_contrat_cotisant"/>
				<node expr="[cotisant_cnp/@date_naissance_import_cotisant]" alias="@date_naissance_import_cotisant"/>

				<node expr="[allocataire_cnp/@date_maj_contrat_allocataire]" alias="@date_maj_contrat_allocataire"/>
				
				<node expr="[contrat_retraite_cotisant/@classe]" alias="@classe"/>
				<node expr="[contrat_retraite_cotisant/@section_retraite_cotisant_id]" alias="@section_retraite_cotisant_id"/>
				<node expr="[contrat_retraite_cotisant/@dernier_exercice_complet]" alias="@dernier_exercice_complet"/>
				<node expr="[contrat_retraite_cotisant/@points_acquis_bruts]" alias="@points_acquis_bruts"/>
				<node expr="[contrat_retraite_cotisant/@points_acquis_nets]" alias="@points_acquis_nets"/>
				<node expr="[contrat_retraite_cotisant/@points_acquis_bruts_der_exerc]" alias="@points_acquis_bruts_der_exerc"/>
				<node expr="[contrat_retraite_cotisant/@points_acquis_nets_der_exerc]" alias="@points_acquis_nets_der_exerc"/>
				<node expr="[contrat_retraite_cotisant/@reversion]" alias="@reversion"/>

			</select>
				<where><condition expr="[identification/@idcontrat] = '.$id_contrat.'"/></where>
			</queryDef>';
			
		$req2 = '<queryDef operation="select" schema="pre:detail_contrat" xtkschema="xtk:queryDef" lineCount="4">
			  <select>
				<node expr="@annee" alias="@Exercice_Fiscal"/>
				<node expr="@Class" alias="@Classe"/>
				<node expr="@Cotisations_Annuelles" alias="@Cotisations_Annuelles"/>
				<node expr="@Rachat" alias="@Rachat"/>
				<node expr="@Abondement" alias="@Abondement"/>
				<node expr="@AutreType" alias="@AutreType"/>
				<node expr="@SommeVersement" alias="@SommeVersement"/>
				<node expr="@Points_Acquis_Bruts" alias="@Points_Acquis_Bruts"/>
				<node expr="@Cumul_points_bruts" alias="@Cumul_points_bruts"/>
				<node expr="@Points_Acquis_Net" alias="@Points_Acquis_Net"/>
			  </select>
				<where>
					<condition expr="@contrat_id = ' . $id_contrat . ' "/>
				</where>
				<orderBy>
					<node expr="@annee" sort="1" sortDesc="1"/>
				</orderBy>
			</queryDef>';
			
			$this->request->data->dom2 = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req2);
			
			if($this->request->data->dom2->getElementsByTagName('detail_contrat')->item(0)){
				$this->set('annne_dernier_versement', $this->request->data->dom2->getElementsByTagName('detail_contrat')->item(0)->getAttribute('Exercice_Fiscal'));
				/*if(date('Y') - $this->request->data->dom2->getElementsByTagName('detail_contrat')->item(0)->getAttribute('Exercice_Fiscal') < 3){
					$this->set('annne_dernier_versement', $this->request->data->dom2->getElementsByTagName('detail_contrat')->item(0)->getAttribute('Exercice_Fiscal'));
				}else{
					$this->set('annee_dernier_versement', '-1');
				}*/
			}
			
			if($this->request->data->dom2->getElementsByTagName('detail_contrat')->item(0) != null && $this->request->data->dom2->getElementsByTagName('detail_contrat')->item(0)->getAttribute('Exercice_Fiscal') == date('Y')){
				$this->set('rachat_annee_courante', $this->request->data->dom2->getElementsByTagName('detail_contrat')->item(0)->getAttribute('Rachat') + $this->request->data->dom2->getElementsByTagName('detail_contrat')->item(0)->getAttribute('AutreType'));
			}else{
				$this->set('rachat_annee_courante', '0');
			}
			
			

			$this->request->data->Abondement = false;
			
			foreach($this->request->data->dom2->getElementsByTagName('detail_contrat') as $vers){
				if($vers->getAttribute('Abondement') > 0){
					$this->request->data->Abondement = true;
					break;
				}
			}
			
			
			$this->request->data->dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req);
			

			
			
			
			foreach($this->request->data->dom->getElementsByTagName('contrat') as $contr){			
				foreach($contr->attributes as $attrName => $attrNode){
					$this->set($attrName, $attrNode->nodeValue);
				}		
			}
			
			
			
		}else{
			$this->set('classe', '1');
		}
		
		$reqParticulier = '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef">
		<select>
			<node expr="@created" alias="@created"/>
			<node expr="@lastModified" alias="@lastModified"/>
			<node expr="[infos_individu/@conseiller]" alias="@conseiller_creation"/>
			<node expr="[infos_individu/@statut_particulier]" alias="@statut_particulier"/>
			<node expr="[infos_individu/@sous_statut]" alias="@sous_statut"/>
			<node expr="[infos_individu/@firstName]" alias="@firstName"/>
			<node expr="[infos_individu/@lastName]" alias="@lastName"/>
			<node expr="[infos_individu/@qualite_id]" alias="@qualite_id"/>
			<node expr="[infos_individu/@tsBirth]" alias="@tsBirth"/>
			<node expr="[contactabilite/@semail]" alias="@semail"/>
			
			<node expr="[adresse-particulier/@code_postal]" alias="@code_postal"/>
			
		</select>
			<where><condition expr="@id = '.$particulier_id.'"/></where>
		</queryDef>';
		
		$reqScores = '<queryDef operation="select" schema="pre:scoring" xtkschema="xtk:queryDef">
		<select>
			<node expr="@code_score" alias="@code_score"/>
			<node expr="@valeur_score" alias="@valeur_score"/>

		</select>
			<where><condition expr="@particulier_id = '.$particulier_id.'"/></where>
		</queryDef>';
		
		
		$reqLastEvents = '<queryDef operation="select" schema="pre:evenement" xtkschema="xtk:queryDef" lineCount="2">
			<select>
				<node expr="@Date_Evenement" alias="@Date_Evenement"/>
				<node expr="@MODE_EVENEMENT_Id" alias="@MODE_EVENEMENT_Id"/>
				<node expr="@MOTIF_EVENEMENT_Id" alias="@MOTIF_EVENEMENT_Id"/>
	
			</select>
				<where><condition expr="@particulier_id = '.$particulier_id.'"/></where>
				<orderBy><node expr="@Date_Evenement" sortDesc="true"/></orderBy>
			</queryDef>';
		

		$this->request->data->domLastEvents = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqLastEvents);
		$this->request->data->domParticulier = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqParticulier);
		$this->request->data->domScores = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqScores);
		
		foreach($this->request->data->domParticulier->getElementsByTagName('recipient') as $particulier){			
			foreach($particulier->attributes as $attrName => $attrNode){
				$this->set($attrName, $attrNode->nodeValue);
			}
		}
		
	}
}
	
	
	
	
	
	
	function view_simulation($particulier_id, $simulation_id){
		if($particulier_id != null && $simulation_id != null){
			$this->request->data = new stdClass();
			
			$reqParams = '<queryDef operation="select" schema="pre:simulation" xtkschema="xtk:queryDef">
			  <select>
				<node expr="@created" alias="@created"/>
				<node expr="[createdBy/@label]" alias="@label"/>
				<node expr="@Nom_Simulation" alias="@Nom_Simulation"/>
				<node expr="@Date_Liquidation" alias="@Date_Liquidation"/>
				<node expr="@Age_Liquidation" alias="@Age_Liquidation"/>
				<node expr="@Progression_Palier_O_N" alias="@Progression_Palier_O_N"/>
				<node expr="@Option_Reversion" alias="@Option_Reversion"/>
				<node expr="@Abondement" alias="@Abondement"/>
			  </select>
				<where>
					<condition expr="@particulier_id = ' . $particulier_id . ' "/>
					<condition expr="@id = ' . $simulation_id . ' "/>
				</where>
			</queryDef>';
			
			$reqDetails = '<queryDef operation="select" schema="pre:simulation_detail" xtkschema="xtk:queryDef">
			  <select>
				<node expr="@annee" alias="@annee"/>
				<node expr="@age" alias="@age"/>
				<node expr="@classe" alias="@classe"/>
				<node expr="@nb_annees_rachat" alias="@nb_annees_rachat"/>
				<node expr="@montant_rachat" alias="@montant_rachat"/>
				<node expr="@option_reversion" alias="@option_reversion"/>
				<node expr="@points_brut" alias="@points_brut"/>
				<node expr="@points_brut_cumul" alias="@points_brut_cumul"/>
				<node expr="@points_net" alias="@points_net"/>
				<node expr="@points_net_cumul" alias="@points_net_cumul"/>
			  </select>
				<where>
					<condition expr="@simulation_id = ' . $simulation_id . ' "/>
				</where>
				<orderBy>
					<node expr="@annee" sortAsc="true"/>
				</orderBy>
			</queryDef>';
			
			$reqResultats = '<queryDef operation="select" schema="pre:simulation_resultats" xtkschema="xtk:queryDef">
			  <select>
				<node expr="@total_points_acquis_brut" alias="@total_points_acquis_brut"/>
				<node expr="@total_points_acquis_net" alias="@total_points_acquis_net"/>
				<node expr="@date_liquidation" alias="@date_liquidation"/>
				<node expr="@age_liquidation" alias="@age_liquidation"/>
				<node expr="@coefficient_liquidation" alias="@coefficient_liquidation"/>
				<node expr="@total_points_liquides_net" alias="@total_points_liquides_net"/>
				<node expr="@montant_rente_annuelle_brut" alias="@montant_rente_annuelle_brut"/>
			  </select>
				<where>
					<condition expr="@simulation_id = ' . $simulation_id . ' "/>
				</where>
				<orderBy>
					<node expr="@age_liquidation" sortAsc="true"/>
				</orderBy>
			</queryDef>';
			
			$reqParticulier = '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef">
			<select>
				<node expr="@created" alias="@created"/>
				<node expr="@lastModified" alias="@lastModified"/>
				<node expr="[infos_individu/@conseiller]" alias="@conseiller_creation"/>
				<node expr="[infos_individu/@statut_particulier]" alias="@statut_particulier"/>
				<node expr="[infos_individu/@sous_statut]" alias="@sous_statut"/>
				<node expr="[infos_individu/@firstName]" alias="@firstName"/>
				<node expr="[infos_individu/@lastName]" alias="@lastName"/>
				<node expr="[infos_individu/@qualite_id]" alias="@qualite_id"/>
				<node expr="[infos_individu/@tsBirth]" alias="@tsBirth"/>
				<node expr="[contactabilite/@semail]" alias="@semail"/>
				
				<node expr="[adresse-particulier/@code_postal]" alias="@code_postal"/>
				
			</select>
				<where><condition expr="@id = '.$particulier_id.'"/></where>
			</queryDef>';

			$reqScores = '<queryDef operation="select" schema="pre:scoring" xtkschema="xtk:queryDef">
			<select>
				<node expr="@code_score" alias="@code_score"/>
				<node expr="@valeur_score" alias="@valeur_score"/>

			</select>
				<where><condition expr="@particulier_id = '.$particulier_id.'"/></where>
			</queryDef>';
			
			// Point acquis et l'id du contrat aussi
			$reqPointsAcquis = '<queryDef operation="select" schema="pre:contrat" xtkschema="xtk:queryDef">
			<select>
				<node expr="[identification/@idcontrat]" alias="@idcontrat"/>
				<node expr="[contrat_retraite_cotisant/@points_acquis_bruts]" alias="@points_acquis_bruts"/>
			</select>
				<where>
					<condition expr="[identification/@particulier_id] = '.$particulier_id.'"/>
					<condition expr="[identification/@nature_contrat_id] = 1"/>
				</where>
			</queryDef>';
		
			
			$reqLastEvents = '<queryDef operation="select" schema="pre:evenement" xtkschema="xtk:queryDef" lineCount="2">
			<select>
				<node expr="@Date_Evenement" alias="@Date_Evenement"/>
				<node expr="@MODE_EVENEMENT_Id" alias="@MODE_EVENEMENT_Id"/>
				<node expr="@MOTIF_EVENEMENT_Id" alias="@MOTIF_EVENEMENT_Id"/>
	
			</select>
				<where><condition expr="@particulier_id = '.$particulier_id.'"/></where>
				<orderBy><node expr="@Date_Evenement" sortDesc="true"/></orderBy>
			</queryDef>';
			
			$this->loadModel('XtkQueryDef');
			$this->request->data->domParams = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqParams);
			$this->request->data->domDetails = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqDetails);
			$this->request->data->domResultats = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqResultats);
			$this->request->data->domParticulier = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqParticulier);
			$this->request->data->domScores = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqScores);
			$this->request->data->domLastEvents = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqLastEvents);
			$this->request->data->domPointsAcquis = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqPointsAcquis);
			
			
			foreach($this->request->data->domParams->getElementsByTagName('simulation') as $sim){			
				foreach($sim->attributes as $attrName => $attrNode){
					$this->set($attrName, $attrNode->nodeValue);
				}		
			}
			
			foreach($this->request->data->domParticulier->getElementsByTagName('recipient') as $particulier){			
				foreach($particulier->attributes as $attrName => $attrNode){
					$this->set($attrName, $attrNode->nodeValue);
				}
			}
			
			foreach($this->request->data->domPointsAcquis->getElementsByTagName('contrat') as $cont){
				foreach($cont->attributes as $attrName => $attrNode){
						$this->set($attrName, $attrNode->nodeValue);
				}
			}
			
			if($this->request->data->domDetails->getElementsByTagName('simulation_detail')->item(0) != null){
				$this->set('classe', $this->request->data->domDetails->getElementsByTagName('simulation_detail')->item(0)->getAttribute('classe'));
			}
			
			
		}else{
			$this->redirect('recipient/simulations/' . $particulier_id);
		}
		
		
	}
	
	
	function envoyer_simulation($particulier_id, $simulation_id, $contrat_id){
		if(isset($particulier_id) && isset($simulation_id) && isset($contrat_id)){
			if($contrat_id > 0){
				$this->loadModel('XtkWorkflow');
				$this->XtkWorkflow->PostEvent($this->Session->read('header'), $this->Session->read('sessionToken'),'pre_camp_recur_simulation_affilies','signal','','<variables recipientid=\''. $particulier_id .'\' simulationid=\''. $simulation_id .'\' contratid=\''. $contrat_id .'\'/>',false);	
				$this->redirect('recipient/view_simulation/' . $particulier_id . '/' .$simulation_id);
			}
			
			//prospect
			if($contrat_id == 0){
				$this->loadModel('XtkWorkflow');
				$this->XtkWorkflow->PostEvent($this->Session->read('header'), $this->Session->read('sessionToken'),'pre_camp_recur_simulation_prospects','signal','','<variables recipientid=\''. $particulier_id .'\' simulationid=\''. $simulation_id .'\'/>',false);	
				$this->redirect('recipient/view_simulation/' . $particulier_id . '/' .$simulation_id);
			}
		}
	}
	
	

	
	function imprimer_simulation($particulier_id, $simulation_id){
		if($particulier_id != null && $simulation_id != null){
			$this->request->data = new stdClass();
			
			$reqParams = '<queryDef operation="select" schema="pre:simulation" xtkschema="xtk:queryDef">
			  <select>
				<node expr="@created" alias="@created"/>
				<node expr="[createdBy/@label]" alias="@label"/>
				<node expr="@Nom_Simulation" alias="@Nom_Simulation"/>
				<node expr="@Date_Liquidation" alias="@Date_Liquidation"/>
				<node expr="@Age_Liquidation" alias="@Age_Liquidation"/>
				<node expr="@Progression_Palier_O_N" alias="@Progression_Palier_O_N"/>
				<node expr="@Option_Reversion" alias="@Option_Reversion"/>
				<node expr="@Abondement" alias="@Abondement"/>
			  </select>
				<where>
					<condition expr="@particulier_id = ' . $particulier_id . ' "/>
					<condition expr="@id = ' . $simulation_id . ' "/>
				</where>
			</queryDef>';
			
			$reqDetails = '<queryDef operation="select" schema="pre:simulation_detail" xtkschema="xtk:queryDef">
			  <select>
				<node expr="@annee" alias="@annee"/>
				<node expr="@age" alias="@age"/>
				<node expr="@classe" alias="@classe"/>
				<node expr="@nb_annees_rachat" alias="@nb_annees_rachat"/>
				<node expr="@montant_rachat" alias="@montant_rachat"/>
				<node expr="@option_reversion" alias="@option_reversion"/>
				<node expr="@points_brut" alias="@points_brut"/>
				<node expr="@points_brut_cumul" alias="@points_brut_cumul"/>
				<node expr="@points_net" alias="@points_net"/>
				<node expr="@points_net_cumul" alias="@points_net_cumul"/>
			  </select>
				<where>
					<condition expr="@simulation_id = ' . $simulation_id . ' "/>
				</where>
				<orderBy>
					<node expr="@annee" sortAsc="true"/>
				</orderBy>
			</queryDef>';
			
			$reqResultats = '<queryDef operation="select" schema="pre:simulation_resultats" xtkschema="xtk:queryDef">
			  <select>
				<node expr="@total_points_acquis_brut" alias="@total_points_acquis_brut"/>
				<node expr="@total_points_acquis_net" alias="@total_points_acquis_net"/>
				<node expr="@date_liquidation" alias="@date_liquidation"/>
				<node expr="@age_liquidation" alias="@age_liquidation"/>
				<node expr="@coefficient_liquidation" alias="@coefficient_liquidation"/>
				<node expr="@total_points_liquides_net" alias="@total_points_liquides_net"/>
				<node expr="@montant_rente_annuelle_brut" alias="@montant_rente_annuelle_brut"/>
			  </select>
				<where>
					<condition expr="@simulation_id = ' . $simulation_id . ' "/>
				</where>
				<orderBy>
					<node expr="@age_liquidation" sortAsc="true"/>
				</orderBy>
			</queryDef>';
			
			$reqParticulier = '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef">
			<select>
				<node expr="@created" alias="@created"/>
				<node expr="@lastModified" alias="@lastModified"/>
				<node expr="[infos_individu/@conseiller]" alias="@conseiller_creation"/>
				<node expr="[infos_individu/@statut_particulier]" alias="@statut_particulier"/>
				<node expr="[infos_individu/@sous_statut]" alias="@sous_statut"/>
				<node expr="[infos_individu/@firstName]" alias="@firstName"/>
				<node expr="[infos_individu/@nom_naissance]" alias="@nom_naissance"/>
				<node expr="[infos_individu/@lastName]" alias="@lastName"/>
				<node expr="[infos_individu/@qualite_id]" alias="@qualite_id"/>
				<node expr="[infos_individu/@tsBirth]" alias="@tsBirth"/>
				
				<node expr="[infos_contrat/@date_prospect_affilie]" alias="@date_prospect_affilie"/>
				
				
				<node expr="[adresse-particulier/@adresse_4]" alias="@adresse_4"/>
				<node expr="[adresse-particulier/@code_postal]" alias="@code_postal"/>
				<node expr="[adresse-particulier/@adresse_2]" alias="@adresse_2"/>
				<node expr="[adresse-particulier/@adresse_1]" alias="@adresse_1"/>
				<node expr="[adresse-particulier/@adresse_3]" alias="@adresse_3"/>
				<node expr="[adresse-particulier/@ville]" alias="@ville"/>
				<node expr="[adresse-particulier/@pays]" alias="@pays"/>
				
			</select>
				<where><condition expr="@id = '.$particulier_id.'"/></where>
			</queryDef>';
			

			
			$reqContrat = '<queryDef operation="select" schema="pre:contrat" xtkschema="xtk:queryDef">
			<select>
				<node expr="@abondementpuph" alias="@abondementpuph"/>
				<node expr="[identification/@idcontrat]" alias="@idcontrat"/>
				<node expr="[identification/@num_contrat]" alias="@num_contrat"/>
				<node expr="[identification/@particulier_id]" alias="@particulier_id"/>
				<node expr="[identification/@date_souscription]" alias="@date_souscription"/>
				<node expr="[cotisant_cnp/@date_naissance_import_cotisant]" alias="@date_naissance_import_cotisant"/>
				<node expr="[contrat_retraite_cotisant/@classe]" alias="@classe"/>
				<node expr="[contrat_retraite_cotisant/@reversion]" alias="@reversion"/>
				<node expr="[contrat_retraite_cotisant/@points_acquis_nets]" alias="@points_acquis_nets"/>
			</select>
				<where><condition expr="[identification/@particulier_id] = '.$particulier_id.'"/></where>
			</queryDef>';

			
			$this->loadModel('XtkQueryDef');
			$this->request->data->domParams = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqParams);
			$this->request->data->domDetails = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqDetails);
			$this->request->data->domResultats = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqResultats);
			$this->request->data->domParticulier = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqParticulier);
			$this->request->data->domContrat = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqContrat);
			
			pdf::imprimer_sim($this->request->data->domParticulier->getELementsByTagName('recipient')->item(0), $this->request->data->domContrat->getELementsByTagName('contrat')->item(0), $this->request->data->domParams->getELementsByTagName('simulation')->item(0), $this->request->data->domDetails, $this->request->data->domResultats);
			
		}else{
			$this->redirect('recipient/simulations/' . $particulier_id);
		}
	}

	
	function demandes_edition($particulier_id){
		if($particulier_id != null){
			$this->request->data = new stdClass();
			
			
			$reqParticulier = '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef">
			<select>
				<node expr="@created" alias="@created"/>
				<node expr="@lastModified" alias="@lastModified"/>
				<node expr="[infos_individu/@conseiller]" alias="@conseiller_creation"/>
				<node expr="[infos_individu/@statut_particulier]" alias="@statut_particulier"/>
				<node expr="[infos_individu/@sous_statut]" alias="@sous_statut"/>
				<node expr="[infos_individu/@firstName]" alias="@firstName"/>
				<node expr="[infos_individu/@lastName]" alias="@lastName"/>
				<node expr="[infos_individu/@qualite_id]" alias="@qualite_id"/>
				<node expr="[infos_individu/@tsBirth]" alias="@tsBirth"/>
				
				<node expr="[contactabilite/@semail]" alias="@semail"/>
				
				<node expr="[adresse-particulier/@code_postal]" alias="@code_postal"/>
				
			</select>
				<where><condition expr="@id = '.$particulier_id.'"/></where>
			</queryDef>';

			$reqScores = '<queryDef operation="select" schema="pre:scoring" xtkschema="xtk:queryDef">
			<select>
				<node expr="@code_score" alias="@code_score"/>
				<node expr="@valeur_score" alias="@valeur_score"/>

			</select>
				<where><condition expr="@particulier_id = '.$particulier_id.'"/></where>
			</queryDef>';
			
			$reqPointsAcquis = '<queryDef operation="select" schema="pre:contrat" xtkschema="xtk:queryDef">
			<select>
				<node expr="[identification/@idcontrat]" alias="@idcontrat"/>
				<node expr="[contrat_retraite_cotisant/@points_acquis_bruts]" alias="@points_acquis_bruts"/>
			</select>
				<where>
					<condition expr="[identification/@particulier_id] = '.$particulier_id.'"/>
					<condition expr="[identification/@nature_contrat_id] = 1"/>
				</where>
			</queryDef>';
		
			
			$reqLastEvents = '<queryDef operation="select" schema="pre:evenement" xtkschema="xtk:queryDef" lineCount="2">
			<select>
				<node expr="@Date_Evenement" alias="@Date_Evenement"/>
				<node expr="@MODE_EVENEMENT_Id" alias="@MODE_EVENEMENT_Id"/>
				<node expr="@MOTIF_EVENEMENT_Id" alias="@MOTIF_EVENEMENT_Id"/>
	
			</select>
				<where><condition expr="@particulier_id = '.$particulier_id.'"/></where>
				<orderBy><node expr="@Date_Evenement" sortDesc="true"/></orderBy>
			</queryDef>';
			
			$this->loadModel('XtkQueryDef');
			$this->request->data->domParticulier = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqParticulier);
			$this->request->data->domScores = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqScores);
			$this->request->data->domLastEvents = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqLastEvents);
			$this->request->data->domPointsAcquis = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqPointsAcquis);
			
			
			
			foreach($this->request->data->domParticulier->getElementsByTagName('recipient') as $particulier){			
				foreach($particulier->attributes as $attrName => $attrNode){
					$this->set($attrName, $attrNode->nodeValue);
				}
			}
			
			foreach($this->request->data->domPointsAcquis->getElementsByTagName('contrat') as $cont){
				foreach($cont->attributes as $attrName => $attrNode){
						$this->set($attrName, $attrNode->nodeValue);
				}
			}
			
			
		}else{
			$this->redirect('recipient/simulations');
		}
		
		
	}
	
	// Toute la partie mail ici
	function send_email($id_particulier, $nom_wf){			
		$this->loadModel('XtkWorkflow');
		$this->XtkWorkflow->PostEvent($this->Session->read('header'), $this->Session->read('sessionToken'),$nom_wf,'signal_pdf','','<variables recipientid=\''. $id_particulier .'\'/>',false);	
		$this->redirect('recipient/demandes_edition/' . $id_particulier);
	}
	
	function pdf_perso($id_particulier, $nom_wf){
		$req = '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef">
		<select>
			<node expr="[infos_individu/@ville_naissance]" alias="@ville_naissance"/>
			<node expr="[infos_individu/@statut_particulier]" alias="@statut_particulier"/>
			<node expr="[infos_individu/@situation_professionnelle_id]" alias="@situation_professionnelle_id"/>
			<node expr="[infos_individu/@situation_familiale_id]" alias="@situation_familiale_id"/>
			<node expr="[infos_individu/@firstName]" alias="@firstName"/>
			<node expr="[infos_individu/@lastName]" alias="@lastName"/>
			<node expr="[infos_individu/@pays_naissance]" alias="@pays_naissance"/>
			<node expr="[infos_individu/@nationalite]" alias="@nationalite"/>
			<node expr="[infos_individu/@num_insee]" alias="@num_insee"/>
			<node expr="[infos_individu/@num_cotisant]" alias="@num_cotisant"/>
			<node expr="[infos_individu/@nom_naissance]" alias="@nom_naissance"/>
			<node expr="[infos_individu/@qualite_id]" alias="@qualite_id"/>
			<node expr="[infos_individu/@dept_naissance]" alias="@dept_naissance"/>
			<node expr="[infos_individu/@tsBirth]" alias="@tsBirth"/>
			
			<node expr="[presouscription-particulier/@Classe_Cotisation]" alias="@Classe_Cotisation"/>
			
			<node expr="[adresse-particulier/@adresse_4]" alias="@adresse_4"/>
			<node expr="[adresse-particulier/@code_postal]" alias="@code_postal"/>
			<node expr="[adresse-particulier/@adresse_2]" alias="@adresse_2"/>
			<node expr="[adresse-particulier/@adresse_1]" alias="@adresse_1"/>
			<node expr="[adresse-particulier/@adresse_3]" alias="@adresse_3"/>
			<node expr="[adresse-particulier/@ville]" alias="@ville"/>
			<node expr="[adresse-particulier/@pays]" alias="@pays"/>
			
			
			<node expr="[contactabilite/@smobilephone]" alias="@smobilephone"/>
			<node expr="[contactabilite/@sphone]" alias="@sphone"/>
			<node expr="[contactabilite/@semail]" alias="@semail"/>

			
			<node expr="[conjoint/infos_individu/@lastName]" alias="@lastName_conjoint"/>
			<node expr="[conjoint/infos_individu/@firstName]" alias="@firstName_conjoint"/>
			
			
		</select>
			<where><condition expr="@id = '.$id_particulier.'"/></where>
		</queryDef>';
		
		$reqClasse = '<queryDef operation="select" schema="pre:contrat" xtkschema="xtk:queryDef">
			<select>
				<node expr="[contrat_retraite_cotisant/@classe]" alias="@classe"/>
			</select>
				<where>
					<condition expr="[identification/@particulier_id] = '.$id_particulier.'"/>
					<condition expr="[identification/@nature_contrat_id] = 1"/>
				</where>
			</queryDef>';
		
		$this->request->data = new stdClass();
		$this->loadModel('XtkQueryDef');
		$this->request->data->dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req);
		$this->request->data->domClasse = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqClasse);
		
		if($this->request->data->domClasse->getElementsByTagName('contrat')->item(0)->getAttribute('classe') > 0){
			$this->request->data->dom->getElementsByTagName('recipient')->item(0)->setAttribute('classe', $this->request->data->domClasse->getElementsByTagName('contrat')->item(0)->getAttribute('classe'));
		}
		
		
		if($this->request->data->dom->getElementsByTagName('recipient')->item(0) != null)
			pdf::perso($this->request->data->dom->getElementsByTagName('recipient')->item(0), $nom_wf);
		else
			$this->redirect('recipient/demandes_edition/' . $id_particulier);
	}
	
	
	function test(){	


	}
	


	function fusionner_dqe($particulier_id){
		  
			$req = '<recipient xtkschema="nms:recipient" id="'. $particulier_id .'" _key="@id"  _operation="insertOrUpdate">
						<infos_individu';
				
				if($this->request->data->qualite_id > 0){
					$req .= ' qualite_id="'.$this->request->data->qualite_id.'"';
				}
				if(strlen(trim($this->request->data->sFirstName)) > 0){
					$req .= ' firstName="'.$this->request->data->sFirstName.'"';
				}
				
				if(strlen(trim($this->request->data->Nom_Naissance)) > 0){
					$req .= ' nom_naissance="'.$this->request->data->Nom_Naissance.'"';
				}
				
				if(strlen(trim($this->request->data->sLastName)) > 0){
					$req .= ' lastName="'.$this->request->data->sLastName.'"';
				}
				
				if(strlen(trim($this->request->data->tsBirth)) > 0){
					$req .= ' tsBirth="'.lof::convertDateToAdobeFormat($this->request->data->tsBirth).'"';
				}
				
				if(strlen(trim($this->request->data->Dept_Naissance)) > 0){
					$req .= ' dept_naissance="'.$this->request->data->Dept_Naissance.'"';
				}
				
				if(strlen(trim($this->request->data->Pays_Naissance)) > 0){
					$req .= ' pays_naissance="'.$this->request->data->Pays_Naissance.'"';
				}
				
				if(strlen(trim($this->request->data->Ville_Naissance)) > 0){
					$req .= ' ville_naissance="'.$this->request->data->Ville_Naissance.'"';
				}
				
				if(strlen(trim($this->request->data->Annee_Entree_Corps)) > 0){
					$req .= ' annee_entree_corps="'.$this->request->data->Annee_Entree_Corps.'"';
				}
				
				if($this->request->data->SITUATION_FAMILIALE_Id > 0){
					$req .= ' situation_familiale_id="'.$this->request->data->SITUATION_FAMILIALE_Id.'"';
				}
				
				if(strlen(trim($this->request->data->Num_INSEE)) > 0){
					$req .= ' num_insee="'.$this->request->data->Num_INSEE.'"';
				}
				
				if($this->request->data->Id_Parrain > 0){
					$req .= ' id_parrain="'.$this->request->data->Id_Parrain.'"';
				}
				
				if($this->request->data->Id_Conjoint > 0){
					$req .= ' id_conjoint="'.$this->request->data->Id_Conjoint.'"';
				}
				
				if($this->request->data->Code_VIP >= 0){
					$req .= ' code_vip="'.$this->request->data->Code_VIP.'"';
				}
				
				if($this->request->data->SITUATION_PROFESSIONNELLE_Id > 0){
					$req .= ' situation_professionnelle_id="'.$this->request->data->SITUATION_PROFESSIONNELLE_Id.'"';
				}
				
				if($this->request->data->CATEGORIE_FONCTIONNAIRE_Id > 0){
					$req .= ' categorie_fonctionnaire_id="'.$this->request->data->CATEGORIE_FONCTIONNAIRE_Id.'"';
				}
		
				$req .= '/>
				<origine';
			
				if($this->request->data->ORIGINE_Id > 0){
					$req .= ' origine_id="'.$this->request->data->ORIGINE_Id.'"';
				}
				
				if($this->request->data->ORIGINE_Id > 0){
					$req .= ' sous_origine_id="'.$this->request->data->SOUS_ORIGINE_Id.'"';
				}
				
				$req .= '/>
				<infos_contrat';
				if($this->request->data->STATUT_AFFILIATION_Id > 0){
					$req .= ' statut_affiliation_id="'.$this->request->data->STATUT_AFFILIATION_Id.'"';
				}
				$req .= '/>
				<contactabilite';
				if(isset($this->request->data->Optin_Prefon_Courrier)){
					$req .= ' optin_prefon_courrier="'.$this->request->data->Optin_Prefon_Courrier.'"';
				}
				
				if(isset($this->request->data->Optin_Prefon_Telephone)){
					$req .= ' optin_prefon_telephone="'.$this->request->data->Optin_Prefon_Telephone.'"';
				}
				
				if(isset($this->request->data->Optin_Prefon_SMS)){
					$req .= ' optin_prefon_sms="'.$this->request->data->Optin_Prefon_SMS.'"';
				}
				
				if(isset($this->request->data->Optin_Prefon_Email)){
					$req .= ' optin_prefon_email="'.$this->request->data->Optin_Prefon_Email.'"';
				}
				
				if(isset($this->request->data->Optin_Partenaires)){
					$req .= ' optin_partenaires="'.$this->request->data->Optin_Partenaires.'"';
				}

				if(strlen($this->request->data->date_modif_section_optin) > 0){
					$req .= ' date_modif_section_optin="'.lof::convertDateToAdobeFormat($this->request->data->date_modif_section_optin).'"';
				}
				
				if(strlen(trim($this->request->data->sEmail)) > 0){
					$req .= ' semail="'.$this->request->data->sEmail.'"';
				}
				
				if(strlen(trim($this->request->data->email_pro)) > 0){
					$req .= ' email_pro="'.$this->request->data->email_pro.'"';
				}
				
				
				if(strlen(trim($this->request->data->sPhone)) > 0){
					$req .= ' sphone="'.$this->request->data->sPhone.'"';
				}
				
				if(strlen(trim($this->request->data->tel_fixe_pro)) > 0){
					$req .= ' tel_fixe_pro="'.$this->request->data->tel_fixe_pro.'"';
				}
				
				if(strlen(trim($this->request->data->sMobilePhone)) > 0){
					$req .= ' smobilephone="'.$this->request->data->sMobilePhone.'"';
				}
				
				if(strlen(trim($this->request->data->date_modif_section_tel_email)) > 0){
					$req .= ' date_modif_section_tel_email="'.lof::convertDateToAdobeFormat($this->request->data->date_modif_section_tel_email).'"';
				}
				
				if(strlen(trim($this->request->data->Libelle_Autre_Statut_Affiliation)) > 0){
					$req .= ' Libelle_Autre_Statut_Affiliation="'.$this->request->data->Libelle_Autre_Statut_Affiliation.'"';
				}
				
				if(strlen(trim($this->request->data->plage_horaire_preferee)) > 0 && $this->request->data->plage_horaire_preferee != '0'){
					$req .= ' plage_horaire_preferee="'.$this->request->data->plage_horaire_preferee.'"';
				}
			$req .= '
			/>
			
			<dqe
				export_dqe="0"
			/>
			
			</recipient>';
			
			// requête 2, update de la table adresse, la clé c'est le particulier_id
			$req2 = '<adresse xtkschema="pre:adresse" particulier_id="'. $particulier_id .'" _key="@particulier_id"  _operation="insertOrUpdate"';
				if(strlen(trim($this->request->data->Adresse_1)) > 0){
					$req2 .= ' adresse_1="'.$this->request->data->Adresse_1.'"';
				}
				if(strlen(trim($this->request->data->Adresse_2)) > 0){
					$req2 .= ' adresse_2="'.$this->request->data->Adresse_2.'"';
				}
				if(strlen(trim($this->request->data->Adresse_3)) > 0){
					$req2 .= ' adresse_3="'.$this->request->data->Adresse_3.'"';
				}
				if(strlen(trim($this->request->data->Adresse_4)) > 0){
					$req2 .= ' adresse_4="'.$this->request->data->Adresse_4.'"';
				}
				if(strlen(trim($this->request->data->Code_Postal)) > 0){
					$req2 .= ' code_postal="'.$this->request->data->Code_Postal.'"';
				}
				if(strlen(trim($this->request->data->Ville)) > 0){
					$req2 .= ' ville="'.$this->request->data->Ville.'"';
				}
				if(strlen(trim($this->request->data->Pays)) > 0){
					$req2 .= ' pays="'.$this->request->data->Pays.'"';
				}			
				$req2 .= '/>';
			
			// requête 3, update de la table particulier_data, la clé c'est le particulier_id
			$req3 = '<particulier_data xtkschema="pre:particulier_data" particulier_id="'. $particulier_id .'" _key="@particulier_id"  _operation="insertOrUpdate"';
				if(strlen(trim($this->request->data->Administration_Nom)) > 0){
					$req3 .= ' Administration_Nom="'.$this->request->data->Administration_Nom.'"';
				}	
				if(strlen(trim($this->request->data->Administration_Adresse_1)) > 0){
					$req3 .= ' Administration_Adresse_1="'.$this->request->data->Administration_Adresse_1.'"';
				}
				if(strlen(trim($this->request->data->Administration_Adresse_2)) > 0){
					$req3 .= ' Administration_Adresse_2="'.$this->request->data->Administration_Adresse_2.'"';
				}
				if(strlen(trim($this->request->data->Administration_Adresse_3)) > 0){
					$req3 .= ' Administration_Adresse_3="'.$this->request->data->Administration_Adresse_3.'"';
				}
				if(strlen(trim($this->request->data->Administration_Adresse_4)) > 0){
					$req3 .= ' Administration_Adresse_4="'.$this->request->data->Administration_Adresse_4.'"';
				}
				if(strlen(trim($this->request->data->Administration_CP)) > 0){
					$req3 .= ' Administration_CP="'.$this->request->data->Administration_CP.'"';
				}
				
				if(strlen(trim($this->request->data->Administration_Ville)) > 0){
					$req3 .= ' Administration_Ville="'.$this->request->data->Administration_Ville.'"';
				}
			
				if(strlen(trim($this->request->data->Administration_Pays)) > 0){
					$req3 .= ' Administration_Pays="'.$this->request->data->Administration_Pays.'"';
				}
				
				if($this->request->data->Placement_Assurance_Vie > 0){
					$req3 .= ' Placement_Assurance_Vie="'.$this->request->data->Placement_Assurance_Vie.'"';
				}
				
				if($this->request->data->Placement_PERP > 0){
					$req3 .= ' Placement_PERP="'.$this->request->data->Placement_PERP.'"';
				}
				
				if($this->request->data->Placement_Compte_Titre > 0){
					$req3 .= ' Placement_Compte_Titre="'.$this->request->data->Placement_Compte_Titre.'"';
				}
	
				if($this->request->data->Placement_Autre > 0){
					$req3 .= ' placement_autre="'.$this->request->data->Placement_Autre.'"';
				}
				
				if($this->request->data->Proprietaire_Locatif > 0){
					$req3 .= ' Proprietaire_Locatif="'.$this->request->data->Proprietaire_Locatif.'"';
				}
				
				if(strlen(trim($this->request->data->Nombre_Enfants)) > 0){
					$req3 .= ' Nombre_Enfants="'.$this->request->data->Nombre_Enfants.'"';
				}
			
				if(strlen(trim($this->request->data->Profession)) > 0){
					$req3 .= ' Profession="'.$this->request->data->Profession.'"';
				}
				
				if(strlen(trim($this->request->data->Libelle_Placement_Autre)) > 0){
					$req3 .= ' Libelle_Placement_Autre="'.$this->request->data->Libelle_Placement_Autre.'"';
				}
				
				if(strlen(trim($this->request->data->Occupation_Logement)) > 0){
					$req3 .= ' Occupation_Logement="'.$this->request->data->Occupation_Logement.'"';
				}
				
				if(strlen(trim($this->request->data->Tranche_Revenu)) > 0){
					$req3 .= ' Tranche_Revenu="'.$this->request->data->Tranche_Revenu.'"';
				}
				
				if(strlen(trim($this->request->data->annee_imposition)) > 0){
					$req3 .= ' annee_imposition="'.$this->request->data->annee_imposition.'"';
				}
				
				if(strlen(trim($this->request->data->capacite_epargne_mensuelle)) > 0){
					$req3 .= ' capacite_epargne_mensuelle="'.$this->request->data->capacite_epargne_mensuelle.'"';
				}
				
				if(strlen(trim($this->request->data->estimation_patrimoine_foyer)) > 0){
					$req3 .= ' estimation_patrimoine_foyer="'.$this->request->data->estimation_patrimoine_foyer.'"';
				}
				
				if(strlen(trim($this->request->data->impot_paye)) > 0){
					$req3 .= ' impot_paye="'.$this->request->data->impot_paye.'"';
				}								
			
				$req3 .= '/>';
			
			$this->loadModel('XtkSession');
			
			
			$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req);
			$res2 = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req2);
			$res3 = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req3);
			$this->redirect('recipient/edit/'. $particulier_id);
			
	}
	
	function imprimer_courrier_accompagnement($id_particulier){
		if(isset($id_particulier)){
			$reqParticulier = '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef">
			<select>
				<node expr="@id" alias="@id"/>
				<node expr="@created" alias="@created"/>
				<node expr="@lastModified" alias="@lastModified"/>
				<node expr="[infos_individu/@conseiller]" alias="@conseiller_creation"/>
				<node expr="[infos_individu/@statut_particulier]" alias="@statut_particulier"/>
				<node expr="[infos_individu/@sous_statut]" alias="@sous_statut"/>
				<node expr="[infos_individu/@firstName]" alias="@firstName"/>
				<node expr="[infos_individu/@nom_naissance]" alias="@nom_naissance"/>
				<node expr="[infos_individu/@lastName]" alias="@lastName"/>
				<node expr="[infos_individu/@qualite_id]" alias="@qualite_id"/>
				<node expr="[infos_individu/@tsBirth]" alias="@tsBirth"/>
				
				<node expr="[infos_contrat/@date_prospect_affilie]" alias="@date_prospect_affilie"/>
				
				
				<node expr="[adresse-particulier/@adresse_4]" alias="@adresse_4"/>
				<node expr="[adresse-particulier/@code_postal]" alias="@code_postal"/>
				<node expr="[adresse-particulier/@adresse_2]" alias="@adresse_2"/>
				<node expr="[adresse-particulier/@adresse_1]" alias="@adresse_1"/>
				<node expr="[adresse-particulier/@adresse_3]" alias="@adresse_3"/>
				<node expr="[adresse-particulier/@ville]" alias="@ville"/>
				<node expr="[adresse-particulier/@pays]" alias="@pays"/>
				
			</select>
				<where><condition expr="@id = '.$id_particulier.'"/></where>
			</queryDef>';
			
			$this->request->data = new stdClass();
			$this->loadModel('XtkQueryDef');
			$this->request->data->domParticulier = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqParticulier);
			pdf::imprimer_courrier_accompagnement($this->request->data->domParticulier->getELementsByTagName('recipient')->item(0));
		}else{
			$this->redirect('recipient/pre_aff/'.$id_particulier);
		}
	}
	

		
	
	
}
	
	


