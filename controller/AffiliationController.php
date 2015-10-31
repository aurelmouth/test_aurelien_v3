<?php 
class AffiliationController extends Controller{
	
	
	
	function result(){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }

		$req = '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef">
					<select>
						<node expr="@id"/> 
						<node expr="@created" alias="@created"/>
						<node expr="[infos_individu/@lastName]" alias="@lastName"/>
						<node expr="[infos_individu/@statut_particulier]" alias="@statut_particulier"/>
						<node expr="[infos_individu/@sous_statut]" alias="@sous_statut"/>
						<node expr="[infos_individu/@firstName]" alias="@firstName"/>
						<node expr="[infos_individu/@tsBirth]" alias="@tsBirth"/>
						<node expr="[adresse-particulier/@adresse_3]" alias="@adresse_3"/>
						<node expr="[adresse-particulier/@code_postal]" alias="@code_postal"/>
						<node expr="[adresse-particulier/@ville]" alias="@ville"/>
						<node expr="[evenement-particulier]">
						<node expr="@Date_Evenement"/>
						<node expr="@id"/>
							<where>
								<condition expr="@MOTIF_EVENEMENT_Id = 20" />
							</where>
							<orderBy>
								<node expr="@Date_Evenement" sortDesc="true"/>
							</orderBy>
						</node>
					</select>
					<where>
						<condition expr="@id > 0"/>
						<condition expr="[infos_individu/@statut_particulier] = 2"/>
						<condition expr="([infos_individu/@sous_statut] = 6) OR ([infos_individu/@sous_statut] = 8)"/>

						
					</where>
				</queryDef>';

			
			
