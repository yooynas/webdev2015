<body>
<h2>Nouveau Chapitre</h2>
<?= form_open('chapter/add_chapter'); ?>
	
	<?=form_label('Cours :','lessons') ?>
	<span class="lessons">
		<?php
			
			foreach ($lessons as $lesson)
			{
			
				$options [] = $lesson['name_lesson'];
				
			}
			echo form_dropdown('lessons',$options);
		?>
	</span>
	<br>
	<br>
	<?= form_label('Nom du chapitre :','name_chapter');?>
	<?= form_input('name_chapter','');?>
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
	
	
<?= form_close(); ?>
				

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
