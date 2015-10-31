<?php 
class TestController extends Controller{
	
	
	
	function test(){
				$this->loadModel('XtkSession');
				for($i = 1; $i < 50; $i++){
				$update_request = '<recipient xtkschema="nms:recipient" _key="@id" id="' . $i .'"  _operation="insertOrUpdate">
									<infos_contrat
										date_saisie="' . date('Y-m-d H:i:s') .'"
										num_bordereau="0"
									/>
									</recipient>';
				$res = $this->XtkSession->Write($this->Session->read('header'), $this->Session->read('controller'), $update_request);
				}
				if($res){
					$this->redirect('bordereaux/result');
				}
	}
	
	function coupon_fid(){

	}
	
	function search(){

	}
	
	function result(){

	}

	function search_aff(){

	}
	function edit_aff(){

	}
	function aff_details(){

	}
}