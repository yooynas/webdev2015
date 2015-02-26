<form class="col-lg-6 col-lg-offset-3" action="<?=site_url('auth/login')?>" method="post">
  	<div class="form-group">
    	<label for="email">Adresse mail</label>
    	<input type="email" class="form-control" id="email" value="<?php echo set_value('email'); ?>" placeholder="Votre adresse email">
  	</div>
	<?=form_error('email')?>
	<?php if(isset($errors['email'])) { echo $errors['email']; } ?>
  	<div class="form-group">
    	<label for="password">Mot de passe</label>
    	<input type="password" class="form-control" id="password" placeholder="Mot de passe">
  	</div>
	<?=form_error('password')?>
	<?php if(isset($errors['password'])) { echo $errors['password']; } ?>
  	<button type="submit" class="btn btn-default">Submit</button>
</form>