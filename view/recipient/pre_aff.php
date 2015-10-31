					
           <form class="login-form" method="post" action="<?php echo Router::url('recipient/pre_aff/'.$this->request->params[0]); ?>" style="z-index:0;margin-top:10px; position:relative">
		   

		   
		    <div class="row">
				<div class="col-md-6"  style="margin-bottom : 10px" align="left">
					&nbsp;
					<?php if(isset($_SESSION[$this->request->params[0].'_pre_aff_post'])) {?>
						<a target="_blank" href="<?php echo Router::url('recipient/imprimer_courrier_accompagnement/'. $this->request->params[0]);?>" class="btn btn-info">Courrier d'accompagnement</a>
					<?php }?>
				</div>

				<div class="col-md-6"  style="margin-bottom : 10px" align="right">
					<?php if(isset($_SESSION[$this->request->params[0].'_pre_aff_post'])) {?>
						<a href="<?php echo Router::url('recipient/pre_aff_unset/'. $this->request->params[0]);?>" class="btn btn-default">Précédent</a>
						<a href="<?php echo Router::url('recipient/add_event/'. $this->request->params[0]);?>" class="btn btn-success" style="text-align:right">Envoyer</a>
						<?php } else {?>
						<button class="btn btn-success valider_pre_aff" style="margin-bottom : 10px" type="submit">Valider</button>
					<?php } ?>
				</div>

			</div>
			
		   	<div class="alert alert-danger display-hide"  style="text-align:center">
			<button class="close" data-close="alert"></button>
			<span>
			Un ou plusieurs champs sont manquants. </span>
			</div>
			
					   <div class="row ">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet col-md-12">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-group"></i> Renseignements
							</div>
							<div class="tools">
								<a href="" class="collapse"></a>
							</div>
						</div>
						<div class="portlet-body col-md-12">
							<div class="form-horizontal  col-md-6" role="form">
									<div class="form-group">
                                        <label class="col-md-4 control-label">Civilité</label>
                                        <div class="col-md-8">
											<select name="qualite_id" class="form-control">
												<option value=""></option>
                                                <?php foreach($_SESSION['CIVILITE'] as $cle => $valeur) {?>
												<option value="<?php echo $cle;?>" <?php if(isset($this->vars['qualite_id']) && $this->vars['qualite_id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
												<?php } ?>
											</select>	
                                       </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Nom d'usage <?php if(!isset($_SESSION['statut_particulier']) || $_SESSION['statut_particulier'] != 1) {?>&nbsp;<span style="font-size : 12px; color : red"> * </span><?php } ?></label>
                                        <div class="col-md-8">
                                            <input type="text" name="sLastName" class="form-control" value="<?php if (isset($this->vars['lastName'])) echo $this->vars['lastName']; ?>"  <?php if(isset($this->vars['num_cotisant']) && strlen($this->vars['num_cotisant'] && $_SESSION['statut_particulier'] == "3")) echo 'disabled="disabled"';?>>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Nom de naissance</label>
                                        <div class="col-md-8">
                                            <input type="text" name="Nom_Naissance" class="form-control" value="<?php if (isset($this->vars['nom_naissance'])) echo $this->vars['nom_naissance']; ?>" <?php if(isset($this->vars['num_cotisant']) && strlen($this->vars['num_cotisant'] && $_SESSION['statut_particulier'] == "3")) echo "readonly";?>>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Prénom<?php if(!isset($_SESSION['statut_particulier']) || $_SESSION['statut_particulier'] != 1) {?>&nbsp;<span style="font-size : 12px; color : red"> * </span><?php } ?></label>
                                        <div class="col-md-8">
                                            <input type="text" name="sFirstName" class="form-control" value="<?php if (isset($this->vars['firstName'])) echo $this->vars['firstName']; ?>" <?php if(isset($this->vars['num_cotisant']) && strlen($this->vars['num_cotisant'] && $_SESSION['statut_particulier'] == "3")) echo "readonly";?>>
                                        </div>
                                    </div>
									
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Date de Naissance&nbsp;<span style="font-size : 12px; color : red"> * </span></label>
                                       
										
									<div class="col-md-8">

												<input id="Date_Naissance" name="tsBirth" type="texte" class="form-control" value="<?php if (isset($this->vars['tsBirth']) && $this->vars['tsBirth'] <> '') echo lof::convertDateFromAdobeFormat($this->vars['tsBirth']); ?>">

											<!-- /input-group -->
										</div>
										
                                    </div>
									
									
									<div class="form-group">
                                        <label class="col-md-4 control-label">N° Sécurité Sociale</label>
                                        <div class="col-md-8">
                                            <input type="text" name="Num_INSEE" maxlength="13" class="form-control" value="<?php if (isset($this->vars['num_insee'])) echo $this->vars['num_insee']; ?>">
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Situation Familiale</label>
                                        <div class="col-md-8">


										<select class="form-control" name="SITUATION_FAMILIALE_Id">
												<option value=""></option>
                                                <?php foreach($_SESSION['SITUATION_FAMILIALE'] as $cle => $valeur) {?>
												<option value="<?php echo $cle;?>" <?php if(isset($this->vars['situation_familiale_id']) && $this->vars['situation_familiale_id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
												<?php } ?>
										</select>

										
										</div>
											
                                    </div>
									
									
									<div class="form-group">
                                        <label class="col-md-4 control-label">Département Naissance</label>
                                        <div class="col-md-8">
                                            <input type="text" name="Dept_Naissance" class="form-control" value="<?php if (isset($this->vars['dept_naissance'])) echo $this->vars['dept_naissance']; ?>" >
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-4 control-label">Ville Naissance</label>
                                        <div class="col-md-8">
                                            <input type="text" name="Ville_Naissance" class="form-control" value="<?php if (isset($this->vars['ville_naissance'])) echo $this->vars['ville_naissance']; ?>">
                                        </div>
                                    </div>
									
									
									
									
									
									
									<!-- Il faut peut être changer ceci, on verra -->

									
									
									<div class="form-group">
                                        <label class="col-md-4 control-label">Pays Naissance</label>
                                        <div class="col-md-8">
                                            <select  name="Pays_Naissance" class="form-control">
														<option value="">Selectionner</option>
														<option value=""></option>
														<?php foreach(lof::$listeValeurs['LISTE_PAYS'] as $cle => $valeur) {?>
														<option value="<?php echo $cle;?>" <?php if(isset($this->vars['pays_naissance']) && $this->vars['pays_naissance'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
														<?php } ?>
											</select>	
                                        </div>
                                    </div>

									<div class="form-group">
                                        <label class="col-md-4 control-label">Nationalité</label>
                                        <div class="col-md-8">
                                            <select  name="Nationalite" class="form-control">
														<option value="">Selectionner</option>
														<option value=""></option>
														<?php foreach(lof::$listeValeurs['LISTE_PAYS'] as $cle => $valeur) {?>
														<option value="<?php echo $cle;?>" <?php if(isset($this->vars['nationalite']) && $this->vars['nationalite'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
														<?php } ?>
											</select>	
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Résidence fiscale française</label>
                                        <div class="col-md-8">
                                            <div class="radio-list">
												<input type="hidden" name="Residence_Fiscale_Francaise" value="0" />
                                                <label class="radio-inline">
                                                    <input type="radio" name="Residence_Fiscale_Francaise" value="1" <?php if(isset($this->vars['Residence_Fiscale_Francaise']) && $this->vars['Residence_Fiscale_Francaise'] == 1) {echo 'checked';} ?>> Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Residence_Fiscale_Francaise" value="2" <?php if(isset($this->vars['Residence_Fiscale_Francaise']) && $this->vars['Residence_Fiscale_Francaise'] == 2) {echo 'checked';} ?>> Non </label>
                                            </div>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                    <label class="col-md-4 control-label">Majeur protégé</label>
                                            <div class="col-md-8">
                                            <div class="radio-list">
												<input type="hidden" name="Majeur_Protege" value="0" />
                                                <label class="radio-inline">
                                                    <input type="radio" name="Majeur_Protege" value="1" <?php if(isset($this->vars['Majeur_Protege']) && $this->vars['Majeur_Protege'] == 1) {echo 'checked';} ?>> Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Majeur_Protege" value="2" <?php if(isset($this->vars['Majeur_Protege']) && $this->vars['Majeur_Protege'] == 2) {echo 'checked';} ?>> Non </label>
                                            </div>
										</div>
                                    </div>
									
									
									<div class="form-group">
                                        <label class="col-md-4 control-label">Situation professionnelle</label>
                                        <div class="col-md-8">
											<select  name="SITUATION_PROFESSIONNELLE_Id" class="form-control">
												<option value="">Sélectionner</option>
                                                <?php foreach($_SESSION['SITUATION_PROFESSIONNELLE'] as $cle => $valeur) {?>
												<option value="<?php echo $cle;?>" <?php if(isset($this->vars['situation_professionnelle_id']) && $this->vars['situation_professionnelle_id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
												<?php } ?>
											</select>		
									   </div>
                                    </div>
									
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Conjoint</label>
                                        <div class="col-md-8">
											<?php 
											$civilite_conjoint = (isset($this->vars['qualite_id_conjoint']) && $this->vars['qualite_id_conjoint'] > 0 && $this->vars['qualite_id_conjoint'] <= 2) ? (strtoupper($_SESSION['CIVILITE'][$this->vars['qualite_id_conjoint']])) . ' ' : ('');
											?>
                                            <input style="cursor:pointer" type="text" onclick="ouvrir_fiche_conjoint()" id="Conjoint" class="form-control" value="<?php if (isset($this->vars['lastName_conjoint']) && isset($this->vars['firstName_conjoint']) && isset($this->vars['id_conjoint']) && $this->vars['id_conjoint'] > 0) echo $civilite_conjoint . $this->vars['firstName_conjoint'] . ' ' . $this->vars['lastName_conjoint'] . ' | ' . $_SESSION['STATUT_PARTICULIER'][$this->vars['statut_particulier_conjoint']] . ' n° ' . $this->vars['id_conjoint']; ?>" readonly>
                                            <input type="hidden" name="Id_Conjoint" value="<?php if (isset($this->vars['id_conjoint'])) echo $this->vars['id_conjoint']; ?>">
											<input type="hidden" name="Old_Id_Conjoint" value="<?php if (isset($this->vars['id_conjoint'])) echo $this->vars['id_conjoint']; ?>"/>
										</div>
										<div class="col-md-4">&nbsp;</div>
										<label class="col-md-6 control-label" style="text-align:left; font-size:0.9em"><a style="cursor:pointer" onclick="recherche_particulier_conjoint();">Rechercher</a> | <a style="cursor:pointer" onclick="supprimer_particulier_conjoint();">Supprimer</a></label>
										
                                    </div>	
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Statut à l'Affiliation</label>
                                        <div class="col-md-8">
											<select  name="STATUT_AFFILIATION_Id" class="form-control"> 
												<option value="">Sélectionner</option>
                                                <?php foreach($_SESSION['STATUT_AFFILIATION'] as $cle => $valeur) {?>
												<option value="<?php echo $cle;?>" <?php if(isset($this->vars['statut_affiliation_id']) && $this->vars['statut_affiliation_id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
												<?php } ?>
											</select>
									  </div>
                                    </div>
									
									
	

								<div id="autre_affiliation" <?php if(!isset($this->vars['statut_affiliation_id']) || ($this->vars['statut_affiliation_id'] != 6 )) echo 'style="display:none"' ?>>
									
									
									<div class="form-group">
                                        <label class="col-md-4 control-label">Saisissez</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="Libelle_Autre_Statut_Affiliation" value="<?php if (isset($this->vars['Libelle_Autre_Statut_Affiliation'])) echo $this->vars['Libelle_Autre_Statut_Affiliation']; ?>">
                                        </div>
                                    </div>	
								</div>										
									
									
								<div id="affiliation_div" <?php if(!isset($this->vars['statut_affiliation_id']) || ($this->vars['statut_affiliation_id'] != 1 && $this->vars['statut_affiliation_id'] != 2)) echo 'style="display:none"' ?>>
									
									
									<div class="form-group">
                                        <label class="col-md-4 control-label">Nom d'établissement</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="Administration_Nom" value="<?php if (isset($this->vars['Administration_Nom'])) echo $this->vars['Administration_Nom']; ?>">
                                        </div>
                                    </div>
									

									
									
									<div class="form-group">
										<label class="col-md-4 control-label">Complément Nom</label>
                                        <div class="col-md-8">
                                            <input id="Administration_Adresse_1" type="text" class="form-control" name="Administration_Adresse_1" value="<?php if (isset($this->vars['Administration_Adresse_1'])) echo $this->vars['Administration_Adresse_1']; ?>" >
                                        </div>
                                    </div>
								
								    <div class="form-group">
                                        <label class="col-md-4 control-label">Complément Localisation</label>
                                        <div class="col-md-8">
                                            <input id="Administration_Adresse_2" type="text" class="form-control" name="Administration_Adresse_2" value="<?php if (isset($this->vars['Administration_Adresse_2'])) echo $this->vars['Administration_Adresse_2']; ?>" >
                                        </div>
                                    </div>

									<div class="form-group">
                                        <label class="col-md-4 control-label">N° et libellé de la voie</label>
                                        <div class="col-md-8">
                                            <input id="Administration_Adresse_3" type="text" class="form-control" name="Administration_Adresse_3" value="<?php if (isset($this->vars['Administration_Adresse_3'])) echo $this->vars['Administration_Adresse_3']; ?>">
                                        </div>
                                    </div>
									
									
									<div class="form-group">
                                        <label class="col-md-4 control-label">BP Lieu-dit</label>
                                        <div class="col-md-8">
                                            <input id="Administration_Adresse_4" type="text" class="form-control" name="Administration_Adresse_4" value="<?php if (isset($this->vars['Administration_Adresse_4'])) echo $this->vars['Administration_Adresse_4']; ?>" >
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-4 control-label">Code Postal</label>
                                        <div class="col-md-8">
                                            <input id="Administration_CP" type="text" class="form-control" name="Administration_CP" pattern="[0-9]{5}" value="<?php if (isset($this->vars['Administration_CP'])) echo $this->vars['Administration_CP']; ?>">
                                        </div>
                                    </div>
									
									<div class="form-group">
                                    <label class="col-md-4 control-label">Ville</label>
                                        <div class="col-md-8">
                                            <input id="Administration_Ville" type="text" class="form-control" name="Administration_Ville" value="<?php if (isset($this->vars['Administration_Ville'])) echo $this->vars['Administration_Ville']; ?>">
                                        </div>
                                    </div>
									
									
								

									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Pays</label>
                                        <div class="col-md-8">
                                            <select  id="Administration_Pays" name="Administration_Pays" class="form-control">
														<option value="">Sélectionner</option>
														<option value=""></option>
														<?php foreach(lof::$listeValeurs['LISTE_PAYS'] as $cle => $valeur) {?>
														<option value="<?php echo $cle;?>" <?php if(isset($this->vars['Administration_Pays']) && $this->vars['Administration_Pays'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
														<?php } ?>
											</select>
										
										</div>
										
                                    </div>
									
									 <div class="form-group">
                                        <label class="col-md-4 control-label">Catégorie de Fonctionnaire</label>
                                        <div class="col-md-8">
										<select  name="CATEGORIE_FONCTIONNAIRE_Id" class="form-control"> 
											<option value="">Sélectionner</option>
											<?php foreach(lof::$listeValeurs['CATEGORIE_FONCTIONNAIRE'] as $cle => $valeur) {?>
											<option value="<?php echo $cle;?>" <?php if(isset($this->vars['categorie_fonctionnaire_id']) && $this->vars['categorie_fonctionnaire_id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
											<?php } ?>
										</select>
										</div>
                                    </div>
									

									
								</div>
                            </div>
							
                            <div class="form-horizontal col-md-6" role="form">
							
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Pays</label>
                                        <div class="col-md-8">
                                            <select  id="Pays" name="Pays" class="form-control">
														<option value="">Sélectionner</option>
														<option value=""></option>
														<?php foreach(lof::$listeValeurs['LISTE_PAYS'] as $cle => $valeur) {?>
														<option value="<?php echo $cle;?>" <?php if(isset($this->vars['pays']) && $this->vars['pays'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
														<?php } ?>
											</select>
										
										</div>
										
                                    </div>
							
									<div class="form-group">
                                        <label class="col-md-4 control-label">Code Postal&nbsp;<span style="font-size : 12px; color : red"> * </span></label>
                                        <div class="col-md-8">
                                            <input id="CP" type="text" class="form-control" name="Code_Postal" pattern="[0-9]{5}" value="<?php if (isset($this->vars['code_postal'])) echo $this->vars['code_postal']; ?>" required>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                    <label class="col-md-4 control-label">Ville</label>
                                        <div class="col-md-8">
                                            <input id="Ville" type="text" class="form-control" name="Ville" value="<?php if (isset($this->vars['ville'])) echo $this->vars['ville']; ?>">
                                        </div>
                                    </div>
									
									
								
								    <div class="form-group">
                                    <label class="col-md-4 control-label">Complément Nom</label>
                                        <div class="col-md-8">
                                            <input id="Adresse_1" type="text" class="form-control" name="Adresse_1" value="<?php if (isset($this->vars['adresse_1'])) echo $this->vars['adresse_1']; ?>" >
                                        </div>
                                    </div>
								
								    <div class="form-group">
                                        <label class="col-md-4 control-label">Complément Localisation</label>
                                        <div class="col-md-8">
                                            <input id="Adresse_2" type="text" class="form-control" name="Adresse_2" value="<?php if (isset($this->vars['adresse_2'])) echo $this->vars['adresse_2']; ?>" >
                                        </div>
                                    </div>

									<div class="form-group">
                                        <label class="col-md-4 control-label">N° et libellé de la voie</label>
                                        <div class="col-md-8">
                                            <input id="Adresse_3" type="text" class="form-control" name="Adresse_3" value="<?php if (isset($this->vars['adresse_3'])) echo $this->vars['adresse_3']; ?>">
                                        </div>
                                    </div>
									
									
									<div class="form-group">
                                        <label class="col-md-4 control-label">BP Lieu-dit</label>
                                        <div class="col-md-8">
                                            <input id="Adresse_4" type="text" class="form-control" name="Adresse_4" value="<?php if (isset($this->vars['adresse_4'])) echo $this->vars['adresse_4']; ?>" >
                                        </div>
                                    </div>
									
                                    
									<select style="display:none" id="dqe_pays"><option value="FRA" selected="selected">F</option></select>
									
				                    <div class="form-group">
                                        <label class="col-md-4 control-label">Téléphone Fixe Personnnel</label>
                                        <div class="col-md-8">
                                            <input id="sPhone" type="text" name="sPhone" class="form-control" value="<?php if (isset($this->vars['sphone'])) echo $this->vars['sphone']; ?>">
											<label id="resultPhone">&nbsp;</label>
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Téléphone Mobile</label>
                                        <div class="col-md-8">
                                            <input id="sMobilePhone" type="text" name="sMobilePhone" class="form-control" value="<?php if (isset($this->vars['smobilephone'])) echo $this->vars['smobilephone']; ?>">
											<label id="resultMobile" class="help-block" style="text-align:left">&nbsp;</label>
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Email Personnel</label>
                                        <div class="col-md-8" style="text-align:left">
                                            <input id="sEmailPreAff" type="text" name="sEmailPreAff" class="form-control" value="<?php if (isset($this->vars['semail'])) echo $this->vars['semail']; ?>" required="required"  oninvalid="this.target.setCustomValidity('Witinnovation')">
                                            <label id="resultMailPreAff" class="help-block" style="text-align:left">&nbsp;</label>
                                        </div>
                                    </div>
									

									<div id="optin">
									<div class="form-group">
                                        <label class="col-md-8 control-label">Stop Communications (courrier, tél, sms, email)</label>
                                            <div class="col-md-4">
                                                <div class="checkbox-list">
                                                    <label>
														<input type="hidden" name="iBlackList" value="0" />
                                                        <input type="checkbox" name="iBlackList" value="1"> </label>
                                                </div>
                                            </div>
                                    </div>
									
                            
									
									
									<div class="form-group">
                                        <label class="col-md-6 control-label">Actualités Préfon par Courrier</label>
                                        <div class="col-md-6">
                                            <div class="radio-list">
											<input type="hidden" name="Optin_Prefon_Courrier" value="1" />
                                                <label class="radio-inline">
                                                    <input class="ziza" type="radio" name="Optin_Prefon_Courrier" value="1" <?php if(!isset($this->vars['optin_prefon_courrier']) || ($this->vars['optin_prefon_courrier'])) {echo 'checked';} ?>> Oui </label>
                                                <label class="radio-inline">
                                                    <input class="ziza" type="radio" name="Optin_Prefon_Courrier" value="0" <?php if(isset($this->vars['optin_prefon_courrier']) && (!$this->vars['optin_prefon_courrier'])) {echo 'checked';} ?>> Non </label>
                                            </div>
                                        </div>
                                    </div>
									
									
									<div class="form-group">
                                        <label class="col-md-6 control-label">Actualités Préfon par Email</label>
                                        <div class="col-md-6">
                                            <div class="radio-list">
											<input type="hidden" name="Optin_Prefon_Email" value="1" />
                                                <label class="radio-inline">
                                                    <input type="radio" name="Optin_Prefon_Email" value="1" <?php if(!isset($this->vars['optin_prefon_email']) || ($this->vars['optin_prefon_email'])) {echo 'checked';} ?>> Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Optin_Prefon_Email" value="0" <?php if(isset($this->vars['optin_prefon_email']) && (!$this->vars['optin_prefon_email'])) {echo 'checked';} ?> > Non </label>
                                            </div>
                                        </div>
                                    </div>
									
									
									<div class="form-group">
                                        <label class="col-md-6 control-label">Actualités Préfon par Téléphone</label>
                                        <div class="col-md-6">
                                            <div class="radio-list">
											<input type="hidden" name="Optin_Prefon_Telephone" value="1" />
                                                <label class="radio-inline">
                                                    <input type="radio" name="Optin_Prefon_Telephone" value="1" <?php if(!isset($this->vars['optin_prefon_telephone']) || ($this->vars['optin_prefon_telephone'])) {echo 'checked';} ?> > Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Optin_Prefon_Telephone" value="0" <?php if(isset($this->vars['optin_prefon_telephone']) && (!$this->vars['optin_prefon_telephone'])) {echo 'checked';} ?>> Non </label>
                                            </div>
                                        </div>
                                    </div>
									
									
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Actualités Préfon par SMS</label>
                                        <div class="col-md-6">
                                            <div class="radio-list">
											<input type="hidden" name="Optin_Prefon_SMS" value="1" />
                                                <label class="radio-inline">
                                                    <input type="radio" name="Optin_Prefon_SMS" value="1" <?php if(!isset($this->vars['optin_prefon_sms']) || ($this->vars['optin_prefon_sms'])) {echo 'checked';} ?>> Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Optin_Prefon_SMS" value="0" <?php if(isset($this->vars['optin_prefon_sms']) && (!$this->vars['optin_prefon_sms'])) {echo 'checked';} ?>> Non </label>
                                            </div>
                                        </div>
                                    </div>
     
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Actualités Partenaires Préfon</label>
                                        <div class="col-md-6">
                                            <div class="radio-list">
											<input type="hidden" name="Optin_Partenaires" value="1" />
                                                <label class="radio-inline">
                                                    <input type="radio" name="Optin_Partenaires" value="1" <?php if(!isset($this->vars['optin_partenaires']) || ($this->vars['optin_partenaires'])) {echo 'checked';} ?> > Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Optin_Partenaires" value="0" <?php if(isset($this->vars['optin_partenaires']) && (!$this->vars['optin_partenaires'])) {echo 'checked';} ?>> Non </label>
                                            </div>
                                        </div>
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
								 <i class="fa fa-bank"></i> Cotisation
							</div>
							<div class="tools">
								<a href="" class="collapse"></a>
							</div>
						</div>
						<div class="portlet-body col-md-12">
							<div class="form-horizontal  col-md-6" role="form">
								<div class="form-group">
                                        <label class="col-md-5 control-label">Classe</label>
                                        <div class="col-md-7">
										<select name="Classe_Cotisation" class="form-control">
											<option value="0">Sélectionner</option>
											<?php foreach(lof::$listeValeurs['CLASSE_COTISATION_MONTANT'] as $cle => $valeur) {
												if($cle != 45){
													if($this->vars['statut_particulier'] == 2){
														if(($cle < 5 && $cle % 2 != 0) || $cle >= 5 ){
															echo '<option value="' . $cle . '" '. ((isset($this->vars['Classe_Cotisation']) && $this->vars['Classe_Cotisation'] == $cle) ? 'selected="selected"' : '') . '>' . $cle . ' : ' . $valeur . ' € / an</option>';
														}
													}else{
															echo '<option value="' . $cle . '" '. ((isset($this->vars['Classe_Cotisation']) && $this->vars['Classe_Cotisation'] == $cle) ? 'selected="selected"' : '') . '>' . $cle . ' : ' . $valeur . ' € / an</option>';
													}
												}
											}
											?>
										</select>		
									   </div>
                                    </div>
									
									
									<div class="form-group">
										<label class="col-md-5 control-label">Mode de paiement</label>
                                        <div class="col-md-7">
											<select  name="MODE_REGLEMENT_RETRAITE_COTISANT_Id" class="form-control">
												<?php foreach(lof::$listeValeurs['MODE_REGLEMENT_RETRAITE_COTISANT'] as $cle => $valeur) {?>
												<option value="<?php echo $cle;?>" <?php if(isset($this->vars['MODE_REGLEMENT_RETRAITE_COTISANT_Id']) && $this->vars['MODE_REGLEMENT_RETRAITE_COTISANT_Id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
												<?php } ?>
											</select>		
									   </div>
                                    </div>
									
									<input type="hidden" name="Montant_Cotisation_Annuelle" value="<?php echo $this->vars['Montant_Cotisation_Annuelle'];?>" /> 
									
									
									<div id="mois_prelevement" class="form-group" style="<?php if($this->vars['MODE_REGLEMENT_RETRAITE_COTISANT_Id'] > 7 || $this->vars['MODE_REGLEMENT_RETRAITE_COTISANT_Id'] < 3) echo "display:none"?>">
										<label class="col-md-5 control-label">Mois de début </label>
                                        <div class="col-md-7">
										<select name="Mois_Debut_Prelevement" class="form-control">
											<?php foreach(lof::$listeValeurs['MOIS_DEBUT_PRELEVEMENT'] as $cle => $valeur) {?>
											<option value="<?php echo $cle;?>" <?php if(isset($this->vars['Mois_Debut_Prelevement']) && $cle == $this->vars['Mois_Debut_Prelevement']) echo 'selected="selected"'?>><?php echo $valeur?></option>
											<?php } ?>
										</select>	
									   </div>
                                    </div>
									
									
									
									
									
									
                                    <div id="rib" class="form-group" style="text-align:center <?php if(isset($this->vars['MODE_REGLEMENT_RETRAITE_COTISANT_Id']) && ($this->vars['MODE_REGLEMENT_RETRAITE_COTISANT_Id'] < 4 || $this->vars['MODE_REGLEMENT_RETRAITE_COTISANT_Id'] > 7)) echo '; display:none'; ?>" >
                                        <label class="col-md-12 control-label" style="text-align:center" >RIB IBAN</label>

										<div class="col-md-12">

												<input class="rib_iban" maxlength="4" name="Mandat_IBAN1" type="text" value="<?php if(isset($this->vars['Mandat_IBAN']) && strlen($this->vars['Mandat_IBAN']) > 0 ) echo substr($this->vars['Mandat_IBAN'], 0, 4);?>">
												<input class="rib_iban" maxlength="4" name="Mandat_IBAN2" type="text" value="<?php if(isset($this->vars['Mandat_IBAN']) && strlen($this->vars['Mandat_IBAN']) > 0 ) echo substr($this->vars['Mandat_IBAN'], 4, 4);?>">
												<input class="rib_iban" maxlength="4" name="Mandat_IBAN3" type="text" value="<?php if(isset($this->vars['Mandat_IBAN']) && strlen($this->vars['Mandat_IBAN']) > 0 ) echo substr($this->vars['Mandat_IBAN'], 8, 4);?>">
												<input class="rib_iban" maxlength="4" name="Mandat_IBAN4" type="text" value="<?php if(isset($this->vars['Mandat_IBAN']) && strlen($this->vars['Mandat_IBAN']) > 0 ) echo substr($this->vars['Mandat_IBAN'], 12, 4);?>">
												<input class="rib_iban" maxlength="4" name="Mandat_IBAN5" type="text" value="<?php if(isset($this->vars['Mandat_IBAN']) && strlen($this->vars['Mandat_IBAN']) > 0 ) echo substr($this->vars['Mandat_IBAN'], 16, 4);?>">
												<input class="rib_iban" maxlength="4" name="Mandat_IBAN6" type="text" value="<?php if(isset($this->vars['Mandat_IBAN']) && strlen($this->vars['Mandat_IBAN']) > 0 ) echo substr($this->vars['Mandat_IBAN'], 20, 4);?>">
												<input class="rib_iban" maxlength="4" name="Mandat_IBAN7" type="text" value="<?php if(isset($this->vars['Mandat_IBAN']) && strlen($this->vars['Mandat_IBAN']) > 0 ) echo substr($this->vars['Mandat_IBAN'], 24, 4);?>">
										</div>
										
										<label class="col-md-12 control-label" style="text-align:center" >RIB BIC</label>

										<div class="col-md-12">
												<input class="rib_bic" name="Mandat_BIC" type="text" value="<?php if(isset($this->vars['Mandat_BIC']) && strlen($this->vars['Mandat_BIC']) > 0 ) echo $this->vars['Mandat_BIC']; ?>">
										</div>	
										
                                    </div>
                            </div>
							
                            <div class="form-horizontal col-md-6" role="form">
								<div class="form-group" >
									<div class="form-group">
                                    <label class="col-md-5 control-label">Transfert de contrat</label>
                                            <div class="col-md-7">
                                                <div class="checkbox-list">
                                                    <label>
														<input type="hidden" name="Transfert_Contrat" value="0" />
                                                        <input type="checkbox" name="Transfert_Contrat" value="1"  <?php if(isset($this->vars['Transfert_Contrat']) && ($this->vars['Transfert_Contrat'])) {echo 'checked';} ?>> </label>
                                                </div>
                                            </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" style="">Rachat d’années (Versement exceptionnel, facultatif)</label>
                                        <div class="col-md-7">
										<select name="Nb_Annees_Rachat" class="form-control">
											<option value="0">Pas de rachat</option>
											<option value="-1" <?php if($this->vars['Nb_Annees_Rachat'] == -1) echo 'selected="selected"';?>>Montant libre</option>
											<?php if($this->vars['Classe_Cotisation'] > 0){
												$montant_classe = lof::$listeValeurs['CLASSE_COTISATION_MONTANT'][$this->vars['Classe_Cotisation']];
												for($i = 1; $i <= 42; $i++){
													$selected = '';
													if(isset($this->vars['Nb_Annees_Rachat']) && $this->vars['Nb_Annees_Rachat'] == $i){
														$selected = 'selected="selected"';
													}
													if($i == 1)
														echo '<option value="' . $i . '" ' . $selected . '>' . $i . ' an  soit ' . str_replace(',', ' ', number_format($montant_classe * $i)) . '  &euro;</option>';
													else
														echo '<option value="' . $i . '" ' . $selected . '>' . $i . ' ans  soit ' . str_replace(',', ' ', number_format($montant_classe * $i)) . '  &euro;</option>';
												}
											}?>
											
										
										</select>	
									   </div>
                                    </div>
									
									
									<div id="montant_libre" class="form-group" style="<?php if($this->vars['Nb_Annees_Rachat'] != -1) echo "display:none"; ?>">
                                        <label class="col-md-5 control-label">Montant libre</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="Montant_Versement_Exceptionnel" value="<?php if (isset($this->vars['Montant_Versement_Exceptionnel'])) echo $this->vars['Montant_Versement_Exceptionnel']; ?>" >
                                        </div>
                                    </div>
									
									
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" style="">Bénéficiaire de la réversion en cas de décès</label>
                                        <div class="col-md-7">
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="radio" name="Reversion" value="1" <?php if((isset($this->vars['Reversion']) && ($this->vars['Reversion']))) {echo 'checked';} ?>> Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Reversion" value="0" <?php if((isset($this->vars['Reversion']) && (!$this->vars['Reversion'])) || !isset($this->vars['Reversion'])) {echo 'checked';} ?>> Non </label>
                                            </div>	
									   </div>
                                    </div>
									
									
									<div id="reversion" <?php if((isset($this->vars['Reversion']) && (!$this->vars['Reversion'])) || !isset($this->vars['Reversion'])) echo 'style="display:none"'; ?>>
										<div class="form-group">
                                        <label class="col-md-5 control-label">Conjoint</label>
                                            <div class="col-md-7">
                                                <div class="checkbox-list">
                                                    <label>
														<input type="hidden" name="Reversion_Conjoint" value="0" />
                                                        <input type="checkbox" name="Reversion_Conjoint" value="1"  <?php if(isset($this->vars['Reversion_Conjoint']) && ($this->vars['Reversion_Conjoint'])) {echo 'checked';} ?>> </label>
                                                </div>
                                            </div>
										</div>
									
									
									
									
									
									<div class="form-group">
                                        <label class="col-md-5 control-label">Nom</label>
                                        <div class="col-md-7">
                                            <input type="text" name="Reversion_Beneficiaire_Nom" class="form-control" value="<?php if (isset($this->vars['Reversion_Beneficiaire_Nom'])) echo $this->vars['Reversion_Beneficiaire_Nom']; ?>">
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-5 control-label">Prénom</label>
                                        <div class="col-md-7">
                                            <input type="text" name="Reversion_Beneficiaire_Prenom" class="form-control" value="<?php if (isset($this->vars['Reversion_Beneficiaire_Prenom'])) echo $this->vars['Reversion_Beneficiaire_Prenom']; ?>">
                                        </div>
                                    </div>
										
									<div class="form-group">
                                        <label class="col-md-5 control-label">Date de Naissance</label>
                                       
										
									<div class="col-md-7">

												<input name="Reversion_Beneficiaire_Date_Naissance" type="texte" class="form-control" value="<?php if (isset($this->vars['Reversion_Beneficiaire_Date_Naissance']) && $this->vars['Reversion_Beneficiaire_Date_Naissance'] <> '') echo lof::convertDateFromAdobeFormat($this->vars['Reversion_Beneficiaire_Date_Naissance']); ?>">
											</div>
											<!-- /input-group -->
										</div>
										
                                    </div>
									
                               </div>
								</div>
							</div>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>

			
			
			
			
			<div class="alert alert-danger display-hide"  style="text-align:center">
			<button class="close" data-close="alert"></button>
			<span>
			Un ou plusieurs champs sont manquants </span>
			</div>
			


			
			
			

		    <div class="row">
				<div class="col-md-6"  style="margin-bottom : 10px" align="left">
					&nbsp;
					<?php if(isset($_SESSION[$this->request->params[0].'_pre_aff_post'])) {?>
						<a target="_blank" href="<?php echo Router::url('recipient/imprimer_courrier_accompagnement/'. $this->request->params[0]);?>" class="btn btn-info">Courrier d'accompagnement</a>
					<?php }?>
				</div>

				<div class="col-md-6"  style="margin-bottom : 10px" align="right">
					<?php if(isset($_SESSION[$this->request->params[0].'_pre_aff_post'])) {?>
						<a href="<?php echo Router::url('recipient/pre_aff_unset/'. $this->request->params[0]);?>" class="btn btn-default">Précédent</a>
						<a href="<?php echo Router::url('recipient/add_event/'. $this->request->params[0]);?>" class="btn btn-success" style="text-align:right">Envoyer</a>
						<?php } else {?>
						<button class="btn btn-success valider_pre_aff" style="margin-bottom : 10px" type="submit">Valider</button>
					<?php } ?>
				</div>

			</div>

			
			
				

			
			</form>
            <!-- END PAGE CONTENT-->
			
			<div id="mail_missing" class="modal fade" data-keyboard="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Information</h4>
						</div>
						<div class="modal-body">
							<p>
								L'e-mail doit être renseigné ! 
							</p>
						</div>
						<div class="modal-footer">
							<button  data-dismiss="modal" class="btn btn-success">OK</button>
						</div>
					</div>
				</div>

			</div>
			

					<?php if(isset($_SESSION[$this->request->params[0].'_pre_aff_post'])){ ?>
					<div id="privisualiser_pdf" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Demande de confirmation</h4>
										</div>
										<div class="modal-body">
											<p>
												Voulez-vous prévisualiser le bulletin d'affiliation?
											</p>
										</div>
										<div class="modal-footer">
											<button type="button" data-dismiss="modal" class="btn btn-default">Non</button>
											<a target="_blank" href="<?php echo Router::url('recipient/pre_aff_pdf/'.$this->request->params[0]); ?>" class="btn btn-success" onclick="$('#privisualiser_pdf').modal('hide');">Oui</a>
										</div>
									</div>
								</div>
						</div>	
					<?php } ?>
        </div>




    </div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	                    