				$this->request->data = new stdClass();
				$this->loadModel('XtkQueryDef');
				$this->request->data->dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req);

				
				/*
				echo htmlentities($this->request->data->dom->saveXML());
				exit();
				
				echo '<br><br>';
				foreach($this->request->data->dom->getElementsByTagName('recipient') as $recip){			
					foreach($recip->attributes as $attrName => $attrNode){
						echo $attrName . ' => ' . $attrNode->nodeValue . '<br>';
					}
				
				echo 'Date_evenemet => ' . $recip->getElementsByTagName('evenement-particulier')->item(0)->getAttribute('Date_Evenement') . '<br>';
				
	
				}
		*/
	}
	
	
	function ba_refuse($id_particulier, $id_evenement){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		$req = '<recipient xtkschema="nms:recipient" id="'. $id_particulier .'" _key="@id"  _operation="insertOrUpdate">
			<infos_individu
				sous_statut="7"
			/>
			<infos_contrat
			  date_prospect_affilie = ""
			 />
			</recipient>';
		
			$req2 = '<evenement xtkschema="pre:evenement" id="' . $id_evenement . '" _key="@id" _operation="update"
			RESULTAT_EVENEMENT_Id="2"
			MOTIF_EVENEMENT_Id="99"
			>
			<Commentaire> Annulation le ' .date('d/m/Y') . '</Commentaire>

			</evenement>';
			$this->loadModel('XtkSession');
			$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req);
			$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req2);
			$this->redirect('affiliation/result');
	}	
	
	function saisir_ba($id_particulier){

		if($this->request->data){
			$sous_statut = 0;
			$date_saisie = '';
			if(isset($this->request->data->valider)){
				$sous_statut = 9;
				$date_saisie_affiliation = date('Y-m-d H:i:s');
			}else{
				$sous_statut = 8;
			}
			
			// récupérer le IBAN champ par champ et l'affecter à une seule variable pour pourvoir le stocker
			$mandat_iban = '';
			for($i=1; $i<=7; $i++){
				$name="Mandat_IBAN" . $i;
				$mandat_iban .= $this->request->data->$name;
			}
			
			$req = '<recipient xtkschema="nms:recipient" id="'. $id_particulier .'" _key="@id"  _operation="insertOrUpdate">
				<infos_individu
					sous_statut="'.$sous_statut.'"
					qualite_id="'.$this->request->data->qualite_id.'"
					tsBirth="'. lof::convertDateToAdobeFormat(trim($this->request->data->tsBirth)) .'"
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
					num_insee="'.trim($this->request->data->Num_INSEE).'"
					categorie_fonctionnaire_id="'.$this->request->data->CATEGORIE_FONCTIONNAIRE_Id.'"
					Residence_Fiscale_Francaise="'.$this->request->data->Residence_Fiscale_Francaise.'"
					Majeur_Protege="'.$this->request->data->Majeur_Protege.'"
				/>
				
				<infos_contrat
					statut_affiliation_id="'.$this->request->data->STATUT_AFFILIATION_Id.'"
					date_saisie = "' . $date_saisie_affiliation .'"
				/>
				
				<contactabilite
					optin_prefon_courrier="'.$this->request->data->Optin_Prefon_Courrier.'"
					optin_prefon_telephone="'.$this->request->data->Optin_Prefon_Telephone.'"
					optin_prefon_sms="'.$this->request->data->Optin_Prefon_SMS.'"
					optin_prefon_email="'.$this->request->data->Optin_Prefon_Email.'"
					optin_partenaires="'.$this->request->data->Optin_Partenaires.'"
					semail="'.trim($this->request->data->sEmail).'"
					sphone="'.trim($this->request->data->sPhone).'"
					smobilephone="'.trim($this->request->data->sMobilePhone).'"
					Libelle_Autre_Statut_Affiliation="'.trim($this->request->data->Libelle_Autre_Statut_Affiliation).'"					
				/>
				
				<dqe
					export_dqe="0"
				/>
				
		</recipient>';
			
			$req2 = '<adresse xtkschema="pre:adresse" particulier_id="'. $id_particulier .'" _key="@particulier_id"  _operation="insertOrUpdate" 
				adresse_1="'.trim($this->request->data->Adresse_1).'"
				adresse_2="'.trim($this->request->data->Adresse_2).'"
				adresse_3="'.trim($this->request->data->Adresse_3).'"
				adresse_4="'.trim($this->request->data->Adresse_4).'"
				code_postal="'.trim($this->request->data->Code_Postal).'"
				ville="'.trim($this->request->data->Ville).'"
				pays="'.trim($this->request->data->Pays).'"			
			/>';
			
			
			$req3 = '<particulier_data xtkschema="pre:particulier_data" particulier_id="'. $id_particulier .'" _key="@particulier_id"  _operation="insertOrUpdate" 
				Administration_Nom="'.trim($this->request->data->Administration_Nom).'"
				Administration_Adresse_1="'.trim($this->request->data->Administration_Adresse_1).'"
				Administration_Adresse_2="'.trim($this->request->data->Administration_Adresse_2).'"
				Administration_Adresse_3="'.trim($this->request->data->Administration_Adresse_3).'"
				Administration_Adresse_4="'.trim($this->request->data->Administration_Adresse_4).'"
				Administration_CP="'.trim($this->request->data->Administration_CP).'"
				Administration_Ville="'.trim($this->request->data->Administration_Ville).'"
				Administration_Pays="'.trim($this->request->data->Administration_Pays).'"				
			/>';
			
			
			$req4 = '<presouscription xtkschema="pre:presouscription" PARTICULIER_Id="'. $id_particulier .'" _key="@PARTICULIER_Id"  _operation="insertOrUpdate" 
				Classe_Cotisation="'.$this->request->data->Classe_Cotisation.'"
				MODE_REGLEMENT_RETRAITE_COTISANT_Id="'.$this->request->data->MODE_REGLEMENT_RETRAITE_COTISANT_Id.'"
				Montant_Cotisation_Annuelle="'.trim($this->request->data->Montant_Cotisation_Annuelle).'"
				Mois_Debut_Prelevement="'.$this->request->data->Mois_Debut_Prelevement.'"
				Transfert_Contrat="'.$this->request->data->Transfert_Contrat.'"
				Nb_Annees_Rachat="'.$this->request->data->Nb_Annees_Rachat.'"
				Reversion="'.$this->request->data->Reversion.'"							
				Mandat_IBAN="'.trim($mandat_iban).'"				
				Mandat_BIC="'.trim($this->request->data->Mandat_BIC).'"											
				Montant_Versement_Exceptionnel="'.floatval(str_replace(' ', '', str_replace(',', '.', trim($this->request->data->Montant_Versement_Exceptionnel)))).'"											
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
				if(isset($this->request->data->valider))
					$this->redirect('affiliation/result');
				else
					$this->redirect('affiliation/saisir_ba/' . $id_particulier);
			}
			
		}else{
			// Requete de sous statut, savoir si je met le statut et la date à jour ou pas
			$reqStatut = '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef">
			<select>
				<node expr="[infos_individu/@sous_statut]" alias="@sous_statut"/>				
			</select>
				<where><condition expr="@id = '.$id_particulier.'"/></where>
			</queryDef>';
			$this->request->data = new stdClass();
			$this->loadModel('XtkQueryDef');
			$this->request->data->dom_sous_statut = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $reqStatut);
			

					
			$sous_statut_particulier = $this->request->data->dom_sous_statut->getElementsByTagName('recipient')->item(0)->getAttribute('sous_statut');
			
			
			if($sous_statut_particulier == 6){
				$reqBAenInstance = '<recipient xtkschema="nms:recipient" id="'. $id_particulier .'" _key="@id"  _operation="insertOrUpdate">
				<infos_individu
					sous_statut="8"
				/>
				<infos_contrat
					date_prospect_affilie = "' . date('Y-m-d H:i:s') .'"
				 />
				</recipient>';
				$this->loadModel('XtkSession');
				$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $reqBAenInstance);
			}
			
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
				<where><condition expr="@id = '.$id_particulier.'"/></where>
			</queryDef>';
			
			

			
			$this->request->data = new stdClass();
			$this->loadModel('XtkQueryDef');
			$this->request->data->dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req);
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

	function imprimer_precompte($id_particulier){
		if(isset($id_particulier)){
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
				
				<node expr="[presouscription-particulier/@Classe_Cotisation]" alias="@Classe_Cotisation"/>
				
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
			pdf::imprimer_precompte($this->request->data->domParticulier->getELementsByTagName('recipient')->item(0));
		}else{
			$this->redirect('affiliation/result');
		}
	}
	
	function details(){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }

	}

}