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
                            <i class="fa fa-search"></i>Bordereaux &gt; Liste des bordereaux
                        </div>
                    </div>
                    <div class="portlet-body">
					<div class="col-md-12" style="margin-bottom : 10px">
						<div align="right"><a href="<?php echo Router::url('bordereaux/saisir_bordereau'); ?>" class="btn btn-success">Saisir un bordereau</a></div>
					</div>
					
					<!-- <a class="btn btn-info" data-toggle="modal" data-target="#static" type="submit">BA reçu</a> -->
					<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="result">
							
							<thead>
							<tr>
								<th>Numéro</th>
								<th>Saisie le</th>
								<th>Creé par</th>
								<th>Transmis le</th>
								<th>Nombre</th>
								
							</tr>
							
							
							
							</thead>
							 <?php
                                $bord = new stdClass();
                                foreach($this->request->data->dom->getElementsByTagName('bordereaux') as $bord)
                                {	
                                echo ('
                                    <tr>
										<td><a href="'.Router::url('bordereaux/details/'.$bord->getAttribute('id_bordereaux')).'">'. $bord->getAttribute('id_bordereaux') . '</a></td>
										<td><a href="'.Router::url('bordereaux/details/'.$bord->getAttribute('id_bordereaux')).'">'. lof::convertDateFromAdobeFormat($bord->getAttribute('created')) . '</a></td>
										<td><a href="'.Router::url('bordereaux/details/'.$bord->getAttribute('id_bordereaux')).'">'. $bord->getAttribute('cree_par') . '</a></td>
										<td><a href="'.Router::url('bordereaux/details/'.$bord->getAttribute('id_bordereaux')).'">'. lof::convertDateFromAdobeFormat($bord->getAttribute('date_transmission')) . '</a></td>
										<td><a href="'.Router::url('bordereaux/details/'.$bord->getAttribute('id_bordereaux')).'">'. $bord->getAttribute('Nombre_particuliers') . '</a></td>
                                    </tr>
                                ');

                                }
                            ?>
							
							</tbody>
							
							</table>

							
							
								
							
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
