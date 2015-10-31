
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
                        <div class="tools">
                            <a href="javascript:;" class="collapse">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
					<div class="row">
						<div class="col-md-12" style="margin-bottom : 10px">
							<div class="col-md-6" align="left"><a href="<?php echo Router::url('popup/search/'); ?>" class="btn btn-info">Retourner à la recherche</a></div>
						</div>
					</div>
					<table class="table table-striped table-bordered table-hover" id="sample_6">
							<thead>
							<tr>
								<th>Type</th>
								<th>N° Particulier</th>
								<th>Nom</th>
								<th>Prénom</th>
								<th>Date de naissance</th>
								<th>Adresse</th>
								<th>Code Postale</th>
								<th>Ville</th>
								<th>N° Affilié</th>
								<th>N° Allocataire</th>
							</tr>
							</thead>
							<tbody>

                            <?php
                                $recip = new stdClass();
                                foreach($this->request->data->dom->getElementsByTagName('recipient') as $recip)
                                {
									$civilite = ($recip->getAttribute('qualite_id') > 0 && $recip->getAttribute('qualite_id') <= 2) ? (strtoupper($_SESSION['CIVILITE'][$recip->getAttribute('qualite_id')])) . ' ' : ('');
                                    $statut_particulier =  $_SESSION['STATUT_PARTICULIER'][$recip->getAttribute("statut_particulier")];
                                    $id =  $recip->getAttribute("id");
                                    $lastName =  $recip->getAttribute("lastName");
                                    $firstName =  $recip->getAttribute("firstName");
                                    $tsBirth =  lof::convertDateFromAdobeFormat($recip->getAttribute("tsBirth"));
                                    $adresse_3 =  $recip->getAttribute("adresse_3");
                                    $code_postal =  $recip->getAttribute("code_postal");
                                    $ville =  $recip->getAttribute("ville");
                                    $num_adherent =  $recip->getAttribute("num_adherent");
                                    $num_allocataire =  $recip->getAttribute("num_allocataire");

                                echo ('
                                    <tr>
                                        <td><a href="#" onclick="javascript:formreturn(' . $id . ',\'' . $firstName .'\', \'' . $lastName .'\', \'' . $statut_particulier .'\', \''. $civilite . '\');">'.$statut_particulier.'</a></td>
                                        <td><a href="#" onclick="javascript:formreturn(' . $id . ',\'' . $firstName .'\', \'' . $lastName .'\', \'' . $statut_particulier .'\', \''. $civilite . '\');">'.$id.'</a></td>
                                        <td><a href="#" onclick="javascript:formreturn(' . $id . ',\'' . $firstName .'\', \'' . $lastName .'\', \'' . $statut_particulier .'\', \''. $civilite . '\');">'.$lastName.'</a></td>
                                        <td><a href="#" onclick="javascript:formreturn(' . $id . ',\'' . $firstName .'\', \'' . $lastName .'\', \'' . $statut_particulier .'\', \''. $civilite . '\');">'.$firstName.'</a></td>
                                        <td><a href="#" onclick="javascript:formreturn(' . $id . ',\'' . $firstName .'\', \'' . $lastName .'\', \'' . $statut_particulier .'\', \''. $civilite . '\');">'.$tsBirth.'</a></td>
                                        <td><a href="#" onclick="javascript:formreturn(' . $id . ',\'' . $firstName .'\', \'' . $lastName .'\', \'' . $statut_particulier .'\', \''. $civilite . '\');">'.$adresse_3.'</a></td>
                                        <td><a href="#" onclick="javascript:formreturn(' . $id . ',\'' . $firstName .'\', \'' . $lastName .'\', \'' . $statut_particulier .'\', \''. $civilite . '\');">'.$code_postal.'</a></td>
                                        <td><a href="#" onclick="javascript:formreturn(' . $id . ',\'' . $firstName .'\', \'' . $lastName .'\', \'' . $statut_particulier .'\', \''. $civilite . '\');">'.$ville.'</a></td>
                                        <td><a href="#" onclick="javascript:formreturn(' . $id . ',\'' . $firstName .'\', \'' . $lastName .'\', \'' . $statut_particulier .'\', \''. $civilite . '\');">'.$num_adherent.'</a></td>
                                        <td><a href="#" onclick="javascript:formreturn(' . $id . ',\'' . $firstName .'\', \'' . $lastName .'\', \'' . $statut_particulier .'\', \''. $civilite . '\');">'.$num_allocataire.'</a></td>
                                    </tr>		
                                ');

                                }
                            ?>
							
							</tbody>
							</table>
							<div class="row">
								<div class="col-md-12" style="margin-bottom : 10px">
									<div class="col-md-6" align="left"><a href="<?php echo Router::url('popup/search/'); ?>" class="btn btn-info">Retourner à la recherche</a></div>
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