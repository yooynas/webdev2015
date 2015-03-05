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
		if ($i['id_chapter'] == $module['fk_chapter_module'])
		{
			?>
			<p style="margin-left: 50px;">
			<span class="num"><?= $module['num_module']; ?></span>
			<a href="<?= base_url().'index.php/module/get_theory_by_module/'.$module['id_module']; ?>" class="name" style="padding-left:5px; display:inline-block"><?= $module['name_module']; ?></a>
            </p>
			<?php
		} 
		
	}
}
?>
<div><a href="<?= base_url().'index.php/chapter/add_new_chapter' ?>">Ajouter un nouveaux chapitre</a></div>
