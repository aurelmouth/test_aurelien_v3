<?php 
class BordereauxController extends Controller{
	
	
	
	function result(){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }

		$req = '<queryDef operation="select" schema="pre:bordereaux" xtkschema="xtk:queryDef">
					<select>
						<node expr="@id_bordereaux"/> 
						<node expr="@created"/> 
						<node expr="@date_transmission" alias="@date_transmission"/>
						<node expr="@cree_par" alias="@cree_par"/>
						<node expr="@Nombre_particuliers" alias="@Nombre_particuliers"/>
					</select>
					<where>
						<condition expr="@id_bordereaux > 0" />
					</where>
					<orderBy>
						<node expr="@id_bordereaux" sortDesc="true"/>
					</orderBy>
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
	
	
	function liste_particuliers(){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
								
				
	}	
	
	function saisir_bordereau($id_bord=null){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		  
		if(isset($id_bord)){
		$req = '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef">
			<select>
				<node expr="@id"/>
				<node expr="[infos_individu/@lastName]" alias="@lastName"/>
				<node expr="[infos_individu/@sous_statut]" alias="@sous_statut"/>
				<node expr="[infos_individu/@firstName]" alias="@firstName"/>
				<node expr="[infos_individu/@tsBirth]" alias="@tsBirth"/>
				<node expr="[infos_contrat/@date_saisie]" alias="@date_saisie"/>
				<node expr="[adresse-particulier/@adresse_3]" alias="@adresse_3"/>
				<node expr="[adresse-particulier/@code_postal]" alias="@code_postal"/>
				<node expr="[adresse-particulier/@ville]" alias="@ville"/>
			</select>
			<where>
				<condition expr="@id > 0"/>
				<condition expr="[infos_contrat/@date_saisie] IS NOT NULL"/>
				<condition expr="[infos_contrat/@num_bordereau] = 0"/>
			</where>
		</queryDef>';
		
		$this->request->data = new stdClass();
		$this->loadModel('XtkQueryDef');
		$this->request->data->dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req);

		/*
		$update_request = '<recipient-collection xtkschema="nms:recipient">'; 
		
		foreach($this->request->data->dom->getElementsByTagName('recipient') as $recip){
			$update_request .= '<recipient id="' . $recip->getAttribute('id') .'" _key="@id" _operation="update">
								<infos_contrat
									date_saisie="' . date('Y-m-d H:i:s') .'"
									num_bordereau="1"
								/>
								</recipient>';
		}
		
		$update_request .=  '</recipient-collection>';
		
		
		echo htmlentities($update_request);
		
		exit();
			*/
		$req2 = '<queryDef operation="select" schema="pre:bordereaux" xtkschema="xtk:queryDef">
				<select>
					<node expr="max(@id_bordereaux)" alias="@id_bordereau"/>
				</select>
			</queryDef>';
			
		$this->request->data->dom2 = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req2);

