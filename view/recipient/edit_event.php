<div class="row ">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet col-md-12">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-calendar"></i> <?php echo $_SESSION['MODE_EVENEMENT_ALL'][$this->vars['MODE_EVENEMENT_Id']] . ' - ' . $_SESSION['MOTIF_EVENEMENT_ALL'][$this->vars['MOTIF_EVENEMENT_Id']] . ' - ' .  lof::convertDateFromAdobeFormat($this->vars['Date_Evenement']);?>
							</div>
							<div class="tools">
								<a href="" class="collapse"></a>
							</div>
						</div>
						<div class="portlet-body col-md-12">
							<form method="POST" class="login-form" action="<?php echo Router::url('recipient/edit_event/'.$this->request->params[0].'/'.$this->request->params[1]); ?>">
							<div class="row">
								<div class="form-group col-md-6">
									<label class="col-md-4 control-label">Date
									</label>
									<div class="col-md-8">
										<label class="control-label"><?php if(isset($this->vars['Date_Evenement'])) echo lof::convertDateFromAdobeFormat($this->vars['Date_Evenement']);?></label>	
									</div>
								</div>
								
								<div class="form-group col-md-6">
									<label class="col-md-4 control-label">Lieu <span style="font-size : 12px; color : red"> * </span></label>

									<div class="col-md-8">
										<select name="LIEU_Id" class="form-control">
                                                <?php foreach($_SESSION['LIEU_EVENEMENT'] as $cle => $valeur) {?>
												<option value="<?php echo ($cle == 0) ? '' : $cle;?>" <?php if(isset($this->vars['LIEU_Id']) && $this->vars['LIEU_Id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
												<?php } ?>
												<?php if(isset($_SESSION['LIEU_EVENEMENT_ALL'][$this->vars['LIEU_Id']]) && !isset($_SESSION['LIEU_EVENEMENT'][$this->vars['LIEU_Id']])) {?>
													<option value="<?php echo $this->vars['LIEU_Id'];?>" selected="selected"><?php echo $_SESSION['LIEU_EVENEMENT_ALL'][$this->vars['LIEU_Id']];?></option>
												<?php } ?>
										</select>	
									</div>
									
								</div>
                            </div>
							
							<div class="row">
								<div class="form-group col-md-6">
									<label class="col-md-4 control-label">Conseiller</label>
									<div class="col-md-8">
										<label class="control-label"><?php if(isset($this->vars['CONSEILLER'])) echo $this->vars['CONSEILLER'];?></label>
									</div>
									
								</div>
								
								<div class="form-group col-md-6">
									<label class="col-md-4 control-label">Mode <span style="font-size : 12px; color : red"> * </span></label>

									<div class="col-md-8">
										<select name="MODE_EVENEMENT_Id" class="form-control">
                                                <?php foreach($_SESSION['MODE_EVENEMENT'] as $cle => $valeur) {?>
												<option value="<?php echo ($cle == 0) ? '' : $cle;?>" <?php if(isset($this->vars['MODE_EVENEMENT_Id']) && $this->vars['MODE_EVENEMENT_Id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
												<?php } ?>
												<?php if(isset($_SESSION['MODE_EVENEMENT_ALL'][$this->vars['MODE_EVENEMENT_Id']]) && !isset($_SESSION['MODE_EVENEMENT'][$this->vars['MODE_EVENEMENT_Id']])) {?>
													<option value="<?php echo $this->vars['MODE_EVENEMENT_Id'];?>" selected="selected"><?php echo $_SESSION['MODE_EVENEMENT_ALL'][$this->vars['MODE_EVENEMENT_Id']];?></option>
												<?php } ?>
										</select>	
									</div>
									
								</div>
                            </div>
							
							<div class="row">
								<div class="form-group col-md-6">
									<label class="col-md-4 control-label">Motif <span style="font-size : 12px; color : red"> * </span></label>

									<div class="col-md-8">
										<select name="MOTIF_EVENEMENT_Id" class="form-control">
												<option value=""></option>
												<?php if($this->vars['statut_particulier'] == 2){
														foreach($_SESSION['MOTIF_EVENEMENT_PROSPECT'] as $cle => $valeur) {?>
															<option value="<?php echo ($cle == 0) ? '' : $cle;?>" <?php if(isset($this->vars['MOTIF_EVENEMENT_Id']) && $this->vars['MOTIF_EVENEMENT_Id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
														<?php } 
												}?>
												
												<?php if($this->vars['statut_particulier'] == 3){
														foreach($_SESSION['MOTIF_EVENEMENT_AFFILIE'] as $cle => $valeur) {?>
															<option value="<?php echo ($cle == 0) ? '' : $cle;?>" <?php if(isset($this->vars['MOTIF_EVENEMENT_Id']) && $this->vars['MOTIF_EVENEMENT_Id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
														<?php } 
												}?>
												<?php if($this->vars['statut_particulier'] == 2 && isset($_SESSION['MOTIF_EVENEMENT_ALL'][$this->vars['MOTIF_EVENEMENT_Id']]) && !isset($_SESSION['MOTIF_EVENEMENT_PROSPECT'][$this->vars['MOTIF_EVENEMENT_Id']])) {?>
													<option value="<?php echo ($this->vars['MOTIF_EVENEMENT_Id'] == 0) ? '' : $this->vars['MOTIF_EVENEMENT_Id'];?>" selected="selected"><?php echo $_SESSION['MOTIF_EVENEMENT_ALL'][$this->vars['MOTIF_EVENEMENT_Id']];?></option>
												<?php } ?>
												
												<?php if($this->vars['statut_particulier'] == 3 && isset($_SESSION['MOTIF_EVENEMENT_ALL'][$this->vars['MOTIF_EVENEMENT_Id']]) && !isset($_SESSION['MOTIF_EVENEMENT_AFFILIE'][$this->vars['MOTIF_EVENEMENT_Id']])) {?>
													<option value="<?php echo ($this->vars['MOTIF_EVENEMENT_Id'] == 0) ? '' : $this->vars['MOTIF_EVENEMENT_Id'];?>" selected="selected"><?php echo $_SESSION['MOTIF_EVENEMENT_ALL'][$this->vars['MOTIF_EVENEMENT_Id']];?></option>
												<?php } ?>
										</select>		
									</div>
								</div>
								
								<?php if($this->vars['MOTIF_EVENEMENT_Id'] == 93){?>
								</div>
								
								<div class="row">
									
								<?php if(isset($this->vars['Num_Demande']) && $this->vars['Num_Demande'] > 0){?>
									<div class="form-group col-md-6">
                                        <label class="col-md-4">N° demande GPA : </label>
                                        <div class="col-md-8">
											<input type="text" class="form-control" name="Num_Demande" value="<?php echo $this->vars['Num_Demande'];?>" readonly>
										</div>
									</div>
								<?php } ?>
								
								<?php if(isset($this->vars['TRANSCO_ENUM_Type_Demande']) && strlen($this->vars['TRANSCO_ENUM_Type_Demande']) > 0){?>
									<div class="form-group col-md-6">
                                        <label class="col-md-4">Type :</label>
                                        <div class="col-md-8">
											<input type="text" class="form-control" name="TRANSCO_ENUM_Type_Demande" value="<?php echo $this->vars['TRANSCO_ENUM_Type_Demande'];?>" readonly>
										</div>
									</div>
								<?php } ?>
								
								<?php if(isset($this->vars['TRANSCO_ENUM_Processus_Gestion_Demande']) && strlen($this->vars['TRANSCO_ENUM_Processus_Gestion_Demande']) > 0){?>
									<div class="form-group col-md-12">
                                        <label class="col-md-2">Processus :</label>
                                        <div class="col-md-10">
											<input type="text" class="form-control" name="TRANSCO_ENUM_Processus_Gestion_Demande" value="<?php echo $this->vars['TRANSCO_ENUM_Processus_Gestion_Demande'];?>" readonly>
										</div>
									</div>
								<?php } ?>
									
								<?php if(isset($this->vars['TRANSCO_ENUM_Statut_demande']) && strlen($this->vars['TRANSCO_ENUM_Statut_demande']) > 0){?>
									<div class="form-group col-md-6">
                                        <label class="col-md-4">Statut :</label>
                                        <div class="col-md-8">
											<input type="text" class="form-control" name="TRANSCO_ENUM_Statut_Demande" value="<?php echo $this->vars['TRANSCO_ENUM_Statut_demande'];?>" readonly>
										</div>
									</div>
								<?php } ?>	
								
								<?php if(isset($this->vars['Date_Cloture_Demande']) && strlen($this->vars['Date_Cloture_Demande']) > 0){?>
									<div class="form-group col-md-6">
                                        <label class="col-md-4">Date clôture : </label>
                                        <div class="col-md-8">
											<input type="text" class="form-control" name="Date_Cloture_Demande" value="<?php echo lof::convertDateFromAdobeFormat($this->vars['Date_Cloture_Demande']);?>" readonly>
										</div>
									</div>
								<?php } ?>
								
								<?php if(isset($this->vars['TRANSCO_ENUM_Motif_Cloture_Demande']) && strlen($this->vars['TRANSCO_ENUM_Motif_Cloture_Demande']) > 0  && strlen(trim($this->vars['Date_Cloture_Demande'])) > 0){?>
									<div class="form-group col-md-6">
                                        <label class="col-md-4">Motif clôture :</label>
                                        <div class="col-md-8">
											<input type="text" class="form-control" name="TRANSCO_ENUM_Motif_Cloture_Demande" value="<?php echo $this->vars['TRANSCO_ENUM_Motif_Cloture_Demande'];?>" readonly>
										</div>
									</div>
								<?php } ?>	

								
									
									
								</div>
								
								
								
								
								
								
								
								<?php } else {?>
								
								
									
								<div class="form-group col-md-6">
                                        <label class="col-md-8 control-label">Envoyer Kit Affiliation</label>
                                            <div class="col-md-4">
                                                <div class="checkbox-list">
														<input type="hidden" name="EnvoyerKitAffiliation" value="0" />
                                                        <input type="checkbox" name="EnvoyerKitAffiliation" value="1" <?php if(isset($this->vars['EnvoyerKitAffiliation']) && $this->vars['EnvoyerKitAffiliation']) echo "checked";?>>
                                                </div>
                                            </div>
                                </div>
								
								

                            </div>
							
							<div class="row">
								<div class="form-group col-md-6">

										<label>Commentaire : </label>
										<textarea  name="Commentaire" class="form-control" rows="4" style="text-align:left"><?php if(isset($this->vars['Commentaire'])) echo $this->vars['Commentaire'];?></textarea>

									
								</div>
								
								<div id="bloc_envoie_courrier" class="form-group col-md-6" <?php echo (isset($this->vars['EnvoyerKitAffiliation']) && !$this->vars['EnvoyerKitAffiliation']) ? ('style="display:none"') : ('');?>>
                                        <label class="col-md-8 control-label">Envoyer Kit Affiliation par courrier</label>
                                            <div class="col-md-4">
                                                <div class="checkbox-list">
														<input type="hidden" name="envoi_courrier" value="0"/>
                                                        <input type="checkbox" name="envoi_courrier" value="1" <?php if(isset($this->vars['envoi_courrier']) && $this->vars['envoi_courrier']) echo "checked";?>>
                                                </div>
                                            </div>
                                </div>
								
                            </div>
							
							
							<div class="row">
								<div class="form-group col-md-6">
									<label class="col-md-4 control-label">Résultat</label>

									<div class="col-md-8">
										<select name="RESULTAT_EVENEMENT_Id" class="form-control">
                                                <?php foreach($_SESSION['RESULTAT_EVENEMENT'] as $cle => $valeur) {?>
												<option value="<?php echo ($cle == 0) ? '' : $cle;?>" <?php if(isset($this->vars['RESULTAT_EVENEMENT_Id']) && $this->vars['RESULTAT_EVENEMENT_Id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
												<?php } ?>
												<?php if(isset($_SESSION['RESULTAT_EVENEMENT_ALL'][$this->vars['RESULTAT_EVENEMENT_Id']]) && !isset($_SESSION['RESULTAT_EVENEMENT'][$this->vars['RESULTAT_EVENEMENT_Id']])) {?>
													<option value="<?php echo $this->vars['RESULTAT_EVENEMENT_Id'];?>" selected="selected"><?php echo $_SESSION['RESULTAT_EVENEMENT_ALL'][$this->vars['RESULTAT_EVENEMENT_Id']];?></option>
												<?php } ?>
										</select>	
									</div>
								</div>
									
                                <div class="form-group col-md-6">
                                        <label class="col-md-4 control-label">Rappel</label>
                                       
										
									<div class="col-md-8">
											<div class="input-group date date-picker">
												<input name="Date_Rappel" type="texte" class="form-control" value="<?php if(isset($this->vars['Date_Rappel'])) echo lof::convertDateFromAdobeFormat($this->vars['Date_Rappel']);?>">
												<span class="input-group-btn">
												<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
											<!-- /input-group -->
									</div>
										
                                </div>
								
								

                            </div>
							
							<?php if($this->vars['LIEU_Id'] == 2 && $this->vars['MODE_EVENEMENT_Id'] == 2 && strlen($this->vars['sous_resultat_apso']) > 0){?>
							<div class="row">
								<div class="form-group col-md-6">
									<label class="col-md-4 control-label">Sous-résultat appel sortant</label>

									<div class="col-md-8">
										<input type="texte" class="form-control" name="sous_resultat_apso"  value="<?php echo $this->vars['sous_resultat_apso']?>" disabled="disabled"/>
									</div>
								</div>
                            </div>
							<?php } ?>
							
														
						<div class="row">
								<?php for($i = 1; $i <= 3; $i++){
									if($this->vars['TRANSCO_ENUM_Theme_entretien_Id_'.$i] > 0){?>
									<div class="form-group col-md-6">
                                        <label class="col-md-5">Thème d'entretien <?php echo $i;?> : </label>
                                        <div class="col-md-7">
									<input type="text" class="form-control" name="theme_<?php echo $i;?>" value="<?php echo $_SESSION['THEME_ENTRETIEN'][$this->vars['TRANSCO_ENUM_Theme_entretien_Id_'.$i]];?>" readonly>
										</div>
									</div>
								<?php }
								}?>
						</div>
						
						
						<?php if($this->vars['MODE_EVENEMENT_Id'] == 10){?> 
								<?php if(isset($_SESSION['TYPE_FORMULAIRE_WEB'][$this->vars['TRANSCO_ENUM_Type_formulaire_web']]) && $this->vars['TRANSCO_ENUM_Type_formulaire_web'] > 0){?>
									<div class="form-group col-md-6">
                                        <label class="col-md-5">Formulaire web : </label>
                                        <div class="col-md-7">
											<input type="text" class="form-control" name="TRANSCO_ENUM_Type_formulaire_web" value="<?php echo $_SESSION['TYPE_FORMULAIRE_WEB'][$this->vars['TRANSCO_ENUM_Type_formulaire_web']];?>" readonly>
										</div>
									</div>
								<?php } ?>
								
								<?php if(isset($this->vars['Type_Espace_Web']) && strlen($this->vars['Type_Espace_Web']) > 0){?>
									<div class="form-group col-md-6">
                                        <label class="col-md-5">Espace web : </label>
                                        <div class="col-md-7">
											<input type="text" class="form-control" name="Type_Espace_Web" value="<?php echo $this->vars['Type_Espace_Web'];?>" readonly>
										</div>
									</div>
								<?php } ?>
								
								<?php if(isset($this->vars['Type_Landing_Page']) && strlen($this->vars['Type_Landing_Page']) > 0){?>
									<div class="form-group col-md-6">
                                        <label class="col-md-5">N° Landing Page : </label>
                                        <div class="col-md-7">
											<input type="text" class="form-control" name="Type_Landing_Page" value="<?php echo $this->vars['Type_Landing_Page'];?>" readonly>
										</div>
									</div>
								<?php } ?>
								
								<?php if(isset($this->vars['Code_Campagne']) && strlen($this->vars['Code_Campagne']) > 0){?>
									<div class="form-group col-md-6">
                                        <label class="col-md-5">Code campagne : </label>
                                        <div class="col-md-7">
											<input type="text" class="form-control" name="Code_Campagne" value="<?php echo $this->vars['Code_Campagne'];?>" readonly>
										</div>
									</div>
								<?php } ?>
								
								<?php if(isset($this->vars['Etape_Souscription_Web']) && $this->vars['Etape_Souscription_Web'] > 0){?>
									<div class="form-group col-md-6">
                                        <label class="col-md-5">Etape Souscription : </label>
                                        <div class="col-md-7">
											<input type="text" class="form-control" name="Etape_Souscription_Web" value="<?php echo $this->vars['Etape_Souscription_Web'];?>" readonly>
										</div>
									</div>
								<?php } ?>
								
							<?php }?>
							
							
								<?php }?>
						
						
						<?php if($this->vars['MOTIF_EVENEMENT_Id'] == 7){?> 
								<?php if(strlen(trim($this->vars['Code_Campagne'])) > 0){?>
									<div class="form-group col-md-6">
                                        <label class="col-md-5">Code campagne : </label>
                                        <div class="col-md-7">
											<input type="text" class="form-control" name="Code_Campagne" value="<?php echo $this->vars['Code_Campagne'];?>">
										</div>
									</div>
								<?php } ?>
								
								<?php if(isset($this->vars['Montant_Versement']) && $this->vars['Montant_Versement'] > 0){?>
									<div class="form-group col-md-6">
                                        <label class="col-md-5">Montant versement : </label>
                                        <div class="col-md-7">
											<input type="text" class="form-control" name="Montant_Versement" value="<?php echo $this->vars['Montant_Versement'];?>">
										</div>
									</div>
								<?php } ?>
								
								<?php if(isset($this->vars['Nb_Annees_Rachat']) && $this->vars['Nb_Annees_Rachat'] > 0){?>
									<div class="form-group col-md-6">
                                        <label class="col-md-5">Nombre années de rachat : </label>
                                        <div class="col-md-7">
											<input type="text" class="form-control" name="Nb_Annees_Rachat" value="<?php echo $this->vars['Nb_Annees_Rachat'];?>" readonly>
										</div>
									</div>
								<?php } ?>
								
								<?php if(isset($this->vars['Classe_Actuelle']) && $this->vars['Classe_Actuelle'] > 0){?>
									<div class="form-group col-md-6">
                                        <label class="col-md-5">Classe avant changement : </label>
                                        <div class="col-md-7">
										<select name="Classe_Actuelle" class="form-control">
											<?php foreach(lof::$listeValeurs['CLASSE_COTISATION_MONTANT'] as $cle => $valeur) {
												if($cle != 45){
													if($this->vars['statut_particulier'] == 2){
														if(($cle < 5 && $cle % 2 != 0) || $cle >= 5 ){
															echo '<option value="' . $cle . '" '. ((isset($this->vars['Classe_Actuelle']) && $this->vars['Classe_Actuelle'] == $cle) ? 'selected="selected"' : '') . '>' . $cle . ' : ' . $valeur . ' € / an</option>';
														}
													}else{
															echo '<option value="' . $cle . '" '. ((isset($this->vars['Classe_Actuelle']) && $this->vars['Classe_Actuelle'] == $cle) ? 'selected="selected"' : '') . '>' . $cle . ' : ' . $valeur . ' € / an</option>';
													}
												}
											}
											?>
										</select>	
										</div>
									</div>
								<?php } ?>
								
								<?php if(isset($this->vars['Classe_Nouvelle']) && $this->vars['Classe_Nouvelle'] > 0){?>
									<div class="form-group col-md-6">
                                        <label class="col-md-5">Classe après changement : </label>
                                        <div class="col-md-7">
										<select name="Classe_Nouvelle" class="form-control">
											<?php foreach(lof::$listeValeurs['CLASSE_COTISATION_MONTANT'] as $cle => $valeur) {
												if($cle != 45){
													if($this->vars['statut_particulier'] == 2){
														if(($cle < 5 && $cle % 2 != 0) || $cle >= 5 ){
															echo '<option value="' . $cle . '" '. ((isset($this->vars['Classe_Nouvelle']) && $this->vars['Classe_Nouvelle'] == $cle) ? 'selected="selected"' : '') . '>' . $cle . ' : ' . $valeur . ' € / an</option>';
														}
													}else{
															echo '<option value="' . $cle . '" '. ((isset($this->vars['Classe_Nouvelle']) && $this->vars['Classe_Nouvelle'] == $cle) ? 'selected="selected"' : '') . '>' . $cle . ' : ' . $valeur . ' € / an</option>';
													}
												}
											}
											?>
										</select>	
										</div>
									</div>
								<?php } ?>
								
						<?php }?>
							
							<div class="row">
								<div class="col-md-12" style="text-align:right" >
									<a href="<?php echo Router::url('recipient/events/'.$this->request->params[0]); ?>" name="back_events" class="btn btn-default" style="margin-bottom : 10px">Retour</a>
									<button class="btn btn-success" style="margin-bottom : 10px" type="submit">Enregistrer</button>
								</div>
							</div>
							

							
							
						</form>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>
			
			

            <!-- END PAGE CONTENT-->

        </div>




    </div>
    <!-- END PAGE CONTENT-->
