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
		<br><br>

        <!-- BEGIN PAGE CONTENT -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-pencil"></i>Bordereau numéro : <b><?php echo $this->vars['id_bordereaux'];?></b> | Créé le <b><?php echo lof::convertDateFromAdobeFormat($this->vars['created']);?></b> | Nombre de particuliers : <b><?php echo $this->vars['Nombre_particuliers'];?></b>
                        </div>
                    </div>
                    <div class="portlet-body">
					<div class="row" >
						<div class="col-md-12" style="margin-bottom : 10px">
								<div class="col-md-6" align="left">
									<a href="<?php echo Router::url('bordereaux/result'); ?>" class="btn btn-info">Retourner aux résultats</a>
								</div>
								<div class="col-md-6" align="right">
									<a target="_blank" href="<?php echo Router::url('bordereaux/imprimer/' . $this->request->params[0]); ?>" class="btn btn-info">Imprimer le bordereau</a>
							<?php if (isset($this->vars['transmettre'])){?>
									&nbsp;<a href="<?php echo Router::url('bordereaux/transmettre/' . $this->request->params[0]); ?>" class="btn btn-success">Transmettre le bordereau</a>
							<?php } ?>
								</div>
						</div>
					<div class="table-responsive col-md-12">
					<table class="table table-striped table-bordered table-hover" id="sample_6">
							
							<thead>
							<tr>
								<th>Date de saise</th>
								<th>numéro</th>
								<th>Nom</th>
								<th>Prénom</th>
								<th>Date de naissance</th>
								<th>Adresse</th>
							</tr>
							
							</thead>
							<tbody>

                            <?php
                                $recip = new stdClass();
                                foreach($this->request->data->dom->getElementsByTagName('recipient') as $recip)
                                {
									$date_saisie =  lof::convertDateFromAdobeFormat($recip->getAttribute("date_saisie"));
									$id =  $recip->getAttribute("id");
									$lastName =  $recip->getAttribute("lastName");
                                    $firstName =  $recip->getAttribute("firstName");
                                    $tsBirth =  lof::convertDateFromAdobeFormat($recip->getAttribute("tsBirth"));
									$adresse_3 =  $recip->getAttribute("adresse_3");
                                    $code_postal =  $recip->getAttribute("code_postal");
                                    $ville =  $recip->getAttribute("ville");

                                echo ('
                                    <tr>
                                        <td>'.$date_saisie.'</td>
                                        <td>'.$id.'</td>
                                        <td>'.$lastName.'</a></td>
                                        <td>'.$firstName.'</a></td>
                                        <td>'.$tsBirth.'</a></td>
                                        <td>'.(strlen($adresse_3) > 0 ? $adresse_3 . '<br>' : '') . ' '  . $code_postal . ' ' . $ville . '</a></td>
                                    </tr>
                                ');

                                }
                            ?>
							
							</tbody>
							
							</table>
							</div>
							<div class="row">
								<div class="col-md-12" style="margin-bottom : 10px; padding-right:30px">
										<div class="col-md-6" align="left">
											<a href="<?php echo Router::url('bordereaux/result'); ?>" class="btn btn-info">Retourner aux résultats</a>
										</div>
										<div class="col-md-6" align="right">
											<a target="_blank" href="<?php echo Router::url('bordereaux/imprimer/' . $this->request->params[0]); ?>" class="btn btn-info">Imprimer le bordereau</a>
									<?php if (isset($this->vars['transmettre'])){?>
											&nbsp;<a href="<?php echo Router::url('bordereaux/transmettre/' . $this->request->params[0]); ?>" class="btn btn-success">Transmettre le bordereau</a>
									<?php } ?>
										</div>
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
