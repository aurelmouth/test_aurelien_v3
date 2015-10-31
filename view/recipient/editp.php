

<!-- BEGIN CONTENT -->

    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

            <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

            <!-- BEGIN PAGE HEADER-->
			<div>
			<h3 class="page-title">
                Romain Collet  I Prospect <small>I Créée le 07/08/2013 Par TC Muller François Xavier, Modifiée le 18/04/2015</small>
            </h3>
			
			</div>
			
            <div class="page-bar" style="z-index:0;margin-top:10px; position:relative">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="<?php echo serveur_url.DS ?>search/search">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Fiche Particulier</a>
                    </li>
                </ul>
			
            
			</div>
			
            <!-- END PAGE HEADER-->

            <!-- BEGIN PAGE CONTENT -->
			

				<div class="alert alert-dismissable alert-success col-md-12">
					<?php if($_SESSION['id'] == 1) {?>
					<div class="col-md-3">
					<span class="label label-sm label-icon label-warning">
						<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
					</span>&nbsp; &nbsp; <span style="color:black">Changement de classe</span><br/><br/>
					</div>


					<div class="col-md-2"><span class="label label-sm label-icon label-warning">
									<i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
									</span><span style="color:black">&nbsp; &nbsp;Rachat</span><br/><br/></div>
									
							<div class="col-md-2" style="color:black"><span ><i class="fa fa-map-marker" ></i> &nbsp;<span>Ile de France</span></span><br/><br/></div>
							<div class="col-md-2" style="color:black"><span><i class="fa fa-dot-circle-o"></i> &nbsp;<span>Points à date : 1589</span></span><br/><br/></div>
							<div class="col-md-3" style="color:black"><span><i class="fa fa-line-chart"></i> &nbsp;<span>Projection points à 65 ans : 11589</span></span><br/><br/></div>
									<?php }?>
							<div class="col-md-12" style="color:black"><i class="fa fa-calendar"></i>&nbsp; &nbsp;Demande de doucmentation - Préfon retraite - lundi 6 avril 2015</span></div>
                            <div class="col-md-12" style="color:black"><i class="fa fa-calendar"></i>&nbsp; &nbsp;Simulation - Préfon Retraite -  lundi 20 avril 2015</span></div>

				</div>



			
            <form class="login-form" method="post" action="<?php echo serveur_url.DS ?>recipient/test" style="z-index:0;margin-top:10px; position:relative" readonly>

		   
			<div class="row">
				<div class="col-md-12" style="text-align:right" ><button id="valid" class="btn btn-success" style="margin-bottom : 10px" type="submit">Sauvegarder</button></div>
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
									<label for="Origine" class="col-md-3 control-label">Origine<span style="font-size : 12px; color : red"> * </span></label>
									<div class="col-md-9">
										<select  name="ORIGINE_Id" class="form-control"> 
											<?php foreach(lof::$listeValeurs['ORIGINE'] as $cle => $valeur) {?>
											<option value="<?php echo $cle;?>" <?php if(isset($this->vars['ORIGINE_Id']) && $this->vars['ORIGINE_Id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
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
											<option value="" placeholder="Selectionner une option"></option>
											<option value="Option 1"> Option 1</option>
											<option value="Option 2"> Option 2</option>
											<option value="Option 3"> Option 3</option>
										</select>
									</div>
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
								
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">N° Cotisant CNP</label>
                                        <div class="col-md-8">
                                            <input name="Num_Cotisant" type="text" class="form-control" value="<?php if (isset($this->vars['Num_Cotisant'])) echo $this->vars['Num_Cotisant'] ?>" readonly>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">N° Partenaire</label>
                                        <div class="col-md-8">
                                            <input name="Num_Partenaire" type="text" class="form-control" value="<?php if (isset($this->vars['Num_Partenaire'])) echo $this->vars['Num_Partenaire']; ?>" readonly>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Modifié le</label>
                                        <div class="col-md-8">
                                            <input type="text" name="Date_Modification" class="form-control" value="<?php if (isset($this->vars['Date_Modification'])) echo $this->vars['Date_Modification']; ?>" readonly>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Civilité</label>
                                        <div class="col-md-8">
											<select name="QUALITE_IdQualite" class="form-control">
												<option value=""></option>
												<?php foreach(lof::$listeValeurs['CIVILITE'] as $cle => $valeur) {?>
												<option value="<?php echo $cle;?>" <?php if(isset($this->vars['QUALITE_IdQualite']) && $this->vars['QUALITE_IdQualite'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
												<?php } ?>
											</select>	
                                       </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Nom d'usage &nbsp;<span style="font-size : 12px; color : red"> * </span></label>
                                        <div class="col-md-8">
                                            <input type="text" name="sLastName" class="form-control" value="<?php if (isset($this->vars['sLastName'])) echo $this->vars['sLastName']; ?>" required>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Nom de naissance</label>
                                        <div class="col-md-8">
                                            <input type="text" name="Nom_Naissance" class="form-control" value="<?php if (isset($this->vars['Nom_Naissance'])) echo $this->vars['Nom_Naissance']; ?>">
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Prénom&nbsp;<span style="font-size : 12px; color : red"> * </span></label>
                                        <div class="col-md-8">
                                            <input type="text" name="sFirstName" class="form-control" value="<?php if (isset($this->vars['sFirstName'])) echo $this->vars['sFirstName']; ?>" required>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-4 control-label">N° Sécurité Sociale</label>
                                        <div class="col-md-8">
                                            <input type="text" name="Num_INSEE" maxlength="14" class="form-control" value="<?php if (isset($this->vars['Num_INSEE'])) echo $this->vars['Num_INSEE']; ?>">
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Situation Familiale</label>
                                        <div class="col-md-8">


										<select class="form-control" name="SITUATION_FAMILIALE_Id">
												<option value=""></option>
												<?php foreach(lof::$listeValeurs['SITUATION_FAMILIALE'] as $cle => $valeur) {?>
												<option value="<?php echo $cle;?>" <?php if(isset($this->vars['SITUATION_FAMILIALE_Id']) && $this->vars['SITUATION_FAMILIALE_Id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
												<?php } ?>
										</select>

										
										</div>
											
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Date de Naissance&nbsp;<span style="font-size : 12px; color : red"> * </span></label>
                                       
										
									<div class="col-md-8">
											<div class="input-group date date-picker">
												<input id="Date_Naissance" name="Date_Naissance" type="texte" class="form-control">
												<span class="input-group-btn">
												<button id="Bouton_Naissance" name="Bouton_Naissance" class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
											<!-- /input-group -->
										</div>
										
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-4 control-label">Département Naissance</label>
                                        <div class="col-md-8">
                                            <input type="text" name="Dept_Naissance" class="form-control" value="<?php if (isset($this->vars['Dept_Naissance'])) echo $this->vars['Dept_Naissance']; ?>" >
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-4 control-label">Ville Naissance</label>
                                        <div class="col-md-8">
                                            <input type="text" name="Ville_Naissance" class="form-control" value="<?php if (isset($this->vars['Ville_Naissance'])) echo $this->vars['Ville_Naissance']; ?>"">
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
														<option value="<?php echo $cle;?>" <?php if(isset($this->vars['Pays_Naissance']) && $this->vars['Pays_Naissance'] == $valeur) echo 'selected="selected"'?>><?php echo $valeur?></option>
														<?php } ?>
											</select>	
                                        </div>
                                    </div>

									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">VIP</label>
                                        <div class="col-md-8">
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="radio" name="Code_VIP" value="Oui" checked> Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Code_VIP" value="Non"> Non </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Conjoint</label>
                                        <div class="col-md-5">
                                            <input type="text" id="Conjoint" class="form-control" value="<?php if (isset($this->vars['Conjoint'])) echo $this->vars['Conjoint']; ?>" readonly>
                                            <input type="hidden" name="Id_Conjoint" value="<?php if (isset($this->vars['Id_Conjoint'])) echo $this->vars['Id_Conjoint']; ?>">
                                        </div>
										
										<a class="col-md-3 control-label" style="text-align:left" onclick="recherche_particulier_conjoint();">Rechercher</a>
										
                                    </div>									

									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Parrain</label>
                                        <div class="col-md-5">
                                            <input type="text" id="Parrain" class="form-control" value="<?php if (isset($this->vars['Parrain'])) echo $this->vars['Parrain']; ?>" readonly>
                                            <input type="hidden" name="Id_Parrain" value="<?php if (isset($this->vars['Id_Parrain'])) echo $this->vars['Id_Parrain']; ?>">
                                        </div>
										
										<a class="col-md-3 control-label" style="text-align:left" onclick="recherche_particulier_parrain();">Rechercher</a>
										
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Filleuls</label>
                                        <div class="col-md-8">
                                            <input type="text" name="Filleuls_Ids" class="form-control" placeholder="" readonly>
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
                                        <label class="col-md-4 control-label">Situation professionnelle</label>
                                        <div class="col-md-8">
											<select  name="SITUATION_PROFESSIONNELLE_Id" class="form-control">
												<option value="">Sélectionner</option>
												<?php foreach(lof::$listeValeurs['CORPS'] as $cle => $valeur) {?>
												<option value="<?php echo $cle;?>" <?php if(isset($this->vars['SITUATION_PROFESSIONNELLE_Id']) && $this->vars['SITUATION_PROFESSIONNELLE_Id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
												<?php } ?>
											</select>		
									   </div>
                                    </div>
									
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Année d'entrée</label>

										<div class="col-md-8">
											<select  name="Date_Entree_Corps" class="form-control">
												<option value="">Sélectionner</option>
												<?php for($x = (date('Y') - 40); $x <= date('Y'); $x++) {?>
												<option value="<?php echo $x;?>" <?php if(isset($this->vars['Date_Entree_Corps']) && $this->vars['Date_Entree_Corps'] == $x) echo 'selected="selected"'?>><?php echo $x?></option>
												<?php } ?>
											</select>	
										</div>	
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Statut à l'Affiliation</label>
                                        <div class="col-md-8">
											<select  name="STATUT_AFFILIATION_Id" class="form-control"> 
												<option value="">Sélectionner</option>
												<?php foreach(lof::$listeValeurs['QUALITE_AFFILIATION'] as $cle => $valeur) {?>
												<option value="<?php echo $cle;?>" <?php if(isset($this->vars['STATUT_AFFILIATION_Id']) && $this->vars['STATUT_AFFILIATION_Id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
												<?php } ?>
											</select>
									  </div>
                                    </div>
									
									
								<div id="affiliation_div" style="display:none">
									
									
									<div class="form-group">
                                        <label class="col-md-4 control-label">Nom d'établissement</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="Administration_Nom" value="<?php if (isset($this->vars['Administration_Nom'])) echo $this->vars['Administration_Nom']; ?>">
                                        </div>
                                    </div>
									
									 <div class="form-group">
                                        <label class="col-md-4 control-label">Catégorie de Fonctionnaire</label>
                                        <div class="col-md-8">
										<select  name="CATEGORIE_FONCTIONNAIRE_Id" class="form-control"> 
											<option value="">Sélectionner</option>
											<?php foreach(lof::$listeValeurs['CATEGORIE_FONCTIONNAIRE'] as $cle => $valeur) {?>
											<option value="<?php echo $cle;?>" <?php if(isset($this->vars['CATEGORIE_FONCTIONNAIRE_Id']) && $this->vars['CATEGORIE_FONCTIONNAIRE_Id'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
											<?php } ?>
										</select>
										</div>
                                    </div>
									
									
									
									
									<div class="form-group">
                                        <label class="col-md-4 control-label">Code Postal</label>
                                        <div class="col-md-8">
                                            <input id="Administration_CP" type="text" class="form-control" name="Administration_CP" pattern="[0-9]{5}" value="<?php if (isset($this->vars['Admin_Code_Postal'])) echo $this->vars['Admin_Code_Postal']; ?>" required>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                    <label class="col-md-4 control-label">Ville</label>
                                        <div class="col-md-8">
                                            <input id="Administration_Ville" type="text" class="form-control" name="Administration_Ville" value="<?php if (isset($this->vars['Admin_Ville'])) echo $this->vars['Admin_Ville']; ?>">
                                        </div>
                                    </div>
									
									
								
								    <div class="form-group">
                                    <label class="col-md-4 control-label">Complément Nom</label>
                                        <div class="col-md-8">
                                            <input id="Administration_Adresse_1" type="text" class="form-control" name="Administration_Adresse_2" value="<?php if (isset($this->vars['Admin_Adresse_2'])) echo $this->vars['Admin_Adresse_2']; ?>" >
                                        </div>
                                    </div>
								
								    <div class="form-group">
                                        <label class="col-md-4 control-label">Complément Localisation</label>
                                        <div class="col-md-8">
                                            <input id="Administration_Adresse_2" type="text" class="form-control" name="Administration_Adresse_3" value="<?php if (isset($this->vars['Admin_Adresse_3'])) echo $this->vars['Admin_Adresse_3']; ?>" >
                                        </div>
                                    </div>

									<div class="form-group">
                                        <label class="col-md-4 control-label">N° et libellé de la voie</label>
                                        <div class="col-md-8">
                                            <input id="Administration_Adresse_3" type="text" class="form-control" name="Administration_Adresse_1" value="<?php if (isset($this->vars['Admin_Adresse_1'])) echo $this->vars['Admin_Adresse_1']; ?>">
                                        </div>
                                    </div>
									
									
									<div class="form-group">
                                        <label class="col-md-4 control-label">BP Lieu-dit</label>
                                        <div class="col-md-8">
                                            <input id="Administration_Adresse_4" type="text" class="form-control" name="Administration_Adresse_4" value="<?php if (isset($this->vars['Admin_Adresse_4'])) echo $this->vars['Admin_Adresse_4']; ?>" >
                                        </div>
                                    </div>
									

									

									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Pays</label>
                                        <div class="col-md-8">
                                            <select  id="Administration_Pays" name="Pays" class="form-control">
														<option value="">Sélectionner</option>
														<option value=""></option>
														<?php foreach(lof::$listeValeurs['LISTE_PAYS'] as $cle => $valeur) {?>
														<option value="<?php echo $cle;?>" <?php if(isset($this->vars['Pays']) && $this->vars['Pays'] == $valeur) echo 'selected="selected"'?>><?php echo $valeur?></option>
														<?php } ?>
											</select>
										
										</div>
										
                                    </div>
								</div>	

									
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END INFO AFFIL-->

                    <!-- BEGIN INFO COMP-->
                    <div class="portlet">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-home"></i> Informations complémentaires
                            </div>
                            <div class="tools">
                                <a href="" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">

                            
			<div class="form-horizontal" role="form">
                                <div class="form-body">
								
                                  
				<!-- Le nom de ce champ doit être chagé -->
				<div class="form-group">
                                        <label class="col-md-4 control-label">Résidnce principale</label>
                                        <div class="col-md-8">
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="radio" name="Residence_principale" value="1"> Propriétaire </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Residence_principale" value="0"> Locataire </label>

                                            </div>
                                        </div>
                                    </div>

				    
									<div class="form-group">
                                        <label class="col-md-4 control-label">Résidence principale</label>
                                        <div class="col-md-8">
                                            <div class="radio-list">
                                                <label class="radio-inline col-md-4">
                                                    <input type="radio" name="Proprietaire_Locatif" value="1"> Oui </label>
                                                <label class="radio-inline col-md-4">
                                                    <input type="radio" name="Proprietaire_Locatif" value="0"> Non </label>
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
                                        <label class="col-md-4 control-label">Revenu mensuel net</label>
                                        <div class="col-md-8">
											<select  name="Tranche_revenu" class="form-control"> 
												<option value="0">Sélectionner</option>
												<option value="1">&lt;&nbsp;600 euros mensuels net</option>
												<option value="2">600 à 1 699</option>
												<option value="3">1 700 à 2 899</option>
												<option value="4">2 900 à 4 099</option>
												<option value="4"> &gt;&equals;&nbsp; 4100</option>
											</select>
										</div>
                                    </div>
									
                                 
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Nombre d'enfants</label>
                                        <div class="col-md-8">
											<select  name="Tranche_revenu" class="form-control"> 
												<option value="">Sélectionner</option>
												<option value="0">0</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="100">+5</option>
											</select>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END INFO COMP-->
					
		

                </div>
                <!-- END COL1 -->


                <!-- BEGIN COL2 -->
                <div class="col-md-6">
				
                    <!-- BEGIN ADRESSE-->
                    <div class="portlet">
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
                                        <label class="col-md-4 control-label">Code Postal&nbsp;<span style="font-size : 12px; color : red"> * </span></label>
                                        <div class="col-md-8">
                                            <input id="CP" type="text" class="form-control" name="Code_Postal" pattern="[0-9]{5}" value="<?php if (isset($this->vars['Code_Postal'])) echo $this->vars['Code_Postal']; ?>" required>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                    <label class="col-md-4 control-label">Ville</label>
                                        <div class="col-md-8">
                                            <input id="Ville" type="text" class="form-control" name="Ville" value="<?php if (isset($this->vars['Ville'])) echo $this->vars['Ville']; ?>">
                                        </div>
                                    </div>
									
									
								
								    <div class="form-group">
                                    <label class="col-md-4 control-label">Complément Nom</label>
                                        <div class="col-md-8">
                                            <input id="Adresse_1" type="text" class="form-control" name="Adresse_2" value="<?php if (isset($this->vars['Adresse_2'])) echo $this->vars['Adresse_2']; ?>" >
                                        </div>
                                    </div>
								
								    <div class="form-group">
                                        <label class="col-md-4 control-label">Complément Localisation</label>
                                        <div class="col-md-8">
                                            <input id="Adresse_2" type="text" class="form-control" name="Adresse_3" value="<?php if (isset($this->vars['Adresse_3'])) echo $this->vars['Adresse_3']; ?>" >
                                        </div>
                                    </div>

									<div class="form-group">
                                        <label class="col-md-4 control-label">N° et libellé de la voie</label>
                                        <div class="col-md-8">
                                            <input id="Adresse_3" type="text" class="form-control" name="Adresse_1" value="<?php if (isset($this->vars['Adresse_1'])) echo $this->vars['Adresse_1']; ?>">
                                        </div>
                                    </div>
									
									
									<div class="form-group">
                                        <label class="col-md-4 control-label">BP Lieu-dit</label>
                                        <div class="col-md-8">
                                            <input id="Adresse_4" type="text" class="form-control" name="Adresse_4" value="<?php if (isset($this->vars['Adresse_4'])) echo $this->vars['Adresse_4']; ?>" >
                                        </div>
                                    </div>
									

									

									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Pays</label>
                                        <div class="col-md-8">
                                            <select  id="Pays" name="Pays" class="form-control">
														<option value="">Sélectionner</option>
														<option value=""></option>
														<?php foreach(lof::$listeValeurs['LISTE_PAYS'] as $cle => $valeur) {?>
														<option value="<?php echo $cle;?>" <?php if(isset($this->vars['Pays']) && $this->vars['Pays'] == $valeur) echo 'selected="selected"'?>><?php echo $valeur?></option>
														<?php } ?>
											</select>
										
										</div>
										
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">PND</label>
                                        <div class="col-md-8">
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="radio" name="Adresse_PND_O_N" value="1"> Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Adresse_PND_O_N" value="0" checked> Non </label>
                                            </div>

                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Date de Modification</label>
                                        <div class="col-md-8">
                                            <input type="date" class="form-control" name="Date_Modification" value="<?php if (isset($this->vars['Date_Modification'])) echo $this->vars['Date_Modification']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END ADRESSE-->


                    <!-- BEGIN TEL EMAIL-->
                    <div class="portlet">
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
                                    
									<select style="display:none" id="dqe_pays"><option value="FRA" selected="selected">F</option></select>
									
				                    <div class="form-group">
                                        <label class="col-md-4 control-label">Téléphone Fixe</label>
                                        <div class="col-md-8">
                                            <input id="sPhone" type="text" name="sPhone" class="form-control" value="<?php if (isset($this->vars['sPhone'])) echo $this->vars['sPhone']; ?>">
											<label id="resultPhone">&nbsp;</label>
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Téléphone Mobile</label>
                                        <div class="col-md-8">
                                            <input id="sMobilePhone" type="text" name="sMobilePhone" class="form-control" value="<?php if (isset($this->vars['sMobilePhone'])) echo $this->vars['sMobilePhone']; ?>">
											<label id="resultMobile" class="help-block" style="text-align:left">&nbsp;</label>
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Email</label>
                                        <div class="col-md-8" style="text-align:left">
                                            <input id="sEmail" type="text" name="sEmail" class="form-control" value="<?php if (isset($this->vars['sEmail'])) echo $this->vars['sEmail']; ?>">
                                            <label id="resultMail" class="help-block" style="text-align:left">&nbsp;</label>
                                        </div>
                                    </div>
									
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END TEL EMAIL-->

                    <!-- BEGIN OPTIN-->
                    <div class="portlet">
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
                                                        <input type="checkbox" name="iBlackList" value="1"  <?php if(isset($this->vars['iBlackList']) && ($this->vars['iBlackList'])) {echo 'checked';} ?>> </label>
                                                </div>
                                            </div>
                                    </div>
									
                            
									
									
									<div class="form-group">
                                        <label class="col-md-6 control-label">Actualités Préfon par Courrier</label>
                                        <div class="col-md-6">
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input class="ziza" type="radio" name="iBlackListPostalMail" value="0" > Oui </label>
                                                <label class="radio-inline">
                                                    <input class="ziza" type="radio" name="iBlackListPostalMail" value="1"> Non </label>
                                            </div>
                                        </div>
                                    </div>
									
									
									<div class="form-group">
                                        <label class="col-md-6 control-label">Actualités Préfon par Email</label>
                                        <div class="col-md-6">
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="radio" name="iBlackListEmail" value="0" > Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="iBlackListEmail" value="1"> Non </label>
                                            </div>
                                        </div>
                                    </div>
									
									
									<div class="form-group">
                                        <label class="col-md-6 control-label">Actualités Préfon par Téléphone</label>
                                        <div class="col-md-6">
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="radio" name="iBlackListPhone" value="0" > Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="iBlackListPhone" value="1"> Non </label>
                                            </div>
                                        </div>
                                    </div>
									
									
									
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Actualités Préfon par SMS</label>
                                        <div class="col-md-6">
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="radio" name="iBlackListMobile" value="0" checked > Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="iBlackListMobile" value="1"> Non </label>
                                            </div>
                                        </div>
                                    </div>
     
                                    <div class="form-group">
                                        <label class="col-md-6 control-label">Actualités Partenaires Préfon</label>
                                        <div class="col-md-6">
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="radio" name="Optin_Partenaires_O_N" value="0" > Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Optin_Partenaires_O_N" value="1"> Non </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OPTIN-->
					

                    <!-- BEGIN PLACEMENT-->
                    <div class="portlet">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-eur"></i> Placements
                            </div>
                            <div class="tools">
                                <a href="" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">

                            <div class="form-horizontal" role="form">
                                <div class="form-body">
								
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Assurance vie</label>
                                        <div class="col-md-8">
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="radio" name="Placement_Assurance_Vie" value="1" <?php if(isset($this->vars['Placement_Assurance_Vie']) && ($this->vars['Placement_Assurance_Vie'])) {echo 'checked';} ?>> Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Placement_Assurance_Vie" value="0" <?php if(!isset($this->vars['Placement_Assurance_Vie']) || !($this->vars['Placement_Assurance_Vie']))  {echo 'checked';} ?>> Non </label>
											</div>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">PERP</label>
                                        <div class="col-md-8">
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="radio" name="Placement_PERP" value="1" <?php if(isset($this->vars['Placement_PERP']) && ($this->vars['Placement_PERP'])) {echo 'checked';} ?>> Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Placement_PERP" value="0" <?php if(!isset($this->vars['Placement_PERP']) || !($this->vars['Placement_PERP']))  {echo 'checked';} ?> > Non </label>
                                            </div>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">PERCO</label>
                                        <div class="col-md-8">
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="radio" name="Placement_PERCO" value="1" <?php if(isset($this->vars['Placement_PERCO']) && ($this->vars['Placement_PERCO'])) {echo 'checked';} ?>> Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Placement_PERCO" value="0" <?php if(!isset($this->vars['Placement_PERCO']) || !($this->vars['Placement_PERCO']))  {echo 'checked';} ?>> Non </label>
                                            </div>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">PEA</label>
                                        <div class="col-md-8">
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="radio" name="Placement_PEA"  value="1" <?php if(isset($this->vars['Placement_PEA']) && ($this->vars['Placement_PEA'])) {echo 'checked';} ?>> Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Placement_PEA" value="0" <?php if(!isset($this->vars['Placement_PEA']) || !($this->vars['Placement_PEA']))  {echo 'checked';} ?>> Non </label>
                                            </div>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Compte-titres</label>
                                        <div class="col-md-8">
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="radio" name="Placement_Compte_Titre" value="1" <?php if(isset($this->vars['Placement_Compte_Titre']) && ($this->vars['Placement_Compte_Titre'])) {echo 'checked';} ?>> Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Placement_Compte_Titre" value="0" <?php if(!isset($this->vars['Placement_Compte_Titre']) || !($this->vars['Placement_Compte_Titre']))  {echo 'checked';} ?>> Non </label>
                                            </div>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Autre</label>
                                        <div class="col-md-8">
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="radio" name="Placement_Autre" value="1" <?php if(isset($this->vars['Placement_Autre']) && ($this->vars['Placement_Autre'])) {echo 'checked';} ?>> Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Placement_Autre" value="0" <?php if(!isset($this->vars['Placement_Autre']) || !($this->vars['Placement_Autre']))  {echo 'checked';} ?>> Non </label>
                                            </div>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Précisez</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="Libelle_Placement_Autre" value="<?php if (isset($this->vars['Libelle_Placement_Autre'])) echo $this->vars['Libelle_Placement_Autre']; ?>" readonly>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PLACEMENT-->

					

                </div>
                <!-- END COL2 -->
            </div>
			
			<div class="alert alert-danger display-hide"  style="text-align:center">
			<button class="close" data-close="alert"></button>
			<span>
			Un ou plusieurs champs sont manquants </span>
			</div>
			
			
			<div class="row"> 
				<div class="col-md-12" style="text-align:right"><button class="btn btn-success" style="margin-top : 10px" type="submit">Sauvegarder</button></div>
			</div>
				
			</form>
            <!-- END PAGE CONTENT-->

        </div>




    </div>
    <!-- END PAGE CONTENT-->
