<body>
<h2>Nouveau Chapitre</h2>
<!--
<form action="<?=base_url().'index.php/chapter/add_chapter';?>" method="post" id="add_user" >
	<input type="hidden" name="id" value="">
	<br>
	<br>
	<label for="lessons">Cours :</label>
	<select name="lessons" id="lessons">
		<?php
			foreach ($lessons as $lesson)
			{
				?>
				<option value="<?= $lesson['id_lesson']; ?>"><?= $lesson['name_lesson']; ?></option>
				<?php
			}
		?>
	</select>
	<br>
	<br>
	<label for="name_chapter">Nom du chapitre :</label>
	<input type="text" name="name_chapter" value="">
	<br>
	<br>
	<label for="date_chapter">Date de début :</label>
	<input type="date" name="date_chapter" value="">
	<br>
	<br>
	<label for="num_chapter">Numéro du chapitre :</label>
	<input type="text" name="num_chapter" value="">
	<br>
	<br>
	<input type="submit" name="add_chapter" value="Enregistrer">
	
	
</form>
-->
				<?= form_open('chapter/add_chapter'); ?>
				<label>Nom du chapitre :</label>
				<div class="name_chapter"><?= $produit->nom; ?></div>
				<div class="thumb">
					<?= imghtml($produit->id.'.jpg',$produit->nom); ?>
					
				</div>
				<div class="prix"><?= $produit->prix; ?></div>
				<div class="option">
				<?php if($produit->option_nom):?>
					<?= form_label($produit->option_nom,'option_'.$produit->id);?>
					<?= form_dropdown
					(
						$produit->option_nom,
						$produit->option_valeur,
						NULL,
						'id="option_'.$produit->id.'"'
					); ?>
					<?php endif; ?>
					</div>
					<?= form_hidden('id',$produit->id);?>
					<?= form_submit('action','ajouter au caddie');?>
				<?= form_close(); ?>
<?php
if (isset($_POST['add_chapter']))
{
	$newuser = array
	(
		
		'lesson' => $_POST['lessons'],
		'name_chapter' => $_POST['name_chapter'],
		'date_chapter' => $_POST['date_chapter'],
		'num_chapter' => $_POST['num_chapter']
	);
}
	?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
