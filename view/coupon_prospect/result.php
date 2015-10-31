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
                            <i class="fa fa-search"></i>Coupon prospect &gt; Résultat de la recherche
                        </div>
                    </div>
                    <div class="portlet-body">
					
					<div class="row">
						<div class="col-md-6" style="text-align:left" ><a href="<?php echo Router::url('coupon_prospect/search'); ?>" class="btn btn-info" style="margin-bottom : 10px">Retourner à la recherche</a></div>
						<div class="col-md-6" style="text-align:right" ><a href="<?php echo Router::url('coupon_prospect/saisie_coupon'); ?>" class="btn btn-success" style="margin-bottom : 10px">Créer un particulier</a></div>
					</div>
					
					<!-- <a class="btn btn-info" data-toggle="modal" data-target="#static" type="submit">BA reçu</a> -->
					<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="result">
							
							<thead>
							<tr>
								<th>Type</th>
								<th>Numéro</th>
								<th>Nom</th>
								<th>Prénom</th>
								<th>Date de naissance</th>
								<th>Adresse</th>
								<th>Créé le</th>
								<th></th>
								
							</tr>
							
							
							
							</thead>
							    <?php
                                $recip = new stdClass();
                                foreach($this->request->data->dom->getElementsByTagName('recipient') as $recip)
                                {	
								    $statut_particulier =  (isset($_SESSION['STATUT_PARTICULIER'][$recip->getAttribute("statut_particulier")]) ? $_SESSION['STATUT_PARTICULIER'][$recip->getAttribute("statut_particulier")] : '');
                                    $sous_statut =  (isset($_SESSION['SOUS_STATUT_PARTICULIER'][$recip->getAttribute("sous_statut")]) ? $_SESSION['SOUS_STATUT_PARTICULIER'][$recip->getAttribute("sous_statut")] : '');
									$id =  $recip->getAttribute("id");
									$lastName =  $recip->getAttribute("lastName");
                                    $firstName =  $recip->getAttribute("firstName");
                                    $tsBirth =  lof::convertDateFromAdobeFormat($recip->getAttribute("tsBirth"));
									$adresse_3 =  $recip->getAttribute("adresse_3");
                                    $code_postal =  $recip->getAttribute("code_postal");
                                    $ville =  $recip->getAttribute("ville");
                                    $created =  lof::convertDateFromAdobeFormat($recip->getAttribute("created"));
									$options = '';
									if($recip->getAttribute("statut_particulier") == 1){
										$options .= '<a class="btn btn-success" onclick="convertir_prospect(' . $id .', \'' . $lastName . '\', \'' . $firstName .'\')">Convertir en prospect</a>';
										if($recip->getAttribute("iblacklist")){
											$options .= '&nbsp;<a class="btn btn-danger disabled">Stop com</a>';
										}else{
											$options .= '&nbsp;<a class="btn btn-danger" onclick="stop_com(' . $id .')">Stop com</a>';
										} 
									} else if($recip->getAttribute("statut_particulier") == 2){
										$options .= '<a class="btn btn-success" onclick="saisie_coupon(' . $id .')">Saisir un coupon</a>';
									}else{
										
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
										<td>' . $options . '</td>
                                    </tr>
                                ');

                                }
                            ?>
							
							</tbody>
							
							</table>

							
							
							<div id="convertir_prospect" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Demande de confirmation</h4>
										</div>
										<div class="modal-body">
											<p>
												Voulez-vous convertir <span id="nom_particulier"></span> en prospect et saisir le coupon?
											</p>
										</div>
										<div class="modal-footer">
											<button type="button" data-dismiss="modal" class="btn btn-default">Annuler</button>
											<a id="convertir_prospect_particulier" type="button"  href="" class="btn btn-success">Oui</a>
										</div>
									</div>
								</div>
							</div>
							
							<div id="stop_com" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Demande de confirmation</h4>
										</div>
										<div class="modal-body">
											<p>
												Voulez-vous arrêter toute la communication pour le particulier N° <span id="num_particulier"></span>?
											</p>
										</div>
										<div class="modal-footer">
											<button type="button" data-dismiss="modal" class="btn btn-default">Annuler</button>
											<a id="stop_com_particulier" type="button"  href="" class="btn btn-success">Oui</a>
										</div>
									</div>
								</div>
							</div>

							<div id="saisie_coupon" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Demande de confirmation</h4>
										</div>
										<div class="modal-body">
											<p>
												Voulez-vous saisir le coupon pour le particulier N° <span id="num_particulier"></span>?
											</p>
										</div>
										<div class="modal-footer">
											<button type="button" data-dismiss="modal" class="btn btn-default">Annuler</button>
											<a id="saisie_coupon_particulier" type="button"  href="" class="btn btn-success">Oui</a>
										</div>
									</div>
								</div>
							</div>								
							
                        </div>
						
					<div class="row" style="margin-top:45px;">
						<div class="col-md-6" style="text-align:left"><a href="<?php echo Router::url('coupon_prospect/search'); ?>" class="btn btn-info">Retourner à la recherche</a></div>
						<div class="col-md-6" style="text-align:right"><a href="<?php echo Router::url('coupon_prospect/saisie_coupon'); ?>" class="btn btn-success">Créer un particulier</a></div>
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
