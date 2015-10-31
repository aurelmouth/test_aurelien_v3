
			<div class="row">
				<div class="col-md-12" style="margin-bottom : 10px">
						<div align="right">
							<a target="_blank" href="<?php echo Router::url('recipient/imprimer_simulation/'.$this->request->params[0] . '/' . $this->request->params[1]);?>" class="btn btn-info">Imprimer la simulation</a>
							&nbsp;<a class="btn btn-success send_mail_sim_view">Envoyer la simulation</a>
						</div>
				</div>
			</div>

			<div class="row ">
				<div class="col-md-12">

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
					
								
								
								<div class="form-horizontal  col-md-6" align="center">
										<div class="form-group">
											<label class="col-md-5 control-label">Nom simulation : </label>
											<div class="col-md-7">
												<input type="text" class="form-control" name="nom_simulation" value="<?php echo $this->vars['Nom_Simulation'];?>" readonly="readonly">
											</div>
										</div>
										
									<div class="form-group">
										<label class="col-md-5 control-label">Date de création : </label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="created" value="<?php echo lof::convertDateFromAdobeFormat($this->vars['created']);?>" readonly="readonly">
										</div>
									</div>
			
							</div>
				
							<div class="form-horizontal  col-md-6" role="form">
								

								
									<div class="form-group">
                                        <label class="col-md-5 control-label">Créée par : </label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="label" value="<?php echo $this->vars['label'];?>" readonly="readonly">
										</div>
                                    </div>
																								
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
										<input type="text" class="form-control" name="date_liquida" value="<?php echo lof::convertDateFromAdobeFormat($this->vars['Date_Liquidation']); ?>" readonly="readonly">
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-5 control-label">Classe de cotisation choisie : </label>
									<div class="col-md-7">
										<select name="Classe_Cotisation" class="form-control" disabled="disabled">
											<?php foreach(lof::$listeValeurs['CLASSE_COTISATION'] as $cle => $valeur) {?>
											<option value="<?php echo $cle;?>" <?php if(isset($this->vars['classe']) && $this->vars['classe'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
											<?php } ?>
										</select>	
									</div>
								</div>
								
								
								<div class="form-group" style="display:none">
									<label class="col-md-5 control-label"></label>
									<div class="col-md-7">
										<select name="Classe_Cotisation_Mois" class="form-control" disabled="disabled">
											<?php foreach(lof::$listeValeurs['CLASSE_COTISATION_MOIS'] as $cle => $valeur) {?>
											<option value="<?php echo $cle;?>" <?php if(isset($this->vars['classe']) && $this->vars['classe'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
											<?php } ?>
										</select>	
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-5 control-label">Option de réversion (avant liquidation) : </label>
									<div class="col-md-7">
											<div class="radio-list">
												<label class="radio-inline">
													<input type="radio" name="reversion" value="1" <?php if(isset($this->vars['Option_Reversion']) && $this->vars['Option_Reversion']) echo "checked" ?> disabled="disabled"> Oui </label>
												<label class="radio-inline">
													<input  type="radio" name="reversion" value="0" <?php if(isset($this->vars['Option_Reversion']) && !$this->vars['Option_Reversion']) echo "checked" ?> disabled="disabled"> Non </label>
											</div>
									</div>
								</div>
								
				</div>
				
				<div class="form-horizontal  col-md-6" role="form">
								
									<div class="form-group">
                                        <label class="col-md-5 control-label">Âge à la liquidation : </label>
										<div class="col-md-7">
											<input type="text" class="form-control" name="age_liquidation" value="<?php echo $this->vars['Age_Liquidation'] . ' ans';?>" readonly="readonly">
										</div>
                                    </div>

									<div class="form-group">
                                        <label class="col-md-5 control-label">Avec progression tous les 5 ans : </label>
										<div class="col-md-7">
                                                <div class="checkbox-list">
                                                    <label>
                                                        <input type="checkbox" name="Progression_Palier_O_N" value="1" <?php if(isset($this->vars['Progression_Palier_O_N']) && $this->vars['Progression_Palier_O_N']) echo "checked" ?> disabled="disabled"> </label>
                                                </div>
										</div>
                                    </div>
								
									<div class="form-group">
                                        <label class="col-md-5 control-label">Abondement (PUPH / MCUPH) : </label>
										<div class="col-md-7">
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="radio" name="abondementpuph" value="1" <?php if(isset($this->vars['Abondement']) && $this->vars['Abondement']) echo 'checked="checked"'; ?> disabled="disabled"> Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="abondementpuph" value="0" <?php if(isset($this->vars['Abondement']) && !$this->vars['Abondement']) echo 'checked="checked"'; ?> disabled="disabled"> Non </label>
                                            </div>
										</div>
                                    </div>
								
						</div>
				
							
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>

			
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
								<?php if(isset($this->vars['Abondement']) && $this->vars['Abondement']){?><th>Abondement</th><?php } ?>
								<th>Rachat</th>
								<th>Révers.</th>
								<th>Points bruts</th>
								<th>Cumul bruts</th>
								<th>Points nets</th>
								<th>Cumul nets</th>
							</tr>
							
						</thead>
						<tbody align="right">
							<?php
								list($jour, $moisLiquidation, $anneeLiquidation) = split('[/.-]', lof::convertDateFromAdobeFormat($this->vars['Date_Liquidation']));

								$detail = new stdClass();
								
                                foreach($this->request->data->domDetails->getElementsByTagName('simulation_detail') as $detail){
									$annee = $detail->getAttribute("annee");
									$age = $detail->getAttribute("age");
									$classe = $detail->getAttribute("classe");
									$cotisation = ($annee == $anneeLiquidation) ? ((lof::$listeValeurs['CLASSE_COTISATION_MONTANT'][$detail->getAttribute("classe")] * $moisLiquidation) / 12) : lof::$listeValeurs['CLASSE_COTISATION_MONTANT'][$detail->getAttribute("classe")];
									$nb_annees_rachat = ($detail->getAttribute("nb_annees_rachat") == 0) ? '' : $detail->getAttribute("nb_annees_rachat");
									$montant_rachat = ($detail->getAttribute("montant_rachat") == 0) ? '' : $detail->getAttribute("montant_rachat");
									$option_reversion = ($detail->getAttribute("option_reversion")) ? 'Oui' : 'Non';
									$points_brut = number_format($detail->getAttribute("points_brut"), 0, ',', ' ');
									$points_brut_cumul = number_format($detail->getAttribute("points_brut_cumul"), 0, ',', ' ');
									$points_net = number_format($detail->getAttribute("points_net"), 0, ',', ' ');
									$points_net_cumul = number_format($detail->getAttribute("points_net_cumul"), 0, ',', ' ');
		
									echo ('
									<tr>
                                        <td>'. $annee .'</td>                       
                                        <td>'. $age .'</td>                       
                                        <td>'. $classe .'</td>                       
                                        <td>'. number_format($cotisation, 2, ',', ' ').' &euro;</td>
										' . ((isset($this->vars['Abondement']) && $this->vars['Abondement']) ? ('<td>'. number_format($cotisation, 2, ',', ' ') .' &euro;</td>')  : ('')) .'
										<td><input type="text" size="2" value="'. $nb_annees_rachat .'" disabled/>&nbsp;<input type="text" size="5" value="'. $montant_rachat .'" disabled/></td>                       
                                        <td>'. $option_reversion .'</td>                       
                                        <td>'. $points_brut .'</td>                       
                                        <td>'. $points_brut_cumul .'</td>                       
                                        <td>'. $points_net .'</td>                       
                                        <td>'. $points_net_cumul .'</td>                                          
									</tr>
                                ');
									
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
							<?php
								$resultat = new stdClass();
								
                                foreach($this->request->data->domResultats->getElementsByTagName('simulation_resultats') as $resultat){
									$total_points_acquis_brut = number_format($resultat->getAttribute("total_points_acquis_brut"), 0, ',', ' ');
									$total_points_acquis_net = number_format($resultat->getAttribute("total_points_acquis_net"), 0, ',', ' ');
									$date_liquidation = lof::convertDateFromAdobeFormat($resultat->getAttribute("date_liquidation"));
									$age_liquidation = $resultat->getAttribute("age_liquidation");
									$coefficient_liquidation = number_format($resultat->getAttribute("coefficient_liquidation"), 3, ',', '');
									$total_points_liquides_net = number_format($resultat->getAttribute("total_points_liquides_net"), 0, ',', ' ');
									$montant_rente_annuelle_brut = number_format($resultat->getAttribute("montant_rente_annuelle_brut"), 2, ',', ' ');
									
									$bold = ($age_liquidation == $this->vars['Age_Liquidation']) ? ' style="font-weight:bold"' : '';
									
									echo ('
									<tr ' . $bold . ' >
										<td>'. $total_points_acquis_brut .'</td>                       
										<td>'. $total_points_acquis_net .'</td>                       
										<td>'. $date_liquidation .'</td>                                                                 
										<td>'. $age_liquidation .'</td>                                                                 
										<td>'. $coefficient_liquidation .'</td>                                                                 
										<td>'. $total_points_liquides_net .'</td>                                                                 
										<td>'. $montant_rente_annuelle_brut .' &euro;</td>  
									</tr>
									');
									
                                }
                            ?>
						
						
						
						</tbody>
					</table>
					Les projections à l’âge demandé + 1, 2 et 3 ans sont basées sur un maintien de la cotisation annuelle jusqu’à la liquidation
					</div>
					
					
					
							

							
                        </div>
                    </div>
                </div>
                
            </div>
			
			
			<div class="row">
				<div class="col-md-12" style="margin-bottom : 10px">
						<div align="right">
							<a target="_blank" href="#" class="btn btn-info">Imprimer la simulation</a>
							&nbsp;<a  class="btn btn-success send_mail_sim_view">Envoyer la simulation</a>
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
								<form id="validate_mail" method="post" action="<?php echo Router::url('recipient/update_email/' .$this->request->params[0] . '/'. $this->request->params[1]); ?>">
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
		
		<div id="send_mail_modal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Information</h4>
					</div>
					<div class="modal-body">
						<p>
							Voulez-vous vraiment envoyer cette simulation à <?php echo $this->vars['semail'];?>? <br>
						</p>
					</div>
					<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="btn btn-default">Annuler</button>
						<a type="button" href="<?php echo Router::url('recipient/envoyer_simulation/' . $this->request->params[0] . '/'. $this->request->params[1]. '/' . (isset($this->vars['idcontrat']) ? $this->vars['idcontrat'] : '0' )); ?>" class="btn btn-success">Oui</a>
					</div>
				</div>
			</div>
		</div>
	
			
			
			
		</div>
    </div>

	
	
    <!-- END PAGE CONTENT-->
