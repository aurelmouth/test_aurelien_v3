			
			<div class="row ">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div id="events_search" class="portlet col-md-12">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-arrows-alt"></i> Rechercher un événement
							</div>
							<div class="tools">
								<a href="" class="collapse"></a>
							</div>
						</div>
						<div class="portlet-body col-md-12">
						<form method="post" action="<?php echo Router::url('recipient/events/'.$this->request->params[0]); ?>">
							<div class="form-horizontal  col-md-6" role="form">
								<div class="form-group">
                                        <label class="col-md-4 control-label">Date début : </label>
                                       
										
										<div class="col-md-8">
											<div class="input-group date date-picker">
												<input name="date_debut_evenement" type="texte" class="form-control" value="<?php if (isset($_SESSION['date_debut_evenement']) && $_SESSION['date_debut_evenement'] <> '') echo $_SESSION['date_debut_evenement']; ?>">
												<span class="input-group-btn">
												<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
											<!-- /input-group -->
										</div>
								</div>
                            </div>
                            <div class="form-horizontal col-md-6" role="form">
								<div class="form-group" >
                                        <label class="col-md-4 control-label">Date fin : </label>
                                       
										
									<div class="col-md-8">
											<div class="input-group date date-picker">
												<input name="date_fin_evenement" type="texte" class="form-control" value="<?php if (isset($_SESSION['date_fin_evenement']) && $_SESSION['date_fin_evenement'] <> '') echo $_SESSION['date_fin_evenement']; ?>">
												<span class="input-group-btn">
												<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
											<!-- /input-group -->
										</div>
								</div>
							</div>
						
						
							<div class="col-md-12" style="text-align:right" ><button class="btn btn-info" style="margin-bottom : 10px" type="submit" name="submit">Rechercher</button></div>
						</form>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>
			
			
			
			
			
			<div class="row">
			<div class="col-md-12" style="text-align:right" ><a href="<?php echo Router::url('recipient/add_event/'.$this->request->params[0]) ?>" class="btn btn-success" style="margin-bottom : 10px">Ajouter un événement</a></div>
			</div>
						<!-- END TEL EMAIL-->

				
			<div id="table" class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-calendar"></i>Événements
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
							</div>
						</div>
						<div class="portlet-body">
						
						<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="table_events">

								<thead>
								<tr>
									<th valign="middle">Date</th>
									<th>Lieu</th>
									<th>Conseiller</th>
									<th>Mode</th>
									<th>Motif</th>
									<th>Résultat</th>
									<th>Commentaire</th>
								</tr>
								
								</thead>
								<tbody>

								<?php
									$even = new stdClass();
									foreach($this->request->data->dom->getElementsByTagName('evenement') as $even){
										$lieu = lof::getValueFromSessiion("LIEU_EVENEMENT_ALL", $even, "LIEU_Id");
										$mode = lof::getValueFromSessiion("MODE_EVENEMENT_ALL", $even, "MODE_EVENEMENT_Id");
										$motif = lof::getValueFromSessiion("MOTIF_EVENEMENT_ALL", $even, "MOTIF_EVENEMENT_Id");
										$resultat = lof::getValueFromSessiion("RESULTAT_EVENEMENT_ALL", $even, "RESULTAT_EVENEMENT_Id");
										
										foreach($even->getElementsByTagName('Commentaire') as $com){
												$commentaire =  $com->nodeValue;
											}
										
										echo ('
											
											<tr>
												<td><a href="'.Router::url('recipient/edit_event/'.$this->request->params[0].'/'.$even->getAttribute("id")).'">'. lof::convertDateFromAdobeFormat($even->getAttribute("Date_Evenement")) .'</a></td>
												<td><a href="'.Router::url('recipient/edit_event/'.$this->request->params[0].'/'.$even->getAttribute("id")).'" title="' . $lieu .'">'. lof::ifStringTooLong($lieu) .'</a></td>
												<td><a href="'.Router::url('recipient/edit_event/'.$this->request->params[0].'/'.$even->getAttribute("id")).'">'. $even->getAttribute("CONSEILLER") .'</a></td>
												<td><a href="'.Router::url('recipient/edit_event/'.$this->request->params[0].'/'.$even->getAttribute("id")).'" title="' . $mode .'">'. lof::ifStringTooLong($mode, 30) .'</a></td>
												<td><a href="'.Router::url('recipient/edit_event/'.$this->request->params[0].'/'.$even->getAttribute("id")).'" title="' . $motif .'">'. lof::ifStringTooLong($motif, 32) .'</a></td>
												<td><a href="'.Router::url('recipient/edit_event/'.$this->request->params[0].'/'.$even->getAttribute("id")).'" title="' . $resultat .'">'. lof::ifStringTooLong($resultat, 30).'</a></td>
												<td><a href="'.Router::url('recipient/edit_event/'.$this->request->params[0].'/'.$even->getAttribute("id")).'" title="' . $commentaire .'">'. lof::ifStringTooLong($commentaire, 30).'</a></td>

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

				
				<div class="row">
					<div class="col-md-12" style="text-align:right" ><a href="<?php echo Router::url('recipient/add_event/'.$this->request->params[0]) ?>" class="btn btn-success" style="margin-bottom : 10px" type="submit">Ajouter un événement</a></div>
				</div>
				

				<!-- END PAGE CONTENT-->

			</div>




    </div>
    <!-- END PAGE CONTENT-->
