<div class="page-header">
  <h1>Mon compte <small>Mes infos</small></h1>
</div>

<?php 
	$alert = $this->session->flashdata('alert');
	if(!empty($alert)) : 
?>
	<div class="alert alert-success" role="alert"><?=$this->session->flashdata('alert')?></div>
<?php endif; ?>

<?php 
	$error = $this->session->flashdata('error');
	if(!empty($error)) : ?>
	<div class="alert alert-danger" role="alert"><?=$this->session->flashdata('error')?></div>
<?php endif; ?>

<div class="row">
	<div class="col-lg-6">
		<h3>Informations du compte</h3>
		<form action="<?=site_url('users/update_infos')?>" method="post">
		  	<div class="form-group">
		    	<label for="email">Adresse mail</label>
		    	<input type="email" class="form-control" id="email" name="email" value="<?=$infos_account->email_student?>" placeholder="Votre adresse email">
		  	</div>
			<?=form_error('email')?>
		  	<div class="form-group">
		    	<label for="nickname">Nom d'utilisateur</label>
		    	<input type="text" class="form-control" id="nickname" name="nickname" value="<?=$infos_account->nickname_student?>" placeholder="Votre nom d'utilisateur">
		  	</div>
			<?=form_error('nickname')?>
			<?php if(isset($errors['password'])) { echo $errors['password']; } ?>
		  	<button type="submit" class="btn btn-default">Mettre à jour</button>
		</form>
	</div>
	
	<div class="col-lg-6">
		<h3>Mot de passe</h3>
		<form action="<?=site_url('users/update_pass')?>" method="post">
		  	<div class="form-group">
		    	<label for="old_password">Mot de passe actuel</label>
		    	<input type="password" class="form-control" id="old_password" name="old_password" placeholder="Mot de passe actuel">
		  	</div>
			<?=form_error('old_password')?>
		  	<div class="form-group">
		    	<label for="password">Nouveau mot de passe</label>
		    	<input type="password" class="form-control" id="password" name="password" placeholder="Nouveau mot de passe">
		  	</div>
			<?=form_error('password')?>
		  	<div class="form-group">
		    	<label for="confirm_password">Confirmez</label>
		    	<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirmez le mot de passe">
		  	</div>
			<?=form_error('confirm_password')?>
			<?php if(isset($errors['password'])) { echo $errors['password']; } ?>
		  	<button type="submit" class="btn btn-default">Modifier</button>
		</form>
	</div>
</div>