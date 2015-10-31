<!-- BEGIN SEARCH -->
<div class="content">

    <!-- BEGIN SEARCH FORM -->

	<form class="search-form" action="<?php echo Router::url('popup/result'); ?>" method="post">
        <h3 class="form-title">Recherche :</h3>
			
		<div class="alert alert-danger display-hide"  style="text-align:center">
			<button class="close" data-close="alert"></button>
			<span>Aucun particulier ne correspond à la recherche </span>
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
                    <span class="input-group-addon"> <i class="fa fa-bank"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;602</span>
                    <input type="texte" name="Num_Cotisant" class="form-control" placeholder="N° CNP">
                </div>

            </div>
        </div>


        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"> <i class="fa fa-share-alt"></i></span>
                    <input type="texte" name="Num_Partenaire" class="form-control" placeholder="N° partenaire">
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
		
		
		
		<div class="alert alert-danger display-hide"  style="text-align:center">
			<button class="close" data-close="alert"></button>
			<span>
			Aucun résultat </span>
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