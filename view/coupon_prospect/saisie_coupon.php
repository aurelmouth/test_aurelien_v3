<div class="content3">
			<?php if(isset($this->request->params[0])) {?>
			<h3 class="page-title">
                <?php 
				$civilite = isset($_SESSION['CIVILITE'][$this->vars['qualite_id']]) ? strtoupper($_SESSION['CIVILITE'][$this->vars['qualite_id']]) : '' ;

				echo $civilite . ' ' .$this->vars['firstName'] . ' ' . $this->vars['lastName'] . ' I Prospect';
				?>
            </h3>	
			<?php } ?>
			
			<form class="login-form" method="post" action="<?php 
			if(isset($this->request->params[0]))
				echo Router::url('coupon_prospect/saisie_coupon/' . $this->request->params[0]); 
			else
				echo Router::url('coupon_prospect/saisie_coupon'); 
			?>"style="z-index:0;margin-top:10px; position:relative">
		
		
		   <div class="row">
				<div class="col-md-12" style="text-align:right" ><button class="btn btn-success" style="margin-bottom : 10px" type="submit">Valider</button></div>
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
								<i class="fa fa-arrows-alt"></i> Origine
							</div>
							<div class="tools">
								<a href="" class="collapse"></a>
							</div>
						</div>
						<div class="portlet-body col-md-12">
							<div class="form-horizontal  col-md-6" role="form">
								<div class="form-group">
									<label for="Origine" class="col-md-3 control-label">Origine<?php if(!isset($_SESSION['statut_particulier']) || $_SESSION['statut_particulier'] != 1) {?><span style="font-size : 12px; color : red"> * </span><?php } ?></label>
									<div class="col-md-9">
										<select  name="ORIGINE_Id" class="form-control"> 
											<option value=""></option>
											<?php foreach($_SESSION['origine'] as $cle => $valeur) {?>
											<option value="<?php echo $cle;?>" <?php if(isset($this->vars['origine_id']) && $this->vars['origine_id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
											<?php } ?>
										</select>
									</div>
								</div>
                            </div>
							
                            <div class="form-horizontal col-md-6" role="form">
								<div class="form-group" >
									<label class="col-md-3 control-label" >Sous-Origine</label>
									<div class="col-md-9">
										<select name="SOUS_ORIGINE_Id" class="form-control">
											<option value="0"></option>
											<?php foreach($_SESSION['sous_origine'] as $idorigine => $sousorigine) {
												if(isset($this->vars['origine_id']) && $this->vars['origine_id'] == $idorigine){
												 foreach($sousorigine as $cle => $valeur){
												?>
											<option value="<?php echo $cle;?>" <?php if(isset($this->vars['sous_origine_id']) && $this->vars['sous_origine_id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
											<?php }}} ?>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>

			
    <!-- END SEARCH FORM -->
			<div class="row">
                <!-- BEGIN COL1 -->		
                <div class="col-md-6 ">	
				                    <div class="portlet">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-group"></i> Identité
                            </div>
                            <div class="tools">
                                <a href="" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">

                            <div class="form-horizontal" role="form">
                                <div class="form-body">
								
									<?php if(isset($this->request->params[0])) {?>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">N° Particulier</label>
                                        <div class="col-md-8">
                                            <input name="Num_Cotisant" type="text" class="form-control" value="<?php if (isset($this->request->params[0])) echo $this->request->params[0] ?>" readonly>
                                        </div>
                                    </div>
									<?php }?>
									
									<?php if(isset($this->vars['num_partenaire']) && strlen($this->vars['num_partenaire']) > 0) {?>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">N° Partenaire</label>
                                        <div class="col-md-8">
                                            <input name="Num_Partenaire" type="text" class="form-control" value="<?php if (isset($this->vars['num_partenaire'])) echo $this->vars['num_partenaire']; ?>" readonly>
                                        </div>
                                    </div>
									<?php }?>
									
		
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Civilité</label>
                                        <div class="col-md-8">
											<select name="qualite_id" class="form-control" <?php if(isset($this->vars['num_cotisant']) && strlen($this->vars['num_cotisant'] && $_SESSION['statut_particulier'] == "3")) echo 'disabled="disabled"';?>>
                                                <?php foreach($_SESSION['CIVILITE'] as $cle => $valeur) {?>
												<option value="<?php echo $cle;?>" <?php if(isset($this->vars['qualite_id']) && $this->vars['qualite_id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
												<?php } ?>
											</select>	
                                       </div>
                                    </div>
									
									
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Nom d'usage <?php if(!isset($_SESSION['statut_particulier']) || $_SESSION['statut_particulier'] != 1) {?>&nbsp;<span style="font-size : 12px; color : red"> * </span><?php } ?></label>
                                        <div class="col-md-8">
                                            <input type="text" name="sLastName" class="form-control" value="<?php if (isset($this->vars['lastName'])) echo $this->vars['lastName']; ?>"  <?php if(isset($this->vars['num_cotisant']) && strlen($this->vars['num_cotisant'] && $_SESSION['statut_particulier'] == "3")) echo 'readonly';?>>
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
                                        <label class="col-md-4 control-label">Date de Naissance<?php if(!isset($_SESSION['statut_particulier']) || $_SESSION['statut_particulier'] != 1) {?>&nbsp;<span style="font-size : 12px; color : red"> * </span><?php } ?></label>
                                       
										
									<div class="col-md-8">
												<input id="Date_Naissance" name="tsBirth" type="texte" class="form-control" value="<?php if (isset($this->vars['tsBirth']) && $this->vars['tsBirth'] <> '') echo lof::convertDateFromAdobeFormat($this->vars['tsBirth']); ?>" <?php if(isset($this->vars['num_cotisant']) && strlen($this->vars['num_cotisant'] && $_SESSION['statut_particulier'] == "3")) echo "readonly";?>>
											<!-- /input-group -->
										</div>
										
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-4 control-label">N° Sécurité Sociale</label>
                                        <div class="col-md-8">
                                            <input type="text" name="Num_INSEE" maxlength="13" class="form-control" value="<?php if (isset($this->vars['num_insee'])) echo $this->vars['num_insee']; ?>" <?php if(isset($this->vars['num_cotisant']) && strlen($this->vars['num_cotisant'] && $_SESSION['statut_particulier'] == "3")) echo "readonly";?>>
                                        </div>
                                    </div>
									
									

									
                                </div>
                            </div>
                        </div>
                    </div>
				
				     <div class="portlet" id="tel_email_block">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-envelope"></i> Téléphone & Email
                            </div>
                            <div class="tools">
                                <a href="" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">

                            <div class="form-horizontal" role="form">
                                <div class="form-body">
                                    
									<select style="display:none" id="dqe_pays"><option value="FRA" selected="selected">FRA</option></select>
									
				                    <div class="form-group">
                                        <label class="col-md-4 control-label">Téléphone Fixe</label>
                                        <div class="col-md-8">
                                            <input id="sPhone" type="text" name="sPhone" class="form-control" value="<?php if (isset($this->vars['sphone'])) echo $this->vars['sphone']; ?>">
											<label id="resultPhone">&nbsp;</label>
										</div>
                                    </div>
									
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Téléphone Mobile</label>
                                        <div class="col-md-8">
                                            <input id="sMobilePhone" type="text" name="sMobilePhone" class="form-control" value="<?php if (isset($this->vars['smobilephone'])) echo $this->vars['smobilephone']; ?>">
											<label id="resultMobile">&nbsp;</label>
										</div>
                                    </div>

									
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Email</label>
                                        <div class="col-md-8" style="text-align:left">
                                            <input id="sEmail" type="text" name="sEmail" class="form-control" value="<?php if (isset($this->vars['semail'])) echo $this->vars['semail']; ?>">
                                            <label id="resultMail">&nbsp;</label>
                                        </div>
                                    </div>
									
									
                                </div>
                            </div>
                        </div>
                    </div>
					
				     <div class="portlet" id="Parrain_block">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-envelope"></i> Parrain
                            </div>
                            <div class="tools">
                                <a href="" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
									<div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Parrain</label>
                                        <div class="col-md-8">
											<?php 
											$civilite_parrain = (isset($this->vars['qualite_id_parrain']) && $this->vars['qualite_id_parrain'] > 0 && $this->vars['qualite_id_parrain'] <= 2) ? (strtoupper($_SESSION['CIVILITE'][$this->vars['qualite_id_parrain']])) . ' ' : ('');
											?>
                                            <input style="cursor:pointer" type="text" onclick="ouvrir_fiche_parrain()" id="Parrain" class="form-control" value="<?php if (isset($this->vars['lastName_parrain']) && isset($this->vars['firstName_parrain']) && isset($this->vars['id_parrain']) && $this->vars['id_parrain'] > 0 ) echo $civilite_parrain . $this->vars['firstName_parrain'] . ' ' . $this->vars['lastName_parrain'] . ' | ' . $_SESSION['STATUT_PARTICULIER'][$this->vars['statut_particulier_parrain']] . ' n° ' . $this->vars['id_parrain']; ?>" readonly>
                                            <input type="hidden" name="Id_Parrain" value="<?php if (isset($this->vars['id_parrain'])) echo $this->vars['id_parrain']; ?>">
                                        </div>
										<div class="col-md-4">&nbsp;</div>
										<label class="col-md-6 control-label" style="text-align:left; font-size:0.9em"><a style="cursor:pointer" onclick="recherche_particulier_parrain();">Rechercher</a> | <a style="cursor:pointer" onclick="supprimer_particulier_parrain();">Supprimer</a></label>
										
                                    </div>
                                    </div>
                        </div>
                    </div>
					
					
				
				</div>
				
				
				<div class="col-md-6 ">
                    <div class="portlet" id="adresse_block">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-map-marker"></i> Adresse
                            </div>
                            <div class="tools">
                                <a href="" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">

                            <div class="form-horizontal" role="form">
                                <div class="form-body">
									
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
                                        <label class="col-md-4 control-label">Code Postal<?php if(!isset($_SESSION['statut_particulier']) || $_SESSION['statut_particulier'] != 1) {?>&nbsp;<span style="font-size : 12px; color : red"> * </span><?php } ?></label>
                                        <div class="col-md-8">
                                            <input id="CP" type="text" class="form-control" name="Code_Postal" pattern="[0-9]{5}" value="<?php if (isset($this->vars['code_postal'])) echo $this->vars['code_postal']; ?>">
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
									
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">PND</label>
                                        <div class="col-md-8">
                                            <div class="radio-list">
											<input type="hidden" name="Adresse_PND_O_N" value="<?php if(isset($this->vars['adresse_pnd_o_n']) ) echo $this->vars['adresse_pnd_o_n']; ?>" />
                                                <label class="radio-inline">
                                                    <input type="radio" name="Adresse_PND_O_N" value="1" <?php if(isset($this->vars['adresse_pnd_o_n']) && ($this->vars['adresse_pnd_o_n'])) {echo 'checked';} ?> disabled="disabled"> Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Adresse_PND_O_N" value="0" <?php if(isset($this->vars['adresse_pnd_o_n']) && (!$this->vars['adresse_pnd_o_n'])) {echo 'checked';} ?> disabled="disabled"> Non </label>
                                            </div>

                                        </div>
                                    </div>
									
									<?php if(isset($this->vars['adresse_pnd_o_n']) && $this->vars['adresse_pnd_o_n'] && isset($this->vars['date_retour_pnd']) && strlen($this->vars['adresse_pnd_o_n']) > 0){ ?>
									<div class="form-group">
                                        <label class="col-md-4 control-label">Date Retour PND</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="date_retour_pnd" value="<?php echo lof::convertDateFromAdobeFormat($this->vars['date_retour_pnd']); ?>" disabled="disabled">
                                        </div>
                                    </div>
									<?php } ?>
									
                                </div>
                            </div>
                        </div>
                    </div>
					
                    <div class="portlet" id="optin_block">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-check"></i> Opt-in
                            </div>
                            <div class="tools">
                                <a href="" class="collapse"></a>
                            </div>
                        </div>
                        
						<div id="optin" class="portlet-body form">

                            <div class="form-horizontal" role="form">
                                <div class="form-body">
								
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
				
				</div>
				
			</div>
			
			
		 	<div class="row ">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet col-md-12">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-bar-chart"></i> Je souhaite
							</div>
							<div class="tools">
								<a href="" class="collapse"></a>
							</div>
						</div>
						<div class="portlet-body col-md-12">
						
							<div class="col-md-12">
								<div class="form-group">
									<label for="" class="col-md-10 control-label">Je souhaite aussi qu’un Conseiller expert Préfon-Retraite me rappelle gratuitement et sans engagement de ma part</label>
									<div class="col-md-2">
                                            <div class="col-md-4">
                                                <div class="checkbox-list">
                                                    <label>
														<input type="hidden" name="rappel" value="0" />
                                                        <input type="checkbox" name="rappel" value="1"> </label>
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
			
			
			<div class="row">
				<div class="col-md-12" style="text-align:right" ><button class="btn btn-success" style="margin-bottom : 10px" type="submit">Valider</button></div>
			</div>
		</form>
		
		
		<?php if(isset($_SESSION['event_added'])){?>
			<div id="event_added" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Information</h4>
						</div>
						<div class="modal-body">
							<p>
								L'évènement a été ajouté pour le particulier n° <?php echo $this->request->params[0];?>. 
							</p>
						</div>
						<div class="modal-footer">
							<a type="button"  href="<?php echo Router::url('coupon_prospect/search'); ?>" class="btn btn-success">OK</a>
						</div>
					</div>
				</div>

			</div>
			<?php } ?>
		
		
		<?php if(isset($_SESSION['created'])){?>
			<div id="created" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Information</h4>
						</div>
						<div class="modal-body">
							<p>
								Le particulier n° <?php echo $this->request->params[0];?> a été créé et l'évènement Coupon ajouté 
							</p>
						</div>
						<div class="modal-footer">
							<a type="button"  href="<?php echo Router::url('coupon_prospect/search'); ?>" class="btn btn-success">OK</a>
						</div>
					</div>
				</div>

			</div>
			<?php } ?>
			
		<?php if(isset($_SESSION['converted'])){?>
			<div id="converted" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Information</h4>
						</div>
						<div class="modal-body">
							<p>
								Le particulier n° <?php echo $this->request->params[0];?> a été converti en prospect et l'évènement Coupon ajouté 
							</p>
						</div>
						<div class="modal-footer">
							<a type="button"  href="<?php echo Router::url('coupon_prospect/search'); ?>" class="btn btn-success">OK</a>
						</div>
					</div>
				</div>

			</div>
			<?php } ?>
		
		
</div>
    <!-- END PAGE CONTENT-->
