
        <div id="table" class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-folder-open-o"></i>Contrats retraite
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
					
					

					
					<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="table_contracts">
						<thead>
							<tr>
								<th>Statut Retraite</th>
								<th>N° affilié cotisant</th>
								<th>Date souscription</th>
								<th>Caractéristiques</th>
								<th>Points acquis</th>
								<th>Date liquidation</th>
								<th>N° affilié allocataire</th>
								<th>Rente annuelle</th>
							</tr>
							
						</thead>
						<tbody>
                            <?php
                                $contr = new stdClass();
								$autreContrat = false;
                                foreach($this->request->data->dom->getElementsByTagName('contrat') as $contr){
									/*
									$A = lof::getValueFromSessiion("", $contr, "");
									$B = lof::getValueFromSessiion("", $contr, "");
									$C = lof::getValueFromSessiion("", $contr, "");
									$D = lof::getValueFromSessiion("", $contr, "");
									*/
									
									

									if($contr->getAttribute('nature_contrat_id') == 1){	
										echo ('
										<tr>
											<td><a href="'.Router::url('recipient/contract_details/'.$this->request->params[0].'/'.$contr->getAttribute("idcontrat")).'">'. (isset($_SESSION['STATUT_CONTRAT'][$contr->getAttribute("sous_statut")]) ? $_SESSION['STATUT_CONTRAT'][$contr->getAttribute("sous_statut")] : '')  .'</a></td>
											<td><a href="'.Router::url('recipient/contract_details/'.$this->request->params[0].'/'.$contr->getAttribute("idcontrat")).'">'. $contr->getAttribute("num_contrat") .'</a></td>
											<td><a href="'.Router::url('recipient/contract_details/'.$this->request->params[0].'/'.$contr->getAttribute("idcontrat")).'">'. lof::convertDateFromAdobeFormat($contr->getAttribute("date_souscription"))  .'</a></td>
											<td><a href="'.Router::url('recipient/contract_details/'.$this->request->params[0].'/'.$contr->getAttribute("idcontrat")).'"> Reversion : '. ($contr->getAttribute('reversion') ? 'Oui' : 'Non') .'</a></td>
											<td><a href="'.Router::url('recipient/contract_details/'.$this->request->params[0].'/'.$contr->getAttribute("idcontrat")).'">'. ($contr->getAttribute('points_acquis_bruts') > 0 ? number_format($contr->getAttribute('points_acquis_bruts'), 2, ',', ' ') : '')   .'</a></td>
											<td><a href="'.Router::url('recipient/contract_details/'.$this->request->params[0].'/'.$contr->getAttribute("idcontrat")).'">'. lof::convertDateFromAdobeFormat($contr->getAttribute("date_liquidation")) .'</a></td>
											<td><a href="'.Router::url('recipient/contract_details/'.$this->request->params[0].'/'.$contr->getAttribute("idcontrat")).'">'. $contr->getAttribute("num_contrat_allocataire") .'</a></td>
											<td><a href="'.Router::url('recipient/contract_details/'.$this->request->params[0].'/'.$contr->getAttribute("idcontrat")).'">'. ($contr->getAttribute("montant_rente_allocataire") > 0 ? round($contr->getAttribute("montant_rente_allocataire"), 2) : '') .'</a></td>
										</tr>
										');
									}else{
										$autreContrat = true;
									}
                                }
                            ?>		
					
						</tbody>
					</table>
					</div>		

							
                        </div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
			

	<?php if($autreContrat) {?>
	 <div id="table" class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-folder-open-o"></i>Autres contrats
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
					
					
					

					
					<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="table_contracts_dependance">
						<thead>
							<tr>
								<th>Nature</th>
								<th>N° du contrat</th>
								<th>Date souscription</th>
								<th>Date fin</th>
							</tr>
							
						</thead>
						<tbody>
                            <?php
                                $contr = new stdClass();
                                foreach($this->request->data->dom->getElementsByTagName('contrat') as $contr){
						
									if($contr->getAttribute('nature_contrat_id') != 1){	
										echo ('
										<tr>
											<td>'. (isset($_SESSION['NATURE_CONTRAT'][$contr->getAttribute('nature_contrat_id')]) ? $_SESSION['NATURE_CONTRAT'][$contr->getAttribute('nature_contrat_id')] : ' ')  .'</td>
											<td>'. $contr->getAttribute("num_contrat") .'</td>
											<td>'. lof::convertDateFromAdobeFormat($contr->getAttribute("date_souscription"))  .'</td>
											<td>'. lof::convertDateFromAdobeFormat($contr->getAttribute("date_liquidation"))  .'</td>
										</tr>
										');
									}
                                }
                            ?>		
					
						</tbody>
					</table>
					</div>		

							
                        </div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
	<?php }?>		

							
			
			
			
			
            <!-- END PAGE CONTENT-->

        </div>




    </div>
    <!-- END PAGE CONTENT-->
