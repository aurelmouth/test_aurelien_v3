<!-- BEGIN SEARCH -->
<div class="content">

    <!-- BEGIN SEARCH FORM -->

	<form class="search-form" action="<?php echo Router::url('coupon_prospect/result'); ?>" method="post">
        <h3 class="form-title">Coupon prospect &gt; Recherche :</h3>
			
		<div id="critere_recherche" class="alert alert-danger display-hide"  style="text-align:center">
			<button class="close" data-close="alert"></button>
			<span>
			Veuillez saisir un critère de recherche. </span>
		</div>
			
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"> <i class="fa fa-user"></i></span>
                    <input type="texte" name="IRecipientId" class="form-control" placeholder="N° particulier" value="<?php if(isset($_SESSION['search']['IRecipientId'])) echo $_SESSION['search']['IRecipientId'];?>">
                </div>

            </div>
        </div>





        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"> <i class="fa fa-user"></i></span>
                    <input type="texte" name="sLastName" class="form-control" placeholder="Nom d'usage ou de naissance">
                </div>

            </div>
        </div>

        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"> <i class="fa fa-user"></i></span>
                    <input type="texte" name="sFirstName" class="form-control" placeholder="Prénom">
                </div>

            </div>
        </div>

        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"> <i class="fa fa-map-marker"></i></span>
                    <input type="texte" name="departement" class="form-control" placeholder="Département">
                </div>

            </div>
        </div>

        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <div class="col-md-12">
                <div class="input-group">
                    <span id="calendar" height="20px" class="input-group-addon"> <i class="fa fa-calendar"></i></span>
					<input id="Date_Naissance" name="tsBirth" type="texte" class="form-control" placeholder="Date de naissance">
                </div>
            </div>
        </div>


        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"> <i class="fa fa-envelope"></i></span>
                    <input type="texte" name="sEmail" class="form-control" placeholder="Adresse email">
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