<?php 
class ReceptionBAController extends Controller{



    function search(){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
    }

    function result(){
		
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
                <node expr="[infos_individu/@statut_particulier]" alias="@statut_particulier"/>
                <node expr="[infos_individu/@sous_statut]" alias="@sous_statut"/>
                <node expr="[infos_individu/@lastName]" alias="@lastName"/>
                <node expr="[infos_individu/@firstName]" alias="@firstName"/>
                <node expr="[infos_individu/@tsBirth]" alias="@tsBirth"/>
                <node expr="[adresse-particulier/@adresse_3]" alias="@adresse_3"/>
                <node expr="[adresse-particulier/@code_postal]" alias="@code_postal"/>
                <node expr="[adresse-particulier/@ville]" alias="@ville"/>
                <node expr="[infos_individu/@num_allocataire]" alias="@num_allocataire"/>
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
	
	
	function barecu($id){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		//requete de changement de sous statut
		$req = '<recipient xtkschema="nms:recipient" id="'. $id .'" _key="@id"  _operation="insertOrUpdate">
			<infos_individu
				sous_statut="6"
			/>
			</recipient>';
		
		//requete d'ajout de l'evenement
		//le lieu doit être changé avec le lieu par défaut de l'utilsiateur connecté
		$req2 = '<evenement xtkschema="pre:evenement"  _operation="insert"
			Date_Evenement="'. date('Y-m-d H:i:s')  .'"
			LIEU_Id="'. $_SESSION['conseillerEnLigne']['lieu_evenement'].'"
			CONSEILLER="'. $_SESSION['conseillerEnLigne']['label'].'"
			MODE_EVENEMENT_Id="3"
			MOTIF_EVENEMENT_Id="20"
			EnvoyerKitAffiliation="0"
			
			RESULTAT_EVENEMENT_Id=""
			Date_Rappel=""
			particulier_id="'. $id .'"
		>
			<Commentaire>'. '' . '</Commentaire>
		
		</evenement>';
		$this->loadModel('XtkSession');
		$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req);
		$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req2);
		
		$this->redirect('receptionba/search');
		
	}
	
	
	function create(){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		if($this->request->data){
			
			$date_jour = getdate();
			$id_crm_temp = $this->Session->read('username').$date_jour['seconds'].$date_jour['minutes'].$date_jour['hours'].$date_jour['mday'].$date_jour['mon'].$date_jour['year'];
		
			
			$req = '<recipient xtkschema="nms:recipient"  _operation="insert">
					<infos_individu
						firstName="'.trim($this->request->data->sFirstName).'"
						lastName="'.trim($this->request->data->sLastName).'"
						tsBirth="'.trim(lof::convertDateToAdobeFormat($this->request->data->tsBirth)).'"
						conseiller="'.$_SESSION['conseillerEnLigne']['label'].'"
						statut_particulier="2" 
						id_crm_temp="'.$id_crm_temp.'"							
					/>
				
					<origine
						origine_id="'.$this->request->data->ORIGINE_Id.'"
						sous_origine_id="'.$this->request->data->SOUS_ORIGINE_Id.'"
					/>
					
					
					<adresse-particulier
						code_postal="'.trim($this->request->data->Code_Postal).'"
					/>

				</recipient>';
			
			
			$this->loadModel('XtkSession');
			$this->request->data->dom = new stdClass();
			$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req);
			
			if($res){
				$tsBirth = lof::convertDateToAdobeFormat($this->request->data->tsBirth);
				$this->loadModel('XtkQueryDef');
				$this->request->data->dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef"><select><node expr="@id"/></select><where><condition expr="[infos_individu/@id_crm_temp] = \''.$id_crm_temp.'\'"/></where></queryDef>');
				if($this->request->data->dom->getElementsByTagName('recipient')->item(0) !== null){
					$this->set('id', $this->request->data->dom->getElementsByTagName('recipient')->item(0)->getAttribute('id'));
					$this->set('origine_id', $this->request->data->ORIGINE_Id);
					$this->set('sous_origine_id', $this->request->data->SOUS_ORIGINE_Id);
					$this->set('firstName', $this->request->data->sFirstName);
					$this->set('lastName', $this->request->data->sLastName);
					$this->set('tsBirth', $this->request->data->tsBirth);
					$this->set('code_postal', $this->request->data->Code_Postal);
					
					
				}else{
					$this->redirect('receptionba/search');
				}
			}else{
				$this->redirect('receptionba/search');
			}	
		}

	}
	
	
	
	
}