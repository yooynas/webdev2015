<body>
<h2>Nouveau Chapitre</h2>
<?= form_open('chapter/add_chapter'); ?>
	
	<?=form_label('Cours :','lessons') ?>
	<span class="lessons">
		<?php
			
			foreach ($lessons as $lesson)
			{
			
				$options [$lesson['id_lesson']] = $lesson['name_lesson'];
				
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
	<?= form_label('Numéro du chapitre :','num_chapter');?>
	<?= form_input('num_chapter','');?>
	<br>
	<br>
	<?= form_submit('edit','Enregistrer');?>
	
	
<?= form_close(); ?>
				

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
