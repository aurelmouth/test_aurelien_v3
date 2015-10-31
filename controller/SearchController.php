<?php
class SearchController extends Controller{



    function search(){

		
		
		
        // Tester si l'utilisateur est bien loggué, sinon on le renvoie vers la page de login
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		
		//$this->loadModel('XtkWorkflow');
		//$this->XtkWorkflow->PostEvent($this->Session->read('header'), $this->Session->read('sessionToken'),'pre_camp_recur_demande_dossier_liquidation','signal_pdf','','<variables recipientid=\'6326906\'/>',false);
		
    }

    function result(){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		
		if(isset($_SESSION['zero_resultat'])){
			unset($_SESSION['zero_resultat']);
		}
		
		
		if($this->request->data){
		
				
		//echo mb_strtoupper(lof::wd_remove_accents($this->request->data->sFirstName));

	
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

        if ($this->request->data->Num_Cotisant <> '')
            $req .= '<condition expr="(Upper([infos_individu/@num_cotisant]) LIKE \''.mb_strtoupper(trim($this->request->data->Num_Cotisant),'UTF-8').'\' + \'%\')  OR (Upper([infos_individu/@num_allocataire]) LIKE \''.mb_strtoupper(trim($this->request->data->Num_Cotisant),'UTF-8').'\' + \'%\')"/>';

        if ($this->request->data->Num_Partenaire <> '')
            $req .= '<condition expr="Upper([infos_individu/@num_partenaire]) LIKE \''.mb_strtoupper(trim($this->request->data->Num_Partenaire),'UTF-8').'\' + \'%\'"/>';

        if ($this->request->data->sLastName <> '')
            $req .= '<condition expr="(Upper([infos_individu/@nom_naissance]) LIKE \''.addslashes(mb_strtoupper(lof::wd_remove_accents(trim($this->request->data->sLastName)),'UTF-8')).'\' + \'%\') OR (Upper([infos_individu/@nom_naissance]) LIKE \''.addslashes(mb_strtoupper(strtr(trim($this->request->data->sLastName),lof::$listeValeurs['UNWANTED_CHARS']))).'\' + \'%\') OR (Upper([infos_individu/@lastName]) LIKE \''.addslashes(mb_strtoupper(lof::wd_remove_accents(trim($this->request->data->sLastName)),'UTF-8')).'\' + \'%\') OR (Upper([infos_individu/@lastName]) LIKE \''.addslashes(mb_strtoupper(strtr(trim($this->request->data->sLastName),lof::$listeValeurs['UNWANTED_CHARS']))).'\' + \'%\')"/>';

		if ($this->request->data->departement <> '')
            $req .= '<condition expr="Substring([adresse-particulier/@code_postal],1 ,2 ) IN ('.trim($resultat).')"/>';
		
        if ($this->request->data->tsBirth <> '' && strlen(trim($this->request->data->tsBirth)) == 10){
            $req .= '<condition expr="[infos_individu/@tsBirth]=\''. lof::convertDateToAdobeFormat(trim($this->request->data->tsBirth)) .'\'"/>';
		}

        if (trim($this->request->data->sEmail) <> '')
            $req .= '<condition expr="Upper([contactabilite/@semail]) LIKE \'%\' + \''.mb_strtoupper(trim($this->request->data->sEmail)).'\' + \'%\'"/>';

		if($_SESSION['conseillerEnLigne']['partenaires'] > 0){
            $req .= '<condition expr="[origine/@sous_origine_id] = \'' . $_SESSION['conseillerEnLigne']['partenaires'] . '\'"/>';	
		}
		
		
		if($_SESSION['conseillerEnLigne']['droits'] == 2){
			$req .= '<condition expr="[infos_individu/@statut_particulier] = 3"/>';
		}
		
		
		$select = '<select>
                <node expr="@id"/> 
                <node expr="@created" alias="@created"/>
                <node expr="[infos_individu/@statut_particulier]" alias="@statut_particulier"/>
                <node expr="[infos_individu/@sous_statut]" alias="@sous_statut"/>
                <node expr="[infos_individu/@lastName]" alias="@lastName"/>
                <node expr="[infos_individu/@nom_naissance]" alias="@nom_naissance"/>
                <node expr="[infos_individu/@firstName]" alias="@firstName"/>
                <node expr="[infos_individu/@tsBirth]" alias="@tsBirth"/>
                <node expr="[adresse-particulier/@adresse_3]" alias="@adresse_3"/>
                <node expr="[adresse-particulier/@code_postal]" alias="@code_postal"/>
                <node expr="[adresse-particulier/@ville]" alias="@ville"/>
                <node expr="[infos_individu/@num_cotisant]" alias="@num_cotisant"/>
                <node expr="[infos_individu/@num_allocataire]" alias="@num_allocataire"/>
				<node expr="[origine/@origine_id]" alias="@origine_id"/>
				<node expr="[infos_individu/@qualite_id]" alias="@qualite_id"/>
				<node expr="[contactabilite/@semail]" alias="@semail"/>
            </select>';
		
			$req = '<condition expr="@id > 0"/>' . $req;
			$select .=          
            '<where>
                '.$req.'
            </where>';
			
			
			
			$_SESSION['select'] = $select;

		//echo htmlentities($select);
		//echo mb_strtoupper('mélanie','UTF-8');
		//exit();
		 
		
        // Recherche des particuliers répondant aux critères de recherche
        $this->request->data = new stdClass();
		$this->loadModel('XtkQueryDef');
        $this->request->data->dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), '<queryDef operation="select" schema="nms:recipient" lineCount="300" xtkschema="xtk:queryDef">' . $select . '</queryDef>');
		}
		else{
			$this->request->data = new stdClass();
			$this->loadModel('XtkQueryDef');
			$this->request->data->dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), '<queryDef operation="select" schema="nms:recipient" lineCount="300" xtkschema="xtk:queryDef">' . $_SESSION['select'] . '</queryDef>');
		}

    }
	
	function requestNoCondition($statut_particulier){
	}

}