<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">

    <!-- BEGIN CONTENT -->

	
    <div class="page-content-wrapper">

        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

        <!-- BEGIN PAGE HEADER-->
        <div class="page-bar">

        </div>
        <!-- END PAGE HEADER-->

        <!-- BEGIN PAGE CONTENT -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-search"></i>Affiliation
                        </div>
                    </div>
                    <div class="portlet-body">
					
					
					<!-- <a class="btn btn-info" data-toggle="modal" data-target="#static" type="submit">BA reçu</a> -->
					<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="result">
							
							<thead>
							<tr>
								<th>Statut</th>
								<th>N° particulier</th>
								<th>Nom</th>
								<th>Prénom</th>
								<th>Date de naissance</th>
								<th>Adresse</th>
								<th>Créé le</th>
								<th>Dernière date BA reçu</th>
								<th></th>
								
							</tr>
							
							
							
							</thead>
							                            <?php
                                $recip = new stdClass();
                                foreach($this->request->data->dom->getElementsByTagName('recipient') as $recip)
                                {	
									$id =  $recip->getAttribute("id");
									$statut_particulier =  (isset($_SESSION['STATUT_PARTICULIER'][$recip->getAttribute("statut_particulier")]) ? $_SESSION['STATUT_PARTICULIER'][$recip->getAttribute("statut_particulier")] : '');
                                    $sous_statut =  (isset($_SESSION['SOUS_STATUT_PARTICULIER'][$recip->getAttribute("sous_statut")]) ? $_SESSION['SOUS_STATUT_PARTICULIER'][$recip->getAttribute("sous_statut")] : '');
									$lastName =  $recip->getAttribute("lastName");
                                    $firstName =  $recip->getAttribute("firstName");
                                    $tsBirth =  lof::convertDateFromAdobeFormat($recip->getAttribute("tsBirth"));
									$adresse_3 =  $recip->getAttribute("adresse_3");
                                    $code_postal =  $recip->getAttribute("code_postal");
                                    $ville =  $recip->getAttribute("ville");
                                    $created =  lof::convertDateFromAdobeFormat($recip->getAttribute("created"));
									$date_evenement = ($recip->getElementsByTagName('evenement-particulier')->item(0)) != null ?  $recip->getElementsByTagName('evenement-particulier')->item(0)->getAttribute('Date_Evenement'): ('');
									//To sort the table, we'll need also th
									$option = '';
									
									if($recip->getAttribute("sous_statut") == 6){
										$option = '<a class="btn btn-success" onclick="saisir_ba(' . $id .')">Saisir le BA</a>';
									}
									
									if($recip->getAttribute("sous_statut") == 8){
										$option = '<a class="btn btn-info" href="'. Router::url('affiliation/saisir_ba/'.$id) .'">Continuer saisie BA</a>';
									}
									
									if(strlen($date_evenement) > 0 && $recip->getAttribute('sous_statut') == 8){
										$option .= '&nbsp;<a class="btn btn-danger" onclick="ba_refuse(' . $id .', ' . $recip->getElementsByTagName('evenement-particulier')->item(0)->getAttribute('id') .')">Annuler affiliation</a>';
									}
									

                                echo ('
                                    <tr>
										<td><a onclick="fiche_particulier('.$id .')">'. $statut_particulier . ' ' . $sous_statut .'</a></td>
										<td><a onclick="fiche_particulier('.$id .')">'.$id.'</a></td>
                                        <td><a onclick="fiche_particulier('.$id .')">'.$lastName.'</a></td>
                                        <td><a onclick="fiche_particulier('.$id .')">'.$firstName.'</a></td>
                                        <td><a onclick="fiche_particulier('.$id .')">'.$tsBirth.'</a></td>
                                        <td><a onclick="fiche_particulier('.$id .')">'.(strlen($adresse_3) > 0 ? $adresse_3 . '<br>' : '') . ' '  . $code_postal . ' ' . $ville . '</a></td>
                                        <td><a onclick="fiche_particulier('.$id .')">'.$created.'</a></td>
                                        <td>'. lof::sort_date($date_evenement) .'<a onclick="fiche_particulier('.$id .')">'. lof::convertDateFromAdobeFormat($date_evenement) .'</a></td>
										<td>' . $option .'</td>
										
                                    </tr>
                                ');

                                }
                            ?>
							
							</tbody>
							
							</table>

							
							
							<div id="saisir_ba" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Demande de confirmation</h4>
										</div>
										<div class="modal-body">
											<p>
												Voulez-vous saisir le bulletin d'affiliation  pour le particulier n° <span id="num_particulier"></span> ?
											</p>
										</div>
										<div class="modal-footer">
											<button type="button" data-dismiss="modal" class="btn btn-default">Annuler</button>
											<a id="saisir_ba_particulier" type="button"  href="" class="btn btn-success">Oui</a>
										</div>
									</div>
								</div>
							</div>
							
							<div id="ba_refuse" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Demande de confirmation</h4>
										</div>
										<div class="modal-body">
											<p>
												Confirmez-vous l'annulation du bulletin d'affiliation  pour le particulier N° <span id="num_particulier"></span>?
											</p>
										</div>
										<div class="modal-footer">
											<button type="button" data-dismiss="modal" class="btn btn-default">Annuler</button>
											<a id="ba_refuse_particulier" type="button"  href="" class="btn btn-success">Oui</a>
										</div>
									</div>
								</div>
							</div>
								
							
                        </div>
						
						<div class="row">&nbsp;</div>
						
						
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->


    </div>
    <!-- END PAGE CONTENT-->


</div>
