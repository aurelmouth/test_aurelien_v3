            <!-- BEGIN PAGE CONTENT -->
					
			<div class="row">
                <!-- BEGIN COL1 -->		
                <div class="col-md-6 ">
					<div class="portlet" id="info_contrat_cotisant">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-group"></i> Informations contrat cotisant
                            </div>
                            <div class="tools">
                                <a href="" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-horizontal" role="form">
                                <div class="form-body">
                                  
								  
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Date mise à jour CNP : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="date_maj_contrat_cotisant" value="<?php if(isset($this->vars['date_maj_contrat_cotisant'])) echo lof::convertDateFromAdobeFormat($this->vars['date_maj_contrat_cotisant']);?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">N° de contrat : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="num_contrat" value="<?php if(isset($this->vars['num_contrat'])) echo $this->vars['num_contrat'];?>" readonly="readonly">
										</div>
                                    </div>
								  
								  
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Date de souscription souscripteur :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="" value="<?php if(isset($this->vars['date_souscription'])) echo lof::convertDateFromAdobeFormat($this->vars['date_souscription']);?>" readonly="readonly">
										</div>
                                    </div>
									
								  
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Date de naissance : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="date_naissance_import_cotisant" value="<?php if(isset($this->vars['tsBirth'])) echo lof::convertDateFromAdobeFormat($this->vars['tsBirth']);?>" readonly="readonly">
										</div>
                                    </div>
									
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Date maximum de liquidation :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="date_limite_liquidation" value="<?php if(isset($this->vars['date_limite_liquidation'])) echo lof::convertDateFromAdobeFormat($this->vars['date_limite_liquidation']);?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Age limite de liquidation :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="age_limite_liquidation" value="<?php if(isset($this->vars['age_limite_liquidation'])) echo $this->vars['age_limite_liquidation'];?>" readonly="readonly">
										</div>
                                    </div>
								
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Abondement PUPH:</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="abondementpuph" value="<?php echo (isset($this->vars['abondementpuph']) && $this->vars['abondementpuph'] ? 'Oui' : 'Non');?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Etat :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="statut_retraite_cotisant_id" value="<?php if(isset($_SESSION['STATUT_CONTRAT_RETRAITE_COTISANT'][$this->vars['statut_retraite_cotisant_id']])) echo $_SESSION['STATUT_CONTRAT_RETRAITE_COTISANT'][$this->vars['statut_retraite_cotisant_id']];?>" readonly="readonly">
										</div>
                                    </div>
									
									<?php if(isset($_SESSION['MOTIF_SORTIE_CONTRAT_RETRAITE_COTISANT'][$this->vars['motif_sortie_retraite_cotisant_id']])) {?>
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Motif de sortie :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="motif_sortie_retraite_cotisant_id" value="<?php echo $_SESSION['MOTIF_SORTIE_CONTRAT_RETRAITE_COTISANT'][$this->vars['motif_sortie_retraite_cotisant_id']];?>" readonly="readonly">
										</div>
                                    </div>
									<?php } ?>
									
									<?php if(isset($this->vars['date_liquidation']) && strlen($this->vars['date_liquidation']) > 0) {?>
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Date de liquidation :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="date_liquidation" value="<?php if(isset($this->vars['date_liquidation'])) echo lof::convertDateFromAdobeFormat($this->vars['date_liquidation']);?>" readonly="readonly">
										</div>
                                    </div>
									<?php } ?>
									
									<?php if(isset($_SESSION['LIQUIDATION_CONTRAT_RETRAITE_COTISANT'][$this->vars['liquidation_retraite_cotisant_id']])) {?>
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Mode de liquidation :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="liquidation_retraite_cotisant_id" value="<?php if(isset($_SESSION['LIQUIDATION_CONTRAT_RETRAITE_COTISANT'][$this->vars['liquidation_retraite_cotisant_id']])) echo $_SESSION['LIQUIDATION_CONTRAT_RETRAITE_COTISANT'][$this->vars['liquidation_retraite_cotisant_id']];?>" readonly="readonly">
										</div>
                                    </div>
									<?php } ?>
									
									
                                </div>
                            </div>
                        </div>
                    </div>
					
				<?php if(isset($this->vars['num_contrat_allocataire']) && strlen($this->vars['num_contrat_allocataire']) > 0){?>	
			    <div class="portlet" id="info_contrat_allocataire">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-group"></i> Informations contrat allocataire
                            </div>
                            <div class="tools">
                                <a href="" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-horizontal" role="form">
                                <div class="form-body">
                                  
								  
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Date mise à jour CNP  : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="date_maj_contrat_allocataire" value="<?php if(isset($this->vars['date_maj_contrat_allocataire'])) echo lof::convertDateFromAdobeFormat($this->vars['date_maj_contrat_allocataire']);?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">N° contrat allocataire : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="num_contrat_allocataire" value="<?php if(isset($this->vars['num_contrat_allocataire'])) echo $this->vars['num_contrat_allocataire'];?>" readonly="readonly">
										</div>
                                    </div>
								  
								  
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Date liquidation :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="date_liquidation" value="<?php if(isset($this->vars['date_liquidation'])) echo lof::convertDateFromAdobeFormat($this->vars['date_liquidation']);?>" readonly="readonly">
										</div>
                                    </div>
									
								  
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Type de contrat allocataire : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="type_compte_retraite_allocataire_id" value="<?php if(isset($_SESSION['TYPE_COMPTE_CONTRAT_RETRAITE_ALLOCATAIRE'][$this->vars['type_compte_retraite_allocataire_id']])) echo $_SESSION['TYPE_COMPTE_CONTRAT_RETRAITE_ALLOCATAIRE'][$this->vars['type_compte_retraite_allocataire_id']];?>" readonly="readonly">
										</div>
                                    </div>
									
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Etat contrat allocataire :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="statut_retraite_allocataire_id" value="<?php if(isset($_SESSION['STATUT_CONTRAT_RETRAITE_ALLOCATAIRE'][$this->vars['statut_retraite_allocataire_id']])) echo $_SESSION['STATUT_CONTRAT_RETRAITE_ALLOCATAIRE'][$this->vars['statut_retraite_allocataire_id']];?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Date état contrat allocataire :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="date_statut_contrat_allocataire" value="<?php if(isset($this->vars['date_statut_contrat_allocataire'])) echo lof::convertDateFromAdobeFormat($this->vars['date_statut_contrat_allocataire']);?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Motif sortie contrat allocataire :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="motif_sortie_retraite_allocataire_id" value="<?php if(isset($_SESSION['MOTIF_SORTIE_CONTRAT_RETRAITE_ALLOCATAIRE'][$this->vars['motif_sortie_retraite_allocataire_id']])) echo $_SESSION['MOTIF_SORTIE_CONTRAT_RETRAITE_ALLOCATAIRE'][$this->vars['motif_sortie_retraite_allocataire_id']];?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Date sortie contrat allocataire :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="date_sortie_contrat_allocataire" value="<?php if(isset($this->vars['date_sortie_contrat_allocataire'])) echo lof::convertDateFromAdobeFormat($this->vars['date_sortie_contrat_allocataire']);?>" readonly="readonly">
										</div>
                                    </div>
									
									
                                </div>
                            </div>
                        </div>
                    </div>
				<?php } ?>
					
					
					
					<div class="portlet" id="points_retraite">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-group"></i> Points Retraite
                            </div>
                            <div class="tools">
                                <a href="" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-horizontal" role="form">
                                <div class="form-body">
                                  
								  
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Date du dernier versement : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="date_dernier_versement" value="<?php if(isset($this->vars['date_dernier_versement'])) echo lof::convertDateFromAdobeFormat($this->vars['date_dernier_versement']);?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Stock de points bruts : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="points_acquis_bruts" value="<?php if(isset($this->vars['points_acquis_bruts'])) echo number_format($this->vars['points_acquis_bruts'], 0, ',', ' ');?>" readonly="readonly">
										</div>
                                    </div>
								  
								  
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Stock de points nets :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="" value="<?php if(isset($this->vars['points_acquis_nets'])) echo number_format($this->vars['points_acquis_nets'], 0, ',', ' ');?>" readonly="readonly">
										</div>
                                    </div>
									
								  
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Stock de points rachetés bruts : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="points_rachetes_bruts" value="<?php if(isset($this->vars['points_rachetes_bruts']) && $this->vars['points_rachetes_bruts'] > 0) echo number_format($this->vars["points_rachetes_bruts"], 2, ',', ' ');?>" readonly="readonly">
										</div>
                                    </div>
									
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Exercice du dernier Bulletin de Situation :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="dernier_exercice_complet" value="<?php if(isset($this->vars['dernier_exercice_complet']) && $this->vars['dernier_exercice_complet'] > 0) echo $this->vars['dernier_exercice_complet'];?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Points bruts sur le Bulletin de Situation :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="" value="<?php if(isset($this->vars['points_acquis_bruts_der_exerc']) && $this->vars['points_acquis_bruts_der_exerc'] > 0) echo number_format($this->vars['points_acquis_bruts_der_exerc'], 0, ',', ' ');?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Exercice du dernier IFU envoyé :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="ifu_dernier_exercice" value="<?php if(isset($this->vars['ifu_dernier_exercice']) && $this->vars['ifu_dernier_exercice'] > 0) echo $this->vars['ifu_dernier_exercice'];?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Montant cotisations dernier IFU :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="ifu_montant_cotisations" value="<?php if(isset($this->vars['ifu_montant_cotisations']) && $this->vars['ifu_montant_cotisations'] > 0) echo number_format($this->vars['ifu_montant_cotisations'], 0, ',', ' ') . '&euro;';?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Montant rachats dernier IFU :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="ifu_montant_rachats" value="<?php if(isset($this->vars['ifu_montant_rachats']) && $this->vars['ifu_montant_rachats'] > 0) echo number_format($this->vars['ifu_montant_rachats'], 0, ',', ' ') . '&euro;';?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Montant de la capacité de versement :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="montant_capacite_versement" value="<?php if(isset($this->vars['montant_capacite_versement']) && $this->vars['montant_capacite_versement'] > 0) echo number_format($this->vars['montant_capacite_versement'], 2, ',', ' ') . ' &euro;';?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Capacité de versement en nombre d'années de rachat :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="nb_annees_capacite_versement" value="<?php if(isset($this->vars['nb_annees_capacite_versement']) && $this->vars['nb_annees_capacite_versement'] > 0 ) echo $this->vars['nb_annees_capacite_versement'];?>" readonly="readonly">
										</div>
                                    </div>
									
									
                                </div>
                            </div>
                        </div>
                    </div>
					
					
					
					
					<?php if(isset($this->vars['num_contrat']) && isset($this->vars['section_retraite_cotisant_id']) && strlen($this->vars['num_contrat']) > 0 && $this->vars['section_retraite_cotisant_id'] == 1) {?>
                    <div class="portlet" id="collectivite">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-calculator"></i> <small>Collectivité</small>
                            </div>
                            <div class="tools">
                                <a href="" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-horizontal" role="form">
                                <div class="form-body">
                                  
									<div class="form-group">
                                        <label class="col-md-6 control-label">Nom collectivité : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="nom_collectivite" value="<?php echo $this->vars['nom_collectivite'];?>" readonly="readonly">
										</div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-6 control-label">Adresse postale collectivité : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="code_postal_collectivite" value="<?php echo $this->vars['code_postal_collectivite'];?>" readonly="readonly">
										</div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-6 control-label">Adresse : </label>
										<div class="col-md-6">
											<textarea  name="Commentaire" class="form-control" rows="4" style="text-align:left" readonly><?php 
												echo (isset($this->vars['collectivite_adresse_1']) && strlen($this->vars['collectivite_adresse_1']) > 0 ? $this->vars['collectivite_adresse_1'] . "\n" : '');
												echo (isset($this->vars['collectivite_adresse_2']) && strlen($this->vars['collectivite_adresse_2']) > 0 ? $this->vars['collectivite_adresse_2'] . "\n" : '');
												echo (isset($this->vars['collectivite_adresse_3']) && strlen($this->vars['collectivite_adresse_3']) > 0 ? $this->vars['collectivite_adresse_3'] . "\n" : '');
												echo (isset($this->vars['collectivite_adresse_4']) && strlen($this->vars['collectivite_adresse_4']) > 0 ? $this->vars['collectivite_adresse_4'] . "\n" : '');
												echo  $this->vars['code_postal_collectivite'] . ' ' . $this->vars['collectivite_ville'];
											?></textarea>
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Type collectivité : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="type_collectivite_id" value="<?php echo (isset($_SESSION['TYPE_COLLECTIVITE'][$this->vars['type_collectivite_id']]) ? $_SESSION['TYPE_COLLECTIVITE'][$this->vars['type_collectivite_id']] : '' );?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Catégorie collectivité : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="categorie_collectivite_id" value="<?php echo (isset($_SESSION['CATEGORIE_COLLECTIVITE'][$this->vars['categorie_collectivite_id']]) ? $_SESSION['CATEGORIE_COLLECTIVITE'][$this->vars['categorie_collectivite_id']] : '' );?>" readonly="readonly">
										</div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-6 control-label">Code NACE collectivité: </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="code_nace" value="<?php echo $this->vars['code_nace']; ?>" readonly="readonly">
										</div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-6 control-label">Pseudo SIRET collectivité : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="pseudo_siret" value="<?php echo $this->vars['pseudo_siret'];?>" readonly="readonly">
										</div>
                                    </div>
									
                                </div>
                            </div>
                        </div>
                    </div>
					<?php } ?>	
					

					
					
					

					
								
					
		
					
            <!-- END PAGE CONTENT-->

				</div>
				
				
                <div class="col-md-6 ">	

				<div class="portlet" id="info_cotisation">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-group"></i> Informations de cotisation
                            </div>
                            <div class="tools">
                                <a href="" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-horizontal" role="form">
                                <div class="form-body">
                                  
								  
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Classe de cotisation: </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="classe" value="<?php if(isset($this->vars['classe'])) echo $this->vars['classe'];?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Montant de cotisation : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="montant_calcule" value="<?php if(isset($this->vars['classe']) && $this->vars['classe'] > 0) echo number_format((lof::$listeValeurs['CLASSE_COTISATION_MONTANT'][$this->vars['classe']]), 0, ',', ' ') . ' &euro;';?>" readonly="readonly">
										</div>
                                    </div>
								  
								  
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Mode de règlement :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="mode_reglement_retraite_cotisant_id" value="<?php if(isset($_SESSION['MODE_REGLEMENT_RETRAITE_COTISANT'][$this->vars['mode_reglement_retraite_cotisant_id']])) echo $_SESSION['MODE_REGLEMENT_RETRAITE_COTISANT'][$this->vars['mode_reglement_retraite_cotisant_id']];?>" readonly="readonly">
										</div>
                                    </div>
									
								  
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Périodicité de règlement : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="periodicite_reglement_retraite_cotisant_id" value="<?php if(isset($_SESSION['PERIODICITE_REGLEMENT_RETRAITE_COTISANT'][$this->vars['periodicite_reglement_retraite_cotisant_id']])) echo $_SESSION['PERIODICITE_REGLEMENT_RETRAITE_COTISANT'][$this->vars['periodicite_reglement_retraite_cotisant_id']];?>" readonly="readonly">
										</div>
                                    </div>
									
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Code prélèvement automatique :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="type_pa_retraite_cotisant_id" value="<?php if(isset($_SESSION['TYPE_PA_CONTRAT_RETRAITE_COTISANT'][$this->vars['type_pa_retraite_cotisant_id']])) echo $_SESSION['TYPE_PA_CONTRAT_RETRAITE_COTISANT'][$this->vars['type_pa_retraite_cotisant_id']];?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">RIB prélèvement :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="rib_prelevement_o_n" value="<?php echo (isset($this->vars['rib_prelevement_o_n']) && $this->vars['rib_prelevement_o_n'] ? 'Oui' : 'Non' );?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">IBAN:</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="iban_prelevement" value="<?php if(isset($this->vars['iban_prelevement'])) echo $this->vars['iban_prelevement'];?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">BIC :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="bic_prelevement" value="<?php if(isset($this->vars['bic_prelevement'])) echo $this->vars['bic_prelevement'];?>" readonly="readonly">
										</div>
                                    </div>
									
									
                                </div>
                            </div>
                        </div>
                    </div> 
					
					
					
				<?php if(isset($this->vars['num_contrat_allocataire']) && strlen($this->vars['num_contrat_allocataire']) > 0){?>
                    <div class="portlet" id="info_versement_rente">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-group"></i> Informations versement de la rente
                            </div>
                            <div class="tools">
                                <a href="" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-horizontal" role="form">
                                <div class="form-body">
                                  
								  
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Montant rente annuelle brute  : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="montant_rente_allocataire" value="<?php if(isset($this->vars['montant_rente_allocataire']) && $this->vars['montant_rente_allocataire'] > 0)  echo number_format($this->vars['montant_rente_allocataire'], 2, ',', ' ') . ' &euro;';?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Droit à majoration légale : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="majoration_retraite_allocataire_id" value="<?php if(isset($_SESSION['MAJORATION_CONTRAT_RETRAITE_ALLOCATAIRE'][$this->vars['majoration_retraite_allocataire_id']])) echo $_SESSION['MAJORATION_CONTRAT_RETRAITE_ALLOCATAIRE'][$this->vars['majoration_retraite_allocataire_id']];?>" readonly="readonly">
										</div>
                                    </div>
								  
								  
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Réversion après liquidation :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="reversion_retraite_allocataire_id" value="<?php if(isset($_SESSION['REVERSION_CONTRAT_RETRAITE_ALLOCATAIRE'][$this->vars['reversion_retraite_allocataire_id']])) echo $_SESSION['REVERSION_CONTRAT_RETRAITE_ALLOCATAIRE'][$this->vars['reversion_retraite_allocataire_id']];?>" readonly="readonly">
										</div>
                                    </div>
									
								  
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Option dépendance  : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="dependance_retraite_allocataire_id" value="<?php if(isset($_SESSION['DEPENDANCE_CONTRAT_RETRAITE_ALLOCATAIRE'][$this->vars['dependance_retraite_allocataire_id']])) echo $_SESSION['DEPENDANCE_CONTRAT_RETRAITE_ALLOCATAIRE'][$this->vars['dependance_retraite_allocataire_id']];?>" readonly="readonly">
										</div>
                                    </div>
									
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Code Banque :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="rib_code_banque" value="<?php if(isset($this->vars['rib_code_banque'])) echo $this->vars['rib_code_banque'];?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Code Guichet :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="rib_code_guichet" value="<?php if(isset($this->vars['rib_code_guichet'])) echo $this->vars['rib_code_guichet'];?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">N° compte bancaire :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="rib_num_compte" value="<?php if(isset($this->vars['rib_num_compte'])) echo $this->vars['rib_num_compte'];?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Clé compte bancaire :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="rib_clef_compte" value="<?php if(isset($this->vars['rib_clef_compte'])) echo $this->vars['rib_clef_compte'];?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Domiciliation compte bancaire :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="rib_domiciliation" value="<?php if(isset($this->vars['rib_domiciliation'])) echo $this->vars['rib_domiciliation'];?>" readonly="readonly">
										</div>
                                    </div>
									
                                </div>
                            </div>
                        </div>
                    </div>
				<?php }?>
					
			
                    <div class="portlet" id="info_reversion">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-group"></i> Informations réversion
                            </div>
                            <div class="tools">
                                <a href="" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-horizontal" role="form">
                                <div class="form-body">
                                  
								  
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Réversion : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="reversion" value="<?php echo (isset($this->vars['reversion']) && $this->vars['reversion'] ? 'Oui' : 'Non');?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Date début réversion : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="date_debut_reversion" value="<?php if(isset($this->vars['date_debut_reversion'])) echo lof::convertDateFromAdobeFormat($this->vars['date_debut_reversion']);?>" readonly="readonly">
										</div>
                                    </div>
								  
								  
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Date fin réversion :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="date_fin_reversion" value="<?php if(isset($this->vars['date_fin_reversion'])) echo lof::convertDateFromAdobeFormat($this->vars['date_fin_reversion']);?>" readonly="readonly">
										</div>
                                    </div>
									
								  
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">N° contrat réversataire : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="reversataire_num_contrat" value="<?php if(isset($this->vars['reversataire_num_contrat'])) echo $this->vars['reversataire_num_contrat'];?>" readonly="readonly">
										</div>
                                    </div>
									
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">N° adhérent réversataire :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="reversataire_num_adherent" value="<?php if(isset($this->vars['reversataire_num_adherent'])) echo $this->vars['reversataire_num_adherent'];?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Nom réversataire :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="reversataire_nom" value="<?php if(isset($this->vars['reversataire_nom'])) echo $this->vars['reversataire_nom'];?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Prénom réversataire:</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="reversataire_prenom" value="<?php if(isset($this->vars['reversataire_prenom'])) echo $this->vars['reversataire_prenom'];?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Date naissance réversataire :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="reversataire_date_naissance" value="<?php if(isset($this->vars['reversataire_date_naissance'])) echo lof::convertDateFromAdobeFormat($this->vars['reversataire_date_naissance']);?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Lieu naissance réversataire :</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="reversataire_lieu_naissance" value="<?php if(isset($this->vars['reversataire_lieu_naissance'])) echo $this->vars['reversataire_lieu_naissance'];?>" readonly="readonly">
										</div>
                                    </div>

									
									
                                </div>
                            </div>
                        </div>
                    </div>	
					
					
				<?php if((isset($this->vars['lastModifiedAdr']) && strlen($this->vars['lastModifiedAdr']) > 0) || strlen($this->vars['date_maj_emailtelcnp']) > 0) {?>
                    <div class="portlet" id="adresse_contrat">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-calculator"></i> <small>Coordonnées contrat</small>
                            </div>
                            <div class="tools">
                                <a href="" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-horizontal" role="form">
                                <div class="form-body">
                                  
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Adresse : </label>
										<div class="col-md-6">
											<textarea  name="Commentaire" class="form-control" rows="4" style="text-align:left" readonly><?php 
												echo (isset($this->vars['adresse_1']) && strlen($this->vars['adresse_1']) > 0 ? $this->vars['adresse_1'] . "\n" : '');
												echo (isset($this->vars['adresse_2']) && strlen($this->vars['adresse_2']) > 0 ? $this->vars['adresse_2'] . "\n" : '');
												echo (isset($this->vars['adresse_3']) && strlen($this->vars['adresse_3']) > 0 ? $this->vars['adresse_3'] . "\n" : '');
												echo (isset($this->vars['adresse_4']) && strlen($this->vars['adresse_4']) > 0 ? $this->vars['adresse_4'] . "\n" : '');
											?></textarea>
										</div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-6 control-label">Code postal : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="" value="<?php echo $this->vars['code_postal'];?>" readonly="readonly">
										</div>
                                    </div>
									
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Ville : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="" value="<?php echo $this->vars['ville'];?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Pays : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="" value="<?php echo $this->vars['pays'];?>" readonly="readonly">
										</div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-6 control-label">Adresse contrat PND : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="adresse" value="<?php echo ($this->vars['adresse_npai_o_n'] ? 'Oui' : 'Non'); ?>" readonly="readonly">
										</div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-6 control-label">Date modification adresse contrat : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="" value="<?php echo lof::convertDateFromAdobeFormat($this->vars['lastModifiedAdr']);?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Email : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="semail" value="<?php echo $this->vars['semail'];?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Téléphone fixe : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="sphone" value="<?php echo $this->vars['sphone'];?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Téléphone mobile : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="smobilephone" value="<?php echo $this->vars['smobilephone'];?>" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Date mise à jour email ou n° tels : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="date_maj_emailtelcnp" value="<?php echo lof::convertDateFromAdobeFormat($this->vars['date_maj_emailtelcnp']);?>" readonly="readonly">
										</div>
                                    </div>
									
                                </div>
                            </div>
                        </div>
                    </div>
					<?php } ?>
					
					<?php if(isset($this->vars['code_reseau_apporteur']) && strlen($this->vars['code_reseau_apporteur']) > 0 && $this->vars['code_reseau_apporteur'] != '0') {?>
                    <div class="portlet" id="reseau_apporteur">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-calculator"></i> <small>Réseau apporteur</small>
                            </div>
                            <div class="tools">
                                <a href="" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-horizontal" role="form">
                                <div class="form-body">
                                  
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Réseau apporteur : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="" value="SOLESIO" readonly="readonly">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Point de vente : </label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="libelle_reseau_apporteur" value="<?php echo $this->vars['libelle_reseau_apporteur'];?>" readonly="readonly">
										</div>
                                    </div>
									
									
                                </div>
                            </div>
                        </div>
                    </div>
					<?php } ?>
										
							
					

				</div>
				
			</div>
			
			
			
			
			
			
			
			
			
			
			

				
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
								<th>Points bruts acquis</th>
								<th>Points nets acquis</th>
								<!--<th>Cumul des versements</th>
								<th>Montant vers attendus </th>-->
							</tr>
							
						</thead>
						<tbody id="versements">
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
			


			<div id="releve_versements" class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-search"></i>Relevé des versements
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
					
					<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="table_versements">
						<thead>
							<tr align="center">
								<th>Exercice fiscal</th>
								<th>Date de valeur </th>
								<th>Type de versement</th>
								<th>Montant </th>
								<th>Points bruts</th>
								<th>Classe de cotisation</th>
								<th>Date création</th>
								<th>Date modification</th>
							</tr>
							
						</thead>
						<tbody>
							<?php
								$cumulPointsBruts = 0;
								$cumulPointsNet = 0;
                                $vers = new stdClass();
                                foreach($this->request->data->dom4->getElementsByTagName('versement') as $vers){	
									echo ('
									<tr>
                                        <td>'. $vers->getAttribute("Exercice_Fiscal") .'</td>
                                        <td>'. lof::convertDateFromAdobeFormat($vers->getAttribute("Date_Valeur_Versement")).'</td>
                                        <td>'. $_SESSION['TYPE_VERSEMENT'][$vers->getAttribute("TYPE_VERSEMENT_Id")]  .'</td>
                                        <td>'. number_format($vers->getAttribute("Montant_Versement"), 2, ',', ' ') .' &euro;</td>
                                        <td>'. number_format($vers->getAttribute("Points_Acquis_Bruts"), 2, ',', ' ') .'</td>
                                        <td>'. $vers->getAttribute("Classe") .'</td>
                                        <td>'. lof::convertDateFromAdobeFormat($vers->getAttribute("Date_Creation_Versement")) .'</td>
                                        <td>'. lof::convertDateFromAdobeFormat($vers->getAttribute("Date_Modification_Versement")) .'</td>                             
                                ');
									echo '</tr>';
                                }
                            ?>	
						</tbody>
						
					</table>

					</div>
					
					<div class="row"></div>
					
							

							
                        </div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
			
			

			
			
		</div>
    </div>


	
    <!-- END PAGE CONTENT-->
