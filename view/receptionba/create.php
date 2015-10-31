<div class="content3">
			<form class="create-form" method="post" action="<?php echo Router::url('receptionba/create'); ?>" style="z-index:0;margin-top:10px; position:relative">
    <!-- BEGIN SEARCH FORM -->
		   <div class="row">
				<div class="col-md-12" style="text-align:right" ><button id="valid" class="btn btn-success" style="margin-bottom : 10px" type="submit">Valider</button></div>
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
                <div class="col-md-12 ">			
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
                                        <label class="col-md-4 control-label">Nom d'usage &nbsp;<span style="font-size : 12px; color : red"> * </span></label>
                                        <div class="col-md-4">
                                            <input type="text" name="sLastName" class="form-control" value="<?php if (isset($this->vars['lastName'])) echo $this->vars['lastName']; ?>"  <?php if(isset($this->vars['num_cotisant']) && strlen($this->vars['num_cotisant'] && $_SESSION['statut_particulier'] == "3")) echo 'readonly';?>>
                                        </div>
                                    </div>
									
  
									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Prénom &nbsp;<span style="font-size : 12px; color : red"> * </span></label>
                                        <div class="col-md-4">
                                            <input type="text" name="sFirstName" class="form-control" value="<?php if (isset($this->vars['firstName'])) echo $this->vars['firstName']; ?>" <?php if(isset($this->vars['num_cotisant']) && strlen($this->vars['num_cotisant'] && $_SESSION['statut_particulier'] == "3")) echo "readonly";?>>
                                        </div>
                                    </div>
									
				
									

									
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Date de Naissance<?php if(!isset($_SESSION['statut_particulier']) || $_SESSION['statut_particulier'] != 1) {?>&nbsp;<span style="font-size : 12px; color : red"> * </span><?php } ?></label>
                                       
										
									<div class="col-md-4">
												<input  name="tsBirth" type="texte" class="form-control" value="<?php if (isset($this->vars['tsBirth']) && $this->vars['tsBirth'] <> '') echo $this->vars['tsBirth']; ?>" <?php if(isset($this->vars['num_cotisant']) && strlen($this->vars['num_cotisant'] && $_SESSION['statut_particulier'] == "3")) echo "readonly";?>>
											<!-- /input-group -->
										</div>
										
                                    </div>
									
									<input type="hidden" id="Pays" name="Pays" value="X"/>
									<div class="form-group">
                                        <label class="col-md-4 control-label">Code Postal<?php if(!isset($_SESSION['statut_particulier']) || $_SESSION['statut_particulier'] != 1) {?>&nbsp;<span style="font-size : 12px; color : red"> * </span><?php } ?></label>
                                        <div class="col-md-4">
                                            <input  type="text" class="form-control" name="Code_Postal"  value="<?php if (isset($this->vars['code_postal'])) echo $this->vars['code_postal']; ?>">
                                        </div>
                                    </div>
									
									
			
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END IDENTITE-->

                    <!-- BEGIN INFO AFFIL-->
                   			
			<div class="alert alert-danger display-hide"  style="text-align:center">
			<button class="close" data-close="alert"></button>
			<span>
			Un ou plusieurs champs sont manquants. </span>
			</div>
			

			</div>
			
			<div class="row"> 
				<div class="col-md-12" style="text-align:right"><button class="btn btn-success" style="margin-top : 10px" type="submit">Valider</button></div>
			</div>				

            <!-- END PAGE CONTENT-->


			</div>
		</div>
		</form>
		
		<?php if(isset($this->vars['id'])){?>
			<div id="ba_recu" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Demande de confirmation</h4>
						</div>
						<div class="modal-body">
							<p>
								Particulier N° <?php echo $this->vars['id'];?><br>
								Confirmez-vous la récéption du bulletin d'affiliation et l'ajout de l'évènement ? 
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" data-dismiss="modal" class="btn btn-default">Annuler</button>
							<a type="button"  href="<?php echo Router::url('receptionba/barecu/' . $this->vars['id']); ?>" class="btn btn-success">Oui</a>
						</div>
					</div>
				</div>

			</div>
			<?php } ?>
		
</div>
    <!-- END PAGE CONTENT-->
