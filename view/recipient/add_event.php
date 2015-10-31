	   
		   <div class="row ">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet col-md-12">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-arrows-alt"></i> Nouvel événement
							</div>
							<div class="tools">
								<a href="" class="collapse"></a>
							</div>
						</div>
						<div class="portlet-body col-md-12">
							<form class="login-form" method="POST" action="<?php if(isset($_SESSION[$this->request->params[0].'_pre_aff_post']))
																						echo Router::url('recipient/add_event_pre_aff/'.$this->request->params[0]);
																					else
																						echo Router::url('recipient/add_event/'.$this->request->params[0]);
																					?>">
							<div class="row">
								<div class="form-group col-md-6">
									<label class="col-md-4 control-label">Date
									</label>
									<div class="col-md-8">
										<label class="control-label"><?php echo Date('d/m/Y');?></label>	
									</div>
								</div>
								
								<div class="form-group col-md-6">
									<label class="col-md-4 control-label">Lieu <span style="font-size : 12px; color : red"> * </span></label>

									<div class="col-md-8">
										<select name="LIEU_Id" class="form-control" <?php echo ($_SESSION['conseillerEnLigne']['partenaires'] > 0) ? ('disabled="disabled"') : ('');?>>
												<?php foreach($_SESSION['LIEU_EVENEMENT'] as $cle => $valeur) {?>
													<option value="<?php echo ($cle == 0) ? '' : $cle;?>" <?php if(isset($this->vars['LIEU_Id']) && $this->vars['LIEU_Id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
												<?php } ?>
												
												<?php if(isset($_SESSION['LIEU_EVENEMENT_ALL'][$this->vars['LIEU_Id']]) && !(isset($_SESSION['LIEU_EVENEMENT'][$this->vars['LIEU_Id']]))){?>
													<option value="<?php echo $this->vars['LIEU_Id'];?>" selected="selected"><?php echo $_SESSION['LIEU_EVENEMENT_ALL'][$this->vars['LIEU_Id']];?></option>
												<?php } ?>
										</select>	
									</div>
									
									<?php if($_SESSION['conseillerEnLigne']['partenaires'] > 0) {?>
										 <input type="hidden" name="LIEU_Id" value="<?php echo $this->vars['LIEU_Id'];?>" />
									<?php } ?>
									
									
								</div>		
                            </div>
							
							
							<div class="row">
								<div class="form-group col-md-6">
									<label class="col-md-4 control-label">Conseiller</label>
									<div class="col-md-8">
										<label class="control-label"><?php echo $_SESSION['conseillerEnLigne']['label'];?></label>
									</div>
									
								</div>
							
								<div class="form-group col-md-6">
									<label class="col-md-4 control-label">Mode <span style="font-size : 12px; color : red"> * </span></label>

									<div class="col-md-8">
										<select name="MODE_EVENEMENT_Id" class="form-control">
                                                <?php foreach($_SESSION['MODE_EVENEMENT'] as $cle => $valeur) {?>
												<option value="<?php echo ($cle == 0) ? '' : $cle;?>" <?php if(isset($this->vars['MODE_EVENEMENT_Id']) && $this->vars['MODE_EVENEMENT_Id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
												<?php } ?>
										</select>	
									</div>
									
								</div>
                            </div>
							
							<div class="row">
								<div class="form-group col-md-6">
									<label class="col-md-4 control-label">Motif <span style="font-size : 12px; color : red"> * </span></label>

									<div class="col-md-8">
										<?php if(isset($_SESSION[$this->request->params[0].'_pre_aff_post'])){?>
										<input type="hidden" name="MOTIF_EVENEMENT_Id" value="3"/>
										<?php } ?>
										<select name="MOTIF_EVENEMENT_Id" class="form-control">
										<option value=""></option>
										<?php if($this->vars['statut_particulier'] == 2){
												foreach($_SESSION['MOTIF_EVENEMENT_PROSPECT'] as $cle => $valeur) {?>
													<option value="<?php echo $cle;?>" <?php if(isset($this->vars['MOTIF_EVENEMENT_Id']) && $this->vars['MOTIF_EVENEMENT_Id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
												<?php } 
										}?>
										
										<?php if($this->vars['statut_particulier'] == 3){
												foreach($_SESSION['MOTIF_EVENEMENT_AFFILIE'] as $cle => $valeur) {?>
													<option value="<?php echo $cle;?>" <?php if(isset($this->vars['MOTIF_EVENEMENT_Id']) && $this->vars['MOTIF_EVENEMENT_Id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
												<?php } 
										}?>
										</select>	
									</div>
								</div>
									
								<div class="form-group col-md-6">
                                        <label class="col-md-8 control-label">Envoyer Kit Affiliation</label>
                                            <div class="col-md-4">
                                                <div class="checkbox-list">
														<input type="hidden" name="EnvoyerKitAffiliation" value="0" />
                                                        <input type="checkbox" name="EnvoyerKitAffiliation" value="1" <?php echo ($_SESSION['conseillerEnLigne']['partenaires'] > 0) ? ('disabled="disabled"') : ('');?>>
                                                </div>
                                            </div>
                                </div>
								
								

                            </div>
							
							<div class="row">
								<div class="form-group col-md-6">

										<label>Commentaire : </label>
										<textarea  name="Commentaire" class="form-control" rows="4"></textarea>

									
								</div>
								
								<div id="bloc_envoie_courrier" class="form-group col-md-6" style="display:none">
                                        <label class="col-md-8 control-label">Envoyer Kit Affiliation par courrier</label>
                                            <div class="col-md-4">
                                                <div class="checkbox-list">
														<input type="hidden" name="envoi_courrier" value="0" />
                                                        <input type="checkbox" name="envoi_courrier" value="1">
                                                </div>
                                            </div>
                                </div>
								
                            </div>
							
							
							
							<div class="row">
								<div class="form-group col-md-6">
									<label class="col-md-4 control-label">Résultat</label>

									<div class="col-md-8">
										<?php if(isset($_SESSION[$this->request->params[0].'_pre_aff_post'])){?>
										<input type="hidden" name="RESULTAT_EVENEMENT_Id" value="7" />
										<?php } ?>
										<select name="RESULTAT_EVENEMENT_Id" class="form-control">
											<option value=""></option>
                                                <?php foreach($_SESSION['RESULTAT_EVENEMENT'] as $cle => $valeur) {?>
												<option value="<?php echo ($cle == 0) ? '' : $cle;?>" <?php if(isset($this->vars['RESULTAT_EVENEMENT_Id']) && $this->vars['RESULTAT_EVENEMENT_Id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
												<?php } ?>
										</select>	
									</div>
								</div>
									
                                <div class="form-group col-md-6">
                                        <label class="col-md-4 control-label">Rappel</label>
                                       
										
									<div class="col-md-8">
											<div class="input-group date date-picker">
												<input name="Date_Rappel" type="texte" class="form-control">
												<span class="input-group-btn">
												<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
											<!-- /input-group -->
									</div>
										
                                </div>
                            </div>
							

							
							<input type="hidden" name="theme_entretien_1" value="0"/>
							<input type="hidden" name="theme_entretien_2" value="0"/>
							<input type="hidden" name="theme_entretien_3" value="0"/>
							<input type="hidden" name="envoyer_mail" value="0"/>
							
							<input type="hidden" name="mail_saisi" value=""/>
							
							
							
							<div class="row">
								<div class="col-md-12" style="text-align:right" >
									<?php 
									$retour = '';
									if(isset($_SESSION[$this->request->params[0].'_pre_aff_post'])){
										$retour = Router::url('recipient/pre_aff/'. $this->request->params[0]);
									} else{
										$retour = Router::url('recipient/events/'. $this->request->params[0]);
									}
									?>
									<a href="<?php echo $retour; ?>" class="btn btn-default" style="margin-bottom : 10px">Retour</a>
									<?php if($_SESSION['conseillerEnLigne']['partenaires'] > 0){?>
										<button type="submit" class="btn btn-success" style="margin-bottom : 10px">Enregistrer</button>
									<?php } else {?>
										<a id="enregistrer" class="btn btn-success" style="margin-bottom : 10px">Enregistrer</a>
									<?php } ?>
								</div>
							</div>
							
						</form>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>
			
		<div id="themes_entretien" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title"> Souhaitez-vous envoyer un compte-rendu d'entretien par email ?</h4>
					</div>
					<div class="modal-body">
						<!--<div class="alert alert-danger display-hide"  style="text-align:center">
						<button class="close" data-close="alert"></button>
						<span>
						Email manquant ou trop petit. </span>
						</div>-->
						<p>
							Si oui, sélectionnez les thèmes abordés lors de votre entretien téléphonique qui seront repris dans l'email envoyé :
						</p>
						
						<div class="alert alert-danger display-hide"  style="text-align:center">
						<button class="close" data-close="alert"></button>
						<span>
						Vous devez choisir au moins un des trois thèmes. </span>
						</div>
						
						<div class="row">
                                  <div class="form-group col-md-12">
                                        <label class="col-md-4">Thème d'entretien 1 : </label>
                                        <div class="col-md-8">
											<select  name="theme_entretien_1" class="form-control"> 
												<option value="">Sélectionner</option>
													<?php foreach($_SESSION['THEME_ENTRETIEN'] as $cle => $valeur) {?>
													<option value="<?php echo $cle;?>"><?php echo $valeur?></option>
													<?php } ?>
											</select>
										</div>
									</div>
									
                                  <div class="form-group col-md-12">
                                        <label class="col-md-4">Thème d'entretien 2 : </label>
                                        <div class="col-md-8">
											<select name="theme_entretien_2" class="form-control"> 
											</select>
										</div>
									</div>
									
                                  <div class="form-group col-md-12">
                                        <label class="col-md-4">Thème d'entretien 3 : </label>
                                        <div class="col-md-8">
											<select name="theme_entretien_3" class="form-control"> 
											</select>
										</div>
									</div>
									
						</div>
					</div>
					<div class="modal-footer">
						<button align="right" type="button" data-dismiss="modal" class="btn btn-default">Annuler</button>
						<a id="no_envoi_mail_entretien" type="button" class="btn btn-info">Ne pas envoyer</a>
						<a id="envoi_mail_entretien" type="button" class="btn btn-success">Envoyer</a>
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
								<form id="validate_mail" method="post" action="javascript:void(0);">
									<input type="text" class="form-control" name="email" placeholder="Saisissez un email valide s'il-vous-plait">
								</form>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="btn btn-default">Annuler</button>
						<button type="button" class="btn btn-success" id="continue_mail">Valider et envoyer</button>
					</div>
				</div>
			</div>
		</div>
			
			

            <!-- END PAGE CONTENT-->

        </div>




    </div>
    <!-- END PAGE CONTENT-->
