<body>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Chapitre 1</div>
  <!-- Table -->
  <table class="table chapter">
      <tr><td><p>1</p></td><td><p>Nom</p></td><td><p>Type</p></td><td><a class="btn btn-default  btn-sm">Suivre</a></td></tr>
      <tr><td><p>1</p></td><td><p>Nom</p></td><td><p>Type</p></td><td><a class="btn btn-default  btn-sm">Suivre</a></td></tr>
  </table>
  <div class="panel-heading">Chapitre 1</div>
</div>
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
			<a href="<?= site_url('modules/get_theory_by_module/'.$module['id_module']); ?>" class="name" style="padding-left:5px; display:inline-block"><?= $module['name_module']; ?></a>
            </p>
			<?php
		} 
		
	}
}
?>
<div><a href="<?= base_url().'index.php/admin/chapter/add_new_chapter' ?>">Ajouter un nouveaux chapitre</a></div>

