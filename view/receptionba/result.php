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
                            <i class="fa fa-search"></i>Reception BA &gt; Résultat de la recherche
                        </div>
                    </div>
                    <div class="portlet-body">
					
					<div class="row">
						<div class="col-md-6" style="text-align:left" ><a href="<?php echo Router::url('receptionba/search'); ?>" class="btn btn-info" style="margin-bottom : 10px">Retourner à la recherche</a></div>
						<div class="col-md-6" style="text-align:right" ><a href="<?php echo Router::url('receptionba/create'); ?>" class="btn btn-success" style="margin-bottom : 10px">Créer un particulier</a></div>
					</div>
					
					<!-- <a class="btn btn-info" data-toggle="modal" data-target="#static" type="submit">BA reçu</a> -->
					<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="result">
							
							<thead>
							<tr>
								<th>Statut</th>
								<th>Numéro</th>
								<th>Nom</th>
								<th>Prénom</th>
								<th>Date de naissance</th>
								<th>Adresse</th>
								<th>Créé le</th>
								<th>Étape</th>
							</tr>
							
							
							
							</thead>
							                            <?php
                                $recip = new stdClass();
                                foreach($this->request->data->dom->getElementsByTagName('recipient') as $recip)
                                {	
									$barecu = '';
									if($recip->getAttribute("statut_particulier") == 2){
										if($recip->getAttribute("sous_statut") == 6 || $recip->getAttribute("sous_statut") == 8){
											$barecu = '<td><span class="btn btn-default disabled">BA en cours</span></td>';
										}else{
											$barecu = '<td><a class="btn btn-info" onclick="barecu(' . $recip->getAttribute("id") .')">BA reçu</a></td>'; 
										}
									}else{
										$barecu = '<td></td>';
									}
									
								    $statut_particulier =  (isset($_SESSION['STATUT_PARTICULIER'][$recip->getAttribute("statut_particulier")]) ? $_SESSION['STATUT_PARTICULIER'][$recip->getAttribute("statut_particulier")] : '');
                                    $sous_statut =  (isset($_SESSION['SOUS_STATUT_PARTICULIER'][$recip->getAttribute("sous_statut")]) ? $_SESSION['SOUS_STATUT_PARTICULIER'][$recip->getAttribute("sous_statut")] : '');
                                    $id =  $recip->getAttribute("id");
									$lastName =  $recip->getAttribute("lastName");
                                    $firstName =  $recip->getAttribute("firstName");
                                    $tsBirth =  lof::convertDateFromAdobeFormat($recip->getAttribute("tsBirth"));
									$adresse_3 =  $recip->getAttribute("adresse_3");
                                    $code_postal =  $recip->getAttribute("code_postal");
                                    $ville =  $recip->getAttribute("ville");
                                    $num_allocataire =  $recip->getAttribute("num_allocataire");
                                    $created =  lof::convertDateFromAdobeFormat($recip->getAttribute("created"));

                                echo ('
                                    <tr>
                                        <td><a onclick="fiche_particulier('.$id .')">'. $statut_particulier . ' ' . $sous_statut .'</a></td>
                                        <td><a onclick="fiche_particulier('.$id .')">'.$id.'</a></td>
                                        <td><a onclick="fiche_particulier('.$id .')">'.$lastName.'</a></td>
                                        <td><a onclick="fiche_particulier('.$id .')">'.$firstName.'</a></td>
                                        <td><a onclick="fiche_particulier('.$id .')">'.$tsBirth.'</a></td>
                                        <td><a onclick="fiche_particulier('.$id .')">'.(strlen($adresse_3) > 0 ? $adresse_3 . '<br>' : '') . ' '  . $code_postal . ' ' . $ville . '</a></td>
                                        <td>'. lof::sort_date($recip->getAttribute("created")) .'<a onclick="fiche_particulier('.$id .')">'.$created.'</a></td>
										' . $barecu .'
                                    </tr>
                                ');

                                }
                            ?>
							
							</tbody>
							
							</table>

							
							
							<div id="ba_recu" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Demande de confirmation</h4>
										</div>
										<div class="modal-body">
											<p>
												Confirmez-vous la récéption du bulletin d'affiliation et l'ajout de l'évènement pour le particulier n° <span id="num_particulier"></span> ?
											</p>
										</div>
										<div class="modal-footer">
											<button type="button" data-dismiss="modal" class="btn btn-default">Annuler</button>
											<a id="ba_recu_particulier" type="button"  href="" class="btn btn-success">Oui</a>
										</div>
									</div>
								</div>
							</div>
								
							
                        </div>
						
						<div class="row">
						<div class="col-md-6" style="text-align:left" ><a href="<?php echo Router::url('receptionba/search'); ?>"><button id="valid" class="btn btn-info" style="margin-bottom : 10px" type="submit">Retourner à la recherche</button></a></div>
						<div class="col-md-6" style="text-align:right" ><a href="<?php echo Router::url('receptionba/create'); ?>"><button id="valid" class="btn btn-success" style="margin-bottom : 10px" type="submit">Créer un particulier</button></a></div>
						</div>
						
						
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->


    </div>
    <!-- END PAGE CONTENT-->


</div>
