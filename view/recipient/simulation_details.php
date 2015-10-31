
			
					
		   <div class="row ">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet col-md-12">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-university"></i> Paramètres
							</div>
							<div class="tools">
								<a href="" class="collapse"></a>
							</div>
						</div>
						
					<div class="portlet-body col-md-12">
						
					<div class="form-horizontal  col-md-6" role="form">
								

															
								<div class="form-group">
									<label class="col-md-4 control-label">Date de liquidation: </label>
									<div class="col-md-8">
										<div class="col-md-3">
											<input type="text" class="form-control" name="jour" value="01" readonly="readonly">
										</div>
										<div class="col-md-3">
											<select class="form-control" name="mois">
												<?php for($i = 1; $i <= 12; $i++){ ?>
													<option value="<?php echo sprintf("%02d", $i); ?>"><?php echo sprintf("%02d", $i); ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="col-md-6">
											<select class="form-control">
													<?php for($x = date('Y'); $x < (date('Y') + 25); $x++){?>
													<option value="<?php echo $x;?>"><?php echo $x;?></option>
													<?php } ?>
											</select>
										</div>
									</div>
								</div>
								
								

								<div class="form-group">
									<label class="col-md-4 control-label">Classe de cotisation choisie : </label>
									<div class="col-md-8">
										<select name="Classe_Cotisation" class="form-control">
											<?php foreach(lof::$listeValeurs['CLASSE_COTISATION'] as $cle => $valeur) {?>
											<option value="<?php echo $cle;?>" <?php if(isset($this->vars['Classe_Cotisation']) && $this->vars['Classe_Cotisation'] == $cle) echo 'selected="selected"'?>><?php echo $valeur?></option>
											<?php } ?>
										</select>	
									</div>
								</div>
								
									<div class="form-group">
                                        <label class="col-md-4 control-label">Option de réversion (avant liquidation) : </label>
										<div class="col-md-8">
												<div class="radio-list">
													<label class="radio-inline">
														<input type="radio" name="reversion_retraite_allocataire_id" value="1"> Oui </label>
													<label class="radio-inline">
														<input  type="radio" name="reversion_retraite_allocataire_id" value="0"> Non </label>
												</div>
										</div>
                                    </div>
								
				</div>
				
				<div class="form-horizontal  col-md-6" role="form">
								
									<div class="form-group">
                                        <label class="col-md-4 control-label">Âge à la liquidation : </label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="" value="<?php if(isset($this->vars[''])) echo $this->vars[''];?>" readonly="readonly">
										</div>
                                    </div>

									<div class="form-group">
                                        <label class="col-md-4 control-label">Avec progression tous les 5 ans : </label>
										<div class="col-md-8">
                                                <div class="checkbox-list">
                                                    <label>
														<input type="hidden" name="Progression_Palier_O_N" value="0"/>
                                                        <input type="checkbox" name="Progression_Palier_O_N" value="1"> </label>
                                                </div>
										</div>
                                    </div>
								
									<div class="form-group">
                                        <label class="col-md-4 control-label">Abondement (PUPH / MCUPH) : </label>
										<div class="col-md-8">
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="radio" name="Abondement" value="1"> Oui </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="Abondement" value="0"> Non </label>
                                            </div>
										</div>
                                    </div>
								
						</div>
				
							
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>
			
				
			<div id="table" class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-search"></i>Opérations des derniers exercices 
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
								<th>Cotisation annuelle </th>
								<th>Rachat</th>
								<th>Révers.</th>
								<th>Points bruts acquis</th>
								<th>Cumul Points bruts</th>
								<th>Points nets réversion </th>
								<th>Cumul Points nets</th>
								<th>Cumul des versements</th>
								<th>Montant vers attendus </th>
							</tr>
							
						</thead>
						<tbody>
			
					
						</tbody>
					</table>
					</div>
					
					
					
							

							
                        </div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
			


			
			
			<div id="table" class="row">
            <div class="col-md-12">
                
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-eur"></i>Montant de votre retraite
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
							<tr>
								<th>Cumul cotisation annuelle en points bruts</th>
								<th>Total Rachats en points bruts</th>
								<th>Total points bruts acquis</th>
								<th>Coeff de liquid. **</th>
								<th>Réversion après liquid.</th>
								<th>Dépendance après liquid.</th>
								<th>Total points liquidés</th>
								<th>Retraite annuelle brute ***</th>
							</tr>
							
						</thead>
						<tbody>
							<tr>
								<td>1 190</td>
								<td>0</td>
								<td>1 190</td>
								<td>1.00</td>
								<td>1</td>
								<td>Non </td>
								<td>1 190</td>
								<td>110</td>							
							</tr>		
					
						</tbody>
					</table>
					</div>
					
					
					
							

							
                        </div>
                    </div>
                </div>
                
            </div>
	
			
			
		</div>
    </div>


	
    <!-- END PAGE CONTENT-->
