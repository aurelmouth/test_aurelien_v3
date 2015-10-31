<?php
class pdf{
	
	static function pre_aff($data, $send_mail=false){
		
		
		$pdf = new FPDI();
		// add a page
		$pdf->AddPage();
		// set the source file
		$pdf->setSourceFile(ROOT.DS.'webroot'.DS.'assets/pdf/pre_aff.pdf');
		// import page 1
		$tplIdx = $pdf->importPage(1);
		// use the imported page and place it at point 10,10 with a width of 100 mm
		$pdf->useTemplate($tplIdx);
		$pdf->SetAutoPageBreak(false);
		
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->SetFont('');
		$pdf->SetTextColor(0, 0, 0);
		
		
		$x = 160;
		$y = 25;
		if($data->getAttribute('origine_id') == 117 && isset($_SESSION['sous_origine'][$data->getAttribute('origine_id')][$data->getAttribute('sous_origine_id')])){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($_SESSION['sous_origine'][$data->getAttribute('origine_id')][$data->getAttribute('sous_origine_id')]));
		}
		
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->SetFont('');
		$pdf->SetTextColor(0, 0, 0);
		
		$x = 150;
		$y = 37.5;
		// Si le conseiller est de type partenaires, on écrit son nom dans la case correspondante
		if($_SESSION['conseillerEnLigne']['partenaires'] > 0){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($_SESSION['conseillerEnLigne']['label']));
		}
		
		pdf::Code39($pdf, 135,46,$data->getAttribute('id'));
		// Renseignements
		//Civilité
		
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->SetFont('');
		$pdf->SetTextColor(0, 0, 0);
		
		$x = 34;
		$y = 56;
		if($data->getAttribute('qualite_id') == 2){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
		}
		
		
		$x += 14.6;
		if($data->getAttribute('qualite_id') == 1){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
		}

		$x += 22;
		$pdf->SetXY($x, $y);
		$pdf->Write(0,utf8_decode($data->getAttribute('lastName')));
		
		
		// Prénom et nom de naissance
		$x = 22;
		$y = 61;
		$pdf->SetXY($x, $y);
		$pdf->Write(0, utf8_decode($data->getAttribute('firstName')));

		$x += 89;
		$pdf->SetXY($x, $y);
		$pdf->Write(0, utf8_decode($data->getAttribute('nom_naissance')));
	
		$date_naissance = split("/",lof::convertDateFromAdobeFormat($data->getAttribute('tsBirth')));
		if(count($date_naissance) == 3){
			$x = 22;
			$y = 66;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $date_naissance[0]);

			$x += 9;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $date_naissance[1]);

			$x += 7.7;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $date_naissance[2]);
		}
		$x = 50;
		$y = 66;
		$pdf->SetXY($x, $y);
		$pdf->Write(0, utf8_decode($data->getAttribute('ville_naissance')));
		
		//Departemet, nationalité, Résidence fiscale(O/N)
		$x = 30;
		$y = 70.5;
		$pdf->SetXY($x, $y);
		$pdf->Write(0, utf8_decode($data->getAttribute('dept_naissance')));

		$x += 40;
		$pdf->SetXY($x, $y);
		$pdf->Write(0, utf8_decode($data->getAttribute('nationalite')));

		$x += 109.5;
		if($data->getAttribute('Residence_Fiscale_Francaise') == 1){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
		}
		if($data->getAttribute('Residence_Fiscale_Francaise') == 2){
			$x += 9.7;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
		}
		
		//Situation familial
		$x = 47.2;
		$y = 77;
		if($data->getAttribute('situation_familiale_id') == 2){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
		}
		
		$x += 25.5;
		if($data->getAttribute('situation_familiale_id') == 1){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
		}

		$x += 25.3;
		if($data->getAttribute('situation_familiale_id') == 4){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
		}

		$x += 25.5;
		if($data->getAttribute('situation_familiale_id') == 5){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
		}

		$x += 25.5;
		if($data->getAttribute('situation_familiale_id') == 3){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
		}


		// Num Sécutié sociale
		$x = 78;
		$y = 84;
		$pdf->SetXY($x, $y);
		if(strlen($data->getAttribute('num_insee')) == 13){
			for($i = 0; $i < strlen($data->getAttribute('num_insee')); $i++){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, $data->getAttribute('num_insee')[$i]);
				$x += 4;
			}
		}
		//Fin sécurité sociale
		// Num de partenaire
		if($data->getAttribute('num_partenaire') > 0 && $data->getAttribute('origine_id') == 117 && isset($_SESSION['sous_origine'][$data->getAttribute('origine_id')][$data->getAttribute('sous_origine_id')])){
			$pdf->SetFont('Arial', 'B', 10);
			$pdf->SetTextColor(0, 0, 0);
			$x = 136;
			$y = 85;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode('N° ' . utf8_decode($_SESSION['sous_origine'][$data->getAttribute('origine_id')][$data->getAttribute('sous_origine_id')]) .' : ' . $data->getAttribute('num_partenaire')));
		}
		// Fin num partenaire
		
		
		
		
		
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->SetFont('');
		$pdf->SetTextColor(0, 0, 0);
		
		
		// Adresse
		$x = 23;
		$y = 93.1;
		$pdf->SetXY($x, $y);
		$pdf->Write(0, utf8_decode($data->getAttribute('adresse_3')));

		$x = 9;
		$y = 98.0;
		$pdf->SetXY($x, $y);
		$pdf->Write(0, utf8_decode($data->getAttribute('adresse_1')));

		// Code postale 
		$x = 28;
		$y = 102.8;
		$pdf->SetXY($x, $y);
		$pdf->Write(0, utf8_decode($data->getAttribute('code_postal')));

		// Ville
		$x += 34.8;
		$pdf->SetXY($x, $y);
		$pdf->Write(0, utf8_decode($data->getAttribute('ville')));

		// Téléphone 
		$x = 31;
		$y = 107.7;
		$pdf->SetXY($x, $y);
		$pdf->Write(0, utf8_decode($data->getAttribute('sphone')));

		$x += 98;
		$pdf->SetXY($x, $y);
		$pdf->Write(0, utf8_decode($data->getAttribute('smobilephone')));

		//email
		$x = 20;
		$y = 112.5;
		$pdf->SetXY($x, $y);
		$pdf->Write(0, utf8_decode($data->getAttribute('semail')));


		//Affiliation

		//Majeur protégé
		$x = 9;
		$y = 129;
		if($data->getAttribute('Majeur_Protege') == 1){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
		}
		//Affiliation
		$y += 15;
		if($data->getAttribute('statut_affiliation_id') == 1){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
		}
		
		$y += 5;
		if($data->getAttribute('statut_affiliation_id') == 2){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
		}

		// Administrative
		if($data->getAttribute('statut_affiliation_id') == 1 || $data->getAttribute('statut_affiliation_id') == 2){
			$x = 35;
			$y = 159;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('Administration_Nom')));


			$x = 26;
			$y = 164;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('Administration_Adresse_3')));


			$x = 13;
			$y = 169;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('Administration_Adresse_4')));

			$x = 32;
			$y = 173.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('Administration_CP')));

			$x += 48;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('Administration_Ville')));

			//catégorie
			$x = 28.5;
			$y = 179.7;
			if($data->getAttribute('categorie_fonctionnaire_id') == 2){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}

			$x += 7;
			if($data->getAttribute('categorie_fonctionnaire_id') == 3){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}

			$x += 7;
			if($data->getAttribute('categorie_fonctionnaire_id') == 4){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}

			$x += 7;
			if($data->getAttribute('categorie_fonctionnaire_id') == 5){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}


			//Fonction publique
			
			$x = 103.5;
			$y = 179.7;
			if($data->getAttribute('situation_professionnelle_id') == 2){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}

			$x += 10.3;
			if($data->getAttribute('situation_professionnelle_id') == 3){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}

			$x += 19;
			if($data->getAttribute('situation_professionnelle_id') == 4){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}
			
		}
		
		
		// Conjoint ou pacsé
		$x = 9;
		$y = 185;
		if($data->getAttribute('statut_affiliation_id') == 4){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
			
			$x = 50;
			$y = 195.5;
			if(strlen($data->getAttribute('num_cotisant_conjoint')) > 0 &&  strlen($data->getAttribute('num_cotisant_conjoint')) <= 8){
				for($i = 0; $i < strlen($data->getAttribute('num_cotisant_conjoint')); $i++){
					$pdf->SetXY($x, $y);
					$pdf->Write(0, $data->getAttribute('num_cotisant_conjoint')[$i]);
					$x += 4;
				}
				
			}
			
		}

		


		// PUPH Bla bla

		$x = 9;
		$y = 202;
		if($data->getAttribute('statut_affiliation_id') == 5){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
		}

		$y += 5.4;
		if($data->getAttribute('statut_affiliation_id') == 3){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
		}

		$y += 5.4;
		if($data->getAttribute('statut_affiliation_id') == 6){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
			
			$x += 30;
			$y += 0.3;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('Libelle_Autre_Statut_Affiliation')));
			
		}
		
		// Bloc cotisation
		
		//Classe
		if($data->getAttribute('Classe_Cotisation') > 0){
			$classe = "%02d";
			$classe = sprintf($classe, $data->getAttribute('Classe_Cotisation'));
			$x = 68;
			$y = 233;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $classe[0]);
		
			$x += 4.4;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $classe[1]);
		}
		
		
		// Prélèvement automatique
		$x = 9;
		$y = 251;
		if($data->getAttribute('MODE_REGLEMENT_RETRAITE_COTISANT_Id') >= 4 && $data->getAttribute('MODE_REGLEMENT_RETRAITE_COTISANT_Id') <= 7){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
		
			//option prélèvement automatique
			//Mensuel
			$x += 51.5;
			if($data->getAttribute('MODE_REGLEMENT_RETRAITE_COTISANT_Id') == 7){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}
			
			//Trimestriel
			$x += 16;
			if($data->getAttribute('MODE_REGLEMENT_RETRAITE_COTISANT_Id') == 6){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}
			
			//Semestriel
			$x += 17;
			if($data->getAttribute('MODE_REGLEMENT_RETRAITE_COTISANT_Id') == 5){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}
			
			//Annuel
			$x += 18;
			if($data->getAttribute('MODE_REGLEMENT_RETRAITE_COTISANT_Id') == 4){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}
			
			//Mois début
			$x += 43;
			if(isset(lof::$listeValeurs['MOIS_DEBUT_PRELEVEMENT'][$data->getAttribute('Mois_Debut_Prelevement')])){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, utf8_decode(lof::$listeValeurs['MOIS_DEBUT_PRELEVEMENT'][$data->getAttribute('Mois_Debut_Prelevement')]));
			}
		}	
			
		// Par chèque
		$x = 9;
		$y = 266;
		if($data->getAttribute('MODE_REGLEMENT_RETRAITE_COTISANT_Id') == 1 || $data->getAttribute('MODE_REGLEMENT_RETRAITE_COTISANT_Id') == 2 || $data->getAttribute('MODE_REGLEMENT_RETRAITE_COTISANT_Id') == 9 || $data->getAttribute('MODE_REGLEMENT_RETRAITE_COTISANT_Id') == 10){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
		
			// Montant chèque
			$x += 49;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, split(',', number_format($data->getAttribute('Montant_Cotisation_Annuelle'),2, ',', ''))[0]);
			//partie décimal
			$x += 10;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, split(',', number_format($data->getAttribute('Montant_Cotisation_Annuelle'),2, ',', ''))[1]);
		}
		
		// Par précompte
		$x = 9;
		$y = 272;
		if($data->getAttribute('MODE_REGLEMENT_RETRAITE_COTISANT_Id') == 3){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
		}
		
		// Transfert Contrat
		$x = 9;
		$y = 281.5;
		if($data->getAttribute('Transfert_Contrat') == 1){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
		}
		
		
		//PAGE 2
		$pdf->AddPage();
		$pdf->setSourceFile(ROOT.DS.'webroot'.DS.'assets/pdf/pre_aff.pdf');
		$tplIdx = $pdf->importPage(2);
		$pdf->useTemplate($tplIdx);
		$pdf->SetAutoPageBreak(false, 0);
		$pdf->SetRightMargin(0);
		
		//Rachat d'années
		if($data->getAttribute('Nb_Annees_Rachat') > 0){
			$x = 30;
			$y = 16.4;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('Montant_Versement_Exceptionnel'));
			
			
			$x += 147.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('Nb_Annees_Rachat'));
		}
		
		
		// REVESION
		$x = 9;
		$y = 48.8;
		if($data->getAttribute('Reversion') == 1){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
		
		
			// Reversion conjoint
			// nom_conjoint
			if($data->getAttribute('Reversion_Conjoint') == 1){
				$x = 20;
				$y = 59.5;
				$pdf->SetXY($x, $y);
				$pdf->Write(0, utf8_decode($data->getAttribute('Reversion_Beneficiaire_Nom')));
				
				// prenom_conjoint
				$x += 90;
				$pdf->SetXY($x, $y);
				$pdf->Write(0, utf8_decode($data->getAttribute('Reversion_Beneficiaire_Prenom')));
				
				// date naissance conjoint
				$date_naissance_benificiare = split("/",lof::convertDateFromAdobeFormat($data->getAttribute('Reversion_Beneficiaire_Date_Naissance')));
				// Jour
				if(count($date_naissance_benificiare) == 3){
					$x += 65;
					$pdf->SetXY($x, $y);
					$pdf->Write(0, $date_naissance_benificiare[0]);
					
					// Mois
					$x += 9;
					$pdf->SetXY($x, $y);
					$pdf->Write(0, $date_naissance_benificiare[1]);
					
					// Annee
					$x += 9;
					$pdf->SetXY($x, $y);
					$pdf->Write(0, $date_naissance_benificiare[2]);
				}
			}else{
				// Reversion Benificiaire
				// nom_ben
				$x = 20;
				$y = 70;
				$pdf->SetXY($x, $y);
				$pdf->Write(0, utf8_decode($data->getAttribute('Reversion_Beneficiaire_Nom')));
				
				// prenom benef
				$x += 90;
				$pdf->SetXY($x, $y);
				$pdf->Write(0, utf8_decode($data->getAttribute('Reversion_Beneficiaire_Prenom')));
				
				// date naissance benef
				$date_naissance_benificiare = split("/",lof::convertDateFromAdobeFormat($data->getAttribute('Reversion_Beneficiaire_Date_Naissance')));
				
				if(count($date_naissance_benificiare) == 3){
					// Jour
					$x += 65;
					$pdf->SetXY($x, $y);
					$pdf->Write(0, $date_naissance_benificiare[0]);
					
					// Mois
					$x += 9;
					$pdf->SetXY($x, $y);
					$pdf->Write(0, $date_naissance_benificiare[1]);
					
					// Annee
					$x += 9;
					$pdf->SetXY($x, $y);
					$pdf->Write(0, $date_naissance_benificiare[2]);
				}
			}
		}else{
		// Pas de réversion
			$x = 9;
			$y = 76;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
		}
		
		// Bloc mandat de prélèvement
		
		// nom
		$x = 19;
		$y = 221.8;
		$pdf->SetXY($x, $y);
		$pdf->Write(0, utf8_decode($data->getAttribute('lastName')));
		
		//prénom
		$x = 22;
		$y = 228;
		$pdf->SetXY($x, $y);
		$pdf->Write(0, utf8_decode($data->getAttribute('firstName')));
		
		//Adresse 3
		$x = 22;
		$y = 234.1;
		$pdf->SetXY($x, $y);
		$pdf->Write(0, utf8_decode($data->getAttribute('adresse_3')));
		
		// Code postale
		$x = 23;
		$y = 239.5;
		for($i = 0; $i < strlen($data->getAttribute('code_postal')); $i++){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('code_postal')[$i]));
			$x += 3.5;
		}

		
		
		// Ville
		$x = 49;
		$y = 240.4;
		$pdf->SetXY($x, $y);
		$pdf->Write(0, utf8_decode($data->getAttribute('ville')));
		
		// Pays
		$x += 40.5;
		$pdf->SetXY($x, $y);
		$pdf->Write(0, utf8_decode($data->getAttribute('pays')));
		
		if($data->getAttribute('MODE_REGLEMENT_RETRAITE_COTISANT_Id') >= 4 && $data->getAttribute('MODE_REGLEMENT_RETRAITE_COTISANT_Id') <= 7){
			//IBAN
			$x = 11;
			$y = 258;
			
			for($i = 0; $i < strlen($data->getAttribute('Mandat_IBAN')); $i++){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, $data->getAttribute('Mandat_IBAN')[$i]);
				
				
				if(($i % 4) == 3 && $i > 0){
					$x += 4.5;
				}else{
					$x += 3.1;
				}
			}
			
			// BIC
			$x = 11;
			$y = 267.2;
			for($i = 0; $i < strlen($data->getAttribute('Mandat_BIC')); $i++){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, $data->getAttribute('Mandat_BIC')[$i]);
				$x += 4.5;
			}
		}
		/*
		$pdf->SetXY($x, $y);
		$pdf->Write(0, '4');
		
		$x += 3.1;
		$pdf->SetXY($x, $y);
		$pdf->Write(0, '3');
		
		$x += 3.1;
		$pdf->SetXY($x, $y);
		$pdf->Write(0, '3');
		
		$x += 3.1;
		$pdf->SetXY($x, $y);
		$pdf->Write(0, '3');
		
		// deuxième partie
		
		$x += 4.3;
		$pdf->SetXY($x, $y);
		$pdf->Write(0, '3');
		
		$x += 3.1;
		$pdf->SetXY($x, $y);
		$pdf->Write(0, '3');
		
		$x += 3.1;
		$pdf->SetXY($x, $y);
		$pdf->Write(0, '3');
		
		$x += 3.1;
		$pdf->SetXY($x, $y);
		$pdf->Write(0, '3');
		*/
		
		for($i = 3; $i <=11; $i++){
			$pdf->AddPage();
			$pdf->setSourceFile(ROOT.DS.'webroot'.DS.'assets/pdf/pre_aff.pdf');
			$tplIdx = $pdf->importPage($i);
			$pdf->useTemplate($tplIdx);
		}
		

		
		if($send_mail)
			pdf::send($pdf, $data);
		else
			$pdf->Output('Bulletin_affiliation_prefon_retraite.pdf', 'I');
		
	}
	
	
	static function perso($data, $nom_wf){
		// Partie Bulletin de versement
		if($nom_wf == "pre_camp_recur_bulletin_versement"){
			$pdf = new FPDI();
			// add a page
			$pdf->AddPage();
			// set the source file
			$pdf->setSourceFile(ROOT.DS.'webroot'.DS.'assets/pdf/bulletin_versement.pdf');
			// import page 1
			$tplIdx = $pdf->importPage(1);
			// use the imported page and place it at point 10,10 with a width of 100 mm
			$pdf->useTemplate($tplIdx);

			// now write some text above the imported page

			$pdf->SetFont('Arial', 'B', 11);
			$pdf->SetFont('');
			$pdf->SetTextColor(0, 0, 0);

			$x = 58;
			$y = 70.5;
			
			//Madame
			if($data->getAttribute('qualite_id') == 2){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}
			
			//Monsieur
			$x += 27;
			if($data->getAttribute('qualite_id') == 1){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}
			
			//Nom de naissance
			$x = 56;
			$y = 75.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('nom_naissance')));

			// Nom
			$x = 28;
			$y = 80.3;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('lastName')));


			// prenom
			$x = 35.5;
			$y = 85.3;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('firstName')));

			// Num Compte préfon
			$x = 67;
			$y = 90.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('num_cotisant'));

			// Num Sécu sociale
			$x = 64;
			$y = 95.3;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('num_insee'));


			// Adresse
			$x = 35;
			$y = 100;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('adresse_3')));

			//complement adresse
			$x = 15;
			$y = 105;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('adresse_1'));

			//Code postale
			$x = 44;
			$y = 110.1;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('code_postal')));

			//Ville
			$x += 72;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('ville')));

			//Téléphone fixe
			$x = 49;
			$y = 114.7;
			$pdf->SetXY($x, $y);
			$pdf->Write(0,$data->getAttribute('sphone'));


			// Téléphone mobile
			$x += 91;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('smobilephone'));

			//Email
			$x = 30;
			$y = 119.6;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('semail')));


			$pdf->output('bulletin_de_versement.pdf','D');
			//$pdf->output();
		}
		
		
		
		
		
		// Partie versement exceptionnel
		if($nom_wf == "pre_camp_recur_versement_exceptionnel"){
			$pdf = new FPDI();
			// add a page
			$pdf->AddPage();
			// set the source file
			$pdf->setSourceFile(ROOT.DS.'webroot'.DS.'assets/pdf/formulaire_rachat_annees.pdf');
			// import page 1
			$tplIdx = $pdf->importPage(1);
			// use the imported page and place it at point 10,10 with a width of 100 mm
			$pdf->useTemplate($tplIdx);

			// now write some text above the imported page

			$pdf->SetFont('Arial', 'B', 11);
			$pdf->SetFont('');
			$pdf->SetTextColor(0, 0, 0);

			$x = 58;
			$y = 70.5;
			//Madame
			if($data->getAttribute('qualite_id') == 2){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
			}
			
			//Monsieur
			$x += 39.3;
			if($data->getAttribute('qualite_id') == 1){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
			}

			//Nom de naissance
			$x = 55;
			$y = 75.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('nom_naissance')));

			// Nom
			$x = 27;
			$y = 80.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('lastName')));


			// prenom
			$x = 35;
			$y = 85.4;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('firstName')));

			// Num Compte préfon
			$x = 67;
			$y = 90.4;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('num_cotisant')));

			// Num Sécu sociale
			$x = 64;
			$y = 95.3;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('num_insee'));


			// Adresse
			$x = 36;
			$y = 100.3;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('adresse_3')));

			//complement adresse
			$x = 15;
			$y = 105;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('adresse_1')));

			//Code postale
			$x = 44;
			$y = 110;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('code_postal')));

			//Ville
			$x += 70;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('ville')));

			//Téléphone fixe
			$x = 49;
			$y = 114.8;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('sphone'));


			// Téléphone mobile
			$x += 91;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('smobilephone'));

			//Email
			$x = 29;
			$y = 119.6;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('semail')));


			$pdf->output('versement_exceptionnel.pdf','D');
			//$pdf->output();
		}
		
		// Partie Changement de classe par précompte
		if($nom_wf == "pre_camp_recur_changement_classe_precompte"){
		
			$pdf = new FPDI();
			// add a page
			$pdf->AddPage();
			// set the source file
			$pdf->setSourceFile(ROOT.DS.'webroot'.DS.'assets/pdf/formulaire_changement_classe_precompte.pdf');
			// import page 1
			$tplIdx = $pdf->importPage(1);
			// use the imported page and place it at point 10,10 with a width of 100 mm
			$pdf->useTemplate($tplIdx);

			// now write some text above the imported page

			$pdf->SetFont('Arial', 'B', 11);
			$pdf->SetFont('');
			$pdf->SetTextColor(0, 0, 0);

			$x = 58;
			$y = 75;
			//Madame
			if($data->getAttribute('qualite_id') == 2){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}

			//Monsieur
			$x += 39.5;
			if($data->getAttribute('qualite_id') == 1){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}

			//Nom de naissance
			$x = 56;
			$y = 80;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('nom_naissance')));

			// Nom
			$x = 27;
			$y = 85;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('lastName')));


			// prenom
			$x = 34;
			$y = 89.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('firstName')));

			// Num Compte préfon
			$x = 66.8;
			$y = 95;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('num_cotisant')));

			// Num Sécu sociale
			$x = 65.8;
			$y = 100;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('num_insee')));


			// Adresse
			$x = 36;
			$y = 104.4;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('adresse_3')));

			//complement adresse
			$x = 16;
			$y = 109.2;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('adresse_1')));

			//Code postale
			$x = 44;
			$y = 114.2;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('code_postal')));

			//Ville
			$x += 72;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('ville')));

			//Téléphone fixe
			$x = 49;
			$y = 119.3;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('sphone'));


			// Téléphone mobile
			$x += 91;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('smobilephone'));

			//Email
			$x = 31;
			$y = 124;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('semail')));

			// Ma classe

			$x = 47;
			$y = 135;
			if($data->getAttribute('classe') != null && $data->getAttribute('classe') > 0){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, $data->getAttribute('classe'));
			}


			$pdf->output('changement_classe_precompte.pdf','D');
			//$pdf->output();
		}
		
		
		
		
		// Partie Changement de classe par prélèvement automatique
		if($nom_wf == "pre_camp_recur_changement_classe_prelevement_automatique"){
		
			$pdf = new FPDI();
			// add a page
			$pdf->AddPage();
			// set the source file
			$pdf->setSourceFile(ROOT.DS.'webroot'.DS.'assets/pdf/formulaire_changement_classe_prelevement_automatique.pdf');
			// import page 1
			$tplIdx = $pdf->importPage(1);
			// use the imported page and place it at point 10,10 with a width of 100 mm
			$pdf->useTemplate($tplIdx);

			// now write some text above the imported page

			$pdf->SetFont('Arial', 'B', 11);
			$pdf->SetFont('');
			$pdf->SetTextColor(0, 0, 0);

			$x = 58;
			$y = 79;
			//Madame
			if($data->getAttribute('qualite_id') == 2){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}
			
			//Monsieur
			$x += 21;
			if($data->getAttribute('qualite_id') == 1){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}

			//Nom de naissance
			$x = 56;
			$y = 84;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('nom_naissance')));

			// Nom
			$x = 27;
			$y = 89;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('lastName')));


			// prenom
			$x = 35;
			$y = 93.8;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('firstName')));

			// Num Compte préfon
			$x = 67;
			$y = 99;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('num_cotisant'));

			// Num Sécu sociale
			$x = 66;
			$y = 104;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('num_insee'));


			// Adresse
			$x = 36;
			$y = 108.8;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('adresse_3')));

			//complement adresse
			$x = 15;
			$y = 113.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('adresse_1')));

			//Code postale
			$x = 44;
			$y = 118.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('code_postal'));

			//Ville
			$x += 69;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('ville'));

			//Téléphone fixe
			$x = 49;
			$y = 123.3;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('sphone'));


			// Téléphone mobile
			$x += 91;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('smobilephone'));

			//Email
			$x = 29;
			$y = 128.4;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('semail')));

			// Ma classe

			$x = 47;
			$y = 138.2;
			if($data->getAttribute('classe') != null && $data->getAttribute('classe') > 0){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, $data->getAttribute('classe'));
			}

			$pdf->AddPage();
			$pdf->setSourceFile(ROOT.DS.'webroot'.DS.'assets/pdf/formulaire_changement_classe_prelevement_automatique.pdf');
			$tplIdx = $pdf->importPage(2);
			$pdf->useTemplate($tplIdx);

			$pdf->output('changement_classe_prelev_auto.pdf','D');
			//$pdf->output(); 
		}

	
		// Formulaire changement d'adresse
		if($nom_wf == "pre_camp_recur_chgt_adresse"){
		
			// initiate FPDI
			$pdf = new FPDI();
			// add a page
			$pdf->AddPage();
			// set the source file
			$pdf->setSourceFile(ROOT.DS.'webroot'.DS.'assets/pdf/formulaire_changement_adresse.pdf');
			// import page 1
			$tplIdx = $pdf->importPage(1);
			// use the imported page and place it at point 10,10 with a width of 100 mm
			$pdf->useTemplate($tplIdx);

			// now write some text above the imported page

			$pdf->SetFont('Arial', 'B', 11);
			$pdf->SetFont('');
			$pdf->SetTextColor(0, 0, 0);

			$x = 58;
			$y = 87;
			//Madame
			if($data->getAttribute('qualite_id') == 2){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
			}
			
			//Monsieur
			$x += 27;
			if($data->getAttribute('qualite_id') == 1){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
			}

			//Nom de naissance
			$x = 57;
			$y = 92;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('nom_naissance')));

			// Nom
			$x = 29;
			$y = 96.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('lastName')));


			// prenom
			$x = 35;
			$y = 101.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('firstName')));

			// Num Compte préfon
			$x = 67;
			$y = 106.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('num_cotisant'));

			// Num Sécu sociale
			$x = 64;
			$y = 111.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('num_insee'));


			// Adresse
			$x = 57;
			$y = 121;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('adresse_3')));

			//complement adresse
			$x = 15;
			$y = 126;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('adresse_1')));

			//Code postale
			$x = 44;
			$y = 131;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('code_postal')));

			//Ville
			$x += 70;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('ville')));

			//Téléphone fixe
			$x = 49;
			$y = 136;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('sphone'));


			// Téléphone mobile
			$x += 91;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('smobilephone'));

			//Email
			$x = 29;
			$y = 141;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('semail')));



			$pdf->output('formulaire_changement_adresse.pdf','D');
			//$pdf->output();
		}


		// Partie Changement de situation
		if($nom_wf == "pre_camp_recur_chgt_situation_fam_pro"){
			$pdf = new FPDI();
			// add a page
			$pdf->AddPage();
			// set the source file
			$pdf->setSourceFile(ROOT.DS.'webroot'.DS.'assets/pdf/formulaire_changement_situation.pdf');
			// import page 1
			$tplIdx = $pdf->importPage(1);
			// use the imported page and place it at point 10,10 with a width of 100 mm
			$pdf->useTemplate($tplIdx);

			// now write some text above the imported page

			$pdf->SetFont('Arial', 'B', 11);
			$pdf->SetFont('');
			$pdf->SetTextColor(0, 0, 0);

			$x = 58;
			$y = 70.5;
			//Madame
			if($data->getAttribute('qualite_id') == 2){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
			}
			
			//Monsieur
			$x += 39.8;
			$y += 0.4; 
			if($data->getAttribute('qualite_id') == 1){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
			}

			//Nom de naissance
			$x = 55;
			$y = 75.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('nom_naissance')));

			// Nom
			$x = 27;
			$y = 80.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('lastName')));


			// prenom
			$x = 35;
			$y = 85.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('firstName')));

			// Num Compte préfon
			$x = 67;
			$y = 90.4;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('num_cotisant')));

			// Num Sécu sociale
			$x = 64;
			$y = 95.3;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('num_insee')));


			// Adresse
			$x = 36;
			$y = 100.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('adresse_1')));

			//complement adresse
			$x = 15;
			$y = 105;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('adresse_1')));

			//Code postale
			$x = 44;
			$y = 110;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('code_postal')));

			//Ville
			$x += 70;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('ville')));

			//Téléphone fixe
			$x = 49;
			$y = 115;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('sphone'));


			// Téléphone mobile
			$x += 91;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('smobilephone'));

			//Email
			$x = 29;
			$y = 119.8;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('semail')));


			$pdf->output('formulaire_changement_situation.pdf','D');
			//$pdf->output();
		}

		// Partie Changement de l'option de reversion
		if($nom_wf == "pre_camp_recur_chgt_option_reversion"){
			$pdf = new FPDI();
			// add a page
			$pdf->AddPage();
			// set the source file
			$pdf->setSourceFile(ROOT.DS.'webroot'.DS.'assets/pdf/formulaire_changement_option_reversion.pdf');
			// import page 1
			$tplIdx = $pdf->importPage(1);
			// use the imported page and place it at point 10,10 with a width of 100 mm
			$pdf->useTemplate($tplIdx);

			// now write some text above the imported page

			$pdf->SetFont('Arial', 'B', 11);
			$pdf->SetFont('');
			$pdf->SetTextColor(0, 0, 0);

			$x = 67.5;
			$y = 81.5;
			//Madame
			if($data->getAttribute('qualite_id') == 2){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}
			
			//Monsieur
			$x += 34;
			if($data->getAttribute('qualite_id') == 1){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}

			//Nom de naissance
			$x = 55;
			$y = 85.9;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('nom_naissance')));

			// Nom
			$x = 27;
			$y = 90.8;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('lastName')));


			// prenom
			$x = 35;
			$y = 95.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('firstName')));

			// Num Compte préfon
			$x = 67;
			$y = 100.7;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('num_cotisant'));

			// Num Sécu sociale
			$x = 64;
			$y = 105.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('num_insee'));


			// Adresse
			$x = 36;
			$y = 110.4;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('adresse_3')));

			//complement adresse
			$x = 15;
			$y = 115;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('adresse_1')));

			//Code postale
			$x = 44;
			$y = 120;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('code_postal')));

			//Ville
			$x += 70;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('ville')));

			//Téléphone fixe
			$x = 49;
			$y = 124.8;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('sphone'));


			// Téléphone mobile
			$x += 91;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('smobilephone'));

			//Email
			$x = 29;
			$y = 129.7;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('semail')));


			$pdf->output('formulaire_changement_option_reversion.pdf','D');
			//$pdf->output();
		}	


		// Partie Changement de RIB
		if($nom_wf == "pre_camp_recur_chgt_rib"){
			$pdf = new FPDI();
			// add a page
			$pdf->AddPage();
			// set the source file
			$pdf->setSourceFile(ROOT.DS.'webroot'.DS.'assets/pdf/formulaire_changement_RIB.pdf');
			// import page 1
			$tplIdx = $pdf->importPage(1);
			// use the imported page and place it at point 10,10 with a width of 100 mm
			$pdf->useTemplate($tplIdx);

			// now write some text above the imported page

			$pdf->SetFont('Arial', 'B', 11);
			$pdf->SetFont('');
			$pdf->SetTextColor(0, 0, 0);

			$x = 58;
			$y = 70.5;
			//Madame
			if($data->getAttribute('qualite_id') == 2){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
			}
			
			//Monsieur
			$x += 39.8;
			$y += 0.4; 
			if($data->getAttribute('qualite_id') == 1){
			$pdf->SetXY($x, $y);
			$pdf->Write(0, 'X');
			}

			//Nom de naissance
			$x = 55;
			$y = 75.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('nom_naissance')));

			// Nom
			$x = 27;
			$y = 80.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('lastName')));


			// prenom
			$x = 35;
			$y = 85.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('firstName')));

			// Num Compte préfon
			$x = 67;
			$y = 90.4;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('num_cotisant'));

			// Num Sécu sociale
			$x = 64;
			$y = 95.3;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('num_insee'));


			// Adresse
			$x = 36;
			$y = 100.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('adresse_3')));

			//complement adresse
			$x = 15;
			$y = 105;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('adresse_1')));

			//Code postale
			$x = 44;
			$y = 110;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('code_postal')));

			//Ville
			$x += 70;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('ville')));

			//Téléphone fixe
			$x = 49;
			$y = 115;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('sphone'));


			// Téléphone mobile
			$x += 91;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('smobilephone'));

			//Email
			$x = 29;
			$y = 119.8;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('semail')));


			$pdf->output('formulaire_changement_RIB.pdf','D');
			//$pdf->output();
		}


		// Partie Demande de prélèvement automatique
		if($nom_wf == "pre_camp_recur_demande_prelev_auto"){
			$pdf = new FPDI();
			// add a page
			$pdf->AddPage();
			// set the source file
			$pdf->setSourceFile(ROOT.DS.'webroot'.DS.'assets/pdf/formulaire_demande_prelevement_automatique.pdf');
			// import page 1
			$tplIdx = $pdf->importPage(1);
			// use the imported page and place it at point 10,10 with a width of 100 mm
			$pdf->useTemplate($tplIdx);

			// now write some text above the imported page

			$pdf->SetFont('Arial', 'B', 11);
			$pdf->SetFont('');
			$pdf->SetTextColor(0, 0, 0);

			$x = 58;
			$y = 73.3;
			//Madame
			if($data->getAttribute('qualite_id') == 2){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}
			
			//Monsieur
			$x += 21; 
			if($data->getAttribute('qualite_id') == 1){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}

			//Nom de naissance
			$x = 55;
			$y = 78;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('nom_naissance')));

			// Nom
			$x = 27;
			$y = 83;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('lastName')));


			// prenom
			$x = 35;
			$y = 87.7;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('firstName')));

			// Num Compte préfon
			$x = 67;
			$y = 93.1;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('num_cotisant'));

			// Num Sécu sociale
			$x = 64;
			$y = 97.7;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('num_insee'));


			// Adresse
			$x = 36;
			$y = 102.7;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('adresse_3')));

			//complement adresse
			$x = 15;
			$y = 107.4;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('adresse_1')));

			//Code postale
			$x = 44;
			$y = 112.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('code_postal'));

			//Ville
			$x += 70;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('ville')));

			//Téléphone fixe
			$x = 49;
			$y = 117.4;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('sphone'));


			// Téléphone mobile
			$x += 91;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('smobilephone'));

			//Email
			$x = 29;
			$y = 122;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('semail')));


			$pdf->AddPage();
			$pdf->setSourceFile(ROOT.DS.'webroot'.DS.'assets/pdf/formulaire_demande_prelevement_automatique.pdf');
			$tplIdx = $pdf->importPage(2);
			$pdf->useTemplate($tplIdx);
			
			
			$pdf->output('formulaire_demande_prelevement_automatique.pdf','D');
			//$pdf->output();
		}	

		// Partie Demande de précompte
		if($nom_wf == "pre_camp_recur_demande_precompte"){
		
			// initiate FPDI
			$pdf = new FPDI();
			// add a page
			$pdf->AddPage();
			// set the source file
			$pdf->setSourceFile(ROOT.DS.'webroot'.DS.'assets/pdf/formulaire_demande_precompte.pdf');
			// import page 1
			$tplIdx = $pdf->importPage(1);
			// use the imported page and place it at point 10,10 with a width of 100 mm
			$pdf->useTemplate($tplIdx);

			// now write some text above the imported page

			$pdf->SetFont('Arial', 'B', 11);
			$pdf->SetFont('');
			$pdf->SetTextColor(0, 0, 0);

			$x = 58;
			$y = 75.2;
			//Madame
			if($data->getAttribute('qualite_id') == 2){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}
			
			//Monsieur
			$x += 39.3;
			if($data->getAttribute('qualite_id') == 1){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}

			//Nom de naissance
			$x = 54;
			$y = 80;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('nom_naissance')));

			// Nom
			$x = 28;
			$y = 85;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('lastName')));


			// prenom
			$x = 34;
			$y = 90;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('firstName')));

			// Num Compte préfon
			$x = 67.2;
			$y = 95;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('num_cotisant'));

			// Num Sécu sociale
			$x = 66;
			$y = 99.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('num_insee'));


			// Date_naissance

			$x = 31;
			$y = 105;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, lof::convertDateFromAdobeFormat($data->getAttribute('tsBirth')));


			// Adresse
			$x = 35;
			$y = 109.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('adresse_3')));

			//complement adresse
			$x = 15;
			$y = 114.3;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('adresse_1')));

			//Code postale
			$x = 45;
			$y = 119.2;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('code_postal')));

			//Ville
			$x += 69;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('ville')));
			
			
			$classe = 0;
			
			if($data->getAttribute('statut_particulier') == 3){
				$classe = $data->getAttribute('classe');
			}
			
			// Classe de cotsation
			$x = 115;
			$y = 142.8;
			$pdf->SetXY($x, $y);
			if($classe > 0){
				$pdf->Write(0, utf8_decode($classe));
			}
	
			$x = 100;
			$y = 147.8;
			$pdf->SetXY($x, $y);
			if($classe > 0){
				$pdf->Write(0, utf8_decode(number_format((lof::$listeValeurs['CLASSE_COTISATION_MONTANT'][$classe] / 12), 2, ',', ' ')));
			}
			
			
			//$pdf->output('formulaire_demande_precompte.pdf','D');
			$pdf->output();
		}
		
		
		// Demande Imprimé fiscal IFU
		if($nom_wf == "pre_camp_recur_demande_IFU"){
		
			$pdf = new FPDI();
			// add a page
			$pdf->AddPage();
			// set the source file
			$pdf->setSourceFile(ROOT.DS.'webroot'.DS.'assets/pdf/formulaire_demande_ifu.pdf');
			// import page 1
			$tplIdx = $pdf->importPage(1);
			// use the imported page and place it at point 10,10 with a width of 100 mm
			$pdf->useTemplate($tplIdx);

			// now write some text above the imported page

			$pdf->SetFont('Arial', 'B', 11);
			$pdf->SetFont('');
			$pdf->SetTextColor(0, 0, 0);

			$x = 58;
			$y = 82.5;
			//Madame
			if($data->getAttribute('qualite_id') == 2){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}
			
			//Monsieur
			$x += 39.4;
			$y += 0.3;
			if($data->getAttribute('qualite_id') == 1){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}

			//Nom de naissance
			$x = 56;
			$y = 87.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('nom_naissance')));

			// Nom
			$x = 27;
			$y = 92.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('lastName')));


			// prenom
			$x = 35;
			$y = 97.3;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('firstName')));

			// Num Compte préfon
			$x = 67;
			$y = 102;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('num_cotisant'));

			// Num Sécu sociale
			$x = 66;
			$y = 106.8;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('num_insee'));

			// Classe de cotisation

			$x = 65;
			$y = 111.8;
			if($data->getAttribute('classe') != null && $data->getAttribute('classe') > 0){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, $data->getAttribute('classe'));
			}

			// Adresse
			$x = 36;
			$y = 116.8;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('adresse_3')));

			//complement adresse
			$x = 15;
			$y = 121.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('adresse_1')));

			//Code postale
			$x = 44;
			$y = 126.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('code_postal')));

			//Ville
			$x += 69;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('ville')));

			//Téléphone fixe
			$x = 49;
			$y = 131.3;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('sphone'));


			// Téléphone mobile
			$x += 91;
			$y += 0.1;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('smobilephone'));

			//Email
			$x = 29;
			$y = 136.4;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('semail')));




			$pdf->output('formulaire_demande_ifu.pdf','D');
			//$pdf->output(); 
		}
		
		// Partie Demande de relevé de situation individuelle RSI
		if($nom_wf == "pre_camp_recur_demande_RSI"){
			$pdf = new FPDI();
			// add a page
			$pdf->AddPage();
			// set the source file
			$pdf->setSourceFile(ROOT.DS.'webroot'.DS.'assets/pdf/formulaire_demande_releve_situation_individuelle.pdf');
			// import page 1
			$tplIdx = $pdf->importPage(1);
			// use the imported page and place it at point 10,10 with a width of 100 mm
			$pdf->useTemplate($tplIdx);

			// now write some text above the imported page

			$pdf->SetFont('Arial', 'B', 11);
			$pdf->SetFont('');
			$pdf->SetTextColor(0, 0, 0);

			$x = 58;
			$y = 108;
			//Madame
			if($data->getAttribute('qualite_id') == 2){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}
			
			//Monsieur
			$x += 39.4;
			$y += 0.2;
			if($data->getAttribute('qualite_id') == 1){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}

			//Nom de naissance
			$x = 55;
			$y = 113;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('nom_naissance')));

			// Nom
			$x = 27;
			$y = 118;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('lastName')));


			// prenom
			$x = 35;
			$y = 122.7;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('firstName')));

			// Num Compte préfon
			$x = 67;
			$y = 128.1;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('num_cotisant'));

			// Num Sécu sociale
			$x = 64;
			$y = 132.7;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('num_insee'));


			// Adresse
			$x = 36;
			$y = 137.4;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('adresse_3')));

			//complement adresse
			$x = 15;
			$y = 142.4;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('adresse_1')));

			//Code postale
			$x = 44;
			$y = 147.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('code_postal')));

			//Ville
			$x += 70;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('ville')));

			//Téléphone fixe
			$x = 49;
			$y = 152.4;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('sphone'));


			// Téléphone mobile
			$x += 91;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data->getAttribute('smobilephone'));

			//Email
			$x = 29;
			$y = 157;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data->getAttribute('semail')));


			$pdf->output('formulaire_demande_releve_situation_individuelle.pdf','D');
			//$pdf->output();
		}	

	}
	
	
	static function Code39($pdf,$x, $y, $code, $ext = true, $cks = false, $w = 0.4, $h = 8, $wide = true) 
	{
		//global $pdf;
    $org_code = $code;
    $h_code = $y+$h+2;

    if($ext)
    {
        //Extended encoding
        $code = pdf::encode_code39_ext($code);
    }
    else
    {
        //Convert to upper case
        $code = strtoupper($code);
        //Check validity
        if(!preg_match('|^[0-9A-Z. $/+%-]*$|', $code))
            die('Invalid barcode value: '.$code);
    }

    //Compute checksum
    if ($cks)
        $code .= checksum_code39($code);

    //Add start and stop characters
    $code = '*'.$code.'*';

    //Conversion tables
    $narrow_encoding = array (
        '0' => '101001101101', '1' => '110100101011', '2' => '101100101011', 
        '3' => '110110010101', '4' => '101001101011', '5' => '110100110101', 
        '6' => '101100110101', '7' => '101001011011', '8' => '110100101101', 
        '9' => '101100101101', 'A' => '110101001011', 'B' => '101101001011', 
        'C' => '110110100101', 'D' => '101011001011', 'E' => '110101100101', 
        'F' => '101101100101', 'G' => '101010011011', 'H' => '110101001101', 
        'I' => '101101001101', 'J' => '101011001101', 'K' => '110101010011', 
        'L' => '101101010011', 'M' => '110110101001', 'N' => '101011010011', 
        'O' => '110101101001', 'P' => '101101101001', 'Q' => '101010110011', 
        'R' => '110101011001', 'S' => '101101011001', 'T' => '101011011001', 
        'U' => '110010101011', 'V' => '100110101011', 'W' => '110011010101', 
        'X' => '100101101011', 'Y' => '110010110101', 'Z' => '100110110101', 
        '-' => '100101011011', '.' => '110010101101', ' ' => '100110101101', 
        '*' => '100101101101', '$' => '100100100101', '/' => '100100101001', 
        '+' => '100101001001', '%' => '101001001001' );

    $wide_encoding = array (
        '0' => '101000111011101', '1' => '111010001010111', '2' => '101110001010111', 
        '3' => '111011100010101', '4' => '101000111010111', '5' => '111010001110101', 
        '6' => '101110001110101', '7' => '101000101110111', '8' => '111010001011101', 
        '9' => '101110001011101', 'A' => '111010100010111', 'B' => '101110100010111', 
        'C' => '111011101000101', 'D' => '101011100010111', 'E' => '111010111000101', 
        'F' => '101110111000101', 'G' => '101010001110111', 'H' => '111010100011101', 
        'I' => '101110100011101', 'J' => '101011100011101', 'K' => '111010101000111', 
        'L' => '101110101000111', 'M' => '111011101010001', 'N' => '101011101000111', 
        'O' => '111010111010001', 'P' => '101110111010001', 'Q' => '101010111000111', 
        'R' => '111010101110001', 'S' => '101110101110001', 'T' => '101011101110001', 
        'U' => '111000101010111', 'V' => '100011101010111', 'W' => '111000111010101', 
        'X' => '100010111010111', 'Y' => '111000101110101', 'Z' => '100011101110101', 
        '-' => '100010101110111', '.' => '111000101011101', ' ' => '100011101011101', 
        '*' => '100010111011101', '$' => '100010001000101', '/' => '100010001010001', 
        '+' => '100010100010001', '%' => '101000100010001');

    $encoding = $wide ? $wide_encoding : $narrow_encoding;

    //Inter-character spacing
    $gap = ($w > 0.29) ? '00' : '0';

    //Convert to bars
    $encode = '';
    for ($i = 0; $i< strlen($code); $i++)
        $encode .= $encoding[$code{$i}].$gap;

    //Draw bars
    $width = pdf::draw_code39($pdf, $encode, $x, $y, $w, $h);
    
    //Display code
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY($x, $h_code);
    $pdf->Cell($width, 0, $org_code, 0, 0, 'C');
	}

	static function checksum_code39($code){

    //Compute the modulo 43 checksum

    $chars = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 
                            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 
                            'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 
                            'W', 'X', 'Y', 'Z', '-', '.', ' ', '$', '/', '+', '%');
    $sum = 0;
    for ($i=0 ; $i<strlen($code); $i++) {
        $a = array_keys($chars, $code{$i});
        $sum += $a[0];
    }
    $r = $sum % 43;
    return $chars[$r];
	}

	static function encode_code39_ext($code){

    //Encode characters in extended mode

    $encode = array(
        chr(0) => '%U', chr(1) => '$A', chr(2) => '$B', chr(3) => '$C', 
        chr(4) => '$D', chr(5) => '$E', chr(6) => '$F', chr(7) => '$G', 
        chr(8) => '$H', chr(9) => '$I', chr(10) => '$J', chr(11) => '£K', 
        chr(12) => '$L', chr(13) => '$M', chr(14) => '$N', chr(15) => '$O', 
        chr(16) => '$P', chr(17) => '$Q', chr(18) => '$R', chr(19) => '$S', 
        chr(20) => '$T', chr(21) => '$U', chr(22) => '$V', chr(23) => '$W', 
        chr(24) => '$X', chr(25) => '$Y', chr(26) => '$Z', chr(27) => '%A', 
        chr(28) => '%B', chr(29) => '%C', chr(30) => '%D', chr(31) => '%E', 
        chr(32) => ' ', chr(33) => '/A', chr(34) => '/B', chr(35) => '/C', 
        chr(36) => '/D', chr(37) => '/E', chr(38) => '/F', chr(39) => '/G', 
        chr(40) => '/H', chr(41) => '/I', chr(42) => '/J', chr(43) => '/K', 
        chr(44) => '/L', chr(45) => '-', chr(46) => '.', chr(47) => '/O', 
        chr(48) => '0', chr(49) => '1', chr(50) => '2', chr(51) => '3', 
        chr(52) => '4', chr(53) => '5', chr(54) => '6', chr(55) => '7', 
        chr(56) => '8', chr(57) => '9', chr(58) => '/Z', chr(59) => '%F', 
        chr(60) => '%G', chr(61) => '%H', chr(62) => '%I', chr(63) => '%J', 
        chr(64) => '%V', chr(65) => 'A', chr(66) => 'B', chr(67) => 'C', 
        chr(68) => 'D', chr(69) => 'E', chr(70) => 'F', chr(71) => 'G', 
        chr(72) => 'H', chr(73) => 'I', chr(74) => 'J', chr(75) => 'K', 
        chr(76) => 'L', chr(77) => 'M', chr(78) => 'N', chr(79) => 'O', 
        chr(80) => 'P', chr(81) => 'Q', chr(82) => 'R', chr(83) => 'S', 
        chr(84) => 'T', chr(85) => 'U', chr(86) => 'V', chr(87) => 'W', 
        chr(88) => 'X', chr(89) => 'Y', chr(90) => 'Z', chr(91) => '%K', 
        chr(92) => '%L', chr(93) => '%M', chr(94) => '%N', chr(95) => '%O', 
        chr(96) => '%W', chr(97) => '+A', chr(98) => '+B', chr(99) => '+C', 
        chr(100) => '+D', chr(101) => '+E', chr(102) => '+F', chr(103) => '+G', 
        chr(104) => '+H', chr(105) => '+I', chr(106) => '+J', chr(107) => '+K', 
        chr(108) => '+L', chr(109) => '+M', chr(110) => '+N', chr(111) => '+O', 
        chr(112) => '+P', chr(113) => '+Q', chr(114) => '+R', chr(115) => '+S', 
        chr(116) => '+T', chr(117) => '+U', chr(118) => '+V', chr(119) => '+W', 
        chr(120) => '+X', chr(121) => '+Y', chr(122) => '+Z', chr(123) => '%P', 
        chr(124) => '%Q', chr(125) => '%R', chr(126) => '%S', chr(127) => '%T');

    $code_ext = '';
    for ($i = 0 ; $i<strlen($code); $i++) {
        if (ord($code{$i}) > 127)
            die('Invalid character: '.$code{$i});
        $code_ext .= $encode[$code{$i}];
    }
    return $code_ext;
	}

	static function draw_code39($pdf, $code, $x, $y, $w, $h){
		//global $pdf;
    //Draw bars

    for($i=0; $i<strlen($code); $i++)
    {
        if($code{$i} == '1')
            $pdf->Rect($x+$i*$w, $y, $w, $h, 'F');
    }
    
    return ($x+strlen($code)*$w) - $x;
	}
	
	static function send($pdf, $data){
		$mail = new PHPMailer();
		$mail->CharSet = 'UTF-8';
		$mail->IsSMTP();                                      // set mailer to use SMTP
		$mail->SMTPAuth = true;     // turn on SMTP authentication
		$mail->SMTPSecure = "tls";
		$mail->Host = "mail.prefon.fr";  // specify main and backup server
		$mail->Port = 465;
		$mail->Username = "prefon";  // SMTP username
		$mail->Password = "carrega"; // SMTP password

		$mail->From = "pole.conseil@prefon.fr";
		$mail->FromName = "Votre conseiller préfon";
		$mail->AddAddress($data->getAttribute('semail'));

		
		$mail->WordWrap = 50;                                 // set word wrap to 50 characters
		$mail->IsHTML(true);                                  // set email format to HTML
		
		$attachment= $pdf->Output('attachment.pdf', 'S');

		$mail->AddStringAttachment($attachment, 'Bulletin_affiliation_prefon_retraite.pdf');
		
		$mail->Subject = "Bulletin d'affiliation";
		$qualite='';
		if($data->getAttribute('qualite_id') == 1 && strlen($data->getAttribute('lastName')) > 0){
			$qualite = 'Monsieur ' . $data->getAttribute('lastName') . ',';
		}else if($data->getAttribute('qualite_id') == 2){
			$qualite = 'Madame ' . $data->getAttribute('lastName') . ',';
		}else{
			$qualite = 'Madame, Monsieur';
		}
		
		$firstName = $data->getAttribute('firstName');
		$lastName = (strlen($data->getAttribute('lastName') > 0)) ? ($data->getAttribute('lastName')) : ($data->getAttribute('nom_naissance'));
		$id = $data->getAttribute('id');
		
		$mail->Body    = '<a href="http://www.prefon-retraite.fr" style="font-family:Helvetica, Arial, sans-serif;font-size:20px;color:#0D3084;"><img src="http://prefon-dev.neolane.net/res/prefon_dev/ac5f10ebc22d8ee230fcbddb5dd4fe9b.png" border="0" alt="Prefon" title="Prefon" /></a>
							<p style="font-family: Helvetica, Arial, sans-serif;font-size:12px;color:#000000;">
								' .  $qualite. '
							</p>
							<p style="font-family: Helvetica, Arial, sans-serif;font-size:12px;color:#000000;">
								Votre affiliation à Préfon-Retraite a été prise en compte sous le numéro ' . $id .'.
							</p>
							<p style="font-family: Helvetica, Arial, sans-serif;font-size:12px;color:#000000;">
								En pièce jointe, vous trouverez votre bulletin d’affiliation comprenant la notice d’information.
							</p>
							<p style="font-family: Helvetica, Arial, sans-serif;font-size:12px;color:#000000;">
								Pour obtenir votre Certificat d’Affiliation, nous vous prions de nous retourner le bulletin d’affiliation daté et signé en dernière page accompagné d’une photocopie de votre pièce d’identité et d’un original de votre RIB pour le prélèvement automatique.
							</p>
							<p style="font-family: Helvetica, Arial, sans-serif;font-size:12px;color:#000000;">
								Retournez le tout dans une enveloppe <span style="text-decoration:underline">sans affranchir</span> à l’adresse :
							</p>
							<p style="font-family: Helvetica, Arial, sans-serif;font-size:12px;font-weight:bold;color:#000000;">
							PREFON<br/>
							Autorisation 40980<br/>
							75385 Paris Cedex 08
							</p>
							<p style="font-family: Helvetica, Arial, sans-serif;font-size:12px;color:#000000;">
								Votre conseiller Préfon-Retraite
							</p>
							<p style="font-family: Helvetica, Arial, sans-serif;font-size:12px;color:#000000;">
								Pour toutes questions, composez le 3025, appel gratuit depuis un poste fixe du lundi au vendredi de 9h à 19h.
							</p>';

		
		$mail->Send();
	}
	
	
		static function EnteteTabSimulation($pdf, $x, $y)
		{
			$pdf->SetXY($x, $y);
			$pdf->SetFont('Arial', '', 8);
			$pdf->SetTextColor(255,255,255);
			$pdf->SetFillColor(0, 133, 203);
			$pdf->SetDrawColor(255, 255, 255);
			$pdf->Cell(12, 8, utf8_decode('Année'), 'R', 0, 'C', true);
			$pdf->SetX($pdf->GetX()+0.2);
			$pdf->Cell(8, 8, utf8_decode('Âge'), 'R', 0, 'C', true);
			$pdf->SetX($pdf->GetX()+0.2);
			$pdf->MultiCell(45, 4, utf8_decode('Versement mensuel -'."\n".'N° de la classe de cotisation'), 'R', 'C', true);
			$pdf->SetXY($x+65.6, $y);
			$pdf->MultiCell(20.2, 4, utf8_decode('Rachat ou versement / €'), 'R', 'C', true);
			
		}

		static function AjouterLigneSimulation($pdf, $x, $y, $numLigne, $annee, $age, $versement, $rachat)
		{
			$pdf->SetXY($x, $y);
			$pdf->SetFont('Arial', '', 8);
			$pdf->SetTextColor(0,0,0);
			if($numLigne%2 == 0)
				$pdf->SetFillColor(254, 244, 232);
			else
				$pdf->SetFillColor(255, 255, 255);
				
			$pdf->SetDrawColor(0, 133, 203);
			$pdf->Cell(12, 5, $annee, 'LB', 0, 'C', true);
			$pdf->SetX($pdf->GetX()+0.2);
			$pdf->Cell(8, 5, $age, 'LB', 0, 'C', true);
			$pdf->SetX($pdf->GetX()+0.2);
			$pdf->Cell(45, 5, $versement, 'LB', 0, 'C', true);
			$pdf->SetXY($x+65.6, $y);
			$pdf->Cell(20, 5, $rachat, 'LBR', 0, 'C', true);
			
		}

		static function AdressePersonne($data_particulier)
		{
			$qualite = (isset($_SESSION['CIVILITE'][$data_particulier->getAttribute('qualite_id')])) ? ($_SESSION['CIVILITE'][$data_particulier->getAttribute('qualite_id')]) : ('');
			$firstName = trim($data_particulier->getAttribute('firstName'));
			$lastName = (strlen($data_particulier->getAttribute('lastName')) > 0) ? ($data_particulier->getAttribute('lastName')) : ($data_particulier->getAttribute('nom_naissance')); 
			$chainePDF = $qualite.' '.$firstName.' ' . $lastName;
			
			if(trim($data_particulier->getAttribute('adresse_1'))!=''){ $chainePDF.= "\n".trim($data_particulier->getAttribute('adresse_1'));}
			if(trim($data_particulier->getAttribute('adresse_2'))!=''){ $chainePDF.= "\n".trim($data_particulier->getAttribute('adresse_2'));}
			if(trim($data_particulier->getAttribute('adresse_3'))!=''){ $chainePDF.= "\n".trim($data_particulier->getAttribute('adresse_3'));}
			$chainePDF.= "\n".trim($data_particulier->getAttribute('code_postal')).' '.trim($data_particulier->getAttribute('ville'));
				
			return $chainePDF;
		}

		static function AjouterUnEspaceSurDeux($chaine)
		{
			$chaineRetour = '';
			
			for($i=0; $i < strlen($chaine); $i++)
			{
				$chaineRetour.= substr($chaine, $i,1).' ';
			}
			
			return $chaineRetour;
		}
	
	
		static function imprimer_sim_2($data_particulier, $data_contrat, $data_simulation, $data_simulation_details, $data_simulation_resultats){
			$taille_corps = 9;
			$annee_courante = date("Y");
			$m_abondement = 0;
			
			$pdf=new fpdf();

			$pdf->SetAutoPageBreak(true, 0.5) ;
			
			//----------------- PAGE 1----------------------//
			$marge_left = 15;
			// creation de la premiere page (recapuitulatif du contrat existant + options de la simulation)
			$pdf->AddPage();
			$pdf->SetFont('Arial','',10);
			$pdf->SetMargins($marge_left, 0, 30);
			
			// pavé d'adresse
			$chainePDF = strtoupper(pdf::AdressePersonne($data_particulier));
			$y = 40;				
			$pdf->SetXY(115, $y);
			$pdf->MultiCell(0, 5, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			$largeur_paragraphe = 175;
			
			$y+= 25;
			
			
			// ajout du logo en haut a gauche
			$pdf->Image(serveur_url.DS.'webroot'.DS . 'assets/img/logo_PREFON_home.jpg', 10, 5, 40, 19, 'JPG');
				
			// Date --------------------------  	
			// mise en place de la date
			$chainePDF = 'Paris, le '.date('d/m/Y');
			//$y+=5;
			$pdf->SetXY(115, 15);
			$pdf->SetFont('Arial','',10);
			$pdf->MultiCell(0, 5, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			// coordonnées de la Préfon
			$chainePDF = '12 bis rue de Courcelles'."\n";
			$chainePDF.= '75008 PARIS'."\n";
			$chainePDF.= 'Email : pole.conseil@prefon.fr'."\n";
			$chainePDF.= 'Site : https://www.prefon-retraite.fr'."\n";
			$chainePDF.= 'Tel : 3025 (appel gratuit depuis un poste fixe)'."\n";
			$pdf->SetXY(12, 25);
			$pdf->SetFont('Arial','',9);
			$pdf->MultiCell(0, 4, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			
			if($data_particulier->getAttribute('statut_particulier') == 3)
			{
				// c'est un affilié on affiche ses infos de contrat
				$chainePDF = 'Vos références Affilié'."\n";
				$pdf->SetXY(12, 50);
				$pdf->SetFont('Arial','B',9);
				$pdf->MultiCell(0, 4, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
				
				$chainePDF = 'Nom : ';
				if(trim($data_particulier->getAttribute('lastName'))!='') $chainePDF.= trim($data_particulier->getAttribute('lastName'));
				else $chainePDF.= trim($data_particulier->getAttribute('nom_naissance'));
				$chainePDF.= "\n";
				$chainePDF.= 'Prénom : '.$data_particulier->getAttribute('firstName')."\n";
				$chainePDF.= 'N° d\'affilié : 602'.$data_contrat->getAttribute('num_contrat')."\n";
				$date_affiliation = '';
				if(trim($data_particulier->getAttribute('date_prospect_affilie')) != ''){
					$date_affiliation = lof::convertDateFromAdobeFormat($data_particulier->getAttribute('date_prospect_affilie'));			
				}else if(trim($data_contrat->getAttribute('date_souscription')) != ''){
					$date_affiliation = lof::convertDateFromAdobeFormat($data_contrat->getAttribute('date_souscription'));	
				}else{
					$date_affiliation = 'Non renseigné';
				}
				$chainePDF.= 'Date d\'affiliation : '.$date_affiliation."\n";
				$pdf->SetXY(12, 54);
				$pdf->SetFont('Arial','',9);
				$pdf->MultiCell(0, 4, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
				$y+=20;
			}
			
			$chainePDF = 'Objet : ';
			$pdf->SetXY($marge_left, $y);
			$pdf->SetFont('Arial','B', $taille_corps);
			$pdf->MultiCell(0, 4, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			$chainePDF = 'Votre demande de simulation Préfon-Retraite';
			$pdf->SetXY($marge_left + 15, $y);
			$pdf->SetFont('Arial','', $taille_corps);
			$pdf->MultiCell(0, 4, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			$y+= 10;
			
			// la civilité
			if($data_particulier->getAttribute('qualite_id') == 1){
				$chainePDF = 'Monsieur,';
			}else if($data_particulier->getAttribute('qualite_id') == 2){
				$chainePDF = 'Madame,';
			}else{
				$chainePDF = 'Madame, Monsieur';
			}
			$pdf->SetXY($marge_left, $y);
			$pdf->SetFont('Arial','', $taille_corps);
			$pdf->MultiCell(0, 4, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)) . "\n");
			
			
			// Situation actuelle --------------------------  	
			// titre Votre situation actuelle
			if($data_particulier->getAttribute('statut_particulier') == 3){
				$y+=10;
				$pdf->SetXY($marge_left, $y);
				$pdf->SetFont('Arial','',$taille_corps);
				$pdf->MultiCell($largeur_paragraphe, 5, iconv('UTF-8', 'windows-1252', html_entity_decode('Vous avez choisi de préparer votre retraite avec Préfon-Retraite et nous vous remercions de votre confiance. J’ai le plaisir de vous adresser votre simulation personnalisée, conformément aux éléments que vous nous avez communiqués et à votre situation actuelle.')));
				$y = $pdf->GetY()+5;
				
				//$pdf->Image('img_optimisation/picto03.png', $marge_left - 5, $y, 5, 4.8, 'PNG');
				$pdf->SetXY($marge_left, $y);
				$pdf->SetFont('Arial','B',12);
				$pdf->SetTextColor(25, 133, 195);
				
				$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('VOTRE SITUATION ACTUELLE')));	
				
				$pdf->SetTextColor(0, 0, 0);
				
				$m_abondement = $data_contrat->getAttribute('abondementpuph');
				
				// date de naissance
				$y+= 7;
				$chainePDF = 'Date de naissance : '.lof::convertDateFromAdobeFormat($data_contrat->getAttribute('date_naissance_import_cotisant'))."\n";
				$chainePDF.= 'Cotisation actuelle : classe '.$data_contrat->getAttribute('classe').' soit '.sprintf("%.02f", lof::$listeValeurs['CLASSE_COTISATION_MONTANT'][$data_contrat->getAttribute('classe')]).' € / an.'."\n";
				$chainePDF.= 'Option de réversion en phase de cotisation : '.((intval($data_contrat->getAttribute('reversion'))>0)?'Oui':'Non')."\n";
				$pdf->SetXY($marge_left, $y);
				$pdf->SetFont('Arial','',9);
				$pdf->MultiCell(0, 5, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
				
				$y = $pdf->GetY();
				$pdf->SetXY($marge_left, $y);
				$pdf->SetFont('Arial','',9);
				
				$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('Nombre de points nets')));	
				$pdf->SetFont('Arial','',6);
				$pdf->Write(3, '(1)');
				$pdf->SetFont('Arial','',9);
				$pdf->Write(5,  iconv('UTF-8', 'windows-1252', html_entity_decode(' actuels : '.sprintf("%d", $data_contrat->getAttribute('points_acquis_nets'))."\n")));
				//$chainePDF.= 'Nombre de points nets(1) actuels : '.sprintf("%d", $contrat["Points_Acquis_Nets"])."\n";
			}
			
			// La simulation --------------------------  	
			
			// Les options choisies dans la simlation
			
			if($data_particulier->getAttribute('statut_particulier') == 3)
			{
				$y = $pdf->GetY() + 5;
				//$pdf->Image('img_optimisation/picto03.png', $marge_left - 5, $y, 5, 4.8, 'PNG');
				$pdf->SetXY($marge_left, $y);
				$pdf->SetFont('Arial','B',12);
				$pdf->SetTextColor(25, 133, 195);
				
				
				//$pdf->Multicell($largeur_paragraphe, 5, 'Vous venez d’effectuer une simulation avec les hypothèses suivantes :');	
				$pdf->Multicell($largeur_paragraphe, 5, 'VOTRE RENTE ANNUELLE BRUTE');	
				
				$pdf->SetTextColor(0, 0, 0);
			}
			else{
				$y+=13;
				//$pdf->Image('img_optimisation/picto03.png', $marge_left - 5, $y, 5, 4.8, 'PNG');
				$pdf->SetXY($marge_left, $y);
				$pdf->SetFont('Arial','B',12);
				$pdf->SetTextColor(25, 133, 195);
				
				$pdf->Multicell($largeur_paragraphe, 5, 'Votre simulation :');
				$pdf->SetTextColor(0, 0, 0);
					
			}
			
			// Information à afficher dans le paragraphe
			$age_liquidation =  $data_simulation->getAttribute('Age_Liquidation');
			$date_liquidation = lof::convertDateFromAdobeFormat($data_simulation->getAttribute('Date_Liquidation'));
			$mois_liquidation = explode("/", $date_liquidation)[1];
			$annee_liquidation = explode("/", $date_liquidation)[2];
			
			// on aura besoin aussi d'afficher le montant de la rente donc, on doit boucler sur les données de rente, et obtenir le montant suivant l'age.
			
			$rente_annuelle = 0;
			foreach($data_simulation_resultats->getElementsByTagName('simulation_resultats') as $sim_resultats){
				if($sim_resultats->getAttribute('age_liquidation') == $age_liquidation){
					$rente_annuelle = $sim_resultats->getAttribute('montant_rente_annuelle_brut');
				}
			}
			
			//$chainePDF = 'Selon la cotisation que vous avez choisie et les versements que vous avez définis lors de votre simulation(2), rappelés ci-après, et pour un âge de perception de la rente défini pour la simulation à '.$age_retraite_prevue.' ans en '.$mois.' '.$annee.', le montant annuel brut de votre rente(3) serait de : '.sprintf("%d", $m_retraite->m_retraite_brute).' €';
			$y+= 7;
			$pdf->SetXY($marge_left, $y);
			$pdf->SetFont('Arial','',$taille_corps);
			//$pdf->MultiCell($largeur_paragraphe, 5, $chainePDF);
			$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('Selon la cotisation que vous avez choisie et les versements que vous avez définis lors de votre simulation')));
			$pdf->SetFont('Arial','',6);
			$pdf->Write(3, '(2)');
			$pdf->SetFont('Arial','',$taille_corps);
			$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode(', rappelés ci-après, et pour un âge de perception de la rente défini pour la simulation à '.$age_liquidation.' ans en '.$mois_liquidation.' '.$annee_liquidation.', le montant annuel brut de votre rente')));
			$pdf->SetFont('Arial','',6);
			$pdf->Write(3, '(3)');
			$pdf->SetFont('Arial','',$taille_corps);
			$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode(' serait de : '.sprintf("%d", $rente_annuelle).' €')));
			$pdf->SetY($pdf->GetY() + 5);
			
			
			// Infomations de la rente
			foreach($data_simulation_resultats->getElementsByTagName('simulation_resultats') as $sim_resultats){
				$y = $pdf->GetY() + 5;
				$pdf->SetXY($marge_left+2, $y);
				if($sim_resultats->getAttribute("age_liquidation") == $age_liquidation) $bold = 'B';
				else $bold = '';
				$pdf->SetFont('Arial', $bold, $taille_corps);
				$pdf->SetTextColor(0,0,0);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->SetDrawColor(0, 0, 0);
				$pdf->Cell(50, 6, iconv('UTF-8', 'windows-1252', html_entity_decode('Rente annuelle brute à '.$sim_resultats->getAttribute("age_liquidation").' ans')), 'TLB', 0, 'L', true);
				$pdf->SetX($pdf->GetX()+0.2);
				$pdf->Cell(15, 6, iconv('UTF-8', 'windows-1252', html_entity_decode(sprintf("%d", $sim_resultats->getAttribute("montant_rente_annuelle_brut")).' €')), 'TLBR', 0, 'L', true);
			}
			
			
			$y = $pdf->GetY() + 10;
			$pdf->SetXY($marge_left, $y);
			$pdf->SetFont('Arial','B',$taille_corps);
			$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('A noter : ')));
			$pdf->SetFont('Arial','',$taille_corps);
			$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('Le montant de votre rente sera d\'autant plus élevé si vous demandez à en bénéficier le plus tard possible. Ces estimations sont non contractuelles et sont établies sur la base des valeurs d’achat et de service du point 2015 sans tenir compte d’une revalorisation. Conformément à la réglementation, la valeur de service du point ne peut pas baisser ')));
			$pdf->SetFont('Arial','',6);
			$pdf->Write(3, '(4).');
			
			$pdf->SetFont('Arial', '', 8);
			$chainePDF = 'Préfon-Distribution – 12 bis rue de Courcelles 75008 Paris – N° ORIAS 13008416';
			$pdf->SetXY($marge_left, 288);
			$pdf->MultiCell(200, 3, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			$chainePDF = 'Page 1';
			$pdf->SetXY($marge_left + $largeur_paragraphe , 288);
			$pdf->MultiCell(20, 3, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			
			
			
			//------------------------------------------------------------
			//------------------------------------------------------------
			// Page 2
			
			$pdf->AddPage();
			// titre de la page
			$y = $pdf->GetY() + 5;
			$pdf->SetXY($marge_left, $y);
			$pdf->SetFont('Arial','B',12);
			$pdf->SetTextColor(25, 133, 195);
			$pdf->Multicell($largeur_paragraphe, 5, iconv('UTF-8', 'windows-1252', html_entity_decode('RAPPEL DES HYPOTHÈSES DE SIMULATION ')));	
			
			$pdf->SetTextColor(0, 0, 0);
			$y = $pdf->GetY();
			$pdf->SetXY($marge_left, $y);
			$pdf->SetFont('Arial','B',$taille_corps);
			$pdf->Write(5, 'A noter : ');
			$pdf->SetFont('Arial','',$taille_corps);
			$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('Vous pouvez à tout moment moduler vos cotisations, sans frais ni pénalités.')));
			
			$y+= 10;
			// premiere entete de tableau
			pdf::EnteteTabSimulation($pdf, $marge_left, $y);

			// puis il faut boucler sur la liste des details simulation
			
			//$nbdetail = $m_simulation->m_age_retraite - CalculAge($affilie["Date_Naissance"], date("d/m/Y"));
			$y_depart = $y;
			$y+=8;
			$y_max = $y;
			$x = $marge_left;
			// plafonne aux 40 premieres années
			$cpt_plafond = 0;
			
			$i = 0;
			foreach($data_simulation_details->getElementsByTagName('simulation_detail') as $sim_details)
			{
				
				if($i == 40){
					break;
				}
				
				pdf::AjouterLigneSimulation($pdf, $x, $y, $i, 
									$sim_details->getAttribute('annee'), 
									$sim_details->getAttribute('age'), 
									iconv('UTF-8', 'windows-1252', html_entity_decode((sprintf("%d", lof::$listeValeurs['CLASSE_COTISATION_MONTANT'][$sim_details->getAttribute('classe')]/12).' €/mois - Classe '.$sim_details->getAttribute('classe')))), 
									iconv('UTF-8', 'windows-1252', html_entity_decode($sim_details->getAttribute('nb_annees_rachat').' / '.sprintf("%d", $sim_details->getAttribute('montant_rachat')).' €')));
				$y+=5.2;
				
				$cpt_plafond++;

				if($y > $y_max)$y_max = $y;
				$i++;
			}
			
			
			// numéro de page
			$num_page = 2;
			
			if($i < 21){
				$num_page = 2;
				$chainePDF = 'Page 2';
				$pdf->SetXY($marge_left + $largeur_paragraphe , 288);
				$pdf->MultiCell(20, 3, $chainePDF);
				$y = $y_max + 5;
			}else{
				$num_page = 3;
				$pdf->AddPage();
				$y = 25;
			}
			
			$pdf->SetXY($marge_left, $y);
			$pdf->SetFont('Arial','B',12);
			$pdf->SetTextColor(25, 133, 195);
			$pdf->Multicell($largeur_paragraphe, 5, 'VOUS SOUHAITEZ OPTIMISER VOTRE CONTRAT');	
			$pdf->SetTextColor(0, 0, 0);
			
			$y = $pdf->GetY()+3;
			$pdf->SetFont('Arial','', $taille_corps);
			$pdf->SetTextColor(255, 0, 0);
			$pdf->SetXY($marge_left+5, $y);
			$pdf->MultiCell($largeur_paragraphe, 4, iconv('UTF-8', 'windows-1252', html_entity_decode('•')));
			$pdf->SetXY($marge_left+10, $y);
			$pdf->SetTextColor(0, 0, 0);
			$pdf->MultiCell($largeur_paragraphe, 4, iconv('UTF-8', 'windows-1252', html_entity_decode('Imprimez et complétez le coupon joint'."\n")));
			$y = $pdf->GetY()+2;
			
			$pdf->SetTextColor(255, 0, 0);
			$pdf->SetXY($marge_left+5, $y);
			$pdf->MultiCell($largeur_paragraphe, 4, iconv('UTF-8', 'windows-1252', html_entity_decode('•')));
			$pdf->SetXY($marge_left+10, $y);
			$pdf->SetTextColor(0, 0, 0);
			$pdf->MultiCell($largeur_paragraphe, 4, iconv('UTF-8', 'windows-1252', html_entity_decode('Datez et signez'."\n")));
			$y = $pdf->GetY()+2;
			
			$pdf->SetTextColor(255, 0, 0);
			$pdf->SetXY($marge_left+5, $y);
			$pdf->MultiCell($largeur_paragraphe, 4, iconv('UTF-8', 'windows-1252', html_entity_decode('•')));
			$pdf->SetXY($marge_left+10, $y);
			$pdf->SetTextColor(0, 0, 0);
			$pdf->MultiCell($largeur_paragraphe, 4, iconv('UTF-8', 'windows-1252', html_entity_decode('Renvoyez votre coupon avec un chèque à l\'ordre de Préfon-Retraite (dans le cas d’un rachat d’années), sans l’affranchir à l’adresse suivante :'."\n")));
			
			$y = $pdf->GetY() + 3;
			$pdf->SetXY($marge_left+10, $y);
			$pdf->SetFont('Arial','B',$taille_corps);
			$chainePDF = 'Préfon'."\n";
			$chainePDF.= 'Libre réponse 72558'."\n"; 
			$chainePDF.= '75385 Paris Cedex 08'."\n"; 
			$pdf->MultiCell($largeur_paragraphe, 4, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			$y = $pdf->GetY() + 5;
			$pdf->SetXY($marge_left, $y);
			$pdf->SetFont('Arial','',$taille_corps);
			$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('Pour toute question, je vous invite à nous contacter au ')));
			$pdf->SetFont('Arial','B',$taille_corps);
			$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('3025 ')));
			$pdf->SetFont('Arial','',$taille_corps);
			$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('(appel gratuit depuis un poste fixe), du lundi au vendredi de 9h à 19h. Nous nous ferons un plaisir de vous renseigner.')));
			
			$y = $pdf->GetY() + 10;
			$pdf->SetXY(120, $y);
			$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('Votre conseiller')));
			
			
			
			// ajout des mentions legales
			$pdf->SetFont('Arial', '', 8);
			
			$chainePDF = '(1) Total des points nets c’est-à-dire avec application de la réversion avant liquidation. Sur la base des derniers versements connus à ce jour et de vos déclarations.';
			$pdf->SetXY($marge_left, 220);
			$pdf->MultiCell($largeur_paragraphe, 3, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			$chainePDF = '(2) Cette simulation est non contractuelle, il ne s’agit pas d’un décompte de vos droits. Cette simulation est établie sur la base de vos déclarations et les résultats dépendent du respect des cotisations et versements mentionnés dans le tableau joint. Elle est établie sur la base des valeurs d’achat et de service du point 2015 sans tenir compte d’une revalorisation (cf : article 16 de la notice d’information).';
			$pdf->MultiCell($largeur_paragraphe, 3, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			$chainePDF = '(3) Avant déduction des prélèvements sociaux (article 3 de l’annexe fiscale Préfon-Retraite de la notice) et sans option de liquidation (réversion et dépendance).';
			$pdf->MultiCell($largeur_paragraphe, 3, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			$chainePDF = '(4) Le régime Préfon-Retraite garantit que la valeur de service du point ne peut pas diminuer (cf. Article 16 de la notice d’information).';
			$pdf->MultiCell($largeur_paragraphe, 3, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			$chainePDF = 'Le régime PRÉFON-RETRAITE est un contrat d\'assurance de groupe, régime régi par les articles L. 441-1 et suivants du Code des assurances, dont l\'objet est la constitution et le service d\'une retraite par rente au profit des affiliés. Il est souscrit par la Caisse nationale de prévoyance de la fonction publique (Préfon) association régie par la loi du 1er juillet 1901 ayant son siège social 12 bis rue de Courcelles, 75008 Paris. L’objet social de l’association est d\'offrir aux fonctionnaires et assimilés des régimes de prévoyance complémentaire, notamment en matière de retraite ; d\'assurer la représentation des affiliés auprès des pouvoirs publics et des gestionnaires des régimes créés ; de veiller au respect des valeurs des organisations syndicales fondatrices de solidarité, de progrès social et d\'égalité dans la gestion des fonds collectés par les régimes créés, notamment par le choix d\'investissements socialement responsables. Il est distribué par la SAS Préfon-Distribution au capital social de 200 000 € entièrement libéré. 794 053 629 R.C.S. Paris immatriculée à l’ORIAS sous le n° 13008416 et ayant son siège social au 12bis rue de Courcelles, 75008 Paris. Il est souscrit auprès de CNP Assurances ayant son siège social au 4 place Raoul Dautry, 75716 Paris Cedex 15, SA au capital de 686 618 477 € entièrement libéré, 341 737 062 RCS Paris, Entreprise régie par le code des assurances, Groupe Caisse des Dépôts.';
			$pdf->SetXY($marge_left, $pdf->GetY()+3);
			$pdf->MultiCell($largeur_paragraphe, 3, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			$chainePDF = 'www.prefon-retraite.fr - www.prefon.asso.fr - www.prefon-distribution.com';
			$pdf->SetXY($marge_left, $pdf->GetY()+3);
			$pdf->MultiCell($largeur_paragraphe, 3, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			
			
			$pdf->SetFont('Arial', '', 8);
			$chainePDF = 'Préfon-Distribution – 12 bis rue de Courcelles 75008 Paris – N° ORIAS 13008416';
			$pdf->SetXY($marge_left, 288);
			$pdf->MultiCell(200, 3, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			$chainePDF = 'Page ' . $num_page;
			$pdf->SetXY($marge_left + $largeur_paragraphe , 288);
			$pdf->MultiCell(20, 3, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			
			if($data_particulier->getAttribute('statut_particulier') == 3)	// page 4 uniquement pour les affiliés
			{
				$pdf->AddPage();
				
				// image de fong (formulaire)
				$pdf->Image(serveur_url.DS.'webroot'.DS . 'assets/img/coupon.png', 0, 0, 210, 300, 'PNG');
				
				// adresse
				$chainePDF = strtoupper(pdf::AdressePersonne($data_particulier));
							
				$pdf->SetXY(20, 65);
				$pdf->MultiCell(0, 3, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
				
				// puis la ligne du numéro d'affilié
				$chainePDF = 'N° d\'affilié : '.$data_contrat->getAttribute('num_contrat');
				$pdf->SetXY(20, 85);
				$pdf->MultiCell(0, 4, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
				
				// ensuite pour remplir les cases on augmente la taille
				$pdf->SetFont('Courier', 'B', 11);
				// la classe d'origine
				$chainePDF = pdf::AjouterUnEspaceSurDeux(sprintf("%02d", $data_contrat->getAttribute('classe')));
				$pdf->SetXY(39, 106);
				$pdf->MultiCell(0, 5, $chainePDF);
				// cette classe est également a remettre dans le bas du formulaire
				$pdf->SetXY(43, 238);
				$pdf->MultiCell(0, 5, $chainePDF);
				
			}
			
			$pdf->output('simulation.pdf', 'D');	
			
		}
		
		
		

		static function imprimer_sim($data_particulier, $data_contrat, $data_simulation, $data_simulation_details, $data_simulation_resultats){
			$taille_corps = 9;
			$annee_courante = date("Y");
			$m_abondement = 0;
			
			$pdf=new fpdf();

			$pdf->SetAutoPageBreak(true, 0.5) ;
			
			//----------------- PAGE 1----------------------//
			$marge_left = 15;
			// creation de la premiere page (recapuitulatif du contrat existant + options de la simulation)
			$pdf->AddPage();
			$pdf->SetFont('Arial','',10);
			$pdf->SetMargins($marge_left, 0, 30);
			
			// pavé d'adresse
			$chainePDF = strtoupper(pdf::AdressePersonne($data_particulier));
			$y = 40;				
			$pdf->SetXY(115, $y);
			$pdf->MultiCell(0, 5, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			$largeur_paragraphe = 175;
			
			// puis la ligne du numéro d'affilié
			if($data_particulier->getAttribute('statut_particulier') == 3)
			{
				$y+= 25;
			}
			else
			{
				$y+= 20;
			}
			
			// ajout du logo en haut a gauche
			$pdf->Image(serveur_url.DS.'webroot'.DS . 'assets/img/logo_PREFON_home.jpg', 10, 5, 40, 19, 'JPG');
				
			// Date --------------------------  	
			// mise en place de la date
			$chainePDF = 'Paris, le '.date('d/m/Y');
			//$y+=5;
			$pdf->SetXY(115, 15);
			$pdf->SetFont('Arial','',10);
			$pdf->MultiCell(0, 5, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			// coordonnées de la Préfon
			$chainePDF = '12 bis rue de Courcelles'."\n";
			$chainePDF.= '75008 PARIS'."\n";
			$chainePDF.= 'Email : pole.conseil@prefon.fr'."\n";
			$chainePDF.= 'Site : https://www.prefon-retraite.fr'."\n";
			$chainePDF.= 'Tel : 3025 (appel gratuit depuis un poste fixe)'."\n";
			$pdf->SetXY(12, 25);
			$pdf->SetFont('Arial','',9);
			$pdf->MultiCell(0, 4, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			
			if($data_particulier->getAttribute('statut_particulier') == 3)
			{
				// c'est un affilié on affiche ses infos de contrat
				$chainePDF = 'Vos références Affilié'."\n";
				$pdf->SetXY(12, 50);
				$pdf->SetFont('Arial','B',9);
				$pdf->MultiCell(0, 4, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
				
				$chainePDF = 'Nom : ';
				if(trim($data_particulier->getAttribute('lastName'))!='') $chainePDF.= trim($data_particulier->getAttribute('lastName'));
				else $chainePDF.= trim($data_particulier->getAttribute('nom_naissance'));
				$chainePDF.= "\n";
				$chainePDF.= 'Prénom : '.$data_particulier->getAttribute('firstName')."\n";
				$chainePDF.= 'N° d\'affilié :'.$data_contrat->getAttribute('num_contrat')."\n";
				$date_affiliation = '';
				if(trim($data_particulier->getAttribute('date_prospect_affilie')) != ''){
					$date_affiliation = lof::convertDateFromAdobeFormat($data_particulier->getAttribute('date_prospect_affilie'));			
				}else if(trim($data_contrat->getAttribute('date_souscription')) != ''){
					$date_affiliation = lof::convertDateFromAdobeFormat($data_contrat->getAttribute('date_souscription'));	
				}else{
					$date_affiliation = 'Non renseigné';
				}
				$chainePDF.= 'Date d\'affiliation : '.$date_affiliation."\n";
				$pdf->SetXY(12, 54);
				$pdf->SetFont('Arial','',9);
				$pdf->MultiCell(0, 4, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
				$y+=20;
			}
			
			$chainePDF = 'Objet : ';
			$pdf->SetXY($marge_left, $y);
			$pdf->SetFont('Arial','B', $taille_corps);
			$pdf->MultiCell(0, 4, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			$chainePDF = 'Votre demande de simulation Préfon-Retraite';
			$pdf->SetXY($marge_left + 15, $y);
			$pdf->SetFont('Arial','', $taille_corps);
			$pdf->MultiCell(0, 4, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			$y+= 10;
			
			// la civilité
			if($data_particulier->getAttribute('qualite_id') == 1){
				$chainePDF = 'Monsieur,';
			}else if($data_particulier->getAttribute('qualite_id') == 2){
				$chainePDF = 'Madame,';
			}else{
				$chainePDF = 'Madame, Monsieur,';
			}
			$pdf->SetXY($marge_left, $y);
			$pdf->SetFont('Arial','', $taille_corps);
			$pdf->MultiCell(0, 4, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)) . "\n");
			
			
			// Situation actuelle --------------------------  	
			// titre Votre situation actuelle
			if($data_particulier->getAttribute('statut_particulier') == 3){
				$y+=10;
				$pdf->SetXY($marge_left, $y);
				$pdf->SetFont('Arial','',$taille_corps);
				$pdf->MultiCell($largeur_paragraphe, 5, iconv('UTF-8', 'windows-1252', html_entity_decode('Vous avez choisi de préparer votre retraite avec Préfon-Retraite et nous vous remercions de votre confiance. J’ai le plaisir de vous adresser votre simulation personnalisée, conformément aux éléments que vous nous avez communiqués et à votre situation actuelle.')));
				$y = $pdf->GetY()+5;
				
				//$pdf->Image('img_optimisation/picto03.png', $marge_left - 5, $y, 5, 4.8, 'PNG');
				$pdf->SetXY($marge_left, $y);
				$pdf->SetFont('Arial','B',12);
				$pdf->SetTextColor(25, 133, 195);
				
				$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('VOTRE SITUATION ACTUELLE')));	
				
				$pdf->SetTextColor(0, 0, 0);
				
				$m_abondement = $data_contrat->getAttribute('abondementpuph');
				
				// date de naissance
				$y+= 7;
				$chainePDF = 'Date de naissance : '.lof::convertDateFromAdobeFormat($data_contrat->getAttribute('date_naissance_import_cotisant'))."\n";
				$chainePDF.= 'Cotisation actuelle : classe '.$data_contrat->getAttribute('classe').' soit '.sprintf("%.02f", lof::$listeValeurs['CLASSE_COTISATION_MONTANT'][$data_contrat->getAttribute('classe')]).' € / an.'."\n";
				$chainePDF.= 'Option de réversion en phase de cotisation : '.((intval($data_contrat->getAttribute('reversion'))>0)?'Oui':'Non')."\n";
				$pdf->SetXY($marge_left, $y);
				$pdf->SetFont('Arial','',9);
				$pdf->MultiCell(0, 5, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
				
				$y = $pdf->GetY();
				$pdf->SetXY($marge_left, $y);
				$pdf->SetFont('Arial','',9);
				
				$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('Nombre de points nets')));	
				$pdf->SetFont('Arial','',6);
				$pdf->Write(3, '(1)');
				$pdf->SetFont('Arial','',9);
				$pdf->Write(5,  iconv('UTF-8', 'windows-1252', html_entity_decode(' actuels : '.sprintf("%d", $data_contrat->getAttribute('points_acquis_nets'))."\n")));
				//$chainePDF.= 'Nombre de points nets(1) actuels : '.sprintf("%d", $contrat["Points_Acquis_Nets"])."\n";
			}else{
				
				// Un pospect
				$y+=7;
				$pdf->SetXY($marge_left, $y);
				$pdf->SetFont('Arial','',$taille_corps);
				$pdf->MultiCell($largeur_paragraphe, 5, iconv('UTF-8', 'windows-1252', html_entity_decode('Pour faire suite à votre demande, j’ai le plaisir de vous adresser votre simulation Préfon-Retraite personnalisée, conformément aux éléments que vous nous avez communiqués et à votre situation actuelle.')));
				$y = $pdf->GetY()+5;
				
				//$pdf->Image('img_optimisation/picto03.png', $marge_left - 5, $y, 5, 4.8, 'PNG');
				$pdf->SetXY($marge_left, $y);
				$pdf->SetFont('Arial','B',12);
				$pdf->SetTextColor(25, 133, 195);
				
				$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('POURQUOI CHOISIR PREFON RETRAITE POUR VOTRE RENTE')));	
				
				$pdf->SetTextColor(0, 0, 0);
				
				$y+= 7;
				$pdf->SetXY($marge_left, $y);
				$pdf->SetFont('Arial','',$taille_corps);
				$pdf->MultiCell($largeur_paragraphe, 5, iconv('UTF-8', 'windows-1252', html_entity_decode('Avec Préfon-Retraite, vous vous constituez une rente, à votre rythme, pour votre retraite. ')));
				$pdf->SetFont('Arial','B',$taille_corps);
				$pdf->MultiCell($largeur_paragraphe, 5, iconv('UTF-8', 'windows-1252', html_entity_decode('Cette rente est garantie dès le 1er euro versé et vous est versée à vie. C’est rassurant car vous savez exactement où vous allez.')));
				$pdf->SetFont('Arial','',$taille_corps);
				$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('De plus, faites des économies d’impôt chaque année en déduisant vos cotisations de vos revenus')));	
				$pdf->SetFont('Arial','',6);
				$pdf->Write(3, '(1)');
				
				$y+=23;
				//$pdf->Image('img_optimisation/picto03.png', $marge_left - 5, $y, 5, 4.8, 'PNG');
				$pdf->SetXY($marge_left, $y);
				$pdf->SetFont('Arial','B',12);
				$pdf->SetTextColor(25, 133, 195);
				
				$pdf->Write(5, 'VOTRE SIMULATION');
				$pdf->SetFont('Arial','',6);
				$pdf->Write(3, '(2).');
				
				$pdf->SetTextColor(0, 0, 0);
				// date de naissance
				$y+= 7;
				$classe = $data_simulation_details->getElementsByTagName('simulation_detail')->item(0)->getAttribute('classe');
				$montant_classe = lof::$listeValeurs['CLASSE_COTISATION_MONTANT'][$classe];
				$age_liquidation = $data_simulation->getAttribute('Age_Liquidation');
				$date_liquidation = lof::convertDateFromAdobeFormat($data_simulation->getAttribute('Date_Liquidation'));
				
				$rente_annuelle = 0;
				foreach($data_simulation_resultats->getElementsByTagName('simulation_resultats') as $sim_resultats){
					if($sim_resultats->getAttribute('age_liquidation') == $age_liquidation)
						$rente_annuelle = $sim_resultats->getAttribute('montant_rente_annuelle_brut');
				}
				
				$pdf->SetXY($marge_left, $y);
				$pdf->SetFont('Arial','',9);
				$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('Vous souhaitez cotiser en classe : ')));
				$pdf->SetFont('Arial','B',9);
				$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode($classe)));
				$pdf->SetFont('Arial','',9);
				$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode(' pour un montant de ')));
				$pdf->SetFont('Arial','B',9);
				$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode($montant_classe . ' € / an soit ' . ($montant_classe / 12) . ' € / mois')));
				$pdf->SetFont('Arial','',9);
				$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode(' (valeur ' . date('Y') . ')')));
				
				$pdf->SetXY($marge_left, $y+5);
				$pdf->SetFont('Arial','',9);
				$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('Vous souhaitez commencer à percevoir votre rente Préfon-Retraite à ')));
				$pdf->SetFont('Arial','B',9);
				$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode($age_liquidation)));
				$pdf->SetFont('Arial','',9);
				$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode(' ans soit à partir du ')));
				$pdf->SetFont('Arial','B',9);
				$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode($date_liquidation . '.')));
				
				$pdf->SetXY($marge_left, $y+10);
				$pdf->SetFont('Arial','',9);
				$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('Votre rente brute')));
				$pdf->SetFont('Arial','',6);
				$pdf->Write(3, '(3)');
				$pdf->SetFont('Arial','',9);
				$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode(' s\'élèvera ainsi à ')));
				$pdf->SetFont('Arial','B',9);
				$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode($rente_annuelle . ' € par an ')));
				$pdf->SetFont('Arial','',9);
				$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('selon les hypothèses de simulations détaillées au dos de cette lettre.')));

				$pdf->SetXY($marge_left, $y+20);
				$pdf->SetFont('Arial','B',$taille_corps);
				$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('A noter : ')));
				$pdf->SetFont('Arial','',$taille_corps);
				$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('Ces estimations sont non contractuelles et sont établies sur la base des valeurs d’achat et de service du point 2015 sans tenir compte d’une revalorisation. Conformément à la réglementation, la valeur de service du point ne peut pas baisser')));
				$pdf->SetFont('Arial','',6);
				$pdf->Write(3, '(4).');
				
				$y+=40;
				//$pdf->Image('img_optimisation/picto03.png', $marge_left - 5, $y, 5, 4.8, 'PNG');
				$pdf->SetXY($marge_left, $y);
				$pdf->SetFont('Arial','B',12);
				$pdf->SetTextColor(25, 133, 195);
				
				$pdf->Multicell($largeur_paragraphe, 5, 'VOUS SOUHAITEZ RENDRE EFFECTIVE CETTE SIMULATION ET VOUS AFFILIER :');
				
				$pdf->SetTextColor(0, 0, 0);
				// date de naissance
				$y+= 7;

				$chainePDF = 'Complétez le bulletin d’affiliation reçu, datez et signez le, joignez-y les pièces justificatives demandées et renvoyez le tout dans une enveloppe, sans l’affranchir, à l’adresse suivante'."\n";

				$pdf->SetXY($marge_left, $y);
				$pdf->SetFont('Arial','',9);
				$pdf->MultiCell(0, 5, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
				
				$y = $pdf->GetY();
				$pdf->SetXY($marge_left+4, $y);
				$pdf->SetFont('Arial','B',$taille_corps);
				$chainePDF = 'Préfon'."\n";
				$chainePDF.= 'Libre réponse 72558'."\n"; 
				$chainePDF.= '75385 Paris Cedex 08'."\n"; 
				$pdf->MultiCell($largeur_paragraphe, 4, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));

				//$chainePDF.= 'Nombre de points nets(1) actuels : '.sprintf("%d", $contrat["Points_Acquis_Nets"])."\n";
			}
			
			// La simulation --------------------------  	
			
			// Les options choisies dans la simlation
			
			if($data_particulier->getAttribute('statut_particulier') == 3)
			{
				$y = $pdf->GetY() + 5;
				//$pdf->Image('img_optimisation/picto03.png', $marge_left - 5, $y, 5, 4.8, 'PNG');
				$pdf->SetXY($marge_left, $y);
				$pdf->SetFont('Arial','B',12);
				$pdf->SetTextColor(25, 133, 195);
				
				
				//$pdf->Multicell($largeur_paragraphe, 5, 'Vous venez d’effectuer une simulation avec les hypothèses suivantes :');	
				$pdf->Multicell($largeur_paragraphe, 5, 'VOTRE RENTE ANNUELLE BRUTE');	
				
				$pdf->SetTextColor(0, 0, 0);
			
			
			// Information à afficher dans le paragraphe
			$age_liquidation =  $data_simulation->getAttribute('Age_Liquidation');
			$date_liquidation = lof::convertDateFromAdobeFormat($data_simulation->getAttribute('Date_Liquidation'));
			$mois_liquidation = explode("/", $date_liquidation)[1];
			$annee_liquidation = explode("/", $date_liquidation)[2];
			
			// on aura besoin aussi d'afficher le montant de la rente donc, on doit boucler sur les données de rente, et obtenir le montant suivant l'age.
			
			$rente_annuelle = 0;
			foreach($data_simulation_resultats->getElementsByTagName('simulation_resultats') as $sim_resultats){
				if($sim_resultats->getAttribute('age_liquidation') == $age_liquidation){
					$rente_annuelle = $sim_resultats->getAttribute('montant_rente_annuelle_brut');
				}
			}
			
			//$chainePDF = 'Selon la cotisation que vous avez choisie et les versements que vous avez définis lors de votre simulation(2), rappelés ci-après, et pour un âge de perception de la rente défini pour la simulation à '.$age_retraite_prevue.' ans en '.$mois.' '.$annee.', le montant annuel brut de votre rente(3) serait de : '.sprintf("%d", $m_retraite->m_retraite_brute).' €';
			$y = $pdf->GetY() + 7;
			$pdf->SetXY($marge_left, $y);
			$pdf->SetFont('Arial','',$taille_corps);
			//$pdf->MultiCell($largeur_paragraphe, 5, $chainePDF);
			$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('Selon la cotisation que vous avez choisie et les versements que vous avez définis lors de votre simulation')));
			$pdf->SetFont('Arial','',6);
			$pdf->Write(3, '(2)');
			$pdf->SetFont('Arial','',$taille_corps);
			$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode(', rappelés ci-après, et pour un âge de perception de la rente défini pour la simulation à '.$age_liquidation.' ans en '.$mois_liquidation.' '.$annee_liquidation.', le montant annuel brut de votre rente')));
			$pdf->SetFont('Arial','',6);
			$pdf->Write(3, '(3)');
			$pdf->SetFont('Arial','',$taille_corps);
			$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode(' serait de : '.sprintf("%d", $rente_annuelle).' €')));
			$pdf->SetY($pdf->GetY() + 5);
			
			
			// Infomations de la rente
			foreach($data_simulation_resultats->getElementsByTagName('simulation_resultats') as $sim_resultats){
				if($sim_resultats->getAttribute('age_liquidation') == $age_liquidation || $sim_resultats->getAttribute('age_liquidation') == ($age_liquidation + 1) || $sim_resultats->getAttribute('age_liquidation') == ($age_liquidation + 2) || $sim_resultats->getAttribute('age_liquidation') == ($age_liquidation + 3)){
					$y = $pdf->GetY() + 5;
					$pdf->SetXY($marge_left+2, $y);
					if($sim_resultats->getAttribute("age_liquidation") == $age_liquidation) $bold = 'B';
					else $bold = '';
					$pdf->SetFont('Arial', $bold, $taille_corps);
					$pdf->SetTextColor(0,0,0);
					$pdf->SetFillColor(255, 255, 255);
					$pdf->SetDrawColor(0, 0, 0);
					$pdf->Cell(50, 6, iconv('UTF-8', 'windows-1252', html_entity_decode('Rente annuelle brute à '.$sim_resultats->getAttribute("age_liquidation").' ans')), 'TLB', 0, 'L', true);
					$pdf->SetX($pdf->GetX()+0.2);
					$pdf->Cell(15, 6, iconv('UTF-8', 'windows-1252', html_entity_decode(sprintf("%d", $sim_resultats->getAttribute("montant_rente_annuelle_brut")).' €')), 'TLBR', 0, 'L', true);
				}
			}
			
			
			$y = $pdf->GetY() + 10;
			$pdf->SetXY($marge_left, $y);
			$pdf->SetFont('Arial','B',$taille_corps);
			$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('A noter : ')));
			$pdf->SetFont('Arial','',$taille_corps);
			$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('Le montant de votre rente sera d\'autant plus élevé si vous demandez à en bénéficier le plus tard possible. Ces estimations sont non contractuelles et sont établies sur la base des valeurs d’achat et de service du point 2015 sans tenir compte d’une revalorisation. Conformément à la réglementation, la valeur de service du point ne peut pas baisser ')));
			$pdf->SetFont('Arial','',6);
			$pdf->Write(3, '(4).');
			
			$pdf->SetFont('Arial', '', 8);
			$chainePDF = 'Préfon-Distribution – 12 bis rue de Courcelles 75008 Paris – N° ORIAS 13008416';
			$pdf->SetXY($marge_left, 288);
			$pdf->MultiCell(200, 3, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			$chainePDF = 'Page 1';
			$pdf->SetXY($marge_left + $largeur_paragraphe , 288);
			$pdf->MultiCell(20, 3, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			
			}
			
			//------------------------------------------------------------
			//------------------------------------------------------------
			// Page 2
			
			$pdf->AddPage();
			// titre de la page
			$y = $pdf->GetY() + 5;
			$pdf->SetXY($marge_left, $y);
			$pdf->SetFont('Arial','B',12);
			$pdf->SetTextColor(25, 133, 195);
			$pdf->Multicell($largeur_paragraphe, 5, iconv('UTF-8', 'windows-1252', html_entity_decode('RAPPEL DES HYPOTHÈSES DE SIMULATION ')));	
			
			$pdf->SetTextColor(0, 0, 0);
			$y = $pdf->GetY();
			$pdf->SetXY($marge_left, $y);
			$pdf->SetFont('Arial','B',$taille_corps);
			$pdf->Write(5, 'A noter : ');
			$pdf->SetFont('Arial','',$taille_corps);
			$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('Vous pouvez à tout moment moduler vos cotisations, sans frais ni pénalités.')));
			
			$y+= 10;
			// premiere entete de tableau
			$yEntete = $y;
			pdf::EnteteTabSimulation($pdf, $marge_left, $yEntete);

			// puis il faut boucler sur la liste des details simulation
			
			//$nbdetail = $m_simulation->m_age_retraite - CalculAge($affilie["Date_Naissance"], date("d/m/Y"));
			$y_depart = $y;
			$y+=8;
			$y2=$y;
			$y_max = $y;
			$x = $marge_left;
			// plafonne aux 40 premieres années
			$cpt_plafond = 0;
			
			$i = 0;
			foreach($data_simulation_details->getElementsByTagName('simulation_detail') as $sim_details)
			{
				
				if($i == 40){
					break;
				}
				if($i < 20){
					$montant = 0;
					if($sim_details->getAttribute('classe') > 0){
						$montant = lof::$listeValeurs['CLASSE_COTISATION_MONTANT'][$sim_details->getAttribute('classe')]/12;
					}
					pdf::AjouterLigneSimulation($pdf, $x, $y, $i, 
										$sim_details->getAttribute('annee'), 
										$sim_details->getAttribute('age'), 
										iconv('UTF-8', 'windows-1252', html_entity_decode((sprintf("%d", $montant).' €/mois - Classe '.$sim_details->getAttribute('classe')))), 
										iconv('UTF-8', 'windows-1252', html_entity_decode($sim_details->getAttribute('nb_annees_rachat').' / '.sprintf("%d", $sim_details->getAttribute('montant_rachat')).' €')));
					$y+=5.2;
					
					$cpt_plafond++;

					if($y > $y_max)$y_max = $y;
					$i++;
				}else{
					$montant = 0;
					if($sim_details->getAttribute('classe') > 0){
						$montant = lof::$listeValeurs['CLASSE_COTISATION_MONTANT'][$sim_details->getAttribute('classe')]/12;
					}
					pdf::AjouterLigneSimulation($pdf, $x + 95, $y2, $i, 
										$sim_details->getAttribute('annee'), 
										$sim_details->getAttribute('age'), 
										iconv('UTF-8', 'windows-1252', html_entity_decode((sprintf("%d", $montant).' €/mois - Classe '.$sim_details->getAttribute('classe')))), 
										iconv('UTF-8', 'windows-1252', html_entity_decode($sim_details->getAttribute('nb_annees_rachat').' / '.sprintf("%d", $sim_details->getAttribute('montant_rachat')).' €')));
					$y2+=5.2;
					
					$i++;	
				}
			}
			
			if($i >= 20){
				pdf::EnteteTabSimulation($pdf, $marge_left + 95, $yEntete);
			}
			
			
			$pdf->SetTextColor(0, 0, 0);
			// numéro de page
			$num_page = 2;
			
			$num_page = 2;
			$chainePDF = 'Page 2';
			$pdf->SetXY($marge_left + $largeur_paragraphe , 288);
			$pdf->MultiCell(20, 3, $chainePDF);
			$y = $y_max + 5;
			
			$pdf->SetXY($marge_left, $y);
			$pdf->SetFont('Arial','',$taille_corps);
			$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('Pour toute question, je vous invite à nous contacter au ')));
			$pdf->SetFont('Arial','B',$taille_corps);
			$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('3025 ')));
			$pdf->SetFont('Arial','',$taille_corps);
			$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('(appel gratuit depuis un poste fixe), du lundi au vendredi de 9h à 19h. Nous nous ferons un plaisir de vous renseigner.')));
			
			$y = $pdf->GetY() + 10;
			$pdf->SetXY(120, $y);
			$pdf->Write(5, iconv('UTF-8', 'windows-1252', html_entity_decode('Votre conseiller')));
			
			
			
			// ajout des mentions legales
			$pdf->SetFont('Arial', '', 8);
			
			if($data_particulier->getAttribute('statut_particulier') == 3){
			$chainePDF = '(1) Total des points nets c’est-à-dire avec application de la réversion avant liquidation. Sur la base des derniers versements connus à ce jour et de vos déclarations.';
			$pdf->SetXY($marge_left, 220);
			$pdf->MultiCell($largeur_paragraphe, 3, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			$chainePDF = '(2) Cette simulation est non contractuelle, il ne s’agit pas d’un décompte de vos droits. Cette simulation est établie sur la base de vos déclarations et les résultats dépendent du respect des cotisations et versements mentionnés dans le tableau joint. Elle est établie sur la base des valeurs d’achat et de service du point 2015 sans tenir compte d’une revalorisation (cf : article 16 de la notice d’information).';
			$pdf->MultiCell($largeur_paragraphe, 3, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			$chainePDF = '(3) Avant déduction des prélèvements sociaux (article 3 de l’annexe fiscale Préfon-Retraite de la notice) et sans option de liquidation (réversion et dépendance).';
			$pdf->MultiCell($largeur_paragraphe, 3, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			$chainePDF = '(4) Le régime Préfon-Retraite garantit que la valeur de service du point ne peut pas diminuer (cf. Article 16 de la notice d’information).';
			$pdf->MultiCell($largeur_paragraphe, 3, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			} else {
				
			$chainePDF = '(1) Sous réserve de la fiscalité en vigueur. Votre plafond d’épargne retraite est mentionné sur votre avis d’imposition. Le régime Préfon-Retraite est un régime de retraite dont les arrérages sont passibles de l’impôt sur le revenu dans les mêmes conditions que les " pensions et retraites ". Plus d’information sur www.prefon-retraite.fr/public/La-rente-Prefon-Retraite/Deduction-fiscale.';
			$pdf->SetXY($marge_left, 220);
			$pdf->MultiCell($largeur_paragraphe, 3, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			$chainePDF = '(2) Cette simulation est non contractuelle, il ne s’agit pas d’un décompte de vos droits. Cette simulation est établie sur la base de vos déclarations et les résultats dépendent du respect des cotisations et versements mentionnés dans le tableau ci-dessus. Elle est établie sur la base des valeurs d’achat et de service du point 2015 sans tenir compte d’une revalorisation (cf : article 16 de la notice d’information).';
			$pdf->MultiCell($largeur_paragraphe, 3, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			$chainePDF = '(3) Avant déduction des prélèvements sociaux (article 3 de l’annexe fiscale Préfon-Retraite de la notice) et sans option de liquidation (réversion et dépendance).';
			$pdf->MultiCell($largeur_paragraphe, 3, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			$chainePDF = '(4) Le régime Préfon-Retraite garantit que la valeur de service du point ne peut pas diminuer (cf. Article 16 de la notice d’information).';
			}
			
			$chainePDF = 'Le régime PRÉFON-RETRAITE est un contrat d\'assurance de groupe, régime régi par les articles L. 441-1 et suivants du Code des assurances, dont l\'objet est la constitution et le service d\'une retraite par rente au profit des affiliés. Il est souscrit par la Caisse nationale de prévoyance de la fonction publique (Préfon) association régie par la loi du 1er juillet 1901 ayant son siège social 12 bis rue de Courcelles, 75008 Paris. L’objet social de l’association est d\'offrir aux fonctionnaires et assimilés des régimes de prévoyance complémentaire, notamment en matière de retraite ; d\'assurer la représentation des affiliés auprès des pouvoirs publics et des gestionnaires des régimes créés ; de veiller au respect des valeurs des organisations syndicales fondatrices de solidarité, de progrès social et d\'égalité dans la gestion des fonds collectés par les régimes créés, notamment par le choix d\'investissements socialement responsables. Il est distribué par la SAS Préfon-Distribution au capital social de 200 000 € entièrement libéré. 794 053 629 R.C.S. Paris immatriculée à l’ORIAS sous le n° 13008416 et ayant son siège social au 12bis rue de Courcelles, 75008 Paris. Il est souscrit auprès de CNP Assurances ayant son siège social au 4 place Raoul Dautry, 75716 Paris Cedex 15, SA au capital de 686 618 477 € entièrement libéré, 341 737 062 RCS Paris, Entreprise régie par le code des assurances, Groupe Caisse des Dépôts.';
			$pdf->SetXY($marge_left, $pdf->GetY()+3);
			$pdf->MultiCell($largeur_paragraphe, 3, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			$chainePDF = 'www.prefon-retraite.fr - www.prefon.asso.fr - www.prefon-distribution.com';
			$pdf->SetXY($marge_left, $pdf->GetY()+3);
			$pdf->MultiCell($largeur_paragraphe, 3, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			
			
			$pdf->SetFont('Arial', '', 8);
			$chainePDF = 'Préfon-Distribution – 12 bis rue de Courcelles 75008 Paris – N° ORIAS 13008416';
			$pdf->SetXY($marge_left, 288);
			$pdf->MultiCell(200, 3, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			$chainePDF = 'Page ' . $num_page;
			$pdf->SetXY($marge_left + $largeur_paragraphe , 288);
			$pdf->MultiCell(20, 3, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			$fileName = 'Simulation_';
			$fileName .= $_SESSION['STATUT_PARTICULIER'][$data_particulier->getAttribute('statut_particulier')];
			$fileName .= '_' . $data_simulation->getAttribute('Nom_Simulation');
			$fileName .= '_' . $data_particulier->getAttribute('firstName');
			$fileName .= '_' . $data_particulier->getAttribute('lastName');
			$fileName .= '.pdf';
			
			
			$pdf->output($fileName, 'D');
			

			
		}
		
		
	static function imprimer_precompte($data_particulier){
			
			$taille_corps = 11;
			$annee_courante = date("Y");
			$marge_left = 10;
			$pdf = new FPDI();

			$pdf->SetAutoPageBreak(true, 0.5) ;
			
			$marge_left = 15;
			// creation de la premiere page (recapuitulatif du contrat existant + options de la simulation)
			$pdf->AddPage();
			$pdf->SetFont('Arial','',10);
			$pdf->SetMargins($marge_left, 0, 30);
			
			//----------------- PAGE 1----------------------//
			// pavé d'adresse
			$chainePDF = strtoupper(pdf::AdressePersonne($data_particulier));
			$y = 40;				
			$pdf->SetXY(115, $y);
			$pdf->MultiCell(0, 5, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			$largeur_paragraphe = 175;

			$y += 25;
			
			$pdf->Image(serveur_url.DS.'webroot'.DS . 'assets/img/logo_PREFON_home.jpg', 10, 5, 40, 19, 'JPG');
				
			// Date --------------------------  	
			// mise en place de la date
			$chainePDF = 'Paris, le '.date('d/m/Y');
			//$y+=5;
			$pdf->SetXY(115, 15);
			$pdf->SetFont('Arial','',10);
			$pdf->MultiCell(0, 5, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			

			$y+= 20;
			
			// la civilité
			$genre = '';
			if($data_particulier->getAttribute('qualite_id') == 1){
				$chainePDF = $genre = ' Monsieur,';
			}else if($data_particulier->getAttribute('qualite_id') == 2){
				$chainePDF = $genre = ' Madame,';
			}else{
				$chainePDF = 'Madame, Monsieur,';
			}
			$pdf->SetXY($marge_left, $y);
			$pdf->SetFont('Arial','', $taille_corps);
			$pdf->MultiCell(0, 4, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)) . "\n");
			
			
			$y+=15;
			$pdf->SetXY($marge_left, $y);
			$pdf->SetFont('Arial','',$taille_corps);
			$pdf->MultiCell($largeur_paragraphe, 5, iconv('UTF-8', 'windows-1252', html_entity_decode('Nous avons bien reçu votre bulletin d’affiliation au régime PREFON- RETRAITE et je vous remercie de la confiance que vous nous accordez.')));
			$y = $pdf->GetY()+5;
			
			$pdf->SetXY($marge_left, $y);
			$pdf->MultiCell($largeur_paragraphe, 5, iconv('UTF-8', 'windows-1252', html_entity_decode('CNP Assurances, assureur du régime vous adressera dans les meilleurs délais votre certificat d’affiliation et vous communiquera votre numéro d’affiliation Préfon-Retraite. Ce dernier vous sera indispensable pour accéder à votre espace affilié sur le site www.prefon-retraite.fr.')));
			$y = $pdf->GetY()+5;
			
			$pdf->SetXY($marge_left, $y);
			$pdf->MultiCell($largeur_paragraphe, 5, iconv('UTF-8', 'windows-1252', html_entity_decode('De plus, je vous joins la demande de précompte à remettre à votre service de paie.')));
			$y = $pdf->GetY()+10;
			
			$pdf->SetXY($marge_left, $y);
			$pdf->MultiCell($largeur_paragraphe, 5, iconv('UTF-8', 'windows-1252', html_entity_decode('Au nom de toute l\'équipe de Préfon, je vous souhaite la bienvenue.' ."\n" . 'Je vous prie d’agréer,'. $genre .' l’expression de nos sentiments distingués.')));
			$y = $pdf->GetY()+10;
			
			$pdf->SetXY($marge_left, $y);
			$pdf->MultiCell($largeur_paragraphe, 5, iconv('UTF-8', 'windows-1252', html_entity_decode('Votre conseiller Préfon')));
			
			
			$pdf->AddPage();
			// set the source file
			$pdf->setSourceFile(ROOT.DS.'webroot'.DS.'assets/pdf/formulaire_demande_precompte.pdf');
			// import page 1
			$tplIdx = $pdf->importPage(1);
			// use the imported page and place it at point 10,10 with a width of 100 mm
			$pdf->useTemplate($tplIdx);
			
			$pdf->SetFont('Arial', 'B', 11);
			$pdf->SetFont('');
			$pdf->SetTextColor(0, 0, 0);

			$x = 58;
			$y = 75.2;
			//Madame
			if($data_particulier->getAttribute('qualite_id') == 2){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}
			
			//Monsieur
			$x += 39.3;
			if($data_particulier->getAttribute('qualite_id') == 1){
				$pdf->SetXY($x, $y);
				$pdf->Write(0, 'X');
			}

			//Nom de naissance
			$x = 54;
			$y = 80;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data_particulier->getAttribute('nom_naissance')));

			// Nom
			$x = 29;
			$y = 85;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data_particulier->getAttribute('lastName')));


			// prenom
			$x = 34;
			$y = 90;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data_particulier->getAttribute('firstName')));

			// Num Compte préfon
			$x = 67.2;
			$y = 95;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data_particulier->getAttribute('num_cotisant'));

			// Num Sécu sociale
			$x = 66;
			$y = 99.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, $data_particulier->getAttribute('num_insee'));


			// Date_naissance

			$x = 34;
			$y = 105;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, lof::convertDateFromAdobeFormat($data_particulier->getAttribute('tsBirth')));


			// Adresse
			$x = 35;
			$y = 109.5;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data_particulier->getAttribute('adresse_3')));

			//complement adresse
			$x = 15;
			$y = 114.3;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data_particulier->getAttribute('adresse_1')));

			//Code postale
			$x = 45;
			$y = 119.2;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data_particulier->getAttribute('code_postal')));

			//Ville
			$x += 69;
			$pdf->SetXY($x, $y);
			$pdf->Write(0, utf8_decode($data_particulier->getAttribute('ville')));
			
			$classe = 0;
			
			if($data_particulier->getAttribute('statut_particulier') == 2){
				$classe = $data_particulier->getAttribute('Classe_Cotisation');
			}
			
			// Classe de cotsation
			$x = 115;
			$y = 142.8;
			$pdf->SetXY($x, $y);
			if($classe > 0){
				$pdf->Write(0, utf8_decode($classe));
			}
	
			$x = 100;
			$y = 147.8;
			$pdf->SetXY($x, $y);
			if($classe > 0){
				$pdf->Write(0, utf8_decode(number_format((lof::$listeValeurs['CLASSE_COTISATION_MONTANT'][$classe] / 12), 2, ',', ' ')));
			}
		
			$pdf->Output('Demande_de_precompte.pdf', 'D');

		}
		
		static function imprimer_courrier_accompagnement($data_particulier){
			
			$taille_corps = 11;
			$annee_courante = date("Y");
			$marge_left = 10;
			$pdf = new FPDI();

			$pdf->SetAutoPageBreak(true, 0.5) ;
			
			$marge_left = 15;
			// creation de la premiere page (recapuitulatif du contrat existant + options de la simulation)
			$pdf->AddPage();
			$pdf->SetFont('Arial','',10);
			$pdf->SetMargins($marge_left, 0, 30);
			
			//----------------- PAGE 1----------------------//
			// pavé d'adresse
			$chainePDF = strtoupper(pdf::AdressePersonne($data_particulier));
			$y = 40;				
			$pdf->SetXY(115, $y);
			$pdf->MultiCell(0, 5, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			
			$largeur_paragraphe = 175;

			$y += 7;
			
			$pdf->Image(serveur_url.DS.'webroot'.DS . 'assets/img/logo_PREFON_home.jpg', 10, 5, 40, 19, 'JPG');
				
			// Date --------------------------  	
			// mise en place de la date
			$chainePDF = 'Paris, le '.date('d/m/Y');
			//$y+=5;
			$pdf->SetXY(115, 15);
			$pdf->SetFont('Arial','',10);
			$pdf->MultiCell(0, 5, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)));
			

			$y+= 20;
			
			// la civilité
			$genre = '';
			if($data_particulier->getAttribute('qualite_id') == 1){
				$chainePDF = $genre = ' Cher '. $_SESSION['CIVILITE'][$data_particulier->getAttribute('qualite_id')] . ' ' . $data_particulier->getAttribute('firstName') . ' ' . $data_particulier->getAttribute('lastName') . ',';
			}else if($data_particulier->getAttribute('qualite_id') == 2){
				$chainePDF = $genre = ' Chère '. $_SESSION['CIVILITE'][$data_particulier->getAttribute('qualite_id')] . ' ' . $data_particulier->getAttribute('firstName') . ' ' . $data_particulier->getAttribute('lastName') . ',';
			}else{
				$chainePDF = $genre = ' Cher(e) ' . $data_particulier->getAttribute('firstName') . ' ' . $data_particulier->getAttribute('lastName') . ',';
			}
			$pdf->SetXY($marge_left, $y);
			$pdf->SetFont('Arial','', $taille_corps);
			$pdf->MultiCell(0, 4, iconv('UTF-8', 'windows-1252', html_entity_decode($chainePDF)) . "\n");
			
			
			$y+=15;
			$pdf->SetXY($marge_left, $y);
			$pdf->SetFont('Arial','',$taille_corps);
			$pdf->MultiCell($largeur_paragraphe, 5, iconv('UTF-8', 'windows-1252', html_entity_decode('Votre affiliation à Préfon-Retraite a été prise en compte sous le numéro :' . "\n" . $data_particulier->getAttribute('id'))));
			$y = $pdf->GetY()+5;
			
			$pdf->SetXY($marge_left, $y);
			$pdf->MultiCell($largeur_paragraphe, 5, iconv('UTF-8', 'windows-1252', html_entity_decode('Pour obtenir votre Certificat d’Affiliation, nous vous prions de nous retourner le bulletin d’affiliation daté et signé en dernière page accompagné d’une photocopie de votre pièce d’identité et d’un original de votre RIB pour le prélèvement automatique.')));
			$y = $pdf->GetY()+5;
			
			$pdf->SetXY($marge_left, $y);
			$pdf->MultiCell($largeur_paragraphe, 5, iconv('UTF-8', 'windows-1252', html_entity_decode('Renvoyez le tout dans une enveloppe sans affranchir à l’adresse :')));
			$y = $pdf->GetY()+6;
			
			$pdf->SetFont('Arial','B',$taille_corps);
			$pdf->SetXY($marge_left, $y);
			$pdf->MultiCell($largeur_paragraphe, 5, iconv('UTF-8', 'windows-1252', html_entity_decode('PREFON' . "\n")));
			//$pdf->SetXY($marge_left, $y);
			$pdf->MultiCell($largeur_paragraphe, 5, iconv('UTF-8', 'windows-1252', html_entity_decode('Autorisation 40980' . "\n")));
			//$pdf->SetXY($marge_left, $y);
			$pdf->MultiCell($largeur_paragraphe, 5, iconv('UTF-8', 'windows-1252', html_entity_decode('75385 Paris cedex 08' . "\n")));

			
			$pdf->SetFont('Arial','',$taille_corps);
			$y = $pdf->GetY()+10;
			$pdf->SetXY($marge_left, $y);
			$pdf->MultiCell($largeur_paragraphe, 5, iconv('UTF-8', 'windows-1252', html_entity_decode('Votre conseiller Préfon-Retraite' . "\n\n")));
			$pdf->MultiCell($largeur_paragraphe, 5, iconv('UTF-8', 'windows-1252', html_entity_decode(($_SESSION['conseillerEnLigne']['partenaires'] == 0 && $_SESSION['conseillerEnLigne']['lieu_evenement'] == 1) ? ($_SESSION['conseillerEnLigne']['label'] . "\n\n") : (''))));
	
			$pdf->MultiCell($largeur_paragraphe, 5, iconv('UTF-8', 'windows-1252', html_entity_decode('Pour toutes questions, merci de composer le 3025, appel gratuit depuis un poste fixe du lundi au vendredi de 9h à 19h.')));


			$pdf->SetFont('Arial','',8);
			$y = $pdf->GetY()+20;
			$pdf->SetXY($marge_left, $y);
			
			$pdf->MultiCell($largeur_paragraphe, 5, iconv('UTF-8', 'windows-1252', html_entity_decode("Le régime PREFON-RETRAITE est un contrat d’assurance de groupe, régime régi par les articles L. 441-1 et suivants du Code des assurances, dont l’objet est la constitution et le service d’une retraite par rente au profit des affiliés. Il est souscrit par l’Association Préfon, association régie par la loi du 1er juillet 1901 ayant son siège social, 12 bis rue de Courcelles à Paris 8e auprès de : CNP Assurances, société anonyme au capital de 594 151292 euros entièrement libéré. Entreprise régie par le Code des assurances 341 737 062 RCS Paris, ayant son siège social 4 place Raoul Dautry à Paris 15e, assureur du régime Préfon-Retraite.\n\n")));

			$pdf->MultiCell($largeur_paragraphe, 5, iconv('UTF-8', 'windows-1252', html_entity_decode("L’Association Préfon (Caisse Nationale de Prévoyance de la Fonction Publique) fidèle aux valeurs des organisations syndicales fondatrices de solidarité, de progrès social et d’égalité a pour objet : d’offrir aux fonctionnaires et assimilés des régimes de prévoyance complémentaire, notamment en matière de retraite ; d’assurer la représentation des affiliés auprès des pouvoirs publics et des gestionnaires des régimes créés ; de veiller au respect des valeurs rappelées ci-dessus dans la gestion des fonds collectés par les régimes créés, notamment par le choix d’investissements socialement responsables.")));

			
			$pdf->Output('Demande_courrier_accompagnement.pdf', 'I');

		}
		
		
		
	
}
	