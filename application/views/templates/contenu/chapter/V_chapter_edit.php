<body>
<h2>Edition du  <?=$content[0]['name_chapter'];?></h2>

<?= form_open('chapter/edit'); ?>
	
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
	<?=form_hidden('id_chapter',$content[0]['id_chapter']);?>
	<?= form_label('Nom du chapitre :','name_chapter');?>
	<?php 
	$data_name = array(
				  'name' => 'name_chapter',
				  'value' => $content[0]['name_chapter'],
				   'size' => '60'				 
				   )
	?>
	<?= form_input($data_name);?>
	<br>
	<br>
	<label for="date_chapter">Date de début :</label>
	<input type="date" name="date_chapter" value="<?=$content[0]['begin_chapter'];?>">
	<br>
	<br>
	<?= form_label('Numéro du chapitre :','num_chapter');?>
	<?php 
	$data_num = array(
				  'name' => 'num_chapter',
				  'value' => $content[0]['num_chapter'],
				   'size' => '5'				 
				   )
	?>
	<?= form_input($data_num);?>
	<br>
	<br>
	<?= form_submit('edit','Enregistrer');?>
	
	
<?= form_close(); ?>