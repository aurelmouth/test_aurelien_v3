<?php

	$nom="PIERRE";
	$cp="13270";
	
	//$nom=$_POST['nom'];
	//$cp=$_POST['code_postal'];

	ini_set("soap.wsdl_cache_enabled","0");
	$client = new SoapClient("http://37.187.131.231:7290/wsdl", array("trace" => 1, "soap_version" => SOAP_1_1));
	//$candidate = array("sLastName"=> $_POST['sLastName'], "Code_Postal"=>$_POST['Code_Postal']);
	//$candidate = array("sLastName"=>"PIERRE", "Code_Postal"=>"95000");
	
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$nom_naissance = (strlen($_POST['nom_naissance']) > 0) ? $_POST['nom_naissance']: $_POST['nom'];
	$code_postal = $_POST['code_postal'];
	
	$str = '';
	
	$str .= '<DQE>';
	$str .= '<CANDIDATES>';
	
	$tab = array();
	
	$candidate = array("sLastName"=>$nom, "sFirstName"=>$prenom, "Code_Postal"=>$code_postal);
	$res = $client->LookupCandidate(array("CandidateToLookup"=>$candidate, "MaxReturnedCandidates"=>"10"));
	if(isset($res->CandidateList->Candidate)){
		if(isset($res->CandidateList->Candidate->Statut_particulier)){
				$cand = $res->CandidateList->Candidate;
				if(intval($_SESSION['conseillerEnLigne']['partenaires']) > 0){
					if($cand->Statut_particulier == '2'){
						if($cand->ORIGINE_Id == '117' && $cand->SOUS_ORIGINE_Id == $_SESSION['conseillerEnLigne']['partenaires']){
							if(!isset($tab[$cand->IRecipientId])){
								$tab[$cand->IRecipientId] = '';
								$str .= '<CANDIDATE>';
								$str .= '<STATUT_PARTICULIER>' . $cand->Statut_particulier . '</STATUT_PARTICULIER>';
								$str .= '<ID>' . $cand->IRecipientId . '</ID>';
								$str .= '<SFIRSTNAME>' . $cand->sFirstName . '</SFIRSTNAME>';
								$str .= '<SLASTNAME>' . $cand->sLastName . '</SLASTNAME>';
								$str .= '<TSBIRTH>' . $cand->tsBirth . '</TSBIRTH>';
								$str .= '<ADRESSE_3>' . $cand->Adresse_3 . '</ADRESSE_3>';
								$str .= '<CODE_POSTAL>' . $cand->Code_Postal . '</CODE_POSTAL>';
								$str .= '<VILLE>' . $cand->Ville . '</VILLE>';
								$str .= '<CREATED>' . $cand->tsCreated . '</CREATED>';
								$str .= '</CANDIDATE>';
							}
						}
					}else{
						if(!isset($tab[$cand->IRecipientId])){
							$tab[$cand->IRecipientId] = '';
							$str .= '<CANDIDATE>';
							$str .= '<STATUT_PARTICULIER>' . $cand->Statut_particulier . '</STATUT_PARTICULIER>';
							$str .= '<ID>' . $cand->IRecipientId . '</ID>';
							$str .= '<SFIRSTNAME>' . $cand->sFirstName . '</SFIRSTNAME>';
							$str .= '<SLASTNAME>' . $cand->sLastName . '</SLASTNAME>';
							$str .= '<TSBIRTH>' . $cand->tsBirth . '</TSBIRTH>';
							$str .= '<ADRESSE_3>' . $cand->Adresse_3 . '</ADRESSE_3>';
							$str .= '<CODE_POSTAL>' . $cand->Code_Postal . '</CODE_POSTAL>';
							$str .= '<VILLE>' . $cand->Ville . '</VILLE>';
							$str .= '<CREATED>' . $cand->tsCreated . '</CREATED>';
							$str .= '</CANDIDATE>';
						}
					}
				}else{
					if(!($cand->Statut_particulier == 2 && $cand->ORIGINE_Id == 117)){
						if(!isset($tab[$cand->IRecipientId])){
							$tab[$cand->IRecipientId] = '';
							$str .= '<CANDIDATE>';
							$str .= '<STATUT_PARTICULIER>' . $cand->Statut_particulier . '</STATUT_PARTICULIER>';
							$str .= '<ID>' . $cand->IRecipientId . '</ID>';
							$str .= '<SFIRSTNAME>' . $cand->sFirstName . '</SFIRSTNAME>';
							$str .= '<SLASTNAME>' . $cand->sLastName . '</SLASTNAME>';
							$str .= '<TSBIRTH>' . $cand->tsBirth . '</TSBIRTH>';
							$str .= '<ADRESSE_3>' . $cand->Adresse_3 . '</ADRESSE_3>';
							$str .= '<CODE_POSTAL>' . $cand->Code_Postal . '</CODE_POSTAL>';
							$str .= '<VILLE>' . $cand->Ville . '</VILLE>';
							$str .= '<CREATED>' . $cand->tsCreated . '</CREATED>';
							$str .= '</CANDIDATE>';
						}
					}
				}
		}else{
			foreach($res->CandidateList->Candidate as $cand){
				if(intval($_SESSION['conseillerEnLigne']['partenaires']) > 0){
					if($cand->Statut_particulier == '2'){
						if($cand->ORIGINE_Id == '117' && $cand->SOUS_ORIGINE_Id == $_SESSION['conseillerEnLigne']['partenaires']){
							if(!isset($tab[$cand->IRecipientId])){
								$tab[$cand->IRecipientId] = '';
								$str .= '<CANDIDATE>';
								$str .= '<STATUT_PARTICULIER>' . $cand->Statut_particulier . '</STATUT_PARTICULIER>';
								$str .= '<ID>' . $cand->IRecipientId . '</ID>';
								$str .= '<SFIRSTNAME>' . $cand->sFirstName . '</SFIRSTNAME>';
								$str .= '<SLASTNAME>' . $cand->sLastName . '</SLASTNAME>';
								$str .= '<TSBIRTH>' . $cand->tsBirth . '</TSBIRTH>';
								$str .= '<ADRESSE_3>' . $cand->Adresse_3 . '</ADRESSE_3>';
								$str .= '<CODE_POSTAL>' . $cand->Code_Postal . '</CODE_POSTAL>';
								$str .= '<VILLE>' . $cand->Ville . '</VILLE>';
								$str .= '<CREATED>' . $cand->tsCreated . '</CREATED>';
								$str .= '</CANDIDATE>';
							}
						}
					}else{
						if(!isset($tab[$cand->IRecipientId])){
							$tab[$cand->IRecipientId] = '';
							$str .= '<CANDIDATE>';
							$str .= '<STATUT_PARTICULIER>' . $cand->Statut_particulier . '</STATUT_PARTICULIER>';
							$str .= '<ID>' . $cand->IRecipientId . '</ID>';
							$str .= '<SFIRSTNAME>' . $cand->sFirstName . '</SFIRSTNAME>';
							$str .= '<SLASTNAME>' . $cand->sLastName . '</SLASTNAME>';
							$str .= '<TSBIRTH>' . $cand->tsBirth . '</TSBIRTH>';
							$str .= '<ADRESSE_3>' . $cand->Adresse_3 . '</ADRESSE_3>';
							$str .= '<CODE_POSTAL>' . $cand->Code_Postal . '</CODE_POSTAL>';
							$str .= '<VILLE>' . $cand->Ville . '</VILLE>';
							$str .= '<CREATED>' . $cand->tsCreated . '</CREATED>';
							$str .= '</CANDIDATE>';
						}
					}
				}else{
					if(!($cand->Statut_particulier == 2 && $cand->ORIGINE_Id == 117)){
						if(!isset($tab[$cand->IRecipientId])){
							$tab[$cand->IRecipientId] = '';
							$str .= '<CANDIDATE>';
							$str .= '<STATUT_PARTICULIER>' . $cand->Statut_particulier . '</STATUT_PARTICULIER>';
							$str .= '<ID>' . $cand->IRecipientId . '</ID>';
							$str .= '<SFIRSTNAME>' . $cand->sFirstName . '</SFIRSTNAME>';
							$str .= '<SLASTNAME>' . $cand->sLastName . '</SLASTNAME>';
							$str .= '<TSBIRTH>' . $cand->tsBirth . '</TSBIRTH>';
							$str .= '<ADRESSE_3>' . $cand->Adresse_3 . '</ADRESSE_3>';
							$str .= '<CODE_POSTAL>' . $cand->Code_Postal . '</CODE_POSTAL>';
							$str .= '<VILLE>' . $cand->Ville . '</VILLE>';
							$str .= '<CREATED>' . $cand->tsCreated . '</CREATED>';
							$str .= '</CANDIDATE>';
						}
					}
				}
			}
		}
		
	}
	
	
	$candidate = array("Nom_Naissance"=>$nom, "sFirstName"=>$prenom, "Code_Postal"=>$code_postal);
	$res = $client->LookupCandidate(array("CandidateToLookup"=>$candidate, "MaxReturnedCandidates"=>"10"));
	if(isset($res->CandidateList->Candidate)){
		if(isset($res->CandidateList->Candidate->Statut_particulier)){
				$cand = $res->CandidateList->Candidate;
				if(intval($_SESSION['conseillerEnLigne']['partenaires']) > 0){
					if($cand->Statut_particulier == '2'){
						if($cand->ORIGINE_Id == '117' && $cand->SOUS_ORIGINE_Id == $_SESSION['conseillerEnLigne']['partenaires']){
							if(!isset($tab[$cand->IRecipientId])){
								$tab[$cand->IRecipientId] = '';
								$str .= '<CANDIDATE>';
								$str .= '<STATUT_PARTICULIER>' . $cand->Statut_particulier . '</STATUT_PARTICULIER>';
								$str .= '<ID>' . $cand->IRecipientId . '</ID>';
								$str .= '<SFIRSTNAME>' . $cand->sFirstName . '</SFIRSTNAME>';
								$str .= '<SLASTNAME>' . $cand->sLastName . '</SLASTNAME>';
								$str .= '<TSBIRTH>' . $cand->tsBirth . '</TSBIRTH>';
								$str .= '<ADRESSE_3>' . $cand->Adresse_3 . '</ADRESSE_3>';
								$str .= '<CODE_POSTAL>' . $cand->Code_Postal . '</CODE_POSTAL>';
								$str .= '<VILLE>' . $cand->Ville . '</VILLE>';
								$str .= '<CREATED>' . $cand->tsCreated . '</CREATED>';
								$str .= '</CANDIDATE>';
							}
						}
					}else{
						if(!isset($tab[$cand->IRecipientId])){
							$tab[$cand->IRecipientId] = '';
							$str .= '<CANDIDATE>';
							$str .= '<STATUT_PARTICULIER>' . $cand->Statut_particulier . '</STATUT_PARTICULIER>';
							$str .= '<ID>' . $cand->IRecipientId . '</ID>';
							$str .= '<SFIRSTNAME>' . $cand->sFirstName . '</SFIRSTNAME>';
							$str .= '<SLASTNAME>' . $cand->sLastName . '</SLASTNAME>';
							$str .= '<TSBIRTH>' . $cand->tsBirth . '</TSBIRTH>';
							$str .= '<ADRESSE_3>' . $cand->Adresse_3 . '</ADRESSE_3>';
							$str .= '<CODE_POSTAL>' . $cand->Code_Postal . '</CODE_POSTAL>';
							$str .= '<VILLE>' . $cand->Ville . '</VILLE>';
							$str .= '<CREATED>' . $cand->tsCreated . '</CREATED>';
							$str .= '</CANDIDATE>';
						}
					}
				}else{
					if(!($cand->Statut_particulier == 2 && $cand->ORIGINE_Id == 117)){
						if(!isset($tab[$cand->IRecipientId])){
							$tab[$cand->IRecipientId] = '';
							$str .= '<CANDIDATE>';
							$str .= '<STATUT_PARTICULIER>' . $cand->Statut_particulier . '</STATUT_PARTICULIER>';
							$str .= '<ID>' . $cand->IRecipientId . '</ID>';
							$str .= '<SFIRSTNAME>' . $cand->sFirstName . '</SFIRSTNAME>';
							$str .= '<SLASTNAME>' . $cand->sLastName . '</SLASTNAME>';
							$str .= '<TSBIRTH>' . $cand->tsBirth . '</TSBIRTH>';
							$str .= '<ADRESSE_3>' . $cand->Adresse_3 . '</ADRESSE_3>';
							$str .= '<CODE_POSTAL>' . $cand->Code_Postal . '</CODE_POSTAL>';
							$str .= '<VILLE>' . $cand->Ville . '</VILLE>';
							$str .= '<CREATED>' . $cand->tsCreated . '</CREATED>';
							$str .= '</CANDIDATE>';
						}
					}
				}
		}else{
			foreach($res->CandidateList->Candidate as $cand){
				if(intval($_SESSION['conseillerEnLigne']['partenaires']) > 0){
					if($cand->Statut_particulier == '2'){
						if($cand->ORIGINE_Id == '117' && $cand->SOUS_ORIGINE_Id == $_SESSION['conseillerEnLigne']['partenaires']){
							if(!isset($tab[$cand->IRecipientId])){
								$tab[$cand->IRecipientId] = '';
								$str .= '<CANDIDATE>';
								$str .= '<STATUT_PARTICULIER>' . $cand->Statut_particulier . '</STATUT_PARTICULIER>';
								$str .= '<ID>' . $cand->IRecipientId . '</ID>';
								$str .= '<SFIRSTNAME>' . $cand->sFirstName . '</SFIRSTNAME>';
								$str .= '<SLASTNAME>' . $cand->sLastName . '</SLASTNAME>';
								$str .= '<TSBIRTH>' . $cand->tsBirth . '</TSBIRTH>';
								$str .= '<ADRESSE_3>' . $cand->Adresse_3 . '</ADRESSE_3>';
								$str .= '<CODE_POSTAL>' . $cand->Code_Postal . '</CODE_POSTAL>';
								$str .= '<VILLE>' . $cand->Ville . '</VILLE>';
								$str .= '<CREATED>' . $cand->tsCreated . '</CREATED>';
								$str .= '</CANDIDATE>';
							}
						}
					}else{
						if(!isset($tab[$cand->IRecipientId])){
							$tab[$cand->IRecipientId] = '';
							$str .= '<CANDIDATE>';
							$str .= '<STATUT_PARTICULIER>' . $cand->Statut_particulier . '</STATUT_PARTICULIER>';
							$str .= '<ID>' . $cand->IRecipientId . '</ID>';
							$str .= '<SFIRSTNAME>' . $cand->sFirstName . '</SFIRSTNAME>';
							$str .= '<SLASTNAME>' . $cand->sLastName . '</SLASTNAME>';
							$str .= '<TSBIRTH>' . $cand->tsBirth . '</TSBIRTH>';
							$str .= '<ADRESSE_3>' . $cand->Adresse_3 . '</ADRESSE_3>';
							$str .= '<CODE_POSTAL>' . $cand->Code_Postal . '</CODE_POSTAL>';
							$str .= '<VILLE>' . $cand->Ville . '</VILLE>';
							$str .= '<CREATED>' . $cand->tsCreated . '</CREATED>';
							$str .= '</CANDIDATE>';
						}
					}
				}else{
					if(!($cand->Statut_particulier == 2 && $cand->ORIGINE_Id == 117)){
						if(!isset($tab[$cand->IRecipientId])){
							$tab[$cand->IRecipientId] = '';
							$str .= '<CANDIDATE>';
							$str .= '<STATUT_PARTICULIER>' . $cand->Statut_particulier . '</STATUT_PARTICULIER>';
							$str .= '<ID>' . $cand->IRecipientId . '</ID>';
							$str .= '<SFIRSTNAME>' . $cand->sFirstName . '</SFIRSTNAME>';
							$str .= '<SLASTNAME>' . $cand->sLastName . '</SLASTNAME>';
							$str .= '<TSBIRTH>' . $cand->tsBirth . '</TSBIRTH>';
							$str .= '<ADRESSE_3>' . $cand->Adresse_3 . '</ADRESSE_3>';
							$str .= '<CODE_POSTAL>' . $cand->Code_Postal . '</CODE_POSTAL>';
							$str .= '<VILLE>' . $cand->Ville . '</VILLE>';
							$str .= '<CREATED>' . $cand->tsCreated . '</CREATED>';
							$str .= '</CANDIDATE>';
						}
					}
				}
			}
		}
		
	}
	
	$str .= '</CANDIDATES>';
	$str .= '</DQE>';
	echo $str;?>