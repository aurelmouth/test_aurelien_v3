
		   <?php if($this->vars['statut_particulier'] == 3){?>
		   <div class="row ">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet col-md-12">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-arrows-alt"></i> Optimisation contrat retraite
							</div>
							<div class="tools">
								<a href="" class="collapse"></a>
							</div>
						</div>
						<div class="portlet-body col-md-12">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover formulaire">
						<thead>
							<tr>
								<th>Formulaire</th>
								<th></th>
							</tr>
							
						</thead>
						<tbody>
							<tr>
								<td>Bulletin de versement</td>
								<td>
									<a class="btn btn-info" href="<?php echo Router::url('recipient/pdf_perso/'.$this->request->params[0].'/pre_camp_recur_bulletin_versement');?>">Télécharger le PDF</a>
									&nbsp;
									<a class="btn btn-success" onclick="envoyer_mail('<?php echo Router::url('recipient/send_email/'.$this->request->params[0].'/pre_camp_recur_bulletin_versement');?>')">Envoyer par email</a>
								</td>

							</tr>
							<tr>
								<td>Versement exceptionnel (rachat d’années)</td>
								<td>
									<a class="btn btn-info" href="<?php echo Router::url('recipient/pdf_perso/'.$this->request->params[0].'/pre_camp_recur_versement_exceptionnel');?>">Télécharger le PDF</a>
									&nbsp;
									<a class="btn btn-success" onclick="envoyer_mail('<?php echo Router::url('recipient/send_email/'.$this->request->params[0].'/pre_camp_recur_versement_exceptionnel');?>')">Envoyer par email</a>
								</td>

							</tr>
							
							<tr>
								<td>Changement de classe par précompte</td>
								<td>
									<a class="btn btn-info" href="<?php echo Router::url('recipient/pdf_perso/'.$this->request->params[0].'/pre_camp_recur_changement_classe_precompte');?>">Télécharger le PDF</a>
									&nbsp;
									<a class="btn btn-success" onclick="envoyer_mail('<?php echo Router::url('recipient/send_email/'.$this->request->params[0].'/pre_camp_recur_changement_classe_precompte');?>')">Envoyer par email</a>
								</td>

							</tr>
							
							<tr>
								<td>Changement de classe par prélèvement automatique</td>
								<td>
									<a class="btn btn-info" href="<?php echo Router::url('recipient/pdf_perso/'.$this->request->params[0].'/pre_camp_recur_changement_classe_prelevement_automatique');?>">Télécharger le PDF</a>
									&nbsp;
									<a class="btn btn-success" onclick="envoyer_mail('<?php echo Router::url('recipient/send_email/'.$this->request->params[0].'/pre_camp_recur_changement_classe_prelevement_automatique');?>')">Envoyer par email</a>
								</td>

							</tr>
						</tbody>
					</table>
				</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>
			
			

            <!-- END PAGE CONTENT-->

        </div>
		
		

		   
		   <div class="row ">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet col-md-12">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-arrows-alt"></i> Démarches administratives
							</div>
							<div class="tools">
								<a href="" class="collapse"></a>
							</div>
						</div>
						<div class="portlet-body col-md-12">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover formulaire">
						<thead>
							<tr>
								<th>Formulaire</th>
								<th></th>
							</tr>
							
						</thead>
						<tbody>
							<tr>
								<td>Changement d’adresse</td>
								<td>
									<a class="btn btn-info" href="<?php echo Router::url('recipient/pdf_perso/'.$this->request->params[0].'/pre_camp_recur_chgt_adresse');?>">Télécharger le PDF</a>
									&nbsp;
									<a class="btn btn-success" onclick="envoyer_mail('<?php echo Router::url('recipient/send_email/'.$this->request->params[0].'/pre_camp_recur_changement_adresse');?>')">Envoyer par email</a>
								</td>

							</tr>
							<tr>
								<td>Changement de situation familiale ou professionnelle</td>
								<td>
									<a class="btn btn-info" href="<?php echo Router::url('recipient/pdf_perso/'.$this->request->params[0].'/pre_camp_recur_chgt_situation_fam_pro');?>">Télécharger le PDF</a>
									&nbsp;
									<a class="btn btn-success" onclick="envoyer_mail('<?php echo Router::url('recipient/send_email/'.$this->request->params[0].'/pre_camp_recur_changement_situation_familiale_ou_professionnelle');?>')">Envoyer par email</a>
								</td>

							</tr>
							
							<tr>
								<td>Changement de l’option réversion (articles 20 et 21)</td>
								<td>
									<a class="btn btn-info" href="<?php echo Router::url('recipient/pdf_perso/'.$this->request->params[0].'/pre_camp_recur_chgt_option_reversion');?>">Télécharger le PDF</a>
									&nbsp;
									<a class="btn btn-success" onclick="envoyer_mail('<?php echo Router::url('recipient/send_email/'.$this->request->params[0].'/pre_camp_recur_changement_l_option_reversion__articles_20_et_21_');?>')">Envoyer par email</a>
								</td>

							</tr>
							
							<tr>
								<td>Changement de RIB</td>
								<td>
									<a class="btn btn-info" href="<?php echo Router::url('recipient/pdf_perso/'.$this->request->params[0].'/pre_camp_recur_chgt_rib');?>">Télécharger le PDF</a>
									&nbsp;
									<a class="btn btn-success" onclick="envoyer_mail('<?php echo Router::url('recipient/send_email/'.$this->request->params[0].'/pre_camp_recur_changement_rib');?>')">Envoyer par email</a>
								</td>

							</tr>
							
							<tr>
								<td>Demande de prélèvement automatique</td>
								<td>
									<a class="btn btn-info" href="<?php echo Router::url('recipient/pdf_perso/'.$this->request->params[0].'/pre_camp_recur_demande_prelev_auto');?>">Télécharger le PDF</a>
									&nbsp;
									<a class="btn btn-success" onclick="envoyer_mail('<?php echo Router::url('recipient/send_email/'.$this->request->params[0].'/pre_camp_recur_demande_prelevement_automatique');?>')">Envoyer par email</a>
								</td>

							</tr>
							<tr>
								<td>Demande de précompte</td>
								<td>
									<a class="btn btn-info" href="<?php echo Router::url('recipient/pdf_perso/'.$this->request->params[0].'/pre_camp_recur_demande_precompte');?>">Télécharger le PDF</a>
									&nbsp;
									<a class="btn btn-success" onclick="envoyer_mail('<?php echo Router::url('recipient/send_email/'.$this->request->params[0].'/pre_camp_recur_demande_precompte_service_paie');?>')">Envoyer par email</a>
								</td>

							</tr>
							
							<tr>
								<td>Demande de dossier de liquidation</td>
								<td>
									<a class="btn btn-info" href="<?php echo serveur_url.DS.'webroot'.DS.'assets/pdf/demande_liquidation.pdf';?>" download>Télécharger le PDF</a>
									&nbsp;
									<a class="btn btn-success" onclick="envoyer_mail('<?php echo Router::url('recipient/send_email/'.$this->request->params[0].'/pre_camp_recur_demande_dossier_liquidation');?>')">Envoyer par email</a>
								</td>

							</tr>
							
							<tr>
								<td>Demande d’Imprimé Fiscal Unique (IFU)</td>
								<td>
									<a class="btn btn-info" href="<?php echo Router::url('recipient/pdf_perso/'.$this->request->params[0].'/pre_camp_recur_demande_IFU');?>">Télécharger le PDF</a>
									&nbsp;
									<a class="btn btn-success" onclick="envoyer_mail('<?php echo Router::url('recipient/send_email/'.$this->request->params[0].'/pre_camp_recur_demande_d_imprime_fiscal_unique_ifu');?>')">Envoyer par email</a>
								</td>

							</tr>
							<tr>
								<td>Demande de Relevé de Situation Individuelle (RSI)</td>
								<td>
									<a class="btn btn-info" href="<?php echo Router::url('recipient/pdf_perso/'.$this->request->params[0].'/pre_camp_recur_demande_RSI');?>">Télécharger le PDF</a>
									&nbsp;
									<a class="btn btn-success" onclick="envoyer_mail('<?php echo Router::url('recipient/send_email/'.$this->request->params[0].'/pre_camp_recur_demande_releve_situation_individuelle_rsi');?>')">Envoyer par email</a>
								</td>

							</tr>
							
						</tbody>
					</table>
				</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>
			
			

            <!-- END PAGE CONTENT-->

        </div>
		   <?php } ?>
		

		   
		   <div class="row ">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet col-md-12">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-arrows-alt"></i> Autres documents
							</div>
							<div class="tools">
								<a href="" class="collapse"></a>
							</div>
						</div>
						<div class="portlet-body col-md-12">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover formulaire">
						<thead>
							<tr>
								<th>Formulaire</th>
								<th></th>
							</tr>
							
						</thead>
						<tbody>
							<tr>
								<td>Tableau des cotisations</td>
								<td>
									<a class="btn btn-info" href="<?php echo serveur_url.DS.'webroot'.DS.'assets/pdf/tableau_cotisations.pdf';?>" download>Télécharger le PDF</a>
								</td>

							</tr>
							<tr>
								<td>Tableau des points</td>
								<td>
									<a class="btn btn-info" href="<?php echo serveur_url.DS.'webroot'.DS.'assets/pdf/tableau_points.pdf';?>" download>Télécharger le PDF</a>
								</td>

							</tr>
			
						</tbody>
					</table>
				</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>
			
			

            <!-- END PAGE CONTENT-->

        </div>

							<div id="envoyer_mail" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Demande de confirmation</h4>
										</div>
										<div class="modal-body">
											<p>
												Voulez-vous vraiment envoyer cet email à <?php echo $this->vars['firstName'] . ' ' . $this->vars['lastName'] . ' : ' . $this->vars['semail'];?> ?
											</p>
										</div>
										<div class="modal-footer">
											<button type="button" data-dismiss="modal" class="btn btn-default">Annuler</button>
											<a id="envoie_mail_ok" type="button"  href="" class="btn btn-success">Oui</a>
										</div>
									</div>
								</div>
							</div>

    </div>
    <!-- END PAGE CONTENT-->
