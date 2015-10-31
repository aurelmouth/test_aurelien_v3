<!-- BEGIN PAGE CONTENT -->
            <form id="recipient_form" class="login-form"  method="post" action="<?php
			$boutonValue="";
            if (isset($this->request->params[0]) && $this->vars['statut_particulier'] == 1){
                echo Router::url('recipient/fichierLoue/'.$this->request->params[0]);
				$boutonValue = "Sauvegarder";	
            }
            else if (isset($this->request->params[0]) && $this->vars['statut_particulier'] != 1){
                echo Router::url('recipient/edit/'.$this->request->params[0]);
				$boutonValue = "Sauvegarder";	
            }else{
                echo Router::url('recipient/edit/');
				$boutonValue = "Créer";
            } ?>" style="z-index:0;margin-top:10px; position:relative">
			
		   <div class="row">
				<div class="col-md-12" style="text-align:right; margin-bottom : 10px">
					<button class="btn btn-success valid" name="envoyer" type="submit"><?php echo $boutonValue ?></button>
					<?php if(isset($this->vars['statut_particulier']) && $this->vars['statut_particulier'] == 1) {?>
						<a name="convertir" href="<?php echo Router::url('recipient/conversion_prospect/'.$this->request->params[0]);?>" class="btn btn-info">Convertir en prospect</a>
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
								<i class="fa fa-arrows-alt"></i> Origine
							</div>
							<div class="tools">
								<a href="" class="collapse"></a>
							</div>
						</div>
						<div class="portlet-body col-md-12">
							<div class="form-horizontal  col-md-6" role="form">
								<div class="form-group">
									<label for="Origine" class="col-md-3 control-label">Origine<?php if(!isset($this->request->params[0])) {?><span style="font-size : 12px; color : red"> * </span><?php } ?></label>
									<div class="col-md-9">
										<select  name="ORIGINE_Id" class="form-control" <?php echo ((isset($this->vars['origine_id']) && $this->vars['origine_id'] == 117) || $_SESSION['conseillerEnLigne']['partenaires'] > 0 || ($_SESSION['conseillerEnLigne']['droits'] == 3 && isset($this->request->params[0]))) ? 'disabled="disabled"' : ''?>> 
											<option value=""></option>
											<?php foreach($_SESSION['origine'] as $cle => $valeur) {?>
											<option value="<?php echo $cle;?>" <?php if(isset($this->vars['origine_id']) && $this->vars['origine_id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
											<?php } ?>
										</select>
									</div>
									
									<?php if((isset($this->vars['origine_id']) && $this->vars['origine_id'] == 117) || $_SESSION['conseillerEnLigne']['partenaires'] > 0 || ($_SESSION['conseillerEnLigne']['droits'] == 3 && isset($this->request->params[0]))){?>
										<input type="hidden" name="ORIGINE_Id" value="<?php echo $this->vars['origine_id'];?>" />
									<?php } ?>
									
								</div>
                            </div>
							
                            <div class="form-horizontal col-md-6" role="form">
								<div class="form-group" >
									<label class="col-md-3 control-label" >Sous-Origine</label>
									<div class="col-md-9">
										<select name="SOUS_ORIGINE_Id" class="form-control" <?php echo ((isset($this->vars['origine_id']) && $this->vars['origine_id'] == 117) || $_SESSION['conseillerEnLigne']['partenaires'] > 0  || ($_SESSION['conseillerEnLigne']['droits'] == 3 && isset($this->request->params[0]))) ? 'disabled="disabled"' : ''?>>
											<option value=""></option>
											<?php foreach($_SESSION['sous_origine'] as $idorigine => $sousorigine) {
												if(isset($this->vars['origine_id']) && $this->vars['origine_id'] == $idorigine){
												 foreach($sousorigine as $cle => $valeur){
												?>
											<option value="<?php echo $cle;?>" <?php if(isset($this->vars['sous_origine_id']) && $this->vars['sous_origine_id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
											<?php }}} ?>
											
											<?php if(isset($_SESSION['sous_origine_all'][$this->vars['origine_id']][$this->vars['sous_origine_id']]) && !isset($_SESSION['sous_origine'][$this->vars['origine_id']][$this->vars['sous_origine_id']])) {?>
													<option value="<?php echo $this->vars['sous_origine_id'];?>" selected="selected"><?php echo $_SESSION['sous_origine_all'][$this->vars['origine_id']][$this->vars['sous_origine_id']];?></option>
											<?php } ?>
										</select>
									</div>
									<?php if((isset($this->vars['origine_id']) && $this->vars['origine_id'] == 117) || $_SESSION['conseillerEnLigne']['partenaires'] > 0  || ($_SESSION['conseillerEnLigne']['droits'] == 3 && isset($this->request->params[0]))){?>
										<input type="hidden" name="SOUS_ORIGINE_Id" value="<?php echo $this->vars['sous_origine_id'];?>" />
									<?php } ?>
									
								</div>
							</div>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>



		   
			<div class="row">
                <!-- BEGIN COL1 -->		
                <div class="col-md-6 ">			
                    <!-- BEGIN IDENTITE-->
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
								
								<?php if(isset($this->request->params[0])){?>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">N° Particulier</label>
                                        <div class="col-md-8">
                                            <input name="Num_Cotisant" type="text" class="form-control" value="<?php if (isset($this->request->params[0])) echo $this->request->params[0] ?>" readonly>
                                        </div>
                                    </div>
								<?php } ?>
								
                                    <div id="num_partenaire" class="form-group" <?php if((isset($this->vars['origine_id']) && $this->vars['origine_id'] != 117) || !isset($this->request->params[0])) echo 'style="display:none"';?>>
                                        <label class="col-md-4 control-label">N° Partenaire</label>
                                        <div class="col-md-8">
                                            <input name="Num_Partenaire" type="text" class="form-control" value="<?php if (isset($this->vars['num_partenaire']) && strlen($this->vars['num_partenaire']) > 0 && $this->vars['num_partenaire'] > 0) echo $this->vars['num_partenaire']; ?>">
                                        </div>
                                    </div>
									
									<?php if(isset($this->vars['num_cotisant']) && strlen($this->vars['num_cotisant'] && $this->vars['statut_particulier'] == "3")) {?>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">N° Cotisant CNP</label>
                                        <div class="col-md-8">
                                            <input name="Num_Cotisant" type="text" class="form-control" value="<?php if (isset($this->vars['num_cotisant'])) echo $this->vars['num_cotisant']; ?>" readonly>
                                        </div>
                                    </div>	
									<?php }?>							
				
									<?php if(isset($this->vars['num_allocataire']) && strlen($this->vars['num_allocataire']) > 0) {?>
									<div class="form-group">
                                        <label class="col-md-4 control-label">N° Allocataire CNP</label>
                                        <div class="col-md-8">
                                            <input name="Num_Allocataire" type="text" class="form-control" value="<?php if (isset($this->vars['num_allocataire'])) echo $this->vars['num_allocataire']; ?>" readonly>
                                        </div>
                                    </div>	
									<?php }?>
									
									<?php if(isset($this->vars['num_adherent']) && strlen($this->vars['num_adherent']) > 0) {?>
									<div class="form-group">
                                        <label class="col-md-4 control-label">N° Adhérent</label>
                                        <div class="col-md-8">
                                            <input name="Num_Adhrent" type="text" class="form-control" value="<?php echo $this->vars['num_adherent']; ?>" readonly>
                                        </div>
                                    </div>	
									<?php }?>
									
									<?php if (isset($this->vars['date_maj_adherent']) && strlen($this->vars['date_maj_adherent']) > 0) { ?> 
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Date maj adhérent CNP</label>
                                        <div class="col-md-8">
                                            <input type="text" name="date_maj_adherent" class="form-control" value="<?php echo lof::convertDateFromAdobeFormat($this->vars['date_maj_adherent']); ?>" readonly>
                                        </div>
                                    </div>
									<?php } ?>
									
									<?php if(!isset($this->request->params[0]) && $_SESSION['conseillerEnLigne']['partenaires'] > 0) {?>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">N° Partenaire</label>
                                        <div class="col-md-8">
                                            <input name="Num_Partenaire" type="text" class="form-control">
                                        </div>
                                    </div>
									<?php }?>
									
									<?php if(!isset($this->request->params[0]) && $_SESSION['conseillerEnLigne']['partenaires'] == 0) {?>
                                            <input name="Num_Partenaire" type="hidden" class="form-control" value="0">
									<?php }?>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Civilité</label>
                                        <div class="col-md-8">
											<select name="qualite_id" class="form-control" <?php if(isset($this->vars['num_cotisant']) && strlen($this->vars['num_cotisant'] && $this->vars['statut_particulier'] == "3")) echo 'disabled="disabled"';?>>
                                                <?php foreach($_SESSION['CIVILITE'] as $cle => $valeur) {?>
												<option value="<?php echo $cle;?>" <?php if(isset($this->vars['qualite_id']) && $this->vars['qualite_id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
												<?php } ?>
											</select>	
                                       </div>
                                    </div>
									
									<?php if(isset($this->vars['num_cotisant']) && strlen($this->vars['num_cotisant'] && $this->vars['statut_particulier'] == "3")){?>
											<input type="hidden" name="qualite_id" value="<?php echo $this->vars['qualite_id'];?>" />
									<?php } ?>
									
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Nom d'usage <?php if(!isset($this->vars['statut_particulier']) || $this->vars['statut_particulier'] != 1) {?>&nbsp;<span style="font-size : 12px; color : red"> * </span><?php } ?></label>
                                        <div class="col-md-8">
                                            <input type="text" name="sLastName" class="form-control" value="<?php if (isset($this->vars['lastName'])) echo $this->vars['lastName']; ?>"  <?php if(isset($this->vars['num_cotisant']) && strlen($this->vars['num_cotisant'] && $this->vars['statut_particulier'] == "3")) echo 'readonly';?>>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Nom de naissance</label>
                                        <div class="col-md-8">
                                            <input type="text" name="Nom_Naissance" class="form-control" value="<?php if (isset($this->vars['nom_naissance'])) echo $this->vars['nom_naissance']; ?>" <?php if(isset($this->vars['num_cotisant']) && strlen($this->vars['num_cotisant'] && $this->vars['statut_particulier'] == "3")) echo "readonly";?>>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Prénom<?php if(!isset($this->vars['statut_particulier']) || $this->vars['statut_particulier'] != 1) {?>&nbsp;<span style="font-size : 12px; color : red"> * </span><?php } ?></label>
                                        <div class="col-md-8">
                                            <input type="text" name="sFirstName" class="form-control" value="<?php if (isset($this->vars['firstName'])) echo $this->vars['firstName']; ?>" <?php if(isset($this->vars['num_cotisant']) && strlen($this->vars['num_cotisant'] && $this->vars['statut_particulier'] == "3")) echo "readonly";?>>
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


										<select class="form-control" name="SITUATION_FAMILIALE_Id" <?php if(isset($this->vars['num_cotisant']) && strlen($this->vars['num_cotisant'] && $this->vars['statut_particulier'] == "3")) echo 'disabled="disabled"';?>>
                                                <?php foreach($_SESSION['SITUATION_FAMILIALE'] as $cle => $valeur) {?>
												<option value="<?php echo $cle;?>" <?php if(isset($this->vars['situation_familiale_id']) && $this->vars['situation_familiale_id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
												<?php } ?>
										</select>

										
										</div>
											
                                    </div>
									
									<?php if(isset($this->vars['num_cotisant']) && strlen($this->vars['num_cotisant'] && $this->vars['statut_particulier'] == "3")){?>
											<input type="hidden" name="SITUATION_FAMILIALE_Id" value="<?php echo $this->vars['situation_familiale_id'];?>" />
									<?php } ?>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Date de Naissance<?php if(!isset($this->vars['statut_particulier']) || $this->vars['statut_particulier'] != 1) {?>&nbsp;<span style="font-size : 12px; color : red"> * </span><?php } ?></label>
                                       
										
									<div class="col-md-8">
												<input id="Date_Naissance" name="tsBirth" type="texte" class="form-control" value="<?php if (isset($this->vars['tsBirth']) && $this->vars['tsBirth'] <> '') echo lof::convertDateFromAdobeFormat($this->vars['tsBirth']); ?>" <?php if(isset($this->vars['num_cotisant']) && strlen($this->vars['num_cotisant'] && $this->vars['statut_particulier'] == "3")) echo "readonly";?>>
											<!-- /input-group -->
										</div>
										
                                    </div>
									
									<?php if (isset($this->vars['date_deces']) && strlen($this->vars['date_deces']) > 0) { ?> 
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Date de décés</label>
                                       
										
									<div class="col-md-8">
												<input id="Date_Naissance" name="tsBirth" type="texte" class="form-control" value="<?php echo lof::convertDateFromAdobeFormat($this->vars['date_deces']); ?>">
											<!-- /input-group -->
										</div>
										
                                    </div>
									<?php } ?>
									
									<div class="form-group">
                                        <label class="col-md-4 control-label">Département de naissance</label>
                                        <div class="col-md-8">
                                            <input type="text" name="Dept_Naissance" class="form-control" value="<?php if (isset($this->vars['dept_naissance'])) echo $this->vars['dept_naissance']; ?>" >
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-4 control-label">Ville de naissance</label>
                                        <div class="col-md-8">
                                            <input type="text" name="Ville_Naissance" class="form-control" value="<?php if (isset($this->vars['ville_naissance'])) echo $this->vars['ville_naissance']; ?>">
                                        </div>
                                    </div>
									
									
									
									
									
									
									<!-- Il faut peut être changer ceci, on verra -->
									
									
									
									
									
									
									<div class="form-group">
                                        <label class="col-md-4 control-label">Pays de naissance</label>
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
                                        <label class="col-md-4 control-label">VIP</label>
                                        <div class="col-md-8">
                                            <div class="radio-list">
												<input type="hidden" name="Code_VIP" value="0" />
                                                <label class="radio-inline">
                                                    <input type="radio" name="Code_VIP" value="1" <?php if(isset($this->vars['code_vip']) && $this->vars['code_vip'] == 1) {echo 'checked';} ?>> Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Code_VIP" value="0" <?php if(isset($this->vars['code_vip']) && $this->vars['code_vip'] == 2) {echo 'checked';} ?>> Non </label>
                                            </div>
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
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Filleuls</label>
                                        <div class="col-md-8">
                                            <textarea rows="4" type="text" name="Filleuls" class="form-control"><?php if(isset($this->vars['listeFilleuls'])) echo $this->vars['listeFilleuls'];?></textarea>
                                        </div>
                                    </div>
									
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END IDENTITE-->

                    <!-- BEGIN INFO AFFIL-->
                    <div class="portlet">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-bank"></i> Informations d'affiliation
                            </div>
                            <div class="tools">
                                <a href="" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">

                            <div class="form-horizontal" role="form">
                                <div class="form-body">

									
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Année d'entrée</label>

										<div class="col-md-8">
											<select  name="Annee_Entree_Corps" class="form-control">
												<option value="">Sélectionner</option>
												<?php for($x = (date('Y') - 40); $x <= date('Y'); $x++) {?>
												<option value="<?php echo $x;?>" <?php if(isset($this->vars['annee_entree_corps']) && $this->vars['annee_entree_corps'] == $x) echo 'selected="selected"'?>><?php echo $x?></option>
												<?php } ?>
											</select>	
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
                                        <label class="col-md-4 control-label">Statut à l'Affiliation</label>
                                        <div class="col-md-8">
											<select  name="STATUT_AFFILIATION_Id" class="form-control" <?php if(isset($this->vars['num_cotisant']) && strlen($this->vars['num_cotisant'] && $this->vars['statut_particulier'] == "3")) echo 'disabled="disabled"';?>> 
												<option value="">Sélectionner</option>
                                                <?php foreach($_SESSION['STATUT_AFFILIATION'] as $cle => $valeur) {?>
												<option value="<?php echo $cle;?>" <?php if(isset($this->vars['statut_affiliation_id']) && $this->vars['statut_affiliation_id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
												<?php } ?>
											</select>
									  </div>
                                    </div>
									
									<?php if(isset($this->vars['num_cotisant']) && strlen($this->vars['num_cotisant'] && $this->vars['statut_particulier'] == "3")){?>
											<input type="hidden" name="STATUT_AFFILIATION_Id" value="<?php echo $this->vars['statut_affiliation_id'];?>" />
									<?php } ?>
									
									
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

								<div id="autre_affiliation" <?php if(!isset($this->vars['statut_affiliation_id']) || ($this->vars['statut_affiliation_id'] != 6 )) echo 'style="display:none"' ?>>
									
									
									<div class="form-group">
                                        <label class="col-md-4 control-label">Saisissez</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="Libelle_Autre_Statut_Affiliation" value="<?php if (isset($this->vars['Libelle_Autre_Statut_Affiliation'])) echo $this->vars['Libelle_Autre_Statut_Affiliation']; ?>">
                                        </div>
                                    </div>	
								</div>			

									
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END INFO AFFIL-->

                    <!-- BEGIN PLACEMENT-->
                    <div class="portlet">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-eur"></i> Situation Patrimoniale
                            </div>
                            <div class="tools">
                                <a href="" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">

                            <div class="form-horizontal" role="form">
                                <div class="form-body">
								
								
									<div class="form-group">
                                        <label class="col-md-4 control-label">Statut d'occupation du logement</label>
                                        <div class="col-md-8">
                                            <div class="radio-list">
											
											<select  name="Occupation_Logement" class="form-control"> 
												<option value=""></option>
													<?php foreach(lof::$listeValeurs['OCCUPATION_LOGEMENT'] as $cle => $valeur) {?>
													<option value="<?php echo $cle;?>" <?php if(isset($this->vars['Occupation_Logement']) && $this->vars['Occupation_Logement'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
													<?php } ?>
											</select>
                                            </div>
                                        </div>
                                    </div>

												 
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Profession</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="Profession" value="<?php if (isset($this->vars['Profession'])) echo $this->vars['Profession']; ?>">
                                        </div>
                                    </div>
									
         
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Revenus annuels du foyer net</label>
                                        <div class="col-md-8">
											<select  name="Tranche_Revenu" class="form-control"> 
												<option value=""></option>
													<?php foreach(lof::$listeValeurs['TRANCHE_REVENU'] as $cle => $valeur) {?>
													<option value="<?php echo $cle;?>" <?php if(isset($this->vars['Tranche_Revenu']) && $this->vars['Tranche_Revenu'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
													<?php } ?>
											</select>
										</div>
                                    </div>
									
                                 	<div class="form-group">
                                        <label class="col-md-4 control-label">Impôt payé</label>
                                        <div class="col-md-8">
												<select class="form-control" name="impot_paye">
													<option value=""></option>
													<?php 
													foreach(lof::$listeValeurs['IMPOT_PAYE'] as $cle => $valeur){ ?>
														<option value="<?php echo $cle;?>" <?php if(isset($this->vars['impot_paye']) && $this->vars['impot_paye'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
													<?php } ?>
												</select>
										</div>
                                    </div>
									
                                 	<div class="form-group">
                                        <label class="col-md-4 control-label">Année d'imposition</label>
                                        <div class="col-md-8">
											<input type="text" class="form-control" name="annee_imposition" maxlength="4" value="<?php if (isset($this->vars['annee_imposition'])) echo $this->vars['annee_imposition']; ?>">
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Nombre d’enfants à charge dans le foyer</label>
                                        <div class="col-md-8">
											<select  name="Nombre_Enfants" class="form-control"> 
												<option value="" <?php if(isset($this->vars['Nombre_Enfants']) && $this->vars['Nombre_Enfants'] == "") echo 'selected="selected"';?>>Sélectionner</option>
													<?php foreach(lof::$listeValeurs['NOMBRE_ENFANTS'] as $cle => $valeur) {?>
													<option value="<?php echo $cle;?>" <?php if(isset($this->vars['Nombre_Enfants']) && $this->vars['Nombre_Enfants'] == $cle && strlen($this->vars['Nombre_Enfants']) > 0) echo 'selected="selected"'?>><?php echo $valeur?></option>
													<?php } ?>
											</select>
										</div>
									</div>

                                 	<div class="form-group">
                                        <label class="col-md-4 control-label">Capacité d'épargne mensuelle</label>
                                        <div class="col-md-8">
												<select class="form-control" name="capacite_epargne_mensuelle">
													<option value=""></option>
													<?php 
													foreach(lof::$listeValeurs['CAPACITE_EPARGNE_MENSUELLE'] as $cle => $valeur){ ?>
														<option value="<?php echo $cle;?>" <?php if(isset($this->vars['capacite_epargne_mensuelle']) && $this->vars['capacite_epargne_mensuelle'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
													<?php } ?>
												</select>
										</div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-4 control-label">Estimation  du patrimoine global du foyer</label>
                                        <div class="col-md-8">
												<select class="form-control" name="estimation_patrimoine_foyer">
													<option value=""></option>
													<?php 
													foreach(lof::$listeValeurs['ESTIMATION_PATRIMOINE'] as $cle => $valeur){ ?>
														<option value="<?php echo $cle;?>" <?php if(isset($this->vars['estimation_patrimoine_foyer']) && $this->vars['estimation_patrimoine_foyer'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
													<?php } ?>
												</select>
										</div>
                                    </div>
									
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PLACEMENT-->
					
					

					
					
					
					
					
                </div>
                <!-- END COL1 -->


                <!-- BEGIN COL2 -->
                <div class="col-md-6">
				
                    <!-- BEGIN ADRESSE-->
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
                                        <label class="col-md-4 control-label">Code Postal<?php if(!isset($this->vars['statut_particulier']) || $this->vars['statut_particulier'] != 1) {?>&nbsp;<span style="font-size : 12px; color : red"> * </span><?php } ?></label>
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
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Date de Modification</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="Date_Modification_Adresse" value="<?php if (isset($this->vars['lastModifiedAdr'])) echo lof::convertDateFromAdobeFormat($this->vars['lastModifiedAdr']); ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END ADRESSE-->


                    <!-- BEGIN TEL EMAIL-->
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
                                        <label class="col-md-6 control-label">Téléphone Fixe</label>
                                        <div class="col-md-6">
                                            <input id="sPhone" type="text" name="sPhone" class="form-control" value="<?php if (isset($this->vars['sphone'])) echo $this->vars['sphone']; ?>">
											<label id="resultPhone">&nbsp;</label>
										</div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-6 control-label">Téléphone Fixe Professionnel</label>
                                        <div class="col-md-6">
                                            <input id="tel_fixe_pro" type="text" name="tel_fixe_pro" class="form-control" value="<?php if (isset($this->vars['tel_fixe_pro'])) echo $this->vars['tel_fixe_pro']; ?>">
											<label id="resultPhonePro">&nbsp;</label>
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Téléphone Mobile</label>
                                        <div class="col-md-6">
                                            <input id="sMobilePhone" type="text" name="sMobilePhone" class="form-control" value="<?php if (isset($this->vars['smobilephone'])) echo $this->vars['smobilephone']; ?>">
											<label id="resultMobile">&nbsp;</label>
										</div>
                                    </div>

									<div class="form-group">
                                        <label class="col-md-6 control-label">Plage horaire préférée</label>
                                        <div class="col-md-6">
												<select class="form-control" name="plage_horaire_preferee">
													<option value="0"></option>
													<?php 
													foreach(lof::$listeValeurs['PLAGE_HORAIRE'] as $cle => $valeur){ ?>
														<option value="<?php echo $cle;?>" <?php if(isset($this->vars['plage_horaire_preferee']) && $this->vars['plage_horaire_preferee'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
													<?php } ?>
												</select>
											<label>&nbsp;</label>
										</div>
                                    </div>
									
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Email</label>
                                        <div class="col-md-6" style="text-align:left">
                                            <input id="sEmail" type="text" name="sEmail" class="form-control" value="<?php if (isset($this->vars['semail'])) echo $this->vars['semail']; ?>">
                                            <label id="resultMail">&nbsp;</label>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-6 control-label">Email professionnel</label>
                                        <div class="col-md-6" style="text-align:left">
                                            <input id="email_pro" type="text" name="email_pro" class="form-control" value="<?php if (isset($this->vars['email_pro'])) echo $this->vars['email_pro']; ?>">
                                            <label id="resultMailPro">&nbsp;</label>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Date de modification</label>
                                        <div class="col-md-6" style="text-align:left">
                                            <input type="text" name="date_modif_section_tel_email" class="form-control" value="<?php if (isset($this->vars['date_modif_section_tel_email'])) echo lof::convertDateFromAdobeFormat($this->vars['date_modif_section_tel_email']); ?>" readonly>
                                        </div>
                                    </div>
									
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END TEL EMAIL-->

                    <!-- BEGIN OPTIN-->
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
									
									<div class="form-group">
                                        <label class="col-md-6 control-label">Date de modification</label>
                                        <div class="col-md-6" style="text-align:left">
                                            <input type="text" name="date_modif_section_optin" class="form-control" value="<?php if (isset($this->vars['date_modif_section_optin'])) echo lof::convertDateFromAdobeFormat($this->vars['date_modif_section_optin']); ?>" readonly>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OPTIN-->
					
 <!-- BEGIN TEL EMAIL-->
                    <div class="portlet">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-envelope"></i> Produits détenus
                            </div>
                            <div class="tools">
                                <a href="" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">

                            <div class="form-horizontal" role="form">
                                <div class="form-body">
                                    
									<div class="form-group">
                                        <label class="col-md-4 control-label">Immobilier locatif</label>
                                        <div class="col-md-8">
                                            <div class="radio-list">
												<input type="hidden" name="Proprietaire_Locatif" value="0" />
                                                <label class="radio-inline">
                                                    <input type="radio" name="Proprietaire_Locatif" value="1" <?php if(isset($this->vars['Proprietaire_Locatif']) && $this->vars['Proprietaire_Locatif'] == 1) {echo 'checked';} ?>> Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Proprietaire_Locatif" value="2" <?php if(isset($this->vars['Proprietaire_Locatif']) && $this->vars['Proprietaire_Locatif'] == 2) {echo 'checked';} ?>> Non </label>
                                            </div>
                                        </div>
                                    </div>
									
									
									<div class="form-group">
                                        <label class="col-md-4 control-label">Assurance vie</label>
                                        <div class="col-md-8">
                                            <div class="radio-list">
											<input type="hidden" name="Placement_Assurance_Vie" value="0" />
                                                <label class="radio-inline">
                                                    <input type="radio" name="Placement_Assurance_Vie" value="1" <?php if(isset($this->vars['Placement_Assurance_Vie']) && $this->vars['Placement_Assurance_Vie'] == 1) {echo 'checked';} ?>> Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Placement_Assurance_Vie" value="2" <?php if(isset($this->vars['Placement_Assurance_Vie']) && $this->vars['Placement_Assurance_Vie'] == 2)  {echo 'checked';} ?>> Non </label>
											</div>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">PERP</label>
                                        <div class="col-md-8">
                                            <div class="radio-list">
												<input type="hidden" name="Placement_PERP" value="0" />
                                                <label class="radio-inline">
                                                    <input type="radio" name="Placement_PERP" value="1" <?php if(isset($this->vars['Placement_PERP']) && $this->vars['Placement_PERP'] == 1) {echo 'checked';} ?>> Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Placement_PERP" value="2" <?php if(isset($this->vars['Placement_PERP']) && $this->vars['Placement_PERP'] == 2)  {echo 'checked';} ?> > Non </label>
                                            </div>
                                        </div>
                                    </div>
									
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Compte-titre ou PEA</label>
                                        <div class="col-md-8">
                                            <div class="radio-list">
												<input type="hidden" name="Placement_Compte_Titre" value="0" />
                                                <label class="radio-inline">
                                                    <input type="radio" name="Placement_Compte_Titre" value="1" <?php if(isset($this->vars['Placement_Compte_Titre']) && $this->vars['Placement_Compte_Titre'] == 1) {echo 'checked';} ?>> Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Placement_Compte_Titre" value="2" <?php if(isset($this->vars['Placement_Compte_Titre']) && $this->vars['Placement_Compte_Titre'] == 2)  {echo 'checked';} ?>> Non </label>
                                            </div>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Livret ou Autre</label>
                                        <div class="col-md-8">
                                            <div class="radio-list">
											<input type="hidden" name="Placement_Autre" value="0" />
                                                <label class="radio-inline">
                                                    <input type="radio" name="Placement_Autre" value="1" <?php if(isset($this->vars['placement_autre']) && $this->vars['placement_autre'] == 1) {echo 'checked';} ?>> Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Placement_Autre" value="2" <?php if(isset($this->vars['placement_autre']) && $this->vars['placement_autre'] == 2)  {echo 'checked';} ?>> Non </label>
                                            </div>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Précisez</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="Libelle_Placement_Autre" value="<?php if (isset($this->vars['Libelle_Placement_Autre'])) echo $this->vars['Libelle_Placement_Autre']; ?>" <?php if(!isset($this->vars['placement_autre']) || !($this->vars['placement_autre']))  {echo 'readonly';} ?>>
                                        </div>
                                    </div>
									
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END TEL EMAIL-->

					

                </div>
                <!-- END COL2 -->
            </div>
			
			<div class="alert alert-danger display-hide"  style="text-align:center">
			<button class="close" data-close="alert"></button>
			<span>
			Un ou plusieurs champs sont manquants </span>
			</div>
						

			
		   <div class="row">
				<div class="col-md-12" style="text-align:right; margin-bottom : 10px">
					<button class="btn btn-success valid" type="submit" name="envoyer"><?php echo $boutonValue ?></button>
					<?php if(isset($this->vars['statut_particulier']) && $this->vars['statut_particulier'] == 1) {?>
						<a name="convertir" href="<?php echo Router::url('recipient/conversion_prospect/'.$this->request->params[0]);?>" class="btn btn-info">Convertir en prospect</a>
					<?php } ?>
				</div>
			</div>
				
			</form>
            <!-- END PAGE CONTENT-->

        </div>




    </div>
    <!-- END PAGE CONTENT-->

			<div class="modal fade" id="test" tabindex="-1" role="basic" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Fiche particulier non sauvegardée</h4>
						</div>
						<div class="modal-body">
							Voulez-vous vraiment quitter sans sauvegarder ?
						</div>
						<div class="modal-footer">
							<a id="test_modal_continuer" href="" class="btn btn-info">Continuer sans sauvegarder</a>
							<button id="test_modal_sauvegarder" type="button" class="btn btn-success">Sauvegarder</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
	
	
			<div class="modal fade" id="attention" tabindex="-1" role="basic" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Fiche particulier non sauvgardée</h4>
						</div>
						<div class="modal-body">
							Vous devez sauvegarder la fiche particulier avant de le convertir en proscpect
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			
			
			<div class="modal fade" id="dqe" tabindex="-1" role="basic" aria-hidden="true">
				<div class="modal-dialog" style="width:900px; margin:auto">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Veuillez trouver ci-dessous la liste des personnes portant les mêmes nom et prénom. </h4>
						</div>
						<div class="modal-body">
							<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="table_dqe">
						<thead>
							<tr>
								<th>Statut</th>
								<th>Numéro</th>
								<th>Nom</th>
								<th>Prénom</th>
								<th>Date de naissance</th>
								<th>Adresse</th>
								<th>Créé le</th>
								<th></th>
							</tr>
							
						</thead>
						<tbody>

						</tbody>
					</table>
					<div class="row"></div>
					</div>		
						</div>
						<p>&nbsp;&nbsp;&nbsp;Si la personne à affilier ne fait pas partie de cette liste, vous pouvez directement Créer la fiche. Pour revenir à la saisie, vous pouvez Annuler </p>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
							<button id="continuer_dqe" type="button" class="btn btn-success">Continuer et créer</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
	