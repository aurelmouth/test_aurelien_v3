		<div id="sim_general">	
		   <div class="row ">
				<div class="col-md-12">
					<div align="right">
							
					</div>
			<div class="row">
				<div class="col-md-6" align="left">
					<a class="btn btn-info imprimer_sim">Imprimer la simulation</a>
					&nbsp;<a class="btn btn-success send_mail_sim">Envoyer la simulation</a>
				</div>
				<div class="col-md-6" align="right" style="text-align:right; margin-bottom:10px"><a class="btn btn-success trigger">Enregistrer</a></div>
			</div>
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet col-md-12">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-university"></i> Intitulé et nom
							</div>
							<div class="tools">
								<a href="" class="collapse"></a>
							</div>
						</div>
						
					<div class="portlet-body col-md-12">
					
								
								<form id="nom_sim_form" action="javascript:void(0);" class="login-form">
								<div class="form-horizontal  col-md-6">
									
										<div class="form-group">
											<label class="col-md-5 control-label">Nom simulation : <span style="font-size : 12px; color : red"> * </span></label>
											<div class="col-md-7">
												<input type="text" class="form-control" name="nom_simulation" value="">
											</div>
										</div>
									
										
									<div class="form-group">
										<label class="col-md-5 control-label">Date de création : </label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="created" value="<?php echo date('d/m/Y');?>" readonly="readonly">
										</div>
									</div>
			
								</div>
								</form>
				
							<div class="form-horizontal  col-md-6" role="form">
								

								
									<div class="form-group">
                                        <label class="col-md-5 control-label">Créée par : </label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="created_by" value="<?php echo $_SESSION['conseillerEnLigne']['label'];?>" readonly="readonly">
										</div>
                                    </div>
																							
							</div>
				
							
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>

			
		   <div class="row ">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet col-md-12">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-university"></i> Informations
							</div>
							<div class="tools">
								<a href="" class="collapse"></a>
							</div>
						</div>
						
						<div class="portlet-body col-md-12">
						
					<div class="form-horizontal  col-md-6" role="form">
								
								<div class="form-group">
									<label class="col-md-5 control-label">Date de naissance : </label>
									<div class="col-md-7">
										<input type="text" class="form-control" name="tsBirth" value="<?php if(isset($this->vars['tsBirth'])) echo lof::convertDateFromAdobeFormat($this->vars['tsBirth']);?>" readonly="readonly">
									</div>
								</div>
															
								<div class="form-group">
									<label class="col-md-5 control-label">Âge à l'affiliation : </label>
									<div class="col-md-7">
										<input type="text" class="form-control" name="age_affiliation" value="" readonly="readonly">
									</div>
								</div>
								
								
								<div class="form-group">
									<label class="col-md-5 control-label">Valeur d'acquisition du point : </label>
									<div class="col-md-7">
										<input type="text" class="form-control" name="valeur_aquisition_points" value="1,7847 en 2015" readonly="readonly">
									</div>
								</div>
									
								<?php if(isset($this->vars['montant_capacite_versement'])) {?>	
								<div class="form-group">
									<label class="col-md-5 control-label">Capacité de versement : </label>
									<div class="col-md-7">
										<input type="text" class="form-control" name="montant_capacite_versement" value="<?php if(isset($this->vars["montant_capacite_versement"]) && $this->vars["montant_capacite_versement"] > 0)echo number_format($this->vars["montant_capacite_versement"], 2, ',', ' ') . '&euro;';?>" readonly="readonly">
									</div>
								</div>
								<?php } ?>
								
								<?php if(isset($this->vars['points_acquis_bruts']) && $this->vars['points_acquis_bruts'] > 0) {?>	
								<div class="form-group">
									<label class="col-md-5 control-label">Points bruts : </label>
									<div class="col-md-7">
										<input type="text" class="form-control" name="points_acquis_bruts" value="<?php echo number_format($this->vars["points_acquis_bruts"], 2, ',', ' ') . ' au ' . lof::convertDateFromAdobeFormat($this->vars['date_maj_contrat_cotisant']); ?>" readonly="readonly">
									</div>
								</div>
								<?php } ?>
								
								<?php if(isset($this->vars['points_acquis_bruts_der_exerc']) && $this->vars['points_acquis_bruts_der_exerc'] > 0) {?>	
								<div class="form-group">
									<label class="col-md-5 control-label">Points bruts au dernier excercice : </label>
									<div class="col-md-7">
										<input type="text" class="form-control" name="points_acquis_bruts" value="<?php echo number_format($this->vars["points_acquis_bruts_der_exerc"], 2, ',', ' ') . ' au 31/12/' . $this->vars['dernier_exercice_complet']; ?>" readonly="readonly">
									</div>
								</div>
								<?php } ?>
								
				</div>
				
				<div class="form-horizontal  col-md-6" role="form">
								
									<div class="form-group">
                                        <label class="col-md-5 control-label">Date de souscription : </label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="date_souscription" value="<?php echo (isset($this->vars['date_souscription']) ? lof::convertDateFromAdobeFormat($this->vars['date_souscription']) : date('d/m/Y')); ?>" readonly="readonly">
										</div>
                                    </div>
															
									<div class="form-group">
                                        <label class="col-md-5 control-label">Âge limite : </label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="age_limite_liquidation" value="<?php echo (isset($this->vars['age_limite_liquidation']) &&  $this->vars['age_limite_liquidation'] > 0) ? ($this->vars['age_limite_liquidation'] . ' ans') : ''; ?>" readonly="readonly">
										</div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-5 control-label">Valeur de service du point : </label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="valeur_service_points" value="0,0923 € en 2015" readonly="readonly">
										</div>
                                    </div>
									
									<?php if(isset($this->vars['montant_capacite_versement'])) {?>
									<div class="form-group">
                                        <label class="col-md-5 control-label">Capacité de versement en nombre d'années : </label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="nb_annees_capacite_versement" value="<?php if(isset($this->vars['nb_annees_capacite_versement']) && $this->vars['nb_annees_capacite_versement']> 0) echo $this->vars['nb_annees_capacite_versement'];?>" readonly="readonly">
										</div>
                                    </div>
									<?php }?>
									
								<?php if(isset($this->vars['points_acquis_nets']) && $this->vars['points_acquis_nets'] > 0) {?>	
								<div class="form-group">
									<label class="col-md-5 control-label">Points nets : </label>
									<div class="col-md-7">
										<input type="text" class="form-control" name="points_acquis_nets" value="<?php echo number_format($this->vars['points_acquis_nets'], 2, ',', ' ') . ' au ' . lof::convertDateFromAdobeFormat($this->vars['date_maj_contrat_cotisant']); ?>" readonly="readonly">
									</div>
								</div>
								<?php } ?>
								
								<?php if(isset($this->vars['points_acquis_nets_der_exerc']) && $this->vars['points_acquis_nets_der_exerc'] > 0) {?>	
								<div class="form-group">
									<label class="col-md-5 control-label">Points nets au dernier excercice : </label>
									<div class="col-md-7">
										<input type="text" class="form-control" name="points_acquis_bruts" value="<?php echo number_format($this->vars["points_acquis_nets_der_exerc"], 2, ',', ' ') . ' au 31/12/' . $this->vars['dernier_exercice_complet']; ?>" readonly="readonly">
									</div>
								</div>
								<?php } ?>
								
						</div>
				
							
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>
			
			
			
		   <div class="row" id="params">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet col-md-12">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-university"></i> Paramètres
							</div>
							<div class="tools">
								<a href="" class="collapse"></a>
							</div>
						</div>
						
						<div class="portlet-body col-md-12">
						
					<div class="form-horizontal  col-md-6" role="form">
								

															
								<div class="form-group">
									<label class="col-md-5 control-label">Date de liquidation : </label>
									<div class="col-md-7">
										<div class="col-md-3">
											<input type="text" class="form-control" name="jour" value="01" style="padding-left:0px" readonly="readonly">
										</div>
										<div class="col-md-4">
											<select class="form-control" name="mois" style="padding-left:0px">
												<?php for($i = 1; $i <= 12; $i++){ ?>
													<option value="<?php echo sprintf("%02d", $i); ?>"><?php echo sprintf("%02d", $i); ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="col-md-5">
											<select class="form-control" name="annee" style="padding-left:0px">
											</select>
										</div>
									</div>
								</div>
								
								<?php if(isset($this->vars['annne_dernier_versement'])){?>
										<input type="hidden" name="annne_dernier_versement" value="<?php echo $this->vars['annne_dernier_versement'];?>" />
								<?php } ?>

								<div class="form-group">
									<label class="col-md-5 control-label">Classe de cotisation choisie : </label>
									<div class="col-md-7">
										<select name="Classe_Cotisation" class="form-control">
											<?php foreach(lof::$listeValeurs['CLASSE_COTISATION_MONTANT'] as $cle => $valeur) {
												if($cle != 45){
													if($this->vars['statut_particulier'] == 2){
														if(($cle < 5 && $cle % 2 != 0) || $cle >= 5 ){
															echo '<option value="' . $cle . '" '. ((isset($this->vars['classe']) && $this->vars['classe'] == $cle) ? 'selected="selected"' : '') . '>' . $cle . ' : ' . $valeur . ' € / an</option>';
														}
													}else{
															echo '<option value="' . $cle . '" '. ((isset($this->vars['classe']) && $this->vars['classe'] == $cle) ? 'selected="selected"' : '') . '>' . $cle . ' : ' . $valeur . ' € / an</option>';
													}
												}
											}
											?>
										</select>	
									</div>
								</div>
								
								
								<div class="form-group" style="display:none">
									<label class="col-md-5 control-label"></label>
									<div class="col-md-7">
										<select name="Classe_Cotisation_Mois" class="form-control">
											<option value="0">Suspension</option>
											<?php foreach(lof::$listeValeurs['CLASSE_COTISATION_MOIS'] as $cle => $valeur) {
												if($cle != 45){
													if($this->vars['statut_particulier'] == 2){
														if(($cle < 5 && $cle % 2 != 0) || $cle >= 5 ){
															echo '<option value="' . $cle . '" '. ((isset($this->vars['classe']) && $this->vars['classe'] == $cle) ? 'selected="selected"' : '') . '>' . $valeur . ' € / an</option>';
														}
													}else{
															echo '<option value="' . $cle . '" '. ((isset($this->vars['classe']) && $this->vars['classe'] == $cle) ? 'selected="selected"' : '') . '>' . $valeur . ' € / an</option>';
													}
												}
											}?>
										</select>	
									</div>
								</div>
								
									<div class="form-group">
                                        <label class="col-md-5 control-label">Option de réversion (avant liquidation) : </label>
										<div class="col-md-7">
												<div class="radio-list">
													<label class="radio-inline">
														<input type="radio" name="reversion" value="1" <?php if((isset($this->vars['reversion']) && $this->vars['reversion']) || !isset($this->vars['reversion'])) echo "checked" ?>> Oui </label>
													<label class="radio-inline">
														<input  type="radio" name="reversion" value="0" <?php if(isset($this->vars['reversion']) && !$this->vars['reversion']) echo "checked" ?>> Non </label>
												</div>
										</div>
                                    </div>
								
				</div>
				
				<div class="form-horizontal  col-md-6" role="form">
								
									<div class="form-group">
                                        <label class="col-md-5 control-label">Âge à la liquidation : </label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="age_liquidation" value="65 ans" readonly="readonly">
										</div>
                                    </div>

									<div class="form-group">
                                        <label class="col-md-5 control-label">Avec progression tous les 5 ans : </label>
										<div class="col-md-7">
                                                <div class="checkbox-list">
                                                    <label>
														<input type="hidden" name="Progression_Palier_O_N" value="0"/>
                                                        <input type="checkbox" name="Progression_Palier_O_N" value="1"> </label>
                                                </div>
										</div>
                                    </div>
								
									<div class="form-group">
                                        <label class="col-md-5 control-label">Abondement (PUPH / MCUPH) : </label>
										<div class="col-md-7">
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="radio" name="abondementpuph" value="1" <?php if(isset($this->vars['abondementpuph']) && $this->vars['abondementpuph']) echo 'checked="checked"'; ?>> Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="abondementpuph" value="0" <?php if((isset($this->vars['abondementpuph']) && !$this->vars['abondementpuph']) || !isset($this->vars['abondementpuph'])) echo 'checked="checked"'; ?>> Non </label>
                                            </div>
										</div>
                                    </div>
								
						</div>
				
							
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>

			<?php if(isset($this->vars['retraite'])){?>
			<div id="derniers_versements" class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-search"></i>Versements des derniers exercices 
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
					
					<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr align="center">
								<th>Année</th>
								<th>Age</th>
								<th>Classe</th>
								<th>Versements réguliers</th>
								<?php if($this->request->data->Abondement || $this->vars['abondementpuph']){?><th>Abondement</th><?php } ?>
								<th>Versements libres / spécifiques</th>
								<th>Somme des versements</th>
								<!--<th>Révers.</th>-->
								<th>Points bruts</th>
								<th>Points nets</th>
								<!--<th>Cumul des versements</th>
								<th>Montant vers attendus </th>-->
							</tr>
							
						</thead>
						<tbody>
							<?php
							/*
								$cumulPointsBruts = 0;
								$cumulPointsNet = 0;
                                $vers = new stdClass();
                                foreach($this->request->data->dom2->getElementsByTagName('detail_contrat') as $vers){
									$cumulPointsBruts += $vers->getAttribute("Points_Acquis_Bruts");
									$cumulPointsNet += $vers->getAttribute("Points_Acquis_Net");
									
									$annee = explode('/', $_SESSION['tsBirth'])[2];
										
									echo ('
									<tr>
                                        <td>'. $vers->getAttribute("Exercice_Fiscal") .'</td>
                                        <td>'. ($vers->getAttribute("Exercice_Fiscal") - $annee) .'</td>
                                        <td>'. $vers->getAttribute("Classe")  .'</td>
                                        <td>'. number_format($vers->getAttribute("Cotisations_Annuelles"), 2, ',', ' ') .' &euro;</td>
                                        <td>'. number_format($vers->getAttribute("Rachat"), 2, ',', ' ') .' &euro;</td>
                                        <td>'. number_format($vers->getAttribute("Abondement"), 2, ',', ' ') .' &euro;</td>
                                        <td>'. number_format($vers->getAttribute("AutreType"), 2, ',', ' ') .' &euro;</td>
                                        <td>'. number_format($vers->getAttribute("SommeVersement"), 2, ',', ' ') .' &euro;</td>
                                        <td>'. round($vers->getAttribute("Points_Acquis_Bruts")) .'</td>
                                        <td>'. round($cumulPointsBruts) .'</td>                                
                                ');
									echo '</tr>';
                                }
								*/
                                $vers = new stdClass();
                                foreach($this->request->data->dom2->getElementsByTagName('detail_contrat') as $vers){
									
									$annee = explode('/', lof::convertDateFromAdobeFormat($this->vars['tsBirth']))[2];
										
									echo ('
									<tr>
                                        <td>'. $vers->getAttribute("Exercice_Fiscal") .'</td>
                                        <td>'. ($vers->getAttribute("Exercice_Fiscal") - $annee) .'</td>
                                        <td>'. $vers->getAttribute("Classe")  .'</td>
                                        <td>'. number_format($vers->getAttribute("Cotisations_Annuelles"), 2, ',', ' ') .' &euro;</td>
                                        ' . (($this->request->data->Abondement || $this->vars['abondementpuph']) ? ('<td>'. number_format($vers->getAttribute("Abondement"), 2, ',', ' ') .' &euro;</td>') : ('')) . '
                                        <td>'. number_format($vers->getAttribute("AutreType"), 2, ',', ' ') .' &euro;</td>
                                        <td>'. number_format($vers->getAttribute("SommeVersement"), 2, ',', ' ') .' &euro;</td>
                                        <td>'. number_format($vers->getAttribute("Points_Acquis_Bruts"), 0, ',', ' ') .'</td>
                                        <td>'. number_format($vers->getAttribute("Points_Acquis_Net"), 0, ',', ' ') .'</td>                                
                                ');
									echo '</tr>';
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
			<?php } ?>
			
			<div id="sim" class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-search"></i>Simulation 
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
					
					<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="simulation_details">
						<thead>
							<tr align="center">
								<th>Année</th>
								<th>Age</th>
								<th>Classe</th>
								<th>Cotisation annuelle </th>
								<th>Rachat</th>
								<th>Abondement</th>
								<th>Révers.</th>
								<th>Points bruts</th>
								<th>Cumul bruts</th>
								<th>Points nets</th>
								<th>Cumul nets</th>
							</tr>
							
						</thead>
						<tbody align="right">
			
					
						</tbody>
					</table>
					</div>
					
					
					
							

							
                        </div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
			


			
			
			<div class="row">
            <div class="col-md-12">
                
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-eur"></i>Rente
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
					
					<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="table_rente">
						<thead>
							<tr>
								<th>Total points bruts</th>
								<th>Total points nets</th>
								<th>date de liquidation</th>
								<th>Age à la liquidation</th>
								<th>Coeff de liquidation</th>
								<th>Total points à la liquidation</th>
								<th>Rente annuelle brute</th>
							</tr>
							
						</thead>
						<tbody align="right">
						
						</tbody>
					</table>
					Les projections à l’âge demandé + 1, 2 et 3 ans sont basées sur un maintien de la cotisation annuelle jusqu’à la liquidation
					</div>
					
					
					
							

							
                        </div>
                    </div>
                </div>
                
            </div>
			  
		   <div class="row">
				<div class="col-md-6" align="left">
					<a class="btn btn-info imprimer_sim">Imprimer la simulation</a>
					&nbsp;<a class="btn btn-success send_mail_sim">Envoyer la simulation</a>
				</div>
				<div class="col-md-6" align="right" style="text-align:right; margin-bottom:10px"><a class="btn btn-success trigger">Enregistrer</a></div>
			</div>
			
			</div>
			
			
			<div id="name_missing" class="modal fade" data-keyboard="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Information</h4>
						</div>
						<div class="modal-body">
							<p>
								La saisie du nom de simulation est obligatoire ! 
							</p>
						</div>
						<div class="modal-footer">
							<button  data-dismiss="modal" class="btn btn-success">OK</button>
						</div>
					</div>
				</div>

			</div>

	
		<div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Information</h4>
					</div>
					<div class="modal-body">
						<div class="alert alert-danger display-hide"  style="text-align:center">
						<button class="close" data-close="alert"></button>
						<span>
						Date de naissance invalide. </span>
						</div>
						<p>
							 La date de naissance semble manquante ou incorrecte ! <br>
							 Veuillez saisir une date de naissance valide ! 
						</p>
						<div class="row">
							<div class="col-md-7">
								<form id="validate_tsBirth" method="post" action="<?php echo Router::url('recipient/update_tsBirth/' .$this->request->params[0]); ?>">
									<input type="text" class="form-control" name="date_naissance" placeholder="Date de naissance au format JJ/MM/AAAA">
								</form>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" id="continue">Valider</button>
					</div>
				</div>
			</div>
		</div>
		
		
		<div id="mail_missing" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Information</h4>
					</div>
					<div class="modal-body">
						<div class="alert alert-danger display-hide"  style="text-align:center">
						<button class="close" data-close="alert"></button>
						<span>
						Email manquant ou trop petit. </span>
						</div>
						<p>
							 L'adresse mail semble manquante ou incorrecte ! <br>
							 Veuillez saisir une adrssse mail ! 
						</p>
						<div class="row">
							<div class="col-md-7">
								<form id="validate_mail" method="post" action="<?php echo Router::url('recipient/update_email/' .$this->request->params[0]); ?>">
									<input type="text" class="form-control" name="email" placeholder="Saisissez un email valide s'il-vous-plait">
								</form>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="btn btn-default">Annuler</button>
						<button type="button" class="btn btn-success" id="continue_mail">Valider</button>
					</div>
				</div>
			</div>
		</div>
		
		<div id="xml_modal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Information</h4>
					</div>
					<div class="modal-body">
						<p id="modal_sim_p">
							Voulez-vous sauvegarder cette simulation ? <br>
						</p>
						<div class="row">
							<div class="col-md-7">
								<form id="xml_form" method="post" action="<?php echo Router::url('recipient/add_simulation/' .$this->request->params[0]); ?>">
									<input id="xml_input" type="hidden" name="xml">
								</form>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="btn btn-default">Annuler</button>
						<button type="button" class="btn btn-success" id="validate_simulation">Valider</button>
					</div>
				</div>
			</div>
		</div>
	
	
		</div>
    </div>
	
    <!-- END PAGE CONTENT-->
