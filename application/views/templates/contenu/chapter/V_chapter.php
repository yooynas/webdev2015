<body>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Chapitre 1</div>
  <!-- Table -->
  <table class="table chapter">
      <tr>
          <td><p>1</p></td>
          <td><p>Nom</p></td>
          <td><p>Type</p></td>
          <td><a class="btn btn-default  btn-sm">Suivre</a></td>
      </tr>
  </table>
  <div class="panel-heading">Chapitre 1</div>
</div>
<div class="panel panel-default">
<?php
foreach ($chapter as $i)
{
?>
<div class="panel-heading">
    <div class="name" style="display:inline-block"><?= $i['name_chapter']; ?></div>
    <div class="begin"><?= $i['begin_chapter']; ?></div>
</div>
<?php 
	foreach ($modules as $module)
	{
		if ($i['id_chapter'] == $module['fk_chapter_module'])
		{
			?>
			<table class="table chapter">
			<tr>
			    <td><p class="num"><?= $module['num_module']; ?></p></td>
			    <td><p><a href="<?= site_url('modules/get_theory_by_module/'.$module['id_module']); ?>" class="name" style="padding-left:5px; display:inline-block"><?= $module['name_module']; ?></a></p></td>
                <td><p></p></td>
                <td><a class="btn btn-default  btn-sm">Suivre</a></td>
            </table>
			<?php
		} 
		
	}
}
?>
</div>
<div><a href="<?= base_url().'index.php/admin/chapter/add_new_chapter' ?>">Ajouter un nouveaux chapitre</a></div>

