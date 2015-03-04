<?php if(!empty($this->session->flashdata('alert'))) : ?>
	<div class="alert alert-success" role="alert"><?=$this->session->flashdata('alert')?></div>
<?php endif; ?>

<?php if(!empty($this->session->flashdata('error'))) : ?>
	<div class="alert alert-danger" role="alert"><?=$this->session->flashdata('error')?></div>
<?php endif; ?>

<form class="col-lg-6 col-lg-offset-3" action="<?=site_url('auth/login')?>" method="post">
  	<div class="form-group">
    	<label for="email">Adresse mail</label>
    	<input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Votre adresse email">
  	</div>
	<?=form_error('email')?>
	<?php if(isset($errors['email'])) { echo $errors['email']; } ?>
  	<div class="form-group">
    	<label for="password">Mot de passe</label>
    	<input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
  	</div>
	<?=form_error('password')?>
	<?php if(isset($errors['password'])) { echo $errors['password']; } ?>
  	<button type="submit" class="btn btn-default">Submit</button>
</form>