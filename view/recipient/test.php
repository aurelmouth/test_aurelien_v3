    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

            <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

            <!-- BEGIN PAGE HEADER-->
			<?php if (isset($this->vars['sFirstName'])) {?>
			<div id="sticker" style="z-index:100; background-color:white">
			<h3 class="page-title">
                <?php echo $this->vars['sFirstName']. ' ' . $this->vars['sLastName']; ?>  I Affilié cotisant <small>I Créée le <?php echo $this->vars['Date_Creation'] ?> Par TC <?php echo $this->vars['CONSEILLER_Id'] ?> Modifiée le <?php echo $this->vars['Date_Modification'] ?></small>
            </h3>
			
			</div>
			
            <div class="page-bar" style="z-index:0;margin-top:10px; position:relative">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="index.html">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Fiche Particulier</a>
                    </li>
                </ul>
			
            
			</div>
			<?php } ?>
			
            <!-- END PAGE HEADER-->

            <!-- BEGIN PAGE CONTENT -->
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
						<?php print_r($_POST) ?>
							
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->
				</div>
			</div>

	
			

<?php print_r($_POST) ?>