<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="<?php echo Router::url('login/login'); ?>" method="post">
		<h3 class="form-title">Connectez-vous au CRM Préfon</h3>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Veuillez saisir votre nom d'utilisateur et mot de passe. </span>
		</div>
		
		<?php if(isset($_SESSION['wrong'])){?>
		<div id ="logfalse" class="alert alert-danger">
			<button class="close" data-close="alert"></button>
			<span>
			Utilisateur ou mot de passe incorrect </span>
		</div>
		<?php }?>
		
		<?php if(isset($this->vars['no_rights'])){?>
		<div id ="logfalse" class="alert alert-danger">
			<button class="close" data-close="alert"></button>
			<span>
			Cet utilisateur n'a accés à aucun module </span>
		</div>
		<?php }?>
		
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Utilisateur</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Utilisateur" name="username" value="<?php if(isset($this->request->data->username)) echo $this->request->data->username;?>"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Mot de passe</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Mot de passe" name="password"/>
			</div>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-info pull-right">
			Se connecter </button>
		</div>
	</form>
	<!-- END LOGIN FORM -->

</div>
<!-- END LOGIN -->



