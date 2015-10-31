<?php 
class Coupon_fidController extends Controller{
	
	
	
	function index(){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		
		if($this->request->data){
				$code_barre = trim($this->request->data->code_barre);
				$numero_affilie = trim($this->request->data->numero_affilie);
				$code_acceuil = trim($this->request->data->code_acceuil);
				$classe_actuelle = (strlen(trim($this->request->data->classe_actuelle)) == 1) ? trim($this->request->data->classe_actuelle) :  trim($this->request->data->classe_actuelle);
			
				$req = '<queryDef operation="select" schema="nms:recipient" xtkschema="xtk:queryDef">
			<select>
				
				<node expr="@id" alias="@id"/>

				<node expr="[infos_individu/@firstName]" alias="@firstName"/>
				<node expr="[infos_individu/@lastName]" alias="@lastName"/>

				<node expr="[adresse-particulier/@code_postal]" alias="@code_postal"/>
				<node expr="[adresse-particulier/@adresse_3]" alias="@adresse_3"/>
				<node expr="[adresse-particulier/@ville]" alias="@ville"/>


				
				<node expr="[contactabilite/@smobilephone]" alias="@smobilephone"/>
				<node expr="[contactabilite/@sphone]" alias="@sphone"/>
				<node expr="[contactabilite/@semail]" alias="@semail"/>
				
				<node expr="[contactabilite/@iblacklist]" alias="@iblacklist"/>
				<node expr="[contactabilite/@optin_prefon_telephone]" alias="@optin_prefon_telephone"/>
				<node expr="[contactabilite/@optin_prefon_sms]" alias="@optin_prefon_sms"/>
				<node expr="[contactabilite/@optin_prefon_email]" alias="@optin_prefon_email"/>
				<node expr="[contactabilite/@optin_prefon_courrier]" alias="@optin_prefon_courrier"/>
				<node expr="[contactabilite/@optin_partenaires]" alias="@optin_partenaires"/>
	
			</select>
				<where><condition expr="Upper([infos_individu/@num_cotisant]) = \''.mb_strtoupper(trim($numero_affilie)).'\'"/></where>
			</queryDef>';
		
		$this->request->data = new stdClass();
		$this->loadModel('XtkQueryDef');
		$this->request->data->dom = $this->XtkQueryDef->ExecuteQueryByRequest($this->Session->read('header'), $this->Session->read('controller'), $req);
		if($this->request->data->dom->getElementsByTagName('recipient')->item(0) !== null){
			foreach($this->request->data->dom->getElementsByTagName('recipient') as $recip){
				foreach($recip->attributes as $attrName => $attrNode){
					$this->set($attrName, $attrNode->nodeValue);
				}
			}
		}else{
			$this->set('affilie_inexistant', 'yes');
		}	
		
		$this->set('code_barre', trim($code_barre));
		$this->set('numero_affilie', trim($numero_affilie));
		$this->set('code_acceuil', trim($code_acceuil));
		$this->set('classe_actuelle', trim($classe_actuelle));
		

		
		}
	}
	
	
	function saisie_coupon_fid($id_particulier){
		if (!$this->Session->read('logged')){
            $this->redirect('login/login');
        }
		if($this->request->data){
		$classe_actuelle = (is_numeric(trim($this->request->data->classe_actuelle))) ? (trim($this->request->data->classe_actuelle)) : ('0');
		$req = '<recipient xtkschema="nms:recipient" id="'. $id_particulier .'" _key="@id"  _operation="insertOrUpdate">

				<contactabilite
				optin_prefon_courrier="'.$this->request->data->Optin_Prefon_Courrier.'"
				optin_prefon_telephone="'.$this->request->data->Optin_Prefon_Telephone.'"
				optin_prefon_sms="'.$this->request->data->Optin_Prefon_SMS.'"
				optin_prefon_email="'.$this->request->data->Optin_Prefon_Email.'"
				optin_partenaires="'.$this->request->data->Optin_Partenaires.'"

				semail="'.trim($this->request->data->sEmail).'"
				sphone="'.trim($this->request->data->sPhone).'"
				smobilephone="'.trim($this->request->data->sMobilePhone).'"								
				/>
				</recipient>';
				
				$req2 = '<evenement xtkschema="pre:evenement"  _operation="insert"
				Date_Evenement="'. date('Y-m-d H:i:s')  .'"
				LIEU_Id="1"
				CONSEILLER="'. $_SESSION['conseillerEnLigne']['label'].'"
				MODE_EVENEMENT_Id="9"
				MOTIF_EVENEMENT_Id="7"
				Montant_Versement="' . floatval(str_replace(' ', '', str_replace(',', '.',trim($this->request->data->montant_versement)))) . '"
				Classe_Actuelle="' . $classe_actuelle.'"
				Classe_Nouvelle="' . trim($this->request->data->nouvelle_classe) .'"
				Code_Campagne="' . trim($this->request->data->code_acceuil) .'"
				RESULTAT_EVENEMENT_Id=""
				Date_Rappel=""
				particulier_id="'. $id_particulier .'"
				>
				<Commentaire>'. '' . '</Commentaire>

				</evenement>';
				
				$this->loadModel('XtkSession');
				$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req);
				$res2 = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $req2);
				

				
				if($res && $res2){
					$this->redirect('coupon_fid/index');
				}else{
					$this->redirect('pages/index');
				}
				
				
				
		}
	}
	
	
}