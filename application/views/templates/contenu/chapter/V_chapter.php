<body>
<?php
foreach ($chapter as $i)
{
?>
<div class="num" style="display:inline-block"><?= $i->num_chapter; ?></div>
<div class="name" style="display:inline-block"><?= $i->name_chapter; ?></div>
<div class="begin"><?= $i->begin_chapter; ?></div>
<?php 
	foreach ($modules as $module)
	{
		if ($i->num_chapter == 1 && $module->fk_chapter_module == 1)
		{
			?>
			<div class="num" style="padding-left:100px; display:inline-block"><?= $module->num_module; ?></div>
			<div class="name" style="padding-left:5px; display:inline-block"><?= $module->name_module; ?></div>
			<br>
			<?php
		} 
		if ($i->num_chapter == 2 && $module->fk_chapter_module == 2)
		{
			?>
			<div class="num" style="padding-left:100px"><?= $module->num_module; ?></div>
			<div class="name" style="padding-left:100px"><?= $module->name_module; ?></div>
			<?php
		} 
		if ($i->num_chapter == 3 && $module->fk_chapter_module == 3)
		{
			?>
			<div class="num" style="padding-left:100px"><?= $module->num_module; ?></div>
			<div class="name" style="padding-left:100px"><?= $module->name_module; ?></div>
			<?php
		} 
		if ($i->num_chapter == 4 && $module->fk_chapter_module == 4)
		{
			?>
			<div class="num" style="padding-left:100px"><?= $module->num_module; ?></div>
			<div class="name" style="padding-left:100px"><?= $module->name_module; ?></div>
			<?php
		} 
		if ($i->num_chapter == 5 && $module->fk_chapter_module == 5)
		{
			?>
			<div class="num" style="padding-left:100px"><?= $module->num_module; ?></div>
			<div class="name" style="padding-left:100px"><?= $module->name_module; ?></div>
			<?php
		} 
	}
}
?>
