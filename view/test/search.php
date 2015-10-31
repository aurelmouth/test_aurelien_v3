<!-- BEGIN SEARCH -->
<div class="content">

    <!-- BEGIN SEARCH FORM -->

	<form class="search-form" action="" method="post">
        <h3 class="form-title">Recherche :</h3>

        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"> <i class="fa fa-user"></i></span>
                    <input type="texte" name="IRecipientId" class="form-control" placeholder="N° de particulier">
                </div>

            </div>
        </div>





        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"> <i class="fa fa-user"></i></span>
                    <input type="texte" name="sLastName" class="form-control" placeholder="Nom">
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
                <div class="input-group date date-picker">
                    <span class="input-group-addon"> <i class="fa fa-calendar"></i></span>
					<input id="Date_Naissance" name="Date_Naissance" type="texte" class="form-control" placeholder="Date de naissance">
					<span class="input-group-btn">
						<button id="Bouton_Naissance" name="Bouton_Naissance" class="btn btn-default" type="button" style="background-color:#e5e5e5; color:#999999;"><i class="fa fa-calendar"></i></button>
					</span>
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