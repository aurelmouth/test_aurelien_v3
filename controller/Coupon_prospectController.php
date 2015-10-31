<?php 
class Coupon_prospectController extends Controller{



    function search(){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		
		if(isset($_SESSION['created'])){
			unset($_SESSION['created']);
		}
		
		if(isset($_SESSION['event_added'])){
			unset($_SESSION['event_added']);
		}
		
		if(isset($_SESSION['conversion_reussie'])){
			unset($_SESSION['conversion_reussie']);
		}
		
		if(isset($_SESSION['converted'])){
			unset($_SESSION['converted']);
		}
		
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
    }

    function result(){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		
		if(isset($_SESSION['conversion_reussie'])){
			unset($_SESSION['conversion_reussie']);
		}
		
		if(isset($_SESSION['converted'])){
			unset($_SESSION['converted']);
		}
		
		if(isset($_SESSION['created'])){
			unset($_SESSION['created']);
		}
	
		if(isset($_SESSION['event_added'])){
			unset($_SESSION['event_added']);
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
            $req .= '<condition expr="@id = \''.trim($this->request->data->IRecipientId).'\'"/>';
		
        if ($this->request->data->sFirstName <> '')
            $req .= '<condition expr="(Upper([infos_individu/@firstName]) LIKE \''.addslashes(mb_strtoupper(lof::wd_remove_accents(trim($this->request->data->sFirstName)),'UTF-8')).'\' + \'%\') OR (Upper([infos_individu/@firstName]) LIKE \''.addslashes(mb_strtoupper(strtr(trim($this->request->data->sFirstName),lof::$listeValeurs['UNWANTED_CHARS']))).'\' + \'%\')"/>';

        if ($this->request->data->sLastName <> '')
            $req .= '<condition expr="(Upper([infos_individu/@nom_naissance]) LIKE \''.addslashes(mb_strtoupper(lof::wd_remove_accents(trim($this->request->data->sLastName)),'UTF-8')).'\' + \'%\') OR (Upper([infos_individu/@nom_naissance]) LIKE \''.addslashes(mb_strtoupper(strtr(trim($this->request->data->sLastName),lof::$listeValeurs['UNWANTED_CHARS']))).'\' + \'%\') OR (Upper([infos_individu/@lastName]) LIKE \''.addslashes(mb_strtoupper(lof::wd_remove_accents(trim($this->request->data->sLastName)),'UTF-8')).'\' + \'%\') OR (Upper([infos_individu/@lastName]) LIKE \''.addslashes(mb_strtoupper(strtr(trim($this->request->data->sLastName),lof::$listeValeurs['UNWANTED_CHARS']))).'\' + \'%\')"/>';

		if ($this->request->data->departement <> '')
            $req .= '<condition expr="Substring([adresse-particulier/@code_postal],1 ,2 ) IN ('.trim($resultat).')"/>';
		
        if ($this->request->data->tsBirth <> '' && strlen(trim($this->request->data->tsBirth)) == 10){
            $req .= '<condition expr="[infos_individu/@tsBirth]=\''. lof::convertDateToAdobeFormat(trim($this->request->data->tsBirth)) .'\'"/>';
		}

        if (trim($this->request->data->sEmail) <> '')
            $req .= '<condition expr="Upper([contactabilite/@semail]) LIKE \'%\' + \''.mb_strtoupper(trim($this->request->data->sEmail)).'\' + \'%\'"/>';
		
		
		
		
		$select = '<select>
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
                <node expr="[contactabilite/@iblacklist]" alias="@iblacklist"/>
            </select>';
		
			$req = '<condition expr="@id > 0"/>' . $req;
			$select .=          
            '<where>
                '.$req.'
            </where>';
			

		//echo htmlentities($select);
		//echo mb_strtoupper('mélanie','UTF-8');
		//exit();
		 
		
        // Recherche des particuliers répondant aux critères de recherche
        $this->loadModel('XtkQueryDef');
        $this->request->data->dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), '<queryDef operation="select" schema="nms:recipient" lineCount="300" xtkschema="xtk:queryDef">' . $select . '</queryDef>');
    }
	
	
	
	function convertir_prospect($id_particulier){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		
		if(isset($_SESSION['created'])){
			unset($_SESSION['created']);
		}
		if(isset($_SESSION['conversion_reussie'])){
			unset($_SESSION['conversion_reussie']);
		}
	
		if(isset($_SESSION['converted'])){
			unset($_SESSION['converted']);
		}
		
		if(isset($id_particulier)){
				$req = '<recipient xtkschema="nms:recipient" id="'. $id_particulier .'" _key="@id"  _operation="insertOrUpdate">
					<infos_individu
						statut_particulier="2"
					/>
					</recipient>';

				$this->loadModel('XtkSession');
				$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req);
				if($res){
					$_SESSION['conversion_reussie'] = 'yes';
					$this->redirect('coupon_prospect/saisie_coupon/' . $id_particulier);
				}
		}else{
			$this->redirect('pages/index');
		}
	}
		
	function stop_com($id_particulier){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
			$req = '<recipient xtkschema="nms:recipient" id="'. $id_particulier .'" _key="@id"  _operation="insertOrUpdate">
				<contactabilite
					optin_prefon_courrier="0"
					optin_prefon_telephone="0"
					optin_prefon_sms="0"
					optin_prefon_email="0"
					optin_partenaires="0"			
				/>
					
			</recipient>';
			$this->loadModel('XtkSession');
			$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req);
			if($res){
				$this->redirect('coupon_prospect/search');
			}		
	
	}
		
	
	function saisie_coupon($id_particulier = null){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		$date_jour = getdate();
		$id_crm_temp = $this->Session->read('username').$date_jour['seconds'].$date_jour['minutes'].$date_jour['hours'].$date_jour['mday'].$date_jour['mon'].$date_jour['year'];

		if($this->request->data){

			if(isset($id_particulier)){
					//si l'id et les données existent, c'est un update
				$req = '<recipient xtkschema="nms:recipient" id="'. $id_particulier .'" _key="@id"  _operation="insertOrUpdate">
					<infos_individu
					qualite_id="'.$this->request->data->qualite_id.'"
					firstName="'.trim($this->request->data->sFirstName).'"
					nom_naissance="'.trim($this->request->data->Nom_Naissance).'"
					lastName="'.trim($this->request->data->sLastName).'"
					tsBirth="'. lof::convertDateToAdobeFormat(trim($this->request->data->tsBirth)) .'"
					num_insee="'.trim($this->request->data->Num_INSEE).'" 
					id_parrain="'.$this->request->data->Id_Parrain.'"
					/>

					<origine
					origine_id="'.$this->request->data->ORIGINE_Id.'"
					sous_origine_id="'.$this->request->data->SOUS_ORIGINE_Id.'"
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
					adresse_pnd_o_n="'.$this->request->data->Adresse_PND_O_N.'"	
								
					/>
					
					<dqe
						export_dqe="0"
					/>
							
					</recipient>';
				
				// requête 2, update de la table adresse, la clé c'est le particulier_id
				$req2 = '<adresse xtkschema="pre:adresse" particulier_id="'. $id_particulier .'" _key="@particulier_id"  _operation="insertOrUpdate" 
					adresse_1="'.trim($this->request->data->Adresse_1).'"
					adresse_2="'.trim($this->request->data->Adresse_2).'"
					adresse_3="'.trim($this->request->data->Adresse_3).'"
					adresse_4="'.trim($this->request->data->Adresse_4).'"
					code_postal="'.trim($this->request->data->Code_Postal).'"
					ville="'.trim($this->request->data->Ville).'"
					pays="'.trim($this->request->data->Pays).'"			
				/>';
				$this->loadModel('XtkSession');
				$this->request->data->dom = new stdClass();
				$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req);
				$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req2);
				if($res){
					
					$date_rappel='';
					if($this->request->data->rappel){
						if(date('N', strtotime("+10 days")) == 6){
							$date_rappel =  date('Y-m-d', strtotime("+12 days"));
						}else if(date('N', strtotime("+10 days")) == 7){
							$date_rappel =  date('Y-m-d', strtotime("+11 days"));
						}else{
							$date_rappel =  date('Y-m-d', strtotime("+10 days"));
						}
					}
					

					$req2 = '<evenement xtkschema="pre:evenement"  _operation="insert"
					Date_Evenement="'. date('Y-m-d H:i:s')  .'"
					LIEU_Id="'. $_SESSION['conseillerEnLigne']['lieu_evenement'] .'"
					CONSEILLER="'. $_SESSION['conseillerEnLigne']['label'].'"
					MODE_EVENEMENT_Id="9"
					MOTIF_EVENEMENT_Id="'. (($this->request->data->Id_Parrain > 0) ? '17' : '1') .'"
					EnvoyerKitAffiliation="1"
					envoi_courrier="'.(($this->request->data->Id_Parrain > 0) ? '1' : '0').'"
					RESULTAT_EVENEMENT_Id=""
					Date_Rappel="'. $date_rappel . '"
					particulier_id="'. $id_particulier .'"
					>
					<Commentaire>'. '' . '</Commentaire>

					</evenement>';
					$this->loadModel('XtkSession');
					$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req2);
					
					if($res){
						if($this->request->data->Id_Parrain == 0 || $this->request->data->Id_Parrain == ""){
							$this->loadModel('XtkWorkflow');
							$this->XtkWorkflow->PostEvent($this->Session->read('header'), $this->Session->read('sessionToken'),'pre_camp_recur_envoi_email_pack_souscription','signal','','<variables recipientid=\''. $id_particulier .'\'/>',false);	
						}
						if(isset($_SESSION['conversion_reussie'])){
							$_SESSION['converted'] = "yes";
							$this->redirect('coupon_prospect/saisie_coupon/' . $id_particulier);
						}else{
								$_SESSION['event_added'] = 'YES';
								$this->redirect('coupon_prospect/saisie_coupon/' . $id_particulier);
						}
					}else{
						$this->redirect('coupon_prospect/search');
					}
					
				}else{
					$this->redirect('coupon_prospect/search');
				}
			}else{
				//si l'id n'existe pas, c'est un insert
				$req = '<recipient xtkschema="nms:recipient"  _operation="insert">
				<infos_individu
				qualite_id="'.$this->request->data->qualite_id.'"
				firstName="'.trim($this->request->data->sFirstName).'"
				nom_naissance="'.trim($this->request->data->Nom_Naissance).'"
				lastName="'.trim($this->request->data->sLastName).'"
				tsBirth="'. lof::convertDateToAdobeFormat(trim($this->request->data->tsBirth)) .'"
				num_insee="'.trim($this->request->data->Num_INSEE).'"
				statut_particulier="2" 
				id_parrain="'.$this->request->data->Id_Parrain.'"
					id_crm_temp="'.$id_crm_temp.'"							
				/>
			
				<origine
					origine_id="'.$this->request->data->ORIGINE_Id.'"
					sous_origine_id="'.$this->request->data->SOUS_ORIGINE_Id.'"
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
				adresse_pnd_o_n="'.trim($this->request->data->Adresse_PND_O_N).'"	
							
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
			</recipient>';

						

				$this->loadModel('XtkSession');
				$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req);
				
				if($res){

					
					$this->loadModel('XtkQueryDef');
					$dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef"><select><node expr="@id"/></select><where><condition expr="[infos_individu/@id_crm_temp] = \''.$id_crm_temp.'\'"/></where></queryDef>');
					foreach($dom->getElementsByTagName('recipient') as $recip){
						$this->request->data->id = $recip->getAttribute("id");
					}
					
					
					$date_rappel='';
					if($this->request->data->rappel){
						if(date('N', strtotime("+10 days")) == 6){
							$date_rappel =  date('Y-m-d', strtotime("+12 days"));
						}else if(date('N', strtotime("+10 days")) == 7){
							$date_rappel =  date('Y-m-d', strtotime("+11 days"));
						}else{
							$date_rappel =  date('Y-m-d', strtotime("+10 days"));
						}
					}
					
					
					$req2 = '<evenement xtkschema="pre:evenement"  _operation="insert"
					Date_Evenement="'. date('Y-m-d H:i:s')  .'"
					LIEU_Id="'. $_SESSION['conseillerEnLigne']['lieu_evenement'] .'"
					CONSEILLER="'. $_SESSION['conseillerEnLigne']['label'].'"
					MODE_EVENEMENT_Id="9"
					MOTIF_EVENEMENT_Id="'. (($this->request->data->Id_Parrain > 0) ? '17' : '1') .'"
					EnvoyerKitAffiliation="1"
					envoi_courrier="'.(($this->request->data->Id_Parrain > 0) ? '1' : '0').'"
					RESULTAT_EVENEMENT_Id=""
					Date_Rappel="'. $date_rappel .'"
					particulier_id="'. $this->request->data->id .'"
					>
					<Commentaire>'. '' . '</Commentaire>

					</evenement>';
					$this->loadModel('XtkSession');
					$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req2);
					if($res){
						if($this->request->data->Id_Parrain == 0 || $this->request->data->Id_Parrain == ""){
							$this->loadModel('XtkWorkflow');
							$this->XtkWorkflow->PostEvent($this->Session->read('header'), $this->Session->read('sessionToken'),'pre_camp_recur_envoi_email_pack_souscription','signal','','<variables recipientid=\''. $this->request->data->id .'\'/>',false);	
						}
						$_SESSION['created'] = 'yes';
						$this->redirect('coupon_prospect/saisie_coupon/' . $this->request->data->id);
					}
				}
			}
						
		}else{
				if(isset($id_particulier)){
					$req = '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef">
					<select>
						<node expr="[infos_individu/@firstName]" alias="@firstName"/>
						<node expr="[infos_individu/@lastName]" alias="@lastName"/>
						<node expr="[infos_individu/@num_insee]" alias="@num_insee"/>
						<node expr="[infos_individu/@nom_naissance]" alias="@nom_naissance"/>
						<node expr="[infos_individu/@qualite_id]" alias="@qualite_id"/>
						<node expr="[infos_individu/@tsBirth]" alias="@tsBirth"/>
						<node expr="[infos_individu/@id_parrain]" alias="@id_parrain"/>
						
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
						
						<node expr="[parrain/infos_individu/@lastName]" alias="@lastName_parrain"/>
						<node expr="[parrain/infos_individu/@lastName]" alias="@firstName_parrain"/>

						
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
							
						
							if($attrName == 'nationalite'){
								if($attrNode->nodeValue == ''){
									$this->set('nationalite', 'France');
								}
							}
						}
					}
				}else{
					if($_SESSION['conseillerEnLigne']['droits'] < 3){
						$this->redirect('search/search');
					}
					
					
					if($_SESSION['conseillerEnLigne']['partenaires'] > 0){
						$this->set('origine_id', '117');
						$this->set('sous_origine_id', $_SESSION['conseillerEnLigne']['partenaires']);
					}

					$this->set('pays', 'France');

				}
			}
		}

}