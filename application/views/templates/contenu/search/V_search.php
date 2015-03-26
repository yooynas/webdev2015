<?php
echo '<h1>Recherche sur le terme : '.$search.'</h1>';
foreach ($finds as $find)
{
	echo '<p>Nom du cours : '.$find->name_lesson.'<br>';
	echo 'Description du cours : '.$find->description_lesson.'<br>';
	echo 'Date de début du cours : '.$find->begin_lesson.'<br>';
	echo 'Date de fin du cours : '.$find->end_lesson;
	echo '</p>';
?>
	<a href="<?=base_url().'index.php/chapter/'; ?>" class="btn btn-danger" >Voir les chapitres de ce cours</a>'
<?php
}
?>