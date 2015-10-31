<!-- BEGIN SEARCH -->
<div class="content3">

    <!-- BEGIN SEARCH FORM -->

		   <div class="row ">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet col-md-12">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-barecode"></i> Code Barre
							</div>
							<div class="tools">
								<a href="" class="collapse"></a>
							</div>
						</div>
						<div class="portlet-body col-md-12">
							<div class="col-md-2"></div>
							<div class="form-horizontal  col-md-8" role="form">
								<div class="form-group">
									<label for="Origine" class="col-md-3 control-label">Code barre</label>
									<div class="col-md-9">
                                            <input name="Code_Barre" type="text" class="form-control">
									</div>
								</div>
                            </div>
							<div class="col-md-2"></div>
                            <div class="form-horizontal col-md-12" role="form">
							<div class="form-horizontal  col-md-4" role="form">
								<div class="form-group">
									<label for="" class="col-md-6 control-label">N° Affilié</label>
									<div class="col-md-6">
                                            <input name="" type="text" class="form-control">
									</div>
								</div>
                            </div>
							<div class="form-horizontal  col-md-4" role="form">
								<div class="form-group">
									<label for="" class="col-md-6 control-label">Code acceuil</label>
									<div class="col-md-6">
                                            <input name="" type="text" class="form-control">
									</div>
								</div>
                            </div>
							<div class="form-horizontal  col-md-4" role="form">
								<div class="form-group">
									<label for="" class="col-md-6 control-label">Classe actuelle</label>
									<div class="col-md-6">
                                            <input name="" type="text" class="form-control">
									</div>
								</div>
                            </div>
							</div>
						<div class="row"> 
						<div class="col-md-12" style="text-align:right"><button class="btn btn-success" style="margin-top : 10px" type="submit" onclick="$('#megmed').show();">Valider</button></div>
						</div>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>
    <!-- END SEARCH FORM -->
		<div id="megmed" style="display:none">
		<div class="row">
                <!-- BEGIN COL1 -->		
                <div class="col-md-6 ">			
                    <!-- BEGIN IDENTITE-->
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
                                            <input id="sPhone" type="text" name="sPhone" class="form-control" value="">
											<label id="resultPhone">&nbsp;</label>
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Téléphone Mobile</label>
                                        <div class="col-md-8">
                                            <input id="sMobilePhone" type="text" name="sMobilePhone" class="form-control" value="">
											<label id="resultMobile" class="help-block" style="text-align:left">&nbsp;</label>
										</div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Email</label>
                                        <div class="col-md-8" style="text-align:left">
                                            <input id="sEmail" type="text" name="sEmail" class="form-control" value="">
                                            <label id="resultMail" class="help-block" style="text-align:left">&nbsp;</label>
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
                                                        <input type="checkbox" name="iBlackList" value="1"> </label>
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

					

                </div>
                <!-- END COL2 -->
            </div>
			

			
		 		   <div class="row ">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet col-md-12">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-barecode"></i> Je souhaite
							</div>
							<div class="tools">
								<a href="" class="collapse"></a>
							</div>
						</div>
						<div class="portlet-body col-md-12">
						
						<div class="col-md-6">
							<div class="form-horizontal col-md-12" style="border : 1px solid black; padding:5px" role="form">
								<div class="form-group">
									<label for="" class="col-md-6 control-label">Verser ma cotisation annuelle de</label>
									<div class="col-md-6">
                                            <input name="" type="text" class="form-control">
									</div>
								</div>
                            </div>
							
							<div class="form-horizontal col-md-12" style="border : 1px solid red; padding:5px" role="form">
								<div class="form-group">
									<label for="" class="col-md-6 control-label">Bénificier du prélevement automatique, à partir de </label>
									<div class="col-md-6">
                                            <input name="" type="text" class="form-control">
									</div>
                            </div>
                            
							
								<div class="form-group">
									<label for="" class="col-md-6 control-label">Périodicité</label>
									<div class="col-md-6">
                                        <select name="Periodicite" class="form-control">
											<option value="" placeholder="Selectionner une option"></option>
											<option value="1"> Mensuelle</option>
											<option value="2"> Semestrielle</option>
											<option value="3"> Trimestrielle</option>
											<option value="3"> Annuelle</option>
										</select>
									</div>
								</div>

							

								<div class="form-group">
									<label for="" class="col-md-6 control-label">Classe actuelle</label>
									<div class="col-md-6">
                                            <input name="" type="text" class="form-control">
									</div>
								</div>

							
							

									<div class="form-group">
                                        <label class="col-md-6 control-label">Rib présent</label>
                                            <div class="col-md-6">
                                                <div class="checkbox-list">
                                                    <label>
														<input type="hidden" name="Presence_Rib" value="0" />
                                                        <input type="checkbox" name="Presence_Rib" value="1" > </label>
                                                </div>
                                            </div>
                                    </div>

						</div>
						</div>
						
						
						<div class="col-md-6">
							<div class="form-horizontal col-md-12" role="form">
								<div class="form-group">
									<label for="" class="col-md-12 "><b>Passer en classe de cotisation supèrieur</b></label>
								</div>
                            </div>
							
							<div class="form-horizontal col-md-12" style="border : 1px solid blue; padding:5px" role="form">
								<div class="form-group">
									<label for="" class="col-md-6 control-label">Classe actuelle</label>
									<div class="col-md-6">
                                            <input name="" type="text" class="form-control">
									</div>
								</div>

							

								<div class="form-group">
									<label for="" class="col-md-6 control-label">Nouvelle classe</label>
									<div class="col-md-6">
                                            <input name="" type="text" class="form-control">
									</div>
								</div>
                            </div>
							
							<div class="form-horizontal col-md-12" style="border : 1px solid grey; padding:5px" role="form">
								<div class="form-group">
									<label for="" class="col-md-6 control-label">Versement d'un montant de</label>
									<div class="col-md-6">
                                            <input name="" type="text" class="form-control">
									</div>
								</div>

							
								<div class="form-group">
									<label for="" class="col-md-6 control-label">Nombre d'années rachetées</label>
									<div class="col-md-6">
                                            <input name="" type="text" class="form-control">
									</div>
								</div>
                            </div>

						</div>
						
						
						

						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
				
				
			<div class="row"> 
				<div class="col-md-12" style="text-align:right"><button class="btn btn-success" style="margin-top : 10px" type="submit" onclick="$('#megmed').hide();">Valider</button></div>
			</div>
			</div>
			
			</div>
			
			
			
			
			
			
			
			
				
            <!-- END PAGE CONTENT-->

        </div>





<!-- END SEARCH -->