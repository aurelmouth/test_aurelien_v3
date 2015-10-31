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
                            <i class="fa fa-search"></i>Résultat de la recherche
                        </div>
                    </div>
                    <div class="portlet-body">
					
					<div class="row" >
					<div class="col-md-12" style="margin-bottom : 10px">
						<div class="col-md-6" align="left"><a href="<?php echo Router::url('search/search/'); ?>" class="btn btn-info">Retourner à la recherche</a></div>
						<?php if($_SESSION['conseillerEnLigne']['droits'] > 2) {?>
						<div class="col-md-6"align="right"><a href="<?php echo Router::url('recipient/edit/'); ?>" class="btn btn-success">Créer un particulier</a></div>
						<?php } ?>
					</div>
					<div class="table-responsive col-md-12">
					<table class="table table-striped table-bordered table-hover" id="sample_6">
							
							<thead>
							<tr>
								<th>Statut</th>
								<th>Numéro</th>
								<th>Nom d'usage</th>
								<th>Nom de naissance</th>
								<th>Prénom</th>
								<th>Date de naissance</th>
								<th>Adresse</th>
								<th>N° Cotisant</th>
								<th>N° Allocataire</th>
								<th>Créé le</th>
							</tr>
							
							</thead>
							<tbody>

                            <?php
                                $recip = new stdClass();
                                foreach($this->request->data->dom->getElementsByTagName('recipient') as $recip)
                                {
                                    $statut_particulier =  (isset($_SESSION['STATUT_PARTICULIER'][$recip->getAttribute("statut_particulier")]) ? $_SESSION['STATUT_PARTICULIER'][$recip->getAttribute("statut_particulier")] : '');
                                    $sous_statut =  (isset($_SESSION['SOUS_STATUT_PARTICULIER'][$recip->getAttribute("sous_statut")]) ? $_SESSION['SOUS_STATUT_PARTICULIER'][$recip->getAttribute("sous_statut")] : '');
									$id =  $recip->getAttribute("id");
									$lastName =  $recip->getAttribute("lastName");
									$nom_naissance =  $recip->getAttribute("nom_naissance");
                                    $firstName =  $recip->getAttribute("firstName");
                                    $tsBirth =  lof::convertDateFromAdobeFormat($recip->getAttribute("tsBirth"));
									$adresse_3 =  $recip->getAttribute("adresse_3");
                                    $code_postal =  $recip->getAttribute("code_postal");
                                    $ville =  $recip->getAttribute("ville");
									$num_cotisant =  $recip->getAttribute("num_cotisant");
                                    $num_allocataire =  $recip->getAttribute("num_allocataire");
                                    $created =  lof::convertDateFromAdobeFormat($recip->getAttribute("created"));

                                echo ('
                                    <tr>
                                        <td><a href="'.Router::url('recipient/edit/'.$id).'">'. $statut_particulier . ' ' . $sous_statut .'</a></td>
                                        <td><a href="'.Router::url('recipient/edit/'.$id).'">'.$id.'</a></td>
                                        <td><a href="'.Router::url('recipient/edit/'.$id).'">'.$lastName.'</a></td>
                                        <td><a href="'.Router::url('recipient/edit/'.$id).'">'.$nom_naissance.'</a></td>
                                        <td><a href="'.Router::url('recipient/edit/'.$id).'">'.$firstName.'</a></td>
                                        <td><a href="'.Router::url('recipient/edit/'.$id).'">'.$tsBirth.'</a></td>
                                        <td><a href="'.Router::url('recipient/edit/'.$id).'">'.(strlen($adresse_3) > 0 ? $adresse_3 . '<br>' : '') . ' '  . $code_postal . ' ' . $ville . '</a></td>
                                        <td><a href="'.Router::url('recipient/edit/'.$id).'">'.$num_cotisant.'</a></td>
                                        <td><a href="'.Router::url('recipient/edit/'.$id).'">'.$num_allocataire.'</a></td>
                                        <td>'. lof::sort_date($recip->getAttribute("created")) .'<a href="'.Router::url('recipient/edit/'.$id).'">'.$created.'</a></td>
                                    </tr>
                                ');

                                }
                            ?>
							
							</tbody>
							
							</table>
							</div>
							<div class="row">
								<div class="col-md-12" style="margin-bottom : 10px">
									<div class="col-md-6" align="left"><a href="<?php echo Router::url('search/search/'); ?>" class="btn btn-info">Retourner à la recherche</a></div>
									<?php if($_SESSION['conseillerEnLigne']['droits'] > 2) {?>
									<div class="col-md-6"align="right"><a href="<?php echo Router::url('recipient/edit/'); ?>" class="btn btn-success">Créer un particulier</a></div>
									<?php } ?>
								</div>
							</div>
							
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
