		<?php if(!isset($this->vars['allocataire'])) {?>
			<div class="row">
			<div class="col-md-12" style="text-align:right" ><a href="<?php echo Router::url('recipient/add_simulation/'.$this->request->params[0]) ?>" class="btn btn-success" style="margin-bottom : 10px">Nouvelle simulation</a></div>
			</div>
			<?php } ?>			<!-- END TEL EMAIL-->

				
			<div id="table" class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-calendar"></i>Simulations
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
							</div>
						</div>
						<div class="portlet-body">
						
						<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="table_simulations">

								<thead>
								<tr>
									<th>Créee le</th>
									<th>Créee par</th>
									<th>Modifiée le</th>
									<th>Nom</th>
									<th>Date liquidation</th>
									<th>Age liquidation</th>
									<th>Classe initiale</th>
								</tr>
								
								</thead>
								<tbody>

								<?php
									$sim = new stdClass();
									foreach($this->request->data->domSimulations->getElementsByTagName('simulation') as $sim){
										
										echo ('
											
											<tr>
												<td>'. lof::sort_date($sim->getAttribute("created")) .'<a href="'.Router::url('recipient/view_simulation/'.$this->request->params[0].'/'.$sim->getAttribute("id")).'">'. lof::convertDateFromAdobeFormat($sim->getAttribute("created")) .'</a></td>
												<td><a href="'.Router::url('recipient/view_simulation/'.$this->request->params[0].'/'.$sim->getAttribute("id")).'">'. $sim->getAttribute("label") .'</a></td>
												<td>'. lof::sort_date($sim->getAttribute("lastModified")) .'<a href="'.Router::url('recipient/view_simulation/'.$this->request->params[0].'/'.$sim->getAttribute("id")).'">'. lof::convertDateFromAdobeFormat($sim->getAttribute("lastModified")) .'</a></td>
												<td><a href="'.Router::url('recipient/view_simulation/'.$this->request->params[0].'/'.$sim->getAttribute("id")).'">'. $sim->getAttribute("Nom_Simulation") .'</a></td>
												<td><a href="'.Router::url('recipient/view_simulation/'.$this->request->params[0].'/'.$sim->getAttribute("id")).'">'. lof::convertDateFromAdobeFormat($sim->getAttribute("Date_Liquidation")) .'</a></td>
												<td><a href="'.Router::url('recipient/view_simulation/'.$this->request->params[0].'/'.$sim->getAttribute("id")).'">'. $sim->getAttribute("Age_Liquidation") .'</a></td>
												<td><a href="'.Router::url('recipient/view_simulation/'.$this->request->params[0].'/'.$sim->getAttribute("id")).'">'. $this->vars['classe_cotisation_' . $sim->getAttribute("id")].'</a></td>

											</tr>
									');
									}

								?>

								</tbody>
								</table>
								<div class="row">&nbsp;</div>
							</div>	

								
							</div>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>

				<?php if(!isset($this->vars['allocataire'])) {?>
				<div class="row">
					<div class="col-md-12" style="text-align:right" ><a href="<?php echo Router::url('recipient/add_simulation/'.$this->request->params[0]) ?>"class="btn btn-success" style="margin-bottom : 10px">Nouvelle simulation</a></div>
				</div>
				<?php }?>

				<!-- END PAGE CONTENT-->

			</div>




    </div>
    <!-- END PAGE CONTENT-->
