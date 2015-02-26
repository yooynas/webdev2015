<div class="page-header">
	<h1>Inscription</h1>
</div>

<form class="col-lg-6 col-lg-offset-3" action="<?=site_url('auth/activation/'.$key.'')?>" method="post">
  	<div class="form-group">
    	<label for="email">Adresse mail</label>
    	<input type="email" class="form-control" id="email" name="email" value="<?=set_value('email')?>" placeholder="Votre adresse email">
  	</div>
	<?=form_error('email')?>
  	<div class="form-group">
    	<label for="password">Mot de passe</label>
    	<input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
  	</div>
	<?=form_error('password')?>
  	<div class="form-group">
    	<label for="confirm_password">Confirmez</label>
    	<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirmez le mot de passe">
  	</div>
	<?=form_error('confirm_password')?>
  	<button type="submit" class="btn btn-default">Submit</button>
</form>