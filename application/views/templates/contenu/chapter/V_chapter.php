<body>
<?php
foreach ($chapter as $i)
{
?>
<div class="num" style="display:inline-block"><?= $i['num_chapter']; ?></div>
<div class="name" style="display:inline-block"><?= $i['name_chapter']; ?></div>
<div class="begin"><?= $i['begin_chapter']; ?></div>
<?php 
	foreach ($modules as $module)
	{
		if ($i['num_chapter'] == $module['fk_chapter_module'])
		{
			?>
			<div class="num" style="padding-left:100px; display:inline-block"><?= $module['num_module']; ?></div>
			<div class="name" style="padding-left:5px; display:inline-block"><?= $module['name_module']; ?></div>
			<br>
			<?php
		} 
		
	}
}
?>
<div><a href="<?= base_url().'index.php/chapter/add_new_chapter' ?>">Ajouter un nouveaux chapitre</a></div>
