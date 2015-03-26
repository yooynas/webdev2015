<body>
<div class="panel panel-default">
<?php
foreach ($chapter as $i)
{
?>
<div class="panel-heading">
    <span class="name"><?= $i['name_chapter']; ?>.</span>
    <span class="begin pull-right">Débute le : <?= $i['begin_chapter']; ?></span>
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
			    <td><p><a href="<?= site_url('modules/get_theory_by_module/'.$module['id_module']); ?>"><?= $module['name_module']; ?></a></p></td>
                <td><a class="btn btn-default  btn-sm">Suivre</a></td>
            </table>
			<?php
		} 
		
	}
}
?>
</div>

