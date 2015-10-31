<?php 
class PagesController extends Controller{

	function index(){
		if (!$this->Session->read('logged'))
        {
            $this->redirect('login/login');
        }
		
		 //$this->loadModel('XtkWorkflow');
		 //$this->XtkWorkflow->PostEvent($this->Session->read('header'), $this->Session->read('sessionToken'),'pre_camp_recur_simulation_affilies','signal','','<variables recipientid=\'838752\' simulationid=\'74475000\' contratid=\'533969\'/>',false);
		
		
		if($_SESSION['conseillerEnLigne']['recherche'] && !($_SESSION['conseillerEnLigne']['reception_ba'] || $_SESSION['conseillerEnLigne']['affiliation'] || $_SESSION['conseillerEnLigne']['coupon_fidelite'] || $_SESSION['conseillerEnLigne']['coupon_prospect'] || $_SESSION['conseillerEnLigne']['bordereaux'])){
			$this->redirect('search/search');
		}
		
	}


	
}