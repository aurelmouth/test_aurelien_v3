<!-- BEGIN SEARCH -->
<div class="content">

    <!-- BEGIN SEARCH FORM -->

	<form class="search-form" action="<?php echo Router::url('renonciation/search'); ?>" method="post">
        <h3 class="form-title">Recherche :</h3>

		<div class="alert alert-danger display-hide"  style="text-align:center">
			<button class="close" data-close="alert"></button>
			<span>
			Affiliation transmise à la CNP, la renonciation doit être réalisée par le centre de gestion </span>
		</div>
		
		<div class="alert alert-danger display-hide"  style="text-align:center">
			<button class="close" data-close="alert"></button>
			<span>
			Ce numéro d'affilié n'existe pas </span>
		</div>		

        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"> <i class="fa fa-user"></i></span>
                    <input type="texte" name="IRecipientId" class="form-control" placeholder="N° de particulier">
                </div>

            </div>
        </div>



        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-7 col-md-9">
                    <button type="button" class="btn btn-default">Annuler</button>
                    <button type="submit" class="btn btn-info">Rechercher</button>

                </div>
            </div>
        </div>

    </form>
    <!-- END SEARCH FORM -->

	
	
	
</div>
<!-- END SEARCH -->