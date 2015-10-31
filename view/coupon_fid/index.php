<!-- BEGIN SEARCH -->
<div class="content3">

    <!-- BEGIN SEARCH FORM -->
			<form id="coupon_form" method="post" action="<?php echo Router::url('coupon_fid/index'); ?>">
		   <div class="row ">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet col-md-12">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-barecode"></i>Coupon fidélisation &gt; Code Barre
							</div>
							<div class="tools">
								<a href="" class="collapse"></a>
							</div>
						</div>
						
						<div class="portlet-body col-md-12">
						<?php if(isset($this->vars['affilie_inexistant'])) {?>
						<div class="alert alert-danger display-show"  style="text-align:center">
							<button class="close" data-close="alert"></button>
							<span>
								Aucun particulier ne correspond à la recherche 
							</span>
						</div>
						<?php } ?>
							<div class="col-md-2"></div>
							<div class="form-horizontal  col-md-8" role="form">
								<div class="form-group">
									<label for="Origine" class="col-md-3 control-label">Code barre</label>
									<div class="col-md-9">
                                            <input name="code_barre" type="text" class="form-control" value="<?php if(isset($this->vars['code_barre'])) echo $this->vars['code_barre'];?>">
									</div>
								</div>
                            </div>
							<div class="col-md-2"></div>
                            <div class="form-horizontal col-md-12" role="form">
							<div class="form-horizontal  col-md-4" role="form">
								<div class="form-group">
									<label for="" class="col-md-6 control-label">N° Affilié</label>
									<div class="col-md-6">
                                            <input name="numero_affilie" type="text" class="form-control" value="<?php if(isset($this->vars['numero_affilie'])) echo $this->vars['numero_affilie'];?>">
									</div>
								</div>
                            </div>
							<div class="form-horizontal  col-md-4" role="form">
								<div class="form-group">
									<label for="" class="col-md-6 control-label">Code accueil</label>
									<div class="col-md-6">
                                            <input name="code_acceuil" type="text" class="form-control" value="<?php if(isset($this->vars['code_acceuil'])) echo $this->vars['code_acceuil'];?>">
									</div>
								</div>
                            </div>
							<div class="form-horizontal  col-md-4" role="form">
								<div class="form-group">
									<label for="" class="col-md-6 control-label">Classe actuelle</label>
									<div class="col-md-6">
                                            <input name="classe_actuelle" type="text" class="form-control" value="<?php if(isset($this->vars['classe_actuelle'])) echo $this->vars['classe_actuelle'];?>">
									</div>
								</div>
                            </div>
							</div>
						<div class="row"> 
						<div class="col-md-12" style="text-align:right"><button class="btn btn-success" style="margin-top : 10px" type="submit">Rechercher</button></div>
						</div>
						
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>
			</form>
    <!-- END SEARCH FORM -->
		<?php if(isset($this->vars['sphone'])) {?>
		<div class="row">
		<form id="coupon_fid_form" method="post" action="<?php echo Router::url('coupon_fid/saisie_coupon_fid/' . $this->vars['id']); ?>">
				<h4 class="page-title" style="padding-left:20px">
					<?php echo (isset($this->vars['firstName']) ? $this->vars['firstName'] : '') . ' ' . (isset($this->vars['lastName']) ? $this->vars['lastName'] : '') . '<br>';?>
					<?php echo (isset($this->vars['adresse_3']) && strlen($this->vars['adresse_3']) > 0 ? $this->vars['adresse_3'] . '<br>' : '');?>
					<?php echo $this->vars['code_postal'] . ' ' . $this->vars['ville'];?><br>
				</h4>
		
                <!-- BEGIN COL1 -->		
                <div class="col-md-6 ">			
                    <!-- BEGIN IDENTITE-->
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

					
		

                </div>
                <!-- END COL1 -->


                <!-- BEGIN COL2 -->
                <div class="col-md-6">
				




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
						
                                </div>
                            </div>
                        </div>
                    <!-- END OPTIN-->

					

                </div>
                <!-- END COL2 -->
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
						
							<div class="col-md-6">
							<input type="hidden" name="code_acceuil" value="<?php echo $this->vars['code_acceuil'];?>" />
								<div class="form-group">
									<label for="" class="col-md-6 control-label">Versement d'un montant de</label>
									<div class="col-md-6">
                                            <input name="montant_versement" type="text" class="form-control">
									</div>
								</div>

							</div>

						
						
						<div class="col-md-6">

							
							<div class="form-horizontal col-md-12" role="form">
	
								<input type="hidden" name="classe_actuelle" value="<?php echo $this->vars['classe_actuelle'];?>" />
								<div class="form-group">
									<label class="col-md-5 control-label">Nouvelle classe</label>
									<div class="col-md-7">
									<select name="nouvelle_classe" class="form-control">
										<option value="0">Sélectionner</option>
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

                            </div>

						</div>
						
						
						

						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
				</div>
			</form>
			<div class="row"> 
				<div class="col-md-12" style="text-align:right"><button class="btn btn-success" style="margin-top : 10px" onclick="modal_coupon_fid()">Valider</button></div>
			</div>
			</div>
		<?php } ?>
			</div>
			
			
			<div id="coupon_fid_modal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Demande de confirmation</h4>
						</div>
						<div class="modal-body">
							<p>
								Code accueil : <span id="modal_code_accueil"></span><br>
								Montant : <span id="modal_montant"></span><br>
								Nouvelle classe : <span id="modal_nouvelle_classe"></span><br>
								Confirmez-vous la saisie du coupon ?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" data-dismiss="modal" class="btn btn-default">Annuler</button>
							<a type="button" onclick="$('#coupon_fid_form').submit();" class="btn btn-success">Oui</a>
						</div>
					</div>
				</div>

			</div>
			
			
			
			
			
				
            <!-- END PAGE CONTENT-->

        </div>





<!-- END SEARCH -->