		$id_bordereau = intval($this->request->data->dom2->getElementsByTagName('bordereaux')->item(0)->getAttribute('id_bordereau')) + 1;


			
		$req3 = '<bordereaux xtkschema="pre:bordereaux"  _operation="insert"
			id_bordereaux="'. $id_bordereau .'"
			cree_par="'. $_SESSION['conseillerEnLigne']['label'].'"
			Nombre_particuliers="' . $this->request->data->dom->getElementsByTagName('recipient')->length.'"
			>
			</bordereaux>';
		$this->loadModel('XtkSession');
		$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req3);

		if($res){ 
			
				
			foreach($this->request->data->dom->getElementsByTagName('recipient') as $recip){
				$update_request = '<recipient xtkschema="nms:recipient" _key="@id" id="' . $recip->getAttribute('id') .'"  _operation="insertOrUpdate">
									<infos_contrat
										num_bordereau="' . $id_bordereau .'"
									/>
									</recipient>';
				$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $update_request);
			}
			
			
			if($res){
				$this->redirect('bordereaux/details/' . $id_bordereau);
			}else{
				$this->redirect('bordereaux/result');
			}
		}
			
		}else{
					$req = '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef">
					<select>
						<node expr="@id"/>
						<node expr="[infos_individu/@lastName]" alias="@lastName"/>
						<node expr="[infos_individu/@sous_statut]" alias="@sous_statut"/>
						<node expr="[infos_individu/@firstName]" alias="@firstName"/>
						<node expr="[infos_individu/@tsBirth]" alias="@tsBirth"/>
						<node expr="[infos_contrat/@date_saisie]" alias="@date_saisie"/>
						<node expr="[adresse-particulier/@adresse_3]" alias="@adresse_3"/>
						<node expr="[adresse-particulier/@code_postal]" alias="@code_postal"/>
						<node expr="[adresse-particulier/@ville]" alias="@ville"/>
					</select>
					<where>
						<condition expr="@id > 0"/>
						<condition expr="[infos_contrat/@date_saisie] IS NOT NULL"/>
						<condition expr="[infos_contrat/@num_bordereau] = 0"/>
					</where>
					<orderBy>
						<node expr="[infos_individu/@lastName]" sortAsc="true"/>
					</orderBy>
					
				</queryDef>';
				
				$req2 = '<queryDef operation="select" schema="pre:bordereaux" xtkschema="xtk:queryDef">
						<select>
							<node expr="max(@id_bordereaux)" alias="@id_bordereau"/>
						</select>
					</queryDef>';
				
				$this->request->data = new stdClass();
				$this->loadModel('XtkQueryDef');
				$this->request->data->dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req);
				$this->request->data->dom2 = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req2);
				
				$id_bordereau = intval($this->request->data->dom2->getElementsByTagName('bordereaux')->item(0)->getAttribute('id_bordereau')) + 1;
				
				$this->set('id_bordereau', $id_bordereau);
		}


}	
	
	function details($id_bordereau){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		
		if(isset($id_bordereau)){
	
		$req = '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef">
			<select>
				<node expr="@id"/>
				<node expr="[infos_individu/@lastName]" alias="@lastName"/>
				<node expr="[infos_individu/@sous_statut]" alias="@sous_statut"/>
				<node expr="[infos_individu/@firstName]" alias="@firstName"/>
				<node expr="[infos_individu/@tsBirth]" alias="@tsBirth"/>
				<node expr="[infos_contrat/@date_saisie]" alias="@date_saisie"/>
				<node expr="[adresse-particulier/@adresse_3]" alias="@adresse_3"/>
				<node expr="[adresse-particulier/@code_postal]" alias="@code_postal"/>
				<node expr="[adresse-particulier/@ville]" alias="@ville"/>
			</select>
			<where>
				<condition expr="@id > 0"/>
				<condition expr="[infos_contrat/@date_saisie] IS NOT NULL"/>
				<condition expr="[infos_contrat/@num_bordereau]=' . $id_bordereau . '"/>
			</where>
		</queryDef>';
		
		
		$req2 = '<queryDef operation="select" schema="pre:bordereaux" xtkschema="xtk:queryDef">
					<select>
						<node expr="@id_bordereaux"/> 
						<node expr="@created" alias="@created"/> 
						<node expr="@date_transmission" alias="@date_transmission"/>
						<node expr="@cree_par" alias="@cree_par"/>
						<node expr="@Nombre_particuliers" alias="@Nombre_particuliers"/>
					</select>
					<where>
						<condition expr="@id_bordereaux='. $id_bordereau .'" />
					</where>
				</queryDef>';
				
		
		$this->request->data = new stdClass();
		$this->loadModel('XtkQueryDef');
		$this->request->data->dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req);
		$this->request->data->dom2 = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req2);
		
		
		if($this->request->data->dom2->getElementsByTagName('bordereaux')->item(0) != null && strlen($this->request->data->dom2->getElementsByTagName('bordereaux')->item(0)->getAttribute('date_transmission')) == 0){
			$this->set('transmettre', 'yes');
		}
		
		
		foreach($this->request->data->dom2->getElementsByTagName('bordereaux') as $bord){
			foreach($bord->attributes as $attrName => $attrNode){
				$this->set($attrName, $attrNode->nodeValue);
			}
		}
		
		}else{
			$this->redirect('bordereaux/result');
		}
	}
	
	
	function transmettre($id_bordereau){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		/*
		$req = '<bordereaux xtkschema="pre:bordereaux"  _operation="update" id_bordereaux="'. $id_bordereau .'" _key="@id_bordereaux"
				date_transmission="' . date('Y-m-d H:i:s') .'"
			>
			</bordereaux>';
		$this->loadModel('XtkSession');
		$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req);
		*/
		
		$this->loadModel('XtkWorkflow');
		$this->XtkWorkflow->PostEvent($this->Session->read('header'), $this->Session->read('sessionToken'),'pre_wkf_bordereaux','signal','','<variables bordereau_id=\''. $id_bordereau .'\'/>',false);	
		$this->redirect('bordereaux/result');
		
	}
	
	function imprimer($id_bordereau){
		if(isset($id_bordereau)){
			$req = '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef">
				<select>
					<node expr="@id"/>
					<node expr="[infos_individu/@lastName]" alias="@lastName"/>
					<node expr="[infos_individu/@sous_statut]" alias="@sous_statut"/>
					<node expr="[infos_individu/@firstName]" alias="@firstName"/>
					<node expr="[infos_individu/@tsBirth]" alias="@tsBirth"/>
					<node expr="[infos_contrat/@date_saisie]" alias="@date_saisie"/>
					<node expr="[adresse-particulier/@adresse_3]" alias="@adresse_3"/>
					<node expr="[adresse-particulier/@code_postal]" alias="@code_postal"/>
					<node expr="[adresse-particulier/@ville]" alias="@ville"/>
				</select>
				<where>
					<condition expr="@id > 0"/>
					<condition expr="[infos_contrat/@date_saisie] IS NOT NULL"/>
					<condition expr="[infos_contrat/@num_bordereau] = ' . $id_bordereau . '"/>
				</where>
				<orderBy>
					<node expr="[infos_individu/@lastName]" sortAsc="true"/>
				</orderBy>
				
			</queryDef>';
			
			$this->request->data = new stdClass();
			$this->loadModel('XtkQueryDef');
			$this->request->data->dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req);
		
			if($this->request->data->dom){
				$pdf=new FPDF();
				$pdf->SetAutoPageBreak(true, 1) ;
				$marge_left = 40;
				
				// creation de la page
				$pdf->AddPage();
				$pdf->SetFont('Arial','',10);
				$pdf->SetMargins(5, 0, 10);
				
				// ajout du logo en haut a gauche
				$pdf->Image(serveur_url.DS.'webroot'.DS . 'assets/img/logo_prefon_2015.png', 10, 10, 40, 19, 'PNG');
				
				// ajout du titre				
				$y=40;
				$pdf->SetXY(0, $y);
				$pdf->SetFont('Arial','B',12);
				$pdf->MultiCell(0, 5, 'BORDEREAU DE TRANSMISSION DES AFFILIATIONS', 0, 'C');	
				
				// Date --------------------------  	
				// mise en place de la date
				$pdf->SetFont('Arial','',12);
				$chainePDF = 'Date : '.date('d/m/Y');
				$y+=20;
				$pdf->SetXY(0, $y);
				$pdf->MultiCell(0, 5, $chainePDF, 0, 'R');
				
				
				// $idbordereau = $_GET["IdBordereau"];
				
				////affichage du numero de  bordereau
				$chainePDF = utf8_decode('Bordereau N° '.$id_bordereau);
				$y+=10;
				$pdf->SetXY(10, $y);
				$pdf->MultiCell(0, 5, $chainePDF);
				
				//le nombre de fiches trouvées -----
				$chainePDF = 'Nombre de bulletins d\'affiliation saisis : '.sprintf("%d", $this->request->data->dom->getElementsByTagName('recipient')->length);
				$y+=10;
				$pdf->SetXY(10, $y);
				$pdf->MultiCell(0, 5, $chainePDF);
				
				//entête du tableau
				
				$taille_cols = array(20, 25, 40, 40, 20, 45);
				
				$y+= 20;
				$x = 10;
				$pdf->SetXY($x, $y);
				$pdf->SetFont('Arial', '', 8);
				$pdf->SetTextColor(0,0,0);
				$pdf->SetFillColor(255, 255, 255);
				$pdf->SetDrawColor(0, 0, 0);
				
				
				$pdf->Cell($taille_cols[0], 8, 'Date de saisie', 1, 0, 'C', true);
				$pdf->SetXY($pdf->GetX()+0.2, $y);
				$pdf->Cell($taille_cols[1], 8, utf8_decode('N° Particulier'), 'TRB', 0, 'C', true);
				$pdf->SetXY($pdf->GetX()+0.2, $y);
				$pdf->Cell($taille_cols[2], 8, 'Nom', 'TRB', 0, 'C', true);
				$pdf->SetXY($pdf->GetX()+0.2, $y);
				$pdf->Cell($taille_cols[3], 8, utf8_decode('Prénom'), 'TRB', 0, 'C', true);
				$pdf->SetXY($pdf->GetX()+0.2, $y);
				$pdf->Cell($taille_cols[4], 8, 'CP', 'TRB', 0, 'C', true);
				$pdf->SetXY($pdf->GetX()+0.2, $y);
				$pdf->Cell($taille_cols[5], 8, 'Ville', 'TRB', 0, 'C', true);
				
				
				
				$y+= 8.2;

				foreach($this->request->data->dom->getElementsByTagName('recipient') as $recip){
					if($pdf->GetY() > 280)
					{
						$pdf->AddPage();
						$y = 9.8;
						$pdf->Line($x, $y, $x + array_sum($taille_cols)+1, $y);
						$y+=0.2;
					}
					$pdf->SetXY($x, $y);
					
					//quelle date devons nous utiliser
					$date = lof::convertDateFromAdobeFormat($recip->getAttribute('date_saisie'));
					/*if($row["Date_Visiteur_Affilie"]!="")$date = $row["Date_Visiteur_Affilie"];
					else if($row["Date_Prospect_Affilie"]!="")$date = $row["Date_Prospect_Affilie"];
					else $date = $row["Date_Modification"];*/
					
					$pdf->Cell($taille_cols[0], 8, lof::convertDateFromAdobeFormat($recip->getAttribute('date_saisie')), 'LBR', 0, 'C', true);
					$pdf->SetXY($pdf->GetX()+0.2, $y);
					$pdf->Cell($taille_cols[1], 8, $recip->getAttribute('id'), 'RB', 0, 'C', true);
					$pdf->SetXY($pdf->GetX()+0.2, $y);
					$pdf->Cell($taille_cols[2], 8, utf8_decode($recip->getAttribute('lastName')), 'RB', 0, 'C', true);
					$pdf->SetXY($pdf->GetX()+0.2, $y);
					$pdf->Cell($taille_cols[3], 8, utf8_decode($recip->getAttribute('firstName')), 'RB', 0, 'C', true);
					$pdf->SetXY($pdf->GetX()+0.2, $y);
					$pdf->Cell($taille_cols[4], 8, utf8_decode($recip->getAttribute('code_postal')), 'RB', 0, 'C', true);
					$pdf->SetXY($pdf->GetX()+0.2, $y);
					$pdf->Cell($taille_cols[5], 8, utf8_decode($recip->getAttribute('ville')), 'RB', 0, 'C', true);
			
					$y+= 8.2;
					
					
				}
				$pdf->output();
					

			}
		
		
		
		
		}
	}

}